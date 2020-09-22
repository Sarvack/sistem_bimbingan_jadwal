<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Users;
use App\Models\Angkatan;
use App\Models\Prodi;
use App\Models\ProdiKonsentrasi;
use Illuminate\Support\Facades\DB;

class UserMahasiswaController extends Controller
{
    public function index()
    {
        $this->data['angkatan'] = Angkatan::all();
    	$this->data['prodi'] = Prodi::all();
        $this->data['prodik'] = ProdiKonsentrasi::all();
        $this->data['users'] = Users::all();

        $this->data['mahasiswas'] = Mahasiswa::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.mahasiswa.index', $this->data);
    }

    public function create()
    {
        $this->data['angkatan'] = Angkatan::all();
    	$this->data['prodi'] = Prodi::all();
    	$this->data['prodik'] = ProdiKonsentrasi::all();

        return view('admins.mahasiswa.form', $this->data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'nim' => 'min:3|unique:z_mahasiswa',
            'nik' => 'min:3|unique:z_mahasiswa',
            'ipk' =>'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'biaya_kuliah' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_telp_ortu' => 'required',
            'ijazah_terakhir' => 'required',
            'tempat_kuliah' => 'required',
            'keterangan' => 'required',
            'email' => 'required|min:4|email|unique:z_users',
            'password' => 'required',
            'tipe' => 'required',
            'profil_id' => 'required',
            'prodi_id' => 'required',
            'konsentrasi_id' => 'required',
            'angkatan_id' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'file_ijazah_terakhir' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('foto');

        $nama_file = "Mahasiswa".date('Y-m-d')."_".$file->getClientOriginalName();


        $tujuan_upload = 'picture/foto-register';
        $file->move($tujuan_upload,$nama_file);

        //save ke tabel Dosen
        $data =  new Mahasiswa();
        $data->id = $request->profil_id;
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->nik = $request->nik;
        $data->ipk = $request->ipk;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->biaya_kuliah = $request->biaya_kuliah;
        $data->nama_ayah = $request->nama_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->no_telp_ortu = $request->no_telp_ortu;
        $data->ijazah_terakhir = $request->ijazah_terakhir;
        $data->tempat_kuliah = $request->tempat_kuliah;
        $data->keterangan = $request->keterangan;
        $data->prodi_id = $request->prodi_id;
        $data->konsentrasi_id = $request->konsentrasi_id;
        $data->angkatan_id = $request->angkatan_id;
        $data->foto = $nama_file;
        $data->file_ijazah_terakhir = $request->file_ijazah_terakhir;
        $data->save();

        //save ke table user
        $data =  new Users();
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tipe = $request->tipe;
        $data->profil_id = $request->profil_id;
        $data->save();

        return redirect('/admin/mahasiswacrud')->with('alert','Akun mahasiswa berhasil di tambahankan');
    }
}
