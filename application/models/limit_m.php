<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class limit_m extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }
        public function count_user()
       {
         $this->db->select('*');
         $query = $this->db->get('member');
         $result = $query->num_rows();
         return $result;
       }
}
