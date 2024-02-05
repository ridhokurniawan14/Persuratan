<?php

namespace App\Http\Controllers;

use App\Models\kode_surat_masuk;
use App\Http\Requests\Storekode_surat_masukRequest;
use App\Http\Requests\Updatekode_surat_masukRequest;

class KodeSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.kode-surat-masuk', [
            "halaman" => "Data Master",
            "title" => "Surat Masuk",
            "tab_title" => "Kode Surat Masuk"
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
     * @param  \App\Http\Requests\Storekode_surat_masukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storekode_surat_masukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kode_surat_masuk  $kode_surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(kode_surat_masuk $kode_surat_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kode_surat_masuk  $kode_surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(kode_surat_masuk $kode_surat_masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatekode_surat_masukRequest  $request
     * @param  \App\Models\kode_surat_masuk  $kode_surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Updatekode_surat_masukRequest $request, kode_surat_masuk $kode_surat_masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_surat_masuk  $kode_surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(kode_surat_masuk $kode_surat_masuk)
    {
        //
    }
}
