<script type="text/javascript">
  
  // Gambar Thumbnails
  $('.product-image-thumb').on('click', function () {
    var $image_element = $(this).find('img')
    $('.product-image').prop('src', $image_element.attr('src'))
    $('.product-image-thumb.active').removeClass('active')
    $(this).addClass('active')
  })

  $('.btn-hati').click(function (e) {

    <?php if ( !$this->session->userdata('id_user') ): ?>
      Swal.fire({
        icon: 'warning',
        title: 'Anda harus login terlebih dahulu!',
      })
      return 0;
    <?php endif ?>

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


      // Kalau tidak ada text-danger / Love nya merah
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
          }, 1400)
          
        }
      });
    }
  })

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
            <img class="border" id="img" src="${data.img_path}" ans="${data.word}">
            <input class="form-control" id="word" style="width:150px;" placeholder="Tulis di sini"><br>
            <button id="kirim" onclick="check_captcha()" class="btn"><i class="fa fa-paper-plane"></i> Kirim</button><br>
            <button id="Reload" onclick="get_captcha()" class="btn"><i class="fa fa-exchange-alt"></i> Reload</button><br>
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