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
      <p class="text-gray">
        Tidak ditemukan data <span class="fa fa-sad-tear"></span>
      </p>
    </div>
    
  <?php endif ?>

  <?php if ( !empty($data_karya) ): ?>
    <?php foreach ($data_karya as $key => $val): ?>
      <?php 
        $dir = "assets/img_karya/" . $val['id_karya'];

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
          <a href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>">
            <div class="widget-user-header text-white" style="background: url('<?php echo base_url() . $gambar ?>') center center; height: 130pt; background-repeat: none; background-position: center; background-size: cover;">
            </div>
          </a>
          <div class="card-body text-dark">
            <a href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>" class="text-dark">
            
            <strong><?php echo $val['judul'] ?></strong>
            <br>
            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</small>
            <br>
            <small><i class="fa fa-heart text-gray"></i> 89</small>
            <br>
            <small><i class="fa fa-clock text-gray"></i> <?php echo date('d M Y, H:i', $val['time']) ?> WIB</small>
            </a>
          </div>
          
        </div>
      </div> <!-- Ini adalah konten produk -->
    <?php endforeach ?>
  <?php endif ?>

  <?php echo $pagination ?>

</div>