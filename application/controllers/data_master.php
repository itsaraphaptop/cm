<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class data_master extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model('datastore_m');
		$this->load->helper('date');
	}
	public function main(){
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$data['position'] = $session_data['m_position'];
		$data['position_name'] = $session_data['position_name'];
		$data['email'] = $session_data['m_email'];
		$data['dep'] = $session_data['m_dep'];
		$data['mtype'] = $session_data['mtype'];
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['imgu'] = $session_data['img'];
		$data['compcode'] = $session_data['compcode'];
		$data['companyname'] = $session_data['companyname'];
		$data['comp_img'] = $session_data['comp_img'];
		$data['module_id'] = $this->uri->segment(3);
	   // check get permission unsuccessful
		if ($data['username'] == "") {

			redirect('/');
		}else{
			$this->load->model('permission_m');
			$data['modulename'] = $this->permission_m->getmodolename($data['module_id']);
			$data['permission'] = $this->permission_m->get_module_h_panel($data['username']);
			$this->load->view('navtail/base_defualt/header_v',$data);
			$this->load->view('navtail/navtail_master_new_v');
			// $this->load->view('navtail/navtail_sub_manu_new_v');
			$this->load->view('navtail/navtail_master_submodule_v');
			// $this->load->view('panel/module_all_v');
			$this->load->view('datastore/main_index_v');
			$this->load->view('navtail/base_defualt/footer_new_v');
		}
	}
	public function main_index()
	{
		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			
			$this->load->view('navtail/navtail_master_v');

			
			$this->load->view('datastore/main_index');

			
			$this->load->view('base/footer_v');

		}
     
	}
	public function index() {

		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			// $data['getproj'] = $this->datastore_m->getproject();
			// $data['resmem'] = $this->datastore_m->getmember();
			// $data['getunit'] = $this->datastore_m->getunit();
			// $data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			// menu master MASTER NAVIGATION
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/main_index');

			// $this->load->view('datastore/project_right/main_project_right_v');
			// $this->load->view('datastore/dashboard_v');

			// account
			// $this->load->view('navtail/navtail_account_v');
			// account

			// ic
			// $this->load->view('navtail/navtail_IC_v');
			// ic

			// $this->load->view('navtail/navtail_HR_v');
			// $this->load->view('base/footer_v');
			$this->load->view('base/footer_v');

		}
	}
	public function setup_permision() {
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$da['m_id'] = $session_data['m_id'];
		$da['compcode'] = $session_data['compcode'];
		$data['ic_poamt'] = $session_data['ic_poamt'];
		if ($data['username'] == "") {
			redirect('/');
		} else {

			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			if ($data['username']=="admin"){
				$data['getmember'] = $this->datastore_m->getmember_bycompcode();
			}else{
				$data['getmember'] = $this->datastore_m->getmember_permisstion_bycompcode();
			}

			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/permission/permission_main_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function setupcostcode() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['username'] = $session_data['username'];
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['ccosttype'] = $this->datastore_m->getcost_type();
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/costcode/new/costtype_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function setupcostgroupcode() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$typeid = $this->uri->segment(3);
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['typeid'] = $typeid;
			$data['ccostgroup'] = $this->datastore_m->getcost_group($typeid);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/costcode/new/costgroup_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function setupcostsubgroupcode() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['typeid'] = $this->uri->segment(3);
			$data['groupcode'] = $this->uri->segment(4);
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['subgroup'] = $this->datastore_m->getcost_subgroup($data['typeid'], $data['groupcode']);
			$data['resacc'] = $this->datastore_m->acc_chart($compcode);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/costcode/new/costsubgroup_v', $data);
			$this->load->view('base/footer_v');
		}
	}

	/// ACCOUNT MASTER

	public function setup_debtor() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->getdebtor($compcode);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/debtor/debtor_list_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function new_debtor() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/debtor/new_debtor_v');
			$this->load->view('base/footer_v');
		}
	}
	public function edit_debtor() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$debcode = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->getdebtorcode($compcode, $debcode);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/debtor/edit_debtor_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function new_bank() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];

			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/bank/new_bank_v');
			$this->load->view('base/footer_v');
		}
	}
	public function getbank() {
		$res = $this->datastore_m->getbank();
		foreach ($res as $value) {
			echo "<option value='" . $value->bank_code . "'> [ " . $value->bank_code . " ] - " . $value->bank_name . "</option>";
		}
	}

	public function add_paid_mester(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$da['imgu'] = $session_data['img'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {

			$this->db->select("*");
			$this->db->where("compcode",$compcode);
			$array_bank =  $this->db->get("type_paid")->result_array();
			
			$da['array_paid'] = $array_bank;
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/master/paid');
			$this->load->view('base/footer_v');
		}
	}

	public function add_paid_mester_action(){
		$data =$this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		
		if($compcode!=""){
			$data_insert =array(
				"name"=>$data["name"],				
				"compcode" =>$compcode
			);
			$this->db->insert("type_paid",$data_insert);
		}


		redirect(base_url().'data_master/add_paid_mester');
	}

	public function edit_paid_mester_action(){
		$data =$this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		
		if($compcode!=""){
			$data_update =array(
				"name"=>$data["name"],								
			);
			$this->db->where("id",$data["id"]);
			$this->db->where("compcode",$compcode);
			$this->db->update("type_paid",$data_update);
		}


		redirect(base_url().'data_master/add_paid_mester');
	}


	public function add_bank_mester(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$da['imgu'] = $session_data['img'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {

			$this->db->select("*");
			$this->db->where("status","Y");
			$this->db->where("compcode",$compcode);
			$array_bank =  $this->db->get("master_bank")->result_array();
			// echo "<pre>";
			// var_dump($array_bank);die();
			$this->db->select("*");
			$this->db->group_by("bank");
			$checkbank =  $this->db->get("receipt_detail")->result_array();
			$this->db->select("*");
			$this->db->group_by("bank_name");
			$checkbank2 =  $this->db->get("bank")->result_array();
			foreach ($array_bank as $key => $value) {
				foreach ($checkbank as $key2 => $value2) {
					foreach ($checkbank2 as $key3 => $value3) {
						if ($value['name_th']== $value2['bank'] || $value['name_th']== $value3['bank_name']) {
					 		$array_bank[$key]['disable'] = "true";
					 		break;
					 	}else{
					 		$array_bank[$key]['disable'] = "false";	
					 	}
					 }
				}	
			}
			// echo "<pre>";
			// print_r($array_bank); die();
			$da['array_bank'] = $array_bank;
			// $da['checkbank'] = $checkbank;
			// var_dump($da['checkbank']);die();
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/bank/add_new_bank_v');
			$this->load->view('base/footer_v');
		}
	}
	public function del_bank_master()
	{
		$input = $this->input->post();
		// var_dump($input);
		$update = array('status' => "del" );
		$this->db->where('id',$input['iddel']);
		$boolen = $this->db->update('master_bank',$update);
		$res = array();
		if ($boolen) {
			$res['status'] = true;
			$res['mes'] = "ทำการลบสำเร็จ !";
		}else{
			$res['status'] = false;
		}
		echo json_encode($res);
	}
	public function add_bank_mester_action(){
		$data =$this->input->post();
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// var_dump($data);die();
		if($compcode!=""){
			$data_insert =array(
				"name_th"=>$data["name_bank_th"],
				"name_en"=>$data["name_bank_th"],
				"code_bank"=>$data["code_bank"],
				"code_standard"=>$data["code_standard"],
				"status"=>"Y",
				"compcode" =>$compcode
			);
			$this->db->insert("master_bank",$data_insert);
		}


		redirect(base_url().'data_master/add_bank_mester');
	}

	public function edit_bank_mester_action(){

		$data =$this->input->post();
		// var_dump($data);die();
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// var_dump($data);die();
		if($compcode!=""){

			$data_update =array(
				"name_th"=>$data["name_bank_th"],
				"code_bank"=>$data["code_bank"],
				"code_standard"=>$data["code_standard"],				
			);
			$this->db->where("id",$data["id"]);
			$this->db->where("compcode",$compcode);
			$this->db->update("master_bank",$data_update);
		}


		redirect(base_url().'data_master/add_bank_mester');

	}



	public function geteditbank() {
		$id = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->geteditbank($id);
		$this->load->view('datastore/bank/modalbank/modal_editbank', $data);
	}

	public function geteditbranch() {
		$bankcode = $this->uri->segment(3);
		$branchcode = $this->uri->segment(4);
		$data['res'] = $this->datastore_m->editbranchname($bankcode, $branchcode);
		$this->load->view('datastore/bank/modalbank/modal_editbranch', $data);
	}

	public function geteditbankaccount() {
		$bankcode = $this->uri->segment(3);
		$branchcode = $this->uri->segment(4);
		$bankacc = $this->uri->segment(5);
		$data['res'] = $this->datastore_m->editbankaccount($bankcode, $branchcode, $bankacc);
		$this->load->view('datastore/bank/modalbank/modal_editbankaccount', $data);
	}

	public function balanceforwardd() {
		$data['bankcode'] = $this->uri->segment(3);
		$data['branchcode'] = $this->uri->segment(4);
		$data['bankacc'] = $this->uri->segment(5);

		$this->load->view('datastore/bank/modalbank/modal_balanceforwardd', $data);
	}

	public function getbankbranch() {
		$bankcode = $this->uri->segment(3);
		$res = $this->datastore_m->getbankbranch($bankcode);
		foreach ($res as $value) {
			echo "<option value='" . $value->branch_code . "'> [ " . $value->branch_code . " ] - " . $value->branch_name . "</option>";
		}
	}
	public function getacconuntno() {
		$bankcode = $this->uri->segment(3);
		$branchcode = $this->uri->segment(4);
		$res = $this->datastore_m->bankaccount($bankcode, $branchcode);
		foreach ($res as $value) {
			echo "<option value='" . $value->acc_code . "'> [ " . $value->acc_code . " ] - " . $value->acc_name . "</option>";
		}
	}
	public function getbankn() {
		$bankcode = $this->uri->segment(3);
		$res = $this->datastore_m->getbankname($bankcode);
		foreach ($res as $k) {
			$bname = $k->bank_name;

		}
		echo $bname;
		return true;
	}
	public function getbranchn() {
		$bankcode = $this->uri->segment(3);
		$branch = $this->uri->segment(4);
		$res = $this->datastore_m->getbankbranchname($bankcode, $branch);
		foreach ($res as $k) {
			$branchname = $k->branch_name;
		}
		echo $branchname;
		return true;
	}
	public function getaccountn() {
		$bankcode = $this->uri->segment(3);
		$branch = $this->uri->segment(4);
		$acco = $this->uri->segment(5);
		$res = $this->datastore_m->bankaccountname($bankcode, $branch, $acco);
		foreach ($res as $k) {
			$accname = $k->acc_name;
		}
		echo $accname;
		return true;
	}
	public function getaccountncode() {
		$bankcode = $this->uri->segment(3);
		$branch = $this->uri->segment(4);
		$acco = $this->uri->segment(5);
		$res = $this->datastore_m->bankaccountname($bankcode, $branch, $acco);
		foreach ($res as $k) {
			$accname = $k->acc_code;
		}
		echo $accname;
		return true;
	}
	public function setup_project_main() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			$data['proj'] = $this->datastore_m->getproject();
			$data['sum'] = $this->datastore_m->sumcountpro();
			$data['projclose'] = $this->datastore_m->getprojectclose();
			$data['sumclose'] = $this->datastore_m->sumcountproclose();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/main_v');
			$this->load->view('base/footer_v');
		}
	}

	public function new_project() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$count = $this->datastore_m->count_project_id();
			$y = date("Y");
			if (count($count) > 0) {
				$id = $count[0]['project_id'] + 1;
				$runproject_id = $y . "0" . add_zero($id);
			} else {
				$id = "1";
				$runproject_id = $y . "0" . add_zero($id);
			}
			// $sub_project = "";
			// $count = $this->datastore_m->count_project_id();
			// echo $y."0".;die();
			// count_sub_project()
			$data['runproject_id'] = $runproject_id;
			// var_dump($data['runproject_id']);
			// die();
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['getjobtype'] = $this->datastore_m->get_job_type($compcode);
			$data['getbusi'] = $this->datastore_m->get_business_active($compcode);
			// $data['getdesc'] = $this->datastore_m->get_job_desc($compcode);  get job system 
			$data['getsystem'] = $this->datastore_m->get_system($compcode);
			$data['sub_add'] = $this->datastore_m->get_address($compcode);
			// echo $compcode;
			// var_dump($data['getsystem']);die();
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			// $data['proj'] = $this->datastore_m->getproject();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/new_project_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function editproject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcodes'] = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		$projid = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['nameproject'] = $this->datastore_m->getnameproject($projid);
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			$data['getsystem'] = $this->datastore_m->get_system($data['compcodes']);
			$data['proj'] = $this->datastore_m->getproject_proj($projid);
			$data['getdesc'] = $this->datastore_m->get_job_desc($data['compcodes']);
			$data['getbusi'] = $this->datastore_m->get_business_active($data['compcodes']);
			// var_dump($data['getdesc']);die();
			$data['getjobtype'] = $this->datastore_m->get_job_type($data['compcodes']);
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/edit_project_v');
			$this->load->view('base/footer_v');
		}
	}
	public function viewproject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		$projid = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['nameproject'] = $this->datastore_m->getnameproject($projid);
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			$data['getsystem'] = $this->datastore_m->get_system($compcode);
			$data['proj'] = $this->datastore_m->getproject_proj($projid);
			$data['getdesc'] = $this->datastore_m->get_job_desc($compcode);
			$data['getjobtype'] = $this->datastore_m->get_job_type($compcode);
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/view_project_v');
			$this->load->view('base/footer_v');
		}
	}
	public function project_sub() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		$projid = $this->uri->segment(3);
		$proj_id_full = $this->uri->segment(4);
		$data['getsystem'] = $this->datastore_m->get_system($compcode);
		if ($username == "") {
			redirect('/');
		} else {
				function add_zero_dynamic($number, $max){
					$size = strlen($number);
					$zero_full = $max-$size;
					$zero = "0";
					for($index = 1 ;$index < $zero_full ; $index++){
						$zero .="0";
					}
					return $zero.$number;
					
				}
			$y = date("Y");

			$count_pro_code 	= $this->datastore_m->count_sub_project($projid);
			$code_project_cut 	= $this->datastore_m->cutcode_project($projid);

			if ($count_pro_code[0]['subproject_no'] > 0 ) {

				$id = $count_pro_code[0]['subproject_no'] + 1;
				$codepro =$code_project_cut[0]['cutcode'] * 1;
				$sub_project_id = $y . add_zero_dynamic($codepro, 3) . add_zero_dynamic($id, 2);

			}else{

				$id = "1";
				$codepro =$code_project_cut[0]['cutcode'] * 1;
				$sub_project_id = $y . add_zero_dynamic($codepro, 3) . add_zero_dynamic($id, 2);
				 
			}

			$data['sub_proid'] = $sub_project_id;
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['getjobtype'] = $this->datastore_m->get_job_type($compcode);
			$data['getbusi'] = $this->datastore_m->get_business($compcode);
			$data['getdesc'] = $this->datastore_m->get_job_desc($compcode);
			$data['getsystem'] = $this->datastore_m->get_system($compcode);
			$data['sub_add'] = $this->datastore_m->get_address($compcode);
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			$data['proj'] = $this->datastore_m->getproject_proj($projid);
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/project_sub', $data);
			$this->load->view('base/footer_v');
		}
	}

	public function vender_list() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->getvender();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/vender/master/main_v');
			$this->load->view('base/footer_v');
		}
	}
	public function new_vender() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['mem'] = $this->datastore_m->getmember_venber();
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['bus'] = $this->datastore_m->ven_business($compcode);
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			// $data['proj'] = $this->datastore_m->getproject();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/vender/master/new_vender_v');
			$this->load->view('base/footer_v');
		}
	}
	public function edit_vender() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$vendercode = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->getvendercode($compcode, $vendercode);
			// echo '<pre>';
			// print_r($data);die();
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/vender/master/edit_vender_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function setupunit() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			// $data['res'] = $this->datastore_m->getvender();
			$data['res'] = $this->datastore_m->getunit();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/unit/main_v');
			$this->load->view('base/footer_v');
		}
	}
	public function setupemployee() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			if ($username=="admin") {
				$data['mem'] = $this->datastore_m->getmember_all();
			}else{
				$data['mem'] = $this->datastore_m->getmember();
			}
			// $this->load->library('multipledb');
			// $data['license'] = $this->multipledb->db->query("select * from license")->num_rows();

			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/employee/main_v');
			$this->load->view('base/footer_v');
		}
	}
	public function loademployee() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['mem'] = $this->datastore_m->getmember();
		$this->load->view('datastore/employee/load_employee_v', $data);
	}
	public function accchart_list() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->list_acc_chart($compcode);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/account_chart/acc_list_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function new_accchart() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/account_chart/new_acc_v');
			$this->load->view('base/footer_v');
		}
	}
	public function edit_accchart() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->editacc_chart($id, $compcode);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/account_chart/edit_acc_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function newmatcode() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/share/modal_intmaterial2_v', $data);
			// $this->load->view("datastore/matcode/main_v",$data);
			$this->load->view('base/footer_v');
		}
	}
	public function newmatcode_nv() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		} else {
			$data['newback'] = $this->uri->segment(3);
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			// $this->load->view('navtail/base_master/tail_v');
			// $this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/share/modal_intmaterial2_v', $data);
			// $this->load->view("datastore/matcode/main_v",$data);
			// $this->load->view('base/footer_v');
		}
	}
