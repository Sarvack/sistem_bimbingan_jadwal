<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

class loginUserController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        if (Auth::guard('cekTipe')->user()->tipe == 'Admin Prodi') {
            return ('/admin/dashboard');
        } elseif (Auth::guard('cekTipe')->user()->tipe == 'Dosen') {
            return ('/dosen/dashboard');
        } elseif (Auth::guard('cekTipe')->user()->tipe == 'Mahasiswa') {
            return ('/mahasiswa/dashboard');
        }
        return '/home';
    }

    public function adminLoginForm()
    {
        return view('fronts.adminLogin');
    }

    public function dosenLoginForm()
    {
        return view('fronts.dosenLogin');
    }

    public function mahasiswaLoginForm()
    {
        return view('fronts.mahasiswaLogin');
    }

    public function adminLogin(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('cekTipe')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::put('nama', $request->nama);
            Session::put('email', $request->email);
            Session::put('multiuser',TRUE);
            return redirect()->intended($this->redirectPath());
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function dosenLogin(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('cekTipe')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::put('dosenuser',TRUE);
            return redirect()->intended('/dosen/dashboard');
          }

          return back()->withInput($request->only('email', 'remember'));
    }

    public function mahasiswaLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

	    if (Auth::guard('cekTipe')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::put('mahasiswauser',TRUE);
	        return redirect()->intended('/mahasiswa/dashboard');
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

	public function logout()
  	{
        if (Auth::guard('cekTipe')->check()) {
            Session::flush();
            Auth::guard('cekTipe')->logout();
        }

        return redirect('/front');
 	}


}
