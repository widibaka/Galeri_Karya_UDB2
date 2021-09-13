<?php 
/**
 * Ranking_lomba
 */
class Ranking_lomba extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('KaryaModel');
		$this->load->model('KategoriModel');
	}
	public function index()
	{
		$data['title'] = 'Ranking Lomba';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$data['settings'] = $this->SettingsModel->get_settings();
		$data['main_data'] = $this->KaryaModel->get_karya_by_userID_for_ranking( $this->session->userdata('id_user') );

		if ( !empty($data['main_data']) ) {
			foreach ($data['main_data'] as $key => $val) {
				$data['main_data'][$key]['ranking'] = $this->KaryaModel->get_ranking_satu_karya( $val['id_karya'], $val['loves'] );
				$data['main_data'][$key]['kreator'] = $this->AuthModel->get_user($val['id_user']);
				$data['main_data'][$key]['nama_kategori'] = $this->KategoriModel->get_kategori($val['id_kategori']);
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_ranking_lomba', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('v_ranking_lomba_JS', $data);
	}
}