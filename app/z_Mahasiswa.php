<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class z_Mahasiswa extends Model
{
    protected $fillable = ['id, prodi_id, konsentrasi_id, angkatan_id, nim, nik, ipk, nama, foto, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telp, biaya_kuliah, nama_ayah, nama_ibu, no_telp_ortu, ijazah_terakhir, file_ijazah_terakhir, tempat_kuliah, keterangan'];
    protected $table = 'z_mahasiswa';

    protected $primaryKey = 'id';

    public function mahasiswa()
    {
    	return $this->hasOne('App\z_User');
    }

    public function prodimaha()
    {
    	return $this->belongsTo('App\Prodi', 'profil_id');
    }
    public function konsentrasimaha()
    {
    	return $this->belongsTo('App\ProdiKonsentrasi', 'profil_id');
    }
    public function angkatanmaha()
    {
    	return $this->belongsTo('App\pps_Angkatan', 'profil_id');
    }
}
