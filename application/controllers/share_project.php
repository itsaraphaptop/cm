<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class share_project extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('datastore_m');
		$this->load->model('manag_m');
		$this->load->library('pagination');
	}
	public function select_project() {
		$data['id'] = $this->uri->segment(3);
		$data['idd'] = $this->uri->segment(4);
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$projectid = $session_data['projectid'];

		$data['res'] = $this->datastore_m->getmember_p($compcode, $projectid);
		$this->load->view('datastore/share/modal_employee_v', $data);
	}
}
