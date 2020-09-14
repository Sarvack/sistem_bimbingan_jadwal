@extends('admins.layout')
@section('sub-judul', 'Tabel Nilai')
@section('content')

@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif

	<a href="{{ url('admin/nilai/create') }}" class="btn btn-info btn-sm">Add New</a>

	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
                <th>Nilai Huruf</th>
                <th>Predikat</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
            @php
                $i = 0;
            @endphp
                @foreach ($nilais as $nilai => $hasil)
            @php
                $i++;
            @endphp
			<tr>
                <td> {{ $i }} </td>
                <td>{{ $hasil->nilai_huruf }}</td>
                <td>{{ $hasil->predikat }}</td>
                <td>
                    <form action="{{ route('nilai.destroy',$hasil->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('nilai.show',$hasil->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('nilai.edit',$hasil->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $nilais->links() }}
@endsection
