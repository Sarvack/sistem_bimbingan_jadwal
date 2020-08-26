@extends('dosen.dlayout')

@section('title', 'Edit Dosen')

@section('content')
<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Dosen</h1>
      </div>

      <div class="section-body">
        <div class="section-title">Form Edit Dosen</div>
        <div class="row">
          <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Isi data dengan benar.</h4>
                  </div>
                  <div class="card-body">
                      @if ($errors->any())
                        <div class="alert alert-info">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <form method="POST" action="/dosen/postedit/{{$edit->profil_id}}" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Nama</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nama" value="{{ $edit->nama }}" name="nama">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $edit->email }}" name="email">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Nomor Telepon</label>
                        <input type="number" class="form-control" id="no_telp" placeholder="089777777777  " value="{{ $edit->dosenuser->no_telp }}" name="no_telp">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputNIP">NIP</label>
                        <input type="number" class="form-control" id="nip" placeholder="0000000" value="{{ $edit->dosenuser->nip }}" name="nip">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputNIDN">NIDN</label>
                        <input type="number" class="form-control" id="inputAddress" placeholder="00000000" value="{{ $edit->dosenuser->nidn }}" name="nidn">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputNIP">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Jl.Suka Maju, No.13" value="{{ $edit->dosenuser->alamat }}" name="alamat">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Re-type your Password" name="password">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPassword4">Picture</label>
                        <input type="file" class="form-control" id="foto" placeholder="Masukkan fotomu" name="foto">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-primary">Submit</button>
                    &nbsp;
                    <a href="/dosen/semua" class="btn btn-danger">Cancel</a>
                  </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
