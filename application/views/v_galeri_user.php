<?php if ( $kreator['diblokir'] == 1 ): ?>
  <div class="alert alert-danger">
    <img src="<?php echo base_url() ?>assets/emoji/sad.png" style="width: 40px;"> Akun ini telah diblokir karena melanggar syarat dan ketentuan event ini. Silakan chat panitia melalui fitur kanan bawah untuk mendapatkan keterangan.
  </div>

<?php return 0; endif; ?>

<div class="row container-fluid">
  <div class="col-12 mb-4">
    <div class="col-md-12">
      <div class="card">
        <center class="p-3 glassy_thing rounded-lg">
          <div class="image mb-2">
            <div class="image img-circle elevation-2" alt="User Image" style="
              height: 120px;
              width: 120px;
              background-size: cover;
              background-position: center;
              background-image: url('<?php echo base_url() . 'assets/uploads/foto_profil/' . $kreator['photo'] ?>');
            ">
            </div>
          </div>
          <h5>@<?php echo $kreator['username'] ?></h5>
        </center>
      </div>
    </div>
    <div class="col-md-8 offset-md-2">
      <form action="<?php echo base_url() . $this->uri->uri_string(); // <-- Menghapus nilai page kalau udah kena pagination ?>" method="get">
          <div class="input-group input-group-lg">
              <input type="search" name="search" class="form-control form-control-lg" placeholder="Cari karya milik <?php echo $kreator['username'] ?>" value="<?php echo $this->input->get('search') ?>">
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
      <p class="text-gray">
        Tidak ditemukan data <span class="fa fa-sad-tear"></span>
      </p>
    </div>
    
  <?php endif ?>



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
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 tile_item">
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
              <small><i class="fa fa-tag text-success"></i> <?php echo $this->KategoriModel->get_kategori($val['id_kategori'])  ?></small>
              <br>
              <small><i class="fa fa-clock text-gray"></i> <?php echo date('d M Y, H:i', $val['time']) ?> WIB</small>
              <br>
            </a>
          </div>
          
        </div>
      </div> <!-- Ini adalah konten produk -->
    <?php endforeach ?>
  <?php endif ?>

  <?php echo $pagination ?>

</div>
