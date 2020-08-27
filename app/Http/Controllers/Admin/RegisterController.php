<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Users;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admins.register.index');
    }

    function registrasiAdmin(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'jabatan' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('foto');

        $nama_file = "admin".date('Y-m-d')."_".$file->getClientOriginalName();

        $tujuan_upload = 'picture/foto-register';
        $file->move($tujuan_upload,$nama_file);

        //save ke tabel Admin
        $data =  new Admin();
        $data->id = $request->profil_id;
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
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
