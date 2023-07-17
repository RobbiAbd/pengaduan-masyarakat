<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_m extends CI_Model
{

	private $table = 'pengaduan';
	private $primary_key = 'id_pengaduan';

	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function data_pengaduan($id_kabupaten = NULL)
	{
		$this->db->select('pengaduan.*, masyarakat_detail.nama_masyarakat, masyarakat_detail.telp, kabupaten.nama_kabupaten as kabupaten');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik_masyarakat = pengaduan.nik', 'inner');
		$this->db->join('masyarakat_detail', 'masyarakat_detail.nik_masyarakat = masyarakat.nik_masyarakat', 'inner');
		$this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengaduan.id_kabupaten');
		$this->db->where('status', 'Diajukan');
		if($id_kabupaten) $this->db->where('kabupaten.id_kabupaten', $id_kabupaten);

		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_nik($nik)
	{
		$this->db->select('pengaduan.*, masyarakat_detail.nama_masyarakat, masyarakat_detail.telp');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik_masyarakat = pengaduan.nik', 'inner');
		$this->db->join('masyarakat_detail', 'masyarakat_detail.nik_masyarakat = masyarakat.nik_masyarakat', 'inner');
		$this->db->where('pengaduan.nik', $nik);
		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_proses($id_kabupaten = NULL)
	{
		$this->db->select('pengaduan.*, masyarakat_detail.nama_masyarakat, masyarakat_detail.telp, kabupaten.nama_kabupaten as kabupaten');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik_masyarakat = pengaduan.nik', 'inner');
		$this->db->join('masyarakat_detail', 'masyarakat_detail.nik_masyarakat = masyarakat.nik_masyarakat', 'inner');
		$this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengaduan.id_kabupaten');
		$this->db->where('status', 'Diproses');
		if($id_kabupaten) $this->db->where('kabupaten.id_kabupaten', $id_kabupaten);

		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_selesai($id_kabupaten = NULL)
	{
		$this->db->select('pengaduan.*, masyarakat_detail.nama_masyarakat, masyarakat_detail.telp, kabupaten.nama_kabupaten as kabupaten');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik_masyarakat = pengaduan.nik', 'inner');
		$this->db->join('masyarakat_detail', 'masyarakat_detail.nik_masyarakat = masyarakat.nik_masyarakat', 'inner');
		$this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengaduan.id_kabupaten');
		$this->db->where('status', 'Selesai');
		if($id_kabupaten) $this->db->where('kabupaten.id_kabupaten', $id_kabupaten);

		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_tolak($id_kabupaten = NULL)
	{
		$this->db->select('pengaduan.*, masyarakat_detail.nama_masyarakat, masyarakat_detail.telp, kabupaten.nama_kabupaten as kabupaten');
		$this->db->from($this->table);
		$this->db->join('masyarakat', 'masyarakat.nik_masyarakat = pengaduan.nik', 'inner');
		$this->db->join('masyarakat_detail', 'masyarakat_detail.nik_masyarakat = masyarakat.nik_masyarakat', 'inner');
		$this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengaduan.id_kabupaten');
		$this->db->where('status', 'Ditolak');
		if($id_kabupaten) $this->db->where('kabupaten.id_kabupaten', $id_kabupaten);

		return $this->db->get();
	}

	public function data_pengaduan_masyarakat_id($id)
	{
		$this->db->select('pengaduan.*');
		$this->db->from($this->table);
		$this->db->where('pengaduan.id_pengaduan', $id);

		return $this->db->get();
	}

	public function data_pengaduan_tanggapan($id)
	{
		$this->db->select('pengaduan.*,tanggapan.tgl_tanggapan,tanggapan.tanggapan, kabupaten.nama_kabupaten as nama_kabupaten');
		$this->db->from($this->table);
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'inner');
		$this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengaduan.id_kabupaten', 'inner');
		$this->db->where('pengaduan.id_pengaduan', $id);
		return $this->db->get();
	}

	public function laporan_pengaduan($id_kabupaten)
	{
		$this->db->select(
			'pengaduan.nama_korban, pengaduan.tgl_pengaduan, pengaduan.jenis_laporan, pengaduan.lokasi_kejadian,
			pengaduan.isi_laporan, pengaduan.status, tanggapan.tanggapan, kabupaten.nama_kabupaten as nama_kabupaten'
		);
		$this->db->from('pengaduan');
		$this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan', 'left');
		$this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengaduan.id_kabupaten');
		if ($id_kabupaten) $this->db->where('kabupaten.id_kabupaten', $id_kabupaten);
		
		// $this->db->join('masyarakat','masyarakat.nik = pengaduan.nik','left');
		// $this->db->join('petugas','petugas.id_petugas = tanggapan.id_petugas','left');
		return $this->db->get();
	}
}

/* End of file Pengaduan_m.php */
/* Location: ./application/models/Pengaduan_m.php */