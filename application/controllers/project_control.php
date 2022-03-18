<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class project_control extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('datastore_m');
	}
	public function index(){
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$data['dep'] = $session_data['m_dep'];
		$data['mtype'] = $session_data['mtype'];
		$data['m_id'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['imgu'] = $session_data['img'];
		// check get permission unsuccessful
		if ($data['username'] == "") {
		redirect('/');
		}else{
		$data['navSide'] = true;

		$data['task'] = $this->datastore_m->task_h($data['m_id']);
		$data['project'] = $this->datastore_m->allproject();
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_main');
		$this->load->view('panel/project_control',$data);
		$this->load->view('base/footer_v');
		}
	}
	
}