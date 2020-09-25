<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        // if ($request->user() && $request->user()->tipe == 'Admin Prodi')
        // {
        //     return $next($request);
        // }

        // return redirect('/login/admin');

    //     if(auth()->guest()){
    //         return redirect('/login/admin');
    //     }

    //     if(!auth()->user()->admin){
    //         return redirect('/login/admin');
    //     }

    //     if(in_array($request->user()->tipe,$roles)) {
    //         return $next($request);
    //    }

    //    return redirect('/');

        // if(!Auth::user()->tipe == 'Admin Prodi')
        // {
        //     return redirect('/login/admin');
        // }

        // return $next($request);

        $admin = Auth::guard('cekTipe')->user();

        if($admin->tipe !== 'Admin Prodi') { // I assume you have a type field.
            // return error here to indicate user is not a master
            return redirect()->action('Auth\loginUserController@adminLogin')->with('flash_message_error', 'Please Login');
        }
        return $next($request);
    }
}
