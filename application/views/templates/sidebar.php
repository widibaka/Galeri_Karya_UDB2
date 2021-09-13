

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-maroon elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url() ?>assets/custom/img/JualPanenLogo.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Galeri Karya UDB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <?php if ( !empty($userdata['username']) ): ?>
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url() ?>assets/custom/img/user_no_image.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $userdata['username']; ?></a>
          </div>
        </div>
      <?php endif ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="<?php echo base_url() ?>" class="nav-link do_transition" menu_title="Browse Karya">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Browse Karya
              </p>
            </a>
          </li> <!-- sidebar item -->
          <li class="nav-item">
            <a href="<?php echo base_url() ?>galeri_saya" class="nav-link do_transition" menu_title="Galeri Saya">
              <!-- <i class="nav-icon fa fa-snowman"></i> -->
              <i class="nav-icon fa fa-th-large"></i>
              <p>
                Galeri Saya
              </p>
            </a>
          </li> <!-- sidebar item -->
          <!-- <li class="nav-item">
            <a href="<?php echo base_url() ?>wishlist" class="nav-link" menu_title="Wishlist">
              <i class="nav-icon fa fa-heart"></i>
              <p>
                Wishlist
                <span class="badge badge-info right wishlist_count"><?php //echo $this->WishlistModel->count_wishlist_by_userID( $this->session->userdata('id_user') ) ?></span>
              </p>
            </a>
          </li> -->
<<<<<<< Updated upstream
=======

          <?php if ( $this->session->userdata('admin') ): // admin ?>
          <li class="nav-header">Admin</li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/akun_aktif" class="nav-link do_transition" menu_title="Akun Aktif">
                <i class="nav-icon fa fa-user-check"></i>
                <p>
                  Akun Aktif
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/akun_diblokir" class="nav-link do_transition" menu_title="Akun Diblokir">
                <i class="nav-icon fa fa-user-alt-slash"></i>
                <p>
                  Akun Diblokir
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/chats" class="nav-link do_transition" menu_title="Chats">
                <i class="nav-icon fa fa-comments"></i>
                <p>
                  Chats <span class="badge bg-danger">1</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/notifikasi" class="nav-link do_transition" menu_title="Notifikasi">
                <i class="nav-icon fa fa-bell"></i>
                <p>
                  Notifikasi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/admin_manager" class="nav-link do_transition" menu_title="Admin">
                <!-- <i class="nav-icon fa fa-snowman"></i> -->
                <i class="nav-icon fa fa-user-tie"></i>
                <p>
                  Admin
                </p>
              </a>
            </li> <!-- sidebar item -->
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/kategori_lomba" class="nav-link do_transition" menu_title="Kategori Lomba">
                <!-- <i class="nav-icon fa fa-snowman"></i> -->
                <i class="nav-icon fa fa-tags"></i>
                <p>
                  Kategori Lomba
                </p>
              </a>
            </li> <!-- sidebar item -->
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin/settings" class="nav-link do_transition" menu_title="Settings">
                <!-- <i class="nav-icon fa fa-snowman"></i> -->
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                  Settings
                </p>
              </a>
            </li> <!-- sidebar item -->
          <?php endif ?>

>>>>>>> Stashed changes
          <li class="nav-header">User</li>
          <?php if ( $this->session->userdata('username') ): ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>ubah_profil" class="nav-link do_transition" menu_title="Ubah Profil">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Ubah Profil
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>auth/logout" onclick="return confirm('Anda yakin ingin logout?')" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          <?php endif ?>
          <?php if ( !$this->session->userdata('username') ): ?>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>auth/login" class="nav-link">
                <i class="nav-icon fa fa-sign-in-alt"></i>
                <p>
                  Login
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>auth/register" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Daftar
                </p>
              </a>
            </li>
          <?php endif ?>
<<<<<<< Updated upstream
=======

          <?php if ( $this->SettingsModel->get_settings()['aktifkan_event'] == 1 ): ?>
            <li class="nav-header">Lomba</li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>ranking_lomba" class="nav-link do_transition" menu_title="Ranking Lomba">
                <i class="nav-icon fa fa-chart-bar"></i>
                <p>
                  Ranking Lomba
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() ?>syarat_ketentuan" class="nav-link do_transition" menu_title="Syarat & Ketentuan">
                <i class="nav-icon fa fa-gavel"></i>
                <p>
                  Syarat & Ketentuan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" onclick="$('#modal-pamflet_event').modal('show')" class="nav-link ">
                <i class="nav-icon fa fa-file-alt"></i>
                <p>
                  Tampilkan Pamflet
                </p>
              </a>
            </li>
          <?php endif ?>


          <li class="nav-header">Lomba</li>
          <li class="nav-item">
            <a href="javascript:void(0)" onclick="$('#modal-credits').modal('show')"  class="nav-link">
              <i class="nav-icon fa fa-chess-knight"></i>
              <p>
                Credits
              </p>
            </a>
          </li>
>>>>>>> Stashed changes
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: transparent;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-white"><?php echo $title ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">