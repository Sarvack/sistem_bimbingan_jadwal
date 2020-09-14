<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'pps_nilai';

    protected $fillable = ['id', 'nilai_huruf', 'predikat'];
}
