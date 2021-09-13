<?php 
/**
 * Akun Aktif
 */
class Akun_aktif extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index($value='')
	{
		$data['title'] = 'Akun Aktif';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$data['main_data'] = $this->AuthModel->get_user_aktif();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_akun_aktif', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('admin/v_akun_aktif_JS', $data);
	}
}