<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Angkatan;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['angkatans'] = Angkatan::orderBy('nama', 'ASC')->paginate(10);
        return view('admins.angkatan.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.angkatan.form');
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
            'id' => 'required',
            'nama' => 'required',
            'semester' => 'required',
            'masa_studi_awal' => 'required',
            'masa_studi_akhir' => 'required',
        ]);

        Angkatan::create($request->all());

        return redirect()->route('angkatan.index')
                        ->with('success','Angkatan added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Angkatan $angkatan)
    {
        return view('admins.angkatan.show',compact('angkatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Angkatan $angkatan)
    {
        return view('admins.angkatan.edit',compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        $request->validate([
            'nama' => 'required',
            'semester' => 'required',
            'masa_studi_awal' => 'required',
            'masa_studi_akhir' => 'required',
        ]);

        $angkatan->update($request->all());

        return redirect()->route('angkatan.index')
                        ->with('success','Nilai updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angkatan $angkatan)
    {
        $angkatan->delete();

        return redirect()->route('angkatan.index')
                        ->with('success','Angkatan deleted successfully');
    }
}
