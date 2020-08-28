<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('pengguna')->check()) {
            return redirect($this->redirectTo());
        }
            
        return $next($request);
    }

    public function redirectTo()
    {
        if (Auth::guard('pengguna')->user()->tipe == 'Admin Prodi') {
            return '/admin';
        } elseif (Auth::guard('pengguna')->user()->tipe == 'Dosen') {
            return '/dosen';
        } elseif (Auth::guard('pengguna')->user()->tipe == 'Mahasiswa'){
            return '/mahasiswa';
        }
    }

}
