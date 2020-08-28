<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleware
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->auth = 
            auth()->user() ?
                (auth()->user()->tipe === 'Admin Prodi')
                : false;

        $this->auth = 
            auth()->user() ?
                (auth()->user()->tipe === 'Dosen')
                : false;

        $this->auth = 
            auth()->user() ?
                (auth()->user()->tipe === 'Mahasiswa')
                : false;

        if($this->auth === true)
            return $next($request);

        return redirect()->route('/login/pengguna')->with('error', 'Access denied. Login to continue');
    }
}
