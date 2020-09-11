<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Users;
use App\Dosen;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = Users::all();

        $this->data['admins'] = Admin::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.register.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['users'] = Users::all();

        $this->data['admins'] = Admin::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.register.form', $this->data);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Users $admin)
    {
        return view('admins.register.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['admin'] = Users::where('profil_id', '=', $id)->first();

        return view('admins.register.edit', $this->data);
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
    	return redirect('/admin/crud')->with('alert','Data Admin Di perbaharui.');
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

    	$data1 = Admin::where('id', '=', $id)->first();
    	$data1->delete();

    	return redirect('/admin/crud');
    }
}
