@extends('admins.layout')
@section('sub-judul', 'Tambah Prodi Konsentrasi')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('konsentrasi.index') }}"> Back</a>
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

<form action="{{ route('konsentrasi.store') }}" method="POST">
    @csrf

     <div class="row">
        <input type="hidden" name="id" value ="{{ rand(1,10000) }}">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Prodi:</strong>
            <div class="form-group">
                    <select data-placeholder="Select Prodi" class="form-control" name="prodi_id">
                        <option value="">Pilih Prodi</option>
                        @foreach ($prodies as $prodi)
                        <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                        @endforeach
                    </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Konsentrasi</strong>
                <input type="text" name="nama" class="form-control" placeholder="nama">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Konsentrasi</strong>
                <input type="text" name="kode" class="form-control" placeholder="kode">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input type="text" name="keterangan" class="form-control" placeholder="keterangan">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

</form>
@endsection
