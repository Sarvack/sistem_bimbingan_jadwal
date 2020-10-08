<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Bimo & Jado</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">BJ</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown">
            @if (Auth::guard('cekTipe')->user()->tipe == 'Admin Prodi')
            <a href="/admin/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            @endif
            @if (Auth::guard('cekTipe')->user()->tipe == 'Dosen')
            <a href="/dosen/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            @endif
            @if (Auth::guard('cekTipe')->user()->tipe == 'Mahasiswa')
            <a href="/mahasiswa/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            @endif
        </li>
        <li class="menu-header">Menus</li>
        {{-- Admin Only --}}
        @if (Auth::guard('cekTipe')->user()->tipe == 'Admin Prodi')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Prodi</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="/admin/prodi">Prodi</a></li>
              <li><a class="nav-link" href="/admin/konsentrasi">Prodi Konsentrasi</a></li>
              <li><a class="nav-link" href="/admin/topik">Prodi Topik</a></li>
            </ul>
          </li>
          <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/crud">Admin</a></li>
                <li><a class="nav-link" href="/admin/dosencrud">Dosen</a></li>
                <li><a class="nav-link" href="/admin/mahasiswacrud">Mahasiswa</a></li>
              </ul>
          </li>
          <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Penelitian</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/angkatan">Angkatan</a></li>
                <li><a class="nav-link" href="/admin/nilai">Nilai dan Predikat</a></li>
                <li><a class="nav-link" href="/admin/tahapan">Tahapan</a></li>
              </ul>
          </li>
        @endif
        {{-- Dosen Only --}}

        {{-- Mahasiswa Only --}}
        @if (Auth::guard('cekTipe')->user()->tipe == 'Mahasiswa')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Penelitian</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="/mahasiswa/penelitian">Pengajuan Judul</a></li>
            </ul>
        </li>
        @endif
     </aside>
  </div>
