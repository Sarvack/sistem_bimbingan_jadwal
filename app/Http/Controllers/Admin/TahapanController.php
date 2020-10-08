<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahapan;

class TahapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['tahapans'] = Tahapan::orderBy('jenjang', 'ASC')->paginate(10);
        return view('admins.tahapan.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.tahapan.form');
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
            'jenjang' => 'required',
            'nama' => 'required|unique:pps_prodi,nama',
            'urutan' => 'required',
        ]);

        Tahapan::create([
            'id' => $request->id,
            'jenjang' => $request->jenjang,
            'nama' => $request->nama,
            'urutan' => $request->urutan,
        ]);

        return redirect()->route('tahapan.index')
                        ->with('success','Tahapan added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tahapan $tahapan)
    {
        return view('admins.tahapan.show', compact('tahapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tahapan $tahapan)
    {
        return view('admins.tahapan.edit',compact('tahapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tahapan $tahapan)
    {
        $request->validate([
            'jenjang' => 'required',
            'nama' => 'required',
            'urutan' => 'required',
        ]);

        $tahapan->update($request->all());

        return redirect()->route('tahapan.index')
                        ->with('success','Tahapan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahapan $tahapan)
    {
        $tahapan->delete();

        return redirect()->route('tahapan.index')
                        ->with('success','Tahapan deleted successfully');
    }
}
