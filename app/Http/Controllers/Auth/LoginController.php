<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm()
    // {
    //     return view('fronts.adminLogin');
    // }

    protected function redirectTo()
    {
        if (Auth::guard()->user()->tipe == 'Admin Prodi') {
            return ('/admin/dashboard');
        } elseif (Auth::guard()->user()->tipe == 'Dosen') {
            return ('/dosen/dashboard');
        } elseif (Auth::guard()->user()->tipe == 'Mahasiswa') {
            return ('/mahasiswa/dashboard');
        }
        return '/home';
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/front';
    }

    public function logout () {
        
        auth()->logout();
        
        return redirect('/front');
    }
}
