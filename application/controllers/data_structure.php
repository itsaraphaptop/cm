<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class data_structure extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model('online_user_m');
		$this->load->Model('report_m');
		

		// $session_data = $this->session->userdata('sessed_in');
		// $username = $session_data['username'];
		// if ($username == "") {
		//   redirect('/');
		// }

	}
	public function forprogrammer() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$data_user = $this->online_user_m->get_user_online();
		error_reporting(0);
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['data_online'] = $data_user;
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['background'] = $this->online_user_m->background();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_original_v');
		$this->load->view('programmer/datastructure_v');
		$this->load->view('navtail/base_master/footer_v');
	}
	public function setup_print_form() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$data_user = $this->online_user_m->get_user_online();
		error_reporting(0);
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['data_online'] = $data_user;
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		 $data['report'] = $this->report_m->allreport();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_original_v');
		$this->load->view('programmer/upload_form_print_v');
		$this->load->view('navtail/base_master/footer_v');
	}
	public function load_sys_defualt()
	{
		$session_data = $this->session->userdata('sessed_in');
		$data['compcode'] = $session_data['compcode'];
		$data['site_url'] = $this->online_user_m->site_url($data['compcode']);
		$data['multicomp'] = $this->online_user_m->multicomp($data['compcode']);
		$data['line_api'] = $this->online_user_m->line_OA_alert();
		$data['print_defualt'] = $this->online_user_m->getprintdefualt();
		
		$this->load->view('programmer/setup_defualt_v',$data);
	}
	public function updatesiteurl()
	{
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$site_url = $this->input->post('site_url');
		$multicomp = $this->input->post('chkmulticomp');
		$q = $this->online_user_m->upd_site_url($site_url,$compcode);
		
		if($q)
		{
			// var_dump($q);
			// die();
			// redirect('data_structure/forprogrammer');
			echo "success";
			return true;
		}else{
			var_dump($q);
			die();
		}
		
	}
	public function  updmlcomp()
	{
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$multicomp = $this->input->post('chkmulticomp');
		$q = $this->online_user_m->updmulticompany($compcode,$multicomp);
		if($q)
		{
			echo $multicomp;
			return true;
		}else{
			var_dump($q);
			die();
		}
	}
	public function  updlineoa()
	{
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$chkmultilineapi = $this->input->post('chkmultilineapi');
		$q = $this->online_user_m->udplineoa($chkmultilineapi);
		if($q)
		{
			echo $chkmultilineapi;
			return true;
		}else{
			var_dump($q);
			die();
		}
	}
	public function  udpprint()
	{
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$chkprintinput = $this->input->post('chkprintinput');
		$q = $this->online_user_m->updprintdefualt($chkprintinput);
		if($q)
		{
			echo $chkprintinput;
			return true;
		}else{
			var_dump($q);
			die();
		}
	}
	public function  udppr_to_po()
	{
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$chkpr_po_input = $this->input->post('chkpr_po_input');
		$q = $this->online_user_m->updpr_to_po_defualt($chkpr_po_input);
		if($q)
		{
			echo $chkpr_po_input;
			return true;
		}else{
			var_dump($q);
			die();
		}
	}
	public function  updcostlevel()
	{
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$costlevel = $this->input->post('costlevel');
		$q = $this->online_user_m->updcostlevel($compcode,$costlevel);
		if($q)
		{
			echo $costlevel;
			return true;
		}else{
			var_dump($q);
			die();
		}
	}

	public function check_out_user() {
		$m_code = $this->input->post("m_code");
		$m_user = $this->input->post("m_user");

		$array_res = $this->online_user_m->check_out_user_m($m_code, $m_user);
		//var_dump($array_res);
		echo json_encode($array_res);

	}

	public function clear_data(){
		// $tables = $this->db->list_tables();
		$table_delete = file_get_contents("table.txt");
		$array_table_delete = explode(",", $table_delete);
		
			

		foreach ($array_table_delete as $table)
		{
			if(substr(trim($table), 0,1)!="#"){
		   		if($this->db->truncate(trim($table))){
		   			echo date("Y-m-d H:i:s")." truncate ".trim($table)." [success]"."<br>";
		   		}else{
		   			echo date("Y-m-d H:i:s")." truncate ".trim($table)." [unsuccess]"."<br>";
		   		}
		   		$this->db->close();
			}
		}
		// $petty = $this->auto_data_pettycash();
		// $po = $this->auto_data_po();
		// $lo = $this->auto_data_lo();
		echo date("Y-m-d H:i:s")." Clead data Successfully <br/>";
		// echo $petty.'<br/>';
		// echo $po.'<br/>';
		// echo $lo;
	}

	public function auto_data_pettycash() {
		$sql = file_get_contents("sql/create_pettycash.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
		return date("Y-m-d H:i:s").' Create data Pettycash Success';
	}

	public function auto_data_po() {
		$sql = file_get_contents("sql/create_po.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
		return date("Y-m-d H:i:s").' Create data Po Success';
	}

	public function auto_data_lo() {
		$sql = file_get_contents("sql/create_lo.sql");
		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach ($sqls as $statement) {
			$statment = $statement . ";";
			$this->db->query($statement);
		}
		return date("Y-m-d H:i:s").' Create data lo Success';
	}
	public function userlog()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['compcode'] = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		// $data['data_online'] = $data_user;
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['res'] = $this->online_user_m->userlogs($data['compcode']);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_original_v');
		$this->load->view('programmer/userlogs_v');
		$this->load->view('navtail/base_master/footer_v');
	}
	public function setup_runnumber() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		// $data_user = $this->online_user_m->get_user_online();
		error_reporting(0);
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['data_online'] = $data_user;
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_original_v');
		$this->load->view('programmer/setup_runnumber_v');
		$this->load->view('navtail/base_master/footer_v');
	}

	public function load_file_log(){
		
		$file = "line.log"; //gammu's sms log
		$data = file($file);
	
		$end = count($data);
		$first = $end-10;
	
		$number = range($first,$end);
		foreach($number as $n) {
			echo $data[$n]."\n";
		}
	
	}
}