<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="../../widi/css/style.css">
</head>
<body class="hold-transition login-page" style="
background: url('../../widi/vectors/97Z_dec32.jpg');
/*background: rgb(106,1,68);
background: linear-gradient(131deg, rgba(106,1,68,1) 0%, rgba(124,1,105,1) 38%, rgba(0,146,255,1) 100%);*/
background-size: cover;
background-position: top;
background-attachment: fixed;
">

<div class="preloader flex-column justify-content-center align-items-center">
  <div class="lds-dual-ring"></div>
  <p class="text-muted mt-3">Mohon tunggu ...</p>
</div>

<div class="login-box" style="background: transparent;">
  <div class="login-logo">
    <a href="#" class="text-white"><b>Galeri Karya </b><br>Universitas Duta Bangsa</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-white">Sign in to start your session</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-white"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-white"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-outline-warning btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a class="text-warning" href="#" id="pernah_daftar">Saya lupa password</a>
      </p>
      <p class="mb-0">
        <a class="text-warning do_transition" href="register.html" class="text-center" id="mendaftar_baru">Mendaftar akun baru</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- custom js -->
<script src="../../widi/js/main.js"></script>

</body>
</html
