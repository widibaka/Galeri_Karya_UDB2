<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryaModel extends CI_Model {
	public $table = 'karya';
	public function get_karya( $limit, $current_page, $search = NULL )
	{
		$this->db->order_by( 'time', 'DESC' );
		$this->db->where( 'dihapus', 0 );
		$this->db->where( 'published', 1 );

		$this->db->limit( $limit, $limit*($current_page-1) ); //<-- offsetnya = limit * (currentPage - 1)
		// $this->db->select( 'id_karya, id_user, judul, time' );
		if ( !empty($search) ) {
			$this->db->like( 'judul', $search );
		}
		return $this->db->get( $this->table )->result_array();
	}
	public function count_searched_karya($search = NULL)
	{
		$this->db->where( 'dihapus', 0 );
		
		if ( !empty($search) ) {
			$this->db->like( 'judul', $search );
		}
		$this->db->select( 'id_karya' );
		return $this->db->get( $this->table )->num_rows();
	}
	public function get_karya_byID($id_karya)
	{
		$this->db->where( 'dihapus', 0 );
		
		$this->db->where( 'id_karya', $id_karya );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->row_array();
	}
	
	// ======================================================================
	public function get_karya_by_userID($id_user, $limit, $current_page, $search = NULL )
	{
		$this->db->order_by( 'time', 'DESC' );
		$this->db->where( 'dihapus', 0 );
		
		$this->db->limit( $limit, $limit*($current_page-1) ); //<-- offsetnya = limit * (currentPage - 1)
		// $this->db->select( 'id_karya, id_user, judul, time, dihapus, published' );
		if ( !empty($search) ) {
			$this->db->like( 'judul', $search );
		}
		$this->db->where( 'id_user', $id_user );
		return $this->db->get( $this->table )->result_array();
	}
	public function count_searched_karya_IKLAN_SAYA($id_user, $search = NULL)
	{
		$this->db->where( 'dihapus', 0 );
		
		if ( !empty($search) ) {
			$this->db->like( 'judul', $search );
		}
		$this->db->select( 'id_karya' );
		$this->db->where( 'id_user', $id_user );
		return $this->db->get( $this->table )->num_rows();
	}

	public function del($id_karya='')
	{
		$this->db->where( 'id_karya', $id_karya );
		$data = ['dihapus' => 1];
		return $this->db->update( $this->table, $data );
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
