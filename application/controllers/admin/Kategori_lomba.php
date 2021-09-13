<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_lomba extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');

		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		
	}
	public function index()
	{
		$post = $this->input->post();
		// Add data
		if ( $post ) {
			$this->KategoriModel->add( $this->input->post() );
			redirect( base_url() . $this->uri->uri_string() );
		}
		$data['title'] = 'Kategori Lomba';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$data['main_data'] = $this->KategoriModel->get_all_kategori_for_admin();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_kategori', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('admin/v_kategori_JS', $data);
	}

	public function nonaktifkan()
	{
		$id_kategori = $this->input->post('id_kategori');
		$data = [
			'id_kategori' => $id_kategori,
			'is_active' => 0,
		];
		$this->KategoriModel->update( $data );
		redirect( base_url() . 'admin/kategori_lomba' );
	}

	public function aktifkan()
	{
		$id_kategori = $this->input->post('id_kategori');
		$data = [
			'id_kategori' => $id_kategori,
			'is_active' => 1,
		];
		$this->KategoriModel->update( $data );
		redirect( base_url() . 'admin/kategori_lomba' );
	}


}
