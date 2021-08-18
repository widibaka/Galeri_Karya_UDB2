<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistModel extends CI_Model {
	public $table = 'wishlist';
	public function count_wishlist_by_iklanID($id_iklan)
	{
		$this->db->where( 'id_iklan', $id_iklan );
		return $this->db->get( $this->table )->num_rows();
	}
	public function get_wishlist_by_userID($id_user)
	{
		$this->db->order_by( 'time', 'DESC' );
		$this->db->select( 'id_iklan' );
		$this->db->where( 'id_user', $id_user );
		return $this->db->get( $this->table )->result_array();
	}
	public function count_wishlist_by_userID($id_user)
	{
		$this->db->where( 'id_user', $id_user );
		return $this->db->get( $this->table )->num_rows();
	}
	public function check_wishlist_by_userID_And_iklanID($id_user, $id_iklan)
	{
		$this->db->where( 'id_user', $id_user );
		$this->db->where( 'id_iklan', $id_iklan );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->num_rows();
	}
	public function delete_wishlist($id_user, $id_iklan)
	{
		$this->db->where( 'id_user', $id_user );
		$this->db->where( 'id_iklan', $id_iklan );
		$this->db->limit(1);
		return $this->db->delete( $this->table );
	}
	public function toggle_add_wishlist($id_user, $id_iklan)
	{
		// Add or remove wishlist depends on existance on database
		if ( !empty($this->check_wishlist_by_userID_And_iklanID($id_user, $id_iklan)) ) {
			// Kalau ada, maka hapus
			$this->delete_wishlist($id_user, $id_iklan);
			return 0;
		}

		// Kalau kosong, maka diisi
		$data = [
			'id_user' => $id_user,
			'id_iklan' => $id_iklan,
			'time' => time(),
		];
		$this->db->insert( $this->table, $data );
		return 1;
	}
}
