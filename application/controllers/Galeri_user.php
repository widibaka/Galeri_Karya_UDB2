<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KaryaModel');
		$this->load->model('KategoriModel');
	}
	public function u($id_user, $current_page = 1)
	{
		$data['title'] = 'Galeri Perorangan';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);



		$search = $this->input->get('search');
		$per_page = ( empty($this->input->get('per_page')) ) ? 10 : $this->input->get('per_page');
		// $limit di ->get_karya sama dengan $per_page;
		
		$data['kreator'] = $this->AuthModel->get_user(
			$id_user
		);
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
		$this->load->view('v_galeri_user', $data);
		$this->load->view('templates/footer', $data);
	}

}