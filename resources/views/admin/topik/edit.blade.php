@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Prodi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('topik.index') }}"> Back</a>
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

    <form action="{{ route('topik.update',$topik->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id  :</strong>
                    <input type="text" name="id" value="{{ $topik->id }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Nama Prodi :</strong>
                <div class="form-group">
                    <select class="form-control" name="prodi_id">
                        <option value="{{ $topik->prodi->id }}">{{ $topik->prodi->nama }}</option>
                            @foreach($topik as $top)
                                <option value="{{ $top->prodi->id }}">{{ $top->prodi->nama }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Topik    :</strong>
                    <input type="text" name="nama" value="{{ $topik->nama }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
@endsection
