<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: var(--soapstone)"><i class="fas fa-bars fa-1-5x"></i></a>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Profile Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link navbar-icon" data-toggle="dropdown" href="#">
        <img src="AdminLTE\dist\img\Profile.png" alt="Profile Icon" width="35px" height="35px">
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nama User
              </h3>
              <p class="text-sm">Nama Dinas User</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
      </div>
    </li>
    <!-- Help Menu -->
    <a class="nav-link navbar-icon" href="/help">
      {{-- Perlu dibuatkan condition untuk target page helpUser, helpAdmin, helpSuperAdmin --}}
      <img src="AdminLTE\dist\img\Help.png" alt="Help Icon" width="35px" height="35px">
    </a>
    <!-- Log Out Menu -->
    <form action="">
      @csrf
      <li class="nav-item">
        <a class="nav-link navbar-icon" href="/login">
          <img src="AdminLTE\dist\img\Logout.png" alt="Logout" width="35px" height="35px">
        </a>
      </li>
    </form>
  </ul>
</nav>