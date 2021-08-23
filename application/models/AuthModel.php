<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
	public $table = 'user';
	public function check_user($data='')
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
	public function get_user($id_user='')
	{
		$this->db->where('id_user', $id_user);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
	public function check_user_without_password($data='')
	{
		$this->db->where('email', $data['email']);
		// $this->db->where('password', $data['password']);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
	public function register($data='')
	{
		unset($data['password2']);
		$data['id_user'] = strval( time() . rand(1,100) );
		$this->db->insert($this->table, $data);
	}
	public function get_HP_by_userID($id_user)
	{
		$this->db->select( 'hp' );
		$this->db->where( 'id_user', $id_user );
		$this->db->limit( 1 );
		return $this->db->get( $this->table )->row_array()['hp'];
	}
	public function edit_profil($id_user='', $data)
	{
		$data = [
			'username' => $data['username'],
			'hp' => $data['hp'],
		];
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
	}
	public function ubah_gambar_profil($id_user, $filename='')
	{
		$data = [
			'photo' => $filename,
		];
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
	}
	public function hapus_file_gambar_profil($id_user)
	{
		$dir = 'assets/uploads/foto_profil/';
		$filename = $this->get_user( $id_user )['photo'];
		
		// kalau tidak ada gambar, maka yaudah
		if ( !empty($filename) ) {
			unlink( $dir . $filename );
			return true;
		}
		return false;
	}
}
