<!-- partial:partials/_sidebar.html -->
<div class="sidebar-menu">
    <nav class="nav">
      <div class="nav-item">
        <a href="index.html" class="nav-link">
          <i class="menu-icons mdi mdi-signal-cellular-outline"></i><span class="menu-title">Dashboard</span>
        </a>
      </div>
      <div class="nav-item nav-category">AKADEMIK</div>
        <div class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown" aria-expanded="false" aria-controls="dashboard-dropdown">
            <i class="menu-icons mdi mdi-locker-multiple"></i>
            <span class="menu-title">Prodi</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dashboard-dropdown">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/prodi') }}">Prodi</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="blank-page.html">Prodi Konsentrasi</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/topik') }}">Prodi Topik</a>
                </li>
            </ul>
            </div>
        </div>
        <div class="nav-item">
          </div>
          <div class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#resources-dropdown" aria-expanded="false" aria-controls="dashboard-dropdown">
              <i class="menu-icons mdi mdi-content-duplicate"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="resources-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/crud') }}">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blank-page.html">Dosen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blank-page.html">Mahasiswa</a>
                  </li>
              </ul>
            </div>

    </nav>
  </div>
  <!-- partial -->
