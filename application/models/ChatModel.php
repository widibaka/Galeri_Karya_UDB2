<?php 

/**
 * Class Chat
 */
class ChatModel extends CI_Model
{
	public $table = 'chat';
	public function get_chat($id_user='', $id_user_of_admins=array(), $limit)
	{
		// Dicari yang saling jawab menjawab dari semua admin dan user yang bersangkutan.
		// Istilah kasarnya, usernya digangbang sama admin wkwk
		$this->db->where($this->table .'.id_user', $id_user);
		$this->db->where($this->table .'.id_user_penerima', $id_user);

		// $this->db->or_where($this->table .'.id_user', $id_user);
		foreach ($id_user_of_admins as $key => $value) {
			$this->db->or_where($this->table .'.id_user', $value['id_user']);
			$this->db->where($this->table .'.id_user_penerima', $id_user);
		}

		// ini lanjut kek biasanya
		$this->db->limit($limit);
		$this->db->order_by('time', 'DESC');

		$this->db->select( 'id_chat, ' . $this->table .'.id_user, msg, time, username, photo' );

		$this->db->from($this->table);
		$this->db->join('user', $this->table .'.id_user = user.id_user');
		return $this->db->get()->result_array();
	}
	public function send_chat($data)
	{
		$data_new = [
			'id_user' => $this->session->userdata('id_user'),
			'id_user_penerima' => $data['id_user_penerima'],
			'msg' => htmlentities($data['msg']),
			'time' => time(),
		];
		return $this->db->insert($this->table, $data_new);
	}

	// ===================================================

	public function get_contact($limit, $admin_all)
	{
		$this->db->select('id_user');
		$this->db->order_by('time', 'DESC');
		$this->db->distinct(); // <-- mencari data unique dari kolom id_user
		$this->db->limit($limit);

		// Pilih id_user yang bukan admin
		foreach ($admin_all as $key => $val) {
			$this->db->where('id_user !=', $val['id_user']);
		}

		return $this->db->get($this->table)->result_array();


	}

	public function get_latest_msg($id_user='')
	{
		$this->db->select('msg, time');
		$this->db->order_by('time', 'DESC');
		$this->db->limit(1);
		$this->db->where('id_user', $id_user);
		return $this->db->get($this->table)->row_array();
	}

	public function count_unread_msg_for_admin($id_user='', $terakhir_baca)
	{
		$this->db->order_by('time', 'DESC');
		$this->db->where('id_user', $id_user); //<-- di sini letak perbedaan user & admin
		// Menghitung berapa pesan muncul setelah ditinggal oleh (user) pembacanya
		$this->db->where('time >', $terakhir_baca);
		$this->db->limit(10);
		$result =  $this->db->get($this->table)->num_rows();
		// Buat maksimal 9 aja deh, biar kayak youtube. Biar gak lemot
		if ( $result > 9 ) {
			return "9+";
		}
		return $result;
	}

	public function count_unread_msg_for_user($id_user='', $terakhir_baca)
	{
		$this->db->order_by('time', 'DESC');
		$this->db->where('id_user_penerima', $id_user); //<-- di sini letak perbedaan user & admin
		$this->db->where('id_user !=', $id_user); //<-- di sini letak perbedaan user & admin (hanya menghitung pesan dari admin saja)
		// Menghitung berapa pesan muncul setelah ditinggal oleh (user) pembacanya
		$this->db->where('time >', $terakhir_baca);
		$this->db->limit(10);
		$result =  $this->db->get($this->table)->num_rows();
		// Buat maksimal 9 aja deh, biar kayak youtube. Biar gak lemot
		if ( $result > 9 ) {
			return "9+";
		}
		return $result;
	}
}