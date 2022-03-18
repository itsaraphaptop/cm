<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->Model('auth_m');
		$this->load->model('module_m');
		$this->load->helper('date');
		$this->load->model('config_m');
	}

	public function index() {

		$status_login = $this->session->userdata('status_login');
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$type = $session_data['m_status'];
		if ($username == "" && $type == "") {
			$data['img'] = $this->config_m->compimg();
			$data['bgimg'] = $this->config_m->bgchange();
			$data['company'] = $this->config_m->company();
			$data['login_status'] = $status_login;
			
			  // $this->load->view('auth/header');
			//   $this->load->view('auth/index_newuse_v', $data);
			//   $this->load->view('auth/index_cm_v', $data); // new 
			  $this->load->view('auth/login_new_version_v', $data); // new 
			  // $this->load->view('auth/footer');
			// $this->load->view('auth/maintenance_v',$data);
		} else {
			switch ($type) {
			case 'md':
				redirect('panel/director');
				break;
			case 'm':
				redirect('panel/manag');
				break;
			case 'o':
				redirect('panel/office');
				// $this->load->view('auth/maintenance_v',$data);
				break;
			case 's':
				redirect('panel/site');
				break;
			}
		}
	}

	function companylist(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['position_name'] = $session_data['position_name'];
		$data['email'] = $session_data['m_email'];
		if ($username=="") {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$compcode = $this->input->post('compcode');
			$data['comp_img'] = "none";
			$array_login = $this->auth_m->chklogin($username, $password);
			$data['lati'] = $this->input->post('lati');
			$data['long'] = $this->input->post('long');
			if ($array_login["status"]){
				$data['username'] = $this->input->post('username');
				$data['password'] = $this->input->post('password');
				$get = $this->auth_m->logincomp($username);
				$data['imgu'] = $get[0]['uimg'];;
				$data['name'] = $get[0]['m_name'];
				$data['position_name'] = $get[0]['p_name'];
				$data['email'] = $get[0]['m_email'];
				$data['comp'] = $get[0]['compcode'];
				if($get[0]['dashboard']=="2"){
					$data['company'] = $this->auth_m->company();
				}else{
					$data['company'] = $this->auth_m->companybyuser($data['comp']);
				}
				$this->load->view('navtail/base_defualt/header_v',$data);
                $this->load->view('navtail/navtail_master_new_v');
				$this->load->view('panel/company_list_new_v');
				$this->load->view('navtail/base_defualt/footer_new_v');
			}else{
				redirect('/');
			}
		}else{
			$compcode = $session_data['compcode'];
			$data['username'] = $session_data['username'];
			$data['password'] = $this->input->post('password');
			$data['comp_img'] = "none";
			$get = $this->auth_m->logincomp($data['username']);
			$data['lati'] = $this->input->post('lati');
			$data['long'] = $this->input->post('long');
			$data['imgu'] = $get[0]['uimg'];;
			$data['name'] = $get[0]['m_name'];
			$data['dash'] = $get[0]['dashboard'];
			if($get[0]['dashboard']=="2"){
				$data['company'] = $this->auth_m->company();
			}else{
				$data['company'] = $this->auth_m->companybyuser($compcode);
			}
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			$this->load->view('panel/company_list_new_v');
			$this->load->view('navtail/base_defualt/footer_new_v');

		}

		
	}

	function login() {
		$username = $this->uri->segment(3);
		$password = "";
		$compcode = $this->uri->segment(4);
		$latitude = $this->uri->segment(5);
		$longitude = $this->uri->segment(6);

		// $username = $this->input->post('username');
		// $password = $this->input->post('password');
		// $compcode = $this->input->post('compcode');

		$company = $this->config_m->company_compcode($compcode);
		foreach ($company as $comp) {
			$ic_type = $comp->ic_type;
			$comp_img = $comp->comp_img;
			$companyname = $comp->company_name;
		}
		$print_defualt = $this->config_m->getprintdefualt();
		//call the model for auth
		$array_login = $this->auth_m->login($username, $password, $compcode);

		if ($array_login["status"]) {
			$this->db->select('*');
			$this->db->from('member');
			$this->db->join('department', 'department.department_id = member.m_department', 'left outer');
			$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
			$this->db->join('m_position', 'm_position.id = member.m_position', 'left outer');
			// $this->db->where('member.compcode', $compcode);
			$this->db->where('m_user', $username);
			$this->db->limit('1');

			$q = $this->db->get();
			$result = $q->result();
			foreach ($result as $val) {
				$m_id = $val->m_id;
				$type = $val->m_status;
				$m_code = $val->m_code;
				$name = $val->m_name;
				$position = $val->m_position;
				$p_name = $val->p_name;
				$project = $val->project_name;
				$projectid = $val->m_project;
				$projectcode = $val->project_code;
				$dep = $val->department_title;
				$depid = $val->m_department;
				$email = $val->m_email;
				$img = $val->uimg;
				$sign = $val->sign;
				$admin = "admin";
				$m_type = $val->m_type;
			}
			$data = array(
				'm_login' => date('Y-m-d H:i:s', now()),
			);
			$this->db->where('m_user', $username);
			$this->db->update('member', $data);
			if ($username == "admin") {

				$datalog = array(
					'user' => $username,
					'menu' => "login",
					'logindate' => date('Y-m-d H:i:s', now()),
					'ipaddress' => $this->input->ip_address(),
					'hostname' => php_uname ('n'),
					'compcode' => $compcode,
					'latitude' => $latitude,
					'longitude' => $longitude,
				);
				$this->db->insert('userlog', $datalog);
			} else {
				$datalog = array(
					'user' => $username,
					'menu' => "login",
					'logindate' => date('Y-m-d H:i:s', now()),
					'ipaddress' => $this->input->ip_address(),
					'hostname' => php_uname ('n'),
					'compcode' => $compcode,
					'latitude' => $latitude,
					'longitude' => $longitude,
				);
				$this->db->insert('userlog', $datalog);
			}
			///////// check menu.///////
			$this->db->select('*');
			$this->db->where('m_user', $username);
			$menu = $this->db->get('menu_right');
			$mres = $menu->result();
			foreach ($mres as $mval) {
				$moffce = $mval->m_office;
				$mpo = $mval->m_po;
				$mic = $mval->m_ic;
				$map = $mval->m_ap;
				$mar = $mval->m_ar;
				$mpm = $mval->m_pm;
				$mhr = $mval->m_hr;
				$master = $mval->m_master;
				$approve = $mval->pr_approve;
				$po_approve = $mval->po_approve;
				$pr_project_right = $mval->pr_project_right;
				$pettycash_approve = $mval->pettycash_approve;
				$user_right = $mval->user_right;
				$ic_poamt = $mval->ic_poamt_receipt;
				$m_bd = $mval->m_bd;
			}

			switch ($type) {
			case 'md':
				$newdata = array(
					'm_id' => $m_id,
					'username' => $username,
					'm_code' => $m_code,
					'm_status' => $type,
					'm_name' => $name,
					'm_dep' => $dep,
					'm_project' => $project,
					'projectid' => $projectid,
					'm_email' => $email,
					'img' => $img,
					'sessed_in' => TRUE,

				);
				$this->session->set_userdata('sessed_in', $newdata);

				redirect('panel/director');
				break;
			case 'm':
				$newdata = array(
					'm_id' => $m_id,
					'username' => $username,
					'm_code' => $m_code,
					'm_status' => $type,
					'm_name' => $name,
					'm_dep' => $dep,
					'm_project' => $project,
					'projectid' => $projectid,
					'm_email' => $email,
					'img' => $img,
					'sessed_in' => TRUE,

				);
				$this->session->set_userdata('sessed_in', $newdata);

				redirect('panel/manag');
				break;
			case 'o':
				$newdata = array(
					'm_id' => $m_id,
					'username' => $username,
					'm_status' => $type,
					'm_code' => $m_code,
					'm_name' => $name,
					'm_dep' => $dep,
					'm_depid' => $depid,
					'm_project' => $project,
					'm_position' => $position,
					'position_name' => $p_name,
					'projectid' => $projectid,
					'projectcode' => $projectcode,
					'm_email' => $email,
					'mpm' => $mpm,
					'moffce' => $moffce,
					'mpo' => $mpo,
					'mic' => $mic,
					'map' => $map,
					'mar' => $mar,
					'mhr' => $mhr,
					'approve' => $approve,
					'po_approve' => $po_approve,
					'pc_approve' => $pettycash_approve,
					'pr_project_right' => $pr_project_right,
					'master' => $master,
					'user_right' => $user_right,
					'img' => $img,
					'sign' => $sign,
					'compcode' => $compcode,
					'companyname' => $companyname,
					'admin' => $admin,
					'ic_type' => $ic_type,
					'ic_poamt' => $ic_poamt,
					'comp_img' => $comp_img,
					'mbd' => $m_bd,
					'mtype' => $m_type,
					'latitude' => $this->input->post('lati'),
					'longitude' => $this->input->post('long'),
					'print_defualt' => $print_defualt,
					'sessed_in' => TRUE,

				);

				$this->session->set_userdata('sessed_in', $newdata);

				redirect('panel/office');
				// redirect('panel/selectcompany');
				break;
			case 's':
				$newdata = array(
					'm_id' => $m_id,
					'username' => $username,
					'm_code' => $m_code,
					'm_status' => $type,
					'm_name' => $name,
					'm_project' => $project,
					'projectid' => $projectid,
					'm_depid' => $depid,
					'm_dep' => $dep,
					'm_email' => $email,
					'approve' => $approve,
					'img' => $img,
					'sessed_in' => TRUE,
					//'permission'=>$permission
				);
				$this->session->set_userdata('sessed_in', $newdata);

				redirect('panel/site');
				break;
			}

		} else {

			$this->session->set_userdata('status_login', $array_login);
			redirect('panel/office');
			
			// redirect('/');
		}
	}
	public function changepass() {
		$session_data = $this->session->userdata('sessed_in');
		$month = $this->config->item('time_reset_pass');
		$date_next = date('Y-m-d H:i:s', strtotime("+{$month} months"));
		$compcode = $session_data['compcode'];

		$username = $session_data['username'];
		$data = array(
			'm_pass' => sha1(sha1(md5($this->input->post('password')))),
			'date_pass' => $date_next,
		);

		$this->db->where('m_user', $username);
		$this->db->where('compcode', $compcode);
		//echo $username;
		$q = $this->db->update('member', $data);
		if ($q) {
			return true;
			// $this->logout();
		} else {
			return false;
		}
	}

	public function changepass_json() {

		 echo json_encode(["status" => $this->changepass()]);
		//$this->load->view('auth');
	}

	function logout() {
		$data_session = $this->session->userdata('sessed_in');
		try {
			$datalog = array(
					'user' => $data_session['username'],
					'menu' => "logout",
					'logindate' => date('Y-m-d H:i:s', now()),
					'ipaddress' => $this->input->ip_address(),
					'compcode' => $data_session['compcode'],
					'latitude' => $data_session['latitude'],
					'longitude' => $data_session['longitude'],

				);
				$this->db->insert('userlog', $datalog);
		} catch (Exception $e) {
			return false;
		}
		

		$this->auth_m->clear_active_logout($data_session['username'], $data_session['compcode']);
		$this->session->sess_destroy();
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");

		redirect('/', 'refresh');
	}
	public function requesttimeoff() {
		$session_data = $this->session->userdata('sessed_in');
		//  $compcode = $session_data['compcode'];
		$adddate = $this->input->post();
		$data = array(
			'leave_type' => $adddate['rqttype'],
			'leave_note' => $adddate['noterqt'],
			'emp_id' => $adddate['m_id'],
			'from_day' => $adddate['dayfrom'],
			'from_month' => $adddate['monthfrom'],
			'from_year' => $adddate['yearfrom'],
			'to_day' => $adddate['dayto'],
			'to_month' => $adddate['monthto'],
			'to_year' => $adddate['yearto'],
			'res_hour' => $adddate['totalday'],
			'status' => $adddate['rqt_status'],
			'emp_lead' => $adddate['emp_lead'],
			'nowtime' => $adddate['timee'],
		);
		$this->db->insert('emp_leave', $data);

		// $adddate = $this->input->post();
		$ruleupdate = array(
			'rqt_holiday' => $adddate['rqt_holiday'],
			'rqt_paid' => $adddate['new_paid'],
			'rqt_dayoff' => $adddate['new_dayoff'],
			'rqt_other' => $adddate['new_dayother'],

		);
		$this->db->where('emp_id', $adddate['m_id']);
		$this->db->update('emp_leave_rule', $ruleupdate);
		redirect('panel/office');

	}

	public function requesttimeoffupdate($m_id) {
		$session_data = $this->session->userdata('sessed_in');
		$adddate = $this->input->post();
		$ruleupdate = array('
          rqt_holiday' => $adddate['nowholiday'],
		);
		$this->db->update('emp_leave_rule', $ruleupdate);
		$this->db->where('emp_id', $m_id);
		redirect('userprofile');
	}

	public function user_online()
	{
		
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['users'] = $this->auth_m->user_online($compcode);
		$this->load->view('auth/users', $data);
	}

	public function user_online_index()
	{
		$data['users'] = $this->auth_m->user_online();
		$this->load->view('auth/users_index', $data);
	}

	public function login_m()
	{

		$status_login = $this->session->userdata('status_login');

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$type = $session_data['m_status'];

		if ($username == "" && $type == "") {
			$data['img'] = $this->config_m->compimg();
			$data['company'] = $this->config_m->company();
			$data['login_status'] = $status_login;
			
			$this->load->view('auth/header');
			$this->load->view('auth/index_vdo_mobile_v',$data);
			$this->load->view('auth/footer');
			// $this->load->view('auth/maintenance_v',$data);
		} else {
			//              $this->db->select('*');
			//              $this->db->from('member');
			//              $this->db->join('department','department.department_id = member.m_department','left outer');
			//              $this->db->join('project','project.project_id = member.m_project','left outer');
			// $this->db->where('m_user',$username);
			// $this->db->limit('1');
			// $q = $this->db->get();
			// $result = $q->result();
			// foreach ($result as $val)
			// {
			//     $type = $val->m_status;
			//     $name = $val->m_name;
			//                    $project = $val->project_name;
			//                     $projectid = $val->m_project;
			//                    $dep    = $val->department_title;
			//                    $email = $val->m_email;
			// }
			switch ($type) {
			case 'md':
				redirect('panel/director');
				break;
			case 'm':
				redirect('panel/manag');
				break;
			case 'o':
				redirect('panel/office');
				// $this->load->view('auth/maintenance_v',$data);
				break;
			case 's':
				redirect('panel/site');
				break;
			}
		}
	}
	public function app_login(){
		$username = $this->input->post('tel');
		$password = $this->input->post('password');
		$this->load->model('auth_m');
		$q = $this->auth_m->applogin($username, $password);
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
	}
	public function login_pin(){
		$username = $this->input->post('tel');
		$password = $this->input->post('password');
		$this->load->model('auth_m');
		$q = $this->auth_m->apploginpin($username, $password);
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
	}
	public function apps_login(){
		$username = $this->input->get('tel');
		$password = $this->input->get('password');
		// $username = '0942519661';
		// $password = 'admin';
		$this->load->model('auth_m');
		$q = $this->auth_m->applogin($username, $password);
		echo json_encode($q);
	}
	public function getmember()
	{
		$q = $this->auth_m->appuser();
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
	}
	public function sendemail(){
		$this->load->library('user_agent');  /// เรียกใช้ user agent class
        $this->load->library('email');
		// $session_data = $this->session->userdata('sessed_in');
		// $username = $session_data['username'];
		$config['useragent'] = 'itsaraphap.com'; // กำหนดส่งจากอะไร เช่น ใช่ชื่อเว็บเรา
        $config['protocol'] = 'smtp';  // สามารถกำหนดเป็น mail , sendmail และ smtp
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'ninjaerpm@gmail.com';
        $config['smtp_pass'] = 'Mc5s714040';
        $config['smtp_port'] = '25';
        $config['smtp_crypto'] = 'tls'; // รูปแบบการเข้ารหัส กำหนดได้เป้น tls และ ssl
		$config['mailtype'] = 'text'; // กำหนดได้เป็น text หรือ html
 
		$this->email->initialize($config); 
		$mail_input = $this->input->post('forgetemail');
		$message = "Don't worry, we all forget sometimes \n\n";
		$message .= "Hi itsaraphapth, \n";
		
		$this->email->set_newline("\r\n");
		
 
		$this->email->from('ninjaerpm@gmail.com','Forget Email');
		// $this->email->to('itsaraphap@icloud.com'); //ส่งถึงใคร
		$this->email->to($mail_input); //ส่งถึงใคร
		
		$this->email->subject('Forget Password'); //หัวข้อของอีเมล
		$this->email->message($message); //เนื้อหาของอีเมล
		
		// $this->email->send();
		if($this->email->send()){
			echo "email sent"," Congragulation Email Send Successfully.";
			// echo $this->email->print_debugger();
			return true;
		}else{
			echo "email_sent","You have encountered an error ";
			echo $this->email->print_debugger();
			return true;
		}
	}

	
}