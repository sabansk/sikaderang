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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition">
    <div class="row" style="margin: 0 !important">
        <!-- Login Section -->
        <div class="col-md-6 login-page">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="transform: scale(0.7); height: 10px !important; width: 10px !important"></button>
                </div>
            @endif

            <div class="login-box login-logo">
                <a class="prevent-select"><strong>Sistem Informasi Kehadiran<br>Peserta Praktek Kerja
                        Lapangan</strong></a><br>
                <img src="AdminLTE\dist\img\gowa.png" alt="Logo Gowa" style="height:100px">
            </div>
            <!-- /.login-logo -->
            <div class="login-box">
                <div class="card-body login-card-body">
                    <form action="/login" method="post">
                        @csrf
                        <!-- Username -->
                        <label for="email">Nama Pengguna</label>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Username" autofocus required value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Password -->
                        <label for="passsword">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye" id="togglePassword" style="cursor: pointer"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
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

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>

<!-- Bootstrap 4 -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
