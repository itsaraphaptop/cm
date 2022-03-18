<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forget_password extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->Model('auth_m');
		$this->load->model('module_m');
		$this->load->helper('date');
		$this->load->model('config_m');
    }

    public function index()
    {
    	$status_login = $this->session->userdata('status_login');
		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$type = $session_data['m_status'];
		$data['img'] = $this->config_m->compimg();
		$data['company'] = $this->config_m->company();
		$data['login_status'] = $status_login;
    	// $this->load->view('auth/header');
    	$this->load->view('auth/forget_password', $data);
    	// $this->load->view('auth/footer');
   		
    }
}