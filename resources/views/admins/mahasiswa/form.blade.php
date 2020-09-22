@extends('admins.layout')
@section('sub-judul', 'Tambah Dosen')
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

<form method="POST" action="{{ route('mahasiswacrud.store') }}" enctype="multipart/form-data">
    <div class="row">
        @csrf

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi </strong>
                <select class="form-control" name="prodi_id">
                    <option disabled="disabled" selected="selected">Choose option</option>
                    @foreach ($prodi as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konsentrasi</strong>
                <select class="form-control" name="konsentrasi_id">
                        <option disabled="disabled" selected="selected">Choose option</option>
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
                        <option disabled="disabled" selected="selected">Choose option</option>
                        @foreach ($angkatan as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIM </strong>
                <input type="number" name="nim" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK </strong>
                <input type="text" name="nik" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IPK </strong>
                <input type="number" name="ipk" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama </strong>
                <input type="text" name="nama" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir </strong>
                <input type="text" name="tempat_lahir" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir </strong>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin </strong>
                <select class="form-control" name="jenis_kelamin">
                    <option disabled="disabled" selected="selected">Choose option</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama </strong>
                <input type="text" name="agama" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <input type="text" name="alamat" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telepon </strong>
                <input type="number" name="no_telp" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Kuliah</strong>
                <select class="form-control" name="biaya_kuliah">
                    <option disabled="disabled" selected="selected">Choose option</option>
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
                <input type="text" name="nama_ayah" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu</strong>
                <input type="text" name="nama_ibu" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No. Telp OrangTua</strong>
                <input type="number" name="no_telp_ortu" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ijazah Terakhir</strong>
                <input type="text" name="ijazah_terakhir" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Kuliah</strong>
                <select class="form-control" name="tempat_kuliah">
                    <option disabled="disabled" selected="selected">Choose option</option>
                        <option value="Singaraja">Singaraja</option>
                        <option value="Denpasar">Denpasar</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input type="text" name="keterangan" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email </strong>
                <input type="email" name="email" class="form-control">
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

    {{-- hidden input --}}
    <input type = "hidden" name = "tipe" value ="Mahasiswa">
    <input type = "hidden" name = "id" value ="{{ rand(10,10000) }}">
    <input type = "hidden" name = "profil_id" value ="{{ rand(10,10000) }}">
    {{-- end hidden --}}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    </div>
</form>
@endsection
