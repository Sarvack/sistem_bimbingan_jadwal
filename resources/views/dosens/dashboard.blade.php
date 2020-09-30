@extends('admins.layout')
@section('sub-judul', 'Dosen Dashboard')
@section('content')

    <section class="section">

    {{-- will adding some feature --}}
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Users</h4>
              </div>
              <div class="card-body">
                1000
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>News</h4>
              </div>
              <div class="card-body">
                42
              </div>
            </div>
          </div>
        </div>

            <div class="col-lg-6 col-md-6 col-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Profile</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="{{ URL::asset('backend/assets/img/avatar/avatar-1.png') }}" alt="avatar">
                            <div class="media-body">
                            <div class="float-right text-primary"><a href="{{ route('datadiridosen.edit',Auth::guard('cekTipe')->user()->id) }}">Edit Profile</a></div>
                            <div class="media-title">{{ Auth::guard('cekTipe')->user()->nama }}</div>
                            <span class="text-small text-muted">{{ Auth::guard('cekTipe')->user()->tipe }}</span>
                            </div>
                        </li>
                        </ul>

                    </div>
                </div>
          </div>
      </div>

    </section>

@endsection



