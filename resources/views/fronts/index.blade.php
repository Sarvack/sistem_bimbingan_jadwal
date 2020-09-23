@extends('fronts.layout')

{{-- @section('slider')
    @include('fronts.partials.slider')
@endsection --}}

@section('content')
    <!-- service_area_start  -->
    <div class="services-area">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ URL::asset('welcome/assets/img/icon/icon1.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <a href="{{ route('adminDashboard') }}"><h3>Admin</h3></a>
                            <p>Login to continue</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ URL::asset('welcome/assets/img/icon/icon1.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <a href="{{ route('dosenDashboard') }}"><h3>Dosen</h3></a>
                            <p>Login to continue</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ URL::asset('welcome/assets/img/icon/icon1.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <a href="{{ route('mahasiswaDashboard') }}"><h3>Mahasiswa</h3></a>
                            <p>Login to continue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area_start  -->
@endsection
