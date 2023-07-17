<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasKabupaten_m extends CI_Model {

	private $table = 'petugas_kabupaten';
	private $primary_key = 'id_petugaskab';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}	
}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */