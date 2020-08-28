<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    {
      if($request->expectsJson()){
        return response()->json(['error' => 'Unauthenticated.'], 401);
      }

        if (Auth::guard('pengguna')->user()->tipe == 'Admin Prodi') {
            return '/admin';
        } elseif (Auth::guard('pengguna')->user()->tipe == 'Dosen') {
            return '/dosen';
        } elseif (Auth::guard('pengguna')->user()->tipe == 'Mahasiswa'){
            return '/mahasiswa';
        }

      return redirect('/login/pengguna');
    }

     // if ($request->expectsJson()) {
     //            return response()->json(['error' => 'Unauthenticated.'], 401);
     //        }
     //        if ($request->is('admin') || $request->is('admin/*')) {
     //            return redirect()->guest('/login/admin');
     //        }
     //        if ($request->is('writer') || $request->is('writer/*')) {
     //            return redirect()->guest('/login/writer');
     //        }
     //        return redirect()->guest(route('login'));
}
