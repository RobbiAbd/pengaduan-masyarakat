<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanggapan_m extends CI_Model {

	private $table = 'tanggapan';
	private $primary_key = 'id_tanggapan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

}

/* End of file Tanggapan_m.php */
/* Location: ./application/models/Tanggapan_m.php */