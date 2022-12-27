<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand">
      <img src="AdminLTE\dist\img\gowa.png" alt="Gowa Logo" class="brand-image">
      <img src="AdminLTE\dist\img\sikaderang.png" alt="Sikaderang Logo" class="brand-text brand-image-xl" style="margin-left: 0.25cm">
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Inspektorat Daerah' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inspektorat Daerah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Satuan Polisi Pamong Praja' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Satuan Polisi Pamong Praja (Satpol PP)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas Ketahanan Pangan' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas Ketahanan Pangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas Pemberdayaan Masyarakat Desa' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas Pemberdayaan Masyarakat Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas Pemberdayaan Perempuan dan Perlindungan Anak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas Perhubungan' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas Perhubungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas Pengendalian Penduduk dan Keluarga Berencana' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas Pengendalian Penduduk dan Keluarga Berencana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas Komunikasi, Informatika, Statistik dan Persandian' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas Komunikasi, Informatika, Statistik dan Persandian</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
  </div>
</aside>