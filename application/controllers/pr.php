<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class pr extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('pr_db');
		$this->load->model('datastore_m');
		$this->load->Model('auth_m');
		$this->load->model('pr_m');
		$this->load->model('count_m');
		$this->load->helper('date');

	}

	public function newpr() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['mid'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $this->datastore_m->changeprofile($username);
		// $data['compimg'] = $this->datastore_m->companyimg();
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('office/officeservice/pr_v', $data);
		$this->load->view('base/footer_v');

	}

	public function model_boq() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$sy = $this->uri->segment(4);
		$data['pj'] = $this->uri->segment(5);
		$data['boq'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->model_boq_m($id, $sy,$data['pj']);
		$this->load->view('office/pr/boq/model_boq', $data);
	}

	public function model_editboq() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$sy = $this->uri->segment(4);
		$data['pj'] = $this->uri->segment(5);
		$data['res'] = $this->datastore_m->model_boq_m($id, $sy,$data['pj']);
		$this->load->view('office/pr/boq/model_editboq', $data);
	}

	public function model_costcodeboq() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$sy = $this->uri->segment(4);
		// $data['segment'] = $sy;
		$data['id'] = $this->uri->segment(5);
		$data['bd'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->model_boqcostcode_m($id, $sy);
		// var_dump($id);die();
		$this->load->view('office/pr/boq/model_costcodeboq', $data);
	}

	public function model_costcodeboq_row() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$id = $this->uri->segment(3);
		$sy = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$data['bd'] = $this->uri->segment(3);
		$data['res'] = $this->datastore_m->model_boqcostcode_m($id, $sy);
		$this->load->view('office/pr/boq/model_costcodeboq_row', $data);
	}
	public function editpr() {
		$prno = $this->uri->segment(3);
		$projectid = $this->uri->segment(5);
		$res = $this->datastore_m->getproject_proj($projectid);
		$data['res'] = $this->pr_m->getedit_pr($prno,$projectid);
		$data['resi'] = $this->pr_m->getpr_itemi($prno,$projectid);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$da['compcode'] = $session_data['compcode'];
		
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		$this->db->select('pr_approve');
		$this->db->where('pr_prno', $prno);
		$qq = $this->db->get('pr')->result();
		foreach ($qq as $key => $value) {
			$data['prappr'] = $value->pr_approve;
		}
		
		$data['costtype'] = $this->datastore_m->costtype();
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/editpr_v', $data);
		$this->load->view('base/footer_v');
	}
	public function load_system_type(){
		$id = $this->uri->segment(3);
		// $data['g'] = $this->uri->segment(5);
		$data['type'] = $this->datastore_m->m_load_system_type_2($id);
		$this->load->view('office/pr/m_load_system_type_view', $data);
	}
	public function load_editpr_detail() {
		$prno = $this->uri->segment(3);
		$data['tdn'] = $this->uri->segment(5);
		$data['pj'] = $this->uri->segment(6);
		$pj = $this->uri->segment(6);
		$data['res'] = $this->pr_m->getedit_pr($prno,$data['pj']);
		$data['resi'] = $this->pr_m->getpr_itemitem($prno,$pj);
		
		$this->load->view('office/pr/load_editpr_detail_v', $data);
	}
	public function getloadunit(){
		$data['pritemid'] =  $this->uri->segment(3);
		$data['getunit'] = $this->datastore_m->getunit();
		$this->load->view('office/pr/load_unit_pr_v', $data);
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
		// $this->load->model('datastore_m');
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		// $data['compimg'] = $this->datastore_m->companyimg();
		$data['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($data['pr_project_right'] == 'true') {
			$data['getdep'] = $this->datastore_m->getdepartment();
		} else {
			$data['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
			// $res['getdep'] = $this->datastore_m->getdepart_user($userid,$da['depid']);
		}
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v');
		$this->load->view('office/pr/open_project_archive_v');
		$this->load->view('base/footer_v');
	}
	public function openbooking() {
	  $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      if ($username=="") {
             redirect('/');
      }
      $da['name'] = $session_data['m_name'];
      $da['depid'] = $session_data['m_depid'];
      $da['dep'] = $session_data['m_dep']; 
      $data['projid'] = $session_data['projectid'];
      $da['project'] = $session_data['m_project'];
      $projid = $session_data['projectid'];
      $userid = $session_data['m_id'];
      $projectid = $session_data['projectid'];
      $da['imgu'] = $session_data['img'];
      $dd['approve'] = $session_data['approve'];
      $dd['pr_project_right'] = $session_data['pr_project_right'];
      $res['getproj'] = $this->datastore_m->getproject_user($userid,$projectid);
        if($dd['pr_project_right'] =='true'){
          $res['getdep'] = $this->datastore_m->getdepartment();
        }else{
          $res['getdep'] = $this->datastore_m->getdepart_user($userid,$da['depid']);
        }

      $this->load->view('navtail/base_master/header_v',$da);
      $this->load->view('navtail/base_master/tail_v');
      $this->load->view('navtail/navtail_pr_v',$dd);
      $this->load->view('office/pr/open_booking_archive_v',$res);
      $this->load->view('base/footer_v');


		// $this->load->view('navtail/base_master/header_v', $data);
		// $this->load->view('navtail/base_master/tail_v');
		// $this->load->view('navtail/navtail_pr_v');
		// $this->load->view('office/pr/open_booking_archive_v');
		// $this->load->view('base/footer_v');
	}
	public function archive_pr() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $da['compimg'] = $this->datastore_m->companyimg();

		$prjid = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data['getpr'] = $this->pr_m->getprproj($prjid, $flag);
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/archive_pr_v', $data);

		$this->load->view('base/footer_v');
	}
	public function archive_pb() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		// $data['getproj'] = $this->datastore_m->getproject();
		// $data['resmem'] = $this->datastore_m->getmember();
		// $data['getunit'] = $this->datastore_m->getunit();
		// $data['getdep'] = $this->datastore_m->department();
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		// $data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $da['compimg'] = $this->datastore_m->companyimg();

		$prjid = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data['getpr'] = $this->pr_m->getprproj($prjid, $flag);
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/archive_pb_v', $data);

		$this->load->view('base/footer_v');
	}
	public function archive_pr_dep() {

		// $depid = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		// $data['getproj'] = $this->datastore_m->getproject();
		// $data['resmem'] = $this->datastore_m->getmember();
		// $data['getunit'] = $this->datastore_m->getunit();
		// $data['getdep'] = $this->datastore_m->department();
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		// $data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $da['compimg'] = $this->datastore_m->companyimg();

		$prjid = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data['projectid'] = $this->uri->segment(3);
		$data['getpr'] = $this->pr_m->getprproj($prjid, $flag);
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/archive_pr_v', $data);

		$this->load->view('base/footer_v');
	}
	public function archive_pr_all() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $da['compimg'] = $this->datastore_m->companyimg();

		$data['getpr'] = $this->pr_m->getprprojall();
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/report_summary/archive_pr_all', $data);

		$this->load->view('base/footer_v');
	}
	public function archive_pr_load() {
		$prjid = $this->uri->segment(3);
		$data['projectid'] = $this->uri->segment(3);
		$data['status'] = $this->uri->segment(4);
		$data['po'] = $this->uri->segment(5);
		$data['flag'] = "p";
		if ($this->uri->segment(5) == "open") {
			$data['getpr'] = $this->pr_m->getprproj_status_poopen($prjid, $data['status'], $data['po']);
		} else {
			$data['getpr'] = $this->pr_m->getprproj_status($prjid, $data['status']);
		}
		$this->load->view('office/pr/archive_pr_load_v', $data);
	}
	public function archive_pr_load_all() {
		$data['status'] = $this->uri->segment(3);
		$data['po'] = $this->uri->segment(4);
		$data['flag'] = "p";
		if ($this->uri->segment(4) == "open") {
			$data['getpr'] = $this->pr_m->getprproj_status_poopen_all($data['status'], $data['po']);
		} else {
			$data['getpr'] = $this->pr_m->getprproj_status_all($data['status']);
		}
		$this->load->view('office/pr/archive_pr_load_v', $data);
	}

	public function archive_pr_approve() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		// $data['getproj'] = $this->datastore_m->getproject();
		// $data['resmem'] = $this->datastore_m->getmember();
		// $data['getunit'] = $this->datastore_m->getunit();
		// $data['getdep'] = $this->datastore_m->department();
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		// $data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $da['compimg'] = $this->datastore_m->companyimg();
		// $dd['countallpr'] = $this->count_m->countpr();
		// $dd['countapprovepr'] = $this->count_m->countprapprove();
		// $dd['countprdisapprove'] = $this->count_m->countprdisapprove();
		$data['getpr'] = $this->pr_m->getallprapprove();
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/archive_pr_approve_v', $data);
		$this->load->view('base/footer_v');
	}
	public function open_billsubc() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$data['flagmodul'] = $this->uri->segment(3);
		$userid = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['compcode'] = $session_data['compcode'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_project_progress_v');
		$this->load->view('office/account/ap/aps/bill_subcon_v');
		
		$this->load->view('base/footer_v');
	}
	public function archive_pr_pending() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		// $data['getproj'] = $this->datastore_m->getproject();
		// $data['resmem'] = $this->datastore_m->getmember();
		// $data['getunit'] = $this->datastore_m->getunit();
		// $data['getdep'] = $this->datastore_m->department();
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		// $data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $da['compimg'] = $this->datastore_m->companyimg();
		// $dd['countallpr'] = $this->count_m->countpr();
		// $dd['countapprovepr'] = $this->count_m->countprapprove();
		// $dd['countprdisapprove'] = $this->count_m->countprdisapprove();
		$data['getpr'] = $this->pr_m->getallprwait();
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/archive_pr_wait_v', $data);
		$this->load->view('base/footer_v');
	}
	public function pr_project_approve() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['username'] = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['position'] = $session_data['m_position'];
		$userid = $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}

		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['getproj'] = $this->datastore_m->getproject_user($userid, $projid,$compcode);

		if ($data['pr_project_right'] == 'true') {
			$data['getdep'] = $this->datastore_m->getdepartment();
		} else {
			$data['getdep'] = $this->datastore_m->getdepart_user($userid,$compcode);
		}
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v');
		$this->load->view('office/pr/open_project_approve_v');
		$this->load->view('base/footer_v');
	}
	public function pr_approve() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['position'] = $session_data['m_position'];
		$data['m_id']= $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}

		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$depid = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		// $projid = $session_data['projectid'];
		$projid = $this->uri->segment(3);
		$data['projidc'] = $this->uri->segment(4);
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['qpj'] = $this->pr_m->apppr($data['projidc']);
		$data['getproj1'] = $this->pr_m->allproject_prstatus($data['projidc'],$data['m_id']);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v', $data);
		$this->load->view('navtail/navtail_pr_v', $data);
		$this->load->view('office/pr/pr_approve_v', $data);
		// $this->load->view('office/pr/pr_approve_dep_v',$data);

		$this->load->view('base/footer_v');
	}
	public function pr_approve_line() {
		$projid = $this->uri->segment(3);
		$projidc = $this->uri->segment(4);
		$data['username'] = $this->uri->segment(5);
		$data['pr_no'] = $this->uri->segment(6);
		$data['header'] = $this->pr_m->getpr_line($data['pr_no']);
		$data['qpj'] = $this->pr_m->apppruser($projidc,$data['username'],$data['pr_no']);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('office/pr/pr_approve_line_v');
		$this->load->view('base/footer_v');
	}

		public function pr_approve_bk() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$data['username'] = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['position'] = $session_data['m_position'];
		$data['m_id']= $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}

		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$depid = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		// $projid = $session_data['projectid'];
		$projid = $this->uri->segment(3);
		$projidc = $this->uri->segment(4);
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['getpr'] = $this->pr_m->getallprwaitproj($projid);
		$data['getappov'] = $this->pr_m->getallpraprrove5($projidc);
		$data['getpmappov'] = $this->pr_m->getallprpmaprrove5($projid);
		$data['getwait'] = $this->pr_m->getallprwait5($projid);
		$data['getpmwait'] = $this->pr_m->getallprdirectorwait5w($projid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v', $data);
		$this->load->view('navtail/navtail_pr_v', $data);
		$this->load->view('office/pr/booking_approve_pj', $data);
		// $this->load->view('office/pr/pr_approve_dep_v',$data);

		$this->load->view('base/footer_v');
	}

	public function pr_approve_dep() {
		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['username'] = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['position'] = $session_data['m_position'];
		$data['m_id']= $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}

		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$depid = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		// $projid = $session_data['projectid'];
		$projid = $this->uri->segment(3);
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['getpr'] = $this->pr_m->getallprwaitdep($projid);
		$data['getappov'] = $this->pr_m->getallpraprrove5_dep($projid);
		$data['getpmappov'] = $this->pr_m->getallprpmaprrove5_dep($projid);
		$data['getwait'] = $this->pr_m->getallprwait5_dep($projid);
		$data['getpmwait'] = $this->pr_m->getallprdirectorwait5w_dep($projid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v', $data);
		$this->load->view('navtail/navtail_pr_v', $data);
		$this->load->view('office/pr/pr_approve_dep_v', $data);

		$this->load->view('base/footer_v');
	}

	public function pr_approve_dep_bk() {
		$session_data = $this->session->userdata('sessed_in');

		$username = $session_data['username'];
		$m_id = $session_data['m_id'];
		$data['username'] = $session_data['username'];
		$data['compcode'] = $session_data['compcode'];
		$data['position'] = $session_data['m_position'];
		$data['m_id']= $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}

		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$depid = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		// $projid = $session_data['projectid'];
		$projid = $this->uri->segment(3);
		$data['project'] = $session_data['m_project'];
		$this->load->model('datastore_m');
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['getpr'] = $this->pr_m->getallprwaitdep($projid);
		$data['getappov'] = $this->pr_m->getallpraprrove5_dep($projid);
		$data['getpmappov'] = $this->pr_m->getallprpmaprrove5_dep($projid);
		$data['getwait'] = $this->pr_m->getallprwait5_dep($projid);
		$data['getpmwait'] = $this->pr_m->getallprdirectorwait5w_dep($projid);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v', $data);
		$this->load->view('navtail/navtail_pr_v', $data);
		$this->load->view('office/pr/booking_approve_dp', $data);

		$this->load->view('base/footer_v');
	}

	public function delpr() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$id = $this->uri->segment(3);
		$project = $this->uri->segment(4);
		$arrayName = array(
			'pr_status' => "delete",
			'deluser' => $username,
			'deldate' => date('Y-m-d H:i:s', now()),
			'pr_approve' => "delete",
		);
		$this->db->where('pr_prno', $id);
		$this->db->where('pr_project',$project);
		$q = $this->db->update('pr', $arrayName);
		$data = array('pri_status' => 'delete', );
		$this->db->where('pri_ref',$id);
		$this->db->where('pri_project',$project);
		$this->db->update('pr_item',$data);

		$this->db->where('app_pr', $id);
		$this->db->where('app_project',$project);
		$this->db->delete('approve_pr');

		if ($q) {
			if ($username == "admin") {
				redirect('pr/archive_pr_all');
			} else {
				redirect('pr/archive_pr/' . $project.'/p');
			}
		} else {
			return false;
		}
	}

	public function decrement() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$da['dep'] = $session_data['m_dep'];
		$da['project'] = $session_data['m_project'];
		$da['imgu'] = $session_data['img'];
		//Permission
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		//Permission

		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/decrement_pr/index');

		$this->load->view('base/footer_v');

	}

	public function pr_table() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// $input = $this->input->post();

		$res['rows'] = $this->pr_db->get_pr_detail_all($compcode);
		$this->load->view('office/pr/decrement_pr/head_pr_all', $res);

	}

	public function pr_detail($pr_no) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$da['dep'] = $session_data['m_dep'];
		$da['project'] = $session_data['m_project'];
		$da['imgu'] = $session_data['img'];
		$dec_no = $this->pr_db->check_decrement_no($pr_no);

		if (count($dec_no) == 0) {
			$da['rows'] = $this->pr_db->get_detail_pr_nohis($pr_no);

		} else {

			$strDesNo = $dec_no[0]['decrement_no'];
			$da['rows'] = $this->pr_db->get_detail_pr($pr_no, $strDesNo);

		}
		if (count($da['rows']) == 0) {
			echo "<h2 style='color:red'>No Data</h2>";
			die();
		}
		$da['history'] = $this->pr_db->history_decrement($pr_no);

		$this->load->view('office/pr/decrement_pr/pr_detail', $da);
	}

	public function decrement_true() {
		$input = $this->input->post();
		// echo "<pre>";
		// print_r($input);die();
		$i = 0;
		$data = array();
		// echo $input['ref_pr'];die();
		$is_decrement_pr = array(
			'is_decrement' => 'yes'
		);
		
		$this->db->where('pr_prno', $input['ref_pr']);
		$this->db->update('pr', $is_decrement_pr);

		$decrement_no = $this->pr_db->check_decrement_no($input['ref_pr']);
		// die();
		// var_dump($decrement_no);die();

		// $count = count($input['decrement']);
		// var_dump($input['type']);die();
		// echo $input['type'];die();
		foreach ($input['decrement'] as $key => $value) {
			// if ($input['decrement'][$key] > 0) {
			if (count($decrement_no) == 0) {
				# code...
				$dec_no = '1';
			} else {
				if ($input['type'] == "reduce") {
					# code...
					$dec_no = $decrement_no[0]['decrement_no'];
					$dec_no++;
					// echo $dec_no;die();
				} else if ($input['type'] == "return") {
					$dec_no = $decrement_no[0]['decrement_no'];
				}
			}
			if ($input['decrement'][$key] == '0') {
				$decrement_status = "hide";
			} else {
				$decrement_status = "show";
			}

			$data[] = array(
				"ref_pr" => $input['ref_pr'],
				"pr_item_id" => $input['pr_item_id'][$key],
				"qty" => $input['qty'][$key],
				"decrement" => $input['decrement'][$key]*1,
				"balance" => $input['balance'][$key],
				"user_decrement" => $input['user_decrement'],
				"remark" => $input['remark'],
				"date_decrement" => $input['date_decrement'],
				"compcode" => $input['compcode'],
				"decrement_no" => $dec_no,
				"decrement_status" => $decrement_status,
				"type" => $input['type'],
			);

		}

		if ($data[0]['type'] == "reduce") {
			// echo "<pre>";
			// print_r($input);
			// die();
			// check pr_item
			$add_history = $this->pr_db->add_decrement($data);// add Tb decrement
			$update_pr_items = $this->pr_db->update_qty_pr_items($input); // update qty by item

			if ($update_pr_items) {
				$update_st_item = $this->pr_db->update_st_item_reduce($input);

				if ($update_st_item) {
					$only_open = $this->pr_db->check_status_open($data[0]['ref_pr']);

					if ($only_open) {
						$close_pr = $this->pr_db->update_status_open($data[0]['ref_pr']);
					}

				}else{
					echo "update status by items error";
				}

			}else{
				echo "update qty by item error";
			}

		} else if ($data[0]['type'] == "return") {

			$update_pr_items = $this->pr_db->update_qty_pr_items($input);

			if ($update_pr_items) {
				$update_st_item = $this->pr_db->update_st_item_return($input);
			}else{
				echo "update qty by item error";
			}

			foreach ($data as $key => $value) {
				$this->db->where('ref_pr', $value['ref_pr']);
				$this->db->where('pr_item_id', $value['pr_item_id']);
				$this->db->where('decrement_no', $value['decrement_no']);
				$this->db->delete('decrement');
			}
			//check pr_item
		} else {
			echo "Type isset";
		}

		redirect('/pr/decrement');

	}

	public function sum_qty($pri_id, $pri_ref) {
		$this->db->select('pri_sumqty');
		$this->db->from('pr_item');
		$this->db->where('pri_id', $pri_id);
		$this->db->where('pri_ref', $pri_ref);
		$this->db->limit('1');
		$query = $this->db->get();

		if ($query) {

			$return = $query->result_array();
			$res = $return[0]['pri_sumqty'];

		} else {
			$res = null;
		}

		return $res;
	}

	public function openpr() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$prno = $this->uri->segment(3);
		$projectid = $this->uri->segment(5);
		$res = $this->datastore_m->getproject_proj($prno);
		$data['res'] = $this->pr_m->getedit_pr($prno,$projectid);
		$data['prfile'] = $this->pr_m->getprfile($prno,$compcode);
		$data['resi'] = $this->pr_m->getpr_itemitem($prno,$projectid);
		if ($username == "") {
			redirect('/');
		}
		$da['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		$this->db->select('pr_approve');
		$this->db->where('pr_prno', $prno);
		$qq = $this->db->get('pr')->result();
		foreach ($qq as $key => $value) {
			$data['prappr'] = $value->pr_approve;
		}
		$dd['resii'] = $this->pr_m->getpr_itemitem($prno,$projectid);
		$data['costtype'] = $this->datastore_m->costtype();
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pr_v', $dd);
		$this->load->view('office/pr/openpr_v', $data, $res);
		$this->load->view('base/footer_v');
	}

	public function del_file_by_id($id){
		$flag = $this->uri->segment(4);
		if($flag == "pc"){
			// delete file Petty Cash
			$return = array();
			$this->db->select( 'name_file' );
			$this->db->from( 'select_file_pc' );
			$this->db->where( 'id_sl', $id );
			$query1 = $this->db->get();

			if ( $query1->num_rows > 0 ) {
			$res1     = $query1->result();
			$namefile = $res1[0]->name_file;
			$path     = "select_file_pc/";

				if ( unlink( $path . $namefile ) ) {
				$this->db->where( 'id_sl', $id );
				$query2 = $this->db->delete( 'select_file_pc' );

				$return['status']  = true;
				$return['message'] = "ลบไฟล์เรียบร้อย";

				} else {
				$return['status']  = false;
				$return['message'] = "ไม่สามารถลบไฟล์ได้";

				}

			} else {

			$return['status']  = true;
			$return['message'] = "ไฟล์ที่ต้องการลบไม่มีอยู่";

			}
			// delete file Petty Cash
		}elseif ($flag == "po") {
			// delete file PO
			$return = array();
			$this->db->select( 'name_file' );
			$this->db->from( 'select_file_po' );
			$this->db->where( 'id_sl', $id );
			$query1 = $this->db->get();

			if ( $query1->num_rows > 0 ) {
			$res1     = $query1->result();
			$namefile = $res1[0]->name_file;
			$path     = "select_file_po/";

			if ( unlink( $path . $namefile ) ) {
			$this->db->where( 'id_sl', $id );
			$query2 = $this->db->delete( 'select_file_po' );

			$return['status']  = true;
			$return['message'] = "ลบไฟล์เรียบร้อย";

			} else {
			$return['status']  = false;
			$return['message'] = "ไม่สามารถลบไฟล์ได้";

			}

			} else {

			$return['status']  = true;
			$return['message'] = "ไฟล์ที่ต้องการลบไม่มีอยู่";

			}
// delete file PO

		}else{
		// delete file pr
			$return = array();
			$this->db->select('name_file');
			$this->db->from('select_file_pr');
			$this->db->where('id_sl', $id);
			$query1= $this->db->get();
	
			if ($query1->num_rows > 0) {
				$res1 = $query1->result();
				$namefile = $res1[0]->name_file;
				$path = "select_file_pr/";
	
				
				if (unlink($path.$namefile)) {
					$this->db->where('id_sl', $id);
					$query2 =$this->db->delete('select_file_pr');
	
					$return['status'] = true;
					$return['message'] = "ลบไฟล์เรียบร้อย";
	
				}else{
					$return['status'] = false;
					$return['message'] = "ไม่สามารถลบไฟล์ได้";
	
				}
				
			}else{
	
				$return['status'] = true;
				$return['message'] = "ไฟล์ที่ต้องการลบไม่มีอยู่";
	
			}
		//  end delete file pr
		}

		echo json_encode($return);
	}

}