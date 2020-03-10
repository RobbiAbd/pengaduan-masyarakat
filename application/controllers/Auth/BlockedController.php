<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlockedController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		
	}

	// List all your items
	public function index()
	{
        $data['title'] = 'Bloked';
        $this->load->view('_part/backend_head', $data);
        $this->load->view('blocked');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
	}
}

/* End of file BlockedController.php */
/* Location: ./application/controllers/Auth/BlockedController.php */
