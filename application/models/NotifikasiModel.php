<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends CI_Model {
	public $table = 'galeri_notifikasi';

	public function get_for_users($limit)
	{
		$this->db->limit($limit);
		$this->db->order_by('id_notifikasi', 'DESC');
		return $this->db->get( $this->table )->result_array();
	}
	public function get_all()
	{
		$this->db->order_by('id_notifikasi', 'DESC');
		$data_new = $this->db->get( $this->table )->result_array();
		return $data_new;
	}
	public function count_all()
	{
		$this->db->order_by('id_notifikasi', 'DESC');
		$data_new = $this->db->get( $this->table )->num_rows();
		return $data_new;
	}
	public function get_one($id_notifikasi)
	{
		$this->db->where('id_notifikasi', $id_notifikasi);
		$this->db->order_by('id_notifikasi', 'DESC');
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		return $data_new;
	}
	public function clear_all()
	{
		$this->db->empty_table( $this->table );
	}
	public function set_notifikasi($data)
	{
		$data['time'] = time();
		$this->db->insert($this->table, $data);
	}
	public function delete_notifikasi($id_notifikasi)
	{
		$this->db->where('id_notifikasi', $id_notifikasi);
		$this->db->order_by("terakhir_online", "DESC");
		$this->db->limit(1);
		
		$data_new = $this->db->delete( $this->table );
		return $data_new;
	}
}
