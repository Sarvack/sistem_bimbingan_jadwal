<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    protected $fillable = ['id, nama, nip, nidn, foto, alamat, no_telp, tanda_jadwal'];
    protected $table = 'z_dosen';

    protected $primaryKey = 'id';
}
