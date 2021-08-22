
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

<button class="chat-button btn btn-primary shadow" data-toggle="modal" data-target="#modal-default">
  <span class="fa fa-comments"></span>
</button>

<div class="modal fade modal-chat" id="modal-default" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="height: 80vh;">
      <div class="modal-header">
        <h5 class="modal-title text-white">Chat Dengan Panitia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="direct-chat direct-chat-primary">
          <!-- <div class="card-header">
            <h3 class="card-title">Direct Chat</h3>

            <div class="card-tools">
              <span title="3 New Messages" class="badge badge-primary">3</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                <i class="fas fa-comments"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div> -->
          <!-- /.card-header -->
          <div class="card-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Tulis pesan ..." class="form-control" autocomplete="off">
                <span class="input-group-append">
                  <button type="button" class="btn btn-primary">Kirim</button>
                </span>
              </div>
            </form>
          </div>

          <center>
            <small class="text-white">
              Terakhir online 2 jam lalu
            </small>
          </center>
          <hr>
          <!-- /.card-footer-->
          <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">

              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left text-white">Admin</span>
                  <span class="direct-chat-timestamp float-right text-white">6 Jul 2021 02:03</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="<?php echo base_url() ?>assets/widi/img/user_no_image.jpg" alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Menjadi dilahirkan dan hidup memang bukan pilihan, namun berusaha bermanfaat bagi orang adalah pilihan yang membuat hidup kita menjadi lebih berharga :)
                </div>
                <!-- /.direct-chat-text -->
              </div>
              <!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-right text-white">Free Woman</span>
                  <span class="direct-chat-timestamp float-left text-white">6 Jul 2021 02:02</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Kenapa saya hidup?
                </div>
                <!-- /.direct-chat-text -->
              </div>

              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left text-white">Admin</span>
                  <span class="direct-chat-timestamp float-right text-white">6 Jul 2021 02:02</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="<?php echo base_url() ?>assets/widi/img/user_no_image.jpg" alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Silakan bertanya apapun kak :)
                </div>
                <!-- /.direct-chat-text -->
              </div>
              <!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-right text-white">Free Woman</span>
                  <span class="direct-chat-timestamp float-left text-white">6 Jul 2021 02:01</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Permisi, apa saya boleh bertanya?
                </div>
                <!-- /.direct-chat-text -->
              </div>

              <div class="hidden_msg" style="display: none;">
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right text-white">Free Woman</span>
                    <span class="direct-chat-timestamp float-left text-white">6 Jul 2021 01:01</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right text-white">Free Woman</span>
                    <span class="direct-chat-timestamp float-left text-white">6 Jul 2021 01:01</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right text-white">Free Woman</span>
                    <span class="direct-chat-timestamp float-left text-white">6 Jul 2021 01:01</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right text-white">Free Woman</span>
                    <span class="direct-chat-timestamp float-left text-white">6 Jul 2021 01:01</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="<?php echo base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
              </div>

              <a role="button" class="btn btn-block btn-default w-100" onclick="$('.hidden_msg').slideDown(400)">Muat Lebih Banyak</a>

            </div>
            <!--/.direct-chat-messages-->

          </div>
          <!-- /.card-body -->
        </div>
        <!--/.direct-chat -->
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

