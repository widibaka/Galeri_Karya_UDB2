

<style type="text/css">

  .modal-dialog{

    z-index: 1041;

  }

</style>




<!-- summernote -->

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">

<!-- Tempusdominus Bootstrap 4 -->

<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">




<div class="container-fluid">

  <?php if ( !empty($pemenang) ): ?>

    <div class="card">

      <div class="card-body text-center">

        <?php foreach ($pemenang as $key => $value): 

          $i = $key+1;

          ?>

          <p><?php echo '#' . $i . ' - ' . $value['judul'] ?></p>

        <?php endforeach ?>

        <p>Sistem mendeteksi bahwa <br>sudah ada pemenang dari lomba sebelumnya. <br>Jika Anda ingin membuat event yang baru, maka <br>Anda harus menghapus pemenang sebelumnya agar sistem bisa <br>menentukan ranking peserta pada event lomba yang baru. <br>Jika tidak, maka ranking akan stuck pada pemenang yang lama.</p>

        <a class="btn btn-danger" href="<?php echo base_url() ?>admin/api/hapus_pemenang_sebelumnya/<?php echo base64_encode( base_url() . $this->uri->uri_string() ) ?>">Hapus Pemenang Sebelumnya</a>

      </div>




    </div>

  <?php endif ?>

	<div class="card">

		<div class="card-body">

		  <!-- form start -->

          <?php echo form_open( '', 'enctype="multipart/form-data"' ) ?>

            <div class="card-body">




              <div class="form-group">

                <div class="custom-control custom-switch">

                  <input type="checkbox" class="custom-control-input" id="aktifkan_event_lomba" name="aktifkan_event" <?php echo ($main_data['aktifkan_event']==1) ? 'checked' : '' ?>>

                  <label class="custom-control-label" for="aktifkan_event_lomba">Aktifkan Event Lomba</label>

                </div>

              </div>

              <hr>

              <div class="form-group">

                <label for="syarat_ketentuan">Syarat & Ketentuan</label>

                <textarea class="form-control" name="syarat_ketentuan" id="syarat_ketentuan"><?php echo $main_data['syarat_ketentuan'] ?></textarea>

                <p><i>Syarat dan ketentuan perlu untuk mengatur jalannya event lomba.</i></p>

              </div>

              <hr>

              <div class="form-group">

                <label for="tanggal_berakhirnya_event">Tanggal Berakhir Event</label>




                <div class="input-group date" id="tanggal_berakhirnya_event" data-target-input="nearest">

                    <input type="text" class="form-control datetimepicker-input" name="tanggal_berakhirnya_event" data-target="#tanggal_berakhirnya_event" value="<?php echo $main_data['tanggal_berakhirnya_event'] ?>">

                    <div class="input-group-append" data-target="#tanggal_berakhirnya_event" data-toggle="datetimepicker">

                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>

                    </div>

                </div>

                <?php if ( strtotime($main_data['tanggal_berakhirnya_event']) < strtotime(date('Y-m-d H:i:s')) ): ?>

                	<strong class="text-danger">TANGGAL DI ATAS SUDAH TERLEWAT!!</strong>

                <?php endif ?>

                <p><i>Event akan ditutup jika sudah lewat tanggal tersebut, dan pemenang akan dikunci secara otomatis juga pada tanggal tersebut.</i></p>

              </div>

              <hr>

              <div class="form-group">

                <label for="pamflet_event">Pamflet Event</label>

                <div class="col-12">

                	<img src="<?php echo base_url() ?>assets/uploads/pamflet_event/<?php echo $main_data['pamflet_event'] ?>" style="width: 100%; max-width: 600px;" id="preview_gambar">

                </div>

                <div class="input-group">

                  <div class="custom-file">

                    <input type="file" class="custom-file-input" id="pamflet_event" name="pamflet_event">

                    <label class="custom-file-label" for="pamflet_event">Pilih Berkas</label>

                  </div>

                </div>

                <p><i>Pamflet lomba akan muncul saat halaman situs ini dibuka pertama kali. [gif, jpg, jpeg, png]</i></p>

              </div>

            </div>

            <!-- /.card-body -->

            <div class="col-12">

              <button type="submit" class="btn btn-primary" id="tombol_simpan" style="display: none;">Simpan Perubahan</button>

            </div>

          </form>

		</div>

	</div>

</div>