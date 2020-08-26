<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdiTopik extends Model
{
    // public $timestamps = false;

    protected $table = 'pps_prodi_topik';

    protected $fillable = ['id', 'prodi_id', 'nama'];

    public $timestamps = false;

    public function prodi()
    {
    	return $this->belongsTo('App\Models\Prodi', 'prodi_id');
    }
}
