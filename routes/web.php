<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriKodeController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\KodeSuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/',[LoginController::class, 'index']); 

Route::get('/admin/',[AdminController::class, 'index']); 
Route::post('/admin/',[AdminController::class, 'store']); 


Route::get('/dashboard/',[DashboardController::class, 'index']); 

Route::get('/kategori-kode/',[KategoriKodeController::class, 'index']); 

Route::get('/kode-surat/',[KodeSuratController::class, 'index']); 

Route::get('/kode-surat-masuk/',[KodeSuratMasukController::class, 'index']); 

Route::get('/surat-masuk/',[SuratMasukController::class, 'index']); 

Route::get('/surat-keluar/',[SuratKeluarController::class, 'index']);

Route::get('/ganti-password/',[AdminController::class, 'gantipassword']); 


// Route::get('/data-surat-masuk/',[SuratMasukController::class, 'index']);

Route::get('/data-surat-masuk', function () {
    return view('surat-masuk.data-surat-masuk', [
        "halaman" => "Data Surat Keluar",
        "title" => "Data Surat",
        "tab_title" => "Data Surat Masuk"
    ]);
});

Route::get('/data-surat-keluar', function () {
    return view('surat-keluar.data-surat-keluar', [
        "halaman" => "Data Surat Keluar",
        "title" => "Data Surat",
        "tab_title" => "Data Surat Keluar"
    ]);
});