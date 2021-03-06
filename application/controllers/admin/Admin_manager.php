<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_manager extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');

		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		
	}
	public function index($current_page=1)
	{
		$post = $this->input->post();
		if ( $post ) {
			$this->AdminModel->add_admin( $post );
			redirect( base_url() . $this->uri->uri_string() );
		}
		$data['title'] = 'Admin';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$data['main_data'] = $this->AdminModel->get_all_admin();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_admin_manager', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('admin/v_admin_manager_JS', $data);
	}

	// public function del($id_user)
	// {
	// 	$data['main_data'] = $this->AdminModel->get_all();
	// }


}
