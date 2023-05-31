<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasyarakatController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		if ($this->session->userdata('level') != 'admin') :
			redirect('Auth/BlockedController');
		endif;
		$this->load->model('Masyarakat_m');
	}

    public function index() {
        $data['title'] = "Konfirmasi Akun Masyarakat";
        $data['data_masyarakat'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('admin/masyarakat');
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
    }

    public function status($nik) {
        $masyarakat = $this->db->get_where('masyarakat', ['nik' => $nik])->row_array();
        $status = $masyarakat['is_verified'] ? 0 : 1;

        $response = $this->db->update('masyarakat', [is_verified => $status ], ['nik' => $nik]);

        if ($response) :
            $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert"> Berhasil Update Status Akun </div>');
        else :
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Gagal Update Status Akun </div>');

        endif;

        redirect('Admin/MasyarakatController');
    }
}