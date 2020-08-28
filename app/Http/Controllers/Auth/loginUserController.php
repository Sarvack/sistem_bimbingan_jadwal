<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class loginUserController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = '/front';

    public function redirectTo()
    {
        if (Auth::guard('pengguna')->user()->tipe == 'Admin Prodi') {
            return '/admin';
        } elseif (Auth::guard('pengguna')->user()->tipe == 'Dosen') {
            return '/dosen';
        } elseif (Auth::guard('pengguna')->user()->tipe == 'Mahasiswa'){
            return '/mahasiswa';
        }

        // if (Auth::user()->role == 'guru') { // Role Guru
        //     return view('guru.dahsboard');
        // } elseif (Auth::user()->role == 'murid') { // Role Murid
        //     return view('murid.dahsboard');
        // } elseif (Auth::user()->role == 'admin') { // Role Admin
        //     return view('admin.dahsboard');
        // }
    }

    // public function __construct()
    // {
    //         $this->middleware('guest')->except('logout');
    //         $this->middleware('guest:pengguna')->except('logout');
    // }

    public function showLoginForm()
    {
        return view('fronts.login');
    }

    public function UserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

	    if (Auth::guard('pengguna')->attempt(['email' => $request->email, 'password' => $request->password])) {
	      return redirect()->intended($this->redirectPath());
	    } 

        return back()->withInput($request->only('email', 'remember'));
    }

    public function redirectPath()
	{
		if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
 
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/front';
    }
 //    // Logic that determines where to send the user
 //    if (\Auth::guard('pengguna')->user()->tipe == 'Admin Prodi') {
 //        return '/admin';
 //    } elseif (\Auth::guard('pengguna')->user()->tipe == 'Dosen') {
 //    	return '/dosen';
 //    } else {
 //    	return '/mahasiswa';
 //    }

 //    return '/dashboard';
	// }

	public function logout()
  	{
    if (Auth::guard('pengguna')->check()) {
      Auth::guard('pengguna')->logout();
    } 

    return redirect('/front');

 	}


}
