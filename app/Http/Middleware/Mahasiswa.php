<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class Mahasiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if ($request->user() && $request->user()->tipe != 'Mahasiswa')
        // {
        //     return $next($request);
        // }
        // return redirect('/login/mahasiswa');

        $admin = Auth::guard('cekTipe')->user();

        if($admin->tipe !== 'Mahasiswa') { // I assume you have a type field.
            // return error here to indicate user is not a master
            return redirect()->action('Auth\loginUserController@adminLogin')->with('flash_message_error', 'Please Login');
        }
        return $next($request);
    }
}
