@extends('layouts.main')

@section('contentUser')

<!-- Main Sidebar Container -->
@include('layouts/sidebarSuperAdmin')

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="AdminLTE/dist/img/gowa.png" alt="SikaderangLogo" height="60" width="60">
</div>
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
@endsection