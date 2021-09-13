<!-- DataTables -->
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
			<?php if ( !empty($this->session->flashdata("msg")) ): ?>
				<div class="alert alert-warning">
				<span>
					<?php echo $this->session->flashdata("msg") ?>
				</span>
				</div>
			<?php endif ?>
			<?php if(empty($main_data)) echo "Tidak ada data" ?>
			<?php if(!empty($main_data)) : ?>
				<p>
					#Blokirlah akun yang menyebarkan konten pornografi atau melanggar norma-norma yang berlaku di masyarakat.
				</p>
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
						<?php //if ( $value != 'ID USER' ): ?>
						<th><?php echo $value ?></th>
						<?php //endif ?>
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
							<?php if ( $key == 'photo' ): ?>
								<td>
									<a data-fancybox href="<?php echo base_url() ?>assets/uploads/foto_profil/<?php echo $value ?>">
										<img style="height: 90px;" src="<?php echo base_url() ?>assets/uploads/foto_profil/<?php echo $value ?>">
									</a>
								</td>
							<?php elseif ( $key == 'bukti_mahasiswa' ): ?>
								<td>
									<a data-fancybox href="<?php echo base_url() ?>assets/uploads/bukti_mahasiswa/<?php echo $value ?>">
										<img style="height: 90px;" src="<?php echo base_url() ?>assets/uploads/bukti_mahasiswa/<?php echo $value ?>">
									</a>
								</td>
							<?php elseif ( $key == 'waktu_daftar' OR $key == 'terakhir_online' ) : ?>
								<td><?php echo date('d/m/Y H:i:s', $value) ?></td>
							<?php else : ?>
								<td><?php echo $value ?></td>
							<?php endif ?>
							<?php endforeach ?>
								<td>
									<?php echo form_open( base_url() . 'admin/api/blokir_akun/' ) ?>
										<input type="hidden" name="id_user" value="<?php echo $val['id_user'] ?>">

										<div class="btn-group">
											<button type="submit" href="" class="btn btn-danger" title="Hapus" onclick="return confirm('Yakin ingin memblokir akun ini?')"><i class="fas fa-user-slash"></i> Blokir</button>
										</div>
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
