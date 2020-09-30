@extends('admins.layout')
@section('sub-judul', 'Mahasiswa Tabel')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

	<a href="{{ url('admin/mahasiswacrud/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>Jenik Kelamin</th>
                <th>Tempat Kuliah</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($mahasiswas as $data => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->nama }}</td>
                <td>{{ $hasil->nim }}</td>
                <td>{{ $hasil->alamat }}</td>
                <td>{{ $hasil->jenis_kelamin }}</td>
                <td>{{ $hasil->tempat_kuliah }}</td>
                <td>
                    <form action="{{ route('mahasiswacrud.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('mahasiswacrud.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('mahasiswacrud.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $mahasiswas->links() }}
@endsection
