<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mahasiswa extends Authenticatable
{
    use Notifiable;

        protected $guard = 'mahasiswa';

        protected $table = 'z_mahasiswa';

        protected $fillable = [
            'prodi_id', 'konsentrasi_id', 'angkatan_id', 'nim', 'nik', 'ipk', 'nama', 'foto', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'no_telp', 'biaya_kuliah', 'nama_ayah', 'nama_ibu', 'no_telp_ortu', 'ijazah_terakhir', 'file_ijazah', 'tempat_kuliah', 'keterangan'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function mahasiswa()
    	{
    	return $this->hasOne('App\Users');
    	}
}
