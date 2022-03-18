<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('find_costcode');
		//Do your magic here
	}
	public function index()
	{
		
	}

	public function findcostcode($costcode){
		$parent = getParent($costcode);
		print_r($parent);
		foreach ($parent as $key => $value) {
			echo  $key;
			foreach ($value as $detail => $model) {
				echo "<br> *".$detail."-".$model;
			} 
		}
	}

}

/* End of file UnitTest.php */
/* Location: ./application/controllers/UnitTest.php */