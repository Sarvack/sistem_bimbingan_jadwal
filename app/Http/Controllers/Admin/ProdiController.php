<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $this->data['prodies'] = Prodi::orderBy('nama', 'ASC')->paginate(10);
        return view('admin.prodi.index', $this->data);
    }

    public function create()
    {
        return view('admin.prodi.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:pps_prodi,id',
            'jenjang' => 'required',
            'kode' => 'required|unique:pps_prodi,kode',
            'nama' => 'required|unique:pps_prodi,nama',
            'keterangan' => 'required',
            'password' => 'required',
        ]);

        Prodi::create($request->all());

        return redirect()->route('prodi.index')
                        ->with('success','Prodi added successfully.');
    }

    public function show(Prodi $prodi)
    {
        return view('admin.prodi.show',compact('prodi'));
    }

    public function edit(Prodi $prodi)
    {
        return view('admin.prodi.edit',compact('prodi'));
    }

    // validate on update need to fix
    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'id' => 'required',
            'jenjang' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'password' => 'required',
        ]);

        $prodi->update($request->all());

        return redirect()->route('prodi.index')
                        ->with('success','Prodi updated successfully');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('prodi.index')
                        ->with('success','Prodi deleted successfully');
    }
}
