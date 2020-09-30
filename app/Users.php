<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
	use Notifiable;

	protected $table = 'z_users';

    protected $primaryKey = 'id';

    protected $fillable = ['id, nama, email, password, tipe, profil_id'];

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function dosenuser()
    {
    	return $this->belongsTo('App\Dosen', 'profil_id');
    }

    public function mahasiswauser()
    {
    	return $this->belongsTo('App\Mahasiswa', 'profil_id');
    }
}
