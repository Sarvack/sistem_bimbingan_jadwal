@extends('admins.layout')
@section('sub-judul', 'Edit Dosen')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('mahasiswacrud.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('mahasiswacrud.update', $mahasiswa->profil_id) }}" enctype="multipart/form-data">
    <div class="row">
        @csrf
        @method('PUT')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi </strong>
                <select class="form-control" name="prodi_id">
                    <option value="{{ $mahasiswa->mahasiswauser->prodi_id }}">{{ $mahasiswa->mahasiswauser->prodimaha->nama }}</option>
                    @foreach($prodi as $top)
                            <option value="{{ $top->id }}">{{ $top->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konsentrasi</strong>
                <select class="form-control" name="konsentrasi_id">
                    <option value="{{ $mahasiswa->mahasiswauser->konsentrasi_id }}">{{ $mahasiswa->mahasiswauser->konsentrasimaha->nama }}</option>
                        @foreach ($prodik as $pk)
                            <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Angkatan </strong>
                <select class="form-control" name="angkatan_id">
                    <option value="{{ $mahasiswa->mahasiswauser->angkatan_id }}">{{ $mahasiswa->mahasiswauser->angkatanmaha->nama }}</option>
                        @foreach ($angkatan as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIM </strong>
                <input type="number" name="nim" class="form-control" value="{{ $mahasiswa->mahasiswauser->nim }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK </strong>
                <input type="text" name="nik" class="form-control" value="{{ $mahasiswa->mahasiswauser->nik }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IPK </strong>
                <input type="number" name="ipk" class="form-control" value="{{ $mahasiswa->mahasiswauser->ipk }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama </strong>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->mahasiswauser->nama }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir </strong>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $mahasiswa->mahasiswauser->tempat_lahir }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir </strong>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $mahasiswa->mahasiswauser->tanggal_lahir }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin </strong>
                <select class="form-control" name="jenis_kelamin">
                    <option value="{{ $mahasiswa->mahasiswauser->jenis_kelamin }}">{{ $mahasiswa->mahasiswauser->jenis_kelamin }}</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama </strong>
                <input type="text" name="agama" class="form-control" value="{{ $mahasiswa->mahasiswauser->agama }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" class="form-control" value="{{ $mahasiswa->mahasiswauser->alamat }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telepon </strong>
            <input type="number" name="no_telp" class="form-control" value="{{ $mahasiswa->mahasiswauser->no_telp }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Kuliah</strong>
                <select class="form-control" name="biaya_kuliah">
                    <option value="{{ $mahasiswa->mahasiswauser->biaya_kuliah }}">{{ $mahasiswa->mahasiswauser->biaya_kuliah }}</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Sendiri">Sendiri</option>
                        <option value="Sponsor">Sponsor</option>
                        <option value="Lain-lain">Lainnya</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ayah</strong>
                <input type="text" name="nama_ayah" class="form-control" value="{{ $mahasiswa->mahasiswauser->nama_ayah }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu</strong>
            <input type="text" name="nama_ibu" class="form-control" value="{{ $mahasiswa->mahasiswauser->nama_ibu }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp OrangTua</strong>
                <input type="number" name="no_telp_ortu" class="form-control" value="{{ $mahasiswa->mahasiswauser->no_telp_ortu }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ijazah Terakhir</strong>
                <input type="text" name="ijazah_terakhir" class="form-control" value="{{ $mahasiswa->mahasiswauser->ijazah_terakhir }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Kuliah</strong>
                <select class="form-control" name="tempat_kuliah">
                    <option value="{{ $mahasiswa->mahasiswauser->tempat_kuliah }}">{{ $mahasiswa->mahasiswauser->tempat_kuliah }}</option>
                        <option value="Singaraja">Singaraja</option>
                        <option value="Denpasar">Denpasar</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input type="text" name="keterangan" class="form-control" value="{{ $mahasiswa->mahasiswauser->keterangan }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email </strong>
                <input type="email" name="email" class="form-control" value="{{ $mahasiswa->email }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password </strong>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto</strong>
                <input type="file" name="foto" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Ijazah Terakhir</strong>
                <input type="file" name="file_ijazah_terakhir" class="form-control">
            </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    </div>
</form>
@endsection
