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
              Attendance
            </h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Pie chart - Attendance -->
              <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                <!-- ./col -->
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="30" data-width="120" data-height="120" data-fgColor="#f56954">
                  <div class="knob-label">data-width="120"</div>
                </div>
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
              Location History
            </h3>
          </div>
          <div class="card-body">
            <div id="world-map" style="height: 300px; width: 100%;"></div>
          </div>
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

        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <canvas class="chart" id="line-chart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
      </div>
    </div>
  </section>
</section>

@endsection