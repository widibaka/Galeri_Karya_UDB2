<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chats extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KaryaModel');
		$this->load->model('KategoriModel');

		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		
	}
	public function index()
	{
		$data['title'] = 'Chats';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_chats', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('admin/v_chats_JS', $data);
	}

	
}
