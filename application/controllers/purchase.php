<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class purchase extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('office_m');
		$this->load->model('datastore_m');
		$this->load->model('po_m');
		$this->load->Model('auth_m');
		$this->load->model('global_m');
		$this->load->library("pagination");

	}

	public function main_index()
	{
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
		// $data['prjid'] = $prjid;
		// $data['pr_project_right'] = $session_data['pr_project_right'];
		$data['pj'] = $this->po_m->getprproj_m($projid);
		$data['po_count'] = $this->po_m->getcount_dashboard($compcode);
		$data['pr_type'] = $this->po_m->count_dash_main($compcode,$userid);
		// $data['pj'] = $this->po_m->project_mm();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/compare/main_index');
		$this->load->view('base/footer_v');
	}

	public function blankpo() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
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
		$res['pr_project_right'] = $session_data['pr_project_right'];
		$this->load->view('navtail/navtail_po_v', $res);
		$this->load->view('base/footer_v');
	}
	public function newpo() {
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['email'] = $session_data['m_email'];
		$data['project'] = $session_data['m_project'];
		$data['mpm'] = $session_data['mpm'];
		$data['moffce'] = $session_data['moffce'];
		$data['mpo'] = $session_data['mpo'];
		$data['mic'] = $session_data['mic'];
		$data['map'] = $session_data['map'];
		$data['mar'] = $session_data['mar'];
		$data['approve'] = $session_data['approve'];
		$data['pc_approve'] = $session_data['pc_approve'];
		$data['master'] = $session_data['master'];
		$data['user_right'] = $session_data['user_right'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		$data['compimg'] = $this->datastore_m->companyimg();

		$data['res'] = $this->datastore_m->getvender();
		$data['getpr'] = $this->office_m->getprapprove();
		$data['resmem'] = $this->datastore_m->getmember();
		$data['getproj'] = $this->datastore_m->getproject();
		$data['getdep'] = $this->datastore_m->department();
		$data['getunit'] = $this->datastore_m->getunit();
		$data['allmaterial'] = $this->datastore_m->allmaterial();
		$data['allcostcode'] = $this->datastore_m->allcostcode();
		$this->load->view('navtail/base_master/header_v');
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('base/office_menu_v', $data);
		$this->load->view('office/purchase/newpo_v', $data);
		$this->load->view('base/footer_v');
	}

	public function opencreatepo() {
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
		$res['pr_project_right'] = $session_data['pr_project_right'];
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
			$this->db->where('pr.purchase_type != ', '3');

			$query = $this->db->get();	
			$res_count_pr = $query->result_array();
			
			$res['getproj'][$key]->count=$res_count_pr[0]["count_pr"];
		}
			$res['pr'] = $this->datastore_m->allpr_po();

		if ($res['pr_project_right'] == 'true') {
			$res['getdep'] = $this->datastore_m->getdepartment();
			foreach ($res['getdep'] as $key => $value) {
				if($res['getdep']){

					$this->db->select('count(pr.pr_project) as count_pr');
					$this->db->from('pr');
					$this->db->where('pr.pr_project',$value->project_id);
					$this->db->where('pr.pr_approve', 'approve');
					$this->db->where('pr.po_open', 'no');
					$this->db->where('pr.purchase_type != ', '2');
		
					$query = $this->db->get();	
					$res_count_pr = $query->result_array();
					
					$res['getdep'][$key]->count=$res_count_pr[0]["count_pr"];
				}else{

				}
			}
		} else {
			// echo $userid;
			// die();
			$res['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
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
			// $res['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
		}


		$this->load->view('navtail/navtail_po_v', $res);
		$this->load->view('office/purchase/main/open_project_v', $res);
		// }
		$this->load->view('base/footer_v');
	}

	public function openpo() {
		$prno = $this->uri->segment(3);
		$data['proid'] = $this->uri->segment(3);
		$data['flag'] = $this->uri->segment(4);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['ponoo'] = $this->datastore_m->pono_name($prno);
		$res = $this->datastore_m->getproject_proj($prno);
		foreach ($res as $key => $value) {
			$data['projectnamea'] = $value->project_name;
			$data['projectida'] = $value->project_id;
			$data['project_co'] = $value->project_code;
			// $data['itßem'] = $this->db->query("select * from project_item where project_code='$value->project_code'")->result();
		}

		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		$res['pr_project_right'] = $session_data['pr_project_right'];
		$res["system_array"] = $this->global_m->get_system_project("id",$data['proid'],false,$session_data["compcode"]);

		$this->load->view('navtail/navtail_po_v', $res);
		$this->load->view('office/purchase/main/create_po_v');
		$this->load->view('base/footer_v');

	}
	public function editpo() {
		$pono = $this->uri->segment(3);
		$projectid = $this->uri->segment(5);

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$res = $this->datastore_m->getproject_projj($pono);
		foreach ($res as $key => $value) {
			$data['projectnamea'] = $value->project_name;
			$data['projectida'] = $value->project_id;
			$data['project_co'] = $value->project_code;
			$data['item'] = $this->db->query("select * from project_item where project_code='$value->project_code'")->result();
		}
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['res'] = $this->po_m->getpo_header($pono, $data['compcode'],$projectid);
		$data['poi'] = $this->po_m->getpo_detail($pono, $data['compcode'],$projectid);
		foreach ($data['res'] as $key => $value) {
			$syscode = $value->po_system;
		}
		$data['sys'] = $this->po_m->get_system($syscode,$data['compcode']);
		$data['poapprove'] = $session_data['po_approve'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/main/edit_po_v');
		$this->load->view('base/footer_v');

	}
	public function po_archive() {
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
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['po'] = $this->po_m->getpo($compcode);
		$res['poapprove'] = $session_data['po_approve'];
		$typereport = "po";
		$data['reporttype'] = $this->po_m->get_report($typereport);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v', $res);
		$this->load->view('office/purchase/main/po_archive_v');
		$this->load->view('base/footer_v');
	}
	public function opennewmattype() {
		$data['cmattype'] = $this->datastore_m->getmat_type();
		$this->load->view('office/purchase/newtype_v', $data);
	}
	public function opennewmatgroup() {
		$id = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getmat_group($id);
		$this->load->view('office/purchase/newgroup_v', $data);
	}
	public function getmaterial() {
		$data['allmaterial'] = $this->datastore_m->allmaterial();
		$this->load->view('office/purchase/getmaterial_v', $data);
	}

	///// new system
	public function load_pr() {
		$prno = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data['loadpr'] = $this->datastore_m->getprtopo($prno, $flag);

		$this->load->view('office/purchase/main/load_pr_v.php', $data);
	}

	public function load_pr2() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$prno = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$system = $this->uri->segment(5);
		$data['bd'] = $this->uri->segment(6);
		$data['loadpr'] = $this->datastore_m->getprtopo($prno, $flag,$system);

		$this->load->view('office/purchase/main/load_pr_v2.php', $data);
	}

	public function load_wo() {
		$prno = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$system = $this->uri->segment(5);
		$data['bd'] = $this->uri->segment(6);
		$data['loadwo'] = $this->datastore_m->load_pr_wo($prno,$flag,$system);
		$this->load->view('office/purchase/main/load_wo_v.php', $data);
	}
	public function load_pr_wo() {
		$prno = $this->uri->segment(3);
		$data['projectcode'] = $this->uri->segment(4);
		$system = $this->uri->segment(5);
		$data['bd'] = $this->uri->segment(6);
		$data['loadwo'] = $this->datastore_m->load_pr_for_wo($prno,$data['projectcode'],$system);
		$this->load->view('office/purchase/main/load_wo_v.php', $data);
	}

	public function load_prd() {
		$ref = $this->uri->segment(3);
		$data['prd'] = $this->datastore_m->getprd($ref);
		$this->load->view('office/purchase/main/load_prd_v.php', $data);
	}

	public function load_po_newcontract() {
		$po = $this->uri->segment(3);
		$data['loadpo'] = $this->datastore_m->GetPoNewContract($po);
		$this->load->view('office/contract/load_po_new_contract_v.php', $data);
	}
	public function load_tb_nc() {
		$poo = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->getprncon($poo);
		$this->load->view('office/contract/load_table_ncontract_v', $data);
	}

	// report

	// report
	function report_po() {
		$session_data = $this->session->userdata('sessed_in');
		$id = $this->uri->segment(3);
		$username = $session_data['username'];
		$data['username'] = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$userid = $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->po_m->companyimgbycompcode($compcode);
		$data['res'] = $this->office_m->po_report($id);
		$res = $this->po_m->report_po_id($id);
		// $data['resi'] = $this->office_m->po_report_item($id);
		// $this->load->view('navtail/base_master/header_v',$data);
		// $this->load->view('navtail/base_master/tail_v');
		// $this->load->view('navtail/navtail_print_v');
		$dat = $this->office_m->po_report_item($id);
		$total = 0;
		$dsum = 0;
		$exdisamt = 0;
		foreach ($dat as $bv) {
			$sum = $bv->poi_priceunit * $bv->poi_qty;
			$total = $total + $bv->poi_netamt;
			$data['exdisamt'] = $exdisamt + $bv->po_disex;
			$dsum = $dsum + $bv->poi_disamt;
			$s1 = ($bv->poi_priceunit - (($bv->poi_discountper1 * $bv->poi_priceunit) / 100)) * $bv->poi_qty;
			$s = $s1 - (($bv->poi_discountper2 * $s1) / 100);

			$data['discount2'] = $sum - $s;
			$data['total2'] = $total;
			$data['xdsum'] = $dsum;
		}

		foreach ($res as $value) {
			$tot = $value->total;
		}
		if ($tot <= 6) {
			$data['resi'] = $this->office_m->po_report_item($id);
			$this->load->view('office/purchase/main/report/po_master_v', $data);
		} else {
			$v = array_chunk($dat, 6);
			$countnum = count($v);
			foreach ($v as $key => $val) {
				if ($key == 0) {
					$data['resi'] = $val;
					$this->load->view('office/purchase/main/report/po_header_v', $data);
				} elseif ($key == 1) {
					$data['key'] = 1;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report2_v', $data);
				} elseif ($key == 2) {
					$data['key'] = 2;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report3_v', $data);
				} elseif ($key == 3) {
					$data['key'] = 3;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report4_v', $data);
				} elseif ($key == 4) {
					$data['key'] = 4;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report5_v', $data);
				} elseif ($key == 5) {
					$data['key'] = 5;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report6_v', $data);
				} elseif ($key == 6) {
					$data['key'] = 6;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report7_v', $data);
				} elseif ($key == 7) {
					$data['key'] = 7;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report8_v', $data);
				} elseif ($key == 8) {
					$data['key'] = 8;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_report9_v', $data);
				} else {
					$data['key'] = 6;
					$data['dd'] = $key;
					$data['resi'] = $val;
					$data['dat'] = $tot;
					$this->load->view('office/purchase/main/report/po_footer_v', $data);
				}

			}
		}
		// $this->load->view('base/footer_v');

	}

	public function po_approve() {
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
		// $this->load->view('navtail/base_master/tail_v');
		$res['poapprove'] = $session_data['po_approve'];
		$res['pr_project_right'] = $session_data['pr_project_right'];
		// if ($projectid=="") {
		//     $res['getdep'] = $this->datastore_m->department();
		//     $this->load->view('office/inventory/po_receive/open_department_v',$res);
		// }else{
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($res['pr_project_right'] == 'true') {
			$res['getdep'] = $this->datastore_m->getdepartment();
		} else {

			$res['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
		}
		// $this->load->view('navtail/base_master/header_v', $res);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v', $res);
		$this->load->view('office/purchase/main/po_approve_v');
		$this->load->view('base/footer_v');
	}

	public function purchase_approve() {
		$id = $this->uri->segment(3);
		$data['pjid'] = $this->uri->segment(3);
		$data['flag'] = $this->uri->segment(4);
		$data['codepj'] = $this->uri->segment(5);
		$session_data = $this->session->userdata('sessed_in');
		$data['username'] = $session_data['username'];
		$data['m_id']= $session_data['m_id'];

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
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['po'] = $this->po_m->getpo($compcode);
		$res['poapprove'] = $session_data['po_approve'];
		if ($data['flag'] == "p") {
			$res['getproj'] = $this->datastore_m->allproject_postatus($id);
			$res['getproj1'] = $this->datastore_m->allproject_postatus1($id);
			$res['getproj2'] = $this->datastore_m->allproject_postatus1_where($id);
		} else {
			$res['getproj'] = $this->datastore_m->alldep_postatus($id);
			$res['getproj1'] = $this->datastore_m->alldep_postatus1($id);
			$res['getproj2'] = $this->datastore_m->alldep_postatus1_where($id);
		}
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v', $res);
		$this->load->view('office/purchase/main/purchase_approve');
		$this->load->view('base/footer_v');
	}

	public function po_archive_pagination() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$projid = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data['flag'] = $flag;
		$data['projid'] = $projid;
		// $config = array();
		// $config["base_url"] = base_url() . "purchase/po_archive_pagination";
		// $config["total_rows"] = $this->po_m->po_count();
		// $config["per_page"] = 100;
		// $config["uri_segment"] = 3;

		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = floor($choice);
		// //config for bootstrap pagination class integration
		// $config['full_tag_open'] = '<ul class="pagination">';
		// $config['full_tag_close'] = '</ul>';
		// $config['first_link'] = false;
		// $config['last_link'] = false;
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';
		// $config['prev_link'] = '&laquo';
		// $config['prev_tag_open'] = '<li class="prev">';
		// $config['prev_tag_close'] = '</li>';
		// $config['next_link'] = '&raquo';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li class="active"><a href="#">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';

		// $this->pagination->initialize($config);

		// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->po_m->
		// 	fetch_po($config["per_page"], $page, $data['compcode']);
		// $data["links"] = $this->pagination->create_links();
		$typereport = "po";
		$data['getpr'] = $this->po_m->get_po_active($projid,$flag,$data['compcode']);
		$data['reporttype'] = $this->po_m->get_report($typereport);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view("office/purchase/main/po_archive_pagination_v");
		$this->load->view('base/footer_v');
	}

	public function load_po_archive() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$flag = $this->uri->segment(3);
		$find = $this->uri->segment(4);
		$typereport = "po";
		$data['reporttype'] = $this->po_m->get_report($typereport);
		$data['res'] = $this->po_m->load_po_archive($find, $compcode, $flag);
		$this->load->view('office/purchase/main/load_po_archive_v', $data);
	}

	public function count_pr() {
		$session_data = $this->session->userdata( 'sessed_in' );
		$username     = $session_data['username'];
		$compcode     = $session_data['compcode'];
		$status = $this->uri->segment(3);
		$data = array();
		$id = $this->input->post('id_pr');
		$pr_project['data'] = $this->po_m->get_pr_count($id);
		$this->load->view('office/purchase/main/model_pr_v', $pr_project);

		
	}
	public function count_pr_all() {
		$session_data = $this->session->userdata( 'sessed_in' );
		$username     = $session_data['username'];
		$compcode     = $session_data['compcode'];
		$data = array();
		$id = $this->uri->segment(3);
		$pr_project['data'] = $this->po_m->get_pr_count_all($id);
		$this->load->view('office/purchase/main/model_pr_v_no_compare', $pr_project);

		
	}
	public function count_pr_no() {
		$session_data = $this->session->userdata( 'sessed_in' );
		$username     = $session_data['username'];
		$compcode     = $session_data['compcode'];

		$data = array();
		$id = $this->uri->segment(3);
		$pr_project['data'] = $this->po_m->get_pr_count_no($id);
		$this->load->view('office/purchase/main/model_pr_v_no', $pr_project);

		
	}
	public function count_pr_compare() {
		$session_data = $this->session->userdata( 'sessed_in' );
		$username     = $session_data['username'];
		$compcode     = $session_data['compcode'];

		$data = array();
		$id = $this->uri->segment(3);
		$pr_project['data'] = $this->po_m->get_pr_count_compare($id);
		$this->load->view('office/purchase/main/model_pr_v_no_compare', $pr_project);

		
	}
	public function count_pr_resolve() {
		$session_data = $this->session->userdata( 'sessed_in' );
		$username     = $session_data['username'];
		$compcode     = $session_data['compcode'];

		$data = array();
		$id = $this->uri->segment(3);
		$pr_project['data'] = $this->po_m->get_pr_count_resolve($id);
		$this->load->view('office/purchase/main/model_pr_v_resolve', $pr_project);

		
	}
	public function loadfile()
	{
		$session_data = $this->session->userdata( 'sessed_in' );
		$username     = $session_data['username'];
		$compcode     = $session_data['compcode'];
		$id = $this->input->post( 'id_pr' );
		$data["flag"] = $this->input->post('flag');
		if ($id!="") {
			$data['file'] = $this->po_m->selectfilepr( $id, $compcode, $data["flag"] );
		}

		$this->load->view('office/purchase/main/load_pophover_pr_file_v',$data);

	}

	public function count_wo() {
		$data = array();
		$id = $this->input->post('id_pr');
		$pr_project['data'] = $this->po_m->get_wo_count($id);
		$this->load->view('office/purchase/main/model_wo_v', $pr_project);
			
	}

	public function count_wo_dep() {
		$data = array();
		$id = $this->input->post('id_pr');
		$pr_project['data'] = $this->po_m->get_wo_count_dep($id);
		$this->load->view('office/purchase/main/model_wo_dep', $pr_project);
			
	}

		public function openproject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['flagmenu'] = $this->uri->segment(3);
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
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/main/open_project_archive_v');
		$this->load->view('base/footer_v');
	}
	public function archive_po_load() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$prjid = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$open = $this->uri->segment(5);

		$data['prjid'] = $prjid;
		$data['status'] = $status;
		$data['open'] = $open;
		$data['getpo'] = $this->po_m->getprproj_status($prjid, $status,$open);
		$typereport = "po";
		$data['reporttype'] = $this->po_m->get_report($typereport);
		$this->load->view('office/purchase/archive_po_load_v', $data);
	}
	public function pr_open_project() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['menu'] = $this->uri->segment(3);
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
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/compare/pr_open_project');
		$this->load->view('base/footer_v');
	}

	public function new_compare_price() {
		$prjid = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
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
		$data['prjid'] = $prjid;
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['getpo'] = $this->po_m->getprproj_m($prjid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/compare/new_compare_price_v');
		$this->load->view('base/footer_v');
	}
	public function compare_price_v() {
		$prjid = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
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
		$data['prjid'] = $prjid;
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['getpo'] = $this->po_m->getprproj_m($prjid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/compare/compare_price_v');
		$this->load->view('base/footer_v');
	}
	public function load_compare() {
		$prjid = $this->uri->segment(3);
		$data['res'] = $this->po_m->get_compare_m($prjid);
		$this->load->view('office/purchase/compare/load_compareprice_v', $data);	
	}
	public function load_new_compare() {
		$prjid = $this->uri->segment(3);
		$data['res'] = $this->po_m->get_new_compare_m($prjid);
		$this->load->view('office/purchase/compare/load_new_compareprice_v', $data);	
	}

	public function pritem_compare_old() {
		$code = $this->uri->segment(3);
		$data['flag'] = "";
		$data['res'] = $this->po_m->get_pritemcompare_m($code);
		$this->load->view('office/purchase/compare/pritem_rqcompare', $data);	
	}
	public function pritem_compare() {
		$code = $this->uri->segment(3);
		$data['flag'] = $this->uri->segment(4);
		$vid = $this->uri->segment(5);
		$data['vender'] = $this->po_m->getvender($vid);
		$data['res'] = $this->po_m->get_pritemcomparedetail_m($code,$vid);
		$this->load->view('office/purchase/compare/pritem_compare', $data);	
	}

	public function archive_compare()
	{
		$prjid = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
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
		$data['prjid'] = $prjid;
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['getpo'] = $this->po_m->get_compare_m_p($prjid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/compare/archive_compare_v');
		$this->load->view('base/footer_v');
	}

	public function edit_compare_price() {
		$prjid = $this->uri->segment(3);
		$cpcode = $this->uri->segment(4);
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
		$data['prjid'] = $prjid;
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['getpo'] = $this->po_m->getprproj_m($prjid);
		$data['getcompare'] = $this->po_m->getcompare($cpcode,$compcode);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_po_v');
		$this->load->view('office/purchase/compare/edit_compare_price');
		$this->load->view('base/footer_v');
	}
	public function load_compare_detail(){
		$session_data = $this->session->userdata('sessed_in');
		$data['compcode'] = $session_data['compcode'];
		$cpcode = $this->uri->segment(3);
		$data['detail'] = $this->po_m->getcompare_detail($cpcode,$data['compcode']);
		$this->load->view('office/purchase/compare/load_compare_detail_v',$data);
	}
	public function load_compare_vender(){
		$session_data = $this->session->userdata('sessed_in');
		$data['compcode'] = $session_data['compcode'];
		$cpcode = $this->uri->segment(3);
		$data['vender'] = $this->po_m->getcompare_vender($cpcode,$data['compcode']);
		$this->load->view('office/purchase/compare/load_compare_vender_v',$data);
	}
	public function load_compare_vender_add_price(){
		$session_data = $this->session->userdata('sessed_in');
		$data['compcode'] = $session_data['compcode'];
		$cpcode = $this->uri->segment(3);
		$data['vender'] = $this->po_m->getcompare_vender($cpcode,$data['compcode']);
		$this->load->view('office/purchase/compare/load_compare_vender_add_price_v',$data);
	}
	public function load_print_compare(){
		$session_data = $this->session->userdata('sessed_in');
		$data['compcode'] = $session_data['compcode'];
		$data['cpcode'] = $this->uri->segment(3);
		$vcode = $this->uri->segment(4);
		$data['rescompare'] = $this->po_m->getprcompareprint($data['cpcode'],$data['compcode'],$vcode);
		$data['rescompares'] = $this->po_m->getprcompareprintcc($data['cpcode'],$data['compcode'],$vcode);
		$data['vender'] = $this->po_m->getcomparevender($data['cpcode'],$data['compcode']);
		$this->load->view('office/purchase/compare/load_print_compareprice_v',$data);
	}

	public function getpomonth()
        { 
          $q = $this->po_m->get_po_line_chart();
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }

        public function getwomonth()
        {
          $q = $this->po_m->get_wo_line_chart();
           $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
        }
        public function getpoonut(){
          $q = $this->po_m->get_po_donut_chart();
          foreach ($q as $key => $value) {
            
            $data[$key]['value'] = $value->countpo;
            switch ($value->po_approve) {
              case 'wait':
              $data[$key]['status'] = "Pending";
                $data[$key]['color'] = "#29B6F6";
                break;
              case 'approve':
              $data[$key]['status'] = "Approve";
                $data[$key]['color'] = "#66BB6A";
                break;
              
              default:
              $data[$key]['status'] = "Reject";
                 $data[$key]['color'] = "#EF5350";
                break;
            }
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }
        public function getwodonut(){
          $q = $this->po_m->get_wo_donut_chart();
          foreach ($q as $key => $value) {
            // $approve = $value->approve;
            $data[$key]['value'] = $value->countwo;
            switch ($value->status) {
              case 'wait':
                $data[$key]['status'] = "Pending";
                $data[$key]['icon'] = "<i class='status-mark border-blue-300 position-left'></i>";
                $data[$key]['color'] = "#29B6F6";
                break;
              case 'approve':
                $data[$key]['status'] = "Approve";
                $data[$key]['icon'] = "<i class='status-mark border-success-300 position-left'></i>";
                $data[$key]['color'] = "#66BB6A";
                break;
            }
          }
          $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
				}
				
		public function changeprstatus(){
			$prcode = $this->input->post('prcode');
			$status = $this->input->post('pr_status');
			$data = array(
				'pr_postatus' => $status,
				);
				$this->db->where('pr_prno',$prcode);
				if($this->db->update('pr',$data)){
				echo $status; 
				return true;
				}else{
				echo "error";
				return true;
				}
		}

		public function lastprice(){
			$data = $this->input->post();
			print_r($data);
			// $this->output
            // ->set_content_type('application/json')
            // ->set_output(json_encode($data));
		}

		public function getprojectjson(){
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$q = $this->db->query("select * from project where compcode = '".$compcode."'")->result();
			$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($q));
		}	

}
