<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('NotifikasiModel');

		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		
	}
	public function index($current_page=1)
	{
		if ( $this->input->post() ) {
			$this->NotifikasiModel->set_notifikasi( $this->input->post() );
			redirect( base_url() . $this->uri->uri_string() );
		}
		$data['title'] = 'Notifikasi';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$data['main_data'] = $this->NotifikasiModel->get_all();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_notifikasi', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('admin/v_notifikasi_JS', $data);
	}


}
