<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl extends CI_Controller {
        public function __construct() {
            parent::__construct();
            // $this->load->model('gl_m');
 
        }

        public function main_index()
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
          $this->load->view('office/account/gl/main_index');
          $this->load->view('base/footer_v');
        }

        public function gl_main()
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
          $this->load->view('base/footer_v');
        }
        public function Create_Department()
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
          $this->load->model('gl_m');
          $data['getdep'] = $this->gl_m->SelectDepartment();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/setup_department_v');
          $this->load->view('base/footer_v');
        }
      public function Account_Period_Setup(){
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

        $this->load->model('gl_m');
        $data1['output'] = $this->gl_m->glshow();

        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('office/account/gl/ac_master/ac_period_setup_v',$data1);
        $this->load->view('base/footer_v');



      }
      public function BookAccountDATA(){
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
        $this->load->model('gl_m');
        $data['getbook'] = $this->gl_m->getbook_account();
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('office/account/gl/ac_master/book_ac');
        $this->load->view('base/footer_v');


      }

      public function gl_accountperiod(){
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
        $compcode = $session_data['compcode'];
        $this->load->model('gl_m');
        $data['acc'] = $this->gl_m->glshow($compcode);
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_master_v');
        $this->load->view('office/account/gl/ac_master/gl_accountperiod_v');
        $this->load->view('base/footer_v');
      }


      public function gl_bookaccount(){
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
        $this->load->model('gl_m');
        $data['bb'] = $this->gl_m->getbook_account();
        $this->load->view('navtail/base_master/header_v',$data);
        $this->load->view('navtail/base_master/tail_v');
        $this->load->view('navtail/navtail_master_v');
        $this->load->view('office/account/gl/ac_master/book_account_v');
        $this->load->view('base/footer_v');
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
           $this->load->model('gl_m');
          
          $data['book'] = $this->gl_m->book_v();
          $data['account'] = $this->gl_m->account_m();
          $data['proj'] = $this->gl_m->getproject();
          $data['system'] = $this->gl_m->system_m();
          $data['depart'] = $this->gl_m->department();
          $data['allcostcode'] = $this->gl_m->allcostcode();
          $data['vender'] = $this->gl_m->getvender();
          $data['customer'] = $this->gl_m->getmember();
          $data['setup_tax'] = $this->gl_m->setup_tax();
          $data['setup_taxdes']  = $this->gl_m->setup_taxdes();
          $data['taxtype'] = $this->gl_m->setup_taxtype();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('office/account/gl/gl_main_v');
          $this->load->view('office/account/gl/gl_transaction/journalvocher_v');
          $this->load->view('base/footer_v');
        }

    public function get_tenid_by_project(){
        $input = $this->input->post();

        $projectid = $input["project_id"];
        $system    = $input["system_code"];

        $this->db->select("*");
        $this->db->where("project_id",$projectid);
        $query = $this->db->get("project");
        $res   = $query->result_array();
        echo json_encode($res);
        // var_dump($res);
    }

    public function get_modal_costcode(){
      //$bd_tenid,$system
      $input = $this->input->post();
      //load modal
      $this->load->model('datastore_m');

      // $this->db->select("*");
      // $this->db->where("boq_item.boq_project",$input["bd_tenid"]);
      // $this->db->where("boq_item.boq_job",$input["system_code"]);
      // $query = $this->db->get("boq_item");
      // $res = $query->result_array();
      //echo "<pre>";
      //var_dump($res);

      
      //$data['id'] = $this->uri->segment(5);
      $data['res'] = $this->datastore_m->model_boqcostcode_m($input["bd_tenid"] ,$input["system_code"]);
      $data['ress'] = $this->datastore_m->model_boqcostcode_mm($input["bd_tenid"] ,$input["system_code"]);
      $data['row'] = $input["row"];
      $this->load->view('datastore/share/table_costcode_v',$data);
    }

    public function show_post_v(){
      $this->load->model('datastore_m');
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      if ($username=="") {
        redirect('/');
      }
      $userid = $session_data['m_id'];
      $data['name'] = $session_data['m_name'];
      $data['imgu'] = $session_data['img'];
      $data['glar'] = $this->datastore_m->get_postgl_m();
      $data['glap'] = $this->datastore_m->get_postgl_ap_m();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('office/account/gl/gl_main_v');
      $this->load->view('office/account/gl/gl_post/show_post_v');
      $this->load->view('navtail/base_master/footer_v');
    }

    public function load_view_v(){
      $code = $this->uri->segment(3);
      $this->load->model('datastore_m');
      $data['code'] = $code;
      $data['glar'] = $this->datastore_m->load_detail_m($code);
      $data['glap'] = $this->datastore_m->load_detail_ap_m($code);
      $data['sumar'] = $this->datastore_m->glar_sum_m($code);
      $data['sumap'] = $this->datastore_m->glap_sum_m($code);
      $this->load->view('office/account/gl/gl_post/load_view_v',$data);

    }

    public function jourvou()
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
        $this->load->model('gl_m');
      $data['book'] = $this->gl_m->book_v();
      $data['account'] = $this->gl_m->account_m();
      $data['proj'] = $this->gl_m->getproject();
      $data['system'] = $this->gl_m->system_m();
      $data['depart'] = $this->gl_m->department();
      $data['allcostcode'] = $this->gl_m->allcostcode();
      $data['vender'] = $this->gl_m->getvender();
      $data['customer'] = $this->gl_m->getmember();
      echo '<pre>';
      print_r($data);die();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('office/account/gl/gl_main_v');
      $this->load->view('office/account/gl/gl_transaction/jourvou_v');
      $this->load->view('base/footer_v');
    }
    
    public function other_module(){
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
      $this->load->view('office/account/gl/gl_transaction/other_module');
      $this->load->view('base/footer_v');
    }


    public function loadglpost(){
      $glyear = $this->uri->segment(3);
      $glperiod = $this->uri->segment(4);
       $this->load->model('gl_m');
      $data['vc'] = $this->gl_m->glvchno($glyear,$glperiod);
      $this->load->view('office/account/gl/gl_transaction/loadglpost',$data);
    }

    public function detail_loadglpost(){
      $id = $this->uri->segment(3);
      $type = $this->uri->segment(4);
      $this->load->model('gl_m');
      $data['vc'] = $this->gl_m->detail_glvchno($id,$type);
      $this->load->view('office/account/gl/gl_transaction/detail_loadglpost',$data);
    }
}
