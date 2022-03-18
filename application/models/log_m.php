<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class log_m extends CI_Controller {
	  public function __construct() {
            parent::__construct();
        }
        public function userlog()
        {
        	$this->db->select('*');
        	$query = $this->db->get('userlog');
        	$res = $query->result();
        	return $res;
        }
        public function add_log($data)
        {
            $q = $this->db->insert('userlog',$data);
            if ($q) {
                return true;
            }else{
                return false;
            }
        }
        public function userlogread()
        {
            $this->db->select('*');
            $query = $this->db->get('userlog');
            $res = $query->result();
            return $res;
        }
public function changeprofile($username)
    {
        $this->db->select('*');
        $this->db->where('m_user',$username);
        $query = $this->db->get('member');
        $res = $query->result();
        foreach ($res as $value) {
            $img = $value->uimg;

        }
        return $img;
    }
    public function companyimg()
    {
        $this->db->select('*');
        $query = $this->db->get('company');
        $res = $query->result();
        foreach ($res as $value) {
            $img = $value->comp_img;

        }
        return $img;
    }
}