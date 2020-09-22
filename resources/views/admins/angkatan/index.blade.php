@extends('admins.layout')
@section('sub-judul', 'Angkatan Tabel')
@section('content')

{{-- @if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif --}}

	<a href="{{ url('admin/angkatan/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Studi Awal</th>
                <th>Studi Akhir</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($angkatans as $angkatan => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->nama }}</td>
                <td>{{ $hasil->semester }}</td>
                <td>{{ $hasil->masa_studi_awal }}</td>
                <td>{{ $hasil->masa_studi_akhir }}</td>
                <td>
                    <form action="{{ route('angkatan.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('angkatan.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('angkatan.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $angkatans->links() }}
@endsection
