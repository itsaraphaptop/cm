<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class approve extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->helper('date');
        }
        public function sentwaitapprove()
        {
        	$id = $this->input->post('code');
        	$data = array(
        		'apv_status' => $this->input->post('waitapprove'),
                'apv_dateapprove' =>  date('Y-m-d H:i:s',now())
        		);
        	$this->db->where('apv_code',$id);
        	if($this->db->update('apv_header',$data))
        	{
        		return true;
        	}
        	else
        	{
        		return false;
        	}

        }
}
