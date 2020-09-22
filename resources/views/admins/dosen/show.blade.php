@extends('admins.layout')
@section('sub-judul', 'Detail Dosen')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dosencrud.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input value="{{ $dosencrud->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP</strong>
                <input value="{{ $dosencrud->nip }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIDN</strong>
                <input value="{{ $dosencrud->nidn }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <input value="{{ $dosencrud->alamat }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telepon</strong>
                <input value="{{ $dosencrud->no_telp }}" class="form-control" disabled>
            </div>
        </div>

        {{-- will fix this soon --}}
{{--
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input value="{{ $dosencrud->email }}" class="form-control" disabled>
            </div>
        </div> --}}

    </div>
@endsection
