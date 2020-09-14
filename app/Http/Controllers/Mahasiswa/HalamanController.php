<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\z_Mahasiswa; //ini punya
use App\z_Users;
use App\pps_Angkatan;
use App\Prodi;
use App\ProdiKonsentrasi;
use Illuminate\Support\Facades\DB;

class HalamanController extends Controller
{
    function index()
    {
    	$this->data['mahasiswa'] = z_Mahasiswa::all();

        // $dosendata = z_Dosen::all();
        return view('dosen.daftarmahasiswa', $this->data);
    }
}
