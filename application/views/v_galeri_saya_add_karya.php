
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
		      <?php echo form_open('', ' id="form_add_karya"') ?>
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
		            <label for="youtube">Video Youtube (Opsional)</label>
		            <textarea class="form-control" name="youtube" id="youtube" placeholder="https://youtu.be/20ZWyCOFG6g, https://www.youtube.com/embed/tMWkeBIohBs, https://www.youtube.com/watch?v=35WcRmWlHks"></textarea>
		            <p class="text-muted"><i>Isi dengan URL youtube video tentang demo karya Anda / tim. Pisahkan tiap video dengan tanda koma (,)</i></p>
		          </div>
		          <div class="form-group">
		            <label for="deskripsi">Deskripsi</label>
		            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""></textarea>
		          </div>
		          <div class="form-group">
		            <label for="link">Link (Opsional)</label>
		            <textarea class="form-control" name="link" id="x" placeholder="Link Google Drive, atau lainnya..."></textarea>
		            <p class="text-muted"><i>Isi dengan link utama aplikasi web Anda, atau link download APK Anda, ataupun lainnya juga boleh.</i></p>
		          </div>
		          <div class="form-group">
		            <label for="tim">Tim</label>
		            <textarea class="form-control" name="tim" id="tim" placeholder="Adi Nugroho, Budi Budiman, Onno W Purbo" required=""></textarea>
		            <p class="text-muted"><i>Nama anggota tim pastikan semua benar karena akan dipakai untuk mencetak sertifikat. Jika Anda hanya satu orang (hehe kasihan), maka isikan nama Anda.</i></p>
		            <p class="text-muted"><i><strong class="text-danger">[!Penting]</strong> Anggota yang akan menerima sertifikat hanya 5 (lima) nama dari urutan pertama. Walau begitu, jumlah anggota tim tetap tidak ditentukan.</i></p>
		          </div>

		        </div>
		        <!-- /.card-body -->

		        <div class="card-footer">
		          <button type="submit" class="btn btn-lg btn-primary" id="berikutnya_btn">Berikutnya</button>
		        </div>
		      </form>
		    </div>
		    <!-- /.card -->

		</div>
	</div>
</div>
