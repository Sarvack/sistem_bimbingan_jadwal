<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdiKonsentrasi extends Model
{
    protected $table = 'pps_prodi_konsentrasi';

    protected $fillable = ['id', 'prodi_id', 'nama', 'kode', 'keterangan'];

    public function prodi()
    {
    	return $this->belongsTo('App\Models\Prodi', 'prodi_id');
    }
}
