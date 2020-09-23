@extends('fronts.layout')

@section('slider')
    @include('fronts.partials.slider')
@endsection

@section('content')
    <!-- service_area_start  -->
    <div class="service_area gray_bg">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-school"></i>
                        </div>
                        <div class="service_info">
                            <h4><a href="{{ route('mahasiswaDashboard') }}">Mahasiswa</a></h4>
                            <p>Login</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="service_info">
                            {{-- <h4><a href="{{ route('dosenRegister') }}">Dosen</a></h4> --}}
                            <h4><a href="{{ route('dosenDashboard') }}">Dosen</a></h4>
                            <p>Login</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="service_info">
                            {{-- <h4><a href="{{ route('adminRegister') }}">Admin Prodi</a></h4> --}}
                            <h4><a href="{{ route('adminDashboard') }}">Admin Prodi</a></h4>
                            <p>Login</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area_start  -->
@endsection
