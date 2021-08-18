<script type="text/javascript">
  
  // Gambar Thumbnails
  $('.product-image-thumb').on('click', function () {
    var $image_element = $(this).find('img')
    $('.product-image').prop('src', $image_element.attr('src'))
    $('.product-image-thumb.active').removeClass('active')
    $(this).addClass('active')
  })

  // $('#btn_ons').click(function () {
  //   $('.harga').html('5.000');
  //   $('.unit').html('Ons');
  // })

  // $('#btn_kg').click(function () {
  //   $('.harga').html('50.000');
  //   $('.unit').html('Kg');
  // })

  // $('#btn_kw').click(function () {
  //   $('.harga').html('5.000.000');
  //   $('.unit').html('Kwintal');
  // })

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

        // Tambah wishlist count
        $('.wishlist_count').each(function () {
          var wc = parseInt( $(this).html() );
          $(this).html(wc + 1);
        })
        
        var this_element = $(this);
        // Do some ajax here
        $.ajax({
          url: "<?php echo base_url() ?>api/toggle_add_wishlist/<?php echo $this->session->userdata('id_user') . '/' . $data_karya['id_karya'] ?>", 
          success: function(response){
            $('#loader_wishlist_btn').hide()
            $('#content_of_wishlist_btn').show()
            $('#content_of_wishlist_btn .hati').addClass('text-danger');

            // Enable back the button di saat terakhir proses
            this_element.removeClass('disabled');
          }
        });
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
        url: "<?php echo base_url() ?>api/toggle_add_wishlist/<?php echo $this->session->userdata('id_user') . '/' . $data_karya['id_karya'] ?>", 
        success: function(response){
          $('#loader_wishlist_btn').hide()
          $('#content_of_wishlist_btn').show()
          $('#content_of_wishlist_btn .hati').removeClass('text-danger');
          // Enable back the button di saat terakhir proses
          this_element.removeClass('disabled');
        }
      });
    }
  })

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