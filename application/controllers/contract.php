<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class contract extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('office_m');
		$this->load->Model('auth_m');
		$this->load->model('datastore_m');
		$this->load->model('count_m');

		
	}

	public function main_index(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_wo_v');
		$this->load->view('office/wo/main_index_v');
		$this->load->view('base/footer_v');
	}

	public function newcontract()

	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}

		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		// if ($projectid=="") {
		//     $res['getdep'] = $this->datastore_m->department();
		//     $this->load->view('office/inventory/po_receive/open_department_v',$res);
		// }else{
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		foreach ($res['getproj'] as $key => $value) {
			$this->db->select('count(pr.pr_project) as count_pr');
			$this->db->from('pr');
			$this->db->where('pr.pr_project',$value->project_id);
			$this->db->where('pr.pr_approve', 'approve');
			$this->db->where('pr.po_open', 'no');
			$this->db->where('pr.wo_open', NULL);
			$this->db->where('pr.purchase_type != ', '2');

			$query = $this->db->get();	
			$res_count_pr = $query->result_array();
			
			$res['getproj'][$key]->count=$res_count_pr[0]["count_pr"];
		}

		$res['pr'] = $this->datastore_m->allpr_wo();
		$res['getdep'] = $this->datastore_m->getdepartment();
		foreach ($res['getdep'] as $key => $value) {
			$this->db->select('count(pr.pr_project) as count_pr');
			$this->db->from('pr');
			$this->db->where('pr.pr_project',$value->project_id);
			$this->db->where('pr.pr_approve', 'approve');
			$this->db->where('pr.po_open', 'no');
			$this->db->where('pr.purchase_type != ', '2');

			$query = $this->db->get();	
			$res_count_pr = $query->result_array();
			
			$res['getdep'][$key]->count=$res_count_pr[0]["count_pr"];
		}
		
		$this->load->view('navtail/navtail_wo_v', $res);
		$this->load->view('office/contract/openpj_newcontract', $res);
		// }
		$this->load->view('base/footer_v');
		// }
	}
	public function editcontract() {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$username = $session_data['username'];
		$userid = $session_data['m_id'];
		$da['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$da['compimg'] = $this->datastore_m->companyimg();
		// $data['poi'] = $this->po_m->getpo_detail($id, $compcode);
		$this->db->select('*');
		$this->db->from('lo');
		$this->db->join('project', 'project.project_id = lo.projectcode', 'left outer');
		$this->db->where('lo_lono', $id);
		$q = $this->db->get();
		$data['res'] = $q->result();

		$this->db->select('*');
		$this->db->from('lo_detail');
		$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref', 'left outer');
		$this->db->where('lo_ref', $id);
		$q1 = $this->db->get();
		$data['lo'] = $q1->result();

		$da['poapprove'] = $session_data['po_approve'];
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid);
		$this->load->view('navtail/navtail_wo_v', $res);
		$this->load->view('office/contract/edit_contract_v', $data);
		$this->load->view('base/footer_v');
	}

	public function allcontract() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $session_data['img'];
		$code = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		$data['code'] = $code;
		$data['type'] = $type;
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['res'] = $this->office_m->receive_loi($username, $code,$type);
		$data['resi'] = $this->office_m->receive_loi($username, $code,$type);
		$data['poapprove'] = $session_data['po_approve'];

		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$data['getproj'] = $this->datastore_m->getproject_user($userid,$id=null, $projectid);
		$this->load->view('navtail/navtail_wo_v');
		$this->load->view('office/contract/all_contract_v');
		$this->load->view('base/footer_v');
	}
	public function new_contract(){ //work order อันเดิม{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$res['proid'] = $this->uri->segment(3);
		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		// if ($projectid=="") {
		//     $res['getdep'] = $this->datastore_m->department();
		//     $this->load->view('office/inventory/po_receive/open_department_v',$res);
		// }else{
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid);
		
		$this->load->view('navtail/navtail_wo_v', $res);
		$this->load->view('office/contract/new_contract_v', $res);
		// }
		$this->load->view('base/footer_v');
		// }
	}
	public function newworkorder(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$res['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$res['proid'] = $this->uri->segment(3);
		$res['flag'] = $this->uri->segment(4);
		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$res['poapprove'] = $session_data['po_approve'];
		$res['pj'] = $this->datastore_m->project_data($res['proid']);
		// $res['dpname'] = $this->datastore_m->department_name($res['proid'],$compcode);
		// $res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid);
		$res['system'] = $this->datastore_m->getprojectsystem($res['pj'][0]['project_code'],$compcode);
		$res['projectcode'] = $res['pj'][0]['project_code'];
		$res['wt'] = $this->datastore_m->setupwt();
		$res['piad'] = $this->datastore_m->setuppiad();
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_wo_v');
		$this->load->view('office/contract/work_order_v');
		$this->load->view('base/footer_v');
		// echo json_encode($res);
	}
	public function editnewworkorder(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$wono = $this->uri->segment(3);
		$data['proid'] = $this->uri->segment(4);
		$data['flag'] = $this->uri->segment(5);
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['poapprove'] = $session_data['po_approve'];
		$data['pj'] = $this->datastore_m->project_data($data['proid']);
		// $data['dpname'] = $this->datastore_m->department_name($data['proid'],$data['compcode']);
		// $data['getproj'] = $this->datastore_m->getproject_user($userid, $projectid);
		$data['system'] = $this->datastore_m->getprojectsystem($data['pj'][0]['project_code'],$data['compcode']);
		$data['projectcode'] = $data['pj'][0]['project_code'];
		$data['res'] = $this->datastore_m->getwo($wono);
		$data['resi'] = $this->datastore_m->getwodetail($wono);
		$data['wt'] = $this->datastore_m->setupwt();
		$data['piad'] = $this->datastore_m->setuppiad();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_wo_v');
		$this->load->view('office/contract/edit_work_order_v');
		$this->load->view('base/footer_v');
		// echo json_encode($res);
	}
	public function load_prddetail() {
		$pj = $this->uri->segment(3);
		$data['pr'] = $this->datastore_m->contract_pr($pj);
		// $data['res'] = $this->datastore_m->contract_prdetail($id);
		$this->load->view('office/contract/load_prdetail', $data);
	}

	public function load_prd_detail() {
		$id = $this->uri->segment(3);
		$data['pr'] = $this->datastore_m->contract_pr();
		$data['res'] = $this->datastore_m->contract_prdetail($id);
		$this->load->view('office/contract/load_pr_detail', $data);
	}

	public function load_prd_detail_model() {
		$id = $this->uri->segment(3);
		$data['pr'] = $this->datastore_m->contract_pr();
		$data['res'] = $this->datastore_m->contract_prdetail($id);
		$this->load->view('office/contract/load_pr_detail_model', $data);
	}

	public function newapprovecontract() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}

		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($data['pr_project_right'] == 'true') {
			$data['getdep'] = $this->datastore_m->getdepartment();
		} else {
			$data['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
		}
		$this->load->view('navtail/navtail_wo_v', $res);
		$this->load->view('office/contract/approvewo',$data);
		$this->load->view('base/footer_v');
		// }
	}

	public function newapprovecontract_p() {
		$res['pjid'] = $this->uri->segment(3);
		$res['flag'] = $this->uri->segment(4);
		$res['codepj'] = $this->uri->segment(5);
		$session_data = $this->session->userdata('sessed_in');
		$res['username'] = $session_data['username'];
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}

		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		// if ($projectid=="") {
		//     $res['getdep'] = $this->datastore_m->department();
		//     $this->load->view('office/inventory/po_receive/open_department_v',$res);
		// }else{
		$res['getproj'] = $this->datastore_m->getproject_user($userid,$id=null, $projectid);
		$this->load->view('navtail/navtail_wo_v', $res);
		$this->load->view('office/contract/approve_wo_p', $res);
		// }
		$this->load->view('base/footer_v');
		// }
	}


	public function wt_contract() {
		$res['pjid'] = $this->uri->segment(3);
		$res['flag'] = $this->uri->segment(4);
		$res['codepj'] = $this->uri->segment(5);
		$session_data = $this->session->userdata('sessed_in');
		$res['username'] = $session_data['username'];
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}

		$userid = $session_data['m_id'];
		$res['name'] = $session_data['m_name'];
		$res['depid'] = $session_data['m_depid'];
		$res['dep'] = $session_data['m_dep'];
		$res['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$res['project'] = $session_data['m_project'];
		$res['imgu'] = $session_data['img'];
		$this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		// if ($projectid=="") {
		//     $res['getdep'] = $this->datastore_m->department();
		//     $this->load->view('office/inventory/po_receive/open_department_v',$res);
		// }else{
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		$this->load->view('navtail/navtail_master_v', $res);
		$this->load->view('office/contract/wt_contract', $res);
		// }
		$this->load->view('base/footer_v');
		// }
	}

	public function openproject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		$userid = $session_data['m_id'];
		$projectid = $session_data['projectid'];
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($data['pr_project_right'] == 'true') {
			$data['getdep'] = $this->datastore_m->getdepartment();
		} else {
			$data['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
		}
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_wo_v');
		$this->load->view('office/contract/open_project_archive_v');
		$this->load->view('base/footer_v');
	}
	
}
