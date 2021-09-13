<?php if ( empty($main_data) ): ?>
  <div class="alert alert-danger">
    Tidak ada data.
  </div>
<?php return 0; endif; ?>

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
    <?php $number = 1;
      $top_score = $this->KaryaModel->get_highest_loves();
      foreach ($main_data as $key => $val): 
      ?>
      <tr>
        <td class="align-middle"><?php echo $number ?>.</td>
        <td class="align-middle">
          <a href="<?php echo base_url() ?>detail_karya/i/<?php echo $val['id_karya'] ?>"><?php echo $val['judul'] ?></a>
        </td>
        <td class="align-middle"><span class="badge bg-danger"><?php echo $val['loves'] ?> <span class="fa fa-heart"></span></span></td>
        <td class="align-middle">
          <div class="progress progress-xs">
            <div class="progress-bar progress-bar-danger bg-danger" style="width: <?php echo $val['loves'] / $top_score * 100 ?>%"></div>
          </div>
        </td>
        <td class="align-middle"><?php echo $val['nama_kategori'] ?></td>
        <td class="align-middle">@<?php echo $val['kreator']['username'] ?></td>
      </tr>
    <?php $number++; endforeach; ?>
    
  </tbody>
</table>

