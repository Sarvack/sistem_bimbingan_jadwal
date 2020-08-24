<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bimo & Jado</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/css/demo_6/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ URL::asset('admin/assets/images/favicon.png') }}" />

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
          <div class="hero-banner">
            @include('admin.partials.navbar')
          </div>
          <div class="content-wrapper container-wrapper-width">
            @include('admin.partials.sidebar')
            <div class="content-area">
              <div class="page-header">
                  {{-- Dinamis --}}
                <h4 class="page-title">Dashboard</h4>
                <div class="page-header-content">
                  <div class="server-load">
                    <p>Server Load</p>
                    <div class="chart-wrapper">
                      <canvas id="server-load-data-chart" height="20" width="80"></canvas>
                    </div>
                    <p class="font-weight-bold">50%</p>
                  </div>
                  <div class="dropdown mt-3 mt-sm-0 d-none d-sm-block">
                    <button class="btn dropdown-toggle" type="button" id="report-weeks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Today : <span class="text-white">Jan 23</span></button>
                    <div class="dropdown-menu" aria-labelledby="report-weeks">
                      <a class="dropdown-item" href="#">Yesterday</a>
                      <a class="dropdown-item" href="#">Last Week</a>
                      <a class="dropdown-item" href="#">Last Month</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content-area-inner">
                <div class="card h-100 w-100">
                  <div class="card-body">
                    @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ URL::asset('admin/assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/shared/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/shared/misc.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/shared/settings.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/shared/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ URL::asset('admin/assets/js/demo_6/dashboard.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/demo_6/script.js') }}"></script>
    <!-- End custom js for this page-->
    @yield('footer_js')
  </body>
</html>
