<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['id, jenjang, kode, nama, keterangan, password'];
    protected $table = 'pps_prodi';

    protected $primaryKey = 'id';

    public function topiks()
    {
        return $this->hasOne('App\Models\ProdiTopik');
    }

    public function prodihas()
    {
    	return $this->hasMany('App\z_Mahasiswa');
    }
}