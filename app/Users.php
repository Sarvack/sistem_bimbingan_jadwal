<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = 'z_users';

    protected $primaryKey = 'id';

    protected $fillable = ['id, nama, email, password, tipe, profil_id'];

    // public function dosenuser()
    // {
    // 	return $this->belongsTo('App\Dosen', 'profil_id');
    // }

    // public function mahasiswauser()
    // {
    // 	return $this->belongsTo('App\Mahasiswa', 'profil_id');
    // }

    public function adminuser()
    {
    	return $this->belongsTo('App\Admin', 'profil_id');
    }
}
