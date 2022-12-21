<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="AdminLTE\dist\img\gowa.png">
  <title>Sikaderang | {{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition">
  <div class="row" style="margin: 0 !important">
    <!-- Login Section -->
    <div class="col-md-6 login-page">
      <div class="login-box login-logo">
        <a class="prevent-select"><strong>Sistem Informasi Kehadiran<br>Peserta Praktek Kerja Lapangan</strong></a><br>
        <img src="AdminLTE\dist\img\gowa.png" alt="Logo Gowa" style="height:100px">
      </div>
      <!-- /.login-logo -->
      <div class="login-box">
        <div class="card-body login-card-body">
          <form action="\dashboard" method="post">
            <!-- Username -->
            <label for="title">Nama Pengguna</label>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <!-- Password -->
            <label for="title">Password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-eye"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.login-card-body -->
      </div>
      <!-- /.login-box -->
    </div>
    <!-- Illustration Section -->
    <div class="col-6 login-page" style="background-color: var(--jeans-blue) !important">
      <img src="AdminLTE\dist\img\login-image.png" alt="Login Illustration" style="height: 250px">
    </div>
  </div>

<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>