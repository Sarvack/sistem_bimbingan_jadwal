<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Users;
use App\Models\Angkatan;
use App\Models\Prodi;
use App\Models\ProdiKonsentrasi;
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
        return view('mahasiswas.dashboard', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['mahasiswa'] = Mahasiswa::where('id', '=', Auth::guard('cekTipe')->user()->profil_id)->first();
        $this->data['angkatan'] = Angkatan::all();
    	$this->data['prodi'] = Prodi::all();
    	$this->data['prodik'] = ProdiKonsentrasi::all();

        return view('mahasiswas.datadiri.index', $this->data);
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
            // 'ipk' => 'required',
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
        // $data->ipk = $request->ipk;
        $data->save();

        $data1 =  Users::where('profil_id', '=', $id)->first();
        $data1->nama = $request->nama;
        $data1->email = $request->email;
        $data1->password = bcrypt($request->password);
        $data1->save();

        return redirect('/mahasiswa/dashboard')->with('alert','Akun kamu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
