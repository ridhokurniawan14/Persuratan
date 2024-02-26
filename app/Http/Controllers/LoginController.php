<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
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
            // Catat aktivitas login
            ActivityLogger::logActivity('login', Auth::user()->name);

            $request->session()->regenerate();
             return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username/Password Salah!');
    }
    public function logout(Request $request)
    {
        // Catat aktivitas logout sebelum logout dilakukan
        ActivityLogger::logActivity('logout', Auth::user()->name);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}