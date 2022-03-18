<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class share_ball extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('retrieve');
       
    }

    public function modal_retrieve()
    {
    	$data['rows'] = $this->retrieve->get_data();
    	$this->load->view('datastore/share/modal_retrieve',$data);
    }

    public function content_tojob($id)
    {
    	$data['rows'] = $this->retrieve->get_data_byid($id);

    	$this->load->view('datastore/share/content_tbjob_edit',$data);
    }

    public function get_data_header($id)
    {
    	//Return JSON by Atiwat 
    	$res = $this->retrieve->query_data_hearder($id);
    	echo json_encode($res);
    }
}