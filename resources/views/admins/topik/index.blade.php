@extends('admins.layout')
@section('sub-judul', 'Prodi Topik Tabel')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

	<a href="{{ url('admin/topik/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Prodi</th>
                <th>Nama Topik</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($topiks as $topik => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->prodi->nama }}</td>
                <td>{{ $hasil->nama }}</td>
                <td>
                    <form action="{{ route('topik.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('topik.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('topik.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $topiks->links() }}
@endsection
