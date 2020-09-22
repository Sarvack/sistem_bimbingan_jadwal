@extends('admins.layout')
@section('sub-judul', 'Dosen Tabel')
@section('content')

{{-- @if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif --}}

	<a href="{{ url('admin/dosencrud/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>NIDN</th>
                <th>Alamat</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($dosens as $dosen => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->nama }}</td>
                <td>{{ $hasil->nip }}</td>
                <td>{{ $hasil->nidn }}</td>
                <td>{{ $hasil->alamat }}</td>
                <td>
                    <form action="{{ route('dosencrud.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('dosencrud.show',$hasil->id) }}">Show</a>

                        {{-- <a class="btn btn-primary" href="{{ route('dosencrud.edit',$hasil->id) }}">Edit</a> --}}

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $dosens->links() }}
@endsection
