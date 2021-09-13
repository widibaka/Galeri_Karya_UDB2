<?php 

/**
 * 
 */
class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('KaryaModel');
		// Kalau gak login, maka akan mental
		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
	}
	public function blokir_akun()
	{
		$id_user=$this->input->post('id_user');
		$this->AuthModel->blokir_akun($id_user);
		$this->KaryaModel->blokir_karya($id_user);
		redirect( base_url() . 'admin/akun_aktif' );
	}
	public function buka_blokir_akun()
	{
		$id_user=$this->input->post('id_user');
		$this->AuthModel->buka_blokir_akun($id_user);
		redirect( base_url() . 'admin/akun_diblokir' );
	}
	public function delete_notifikasi()
	{
		$this->load->model('NotifikasiModel');
		$id_notifikasi = $this->input->post('id_notifikasi');
		$this->NotifikasiModel->delete_notifikasi($id_notifikasi);
		redirect( base_url() . 'admin/notifikasi' );
	}
	public function delete_all_notifikasi()
	{
		$this->load->model('NotifikasiModel');
		$this->NotifikasiModel->clear_all();
		redirect( base_url() . 'admin/notifikasi' );
	}

	// UNTUK CRON JOB
		public function hapus_pemenang_sebelumnya($redirect='')
		{
			$this->db->where('peringkat >', 0);
			$this->db->delete('galeri_pemenang_lomba');
			// kalau dipakai di halaman settings,yang di bawah ini dipakai
			if ( !empty($redirect) ) {
				$this->session->set_flashdata('msg', 'success#Data berhasil dihapus');
				$redirect = base64_decode($redirect);
				redirect($redirect);
			}
		}
		public function kunci_pemenang_lomba()
		{
			// Hapus semua dulu
			$this->hapus_pemenang_sebelumnya();

			// Lalu kunci pemenang memakai data yang baru
			$data_pemenang = $this->KaryaModel->get_karya_dan_peringkat_lomba(  );
			foreach ($data_pemenang as $key => $row) {
				$row['peringkat'] = $key+1; //<-- menunjukkan peringkat
				$this->db->insert('galeri_pemenang_lomba', $row);
			}
		}
		public function nonaktifkan_event()
		{
			// Nonaktifkan event
			$data = [
				'aktifkan_event' => 0,
			];
			$this->SettingsModel->update_settings($data);
		}
		public function check_hitung_mundur_event($value='')
		{
			$settings = $this->SettingsModel->get_settings();
			// Kalau sudah lewat tanggal, maka kunci pemenang
			if ( time() > strtotime($settings['tanggal_berakhirnya_event']) ) {
				// $this->nonaktifkan_event();
				$this->kunci_pemenang_lomba();
				echo "Pemenang berhasil didapatkan";
			}else{
				echo "Belum tanggalnya";
			}
		}
	// UNTUK CRON JOB
}