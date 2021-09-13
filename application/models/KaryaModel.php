<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryaModel extends CI_Model {
	public $table = 'galeri_karya';
	// FOR RANKING LOMBA
		public function check_tabel_pemenang($value='')
		{
			$this->db->limit( 1 );
			return $this->db->get( 'galeri_pemenang_lomba' )->num_rows();
		}
		public function get_karya_dan_peringkat_lomba( )
		{
			$check_tabel_pemenang = $this->check_tabel_pemenang();
			// Jika sudah ada pemenangnya
			if ( $check_tabel_pemenang > 0 ) {
				$this->db->order_by( 'loves', 'DESC' );
				return $this->db->get( 'galeri_pemenang_lomba' )->result_array();
			// Kalau belum ada pemenangnya
			}else{
				// Get Peringkat
				$this->db->order_by( 'loves', 'DESC' );
				$this->db->select( 'id_karya, id_user, judul, id_kategori, loves' );

				//
				$this->db->where( 'dihapus', 0 );
				$this->db->where( 'published', 1 );

				$this->db->limit( 10 ); //<-- offsetnya = limit * (currentPage - 1)
				// $this->db->select( 'id_karya, id_user, judul, time' );
				return $this->db->get( $this->table )->result_array();
			}
		}
		public function get_highest_loves( )
		{
			// Get Peringkat
			$this->db->order_by( 'loves', 'DESC' );
			$this->db->select( 'loves' );

			//
			$this->db->where( 'dihapus', 0 );
			$this->db->where( 'published', 1 );

			$this->db->limit( 1 ); //<-- offsetnya = limit * (currentPage - 1)
			// $this->db->select( 'id_karya, id_user, judul, time' );
			return $this->db->get( $this->table )->row_array()['loves'];
		}
		public function get_karya_by_userID_for_ranking($id_user )
		{
			$this->db->order_by( 'loves', 'DESC' );
			$this->db->where( 'dihapus', 0 );
			$this->db->where( 'published', 1 ); // <-- pembedanya
			$this->db->where( 'id_user', $id_user );
			return $this->db->get( $this->table )->result_array();
		}
		public function get_ranking_satu_karya($id_karya, $jumlah_loves)
		{
			$this->db->where( 'dihapus', 0 );
			$this->db->where( 'published', 1 );
			$this->db->where( 'loves > ', $jumlah_loves );
			
			return $this->db->get( $this->table )->num_rows()+1; // plus satu karena ranking teratas = 0
		}
	// FOR RANKING LOMBA ENDS


	public function get_karya( $limit, $current_page, $search = '' )
	{
		// $this->db->order_by( 'time', 'DESC' );
		$this->db->where( 'dihapus', 0 );
		$this->db->where( 'published', 1 );

		$this->db->limit( $limit, $limit*($current_page-1) ); //<-- offsetnya = limit * (currentPage - 1)
		// $this->db->select( 'id_karya, id_user, judul, time' );
		if ( !empty($search) ) {
			$this->db->like( 'judul', $search );
		}
		return $this->db->get( $this->table )->result_array();
	}
	public function count_searched_karya($search ='')
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
	public function get_next_karya($time_karya)
	{
		$this->db->order_by( 'time', 'ASC' );
		$this->db->where( 'dihapus', 0 );
		
		$this->db->where( 'time >', $time_karya );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->row_array();
	}
	public function get_previous_karya($time_karya)
	{
		$this->db->order_by( 'time', 'DESC' );
		$this->db->where( 'dihapus', 0 );
		
		$this->db->where( 'time <', $time_karya );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->row_array();
	}
	
	
	// ======================================================================
	public function count_karya_user($id_user = NULL)
	{
		$this->db->where( 'dihapus', 0 );
		$this->db->where( 'id_user', $id_user );
		$this->db->select( 'id_karya' );
		$this->db->limit( 3 );
		return $this->db->get( $this->table )->num_rows();
	}
	public function get_karya_by_userID($id_user, $limit, $current_page, $search ='' )
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
	public function count_searched_karya_IKLAN_SAYA($id_user, $search ='')
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
	public function blokir_karya($id_user)
	{
		$data = [
			'published' => 0,
		];
		$this->db->where( 'id_user', $id_user );
		return $this->db->update( $this->table, $data );
	}

	// =======================================================
	public function add_love($id_karya)
	{
		$loves_count = $this->get_karya_byID($id_karya)['loves'];
		$loves_count = $loves_count+1;
		$data = [
			'loves' => $loves_count
		];
		$this->db->where( 'id_karya', $id_karya );
		return $this->db->update( $this->table, $data );
	}
	public function remove_love($id_karya)
	{
		$loves_count = $this->get_karya_byID($id_karya)['loves'];
		$loves_count = $loves_count-1;
		$data = [
			'loves' => $loves_count
		];
		$this->db->where( 'id_karya', $id_karya );
		return $this->db->update( $this->table, $data );
	}
	
}
