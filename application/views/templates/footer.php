
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Tugas Pemrograman Mobile 2021
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php if ( 
    // Fasilitas chat dengan panitia hanya ada untuk member yang sudah login:: Admin dan Tamu tidak bisa
    empty($this->session->userdata('admin')) AND !empty($this->session->userdata('id_user'))
 ): // kalau admin, tombol chat dihilangkan ?>
  <button class="chat-button btn btn-primary shadow" onclick="open_chat_for_user()" data-toggle="modal" data-target="#modal-default">
    <span class="fa fa-comments"></span> 
  </button>
  <span class="badge badge-danger badge-for-chat-btn" style="display: none;">...</span>

  <div class="modal fade modal-chat" id="modal-default" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="height: 80vh;">
        <div class="modal-header">
          <h5 class="modal-title">Chat Dengan Panitia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_chatbox_for_user()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="direct-chat direct-chat-primary">

            <center class="mt-1 pt-3 pm-3 pl-3">
              <?php echo form_open('', 'id="form_input_chat"') ?>
              <input type="hidden" name="id_user_penerima" required="">
                <div class="input-group">
                  <input type="text" name="msg" placeholder="Tulis pesan ..." class="form-control" autocomplete="off" required="">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </span>
                </div>
              </form>
              <small class="text-gray" id="terakhir_online">
                ...
              </small>
            </center>
            <hr>
            <!-- /.card-footer-->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">

                <div class="wadah-untuk-chat-messages">
                  <center class="text-gray">
                    <i>Pilih kontak untuk chat dengan user.</i>
                  </center>
                </div>
                
              </div>
              
              <!--/.direct-chat-messages-->

            </div>
            <!-- /.card-body -->

          </div>
          <!--/.direct-chat -->

        </div>
        <div class="overlay" style="display: none;">
          <div class="lds-dual-ring"></div>
        </div> <!-- /.overlay -->
        <!-- <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endif ?>

<div class="modal fade modal-notification" id="modal-notification" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notification_wrapper">
        <div class="col-12 rounded py-1 notification notification_unread">
          <h4 class="mt-2">
            Dapat 50 Loves Dari Panitia
          </h4>
          <p class="text-sm">Anda mendapatkan 50 loves dari panitia berkat donasi yang Anda berikan untuk mendukung event ini.</p>
          <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 2 Jam Lalu</p>
        </div>
        <div class="dropdown-divider"></div>
        <!-- /.notification -->
        
      </div>
      <!-- <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- Intro JS -->
<script src="<?php echo base_url() ?>assets/plugins/intro.js/intro.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Fancybox -->
<script src="<?php echo base_url() ?>assets/plugins/fancybox/dist/jquery.fancybox.min.js"></script>
<script>
  // introJs().setOptions({
  //   disableInteraction: true,
  //   steps: [{
  //     title: 'Welcome',
  //     intro: 'Hello World! 👋'
  //   },
  //   {
  //     element: document.querySelector('#notification-badge'),
  //     intro: 'This step focuses on an image'
  //   },
  //   {
  //     title: 'Farewell!',
  //     element: document.querySelector('#pushmenu'),
  //     intro: 'And this is our final step!'
  //   }]
  // }).start();

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

  // Loader for button
  function show_loader(element, caption="Loading...") {
    element.addClass('disabled');
    let captionAsli = element.html();
    element.attr('captionAsli', captionAsli);
    element.html('<img class="mr-2" src="<?php echo base_url() ?>assets/widi/img/loader.gif"> ' + caption);
  }

  function hide_loader(element) {
    element.removeClass('disabled');
    let captionAsli = element.attr('captionAsli');
    element.html(captionAsli);
  }

  // Confirm box
  function confirm_box(msg, icon, confirm_text, redirect) {
    Swal.fire({
      title: msg,
      icon: icon,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Batal',
      confirmButtonText: confirm_text
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = redirect;
      }
    })
  }

  // Turunkan preloader
  function turunkan_preloader() {
    $(".preloader").animate({height:"100vh"}, 130)
    $(".preloader").children().show()
  }
  function redirecting(href) {
    turunkan_preloader()
    setTimeout(function () {
      window.location.href = href
    }, 700)
  }

  $(document).ready(function() {
    // SWEETALERT
    <?php if ( $this->session->flashdata('msg') ): ?>
      <?php 
        $split = explode('#', $this->session->flashdata('msg'));
        $code = $split[0];
        $msg_itself = $split[1];
      ?>
      setTimeout(function function_name(argument) {
        Swal.fire({
          icon: '<?php echo $code ?>',
          title: '<?php echo $msg_itself ?>',
        })
      }, 100)
    <?php endif ?>

    // Highlight active sidebar item
    $('.nav-sidebar').find('.nav-link').each(function () {
      if ( $(this).attr('menu_title') == "<?php echo $title ?>" ) {
        $(this).addClass('active');
      }
    })

  })

  // Sarankan untuk login kalau belum login

  <?php if ( empty($this->session->userdata('id_user')) ): ?>
    $('[menu_title="Galeri Saya"]').removeClass('do_transition')
    $('[menu_title="Galeri Saya"]').click(function (e) {
      e.preventDefault();
      Swal.fire({
        icon: 'warning',
        title: 'Anda harus login terlebih dahulu!',
      })
    })
    
  <?php endif ?>


  // Transisi sebelum pindah halaman (Block kode ini harus di paling akhir ya)
  $("a.do_transition").click(function (event) {
    event.preventDefault()
    redirecting( $(this).attr("href") )
  })
  $("button.do_transition").click(function () {
    turunkan_preloader()
  })


  // Update waktu online setiap 1 menit
  function set_terakhir_online() {
    $.ajax({
      url: '<?php echo base_url() ?>api/set_terakhir_online/<?php echo $this->session->userdata('id_user') ?>',
      // error: function(xhr, status, error){
      //     swal.fire({
      //       title: "Error! " + error,
      //       title: "Error! " + error,
      //       icon: 'warning',
      //     })
      // },
    })
  }

  // Run, and repeat every 60 secs
  set_terakhir_online();
  setInterval(function () {
    set_terakhir_online()
  }, 30000)


