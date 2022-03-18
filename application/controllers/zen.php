<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'controllers/email.php';
class zen extends email {

	public function __construct() {
		parent::__construct();
	
    }
    public function index(){
        $aa = "itsaraphap@outlook.com";
        $this->_sendmail($aa);
    }
}