<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['id', 'prodi_id', 'konsentrasi_id', 'angkatan_id', 'nim', 'nik', 'ipk', 'nama', 'foto', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'no_telp', 'biaya_kuliah', 'nama_ayah', 'nama_ibu', 'no_telp_ortu', 'ijazah_terakhir', 'file_ijazah_terakhir', 'tempat_kuliah', 'keterangan'];

    protected $table = 'z_mahasiswa';

    protected $primaryKey = 'id';

    public function mahasiswa()
    {
    	return $this->hasOne('App\Users');
    }

    public function prodimaha()
    {
    	return $this->belongsTo('App\Prodi', 'profil_id');
    }
    public function konsentrasimaha()
    {
    	return $this->belongsTo('App\Models\ProdiKonsentrasi', 'profil_id');
    }
    public function angkatanmaha()
    {
    	return $this->belongsTo('App\Models\Angkatan', 'profil_id');
    }
}
