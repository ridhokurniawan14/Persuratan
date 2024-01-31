<?php

namespace App\Http\Controllers;

use App\Models\surat_masuk;
use App\Http\Requests\Storesurat_masukRequest;
use App\Http\Requests\Updatesurat_masukRequest;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat-masuk.surat-masuk', [
            "halaman" => "Input Surat Masuk",
            "title" => "Input Surat",
            "tab_title" => "Surat Masuk"
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
     * @param  \App\Http\Requests\Storesurat_masukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storesurat_masukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(surat_masuk $surat_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_masuk $surat_masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatesurat_masukRequest  $request
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Updatesurat_masukRequest $request, surat_masuk $surat_masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_masuk $surat_masuk)
    {
        //
    }
}
