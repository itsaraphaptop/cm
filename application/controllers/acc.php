<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acc extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
            $this->load->model('office_m');
            $this->load->model('acc_m');
        }

        public function main_pv()
        {
        	$this->load->view('office/ap/ap_main_v');
        }
        public function retrive_apv()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['auth'] = $session_data['m_status'];
            $data['res'] = $this->acc_m->getapv();
            $data['approve'] = $this->acc_m->getapproveapv();
            $this->load->view('office/ap/apv/retrive_apv_v',$data);
        }
        public function allapv()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['auth'] = $session_data['m_status'];
            $data['res'] = $this->acc_m->getapvall();
            // $this->load->view('office/ap/apv/all_apv_v',$data);
             $this->load->view('office/ap/ap_all_main_v',$data);
        }
        public function apv_all()
        {
             $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['auth'] = $session_data['m_status'];
            $data['res'] = $this->acc_m->getapvall();
            $this->load->view('office/ap/apv/all_apv_v',$data);
        }
        public function apv_h()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['porex'] = $this->acc_m->getporecnoac();
        	$this->load->view('office/ap/apv/apv_h_v',$data);
        }
        public function apv_d()
        {
             $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $this->load->view('office/ap/apv/apv_d_v',$data);
        }
        public function load_apv_d_mat()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_poi($id);
            $this->load->view('office/ap/apv/apv_d_mat_v',$data);
        }
        public function load_apv_d_vat()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_poi($id);
            $this->load->view('office/ap/apv/apv_d_vat_v',$data);
        }
        public function load_apv_d_cost()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->retrive_poi($id);
            $this->load->view('office/ap/apv/apv_d_cost_v',$data);
        }
        /////////////////////////////////////////////////////////////////////
        ////////// apo //////////////////////////////////////////////////////

        public function apo_h()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['pettycash'] = $this->acc_m->getallpettycash();
            $this->load->view('office/ap/apo/apo_h_v',$data);
        }
        public function apo_d()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $this->load->view('office/ap/apo/apo_d_v',$data);
        }
        public function load_apo_d()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->office_m->getpettycash_d($id);
            $this->load->view('office/ap/apo/apo_d_list_v',$data);
        }
        public function apo_all()
        {
             $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['auth'] = $session_data['m_status'];
            $data['res'] = $this->acc_m->getapoall();
            $this->load->view('office/ap/apo/all_apo_v',$data);
        }
        public function editnewapv()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $id = $this->uri->segment(3);
            $data['res'] = $this->datastore_m->getvender();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
            $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $data['getunit'] = $this->datastore_m->getunit();
            $data['apvdetail'] = $this->acc_m->getnewapv($id);
           $this->load->view('office/ap/apo/newapo/editnewapv_v',$data);
        }

        public function acc_aging()
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
          $data['getproj'] = $this->datastore_m->getproject();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/report/aging_v');
          $this->load->view('base/footer_v');
        }
        public function acc_tax_report()
        {
          $this->load->helper('date');
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
          $data['getproj'] = $this->datastore_m->getproject();
          $data['year'] = "Y";
          $data['month'] = "m";
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/report/tax_report_v');
          $this->load->view('base/footer_v');
        }


}