<div class="modal fade modal-notification" id="modal-notification" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 rounded py-1 notification notification_unread">
          <h4 class="mt-2">
            Dapat 50 Loves Dari Panitia
          </h4>
          <p class="text-sm">Anda mendapatkan 50 loves dari panitia berkat donasi yang Anda berikan untuk mendukung event ini.</p>
          <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 2 Jam Lalu</p>
        </div>
        <div class="dropdown-divider"></div>
        <!-- /.notification -->
        <div class="col-12 rounded py-1 notification">
          <h4 class="mt-2">
            Siapa Saja Bisa Berkarya
          </h4>
          <p class="text-sm">Siapa saja warga Universitas Duta Bangsa boleh mendaftar dan memajang karya mereka di Galeri Karya UDB.</p>
          <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 4 Jam Lalu</p>
        </div>
        <div class="dropdown-divider"></div>
        <!-- /.notification -->
        <div class="col-12 rounded py-1 notification">
          <h4 class="mt-2">
            3 Karya Setiap Akun
          </h4>
          <p class="text-sm">Setiap akun memiliki kesempatan untuk memajang maksimal 3 karya.</p>
          <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 4 Jam Lalu</p>
        </div>
        <div class="dropdown-divider"></div>
        <!-- /.notification -->
        <div class="col-12 rounded py-1 notification">
          <h4 class="mt-2">
            Selamat Datang
          </h4>
          <p class="text-sm">Selamat datang di Galeri Karya Universitas Duta Bangsa Surakarta. Di sini menggunakan Intro JS kami akan membimbing Anda dengan tutorial.</p>
          <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 4 Jam Lalu</p>
        </div>
        <div class="dropdown-divider"></div>
        <!-- /.notification -->
        <span class="hidden_notif" style="display: none;">
          <div class="col-12 rounded py-1 notification">
            <h4 class="mt-2">
              Siapa Saja Bisa Berkarya
            </h4>
            <p class="text-sm">Siapa saja warga Universitas Duta Bangsa boleh mendaftar dan memajang karya mereka di Galeri Karya UDB.</p>
            <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 4 Jam Lalu</p>
          </div>
          <div class="dropdown-divider"></div>
          <!-- /.notification -->
          <div class="col-12 rounded py-1 notification">
            <h4 class="mt-2">
              3 Karya Setiap Akun
            </h4>
            <p class="text-sm">Setiap akun memiliki kesempatan untuk memajang maksimal 3 karya.</p>
            <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 4 Jam Lalu</p>
          </div>
          <div class="dropdown-divider"></div>
          <!-- /.notification -->
          <div class="col-12 rounded py-1 notification">
            <h4 class="mt-2">
              Selamat Datang
            </h4>
            <p class="text-sm">Selamat datang di Galeri Karya Universitas Duta Bangsa Surakarta. Di sini menggunakan Intro JS kami akan membimbing Anda dengan tutorial.</p>
            <p class="text-sm" style="opacity:.6;"><i class="far fa-clock mr-1"></i> 4 Jam Lalu</p>
          </div>
          <div class="dropdown-divider"></div>
          <!-- /.notification -->
        </span>
        <a role="button" class="btn btn-outline-primary w-100" onclick="$('.hidden_notif').slideDown(400)">Muat Lebih Banyak</a>
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

<div class="modal fade" id="modal-notification" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Notifikasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-weight: normal;">
        <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
          Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
          <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
        </div> <!-- notifikasi -->
        <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
          Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
          <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
        </div> <!-- notifikasi -->
        <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
          Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
          <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
        </div> <!-- notifikasi -->
        <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
          Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
          <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
        </div> <!-- notifikasi -->
        <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
          Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
          <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
        </div> <!-- notifikasi -->
        <span class="hidden_notif" style="display: none;">
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
          <div class="container bg-gray rounded p-2 pb-4 notifikasi mb-2">
            Beberapa orang menambahkan iklan Anda {$judul_iklan} ke wishlist mereka.<br>
            <span class="float-right" style="opacity: .8;"><small>4 Jam Lalu</small></span>
          </div> <!-- notifikasi -->
        </span>
        <button class="btn btn-outline-secondary w-100 mb-2" onclick="$('.hidden_notif').toggle(400);">Muat Lebih Banyak</button>
      </div>
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>

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
  // Transisi sebelum pindah halaman
  $(".do_transition").click(function (event) {
    event.preventDefault()
    
    redirecting( $(this).attr("href") )
  })

  function notification_bell(){
    $('#modal-notification').modal('toggle');
    $('#notification-badge').hide();
    $('#notification-badge').parent().removeClass('shaking');
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

  // Sarankan untuk login kalau iklan saya dan wishlist dibuka
  <?php if ( !$this->session->userdata('id_user') ): ?>
    $('[menu_title="Iklan Saya"]').click(function (e) {
      e.preventDefault();
      Swal.fire({
        icon: 'warning',
        title: 'Anda harus login terlebih dahulu!',
      })
    })
    
    $('[menu_title="Wishlist"]').click(function (e) {
      e.preventDefault();
      Swal.fire({
        icon: 'warning',
        title: 'Anda harus login terlebih dahulu!',
      })
    })
  <?php endif ?>
  

</script>
</body>
</html>
