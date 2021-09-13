<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat_ketentuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index($current_page=1)
	{
		$this->load->model('SettingsModel');
		$data['title'] = 'Syarat & Ketentuan';

		$data['data_echo'] = $this->SettingsModel->get_syarat_ketentuan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('blank', $data);
		$this->load->view('templates/footer', $data);
	}


}
