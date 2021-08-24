

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

  // Fancybox Options
  $('[data-fancybox="gallery"]').fancybox({
    buttons: [
        "zoom",
        //"share",
        // "slideShow",
        "fullScreen",
        "download",
        // "thumbs",
        "close"
    ],
    animationEffect: "fade",
  });


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
    show_loader($(this), 'Uploading...')
    setTimeout(function () {
      $('#upload_gambar').parent().parent().submit();
    }, 900)

  })

</script>
