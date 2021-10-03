<div class="row container-fluid">
  <div class="col-12 mb-4">
    <div class="col-md-8 offset-md-2" id="pencarian_karya">
      <form action="<?php echo base_url() . $this->uri->uri_string(); // <-- Menghapus nilai page kalau udah kena pagination ?>" method="get" id="form_search">
          <div class="input-group input-group-lg mb-3">
              <input type="search" name="search" class="form-control form-control-lg" placeholder="Cari karya" value="<?php echo $this->input->get('search') ?>">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-lg btn-default px-4">
                      <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
          <div class="row" id="advanced_search" style="display:none;">
            <div class="form-group col-md-6">
              <label for="kategori" class="text-white">Kategori</label>
              <select class="form-control" name="id_kategori" id="kategori">
                <option value="">::Semua Kategori::</option>
                <?php foreach ($kategori as $key => $val): ?>
                  <option value="<?php echo $val['id_kategori'] ?>" <?php echo ( $this->input->get('id_kategori') == $val['id_kategori'] ) ? 'selected' : '' ?>><?php echo $val['nama_kategori'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="urut" class="text-white">Urutkan Berdasarkan</label>
              <select class="form-control" name="urut" id="urut">
                <option value="terbaru" <?php echo ( $this->input->get('urut') == 'terbaru' ) ? 'selected' : '' ?>>Terbaru</option>
                <option value="terlama" <?php echo ( $this->input->get('urut') == 'terlama' ) ? 'selected' : '' ?>>Terlama</option>
                <option value="love_terbanyak" <?php echo ( $this->input->get('urut') == 'love_terbanyak' ) ? 'selected' : '' ?>>Love terbanyak</option>
                <option value="love_tersedikit" <?php echo ( $this->input->get('urut') == 'love_tersedikit' ) ? 'selected' : '' ?>>Love tersedikit</option>
              </select>
            </div>
          </div>
          <center>
            <button class="btn btn-default btn-sm" type="button" id="advanced_search_btn">Filter</button>
          </center>
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
      <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-2 tile_item mb-3" style="min-width:200px;">
        <div class="card overflow-hidden h-100">
          <a class="do_transition" href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>">
            <div class="widget-user-header text-white" style="background: url('<?php echo base_url() . $gambar ?>') center center; height: 130pt; background-repeat: none; background-position: center; background-size: cover;">
            </div>
          </a>
          <div class="card-body text-dark">
            <a href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>" class="text-dark do_transition">
              <strong><?php echo $val['judul'] ?></strong>
              <span class="d-none d-md-inline">
                <br>
                <small class="d-none d-md-inline"><?php echo substr(strip_tags($val['deskripsi']), 0, 100) ?> ... <strong><a class="text-dark" href="<?php echo base_url() . 'detail_karya/i/' . $val['id_karya'] ?>"></a></strong></small>
                <br>
              </span>
              <small><i class="fa fa-heart text-danger"></i> <?php echo $val['loves'] ?></small>
              <br>
              <small><i class="fa fa-tag text-success"></i> <?php echo $this->KategoriModel->get_kategori($val['id_kategori'])  ?></small>
              <br>
              <small><i class="fa fa-user text-gray"></i> <?php echo $this->AuthModel->get_user($val['id_user'])['username']  ?></small>
              <br>
              <small><i class="fa fa-clock text-gray"></i> <?php echo date('d M Y, H:i', $val['time']) ?> WIB</small>
            </a>
          </div>
        </div>
      </div> <!-- Ini adalah konten produk -->
    <?php endforeach ?>
  <?php endif ?>

  <div class="col-12">
    <strong class="text-white">Total: <?php echo $total_rows ?> data</strong>
  </div>

  <?php echo $pagination ?>

</div>

