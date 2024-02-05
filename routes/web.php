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

Route::get('/login/',[LoginController::class, 'index'])->name('login')->middleware('guest'); 
Route::post('/login/',[LoginController::class, 'authenticate']); 
Route::post('/logout/',[LoginController::class, 'logout']); 

// Route::get('/admin/',[AdminController::class, 'index'])->middleware('auth'); 
// Route::post('/admin/',[AdminController::class, 'store']); 
Route::resource('/admin/', AdminController::class)->middleware('auth');



// Route::get('/dashboard/',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/',function() {
    return view('dashboard.index', [
        "halaman" => "Dashboard",
        "title" => "Dashboard",
        "tab_title" => "Dashboard"
    ]);
})->middleware('auth');

Route::resource('/data-master/kategori-kode', KategoriKodeController::class)->middleware('auth');
Route::resource('/data-master/kode-surat', KodeSuratController::class)->middleware('auth');
Route::delete('/data-master/kode-surat/{{ kode_surat }}}', [KodeSuratController::class, 'destroy'])->middleware('auth');


// Route::get('/data-master/kode-surat/{kode_yplps:slug}', [KodeSuratController::class, 'show']); //Menampilkan detail data 

Route::get('/data-master/kode-surat-masuk/',[KodeSuratMasukController::class, 'index'])->middleware('auth');

Route::get('/surat-masuk/',[SuratMasukController::class, 'index'])->middleware('auth');

Route::get('/surat-keluar/',[SuratKeluarController::class, 'index'])->middleware('auth');

Route::get('/ganti-password/',[AdminController::class, 'gantipassword'])->middleware('auth');


// Route::get('/data-surat-masuk/',[SuratMasukController::class, 'index']);

Route::get('/data-surat-masuk', function () {
    return view('surat-masuk.data-surat-masuk', [
        "halaman" => "Data Surat Keluar",
        "title" => "Data Surat",
        "tab_title" => "Data Surat Masuk"
    ]);
})->middleware('auth');

Route::get('/data-surat-keluar', function () {
    return view('surat-keluar.data-surat-keluar', [
        "halaman" => "Data Surat Keluar",
        "title" => "Data Surat",
        "tab_title" => "Data Surat Keluar"
    ]);
})->middleware('auth');