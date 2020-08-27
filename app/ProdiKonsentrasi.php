<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdiKonsentrasi extends Model
{
    protected $fillable = ['id, prodi_id, nama, kode, keterangan'];
    protected $table = 'pps_prodi_konsentrasi';

    protected $primaryKey = 'id';

    public function konsentrasihas()
    {
    	return $this->hasMany('App\z_Mahasiswa');
    }
}