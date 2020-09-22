@extends('admins.layout')
@section('sub-judul', 'Edit Angkatan')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('angkatan.index') }}"> Back</a>
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

<form action="{{ route('angkatan.update',$angkatan->id) }}" method="POST">
    @csrf

     <div class="row">
        @method('PUT')

        {{-- <input type="hidden" name="id" value="{{ $angkatan->id }}"> --}}

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama </strong>
                <input type="text" name="nama" class="form-control" value="{{ $angkatan->nama }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semester </strong>
                <select class="form-control" name="semester">
                <option selected="selected" value="{{ $angkatan->semester }}">{{$angkatan->semester}}</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Masa Studi Awal </strong>
                <input type="date" name="masa_studi_awal" class="form-control" value="{{ $angkatan->masa_studi_awal }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Masa Studi Akhir</strong>
                <input type="date" name="masa_studi_akhir" class="form-control" value="{{ $angkatan->masa_studi_akhir }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

</form>
@endsection
