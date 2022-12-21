@extends('layouts.main')

@section('contentUser')

<section class="content">
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
                <input class="knob" data-readonly="true" value="{30}" data-width="250" data-height="250" data-fgColor="#f56954" style="align-items: center">
                <div class="knob-label text-center"><strong>Kehadiran</strong><br>dari Total {67} Hari</div>
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
              Location History
            </h3>
          </div>
          <iframe class="rounded-bottom" height="341" style="border:0" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=API_KEY&q=Space+Needle,Seattle+WA"></iframe>
          {{-- <div id="world-map" class="card-body" style="min-height: 341px !important; padding: 0 !important">
            <div id="world-map" style="height: 300px; width: 100%;"></div>
          </div> --}}
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
    <div class="card bg-gradient-info">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-line mr-1" style="color: var(--soapstone)"></i>
          Check In/Out History
        </h3>
      </div>
      <div class="card-body">
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
        {{-- <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
        {{-- <div class="chart">
          <div id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
        </div> --}}
      </div>
    </div>
  </section>
</section>

@endsection