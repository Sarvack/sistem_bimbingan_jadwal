@extends('admins.layout')
@section('sub-judul', 'Tambah Nilai')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('nilai.index') }}">Back</a>
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

<form action="{{ route('nilai.store') }}" method="POST">
    @csrf

     <div class="row">
        <input type="hidden" name="id" value ="{{ rand(1,10000) }}">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nilai Huruf</strong>
                <input type="text" name="nilai_huruf" class="form-control" placeholder="nilai dengan huruf">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Predikat:</strong>
                <input type="text" name="predikat" class="form-control" placeholder="predikat">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

</form>
@endsection
