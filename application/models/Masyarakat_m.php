<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_m extends CI_Model {

	private $table = 'masyarakat';
	private $primary_key = 'nik';
	
	public function create($data)
	{
		$data_masyarakat = array(
			'nik' => $data['nik'],
			'username' => $data['username'],
			'password' => $data['password']
		);

		$save_masyarakat = $this->db->insert('masyarakat', $data_masyarakat);

		if(!$save_masyarakat) {
			return false;
		}

		$masyarakat_id = $this->db->insert_id();
		$detail_masyarakat = array(
			'nama' => $data['nama'],
			'telp' => $data['telp'],
			'alamat' => $data['alamat'],
			'foto_profile' => $data['foto_profile'],
			'id_masyarakat' => $masyarakat_id
		);

		$save_detail_masyarakat = $this->db->insert('masyarakat_detail', $detail_masyarakat);

		return $save_detail_masyarakat;
	}

	public function get_all() {
		$this->db->select('masyarakat.nik, masyarakat_detail.nama, masyarakat.username, masyarakat_detail.telp, masyarakat.is_verified');
		$this->db->from($this->table);
		$this->db->join('masyarakat_detail', 'masyarakat_detail.id_masyarakat = masyarakat.nik', 'inner');

		return $this->db->get();
	}
}

/* End of file Masyarakat_m.php */
/* Location: ./application/models/Masyarakat_m.php */