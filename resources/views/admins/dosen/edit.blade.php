@extends('admins.layout')
@section('sub-judul', 'Edit Dosen')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dosencrud.index') }}"> Back</a>
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

<form action="{{ route('dosencrud.update',$dosen->profil_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama </strong>
                <input type="text" name="nama" class="form-control" value="{{ $dosen->nama }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP </strong>
                <input type="text" name="nip" class="form-control" value="{{ $dosen->dosenuser->nip }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIDN </strong>
                <input type="text" name="nidn" class="form-control" value="{{ $dosen->dosenuser->nidn }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email </strong>
                <input type="email" name="email" class="form-control" value="{{ $dosen->email }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password </strong>
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat </strong>
                <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ $dosen->dosenuser->alamat }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp </strong>
                <input type="number" name="no_telp" class="form-control" placeholder="no telepon" value="{{ $dosen->dosenuser->no_telp }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto </strong>
                <input type="file" name="foto" class="form-control" placeholder="Masukan photo">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
