<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class problems extends CI_Controller {
      public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
        }

    public function index()
    {
      $session_data = $this->session->userdata('sessed_in');
      $data['username'] = $session_data['username'];
      $data['name'] = $session_data['m_name'];
      $data['compcode'] = $session_data['compcode'];
      if ($data['username']=="") {
        redirect('/');
      }else {
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        $data['compname'] = $this->datastore_m->getcompanybycompcode($data['compcode']);
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('office/prob/prob_tail_v');
        $this->load->view('office/prob/main_v');
        $this->load->view('navtail/base_master/footer_v');
      }
    }
    public function new_prob()
    {
      $session_data = $this->session->userdata('sessed_in');
      $data['username'] = $session_data['username'];
      $data['name'] = $session_data['m_name'];
      $data['compcode'] = $session_data['compcode'];
      if ($data['username']=="") {
        redirect('/');
      }else {
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
        $data['compname'] = $this->datastore_m->getcompanybycompcode($data['compcode']);
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('office/prob/prob_tail_v');
        $this->load->view('office/prob/prob_v');
        // $this->load->view('navtail/base_master/footer_v');
      }
    }
    public function edit_prob()
    {
      $session_data = $this->session->userdata('sessed_in');
      $data['username'] = $session_data['username'];
      $data['name'] = $session_data['m_name'];
      $data['reqid'] = $this->uri->segment(3);
      $data['compcode'] = $session_data['compcode'];
      if ($data['username']=="") {
        redirect('/');
      }else {
        $data['depid'] = $session_data['m_depid'];
        $data['dep'] = $session_data['m_dep'];
        $data['projid'] = $session_data['projectid'];
        $projectid = $session_data['projectid'];
        $data['project'] = $session_data['m_project'];
        $data['imgu'] = $session_data['img'];
         $data['compname'] = $this->datastore_m->getcompanybycompcode($data['compcode']);
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('office/prob/prob_tail_v');
        $this->load->view('office/prob/edit_prob_v');
        // $this->load->view('navtail/base_master/footer_v');
      }
    }
    public function loadstatus(){
     
      $session_data = $this->session->userdata('sessed_in');
       $data['st'] = $this->uri->segment(3);
      
      $data['compcode'] = $session_data['compcode'];
       $data['username'] = $session_data['username'];
       $json_string = 'http://cmservice.kudosinnovation.com/json/sentreq';
        $jsondata = file_get_contents($json_string);
        $data['obj'] = json_decode($jsondata);
        $data['compname'] = $this->datastore_m->getcompanybycompcode($data['compcode']);
       $this->load->view('office/prob/load_wait_v',$data);
    }
    public function loadstatuswait(){
     
      $session_data = $this->session->userdata('sessed_in');
       $data['st'] = $this->uri->segment(3);
      
      $data['compcode'] = $session_data['compcode'];
       $data['username'] = $session_data['username'];
       $json_string = 'http://cmservice.kudosinnovation.com/json/sentreq';
        $jsondata = file_get_contents($json_string);
        $data['obj'] = json_decode($jsondata);
        $data['compname'] = $this->datastore_m->getcompanybycompcode($data['compcode']);
       $this->load->view('office/prob/load_wait_v',$data);
    }
}
