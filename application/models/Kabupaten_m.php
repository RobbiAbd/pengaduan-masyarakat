<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten_m extends CI_Model {

	private $table = 'kabupaten';
	private $primary_key = 'id';
	
	public function get_all() {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }
}

/* End of file Kabupaten_m.php */
/* Location: ./application/models/Kabupaten_m.php */