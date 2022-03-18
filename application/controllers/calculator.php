<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class calculator extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->Model('auth_m');
		$this->load->model('module_m');
		$this->load->helper('date');
		$this->load->model('config_m');
    }

    public function index()
    {
    	$this->load->view('calculator/calculator.php');
    }
}