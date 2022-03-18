<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class jsonr extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('datastore_m');
    }
    public function get_vender()
    {
        $q = $this->datastore_m->countveder_enable();
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($q));
    }
    
}
