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
}