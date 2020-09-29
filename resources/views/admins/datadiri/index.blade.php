@extends('admins.layout')
@section('sub-judul', 'Edit Data Diri')
@section('content')

{{-- @if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session('success') }}
	</div>
@endif --}}
	 <!-- Main Content -->
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
                    <img alt="image" src="{{ url('/picture/foto-register/'.$admin['foto']) }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Nama</div>
                      <div class="profile-widget-item-value">{{ Auth::guard('cekTipe')->user()->nama }}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posisi</div>
                        <div class="profile-widget-item-value">{{ Auth::guard('cekTipe')->user()->tipe }}</div>
                      </div>
                      {{-- <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div> --}}
                    </div>
                  </div>
                  {{-- <div class="profile-widget-description">
                    <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div> --}}
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
    <form action="{{ route('profile.update',Auth::guard('cekTipe')->user()->profil_id) }}" method="POST" enctype="multipart/form-data">
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
                    <strong>Email</strong>
                    <input type="email" name="email" value="{{ Auth::guard('cekTipe')->user()->email }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto</strong>
                    <input type="file" name="foto" class="form-control">
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
