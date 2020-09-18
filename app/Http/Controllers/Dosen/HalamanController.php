<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\z_Dosen; //ini punya
use App\z_Users;
use App\z_Mahasiswa;
use App\Prodi;
use App\ProdiKonsentrasi;
use App\pps_Angkatan;
use Illuminate\Support\Facades\DB;
use File;

class HalamanController extends Controller
{
    function datadosen()
    {
        $tipe = 'Dosen';
    	// $this->data['dosen'] = z_Dosen::all();
    	$this->data['users'] = z_Users::where('tipe', '=', $tipe)->get();

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

        $gambar = z_Dosen::where('id',$id)->first();
        File::delete('picture/foto-register/'.$gambar->foto);

    	$data1 = z_Dosen::where('id', '=', $id)->first();
    	$data1->delete();

    	return redirect('dosen/semua');
    }

    // mahasiswa section

    function editmahasiswa($id)
    {
        //data mahasiswa
        $this->data['edit'] = z_Mahasiswa::where('id', '=', $id)->first();
        $this->data['edit1'] = z_Users::where('profil_id', '=', $id)->first();

        //relasi
        $this->data['angkatan'] = pps_Angkatan::all();
        $this->data['prodi'] = Prodi::all();
        $this->data['prodik'] = ProdiKonsentrasi::all();

        return view('dosen.editmahasiswa', $this->data);
    }

    function posteditmahasiswa($id, Request $request)
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
            //file
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'file_ijazah' => 'file|mimes:pdf,jpeg,png,jpg|max:2048'
        ]);

        //save ke tabel Mahasiswa
        $data =  z_Mahasiswa::where('id', '=', $id)->first();
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

        $data1 =  z_Users::where('profil_id', '=', $id)->first();
        $data1->nama = $request->nama;
        $data1->email = $request->email;
        $data1->password = bcrypt($request->password);
        $data1->save();

        return redirect('mahasiswa/semua')->with('alert','Data Mahasiswa Diperbaharui.');
    }

    function hapusmahasiswa($id)
    {
        $data = z_Users::where('profil_id', '=', $id)->first();
        $data->delete();

        $gambar = z_Mahasiswa::where('id',$id)->first();
        File::delete('picture/foto-register/'.$gambar->foto);
        $ijazah = z_Mahasiswa::where('id',$id)->first();
        File::delete('mahasiswa_file/ijazah/'.$ijazah->file_ijazah_terakhir);

        $data1 = z_Mahasiswa::where('id', '=', $id)->first();
        $data1->delete();

        return redirect('mahasiswa/semua');
    }
}
