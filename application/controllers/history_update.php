<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class history_update extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->Model('datastore_m');
		$this->load->helper('date');
    }

    public function index()
    {
    	$status_login = $this->session->userdata('status_login');
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username=="") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['mid'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$projid = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg($data['compcode']);
    	$this->load->view('auth/history',$data);
   		
    }
}