<?php

namespace App\Http\Controllers;

use App\Models\kode_surat_keluar;
use Illuminate\Http\Request;

class KategoriKodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-master.kategori-kode', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kategori Kode",
            "datas" => kode_surat_keluar::all()
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kode_surat_keluar  $kode_surat_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kode_surat_keluar $kode_surat_keluar)
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
