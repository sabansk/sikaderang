<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="AdminLTE\dist\img\gowa.png">
    <title>Sikaderang | {{ $title }}</title>

    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="AdminLTE/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="AdminLTE/plugins/summernote/summernote-bs4.min.css">
    <!-- icons -->
    <link rel="stylesheet" href="AdminLTE\plugins\fontawesome-free\css\all.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="AdminLTE/dist/img/gowa.png" alt="SikaderangLogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        @include('layouts/navbar')
        <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand">
      <img src="AdminLTE\dist\img\gowa.png" alt="Gowa Logo" class="brand-image">
      <img src="AdminLTE\dist\img\sikaderang.png" alt="Sikaderang Logo" class="brand-text brand-image-xl"
          style="margin-left: 0.25cm">
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
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 1' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 2' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 2' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 2' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 2' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 5</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 2' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 6</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/AdminDashboard"
                    class="nav-link {{ $title === 'Dinas 2' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dinas 7</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
  </div>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{08.00}</h3>

              <p>Rata-Rata Jam Kedatangan (Per Hari)</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-alarm-clock" style="transform: scaleX(-1)"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{16.00}</h3>

              <p>Rata-Rata Jam Kepulangan (Per Hari)</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-alarm-clock"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Rekap Total Kehadiran (Per Bulan)</h3>
                </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Jumlah Kehadiran per Hari</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Sejak Pekan Lalu</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="attendances-chart" height="227"></canvas>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6 connectedSortable">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title my-auto">
                  Jumlah Anak PKL
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" data-target="#tab-gender"><button id="button-gender" style="all:unset">Jenis Kelamin</button></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" data-target="#tab-background"><button id="button-background" style="all:unset">Background</button></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Gender -->
                <div class="chart tab-pane active" id="tab-gender" style="position: relative; height: 300px;">
                  <!-- Chart for jenis kelamin -->
                  <canvas id="chart-gender" height="200"></canvas>
                </div>
                <!-- Morris chart - Background -->
                <div class="chart tab-pane" id="tab-background" style="position: relative; height: 300px;">
                  <canvas id="chart-background" height="200"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; Dinas Komunikasi, Informatika, Statistik, dan Persandian Kabupaten Gowa
</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="AdminLTE/dist/js/adminlte.js"></script>

<!-- Chart.js -->
<script src="AdminLTE/plugins/chart.js/Chart.min.js"></script>
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="AdminLTE/dist/js/pages/dashboard3.js"></script> --}}


<!-- jQuery Knob Chart -->
<script src="AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Moment.min.js -->
<script src="AdminLTE\plugins\moment\moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.js"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="AdminLTE/dist/js/demo.js"></script> --}}
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script> --}}
<!-- Super Admin Dashboard -->
<script src="AdminLTE/dist/js/pages/SuperAdmin.js"></script>
</body>
</html>