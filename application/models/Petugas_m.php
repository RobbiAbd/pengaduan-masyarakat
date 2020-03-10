<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_m extends CI_Model {

	private $table = 'petugas';
	private $primary_key = 'id_petugas';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}	

}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */