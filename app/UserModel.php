<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $fillable = ['id, nama, email, password, tipe, profil_id'];
    protected $table = 'z_users';

    protected $primaryKey = 'id';
}
