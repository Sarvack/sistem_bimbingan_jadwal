<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{

    protected $table = 'pps_prodi';

    protected $fillable = ['id', 'jenjang', 'kode', 'nama', 'keterangan', 'password'];

    public function topiks()
    {
        return $this->hasOne('App\Models\ProdiTopik');
    }

    public function konsentrasis()
    {
        return $this->hasOne('App\Models\ProdiKonsentrasi');
    }
}
