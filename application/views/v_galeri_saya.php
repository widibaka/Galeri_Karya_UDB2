<?php if ( $userdata['diblokir'] == 1 ): ?>
  <div class="alert alert-danger">
    <img src="<?php echo base_url() ?>assets/emoji/sad.png" style="width: 40px;"> Akun ini telah diblokir karena melanggar syarat dan ketentuan event ini. Silakan chat panitia melalui fitur kanan bawah untuk mendapatkan keterangan.
  </div>

<?php return 0; endif; ?>

<div class="row container-fluid">
  <div class="col-12 mb-4">
    <div class="col-md-8 offset-md-2">
      <form action="<?php echo base_url() . $this->uri->uri_string(); // <-- Menghapus nilai page kalau udah kena pagination ?>" method="get">
          <div class="input-group input-group-lg">
              <input type="search" name="search" class="form-control form-control-lg" placeholder="Cari karya" value="<?php echo $this->input->get('search') ?>">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-lg btn-default px-4">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
      </form>
    </div>
  </div>
  <?php if ( empty($data_karya) ): ?>
    <div class="col-12 d-flex justify-content-center">
      <p class="text-white">
        Tidak ditemukan data <span class="fa fa-sad-tear"></span>
      </p>
    </div>
    
  <?php endif ?>



  <div class="mb-3 col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 tile_item d-flex justify-content-center overflow-hidden" style="min-width:230px;">
    <a class="w-100 btn btn-warning shadow p-2 do_transition" href="<?php echo base_url() . 'galeri_saya/add_karya' ?>" title="Tambah Iklan">
      <div style="margin-top: 50%; margin-bottom: 50%;">
        <i style="font-size: 30pt;" class="fa fa-plus"></i>
        <p style="font-size: 24pt;">Tambah Karya</p>
      </div>
    </a>
  </div>


  <?php if ( !empty($data_karya) ): ?>
    <?php foreach ($data_karya as $key => $val): ?>
      <?php 
        $dir = "assets/img_karya/" . $val['id_karya'] . '/thumb';

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

      ?>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 tile_item" style="min-width:200px;">
        <div class="card overflow-hidden">
          <a class="do_transition" href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>">
            <div class="widget-user-header text-white" style="background: url('<?php echo base_url() . $gambar ?>') center center; height: 130pt; background-repeat: none; background-position: center; background-size: cover;">
            </div>
          </a>
          <div class="card-body text-dark">
            <a href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>" class="text-dark do_transition">
              <strong><?php echo $val['judul'] ?></strong>
              <span class="d-none d-md-inline">
                <br>
                <small class="d-none d-md-inline"><?php echo substr(strip_tags($val['deskripsi']), 0, 100) ?> ... <strong><a class="text-dark" href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>">selengkapnya</a></strong></small>
                <br>
              </span>
              <small><i class="fa fa-heart text-danger"></i> <?php echo $val['loves'] ?></small>
              <br>
              <small><i class="fa fa-clock text-gray"></i> <?php echo date('d M Y, H:i', $val['time']) ?> WIB</small>
              <br>
              <small><i class="fa fa-tag text-success"></i> <?php echo $this->KategoriModel->get_kategori($val['id_kategori'])  ?></small>
              <br>
              
              <?php if ($val['published'] == 1): ?>
                <small class=" text-success"><i class="fa fa-eye"></i> Dipublikasikan</small>
              <?php else: ?>
                <small class=" text-danger"><i class="fa fa-eye-slash"></i> Tidak Dipublikasikan</small>
              <?php endif ?>
            </a>
          </div>
          
          <a class="btn btn-success btn-flat do_transition" href="<?php echo base_url() . 'galeri_saya/edit_karya/' . $val['id_karya'] ?>">
            <i class="fa fa-edit"></i> Edit
          </a>
          <a class="btn btn-danger btn-flat" href="javascript:void(0)" onclick="return confirm_box('Anda yakin ingin menghapus?', 'question', 'Ya, hapus saja', '<?php echo base_url() . 'galeri_saya/del/' . $val['id_karya'] . '/' . base64_encode( base_url() . $this->uri->uri_string() ) ?>')">
            <i class="fa fa-trash"></i> Hapus
          </a>
        </div>
      </div> <!-- Ini adalah konten produk -->
    <?php endforeach ?>
  <?php endif ?>

  <?php echo $pagination ?>

</div>
