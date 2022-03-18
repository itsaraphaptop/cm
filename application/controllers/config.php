<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class config extends CI_Controller {
          public function __construct() {
            parent::__construct();
        }

        public function vdo()
        {
        	$data=array(
        		'vdo_id' => $this->input->post('vdo')
        		);
        	if ($this->db->update('theme',$data)){
        		return true;
        	}
        	else
        	{
        		return false;
        	}
        }
}