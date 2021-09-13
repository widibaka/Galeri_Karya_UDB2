<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_saya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		$this->load->model('KaryaModel');
		$this->load->model('KategoriModel');
	}
	public function index($current_page = 1)
	{
		$data['title'] = 'Galeri Saya';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$search = $this->input->get('search');
		$per_page = ( empty($this->input->get('per_page')) ) ? 10 : $this->input->get('per_page');
		// $limit di ->get_karya sama dengan $per_page;

		$id_user = $this->session->userdata('id_user');
		$data['data_karya'] = $this->KaryaModel->get_karya_by_userID($id_user, $per_page, $current_page, $search );

		/* Pagination Starts */
			$this->load->library('pagination');

			$config['base_url'] = base_url() . 'galeri_saya/index/';
			$config['total_rows'] = $this->KaryaModel->count_searched_karya_IKLAN_SAYA($id_user, $search);
			$config['per_page'] = $per_page;
			$config['use_page_numbers'] = TRUE; //<-- Ini penting
			// $config['num_links'] = 6;
			// $config['page_query_string'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['enable_query_strings'] = TRUE;
			// $config['uri_segment'] = 3;

			$config['full_tag_open'] = '
			<div class="container-fluid d-flex justify-content-center mt-3">
			    <nav aria-label="Page navigation example">
			      <ul class="pagination">';

			$config['full_tag_close'] = '
					</ul>
			    </nav>
			</div>';

			$config['first_link'] = 'Pertama';

			$config['first_tag_open'] = '
			<li class="page-item">';

			$config['first_tag_close'] = '
	        </li>';

			$config['last_link'] = 'Terakhir';

			$config['last_tag_open'] = '
			<li class="page-item">';

			$config['last_tag_close'] = '
	        </li>';

	        $config['next_link'] = '&raquo;';

	        $config['next_tag_open'] = '
	        <li class="page-item">';

	        $config['next_tag_close'] = '
	        </li>';

	        $config['prev_link'] = '&laquo;';

	        $config['prev_tag_open'] = '
	        <li class="page-item">';

	        $config['prev_tag_close'] = '
	        </li>';

	        $config['cur_tag_open'] = '
	        <li class="page-item active">
	        	<a class="page-link" href="#">';

	        $config['cur_tag_close'] = '
	        	</a>
	        </li>';

	        $config['num_tag_open'] = '
	        <li class="page-item">';

	        $config['num_tag_close'] = '</li>';

	        $config['attributes'] = array('class' => 'page-link');

			$this->pagination->initialize($config);

			$data['pagination'] = $this->pagination->create_links();
		/* Pagination Ends */

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_galeri_saya', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add_karya()
	{
		$post = [];
		if ( !empty($this->input->post()) ) {

			// Check apakah lebih dari tiga karya
			if ( $this->KaryaModel->count_karya_user( $this->session->userdata('id_user') ) >= 3 ) {
				$this->session->set_flashdata( 'msg', 'error#Maaf, Galeri Anda dibatasi hingga 3 (tiga) karya saja.' );
				redirect( base_url() . 'galeri_saya' );
				return 0;
			}

			foreach ($this->input->post() as $key => $value) {
				if ( $key != 'deskripsi' ) {
					$post[$key] = htmlentities($value);
				}
				if ( $key == 'deskripsi' ) {
					$post[$key] = $value;
				}
			}
			$post['time'] = time();

			// Entah kenapa ada parameter "files" karena summernote JS. Hapus aja
			unset($post['files']);

			// Create directory untuk upload gambar
			mkdir( 'assets/img_karya/' . $post['id_karya'] );
			mkdir( 'assets/img_karya/' . $post['id_karya'] . '/thumb' );

			// Masukkan ke database
			$this->KaryaModel->add($post);

			// Redirect
			redirect( base_url() . 'galeri_saya/edit_karya/' . $post['id_karya'] );
		}
		
		$data['title'] = 'Galeri Saya';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);
		$data['kategori'] = $this->KategoriModel->get_all_kategori();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_galeri_saya_add_karya', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('v_galeri_saya_add_karya_JS', $data);
	}

	public function edit_karya($id_karya)
	{
		$post = [];
		if ( !empty($this->input->post()) ) {
			foreach ($this->input->post() as $key => $value) {
				if ( $key != 'deskripsi' ) {
					$post[$key] = htmlentities($value);
				}
				if ( $key == 'deskripsi' ) {
					$post[$key] = $value;
				}
			}
			// Lengkapi dan publikasikan
			$post['time'] = time();
			// menentukan jumlah love yang di gacha nanti (sudah ditentukan di awal wkwk)
			$post['gacha'] = rand( 7, 14 );
			
			// Entah kenapa ada parameter "files" karena summernote JS. Hapus aja
			unset($post['files']);

			// Ubah database
			$this->KaryaModel->update($post);

			// Redirect
			redirect( base_url() . 'galeri_saya/' );
			die();
		}
		
		$data['title'] = 'Iklan Saya';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);
		$data['kategori'] = $this->KategoriModel->get_all_kategori();
		$data['data_karya'] = $this->KaryaModel->get_karya_byID( $id_karya );
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_galeri_saya_edit_karya', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('v_galeri_saya_edit_karya_JS', $data); //<-- pake punya nya ADD hehe
	}

	public function del( $id_karya='', $return_url )
	{
		if ( $this->KaryaModel->del( $id_karya ) ) {
			$return_url = base64_decode( $return_url );
			redirect( $return_url );
		}
	}

}