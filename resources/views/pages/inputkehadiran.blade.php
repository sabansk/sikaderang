@extends('layouts.main')

@section('contentUser')
@include('layouts/sidebarIntern')
<!-- Main content -->
<section class="content">
  <div class="container-fluid col-sm-6" enctype="multipart/form-data">
    @if(session()->has('success'))
    <div class="alert alert-primary" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><strong>Masukkan Presensi Disini</strong></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="/submit" method="POST">
        @csrf
        <div class="card-body">
          <!-- Types of Presences -->
          <div class="form-group">
            <label>Jam Kedatangan / Kepulangan</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option id="waktu_datang" selected="selected">Jam Kedatangan</option>
                    <option id="waktu_pulang">Jam Kepulangan</option>
                  </select>
          </div>

          <!-- Date and time -->
          <div class="form-group" id="timestamp_input">
            <label>Tanggal & Waktu saat ini:</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="dateString" style="object-fit: cover">
              <div onload="insertDateTime()" class="input-group date" id="reservationdatetime" data-target-input="nearest">
                  <input type="text" id="dateTimeInput" name="dateTimeInput" value="{{ Carbon\Carbon::now()->timezone('Asia/Makassar')->format('Y-m-d H:i:s') }}" class="form-control datetimepicker-input"/>
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
            <script>
              document.getElementById("timestamp_input").style.display = "none";
              function insertDateTime() {
                var today = new Date();
                var dd = String(today.getDate()).padstart(2,'0');
                var mm = String(today.getMonth() + 1).padstart(2, '0');
                var yyyy = today.getFullYear();
                var hh = String(today.getHours().padstart(2, '0'));
                var mm = String(today.getMinutes().padstart(2, '0'));
                var ss = String(today.getSeconds()).padstart(2, '0');
                today = yyyy + '-' + mm + '-' + dd + ' ' + hh + ':' + mm + ':' + ss;
                document.getElementById("dateTimeInput").value = today;
              }
            </script>
          </div>

          <!-- Input Location -->
          <div class="form-group">
            <label>Masukkan Lokasi Saat Ini</label>
            <button type="button" id="getLocationButton" class="btn btn-block btn-info">Simpan Lokasi</button>
            <script>
              document.getElementById('getLocationButton').addEventListener('click', () => {
                navigator.geolocation.getCurrentPosition((position) => {
                  const latitude = position.coords.latitude;
                  const longitude = position.coords.longitude;
                  const result = (`Latitude: ${latitude} Longitude: ${longitude}`).toString();
                });
              });
            </script>
          </div>

          <!-- Input Image -->
          <div class="form-group">
            <label>Masukkan Foto Saat Ini</label><br>
            <div class="card">
              <div id="my-camera" class="img-fluid bg-dark rounded-top embed-responsive align-center" style="object-fit: cover; width: 100%" autoplay></div>
              <input type="button" value="Ambil Gambar" onCLick ="take_capture()" class="btn btn-secondary" style="border-top-left-radius: 0% !important; border-top-right-radius:0% !important">
              <input type="hidden" name="image" class="image-tag">
            </div>
            <div id="capture-results" class="text-center">Hasil Foto Anda akan Tampil Disini</div>
            <script language="JavaScript">
              Webcam.set({
                  // width: 490,
                  height: 250,
                  dest_height: 250,
                  image_format: 'jpeg',
                  jpeg_quality: 90
              });

              Webcam.attach('#my-camera');

              function take_capture() {
                  Webcam.snap( function(data_uri) {
                      $(".image-tag").val(data_uri);
                      document.getElementById('capture-results').innerHTML = '<img src="'+data_uri+'" class="img-thumbnail" style="width:100%; height: auto"/>';
                  });
              }
            </script>
            {{-- <script>
              Webcam.set({
                // width: videoWidth,
                height: 250,
                // dest_width: 140.625,
                // dest_height: 250,
                image_format: 'jpeg',
                jpeg_quality: 90
              });

              Webcam.attach("#my-camera");

              function take_capture() {
                Webcam.snap(function(data_uri) {
                  $(".image-tag").val(data_uri);
                  document.getElementById('capture-results').innerHTML = '<img src="'+data_uri+'" class="img-thumbnail"/>';
                });
              }
            </script> --}}
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <script>
            <?php
            use Illuminate\Database\Console\Seeds\WithoutModelEvents;
            use Illuminate\Database\Seeder;
            use Illuminate\Support\Facades\DB;
            use Illuminate\Support\Str;
            use Illuminate\Support\Facades\Hash;

            class RekapAbsen 
            {
              public function post()
              {
                
              }
            }
            
            ?>
          </script>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection