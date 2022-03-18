<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class front extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }
        public function index()
        {
        	$this->load->view('front/navtail/base_master/header_v');
        	$this->load->view('front/main_v');
        	$this->load->view('front/base/footer_v');
        }
}