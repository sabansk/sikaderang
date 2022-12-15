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
            <label>Tanggal & Waktu saat ini:</label>
              <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <script>
                    var now = new Date();

                    // convert date and time to string
                    var dateString = now.toString('dd/MM/yyyy HH:mm:ss');
                    </script>
              </div>
          </div>
          <!-- Input Image -->
          <div class="form-group">
            <label for="exampleInputFile">Foto saat ini:</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile">
                <video id="camera-capture" width="40" height="80" autoplay></video>
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
            {{-- Disini seharusnya input lokasi, tapi pakai API Google --}}
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