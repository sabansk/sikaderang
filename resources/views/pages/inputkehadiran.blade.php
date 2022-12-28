@extends('layouts.main')

@section('contentUser')
@include('layouts/sidebarIntern')
<!-- Main content -->
<section class="content">
  <div class="container-fluid col-md-6" enctype="multipart/form-data">
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
            <label>Jam Kedatangan/Kepulangan</label>
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
                  console.log(`Latitude: ${latitude} Longitude: ${longitude}`);
                });
              });
            </script>
          </div>

          <!-- Input Image -->
          <div class="form-group">
            <label>Masukkan Foto Saat Ini</label><br>
            <div class="card">
              <div id="my-camera" class="input-group input-group-appendd rounded-top justify-content-center"></div>
              <input type="button" value="Take Capture" onCLick = "take_capture()" class="btn btn-secondary" style="border-top-left-radius: 0% !important; border-top-right-radius:0% !important">
              <input type="hidden" name="image" class="image-tag">
            </div>
            <label>Hasil Foto Anda</label><br>
            <div class="card">
              <div id="capture-results" class="input-group input-group-appendd rounded justify-content-center" style="object-fit: cover"></div>
            </div>
            <script language="JavaScript">

              Webcam.set({
                // width: width,
                height: 250,
                dest_height: 250,
                image_format: 'jpeg',
                jpeg_quality: 90
              });

              Webcam.attach("#my-camera");
              Webcam.stream();
              // const videoElement = document.getElementById('my_camera');
              // if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
              //   navigator.mediaDevices.getUserMedia({ video: true}).then(function(stream) {
              //     videoElement.srcObject = stream;
              //   })
              // }

              // const captureButton = document.getElementById("capture-button");
              // const canvas = document.getElementById("canvas");
              // const ctx = canvas.getContext("2d");

              function take_capture() {
                // html2canvas(videoElement).then((canvas) => {
                //   var capture = document.createElement("capture");
                //   capture.download = "attends.png";
                //   capture.href = canvas.toDataURL("image/png");
                //   capture.click();
                // });
                Webcam.snap(function(data_uri) {
                  $(".image-tag").val(data_uri);
                  document.getElementById('capture-results').innerHTML = '<img src="'+data_uri+'"/>';
                });
              }
              // console.log(`${data_uri}`);
              // captureButton.addEventListener("click", function() {
              //   ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
              //   const imageDataUrl = canvas.toDataURL();
              // });
            </script>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <script>
          // disini rencananya mauka simpankan script buat ambil opsi jam, tanggal, waktu dan koordinat gps buat disimpan ke database :)
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