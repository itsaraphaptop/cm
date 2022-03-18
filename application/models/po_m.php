<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class po_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	public function getpr($id) {
		$this->db->select('*');
		$this->db->where('pri_ref', $id);
		$q = $this->db->get('pr_item');
		$res = $q->result();
		return $res;
	}
	public function get_report($po) {
		$this->db->select('report1');
		$this->db->where('module', $po);
		$q = $this->db->get('report')->result();
		foreach ($q as $key => $value) {
			$res = $value->report1;
		}
		return $res;
	}
	public function getpo($compcode) {
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('project', 'project.project_id=po.po_project', 'left outer');
		$this->db->join('department', 'department.department_id=po.po_department', 'left outer');
		$this->db->where('po.compcode', $compcode);
		$this->db->where('po.po_status', 'enable');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getpo_header($no, $compcode,$projectid) {
		$this->db->select('*');
		$this->db->where('po_pono', $no);
		$this->db->where('po.compcode', $compcode);
		$this->db->where('po.po_project',$projectid);
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}
	public function get_system($systemcode,$compcode){
		$this->db->select('systemname');
		$this->db->where('systemcode',$systemcode);
		$this->db->where('compcode',$compcode);
		$q = $this->db->get('system')->result_array();
		return $q;
	}
	public function getpo_detail($no, $compcode,$projectid) {
		$this->db->select('*');
		$this->db->where('poi_ref', $no);
		$this->db->where('compcode', $compcode);
		$this->db->where('poi_project',$projectid);
		$query = $this->db->get('po_item');
		$res = $query->result();
		return $res;
	}

	public function report_po($id) {
		$this->db->select('poi_ref, COUNT(poi_ref) as total');
		$this->db->group_by('poi_ref');
		$this->db->where('poi_ref', $id);
		$query = $this->db->get('po_item');
		$res = $query->result();
		return $res;
	}
	public function companyimgbycompcode($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('company');
		$res = $query->result();
		foreach ($res as $value) {
			$img = $value->comp_img;

		}
		return $img;
	}
	public function report_po_id($id) {
		$this->db->select('poi_ref, COUNT(poi_ref) as total');
		$this->db->group_by('poi_ref');
		$this->db->where('poi_ref', $id);
		$this->db->where('poi_chk', 'Y');
		$query = $this->db->get('po_item');
		$res = $query->result();
		return $res;
	}

	public function po_count() {
		$this->db->select('po_pono');
		$this->db->where('po_status', 'enable');
		$query = $this->db->get('po');
		return $query->num_rows();
	}

	public function fetch_po($limit, $start, $compcode) {
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('project', 'project.project_id=po.po_project', 'left outer');
		$this->db->join('department', 'department.department_id=po.po_department', 'left outer');
		$this->db->where('po.compcode', $compcode);
		$this->db->where('po.po_status', 'enable');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function load_po_archive($find, $compcode, $flag) {
		if ($flag == "po") {
			$this->db->select('*');
			$this->db->from('po');
			$this->db->join('project', 'project.project_id=po.po_project', 'left outer');
			$this->db->join('department', 'department.department_id=po.po_department', 'left outer');
			$this->db->like('po.po_pono', $find);
			$this->db->where('po.compcode', $compcode);
			$this->db->where('po.po_status', 'enable');
			$query = $this->db->get();
			$res = $query->result();
			return $res;
		} else {
			$this->db->select('*');
			$this->db->from('po');
			$this->db->join('project', 'project.project_id=po.po_project', 'left outer');
			$this->db->join('department', 'department.department_id=po.po_department', 'left outer');
			$this->db->like('project.project_name', $find);
			$this->db->where('po.compcode', $compcode);
			$this->db->where('po.po_status', 'enable');
			$query = $this->db->get();
			$res = $query->result();
			return $res;
		}

	}

	public function po_department() {

		$data = array();

		$this->db->select('*');
		$this->db->from("po");
		$this->db->join('system', 'system.systemcode=po.po_system', 'left outer');
		$po = $this->db->get();

		$data = $po->result_array();

		return $data;

	}
	public function get_po() {
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('project', 'po.po_project = project.project_id');
		$this->db->join('system', 'po.po_system = system.systemcode');
		$this->db->where('po.po_open', 'no');
		$this->db->where('po.po_approve', 'approve');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

		public function get_porevise() {
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('system', 'po.po_system = system.systemcode');
		$this->db->where('po.po_open', 'no');
		$this->db->where('po.ic_status', 'wait');
		$this->db->where('po.po_approve', 'approve');
		$query = $this->db->get()->result();
		return $query;
	}
	public function get_po_table($po_no) {
		$this->db->select('*');
		$this->db->from('po_item');
		$this->db->where('poi_ref', $po_no);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

	public function check_decrement_no($po_no) {
		// var_dump($po_no);
		$this->db->select('decrement_no');
		$this->db->from('decrement_po');
		$this->db->order_by('decrement_no', 'desc');
		$this->db->where('ref_po', $po_no);
		$this->db->limit(1);
		$query = $this->db->get();
		// ///ทำcheck

		if ($query) {
			$res = $query->result_array();

		} else {
			$res = null;
		}

		return $res;
	}

	public function get_detail_pr_nohis($po_no) {
		$this->db->select('*');
		$this->db->from('po_item');
		$this->db->where('poi_ref', $po_no);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

	// public function get_detail_pr($value = '') {
	// 	# code...
	// }

	public function history_decrement($po_on) {
		$this->db->select('*');
		$this->db->from('po_item');
		$this->db->join('decrement_po', 'decrement_po.po_item_id = po_item.poi_id');
		// $this->db->order_by('decrement.pr_item_id', 'asc');
		// $this->db->where('decrement.decrement_status', 'show');
		$this->db->where('decrement_po.ref_po', $po_on);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

	public function add_decrement($arr_data) {

		$query = $this->db->insert_batch('decrement_po', $arr_data);
		if ($query) {
			$res = true;
		} else {
			$res = false;
		}

		return $res;
	}

	public function update_qty_po_items($arr_data) {
		$this->db->trans_begin();
		$status = true;
		foreach ($arr_data['qty'] as $key => $value) {
			if ($arr_data['type'] == 'reduce') {
				$data = array(
				"poi_qty" => $arr_data['balance'][$key],
			);
			$this->db->where('poi_id', $arr_data['po_item_id'][$key]);
			$query = $this->db->update('po_item', $data);	
			}else if ($arr_data['type'] == 'return') {
				$data = array(
					"poi_qty" => $arr_data['poi_qty'][$key],
				);
				$this->db->where('poi_id', $arr_data['po_item_id'][$key]);
				$query = $this->db->update('po_item', $data);
			}

			if ($query) {
				$status = true;
			} else {
				$status = false;
				break;
			}
		}

		if ($status === true) {
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}

		return $status;
	}

	public function get_detail_pr($po_no, $dec_no) {
		$this->db->select('*');
		$this->db->from('decrement_po');
		$this->db->join('po_item', 'po_item.poi_id = decrement_po.po_item_id');
		$this->db->where('decrement_po.ref_po', $po_no);
		$this->db->where('decrement_po.decrement_no', $dec_no);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
			// var_dump($res);
		} else {
			$res = null;
		}

		return $res;
	}
	public function get_pr_count($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '3');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
		} else {
			$res = null;
		}	
		return $res;
	}
	public function get_pr_count_all($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '3');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
		} else {
			$res = null;
		}	
		return $res;
	}
	public function get_pr_count_no($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '3');
		$this->db->where('pr.pr_postatus','1');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
		} else {
			$res = null;
		}	
		return $res;
	}
	public function get_pr_count_compare($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '3');
		$this->db->where('pr.pr_postatus','2');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
		} else {
			$res = null;
		}	
		return $res;
	}
	public function get_pr_count_resolve($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '3');
		$this->db->where('pr.pr_postatus','3');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
		} else {
			$res = null;
		}	
		return $res;
	}
	public function selectfilepr($prno,$compcode,$flag)
	{
		if ($flag=="po") {
			$this->db->select( 'po_ref,name_file' );
			$this->db->where( 'po_ref', $prno );
			$this->db->where( 'user', $compcode );
			$qe = $this->db->get( 'select_file_po' )->result();
		}else{
			$this->db->select( 'pr_ref,name_file' );
			$this->db->where( 'pr_ref', $prno );
			$this->db->where( 'user', $compcode );
			$qe = $this->db->get( 'select_file_pr' )->result();
		}
		return $qe;
	}
	public function get_wo_count($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '2');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}	
		return $res;
	}

	public function get_wo_count_dep($id) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr.pr_project', $id);
		$this->db->where('pr.pr_approve', 'approve');
		$this->db->where('pr.po_open', 'no');
		$this->db->where('pr.purchase_type != ', '2');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result();
		} else {
			$res = null;
		}	
		return $res;
	}

	public function get_po_active($projid, $flag, $compcode) {
		// if ($flag == "p") {
			$this->db->select('*');
			$this->db->from('po');
			$this->db->join('project', 'project.project_id=po.po_project', 'left outer');
			// $this->db->join('department', 'department.department_id=po.po_department', 'left outer');
			$this->db->where('po.po_project', $projid);
			$this->db->where('po.compcode', $compcode);
			$this->db->where('po.po_status', 'enable');
			// $this->db->where('po.po_approve !=', 'delete');
			$query = $this->db->get();
			$res = $query->result();
			return $res;
		// } else {
		// 	$this->db->select('*');
		// 	$this->db->from('po');
		// 	// $this->db->join('project', 'project.project_id=po.po_project', 'left outer');
		// 	$this->db->join('department', 'department.department_id=po.po_department', 'left outer');
		// 	// $this->db->like('project.project_name', $find);
		// 	$this->db->like('po.po_department', $projid);
		// 	$this->db->where('po.compcode', $compcode);
		// 	$this->db->where('po.po_status', 'enable');
		// 	$query = $this->db->get();
		// 	$res = $query->result();
		// 	return $res;
		// }

	}

	public function getprproj_status($projid,$status,$open)
    {
    if ($status == "all") {
    	if ($open == "p") {
		      $session_data = $this->session->userdata('sessed_in');
		      $compcode = $session_data['compcode'];
		      $this->db->select('*');
		      $this->db->from('po');
		      $this->db->join('project', 'project.project_id = po.po_project','left outer');
		      // $this->db->join('department','department.department_id = po.po_department','left outer');
		      $this->db->where('po_project',$projid);
		      $this->db->where('po_status','enable');
		      $this->db->where('po.compcode',$compcode);
		      $query = $this->db->get();
		      $res = $query->result();
		      return $res;
		}else{
			$session_data = $this->session->userdata('sessed_in');
		      $compcode = $session_data['compcode'];
		      $this->db->select('*');
		      $this->db->from('po');
		      // $this->db->join('project', 'project.project_id = po.po_project','left outer');
		      $this->db->join('department','department.department_id = po.po_department','left outer');
		      $this->db->where('po_project',$projid);
		      $this->db->where('po_status','enable');
		      $this->db->where('po.compcode',$compcode);
		      $query = $this->db->get();
		      $res = $query->result();
		      return $res;
		}
	 }else if ($status == "open") {
	  	if ($open == "p") {
		      $session_data = $this->session->userdata('sessed_in');
		      $compcode = $session_data['compcode'];
		      $this->db->select('*');
		      $this->db->from('po');
		      $this->db->join('project', 'project.project_id = po.po_project','left outer');
		      // $this->db->join('department','department.department_id = po.po_department','left outer');
		      $this->db->where('po_project',$projid);
		      $this->db->where('ic_status','open');
		      $this->db->where('po.compcode',$compcode);
		      $query = $this->db->get();
		      $res = $query->result();
		      return $res;
		}else{
			$session_data = $this->session->userdata('sessed_in');
		      $compcode = $session_data['compcode'];
		      $this->db->select('*');
		      $this->db->from('po');
		      // $this->db->join('project', 'project.project_id = po.po_project','left outer');
		      $this->db->join('department','department.department_id = po.po_department','left outer');
		      $this->db->where('po_project',$projid);
		      $this->db->where('ic_status','open');
		      $this->db->where('po.compcode',$compcode);
		      $query = $this->db->get();
		      $res = $query->result();
		      return $res;
		}	
	}else {
	  	if ($open == "p") {
		      $session_data = $this->session->userdata('sessed_in');
		      $compcode = $session_data['compcode'];
		      $this->db->select('*');
		      $this->db->from('po');
		      $this->db->join('project', 'project.project_id = po.po_project','left outer');
		      // $this->db->join('department','department.department_id = po.po_department','left outer');
		      $this->db->where('po_project',$projid);
		      $this->db->where('po_approve',$status);
		      $this->db->where('po_status','enable');
		      $this->db->where('po.compcode',$compcode);
		      $query = $this->db->get();
		      $res = $query->result();
		      return $res;
		}else{
			$session_data = $this->session->userdata('sessed_in');
		      $compcode = $session_data['compcode'];
		      $this->db->select('*');
		      $this->db->from('po');
		      // $this->db->join('project', 'project.project_id = po.po_project','left outer');
		      $this->db->join('department','department.department_id = po.po_department','left outer');
		      $this->db->where('po_project',$projid);
		      $this->db->where('po_approve',$status);
		      $this->db->where('po_status','enable');
		      $this->db->where('po.compcode',$compcode);
		      $query = $this->db->get();
		      $res = $query->result();
		      return $res;
		}	
	  }
    }

    public function getprproj_m($prjid) {

		$this->db->select('*');
		$this->db->from('project');
		$this->db->where('project_id', $prjid);
		$query = $this->db->get();
	      $res = $query->result();
	      return $res;
	}

	public function getcompare($comparecode,$compcode){
		$this->db->select('pr_code,pr_project,pr_prno,pr_place,pr_ownername,pr_ownerid,pr_prdate,pr_date,compcode');
		$this->db->where('pr_code',$comparecode);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('pr_compare_header')->result_array();
		return $res;
	}
	public function getcompare_detail($comparepcode,$compcode){
		$this->db->select('*');
		$this->db->where('pri_ref',$comparepcode);
		$this->db->where('compcode',$compcode);
		$this->db->group_by('pri_matcode');
		$res = $this->db->get('pr_compare_detail')->result();
		return $res;
	}
	public function getcompare_vender($comparepcode,$compcode){
		$this->db->select('*');
		$this->db->join('vender','vender.vender_code = pr_compare_vender.cpvenderid');
		$this->db->where('pr_compare_vender.cpcode',$comparepcode);
		$this->db->where('pr_compare_vender.compcode',$compcode);
		$this->db->where('vender.compcode',$compcode);
		$res = $this->db->get('pr_compare_vender')->result();
		return $res;
	}
	public function getcount_dashboard($compcode)
	{
		$this->db->select('count(po_approve) as count_po');
		$this->db->where('po_approve','wait');
		$this->db->where('po_podate',date('Y-m-d',now()));
		$this->db->where('compcode',$compcode);
		$q_now = $this->db->get('po');
		$res_now  = $q_now->result();
		$data['ponow'] = $res_now[0]->count_po;

		$this->db->select('count(po_id) as po_id');
		$this->db->where('DATE_FORMAT(po_podate,"%m") =  MONTH(CURDATE())');
		$this->db->where('compcode',$compcode);
		$q_thismonth = $this->db->get('po')->result();
		$data['thismonth'] = $q_thismonth[0]->po_id;
		
		$this->db->select('count(lo_id) as count_lo');
		$this->db->where('status','wait');
		$this->db->where('lodate',date('Y-m-d',now()));
		$this->db->where('compcode',$compcode);
		$q_now = $this->db->get('lo');
		$res_now  = $q_now->result();
		$data['wonow'] = $res_now[0]->count_lo;

		$this->db->select('count(lo_id) as lo_id');
		$this->db->where('DATE_FORMAT(lodate,"%m") =  MONTH(CURDATE())');
		$this->db->where('compcode',$compcode);
		$q_thismonth = $this->db->get('lo')->result();
		$data['lothismonth'] = $q_thismonth[0]->lo_id;
		
		$this->db->select('count(id) as id');
		$this->db->where('DATE_FORMAT(date_decrement,"%m") =  MONTH(CURDATE())');
		$this->db->where('compcode',$compcode);
		$po_decre = $this->db->get('decrement_po')->result();
		$data['decrementthis'] = $po_decre[0]->id;
		

		return $data;
	}

	public function get_compare_m($prjid) {

		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('compare', null);
		$this->db->where('pr_approve', "approve");
		$this->db->where('pr_project', $prjid);
		$query = $this->db->get();
	      $res = $query->result();
	      return $res;
	}
	public function get_new_compare_m($prjid) {

		$this->db->select('*');
		$this->db->from('pr_compare_header');
		// $this->db->where('compare', null);
		$this->db->where('pr_project', $prjid);
		$query = $this->db->get();
	      $res = $query->result();
	      return $res;
	}
	public function get_compare_m_p($prjid) {

		$this->db->select('*');
		$this->db->from('pr_compare_header');
		$this->db->where('pr_project', $prjid);
		$query = $this->db->get();
	      $res = $query->result();
	      return $res;
	}
	public function get_pritemcompare_m($code) {

		$this->db->select('*');
		$this->db->from('pr_item');
		$this->db->where('pri_ref', $code);
		$query = $this->db->get();
	      $res = $query->result();
	      return $res;
	}
	public function getvender($vid){
		$this->db->select('*');
		$this->db->where('vender_code',$vid);
		$res = $this->db->get('vender')->result_array();
		return $res;
	}
	public function get_pritemcomparedetail_m($code,$vid) {

		$this->db->select('*');
		$this->db->from('pr_compare_detail');
		$this->db->where('pri_ref', $code);
		$this->db->where('pri_vender',$vid);
		$query = $this->db->get();
	      $res = $query->result();
	      return $res;
	}

	public function update_st_item_reduce($arr_data)
    {
        foreach ($arr_data['pri_qty'] as $key => $value) {
            if ($value == 0) {
                $this->db->set('pri_status', 'open');
                $this->db->where('pri_id', $arr_data['pr_item_id'][$key]);
                $query = $this->db->update('pr_item');
                if ($query) {
                    $res = true;
                }else{
                    $res = false;
                }
            }
        }

        return $res;
    }

    public function check_status_open($pr_id)
    {
        $this->db->select('pri_status');
        $this->db->from('po_item');
        $this->db->where('pri_ref', $pr_id);
        $query = $this->db->get();

        $res = true;
        if ($query) {

            $data = $query->result_array();
            foreach ($data as $key => $value) {
                if ($value['pri_status'] == 'no') {
                    $res = false;
                    break;
                }
            }
            
        }else{
            $res = false;
        }

        return $res;
	}
	
	 public function project_mm()
    {
		 $where_p = "(`project_code` = '$projcode' or `project`.`project_sub` = '$projid' )";
      $this->db->select('project_name,project_value,project_code,project_id');
	  $this->db->from('project');
	  $this->db->join('po','po.po_project = po.po_project');
      $this->db->where($where_p);
      $this->db->where('project_sub =',"no");
	  $this->db->where('project.compcode',$compcode);
      $this->db->order_by('project_id');
      $query = $this->db->get();
      $res = $query->result();
      return $res;
	}
	
	 public function get_po_line_chart()
    {
      $q = $this->db->query('select DATE_FORMAT(po_podate,"%m/%d/%y")as date, count(po_podate) as alpha FROM (po) WHERE DATE_FORMAT(po_podate,"%m") =  MONTH(CURDATE()) GROUP BY date(po_podate)')->result();
      return $q;
    }

    public function get_wo_line_chart()
    {
      $q = $this->db->query('select DATE_FORMAT(lodate,"%m/%d/%y")as date, count(lodate) as alpha FROM (lo) WHERE DATE_FORMAT(lodate,"%m") =  MONTH(CURDATE()) GROUP BY date(lodate)')->result();
      return $q;
    }
    public function get_po_donut_chart(){
      $q = $this->db->query('select po_approve, count(po_id) as countpo from po group by po_approve')->result();
      return $q;
    }
    public function get_wo_donut_chart(){
      $q = $this->db->query('select status, count(lo_id) as countwo from lo group by status')->result();
      return $q;
	}
	
	public function count_dash_main($compcode,$userid){
		$this->db->select('count(purchase_type) as purchase_type');
		$this->db->where('purchase_type !=','3');
		$this->db->where("compcode",$compcode);
		$this->db->where('po_open','no');
		$this->db->where('pr_approve','approve');
		$query_pw = $this->db->get( 'pr' )->result();
		$data['typepw'] = $query_pw[0]->purchase_type;

		$this->db->select('count(purchase_type) as purchase_type');
		$this->db->where('purchase_type !=','2');
		$this->db->where("compcode",$compcode);
		$this->db->where('po_open','no');
		$this->db->where('pr_approve','approve');
		$query_po = $this->db->get( 'pr' )->result();
		$data['typewo'] = $query_po[0]->purchase_type;
		
		$this->db->select('count(app_id) as app_id');
		$this->db->where('status','no');
		$this->db->where('app_midid',$userid);
		$this->db->where("compcode",$compcode);
		$query_powait = $this->db->get('approve_po')->result();
		$data['po_wait'] = $query_powait[0]->app_id;
		
		$this->db->select('count(app_id) as app_id');
		$this->db->where('status','no');
		$this->db->where('app_midid',$userid);
		$this->db->where("compcode",$compcode);
		$query_powait = $this->db->get( 'approve_wo' )->result();
		$data['lo_wait'] = $query_powait[0]->app_id;
		return $data;
	}
	public function getprcompareprint($cpcode,$compcode,$vcode){
		$res = $this->db->query("select * from pr_compare_header INNER JOIN pr_compare_detail ON pr_compare_header.pr_code = pr_compare_detail.pri_ref where pr_compare_header.pr_code = '$cpcode' and pr_compare_detail.pri_vender = '$vcode' and pr_compare_header.compcode = '$compcode' and pr_compare_detail.compcode = '$compcode';")->result();
		return $res;
	}
	public function getprcompareprintcc($cpcode,$compcode){
		$res = $this->db->query("select * from pr_compare_header INNER JOIN pr_compare_detail ON pr_compare_header.pr_code = pr_compare_detail.pri_ref where pr_compare_header.pr_code = '$cpcode' and pr_compare_header.compcode = '$compcode' and pr_compare_detail.compcode = '$compcode';")->result();
		return $res;
	}
	public function getcomparevender($cpcode,$compcode){
		$res = $this->db->query("select pri_matcode,cpcode,cpvenderid,vender_name,cpvenderteam,vender.compcode,pri_priceunit,pri_disc,pri_amount,quovender from pr_compare_vender join vender on vender.vender_code = pr_compare_vender.cpvenderid join pr_compare_detail ON pr_compare_detail.pri_vender = pr_compare_vender.cpvenderid where pr_compare_vender.cpcode = '$cpcode' and vender.compcode = '$compcode' GROUP BY cpvenderid;")->result();
		return $res;
	}
}
