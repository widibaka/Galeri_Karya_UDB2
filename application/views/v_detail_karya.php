
<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <!-- <h3 class="d-inline-block"><?php echo $data_karya['judul'] ?></h3> -->

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

        <!-- <div class="col-12">
          <img src="<?php echo base_url() . "assets/img_karya/" . $big_preview ?>" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 row product-image-thumbs">
          <?php foreach ($scandir as $key => $val): ?>
            <div class="product-image-thumb <?php echo ($key > 2) ? '' : 'active' ?>"><img src="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/" . $val ?>" alt="Product Image"></div>
          <?php endforeach ?>
        </div> -->
        <?php 
          $dir = "assets/img_karya/" . $data_karya['id_karya'] . "";

          // Gambar yang paling atas ascending
          $scandir = scandir($dir . '/thumb');

          // Unset element yang gak diperlukan
          unset($scandir[0]);
          unset($scandir[1]);
        ?>

        <h5 class="mb-3">Gambar</h5>
        <div class="border row p-3 glassy_thing rounded-lg">
          <?php if ( empty($scandir) ): ?>
            <strong class="text-gray w-100">Mohon upload satu atau lebih gambar untuk karya ini!</strong>
          <?php endif ?>
          <?php foreach ($scandir as $key => $val): ?>
            
              <div class="wadah">
                <a data-fancybox="gallery" href="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/" . $val ?>">
                  <img class="m-1" src="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/thumb/" . $val ?>" style="height: 120px;">
                </a>
              </div>
            
          <?php endforeach ?>
        </div>
        <hr>

        <?php if ( !empty($data_karya['youtube']) ): ?>
          <h5 class="my-3">Video Youtube</h5>
          <div class="border row p-3 glassy_thing rounded-lg">
            
            <?php 
            /**
             * Get Youtube video ID from URL
             *
             * @param string $url
             * @return mixed Youtube video ID or FALSE if not found
             */
            function getYoutubeIdFromUrl($url) {
                $parts = parse_url($url);
                if(isset($parts['query'])){
                    parse_str($parts['query'], $qs);
                    if(isset($qs['v'])){
                        return $qs['v'];
                    }else if(isset($qs['vi'])){
                        return $qs['vi'];
                    }
                }
                if(isset($parts['path'])){
                    $path = explode('/', trim($parts['path'], '/'));
                    return $path[count($path)-1];
                }
                return false;
            }


            $exploded = array_filter(explode(',', $data_karya['youtube']));

            foreach ($exploded as $key => $url): ?>

              <?php 
                $video_ID = getYoutubeIdFromUrl($url);
              ?>
              <a title="Play Video" class="youtube-vid mr-2 mb-2" data-fancybox href="https://www.youtube.com/embed/<?php echo $video_ID ?>&amp;autoplay=0&amp;rel=0&amp;controls=0&amp;showinfo=0">
                  <img src="http://i4.ytimg.com/vi/<?php echo $video_ID ?>/default.jpg" style="height: 120px;">
                  <i class="fa fa-play text-danger icon-play-vid" style="font-size: 40px"></i>
              </a>

            <?php endforeach ?>
            
          </div>
          <hr>
        <?php endif ?>

      </div>
      <div class="col-12 col-sm-6">

        <h5 class="mb-3">Kategori: 
          <a href="#" title="Lihat karya dengan kategori ini">
            <?php echo $this->KategoriModel->get_kategori( $data_karya['id_kategori'] ) ?>
          </a>
        </h5>
        <hr>

        <!-- HP -->
        <div class="bg-success py-2 px-3 mt-3 text-center">
          <?php 
              $hp = $this->AuthModel->get_HP_by_userID( $data_karya['id_user'] );
          ?>
          <a style="color: white;" href="tel:+62<?php echo $hp ?>">
            <h4 class="mb-0">
              <i class="fa fa-phone"></i> +62 <?php echo $hp ?>
            </h4>
            <h5 class="mt-0">
              <small>Hubungi Kreator</small>
            </h5>
          </a>
        </div>

        <div class="mt-3">
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
              Berikan Love (<span class="wishlist_count"><?php echo $data_karya['loves'] ?></span>)
            </center>
          </div>
        </div>

        <hr>

        <h5 class="my-3">Deskripsi</h5>
        <div class="deskripsi">
          <?php echo $data_karya['deskripsi'] ?>
        </div>
        <hr>

        <?php if (!empty($data_karya['link'])): ?>
          <h5 class="my-3">Link</h5>
          <div class="deskripsi">
            <strong><a href="<?php echo $data_karya['link'] ?>"><?php echo substr($data_karya['link'], 0, 50) ?><?php echo (strlen($data_karya['link'])>50) ? '...' : '' ?></a></strong>
          </div>
          <hr>
        <?php endif ?>

        <h5 class="my-3">Tim</h5>
        <div class="tim">
          <?php echo (!empty($data_karya['tim'])) ? $data_karya['tim'] : '(Tidak dicantumkan)' ?>
        </div>
        <hr>

        

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



<div class="modal fade modal-captcha" id="modal-captcha" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda bukan robot, 'kan?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4 class="mt-2 col-12 text-center">
            CAPTCHA
          </h4>
          <div class="text-center d-flex justify-content-center">
            <br>
            <!-- captha nanti di sini -->
            <div class="captha-container">
              <img class="mr-2" src="<?php echo base_url() ?>assets/widi/img/loader.gif"> Memuat CAPTCHA...
            </div>
          </div>
        </span>
      </div>
      <!-- <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal