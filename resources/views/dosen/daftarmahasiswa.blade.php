@extends('dosen.dlayout')

@section('title', 'Daftar Mahasiswa')

@section('content')
<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Daftar Mahsiswa</h1>
      </div>

      <div class="section-body">
        <div class="section-title">Tabel Mahasiswa</div>
        <div class="row">
          <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Mahasiswa yang aktif</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Konsentrasi</th>
                            <th>Angkatan</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($mahasiswa as $num => $m)
                          <tr>
                            <td class="text-center">{{$num +1}}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{$m->nim}}</td>
                            <td>{{$m->prodimaha->nama}}</td>
                            <td>{{$m->konsentrasimaha->nama}}</td>
                            <td>{{ $m->angkatanmaha->nama}}</td>
                            <td>{{$m->alamat}}</td>
                            <td>{{$m->jenis_kelamin}}</td>
                            <td>
                              <a href="/mahasiswa/edit/{{$m->id}}" class="btn btn-success">Edit</a>
                              <a href="/mahasiswa/hapus/{{$m->id}}" class="btn btn-danger hapus-confirm">Hapus</a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </section>
  </div>
@endsection
