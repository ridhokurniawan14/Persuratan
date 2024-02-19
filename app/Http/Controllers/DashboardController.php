<?php

namespace App\Http\Controllers;

// use App\Models\surat_keluars;
// use App\Models\kode_surat_keluars;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan data surat keluar dari database
        $data = DB::table('surat_keluars')
            ->join('kode_surat_keluars', 'kode_surat_keluars.id', '=', 'surat_keluars.kode_surat_keluar')
            ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
            ->select('surat_keluars.id', 'surat_keluars.no_surat', 'surat_keluars.sekolah', 'surat_keluars.kode_kab', 'surat_keluars.tujuan', 'surat_keluars.tanggal_surat', 'surat_keluars.perihal', 'surat_keluars.created_by', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_surat_keluars.ket')
            ->latest('surat_keluars.created_at') // Mengurutkan berdasarkan waktu pembuatan secara descending
            ->first(); // Mengambil satu data teratas

        // Mendapatkan banyak data surat keluar dari database
        $count_suratkeluar = DB::table('surat_keluars')
            ->join('kode_surat_keluars', 'kode_surat_keluars.id', '=', 'surat_keluars.kode_surat_keluar')
            ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
            ->select('surat_keluars.id', 'surat_keluars.no_surat', 'surat_keluars.sekolah', 'surat_keluars.kode_kab', 'surat_keluars.tujuan', 'surat_keluars.tanggal_surat', 'surat_keluars.perihal', 'surat_keluars.created_by', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_surat_keluars.ket')
            ->whereYear('surat_keluars.tanggal_surat', '=', 2024) // Memilih hanya tahun 2024
            ->count();        

        // Mendapatkan banyak data surat masuk dari database
        $count_suratmasuk = DB::table('kode_surat_masuks')
            ->join('surat_masuks', 'kode_surat_masuks.id', '=', 'surat_masuks.kode_surat_masuk')
            ->select('kode_surat_masuks.kode', 'surat_masuks.id', 'surat_masuks.alamat_pengirim', 'surat_masuks.tanggal_surat', 'surat_masuks.nomor_surat')
            ->whereYear('surat_masuks.tanggal_surat', '=', 2024) // Memilih hanya tahun 2024
            ->count();
                
        // Mendapatkan 5 data surat keluar terbaru dari database
        $count5keluar = DB::table('surat_keluars')
            ->join('kode_surat_keluars', 'kode_surat_keluars.id', '=', 'surat_keluars.kode_surat_keluar')
            ->join('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
            ->select('surat_keluars.id', 'surat_keluars.no_surat', 'surat_keluars.sekolah', 'surat_keluars.kode_kab', 'surat_keluars.tujuan', 'surat_keluars.tanggal_surat', 'surat_keluars.perihal', 'surat_keluars.file', 'surat_keluars.created_by', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_surat_keluars.ket')
            ->latest('surat_keluars.created_at') // Mengurutkan berdasarkan waktu pembuatan secara descending
            ->take(5) // Mengambil lima data teratas
            ->get(); // Mengambil data sebagai kumpulan
        
        $count5masuk = DB::table('kode_surat_masuks')
            ->join('surat_masuks', 'kode_surat_masuks.id', '=', 'surat_masuks.kode_surat_masuk')
            ->select('kode_surat_masuks.kode', 'surat_masuks.id', 'surat_masuks.alamat_pengirim', 'surat_masuks.tanggal_surat', 'surat_masuks.nomor_surat', 'surat_masuks.perihal', 'surat_masuks.file')
            ->latest('surat_masuks.created_at') // Mengurutkan berdasarkan waktu pembuatan secara descending
            ->take(5) // Mengambil lima data teratas
            ->get(); // Mengambil data sebagai kumpulan

        $keluarTanpaFilesuratkeluar = DB::table('surat_keluars')
            ->leftJoin('kode_surat_keluars', 'kode_surat_keluars.id', '=', 'surat_keluars.kode_surat_keluar')
            ->leftJoin('kode_yplps', 'kode_surat_keluars.kode_surat_yplp', '=', 'kode_yplps.id')
            ->select('surat_keluars.id', 'surat_keluars.no_surat', 'surat_keluars.sekolah', 'surat_keluars.kode_kab', 'surat_keluars.tujuan', 'surat_keluars.tanggal_surat', 'surat_keluars.perihal', 'surat_keluars.file', 'surat_keluars.created_by', 'kode_yplps.kode', 'kode_surat_keluars.nomor', 'kode_surat_keluars.ket')
            ->whereNull('surat_keluars.file') // Memastikan file null
            ->get(); // Mengambil semua data

        $masukTanpaFilesuratmasuk = DB::table('kode_surat_masuks')
            ->join('surat_masuks', 'kode_surat_masuks.id', '=', 'surat_masuks.kode_surat_masuk')
            ->select('kode_surat_masuks.kode', 'surat_masuks.id', 'surat_masuks.alamat_pengirim', 'surat_masuks.tanggal_surat', 'surat_masuks.nomor_surat')
            ->whereNull('surat_masuks.file') // Memastikan file null
            ->get(); // Mengambil semua data

        if ($data) {
            // Lakukan operasi jika $data tidak null
            $tanggal_surat = Carbon::createFromFormat('Y-m-d', $data->tanggal_surat);
            $data->bulan_surat = $tanggal_surat->format('F'); // Nama bulan
            $data->tahun_surat = $tanggal_surat->format('Y');
        
            // Konversi bulan menjadi angka Romawi
            $bulan_romawi = $this->bulanKeRomawi($tanggal_surat->month);
            $data->bulan_surat_romawi = $bulan_romawi;
        }

        return view('dashboard.index', [
            "halaman" => "Dashboard",
            "title" => "Dashboard",
            "tab_title" => "Dashboard",
            "data" => $data ?? null,
            "total_suratkeluar" => $count_suratkeluar ?? null,
            "total_suratmasuk" => $count_suratmasuk ?? null,
            "count5keluar" => $count5keluar ?? null,
            "count5masuk" => $count5masuk ?? null,
            "file_extensionsuratkeluar" => $file_extension2 ?? null,
            "file_extension" => $file_extension ?? null,
            "keluarTanpaFilesuratkeluar" => $keluarTanpaFilesuratkeluar ?? null,
            "masukTanpaFilesuratmasuk" => $masukTanpaFilesuratmasuk ?? null,
            "pemberitahuan" => $pemberitahuan ?? null,
        ]);
    }
    // Fungsi untuk mengonversi bulan menjadi angka Romawi
    private function bulanKeRomawi($bulan)
    {
        $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        return $romawi[$bulan];
    }
}
