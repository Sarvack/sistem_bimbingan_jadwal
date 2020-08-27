@extends('admins.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detail Prodi </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('topik.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id    :</strong>
                {{ $topik->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Prodi :</strong>
                {{ $topik->prodi->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Topik :</strong>
                {{ $topik->nama }}
            </div>
        </div>
    </div>
@endsection
