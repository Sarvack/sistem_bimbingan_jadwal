@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Prodi Topik Tabel</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Prodi</th>
                                <th>Nama Topik</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($topiks as $topik)
                                @php
                                    $i++;
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $topik->prodi->nama }}</td>
                                        <td>{{ $topik->nama }}</td>
                                        <td>
                                            <form action="{{ route('topik.destroy',$topik->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('topik.show',$topik->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('topik.edit',$topik->id) }}">Edit</a>

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
                        <a href="{{ url('admin/topik/create') }}" class="btn btn-primary">Add New</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{ $topiks->links() }}
@endsection
