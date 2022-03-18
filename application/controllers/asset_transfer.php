<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asset_transfer extends CI_Controller {

    public function __construct() {
            parent::__construct();
            $this->load->Model('auth_m');
            
        
    }

    public function index()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
        redirect('/');
      }

      $userid = $session_data['m_id'];
      $res['name'] = $session_data['m_name'];
      $res['depid'] = $session_data['m_depid'];
      $res['dep'] = $session_data['m_dep'];
      $res['projid'] = $session_data['projectid'];
      $projectid = $session_data['projectid'];
      $res['project'] = $session_data['m_project'];
      $res['imgu'] = $session_data['img'];
      $res['poapprove'] = $session_data['po_approve'];
      $res['pr_project_right'] = $session_data['pr_project_right'];
      $this->load->view('navtail/base_master/header_v',$res);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_fa_v');
        $this->load->view('asset/asset_transfer_v');
        $this->load->view('base/footer_v');

    }
}
