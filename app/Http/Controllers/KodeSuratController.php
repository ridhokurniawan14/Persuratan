<?php

namespace App\Http\Controllers;

use App\Models\kode_yplp;
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
        return view('surat-keluar.kode-surat', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kode Surat"
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
     * @param  \App\Models\kode_yplp  $kode_yplp
     * @return \Illuminate\Http\Response
     */
    public function show(kode_yplp $kode_yplp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kode_yplp  $kode_yplp
     * @return \Illuminate\Http\Response
     */
    public function edit(kode_yplp $kode_yplp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kode_yplp  $kode_yplp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kode_yplp $kode_yplp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_yplp  $kode_yplp
     * @return \Illuminate\Http\Response
     */
    public function destroy(kode_yplp $kode_yplp)
    {
        //
    }
}
