<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class budget extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
        }
        public function index()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/budget/main_v');
          $this->load->view('base/footer_v');
        }
      }
