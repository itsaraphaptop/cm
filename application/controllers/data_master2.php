<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_master2 extends CI_Controller {
          public function __construct() {
            parent::__construct();
            $this->load->Model('datastore2_m');
        }
        public function pr_material_check()
        {
        	$chk = $this->input->post('chkprmat');
        	$data = array(
        		'valuess' => $chk
        		);
        	$this->db->where('`keyss`','pr_material_check');
        	if($this->db->update('master_checking',$data))
        	{
        		echo $chk;
        		return true;
        	}else{
        		return false;
        	}

        }
    }