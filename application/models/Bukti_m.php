<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukti_m extends CI_Model
{

	private $table = 'bukti';
	private $primary_key = 'id';

	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */