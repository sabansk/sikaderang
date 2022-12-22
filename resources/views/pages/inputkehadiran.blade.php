@extends('layouts.main')

@section('contentUser')
<!-- Main content -->
<section class="content">
  <div class="container-fluid col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><strong>Masukkan Presensi Disini</strong></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form>
        <div class="card-body">
          <!-- Types of Presences -->
          <div class="form-group">
            <label>Jam Kedatangan/Kepulangan</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Jam Kedatangan</option>
                    <option>Jam Kepulangan</option>
                  </select>
          </div>
          <!-- Date and time -->
          <div class="form-group">
            <script>
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
            <label>Tanggal & Waktu saat ini:</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="dateString" style="object-fit: cover">
              <div onload="insertDateTime()" class="input-group date" id="reservationdatetime" data-target-input="nearest">
                  <input type="text" id="dateTimeInput" name="dateTimeInput" value="{{ Carbon\Carbon::now()->timezone('Asia/Makassar')->format('Y-m-d H:i:s') }}" class="form-control datetimepicker-input"/>
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
          </div>
          <!-- Input Image -->
          <div class="form-group">
            <label>Foto saat ini:</label><br>
            <div class="card">
              <video class="input-group input-group-appendd rounded-top" id="camera-capture" width="350" height="200" style="object-fit: cover" autoplay></video>
              <script>
                var videoElement = document.getElementById('camera-capture');
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                  navigator.mediaDevices.getUserMedia({ video: true}).then(function(stream) {
                    videoElement.srcObject = stream;
                  });
                }
              </script>
              <button id="capture_button" class="btn btn-secondary" style="border-top-left-radius: 0% !important; border-top-right-radius:0% !important">Capture</button> <!-- it works but cannot store into db yet. -->
              <script>
                const captureButton = document.getElementById("capture-button");
                const canvas = document.getElementById("canvas");
                const ctx = canvas.getContext("2d");

                captureButton.addEventListener("click", function() {
                  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                  const imageDataUrl = canvas.toDataURL();
                });
              </script>
            </div>
          </div>
          <!-- Input Location -->
          <div class="form-group">
            <label>Masukkan Lokasi saat ini:</label>
            <script>
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
                function successFunction(position) {
                  var latitude = position.coords.latitude;
                  var longitude = position.coords.longitude;
              }
              var geoloc = successFunction().toString();
            }
            else {
              console.log("Error!");
            }
            </script>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <script>
          // disini rencananya mauka simpankan script buat ambil opsi jam, tanggal, waktu dan koordinat gps buat disimpan ke database :)
          </script>
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection