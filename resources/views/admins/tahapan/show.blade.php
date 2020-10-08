@extends('admins.layout')
@section('sub-judul', 'Detail Nilai')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tahapan.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenjang</strong>
                <input value="{{ $tahapan->jenjang }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input value="{{ $tahapan->nama }}" class="form-control" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Urutan</strong>
                <input value="{{ $tahapan->urutan }}" class="form-control" disabled>
            </div>
        </div>

    </div>
@endsection
