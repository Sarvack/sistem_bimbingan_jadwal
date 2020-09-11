@extends('admins.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Admin User Table</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($admins as $user)
                                @php
                                    $i++;
                                @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->jabatan }}</td>
                                        <td>
                                            <form action="{{ route('crud.destroy',$user->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('crud.show',$user->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('crud.edit',$user->id) }}">Edit</a>

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
                        <a href="{{ url('admin/crud/create') }}" class="btn btn-primary">Add New</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{ $admins->links() }}
@endsection
