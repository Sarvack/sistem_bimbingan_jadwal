@extends('dosen.dlayout')

@section('title', 'Daftar Dosen')

@section('content')
<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Daftar Dosen</h1>
      </div>

      <div class="section-body">
        <div class="section-title">Tabel Dosen</div>
        <div class="row">
          <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Dosen Terkini</h4>
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
                            <th>NIP</th>
                            <th>NIDN</th>
                            <th>Email</th>
                            <th>No.tlp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $num => $u)
                          <tr>
                            <td class="text-center">{{$num +1}}</td>
                            <td>{{ $u->nama }}</td>
                            <td>{{$u->dosenuser->nip}}</td>
                            <td>{{$u->dosenuser->nidn}}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{$u->dosenuser->no_telp}}</td>
                            <td>{{$u->dosenuser->alamat}}</td>
                            <td>
                              <a href="/dosen/edit/{{$u->profil_id}}" class="btn btn-success">Edit</a>
                              <a href="/dosen/hapus/{{$u->profil_id}}" class="btn btn-danger hapus-confirm">Hapus</a>
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
