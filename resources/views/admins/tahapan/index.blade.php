@extends('admins.layout')
@section('sub-judul', 'Tabel Tahapan')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

	<a href="{{ url('admin/tahapan/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Jenjang</th>
                <th>Nama</th>
                <th>Urutan</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($tahapans as $tahapan => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->jenjang }}</td>
                <td>{{ $hasil->nama }}</td>
                <td>{{ $hasil->urutan }}</td>
                <td>
                    <form action="{{ route('tahapan.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('tahapan.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('tahapan.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $tahapans->links() }}
@endsection
