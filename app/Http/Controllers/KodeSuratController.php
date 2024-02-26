<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\kode_yplps;
use Illuminate\Http\Request;

class KodeSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data-master.kode-surat.index', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kode Surat",
            "datas" => kode_yplps::orderBy('kode')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => ['required', 'regex:/^[a-zA-Z]{1,2}$/', 'unique:kode_yplps'],
            'ket'  => ['required','string'],
        ]);

        kode_yplps::create($validateData);
        
        // Catat aktivitas dalam log
        ActivityLogger::logActivity('create', 'Kode Surat YPLP dengan kode '.ucwords($request->kode).' -> '.ucwords($request->ket), '');

        return back()->with('message', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kode_yplps  $kode_yplps
     * @return \Illuminate\Http\Response
     */
    public function show(kode_yplps $kode_yplps)
    {
        // Menampilkan data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kode_yplps  $kode_yplps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode_yplps = kode_yplps::find($id);
        // dd($kode_yplps);
        return view('dashboard.data-master.kode-surat.edit', [
            "kode_yplps" => $kode_yplps,
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Edit Kode Surat",
            "datas" => kode_yplps::orderBy('kode')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kode_yplps  $kode_yplps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kode_yplps $kode_yplps, $id)
    {
        $rules = [
            'ket'  => ['required','string'],
        ];

        if($request->kode != $kode_yplps->kode) {
            $rules['kode'] = ['required', 'regex:/^[a-zA-Z]{1,2}$/', 'unique:kode_yplps'];
        }

        $validateData = $request->validate($rules);
        
        kode_yplps::where('id', $id)
            ->update($validateData);
        
            // Catat aktivitas dalam log
        ActivityLogger::logActivity('update', 'Kode Surat YPLP dengan kode ' . ucwords($request->kode) . ' -> ' . ucwords($request->ket), '');

        return redirect('/data-master/kode-surat')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_yplps  $kode_yplps
     * @return \Illuminate\Http\Response
     */
    public function destroy(kode_yplps $kode_yplps, $id)
    {
        $data = kode_yplps::find($id);

        if($data)
        {
            $data->delete();
        }

        // Catat aktivitas dalam log
        ActivityLogger::logActivity('delete', 'Kode Surat YPLP yaitu kode '.ucwords($data->kode).' -> '.ucwords($data->ket), '');

        return redirect('/data-master/kode-surat')->with('message', 'Data Berhasil Dihapus!');
    }
}