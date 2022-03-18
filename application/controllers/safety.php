<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class safety extends CI_Controller {
      public function __construct() {
            parent::__construct();
            
        }

    public function index()
    {
        // $data['video'] = $this->config_m->getvedio();
        // $this->load->view('auth/index_v');
    }
      public function st_dashboard()
    {
        $session_data = $this->session->userdata('sessed_in');
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
          // $this->load->view('navtail/navtail_pm_v');
          $this->load->view('safety/st_main_v');
          $this->load->view('base/footer_v');
    }

    public function employee_list()
        {
        $session_data = $this->session->userdata('sessed_in');
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
           $this->load->model('safety_m');
          $datas['res'] = $this->safety_m->all_emp();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/navtail_pm_v');
              $this->load->view('safety/emp_list_v',$datas);
          $this->load->view('base/footer_v');
     
       

        }

         public function New_Employee()
        {
        $session_data = $this->session->userdata('sessed_in');
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
          // $this->load->view('navtail/navtail_pm_v');
              $this->load->view('safety/add_emp_v');
          $this->load->view('base/footer_v');
     
        }

        



}
