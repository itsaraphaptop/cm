<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class help extends CI_Controller {
	  public function __construct() {
            parent::__construct();
            $this->load->Model('log_m');
            $this->load->helper('date');
        }
        public function index()
        {
        	$session_data = $this->session->userdata('logged_in');
             $username = $session_data['username'];
         $data['imgu'] = $this->log_m->changeprofile($username);
         $data['compimg'] = $this->log_m->companyimg();
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
        $data['approve'] = $session_data['approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];

            $this->load->view('navtail/base_master/header_v');
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('base/office_menu_v',$data);
            $this->load->view('help_v');
            $this->load->view('base/footer_v');
        }
        public function edit()
        {
            $session_data = $this->session->userdata('logged_in');
             $username = $session_data['username'];
         $data['imgu'] = $this->log_m->changeprofile($username);
         $data['compimg'] = $this->log_m->companyimg();
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
        $data['approve'] = $session_data['approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];
        $id = $this->uri->segment(3);
        $this->db->select('*');
        $this->db->where('b_code',$id);
        $q = $this->db->get('fixbug');
        $data['res'] = $q->result();
            $this->load->view('navtail/base_master/header_v');
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('base/office_menu_v',$data);
            $this->load->view('fixbug/edit_fixbug_v',$data);
            $this->load->view('base/footer_v');
        }
        public function list_help()
        {
            $session_data = $this->session->userdata('logged_in');
             $username = $session_data['username'];
         $data['imgu'] = $this->log_m->changeprofile($username);
         $data['compimg'] = $this->log_m->companyimg();
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
        $data['approve'] = $session_data['approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];
$this->db->select('*');
$q = $this->db->get('fixbug');
$datares['res'] = $q->result();
            $this->load->view('navtail/base_master/header_v');
            $this->load->view('navtail/base_master/tail_v');
            $this->load->view('base/office_menu_v',$data);
            $this->load->view('panel/administrator_v',$datares);
            $this->load->view('base/footer_v');
        }

        public function showhelp()
        {
            $code = $this->uri->segment(3);
            $session_data = $this->session->userdata('logged_in');
             $username = $session_data['username'];
         $data['imgu'] = $this->log_m->changeprofile($username);
         $data['compimg'] = $this->log_m->companyimg();
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
        $data['approve'] = $session_data['approve'];
        $data['master'] = $session_data['master'];
        $data['user_right'] = $session_data['user_right'];
                $this->db->select('*');
                $this->db->where('b_code',$code);
                $q = $this->db->get('fixbug');
                $datares['res'] = $q->result();
//             $this->load->view('navtail/base_master/header_v');
//             $this->load->view('navtail/base_master/tail_v');
//             $this->load->view('base/office_menu_v',$data);
            $this->load->view('panel/show_help_v',$datares);
            // $this->load->view('base/footer_v');
        }

        public function approve()
        {
            $id = $this->uri->segment(3);
            $data = array(
                'b_status' => "approve"
                );
            $this->db->where('b_code',$id);
           $query =  $this->db->update('fixbug',$data);
           if ($query) {
               redirect('index.php/help/list_help');
           }else{
            echo "error";
           }
        }



}