<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_main extends CI_Controller {
        public function __construct() {
            parent::__construct();

        }
        public function main()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('base/footer_v');
        }
      }