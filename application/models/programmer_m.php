<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class programmer_m extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
        public function clear_pettycash()
        {

        }
        public function count_email($compcode)
        {
        	$q = $this->db->query("select * from email where compcode='$compcode'")->num_rows();
        	return $q;
        }
        public function setemail($compcode)
        {
            $q = $this->db->query("select * from `email` where `compcode`='$compcode'")->result_array();
            return $q;
        }
}
