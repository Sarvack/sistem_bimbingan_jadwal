<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\ProdiKonsentrasi;

class ProdiKonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['prodies'] = Prodi::all();

        $this->data['konsens'] = ProdiKonsentrasi::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.konsentrasi.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['prodies'] = Prodi::all();

        $this->data['konsens'] = ProdiKonsentrasi::orderBy('nama', 'ASC')->paginate(10);

        return view('admins.konsentrasi.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:pps_prodi_konsentrasi,id',
            'prodi_id' => 'required',
            'nama' => 'required|unique:pps_prodi_konsentrasi,nama',
            'kode' => 'required|unique:pps_prodi_konsentrasi,kode',
            'keterangan' => 'required',
        ]);

        ProdiKonsentrasi::create($request->all());

        return redirect()->route('konsentrasi.index')
                        ->with('success','Prodi added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProdiKonsentrasi $konsentrasi)
    {
        return view('admins.konsentrasi.show',compact('konsentrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdiKonsentrasi $konsentrasi)
    {
        $prodies = Prodi::all();

        return view('admins.konsentrasi.edit',compact('konsentrasi','prodies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdiKonsentrasi $konsentrasi)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'kode' => 'required',
            'keterangan' => 'required',
        ]);

        $konsentrasi->update($request->all());

        return redirect()->route('konsentrasi.index')
                        ->with('success','ProdiTopik updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdiKonsentrasi $konsentrasi)
    {
        $konsentrasi->delete();

        return redirect()->route('konsentrasi.index')
                        ->with('success','Prodi Konsentrasi deleted successfully');
    }
}
