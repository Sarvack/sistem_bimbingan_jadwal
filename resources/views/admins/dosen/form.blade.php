@extends('admins.layout')
@section('sub-judul', 'Tambah Dosen')
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

<form action="{{ route('dosencrud.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <input type="hidden" name="id" value ="{{ rand(1,10000) }}">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama </strong>
                <input type="text" name="nama" class="form-control" placeholder="nama">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP </strong>
                <input type="text" name="nip" class="form-control" placeholder="nip">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIDN </strong>
                <input type="text" name="nidn" class="form-control" placeholder="nidn">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email </strong>
                <input type="email" name="email" class="form-control" placeholder="email">
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
                <input type="text" name="alamat" class="form-control" placeholder="alamat">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Telp </strong>
                <input type="number" name="no_telp" class="form-control" placeholder="no telepon">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto </strong>
                <input type="file" name="foto" class="form-control" placeholder="Masukan photo">
            </div>
        </div>

        {{-- Input hidden --}}

        <input type = "hidden" name = "tipe" value ="Dosen">
        <input type = "hidden" name = "profil_id" value ="{{ rand(1,10000) }}">
        <input type = "hidden" name = "id_user" value ="{{ rand(10,10000) }}">

        {{-- End Input Hidden --}}

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

</form>
@endsection
