<?php

namespace App\Http\Controllers;

use App\Models\kode_surat_keluar;
use App\Http\Requests\Storekode_surat_keluarRequest;
use App\Http\Requests\Updatekode_surat_keluarRequest;

class KodeSuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat-keluar.kode-surat', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kategori Kode"
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
     * @param  \App\Http\Requests\Storekode_surat_keluarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storekode_surat_keluarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kode_surat_keluar  $kode_surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(kode_surat_keluar $kode_surat_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kode_surat_keluar  $kode_surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(kode_surat_keluar $kode_surat_keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatekode_surat_keluarRequest  $request
     * @param  \App\Models\kode_surat_keluar  $kode_surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Updatekode_surat_keluarRequest $request, kode_surat_keluar $kode_surat_keluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_surat_keluar  $kode_surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(kode_surat_keluar $kode_surat_keluar)
    {
        //
    }
}
