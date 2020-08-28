<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen; //add
use App\Users; //add
use Illuminate\Support\Facades\DB; //add

class RegisterController extends Controller
{
    public function register()
    {
        return view('dosens.register.index');
    }

    function registrasiDosen(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'nip' => 'min:3|unique:z_dosen',
            'nidn' => 'min:3|unique:z_dosen',
            'email' => 'required|min:4|email|unique:z_users',
            'password' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tipe' => 'required',
            'profil_id' => 'required',
            'id_user' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        $file = $request->file('foto');
 
        $nama_file = "dosen".date('Y-m-d')."_".$file->getClientOriginalName();
 
        
        $tujuan_upload = 'picture/foto-register';
        $file->move($tujuan_upload,$nama_file);

        //save ke tabel Dosen
        $data =  new Dosen();
        $data->id = $request->profil_id;
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->nidn = $request->nidn;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->foto = $nama_file;
        $data->save();

        //save ke table user
        $data =  new Users();
        $data->id = $request->id_user;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tipe = $request->tipe;
        $data->profil_id = $request->profil_id;
        $data->save();

        return redirect('/custom/login')->with('alert','Akun selesai. Silahkan Login');
    }
}
