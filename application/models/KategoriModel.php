<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {
	public $table = 'kategori';
	public function get_kategori( $id_kategori )
	{
		$this->db->where( 'id_kategori', $id_kategori );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->row_array()['nama_kategori'];
	}
	public function get_all_kategori()
	{
		$this->db->order_by( 'nama_kategori', 'ASC' );
		return $this->db->get( $this->table )->result_array();
	}
	
	// =====================================================================

	public function add($data)
	{
		return $this->db->insert( $this->table, $data );
	}
	public function update($data)
	{
		$this->db->where( 'id_karya', $data['id_karya'] );
		return $this->db->update( $this->table, $data );
	}
	
}
