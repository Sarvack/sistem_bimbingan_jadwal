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

    public function registrasiAdmin(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'jabatan' => 'required',
            'password' => 'required',
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

        return redirect('/admin/crud')->with('alert','Akun selesai. Silahkan Login');
    }

    // public function index(Admin $admins)
    // {
    //     return view('admins.register.show',compact('admins'));
    // }

    public function index()
    {
        $this->data['users'] = Users::all();

        $this->data['admins'] = Admin::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.register.index', $this->data);
    }

    public function show(Admin $admin)
    {
        return view('admins.register.form',compact('admin'));
    }

    public function edit($id)
    {
    	$this->data['admin'] = Users::where('profil_id', '=', $id)->first();

    	return view('admins.register.edit', $this->data);
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required|min:4|email|unique:z_users,email,'.$id.',profil_id',
            'password' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

    	$data = Users::where('profil_id', '=', $id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();


        $data1 = Admin::where('id', '=', $id)->first();
        $data1->nama = $request->nama;
        if (empty($request->file('foto'))){
            $data1->foto = $data1->foto;
        }
        else{
            unlink('picture/foto-register/'.$data1->foto); //menghapus file lama
            $file = $request->file('foto');
	        $nama_file = "admin".date('Y-m-d')."_".$file->getClientOriginalName();
	        $tujuan_upload = 'picture/foto-register';
	        $file->move($tujuan_upload,$nama_file);
	        $data1->foto = $nama_file;
        }
        $data1->save();
    	return redirect('/admin/crud')->with('alert','Data Admin Di perbaharui.');
    }

    public function destroy($id)
    {
    	$data = Users::where('profil_id', '=', $id)->first();
    	$data->delete();

    	$data1 = Admin::where('id', '=', $id)->first();
    	$data1->delete();

    	return redirect('/admin/crud');
    }
}
