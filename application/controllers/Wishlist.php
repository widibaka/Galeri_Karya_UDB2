<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		$this->load->model('IklanModel');
		$this->load->model('WishlistModel');
	}
	public function index($current_page = 1)
	{
		$data['title'] = 'Wishlist';
		$data['userdata'] = $this->session->userdata();

		$search = $this->input->get('search');
		$per_page = ( empty($this->input->get('per_page')) ) ? 10 : $this->input->get('per_page') ;
		// $limit di ->get_iklan sama dengan $per_page;

		$id_user = $this->session->userdata('id_user');

		// MENCARI SIAPA SAJA YANG MASUK WISHLIST
		$wishlists = $this->WishlistModel->get_wishlist_by_userID( $id_user );
		$data['data_iklan'] = [];
		foreach ($wishlists as $key => $wli) {
			$getIklan = $this->IklanModel->get_iklan_byID( $wli['id_iklan'] );
			if ( $getIklan ) {
				$data['data_iklan'][] = $getIklan;
			}
			if ( empty($getIklan) ) {// <-- Kalau iklannya sudah dihapus uploader nya
				$append = [
					'id_iklan' => $wli['id_iklan'],
					'judul' => 'Iklan Dihapus Pemiliknya',
					'dihapus' => 1,
				];
				$data['data_iklan'][] = $append;
			}
			
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_wishlist', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('v_wishlist_JS', $data);
	}

	public function del( $id_user='', $id_iklan='', $return_url )
	{
		if ( $this->WishlistModel->del( $id_user, $id_iklan ) ) {
			$return_url = base64_decode( $return_url );
			redirect( $return_url );
		}
	}

}