<script type="text/javascript">
  
  // Gambar Thumbnails
  $('.product-image-thumb').on('click', function () {
    var $image_element = $(this).find('img')
    $('.product-image').prop('src', $image_element.attr('src'))
    $('.product-image-thumb.active').removeClass('active')
    $(this).addClass('active')
  })


  /* Button hati */
    // Check browser support
    if (typeof(Storage) !== "undefined") {
          // Retrieve, kalau sudah ada maka btn-hati dibuat merah
          if ( localStorage.getItem("<?php echo $data_karya['id_karya'] ?>") == "true" ) {
            $('#content_of_wishlist_btn .hati').addClass('text-danger');
            // Enable back the button di saat terakhir proses
            $('.btn-hati').removeClass('disabled');
          // Kalau tidak ada, just enable the button
          }else{
            $('.btn-hati').removeClass('disabled');
          }
    } else {
      alert("Sorry, your browser does not support Web Storage...")
    }
  /* Button hati Ends */

  $('.btn-hati').click(function (e) {

    // Jika button tidak disabled
    if ( !$(this).hasClass('disabled') ) {
      if ( !$(this).find('.hati').hasClass('text-danger') ) {

        // Disable the button first
        $(this).addClass('disabled');

        $('#loader_wishlist_btn').show()
        $('#content_of_wishlist_btn').hide()

        get_captcha()

        return 0;
      }


      // ================================ Dua Kasus Berbeda ===============================


      // Kalau ada .text-danger / Love nya merah
      if ( confirm("Yakin ingin menghapus love yang Anda berikan?") ) {
        // Disable the button first
        $(this).addClass('disabled');
        $('#loader_wishlist_btn').show()
        $('#content_of_wishlist_btn').hide()

        // Kurangi wishlist count
        $('.wishlist_count').each(function () {
          var wc = parseInt( $(this).html() );
          $(this).html(wc - 1);
        })
        

        var this_element = $(this);
        // Do some ajax here
        $.ajax({
          url: "<?php echo base_url() ?>api/remove_love/<?php echo $data_karya['id_karya'] ?>", 
          success: function(response){
            setTimeout(function () {
              $('#loader_wishlist_btn').hide()
              $('#content_of_wishlist_btn').show()
              $('#content_of_wishlist_btn .hati').removeClass('text-danger');
              // Enable back the button di saat terakhir proses
              this_element.removeClass('disabled');

              // Store ke Localstorage, tapi nilainya false
              localStorage.setItem("<?php echo $data_karya['id_karya'] ?>", "false");

            }, 1400)
            
          }
        });
      }
      
    }
  })

  function kembalikan_btn_love_dari_loading() {
    $('#loader_wishlist_btn').hide()
    $('#content_of_wishlist_btn').show()
    $('#content_of_wishlist_btn .hati').removeClass('text-danger');
    // Enable back the button di saat terakhir proses
    $('.btn-hati').removeClass('disabled');
  }

  function get_captcha() {
    // buat loading dulu
    $('.captha-container').html(
      '<img class="mr-2" src="<?php echo base_url() ?>assets/widi/img/loader.gif"> Memuat CAPTCHA...'
    );
    
    $('#modal-captcha').modal('show')
    $.ajax({
      url: '<?php echo base_url() ?>api/create_captcha',
      success: function (response) {
        var data = JSON.parse(response);
        
        setTimeout(function () {
          let htmlContent = `
            <img class="border mb-3" id="img" width="100%" src="${data.img_path}" ans="${data.word}"><br>
            <input class="form-control" id="word" placeholder="Ketik tulisan di atas" autocomplete="off"><br>
            <button id="kirim" onclick="check_captcha()" class="btn btn-primary mb-3 w-100"><i class="fa fa-paper-plane"></i> Submit</button><br>
            <button id="Reload" onclick="get_captcha()" class="btn btn-primary mb-3 w-100"><i class="fa fa-exchange-alt"></i> CAPTCHA Tidak Terbaca</button><br>
          `;
          $('.captha-container').html(htmlContent);
        }, 1400)
        
      }
    })
  }

  // checking if captcha is correct
  function check_captcha() {
    // bikin loading untuk tombol #kirim
    show_loader($('#kirim'), 'Memproses...');

    let ans = $('#img').attr('ans');
    let word = $('#word').val();
    if ( ans == word ) {
      // Tambah wishlist count
      $('.wishlist_count').each(function () {
        var wc = parseInt( $(this).html() );
        $(this).html(wc + 1);
      })
      var this_element = $('.btn-hati');
      // Do some ajax here
      $.ajax({
        url: "<?php echo base_url() ?>api/add_love/<?php echo $data_karya['id_karya'] ?>", 
        success: function(response){
          setTimeout(function () {
            $('#loader_wishlist_btn').hide()
            $('#content_of_wishlist_btn').show()
            $('#content_of_wishlist_btn .hati').addClass('text-danger');

            // Enable back the button di saat terakhir proses
            this_element.removeClass('disabled');

            // hilangkan modal box modal-captcha
            $('#modal-captcha').modal('hide')

            // Berikan respon
            swal.fire({
              icon: 'success',
              title: 'Love Terkirim!',
              text: 'Terima kasih telah menebar cinta pada dunia!',
            })

            // Store ke Localstorage
            localStorage.setItem("<?php echo $data_karya['id_karya'] ?>", "true");

          }, 1400)
        }
      });
    }
    // kalau captcha salah
    if ( ans != word ) {
      setTimeout(function () {
        hide_loader($('#kirim'));
        swal.fire({
          icon: 'warning',
          title: 'CAPTCHA salah. Cobalah lagi. Pasti bisa!',
        })
      }, 1400)
      
    }
  }

  // Kalau sudah ada di wishlist, ubah hati menjadi merah
  <?php /* if ( 
      $this->WishlistModel->check_wishlist_by_userID_And_karyaID( 
          $this->session->userdata('id_user'), 
          $data_karya['id_karya'] 
      )
  ): ?>
      
      $('.hati').addClass( 'text-danger' ) //<-- ubah merah

  <?php endif*/ ?>
</script>