<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_tran extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('gl_m');

        }
        public function journal_vocher()
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
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/journal_vocher_v');
          $this->load->view('navtail/base_master/footer_v');
        }

        public function journalvocher()
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
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/journalvocher_v');
          $this->load->view('navtail/base_master/footer_v');
        }


        public function print_vocher()
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
          $data['getjour'] = $this->gl_m->getjournal();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/print_vocher');
          $this->load->view('navtail/base_master/footer_v');
        }



        public function genalral_ledger_posting()
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
          // $yearsel=$this->uri->segment(3);
          // $period=$this->uri->segment(4);
          // $data['res'] = $this->ap_m->getgln($yearsel,$period);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/gl_post');
          $this->load->view('navtail/base_master/footer_v');
        }

        public function edit_journalvocher()
        {
          $no = $this->uri->segment(3);
          $read_only = $this->uri->segment(4);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $read_only_status = true;
          if($read_only == "readonly"){
            $read_only_status = false;
          }else{
            $read_only_status = true;
          }
          $userid = $session_data['m_id'];
          $data['no'] =$this->uri->segment(3);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['header'] = $this->gl_m->getjournal_header($no);
          $data['detail'] = $this->gl_m->getjournal_detail($no);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/edit_journalvocher_v',["read_only_status"=>$read_only_status]);
          $this->load->view('navtail/base_master/footer_v');
        }




        public function report_vocher()
        {
          $no = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['no'] =$this->uri->segment(3);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['header'] = $this->gl_m->getjournal_header($no);
          $data['detail'] = $this->gl_m->getjournal_detail($no);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/report_vocher');
          $this->load->view('navtail/base_master/footer_v');
        }

        public function gl_ledger()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['imgu'] = $session_data['img'];
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/gl_ledger');
          $this->load->view('navtail/base_master/footer_v');
        }

        public function load_post_v()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['imgu'] = $session_data['img'];
          $data['year'] =$this->uri->segment(3);
          $data['month'] =$this->uri->segment(4);
          $year = $this->uri->segment(3);
          $month = $this->uri->segment(4);
          $data['gl_d'] = $this->gl_m->detail_posting_d($year,$month);
          $data['gl_h'] = $this->gl_m->detail_posting_h($year,$month);
          $this->load->view('office/account/gl/gl_transaction/gl_ledger2',$data);
        }
}
