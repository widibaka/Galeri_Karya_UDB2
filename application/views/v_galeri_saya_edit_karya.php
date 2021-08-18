
<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		    <!-- general form elements -->
		    <div class="card card-primary">
		      <div class="card-header">
		        <h3 class="card-title">Edit Iklan</h3>
		      </div>
		      <!-- /.card-header -->
		      <!-- form start -->
		      <form action="" method="post">
	      		<input name="id_karya" type="hidden" value="<?php echo $data_karya['id_karya'] ?>" required=""></input>
	      		<input name="id_user" type="hidden" value="<?php echo $data_karya['id_user'] ?>" required=""></input>
	      	  	<div class="card-body">

	      	  	  <label>Gambar Iklan</label>

	      	  	  <?php 
	      	  	    $dir = "assets/img_karya/" . $data_karya['id_karya'];

	      	  	    // Gambar yang paling atas ascending
	      	  	    $scandir = scandir($dir);

	      	  	    // Unset element yang gak diperlukan
	      	  	    unset($scandir[0]);
	      	  	    unset($scandir[1]);
	      	  	  ?>

	      	  	  <div class="border row p-3">
	      	  	  	<?php if ( empty($scandir) ): ?>
	      	  	  		<strong class="text-gray w-100">Mohon upload satu atau lebih gambar untuk karya ini!</strong>
	      	  	  	<?php endif ?>
	      	  	  	<?php foreach ($scandir as $key => $val): ?>
	      	  	  	  <div class="wadah">
	      	  	  	  	<img class="m-1" src="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/" . $val ?>" style="height: 120px;">
	      	  	  	  	<a href="<?php echo base_url() . 'api/hapus_gambar/' . $data_karya['id_karya'] . '/' . $val ?>" class="btn btn-default btn-sm overlay hapus_gambar" onclick="return confirm('Anda yakin ingin menghapus?')">
	      	  	  	  		<i class="fa fa-trash mr-1"></i> Hapus
	      	  	  	  	</a>
	      	  	  	  </div>
	      	  	  	<?php endforeach ?>
	      	  	  	<span class="btn btn-lg btn-default input-group-text" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus mr-1"></i> Tambah Gambar</span>
	      	  	  </div>
	      	  	  <hr>



	      	  	  <div class="form-group">
	      	  	    <label for="judul">Judul Karya</label>
	      	  	    <input type="text" class="form-control" name="judul" id="judul" placeholder="Aplikasi Penangkal Hujan" required="" value="<?php echo $data_karya['judul'] ?>">
	      	  	  </div>
	      	  	  <div class="form-group">
	      	  	    <label for="judul">Kategori</label>
	      	  	    <input type="text" class="form-control" name="judul" id="judul" placeholder="Panen Ikan Lele Jumbo" required="" value="<?php echo $data_karya['judul'] ?>">
	      	  	  </div>
	      	  	  <div class="form-group">
	      	  	    <label for="deskripsi">Deskripsi</label>
	      	  	    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""><?php echo $data_karya['deskripsi'] ?></textarea>
	      	  	  </div>
		        </div>
		        <!-- /.card-body -->

		        <div class="card-footer">
		          <button type="submit" class="btn btn-lg btn-primary">
		          	<i class="fa fa-eye mr-1"></i> Publikasikan Sekarang
		          </button>
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
	        <form action="<?php echo base_url() ?>api/upload_gambar" enctype="multipart/form-data" method="post" accept-charset="utf-8">
	        	<input type="hidden" name="id_karya" value="<?php echo $data_karya['id_karya'] ?>">
		        <div class="custom-filemb-3">
		          <input name="userfile" accept="image/*" type='file' id="imgInp" class="form-control btn btn-flat btn-lg btn-primary" id="customFile" style="height: 53px;">
		        </div>
		        <div class="mt-2">
		          <button type="submit" class="btn btn-flat btn-outline-primary w-100" id="upload_gambar" style="height: 40px;">
		          	<center class="loader_upload_btn" style="display: none; margin-top: -5px;">
		          	  <div class="lds-dual-ring2" style="
		          	      height: 20px;
		          	      width: 20px;
		          	      border-color: #6c757d transparent #6c757d transparent;
		          	  "></div>
		          	</center>
		          	<span class="content_of_upload_btn">
		          	  <i class="fa fa-upload"></i> Upload Gambar
		          	</span>
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