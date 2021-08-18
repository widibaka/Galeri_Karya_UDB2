

<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
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
      height: 200,
    });

  })


  // preview gambar
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      preview_gambar.src = URL.createObjectURL(file)
    }
  }

  // Disable upload button
  $('#upload_gambar').click(function (e) {
    e.preventDefault();
    // Jika button tidak disabled
    if ( !$(this).hasClass('disabled') ) {
      // Disable the button first
      $(this).addClass('disabled');
      $(this).find('.loader_upload_btn').show()
      $(this).find('.content_of_upload_btn').hide()
    }
    setTimeout(function () {
      $('#upload_gambar').parent().parent().submit();
    }, 900)

  })

</script>
