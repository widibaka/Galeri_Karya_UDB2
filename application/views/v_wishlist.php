<div class="row container-fluid">
  
  <!-- <div class="col-12 d-flex justify-content-center mb-4">
      <form action="<?php echo base_url() . 'wishlist/index'; // <-- Menghapus nilai page kalau udah kena pagination ?>" method="get" class="input-group col-sm-12 col-md-6">
        <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search" value="<?php echo $this->input->get('search') ?>">
        <div class="input-group-append">
          <button type="submit" class="btn btn-success px-4">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>

      </form>
  </div> -->
  <?php if ( empty($data_iklan) ): ?>
    <div class="col-12 d-flex justify-content-center">
      <p class="text-gray">
        Tidak ditemukan data <span class="fa fa-sad-tear"></span>
      </p>
    </div>
    
  <?php endif ?>

  <?php if ( !empty($data_iklan) ): ?>
    <?php foreach ($data_iklan as $key => $val): ?>
      <?php 
        $dir = "assets/img_iklan/" . $val['id_iklan'];

        // Gambar yang paling atas ascending
        $scandir = scandir($dir);
        $gambar = $dir . "/" . $scandir[2];
        if ( !isset( $scandir[2] ) OR $val['dihapus'] == 1 ) {
          $gambar = "assets/img_iklan/no_image.jpg";
        }

      ?>
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 tile_item" >
        <div class="card overflow-hidden">
          <a href="<?php echo base_url() . 'detail_iklan/i/' . $val['id_iklan'] ?>">
            <div class="widget-user-header text-white" style="background: url('<?php echo base_url() . $gambar ?>') center center; height: 130pt; background-repeat: none; background-position: center; background-size: cover;">
            </div>
          </a>
          <div class="card-body text-dark">
            <a href="<?php echo base_url() . 'detail_iklan/i/' . $val['id_iklan'] ?>" class="text-dark">
            <?php echo $val['judul'] ?>
            <br>
            <strong>Rp <?php echo number_format($val['harga'], 0, ',', '.') ?> / <?php echo $val['satuan'] ?></strong>
            <br>
            <small><i class="fa fa-map-marker text-gray"></i> <?php echo $val['kota'] ?></small>
            <br>
            <small><i class="fa fa-clock text-gray"></i> <?php echo date('d M Y, H:i', $val['time']) ?> WIB</small>
            </a>
          </div>
          
          <a id_iklan="<?php echo $val['id_iklan'] ?>" class="btn btn-default btn-flat text-gray delete_wishlist" href="javascript:void(0)" onclick="//return confirm('Anda yakin ingin menghapus?')" style="height: 40px;">
            <center class="loader_wishlist_btn" style="display: none; margin-top: -5px;">
              <div class="lds-dual-ring" style="
                  height: 20px;
                  width: 20px;
                  border-color: #6c757d transparent #6c757d transparent;
              "></div>
            </center>
            <span class="content_of_wishlist_btn">
              <i class="fa fa-trash"></i> Hapus
            </span>
          </a>
        </div>
      </div> <!-- Ini adalah konten produk -->
    <?php endforeach ?>
  <?php endif ?>

  <?php echo $pagination ?>

</div>