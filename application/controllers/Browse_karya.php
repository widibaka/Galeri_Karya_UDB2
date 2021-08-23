<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_karya extends CI_Controller {

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
		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		$this->load->model('KaryaModel');
	}
	public function index($current_page=1)
	{
		$data['title'] = 'Browse Karya';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$search = $this->input->get('search');
		$per_page = ( empty($this->input->get('per_page')) ) ? 10 : $this->input->get('per_page') ;
		// $limit di ->get_karya sama dengan $per_page;
		$data['data_karya'] = $this->KaryaModel->get_karya( $per_page, $current_page, $search );
		
		/* Pagination Starts */
			$this->load->library('pagination');

			$config['base_url'] = base_url() . 'browse_karya/index/';
			$config['total_rows'] = $this->KaryaModel->count_searched_karya($search);
			$config['per_page'] = $per_page;
			$config['use_page_numbers'] = TRUE; //<-- Ini penting
			// $config['num_links'] = 2;
			$config['page_query_string'] = FALSE;
			$config['reuse_query_string'] = TRUE;
			// $config['uri_segment'] = 3;

			$config['full_tag_open'] = '
			<div class="container-fluid d-flex justify-content-center mt-3">
			    <nav aria-label="Page navigation example">
			      <ul class="pagination">';

			$config['full_tag_close'] = '
					</ul>
			    </nav>
			</div>';

			$config['first_link'] = '1';

			$config['first_tag_open'] = '
			<li class="page-item">';

			$config['first_tag_close'] = '
	        </li>';

			$config['last_link'] = $config['total_rows'] / $per_page;

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
	}
}
