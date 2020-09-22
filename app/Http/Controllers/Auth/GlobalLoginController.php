<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use DB;
use Redirect;

class GlobalLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function loginform()
    {
        return view('fronts.globalLogin');
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = Users::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password) && $data->tipe == 'Admin Prodi'){
                Session::put('nama',$data->id);
                Session::put('email',$data->email);
                Session::put('admin',TRUE);
                return redirect('/admin/dashboard');
            }
            if(Hash::check($password,$data->password) && $data->tipe == 'Dosen'){
                Session::put('nama',$data->id);
                Session::put('email',$data->email);
                Session::put('dosen',TRUE);
                return redirect('/dosen/dashboard');
            }
            if(Hash::check($password,$data->password) && $data->tipe == 'Mahasiswa'){
                Session::put('nama',$data->id);
                Session::put('email',$data->email);
                Session::put('mahasiswa',TRUE);
                return redirect('/mahasiswa/dashboard');
            }
            else{
                return redirect('/front')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/front')->with('alert','Password atau Email, Salah!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
