<?php

namespace App\Http\Controllers;

use App\Models\surat_keluar;
use App\Http\Requests\Storesurat_keluarRequest;
use App\Http\Requests\Updatesurat_keluarRequest;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat-keluar.surat-keluar', [
            "halaman" => "Input Surat Keluar",
            "title" => "Input Surat",
            "tab_title" => "Surat Keluar"
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
     * @param  \App\Http\Requests\Storesurat_keluarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storesurat_keluarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keluar $surat_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_keluar $surat_keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatesurat_keluarRequest  $request
     * @param  \App\Models\surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Updatesurat_keluarRequest $request, surat_keluar $surat_keluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keluar  $surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keluar $surat_keluar)
    {
        //
    }
}
