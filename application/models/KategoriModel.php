<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriModel extends CI_Model {
	public $table = 'galeri_kategori';
	public function get_kategori( $id_kategori )
	{
		$this->db->where( 'id_kategori', $id_kategori );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->row_array()['nama_kategori'];
	}
	public function get_all_kategori()
	{
		$this->db->order_by( 'nama_kategori', 'ASC' );
		$this->db->where( 'is_active', 1 );
		return $this->db->get( $this->table )->result_array();
	}
	public function get_all_kategori_for_admin()
	{
		$this->db->order_by( 'is_active', 'DESC' );
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
		$this->db->where( 'id_kategori', $data['id_kategori'] );
		return $this->db->update( $this->table, $data );
	}
	
}
