<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna memiliki peran 'superadmin'
        if ($request->user()->is_superadmin != 1) {
            // Jika pengguna bukan 'superadmin', kembalikan respons yang sesuai
            abort(403, 'Unauthorized action.');
        }

        // Jika pengguna adalah 'superadmin', lanjutkan ke rute yang diminta
        return $next($request);
    }
}
