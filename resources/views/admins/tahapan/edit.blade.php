@extends('admins.layout')
@section('sub-judul', 'Edit Tahapan')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tahapan.index') }}"> Back</a>
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

    <form action="{{ route('tahapan.update',$tahapan->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenjang    :</strong>
                    <select class="form-control" name="jenjang">
                        <option selected="selected" value="{{ $tahapan->jenjang }}">{{$tahapan->jenjang}}</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                        </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama    :</strong>
                    <input type="text" name="nama" value="{{ $tahapan->nama }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Urutan    :</strong>
                    <input type="text" name="urutan" value="{{ $tahapan->urutan }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
@endsection
