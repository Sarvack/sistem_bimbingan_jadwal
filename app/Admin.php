<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'z_admin';

    protected $fillable = [
        'id', 'nama', 'jabatan', 'foto'
    ];

    protected $primaryKey = 'id';

    // public $timestamps = false;

    protected $hidden = ['password'];

    public function admin()
    {
    	return $this->hasOne('App\Users');
    }
}
