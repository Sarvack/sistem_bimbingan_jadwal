@extends('dosen.dlayout')

@section('title', 'Edit Mahasiswa')

@section('content')
<!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Mahasiswa</h1>
      </div>

      <div class="section-body">
        <div class="section-title">Form Edit Mahasiswa</div>
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
                  <form method="POST" action="/dosen/posteditmahasiswa/{{$edit1->profil_id}}" enctype="multipart/form-data">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Nama</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nama" value="{{ $edit->nama }}" name="nama">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">NIM</label>
                        <input type="number" class="form-control" id="nim" placeholder="NIM" value="{{ $edit->nim }}" name="nim">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">NIK</label>
                        <input type="number" class="form-control" id="nik" placeholder="Nomor NIK di KTP" value="{{ $edit->nik }}" name="nik">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputNIP">Prodi</label>
                        <select class="form-control form-control-sm" name="prodi_id">
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}" {{$edit->prodi_id == $p->id ? 'selected="selected"' : '' }}>{{ $p->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputNIDN">Konsentrasi</label>
                          <select class="form-control form-control-sm" name="konsentrasi_id">
                            @foreach ($prodik as $k)
                                <option value="{{ $k->id }}" {{$edit->konsentrasi_id == $k->id ? 'selected="selected"' : '' }}>{{ $k->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputAngkatan">Angkatan</label>
                          <select class="form-control form-control-sm" name="angkatan_id">
                            @foreach ($angkatan as $a)
                              <option value="{{ $a->id }}" {{$edit->angkatan_id == $a->id ? 'selected="selected"' : '' }}>{{ $a->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Tempat Kuliah</label>
                        <select class="form-control form-control-sm" name="tempat_kuliah">
                              @php
                                $kuliah1 = "Denpasar";
                                $kuliah2 = "Singaraja";
                              @endphp
                              <option value="{{$kuliah1}}" {{$edit->tempat_kuliah == $kuliah1 ? 'selected="selected"' : '' }}>{{$kuliah1}}</option>
                              <option value="{{$kuliah2}}" {{$edit->tempat_kuliah == $kuliah2 ? 'selected="selected"' : '' }}>{{$kuliah2}}</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Biaya Kuliah</label>
                          <select class="form-control form-control-sm" name="biaya_kuliah">
                            @php
                                $Mandiri = "Sendiri";
                                $Mainstream = "Orang Tua";
                                $Selebgram = "Sponsor";
                                $Gaje = "Lain-lain";
                              @endphp
                              <option value="{{$Mandiri}}" {{$edit->biaya_kuliah == $Mandiri ? 'selected="selected"' : '' }}>{{$Mandiri}}</option>
                              <option value="{{$Mainstream}}" {{$edit->biaya_kuliah == $Mainstream ? 'selected="selected"' : '' }}>{{$Mainstream}}</option>
                              <option value="{{$Selebgram}}" {{$edit->biaya_kuliah == $Selebgram ? 'selected="selected"' : '' }}>{{$Selebgram}}</option>
                              <option value="{{$Gaje}}" {{$edit->biaya_kuliah == $Gaje ? 'selected="selected"' : '' }}>{{$Gaje}}</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">IPK (Indeks Prestasi Kumulatif)</label>
                        <input type="number" class="form-control" id="ipk" placeholder="IPK anda" name="ipk" value="{{ $edit->ipk }}">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Email</label>
                        <input type="email" class="form-control" id="inputPassword4" placeholder="Email" name="email" value="{{ $edit1->email }}" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password" name="password">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Nomor Telepon</label>
                        <input type="no_telp" class="form-control" id="no_telp" placeholder="Masukkan fotomu" name="no_telp" value="{{ $edit->no_telp }}" >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir Anda" name="tanggal_lahir" value="{{ $edit->tanggal_lahir }}">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Tempat lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir Anda" name="tempat_lahir" value="{{ $edit->tempat_lahir }}" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Agama</label>
                        <input type="text" class="form-control" id="agama" placeholder="Masukkan fotomu" name="agama" value="{{ $edit->agama }}" >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Jenis Kelamin</label>
                            <select class="form-control form-control-sm" name="jenis_kelamin">
                              @php
                                $l = "Laki-Laki";
                                $p = "Perempuan";
                              @endphp
                              <option value="{{$l}}" {{$edit->jenis_kelamin == $l ? 'selected="selected"' : '' }}>{{$l}}</option>
                              <option value="{{$p}}" {{$edit->jenis_kelamin == $p ? 'selected="selected"' : '' }}>{{$p}}</option>
                            </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" placeholder="Nama Ayah Anda" name="nama_ayah" value="{{ $edit->nama_ayah }}" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" placeholder="Nama Ibu Anda" name="nama_ibu" value="{{ $edit->nama_ibu }}" >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">No Telepon Orang Tua</label>
                        <input type="number" class="form-control" id="no_telp_ortu" placeholder="No Telepon Orang Tua" name="no_telp_ortu" value="{{ $edit->no_telp_ortu }}" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukkan fotomu" name="alamat" value="{{ $edit->alamat }}" > 
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" placeholder="Suka_suka Elu lah" name="keterangan" value="{{ $edit->keterangan }}" >
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Ijazah Terakhir</label>
                        <input type="text" class="form-control" id="ijazah_terakhir" placeholder="ijazah Terakhir" name="ijazah_terakhir" value="{{ $edit->ijazah_terakhir }}" >
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Foto</label>
                        <input type="file" class="form-control" id="foto" placeholder="Masukkan fotomu" name="foto">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">File Ijazah Terakhir</label>
                        <input type="file" class="form-control" id="file_ijazah_terakhir" placeholder="Masukkan fotomu" name="file_ijazah">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-primary">Submit</button>
                    &nbsp;
                    <a href="/mahasiswa/semua" class="btn btn-danger">Cancel</a>
                  </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
