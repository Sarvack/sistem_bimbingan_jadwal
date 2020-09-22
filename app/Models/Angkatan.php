<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'pps_angkatan';

    protected $fillable = ['id', 'nama', 'semester', 'masa_studi_awal', 'masa_studi_akhir'];

    public function angkatans()
    {
    	return $this->hasMany('App\Mahasiswa');
    }

}
