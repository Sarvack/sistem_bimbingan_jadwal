<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticable;
// use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    // use Notifiable;

    protected $fillable = [
        'id', 'nama', 'jabatan', 'foto'
    ];
    protected $table = 'z_admin';

    protected $primaryKey = 'id';

    public $timestamps = false;

    // protected $guard = 'admin';

    // protected $hidden = ['password'];

    public function admin()
    {
    	return $this->hasOne('App\Users');
    }
}
