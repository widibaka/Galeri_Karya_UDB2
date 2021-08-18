<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		$this->load->model('KaryaModel');
	}
	public function toggle_add_wishlist($id_user, $id_karya)
	{
		if ( $this->WishlistModel->toggle_add_wishlist($id_user, $id_karya) ) {
			$data = [
				'status' => 'added'
			];
		}
		else {
			$data = [
				'status' => 'deleted'
			];
		}

		echo json_encode( $data );
	}

	public function dummy_data_karya($jumlah)
	{
		$fid = 107;
		for ($i=0; $i < $jumlah; $i++) { 
			$post = [
				'id_karya' => $fid,
				'id_user' => '1628687548',
				'judul' => rand(10,10000),
				'deskripsi' => base64_encode(rand(10,10000)),
				'harga' => rand(10,10000),
				'satuan' => 'Kg',
				'kota' => 'Boyolali',
				'time' => time(),
				'dihapus' => 0,
			];
			$this->KaryaModel->add($post);
			$fid++;
		}
	}

	public function mkdir($value='')
	{
		mkdir( 'assets/img_karya/' . $value );
	}

	public function coba_upload($value='')
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	public function do_upload()
	{
	        $config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png|mkv|mp4';
	        $config['max_size']             = 666600000;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('userfile'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                $this->load->view('upload_form', $error);
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                $this->load->view('upload_success', $data);
	        }
	}

	public function upload_gambar()
	{
	        $config['upload_path']          = './assets/img_karya/' . $this->input->post()['id_karya'];
	        $config['allowed_types']        = 'gif|jpg|jpeg|png';
	        $config['max_size']             = 12000;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('userfile'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                // echo '<pre>'; var_dump( $error ); die;

	                $this->session->set_flashdata('msg', 'error#'.$error['error']);

	                redirect( base_url() . 'galeri_saya/edit_karya/' . $this->input->post()['id_karya'] ); 
	        }
	        else
	        {
	                $data = array('upload_data' => $this->upload->data());

	                // Gambar ke Berapa ini?
	                // $jumlah_gambar = count(scandir($config['upload_path'])) - 2;
	                // !Gak jadi pakai jumlah gambar, hehe. Nanti teroverwrite soalnya

	                rename(
	                	$data['upload_data']['full_path'],
	                	$data['upload_data']['file_path'] . $this->input->post()['id_karya'] . '-' . time() . $data['upload_data']['file_ext']
	                );

	                redirect( base_url() . 'galeri_saya/edit_karya/' . $this->input->post()['id_karya'] ); 
	        }
	}

	public function hapus_gambar($id_karya, $filename)
	{
		if ( unlink( 'assets/img_karya/' . $id_karya . '/' . $filename ) ) {
			// $data = [
			// 	'status' => 'deleted'
			// ];

			redirect( base_url() . 'galeri_saya/edit_karya/' . $id_karya );

		}else{
			$data = [
				'status' => 'error'
			];
		}
		// echo json_encode( $data );
	}

}
