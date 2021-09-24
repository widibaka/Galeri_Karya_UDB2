<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
	}
	public function index()
	{
		$post = $this->input->post();
		if ( $post ) {
			
			// kalau form biasa
			if ( !empty( $post['username'] ) ) {
				$this->AuthModel->edit_profil( $this->session->userdata()['id_user'], $post );
				$this->session->set_flashdata('msg', 'success#Profil berhasil diubah.');
				redirect(base_url() . $this->uri->uri_string());
			}
			// kalau ubah gambar
			else if ( isset($post['image']) ) {

				if ( !empty($post['image']) ) {

					// $this->AuthModel->hapus_file_gambar_profil( $this->session->userdata('id_user') );

					$file = $this->UtilModel->simpan_gambar_base64( 
						$post['image'], 
						$this->session->userdata('id_user') . time()
					);

					// mengecilkan ukuran foto
					$this->load->model('ResizeImage');
					$this->ResizeImage->dir( $file['dir'] );

					$this->ResizeImage->resizeTo(400, 400, 'default');

					$simpan_resize = $this->ResizeImage->saveImage( 'assets/uploads/foto_profil/' . $file['filename'] );

					unlink($file['dir']); // delete temporary file

					// Kalau berhasil simpan gambar, berarti gambarnya valid. Kalo enggak, kasih msg error
					if ( $simpan_resize != true ) {
						$this->session->set_flashdata('msg', 'error#Error! image_profile tidak valid. Silakan pakai file lain.');
						redirect(base_url().$this->uri->uri_string());
						die();
					}

					$this->AuthModel->ubah_gambar_profil( $this->session->userdata('id_user'), $file['filename'] );
				}else if ( empty($post['image']) ) {
					$this->AuthModel->hapus_file_gambar_profil( $this->session->userdata('id_user') );
					$this->AuthModel->ubah_gambar_profil( $this->session->userdata('id_user'), 'user_no_image.jpg' );
				}
				// kembali ke halaman ubah profil
				redirect( base_url() . $this->uri->uri_string() );
			}
		}
		$data = [];
		$data['title'] = 'Ubah Profil';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('v_ubah_profil');
		$this->load->view('templates/footer', $data);
		$this->load->view('v_ubah_profil_JS');
	}
}
