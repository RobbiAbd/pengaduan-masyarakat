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
		return $this->db->get_where('petugas', ['username_petugas' => $username]);
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
		$this->db->join("kabupaten", "kabupaten.id = petugas_kabupaten.kabupaten_id", "left");
		
		return $this->db->get();
	}

	public function update($params) 
	{
		$petugas_kabupaten = $this->db->get_where('petugas_kabupaten', ['petugas_id' => $params['id']])->row_array();
		$petugas_params    = [
			'nama'  => $params['nama'],
			'telp'  => $params['telp'],
			'level' => $params['level'],
		];

		if ($params['level'] == 'petugas') $this->update_petugas_kabupaten($params, $petugas_kabupaten);
		if ($params['level'] == 'admin' && $petugas_kabupaten) $this->db->delete('petugas_kabupaten', ['petugas_id' => $params['id']]);

		$result = $this->db->update('petugas', $petugas_params, ['id_petugas' => $params['id']]);

		return $result;
	}

	public function update_petugas_kabupaten($params, $petugas_kabupaten)
	{
		$kabupaten_params = [
			'petugas_id'   => $params['id'],
			'kabupaten_id' => $params['kabupaten'],
		];

		if ( $petugas_kabupaten ) $this->db->update('petugas_kabupaten', $kabupaten_params, ['id' => $petugas_kabupaten['id']]);
		if ( !$petugas_kabupaten ) $this->db->insert('petugas_kabupaten', $kabupaten_params);
	}

}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */