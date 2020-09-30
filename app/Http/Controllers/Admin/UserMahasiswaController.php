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

    public function edit($id)
    {
        $this->data['mahasiswa'] = Users::where('profil_id', '=', $id)->first();
        $this->data['angkatan'] = Angkatan::all();
    	$this->data['prodi'] = Prodi::all();
        $this->data['prodik'] = ProdiKonsentrasi::all();
        $this->data['users'] = Users::all();

        return view('admins.mahasiswa.edit', $this->data);
    }

    public function show(Mahasiswa $mahasiswacrud)
    {
        return view('admins.mahasiswa.show',compact('mahasiswacrud'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'nim' => 'min:3|unique:z_mahasiswa,nim,'.$id.',id',
            'prodi_id' => 'required',
            'konsentrasi_id' => 'required',
            'angkatan_id' => 'required',
            'email' => 'required|min:4|email|unique:z_users,email,'.$id.',profil_id',
            'password' => 'required',
            'nik' => 'required|min:3',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'biaya_kuliah' => 'required',
            'tempat_kuliah' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_telp_ortu' => 'required',
            'ijazah_terakhir' => 'required',
            'ipk' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'file_ijazah' => 'file|mimes:pdf,jpeg,png,jpg|max:2048'
        ]);

        //save ke tabel Dosen
        $data =  Mahasiswa::where('id', '=', $id)->first();
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
        if (empty($request->file('foto'))){
            $data->foto = $data->foto;
        }
        else{
            unlink('picture/foto-register/'.$data->foto); //menghapus file lama
            $file = $request->file('foto');
            $nama_file = "mahasiswa".date('Y-m-d')."_".$file->getClientOriginalName();
            $tujuan_upload = 'picture/foto-register';
            $file->move($tujuan_upload,$nama_file);
            $data->foto = $nama_file;
        }

        if (empty($request->file('file_ijazah'))){
            $data->file_ijazah_terakhir = $data->file_ijazah_terakhir;
        }
        else{
            unlink('mahasiswa_file/ijazah/'.$data->file_ijazah_terakhir); //menghapus file lama
            $file2 = $request->file('file_ijazah');
            $nama_file2 = "ijazah".date('Y-m-d')."_".$file2->getClientOriginalName();
            $tujuan_upload2 = 'mahasiswa_file/ijazah';
            $file2->move($tujuan_upload2,$nama_file2);
            $data->file_ijazah_terakhir = $nama_file2;
        }

        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->biaya_kuliah = $request->biaya_kuliah;
        $data->tempat_kuliah = $request->tempat_kuliah;
        $data->keterangan = $request->keterangan;
        $data->ipk = $request->ipk;
        $data->save();

        $data1 =  Users::where('profil_id', '=', $id)->first();
        $data1->nama = $request->nama;
        $data1->email = $request->email;
        $data1->password = bcrypt($request->password);
        $data1->save();

        return redirect('/admin/mahasiswacrud')->with('alert','Akun mahasiswa berhasil di update');
    }
}
