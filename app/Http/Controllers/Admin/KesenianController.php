<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangkesenianM;
use Illuminate\Http\Request;
use DataTables;

class KesenianController extends Controller
{
    public function json()
    {
        $data = BarangkesenianM::all();

        return DataTables::of($data)
            ->addIndexColumn()
            // Hapus bagian ini jika Anda tidak ingin menampilkan foto
            // ->editColumn('foto', function ($row) {
            //     $fotoArray = json_decode($row->foto, true);
            //     return $fotoArray;
            // })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.kesenian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kesenian.edit_or_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Menghapus bagian yang berhubungan dengan video dan foto
        // $data['video'] = $request->file('video')->store('assets/video/kesenian', 'public');

        // Tidak perlu menangani unggahan foto
        // $fotos = [];
        // if ($request->hasFile('foto')) {
        //     foreach ($request->file('foto') as $file) {
        //         $name = time() . '_' . $file->getClientOriginalName();
        //         $file->storeAs('public/uploads', $name);
        //         $fotos[] = $name;
        //     }
        // }

        // Tidak perlu mengubah foto menjadi JSON
        // $data['foto'] = json_encode($fotos);

        // Create the new BarangkesenianM record without video or photo
        $create_room = BarangkesenianM::create($data);

        if ($create_room) {
            $request->session()->flash('alert-success', 'Kesenian ' . $data['nama'] . ' berhasil ditambahkan');
        } else {
            $request->session()->flash('alert-failed', 'Kesenian ' . $data['nama'] . ' gagal ditambahkan');
        }

        return redirect()->route('kesenian.index');
    }

    public function list()
    {
        return view('pages.user.kesenian.index');
    }

    public function dataJson()
    {
        $data = BarangkesenianM::all();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('foto', function ($row) {
                // Decode JSON-encoded string to PHP array
                $fotoArray = json_decode($row->foto, true);
                return $fotoArray;
            })
            ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BarangkesenianM::findOrFail($id);

        return view('pages.admin.kesenian.edit_or_create', [
            'item'  => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Tidak perlu menangani unggahan foto
        // if (isset($data['foto'])) {
        //     $data['foto'] = $request->file('foto')->store('assets/image/kesenian', 'public');
        // }

        $item = BarangkesenianM::findOrFail($id);

        if ($item->update($data)) {
            $request->session()->flash('alert-success', 'Kesenian ' . $item->nama . ' berhasil diupdate');
        } else {
            $request->session()->flash('alert-failed', 'Kesenian ' . $item->nama . ' gagal diupdate');
        }

        return redirect()->route('kesenian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BarangkesenianM::findOrFail($id);

        if ($item->delete()) {
            session()->flash('alert-success', 'Kesenian ' . $item->nama . ' berhasil dihapus!');
        } else {
            session()->flash('alert-failed', 'Kesenian ' . $item->nama . ' gagal dihapus');
        }

        return redirect()->route('kesenian.index');
    }
}
