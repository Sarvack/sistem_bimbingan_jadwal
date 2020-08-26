<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\ProdiTopik;

class ProdiTopikController extends Controller
{
    public function index()
    {
        $this->data['prodies'] = Prodi::all();

        $this->data['topiks'] = ProdiTopik::orderBy('nama', 'ASC')->paginate(10);

        return view('admin.topik.index', $this->data);
    }

    public function create()
    {
        $this->data['prodies'] = Prodi::all();

        $this->data['topiks'] = ProdiTopik::orderBy('nama', 'ASC')->paginate(10);

        return view('admin.topik.form', $this->data);

    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:pps_prodi_topik,id',
            'prodi_id' => 'required',
            'nama' => 'required|unique:pps_prodi_topik,nama',
        ]);

        ProdiTopik::create($request->all());

        return redirect()->route('topik.index')
                        ->with('success','Prodi added successfully.');
    }

    public function show(ProdiTopik $topik)
    {
        return view('admin.topik.show',compact('topik'));
    }

    // option di edit belum bener need to fix
    public function edit(ProdiTopik $topik)
    {
        $prodies = Prodi::all();

        return view('admin.topik.edit',compact('topik','prodies'));
    }

    // validate on update need to fix
    public function update(Request $request, ProdiTopik $topik)
    {
        $request->validate([
            'id' => 'required',
            'prodi_id' => 'required',
            'nama' => 'required',
        ]);

        $topik->update($request->all());

        return redirect()->route('topik.index')
                        ->with('success','ProdiTopik updated successfully');
    }

    public function destroy(ProdiTopik $topik)
    {
        $topik->delete();

        return redirect()->route('topik.index')
                        ->with('success','Prodi Topik deleted successfully');
    }
}
