<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KaryaModel');

		if ( !$this->session->userdata('username') ) {
			$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
			redirect( base_url() . 'auth/login' );
		}
		
	}
	public function index()
	{
		$post = $this->input->post();
		if ( !empty($post) ) {
			if ( $post['aktifkan_event'] == 'on' ) {
				$post['aktifkan_event'] = 1;
			}else{
				$post['aktifkan_event'] = 0;
			}

			// Kalau uploadnya tidak ada, berarti tidak diubah. Jadi jangan tampilkan error "And belum pilih file"
			$upload_gambar = $this->upload_gambar( 'pamflet_event', './assets/uploads/pamflet_event/' );
			if ( $upload_gambar != false ) {
				$post['pamflet_event'] = $upload_gambar;
			}
			$this->SettingsModel->update_settings($post);
			redirect( base_url() . $this->uri->uri_string() );
		}
		$data['title'] = 'Settings';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		// kalo udah ada pemenangnya, maka nanti admin disuruh reset
		$data['pemenang'] = [];
		if ( $this->KaryaModel->check_tabel_pemenang() == 1 ) {
			$data['pemenang'] =  $this->KaryaModel->get_karya_dan_peringkat_lomba();
		}
		

		$data['main_data'] = $this->SettingsModel->get_settings();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_settings', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('admin/v_settings_JS', $data);
	}


	public function upload_gambar($name_in_form, $path)
	{
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 12000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name_in_form))
        {
            $error = array('error' => $this->upload->display_errors());
        	if ( $error['error'] = '<p>Anda belum memilih berkas untuk diunggah.</p>' ) {
        		return false;
        	}

            echo '<pre>'; var_dump( $error ); die;

            $this->session->set_flashdata('msg', 'error#'.$error['error']);

            redirect( base_url() . 'admin/settings'); 
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $new_filename = 'pamflet';

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

            unlink( $data['upload_data']['file_path'] . $new_filename . $data['upload_data']['file_ext'] ); // delete temporary file

            return $new_filename . '_new' . $data['upload_data']['file_ext'] . '?' . time(); 
        }
	}

}