// inventory master
	public function cost_type() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$datata['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['gettype'] = $this->datastore_m->costtype();
		if ($username == "") {
			redirect('/');
		} else {
			// $this->load->view('navtail/base_angular/header_v', $data);
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/inventory/cost_type_v', $data);
			// $this->load->view('navtail/base_angular/base_js_v', $data);
			$this->load->view('base/footer_v');
		}
	}

	public function select_project() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$datata['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$this->load->view('navtail/base_angular/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/inventory/open_warehouse_pj_v');
			$this->load->view('navtail/base_angular/base_js_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function select_project_type() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$datata['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$this->load->view('navtail/base_angular/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/inventory/open_project_type_v');
			$this->load->view('navtail/base_angular/base_js_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function department() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$datata['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['res'] = $this->datastore_m->department();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/department/department_v');
			$this->load->view('base/footer_v');
		}
	}

	public function expensother() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];

			$data['aa'] = $this->datastore_m->acc_chart($compcode);
			$data['res'] = $this->datastore_m->list_expensother();
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/expensother/expens_main_v', $data);
			$this->load->view('base/footer_v');
		}
	}

	public function ar_option() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->Model('ar_m');
			$data['res'] = $this->ar_m->option_type();
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/ar/option_main_v', $data);
			$this->load->view('base/footer_v');
		}
	}

	public function setupcostcode_main() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['ccosttype'] = $this->datastore_m->getcost_type();
			$data['subcost'] = $this->datastore_m->getcost_subgroup_m();
			$data['costtype'] = $this->datastore_m->getcostcode_type();
			$data['costgroup'] = $this->datastore_m->getcostcode_group();
			$data['costsubgroup'] = $this->datastore_m->getcostcode_subgroup();
			$data['costspec'] = $this->datastore_m->getcostcode_spec();
			$data['group_bytae'] = $this->datastore_m->all_costcode_group();
			$data['flagcostcode'] = $this->datastore_m->costlevel($compcode);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/costcode/main/master_costcode_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function setupcostcode_main_nv() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['newback'] = $this->uri->segment(3);
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['ccosttype'] = $this->datastore_m->getcost_type();
			$data['subcost'] = $this->datastore_m->getcost_subgroup_m();
			$data['costtype'] = $this->datastore_m->getcostcode_type();
			$data['costgroup'] = $this->datastore_m->getcostcode_group();
			$data['costsubgroup'] = $this->datastore_m->getcostcode_subgroup();
			$data['costspec'] = $this->datastore_m->getcostcode_spec();
			$data['group_bytae'] = $this->datastore_m->all_costcode_group();
			$data['flagcostcode'] = $this->datastore_m->costlevel($compcode);
			$this->load->view('navtail/base_master/header_v', $da);
			// $this->load->view('navtail/base_master/tail_v');
			// $this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/costcode/main/master_costcode_v', $data);
			// $this->load->view('base/footer_v');
		}
	}

	function generate_license($suffix = 123456) {
		// Default tokens contain no "ambiguous" characters: 1,i,0,o
		if (isset($suffix)) {
			// Fewer segments if appending suffix
			$num_segments = 3;
			$segment_chars = 6;
		} else {
			$num_segments = 4;
			$segment_chars = 5;
		}
		$tokens = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
		$license_string = '';
		// Build Default License String
		for ($i = 0; $i < $num_segments; $i++) {
			$segment = '';
			for ($j = 0; $j < $segment_chars; $j++) {
				$segment .= $tokens[rand(0, strlen($tokens) - 1)];
			}
			$license_string .= $segment;
			if ($i < ($num_segments - 1)) {
				$license_string .= '-';
			}
		}
		// If provided, convert Suffix
		if (isset($suffix)) {
			if (is_numeric($suffix)) {
				// Userid provided
				$license_string .= '-' . strtoupper(base_convert($suffix, 10, 36));
			} else {
				$long = sprintf("%u\n", ip2long($suffix), true);
				if ($suffix === long2ip($long)) {
					$license_string .= '-' . strtoupper(base_convert($long, 10, 36));
				} else {
					$license_string .= '-' . strtoupper(str_ireplace(' ', '-', $suffix));
				}
			}
		}
		echo $license_string;
	}

	public function vender_business() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$com = $this->uri->segment(3);
			$da['com'] = $com;
			$da['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$da['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$da['res'] = $this->datastore_m->ven_business($com);
			$da['gcompname'] = $this->datastore_m->getcompanyname($com);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/vender/main_business_v');
			$this->load->view('base/footer_v');
		}
	}
	public function geteditxps() {
		$exps = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->get_expensother($exps);

		$this->load->view('datastore/expensother/modal_editexpsens', $data);
	}

	public function approve_prpo() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			$data['proj'] = $this->datastore_m->getproject();
			$pj = $this->uri->segment(3);
			$tendercode = $this->uri->segment(4);

			$data['pj'] = $this->datastore_m->project_approve($pj);

			$data['pr'] = $this->datastore_m->apr($pj);
			$data['po'] = $this->datastore_m->apo($pj);
			$data['wo'] = $this->datastore_m->awo($pj);
			$data['pc'] = $this->datastore_m->apc($pj);
			$data['bk'] = $this->datastore_m->abk($pj);
			$data['ap'] = $this->datastore_m->aap($pj);
			$data['ic'] = $this->datastore_m->aic($pj);
			$data['td'] = $this->datastore_m->td($tendercode);
			$data['pjcodesegment'] = $this->uri->segment(3);
			$data['tendercode'] = $this->uri->segment(4);

			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/approveprpo');
			$this->load->view('base/footer_v');
		}
	}

	//master permission method dev by ice
	public function master_permission() {
		$session_data = $this->session->userdata('sessed_in');
		$data['imgu'] = $session_data['img'];
		$data['name'] = $session_data['m_name'];
		$master_permission = $this->datastore_m->get_permission_master();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('datastore/permission/master_permission_v', ["master_permission" => $master_permission]);
		$this->load->view('base/footer_v');
	}

	public function master_job_desc()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['imgu'] = $session_data['img'];
	$data['name'] = $session_data['m_name'];
	$compcode = $session_data['compcode'];
	$data['res'] = $this->datastore_m->get_job_desc($compcode);
	$this->load->view('navtail/base_master/header_v', $data);
	$this->load->view('navtail/base_master/tail_v');
	$this->load->view('navtail/navtail_master_v');
	$this->load->view('datastore/job_description/master_jobdesc_v');
	$this->load->view('base/footer_v');
	}

	public function master_job_type()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['imgu'] = $session_data['img'];
	$data['name'] = $session_data['m_name'];
	$compcode = $session_data['compcode'];
	$data['res'] = $this->datastore_m->get_job_type($compcode);
	$this->load->view('navtail/base_master/header_v', $data);
	$this->load->view('navtail/base_master/tail_v');
	$this->load->view('navtail/navtail_master_v');
	$this->load->view('datastore/job_type/master_jobtype_v');
	$this->load->view('base/footer_v');
	}

	public function del_system_edit($pj_code,$pj_job){
		$data = array();
		$res = $this->datastore_m->del_system($pj_code,$pj_job);
		if ($res) {
			$data['status'] = true;	
		}else{
			$data['status'] = false;
			$data['message'] = 'sql func del_system error!!';
		}

		echo json_encode($data);
	}


	public function approve_department() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {

			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];

			$dp_id = $this->uri->segment(3);
			$data['dp_id'] = $this->datastore_m->get_department_name($dp_id);


			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/project/master/approve_department');
			$this->load->view('base/footer_v');
		}
	}
		public function setupsystem()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['imgu'] = $session_data['img'];
	$data['name'] = $session_data['m_name'];
	$compcode = $session_data['compcode'];
	$data['res'] = $this->datastore_m->get_system_m($compcode);
	$this->load->view('navtail/base_master/header_v', $data);
	$this->load->view('navtail/base_master/tail_v');
	$this->load->view('navtail/navtail_master_v');
	$this->load->view('datastore/system/master_system_v');
	$this->load->view('base/footer_v');
	}

	public function del_sub_project($sub_id)
	{
		$return = array();
		$this->db->where('project_id', $sub_id);
		$delete = $this->db->delete('project');

		if ($delete) {
			$return['status'] = true;
			$return['message'] = 'ลบ subproject เรียบร้อยแล้ว';
		}else{
			$return['status'] = false;
			$return['message'] = 'ไม่สามารถลบได้';
		}

		echo json_encode($return);

	}
	public function costcode_report(){
		  $base_url = $this->config->item("url_report");
		  
          $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $file = "costgroup_report.mrt";
          $send= "{$urls}{$file}";
            redirect($base_url.$send); 
        }
    public function new_expens() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];

			// $data['aa'] = $this->datastore_m->acc_chart($compcode);
			// $data['res'] = $this->datastore_m->acc_expensother();
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/expensother/new_editexpsens', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function edit_expens() {
		$code = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['getproj'] = $this->datastore_m->getproject();
			$data['resmem'] = $this->datastore_m->getmember();
			$data['getunit'] = $this->datastore_m->getunit();
			$data['getdep'] = $this->datastore_m->department();
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$data['res'] = $this->datastore_m->acc_expensother_code($code);
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/expensother/edit_editexpsens', $data);
			$this->load->view('base/footer_v');
		}
	}



	public function chk_job_type($code){
		$this->db->select('type_code');
		$this->db->where('type_code',$code);
	    $query = $this->db->get('master_jobtype');
	    $res = $query->result();

	    $return = array();

	    if ($res != NULL) {
	    	$return['status']  = true;
	    }else{
	    	$return['status']  = false;
	    }

	    echo json_encode($return);
	   
	}


	public function insert_job(){
		$date = date('Y-m-d H:i:s');
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$input = $this->input->post();
		$data = array(
					'type_code' => $input['type_code'],
					'type_name' => $input['type_name'],
					'compcode' => $compcode,
					'type_active' => 'Y',
					'useradd' => $username,
					'createdate' => $date
				);
	
		
		$query = $this->db->insert('master_jobtype', $data);

			$return = array();

			if ($query) {
			   $return['status']  = true;
			   $return['message']  = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
			}else{
			   $return['status']  = false;
			   $return['message']  = 'เพิ่มข้อมูลไม่สำเร็จ';
			}

			echo json_encode($return);

	}

	public function costtype_tae() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$name = $this->input->post('name');
		$this->db->select('ctype_name');
		$this->db->from('cost_subgroup');
		$this->db->like('ctype_name', $name);
		$this->db->group_by('ctype_name');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function get_costcode() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('ctype_name');
		$this->db->from('cost_subgroup');
		$this->db->group_by('ctype_name');
		$this->db->where('ctype_code', $code);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function get_costcode_group() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('cgroup_name');
		$this->db->from('cost_subgroup');
		$this->db->group_by('cgroup_name');
		$this->db->where('cgroup_code', $code);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function get_subgroup_code() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('csubgroup_name');
		$this->db->from('cost_subgroup');
		$this->db->group_by('csubgroup_name');
		$this->db->where('csubgroup_code', $code);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function costcode_tae() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$name = $this->input->post('name');
		$this->db->select('ctype_code');
		$this->db->from('cost_subgroup');
		$this->db->like('ctype_code', $name);
		$this->db->group_by('ctype_code');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function group_code(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('cgroup_code');
		$this->db->from('cost_subgroup');
		$this->db->like('cgroup_code', $code);
		$this->db->group_by('cgroup_code');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function group_name() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$name = $this->input->post('name');
		$this->db->select('cgroup_name');
		$this->db->from('cost_subgroup');
		$this->db->like('cgroup_name', $name);
		$this->db->group_by('cgroup_name');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function subgroup_code(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('csubgroup_code');
		$this->db->from('cost_subgroup');
		$this->db->like('csubgroup_code', $code);
		$this->db->group_by('csubgroup_code');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}


	public function subgroup_name() {

		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$name = $this->input->post('name');
		$this->db->select('csubgroup_name');
		$this->db->from('cost_subgroup');
		$this->db->like('csubgroup_name', $name);
		$this->db->group_by('csubgroup_name');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}


	public function spec_code(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('cgroup_code4');
		$this->db->from('cost_subgroup');
		$this->db->like('cgroup_code4', $code);
		$this->db->group_by('cgroup_code4');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function get_spec_code(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('cgroup_name4');
		$this->db->from('cost_subgroup');
		$this->db->group_by('cgroup_name4');
		$this->db->where('cgroup_code4', $code);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function spec_name(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$name = $this->input->post('name');
		$this->db->select('cgroup_name4');
		$this->db->from('cost_subgroup');
		$this->db->like('cgroup_name4', $name);
		$this->db->group_by('cgroup_name4');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function brand_code(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('cgroup_code5');
		$this->db->from('cost_subgroup');
		$this->db->like('cgroup_code5', $code);
		$this->db->group_by('cgroup_code5');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function get_brand_code(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$code = $this->input->post('code');
		$this->db->select('cgroup_name5');
		$this->db->from('cost_subgroup');
		$this->db->group_by('cgroup_name5');
		$this->db->where('cgroup_code5', $code);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	public function brand_name(){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$name = $this->input->post('name');
		$this->db->select('cgroup_name5');
		$this->db->from('cost_subgroup');
		$this->db->like('cgroup_name5', $name);
		$this->db->group_by('cgroup_name5');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		echo json_encode($res);
	}

	
	public function currency()
	{
		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		$this->load->model('master_m');
		if ($username == "") {
			redirect('/');
		} else {
			$data['rows'] = $this->master_m->currency_list();
			$da['dep'] = $session_data['m_dep'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/navtail_master_v');
			$this->load->view('datastore/currency/currency_v', $data);
			$this->load->view('base/footer_v');

		}
	}

	public function save_currency()
	{
		$input = $this->input->post();

		$session_data = $this->session->userdata('sessed_in');
		$data = array(
			'currency_code' 	=> $input['code'],
			'currency_name_en' 	=> $input['en'],
			'currency_name_th' 	=> $input['th'],
			'user_create' 		=> $session_data['username'],
			'create_date' 		=> date('Y-m-d H:i:s'),
			'compcode' 			=> $session_data['compcode'],
			'active' 			=> '1',
		);

		$insert = $this->db->insert('currency', $data);
		$res = array();
		if ($insert) {
			$res['status'] 	= true;
			$res['message'] = 'เพิ่มข้อมูลเรียบร้อยแล้ว';
		}else{
			$res['status'] 	= false;
			$res['message'] = 'ไม่สามารถเพิ่มข้อมูลได้';
		}

		echo json_encode($res);
	}

	public function content_modal_curr()
	{
		$id = $this->input->post('curr_id');
		$this->db->select('*');
		$this->db->from('currency');
		$this->db->where('currency_id', $id);
		$query = $this->db->get();
		$data['row'] = $query->result();
		// var_dump($data['row']);
		$this->load->view('datastore/currency/currency_edit_v', $data);
	}

	public function currency_edit()
	{
		$input = $this->input->post();

		$session_data = $this->session->userdata('sessed_in');
		$data = array(
			'currency_code' 	=> $input['code'],
			'currency_name_en' 	=> $input['en'],
			'currency_name_th' 	=> $input['th'],
			'user_edit' 		=> $session_data['username'],
			'edit_date' 		=> date('Y-m-d H:i:s'),
		);
		$this->db->where('currency_id', $input['id']);
		$insert = $this->db->update('currency', $data);
		$res = array();
		if ($insert) {
			$res['status'] 	= true;
			$res['message'] = 'แก้ไขข้อมูลเรียบร้อยแล้ว';
		}else{
			$res['status'] 	= false;
			$res['message'] = 'ไม่สามารถแก้ไขข้อมูลได้';
		}

		echo json_encode($res);
	}

	public function currency_del()
	{
		$input = $this->input->post();

		$session_data = $this->session->userdata('sessed_in');
		$data = array(
			'user_del' 		=> $session_data['username'],
			'del_date' 		=> date('Y-m-d H:i:s'),
			'active' 		=> '0',
		);
		$this->db->where('currency_id', $input['id']);
		$insert = $this->db->update('currency', $data);
		$res = array();
		if ($insert) {
			$res['status'] 	= true;
			$res['message'] = 'ลบข้อมูลเรียบร้อยแล้ว';
		}else{
			$res['status'] 	= false;
			$res['message'] = 'ไม่สามารถลบข้อมูลได้';
		}

		echo json_encode($res);
	}

	public function check_period($y,$m){

		$session_data = $this->session->userdata('sessed_in');

        $compcode = $session_data['compcode'];
        
		$this->db->select("*");
		$this->db->where("glyear",$y);
		$this->db->where("glperiod",$m);
		$this->db->where("compcode",$compcode);
		$data = $this->db->get("gl_period")->result_array();
		$return = array();

		if($compcode!=""){
			if(count($data)>0){
				$return["status"] = true;
				$return["message"] = "found period";
			}else{
				$return["status"] = false;
				$return["message"] = "not found period";
			}	
		}else{
			$return["status"] = false;
			$return["message"] = "not found session";
		}

		echo json_encode($return);
		
	}
	public function downloadsample(){
		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$da['name'] = $session_data['m_name'];
		if ($username == "") {
			redirect('/');
		} else {
			$data['depid'] = $session_data['m_depid'];
			$da['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$da['project'] = $session_data['m_project'];
			$da['imgu'] = $session_data['img'];
			$this->load->view('navtail/base_master/header_v', $da);
			$this->load->view('navtail/base_master/tail_v');
			
			$this->load->view('navtail/navtail_master_v');

			
			$this->load->view('datastore/downloadsample_v');

			
			$this->load->view('base/footer_v');

		}
	}
	public function setup_runnumber() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['res'] = $this->datastore_m->getrunno($compcode);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('programmer/setup_runnumber_v');
		$this->load->view('base/footer_v');
	}
	public function setup_runnumber_nv() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['res'] = $this->datastore_m->getrunno($compcode);
		$this->load->view('navtail/base_master/header_v', $data);
		// $this->load->view('navtail/base_master/tail_v');
		// $this->load->view('navtail/navtail_master_v');
		$this->load->view('programmer/setup_runnumber_new_v');
		// $this->load->view('base/footer_v');
	}
	public function number_active(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode =  $session_data['compcode'];
		$add = $this->input->post();
		try {
			for ($i = 0; $i < count($add['prefix']); $i++) {
				if ($add['id'][$i]=="") {
					$data = array(
						'compcode' => $compcode,
						'prefix' => $add['prefix'][$i],
						'type' => $add['type'][$i],
						'running' => $add['running'][$i],
						'status' => $add['status'][$i],
						'createuser' => $username,
						'createdate' => date('Y-m-d H:i:s',now()),
					);
					$this->db->insert('setup_running',$data);
				}else{
					$data = array(
						'compcode' => $compcode,
						'prefix' => $add['prefix'][$i],
						'type' => $add['type'][$i],
						'running' => $add['running'][$i],
						'status' => $add['status'][$i],
						'edituser' => $username,
						'editdate' => date('Y-m-d H:i:s',now()),
					);
					$this->db->where('id',$add['id'][$i]);
					$this->db->update('setup_running',$data);
				}
			}
			return true;
		} catch (\Throwable $th) {
			log_message('error',$e->getMessage());
			return;
		}
	
	}
	public function bussiness_unit(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$this->load->model('online_user_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['multicomp'] = $this->online_user_m->multicomp($compcode);
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['res'] = $this->datastore_m->get_business($compcode);
		$data['user_right'] = $session_data['user_right'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('datastore/bussiness_unit/archive_bu_v');
		$this->load->view('base/footer_v');
	}
	public function new_bussiness(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['username'] = $session_data['username'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['master'] = $session_data['master'];
		$data['user_right'] = $session_data['user_right'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_master_v');
		$this->load->view('datastore/bussiness_unit/add_bu_v');

		$this->load->view('base/footer_v');
	}
}