<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dosen;
use App\Users;
use Auth;

class DataDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Users $user)
    {
        return view('dosens.dashboard', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['dosen'] = Dosen::where('id', '=', Auth::guard('cekTipe')->user()->profil_id)->first();

        return view('dosens.datadiri.index', $this->data);
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
            'nip' => 'min:3|unique:z_dosen,nip,'.$id.',id',
            'nidn' => 'min:3|unique:z_dosen,nidn,'.$id.',id',
            'email' => 'required|min:4|email|unique:z_users,email,'.$id.',profil_id',
            'password' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

    	$data = Users::where('profil_id', '=', $id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();


        $data1 = Dosen::where('id', '=', $id)->first();
        $data1->nama = $request->nama;
        $data1->nip = $request->nip;
        $data1->nidn = $request->nidn;
        $data1->alamat = $request->alamat;
        $data1->no_telp = $request->no_telp;
        if (empty($request->file('foto'))){
            $data1->foto = $data1->foto;
        }
        else{
            unlink('picture/foto-register/'.$data1->foto); //menghapus file lama
            $file = $request->file('foto');
	        $nama_file = "dosen".date('Y-m-d')."_".$file->getClientOriginalName();
	        $tujuan_upload = 'picture/foto-register';
	        $file->move($tujuan_upload,$nama_file);
	        $data1->foto = $nama_file;
        }
        $data1->save();
    	return redirect('/dosen/dashboard')->with('alert','Data Dosen diperbaharui.');
    }

}
