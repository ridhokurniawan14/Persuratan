<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KodeSuratController;
use App\Http\Controllers\KodeSuratMasukController;
use App\Http\Controllers\KodeSuratKeluarController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\CheckSuratAvailability;
use Spatie\Activitylog\Models\Activity;

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
// HALAMAN AWAL
Route::get('/', function () {
    // return Activity::all();
    return redirect('/login');
});

// HALAMAN LOGIN
Route::get('/login/',[LoginController::class, 'index'])->name('login')->middleware('guest'); 
Route::post('/login/',[LoginController::class, 'authenticate']); 
Route::post('/logout/',[LoginController::class, 'logout']); 

// HALAMAN DASHBOARD
// Route::resource('/dashboard/', DashboardController::class)->middleware(['auth']);
Route::middleware(['auth', 'check.surat'])->resource('/dashboard', DashboardController::class);

// HALAMAN ADMIN
Route::resource('/admin/', AdminController::class)->middleware(['auth', 'superadmin']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('email.destroy')->middleware('superadmin');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->middleware('auth', 'superadmin');
Route::put('/admin/{id}', [AdminController::class, 'update'])->middleware('auth', 'superadmin');

// HALAMAN DATA MASTER
// HALAMAN KODE SURAT
Route::resource('/data-master/kode-surat', KodeSuratController::class)->middleware('auth');
Route::delete('/data-master/kode-surat/{id}', [KodeSuratController::class, 'destroy'])->name('kode_yplps.destroy')->middleware('auth');
Route::get('/data-master/kode-surat/{id}/edit', [KodeSuratController::class, 'edit'])->middleware('auth');
Route::put('/data-master/kode-surat/{id}', [KodeSuratController::class, 'update'])->middleware('auth');

// HALAMAN KATEGORI KODE
Route::resource('/data-master/kategori-kode', KodeSuratKeluarController::class)->middleware('auth');
Route::delete('/data-master/kategori-kode/{id}', [KodeSuratKeluarController::class, 'destroy'])->name('id.destroy')->middleware('auth');
Route::get('/data-master/kategori-kode/{id}/edit', [KodeSuratKeluarController::class, 'edit'])->middleware('auth');
Route::put('/data-master/kategori-kode/{id}', [KodeSuratKeluarController::class, 'update'])->middleware('auth');

// HALAMAN KODE SURAT MASUK
Route::resource('/data-master/kode-surat-masuk', KodeSuratMasukController::class)->middleware('auth');
Route::delete('/data-master/kode-surat-masuk/{kode_surat_masuk}', [KodeSuratMasukController::class, 'destroy'])->middleware('auth');
Route::get('/data-master/kode-surat-masuk/{kode_surat_masuk}/edit', [KodeSuratMasukController::class, 'edit'])->middleware('auth');
Route::put('/data-master/kode-surat-masuk/{kode_surat_masuk}', [KodeSuratMasukController::class, 'update'])->middleware('auth');

// HALAMAN SURAT-MASUK
Route::resource('surat-masuk', SuratMasukController::class)->middleware('auth');

// HALAMAN SURAT KELUAR
Route::resource('surat-keluar', SuratKeluarController::class)->middleware('auth');

// HALAMAN GANTI PASSWORD
Route::get('/ganti-password/',[AdminController::class, 'gantipassword'])->middleware('auth');
Route::put('/ganti-password/{id}', [AdminController::class, 'updatepassword'])->middleware('auth');

// HALAMAN SURAT KELUAR
Route::resource('logs', ActivityLogController::class)->middleware('auth');