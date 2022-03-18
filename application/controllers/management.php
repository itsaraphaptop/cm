<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class management extends CI_Controller {

          private $compcode;

          public function __construct() {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->model('manag_m');
            // $this->load->Model('auth_m');
            $this->load->model('count_m');
            $this->load->model('datastore_m');
            // $this->load->Model('bd_m');
            $this->load->helper('date');
            $this->load->helper('my_parse_num_helper');
           
        }
        public function index()
    {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        if ($username=="") {
          redirect('/');
        }
        $data['flagmodul'] = $this->uri->segment(3);
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
      $this->load->view('navtail/navtail_project_progress_v');
      $this->load->view('office/purchase/main/report_summary/report_all_wo_v');
      $this->load->view('base/footer_v');
    }

        public function main_index()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/main_index');
          $this->load->view('base/footer_v');
        }
        public function dash_projprogre()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['flagmodul'] = $this->uri->segment(3);
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
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('management/dash_project_progress_v');
          $this->load->view('base/footer_v');
        }

        public function cost_m()
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
          $data['po'] = $this->manag_m->cost_po();
          $data['sumee'] = $this->manag_m->cost_po_ee();
          $data['actual'] = $this->manag_m->actual_cost();
          $data['projectname'] = $this->manag_m->project_name();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('management/cost_managment_v');
          $this->load->view('base/footer_v');
        }
        public function pm_overview()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/pm_overview_v');
          $this->load->view('base/footer_v');
        }

        public function bycost_manage()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data["compcode"] = $session_data['compcode'];
          $projcode = $this->uri->segment(3);
          $data['res'] = $this->manag_m->getproj($projcode,$compcode);
          $data['costtype'] = $this->manag_m->getcostcode($compcode);
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
          $this->load->view('management/by_cost_management_v');
          $this->load->view('base/footer_v');
        }
        public function bymat_manage()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data["compcode"] = $session_data['compcode'];
          $projcode = $this->uri->segment(3);
          $data['proj'] = $this->uri->segment(4);
          $data['res'] = $this->manag_m->getproj($projcode,$compcode);
          // $data['costtype'] = $this->manag_m->getcostcode($compcode);
          $data['matc'] = $this->manag_m->getmatcode();
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
          $this->load->view('management/material_management_v');
          $this->load->view('base/footer_v');
        }
        public function testdata()
        {
          $id = $this->uri->segment(3);
            $q = $this->manag_m->testdata();
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));

        }
        public function projonline()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('management/project_online_v');
          $this->load->view('base/footer_v');
        }
        public function pettycash_report()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('management/pettycash_report_v');
          $this->load->view('navtail/base_master/footer_v');
        }
        public function pettycash_report_cri()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $val1 = $this->uri->segment(3);
          $val2 = $this->uri->segment(4);
          $val3 = $this->uri->segment(5);
          $this->load->view('management/pettycash_report_v');
        }
        public function pettycash_report_group()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ap_v');
          $this->load->view('management/pettycash_report_group_v');
          $this->load->view('navtail/base_master/footer_v');
        }
        public function open()
        {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            if ($username=="") {
              redirect('/');
            }

            $userid = $session_data['m_id'];
            $da['name'] = $session_data['m_name'];
            $da['dep'] = $session_data['m_dep'];
            $projectid = $session_data['projectid'];
            $da['project'] = $session_data['m_project'];
            $da['imgu'] = $session_data['img'];
            $da['compimg'] = $this->manag_m->companyimg();
            $this->load->view('navtail/base_master/header_v',$da);
            $this->load->view('navtail/base_master/tail_v');
            // if ($projectid=="") {
            //     $res['getdep'] = $this->datastore_m->department();
            //     $this->load->view('office/inventory/po_receive/open_department_v',$res);
            // }else{
                $res['getproj'] = $this->manag_m->getproject_user($userid,$projectid);
                $this->load->view('management/open_project_v',$res);
            // }
            $this->load->view('base/footer_v');
        }

        public function project_timeline()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['name'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $datata['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['projid'] = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }else {
            $this->load->view('navtail/base_angular/header_v',$data);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('management/meka_project_timeline_v');
            $this->load->view('navtail/base_angular/base_js_v',$data);
            $this->load->view('navtail/base_master/footer_v');
          }
        }

         public function project_status_overview()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();

          $data['pj'] = $this->manag_m->project_mm($compcode); //โปรเจ็ค 
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_status_overview');
          $this->load->view('base/footer_v');
        }
        public function project_status_overview_all()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
           $data['powait'] = $this->count_m->powait($compcode);
          $projectcode = $this->uri->segment(3);
          $projecid = $this->uri->segment(4);
          $getproj = $this->manag_m->getproj_select($projectcode,$compcode,$projecid);
          $sum = 0;
          $sumsub = 0;
          foreach ($getproj as $key => $value) {
            $data['projeid'] = $value->project_id;
            $data['projectcode'] = $value->project_code;
           $data['project_name'] = $value->project_name;
           $data['project_value'] = $value->project_value;
           $data['aggregate'] = $sum+=$value->project_value;
           $data['project_sub'] = $value->project_sub;
          
           if($value->project_sub=='no')
            {
              $data['projedid'] = $projecid;
              $data['projedcode'] = $projectcode;
              $data['project_mainname'] =  $data['project_name'];
              $data['project_mainvalue'] =  $data['project_value'];
              $data['project_sumsubvalue'] = 0;
            }else{
            $data['project_subname'] =  $data['project_name'];
            $data['project_subvalue'] =  $data['project_value'];
            $data['project_sumsubvalue'] = $sumsub+=$data['project_value'];
            }
          }
          
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_status_overview_all_v');
          $this->load->view('base/footer_v');
        }

         public function project_status_overview_old()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();

          $data['pj'] = $this->manag_m->project_mm(); //โปรเจ็ค 
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_status_overview_v_old');
          $this->load->view('base/footer_v');
        }

        public function project_overview_by_project()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
           $data['powait'] = $this->count_m->powait($compcode);
          $projectcode = $this->uri->segment(3);
          $projecid = $this->uri->segment(4);
          $getproj = $this->manag_m->getproj_select($projectcode,$compcode,$projecid);
          $sum = 0;
          $sumsub = 0;
          foreach ($getproj as $key => $value) {
            $data['projeid'] = $value->project_id;
            $data['projectcode'] = $value->project_code;
           $data['project_name'] = $value->project_name;
           $data['project_value'] = $value->project_value;
           $data['aggregate'] = $sum+=$value->project_value;
           $data['project_sub'] = $value->project_sub;
           
           if($value->project_sub=='no')
            {
              $data['projedid'] = $projecid;
              $data['projedcode'] = $projectcode;
              $data['project_mainname'] =  $data['project_name'];
              $data['project_mainvalue'] =  $data['project_value'];
              $data['project_sumsubvalue'] = 0;
            }else{
            $data['project_subname'] =  $data['project_name'];
            $data['project_subvalue'] =  $data['project_value'];
            $data['project_sumsubvalue'] = $sumsub+=$data['project_value'];
            }
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_status_overview_by_project_v');
          $this->load->view('base/footer_v');
        }
        public function project_overview_by_project_sub()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
           $data['powait'] = $this->count_m->powait($compcode);
          $projectcode = $this->uri->segment(3);
          $projecid = $this->uri->segment(4);
          $getproj = $this->manag_m->getproj_selectsub($projectcode,$compcode,$projecid);
          $sum = 0;
          $sumsub = 0;
          foreach ($getproj as $key => $value) {
            $data['projeid'] = $value->project_id;
            $data['projectcode'] = $value->project_code;
           $data['project_name'] = $value->project_name;
           $data['project_value'] = $value->project_value;
           $data['aggregate'] = $sum+=$value->project_value;
           $data['project_sub'] = $value->project_sub;
           if($value->project_sub!='no')
            {
              $data['project_subname'] =  $data['project_name'];
              $data['project_subvalue'] =  $data['project_value'];
              $data['project_sumsubvalue'] = $sumsub+=$value->project_value;
            }else{
              $data['projedid'] = $projecid;
              $data['projedcode'] = $projectcode;
              $data['project_mainname'] =  $data['project_name'];
              $data['project_mainvalue'] =  $data['project_value'];
              $data['project_sumsubvalue'] = 0;
            }
          }
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_status_overview_by_project_sub_v');
          $this->load->view('base/footer_v');
        }
        public function load_dashboard_overview(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['projeid'] = $this->uri->segment(3);
          $data['projectcode'] = $this->uri->segment(4);

          $data['ponetamt'] = $this->manag_m->sumpo_by_project($data['projeid'],$compcode);
          $data['po_receive'] = $this->manag_m->sumpo_po_receipt_by_project($data['projeid'],$compcode);
          $data['po_actual'] = $this->manag_m->sumpo_actual_by_project($data['projeid'],$compcode);
          $data['pr_open'] = $this->manag_m->countprbyproj($data['projeid'],$compcode);
          $data['pr_pending'] = $this->manag_m->countprpendingbyproj($data['projeid'],$compcode);
          $data['pr_approve'] = $this->manag_m->countprapprovebyproj($data['projeid'],$compcode);
          $data['po_open'] = $this->manag_m->countpobyproj($data['projeid'],$compcode);
          $data['po_receive_orders'] = $this->manag_m->countporeceiptbyproj($data['projeid'],$compcode);
          $data['expense_total'] = $this->manag_m->countexpensebyproj($data['projeid'],$compcode);
          $data['count_lo_open'] = $this->manag_m->count_lo_open($data['projeid'],$compcode);
          $data['count_aps_payment'] = $this->manag_m->count_aps_payment($data['projeid'],$compcode);
          $this->load->view('management/data/load_dashbord_overview_v',$data);
        }
        public function load_dashboard_overview_sub(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['projeid'] = $this->uri->segment(3);
          $data['projectcode'] = $this->uri->segment(4);

          $data['ponetamt'] = $this->manag_m->sumpo_by_project_sub($data['projeid'],$compcode);
          $data['po_receive'] = $this->manag_m->sumpo_po_receipt_by_project_sub($data['projeid'],$compcode);
          $data['po_actual'] = $this->manag_m->sumpo_actual_by_project_sub($data['projeid'],$compcode);
          $data['pr_open'] = $this->manag_m->countprbyproj_sub($data['projeid'],$compcode);
          $data['pr_pending'] = $this->manag_m->countprpendingbyproj_sub($data['projeid'],$compcode);
          $data['pr_approve'] = $this->manag_m->countprapprovebyproj_sub($data['projeid'],$compcode);
          $data['po_open'] = $this->manag_m->countpobyproj_sub($data['projeid'],$compcode);
          $data['po_receive_orders'] = $this->manag_m->countporeceiptbyproj_sub($data['projeid'],$compcode);
          $data['expense_total'] = $this->manag_m->countexpensebyproj_sub($data['projeid'],$compcode);
          $data['count_lo_open'] = $this->manag_m->count_lo_open_sub($data['projeid'],$compcode);
          $data['count_aps_payment'] = $this->manag_m->count_aps_payment_sub($data['projeid'],$compcode);
          $this->load->view('management/data/load_dashbord_overview_sub_v',$data);
        }
        public function load_dashboard_overview_all(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['projeid'] = $this->uri->segment(3);
          $data['projectcode'] = $this->uri->segment(4);

          $data['ponetamt'] = $this->manag_m->sumpo_by_project_all($data['projeid'],$compcode);
          $data['po_receive'] = $this->manag_m->sumpo_po_receipt_by_project_all($data['projeid'],$compcode);
          $data['po_actual'] = $this->manag_m->sumpo_actual_by_project_all($data['projeid'],$compcode);
          $data['pr_open'] = $this->manag_m->countprbyproj_all($data['projeid'],$compcode);
          $data['pr_pending'] = $this->manag_m->countprpendingbyproj_all($data['projeid'],$compcode);
          $data['pr_approve'] = $this->manag_m->countprapprovebyproj_all($data['projeid'],$compcode);
          $data['po_open'] = $this->manag_m->countpobyproj_all($data['projeid'],$compcode);
          $data['po_receive_orders'] = $this->manag_m->countporeceiptbyproj_all($data['projeid'],$compcode);
          $data['expense_total'] = $this->manag_m->countexpensebyproj_all($data['projeid'],$compcode);
          $data['count_lo_open'] = $this->manag_m->count_lo_open_all($data['projeid'],$compcode);
          $data['count_aps_payment'] = $this->manag_m->count_aps_payment_all($data['projeid'],$compcode);
          $this->load->view('management/data/load_dashbord_overview_all_v',$data);
        }
        public function load_forcash_budget(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['compcode'] = $session_data['compcode'];
          $data['projeid'] = $this->uri->segment(3);
          $this->load->view('management/data/load_forcash_budget_v',$data);
        }
        public function load_forcash_contact(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['compcode'] = $session_data['compcode'];
          $data['projeid'] = $this->uri->segment(3);
          $this->load->view('management/data/load_forcash_contact_v',$data);
        }
        public function load_forcash_contact_sub(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['compcode'] = $session_data['compcode'];
          $data['projeid'] = $this->uri->segment(3);
          $this->load->view('management/data/load_forcash_contact_sub_v',$data);
        }
        public function test(){
          
            $this->load->view('test/testin_v');
          }
          
         public function mange_json()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->lll($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
          }
         public function mange_json_sub()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->lll_sub($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
          }
         public function mange_json_all()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->lll_all($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
          }
          // forcash contact
          public function contactforcashsub()
          {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
            $q = $this->manag_m->contactforcashsub($pp,$compcode);
            
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
          }
          public function contactforcash()
          {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
            $q = $this->manag_m->contactforcash($pp,$compcode);
            
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
          }
          public function contactforcashupdate()
          {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $json = $this->input->post('models');
            $json = stripslashes($json);
            $json = json_decode($json);
            foreach ($json as $key => $value) {
              $id = $value->id;
              $project_id = $value->project_id;
              $month_year = date('Y-m-d',strtotime($value->month_year));
              $price = $value->price;
              $budget = $value->budget;
            }
            $data = array(
              'project_id' => $project_id,
              'month_year' => $month_year,
              'price' => $price,
              'budget' => $budget,
              'editdate' => date('Y-m-d H:i:s'),
              'useredit' => $username,
            );
            $this->db->where('id',$id);
          $this->db->update('pm_forcash',$data);

               $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($json));
          }
          public function contactforcashCreate()
          {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $json = $this->input->post('models');
            $json = stripslashes($json);
            $json = json_decode($json);
            foreach ($json as $key => $value) {
              $project_id = $value->project_id;
              $month_year = date('Y-m-d',strtotime($value->month_year));
              $price = $value->price;
              $budget = $value->budget;
            }
            $data = array(
              'project_id' => $this->uri->segment(3),
              'month_year' => $month_year,
              'price' => $price,
              'budget' => $budget,
              'forctype' => $this->uri->segment(4),
              'status' => "active",
              'useradd' => $username,
              'compcode' => $compcode,
              'createdate' => date('Y-m-d H:i:s'),
            );
          $this->db->insert('pm_forcash',$data);

               $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($json));

          }
          public function contactforcashDestroy()
          {
             $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $json = $this->input->post('models');
            $json = stripslashes($json);
            $json = json_decode($json);
            foreach ($json as $key => $value) {
              $id = $value->id;
              $project_id = $value->project_id;
            }
            $data = array(
              'status' => "del",
              'deldate' => date('Y-m-d H:i:s'),
              'userdel' => $username,
            );
            $this->db->where('id',$id);
          $this->db->update('pm_forcash',$data);
             $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($json));
          }

          //  end forcash contact

          //   forcash budget
          public function budgetforcash()
          {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
             $q = $this->manag_m->budgetforcash($pp,$compcode);
            // $q =  $this->db->query("select * from pm_forcash where project_id='$pp' and status='active' and forctype='budget'")->result();
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
          }

          public function budgetforcashCreate()
          {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $compcode = $session_data['compcode'];
            $json = $this->input->post('models');
            $json = stripslashes($json);
            $json = json_decode($json);
            foreach ($json as $key => $value) {
              $project_id = $value->project_id;
              $month_year = date('Y-m-d',strtotime($value->month_year));
              $price = $value->price;
            }
            $data = array(
              'project_id' => $this->uri->segment(3),
              'month_year' => $month_year,
              'price' => $price,
              'forctype' => 'budget',
              'status' => "active",
              'useradd' => $username,
              'compcode' => $compcode,
              'createdate' => date('Y-m-d H:i:s'),
            );
          $this->db->insert('pm_forcash',$data);

               $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($json));

          }
          public function budgetforcashDestroy()
          {
             $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $json = $this->input->post('models');
            $json = stripslashes($json);
            $json = json_decode($json);
            foreach ($json as $key => $value) {
              $id = $value->id;
              $project_id = $value->project_id;
              $month_year = date('Y-m-d',strtotime($value->month_year));
              $price = $value->price;
            }
            $data = array(
              'status' => "del",
              'deldate' => date('Y-m-d H:i:s'),
              'userdel' => $username,
            );
            $this->db->where('id',$id);
          $this->db->update('pm_forcash',$data);
             $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($json));
          }

          public function budgetforcashupdate()
          {
            $session_data = $this->session->userdata('sessed_in');
            $username = $session_data['username'];
            $json = $this->input->post('models');
            $json = stripslashes($json);
            $json = json_decode($json);
            foreach ($json as $key => $value) {
              $id = $value->id;
              $project_id = $value->project_id;
              $month_year = date('Y-m-d',strtotime($value->month_year));
              $price = $value->price;
            }
            $data = array(
              'month_year' => $month_year,
              'price' => $price,
              'editdate' => date('Y-m-d H:i:s'),
              'useredit' => $username,
            );
            $this->db->where('id',$id);
          $this->db->update('pm_forcash',$data);

               $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($json));
          }
          //  end forcash budget
          //  
            public function chart_sclove()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->chart_sclove($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
           
              // echo $pp;
          }
          public function aa()
          {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
            $c = $this->manag_m->sclove_purchase_cost($pp,$compcode);
            $sum = 0;
            foreach ($c as $key => $value) {
              
              $data[] = array(
                'month_yearp' => date( 'm',  strtotime($value->po_podate))."-".date( 'Y',  strtotime($value->po_podate)),
                'poi_amount' => $value->poi_amount,
                'ss' => $sum+=$value->poi_amount
              );
            }
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
          }
          public function chart_sclove_test()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
            $pc = $this->uri->segment(4);
           
             $sumconsub = 0;
              $csub = $this->manag_m->chart_sclovecontact_sub($pp,$compcode);
              foreach ($csub as $key => $value) {
                $data[] = array(
                     'month_yearsub' => date( 'm',  strtotime($value->month_year))."-".date( 'Y',  strtotime($value->month_year)),
                     'price' => $value->price,
                     'priceconsub' => $sumconsub+=$value->price
                   );
             }
             $sumcontact = 0;
              $c = $this->manag_m->chart_sclovecontact($pp,$compcode);
              foreach ($c as $key => $value) {
                $data[] = array(
                     'month_year' => date( 'm',  strtotime($value->month_year))."-".date( 'Y',  strtotime($value->month_year)),
                     'price' => $value->price,
                     'pricecon' => $sumcontact+=$value->price
                   );
             }
             $sumcontactall = 0;
             $call = $this->manag_m->chart_sclovecontact_all($pp,$compcode);
             foreach ($call as $key => $value) {
               $data[] = array(
                    'month_yearall' => date( 'm',  strtotime($value->month_year))."-".date( 'Y',  strtotime($value->month_year)),
                    'price' => $value->price,
                    'priceconall' => $sumcontactall+=$value->price
                  );
            }
             $sumbud = 0;
             $b = $this->manag_m->chart_sclovecontact($pp,$compcode);
             foreach ($b as $key => $value) {
               $data[] = array(
                    'month_yearb' => date( 'm',  strtotime($value->month_year))."-".date( 'Y',  strtotime($value->month_year)),
                    'priceb' => $value->budget,
                    'priceebud' => $sumbud+=$value->budget
                    // 'Budget' => "budget"
                  );
            }
             $sumbudall = 0;
             $ball = $this->manag_m->chart_sclovecontact_all($pp,$compcode);
             foreach ($ball as $key => $value) {
               $data[] = array(
                    'month_yearball' => date( 'm',  strtotime($value->month_year))."-".date( 'Y',  strtotime($value->month_year)),
                    'priceball' => $value->budget,
                    'priceebudall' => $sumbudall+=$value->budget
                    // 'Budget' => "budget"
                  );
            }
             $sumbudsub = 0;
             $bsub = $this->manag_m->chart_sclovecontact_sub($pp,$compcode);
             foreach ($bsub as $key => $value) {
               $data[] = array(
                    'month_yearbsub' => date( 'm',  strtotime($value->month_year))."-".date( 'Y',  strtotime($value->month_year)),
                    'pricebsub' => $value->budget,
                    'priceebudsub' => $sumbudsub+=$value->budget
                    // 'Budget' => "budget"
                  );
            }
            $po = $this->manag_m->sclove_purchase_cost($pp,$compcode);
            $sum = 0;
            foreach ($po as $key => $value) {
              $data[] = array(
                'month_yearpo' => date( 'm',  strtotime($value->po_podate))."-".date( 'Y',  strtotime($value->po_podate)),
                'po' => $value->poi_amount,
                'poi_amount' => $sum+=$value->poi_amount
              );
            }
            $casub = $this->manag_m->sclove_purchase_cost_sub($pp,$compcode);
            $sumposub = 0;
            foreach ($casub as $key => $value) {
              $data[] = array(
                'month_yearpsub' => date( 'm',  strtotime($value->po_podate))."-".date( 'Y',  strtotime($value->po_podate)),
                'posub' => $value->poi_amount,
                'poi_amountsub' => $sumposub+=$value->poi_amount
              );
            }
            $call = $this->manag_m->sclove_purchase_cost_all($pp,$compcode);
            $sumpoall = 0;
            foreach ($call as $key => $value) {
              $data[] = array(
                'month_yearpapp' => date( 'm',  strtotime($value->po_podate))."-".date( 'Y',  strtotime($value->po_podate)),
                'poall' => $value->poi_amount,
                'poi_amountapll' => $sumpoall+=$value->poi_amount
              );
            }
            $sumloall = 0;
            $wocost = $this->manag_m->sclove_work_order_cost_all($pp,$compcode);
            foreach ($wocost as $key => $value) {
              $data[] = array(
                'month_yearwo' => date( 'm',  strtotime($value->lodate))."-".date( 'Y',  strtotime($value->lodate)),
                'woall' => $value->contactamount,
                'lo_amointapll' => $sumpoall+=$value->contactamount
              );
            }
            $suminv = 0;
            $inv = $this->manag_m->sclove_invoice($pp,$compcode);
            foreach ($inv as $key => $value) {
              $data[] = array(
                'month_yearin' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                'amo' => $value->amount,
                'inprogamount' => $suminv+=$value->amount
              );
            }
            $suminvall = 0;
            // $invall = $this->datastore_m->sclove_invoice_all($pp,$compcode);
            $where_p = "(`ar_account_header`.`acc_project` = '$pp')";
            $this->db->select('ar_account_header.acc_invdate as date,ar_account_header.acc_cusamt as amount');
            $this->db->from('ar_account_header');
            $this->db->join('project','project.project_id = ar_account_header.acc_project');
            $this->db->where($where_p);
            // $this->db->where('ar_account_header.acc_invtype','progress');
            $this->db->where('ar_account_header.compcode',$compcode);
            $this->db->group_by('period,year');
            $this->db->order_by('ar_account_header.acc_invdate','asc');
            $invall = $this->db->get()->result();
            // return $po;
            foreach ($invall as $key => $value) {
              $data[] = array(
                'month_yearinall' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                'amoall' => $value->amount,
                'inprogamountall' => $suminvall+=$value->amount
              );
            }
            $suminvsub = 0;
            $invsub = $this->manag_m->sclove_invoice_sub($pp,$compcode);
            foreach ($invsub as $key => $value) {
              $data[] = array(
                'month_yearinsub' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                'amosub' => $value->amount,
                'inprogamountsub' => $suminvsub+=$value->amount
              );
            }
            $sumcl = 0;
            $cl = $this->manag_m->sclove_income($pp,$compcode);
            foreach ($cl as $key => $value) {
              $data[] = array(
                'month_yearacl' => date( 'm',  strtotime($value->cl_billdate))."-".date( 'Y',  strtotime($value->cl_billdate)),
                'cl_invamt' => $value->cl_invamt,
                'cl_invamtamount' => $sumcl+=$value->cl_invamt
              );
            }
            $sumclall = 0;
            // $clall = $this->manag_m->sclove_income_all($pp,$compcode);
            $where_pin = "(`cl_project` = '$pp')";
          $this->db->select('cl_billdate,cl_invamt');
          $this->db->join('project','project.project_id = ar_clear_header.cl_project');
          $this->db->where($where_pin);
          $this->db->where('ar_clear_header.compcode',$compcode);
          $this->db->order_by('cl_billdate','asc');
          $clall = $this->db->get('ar_clear_header')->result();
            foreach ($clall as $key => $value) {
              $data[] = array(
                'month_yearaclall' => date( 'm',  strtotime($value->cl_billdate))."-".date( 'Y',  strtotime($value->cl_billdate)),
                'cl_invamtall' => $value->cl_invamt,
                'cl_invamtamountall' => $sumclall+=$value->cl_invamt
              );
            }
            $sumclsub = 0;
            $clsub = $this->manag_m->sclove_income_sub($pp,$compcode);
            foreach ($clsub as $key => $value) {
              $data[] = array(
                'month_yearaclsub' => date( 'm',  strtotime($value->cl_billdate))."-".date( 'Y',  strtotime($value->cl_billdate)),
                'cl_invamtsub' => $value->cl_invamt,
                'cl_invamtamountsub' => $sumclsub+=$value->cl_invamt
              );
            }
            $apv = $this->manag_m->sclove_actualapv($pp,$compcode);
            $aps = $this->manag_m->sclove_actualaps($pp,$compcode);
            $apo = $this->manag_m->sclove_actualapo($pp,$compcode);
            $sumap = 0;
            foreach ($apv as $key => $value) {
              $data[] = array(
                'month_yearap' => date( 'm',  strtotime($value->apv_date))."-".date( 'Y',  strtotime($value->apv_date)),
                'ap_amount' => $value->apvi_amount,
                'apvamount' => $sumap+=$value->apvi_amount
              );
            }
            foreach ($aps as $key => $value) {
              $data[] = array(
                'month_yearap' => date( 'm',  strtotime($value->ap_date))."-".date( 'Y',  strtotime($value->ap_date)),
                'ap_amount' => $value->apsi_amount,
                'apvamount' => $sumap+=$value->apsi_amount
              );
            }
            foreach ($apo as $key => $value) {
              $data[] = array(
                'month_yearap' => date( 'm',  strtotime($value->doc_date))."-".date( 'Y',  strtotime($value->doc_date)),
                'ap_amount' => $value->ex_amt,
                'apvamount' => $sumap+=$value->ex_amt
              );
            }
            $sumprog = 0;
            $prog = $this->manag_m->sclove_progress($pc,$compcode);
            foreach ($prog as $key => $value) {
              $data[] = array(
                'month_yearaprog' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                'amount_submit' => floatval ($value->amount_certificate),
                'amount_submitsum' => $sumprog+=floatval ($value->amount_certificate)
              );
            }

            $apvall = $this->manag_m->sclove_actualapv_all($pp,$compcode);
            $apsall = $this->manag_m->sclove_actualaps_all($pp,$compcode);
            $apoall = $this->manag_m->sclove_actualapo_all($pp,$compcode);
            $sumapall = 0;
            foreach ($apvall as $key => $value) {
              $data[] = array(
                'month_yearapall' => date( 'm',  strtotime($value->apv_date))."-".date( 'Y',  strtotime($value->apv_date)),
                'ap_amountall' => $value->apvi_amount,
                'apvamountall' => $sumapall+=$value->apvi_amount
              );
            }
            foreach ($apsall as $key => $value) {
              $data[] = array(
                'month_yearapall' => date( 'm',  strtotime($value->ap_date))."-".date( 'Y',  strtotime($value->ap_date)),
                'ap_amountall' => $value->apsi_amount,
                'apvamountall' => $sumapall+=$value->apsi_amount
              );
            }
            foreach ($apoall as $key => $value) {
              $data[] = array(
                'month_yearapall' => date( 'm',  strtotime($value->doc_date))."-".date( 'Y',  strtotime($value->doc_date)),
                'ap_amountall' => $value->ex_amt,
                'apvamountall' => $sumapall+=$value->ex_amt
              );
            }
            $sumprog = 0;
            $prog = $this->manag_m->sclove_progress($pc,$compcode);
            foreach ($prog as $key => $value) {
              $data[] = array(
                'month_yearaprog' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                'amount_submit' => floatval($value->amount_certificate),
                'amount_submitsum' => $sumprog+=floatval($value->amount_certificate)
              );
            }



            $apvsub = $this->manag_m->sclove_actualapv_sub($pp,$compcode);
            $apssub = $this->manag_m->sclove_actualaps_sub($pp,$compcode);
            $aposub = $this->manag_m->sclove_actualapo_sub($pp,$compcode);
            $sumapsub = 0;
            foreach ($apvsub as $key => $value) {
              $data[] = array(
                'month_yearapsub' => date( 'm',  strtotime($value->apv_date))."-".date( 'Y',  strtotime($value->apv_date)),
                'ap_amountsub' => $value->apvi_amount,
                'apvamountdub' => $sumapsub+=$value->apvi_amount
              );
            }
            foreach ($apssub as $key => $value) {
              $data[] = array(
                'month_yearapsub' => date( 'm',  strtotime($value->ap_date))."-".date( 'Y',  strtotime($value->ap_date)),
                'ap_amountsub' => $value->apsi_amount,
                'apvamountdub' => $sumapsub+=$value->apsi_amount
              );
            }
            foreach ($aposub as $key => $value) {
              $data[] = array(
                'month_yearapsub' => date( 'm',  strtotime($value->doc_date))."-".date( 'Y',  strtotime($value->doc_date)),
                'ap_amountsub' => $value->ex_amt,
                'apvamountdub' => $sumapsub+=$value->ex_amt
              );
            }







            $sumprogsub = 0;
            $progsub = $this->manag_m->sclove_progress_sub($pc,$compcode,$pp);
            foreach ($progsub as $key => $value) {
              $data[] = array(
                'month_yearaprogsub' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                'amount_submitsub' => $value->amount_certificate,
                'amount_submitsumsub' => $sumprogsub+=$value->amount_certificate
              );
            }
            $sumprogall = 0;
            $progall = $this->manag_m->sclove_progress_all($pc,$compcode,$pp);
            foreach ($progall as $key => $value) {
              $data[] = array(
                'month_yearaprogall' => date( 'm',  strtotime($value->date))."-".date( 'Y',  strtotime($value->date)),
                // 'amount_submitall' => $value->amount_submit,
                'amount_submitall' => floatval($value->amount_certificate),
                // 'amount_submitsumall' => $sumprogall+=$value->amount_submit
                'amount_submitsumall' => $sumprogall+=floatval($value->amount_certificate)
              );
            }

              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($data));
           
              // echo $pp;
          }

          public function testap()
          {
            $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
            $c = $this->manag_m->sclove_actualapv($pp,$compcode);
            $s = $this->manag_m->sclove_actualaps($pp,$compcode);
            $o = $this->manag_m->sclove_actualapo($pp,$compcode);
            
            $sumap = 0;
            foreach ($c as $key => $value) {
              $data[] = array(
                'month_yearap' => date( 'm',  strtotime($value->apv_date))."-".date( 'Y',  strtotime($value->apv_date)),
                'ap_amount' => $value->apvi_amount,
                'apvamount' => $sumap+=$value->apvi_amount
              );
            }
            foreach ($s as $key => $value) {
              $data[] = array(
                'month_yearap' => date( 'm',  strtotime($value->ap_date))."-".date( 'Y',  strtotime($value->ap_date)),
                'ap_amount' => $value->apsi_amount,
                'apvamount' => $sumap+=$value->apsi_amount
              );
            }
            foreach ($o as $key => $value) {
              $data[] = array(
                'month_yearap' => date( 'm',  strtotime($value->doc_date))."-".date( 'Y',  strtotime($value->doc_date)),
                'ap_amount' => $value->ex_amt,
                'apvamount' => $sumap+=$value->ex_amt
              );
            }

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
          }

          public function count_lo_open()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->count_lo_open_chart($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
           
              // echo $pp;
          }
          public function count_lo_open_sub()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->count_lo_open_chart_sub($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
           
              // echo $pp;
          }
          public function count_lo_open_all()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->input->post('projecid');
              $q = $this->manag_m->count_lo_open_chart_all($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
           
              // echo $pp;
          }
          public function count_lo_open_test()
          {
             $session_data = $this->session->userdata('sessed_in');
            $compcode = $session_data['compcode'];
            $pp =  $this->uri->segment(3);
              $q = $this->manag_m->count_lo_open_chart($pp,$compcode);
              $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode($q));
              
              // echo $pp;
          }
         public function project_cashflow_account(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }

          $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('master_cf_head');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $apscode = "CF".date($datestring).date($mm)."000"."1";
                $aps_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id_df','desc');
               $this->db->limit('1');
               $q = $this->db->get('master_cf_head');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_df+1;
               }

               if ($x1<=9) {
                  $apscode = "CF".date($datestring).date($mm)."000".$x1;
                  $aps_item = $x1;
               }
               elseif ($x1<=99) {
                 $apscode = "CF".date($datestring).date($mm)."00".$x1;
                 $aps_item = $x1;
               }
               elseif ($x1<=999) {
                 $apscode = "CF".date($datestring).date($mm)."0".$x1;
                 $aps_item = $x1;
               }
             }
             // add headeer

            
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          $data['data_master'] = $this->manag_m->getdatamaster();
          $data['master_id'] = $apscode;
          // $data['inv'] = $this->count_m->countinv($compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_cashflow_account');
          $this->load->view('base/footer_v');
          
        
      }


        public function project_cashflow_cash()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }

          $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('master_cf_head');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $apscode = "CF".date($datestring).date($mm)."000"."1";
                $aps_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id_df','desc');
               $this->db->limit('1');
               $q = $this->db->get('master_cf_head');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_df+1;
               }

               if ($x1<=9) {
                  $apscode = "CF".date($datestring).date($mm)."000".$x1;
                  $aps_item = $x1;
               }
               elseif ($x1<=99) {
                 $apscode = "CF".date($datestring).date($mm)."00".$x1;
                 $aps_item = $x1;
               }
               elseif ($x1<=999) {
                 $apscode = "CF".date($datestring).date($mm)."0".$x1;
                 $aps_item = $x1;
               }
             }
             // add headeer
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          $data['data_master'] = $this->manag_m->getdatamaster();
          $data['master_id'] = $apscode;
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_cashflow_cash');
          $this->load->view('base/footer_v');
        }


     public function project_inventory()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          $data['project'] = $this->manag_m->getdata_project();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_inventory');
          $this->load->view('base/footer_v');
        }


     public function project_billing()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/project_billing');
          $this->load->view('base/footer_v');
        }


     public function back_management()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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

          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/back_management');
          $this->load->view('base/footer_v');
        }


     public function office_management()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/office_management');
          $this->load->view('base/footer_v');
        }


     public function real_management()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/real_management');
          $this->load->view('base/footer_v');
        }

     public function material_price()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/material_price');
          $this->load->view('base/footer_v');
        }

        
  public function approve_pbg()
        {
           $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $project_code = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $project_id = $this->uri->segment(4);
          $data['id_project'] = $project_id;
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $tender_id = $this->manag_m->get_bd_tender($project_code);
          // var_dump($tender_id[0]['bd_tenid']);die();
          // $data['budget_cost'] = $this->manag_m->get_boqitem($tender_id[0]['bd_tenid']);
          $data['data'] = $this->manag_m->get_detail_boq($tender_id[0]['bd_tenid']);
          //ดึง coust_name
          $data['cost_name'] = $this->manag_m->get_costname();
          //ดึง coust_name
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $data['boq_cost_type1'] = $this->manag_m->boq_cost_type1($tender_id[0]['bd_tenid']);
          // $data['boq_cost_type2'] = $this->manag_m->boq_cost_type2($tender_id[0]['bd_tenid']);
          $data['compcode'] = $session_data['compcode'];
          $data['project_code'] = $project_code;
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/approve_pbg');
          $this->load->view('base/footer_v');
        }

          public function forcast()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $project_code = $this->uri->segment(3);
          $tender_id = $this->manag_m->get_bd_tender($project_code);
          $data['boq_cost_type1'] = $this->manag_m->boq_cost_type1($tender_id[0]['bd_tenid']);
          $data['boq_cost_type2'] = $this->manag_m->boq_cost_type2($tender_id[0]['bd_tenid']);

          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/forcast');
          $this->load->view('base/footer_v');
        }


        public function project_budget()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/projectbutget');
          $this->load->view('base/footer_v');
        }

        public function approveproject_budget()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/approve_budget');
          $this->load->view('base/footer_v');
        }

                        public function forcasrselect()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/forcasrselect');
          $this->load->view('base/footer_v');
        }


   public function project_budget2()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $project_code = $this->uri->segment(3);
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $project_id = $this->uri->segment(4);
          $data['id_project'] = $project_id;
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $tender_id = $this->manag_m->get_bd_tender($project_code);
          // var_dump($tender_id[0]['bd_tenid']);die();
          $data['tender_id'] = $tender_id[0]['bd_tenid'];

          // $data['budget_cost'] = $this->manag_m->get_boqitem($tender_id[0]['bd_tenid']);
          $data['data'] = $this->manag_m->get_detail_boq($tender_id[0]['bd_tenid']);
          $data['cost_type'] = $this->manag_m->get_cost_type();
          //ดึง coust_name
          $data['cost_name'] = $this->manag_m->get_costname();
          //ดึง coust_name

          // // echo $lenght = count($data['budget_cost']);
          $data['getproj'] = $this->manag_m->getprojectpett();;
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);

          $data['boq_cost_type1'] = $this->manag_m->boq_cost_type1($tender_id[0]['bd_tenid']);
          // $data['boq_cost_type2'] = $this->manag_m->boq_cost_type2($tender_id[0]['bd_tenid']);
          $data['compcode'] = $session_data['compcode'];
          $data['project_code'] = $project_code;

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/project_budget', $data);
          $this->load->view('base/footer_v');
        }


