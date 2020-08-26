<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    // protected $primaryKey = 'id';

    protected $table = 'pps_prodi';

    protected $fillable = ['id', 'jenjang', 'kode', 'nama', 'keterangan', 'password'];

    public function topiks()
    {
        return $this->hasOne('App\Models\ProdiTopik');
    }
}
