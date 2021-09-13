<?php if ( $settings['aktifkan_event'] == 0 ): ?>
  <div class="d-flex justify-content-center">
    <div class="card">
      <div class="card-body text-center">
        <img src="<?php echo base_url() ?>assets/emoji/sad.png" style="width: 40px;">
        <p class="mt-2">Event Lomba Belum Digelar</p>
      </div>
    </div>
  </div>
  <?php return; ?>
<?php endif ?>

<div class="d-flex justify-content-center">
  <!-- <div class="card p-3 text-center m-2">
    <h1 id="date" class="h3 mb-3 font-weight-light">Hari, TGL Bulan Tahun</h1>
    <h1 id="clock" class="h3 mb-2 font-weight-normal">00:00:00</h1>
  </div> -->
  <div class="card p-3 text-center">
    <h1 class="h3 mb-3 font-weight-light">Hitung Mundur</h1>
    <h1 id="hitung_mundur" class="h3 mb-2 font-weight-normal" data-time="<?php echo date("M d, Y H:i:s", strtotime($settings['tanggal_berakhirnya_event'])) ?>">00:00:00</h1>
    <p><i>Lomba berakhir <br>saat waktu habis</i></p>
  </div>
</div>
<div class="card mt-4">
  <div class="card-header">
    <h3 class="card-title">Para Peringkat Atas (Almost Realtime Display)</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive" id="wadah_data">
    <center><img class="mr-2" src="<?php echo base_url() ?>assets/widi/img/loader.gif"> Loading ...</center>
  </div>
  <!-- /.card-body -->
  <div class="overlay" style="display: none;" id="loader_overlay">
    <strong>Updating ...</strong>
  </div> <!-- /.overlay -->
</div>

<?php if ( empty($main_data) ): ?>
  <div class="alert alert-danger">
    Tunggu apa lagi, mahasiswa UDB? Ayo pajang karya Anda di Galeri Karya UDB dan amati peringkatnya di sini!
  </div>
<?php return 0; endif; ?>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Karya Anda</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width: 10px">Peringkat</th>
          <th>Judul Karya</th>
          <th style="width: 40px">Love</th>
          <th>Persaingan</th>
          <th>Kategori</th>
          <th>Akun</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $top_score = $this->KaryaModel->get_highest_loves();
          foreach ($main_data as $key => $val): 
          ?>
          <tr>
            <td class="align-middle"><?php echo $val['ranking'] ?>.</td>
            <td class="align-middle">
              <a href="<?php echo base_url() ?>detail_karya/i/<?php echo $val['id_karya'] ?>"><?php echo $val['judul'] ?></a>
            </td>
            <td class="align-middle"><span class="badge bg-danger"><?php echo $val['loves'] ?> <span class="fa fa-heart"></span></span></td>
            <td class="align-middle">
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger bg-danger" data-width="<?php echo $val['loves'] / $top_score * 100 ?>%" style="width: 0"></div>
              </div>
            </td>
            <td class="align-middle"><?php echo $val['nama_kategori'] ?></td>
            <td class="align-middle">@<?php echo $val['kreator']['username'] ?></td>
          </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>


  </div>
  <!-- /.card-body -->
  <div class="overlay" style="display: none;" id="loader_overlay">
    Updating ...
  </div> <!-- /.overlay -->
</div>