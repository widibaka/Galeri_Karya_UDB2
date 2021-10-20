<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo (!empty($title) ? $title : '') ?> - Galeri Karya UDB</title>

  <?php if (!empty($data_karya['id_karya'])): ?>
    <?php 
      if ( !empty($data_karya) ) {
        $dir = "assets/img_karya/" . $data_karya['id_karya'] . '/thumb';

        // Gambar yang paling atas ascending
        if ( file_exists($dir) ) {
          $scandir = scandir($dir);
        }else{
          $scandir = [];
        }

        if ( !isset( $scandir[2] ) ) {
          $gambar = "assets/img_karya/no_image.jpg";
        }else{
          $gambar = $dir . "/" . $scandir[2];
        }
      }
    ?>
  <?php endif ?>
  

  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/custom/img/Logojpg.jpg" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=0.8, shrink-to-fit=no">
  <meta name="description" content="Galeri Karya Universitas Duta Bangsa">
  <meta name="keywords" content="sains, karya, lomba, teknologi, duta bangsa, universitas, fakultas komputer">
  <meta name="author" content="Himpunan Mahasiswa TI UDB">
  <meta name="robots" content="index, follow" />
  <meta name="language" content="id" />
  <meta name="geo.country" content="id" />
  <meta http-equiv="content-language" content="In-Id" />
  <meta name="geo.placename" content="Indonesia" />

  <meta property="og:type" content="competition" />
  <meta property="og:image" content=<?= ( empty($gambar) ) ? '"' . base_url() . 'assets/custom/img/Logojpg.jpg"' : '"' . base_url() . $gambar . '"' ?> />
  <meta property="og:title" content="<?php echo (!empty($title) ? $title : '') ?> - Galeri Karya Fikom UDB" />
  <meta property="og:description" content="Galeri Karya Universitas Duta Bangsa">
  <meta property="og:url" content="<?= base_url() ?>" />
  <meta property="og:site_name" content="Galeri Karya UDB" />

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Jquery Ui -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
  <!-- Fancybox -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fancybox/dist/jquery.fancybox.min.css">
  <!-- IntroJS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/intro.js/introjs.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">

  <style>
    .sponsor img { 
      width: 100%;
      max-width: 997px;
    }
  </style>

  <!-- CUSTOM CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/widi/css/style.css?v2">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="
background: url('https://i.postimg.cc/tCD4x52J/5437842.jpg');

/*background: rgb(106,1,68);
background: linear-gradient(131deg, rgba(106,1,68,1) 0%, rgba(124,1,105,1) 38%, rgba(0,146,255,1) 100%);*/
background-size: cover;
background-position: top;
background-attachment: fixed;
">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <div class="lds-dual-ring"></div>
  <p class="text-muted mt-3">Mohon tunggu ...</p>
</div>
<div class="wrapper" style="background: transparent;">
  
