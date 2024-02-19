<?php

namespace App\Http\Controllers;

use App\Models\surat_keluars;
use App\Models\kode_surat_keluars;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan data surat keluar dari database
        $datas = DB::table('surat_keluars')
            ->join('kode_surat_keluars', 'kode_surat_keluars.id', '=', 'surat_keluars.kode_surat_keluar')
            ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
            ->select('surat_keluars.id', 'surat_keluars.no_surat', 'surat_keluars.sekolah', 'surat_keluars.kode_kab', 'surat_keluars.tujuan', 'surat_keluars.tanggal_surat', 'surat_keluars.perihal', 'surat_keluars.created_by', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_surat_keluars.ket', 'surat_keluars.created_by')
            ->orderBy('surat_keluars.no_surat')
            ->get();

        // Mengonversi dan memformat tanggal surat serta mendapatkan tahun dan bulan dalam format yang diinginkan
        foreach ($datas as $data) {
            $tanggal_surat = Carbon::createFromFormat('Y-m-d', $data->tanggal_surat);
            $data->bulan_surat = $tanggal_surat->format('F'); // Nama bulan
            $data->tahun_surat = $tanggal_surat->format('Y');

            // Konversi bulan menjadi angka Romawi
            $bulan_romawi = $this->bulanKeRomawi($tanggal_surat->month);
            $data->bulan_surat_romawi = $bulan_romawi;
        }

        // Mengirim data ke view
        return view('dashboard.surat-keluar.index', [
            "halaman" => "Data Surat Keluar",
            "title" => "Data Surat",
            "tab_title" => "Data Surat Keluar",
            "datas" => $datas,
        ]);
    }

    // Fungsi untuk mengonversi bulan menjadi angka Romawi
    private function bulanKeRomawi($bulan)
    {
        $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        return $romawi[$bulan];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('kode_surat_keluars')
                    ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
                    ->select('kode_surat_keluars.id', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_yplps.ket', 'kode_surat_keluars.ket as ket_panjang')
                    ->orderBy('kode_surat_keluars.id')
                    ->get();

        // Memformat nama kategori
        foreach ($categories as $category) {
            $categoryName = ucwords($category->ket_panjang);
            $words = str_word_count($categoryName, 1);
            if (count($words) > 2) {
                $category->shortName = implode(' ', array_slice($words, 0, 2)) . '...';
            } else {
                $category->shortName = $categoryName;
            }
        }

        return view('dashboard.surat-keluar.create', [
            "halaman" => "Input Surat Keluar",
            "title" => "Input Surat",
            "tab_title" => "Surat Keluar",
            "categories" => $categories,
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
        // Validasi input pertama
        $validateData = $request->validate([
            'no_surat' => ['required', 'numeric'], // Angka dengan panjang maksimum 2 digit
            'kode_surat_keluar' => ['required', 'numeric', 'digits_between:1,2'], // Angka dengan panjang maksimum 2 digit
            'tujuan' => ['required', 'string'], // Teks
            'sekolah' => 'smk', // default
            'kode_kab' => '26', // default
            'tanggal_surat' => ['required', 'date'], // Tanggal
            'perihal' => ['required', 'string'], // Teks
            'file' => ['nullable', 'sometimes', 'image', 'mimes:jpeg,png', 'max:5120'], // Gambar JPEG atau PNG dengan ukuran maksimal 5 MB (5120 KB)
        ]);

        // Setelah validasi, tambahkan 'created_by' ke dalam data
        $validateData['created_by'] = auth()->user()->name;

        // Validasi tambahan untuk nomor surat dan tahun
        $nomorSurat = $validateData['no_surat'];
        $tahunSurat = date('Y', strtotime($validateData['tanggal_surat']));

        $existingSurat = surat_keluars::where('no_surat', $nomorSurat)
            ->whereYear('tanggal_surat', $tahunSurat)
            ->exists();

        if ($existingSurat) {
            return redirect()->back()->withErrors(['error' => 'Nomor surat sudah ada di database.'])->withInput();
        }

        // Proses penyimpanan jika tidak ada error validasi
        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('surat-keluar-images');
        }

        surat_keluars::create($validateData);

        return redirect('/surat-keluar/')->with('message', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\surat_keluars  $surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function show(surat_keluars $surat_keluar)
    {
        // Mendapatkan data surat keluar dari database
        $datas = DB::table('surat_keluars')
            ->join('kode_surat_keluars', 'kode_surat_keluars.id', '=', 'surat_keluars.kode_surat_keluar')
            ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
            ->select('surat_keluars.id', 'surat_keluars.file', 'surat_keluars.no_surat', 'kode_yplps.ket AS ket_yplp', 'surat_keluars.sekolah', 'surat_keluars.kode_kab', 'surat_keluars.tujuan', 'surat_keluars.tanggal_surat', 'surat_keluars.perihal', 'surat_keluars.created_by', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_surat_keluars.ket', 'surat_keluars.created_by')
            ->where('surat_keluars.id', $surat_keluar->id)            
            ->first();      

        // Memeriksa apakah $datas tidak null sebelum melakukan operasi lanjutan
        if ($datas) {
            $tanggal_surat = Carbon::createFromFormat('Y-m-d', $datas->tanggal_surat);
            $datas->bulan_surat = $tanggal_surat->format('F'); // Nama bulan
            $datas->tahun_surat = $tanggal_surat->format('Y');

            // Konversi bulan menjadi angka Romawi
            $bulan_romawi = $this->bulanKeRomawi($tanggal_surat->month);
            $datas->bulan_surat_romawi = $bulan_romawi;

            // Mendapatkan ekstensi file
            $file_extension = pathinfo($datas->file, PATHINFO_EXTENSION);
        } else {
            // Jika $datas bernilai null, mungkin handle dengan menampilkan pesan atau mengarahkan ke halaman lain
            abort(404); // Contoh: Menampilkan halaman error 404
        }
        
        return view('dashboard.surat-keluar.show', [
            "halaman" => "Detail Surat Keluar",
            "title" => "Detail Surat",
            "tab_title" => "Surat Keluar",
            "datas" => $datas,
            "file_extension" => $file_extension,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\surat_keluars  $surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function edit(surat_keluars $surat_keluar)
    {
        $categories = DB::table('kode_surat_keluars')
                    ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
                    ->select('kode_surat_keluars.id', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_yplps.ket', 'kode_surat_keluars.ket as ket_panjang')
                    ->orderBy('kode_surat_keluars.id')
                    ->get();

        // Memformat nama kategori
        foreach ($categories as $category) {
            $categoryName = ucwords($category->ket_panjang);
            $words = str_word_count($categoryName, 1);
            if (count($words) > 2) {
                $category->shortName = implode(' ', array_slice($words, 0, 2)) . '...';
            } else {
                $category->shortName = $categoryName;
            }
        }

        return view('dashboard.surat-keluar.edit', [
            "halaman" => "Edit Surat Keluar",
            "title" => "Edit Surat",
            "tab_title" => "Surat Keluar",
            "surat_keluar" => $surat_keluar,
            "categories" => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\surat_keluars  $surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat_keluars $surat_keluar)
    {
       // Validasi data
        $rules = [
            'no_surat' => ['required', 'numeric'], // Angka dengan panjang maksimum 2 digit
            'kode_surat_keluar' => ['required', 'numeric', 'digits_between:1,2'], // Angka dengan panjang maksimum 2 digit
            'tujuan' => ['required', 'string'], // Teks
            'tanggal_surat' => ['required', 'date'], // Tanggal
            'perihal' => ['required', 'string'], // Teks
        ];

        $validateData = $request->validate($rules);

        // Validasi tambahan untuk nomor surat dan tahun
        $nomorSurat = $validateData['no_surat'];
        $tahunSurat = date('Y', strtotime($validateData['tanggal_surat']));

        $existingSurat = surat_keluars::where('no_surat', $nomorSurat)
            ->whereYear('tanggal_surat', $tahunSurat)
            ->where('id', '!=', $surat_keluar->id) // Exclude current record
            ->exists();

        if ($existingSurat) {
            return redirect()->back()->withErrors(['error' => 'Nomor surat sudah ada di database.'])->withInput();
        }

        // Setelah validasi, tambahkan 'created_by' ke dalam data
        $validateData['created_by'] = auth()->user()->name;

        // Jika ada file yang diunggah, validasi foto
        if ($request->file('file')) {
            $rules['file'] = ['nullable', 'sometimes', 'image', 'mimes:jpeg,png', 'max:5120']; // Gambar JPEG atau PNG dengan ukuran maksimal 5 MB (5120 KB)
        }

        // Jika validasi berhasil dan ada file baru yang diunggah, hapus foto lama
        if ($request->file('file') && $request->oldImage) {
            Storage::delete($request->oldImage);
        }

        // Jika ada file yang diunggah, simpan foto baru
        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('surat-keluar-images');
        }

        // Update data surat_keluar
        $surat_keluar->update($validateData);

        return redirect('/surat-keluar/')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\surat_keluars  $surat_keluars
     * @return \Illuminate\Http\Response
     */
    public function destroy(surat_keluars $surat_keluar)
    {
        if ($surat_keluar->file) {
            Storage::delete($surat_keluar->file);
        }
        surat_keluars::destroy($surat_keluar->id);
        return redirect('/surat-keluar/')->with('message', 'Data Berhasil Dihapus!');
    }
}
