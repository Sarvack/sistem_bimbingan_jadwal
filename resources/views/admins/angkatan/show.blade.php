@extends('admins.layout')
@section('sub-judul', 'Detail Angkatan')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('angkatan.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input value="{{ $angkatan->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semester</strong>
                <input value="{{ $angkatan->semester }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Masa Studi Awal</strong>
                <input value="{{ $angkatan->masa_studi_awal }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Masa Studi Akhir</strong>
                <input value="{{ $angkatan->masa_studi_akhir }}" class="form-control" disabled>
            </div>
        </div>

    </div>
@endsection
