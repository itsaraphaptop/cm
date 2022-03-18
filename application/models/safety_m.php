<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class safety_m extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }


public function all_emp() 
{
$this->db->select('*');
$this->db->from('safety_first');
 $query = $this->db->get();
           $res = $query->result();
           return $res;
}
}