@extends('admins.layout')
@section('sub-judul', 'Tabel Admin')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

	<a href="{{ url('admin/crud/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($admins as $admin => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->nama }}</td>
                <td>{{ $hasil->jabatan }}</td>
                <td>
                    <form action="{{ route('crud.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('crud.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('crud.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $admins->links() }}
@endsection
