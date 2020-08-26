<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\z_Dosen; //ini punya
use App\z_Users;
use Illuminate\Support\Facades\DB;

class HalamanController extends Controller
{
    function datadosen()
    {
    	// $this->data['dosen'] = z_Dosen::all();
    	$this->data['users'] = z_Users::all();

    	// $dosendata = z_Dosen::all();
    	return view('dosen.daftardosen', $this->data);
    }

    function editdosen($id)
    {
    	$this->data['edit'] = z_Users::where('profil_id', '=', $id)->first();

    	return view('dosen.editdosen', $this->data);
    }

    function posteditdosen($id, Request $request)
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

    	$data = z_Users::where('profil_id', '=', $id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
    	

        $data1 = z_Dosen::where('id', '=', $id)->first();
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
    	return redirect('dosen/semua')->with('alert','Data Dosen siperbaharui.');
    }

    function hapusdosen($id)
    {
    	$data = z_Users::where('profil_id', '=', $id)->first();
    	$data->delete();

    	$data1 = z_Dosen::where('id', '=', $id)->first();
    	$data1->delete();

    	return redirect('dosen/semua');
    }
}
