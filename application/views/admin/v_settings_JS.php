

<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    

</script>
<script type="text/javascript">
	$('#tombol_simpan').click(function () {
		show_loader($('#tombol_simpan'));
	})
	
	// preview gambar
	function readFile() {
	  
	  if (this.files && this.files[0]) {
	    
	    var FR= new FileReader();
	    
	    FR.addEventListener("load", function(e) {
	      preview_gambar.src = e.target.result;
	    }); 
	    
	    FR.readAsDataURL( this.files[0] );
	  }
	  
	}

  	document.getElementById("pamflet_event").addEventListener("change", readFile);

	$(function () {
		$(function () {
		  bsCustomFileInput.init();
		});



		  //Date and time picker
		  $('#tanggal_berakhirnya_event').datetimepicker({ 
		    icons: { time: 'far fa-clock' },
		    format: 'YYYY-MM-DD HH:mm:ss'
		  });

		  // Summernote
		  $('#syarat_ketentuan').summernote({
			  toolbar: [
			    // [groupName, [list of button]]
			    ['style', ['bold', 'italic', 'underline', 'clear']],
			    ['font', ['strikethrough', 'superscript', 'subscript']],
			    // ['fontsize', ['fontsize']],
			    // ['color', ['color']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    ['height', ['height']]
			  ],
			  height: 200,
		  });

	})
</script>