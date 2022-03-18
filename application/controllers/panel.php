<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class panel extends CI_Controller {
      public function __construct() {
            parent::__construct();
            

            
            $this->load->Model('auth_m');
      
            

        }

    public function index()
    {
        // $data['video'] = $this->config_m->getvedio();
        $this->load->view('auth/index_v');
    }
    public function office() {
        $this->load->model('permission_m');
        $session_data = $this->session->userdata('sessed_in');
        

        
            $data['username'] = $session_data['username'];
            $data['position'] = $session_data['m_position'];
            $data['position_name'] = $session_data['position_name'];
            $data['email'] = $session_data['m_email'];
            $data['dep'] = $session_data['m_dep'];
            $data['mtype'] = $session_data['mtype'];
            $userid = $session_data['m_id'];
            $data['name'] = $session_data['m_name'];
            $data['depid'] = $session_data['m_depid'];
            $data['dep'] = $session_data['m_dep'];
            $data['imgu'] = $session_data['img'];
            $data['compcode'] = $session_data['compcode'];
            $data['companyname'] = $session_data['companyname'];
            $data['comp_img'] = $session_data['comp_img'];
            // $data['module_h'] = $this->permission_m->get_module_h_panel();
            $data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
           // check get permission unsuccessful
            if ($data['username'] == "") {

                redirect('/');
            }else{
                $this->load->view('navtail/base_defualt/header_v',$data);
                $this->load->view('navtail/navtail_master_new_v');
                $this->load->view('navtail/navtail_sub_manu_new_v');
                $this->load->view('panel/module_all_v');
                $this->load->view('navtail/base_defualt/footer_new_v');
            }
       
    }
    
    public function officemanage()
    {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
         $data['username'] = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $data['dep'] = $session_data['m_dep'];
        $data['email'] = $session_data['m_email'];
        $data['project'] = $session_data['m_project'];
        $data['mpm'] = $session_data['mpm'];
        $data['moffce'] = $session_data['moffce'];
        $data['mpo'] = $session_data['mpo'];
        $data['mic'] = $session_data['mic'];
        $data['map'] = $session_data['map'];
        $data['mar'] = $session_data['mar'];
        $data['mhr'] = $session_data['mhr'];
        $data['approve'] = $session_data['approve'];
        $data['pr_project_right'] = $session_data['pr_project_right'];
        $data['pc_approve'] = $session_data['pc_approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];
        $data['img'] = $session_data['img'];
        $data['admin'] = $session_data['admin'];
        $data['ic_type'] = $session_data['ic_type'];
        $this->load->model('datastore_m');
         $data['imgu'] = $this->datastore_m->changeprofile($username);
         $data['compimg'] = $this->datastore_m->companyimg();
         $data['mbd'] = $session_data['mbd'];

        $data['ip'] = $this->input->ip_address();

         if ($username == "") {
                       redirect('/');
                }else
                {
                    $this->load->model('office_m');
                    $this->load->model('count_m');
                    $data['allpo'] = $this->office_m->countpo();
                    $data['allpr'] = $this->office_m->countpr();
                    $data['apppr'] = $this->count_m->countprapprove();
                    $data['disapp'] = $this->count_m->countprdisapprove();
                    $data['projectenable'] = $this->datastore_m->count_enable();
                    $data['projectclose'] = $this->datastore_m->count_disable();
                    $data['count'] = $this->count_m->count_user();
                    $data['res'] = $this->office_m->menu_right();
                    
                    $session_data = $this->session->userdata('sessed_in');
                    $data['m_id']= $session_data['m_id'];

                  

                    
                    // $this->load->library('multipledb');
                    // $CI = &get_instance();
                    // $this->db2 = $CI->load->database('db2', TRUE);  

                    // $data['license'] = $this->db2->query("select * from license")->num_rows();
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('panel/dashboard_v');
                    $this->load->view('base/footer_v');
                }
    }
    public function sitemanagement()
    {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
         $data['username'] = $session_data['username'];
        $data['name'] = $session_data['m_name'];
        $data['dep'] = $session_data['m_dep'];
        $data['email'] = $session_data['m_email'];
        $data['project'] = $session_data['m_project'];
        $data['mpm'] = $session_data['mpm'];
        $data['moffce'] = $session_data['moffce'];
        $data['mpo'] = $session_data['mpo'];
        $data['mic'] = $session_data['mic'];
        $data['map'] = $session_data['map'];
        $data['mar'] = $session_data['mar'];
        $data['mhr'] = $session_data['mhr'];
        $data['approve'] = $session_data['approve'];
        $data['pr_project_right'] = $session_data['pr_project_right'];
        $data['pc_approve'] = $session_data['pc_approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];
        $data['img'] = $session_data['img'];
        $data['admin'] = $session_data['admin'];
        $data['ic_type'] = $session_data['ic_type'];
        $this->load->model('datastore_m');
         $data['imgu'] = $this->datastore_m->changeprofile($username);
         $data['compimg'] = $this->datastore_m->companyimg();
         $data['mbd'] = $session_data['mbd'];

        $data['ip'] = $this->input->ip_address();

         if ($username == "") {
                       redirect('/');
                }else
                {
                    $this->load->model('office_m');
                    $this->load->model('count_m');
                    $data['allpo'] = $this->office_m->countpo();
                    $data['allpr'] = $this->office_m->countpr();
                    $data['apppr'] = $this->count_m->countprapprove();
                    $data['disapp'] = $this->count_m->countprdisapprove();
                    $data['projectenable'] = $this->datastore_m->count_enable();
                    $data['projectclose'] = $this->datastore_m->count_disable();
                    $data['count'] = $this->count_m->count_user();
                    $data['res'] = $this->office_m->menu_right();
                    // $this->load->library('multipledb');
                    // $CI = &get_instance();
                    // $this->db2 = $CI->load->database('db2', TRUE);  

                    // $data['license'] = $this->db2->query("select * from license")->num_rows();
                    $this->load->view('navtail/base_master/header_v',$data);
                    $this->load->view('navtail/base_master/tail_v');
                    $this->load->view('panel/dashboard_site_v');
                    $this->load->view('base/footer_v');
                }
    }
}