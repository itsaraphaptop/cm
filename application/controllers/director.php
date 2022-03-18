<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class director extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('acc_m');
        }

        public function retrive_apv()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['auth'] = $session_data['m_status'];
            $data['res'] = $this->acc_m->getwaitapproveapv();
            $data['approve'] = $this->acc_m->getapproveapv();
            $this->load->view('director/apv/apv_approve_v',$data);
        }

}