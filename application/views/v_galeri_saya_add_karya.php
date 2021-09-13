
<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		    <!-- general form elements -->
		    <div class="card card-primary">
		      <div class="card-header">
		        <h3 class="card-title">Buat Iklan Baru</h3>
		      </div>
		      <!-- /.card-header -->
		      <!-- form start -->
		      <form action="" method="post">
		      	<input name="id_iklan" type="hidden" value="<?php echo $this->session->userdata('id_user') . '_' . time() ?>" required=""></input>
		      	<input name="id_user" type="hidden" value="<?php echo $this->session->userdata('id_user') ?>" required=""></input>
		        <div class="card-body">
		          <div class="form-group">
		            <label for="judul">Judul Iklan</label>
		            <input type="text" class="form-control" name="judul" id="judul" placeholder="Panen Ikan Lele Jumbo" required="">
		          </div>
		          <div class="form-group">
<<<<<<< Updated upstream
		            <label for="harga">Harga</label>
		            <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp 20.000" required="">
=======
		            <label for="judul">Judul</label>
		            <input type="text" class="form-control" name="judul" id="judul" placeholder="" required="">
>>>>>>> Stashed changes
		          </div>
		          <div class="form-group">
		            <label for="satuan">Satuan</label>
		            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Kilogram" required="">
		          </div>
		          <div class="form-group">
		            <label for="deskripsi">Deskripsi</label>
		            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""></textarea>
		            <p class="text-muted"><i>Silakan isi deskripsi karya Anda sebaik mungkin, untuk menarik minat publik melihatnya. Dapat pula Anda tambahkan kelas dan jurusan Anda beserta tim. Jangan lupa gunakan bahasa yang sopan yah? :)</i></p>
		          </div>
		          <div class="form-group">
		            <label for="kota">Kota</label>
		            <input type="text" class="form-control" name="kota" id="kota" placeholder="Surabaya" required="">
		          </div>

		        </div>
		        <!-- /.card-body -->

		        <div class="card-footer">
		          <button type="submit" class="btn btn-primary">Berikutnya</button>
		        </div>
		      </form>
		    </div>
		    <!-- /.card -->

		</div>
	</div>
</div>
