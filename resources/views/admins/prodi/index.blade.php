@extends('admins.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Prodi Tabel</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Jenjang</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($prodies as $prodi)
                                @php
                                    $i++;
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $prodi->jenjang }}</td>
                                        <td>{{ $prodi->kode }}</td>
                                        <td>{{ $prodi->nama }}</td>
                                        <td>{{ $prodi->keterangan }}</td>
                                        <td>
                                            <form action="{{ route('prodi.destroy',$prodi->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('prodi.show',$prodi->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('prodi.edit',$prodi->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer text-right">
                        <a href="{{ url('admin/prodi/create') }}" class="btn btn-primary">Add New</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{ $prodies->links() }}
@endsection
