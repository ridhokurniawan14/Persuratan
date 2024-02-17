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

        // $validateData['user_id'] = auth()->user()->id;

        kode_yplps::create($validateData);
        // return redirect('/data-master/kode-surat')->with('message', 'Data Berhasil Disimpan!');
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
            compact([$kode_yplps])
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
        // dd($validateData);
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
        return redirect('/data-master/kode-surat')->with('message', 'Data Berhasil Dihapus!');
    }
}