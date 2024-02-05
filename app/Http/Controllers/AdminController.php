<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Nette\Utils\Strings;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            "halaman" => "Data Admin",
            "title" => "Admin",
            "tab_title" => "Data Admin",
            "datas" => user::all()
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
        $validateData = $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email:dns', 'unique:users'],
            'password'  => ['required','min:6','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            // 'foto'      => ['required','file', 'max:5000', 'mimes:jpg,png'],
            'foto'      => ['required'],
            'kategori'  => ['required','integer']
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);
        
        User::create($validateData);

        // $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login!');

        // dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
        return redirect('/admin')->with('success', 'Data Berhasil Disimpan!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        user::destroy($user->email);
        // $user->delete();
        return redirect('/admin')->with('success', 'Data Berhasil Dihapus!');

        dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
    }
}
