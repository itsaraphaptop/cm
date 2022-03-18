<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class newapo extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
            $this->load->model('office_m');
            $this->load->model('acc_m');
        }

        public function newpv()
        {
        	$session_data = $this->session->userdata('logged_in');
            $data['name'] = $session_data['m_name'];
            $data['res'] = $this->datastore_m->getvender();
            $data['getproj'] = $this->datastore_m->getproject();
            $data['getdep'] = $this->datastore_m->department();
            $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/ap/apo/newapo/newapo_v',$data);
        }
        public function pv_detail()
        {
            $session_data = $this->session->userdata('logged_id');
            $id = $this->uri->segment(3);
            $data['resi'] = $this->acc_m->retrive_apvdetail($id);
            $data['allmaterial'] = $this->datastore_m->allmaterial();
            $data['allcostcode'] = $this->datastore_m->allcostcode();
            $data['getunit'] = $this->datastore_m->getunit();
            $this->load->view('office/ap/apo/newapo/newapo_detail_v',$data);
        }

}