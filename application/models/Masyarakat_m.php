<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_m extends CI_Model {

	private $table = 'masyarakat';
	private $primary_key = 'nik';
	
	public function create($data)
	{
		return $this->db->insert($this->table, $data);;
	}
}

/* End of file Masyarakat_m.php */
/* Location: ./application/models/Masyarakat_m.php */