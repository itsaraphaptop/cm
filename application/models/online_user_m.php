<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class online_user_m extends CI_Model {
	function __construct() {
        parent::__construct();
    }

    public function get_user_online(){
    	
    	$this->db->select("*");
    	$this->db->where("m_type","employee");
    	$this->db->where("LoginStatus","1");
    	$query =  $this->db->get('member');
    	$res = $query->result_array();
    	return $res;
    	
    }
    public function check_out_user_m($m_code,$m_user){
    	$this->db->where(["m_code" => $m_code,"m_user"=>$m_user]);
    	$this->db->set('LoginStatus', "0");
		$bool_update = $this->db->update('member');	
    	$data = array();
    	if ($bool_update) {
    		$data["status"] = $bool_update;
    	}else{
    		$data["status"] = $bool_update;
    		$data["message"] = "check out user ".$m_user;
    	}
    	return $data;

	}
	public function background(){
		$this->db->select('background_login');
		$res = $this->db->get('setup_default')->result_array();
		return $res;
	}
	public function userlogs($compcode)
	{
		$this->db->select("*");
		$this->db->where('compcode',$compcode);
		$this->db->order_by('logindate','desc');
		$this->db->limit(1000);
		$q = $this->db->get('userlog')->result();
		return $q;
	}	

	public function site_url($compcode)
	{
		$this->db->select('site_url');
		$this->db->where('compcode',$compcode);
		$q = $this->db->get('company')->result();
		foreach ($q as $key => $value) {
			$res = $value->site_url;
		}
		return $res;
	}

	public function upd_site_url($site_url,$compcode)
	{	$data = array('site_url' => $site_url );
		$this->db->where('compcode',$compcode);
		$q = $this->db->update('company',$data);
		return $q;
	}
	public function updmulticompany($compcode,$chkmulticomp)
	{	
		$multi = array('multicomp'=> $chkmulticomp);
		$this->db->where('sys_code',$compcode);
		$q = $this->db->update('syscode',$multi);
		return $q;
	}
	public function udplineoa($chkmultilineapi)
	{	
		$multi = array('line_api'=> $chkmultilineapi);
		$q = $this->db->update('setup_default',$multi);
		return $q;
	}
	public function updcostlevel($compcode,$costlevel)
	{	
		$multi = array('costlevel'=> $costlevel);
		$this->db->where('sys_code',$compcode);
		$q = $this->db->update('syscode',$multi);
		return $q;
	}

	public function multicomp($compcode)
	{
		$this->db->select('multicomp,costlevel,close_btn_pr_to_po');
		$this->db->where('sys_code',$compcode);
		$q = $this->db->get('syscode')->result_array();
		// foreach ($q as $key => $value) {
		// 	$res = $value->multicomp;
		// }
		return $q;
	}

	public function line_OA_alert(){
		$this->db->select('line_api');
		$q = $this->db->get('setup_default')->result_array();
		return $q;
	}
	public function getprintdefualt(){
		$this->db->select('print_defualt');
		$q = $this->db->get('setup_default')->result_array();
		return $q;
	}
	public function updprintdefualt($chk)
	{	
		$data = array('print_defualt'=> $chk);
		$q = $this->db->update('setup_default',$data);
		return $q;
	}
	public function updpr_to_po_defualt($chk)
	{	
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data = array('close_btn_pr_to_po'=> $chk);
		$this->db->where('sys_code',$compcode);
		$q = $this->db->update('syscode',$data);
		return $q;
	}

}



/* End of file online_user_m.php */
/* Location: ./application/models/online_user_m.php */