<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\z_Dosen; //ini punya
use App\z_Users;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    function index()
    {
        return view('dosen.registerform');
    }

    function postregis(Request $request)
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
        $data =  new z_Dosen();
        $data->id = $request->profil_id;
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->nidn = $request->nidn;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->foto = $nama_file;
        $data->save();

        //save ke table user
        $data =  new z_Users();
        $data->id = $request->id_user;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tipe = $request->tipe;
        $data->profil_id = $request->profil_id;
        $data->save();

        return redirect('dosen/register')->with('alert','Akun selesai. Silahkan Login');
    }
}
