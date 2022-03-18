<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class log extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->Model('log_m');
            $this->load->helper('date');
        }
        public function read()
        {
            $q = $this->log_m->userlogread();
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }
        public function userlog()
        {
        	$username = $this->input->post('username');
        	$menu = $this->input->post('menu');
             if ($username=="admin") {
                    
                }else{
            	$data = array(
            		'user' => $username,
            		'menu' => $menu,
            		'logindate' => date('Y-m-d H:i:s',now()),
                    'ipaddress' => $this->input->ip_address()
            		);
            	if ($this->log_m->add_log($data)) {
            		return true;
            	}
            	else{
            		return false;
            	}
            }
        }
        public function viewlog()
        {
            $session_data = $this->session->userdata('logged_in');
             $username = $session_data['username'];
         $data['imgu'] = $this->log_m->changeprofile($username);
         $data['compimg'] = $this->log_m->companyimg();
         $data['username'] = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $data['dep'] = $session_data['m_dep'];
        $data['email'] = $session_data['m_email'];
        $data['project'] = $session_data['m_project'];
        $data['mpm'] = $session_data['mpm'];
        $data['moffce'] = $session_data['moffce'];
        $data['mpo'] = $session_data['mpo'];
        $data['mic'] = $session_data['mic'];
        $data['map'] = $session_data['map'];
        $data['mar'] = $session_data['mar'];
        $data['approve'] = $session_data['approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];

            $this->load->view('navtail/base_master/header_v');
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('base/office_menu_v',$data);
            $this->load->view('log_v');
            $this->load->view('base/footer_v');
        }

 }