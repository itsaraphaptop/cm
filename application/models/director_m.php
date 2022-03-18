<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class director_m extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }
        public function getapvwaitapprove($id)
        {
            $this->db->select('*');
            $this->db->where('apv_status','dapprove');
            $query = $this->db->get('apv_header');
            $res = $query->result();
            return $res;
        }

}