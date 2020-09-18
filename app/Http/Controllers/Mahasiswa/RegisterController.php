<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\z_Mahasiswa; //ini punya
use App\z_Users;
use App\pps_Angkatan;
use App\Prodi;
use App\ProdiKonsentrasi;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    function index()
    {
    	$this->data['angkatan'] = pps_Angkatan::all();
    	$this->data['prodi'] = Prodi::all();
    	$this->data['prodik'] = ProdiKonsentrasi::all();

        return view('mahasiswa.registerform', $this->data);
    }

    function postregis(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'nim' => 'min:3|unique:z_mahasiswa',
            'prodi_id' => 'required',
            'konsentrasi_id' => 'required',
            'angkatan_id' => 'required',
            'email' => 'required|min:4|email|unique:z_users',
            'password' => 'required',
            'nik' => 'required|min:3',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_telp_ortu' => 'required',
            'ijazah_terakhir' => 'required',
            'tipe' => 'required',
            'id' => 'required',
            'profil_id' => 'required',
            //file
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'file_ijazah' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048'
        ]);

        //foto
        $file = $request->file('foto');
        $nama_file = "mahasiswa ".date('Y-m-d')."_".$file->getClientOriginalName();
        $tujuan_upload = 'picture/foto-register';
        $file->move($tujuan_upload,$nama_file);

        //ijazah
        $file2 = $request->file('file_ijazah');
        $nama_file2 = "ijazah".date('Y-m-d')."_".$file2->getClientOriginalName();
        $tujuan_upload2 = 'mahasiswa_file/ijazah';
        $file2->move($tujuan_upload2,$nama_file2);


        //save ke tabel Mahasiswa
        $data =  new z_Mahasiswa();
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->prodi_id = $request->prodi_id;
        $data->konsentrasi_id = $request->konsentrasi_id;
        $data->angkatan_id = $request->angkatan_id;
        $data->nik = $request->nik;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->agama = $request->agama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->nama_ayah = $request->nama_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->no_telp_ortu = $request->no_telp_ortu;
        $data->ijazah_terakhir = $request->ijazah_terakhir;
        $data->id = $request->profil_id;
        $data->foto = $nama_file;
        $data->file_ijazah_terakhir = $nama_file2;
        $data->save();

        $data =  new z_Users();
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tipe = $request->tipe;
        $data->profil_id = $request->profil_id;
        $data->save();

        return redirect('mahasiswa/register')->with('alert','Akun selesai. Silahkan Login');
    }

}
