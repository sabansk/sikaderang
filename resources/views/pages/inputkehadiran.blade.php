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
          <div class="form-group">
            <!-- Types of Presences -->
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
              <div class="input-group date" id="reservationdatetime" data-target-input="dateString">
                <body onload="insertDateTime()">
                  <input type="text" id="dateTimeInput" name="dateTimeInput" value="{{ Carbon\Carbon::now()->timezone('Asia/Makassar')->format('Y-m-d H:i:s') }}"><br>
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </body>
              </div>
          </div>
          <!-- Input Image -->
          <div class="form-group">
            <label>Foto saat ini:</label><br>
            <!--<div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile"> -->
                <video id="camera-capture" width="320" height="180" autoplay></video>
                <script>
                  var videoElement = document.getElementById('camera-capture');
                  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ video: true}).then(function(stream) {
                      videoElement.srcObject = stream;
                    });
                  }
                  </script>
                <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Capture</span>
              </div>
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
      </form>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>

</script>
@endsection