@extends('admins.layout')
@section('sub-judul', 'Detail Prodi Konsentrasi')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('konsentrasi.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Konsentrasi</strong>
                <input value="{{ $konsentrasi->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Prodi</strong>
                <input value="{{ $konsentrasi->prodi->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Konsentrasi</strong>
                <input value="{{ $konsentrasi->kode }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input value="{{ $konsentrasi->keterangan }}" class="form-control" disabled>
            </div>
        </div>

    </div>
@endsection
