

<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">

	// Munculkan loader ketika submit
	$('#form_add_karya').submit(function() {
		show_loader($('#berikutnya_btn'));
	})

	$(function () {
	  // Summernote
	  $('#deskripsi').summernote({
		  toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    // ['fontsize', ['fontsize']],
		    // ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']]
		  ],
		  height: 500,
	  });

	  // Buat modalbox biar gak ketutupan backdrop
	  $('[aria-label="Insert Link"]').on('shown.bs.modal', function (event) {
	    $('.modal-backdrop').hide();
	  });
	  $('[aria-label="Help"]').on('shown.bs.modal', function (event) {
	    $('.modal-backdrop').hide();
		});

	})
</script>