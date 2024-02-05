<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            "halaman" => "Login"
        ]);
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
             return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username/Password Salah!');
        
        // membuat error sesuai keinginan kalimatnya
        // return back()->withErrors([
        //     'email' => 'Email Salah',
        // ])->onlyInput('email');

        // dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}