public function ProjectForecastIncome()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/ProjectForecastIncome');
          $this->load->view('base/footer_v');
        }

        public function ProgressSubmit()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          $data['c'] = $this->manag_m->currency();
          $data['flagmodul'] = $this->uri->segment(3);
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('management/data/progress_submit');
          $this->load->view('base/footer_v');
        }
        public function ProgressSubmitEdit()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          $data['c'] = $this->manag_m->currency();
          $data['code'] = $this->uri->segment(3);
          $data['flagmodul'] = $this->uri->segment(4);
          $data['res'] = $this->manag_m->getprojectprogress($data['code']);
          // echo $data['code'];
          $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('management/data/progress_submit_edit');
          $this->load->view('base/footer_v');
        }
        public function ProgressArchive(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username == "") {
            redirect('/');
          }
          $data['flagmodul'] = $this->uri->segment(3);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $projid = $session_data['projectid'];
          $userid = $session_data['m_id'];
          $projectid = $session_data['projectid'];
          $data['imgu'] = $session_data['img'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $data['getproj'] = $this->manag_m->getproject_user($userid, $projectid,$compcode);
          if ($data['pr_project_right'] == 'true') {
            $data['getdep'] = $this->manag_m->getdepartment();
          } else {
            $data['getdep'] = $this->manag_m->getdepart_user($userid,$compcode);
          }
          $this->load->view('navtail/base_master/header_v', $data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('office/contract/open_progress_archive_v');
          $this->load->view('base/footer_v');
        }
        public function archive_project_progress(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username == "") {
            redirect('/');
          }
          $data['pjid'] = $this->uri->segment(3);
          $data['flagmodul'] = $this->uri->segment(4);
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $projid = $session_data['projectid'];
          $userid = $session_data['m_id'];
          $projectid = $session_data['projectid'];
          $data['imgu'] = $session_data['img'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $data['getproj'] = $this->manag_m->getproject_user($userid, $projectid,$compcode);
          if ($data['pr_project_right'] == 'true') {
            $data['getdep'] = $this->manag_m->getdepartment();
          } else {
            $data['getdep'] = $this->manag_m->getdepart_user($userid,$compcode);
          }
          $data['rows'] = $this->manag_m->get_data($data['pjid']);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('office/contract/archive_project_progress_v');
          $this->load->view('base/footer_v');
        }
        public function allcontract() {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $data['flagmodul'] = $this->uri->segment(5);
          $data['code'] = $code;
          $data['type'] = $type;
          $data['res'] = $this->manag_m->receive_loi($username, $code,$type,$compcode);
          $data['resproject'] = $this->manag_m->getproject_name($compcode,$code);
          $this->load->view('navtail/base_master/header_v', $data);
          $this->load->view('navtail/base_master/tail_v');
      
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('office/contract/all_contract_progress_v');
          $this->load->view('base/footer_v');
        }
        public function history_progress(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $code = $this->uri->segment(3);
          $type = $this->uri->segment(4);
          $data['flagmodul'] = $this->uri->segment(5);
          $data['lono'] = $this->uri->segment(6);
          $data['resproject'] = $this->manag_m->getproject_name($compcode,$code);
          $this->load->view('navtail/base_master/header_v', $data);
          $this->load->view('navtail/base_master/tail_v');
      
          $this->load->view('navtail/navtail_project_progress_v');
          $this->load->view('office/contract/all_progress_detail_v');
          $this->load->view('base/footer_v');
        }
        public function load_history_progress(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['compcode'] = $session_data['compcode'];
          $data['lono'] = $this->uri->segment(3);
          $data['prd'] = $this->manag_m->table_apstablelodetail($data['lono']);
          $this->load->view('office/contract/progress_history_v',$data);
        }
        public function sff(){
          $q = $this->manag_m->receive_loi($username="", $code="2",$type="p");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($q));
        }
        public function ViewReviseProjectBudget()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);

          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }

          
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/natail_bd');
          $this->load->view('management/Transaction/ViewReviseProjectBudget',$data);
          $this->load->view('base/footer_v');
        }

        public function vrpb($id,$type)
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          $data['flagcostcode'] = $this->manag_m->costlevel($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();

          $data['project_id'] = $this->manag_m->sel_pro($id);
          $data['total_budget'] = $this->manag_m->total_budget($id);
          // echo $data['project_id'][0];
          // $bd_tenid = $data['project_id'][0]['bd_tenid'];
          // $data['boq'] = $this->manag_m->boq($bd_tenid);

          $data['revise'] = $this->get_revise_list($id);
          $data['tender_id'] = $id;
          $data["type"] = $type;
          $data['box_list'] = $this->get_box_by_tender($data['tender_id']);
          // get tender ID
         
          // print_r($data['total_budget']);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/natail_bd');
          $this->load->view('navtail/natail_bd_boq');
          $this->load->view('management/Transaction/vrpb',$data);
          $this->load->view('base/footer_v');
        }
        public function revise_boq(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);

          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['tender'] = $this->uri->segment(3);
          $data['count_revise'] = $this->manag_m->count_revise($data['tender']);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/natail_bd');
          $this->load->view('management/Transaction/revise_boq_v');
          $this->load->view('base/footer_v');
        }
        public function load_revise_archive($tender){
          $data['tender'] = $this->uri->segment(3);
          $revise = $this->input->post();
          $data['count_revise'] = $this->manag_m->count_revise($data['tender']);
          $data['res'] = $this->manag_m->archive_budget_rev($data['tender']);
          $this->load->view('management/Transaction/load_revise_archive_v',$data);
        }
        public function load_compare_revise(){
          $revise = $this->input->post();
          print_r($revise);
        }
        public function getjsonbudget(){
          $td = $this->uri->segment(3);
          $q = $this->manag_m->archive_budget($td);
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($q));
        }
        public function get_box_by_tender($tender_id){
            $this->db->select('
                heading_bd.id,
                heading_bd.ref_bd,
                heading_bd.heading,
                heading_bd.revise,
                heading_bd.boq_bd
              ');
            $this->db->from('heading_bd');
            $this->db->where('heading_bd.boq_bd',$tender_id);
            $this->db->where("status","Y");
            $result_box = $this->db->get()->result_array();

            foreach ($result_box as $key => $box) {
             
              $this->db->distinct();
              $this->db->select('revise');
              $this->db->from('boq_item_revise');
              $this->db->where('heading_ref', $box["ref_bd"]); 
              $result_box[$key]["revise_list"] = $this->db->get()->result_array();

            }

            return $result_box;        
        }
        public function show_item_heading_bd(){
          $ref_bd = $this->input->post('ref_bd');

          //>>ice

          // $this->compcode
          $this->db->select('*');
          $this->db->from('boq_item');
          $this->db->join('system','boq_item.boq_job = system.systemcode');
          $this->db->where('boq_item.heading_ref',$ref_bd);
          $this->db->where('system.compcode',$this->compcode);
          $this->db->where("status","Y");

          $result_boq_item = $this->db->get()->result_array(); 

          echo json_encode($result_boq_item);

        }

        public function show_revise_item_by_box($bd_tenid){
          //echo $bd_tenid;
            // check bd bind project true return row project false return false
          $bind_project = $this->get_project_by_tender($bd_tenid);
          $data = $this->input->post();
            $heading = $this->input->post('heading');
            $revise_array = $this->input->post('revise_array');
            if($revise_array==false){
              echo "select revise";
              die();
            }else{
               $data['col_revise'] = $revise_array;

                $this->db->select("*");
                // $this->db->where("boq_bd",$bd_tenid);
                $this->db->where('heading_ref',$heading);
                $result = $this->db->get('boq_item')->result_array();

                 foreach ($result as $keyLoop1 => $boq) {
                        // loop get data revise
                        $array_total_revise = array();
                          foreach ($revise_array as $keyLoop2 => $revise_version) {
                              
                              $totalamtboq = 0;
                              $this->db->select("*");
                             
                              $this->db->where("heading_ref",$heading);
                              $this->db->where("revise",$revise_version);
                              $this->db->where("newmatcode",$boq["newmatcode"]);

                              
                              $date_revise =  $this->db->get("boq_item")->result_array();

                                 
                              if(count($date_revise)>0){
                                  $totalamtboq = $date_revise[0]['totalamt'];
                                  //echo $totalamtboq;
                              }

                                 $array_total_revise[$revise_version] = $totalamtboq;
                          

                          }

                       $result[$keyLoop1]["revise_list"] = $array_total_revise;
                       $end_col = end($revise_array);
                       $prev_col = prev($revise_array);

                        if($end_col == 0){
                          // last revise - totalamtboq
                          $result[$keyLoop1]["dif"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ($result[$keyLoop1]["totalamt"]*1);
                        }else{
                          // n revise - (n revise - 1) 4 - 3 , 5 -4 , 6 - 5

                          $result[$keyLoop1]["dif"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ($result[$keyLoop1]["revise_list"][$prev_col]*1) ;
                        }

                        
                        $result[$keyLoop1]["gross_margin"] = ($result[$keyLoop1]["totalamt"]*1) - ($result[$keyLoop1]["revise_list"][$end_col]*1);
                        
                          // ไม่ได้ผูกโปรเจค
                         if($bind_project==false){
                             $result[$keyLoop1]["purchase_cost"] = 0;
                             $result[$keyLoop1]["actual_cost"] = 0;
                         }else{

                             
                             $result[$keyLoop1]["purchase_cost"] = $this->sum_Purchase_Cost($bind_project[0]['project_code'],$bind_project[0]['project_id'],$result[$keyLoop1]["subcostcode"]);
                             $result[$keyLoop1]["actual_cost"] = $this->sum_actual_cost($bind_project[0]['project_code'],$bind_project[0]['project_id'],$result[$keyLoop1]["subcostcode"]);
                              
                              
                         }

                          $result[$keyLoop1]["Budget_bal"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ($result[$keyLoop1]["purchase_cost"]);
                          
                          $result[$keyLoop1]["forecastbg"] = $this->sum_forecastbg($result[$keyLoop1]["subcostcode"],$heading);


                          $result[$keyLoop1]["to_be_order"] = $result[$keyLoop1]["forecastbg"] - $result[$keyLoop1]["purchase_cost"];

                          $result[$keyLoop1]["variance_bg"] = ($result[$keyLoop1]["revise_list"][$end_col]*1) - ( $result[$keyLoop1]["forecastbg"]*1);
                          
                 }
                 $data["heading"] = $heading;
                 $data["data"] = $result;
                 $data['project_code'] = $bind_project[0]['project_code'];
                 $data['project_id'] = $bind_project[0]['project_id'];



              $this->load->view('management/revise_new', $data);
            }
           
        }

        public function sum_forecastbg($costcode,$heading){
          //echo $costcode." ".$heading."<br>";
          $this->db->select("sum(forecast) as forecast_amt");
          $this->db->from("boq_cost");
          $this->db->where("costcode",$costcode);
          $this->db->where("heading_ref",$heading);
          $forecastbg = $this->db->get()->result_array();

          return $forecastbg[0]["forecast_amt"]*1;
          // var_dump($forecastbg);
        }
        public function sum_Purchase_Cost($project_code,$project_id,$costcode){
             $purchase_Cost = 0;


             // po 
             $this->db->select("sum(po_item.poi_disamt) as po_amt");
             $this->db->from("po");
             $this->db->join("po_item","po.po_pono=po_item.poi_ref");
             $this->db->where("po.po_project",$project_id);
             $this->db->where("po_item.poi_costcode",$costcode);
             $this->db->where("po_item.compcode",$this->compcode);
             $po = $this->db->get()->result_array();
             // po
             $purchase_Cost += $po[0]["po_amt"]*1;


              $this->db->select("sum(lo_detail.total_disc) as wo_amt");
              $this->db->from("lo");
              $this->db->join("lo_detail","lo.lo_lono=lo_detail.lo_ref");
              // แม่งเขียน code แต่แม่งเก็บ id กูละ เบื่ออออออ
              $this->db->where("lo.projectcode",$project_id);
              $this->db->where("lo_detail.lo_costcode",$costcode);
              $this->db->where("lo_detail.compcode",$this->compcode);
              $wo = $this->db->get()->result_array();
              // wo
              $purchase_Cost += $wo[0]["wo_amt"]*1;

              //peetycash

              $this->db->select("sum(pettycashi_amounttot) as petty_amt");
              $this->db->from("pettycash");
              $this->db->join("pettycash_item","pettycash.docno=pettycash_item.pettycashi_ref");
              $this->db->where("pettycash.project",$project_id);
              
              $this->db->where("pettycash.status","paid");
              $this->db->where("pettycash_item.pettycashi_costcode",$costcode);
              $this->db->where("pettycash_item.compcode",$this->compcode);
              
              $pettycash_amt = $this->db->get()->result_array();

              $purchase_Cost += $pettycash_amt[0]["petty_amt"]*1;
             
              //peetycash

              // gl
              $this->db->select("sum( gl_batch_details.amtdr - gl_batch_details.amtcr) as gl_amt");
              $this->db->from("gl_batch_header");
              $this->db->join("gl_batch_details","gl_batch_header.vchno = gl_batch_details.vchno");
              $this->db->where("gl_batch_details.project_id",$project_id);
              $this->db->where("gl_batch_details.cust_code",$costcode);
              $this->db->where("gl_batch_header.pucost",'true');
              $this->db->where("gl_batch_header.compcode",$this->compcode);
              $gl_amt = $this->db->get()->result_array();

              $purchase_Cost += $gl_amt[0]["gl_amt"]*1;
              // gl

              
                






             return $purchase_Cost;

            //echo $project_code." ".$project_id." ".$costcode."<br>";
        }

        public function sum_actual_cost($project_code,$project_id,$costcode){
         

          $actual_cost = 0;
          //apv
            $this->db->select("sum(apv_detail.apvi_amount) as apv_sum");
            $this->db->from('apv_header');
            $this->db->join('apv_detail','apv_header.apv_code = apv_detail.apvi_ref');
            // where compcode
            $this->db->where("apv_detail.compcode",$this->compcode);
            // where project id
            $this->db->where('apv_header.apv_project',$project_id);
            // where apv_detail.apvi_costcode
            $this->db->where('apv_detail.apvi_costcode',$costcode);
            $apv_sum = $this->db->get()->result_array();

            $actual_cost+= $apv_sum[0]['apv_sum']*1;
          //apv

          // aps
              $this->db->select("sum(aps_detail.apsi_amount) as aps_sum");
              $this->db->from('aps_header');
              $this->db->join('aps_detail','aps_header.aps_code = aps_detail.apsi_ref');
              // where compcode
              $this->db->where('aps_header.compcode',$this->compcode);
              $this->db->where('aps_detail.compcode',$this->compcode);
              // where project
              $this->db->where('aps_header.aps_project',$project_id);
              // where costcode
              $this->db->where('aps_detail.apsi_costcode',$costcode);
              $aps_sum = $this->db->get()->result_array();

              $actual_cost+= $aps_sum[0]['aps_sum']*1;

          // aps

          // apo
              $this->db->select("sum(ap_pettycash_cost.cost_amount) as apo_sum");
              $this->db->from('ap_pettycash_header');
              $this->db->join('ap_pettycash_cost','ap_pettycash_header.ap_no = ap_pettycash_cost.cost_ref');
              // where project id
              $this->db->where('ap_pettycash_header.ap_project',$project_id);
              // where compcode
              $this->db->where('ap_pettycash_cost.compcode',$this->compcode);
              $this->db->where('ap_pettycash_header.compcode',$this->compcode);
              // where costcode
              $this->db->where('ap_pettycash_cost.cost_costcode',$costcode);
              $apo_sum = $this->db->get()->result_array();

              $actual_cost+= $apo_sum[0]['apo_sum']*1;

          // apo


               // gl
              $this->db->select("sum( gl_batch_details.amtdr - gl_batch_details.amtcr) as gl_amt");
              $this->db->from("gl_batch_header");
              $this->db->join("gl_batch_details","gl_batch_header.vchno = gl_batch_details.vchno");
              $this->db->where("gl_batch_details.project_id",$project_id);
              $this->db->where("gl_batch_details.cust_code",$costcode);
            
              $this->db->where("gl_batch_header.compcode",$this->compcode);
              $gl_amt = $this->db->get()->result_array();

              $actual_cost += $gl_amt[0]["gl_amt"]*1;
              // gl


              return $actual_cost;

        }
        public function sum_Purchase_Cost_detail(){
           $data_input = $this->input->post();
           
           $project_code = $data_input["project_code"];
           $project_id   = $data_input["project_id"];
           $heading      = $data_input["heading"];
           $costcode     = $data_input["costcode"];

           $return = array();
            // po 
             $this->db->select("*");
             $this->db->from("po");
             $this->db->join("po_item","po.po_pono=po_item.poi_ref");
             $this->db->where("po.po_project",$project_id);
             $this->db->where("po_item.poi_costcode",$costcode);
             $this->db->where("po_item.compcode",$this->compcode);
             $po = $this->db->get()->result_array();             
             $return["po"] = $po;
             // po


             // wo
              $this->db->select("*");
              $this->db->from("lo");
              $this->db->join("lo_detail","lo.lo_lono=lo_detail.lo_ref");
              // แม่งเขียน code แต่แม่งเก็บ id กูละ เบื่ออออออ
              $this->db->where("lo.projectcode",$project_id);
              $this->db->where("lo_detail.lo_costcode",$costcode);
              $this->db->where("lo_detail.compcode",$this->compcode);
              $wo = $this->db->get()->result_array();
              $return["wo"] = $wo;

             // wo


               //peetycash

              $this->db->select("*");
              $this->db->from("pettycash");
              $this->db->join("pettycash_item","pettycash.docno=pettycash_item.pettycashi_ref");
              $this->db->where("pettycash.status","paid");
              $this->db->where("pettycash_item.pettycashi_costcode",$costcode);
              $this->db->where("pettycash_item.compcode",$this->compcode);
              // $this->db->where("pettycash_item.pettycashi_costcode","10000000");
              $this->db->where("pettycash.project",$project_id);
              
              $pettycash_amt = $this->db->get()->result_array();

              $return["pettycash"] = $pettycash_amt;
         
              //peetycash


              // gl
              $this->db->select(" *,(gl_batch_details.amtdr - gl_batch_details.amtcr) as gl_amt");
              $this->db->from("gl_batch_header");
              $this->db->join("gl_batch_details","gl_batch_header.vchno = gl_batch_details.vchno");
              $this->db->where("gl_batch_details.project_id",$project_id);
              $this->db->where("gl_batch_details.cust_code",$costcode);
              $this->db->where("gl_batch_header.pucost",'true');
              $this->db->where("gl_batch_header.compcode",$this->compcode);
              $gl_amt = $this->db->get()->result_array();

              $return["gl"] = $gl_amt;
              // gl

              // $this->output->enable_profiler();

             echo json_encode($return);
          //  array(4) {
          //   ["project_code"]=>
          //   string(9) "201800003"
          //   ["project_id"]=>
          //   string(1) "3"
          //   ["heading"]=>
          //   string(11) "TD201801000"
          //   ["costcode"]=>
          //   string(8) "00000000"
          // }



        }
        public function get_project_by_tender($tender_id){
            $this->db->select("project_id,project_code");
            $this->db->where("bd_tenid",$tender_id);
            $project =  $this->db->get("project")->result_array();

            if(count($project)<0){
                return false;
            }else{
                return $project;
            }


        }
        public function get_revise_list($projid){
         
          
            $this->db->select("revise");
            $this->db->where("project_code",$projid);
            $this->db->limit(1);
            $query = $this->db->get("project");
            $res = $query->result_array();
            $revise = 0;
            if(isset($res[0])){
              $revise = $res[0]["revise"];
            }
            
            return $revise;
        }

        public function show_revise($bd_tenid){

          $input = $this->input->post('data');
          

          $revise = array();
          foreach ($input as $key => $value) {
            if($value["name"] == "revise[]"){
              $revise[] = $value["value"];
              
            }
          }

          $this->db->select("*");
          $this->db->where("boq_project",$bd_tenid);
          $res = $this->db->get('boq_item')->result_array();
          var_dump($res);
          var_dump($bd_tenid);
          var_dump($revise);

        }

   public function save_revise_new($type,$tender_id){
      // $type = project or Department
      $data = $this->input->post();

      $session_data = $this->session->userdata('sessed_in'); 
      //var_dump($session_data);


      $m_id = $session_data['m_id'];
      $username = $session_data['username'];
      
      $head_id = $data["heading_id"];
      $size_array = count($data["job"]);
    
      // get tender
      $this->db->select("revise");
      $this->db->from('heading_bd');
      $this->db->where('ref_bd',$head_id);
      $revise = $this->db->get()->result_array()[0]['revise'];
      // get tender

      $number_revise = "REV".date("YmdHis");

      $data_heading_revise = array(
        'ref_bd'=>$number_revise,
        'status'=>"W",
        'useradd' =>$username,
        'userid'=> $m_id,
        'compcode' =>$this->compcode,
        'adddate' => date('Y-m-d H:i:s'),
        'revise'=>$revise,
        'ref_heading'=>$head_id
      );

      $this->db->insert('heading_bdrevise',$data_heading_revise);

      $this->db->trans_begin();
      for ($index=0; $index <$size_array ; $index++) { 
        $data_insert = array(
          'boq_bd'=>$data["tender_id"],
          "boq_job" => $data['job'][$index], 
          "subcostcode" => $data['subcostcode'][$index], 
          "subcostcodename" => $data['subcostcodename'][$index],
          "newmatnamee" => $data['newmatnamee'][$index],
          "newmatcode" => $data['newmatcode'][$index],
          "boqcode" => $data['boqcode'][$index],
          "matboq" => $data['matboq'][$index],
          "unitcode" => $data['unitcode'][$index],
          "unitname" => $data['unitname'][$index],
          "qty_bg" => parse_num($data['qty_bg'][$index]),
          "qtyboq" => parse_num($data['qtyboq'][$index]),
          "matpricebg" => parse_num($data['matpricebg'][$index]),
          "matamtbg" => parse_num($data['matamtbg'][$index]),
          "labpricebg" => parse_num($data['labpricebg'][$index]),
          "labamtbg" => parse_num($data['labamtbg'][$index]),
          "subpricebg" => parse_num($data['subpricebg'][$index]),
          "subamtbg" => parse_num($data['subamtbg'][$index]),
          "totalamt" => parse_num($data['totalamt'][$index]),
          "matpriceboq" => parse_num($data['matpriceboq'][$index]),
          "matamtboq" => parse_num($data['matamtboq'][$index]),
          "labpriceboq" => parse_num($data['labpriceboq'][$index]),
          "labamtboq" => parse_num($data['labamtboq'][$index]),
          "subpriceboq" => parse_num($data['subpriceboq'][$index]),
          "subamtboq" => parse_num($data['subamtboq'][$index]),
          "heading_ref"=> $head_id, 
          "totalamtboq" => parse_num($data['totalamtboq'][$index]),
          "status" => "N",
          "compcode" => $this->compcode,
          "adduser" => $username,
          "adduser_id" => $m_id,
          "adddate" => date('y-m-d'),
          "revise"=> $number_revise


        );
          $this->db->insert("boq_item",$data_insert);

          $data_update = array(
            'ref_revise'=>$number_revise
          );
          $this->db->where('pimary',$data['boq_id'][$index]);
          $this->db->where('heading_ref',$head_id);

          $this->db->update("boq_cost",$data_update);
     # code...
      }

          $this->db->select('*');
          $this->db->where('type',"TD");
          $this->db->where('approve_project',$tender_id);
          $ma = $this->db->get('approve')->result();
          foreach ($ma as $qq) {
            $data_approve = array(
                'app_pr' => $number_revise,
                'app_project' => $qq->approve_project,
                'app_sequence' => $qq->approve_sequence,
                'app_midid' => $qq->approve_mid,
                'app_midname' => strtolower($qq->approve_mname),
                'lock' => $qq->approve_lock,
                'status' => "no",
                'cost' => $qq->approve_cost,
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $this->compcode,
          );
            $this->db->insert('approve_revise',$data_approve);
          }




      if ($this->db->trans_status() === FALSE)
      {
              $this->db->trans_rollback();
              echo "rollback";
      }
      else
      {
              $this->db->trans_commit();
              // echo "commit";
              redirect("management/vrpb/{$data['tender_id']}/{$type}");
      }

      
      // echo $size;
    }


public function DepartmentBudget()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/DepartmentBudget');
          $this->load->view('base/footer_v');
        }

        public function ProjectForecastMonthly()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          $projectid = $session_data['projectid'];
          // $data['getproj'] = $this->datastore_m->getproject();


          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
        
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/ProjectForecastMonthly');
          $this->load->view('base/footer_v');
        }

        public function costac()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $project_id = $this->uri->segment(3);
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          $data["status_pending"] = $this->manag_m->get_pading(null,$project_id);
          
         
          
          $this->load->view('navtail/base_master/header_v');
          $this->load->view('navtail/base_master/tail_v',$data);
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/costac');
          $this->load->view('base/footer_v');
        }

        public function setup_expense()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $project_id = $this->uri->segment(3);
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
         
          $this->load->view('navtail/base_master/header_v');
          $this->load->view('navtail/base_master/tail_v',$data);
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/data/setup_expense');
          $this->load->view('base/footer_v');
        }
        

      public function forcast_compart()
        {
           $session_data = $this->session->userdata('sessed_in');
           $username = $session_data['username'];
           $compcode = $session_data['compcode'];
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


          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/forcast_compart');
          $this->load->view('base/footer_v');
        }

        public function content_cost_ac(){
          echo __METHOD__;
           $this->load->view('management/data/modals_cost_ac');
        }

        public function reportar()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $data['compcode'] = $session_data['compcode'];
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
          $data['allproj'] = $this->count_m->projall($compcode);
          $data['allpo'] = $this->count_m->poall($compcode);
          $data['allpoapp'] = $this->count_m->poappall($compcode);
          $data['powait'] = $this->count_m->powait($compcode);
          $data['lastproj'] = $this->manag_m->getproject($compcode);
          $data['compimg'] = $this->manag_m->companyimg();
          $company = $this->manag_m->companyname($compcode);
          foreach ($company as $e) {
            $data['companyname'] = $e->company_name;
          }
          $data['getproj'] = $this->manag_m->getprojectpett();
          $data['member'] = $this->manag_m->getmember();
          // $data['inv'] = $this->count_m->countinv($compcode);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('management/reportar');
          $this->load->view('navtail/base_master/footer_v');
        }


        public function modalcaredda()
        {
          $data['duedate'] = $this->uri->segment(3);
          $data['type'] = $this->uri->segment(4);
          $this->load->view('management/modal/modal_caredda',$data);        
        }
        public function tender_detail()
        {
          $session_data = $this->session->userdata('sessed_in');
          $data['compcode'] = $session_data['compcode'];
          $data['tid'] = $this->uri->segment(3);
          $this->load->view('bd/modal/tender_detail',$data);        
        }
        public function tender_detail_new()
        {
          $session_data = $this->session->userdata('sessed_in');
          $data['compcode'] = $session_data['compcode'];
          $data['tid'] = $this->uri->segment(3);
          $this->load->view('bd/modal/tender_detail_new_v',$data);        
        }

        public function list_data_price()
        {
          $mat = $this->input->post('mat');
          $limid = $this->input->post('limid');
          $data['po'] = $this->manag_m->get_po_unti($mat,$limid);
          $data['wo'] = $this->manag_m->get_wo_unti($mat,$limid);
          $this->load->view('management/material_price_show',$data);       
        }

        public function ProjectForecastMonthly_data()
        {
          $pj_id = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $compcode = $session_data['compcode'];
          $data['project'] = $this->manag_m->getproject_all($pj_id);

          $str_tender = $data['project'][0]->bd_tenid; 
        
          $data['tender'] = $str_tender = $data['project'][0]->bd_tenid; 
          $data['budget'] = $this->manag_m->get_projectboq($str_tender); 
          $data['decsc'] = $this->manag_m->get_desc($str_tender); 
          $data['pj_id'] = $pj_id;
          // echo "string"; 
          // var_dump($data['budget']);die(); 
          
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/ProjectForecastMonthly_data',$data);
          $this->load->view('base/footer_v');
        }
        public function show_detail_over_view($project_code=null ,$project_id = null ){


            
            $session_data = $this->session->userdata('sessed_in');
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
            $this->load->view('navtail/navtail_pm_v');
            $this->load->view('management/data/over_view_ar_v',["project_code"=>$project_code,"project_id"=>$project_id]);
            $this->load->view('base/footer_v');


        }


        public function show_detail_over_view_booking($project_code=null ,$project_id = null ){


            
            $session_data = $this->session->userdata('sessed_in');
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
            $this->load->view('navtail/navtail_pm_v');
            $this->load->view("management/data/show_detail_over_view_booking_v",["project_code"=>$project_code,"project_id"=>$project_id]);
            $this->load->view('base/footer_v');


        }

        public function show_detail_over_view_actual_cost($project_code=null ,$project_id = null ){

            $session_data = $this->session->userdata('sessed_in');            
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
            $this->load->view('navtail/navtail_pm_v');
            $this->load->view("management/data/show_detail_over_view_actual_cost_v",["project_code"=>$project_code,"project_id"=>$project_id]);
            $this->load->view('base/footer_v');


        }


        public function ProjectForecastMonthly_edit(){
          
          $pj_id = $this->uri->segment(3);
          $session_data = $this->session->userdata('sessed_in');
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $compcode = $session_data['compcode'];
          $data['project'] = $this->manag_m->getproject_all($pj_id);


          $str_tender = $data['project'][0]->bd_tenid; 
        
          $data['tender'] = $str_tender = $data['project'][0]->bd_tenid; 
          $data['budget'] = $this->manag_m->get_projectboq($str_tender); 
          $data['decsc'] = $this->manag_m->get_desc($str_tender); 
          $data['costcode'] = $this->manag_m->get_costcode($str_tender); 
          $data['pj_id'] = $pj_id;
        
          
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/Transaction/ProjectForecastMonthly_edit',$data);
          $this->load->view('base/footer_v');

        }

        public function cost_code(){
          
          $session_data = $this->session->userdata('sessed_in');
          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $compcode = $session_data['compcode'];
          
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pm_v');
          $this->load->view('management/cost_code');
          $this->load->view('base/footer_v');

        }


        public function update_cost_type1($costcode,$control,$bd){

            if ($control == 1) {
              $data = array(
                            'control' => '0'
                          );
              $this->db->where('costcode', $costcode);
              $this->db->where('type', '1');
              $this->db->where('boq_code', $bd);
              $this->db->update('boq_cost', $data);
            }else{
              $data = array(
                            'control' => '1'
                          );
              $this->db->where('costcode', $costcode);
              $this->db->where('type', '1');
              $this->db->update('boq_cost', $data);
            }
            
        }

        public function update_cost_type2($costcode,$control,$bd){

            if ($control == 1) {
              $data = array(
                            'control' => '0'
                          );
              $this->db->where('costcode', $costcode);
              $this->db->where('type', '2');
              $this->db->where('boq_code', $bd);
              $this->db->update('boq_cost', $data);
            }else{
              $data = array(
                            'control' => '1'
                          );
              $this->db->where('costcode', $costcode);
              $this->db->where('type', '2');
              $this->db->update('boq_cost', $data);
            }
            
        }




        public function update_controlper_type1($costcode,$controlper,$bd){

         
              $data = array(
                            'controlper' => $controlper
                          );
              $this->db->where('costcode', $costcode);
              $this->db->where('type', '1');
              $this->db->where('boq_code', $bd);
              $this->db->update('boq_cost', $data);
         
            
        } 

        public function update_controlper_type2($costcode,$controlper,$bd){

         
              $data = array(
                            'controlper' => $controlper
                          );
              $this->db->where('costcode', $costcode);
              $this->db->where('type', '2');
              $this->db->where('boq_code', $bd);
              $this->db->update('boq_cost', $data);
         
            
        }

        public function update_forecast()
        {
          $id = $this->input->post('id');
          $forecast = $this->input->post('forecast');

          $data = array(
            'forecast' => $forecast
          );
          $this->db->where('bd_cost', $id);
          $succ = $this->db->update('boq_cost', $data); 
          $res = array();
          if ($succ) {
             $res['status'] = true; 
          }else{
            $res['status'] = false;
          }
          echo json_decode($res);
        }

        public function project_resources(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $data['name'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $datata['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['projid'] = $this->uri->segment(3);
          if ($username=="") {
            redirect('/');
          }else {
            $this->load->view('navtail/base_angular/header_v',$data);
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('management/meka_project_resources_v');
            $this->load->view('navtail/base_angular/base_js_v',$data);
            $this->load->view('navtail/base_master/footer_v');
          }
        }

      public function pu_cost($project_id,$cost_bytae,$compcode){

        // var_dump($compcode);
        $data['po'] = $this->manag_m->get_pu_cost_po($project_id,$cost_bytae,$compcode); 
        $data['wo'] = $this->manag_m->get_pu_cost_wo($project_id,$cost_bytae,$compcode); 
        $data['pc'] = $this->manag_m->get_pu_cost_pc($project_id,$cost_bytae,$compcode); 
        $this->load->view('management/Transaction/pu_cost',$data);

      } 

      public function material_cost($project_id,$cost_bytae,$compcode){

        // var_dump($compcode);
        $data['po'] = $this->manag_m->get_material_cost_po($project_id,$cost_bytae,$compcode); 
        $data['wo'] = $this->manag_m->get_material_cost_wo($project_id,$cost_bytae,$compcode); 
        $data['pc'] = $this->manag_m->get_material_cost_pc($project_id,$cost_bytae,$compcode); 
        $this->load->view('management/Transaction/material_cost',$data);

      }

      public function labor_cost($project_id,$cost_bytae,$compcode){

        // var_dump($project_id);
        $data['po'] = $this->manag_m->get_labor_cost_po($project_id,$cost_bytae,$compcode); 
        $data['wo'] = $this->manag_m->get_labor_cost_wo($project_id,$cost_bytae,$compcode); 
        $data['pc'] = $this->manag_m->get_labor_cost_pc($project_id,$cost_bytae,$compcode);
        $this->load->view('management/Transaction/labor_cost',$data);

      }

      public function subcon_cost($project_id,$cost_bytae,$compcode){

        // var_dump($project_id);
        $data['po'] = $this->manag_m->get_subcon_cost_po($project_id,$cost_bytae,$compcode); 
        $data['wo'] = $this->manag_m->get_subcon_cost_wo($project_id,$cost_bytae,$compcode); 
        $data['pc'] = $this->manag_m->get_subcon_cost_pc($project_id,$cost_bytae,$compcode);
        $this->load->view('management/Transaction/subcon_cost',$data);

      }
      public function load_revise_boq(){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $data['tdcode'] = $this->uri->segment(3);
        $data['heading'] = $this->manag_m->get_revise_heading($data['tdcode']);
        $data['ref_bd'] = $this->manag_m->get_heading_bdreivse($data['heading']);
        $data['res'] = $this->manag_m->load_boq($data['tdcode'],$data['ref_bd'],$compcode);
        $this->load->view('management/Transaction/load_revise_boq_v',$data);
      }
      public function load_dash_pc(){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $data['compcode'] = $session_data['compcode'];
        $expenscode = $this->uri->segment(3);
        $projectid = $this->uri->segment(4);
        $data['res'] = $this->db->query("select
                                          sum( `pettycash_item`.`pettycashi_unitprice` ) AS pettycashi_unitprice,
                                          `doc_id`,
                                          `docno`,
                                          `ap_expensother`.`expens_name` as act_name,
                                          `pettycash_item`.`pettycashi_expenscode` AS expenscode,
                                          `pettycash_item`.`pettycashi_accode` AS accode,
                                          `pettycash`.`docdate`,
                                          `pettycash`.`advname` 
                                        FROM
                                          pettycash
                                          JOIN pettycash_item ON pettycash_item.pettycashi_ref = pettycash.docno
                                          JOIN `ap_expensother` ON `ap_expensother`.`expens_code` = `pettycash_item`.`pettycashi_expenscode`
                                          JOIN `project` ON `project`.`project_id` = `pettycash`.`project` 
                                        WHERE
                                          pettycash_item.compcode = '$compcode' 
                                          AND `project`.`compcode`= '$compcode'
                                          AND `pettycash`.`compcode` = '$compcode'
                                          AND pettycash.project = '$projectid' 
                                          AND pettycash_item.pettycashi_project = '$projectid' 
                                          AND `pettycash_item`.`pettycashi_accode` = '$expenscode' 
                                        GROUP BY
                                          docno;"
        )->result();
        $this->load->view('management/load_dash_pc_by_expens_v',$data);
      }

}


  

// meka_project_resources_v