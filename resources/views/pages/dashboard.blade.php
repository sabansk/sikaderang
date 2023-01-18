@extends('layouts.main')

@section('contentUser')

@include('layouts/sidebarIntern')

<section class="content">
  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="AdminLTE/dist/img/gowa.png" alt="SikaderangLogo" height="60" width="60">
  </div> --}}
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1" style="color: var(--dune)"></i>
              {{ $title2 }}
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Pie chart - Attendance -->
              <div class="chart tab-pane active text-center" id="sales-chart" style="position: relative; height: 300px;">
                <!-- ./col -->
                <input class="knob" data-readonly="true" value="{{ 30 }}" data-width="250" data-height="250" data-fgColor="#f56954" style="align-items: center">
                <div class="knob-label text-center" style="padding: 20px"><h4 style="font-weight: 600">Hari</h4></div>
                {{-- <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas> --}}
              </div>
            </div>
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">
        <!-- Location card -->
        <div class="card bg-gradient-primary">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-map-marker-alt mr-1" style="color: var(--soapstone)"></i>
              Riwayat Lokasi
            </h3>
          </div>
          <div id="map" class="card-body" style="min-height: 341px"></div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    <!-- /.card -->
  </div><!-- /.container-fluid -->
  <!-- solid sales graph -->
  <section class="col-lg-12 connectedSortable">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-line mr-1" style="color: var(--dune)"></i>
          Riwayat Jam Datang / Pulang
        </h3>

        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <canvas class="chart" id="line-chart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
        <div class="input-group col-4">
          <input class="form-control" type="month" onchange="filterChart(this)" />
          <div class="input-group-append">
            <button class="btn btn-default" onclick="reset()">Reset</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
@endsection