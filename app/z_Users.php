<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class z_Users extends Model
{
    protected $fillable = ['id, nama, email, password, tipe, profil_id'];
    protected $table = 'z_users';

    protected $primaryKey = 'id';

    public function dosenuser()
    {
    	return $this->belongsTo('App\z_Dosen', 'profil_id');
    }
}
