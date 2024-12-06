<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use App\Models\BookingList;
use App\Models\User;

use App\Jobs\SendEmail;
use App\Models\SjfScheduling;
use DataTables;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode; 
class BookingListController extends Controller
{
    public function json(){
        $data = BookingList::with([
            'kesenian', 'user'
        ]);

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = BookingList::with([
            'kesenian', 'user'
        ])
        ->orderBy('created_at', 'desc') // Order by timestamps from newest to oldest
        ->get();

        // return view('pages.admin.booking-list.index');
        return view('pages.admin.booking-list.index2',compact('model'));
    }

    public function konfirmasi(Request $request){
        // Find the booking and update its status
        $model = BookingList::find($request->item_id);
        $model->status = $request->status; // Update status to DIBAYAR
        $model->save();
    
        // Get the SJF scheduling jobs ordered by 'waktu_kedatangan'
        $jobs = SjfScheduling::orderBy('waktu_kedatangan')->get();
    
        // Initialize currentTime to the waktu_kedatangan of the first job (in hours)
        $currentTime = ($jobs->first()->waktu_kedatangan ?? 0) / (60*7); // Convert to hours
    
        foreach ($jobs as $job) {
            $waktu_kedatangan_hours = $job->waktu_kedatangan / (60*7); // Convert to hours
            $lama_eksekusi_hours = $job->lama_eksekusi / (60*7); // Convert to hours
    
            $job->mulai_eksekusi = max($currentTime, $waktu_kedatangan_hours); // Start time is the max of current time and arrival time (in hours)
            $job->selesai_eksekusi = $job->mulai_eksekusi + $lama_eksekusi_hours; // End time is start time + execution time (in hours)
            $job->turn_around = $job->selesai_eksekusi - $waktu_kedatangan_hours; // Turn around time is end time - arrival time (in hours)
    
            // Save the results back in minutes
            $job->mulai_eksekusi *= 60*7; // Convert back to minutes
            $job->selesai_eksekusi *= 60*7; // Convert back to minutes
            $job->turn_around *= 60*7; // Convert back to minutes
            $job->save();
    
            $currentTime = $job->selesai_eksekusi / (60*7); // Update current time to the end time of the current job (in hours)
        }
    
        session()->flash('alert-success', 'Bukti pembayaran berhasil dikonfirmasi');
    
        return redirect()->back();
    }
    



    public function update($id, $value)
    {
        $item   = BookingList::findOrFail($id);
        $today  = Carbon::today()->toDateString();
        $now    = Carbon::now()->toTimeString();

        $user_name          = $item->user->name;
        $user_email         = $item->user->email;

        $admin_name         = Auth::user()->name;
        $admin_email        = Auth::user()->email;

        if($value == 1) {
            $data['status'] = 'DISETUJUI';
        }
        else if($value == 0) {
            $data['status'] = 'DITOLAK';
        }
        else {
            session()->flash('alert-failed', 'Perintah tidak dimengerti');
            return redirect()->route('booking-list.index');
        }

        if($item['date'] > $today || ($item['date'] == $today && $item['start_time'] > $now)) {
            if($data['status'] == 'DISETUJUI') {
                if(
                    BookingList::where([
                        ['date', '=', $item['date']],
                        ['barangkesenian_id', '=', $item['barangkesenian_id']],
                        ['status', '=', 'DISETUJUI'],
                    ])
                    ->whereBetween('start_time', [$item['start_time'], $item['end_time']])
                    ->count() <= 0 && 
                    BookingList::where([
                        ['date', '=', $item['date']],
                        ['barangkesenian_id', '=', $item['barangkesenian_id']],
                        ['status', '=', 'DISETUJUI'],
                    ])
                    ->whereBetween('end_time', [$item['start_time'], $item['end_time']])
                    ->count() <= 0 &&
                    BookingList::where([
                        ['date', '=', $item['date']],
                        ['barangkesenian_id', '=', $item['barangkesenian_id']],
                        ['start_time', '<=', $item['start_time']],
                        ['end_time', '>=', $item['end_time']],
                        ['status', '=', 'DISETUJUI'],
                    ])->count() <= 0
                ) {
                    if($item->update($data)) {
                        session()->flash('alert-success', 'Booking Ruang '.$item->kesenian->nama.' sekarang '.$data['status']);

                        $to_role    = 'USER';

                        // use URL::to('/') for the url value

                        // URL::to('/my-booking-list)
                        dispatch(new SendEmail($user_email, $user_name, $item->kesenian->nama, $item['date'], $item['start_time'], $item['end_time'], $item['purpose'], $to_role, $user_name, 'https://google.com', $data['status']));

                        $to_role    = 'ADMIN';

                        // URL::to('/admin/booking-list)
                        dispatch(new SendEmail($admin_email, $user_name, $item->kesenian->nama, $item['date'], $item['start_time'], $item['end_time'], $item['purpose'], $to_role, $admin_name, 'https://google.com', $data['status']));

                    } else {
                        session()->flash('alert-failed', 'Booking Ruang '.$item->kesenian->nama.' gagal diupdate');
                    }
                } else {
                    session()->flash('alert-failed', 'Ruangan '.$item->kesenian->nama.' di waktu itu sudah dibooking');
                }   
            } elseif($data['status'] == 'DITOLAK') {
                if($item->update($data)) {
                    session()->flash('alert-success', 'Booking Ruang '.$item->kesenian->nama.' sekarang '.$data['status']);

                    $to_role    = 'USER';

                    // URL::to('/my-booking-list)
                    dispatch(new SendEmail($user_email, $user_name, $item->kesenian->nama, $item['date'], $item['start_time'], $item['end_time'], $item['purpose'], $to_role, $user_name, 'https://google.com', $data['status']));

                    $to_role    = 'ADMIN';

                    // URL::to('/admin/booking-list)
                    dispatch(new SendEmail($admin_email, $user_name, $item->kesenian->nama, $item['date'], $item['start_time'], $item['end_time'], $item['purpose'], $to_role, $admin_name, 'https://google.com', $data['status']));

                } else {
                    session()->flash('alert-failed', 'Booking Ruang '.$item->kesenian->nama.' gagal diupdate');
                }
            }
        } else {
            session()->flash('alert-failed', 'Permintaan booking itu tidak lagi bisa diupdate');
        }
        
        return redirect()->route('booking-list.index');
    }
    public function generateQrCode($kode_transaksi)
    {
        // Generate a QR code for the given kode_transaksi
        $qrCode = QrCode::size(200)->generate($kode_transaksi);

    return response($qrCode)->header('Content-Type', 'image/svg+xml');
    }
}