</script>

<?php 
    $this->load->view('FUNDAMENTAL_CHAT');
?>

<!-- WADUH SEMAKIN PUSING INI CHAT INI... JANGAN SAMPAI LUPA YA! -->
<!-- Hanya muncul ketika yang login BUKAN admin / member biasa -->
<?php if ( empty($this->session->userdata('admin')) ): ?>
  <script type="text/javascript">

    // Membedakan chatbox terbuka dan tertutup
    // Jika tertutup maka badge-for-chat-btn diisi angka,
    // Jika terbuka maka refresh chat setiap 5 detik
    var KONDISI_CHATBOX = 'tertutup';
    function close_chatbox_for_user() {
       KONDISI_CHATBOX = 'tertutup';
    }

    function open_chat_for_user(){
      get_chats( '<?php echo $this->session->userdata('id_user'); ?>', GLOBAL_limit_chat );
      clear_unread_msg_for_user( '<?php echo $this->session->userdata('id_user'); ?>' );
      KONDISI_CHATBOX = 'terbuka';
    }

    function check_new_chat_msg(unread_msg) {
      if ( unread_msg != 0 ) {
        $('.badge-for-chat-btn').html(unread_msg)
        $('.badge-for-chat-btn').show()
      }else{
        $('.badge-for-chat-btn').hide()
      }
    }

    // Status online milik admin
    setInterval(function() {
      if ( KONDISI_CHATBOX == 'terbuka' ) {
        // refresh setiap 5 detik
        get_admin_online_terakhir()
        count_unread_msg_for_user( '<?php echo $this->session->userdata('id_user'); ?>', function (unread_msg) {
          // Kalau ada pesan baru, maka refresh
          if ( unread_msg != 0 ) {
            refresh_chat();
            clear_unread_msg_for_user( '<?php echo $this->session->userdata('id_user'); ?>' );
          }
        })
      }else if ( KONDISI_CHATBOX == 'tertutup' ){
        // hitung pesan baru
        count_unread_msg_for_user( '<?php echo $this->session->userdata('id_user'); ?>', function (unread_msg) {
          // Kalau ada pesan baru, maka tambah notifikasi pesan baru
          check_new_chat_msg(unread_msg);
        })
      }
      

    }, 5000)



    // hitung pesan baru saat awal load halaman
    count_unread_msg_for_user( '<?php echo $this->session->userdata('id_user'); ?>', function (unread_msg) {
      // Kalau ada pesan baru, maka refresh
      check_new_chat_msg(unread_msg)
    })

  </script>
<?php endif ?>

  <script type="text/javascript">
    function count_unread_notification( id_user, callback ) {
      $.ajax({
        url: '<?php echo base_url() ?>api/count_unread_notification/'+id_user,
        success: function(data) {
          callback(data);
        }
      })
    }
    function clear_unread_notification(id_user) {
        $.ajax({
          url: "<?php echo base_url() ?>api/clear_unread_notification/" + id_user,
        });
    }

    // Ini yang terjadi ketika notifikasi dibuka
    function open_notification(limit){
      $('#modal-notification').modal('toggle');
      $('#notification-badge').hide();
      $('#notification-badge').parent().removeClass('shaking');

      clear_unread_notification( '<?php echo $this->session->userdata('id_user') ?>' );

      $.ajax({
        url: '<?php echo base_url() ?>api/get_notification/'+limit,
        success: function(data) {
          let content = ``
          data = JSON.parse(data);
          for (var i = 0; i < data.length; i++) {
            content += `
                <div class="col-12 rounded py-1 notification">
                  <h4 class="mt-2">
                    ${data[i].judul}
                  </h4>
                  <p class="text-sm">${data[i].teks}</p>
                  <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> ${data[i].time}</p>
                </div>
                <div class="dropdown-divider"></div>
                <!-- /.notification -->
            `;
          }
          content += `<a role="button" class="btn btn-outline-primary w-100" onclick="$('.hidden_notif').slideDown(400)">Muat Lebih Banyak</a>`;
          $("#notification_wrapper").html(content);
        }
      })
    }

    // Check unread notifikasi setiap 10 detik
    count_unread_notification( '<?php echo $this->session->userdata('id_user') ?>', function (data) {
      if ( parseInt(data) <= 0 ) { // <-- kalau tidak ada unread notification
        $('#notification-badge').hide();
        $('#notification-badge').parent().removeClass('shaking'); // <-- hilangkan getarnya
      }else{
        $('#notification-badge').html(data);
        $('#notification-badge').show();
      }
    } )
    setInterval(function () {
      count_unread_notification( '<?php echo $this->session->userdata('id_user') ?>', function (data) {
        if ( parseInt(data) <= 0 ) { // <-- kalau tidak ada unread notification
          $('#notification-badge').hide();
          $('#notification-badge').parent().removeClass('shaking'); // <-- hilangkan getarnya
        }else{
          $('#notification-badge').html(data);
          $('#notification-badge').show();
        }
      } )
    }, 10000)
    
  </script>



</body>
</html>
