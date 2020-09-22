<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\Dosen;

class UserDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = Users::all();

        $this->data['dosens'] = Dosen::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.dosen.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.dosen.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'nip' => 'min:3|unique:z_dosen',
            'nidn' => 'min:3|unique:z_dosen',
            'email' => 'required|min:4|email|unique:z_users',
            'password' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tipe' => 'required',
            'profil_id' => 'required',
            'id_user' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);


        $file = $request->file('foto');

        $nama_file = "dosen".date('Y-m-d')."_".$file->getClientOriginalName();


        $tujuan_upload = 'picture/foto-register';
        $file->move($tujuan_upload,$nama_file);

        //save ke tabel Dosen
        $data =  new Dosen();
        $data->id = $request->profil_id;
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->nidn = $request->nidn;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
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

        return redirect('/admin/dosencrud')->with('alert','Tambah Akun Dosen Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosencrud)
    {
        return view('admins.dosen.show',compact('dosencrud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Users::where('profil_id', '=', $id)->first();
    	$data->delete();

    	$data1 = Dosen::where('id', '=', $id)->first();
    	$data1->delete();

    	return redirect('/admin/dosencrud');
    }
}
