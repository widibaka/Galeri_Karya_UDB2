<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_karya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KaryaModel');
		$this->load->model('KategoriModel');
	}
	public function kategori_dan_urutan()
	{
		switch ( $this->input->get('urut') ) {
			case 'terbaru':
				$this->db->order_by( 'time', 'DESC' );
				break;
			case 'terlama':
				$this->db->order_by( 'time', 'ASC' );
				break;
			case 'love_terbanyak':
				$this->db->order_by( 'loves', 'DESC' );
				break;
			case 'love_tersedikit':
				$this->db->order_by( 'loves', 'ASC' );
				break;
			default:
				$this->db->order_by( 'time', 'DESC' );
				break;
		}

		if ( !empty($this->input->get('id_kategori')) ) {
			$this->db->where( 'id_kategori', $this->input->get('id_kategori') );
		}
	}
	public function index($current_page=1)
	{
		$data['title'] = 'Browse Karya';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$search = $this->input->get('search');
		$per_page = ( empty($this->input->get('per_page')) ) ? 10 : $this->input->get('per_page') ;

		if ( !empty($this->input->get('id_kategori')) ) {
			$this->db->where( 'id_kategori', $this->input->get('id_kategori') );
		}


		// $limit di ->get_karya sama dengan $per_page;
		$this->kategori_dan_urutan(); //<-- check filter sebelum get data karya
		$data['data_karya'] = $this->KaryaModel->get_karya( $per_page, $current_page, $search );

		$data['kategori'] = $this->KategoriModel->get_all_kategori();
		
		/* Pagination Starts */
			$this->load->library('pagination');

			$config['base_url'] = base_url() . 'browse_karya/index/';
			$this->kategori_dan_urutan(); //<-- check filter sebelum get data karya
			$config['total_rows'] = $this->KaryaModel->count_searched_karya($search);
			// masukin ke view sekalian ahhh
			$data['total_rows'] = $config['total_rows'];
			$config['per_page'] = $per_page;
			$config['use_page_numbers'] = TRUE; //<-- Ini penting
			// $config['num_links'] = 2;
			$config['page_query_string'] = FALSE;
			$config['reuse_query_string'] = TRUE;
			// $config['uri_segment'] = 3;

			$config['full_tag_open'] = '
			<div class="container-fluid d-flex justify-content-center mt-3">
			    <nav aria-label="Page navigation example">
			      <ul class="pagination shadow">';

			$config['full_tag_close'] = '
					</ul>
			    </nav>
			</div>';

			$config['first_link'] = '1';

			$config['first_tag_open'] = '
			<li class="page-item">';

			$config['first_tag_close'] = '
	        </li>';

			$config['last_link'] = ceil($config['total_rows'] / $per_page);

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
		$this->load->view('v_galeri_terbaru', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('v_galeri_terbaru_JS', $data);
	}

	
}
