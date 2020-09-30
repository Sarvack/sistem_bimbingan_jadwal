@extends('admins.layout')
@section('sub-judul', 'Edit Data Diri')
@section('content')

        <section class="section">
          <div class="section-body">
          <h2 class="section-title">Hi, {{ Auth::guard('cekTipe')->user()->nama }}</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="{{ url('/picture/foto-register/'.$mahasiswa['foto']) }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Nama</div>
                      <div class="profile-widget-item-value">{{ Auth::guard('cekTipe')->user()->nama }}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posisi</div>
                        <div class="profile-widget-item-value">{{ Auth::guard('cekTipe')->user()->tipe }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
{{-- alertt fuk --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- end alert fuk --}}
    <form action="{{ route('datadiri.update',Auth::guard('cekTipe')->user()->profil_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-header">
          <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama</strong>
                <input type="text" name="nama" value="{{ Auth::guard('cekTipe')->user()->nama }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prodi </strong>
                    <select class="form-control" name="prodi_id">
                        <option value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->prodi_id }}">{{ Auth::guard('cekTipe')->user()->mahasiswauser->prodimaha->nama }}</option>
                        @foreach($prodi as $top)
                                <option value="{{ $top->id }}">{{ $top->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Konsentrasi</strong>
                    <select class="form-control" name="konsentrasi_id">
                        <option value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->konsentrasi_id }}">{{ Auth::guard('cekTipe')->user()->mahasiswauser->konsentrasimaha->nama }}</option>
                            @foreach ($prodik as $pk)
                                <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Angkatan </strong>
                    <select class="form-control" name="angkatan_id">
                        <option value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->angkatan_id }}">{{ Auth::guard('cekTipe')->user()->mahasiswauser->angkatanmaha->nama }}</option>
                            @foreach ($angkatan as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIM </strong>
                    <input type="number" name="nim" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->nim }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIK </strong>
                    <input type="text" name="nik" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->nik }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama </strong>
                    <input type="text" name="nama" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->nama }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempat Lahir </strong>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->tempat_lahir }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Lahir </strong>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->tanggal_lahir }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin </strong>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->jenis_kelamin }}">{{ Auth::guard('cekTipe')->user()->mahasiswauser->jenis_kelamin }}</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Agama </strong>
                    <input type="text" name="agama" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->agama }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat</strong>
                    <input type="text" name="alamat" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->alamat }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No. Telepon </strong>
                <input type="number" name="no_telp" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->no_telp }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Biaya Kuliah</strong>
                    <select class="form-control" name="biaya_kuliah">
                        <option value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->biaya_kuliah }}">{{ Auth::guard('cekTipe')->user()->mahasiswauser->biaya_kuliah }}</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Sendiri">Sendiri</option>
                            <option value="Sponsor">Sponsor</option>
                            <option value="Lain-lain">Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Ayah</strong>
                    <input type="text" name="nama_ayah" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->nama_ayah }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Ibu</strong>
                <input type="text" name="nama_ibu" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->nama_ibu }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No. Telp OrangTua</strong>
                    <input type="number" name="no_telp_ortu" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->no_telp_ortu }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ijazah Terakhir</strong>
                    <input type="text" name="ijazah_terakhir" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->ijazah_terakhir }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempat Kuliah</strong>
                    <select class="form-control" name="tempat_kuliah">
                        <option value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->tempat_kuliah }}">{{ Auth::guard('cekTipe')->user()->mahasiswauser->tempat_kuliah }}</option>
                            <option value="Singaraja">Singaraja</option>
                            <option value="Denpasar">Denpasar</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="text" name="keterangan" class="form-control" value="{{ Auth::guard('cekTipe')->user()->mahasiswauser->keterangan }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email </strong>
                    <input type="email" name="email" class="form-control" value="{{ Auth::guard('cekTipe')->user()->email }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password </strong>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto</strong>
                    <input type="file" name="foto" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>File Ijazah Terakhir</strong>
                    <input type="file" name="file_ijazah_terakhir" class="form-control">
                </div>
            </div>

        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      {{-- </div> --}}
@endsection
