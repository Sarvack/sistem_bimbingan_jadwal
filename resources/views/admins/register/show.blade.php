@extends('admins.layout')
@section('sub-judul', 'Detail Admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('crud.index') }}">Back</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Admin</strong>
                <input value="{{ $crud->nama }}" class="form-control" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan</strong>
                <input value="{{ $crud->jabatan }}" class="form-control" disabled>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input value="{{ $crud->jabatan }}" class="form-control" disabled>
            </div>
        </div>
    </div>
@endsection
