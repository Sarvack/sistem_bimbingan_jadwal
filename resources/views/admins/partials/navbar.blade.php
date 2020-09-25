 <!-- partial:partials/_navbar.html -->
 <div class="navbar">
    <div class="container-wrapper-width">
      <div class="row w-100">
        <div class="col-2 col-md-4 navbar-col order-md-1">
          <a href="index.html" class="brand-logo">
            <img src="{{ URL::asset('admins/assets/images/logo_6.svg') }}" alt="logo">
          </a>
          <a href="index.html" class="brand-logo-mini">
            <img src="{{ URL::asset('admins/assets/images/logo-mini_6.svg') }}" alt="logo">
          </a>
        </div>
        <div class="d-none d-md-block col-md-4 navbar-col order-md-0">
          <ul class="nav">
              {{-- another nav goes here --}}
          </ul>
        </div>
        <div class="col-10 col-md-4 navbar-col order-md-3">
          <ul class="nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                    <p class="font-weight-light small-text mb-0"> Just now </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-settings m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                    <p class="font-weight-light small-text mb-0"> Private message </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                    <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown dropdown-h-style-1 pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item">Print Invoice<i class="dropdown-item-icon ti-printer"></i></a>
                <a class="dropdown-item">Copy<i class="dropdown-item-icon ti-files"></i></a>
                <a class="dropdown-item">CSV<i class="dropdown-item-icon ti-write"></i></a>
                <a class="dropdown-item">Share<i class="dropdown-item-icon ti-share"></i></a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="" alt="Profile image">
              @if (Auth::guard('dosen'))
                <span class="profile-text">{{ Auth::guard('dosen')->user()->nama }}</span>
              @endif

              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{ URL::asset('admins/assets/images/faces/face1.jpg') }}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::guard('cekTipe')->user()->nama }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::guard('cekTipe')->user()->email }}</p>
                </div>
                <a class="dropdown-item">My Profile<i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="/logout/pengguna">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-md-none align-self-center" type="button">
            <span class="mdi mdi-menu"></span>
          </button>
          <button class="chat-toggler d-md-none align-self-center" type="button">
            <span class="mdi mdi-dots-vertical"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->

