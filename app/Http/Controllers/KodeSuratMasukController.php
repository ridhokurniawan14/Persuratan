<?php

namespace App\Http\Controllers;

use App\Models\kode_surat_masuk;
use Illuminate\Http\Request;

class KodeSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data-master.kode-surat-masuk.index', [
            "halaman" => "Data Master",
            "title" => "Surat Masuk",
            "tab_title" => "Kode Surat Masuk",
            "datas" => kode_surat_masuk::orderBy('kode')->get(),
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
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => ['required', 'alpha', 'unique:kode_surat_masuks'],
            'ket'  => ['required', 'string'],
        ]);

        // $validateData['user_id'] = auth()->user()->id;

        kode_surat_masuk::create($validateData);
        // return redirect('/data-master/kode-surat')->with('message', 'Data Berhasil Disimpan!');
        return back()->with('message', 'Data Berhasil Disimpan!');
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
    public function edit($id)
    {
        $kode_surat_masuk = kode_surat_masuk::find($id);
        return view('dashboard.data-master.kode-surat-masuk.edit', [
            "kode_surat_masuk" => $kode_surat_masuk,
            "halaman" => "Data Master",
            "title" => "Surat Masuk",
            "tab_title" => "Kode Surat Masuk",
            "datas" => kode_surat_masuk::orderBy('kode')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\kode_surat_masuk  $kode_surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kode_surat_masuk $kode_surat_masuk, $id)
    {
        $rules = [
            'ket'  => ['required', 'string'],
        ];

        if($request->kode != $kode_surat_masuk->kode) {
            $rules['kode'] = ['required', 'alpha', 'unique:kode_surat_masuks'];
        }

        $validateData = $request->validate($rules);
        
        kode_surat_masuk::where('id', $id)
            ->update($validateData);
        return redirect('/data-master/kode-surat-masuk')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_surat_masuk  $kode_surat_masuk
     * @return \Illuminate\Http\Response
     */
    // public function destroy(kode_surat_masuk $kode_surat_masuk)
    // {
    //     if($kode_surat_masuk)
    //     {
    //         $kode_surat_masuk->delete();
    //     }
    //     return redirect('data-master/kode-surat-masuk')->with('message', 'Data Berhasil Dihapus!');
    // }
    public function destroy(kode_surat_masuk $kode_surat_masuk)
    {
        if($kode_surat_masuk) {
            $kode_surat_masuk->delete();
            return redirect('data-master/kode-surat-masuk')->with('message', 'Data Berhasil Dihapus!');
        } else {
            return redirect('data-master/kode-surat-masuk')->with('error', 'Data Tidak Ditemukan!');
        }
    }
}
