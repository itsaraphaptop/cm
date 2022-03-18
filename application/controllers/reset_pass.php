<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_pass extends CI_Controller {
	public function __construct() {
            parent::__construct();
             $session_user = $this->session->userdata('sessed_in');
             $data['username'] = $session_user['username'];
             if ($data['username'] == "") {

                redirect('/');
	         }else{
	         	
	         }
            
           
    }

	public function index()
	{
		$this->load->view('auth/reset_pass_v');
	}


}

/* End of file reset_pass..php */
/* Location: ./application/controllers/reset_pass..php */