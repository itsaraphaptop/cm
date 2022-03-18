<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class finance extends CI_Controller {
    
    public function __construct() {
    	 date_default_timezone_set( 'Asia/Bangkok' );
        parent::__construct();
        $this->load->helper(array('form', 'url','file'));
        $this->load->library('image_lib');
        $this->load->helper('date');
    }
    public function main_index(){
        $session_data = $this->session->userdata('sessed_in');
          
           $compcode = $session_data['compcode'];
           $username = $session_data['username'];
           if ($username=="") {
             redirect('/');
           }
           $da['name'] = $session_data['m_name'];
          
           $da['depid'] = $session_data['m_depid'];
           $da['dep'] = $session_data['m_dep']; 
           $data['projid'] = $session_data['projectid'];
           $da['project'] = $session_data['m_project'];
           $projid = $session_data['projectid'];
           $userid = $session_data['m_id'];
           $projectid = $session_data['projectid'];
           // $this->load->model('datastore_m');
           $da['imgu'] = $session_data['img'];

          $this->load->view('navtail/base_master/header_v',$da);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_fn_v');
          $this->load->view('office/finance/main_index_v');
          $this->load->view('base/footer_v');
    }

      
}