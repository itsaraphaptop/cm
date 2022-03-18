<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modalcode extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('office_m');
            $this->load->model('datastore_m');
        }
        function pop_pri()
        {
	        $this->load->view('officeservice/modal_pritem_v');
        }
        function pr_create()
        {
	        
        }
}