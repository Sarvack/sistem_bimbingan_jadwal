<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Users;
use Auth;

class DashboardController extends Controller
{
    public function index(Users $user)
    {
        return view('admins.dashboard.index', compact('user'));
    }

    public function edit($id)
    {
        $this->data['admin'] = Admin::where('id', '=', Auth::guard('cekTipe')->user()->profil_id)->first();

        return view('admins.datadiri.index', $this->data);
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
    	return redirect('/admin/profile')->with('alert','Data Admin Di perbaharui.');
    }

}
