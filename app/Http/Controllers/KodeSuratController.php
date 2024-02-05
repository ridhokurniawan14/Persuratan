<?php

namespace App\Http\Controllers;

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
        return view('data-master.kode-surat', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kode Surat",
            "datas" => kode_yplps::all()
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
            'kode' => ['required', 'regex:/^[a-zA-Z]+$/', 'unique:kode_yplps'],
            'ket'  => ['required'],
        ]);

        $validateData['user_id'] = auth()->user()->id;

        kode_yplps::create($validateData);

        return redirect('/data-master/kode-surat')->with('success', 'Data Berhasil Disimpan!');
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
    public function edit(kode_yplps $kode_yplps)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kode_yplps  $kode_yplps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kode_yplps $kode_yplps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_yplps  $kode_yplps
     * @return \Illuminate\Http\Response
     */
    public function destroy(kode_yplps $kode_yplps)
    {
        kode_yplps::destroy($kode_yplps->id);
        // $kode_yplps->delete();
        return redirect('/data-master/kode-surat')->with('success', 'Data Berhasil Dihapus!');

        // dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
    }
}
