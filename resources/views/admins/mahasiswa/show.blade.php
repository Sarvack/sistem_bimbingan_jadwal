@extends('admins.layout')
@section('sub-judul', 'Detail Mahasiswa')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mahasiswacrud.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Mahasiswa</strong>
                <input value="{{ $mahasiswacrud->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodi</strong>
                <input value="{{ $mahasiswacrud->prodimaha->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konsentrasi</strong>
                <input value="{{ $mahasiswacrud->konsentrasimaha->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Angkatan</strong>
                <input value="{{ $mahasiswacrud->angkatanmaha->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIM</strong>
                <input value="{{ $mahasiswacrud->nim }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK</strong>
                <input value="{{ $mahasiswacrud->nik }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Lahir</strong>
                <input value="{{ $mahasiswacrud->tempat_lahir }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir</strong>
                <input value="{{ $mahasiswacrud->tanggal_lahir }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Kelamin</strong>
                <input value="{{ $mahasiswacrud->jenis_kelamin }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Agama</strong>
                <input value="{{ $mahasiswacrud->agama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <input value="{{ $mahasiswacrud->alamat }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Telepon</strong>
                <input value="{{ $mahasiswacrud->no_telp }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Biaya Kuliah</strong>
                <input value="{{ $mahasiswacrud->biaya_kuliah }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ayah</strong>
                <input value="{{ $mahasiswacrud->nama_ayah }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ibu</strong>
                <input value="{{ $mahasiswacrud->nama_ibu }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp. Orang Tua</strong>
                <input value="{{ $mahasiswacrud->no_telp_ortu }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jazah Terakhir</strong>
                <input value="{{ $mahasiswacrud->ijazah_terakhir }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tempat Kuliah</strong>
                <input value="{{ $mahasiswacrud->tempat_kuliah }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input value="{{ $mahasiswacrud->keterangan }}" class="form-control" disabled>
            </div>
        </div>

    </div>
@endsection
