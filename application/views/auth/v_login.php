<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jual Panen App | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url() ?>" class="h1"><b>Jual Panen </b>App</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silakan login</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Tetap masuk di perangkat ini
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <center class="text-muted">
        <p>atau</p>
      </center>
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="<?php echo $auth_url ?>" class="btn btn-block btn-default">
          <i class="fab fa-google mr-2"></i> Masuk memakai Google
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <!-- <a href="forgot-password.html">Lupa Password</a> -->
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url() ?>auth/register" class="text-center">Mendaftar, saya belum punya akun</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  <?php if ( $this->session->flashdata('msg') ): ?>
    <?php 
      $split = explode('#', $this->session->flashdata('msg'));
      $code = $split[0];
      $msg_itself = $split[1];
    ?>
    setTimeout(function function_name(argument) {
      Swal.fire({
        icon: '<?php echo $code ?>',
        title: '<?php echo $msg_itself ?>',
      })
    }, 100)
  <?php endif ?>
</script>
</body>
</html>
