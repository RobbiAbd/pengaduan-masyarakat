<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_m extends CI_Model {

	private $table = 'petugas';
	private $primary_key = 'id_petugas';

	public function create($data)
	{
		$this->db->insert($this->table, $data);
        return $this->db->insert_id();
	}	

	public function get_petugas_by_username($username)
	{
		return $this->db->get_where('petugas', ['username' => $username]);
	}

	public function get_petugas_kabupaten($id) 
	{
		return $this->db->get_where('petugas_kabupaten', ['petugas_id' => $id]);
	}

	public function get_all_petugas()
	{
		$this->db->select("petugas.*, kabupaten.nama as kabupaten");
		$this->db->from($this->table);
		$this->db->join("petugas_kabupaten", "petugas_kabupaten.petugas_id = petugas.id_petugas", "left");
		$this->db->join("kabupaten", "kabupaten.id = petugas_kabupaten.petugas_id", "left");
		
		return $this->db->get();
	}

}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */