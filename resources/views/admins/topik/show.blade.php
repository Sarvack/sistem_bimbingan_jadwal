@extends('admins.layout')
@section('sub-judul', 'Detail Prodi Topik')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('topik.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id</strong>
                <input type="text" value="{{ $topik->id }}" name="nama" class="form-control" placeholder="nama" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Prodi</strong>
                <input type="text" value="{{ $topik->prodi->nama }}" name="nama" class="form-control" placeholder="nama" disabled>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Topik</strong>
                <input type="text" value="{{ $topik->nama }}" name="nama" class="form-control" placeholder="nama" disabled>
            </div>
        </div>

    </div>
@endsection
