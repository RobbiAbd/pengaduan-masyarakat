<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ($this->session->userdata('level') == NULL) :
			redirect('Auth/BlockedController');
		endif;

		$this->load->model('Petugas_m');
		$this->load->model('Pengaduan_m');
	}

	// List all your items
	public function index()
	{
		$id_kabupaten    = $this->get_kabupaten_id();
		$data['title']   = 'Cetak Laporan';
		$data['laporan'] = $this->Pengaduan_m->laporan_pengaduan($id_kabupaten)->result_array();

		$this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('admin/generate_laporan');
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
	}

	public function generate_laporan()
	{
	
	$id_kabupaten    = $this->get_kabupaten_id();
	$data['laporan'] = $this->Pengaduan_m->laporan_pengaduan($id_kabupaten)->result_array();

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'landscape'); // opsional | default A4
    $this->pdf->filename = "laporan-pengaduan.pdf"; // opsional | default is laporan.pdf
    $this->pdf->load_view('laporan_pdf', $data);
	}

	public function get_kabupaten_id() 
	{
		$id_kabupaten  = NULL;
		$petugas       = $this->Petugas_m->get_petugas_by_username($this->session->userdata('username'))->row_array();
		$level_petugas = $this->session->userdata('level');

		if ($level_petugas == 'petugas') {
			$id_kabupaten = $this->Petugas_m->get_petugas_kabupaten($petugas['id_petugas'])->row()->kabupaten_id;
		}

		return $id_kabupaten;
	}
}

/* End of file LaporanController.php */
/* Location: ./application/controllers/Admin/LaporanController.php */
