<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_profil extends CI_Controller {
	public function index()
	{
		$post = $this->input->post();
		if ( $post ) {
			$this->AuthModel->edit_profil( $this->session->userdata()['id_user'], $post );
			$this->session->set_flashdata('msg', 'success#Profil berhasil diubah.');
			redirect(base_url() . $this->uri->uri_string());
		}
		$data = [];
		$data['title'] = 'Ubah Profil';
		$data['userdata'] = $this->AuthModel->get_user( $this->session->userdata('id_user') ) ;
		// echo '<pre>'; var_dump( $data['userdata'] ); die;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_ubah_profil');
		$this->load->view('templates/footer', $data);
		$this->load->view('v_ubah_profil_JS');
	}
}
