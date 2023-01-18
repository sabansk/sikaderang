@extends('layouts.main')

@section('contentUser')
@include('layouts/sidebarIntern')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
                  <select class="form-control select2" id = "jenis_absen"style="width: 100%;">
                    <option selected>Silahkan pilih ...</option>
                    <option value="waktu_datang">Jam Kedatangan</option>
                    <option value="waktu_pulang">Jam Kepulangan</option>
                  </select>
            <script>
              // button post event
            </script>
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
            <input type="text" id="geolocation" class="btn-block" value="" readonly=true />

            <script>
              //option
              const options = {
                enableHighAccuracy: true,
                timeout: 60000
              };

              function error(err) {
                console.warn(`ERROR(${err.code}): ${err.message}`);
              }

              document.getElementById('getLocationButton').addEventListener('click', () => {
                navigator.geolocation.getCurrentPosition((position,err,options) => {
                  const latitude = position.coords.latitude;
                  const longitude = position.coords.longitude;
<<<<<<< HEAD
                  const result = (`Latitude: ${latitude} Longitude: ${longitude}`);
=======
                  const result = (`Latitude: ${latitude} Longitude: ${longitude}`).toString();
                  document.getElementById("geolocation").value = result;

>>>>>>> f2d0868d16663d87dca833e2b31d17426c9f0e71
                });
              });
            </script>
          </div>

          <!-- Input Image -->
          <div class="form-group">
            <label>Masukkan Foto Saat Ini</label><br>
            <div class="card">
              <div id="my-camera" class="img-fluid bg-dark rounded-top embed-responsive align-center" style="object-fit: cover; width: 100%" autoplay></div>
              <input type="button" value="Ambil Gambar" onCLick ="take_capture()" class="btn btn-info" style="border-top-left-radius: 0% !important; border-top-right-radius:0% !important">
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
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary" id="setor_absen">Submit</button>
          <script>
<<<<<<< HEAD
            // @section('script')
            <script type="text/javascript">
            
             $('body').on('click', '#btn-create-post', function () {
=======
            // button
          $('body').on('click', '#btn-create-post', function () {
>>>>>>> f2d0868d16663d87dca833e2b31d17426c9f0e71
            // open modal
            $('modal-create').modal('show');
          });

         
          $('#setor_absen').click(function(e) {
            e.preventDefault();

            // define var
            let jenis_absen = $('#jenis_absen').val();
            let waktu_absen = $('#dateTimeInput').val();
            let lokasi_absen = $('getLocationButton').val();
            let foto_absen = $('capture_results').val();
            let token = "{{ csrf_token() }}";

            // ajax momen
            $.ajax([
<<<<<<< HEAD
              
              url : '/submit', // sesuai di route
              type : "POST",
              cache : false,
              data : {
=======
              url: '/posts',
              type: "POST",
              cache: false,
              data: {
>>>>>>> f2d0868d16663d87dca833e2b31d17426c9f0e71
                "jenis_absensi" : jenis_absen,
                "jam" : waktu_absen,
                "geoloc" : lokasi_absen
                "foto_absensi" : foto_absen,
                "_token" : token
              },
              success: function(response) {
                $wal.fire({
                  type: 'success'
                  icon: 'success'
                  title: '$(response.message)',
                  showConfirmButton: false,
                  timer: 90
                });

                // bismillah proses post disini
                let post = `

                  <tr id="index_$(response.data.id}">
                      <td>${response.data.jenis_absen}</td>
                      <td>${response.data.waktu_absen}</td>
                      <td>${response.data.lokasi_absen}</td>
                      <td>${response.data.foto_absen}</td>
                `;

                $('#table-posts').prepend(post);

                $('#jenis_absen').val('');
                $('#waktu_absen').val('');
                $('#lokasi_absen').val('');
                $('#foto_absen').val('');

                $('modal-create').modal('hide');
              }

              error:function(error) {

                if(error.responseJSON.jenis_absen[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.title[0]);

                }

                if(error.responseJSON.waktu_absen[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.title[0]);
                }

                if(error.responseJSON.lokasi_absen[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.title[0]);
                }

                if(error.responseJSON.foto_absen[0]) {

                  //show alert
                  $('#alert-title').removeClass('d-none');
                  $('#alert-title').addClass('d-block');

                  //add message to alert
                  $('#alert-title').html(error.responseJSON.title[0]);

                }
              }
            ]);

          });
            </script>
            @endsection
         
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