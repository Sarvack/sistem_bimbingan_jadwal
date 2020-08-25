<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdiKonsentrasi extends Model
{
    protected $table = 'pps_prodi_konsentrasi';
    public $timestamps=false;

    protected $fillable = ['id', 'prodi_id', 'nama', 'kode', 'keterangan'];
}
