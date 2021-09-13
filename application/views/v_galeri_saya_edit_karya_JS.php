

<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script type="text/javascript">



  $(function () {
    bsCustomFileInput.init();
  });

  // For Gacha Love
  $('#love_gacha').click(function () {
    $('#modal-gacha').modal('show')
  })
  function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
  }
  $('#mulai_gacha').click(function () {
    $(this).remove();
    $.ajax({
      url: "<?php echo base_url() ?>api/convert_gacha2loves/<?php echo $data_karya['id_karya'] ?>",
      // biarin, gak usah pake respons
    });
    var randomize_angka = setInterval(function () {
      let random = getRndInteger( 2, 15 );
      $('#angka_gacha').html(random);
    }, 100)
    
    setTimeout(function () {
      clearInterval(randomize_angka);
      // masukkan angka yang asli
      $('#angka_gacha').html(<?php echo $data_karya['gacha'] ?>);
      // teruskan
      $('#hati-di-modalgacha').addClass('gacha_didapatkan');
      show_loader( $('#content_get_gacha'), 'Reload Halaman ...' );
      setTimeout(function () {
        $('#modal-gacha').modal('hide');
        $('#hati-di-modalgacha').removeClass('gacha_didapatkan');
        // mending refresh lagi aja daripada pakai ajax, karena saia malas!
        setTimeout(function () {
          location.reload();
        }, 500)
      }, 1200)
    },1500)
  })
  // sembunyikan tombol simpan
  $('#tombol_simpan').hide();
  // kalau ada settings yang diedit, maka munculkan tombol simpan
  $('.form-control').on( 'input', function () {
    $('#tombol_simpan').show();
  });









  $(function () {
    // Summernote
    $('#deskripsi').summernote({
      // airMode: true,
      callbacks: {
          // kalau deskripsi diedit, maka munculkan tombol simpan
          onChange: function(contents, $editable) { 
            $('#tombol_simpan').show();
          },
      },
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        // ['fontsize', ['fontsize']],
        // ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']], 
        ['view', ['help']],
        ['insert', ['link']],
        
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
