
<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		    <!-- general form elements -->
<<<<<<< Updated upstream
		    <div class="card card-primary">
=======
		    <div class="card card-success">
		      <!-- /.card-header -->
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
								
									<div class="wadah m-1">
										<a data-fancybox="gallery" href="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/" . $val ?>">
											<img src="<?php echo base_url() . "assets/img_karya/" . $data_karya['id_karya'] . "/thumb/" . $val ?>" style="height: 120px;">
										</a>
										<span class="btn btn-default btn-sm btn-flat overlay hapus_gambar" onclick="return confirm_box('Anda yakin ingin menghapus?', 'question', 'Ya, hapus!', '<?php echo base_url() . 'api/hapus_gambar/' . $data_karya['id_karya'] . '/' . base64_encode($val) ?>')" style="border-radius: 0;">
											<i class="fa fa-trash mr-1"></i> Hapus
										</span>
									</div>
								
								
							<?php endforeach ?>
							<span class="btn btn-lg btn-default input-group-text" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus mr-1"></i> Tambah Gambar</span>
						</div>
						<p class="text-muted"><i>Silakan upload gambar-gambar menarik yang menunjang galeri Anda. <br>Mohon sertakan juga foto Anda / tim bersama dengan karya, agar publik tahu bahwa ini memang karya Anda. <br>Maksimal 10 gambar</i></p>
						<hr>
						<center>
							<div style="cursor: pointer;" class="heart col-12">
								<i class="fa fa-heart fa-4x fa-beat"></i>
							</div>
							<?php if( $data_karya['gacha'] > 0 ): ?>
								<div class="col-12 mt-3" id="content_get_gacha">
									Anda berkesempatan mendapatkan love dari Gacha Love. <br><br>
									<button type="button" id="love_gacha" class="btn btn-warning shadow">Klaim Sekarang</button>
								</div>
							<?php endif; ?>
							<?php if( $data_karya['gacha'] == 0 ): ?>
								<div class="col-12 mt-3" id="content_get_gacha">
									Karya ini memiliki <strong><?php echo $data_karya['loves'] ?></strong> love.
								</div>
							<?php endif; ?>
						</center>
						
					</div>
				</div>

				<div class="card card-success">
>>>>>>> Stashed changes
		      <div class="card-header">
		        <h3 class="card-title">Edit Iklan</h3>
		      </div>
<<<<<<< Updated upstream
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
=======
					<div class="card-body">
						<!-- form start -->
		      	<?php echo form_open('', ' id="form_data_karya"') ?>
							<input name="id_karya" type="hidden" value="<?php echo $data_karya['id_karya'] ?>" required=""></input>
	      			<input name="id_user" type="hidden" value="<?php echo $data_karya['id_user'] ?>" required=""></input>
      	  	  <div class="form-group">
      	  	    <label for="judul">Judul Karya</label>
      	  	    <input type="text" class="form-control" name="judul" id="judul" placeholder="" required="" value="<?php echo $data_karya['judul'] ?>">
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
      	  	    <label for="youtube">Video Youtube (Opsional)</label>
      	  	    <textarea class="form-control" name="youtube" id="youtube" placeholder="https://youtu.be/20ZWyCOFG6g, https://www.youtube.com/embed/tMWkeBIohBs, https://www.youtube.com/watch?v=35WcRmWlHks"><?php echo $data_karya['youtube'] ?></textarea>
      	  	    <p class="text-muted"><i>Isi dengan URL youtube video tentang demo karya Anda / tim. Pisahkan tiap video dengan tanda koma (,)</i></p>
      	  	  </div>
      	  	  <div class="form-group">
      	  	    <label for="deskripsi">Deskripsi</label>
      	  	    <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""><?php echo $data_karya['deskripsi'] ?></textarea>
		            <p class="text-muted"><i>Silakan isi deskripsi karya Anda sebaik mungkin, untuk menarik minat publik melihatnya. Dapat pula Anda tambahkan kelas dan jurusan Anda beserta tim. Jangan lupa gunakan bahasa yang sopan yah? :)</i></p>
      	  	  </div>
      	  	  <div class="form-group">
      	  	    <label for="link">Link (Opsional)</label>
      	  	    <textarea class="form-control" name="link" id="x" placeholder="Link Google Drive, atau lainnya..."><?php echo $data_karya['link'] ?></textarea>
      	  	    <p class="text-muted"><i>Isi dengan link utama aplikasi web Anda, atau link download APK Anda, ataupun lainnya juga boleh.</i></p>
      	  	  </div>
		          <div class="form-group">
		            <label for="tim">Tim</label>
		            <textarea class="form-control" name="tim" id="tim" placeholder="Adi Nugroho, Budi Budiman, Onno W Purbo" required=""><?php echo $data_karya['tim'] ?></textarea>
		            <p class="text-muted"><i>Nama anggota tim pastikan semua benar karena akan dipakai untuk mencetak sertifikat. Jika Anda hanya satu orang (hehe kasihan), maka isikan nama Anda.</i></p>
		            <p class="text-muted"><i><strong class="text-danger">[!Penting]</strong> Anggota yang akan menerima sertifikat hanya 5 (lima) nama dari urutan pertama. Walau begitu, jumlah anggota tim tetap tidak ditentukan.</i></p>
		          </div>
		      	</form>
		      </div>
		        <!-- /.card-body -->

							<?php echo form_open() ?>
								<input name="id_karya" type="hidden" value="<?php echo $data_karya['id_karya'] ?>" required=""></input>
								<input name="id_user" type="hidden" value="<?php echo $data_karya['id_user'] ?>" required=""></input>

								<div class="card-footer">
									<?php if ( $data_karya['published'] == 1 ): ?>
										<input type="hidden" name="published" value="0">
										<button type="submit" class="btn btn-lg btn-danger do_transition">
											<i class="fa fa-eye-slash mr-1"></i> Berhenti Publikasi
										</button>
									<?php elseif( $data_karya['published'] == 0 ): ?>
										<input type="hidden" name="published" value="1">
										<button type="submit" class="btn btn-lg btn-success do_transition">
											<i class="fa fa-eye mr-1"></i> Publikasikan Sekarang
										</button>
									<?php endif ?>
							</form>


		          <a class="btn btn-lg btn-primary do_transition" id="tombol_simpan" onclick="$('#form_data_karya').submit()" style="display: none;">
		          	<i class="fa fa-save mr-1"></i> Simpan Perubahan
		          </a>
>>>>>>> Stashed changes
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
		        <!-- <div class="custom-filemb-3">
		          <input name="userfile" accept="image/*" type='file' id="imgInp" class="form-control btn btn-flat btn-lg btn-primary" style="height: 53px;">
		        </div> -->
						<div class="custom-file">
							<input name="userfile" accept="image/*" type='file' id="imgInp" class="custom-file-input btn-lg">
							<label class="custom-file-label" for="customFile">Pilih berkas gambar</label>
						</div>
						<small> Mendukung format jpg, png, gif </small>
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

<div class="modal fade" id="modal-gacha" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    	<div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Gacha Love</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="form-group text-center">
				<p class="h1" id="angka_gacha">00</p>
				<div class="heart col-12">
					<i class="fa fa-heart fa-4x" id="hati-di-modalgacha"></i>
				</div>
			</div>
	      <div class="form-group">
	        <div class="mt-2">
						<button type="button" class="btn btn-danger w-100" id="mulai_gacha" style="height: 40px;">
							Mulai
						</button>
					</div>
	      </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->