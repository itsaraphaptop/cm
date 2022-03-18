<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class module_office extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('office_pr_m');
            $this->load->helper(array('form', 'url','file','line_alert','notify_message','line_oa_api'));

        }
        public function index(){
            $session_data = $this->session->userdata('sessed_in');
            $data['username'] = $session_data['username'];
            $data['position'] = $session_data['m_position'];
            $data['position_name'] = $session_data['position_name'];
            $data['email'] = $session_data['m_email'];
            $data['dep'] = $session_data['m_dep'];
            $data['mtype'] = $session_data['mtype'];
            $userid = $session_data['m_id'];
            $data['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $data['dep'] = $session_data['m_dep'];
            $data['imgu'] = $session_data['img'];
            $data['compcode'] = $session_data['compcode'];
            $data['companyname'] = $session_data['companyname'];
            $data['comp_img'] = $session_data['comp_img'];
            $data['module_id'] = $this->uri->segment(3);
        // check get permission unsuccessful
            if ($data['username'] == "") {
                redirect('/');
            }else{
                $this->load->model('permission_m');
                $data['modulename'] = $this->permission_m->getmodolename($data['module_id']);
                $data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
                $this->load->view('navtail/base_trans/header_v',$data);
                $this->load->view('navtail/base_trans/navtail_v');
                $this->load->view('navtail/base_trans/navtail_sec_v');
                // $this->load->view('panel/module_all_v');
                $this->load->view('office/pr/new_pr/new_pr_v');
                $this->load->view('navtail/base_trans/footer_v');
            }
        }
}

