<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ap_print extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model("datastore_m");
            $this->load->model("ap_m");
        }
        public function aps_print_form()
        {
          $session_data = $this->session->userdata('sessed_in');
          $apsno = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['user'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          if ($username=="") {
            redirect('/');
          }
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
           $data['compimg'] = $this->ap_m->companyimgbycompcode($compcode);
           $company = $this->datastore_m->getcompanybycompcode($compcode);
           foreach ($company as $value) {
           	$data['company'] = $value->company_name;
           }
          $da['editaps'] = $this->ap_m->geteditaps($apsno);
          $da['apsmatitem'] = $this->ap_m->geteditaps_i($apsno);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
          $this->load->view('office/account/ap/aps/report/aps_report_v',$da);

          $this->load->view('base/footer_v');
        }
}