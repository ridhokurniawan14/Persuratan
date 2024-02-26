<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\kode_surat_keluars;
use App\Models\kode_yplps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KodeSuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.data-master.kategori-kode.index', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kategori Kode",
            "categories" => kode_yplps::orderBy('kode')->get(),
            'datas' => DB::table('kode_surat_keluars')
                ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
                ->select('kode_surat_keluars.id','kode_surat_keluars.nomor','kode_surat_keluars.ket','kode_yplps.kode')
                ->orderBy('kode_yplps.kode')->get()
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
            'kode_surat_yplp'  => ['required'],
            'nomor' => ['required', 'numeric', 'digits_between:1,2', 'max:99'],
            'ket'  => ['required','string'],
        ]);
        // Lakukan validasi tambahan untuk memeriksa keunikan kombinasi 'Kode' dan 'Nomor'
        $request->validate([
            'kode_surat_yplp' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    // Lakukan pengecekan ke database untuk memeriksa keunikan kombinasi 'Kode' dan 'Nomor'
                    $exists = kode_surat_keluars::where('kode_surat_yplp', $request->kode_surat_yplp)
                        ->where('nomor', $request->nomor)
                        ->exists();

                    // Jika kombinasi 'Kode' dan 'Nomor' sudah ada di database, maka aturan validasi akan gagal
                    if ($exists) {
                        $fail('Kode sudah ada di database.');
                    }
                },
            ],
        ]);
        kode_surat_keluars::create($validateData);
        // Catat aktivitas dalam log
        ActivityLogger::logActivity('create', 'Kategori Kode Surat Masuk dengan deskripsi '.ucwords($request->ket), '');
        return redirect('/data-master/kategori-kode')->with('message', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kode_surat_keluars  $kode_surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function show(kode_surat_keluars $kode_surat_keluars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kode_surat_keluars  $kode_surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode_surat_keluars = kode_surat_keluars::find($id);
        return view('dashboard.data-master.kategori-kode.edit', [
            "kode_surat_keluars" => $kode_surat_keluars,
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Edit Kategori Kode",
            "categories" => kode_yplps::orderBy('kode')->get(),
            'datas' => DB::table('kode_surat_keluars')
                ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
                ->select('kode_surat_keluars.id','kode_surat_keluars.nomor','kode_surat_keluars.ket','kode_yplps.kode')
                ->orderBy('kode_yplps.kode')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kode_surat_keluars  $kode_surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kode_surat_keluars $kode_surat_keluars, $id)
    {
        $rules = [
            'ket'  => ['required','string'],
        ];

        if($request->kode_surat_yplp != $kode_surat_keluars->kode_surat_yplp || $request->nomor != $kode_surat_keluars->nomor) {
            $rules['kode_surat_yplp'] = ['required'];
            $rules['nomor'] = ['required', 'numeric', 'digits_between:1,2', 'max:99'];
        }

        $validateData = $request->validate($rules);
        
        kode_surat_keluars::where('id', $id)
            ->update($validateData);
        // Catat aktivitas dalam log
        ActivityLogger::logActivity('update', 'Kategori Kode Surat Masuk dengan deskripsi ' . ucwords($request->ket), '');
        return redirect('/data-master/kategori-kode')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kode_surat_keluars  $kode_surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function destroy(kode_surat_keluars $kode_surat_keluars, $id)
    {
        $data = kode_surat_keluars::find($id);

        if($data)
        {
            $data->delete();
        }
        // Catat aktivitas dalam log
        ActivityLogger::logActivity('delete', 'Kategori Kode Surat Masuk yaitu '.ucwords($data->ket), '');
        return redirect('/data-master/kategori-kode')->with('message', 'Data Berhasil Dihapus!');
    }
}
