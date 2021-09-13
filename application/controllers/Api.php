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
		$this->load->model('UtilModel');
	}

	public function get_ranking_lomba()
	{
		$this->load->model('KategoriModel');
		$data['main_data'] = $this->KaryaModel->get_karya_dan_peringkat_lomba();

		foreach ($data['main_data'] as $key => $val) {
			$data['main_data'][$key]['kreator'] = $this->AuthModel->get_user($val['id_user']);
			$data['main_data'][$key]['nama_kategori'] = $this->KategoriModel->get_kategori($val['id_kategori']);
		}
		$this->load->view('v_ranking_lomba_CONTENT', $data);
	}

	public function set_terakhir_online($id_user='')
	{
		$this->load->model('AuthModel');
		if ( $this->AuthModel->set_terakhir_online($id_user) ) {
			echo 'true';
			return;
		}
		echo 'false';
		
	}
	// Notifications 
		public function count_unread_notification($id_user='')
		{
			$this->load->model('NotifikasiModel');
			$data = $this->AuthModel->get_user($id_user);
			$notifikasi_dibaca = $data['notifikasi_dibaca'];

			$notification_counts = $this->NotifikasiModel->count_all();

			//hitung
			echo $notification_counts - $notifikasi_dibaca;
		}
		public function clear_unread_notification($id_user='')
		{
			$this->load->model('NotifikasiModel');
			$notification_counts = $this->NotifikasiModel->count_all();
			$data = [
				'notifikasi_dibaca' => $notification_counts
			];
			$this->db->where('id_user', $id_user);
			$this->db->update('galeri_user', $data);
		}
		public function get_notification($limit)
		{
			$this->load->model('NotifikasiModel');
			$data = $this->NotifikasiModel->get_for_users($limit);
			foreach ($data as $key => $val) {
				$data[$key]['time'] = $this->UtilModel->time_elapsed_string('@'.$val['time']);
			}
			echo json_encode($data);
		}
	// Notifications ENDS

	// CHAT
		public function get_chats($id_user, $limit)
		{
			// Kalau user id kosong, abikan!
			if ( empty($id_user) OR $id_user == 'undefined' ) {
				echo json_encode( ['status' => false] );
				die();
			}

			// Nah mari mulai
			// Mendapatkan semua id_user milik admin
			$all_id_user_admin = $this->db->get('galeri_admin')->result_array();

			// Mendapatkan chats
			$this->load->model('ChatModel');
			$data = $this->ChatModel->get_chat($id_user, $all_id_user_admin, $limit);
			// Buat date format
			foreach ($data as $key => $val) {
				$data[$key]['time'] = date('d/m/Y, H:i', $val['time']) . ' WIB';
				// kalau gak ada foto, kasih PP default
				if ( empty($data[$key]['photo']) ) {
					$data[$key]['photo'] = 'user_no_image.jpg';
				}
			}
			echo json_encode($data);
		}
		public function get_contact($limit)
		{
			// filter
			$filter = (!empty($this->input->get('filter'))) ? strtoupper($this->input->get('filter')) : '';

			$this->load->model('ChatModel');
			$admin_all = $this->db->get('galeri_admin')->result_array();
			$teratas = $this->ChatModel->get_contact($limit, $admin_all);

			$contacts = [];
			foreach ($teratas as $key => $val) {
				$temp_data = $this->AuthModel->get_user($val['id_user']);
				// Kalau data user masih ada
				if ( !empty($temp_data) ) {
					// filtering
					if ( strpos( strtoupper($temp_data['username']), $filter ) !== false OR $filter == '' ) {
						$contacts[$key] = $temp_data;
						$latest_msg = $this->ChatModel->get_latest_msg($val['id_user']);
						$contacts[$key]['latest_msg'] = substr($latest_msg['msg'], 0, 34).'...';
						$contacts[$key]['latest_msg_time_int'] = $latest_msg['time'];
						$contacts[$key]['latest_msg_time'] = date('d/m/Y H:i', $latest_msg['time']) . ' WIB';
						$contacts[$key]['unread_msg_for_admin'] = $this->ChatModel->count_unread_msg_for_admin( $val['id_user'], $contacts[$key]['terakhir_dibaca_panitia'] );
					}
				}

			}

			// Urutkan berdasarkan latest_msg_time_int terbaru
			$keys = array_column($contacts, 'latest_msg_time_int');
			array_multisort($keys, SORT_DESC, $contacts);

			echo json_encode($contacts);

		}

		// Ini untuk admin
		public function clear_unread_msg_for_admin($id_user='')
		{
			$data = [
				'terakhir_dibaca_panitia' => time()
			];
			$this->db->where('id_user', $id_user);
			$this->db->update('galeri_user', $data);
		}

		public function count_unread_msg_for_admin($id_user='')
		{
			$this->load->model('ChatModel');
			$data = $this->AuthModel->get_user($id_user);
			echo $this->ChatModel->count_unread_msg_for_admin( $data['id_user'], $data['terakhir_dibaca_panitia'] );
		}

		// Ini untuk user
		public function count_unread_msg_for_user($id_user='')
		{
			$this->load->model('ChatModel');
			$data = $this->AuthModel->get_user($id_user);
			echo $this->ChatModel->count_unread_msg_for_user( $data['id_user'], $data['terakhir_dibaca_user'] );
		}
		public function clear_unread_msg_for_user($id_user='')
		{
			$data = [
				'terakhir_dibaca_user' => time()
			];
			$this->db->where('id_user', $id_user);
			$this->db->update('galeri_user', $data);
		}
		

		
		public function get_online_terakhir($id_user)
		{
			$this->load->model('AuthModel');
			$data = $this->AuthModel->get_user( $id_user )['terakhir_online'];

			// Kalau kurang dari 1 menit, maka statusnya "online"
			if ( time() - $data <= 60 ) {
				echo '<strong class="text-success">online</strong>'; die;
			}
			
			$data = 'Offline ' . $this->UtilModel->time_elapsed_string('@' . $data);
			echo ($data);

		}
		public function get_admin_online_terakhir()
		{
			$this->load->model('AuthModel');

			$ids_of_admin = $this->db->get('galeri_admin')->result_array();
			$data = $this->AuthModel->get_admin_online_terakhir( $ids_of_admin );
			$time_ago = $this->UtilModel->time_elapsed_string('@' . $data['terakhir_online']);

			// Kalau kurang dari 30 detik, maka statusnya "online"
			if ( time() - $data['terakhir_online'] <= 30 ) {
				echo "<strong class=\"text-success\">" . $data['username'] . " online</strong>"; die;
			}

			echo 'Panitia' . ' offline ' . $time_ago;

		}
		public function send_chat()
		{
			$this->load->model('ChatModel');
			$post = $this->input->post();
			if ( empty($post['msg']) ) {
				return;
			}
			if ( $this->ChatModel->send_chat($post) ) {
				$r = [
					'status' => true
				];
				echo json_encode($r);
			}
		}
	// CHAT ENDS
	
	// Love handling
		public function convert_gacha2loves($id_karya = null)
		{
			$this->KaryaModel->convert_gacha2loves( $id_karya );
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
	// Love handling ENDS

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
            $this->ResizeImage->resizeTo(1200, 1200, 'maxwidth');
            $this->ResizeImage->saveImage( $config['upload_path'] . $new_filename . '_new' . $data['upload_data']['file_ext'] );

            // Untuk yang ukuran thumbnail
            $this->ResizeImage->resizeTo(300, 300, 'maxwidth');
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
