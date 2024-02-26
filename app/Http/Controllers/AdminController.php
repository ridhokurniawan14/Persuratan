<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Nette\Utils\Strings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $loggedInUser = Auth::user();

        $datas = User::where('id', '!=', $loggedInUser->id)->get();
        
        return view('dashboard.admin.index', [
            "halaman" => "Data Admin",
            "title" => "Admin",
            "tab_title" => "Data Admin",
            "datas" => $datas
        ]);
    }
    public function gantipassword()
    {
        return view('dashboard.admin.gantipassword', [
            "halaman" => "Ganti Password Admin",
            "title" => "Admin",
            "tab_title" => "Ganti Password"
        ]);
    }
    public function store(Request $request)
    {    
        $validateData = $request->validate([
            'name'          => 'required',
            'email'         => ['required', 'email:dns', 'unique:users'],
            'password'      => ['required','min:6','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            'foto'          => ['mimes:jpeg,png', 'max:2048'], // max:2048 artinya maksimum 2MB (2048 KB)
            'is_superadmin' => ['required','numeric']
        ]);

        if($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('admin-images');
        }

        $validateData['password'] = Hash::make($validateData['password']);
        
        User::create($validateData);
        
        // Catat aktivitas dalam log
        ActivityLogger::logActivity('create', 'Admin dengan nama '.ucwords($request->name), $request->file('foto'));

        // dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
        return redirect('/admin')->with('message', 'Data Berhasil Disimpan!');
    }
    public function edit($id)
    {
        $loggedInUser = Auth::user();
        $datas = User::where('id', '!=', $loggedInUser->id)->get();

        $user = user::find($id);
        return view('dashboard.admin.edit', [
            "user" => $user,
            "halaman" => "Data Admin",
            "title" => "Admin",
            "tab_title" => "Data Admin",
            "datas" => $datas
        ]);
    }
    public function update(Request $request, user $user, $id)
    {
        $rules = [
            'name'          => 'required',
            'password'      => ['required','min:6','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/'],
            'is_superadmin' => ['required','numeric']
        ];

        // Periksa apakah ada perubahan alamat email
        if($request->email != $user->email) {
            $rules['email'] = ['required', 'email:dns'];
        }
        
        // Jika ada file yang diunggah, validasi foto
        if($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $rules['foto'] = ['mimes:jpeg,png', 'max:2048']; // Tambahkan validasi untuk foto
        }

        // Lakukan validasi
        $validateData = $request->validate($rules);
        
        // Jika ada file yang diunggah, simpan foto
        if($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('admin-images');
        }

        // Hash password
        $validateData['password'] = Hash::make($validateData['password']);
        
        // Update data user
        user::where('id', $id)->update($validateData);

        // Catat aktivitas dalam log
        ActivityLogger::logActivity('update', 'Admin dengan nama '.ucwords($request->name), $request->file('foto'));
        
        return redirect('/admin')->with('message', 'Data Berhasil Diupdate!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user, $id)
    {
        $data = user::find($id);

        if ($data->foto) {
            Storage::delete($data->foto);
        }


        if($data)
        {
            $data->delete();
        }
        // Catat aktivitas dalam log
        ActivityLogger::logActivity('delete', 'Admin dengan nama '.ucwords($data->name), '');
        
        return redirect('/admin')->with('message', 'Data Berhasil Dihapus!');
        // dd('Registrasi Berhasil'); //Cara cek berhasil atau tidaknya
    }
    public function updatepassword(Request $request, user $user)
    {
        $rules = [
            'oldpassword' => ['required', 'min:6'],
            'newpassword' => ['required', 'min:6', 'different:oldpassword'],
            'verpassword' => ['required', 'same:newpassword'],
        ];
        
        // Lakukan validasi
        $validateData = $request->validate($rules);
        
        // Periksa apakah password lama cocok dengan password pengguna
        if (!Hash::check($validateData['oldpassword'], auth()->user()->password)) {
            return back()->withErrors(['oldpassword' => 'Password lama tidak cocok!!'])->withInput();
        }
        
        // Hash password baru
        $hashedPassword = Hash::make($validateData['newpassword']);
        
        // Update password pengguna
        auth()->user()->update(['password' => $hashedPassword]);
        
        return redirect('/ganti-password')->with('message', 'Password berhasil diperbarui!');        
    }
}