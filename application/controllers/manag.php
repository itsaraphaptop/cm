<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manag extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->model('manag_m');
           $this->load->model('datastore_m');
        }
        public function calenda()
        {
           $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $da['name'] = $session_data['m_name'];
            $data['getproj'] = $this->datastore_m->getproject();
            $data['resmem'] = $this->datastore_m->getmember();
            $data['getunit'] = $this->datastore_m->getunit();
            $data['getdep'] = $this->datastore_m->department();
            $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $data['depid'] = $session_data['m_depid'];
            $da['dep'] = $session_data['m_dep'];
            $data['projid'] = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
          $da['imgu'] = $session_data['img'];
          $da['compimg'] = $this->datastore_m->companyimg();
          $data['sumnetamt'] = $this->manag_m->payment();
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('management/payment_schedule_v',$data);
            $this->load->view('base/footer_v');
        }
        public function loadpush()
        {
          $this->load->view('manager/push_v');
        }
        public function waitprapprove()
        {
        	$session_data = $this->session->userdata('logged_in');
            $id = $session_data['projectid'];
            $data['res'] = $this->manag_m->getpr_wait($id);
            $this->load->view('manager/pr/approve_pr_v',$data);
        }
         public function approvepr()
        {
          $prno = $this->input->post('prno');
          $data = array(
              'pr_approve' => "approve"
            );
          $this->db->where('pr_prno',$prno);
          $q = $this->db->update('pr',$data);
          if($q)
          {
            echo $prno;
            return true;
          }
          else
          {
            return false;
          }

        }

}
