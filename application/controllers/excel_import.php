<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class excel_import extends CI_Controller {
	public function __construct() {
		parent::__construct();
    }

    public function boq(){

        $session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
        $data['name'] = $session_data['m_name'];
		$data['imgu'] = $session_data['img'];
		$data['project'] = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
        }
        $this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/import_boq/import_boq2_v');
		$this->load->view('base/footer_v');
	}
	public function process_temp(){
		$this->load->view('bd/process_temp_v');
	}
}