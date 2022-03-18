<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class auth_m extends CI_Model {

	function __construct() {
		parent::__construct();

	}
	public function chklogin($name, $password){
		$this->db->select('m_user,m_pass,LoginStatus,m_code');
		$this->db->where('m_user', $name);
		$this->db->where('m_pass', sha1(sha1(md5($password))));
		$this->db->where('m_status','o');
		$this->db->limit(1);
		$query = $this->db->get('member');
		$return = array();
		$res = $query->result_array();
		if ($query->num_rows() == 1) {
			$return["status"] = true;
			$return["message"] = "d";
		}else{
			$return["status"] = false;
			$return["message"] = "รหัสผ่านไม่ถูกต้อง";
		}
		return $return;

	}
	public function login($name, $password, $compcode) {
		$this->db->select('m_user,m_pass,LoginStatus,m_code');
		$this->db->where('m_user', $name);
		// $this->db->where('m_pass', sha1(sha1(md5($password))));
		// $this->db->where('compcode', $compcode);
		$this->db->limit(1);
		$query = $this->db->get('member');
		$res = $query->result_array();
		$return = array();
		if ($query->num_rows() == 1) {
			//is LoginStatus == 1  => login , LoginStatus == 0 not login
			if (($res[0]["LoginStatus"]) == 0) {

				if ($this->active_login_m($name, $compcode)) {
					$return["status"] = true;
					// return true;
				} else {
					$return["status"] = false;
					$return["message"] = "active_login_m ไม่สำเร็จ";

					// return false;
				}
			} else {
				// user ไม่ได้ lohout
				if ($this->check_active_login($name, $compcode) == false) {
					$return["status"] = true;
					// return true;
				} else {
					// $return["status"] = false;
					$return["status"] = true;
					$return["message"] = "ผู้ใช้งานนี้กำลัง ใช้งานอยู่ไม่สามารถ เข้าสู่ระบบได้";
					// return false;
				}

			}
		} else {
			$return["status"] = false;
			$return["message"] = "รหัสผ่านไม่ถูกต้อง";
		}
		return $return;

	}

	public function testlogin($name, $password) {
		$this->db->select('m_email,m_pass');
		$this->db->where('m_email', $name);
		$this->db->where('m_pass', sha1(sha1(md5($password))));
		$query = $this->db->get('member');
		if ($query->num_rows() == 1) {

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function isLoggedIn() {
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		$is_logged_in = $this->session->userdata('logged_in');

		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('/');
			exit;
		}
	}
	// method update_login ใช้เมื่อมีการใช้งาน หน้าเพจ
	public function active_login_m($name) {
		$now = date('Y-m-d H:i:s');
		$this->db->set('LastUpdate', $now);
		$this->db->set('LoginStatus', '1');
		$this->db->where('m_user', $name);
		// $this->db->where('compcode', $compcode);

		if ($this->db->update('member')) {
			return true;
		} else {
			return false;
		}
	}

	public function clear_active_logout($name) {

		$now = date('Y-m-d H:i:s');
		$this->db->set('LastUpdate', $now);
		$this->db->set('LoginStatus', '0');
		$this->db->where('m_user', $name);
		// $this->db->where('compcode', $compcode);

		if ($this->db->update('member')) {
			return true;
		} else {
			return false;
		}
	}

	public function check_active_login($name) {
		// read config time_out
		$config_time = $this->config->item('time_out');

		$this->db->select(['LastUpdate', 'LoginStatus']);
		$this->db->where('m_user', $name);
		// $this->db->where('compcode', $compcode);
		$this->db->limit('1');
		$query = $this->db->get('member');
		$res = $query->result_array()[0];
		$LastUpdate = $res["LastUpdate"];
		$LoginStatus = $res["LoginStatus"];

		if ($LoginStatus == "0" || $LoginStatus == 0) {
			redirect('/auth/logout');
		}
		// time user login
		$time_lastUpdate = strtotime($LastUpdate);
		// time now
		$time_now = time();
		// diff time
		$diff_time = $time_now - $time_lastUpdate;

		if ($diff_time >= $config_time) {
			// time out
			return false;
		} else {
			// user active
			return true;
		}

	} // end function

	public function check_time_reset_pass($name, $compcode, $m_id) {
		// // read config
		$month = $this->config->item('time_reset_pass');
		$this->load->dbforge();
		$date_next = date('Y-m-d H:i:s', strtotime("+{$month} months"));
		$date_now = date('Y-m-d H:i:s');
		/// add  date_pass
		if (!$this->db->field_exists('date_pass', 'member')) {
			$fields = array(
				'date_pass' => array('type' => 'datetime', 'constraint' => '0', 'null' => true, 'DEFAULT' => $date_next),
			);
			$this->dbforge->add_column('member', $fields);
		}

		if ($name!=null) {
			$this->db->select("date_pass");
			$this->db->where(['m_user' => $name, 'compcode' => $compcode, 'm_id' => $m_id]);
			$this->db->limit(1);
			$query = $this->db->get("member");
	
			$res = $query->result_array()[0];
			$time_pass = strtotime($res["date_pass"]);
	
			$date_now = strtotime($date_now);
			$diff_time = $time_pass - $date_now;
	
			if ($diff_time <= 0) {
				redirect('/reset_pass', 'refresh');
			} else {
				return true;
			}
		}else{
			return true;
		}

		//var_dump($res);

	}

	public function user_online($compcode)
	{
		$this->db->select("*");
		$this->db->from("member");
		// $this->db->where("LoginStatus",1);
		$this->db->where("member.compcode", $compcode);
		$query = $this->db->get();
		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}
			
		return $res;
			
	}

	public function applogin($name, $password) {
		$this->db->select('m_user,m_pass,LoginStatus,m_code,m_name');
		$this->db->where('m_tel', $name);
		$this->db->where('m_user', $password);
		$this->db->limit(1);
		$query = $this->db->get('member');
		$res = $query->result_array();
		$return = array();
		if ($query->num_rows() == 1) {
			//is LoginStatus == 1  => login , LoginStatus == 0 not login
			
					// $return["status"] = false;
					$return["status"] = true;
					$return["name"] = $res[0]['m_name'];
					// return false;
		} else {
			$return["status"] = false;
			$return["message"] = "รหัสผ่านไม่ถูกต้อง";
		}
		return $return;

	}

	public function apploginpin($name, $password) {
		$this->db->select('m_user,m_pass,LoginStatus,m_code,m_name');
		$this->db->where('m_tel', $name);
		$this->db->where('pincode', $password);
		$this->db->limit(1);
		$query = $this->db->get('member');
		$res = $query->result_array();
		$return = array();
		if ($query->num_rows() == 1) {
			//is LoginStatus == 1  => login , LoginStatus == 0 not login
			
					// $return["status"] = false;
					$return["status"] = true;
					$return["name"] = $res[0]['m_name'];
					// return false;
		} else {
			$return["status"] = false;
			$return["message"] = "รหัสผ่านไม่ถูกต้อง";
		}
		return $return;

	}

	// public function applogin($name, $password) {
	// 	$this->db->select('m_user,m_pass,LoginStatus,m_code,m_name');
	// 	$this->db->where('m_tel', $name);
	// 	$this->db->where('m_pass', sha1(sha1(md5($password))));
	// 	$this->db->limit(1);
	// 	$query = $this->db->get('member');
	// 	$res = $query->result_array();
	// 	$return = array();
	// 	if ($query->num_rows() == 1) {
	// 		//is LoginStatus == 1  => login , LoginStatus == 0 not login
			
	// 				// $return["status"] = false;
	// 				$return["status"] = true;
	// 				$return["name"] = $res[0]['m_name'];
	// 				// return false;
	// 	} else {
	// 		$return["status"] = false;
	// 		$return["message"] = "รหัสผ่านไม่ถูกต้อง";
	// 	}
	// 	return $return;

	// }

	public function appuser(){
		$this->db->select('m_tel,m_pass,m_name');
		$query = $this->db->get('member')->result_array();
		$return['name'] = $query[0]['m_name'];
		$return['tel'] = $query[0]['m_tel'];
		$return['password'] = $query[0]['m_pass'];

		return $return;
	}
	public function company()
        {
          $this->db->select('comp_img,compcode,company_name,company_nameth,compcode');
          // $this->db->order_by('company_id','desc');
          $query = $this->db->get('company');
          $res = $query->result();
          return $res;
		}
	public function companybyuser($compcode)
        {
          $this->db->select('comp_img,compcode,company_name,company_nameth,compcode');
		  // $this->db->order_by('company_id','desc');
		//   $this->db->where('compcode',$compcode);
		//   $this->db->where('dashbord',$dash);
          $query = $this->db->get('company');
          $res = $query->result();
          return $res;
		}
		
		public function logincomp($username)
		{
			$this->db->select('uimg,m_name,p_name,m_email,member.compcode,dashboard');
			$this->db->from('member');
			$this->db->join('m_position','m_position.id = member.m_position');
			$this->db->where('m_user',$username);
			$this->db->limit(1);
			$res = $this->db->get()->result_array();
			return $res;
		}


}
