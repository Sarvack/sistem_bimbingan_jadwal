<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;

    protected $table = 'z_admin';

    protected $fillable = [
        'id', 'nama', 'jabatan', 'foto'
    ];

    protected $primaryKey = 'id';

    protected $hidden = ['password'];

    public function useradmin()
    {
    	return $this->belongsTo('App\Users', 'profil_id');
    }
}
