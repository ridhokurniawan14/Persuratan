<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriKodeController extends Controller
{
    public function index()
    {
        return view('surat-keluar.kategori-kode', [
            "halaman" => "Data Master",
            "title" => "Surat Keluar",
            "tab_title" => "Kategori Kode"
        ]);
    }
}
