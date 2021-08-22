
<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
	$(function () {
	  bsCustomFileInput.init();
	});


	// Toggle edit profil
	function toggle_edit_profil() {
		$('#display').toggle(400);
		$('#form-edit').toggle(400);
	}
	$('#ubah_profil_btn').click(function () {
		toggle_edit_profil()
	})
	$('#kembali_profil_btn').click(function (e) {
		e.preventDefault()
		toggle_edit_profil()
	})


	// preview gambar
	function readFile() {
	  
	  if (this.files && this.files[0]) {
	    
	    var FR= new FileReader();
	    
	    FR.addEventListener("load", function(e) {
	      document.getElementById("b64").innerHTML = e.target.result;
	      preview_gambar.style.backgroundImage = "url('"+ e.target.result +"')"
	      $('#modal-edit-photo').modal('hide')
	      // Munculkan simpan_perubahan_btn
	      $('#simpan_perubahan_btn').show()
	    }); 
	    
	    FR.readAsDataURL( this.files[0] );
	  }
	  
	}

	document.getElementById("imgInp").addEventListener("change", readFile);

	$('#hapusGambarProfil').click(function () {
	  preview_gambar.style.backgroundImage = "url('<?php echo base_url() ?>assets/widi/img/user_no_image.jpg')"
	  b64.value = ""
	  $('#imgInp').next('label').html('Pilih berkas gambar');
	  $('#modal-edit-photo').modal('hide')
      // Munculkan simpan_perubahan_btn
      $('#simpan_perubahan_btn').show()
	});
</script>