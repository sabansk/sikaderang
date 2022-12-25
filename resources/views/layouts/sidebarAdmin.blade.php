<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand">
      <img src="AdminLTE\dist\img\gowa.png" alt="Gowa Logo" class="brand-image">
      <img src="AdminLTE\dist\img\sikaderang.png" alt="Sikaderang Logo" class="brand-text brand-image-xl" style="margin-left: 0.25cm">
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas x' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas x</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
  </div>
</aside>