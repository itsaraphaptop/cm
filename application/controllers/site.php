<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class site extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->model('site_m');
            $this->load->model('office_m');
            $this->load->model('count_m');
            $this->load->model('datastore_m');
        }
        public function prettycash()
        {
        	
        }

         public function receive()
        {

        }
         public function pr()
        {

        }
         public function setting()
        {

        }

        //////////////////////
        ///  Pretty Cash /////
        //////////////////////
         public function prettycash_all()
        {
	        $id = $this->uri->segment(3);
	        $data['all'] = $this->site_m->getpettycash_h();
	        $this->load->view('site/prettycash_v/service_prettycash_v',$data);
        }
         public function prettycash_item()
        {

        }
         public function new_prettycash()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['projid'] = $session_data['projectid'];
            $data['name'] = $session_data['m_name'];
            $data['projname'] = $session_data['m_project'];
        	 $this->load->view('site/prettycash_v/new_prettycash_v',$data);
        }
         public function print_prettycash()
        {

        }

        ///////////////////////////
        ////////    PR  	///////
        //////////////////////////
         public function pr_all()
        {
	         $session_data = $this->session->userdata('logged_in');
            $id = $session_data['projectid'];
            $data['res'] = $this->site_m->getallpr($id);
            $data['send'] = $this->site_m->getpr_wait($id);
            $data['cwaitapp'] = $this->count_m->countprapprove_p($id);
            $data['all'] = $this->count_m->countpr_p($id);
            $data['wait'] = $this->count_m->countprdisapprove_p($id);
            $this->load->view('site/pr_v/service_pr_v',$data);
        }
        public function pr_approveall()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['approve'] = $this->site_m->getpr_approveall();
            $data['wait'] = $this->site_m->getpr_waitall();
            $this->load->view('site/pr_v/service_pr_approve',$data);
        }
         public function pr_approve()
        {
            $session_data = $this->session->userdata('logged_in');
            $projectid = $session_data['project'];
	        $data['approve'] = $this->site_m->getpr_approve($projectid);
	        $data['wait'] = $this->site_m->getpr_wait($projectid);
	        $this->load->view('site/pr_v/service_pr_approve',$data);
        }

         public function pr_item()
        {
        	$id = $this->uri->segment(3);
	        $data['all'] = $this->site_m->getpr_d($id);
	        $this->load->view('site/pr_v/service_pr_item_v',$data);
        }
         public function new_pr()
        {
            $session_data = $this->session->userdata('logged_in');
            $uname = $session_data['username'];
            $id = $session_data['projectid'];
            $data['projid'] = $session_data['projectid'];
            $data['name'] = $session_data['m_name'];
            $data['projname'] = $session_data['m_project'];
            $data['getproj'] = $this->site_m->getproject($id);
            $data['resmem'] = $this->site_m->getmemberall($id);
            $data['getunit'] = $this->site_m->getunit();
            $data['allmaterial'] = $this->site_m->allmaterial();
            $data['allcostcode'] = $this->site_m->allcostcode();
	        $this->load->view('site/pr_v/new_pr_v',$data);
        }
         public function print_pr()
        {

        }
        public function sendapp_pr()
        {
            $id = $this->input->post('prno');
            $data = array(
                'pr_approve' => "wait"
                );
            $this->db->where('pr_prno',$id);
            if($this->db->update('pr',$data))
            {
                return true;
            }
            else{
                return false;
            }

        }

        ///////////////////////////
        ///      receive    //////
        /////////////////////////
         public function gen_pr()
        {

        }
         public function receive_item()
        {

        }
         public function receive_all()
        {

        }
         public function print_receive()
        {

        }

        ////////////////////////////
        ///     edit ///////////////
        ///////////////////////////
         public function edit_setting()
        {

        }
        public function add_prettycash()
        {

        }
        public function add_receive()
        {

        }
        public function add_pr()
        {

        }
        public function delete_prettycash()
        {

        }
        public function delete_receive()
        {

        }
        public function delete_pr()
        {

        }
        public function edit_prettycash()
        {

        }
        public function edit_receive()
        {

        }
        public function edit_pr()
        {

        }

        /////////////////////////////
        ////////   stock ///////////
        ///////////////////////////
        public function stock()
        {

        }
        

}