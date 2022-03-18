<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class syscode extends CI_Controller {
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
          $this->load->view('navtail/navtail_master_v');
          // $this->load->view('datastore/system_defualt/main_v');
          $this->load->view('datastore/system_defualt/menu_list_v');
          $this->load->view('base/footer_v');
        }

        public function system_defualt()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          //  $this->load->database();
          $this->db->where('sys_code',$compcode);
          $q = $this->db->get('syscode');
          if($q->num_rows()>0){
            $data['zzz'] = $q->result();
          }else{
            $data['zzz'] = null;
          }

         
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];

          
          $this->load->view('datastore/system_defualt/main_v',$data);
        }

        public function load_acc()
        {

          $data['id'] = $this->uri->segment(3); 
          $this->load->model('system_m');
          $data['res'] = $this->system_m->acccode();
          $this->load->view('datastore/system_defualt/load_acc_v',$data);
        }
        public function load_acc_defualt()
        {
          $session_data = $this->session->userdata('sessed_in');
          $comcode = $session_data['compcode'];
          $this->load->model('datastore_m');
          $data['res'] = $this->datastore_m->acc_defualt($comcode);

          $this->load->view('datastore/system_defualt/load_acc_defualt_v',$data);
        }
        

}