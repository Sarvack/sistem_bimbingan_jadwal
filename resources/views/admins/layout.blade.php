<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bimo &mdash; Jado Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ URL::asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('backend/assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('backend/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>s
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ URL::asset('backend/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('cekTipe')->user()->nama }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            {{-- <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a> --}}
              <div class="dropdown-divider"></div>
              <a href="{{ route('logoutPengguna') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logoutPengguna') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
              {{-- <a href="{{ url('/logout') }}" class="dropdown-item has-icon text-danger"> logout </a> --}}
              {{-- <a href="/logout/pengguna" >
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
              {{-- <li><a href="{{route('logout')}}"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li> --}}
              {{-- <a href="#" onclick="document.getElementById('logout-form').submit();"> Logout</a>
                <form id="logout-form" action="{{ route('logoutPengguna') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form> --}}
            </div>
          </li>
        </ul>
      </nav>

      @include('admins.partials.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('sub-judul')</h1>
          </div>
          @yield('content')
          <div class="section-body">
          </div>
        </section>
      </div>

      @include('admins.partials.footer')
