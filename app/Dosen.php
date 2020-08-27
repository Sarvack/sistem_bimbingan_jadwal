<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Dosen extends Authenticatable
{
    use Notifiable;

        protected $guard = 'dosen';

        protected $table = 'z_dosen';

        protected $fillable = [
            'name', 'nip', 'nidn', 'foto', 'alamat', 'no_telp', 'tanda_jadwal'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function dosen()
    	{
    	return $this->hasOne('App\Users');
    	}
}
