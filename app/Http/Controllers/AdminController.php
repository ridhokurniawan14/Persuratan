<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Nette\Utils\Strings;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            "halaman" => "Data Admin",
            "title" => "Admin",
            "tab_title" => "Data Admin"
        ]);
    }
    public function gantipassword()
    {
        return view('gantipassword', [
            "halaman" => "Ganti Password Admin",
            "title" => "Admin",
            "tab_title" => "Ganti Password"
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required','min:6'],
            'foto'      => ['required'],
            'kategori'  => ['required','integer']
        ]);

        dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
    }
}
