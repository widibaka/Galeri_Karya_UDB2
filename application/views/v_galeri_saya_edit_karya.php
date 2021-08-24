
<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">



<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		    <!-- general form elements -->
		    <div class="card card-success">
		      <div class="card-header">
		        <h3 class="card-title">Edit Karya</h3>
		      </div>
		      <!-- /.card-header -->
		      <!-- form start -->
		      <?php echo form_open() ?>
	      		<input name="id_karya" type="hidden" value="<?php echo $data_karya['id_karya'] ?>" required=""></input>
	      		<input name="id_user" type="hidden" value="<?php echo $data_karya['id_user'] ?>" required=""></input>
      	  	<div class="card-body">

      	  	  <label>Gambar Karya</label>

      	  	  <?php 
      	  	    $dir = "assets/img_karya/" . $data_karya['id_karya'] . "";

      	  	    // Gambar yang paling atas ascending
      	  	    $scandir = scandir($dir . '/thumb');

      	  	    // Unset element yang gak diperlukan
      	  	    unset($scandir[0]);
      	  	    unset($scandir[1]);
      	  	  ?>

      	  	  <div class="border row p-3 glassy_thing rounded">
      	  	  	<?php if ( empty($scandir) ): ?>
      	  	  		<strong class="text-gray w-100">Mohon upload satu atau lebih gambar untuk karya ini!</strong>
      	  	  	<?php endif ?>
      	  	  	<?php foreach ($scandir as $key => $val): ?>
      	  	  		
      	  	  			<div class="wadah">
      	  	  				<a data-fancybox="gallery" href="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/" . $val ?>">
      	  	  					<img class="m-1" src="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/thumb/" . $val ?>" style="height: 120px;">
      	  	  				</a>
      	  	  				<span class="btn btn-default btn-sm overlay hapus_gambar" style="z-index: 100;" onclick="return confirm_box('Anda yakin ingin menghapus?', 'question', 'Ya, hapus!', '<?php echo base_url() . 'api/hapus_gambar/' . $data_karya['id_karya'] . '/' . base64_encode($val) ?>')">
      	  	  					<i class="fa fa-trash mr-1"></i> Hapus
      	  	  				</span>
      	  	  			</div>
      	  	  		
      	  	  	  
      	  	  	<?php endforeach ?>
      	  	  	<span class="btn btn-lg btn-default input-group-text" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus mr-1"></i> Tambah Gambar</span>
      	  	  </div>
      	  	  <p class="text-muted"><i>Silakan upload gambar-gambar menarik yang menunjang galeri Anda.</i></p>
      	  	  <hr>

      	  	  <div class="form-group">
      	  	    <label for="judul">Judul Karya</label>
      	  	    <input type="text" class="form-control" name="judul" id="judul" placeholder="Aplikasi Penangkal Hujan" required="" value="<?php echo $data_karya['judul'] ?>">
      	  	  </div>
      	  	  <div class="form-group">
      	  	    <label for="kategori">Kategori</label>
      	  	    <select type="text" class="form-control" name="id_kategori" id="kategori" required="">
      	  	    	<option value="">::Pilih Kategori::</option>
      	  	    	<?php foreach ($kategori as $key => $val): ?>
      	  	    		<option <?php echo ($val['id_kategori'] == $data_karya['id_kategori']) ? 'selected' : '' ?> value="<?php echo $val['id_kategori'] ?>"><?php echo $val['nama_kategori'] ?></option>
      	  	    	<?php endforeach ?>
      	  	    </select>
      	  	  </div>
      	  	  <div class="form-group">
      	  	    <label for="deskripsi">Deskripsi</label>
      	  	    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""><?php echo $data_karya['deskripsi'] ?></textarea>
      	  	  </div>
		          <div class="form-group">
		            <label for="tim">Tim</label>
		            <textarea class="form-control" name="tim" id="tim" placeholder="Adi Nugroho, Budi Budiman, Onno W Purbo" required=""><?php echo $data_karya['tim'] ?></textarea>
		            <p class="text-muted"><i>Nama anggota tim pastikan semua benar karena akan dipakai untuk mencetak sertifikat. Jika Anda hanya satu orang (hehe, kasihan), maka isikan nama Anda.</i></p>
		          </div>
		        </div>
		        <!-- /.card-body -->

		        <div class="card-footer">
		          <?php if ( $data_karya['published'] == 1 ): ?>
		          	<input type="hidden" name="published" value="0">
		          	<button type="submit" class="btn btn-lg btn-danger do_transition">
		          		<i class="fa fa-eye-slash mr-1"></i> Berhenti Publikasi
		          	</button>
		          <?php elseif( $data_karya['published'] == 0 ): ?>
		          	<input type="hidden" name="published" value="1">
		          	<button type="submit" class="btn btn-lg btn-primary do_transition">
		          		<i class="fa fa-eye mr-1"></i> Publikasikan Sekarang
		          	</button>
		          <?php endif ?>
		        </div>
		      </form>
		    </div>
		    <!-- /.card -->

		</div>
	</div>
</div>



<div class="modal fade" id="modal-default" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pilih Gambar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	      <img src="" id="preview_gambar" style="width: 100%;">
	      <div class="form-group">
	        <!-- <form action="<?php echo base_url() ?>api/upload_gambar" enctype="multipart/form-data" method="post" accept-charset="utf-8"> -->
	        <?php echo form_open( base_url() . 'api/upload_gambar', ' enctype="multipart/form-data"') ?>
	        	<input type="hidden" name="id_karya" value="<?php echo $data_karya['id_karya'] ?>">
		        <div class="custom-filemb-3">
		          <input name="userfile" accept="image/*" type='file' id="imgInp" class="form-control btn btn-flat btn-lg btn-primary" id="customFile" style="height: 53px;">
		        </div>
		        <div class="mt-2">
		          <button type="submit" class="btn btn-flat btn-outline-primary w-100" id="upload_gambar" style="height: 40px;">
		          	<i class="fa fa-upload"></i> Upload Gambar
		          </button>
		        </div>
	        </form>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->