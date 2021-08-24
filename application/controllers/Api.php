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
	public function create_captcha()
	{
		$this->load->library('image_lib');
		$this->load->helper('captcha');

		$vals = array(
		        'img_path'      => './assets/captcha/',
		        'img_url'       => base_url() . 'assets/captcha/',
		        'img_width'     => '150',
		        'img_height'    => '30',
		        'expiration'    => 7200,
		        'word_length'   => 3,
		        'font_size'     => 16,
		        'img_id'        => 'Imageid',
		        'pool'          => '123456789ABCDEFGHIJKLMNPRSTUVWXYZ',

		        // White background and border, black text and red grid
		        'colors'        => array(
		                'background' => array(255, 255, 255),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(48, 144, 247)
		        )
		);

		$data['cap'] = create_captcha($vals);
		unset($data['cap']['image']);
		unset($data['cap']['time']);

		$data['cap']['img_path'] = base_url() . 'assets/captcha/' . $data['cap']['filename'];

		echo json_encode($data['cap']);
	}
	public function remove_love($id_karya)
	{
		$this->KaryaModel->remove_love($id_karya);

		$data = [
			'status' => 'deleted'
		];

		echo json_encode( $data );
	}
	public function add_love($id_karya)
	{
		$this->KaryaModel->add_love($id_karya);
			
		$data = [
			'status' => 'added'
		];

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
        $config['upload_path']          = './assets/img_karya/' . $this->input->post()['id_karya'] . '/';
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

            $new_filename = $this->input->post()['id_karya'] . '-' . time();

            rename(
            	$data['upload_data']['full_path'],
            	$data['upload_data']['file_path'] . $new_filename . $data['upload_data']['file_ext']
            );

            // mengecilkan ukuran foto
            $this->load->model('ResizeImage');
            $this->ResizeImage->dir( $data['upload_data']['file_path'] . $new_filename . $data['upload_data']['file_ext'] );
            // Untuk ukuran besar
            $this->ResizeImage->resizeTo(1200, 1200, 'default');
            $this->ResizeImage->saveImage( $config['upload_path'] . $new_filename . '_new' . $data['upload_data']['file_ext'] );

            // Untuk yang ukuran thumbnail
            $this->ResizeImage->resizeTo(300, 300, 'default');
            $this->ResizeImage->saveImage( $config['upload_path'] . 'thumb/' . $new_filename . '_new' . $data['upload_data']['file_ext'] );

            unlink( $data['upload_data']['file_path'] . $new_filename . $data['upload_data']['file_ext'] ); // delete temporary file

            redirect( base_url() . 'galeri_saya/edit_karya/' . $this->input->post()['id_karya'] ); 
        }
	}

	public function hapus_gambar($id_karya, $filename)
	{
		$filename = base64_decode($filename);
		if ( 
			unlink( 'assets/img_karya/' . $id_karya . '/' . $filename ) AND
			unlink( 'assets/img_karya/' . $id_karya . '/thumb/' . $filename )
		   ) {
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
