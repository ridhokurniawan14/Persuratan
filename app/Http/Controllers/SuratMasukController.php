<?php

namespace App\Http\Controllers;

use App\Models\surat_masuk;
use App\Models\kode_surat_masuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.surat-masuk.index', [
            "halaman" => "Data Surat Masuk",
            "title" => "Data Surat",
            "tab_title" => "Data Surat Masuk",
            "datas" => DB::table('kode_surat_masuks')
            ->join('surat_masuks', 'kode_surat_masuks.id', '=', 'surat_masuks.kode_surat_masuk')
            ->select('kode_surat_masuks.kode', 'surat_masuks.id', 'surat_masuks.alamat_pengirim', 'surat_masuks.tanggal_surat', 'surat_masuks.nomor_surat', 'surat_masuks.created_by')
            ->orderBy('surat_masuks.id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.surat-masuk.create', [
            "halaman" => "Input Surat Masuk",
            "title" => "Input Surat",
            "tab_title" => "Surat Masuk",
            "categories" => kode_surat_masuk::orderBy('kode')->get()
        ]);
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
            'kode_surat_masuk' => ['required', 'numeric', 'digits_between:1,2'], // Angka dengan panjang maksimum 2 digit
            'alamat_pengirim' => ['required', 'string'], // Teks
            'tanggal_surat' => ['required', 'date'], // Tanggal
            'nomor_surat' => ['required', 'unique:surat_masuks'], // Teks
            'perihal' => ['required', 'string'], // Teks
            'file' => ['nullable', 'sometimes', 'file', 'mimes:pdf', 'max:5120'], // File PDF dengan ukuran maksimal 5 MB (5120 KB)
        ]);

        // Setelah validasi, tambahkan 'created_by' ke dalam data
        $validateData['created_by'] = auth()->user()->name;

        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('surat-masuk-files'); // Simpan file PDF di direktori yang ditentukan
        }

        surat_masuk::create($validateData);

        return redirect('/surat-masuk/')->with('message', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(surat_masuk $surat_masuk)
    {
        // Mendapatkan ekstensi file
        $file_extension = pathinfo($surat_masuk->file, PATHINFO_EXTENSION);

        return view('dashboard.surat-masuk.show', [
            "halaman" => "Detail Surat Masuk",
            "title" => "Detail Surat",
            "tab_title" => "Surat Masuk",
            'surat_masuk' => DB::table('kode_surat_masuks')
            ->join('surat_masuks', 'kode_surat_masuks.id', '=', 'surat_masuks.kode_surat_masuk')
            ->select('kode_surat_masuks.kode', 'kode_surat_masuks.ket', 'surat_masuks.id', 'surat_masuks.alamat_pengirim', 'surat_masuks.tanggal_surat', 'surat_masuks.nomor_surat', 'surat_masuks.created_by', 'surat_masuks.perihal', 'surat_masuks.file')
            ->where('surat_masuks.id', $surat_masuk->id)->first(),
            'file_extension' => $file_extension,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_masuk $surat_masuk)
    {
        return view('dashboard.surat-masuk.edit', [
            "halaman" => "Edit Surat Masuk",
            "title" => "Edit Surat",
            "tab_title" => "Edit Surat Masuk",
            'surat_masuk' => $surat_masuk,
            "categories" => kode_surat_masuk::orderBy('kode')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_masuk $surat_masuk)
    {
        $rules = [
            'kode_surat_masuk' => ['required', 'numeric', 'digits_between:1,2'], // Angka dengan panjang maksimum 2 digit
            'alamat_pengirim' => ['required', 'string'], // Teks
            'tanggal_surat' => ['required', 'date'], // Tanggal
            'perihal' => ['required', 'string'], // Teks
        ];

        // Jika nomor surat yang baru berbeda dengan nomor surat yang lama, tambahkan aturan validasi unik
        if ($request->nomor_surat != $surat_masuk->nomor_surat) {
            $rules['nomor_surat'] = ['required', 'string', 'unique:surat_masuks,nomor_surat'];
        }

        // Validasi data
        $validateData = $request->validate($rules);

        // Setelah validasi, tambahkan 'created_by' ke dalam data
        $validateData['created_by'] = auth()->user()->name;

        // Jika ada file yang diunggah, validasi foto
        if($request->file('file')) {
            $rules['file'] = ['sometimes', 'file', 'mimes:pdf', 'max:5120'];
        }

        // Jika validasi berhasil dan ada file baru yang diunggah, hapus foto lama
        if ($request->file('file') && $surat_masuk->file) {
            Storage::delete($surat_masuk->file);
        }

        // Jika ada file yang diunggah, simpan file baru
        if($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('surat-masuk-files');
        }

        // Update data surat_masuk
        $surat_masuk->update($validateData);

        return redirect('/surat-masuk/')->with('message', 'Data Berhasil Diupdate!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_masuk  $surat_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_masuk $surat_masuk)
    {
        if ($surat_masuk->file) {
            Storage::delete($surat_masuk->file);
        }
        surat_masuk::destroy($surat_masuk->id);
        return redirect('/surat-masuk/')->with('message', 'Data Berhasil Dihapus!');
    }
}
