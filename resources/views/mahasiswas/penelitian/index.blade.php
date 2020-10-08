@extends('admins.layout')
@section('sub-judul', 'Pengajuan Proposal')
@section('content')
<section class="section">

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pengajuan</h4>
            </div>
            <div class="card-body">
              <div class="alert alert-info">
                <b>Note!</b> Menu Pengajuan Judul merupakan menu yang Anda gunakan untuk melakukan pengelolaan Pengajuan Proposal Anda. Pada tahap awal, jika Anda belum memiliki data pengajuan, Anda bisa menambahkan data pengajuan ke SIsKA lalu kemudian bisa merubah data yang diunggah jika belum diverifikasi oleh Pengelola Prodi. Persiapkan beberapa data sebelum Anda mengajukan pada sistem, yaitu : judul, ringkasan, topik penelitian, file pengajuan, pembimbing 1 dan pembimbing 2.
              </div>
              <div class="form-group">
                <label>Judul Penelitian </label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Ringkasan/Abstrak Pengajuan</label>
                <textarea class="form-control"></textarea>
              </div>
            <div class="form-group">
                <label>Topik Penelitian</label>
                <select class="form-control select2" multiple="" name="topik_id[]">
                    @foreach($topiks as $topik)
                    <option value="{{ $topik->id }}">{{ $topik->nama }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>File Pengajuan</label>
                <input type="file" class="form-control">
              </div>
              <div class="section-title">Data Pembimbing</div>
              <div class="form-group">
                <label>Pembimbing 1</label>
                <select class="form-control">
                    @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Pembimbing 2</label>
                <select class="form-control">
                    @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
              <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
          </div>
        </div>
      </div>

  </section>
@endsection

