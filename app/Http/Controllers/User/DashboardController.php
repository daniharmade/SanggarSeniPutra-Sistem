<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use DataTables;

use App\Models\BookingList;

class DashboardController extends Controller
{
    public function dashboard_booking_list(){
        $today = Carbon::today()->toDateString();

        $data = BookingList::where('id_customer', Auth::user()->id)
        ->whereDate('created_at', '=', $today)
        ->with([
            'kesenian'
        ])->take(3);

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index()
    {
        // dd(1);
        $today = Carbon::today()->toDateString();

        $booking_today      = BookingList::where('id_customer', Auth::user()->id)
        ->whereDate('created_at', '=', $today)
        ->count();
        $booking_lifetime   = BookingList::where([
            ['id_customer', Auth::user()->id],
        ])->count();
        
        
        if(Auth::user()->role == 'ADMIN'){
            $model = BookingList::with(['kesenian', 'user']) // Eager load the relationships
            // ->where('id_customer', Auth::user()->id) // Filter by user_id
            ->orderBy('created_at', 'desc') // Order by timestamps from newest to oldest
            ->get();
        }else{
            $model = BookingList::with(['kesenian', 'user']) // Eager load the relationships
            ->where('id_customer', Auth::user()->id) // Filter by user_id
            ->orderBy('created_at', 'desc') // Order by timestamps from newest to oldest
            ->get();
        }
       

        // return view('pages.user.dashboard', [
        //     'booking_today'     => $booking_today,
        //     'booking_lifetime'  => $booking_lifetime,
        //     'model'  => $model,
        // ]);
// dd(Auth::user()->role);
        if (Auth::user()->role === 'ADMIN') {

            return redirect()->route('admin.dashboard');
        } else {
            // dd(1);
            // Non-admin users
            $model = BookingList::with(['kesenian', 'user']) // Eager load the relationships
                ->where('id_customer', Auth::user()->id) // Filter by user_id
                ->orderBy('created_at', 'desc') // Order by timestamps from newest to oldest
                ->get();
        
            return view('pages.user.dashboard', [
                'booking_today' => $booking_today,
                'booking_lifetime' => $booking_lifetime,
                'model' => $model,
            ]);
        }
    }
}
