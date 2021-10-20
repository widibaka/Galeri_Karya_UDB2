<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



 	<div class="col-12">
		<div class="card">

			<div class="card-header">
			<h3 class="card-title"><?php echo $title ?></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<p>Jika suatu kategori dinonaktifkan, maka itu tidak akan dapat digunakan oleh pengguna saat submit karya. Namun karya-karya yang sudah memakai kategori tersebut tidak akan terhapus ataupun terubah.</p>
				<div class="col-sm-12 text-right mb-3">
				  <a href="javascript:void(0)" class="btn btn-lg btn-primary rounded" data-toggle="modal" data-target="#modal-set-notification"><i class="fas fa-plus"></i> Tambah Baru</a>
				</div>
			<?php if ( !empty($this->session->flashdata("msg")) ): ?>
				<div class="alert alert-warning">
				<span>
					<?php echo $this->session->flashdata("msg") ?>
				</span>
				</div>
			<?php endif ?>
			<?php if(empty($main_data)) echo "Tidak ada data" ?>
			<?php if(!empty($main_data)) : ?>
				<table id="example2" class="table table-bordered table-hover">
					<thead>
					<tr>
					<?php 
					// mengambil semua keys, jadi tidak perlu set heading manual
					$headings = array_keys($main_data[0]);
					// mengubah semuanya menjadi kapital dan hapus uncerscore
					foreach ($headings as $key => $value) {
						$headings[$key] = str_replace('_', ' ', strtoupper($value));
					}
					?>

					<th>No.</th>
					<?php 
					// lalu foreach semua key yang sudah dipisah
					foreach ($headings as $key => $value): ?>
						<?php if ( $value != 'ID KATEGORI' AND $value != 'IS ACTIVE' ): ?>
						<th><?php echo $value ?></th>
						<?php endif ?>
					<?php endforeach ?>
					<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $number = 1; ?>
						<?php foreach ($main_data as $key => $val): ?>
							<tr>
							<td><?php echo $number; $number++; ?></td>
							<?php foreach ($val as $key => $value): ?>
							<?php if ( $key == 'id_kategori' ) : ?>
								<!-- nothing -->
							<?php elseif ( $key == 'is_active' ) : ?>
								<!-- nothing -->
							<?php else : ?>
								<td><?php echo $value ?> <?php echo ( $val['is_active'] == 1 ) ? '<small class="badge badge-success">(Aktif)</small>' : '<small class="badge badge-danger">(Nonaktif)</small>' ?></td>
							<?php endif ?>
							<?php endforeach ?>
								<td>

										<?php if ( $val['is_active'] == 1 ):  // kalau ingin nonaktifkan ?>
												<?php echo form_open( base_url() . 'admin/kategori_lomba/nonaktifkan/' ) ?>
													<input type="hidden" name="id_kategori" value="<?php echo $val['id_kategori'] ?>">
													<div class="btn-group">
														<button type="submit" href="" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menonaktfikan kategori ini? Kategori ini tidak akan bisa dipakai lagi oleh peserta saat mendaftarkan karya.')"> Nonaktifkan</button>
													</div>
												</form>

										<?php else: // kalau ingin aktifkan ?>
												<?php echo form_open( base_url() . 'admin/kategori_lomba/aktifkan/' ) ?>
													<input type="hidden" name="id_kategori" value="<?php echo $val['id_kategori'] ?>">
													<div class="btn-group">
														<button type="submit" href="" class="btn btn-success" title="Hapus" onclick="return confirm('Yakin ingin aktifkan kategori ini?')"> Aktifkan</button>
													</div>
												</form>
										<?php endif ?>
									</form>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>

	<div class="modal fade modal-set-notification" id="modal-set-notification" data-backdrop="static">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Tambah Kategori</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<?php echo form_open(  ) ?>
            <div class="form-group">
              <label class="col-form-label" for="inputWarning"><i class="fa fa-tag"></i> Nama Kategori</label>
              <input type="text" name="nama_kategori" class="form-control" placeholder="" required="">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
	      </div>
	    </div>
	    <!-- /.modal-content -->
	  </div>
	  <!-- /.modal-dialog -->
	</div>