<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePasswordController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Change Password';

		$this->form_validation->set_rules('current_password','Password Sekarang','trim|required');
		$this->form_validation->set_rules('new_password','Password Baru','trim|required|min_length[6]|max_length[15]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password','Konfirmasi Password Baru','trim|required|min_length[6]|max_length[15]|matches[new_password]');
		$this->form_validation->set_rules('confirmation_password','Konfirmasi','required');

		if ($this->form_validation->run() == FALSE) :
			$this->load->view('_part/backend_head', $data);
			$this->load->view('_part/backend_sidebar_v');
			$this->load->view('_part/backend_topbar_v');
			$this->load->view('user/ganti_password');
			$this->load->view('_part/backend_footer_v');
			$this->load->view('_part/backend_foot');
		else :
			$passwordSekarang = htmlspecialchars($this->input->post('current_password',true));
			$passwordBaru = htmlspecialchars($this->input->post('new_password',true));

			$this->change_password($passwordSekarang, $passwordBaru);
		endif;
	}

	public function change_password($passwordSekarang, $passwordBaru)
	{
		// cek akun di table masyarakat dan petugas berdasarkan username
		$masyarakat = $this->db->get_where('masyarakat',['username' => $this->session->userdata('username')])->row_array();
		$petugas = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();

		if ($masyarakat == TRUE) :

			if (password_verify($passwordSekarang, $masyarakat['password'])) :

				$params = [
					'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
				];

				$resp = $this->db->update('masyarakat',$params,['nik' => $masyarakat['nik'] ]);
				if ($resp) :
					$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
						Ganti password berhasil!
						</div>');

					redirect('Auth/ChangePasswordController');
				else :
					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
						Ganti password gagal!
						</div>');

					redirect('Auth/ChangePasswordController');
				endif;

			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Password salah!
					</div>');

				redirect('Auth/ChangePasswordController');
			endif;

		elseif ($petugas == TRUE) :

			if (password_verify($passwordSekarang, $petugas['password'])) :

				$params = [
					'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
				];

				$resp = $this->db->update('petugas',$params,['id_petugas' => $petugas['id_petugas'] ]);
				if ($resp) :
					$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
						Ganti password berhasil!
						</div>');

					redirect('Auth/ChangePasswordController');
				else :
					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
						Ganti password gagal!
						</div>');

					redirect('Auth/ChangePasswordController');
				endif;

			else :
				$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Password salah!
					</div>');

				redirect('Auth/ChangePasswordController');
			endif;

		else :
			$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
				Password salah!
				</div>');

			redirect('Auth/ChangePasswordController');
		endif;
	}
}

/* End of file ChangePasswordController.php */
/* Location: ./application/controllers/Auth/ChangePasswordController.php */
