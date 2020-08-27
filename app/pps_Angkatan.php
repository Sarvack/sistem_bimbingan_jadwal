<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pps_Angkatan extends Model
{
    protected $fillable = ['id, nama, semester, masa_studi_awal, masa_studi_akhir'];
    protected $table = 'pps_angkatan';

    protected $primaryKey = 'id';

    public function angkatanhas()
    {
    	return $this->hasMany('App\z_Mahasiswa');
    }
}