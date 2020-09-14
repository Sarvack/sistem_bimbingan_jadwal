<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['nilais'] = Nilai::orderBy('nilai_huruf', 'ASC')->paginate(10);
        return view('admins.nilai.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.nilai.form');
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
            'nilai_huruf' => 'required|unique:pps_nilai,nilai_huruf',
            'predikat' => 'required|unique:pps_nilai,predikat',
        ]);

        Nilai::create([
            'id' => $request->id,
            'nilai_huruf' => $request->nilai_huruf,
            'predikat' => $request->predikat,
        ]);

        return redirect()->route('nilai.index')
                        ->with('success','Nilai added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        return view('admins.nilai.show',compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        return view('admins.nilai.edit',compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'nilai_huruf' => 'required|unique:pps_nilai,nilai_huruf,{$this->nilai->id}',
            'predikat' => 'required|unique:pps_nilai,predikat,{$this->nilai->id}',
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilai.index')
                        ->with('success','Nilai updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')
                        ->with('success','Nilai deleted successfully');
    }
}
