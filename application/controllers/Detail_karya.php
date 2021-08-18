<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_karya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		$this->load->model('KaryaModel');
	}
	public function i($id_karya)
	{
		$url_mundur = $this->input->get( 'url_mundur' );
		if ( $url_mundur ) {
			$data['url_mundur'] = $url_mundur;
		}
		$data['userdata'] = $this->session->userdata();
		$data['title'] = 'Detail Iklan';

		$getKarya = $this->KaryaModel->get_karya_byID( $id_karya );
		if ( $getKarya ) {
			$data['data_karya'] = $getKarya;
		}
		if ( empty($getKarya) ) {// <-- Kalau karyanya sudah dihapus uploader nya
			$append = [
				'id_karya' => $id_karya,
				'judul' => 'Iklan Dihapus Pemiliknya',
				'dihapus' => 1,
			];
			$data['data_karya'] = $append;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_detail_karya', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('v_detail_karya_JS', $data);
	}
}
