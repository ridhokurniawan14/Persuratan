<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\surat_masuk;
use App\Models\surat_keluars;
use Illuminate\Http\Request;

class CheckSuratAvailability
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Periksa apakah ada data surat masuk
        $suratMasukCount = surat_masuk::count();
        
        // Periksa apakah ada data surat keluar
        $suratKeluarCount = surat_keluars::count();

        // Jika tidak ada data surat masuk atau surat keluar, kembalikan response error
        if ($suratMasukCount === 0 && $suratKeluarCount === 0) {
            // return redirect()->route('surat-masuk')->with('error', 'Tidak ada data surat masuk atau surat keluar.');
            return redirect('surat-masuk')->with('info', 'Silahkan masukkan Surat Masuk terlebih dahulu');
        }

        return $next($request);
    }
}
