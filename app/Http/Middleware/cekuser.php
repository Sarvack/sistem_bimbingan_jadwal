<?php

namespace App\Http\Middleware;

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
    public function handle($request, Closure $next,...$roles)
    {
        if(in_array($request->user()->tipe,$roles)) {
             return $next($request);
        }

        return redirect('/');
    }
}
