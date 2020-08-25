<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ProdiKonsentrasi;

class ProdiKonsentrasiController extends Controller
{
    public function index()
    {
        $data=ProdiKonsentrasi::all();
        $this->data['prodies'] = ProdiKonsentrasi::orderBy('nama', 'ASC')->paginate(10);
        return view('admin.prodikonsentrasi.index', $this->data);
    }

    public function create()
    {
        return view('admin.prodikonsentrasi.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:pps_prodi_konsentrasi',
            'prodi_id' => 'required|unique:pps_prodi_konsentrasi',
            'nama' => 'required|unique:pps_prodi_konsentrasi',
            'kode' => 'required|unique:pps_prodi_konsentrasi',
            'keterangan' => 'required',
        ]);

        ProdiKonsentrasi::create($request->all());

        return redirect()->route('prodikonsentrasi.index')
                        ->with('success','Prodi added successfully.');
    }

    public function show($id)
    {
        $prodi=ProdiKonsentrasi::find($id);

        return view('admin.prodikonsentrasi.show',compact('prodi'));
    }

    public function edit($id)
    {
        $prodi=ProdiKonsentrasi::find($id);

        return view('admin.prodikonsentrasi.edit',compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'id' => 'required',
            'prodi_id' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $prodi=ProdiKonsentrasi::find($id);
        $prodi->update($request->all());

        return redirect()->route('prodikonsentrasi.index')
                        ->with('success','Prodi updated successfully');
    }

    public function destroy($id)
    {
        $prodi=ProdiKonsentrasi::destroy($id);

        return redirect()->route('prodikonsentrasi.index')
                        ->with('success','Prodi updated successfully');
    }
}
