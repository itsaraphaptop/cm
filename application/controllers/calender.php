<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calender extends CI_Controller {
	public function __construct() {
		parent::__construct();		
	}


      public function index()
    {

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
                // $this->load->view('panel/dashboard_n_main_v',$data);
            $data['navSide'] = true;
            $this->load->view('navtail/base_master/header_v',$data);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('navtail/navtail_main');
            $this->load->view('panel/calender',$data);
            $this->load->view('base/footer_v');
        }       
    }
}