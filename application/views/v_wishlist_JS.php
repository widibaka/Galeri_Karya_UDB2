<script type="text/javascript">
	
	$('.delete_wishlist').click(function (e) {

	  var blok_iklan = $(this).parent().parent();

	  var id_iklan = $(this).attr('id_iklan');
	  // Jika button tidak disabled
	  if ( !$(this).hasClass('disabled') ) {
	    // Disable the button first
	    $(this).addClass('disabled');
	    blok_iklan.find('.loader_wishlist_btn').show()
	    blok_iklan.find('.content_of_wishlist_btn').hide()

	    // Kurangi wishlist count
	    $('.wishlist_count').each(function () {
	      var wc = parseInt( $(this).html() );
	      $(this).html(wc - 1);
	    })
	    

	    // Do some ajax here
	    $.ajax({
	      url: "<?php echo base_url() ?>api/toggle_add_wishlist/<?php echo $this->session->userdata('id_user') . '/' ?>"+id_iklan, 
	      success: function(response){
	        $('#loader_wishlist_btn').hide()
	        $('#content_of_wishlist_btn').show()
	        $('#content_of_wishlist_btn .hati').removeClass('text-danger');
	        // Enable back the button di saat terakhir proses
	        setTimeout(function () {
	        	blok_iklan.hide(400, 'swing', function () {
	        		blok_iklan.remove(400);
	        	});
	        },500)
	      }
	    });
	  }
	})

</script>