<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_m extends CI_Model {

	private $table = 'pengaduan';
	private $primary_key = 'id_pengaduan';

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function data_pengaduan()
	{
		$this->db->select('pengaduan.*,masyarakat.nama,masyarakat.telp');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik', 'inner');
		$this->db->where('status', '0');
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_nik($nik)
	{
		$this->db->select('pengaduan.*,masyarakat.nama,masyarakat.telp');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik', 'inner');
		$this->db->where('pengaduan.nik', $nik);
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_proses()
	{
		$this->db->select('pengaduan.*,masyarakat.nama,masyarakat.telp');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik', 'inner');
		$this->db->where('status', 'proses');
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_selesai()
	{
		$this->db->select('pengaduan.*,masyarakat.nama,masyarakat.telp');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik', 'inner');
		$this->db->where('status', 'selesai');
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_tolak()
	{
		$this->db->select('pengaduan.*,masyarakat.nama,masyarakat.telp');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik', 'inner');
		$this->db->where('status', 'tolak');
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_id($id)
	{
		return $this->db->get_where($this->table,['id_pengaduan' => $id]);
	}

	public function data_pengaduan_tanggapan($id)
	{
		$this->db->select('pengaduan.*,tanggapan.tgl_tanggapan,tanggapan.tanggapan');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'inner');
		$this->db->where('pengaduan.id_pengaduan', $id);
		return $this->db->get();
	}

	public function laporan_pengaduan()
	{
	$this->db->select('pengaduan.*, masyarakat.nama, masyarakat.telp, tanggapan.tgl_tanggapan, tanggapan.tanggapan, petugas.nama_petugas');
	$this->db->from('pengaduan');
	$this->db->join('masyarakat','masyarakat.nik = pengaduan.nik','left');
	$this->db->join('tanggapan','tanggapan.id_pengaduan = pengaduan.id_pengaduan','left');
	$this->db->join('petugas','petugas.id_petugas = tanggapan.id_petugas','left');
	return $this->db->get();
	}
}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */