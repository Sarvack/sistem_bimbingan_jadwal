<?php

namespace App\Http\Middleware;
use Auth;
use Session;

use Closure;

class cekuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next,...$roles)
    // {
    //     // if(in_array($request->user()->tipe,$roles)) {
    //     //      return $next($request);
    //     // }

    // if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
    //     return redirect('/login/admin');

    // $user = Auth::user();

    //     if($user->tipe == 'Admin Prodi'){
    //         return $next($request);

    //     if($user->isDosen())
    //         return $next($request);

    //     if($user->isMahasiswa())
    //         return $next($request);

    //     foreach($roles as $role) {
    //         if($user->hasRole($role))
    //             return $next($request);
    //     }

    //     return redirect('/login/admin');
    // }

    public function handle($request, Closure $next)
    {
        if(!Session::has('multiuser')){
            return redirect()->action('Auth\loginUserController@adminLogin')->with('flash_message_error', 'Please Login');
        }
        return $next($request);
    }
}
