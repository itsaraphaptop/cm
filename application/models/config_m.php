<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class config_m extends CI_Controller {
          public function __construct() {
            parent::__construct();
        }
        public function getvedio()
        {
        	$this->db->select('*');
        	$this->db->from('theme');
        	$this->db->join('vdo','vdo.id = theme.vdo_id');
        	$query = $this->db->get();
        	$res = $query->result();
        	return $res;
        }
         public function getvedioname()
        {
            $this->db->select('*');
            $query = $this->db->get('vdo');
            $res = $query->result();
            return $res;
        }
        public function compimg()
        {
          $this->db->select('comp_img');
          // $this->db->order_by('company_id','desc');
          $query = $this->db->get('company');
          $res = $query->result();
          foreach ($res as $key => $value) {
            $img = $value->comp_img;
          }
          return $img;
        }
        public function company()
        {
          $this->db->select('*');
          // $this->db->order_by('company_id','desc');
          $query = $this->db->get('company');
          $res = $query->result();
          return $res;
        }
        public function company_compcode($compcode)
        {
          $this->db->select('*');
          $this->db->where('compcode',$compcode);
          $this->db->order_by('company_id','desc');
          $query = $this->db->get('company');
          $res = $query->result();
          return $res;
        }
        public function bgchange(){
          $this->db->select('background_login');
          $query = $this->db->get('setup_default');
          $res = $query->result_array();
          return $res;
        }
        public function getprintdefualt(){
          $this->db->select('print_defualt');
          $q = $this->db->get('setup_default')->result_array();
          return $q[0]['print_defualt'];
        }

}
