<!-- <div class="col-12 mb-3">
  <a href="<?php echo (!empty($url_mundur)) ? base64_decode($url_mundur) : base_url() ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
</div> -->
<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3 class="d-inline-block"><?php echo $data_karya['judul'] ?></h3>

        <?php 
          $dir = "assets/img_karya/" . $data_karya['id_karya'];

          // Gambar yang paling atas ascending
          if ( file_exists($dir) ) {
            $scandir = scandir($dir);
          }else{
            $scandir = [];
          }
          if ( empty( $scandir ) ) {
            $big_preview = "no_image.jpg";
          }
          else{
            // Unset element yang gak diperlukan
            unset($scandir[0]);
            unset($scandir[1]);

            $big_preview = $data_karya['id_karya'] . "/" . $scandir[2];
          }
        ?>

        <div class="col-12">
          <img src="<?php echo base_url() . "assets/img_karya/" . $big_preview ?>" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 row product-image-thumbs">
          <?php foreach ($scandir as $key => $val): ?>
            <div class="product-image-thumb <?php echo ($key > 2) ? '' : 'active' ?>"><img src="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/" . $val ?>" alt="Product Image"></div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">Deskripsi</h3>
        <div class="deskripsi">

          <?php echo $data_karya['deskripsi'] ?>
          
        </div>

        <hr>

        <!-- HP -->
        <div class="bg-success py-2 px-3 mt-4 text-center">
          <h2 class="mb-0">
            <?php 
                $hp = $this->AuthModel->get_HP_by_userID( $data_karya['id_user'] );
            ?>
            <i class="fa fa-phone"></i> <a style="color: white;" href="tel:+62<?php echo $hp ?>">+62 <?php echo $hp ?></a>
          </h2>
          <h4 class="mt-0">
            <small>Hubungi Pemilik</small>
          </h4>
        </div>

        <div class="mt-4">
          <div class="btn-hati btn btn-default btn-lg btn-flat w-100" style="height: 40pt;">
            <center id="loader_wishlist_btn" style="display: none; margin-top: -8px;">
              <div class="lds-dual-ring2" style="
                  height: 27pt!important;
                  width: 27pt!important;
                  border-color: #6c757d transparent #6c757d transparent;
              "></div>
            </center>
            <center id="content_of_wishlist_btn">
              <i class="hati fas fa-heart fa-lg mr-2" style="font-size: 27pt;"></i>
              Berikan Love (<span class="wishlist_count">0<?php //echo $this->WishlistModel->count_wishlist_by_karyaID( $data_karya['id_karya'] ) ?></span>)
            </center>
          </div>
        </div>

        <br>

        <span>Share:</span>
        <div class="mt-4 product-share">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . $this->uri->uri_string() ?>" target="_blank" class="text-gray" title="Bagikan ke Facebook">
            <i class="fab fa-facebook-square fa-2x"></i>
          </a>
          <a href="whatsapp://send?text=<?php echo base_url() . $this->uri->uri_string() ?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Bagikan ke whatsapp" class="text-gray">
            <i class="fab fa-whatsapp-square fa-2x"></i>
          </a>
          <a href="https://twitter.com/share?url=<?php echo base_url() . $this->uri->uri_string() ?>&text=<?php echo $data_karya['judul'] ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Bagikan ke Twitter" class="text-gray">
            <i class="fab fa-twitter-square fa-2x"></i>
          </a>

          <!-- <a href="https://www.linkedin.com/shareArticle?mini=true&url=<URL>&t=<TITLE>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin" class="text-gray">
            <i class="fas fa-linkedin-square fa-2x"></i>
          </a> -->

          <a href="mailto:?subject=<?php echo $data_karya['judul'] ?>&body=<?php echo base_url() . $this->uri->uri_string() ?>" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Bagikan lewat E-Mail" class="text-gray">
            <i class="fas fa-envelope-square fa-2x"></i>
          </a>

        </div>

        <br>
        <span><i class="fa fa-clock text-gray"></i> <?php echo date('d M Y, H:i', $data_karya['time']) ?> WIB</span>

      </div>
      
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->