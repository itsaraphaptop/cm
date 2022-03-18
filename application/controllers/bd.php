<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class bd extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('pagination');
		$this->load->Model('global_m');
		$this->load->Model('datastore_m');
		$this->load->Model('auth_m');
		$this->load->Model('bd_m');
		$this->load->helper(array('notify_message'));
		
	}
	public function main_index()
	{
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($data['username'] == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdcount'] = $this->bd_m->bdtender_count($compcode);
		$data['tdwin'] = $this->bd_m->bdtender_win($compcode);
		$data['tender'] = $this->bd_m->bdtender_tender($compcode);
		$data['projectcost'] = $this->bd_m->getprojectcost($compcode);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/main_index');
		$this->load->view('base/footer_v');
	}
	public function boq_main() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$pjid = $this->uri->segment(3);
		$data['bdtender'] = $this->uri->segment(3);
		$pjkey = $this->uri->segment(4);
		$start = $this->uri->segment(5);
		$stop = $this->uri->segment(6);
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['ress'] = $this->bd_m->getboqproject($pjid,$start,$stop);
		$data['ressg'] = $this->bd_m->getboqprojectgroup($pjid);
		$data['gb'] = $this->bd_m->getboqprojectgroupby($pjid);
		$data['getproj'] = $this->bd_m->getproject_user();
		$data['rev'] = $this->bd_m->GetRev($projectid);
		$data['proo'] = $this->bd_m->proo($pjkey);
		$data['cost_type'] = $this->bd_m->cost_type();
		$data['sumbudamt'] = $this->bd_m->sumbudamt($pjid);
		$data['sumboqamt'] = $this->bd_m->sumboqamt($pjid);
		$data['boq_i'] = $this->bd_m->getboqproject($pjid,$start,$stop);
		$data['ref_heading'] = $this->bd_m->get_revise_heading($pjid);
		$data['ref_bd'] = $this->bd_m->get_heading_bdreivse($data['ref_heading']);
		// var_dump($data['sumbudamt']);
		// var_dump($data['sumboqamt']);die();
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		
		$this->load->view('bd/boq_v', $data);
		$this->load->view('base/footer_v');
	}
	public function load_jobcost(){
		$data['bdtender'] = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(4);
		// echo $data['projectid'];
		$data['heading'] = $this->bd_m->get_revise_heading($data['bdtender']);
        $data['ref_bd'] = $this->bd_m->get_heading_bdreivse($data['heading']);
		$data['res'] = $this->bd_m->subjobcost($data['bdtender'],$data['ref_bd']);
		$this->load->view('bd/load_jobcost_v',$data);
	}
	public function showsummatboq()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['tdn'] = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(4);
		$data['heading'] = $this->bd_m->get_revise_heading($data['tdn']);
        $data['ref_bd'] = $this->bd_m->get_heading_bdreivse($data['heading']);
		$this->load->view('bd/loadsummat_v',$data);
	}
	public function shownotboq()
	{
		$data['tdn'] = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(4);
		$this->load->view('bd/loadnotsummat_v',$data);
	}
	public function getboqi()
	{
		$bd = $this->uri->segment(3);
		$ref_revise = $this->uri->segment(4);
		// $bd = "BD201806116";

		$q = $this->bd_m->getboqprojectkendo($bd,$ref_revise);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($q));
	}
	public function getboqcost()
	{
		
		$bd = $this->uri->segment(3);
		$ref_revise = $this->uri->segment(4);
		$projectid = $this->uri->segment(5);
		// $bd = "BD201806116";

		$q = $this->bd_m->getcostsubkendo($bd,$ref_revise,$projectid);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($q));
	}
	public function getsumcost(){
		$tdn = $this->uri->segment(3);
		$project_id = $this->uri->segment(4);
		// $tdn = "BD201803151";

		$boqbud = $this->bd_m->sumcost($tdn);
		$pocost = $this->bd_m->sumpocost($project_id);
		
		
		foreach ($pocost as $key => $vv) {
			if($vv->po_amount==0){
				$po_amount = 0;
			}else{
				$po_amount= $vv->po_amount;
			}
		}

		
		foreach ($boqbud as $key => $value) {
			// foreach ($pocost as $key => $vv) {
				// if ($value->boq_job==$vv->po_system){
				// 	$data[] = array(
				// 	'total' => $vv->total,
				// 	'subcostcode' => $vv->subcostcode,
				// 	'subcostcodename' => $vv->subcostcodename,
				// 	// 'totalboq' => $value->totalboq,
				// 	'poi_amount' => $vv->po_amount,
				// 	'budgetbalance' => $vv->total-$vv->po_amount
				// 	);

				// }else{
					$data[] = array(
					'total'           => $value->total,
					'subcostcode'     => $value->subcostcode,
					'subcostcodename' => $value->subcostcodename,
					'totalboq'        => $value->totalboq,
					'poi_amount'      => 0,
					'budgetbalance'   => 0,
					);
				// }
					
				
			// }
		}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

	public function boq_main_department()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$pjkey = $this->uri->segment(4);
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		
		$data['ressg'] = $this->bd_m->getboqprojectgroup($pjid);
		$data['gb'] = $this->bd_m->getboqprojectgroupby($pjid);
		$data['getproj'] = $this->bd_m->getproject_user();
		$data['rev'] = $this->bd_m->GetRev($projectid);
		$data['proo'] = $this->bd_m->proo($pjkey);
		$data['cost_type'] = $this->bd_m->cost_type();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		// $this->load->view('bd/boq_v');
		$this->load->view('bd/department_v');/**/
		$this->load->view('base/footer_v');
	}
	public function boq_openProject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		// $data['getproj'] = $this->bd_m->getproject_user();
		$data['rev'] = $this->bd_m->GetRev($projectid);
			$data['project_bd'] 	= $this->bd_m->bdtender_h_type('project');
			$data['department_bd'] 	= $this->bd_m->bdtender_h_type('department');
		// var_dump($data['department']); die();
		// if ($data['department_bd'] ==null) {
			// 	echo "Null";
		// }else{
			// 	echo "string";
		// }
		// var_dump($data['department_bd']); die();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd', $data);
		// $this->load->view('bd/main_header');
		$this->load->view('bd/openprojectboq_v', $data);
		$this->load->view('base/footer_v');
	}
	public function material_alone() {
		$data['id'] = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		$this->load->view('datastore/share/modal_boq_labor_v', $data);
	}
	public function material_alonee() {
		$data['id'] = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		$this->load->view('datastore/share/modal_boq_mat_v', $data);
	}
	public function material_alonee_management() {
		$data['id'] = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		$this->load->view('datastore/share/modal_boq_mat_inven_v', $data);
	}
	public function costcode_id() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$data['n'] = $this->uri->segment(3);
		$data['pr_id'] = $this->uri->segment(4);
		$data['allcostcode'] = $this->datastore_m->allcostcode();
		$this->load->view('datastore/share/modal_test', $data);
	}
	public function costcode_idd() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$dataa['n'] = $this->uri->segment(3);
		$dataa['pr_id'] = $this->uri->segment(4);
		$dataa['allcostcode'] = $this->datastore_m->allcostcodee();
		$this->load->view('datastore/share/modal_cc_boqq_v', $dataa);
	}
	public function boq_approve() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['ress'] = $this->bd_m->getboqproject($pjid);
		$data['boqg'] = $this->bd_m->getboqg($pjid, $rev);
		$data['dpj'] = $this->bd_m->getpj($pjid);
		$data['boqsubg'] = $this->bd_m->getboqsubg($pjid, $rev);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('bd/boqapp_v');
		$this->load->view('base/footer_v');
	}
	public function bd_tender() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/master_tender');
		$this->load->view('base/footer_v');
	}
	public function del_db_tenid($bdd_tenid, $id) {
		// echo $id;
		$return = array();
		// echo $id;
		$res = $this->bd_m->del_row_d($bdd_tenid, $id);
		if ($res) {
			$return['status'] = "true";
		} else {
			$return['status'] = "false";
		}
		echo json_encode($return);
	}
	public function del_approve_tender($bdd_tenid, $id) {
		// echo $id;
		$return = array();
		// echo $id;
		$res = $this->bd_m->del_approve_tender($bdd_tenid, $id);
		if ($res) {
			$return['status'] = "true";
		} else {
			$return['status'] = "false";
		}
		echo json_encode($return);
	}
	public function page_bd_tender_edit() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		
		// echo $pjid;
		// die();
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		// $data['ress'] = $this->bd_m->getboqproject($pjid);
		/*$data['boqg'] = $this->bd_m->getboqg($pjid, $rev);
		$data['dpj'] = $this->bd_m->getpj($pjid);
		$data['boqsubg'] = $this->bd_m->getboqsubg($pjid, $rev);*/
		// echo "page_bd_tender_edit in controller bd.php";
		$data['res'] = $this->bd_m->bdtender_m_h_by_id($pjid);
		$data['res1'] = $this->bd_m->bdtender_m_d_by_id($pjid);
		$data['td'] = $this->bd_m->td($pjid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/tender_edit');
		$this->load->view('base/footer_v');
	}
	public function sel_tender_by_id($id) {
		$return = array();
		$return['header'] = $this->bd_m->get_header_by_id($id);
		$return['detail'] = $this->bd_m->bdtender_m_d_by_id($id);
		if ($return['header'] && $return['detail']) {
			$return['status'] = "true";
		} else {
			$return['status'] = "false";
		}
		echo json_encode($return);
	}
	public function del_tender_by_id($id) {
		$return = array();
		// echo $id;
		$res = $this->bd_m->del_byid($id);
		if ($res) {
			$return['status'] = "true";
		} else {
			$return['status'] = "false";
		}
		echo json_encode($return);
	}
	public function bd_bom() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['ress'] = $this->bd_m->getboqproject($pjid);
		$data['boqg'] = $this->bd_m->getboqg($pjid, $rev);
		$data['dpj'] = $this->bd_m->getpj($pjid);
		$data['boqsubg'] = $this->bd_m->getboqsubg($pjid, $rev);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('bd/bd_bom');
		$this->load->view('base/footer_v');
	}
	public function bd_owner() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['ress'] = $this->bd_m->getboqproject($pjid);
		$data['boqg'] = $this->bd_m->getboqg($pjid, $rev);
		$data['dpj'] = $this->bd_m->getpj($pjid);
		$data['boqsubg'] = $this->bd_m->getboqsubg($pjid, $rev);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('bd/bd_owner');
		$this->load->view('base/footer_v');
	}
	public function bdtender() {
		$data['res'] = $this->bd_m->bdtender_m();
		$this->load->view('bd/modal/bdtender_h', $data);
	}
	public function bdtender_d() {
		$id = $this->uri->segment(3);
		$data['res'] = $this->bd_m->bdtender_d($id);
		$this->load->view('bd/modal/bdtender_d', $data);
	}
	public function modalbdtender() {
		$data['res'] = $this->bd_m->bdtender_mm();
		$this->load->view('bd/modal/modal_tenderp', $data);
	}
	public function modaltender(){
		// $data['res'] = $this->bd_m->bdtender_mm();
		$this->load->view('bd/modal/modal_tender_v');
	}
	public function approve_pbg() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['allproj'] = $this->count_m->projall($compcode);
		$data['allpo'] = $this->count_m->poall($compcode);
		$data['allpoapp'] = $this->count_m->poappall($compcode);
		$data['powait'] = $this->count_m->powait($compcode);
		$data['lastproj'] = $this->manag_m->getproject($compcode);
		$data['compimg'] = $this->manag_m->companyimg();
		$company = $this->manag_m->companyname($compcode);
		foreach ($company as $e) {
			$data['companyname'] = $e->company_name;
		}
		$data['getproj'] = $this->manag_m->getprojectpett();
		$data['member'] = $this->manag_m->getmember();
		// $data['inv'] = $this->count_m->countinv($compcode);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pm_v');
		$this->load->view('bd/approve_pbg');
		$this->load->view('base/footer_v');
	}
	public function project_budget() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['allproj'] = $this->count_m->projall($compcode);
		$data['allpo'] = $this->count_m->poall($compcode);
		$data['allpoapp'] = $this->count_m->poappall($compcode);
		$data['powait'] = $this->count_m->powait($compcode);
		$data['lastproj'] = $this->manag_m->getproject($compcode);
		$data['compimg'] = $this->manag_m->companyimg();
		$company = $this->manag_m->companyname($compcode);
		foreach ($company as $e) {
			$data['companyname'] = $e->company_name;
		}
		$data['getproj'] = $this->manag_m->getprojectpett();
		$data['member'] = $this->manag_m->getmember();
		$data['inv'] = $this->count_m->countinv($compcode);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pm_v');
		$this->load->view('bd/project_budget');
		$this->load->view('base/footer_v');
	}
	public function view_boqall() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		// echo $pjid;
		// die();
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		// $data['ress'] = $this->bd_m->getboqproject($pjid);
		// $data['boqg'] = $this->bd_m->getboqg($pjid, $rev);
		// $data['dpj'] = $this->bd_m->getpj($pjid);
		$data['res'] = $this->bd_m->get_data_header();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/view_boqall', $data);
		$this->load->view('base/footer_v');
	}
	public function get_detail_by_id($id) {
		$return = array();
		$res = $this->bd_m->bdtender_m_d_by_id($id);
		if ($res) {
			$return['status'] = "true";
			$return['data'] = $res;
		} else {
			$return['status'] = "false";
			$return['message'] = "Not data by id";
		}
		echo json_encode($return);
	}
	public function master_bom() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		// echo $pjid;
		// die();
		if ($username == "") {
			redirect('/');
		} else {
			$data['pjid'] = $pjid;
			// paramiter 1 ชื่อ
			// paramiter 2 ชื่อ Table
			// paramiter 3 ชื่อ Column
			$data['code'] = $this->global_m->gen_code('BOM', 'bom_header', 'id');
			$data['unit'] = $this->bd_m->get_unit();
			$userid = $session_data['m_id'];
			$data['name'] = $session_data['m_name'];
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
			$data['projid'] = $session_data['projectid'];
			$projectid = $session_data['projectid'];
			$data['project'] = $session_data['m_project'];
			$data['imgu'] = $session_data['img'];
			// $data['ress'] = $this->bd_m->getboqproject($pjid);
			// $data['boqg'] = $this->bd_m->getboqg($pjid, $rev);
			// $data['dpj'] = $this->bd_m->getpj($pjid);
			// $data['res'] = $this->bd_m->get_data_header();
			$this->load->view('navtail/base_master/header_v', $data);
			$this->load->view('navtail/base_master/tail_v');
			$this->load->view('navtail/natail_bd');
			$this->load->view('bd/bom_v', $data);
			$this->load->view('base/footer_v');
		}
	}
	public function add_bom() {
		$input = $this->input->post();
		if (isset($input['mat_code'])) {
			$id_bom = $input['bom_code'];
			if ($this->bd_m->add_bom_m($input) == true) {
				redirect('bd/edit_bom/' . $id_bom);
			} else {
				echo "ไม่ผ่าน";
			}
			
		}else{
			redirect('bd/master_bom');
		}
	}
	public function edit_bom($id_bom) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		// $data['code'] = $this->global_m->gen_code('BOM','bom_header','id');
		$data['unit'] = $this->bd_m->get_unit();
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['bom'] = $this->bd_m->get_bom_m($id_bom);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/bom_edit', $data);
		$this->load->view('base/footer_v');
	}
	public function update_bom() {
		$input = $this->input->post();
		// echo '<pre>';
		// print_r($input);die();
		$data = $this->bd_m->update_bom_m($input);
		if ($data == true) {
			redirect('bd/archive_bom');
		} else {
			echo "ไม่ผ่าน";
		}
	}
	public function archive_bom() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		// $data['code'] = $this->global_m->gen_code('BOM','bom_header','id');
		$data['unit'] = $this->bd_m->get_unit();
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['bom_header'] = $this->bd_m->bom_header();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/bom_archive', $data);
		$this->load->view('base/footer_v');
	}
	public function show_conten_bom() {
		$code = $this->input->post();
		$data['data'] = $this->bd_m->show_bom($code["code"]);
		$this->load->view('bd/modal/modal_conten_bom', $data);
	}
	public function show_all_bom() {
		$data['tdn'] = $this->uri->segment(3);
		$data['projectcode'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$data['data'] = $this->bd_m->show_all_bom();
		$this->load->view('bd/modal/modal_all_bom', $data);
	}
	public function cobom(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['compcode'] = $session_data['compcode'];
		$bomcode = $this->uri->segment(3);
		$tdn = $this->uri->segment(4);
		$pcode = $this->uri->segment(5);

		$res = $this->bd_m->copybom($bomcode);
		foreach ($res as $key => $value) {
			$data = array(
				'boq_bd' => $tdn,
				'boq_job' => '1',
				'subcostcode' => '',
				'subcostcodename' => '',
				'newmatnamee' => $value->mat_name,
				'newmatcode' => $value->mat_code,
				'unitcode' => $value->unit_code,
				'unitname' => '',
				'qty_bg' => $value->qty,
				'qtyboq' => $value->qty,
				'matpricebg' => $value->price,
				'matamtbg' => $value->qty+$value->price,
				'labpricebg' => '0.00',
				'labamtbg' => '0.00',
				'totalamt' => '0.00',
				'matpriceboq' => '0.00',
				'matamtboq' => '0.00',
				'labpriceboq' => '0.00',
				'labamtboq' => '0.00',
				'totalamtboq' => '0.00',
				'subpricebg' => '0.00',
				'subamtbg' => '0.00',
				'status' => "N",
				'compcode' => $data['compcode'],
				'adduser' => $username,
				'adduser_id' => $m_id,
				'status_boq' => "N",
				'revise' => "0",

			);
			// $this->db->where('boq_job',$value->boq_job);
			$q = $this->db->insert('boq_item',$data);
		}
		if($q){
			echo "true";
			return true;
		}else{
			echo "error";
			return false;
		}
	}
	public function test_gen() {
		$name = "BOM";
		$table = "bom_header";
		$column = "bom_code";
		echo $this->global_m->gen_code($name, $table, $column);
	}
	public function del_bom() {
		$return = array();
		$id = $this->input->post();
		$data = $this->bd_m->del_bom($id["id"]);
		if ($data) {
			$return['status'] = true;
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามารถลบได้";
		}
		echo json_encode($return);
	}
	public function show_bom_detail($id_mat) {
		// var_dump($bom_code);
		// $bom_code = $this->input->post();
		$data['$bom_code'] = $this->input->post();
		$data['tcalcoorb'] = $this->input->post('tcalcoorb');
		$data['row'] = $this->input->post('num_row');
		// echo $bom_code['tcalcoorb'];
		// exit();
		$data['tdn'] = $this->uri->segment(4);
		$bom = $this->uri->segment(5);
		$data['bom'] = $this->uri->segment(5);
		$data['id'] = $this->uri->segment(6);
		// $data['databom'] = $this->bd_m->bom_detail($bom,$id_mat);
		$this->load->view('bd/modal/add_bom', $data);
	}
	public function boq_insert_bd_de() {
		$boq = $this->input->post();
		$data = $this->bd_m->add_boq($boq);
		if ($data != NULL) {
			redirect('bd/boq_main_department/' . $data[0]);
		} else {
			echo "ไม่ผ่าน";
		}
		$data = $this->bd_m->add_boq($data_row);
	}
	public function get_page_project()
	{
		$this->load->view('bd/project');
	}
	public function get_page_department()
	{
		$this->load->view('bd/department');
	}
	public function department_tender_edit() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$pjid = $this->uri->segment(3);
		$rev = $this->uri->segment(4);
		// echo $pjid;
		// die();
		if ($username == "") {
			redirect('/');
		}
		$data['pjid'] = $pjid;
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];

		// echo "page_bd_tender_edit in controller bd.php";
		$data['res'] = $this->bd_m->bdtender_m_h_by_id($pjid);
		$data['res1'] = $this->bd_m->bdtender_m_d_by_id($pjid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		$this->load->view('bd/department_tender', $data);
		$this->load->view('base/footer_v');
	}
	public function del_detail_pro($project_code)
	{
		$return = array();
		$this->db->where('project_code', $project_code);
		$res = $this->db->delete('project_item');
		
		$this->db->select('bd_tenid');
		$this->db->from('project');
		$this->db->where('project_code', $project_code);
		$query = $this->db->get()->result_array();
		$tender_id = $query[0]['bd_tenid'];
			// var_dump($query)die();
		if ($tender_id != '') {
			$data = array(
		'bd_status' => 'wait',
			);
			$this->db->where('bd_tenid', $tender_id);
			$update_tender = $this->db->update('bdtender_h', $data);
		}
		$return = array();
		$data1 = array(
	'bd_tenid' => '',
	'bd_tenname' => '',
		);
		$this->db->where('project_code', $project_code);
		$del_ten_pro = $this->db->update('project', $data1);
		if ($res AND $query AND $del_ten_pro) {
			$return['status'] = true;
		}else{
			$return['status'] = false;
		}
		echo json_encode($return);
	}
	// public function pagination_project()
	// {
		// $this->load->view("ajax_pagination");
	// }
	public function pagination()
	{
		
		$config = array();
		// $config['base_url'] = '#';
					$config['total_rows'] 			= $this->bd_m->count_all();
					$config['per_page'] 			= 1;
					$config['uri_segment'] 			= 3;
			$config['use_page_numbers'] 	= TRUE;
				$config['full_tag_open'] 		= '<ul class="pagination">';
				$config['full_tag_close'] 		= '</ul>';
				$config['first_tag_close'] 		= '<li>';
				$config['first_tag_close'] 		= '</li>';
				$config['last_tag_open'] 		= '<li>';
				$config['last_tag_close'] 		= '</li>';
					$config['next_link'] 			='&gt';
				$config['next_tag_open'] 		= '<li>';
				$config['next_tag_close'] 		= '</li>';
					$config['prev_link'] 			= '&lt';
				$config['prev_tag_open'] 		= '<li>';
				$config['prev_tag_close'] 		= '</li>';
				$config['cur_tag_open'] 		= '<li class="active"><a href="#">';
			$config['attributes'] = array('class' => 'myclass');
				$config['cur_tag_close']		= '</a></li>';
				$config['num_tag_open'] 		= '<li>';
				$config['num_tag_close'] 		= '</li>';
					$config['num_link'] 			= 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config['per_page'];
		$output = array(
				'pagination_link' 	=> $this->pagination->create_links(),
					'table_project'		=> $this->bd_m->fecth_detail($config['per_page'], $start)
		);
		echo json_encode($output);
	}
	public function del_boq()
	{
		$boq = $this->db->segment(3);
		$this->db->where('boq_project',$boq);
		$this->db->delete('boq_item');
	}
	public function bd_detail()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		
		
		$data['approve_bg'] = $this->uri->segment(6);
		$data['pjid'] = $this->uri->segment(3);
		$data['start'] = $this->uri->segment(4);
		$data['tdn'] = $this->uri->segment(3);
		$pjid = $this->uri->segment(3);
		$start = $this->uri->segment(4);
		$stop = $this->uri->segment(5);
		$data['pjcost'] = $this->uri->segment(7);
		$data['boq_i'] = $this->bd_m->getboqproject($pjid,$start,$stop);
		$this->load->view('bd/detail_boq',$data);
	}
	public function job_view($bd){
		$data['job'] = $this->bd_m->getjob($bd);
		$this->load->view('bd/show_job',$data);
	}
	public function select_project()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['project'] = $session_data['m_project'];
	$compcode = $session_data['compcode'];
	// $data['project_bd']  = $this->bd_m->bdtender_h_type('project');
	$data['project_bd']  = $this->bd_m->getprojecttender($compcode);
	
	$this->load->view('bd/select_project_v', $data);
	}
	public function select_project_close()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['project'] = $session_data['m_project'];
	$compcode = $session_data['compcode'];
	$data['project_bd']  = $this->bd_m->bdtender_h_type_close($compcode);
	
	$this->load->view('bd/select_project_v', $data);
	}
	public function select_department()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['department'] = "department";
	if ($data['department'] != "project") {
	$data['department_bd']  = $this->bd_m->bdtender_h_type('department');
	}else{
	$data['department_bd'] = "department";
	}
	
	$this->load->view('bd/select_department_v',$data);
	}


	public function select_project_revise()
	{
		$session_data = $this->session->userdata('sessed_in');
		$data['project'] = $session_data['m_project'];
		$data['project_bd']  = $this->bd_m->bdtender_h_type('project');
		
		$this->load->view('bd/select_project_v_revise', $data);
	}
	
	public function select_department_revise()
	{
	$session_data = $this->session->userdata('sessed_in');
	$data['department'] = "department";
	if ($data['department'] != "project") {
	$data['department_bd']  = $this->bd_m->bdtender_h_type('department');
	}else{
	$data['department_bd'] = "department";
	}
	
	$this->load->view('bd/select_department_v_revise',$data);
	}

	public function add_boq()
	{

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['compcode'] = $session_data['compcode'];
		$tdn = $this->uri->segment(3);
		$data['typeprojcode'] = $this->uri->segment(5);
		if ($username == "") {
			redirect('/');
		}
		
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdn'] = $this->uri->segment(3);
		$data['td'] = $this->bd_m->td($tdn);
		$data['td_boq'] = $this->bd_m->td_boq($tdn,$m_id);
		$data['boq_td_boq'] = $this->bd_m->boq_td_boq($tdn,$m_id);
		$data['username'] = $session_data['username'];
		$data['m_id'] = $session_data['m_id'];
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		// $this->load->view('navtail/natail_bd');
		$this->load->view('navtail/natail_bd_boq');
		$this->load->view('bd/addboq_v');
		
		$this->load->view('base/footer_v');
	}
	public function dellistboq(){
		$boq = $this->uri->segment(3);
		$this->db->where('boq_id',$boq);
		$this->db->delete('boq_item');
		return true;
	}

	public function add_boq_sh()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['compcode'] = $session_data['compcode'];
		$tdn = $this->uri->segment(3);
		if ($username == "") {
			redirect('/');
		}
		
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdn'] = $this->uri->segment(3);
		$data['td'] = $this->bd_m->td($tdn);
		$data['td_boq'] = $this->bd_m->td_boq($tdn,$m_id);
		$data['boq_td_boq'] = $this->bd_m->boq_td_boq($tdn,$m_id);
		$data['username'] = $session_data['username'];
		$data['m_id'] = $session_data['m_id'];
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		// $this->load->view('navtail/natail_bd_boq');
		// $this->load->view('bd/addboq_v');
		$this->load->view('office/sheets/bd/boq/add_boq_v');


		$this->load->view('base/footer_v');
		
	}

		public function setup_boq()
	{

			$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		
		if ($username == "") {
			redirect('/');
		}
		
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdn'] = $this->uri->segment(3);
		$data['project_bd'] 	= $this->bd_m->bdtender_h_type('project');
			$data['department_bd'] 	= $this->bd_m->bdtender_h_type('department');
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		
		$this->load->view('bd/setupapprove_boq');
		
		$this->load->view('base/footer_v');
	}

			public function setup_boq_revise()
	{

			$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		
		if ($username == "") {
			redirect('/');
		}
		
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdn'] = $this->uri->segment(3);
		$data['project_bd'] 	= $this->bd_m->bdtender_h_type('project');
			$data['department_bd'] 	= $this->bd_m->bdtender_h_type('department');
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		
		$this->load->view('bd/setupapprove_boq_revise');
		
		$this->load->view('base/footer_v');
	}

	public function approve_billof()
	{

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		
		
		if ($username == "") {
			redirect('/');
		}
		
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdn'] = $this->uri->segment(3);
		$data['project_bd'] 	= $this->bd_m->bdtender_h_type('project');
		$data['department_bd'] 	= $this->bd_m->bdtender_h_type('department');
		$data['username'] = $session_data['username'];
		$data['m_id'] = $session_data['m_id'];
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		
		$this->load->view('bd/approve_bill');
		
		$this->load->view('base/footer_v');
	}

		public function approve_billof_revise()
	{

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		
		
		if ($username == "") {
			redirect('/');
		}
		
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tdn'] = $this->uri->segment(3);
		$data['project_bd'] 	= $this->bd_m->bdtender_h_type('project');
		$data['department_bd'] 	= $this->bd_m->bdtender_h_type('department');
		$data['username'] = $session_data['username'];
		$data['m_id'] = $session_data['m_id'];
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		
		$this->load->view('bd/approve_bill_revise');
		
		$this->load->view('base/footer_v');
	}

	public function load_filterboq(){
		$bd = $this->uri->segment(3);
		$cc = $this->uri->segment(4);

		$data['tdn'] = $this->uri->segment(3);
		$data['td_boq'] = $this->bd_m->filter_boq($bd,$cc);
		$this->load->view('bd/load_filterboq',$data);
	}

	public function load_boq(){
		$data['bdcodeto'] = $this->uri->segment(3);
		$data['projectcode'] = $this->uri->segment(4);
		$data['copyboq'] = $this->bd_m->copy_boq();
		$this->load->view('bd/loadcopy_boq',$data);
	}


	public function load_filterboq_all(){
		$bd = $this->uri->segment(3);
		$data['tdn'] = $this->uri->segment(3);
		$data['td_boq'] = $this->bd_m->filter_boq_all($bd);
		$this->load->view('bd/load_filterboq_all',$data);
	}

	public function getcountcontrol()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$q = $this->bd_m->getcontrolcount($compcode);
			switch ($q['controlboq']) {
				case '1':
					$data[0]['status'] = "BOQ Control";
					$data[0]['value'] = $q['statusboq'];
					$data[0]['icon'] = "<i class='status-mark border-blue-300 position-left'></i>";
					$data[0]['color'] = "#29B6F6";
					break;
			}
			switch ($q['controlbg']) {
				case '2':
					$data[1]['status'] = "Budget Control";
					$data[1]['value'] = $q['statusbg'];
					$data[1]['icon'] = "<i class='status-mark border-blue-300 position-left'></i>";
					$data[1]['color'] = "#66BB6A";
					break;
				}
			
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}
	public function getcontrolall(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$q = $this->bd_m->getcontrol($compcode);

			switch ($q['controlbd']) {
				case 'Wait':
					$data[0]['status'] = "Not Control";
					$data[0]['value'] = $q['statusbd'];
					$data[0]['icon'] = "<i class='status-mark border-violet-300 position-left'></i>";
					$data[0]['color'] = "#9C27B0";
					break;
			}
			switch ($q['controlall']) {
				case 'wait':
					$data[1]['status'] = "In Process";
					$data[1]['value'] = $q['statusall'];
					$data[1]['icon'] = "<i class='status-mark border-purple-100 position-left'></i>";
					$data[1]['color'] = "#673AB7";
					break;
			}
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($data));
	}

	public function addnewboq(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['tencode'] = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(4);
		$this->getdata($data['tencode']);
		$this->load->view('navtail/base_master/header_v',$data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/natail_bd');
		
		$this->load->view('bd/addnewboq_v');
		
		$this->load->view('base/footer_v');
	}
	public function savejson(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$add = $this->input->post('data');
		$bdcode = $this->uri->segment(3);
		$select = $this->db->conn_id->prepare('DELETE FROM boq_item WHERE boq_bd="'.$bdcode.'"AND status="N"');
		$select->execute();
		for ($i = 0, $rlen = count($add); $i < $rlen; $i++) {
			if ($add[$i][0]=="") {
				
			}else{
				$sys = $this->datastore_m->getsystemboq($add[$i][0]);
				$matcode = $this->datastore_m->getmatmame($add[$i][2]);
				if ($matcode) {
					$mat = "ok";
				}else{
					$mat = "not mat";
				}
				$costcode = $this->datastore_m->getcostcodename($add[$i][1]);
				$unitcode = $this->datastore_m->getunitname($add[$i][3]);
				$data = array(
					'boq_bd' => $bdcode,
					'boq_job' => $sys,
					// 'boq_job' => $add[$i][0],
					'subcostcode' => $costcode,
					'subcostcodename' => $add[$i][1],
					'newmatnamee' => $add[$i][2],
					'newmatcode' => $matcode,
					'unitcode' => $unitcode,
					'unitname' => $add[$i][3],
					'qty_bg' => $add[$i][4],
					'matpricebg' => $add[$i][5],
					'matamtbg' => $add[$i][6],
					'labpricebg' => $add[$i][7],
					'labamtbg' => $add[$i][8],
					'subpricebg' => $add[$i][9],
					'subamtbg' => $add[$i][10],
					'totalamt' => $add[$i][11],
					'compcode' => $data['compcode'],
					'adduser' => $username,
					'status' => "N"
				);
				$this->db->insert('boq_item',$data);
			}
		}

		$out = array(
			'result' => $mat
		);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($out));
	}
	public function saveapprovejson(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['compcode'] = $session_data['compcode'];
		$add = $this->input->post('data');
		$aad = $this->input->post('title');
		$remarkaa = $this->input->post('remark');
		$bdcode = $this->uri->segment(3);
		//line
		// $res = $this->office_m->getapprovebd($pono);
        //   $pushID = $this->office_m->getlineid($res[0]['app_midid'],$compcode);
		// $line_message = "Doc type : {$pono}\n";
	
		// notify_message($line_message,$pushID[0]['lineid']);

		// end line
		$datestring = "Y";
		$mm = "m";
		$dd = "d";

		$this->db->select('*');
		$qu = $this->db->get('heading_bd');
		$res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

		if ($res==0) {
			$bqno = "TD-BUDGET".date($datestring).date($mm)."000"."1";
			$aps_item ="1";
		}else{
			$this->db->select('*');
			$this->db->order_by('id','desc');
			$this->db->limit('1');
			$q = $this->db->get('heading_bd');
			$run = $q->result();
			foreach ($run as $valx)
			{
				$x1 = $valx->id+1;
			}

			if ($x1<=9) {
				$bqno = "TD-BUDGET".date($datestring).date($mm)."000".$x1;
				$aps_item = $x1;
			}
			elseif ($x1<=99) {
				$bqno = "TD-BUDGET".date($datestring).date($mm)."00".$x1;
				$aps_item = $x1;
			}
			elseif ($x1<=999) {
				$bqno = "TD-BUDGET".date($datestring).date($mm)."0".$x1;
				$aps_item = $x1;
			}
		}
		
		 $data_h = array(
        'heading' => "BOQ (".$aad.")",
        'remark' => $remarkaa,
        'ref_bd' => $bqno,
        'status' => "W",
        'useradd' => $username,
        'userid' => $m_id,
        'adddate' => date('y-m-d'),
        'revise' => "0",
        'compcode' => $data['compcode'],
        'boq_bd' =>$bdcode,
      );
      if($this->db->insert('heading_bd',$data_h)){
        $code = $bqno;
      }else{
        return false;
      }
		  $data_bstatus = array(
			'status' => "W",
			'revise' => "0",
			'heading_ref' => $code,
		  );
		  $this->db->where('boq_bd',$bdcode);
		  $this->db->update('boq_item',$data_bstatus);
		/*for ($i = 0, $rlen = count($add); $i < $rlen; $i++) {
			if ($add[$i][0]=="") {
				
			}else{
				$sys = $this->datastore_m->getsystemboq($add[$i][0]);
				$matcode = $this->datastore_m->getmatmame($add[$i][2]);
				$costcode = $this->datastore_m->getcostcodename($add[$i][1]);
				$unitcode = $this->datastore_m->getunitname($add[$i][3]);
				$data = array(
					'boq_bd' => $bdcode,
					'boq_job' => $sys,
					// 'boq_job' => $add[$i][0],
					'subcostcode' => $costcode,
					'subcostcodename' => $add[$i][1],
					'newmatnamee' => $add[$i][2],
					'newmatcode' => $matcode,
					'unitcode' => $unitcode,
					'unitname' => $add[$i][3],
					'qty_bg' => $add[$i][4],
					'matpricebg' => $add[$i][5],
					'matamtbg' => $add[$i][6],
					'labpricebg' => $add[$i][7],
					'labamtbg' => $add[$i][8],
					'subpricebg' => $add[$i][9],
					'subamtbg' => $add[$i][10],
					'totalamt' => $add[$i][11],
					'compcode' => $data['compcode'],
					'adduser' => $username,
					'status' => "W",
					'heading_ref' =>$code,
					
				);
				$this->db->insert('boq_item',$data);
			}
		}*/

		

		$this->db->select('*');
		$this->db->where('type',"TD");
		$this->db->where('approve_project',$bdcode);
		$ma = $this->db->get('approve')->result();
		foreach ($ma as $qq) {
		$data_approve = array(
			'app_pr' => $bqno,
			'app_project' => $qq->approve_project,
			'app_sequence' => $qq->approve_sequence,
			'app_midid' => $qq->approve_mid,
			'app_midname' => strtolower($qq->approve_mname),
			'lock' => $qq->approve_lock,
			'status' => "no",
			'cost' => $qq->approve_cost,
			'creatuser' => $username,
			'creatudate' => date('y-m-d'),
			'compcode' => $data['compcode'],
			'status_td' => "1",
		);
		$this->db->insert('approve_td',$data_approve);
		}

		$out = array(
			'result' => 'ok'
		);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($out));
	}
	 function getdata($tender){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$bdcode = $tender;
		// $bdcode = $this->uri->segment(3);
		$q = $this->datastore_m->getdata($bdcode,$compcode);
		if ($q) {
			$count = 0;
			foreach ($q as $key => $value) {
				$rows = $key+1;
				$count = $key;
				$data[] = array(
					'boq_job' => $value->boq_job,
					'subcostcode' => $value->subcostcode,
					'subcostcodename' => $value->subcostcodename,
					'subcostcodelabor' => $value->subcostcodelabor,
					'subcostnamelabor' => $value->subcostnamelabor,
					'newmatnamee' => $value->newmatnamee,
					'newmatcode' => $value->newmatcode,
					'matcodelabor' => $value->matcodelabor,
					'matnamelabor' => $value->matnamelabor,
					'unitcode' => $value->unitcode,
					'unitname' => $value->unitname,
					'qty_bg' => $value->qty_bg,
					'matpricebg' => $value->matpricebg,

					'matamtbg' => $value->matamtbg,
					// 'matamtbg' => "=sum(E".$rows."*F".$rows.")",
					'labpricebg' => $value->labpricebg,
					'labamtbg' => $value->labamtbg,
					// 'labamtbg' => "=sum(E".$rows."*H".$rows.")",
					'subpricebg' => $value->subpricebg,
					'subamtbg' => $value->subamtbg,
					'totalamt' => $value->totalamt,
					// 'totalamt' => "=sum(G".$rows.",I".$rows.",K".$rows.")",
					'status' => "N"
				);
			}
			$dd = $count+1;
			for ($i=$dd; $i < 500 ; $i++) { 
				$rowss = $i+1;
				$data[] = array(
					'boq_job' => '',
					'subcostcode' => '',
					'subcostcodename' => '',
					'subcostcodelabor' => '',
					'subcostnamelabor' => '',
					'newmatnamee' => '',
					'newmatcode' => '',
					'matcodelabor' => '',
					'matnamelabor' => '',
					'unitcode' => '',
					'unitname' => '',
					'qty_bg' => '0.00',
					'matpricebg' => '0.00',
					// 'matamtbg' => $value->matamtbg,
					'matamtbg' => '0.00',
					'labpricebg' => '0.00',
					// 'labamtbg' => $value->labamtbg,
					'labamtbg' => '0.00',
					'subpricebg' => '0.00',
					'subamtbg' => '0.00',
					// 'totalamt' => $value->totalamt,
					'totalamt' => '0.00',
					'status' => "N"
				);
			}
		}else{
			// $rows = $key+1;
			for ($i=1; $i <= 500; $i++) { 
				$data[] = array(
					'boq_job' => '',
					'subcostcode' => '',
					'subcostcodename' => '',
					'newmatnamee' => '',
					'newmatcode' => '',
					'unitcode' => '',
					'unitname' => '',
					'qty_bg' => '0.00',
					'matpricebg' => '0.00',
					// 'matamtbg' => $value->matamtbg,
					'matamtbg' => '0.00',
					'labpricebg' => '0.00',
					// 'labamtbg' => $value->labamtbg,
					'labamtbg' => '0.00',
					'subpricebg' => '0.00',
					'subamtbg' => '0.00',
					// 'totalamt' => $value->totalamt,
					'totalamt' => '0.00',
					'status' => "N"
				);
			}
		}
		
		$res['data']= $data;
		// $this->output
		// ->set_content_type('application/json')
		// ->set_output(json_encode($res));
		 $jsonEvents=json_encode($res);
		file_put_contents('boq'.$bdcode.'.json',$jsonEvents);
	}

	public function copyboq(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['compcode'] = $session_data['compcode'];
		$tdcode = $this->uri->segment(3);
		$bdcodeto = $this->uri->segment(4);
		$pcode = $this->uri->segment(5);

		$res = $this->bd_m->copyboq($tdcode);
		foreach ($res as $key => $value) {
			$data = array(
				'boq_bd' => $bdcodeto,
				'boq_job' => $value->boq_job,
				'subcostcode' => $value->subcostcode,
				'subcostcodename' => $value->subcostcodename,
				'newmatnamee' => $value->newmatnamee,
				'newmatcode' => $value->newmatcode,
				'unitcode' => $value->unitcode,
				'unitname' => $value->unitname,
				'qty_bg' => $value->qty_bg,
				'qtyboq' => $value->qtyboq,
				'matpricebg' => $value->matpricebg,
				'matamtbg' => $value->matamtbg,
				'labpricebg' => $value->labpricebg,
				'labamtbg' => $value->labamtbg,
				'totalamt' => $value->totalamt,
				'matpriceboq' => $value->matpriceboq,
				'matamtboq' => $value->matamtboq,
				'labpriceboq' => $value->labpriceboq,
				'labamtboq' => $value->labamtboq,
				'totalamtboq' => $value->totalamtboq,
				'subpricebg' => $value->subpricebg,
				'subamtbg' => $value->subamtbg,
				'status' => "N",
				'compcode' => $data['compcode'],
				'adduser' => $username,
				'adduser_id' => $m_id,
				'status_boq' => "N",
				'revise' => "0",

			);
			// $this->db->where('boq_job',$value->boq_job);
			$q = $this->db->insert('boq_item',$data);
		}
		if($q){
			echo "true";
			return true;
		}else{
			echo "error";
			return false;
		}
	}
	public function testpost(){
		 echo json_encode($_POST);
	}
	
}