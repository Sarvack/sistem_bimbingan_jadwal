<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class z_Dosen extends Model
{
    protected $fillable = ['id, nama, nip, nidn, foto, alamat, no_telp, tanda_jadwal'];
    protected $table = 'z_dosen';

    protected $primaryKey = 'id';

    public function dosen()
    {
    	return $this->hasOne('App\z_User');
    }
}
