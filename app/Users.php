<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
	use Notifiable;

	protected $table = 'z_users';

    // protected $guarded = 'tipe';

    protected $primaryKey = 'id';

    protected $fillable = ['id, nama, email, password, tipe, profil_id'];

    public function admin()
    {
    	return $this->hasOne('App\Admin');
    }

    public function dosen()
    {
    	return $this->hasOne('App\Dosen');
    }

    public function isAdmin()
    {
        if($this->tipe === 'Admin Prodi')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isDosen()
    {
        if($this->tipe === 'Dosen')
        {
        return true;
        }
        else
        {
            return false;
        }
    }

    public function isMahasiswa()
    {
        if($this->tipe === 'Mahasiswa')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
