<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('KaryaModel');
		$this->load->model('AuthModel');
		$data['title'] = 'Statistik';

		$data['data_echo'] = '
    <h5> Tanggal '. date('Y-m-d H:i:s') . ' </h5>
    Total Views: '.$this->KaryaModel->hitung_seluruh_view() . '
    <br>
    Total Karya: '.$this->KaryaModel->hitung_seluruh_karya().'
    <br>
    Total Loves: '.$this->KaryaModel->hitung_seluruh_loves().'
    <br>
    Total User: '.$this->AuthModel->jumlah_user_aktif().'
    ';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('blank', $data);
		$this->load->view('templates/footer', $data);
	}


}
