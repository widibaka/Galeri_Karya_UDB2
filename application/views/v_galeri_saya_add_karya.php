
<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		    <!-- general form elements -->
		    <div class="card card-success">
		      <div class="card-header">
		        <h3 class="card-title">Buat Karya Baru</h3>
		      </div>
		      <!-- /.card-header -->
		      <!-- form start -->
		      <?php echo form_open() ?>
		      	<input name="id_karya" type="hidden" value="<?php echo $this->session->userdata('id_user') . '_' . time() ?>" required=""></input>
		      	<input name="id_user" type="hidden" value="<?php echo $this->session->userdata('id_user') ?>" required=""></input>
		        <div class="card-body">
		          <div class="form-group">
		            <label for="kategori">Kategori</label>
		            <select type="text" class="form-control" name="id_kategori" id="kategori" required="">
		            	<option value="">::Pilih Kategori::</option>
		            	<?php foreach ($kategori as $key => $val): ?>
		            		<option value="<?php echo $val['id_kategori'] ?>"><?php echo $val['nama_kategori'] ?></option>
		            	<?php endforeach ?>
		            </select>
		          </div>
		          <div class="form-group">
		            <label for="judul">Judul</label>
		            <input type="text" class="form-control" name="judul" id="judul" placeholder="Aplikasi Penangkal Hujan" required="">
		          </div>
		          <div class="form-group">
		            <label for="deskripsi">Deskripsi</label>
		            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""></textarea>
		          </div>
		          <div class="form-group">
		            <label for="tim">Tim</label>
		            <textarea class="form-control" name="tim" id="tim" placeholder="Adi Nugroho, Budi Budiman, Onno W Purbo" required=""></textarea>
		            <p class="text-muted"><i>Nama anggota tim pastikan semua benar karena akan dipakai untuk mencetak sertifikat. Jika Anda hanya satu orang (hehe, kasihan), maka isikan nama Anda.</i></p>
		          </div>

		        </div>
		        <!-- /.card-body -->

		        <div class="card-footer">
		          <button type="submit" class="btn btn-lg btn-primary do_transition">Berikutnya</button>
		        </div>
		      </form>
		    </div>
		    <!-- /.card -->

		</div>
	</div>
</div>
