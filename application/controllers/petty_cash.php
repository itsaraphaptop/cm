<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class petty_cash extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model('auth_m');
		$this->load->model('datastore_m');
		$this->load->model('global_m');
		$this->load->model('pettycash_m');

	
	}
	public function newpettycash() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$pid = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		if ($type == "p") {
			$res = $this->datastore_m->getproject_proj($pid);
			foreach ($res as $key => $value) {
				$data['project'] = $value->project_name;
				$data['project_co'] = $value->project_code;
				$data['projid'] = $value->project_id;
				$data['depid'] = "";
				$data['dep'] = "";
				$data['item'] = $this->db->query("select * from project_item where project_code='$value->project_code'")->result();
			}
		} else {
			$data['project'] = "";
			$data['projid'] = "";
			$data['depid'] = $session_data['m_depid'];
			$data['dep'] = $session_data['m_dep'];
		}

		$userid = $session_data['m_id'];
		$data['m_id'] = $session_data['m_id'];
		$data['name'] = $session_data['m_name'];
		$data['getproj'] = $this->datastore_m->getproject();
		$data['resmem'] = $this->datastore_m->getmember($compcode);
		$data['getdep'] = $this->datastore_m->department();
		$data['res'] = $this->datastore_m->getvender();
		$data['ven'] = $this->datastore_m->getvender_ven();
		// echo '<pre>';
		// var_dump($data['ven']);die();
		$data['mem'] = $this->datastore_m->getvender_mem();
		$data['type'] = $type;
		// $data['dep'] = $session_data['m_dep'];
		// $data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['imgu'] = $session_data['img'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$array_system = $this->global_m->get_system_project("id",$pid,false,$session_data["compcode"]);

		$this->load->view('navtail/base_master/header_v', $data);
		//$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');

		$this->load->view('navtail/navtail_pc_v');
		$this->load->view('office/pettycash/new_pettycash_v',["array_system"=>$array_system]);
		$this->load->view('base/footer_v');
	}
	public function editpettycash() {
		$session_data = $this->session->userdata('sessed_in');
		$pcno = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$type = $this->uri->segment(5);
		// 1 control 2 no controll
		$data['check_controll'] = $this->datastore_m->get_controll($id);
		// echo $id;die();
		$tender_id = $this->datastore_m->get_tender_id($id);
		
		$data['control'] = $this->datastore_m->get_pricecontrol(@$tender_id[0]['bd_tenid']);
		$res = $this->datastore_m->getproject_proj($id);
		$data['reso'] = $this->datastore_m->getproject_proj($id);
		$username = $session_data['username'];
		$userid = $session_data['m_id'];
		$compcode = $session_data['compcode'];
		$data['compcode'] = $session_data['compcode'];
		if ($username == "") {
			redirect('/');
		}
		$data['type'] = $type;
		$data['pcno'] = $pcno;
		$data['getpc'] = $this->pettycash_m->getedit_pc($pcno);

		$data['getpci'] = $this->pettycash_m->getpc_itemi($pcno,$id);
		$data['ven'] = $this->datastore_m->getvender_ven();
		$data['mem'] = $this->datastore_m->getvender_mem();
		$data['name'] = $session_data['m_name'];
		$data['getproj'] = $this->datastore_m->getproject();
		$data['resmem'] = $this->datastore_m->getmember($compcode);
		// $data['getunit'] = $this->datastore_m->getunit();
		$data['getdep'] = $this->datastore_m->department();
		$data['res'] = $this->datastore_m->getvender();
		// $data['allmaterial'] = $this->datastore_m->allmaterial();
		// $data['allcostcode'] = $this->datastore_m->allcostcode();
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['imgu'] = $session_data['img'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['compimg'] = $this->datastore_m->companyimg();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pc_v');
		$this->load->view('office/pettycash/edit_pettycash_v');
		$this->load->view('base/footer_v');
	}

	public function test()
	{
		$this->datastore_m->get_costcode();
	}
	public function archive_pettycash() {
		$session_data = $this->session->userdata('sessed_in');
		$pcno = $this->uri->segment(3);
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['compcode'] = $session_data['compcode'];
		$userid = $session_data['m_id'];
		if ($username == "") {
			redirect('/');
		}
		$proidd = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		$data['name'] = $session_data['m_name'];
		$data['depid'] = $session_data['m_depid'];
		$data['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$projectid = $session_data['projectid'];
		$data['project'] = $session_data['m_project'];
		$data['approve'] = $session_data['approve'];
		$data['pr_project_right'] = $session_data['pr_project_right'];
		$data['imgu'] = $session_data['img'];
		$data['proidd'] = $proidd;
		$data['type'] = $type;
		$data['ven'] = $this->datastore_m->getvender_ven();
		$data['mem'] = $this->datastore_m->getvender_mem();
		$data['compimg'] = $this->pettycash_m->companyimgbycompcode($compcode);
		$data['getpettycash'] = $this->pettycash_m->archive_pettycash_active($proidd, $username,$type);

		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pc_v');
		$this->load->view('office/pettycash/archive_pettycash_v', $data);

		$this->load->view('base/footer_v');
	}

	public function print_pettycash() {
		$session_data = $this->session->userdata('sessed_in');
		$id = $this->uri->segment(3);
		$username = $session_data['username'];
		$data['user'] = $session_data['m_name'];
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
		$data['compimg'] = $this->pettycash_m->companyimgbycompcode($compcode);
		$data['res'] = $this->pettycash_m->pc_report($id);
		$data['resi'] = $this->pettycash_m->pc_report_item($id);
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_print_v');
		$this->load->view('office/pettycash/report/print_pettycash_v');

		$this->load->view('base/footer_v');
	}
	public function approve() {
		$session_data = $this->session->userdata('sessed_in');
		$pcno = $this->uri->segment(3);
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['compcode'] = $session_data['compcode'];
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
		$data['compimg'] = $this->pettycash_m->companyimgbycompcode($compcode);
		$data['getpettycash'] = $this->pettycash_m->waitapprove();
		$data['approve'] = $this->pettycash_m->approve();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('office/pettycash/approve_pettycash_v');
		$this->load->view('base/footer_v');
	}

	public function all_pettycash() {
		$session_data = $this->session->userdata('sessed_in');
		$pcno = $this->uri->segment(3);
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$data['compcode'] = $session_data['compcode'];
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
		$data['compimg'] = $this->pettycash_m->companyimgbycompcode($compcode);
		$data['getpettycash'] = $this->pettycash_m->waitapprove();
		$data['approve'] = $this->pettycash_m->allwaitapprove();
		$this->load->view('navtail/base_master/header_v', $data);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('office/pettycash/all_approve_v');
		$this->load->view('base/footer_v');
	}
	public function openproject() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		if ($username == "") {
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
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($dd['pr_project_right'] == 'true') {
			$res['getdep'] = $this->datastore_m->getdepartment();
		} else {

			$res['getdep'] = $this->datastore_m->getdepart_user($userid, $da['depid'],$compcode);
		}
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pc_v', $dd);
		$this->load->view('office/pettycash/open_project_v', $res);
		$this->load->view('base/footer_v');
	}
	public function openproject_archive() {
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
		$da['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$da['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		$userid = $session_data['m_id'];
		$projectid = $session_data['projectid'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		// $data['compimg'] = $this->datastore_m->companyimg();
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($dd['pr_project_right'] == 'true') {
			$res['getdep'] = $this->datastore_m->getdepartment();
		} else {

			$res['getdep'] = $this->datastore_m->getdepart_user($userid, $da['depid'],$compcode);
		}

		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pc_v', $dd);
		$this->load->view('office/pettycash/open_project_archive_v', $res);
		$this->load->view('base/footer_v');
	}

	public function pc_summary(){
		 $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
            }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          // $data['getproj'] = $this->datastore_m->getproject();
          // $data['resmem'] = $this->datastore_m->getmember();
          // $data['getunit'] = $this->datastore_m->getunit();
          // $data['getdep'] = $this->datastore_m->department();
          // $data['allmaterial'] = $this->datastore_m->allmaterial();
          // $data['allcostcode'] = $this->datastore_m->allcostcode();
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          // $data['compimg'] = $this->datastore_m->companyimg();
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pc_v');
          $this->load->view('office/pettycash/report/report_all_v');
          $this->load->view('base/footer_v');
	}
	public function pc_request_v()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          if ($username=="") {
            redirect('/');
          }
          $data['mid'] = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['approve'] = $session_data['approve'];
          $data['pr_project_right'] = $session_data['pr_project_right'];
          $this->load->model('datastore_m');
          $data['imgu'] = $this->datastore_m->changeprofile($username);
          $ser['search'] = $this->datastore_m->pr_search($data);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_pc_v');
          $this->load->view('office/pettycash/report/request_view',$ser);
          $this->load->view('base/footer_v');
		}
		public function report_vat(){
			$session_data = $this->session->userdata('sessed_in');
			$username = $session_data['username'];
			$compcode = $session_data['compcode'];
			$sess_name = $session_data['m_name'];
			$datestr = $this->input->post('datestr');
			$dateend = $this->input->post('dateend');
			$status = $this->input->post('status');
			$project_id = $this->input->post('pr_projectid');
			$urls = "report/viewerloadpo?module=pc&typ=report&reportname=";
				$report_file = "report_pettycash_vat_allproject.mrt";
			$send= "{$urls}{$report_file}&session={$sess_name}&date1={$datestr}&date2={$dateend}&compcode={$compcode}&proid={$project_id}&st={$status}";
			redirect($send);
		}
	public function pc() {
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
		$da['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		$userid = $session_data['m_id'];
		$projectid = $session_data['projectid'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $data['compimg'] = $this->datastore_m->companyimg();
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($dd['pr_project_right'] == 'true') {
			$res['getdep'] = $this->datastore_m->getdepartment();
		} else {

			$res['getdep'] = $this->datastore_m->getdepart_user($userid, $da['depid'],$compcode);
		}
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pc_v', $dd);
		$this->load->view('office/pettycash/approve_pc', $res);
		$this->load->view('base/footer_v');

	}

	public function approve_pc_v() {

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$res['username'] = $session_data['username'];
		$res['m_id'] = $session_data['m_id'];
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
		$da['depid'] = $session_data['m_depid'];
		$da['dep'] = $session_data['m_dep'];
		$data['projid'] = $session_data['projectid'];
		$da['project'] = $session_data['m_project'];
		$projid = $session_data['projectid'];
		$userid = $session_data['m_id'];
		$projectid = $session_data['projectid'];
		// $this->load->model('datastore_m');
		$da['imgu'] = $session_data['img'];
		$dd['approve'] = $session_data['approve'];
		$dd['pr_project_right'] = $session_data['pr_project_right'];
		// $data['compimg'] = $this->datastore_m->companyimg();
		$res['getproj'] = $this->datastore_m->getproject_user($userid, $projectid,$compcode);
		if ($dd['pr_project_right'] == 'true') {
			$res['getdep'] = $this->datastore_m->getdepartment();
		} else {

			$res['getdep'] = $this->datastore_m->getdepart_user($userid, $da['depid'],$compcode);
		}
		$this->load->view('navtail/base_master/header_v', $da);
		$this->load->view('navtail/base_master/tail_v');
		$this->load->view('navtail/navtail_pc_v', $dd);
		$this->load->view('office/pettycash/approve_pc_v', $res);
		$this->load->view('base/footer_v');
		// }
	}

	public function testpc() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$this->load->helper('date');
		$year = date('Y');
      	$mount = date('m');
      	$modal="pc";
      	$flag = $this->uri->segment(4);
      	if ($add['c_pr'] == "wait") {
	      	if ($flag == "p") {
	          $count = $this->datastore_m->countwait_project($year,$mount,$compcode,$modal,$add['projectid']);
	          foreach ($count as $key => $value) {
	            $bi_wait = $value->bi_wait;
	            $wait = $value->wait;

	            if ($wait == 0) {
		          $view = array(
		                'bi_modal'    => "pc",
		                'compcode'    => $compcode,
		                'bi_year'     => $year,
		                'bi_month'    => $mount,
		                'bi_wait'     => 1,
		                'bi_project'  => $add['projectid'],
		              );
		              $this->db->insert('bi_views_project',$view);
		          }else{
		          	$view = array(
	                'bi_modal'    => "pc",
	                'compcode'    => $compcode,
	                'bi_year'     => $year,
	                'bi_month'    => $mount,
	                'bi_wait'     => @$bi_wait+1,
	              	);
		            $this->db->where('bi_project',$add['projectid']);
		            $this->db->where('bi_modal',$modal);
		            $this->db->where('bi_month',$mount);
		            $this->db->where('bi_year',$year);
		            $this->db->update('bi_views_project',$view);
		          }
	          }
	      	}else {
	          $count = $this->datastore_m->countappove_department($year,$mount,$compcode,$modal,$add['depid']);
	          foreach ($count as $key => $value) {
	            $bi_wait = $value->bi_wait;
	            $wait = $value->wait;

	            if ($wait == 0) {
		          $view = array(
		                'bi_modal'    => "pc",
		                'compcode'    => $compcode,
		                'bi_year'     => $year,
		                'bi_month'    => $mount,
		                'bi_wait'     => 1,
		                'bi_department'  => $add['depid'],
		              );
		              $this->db->insert('bi_views_project',$view);
		          }else{
		          	$view = array(
	                'bi_modal'    => "pc",
	                'compcode'    => $compcode,
	                'bi_year'     => $year,
	                'bi_month'    => $mount,
	                'bi_wait'     => @$bi_wait+1,
	              	);
		            $this->db->where('bi_project',$add['depid']);
		            $this->db->where('bi_modal',$modal);
		            $this->db->where('bi_month',$mount);
		            $this->db->where('bi_year',$year);
		            $this->db->update('bi_views_project',$view);
		          }
	          }
	      	}
	    }
	}

	public function acount_total() {
		$session = $this->session->userdata('sessed_in');
		$this->db->select('*');
		$this->db->from('account_total');
		$this->db->where('compcode', $session['compcode']);
		$this->db->where('act_header', 'D');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$data['rows'] = $query->result();
		}else{
			$data['rows'] = [];
		}
		$this->load->view('office/pettycash/modal_account', $data);
	}

}
