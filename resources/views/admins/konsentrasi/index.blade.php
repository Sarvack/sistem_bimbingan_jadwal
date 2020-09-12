@extends('admins.layout')
@section('sub-judul', 'Prodi Konsentrasi Tabel')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

	<a href="{{ url('admin/konsentrasi/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Prodi</th>
                <th>Konsentrasi</th>
                <th>Kode</th>
                <th>Keterangan</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($konsens as $konsen => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->prodi->nama }}</td>
                <td>{{ $hasil->nama }}</td>
                <td>{{ $hasil->kode }}</td>
                <td>{{ $hasil->keterangan }}</td>
                <td>
                    <form action="{{ route('konsentrasi.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('konsentrasi.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('konsentrasi.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $konsens->links() }}
@endsection
