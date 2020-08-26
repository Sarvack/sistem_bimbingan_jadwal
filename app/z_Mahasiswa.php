<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    protected $fillable = ['id, prodi_id, konsentrasi_id, angkatan_id, nim, nik, ipk, nama, foto, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, no_telp, biaya_kuliah, nama_ayah, nama_ibu, no_telp_ortu, ijazah_terakhir, file_ijazah_terakhir, tempat_kuliah, keterangan'];
    protected $table = 'z_mahasiswa';

    protected $primaryKey = 'id';
}
}
