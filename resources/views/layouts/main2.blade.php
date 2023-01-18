<!--
  main2.blade.php:
  Template utama untuk dashboard pada Admin dan Super Admin
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <link rel="stylesheet" href="AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Leaflet Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
  <!-- Leaflet for Map -->
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
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
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts/navbar')
  <!-- /.navbar -->

  <!-- Sidebar -->
  @yield('sidebar')
  <!-- /.sidebar -->

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
                  <canvas id="attendances-chart" style="max-height: 250px"></canvas>
                  <div class="input-group col-8">
                    <input class="form-control" type="month" onchange="filterChart(this)" />
                    <div class="input-group-append">
                      <button class="btn btn-default" onclick="reset()">Reset</button>
                    </div>
                  </div>
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
                  <!-- Chart for Background -->
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
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                      <h3 class="card-title text-center">Riwayat Lokasi Anak PKL</h3>
                  </div>
              </div>
              <div id="map" class="card-body" style="min-height: 341px"></div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts/footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Moment.min.js -->
<script src="AdminLTE/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="AdminLTE/plugins/chart.js/Chart.min.js"></script> --}}
<!-- Date fns from Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- overlayScrollbars -->
<script src="AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Admin & Super Admin Dashboard --> <!-- Jika diaktifkan, maka akan mengganggu filterChart() -->
<script src="AdminLTE/dist/js/pages/admin&SuperAdmin.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.js"></script>

</body>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="AdminLTE/dist/js/pages/dashboard3.js"></script>
</html>
