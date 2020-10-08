<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tahapan extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'pps_tahapan';

    protected $fillable = ['id', 'jenjang', 'nama', 'urutan'];
}
