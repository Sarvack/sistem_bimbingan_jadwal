@extends('admins.layout')
@section('sub-judul', 'Tambah Tahapan')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tahapan.index') }}">Back</a>
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

<form action="{{ route('tahapan.store') }}" method="POST">
    @csrf

     <div class="row">
        <input type="hidden" name="id" value ="{{ rand(1,10000) }}">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenjang</strong>
                <select class="form-control" name="jenjang">
                    <option disabled="disabled" selected="selected">Choose option</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Urutan:</strong>
                <input type="number" name="urutan" class="form-control" placeholder="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>

</form>
@endsection
