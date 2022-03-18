<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class datastore_m extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('date');
	}

	public function get_costcode()
	{
		$compcode = $this->session->userdata('sessed_in')['compcode'];
		return $compcode;
	}
	 public function pc_count_row()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('*');
            $this->db->where('compcode',$compcode);
            $qu = $this->db->get('pettycash');
            $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
            return $res;
		}
	function get_pc_num()
        {
          $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $this->db->select('*');
          $this->db->order_by('doc_id','desc');
          $this->db->limit('1');
          $this->db->where('compcode',$compcode);
          $q = $this->db->get('pettycash');
          $run = $q->result();

            return $run;
        }

	public function getcompany() {
		$this->db->select('*');
		// $this->db->order_by('company_id','desc');
		$query = $this->db->get('company');
		$res = $query->result();
		return $res;
	}
	public function getcompanyjson() {
		$this->db->select("company_id,compcode,company_name,company_code as Status,startrev as Type");
		// $this->db->order_by('company_id','desc');
		$query = $this->db->get('company');
		$res = $query->result();
		return $res;
	}
	public function allproject() {
		$this->db->select('*');
		$query = $this->db->get('project');
		
		$res = $query->result();
		return $res;
	}
	public function expensother() {
		$this->db->select('*');
		$this->db->from('ap_expensother');
		$this->db->join('cost_subgroup', 'cost_subgroup.costcode_d=ap_expensother.costcode', 'left outer');
		$this->db->order_by('expens_code', 'asc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function model_boq_m($id, $sy,$pj) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		// $this->db->select('*,SUM(qty) as totalqty');
		$this->db->select('*');
		$this->db->where('boq_code', $id);
		$this->db->where('system', $sy);
		$this->db->where('boq_mcode !=',"");
		$this->db->where('compcode',$compcode);
		$this->db->where('project_code',$pj);
		$this->db->where('type !=',3);
		// $this->db->group_by('boq_mcode');
		// $this->db->group_by('costcode');
		$this->db->limit(700);
		$query = $this->db->get('boq_cost');
		$res = $query->result();
		return $res;
	}



	public function model_boqcostcode_m($id, $sy) {
		$this->db->select('*');
		$this->db->where('boq_code', $id);
		$this->db->where('system', $sy);
		$this->db->group_by('costcode');
		$query = $this->db->get('boq_cost');
		$res = $query->result();
		return $res;
	}


	public function allproject_postatus($id) {
		$this->db->select('*');
		$this->db->where('po_project', $id);
		$this->db->where('po_approve', 'wait');
		// $this->db->join('po_item','po_item.poi_ref = po.po_pono');
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}
	public function alldep_postatus($id) {
		$this->db->select('*');
		$this->db->where('po_department', $id);
		$this->db->where('po_approve', 'wait');
		// $this->db->join('po_item','po_item.poi_ref = po.po_pono');
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}
	public function allproject_postatus1($id) {
		$this->db->select('*');
		$this->db->from('po');
		$this->db->join('project','project.project_id = po.po_project','left outer');
		$this->db->where('po_project', $id);
		$this->db->where('po_approve', 'approve');
		$this->db->where('ic_status','wait');
		// $this->db->join('po_item','po_item.poi_ref = po.po_pono');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function alldep_postatus1($id) {
		$this->db->select('*');
		$this->db->where('po_department', $id);
		$this->db->where('po_approve', 'approve');
		$this->db->where('ic_status', 'wait');
		// $this->db->join('po_item','po_item.poi_ref = po.po_pono');
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}

	public function allproject_postatus1_where($id) {
		$this->db->select('*');
		$this->db->where('project_id', $id);
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function alldep_postatus1_where($id) {
		$this->db->select('*');
		$this->db->where('department_id', $id);
		$query = $this->db->get('department');
		$res = $query->result();
		return $res;
	}
	public function lodetail($id) {
		$this->db->select('*');
		$this->db->where('lo_lono', $id);
		$this->db->join('lo_detail', 'lo_detail.lo_ref = lo.lo_lono');
		$query = $this->db->get('lo_detail');
		$res = $query->result();
		return $res;
	}
	public function getcompanybycompcode($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('company');
		$res = $query->result();
		return $res;
	}
	public function getcompanyname($com) {
		$this->db->select('company_name');
		$this->db->where('compcode', $com);
		$query = $this->db->get('company');
		$res = $query->result();
		foreach ($res as $key => $value) {
			return $value->company_name;
		}
	}
	public function getvender() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('vender_id', 'desc');
		$query = $this->db->get('vender');
		$res = $query->result();
		return $res;
	}

	public function getpoitem($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$this->db->where('poi_ref', $id);
		$query = $this->db->get('po_item');
		$res = $query->result();
		return $res;
	}

	public function getwoitem($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$this->db->where('projectcode', $id);
		$query = $this->db->get('lo');
		$res = $query->result();
		return $res;
	}

	public function getpono() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('po_pono', 'desc');
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}

	public function getsystem() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('systemcode', 'desc');
		$query = $this->db->get('system');
		$res = $query->result();
		return $res;
	}

	public function getdepartment() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->where('project.project_department', "2");
		$this->db->where('project.project_sub','no');
		$this->db->where('project.project_status !=', "close");
		$this->db->order_by('project_code', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function get_department_name($dp_id) {

		$this->db->select('*');
		$this->db->from('department');
		$this->db->where('department_id',$dp_id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function getpo_costcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('poi_costcode', 'desc');
		$this->db->group_by('poi_costcode');
		$query = $this->db->get('po_item');
		$res = $query->result();
		return $res;
	}
	public function getpo_matcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('poi_matcode', 'desc');
		$this->db->group_by('poi_matcode');
		$query = $this->db->get('po_item');
		$res = $query->result();
		return $res;
	}

	public function getprno() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('pr_prno', 'desc');
		$query = $this->db->get('pr');
		$res = $query->result();
		return $res;
	}

	public function getpr_costcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('pri_costcode', 'desc');
		$this->db->group_by('pri_costcode');
		$query = $this->db->get('pr_item');
		$res = $query->result();
		return $res;
	}
	public function getpr_matcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('pri_matcode', 'desc');
		$this->db->group_by('pri_matcode');
		$query = $this->db->get('pr_item');
		$res = $query->result();
		return $res;
	}

	public function getvenderjson($compcode) {
		$this->db->select('vender_code,vender_name,vender_address,vender_tel,vender_fax,vender_tax,vender_taxtype,vender_credit,vender_sale,vender_size,vender_type,vat');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('vender_id','asc');
		$query = $this->db->get('vender');
		$res = $query->result();
		return $res;
	}
  
	public function countveder_enable() {
		$this->db->select('*');
		$this->db->where('vender_status', 'normal');
		$query = $this->db->get('vender');
		$result = $query->num_rows();
		return $result;
	}

	public function countvender_disable() {
		$this->db->select('*');
		$this->db->where('vender_status', 'disable');
		$query = $this->db->get('vender');
		$result = $query->num_rows();
		return $result;
	}
	public function getvendercode($compcode, $vendercode) {
		$this->db->select('*');
		$this->db->where('vender_code', $vendercode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('vender');
		$res = $query->result();
		return $res;
	}
	public function getvendername($compcode, $vendercode) {
		$this->db->select('*');
		$this->db->where('vender_name', $vendercode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('vender');
		$res = $query->result();
		return $res;
	}
	public function department() {
		$this->db->select('*');
		$query = $this->db->get('department');
		$res = $query->result();
		return $res;
	}
	public function getuserlist() {
		$this->db->select('*');
		$this->db->where('m_type', 'employee');
		$query = $this->db->get('member');
		$res = $query->result();
		return $res;
	}
	public function getmember() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		// $this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		 $this->db->where('m_type','employee');
		 $this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getmember_all() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		// $this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		//  $this->db->where('m_type','employee');
		$this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getmember_byuser($username) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		$this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		$this->db->where('member.m_user', $username);
		$this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getmember_p($compcode, $projectid) {

		$this->db->select('*');
		$this->db->from('member');
		// $this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		$this->db->join('department', 'department.department_id = member.m_department', 'left outer');
//         $this->db->where('m_type','employee');
		$this->db->where('member.compcode', $compcode);
		// $this->db->where('member.m_project',$projectid);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getmember_bycompcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		// $this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		// $this->db->where('m_type','employee');
		$this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getmember_permisstion_bycompcode() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		$this->db->where('m_type','employee');
		$this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getproject_user($username,$id,$compcode) {
		$this->db->select('*');
		$this->db->from('project');
		$this->db->join('project_ic', 'project_ic.project_id = project.project_id');
		$this->db->join('member', 'member.m_id = project_ic.proj_user');
		$this->db->where('project.project_department', "1");
		$this->db->where('proj_user', $username);
		$this->db->where('project.project_sub','no');
		$this->db->where('project_ic.project_status', "Y");
		$this->db->where('project.project_status !=', "close");
		$this->db->where('project.compcode', $compcode);
		// $this->db->where('project.project_department', "1");
		$this->db->order_by('project.project_id', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getproject_user_find($username, $id, $input) {
		$this->db->select('*');
		$this->db->from('project');
		$this->db->join('project_ic', 'project_ic.project_id = project.project_id');
		$this->db->join('member', 'member.m_id = project_ic.proj_user');
		$this->db->where('proj_user', $username);
		$this->db->where('project_ic.project_status', "Y");
		$this->db->where('project.project_status', "normal");
		$this->db->like('project_name', $input);
		$this->db->order_by('project.project_id', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function department_find($input) {
		$this->db->select('department_id,department_code,department_title');
		$this->db->like('department_title', $input);
		return $this->db->get('department')->result();

	}
	public function department_name($id,$compcode){
		$this->db->select('department_id,department_title');
		$this->db->where('department_id',$id);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('department')->result_array();
		return $res[0]['department_title'];
	}

	public function getdepart_user($username,$compcode) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('project');
		$this->db->join('project_ic', 'project_ic.project_id = project.project_id');
		$this->db->join('member', 'member.m_id = project_ic.proj_user');
		$this->db->where('project.project_department', "2");
		$this->db->where('proj_user', $username);
		$this->db->where('project.project_sub','no');
		$this->db->where('project_ic.project_status', "Y");
		$this->db->where('project.project_status !=', "close");
		$this->db->where('project.compcode', $compcode);
		$this->db->order_by('project.project_id', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getunit() {
		$this->db->select('*');
		$this->db->order_by('unit_code', 'asc');
		$query = $this->db->get('unit');
		$res = $query->result();
		return $res;
	}
	public function getunit_array($id) {
		$this->db->select('*');
		$this->db->where('unit_id',$id);
		$this->db->order_by('unit_code', 'asc');
		$query = $this->db->get('unit');
		$res = $query->result_array();
		return $res;
	}
	public function getunit_name($id) {
		$this->db->select('*');
		$this->db->where('unit_code', $id);
		$query = $this->db->get('unit');

		$res = $query->result();
		return $res;
	}
	public function book_v() {
		$this->db->select('*');
		$query = $this->db->get('gl_book');
		$res = $query->result();
		return $res;
	}

	public function getunit_numrows() {
		$this->db->select('*');
		$query = $this->db->get('unit');
		$res = $query->num_rows();
		return $res;
	}
	public function getcosttype_numrows() {
		$this->db->select('*');
		$query = $this->db->get('master_costtype');
		$res = $query->num_rows();
		return $res;
	}
	public function getvenderid($name) {
		$this->db->select('vender_id');
		$this->db->where('vender_name', $name);
		$query = $this->db->get('vender');
		$res = $query->result();
		return $res;
	}
	public function getproject() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_status !=', 'close');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getnewproject() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_status !=', 'close');
		$this->db->where('project_substatus is null');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getnewproject_permiss($userid) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('project.project_id,project_name,project_ic.project_status as permission_status');
		$this->db->from('project');
		$this->db->join('project_ic','project_ic.project_id = project.project_id and project_ic.compcode = project.compcode','left');
		$this->db->where('project.project_status !=', 'close');
		$this->db->where('project_substatus is null');
		$this->db->where('project.compcode', $compcode);
		$this->db->where('project_ic.proj_user', $userid);
		$this->db->order_by('project.project_id', 'desc');
		$query = $this->db->get('');
		$res = $query->result();
		return $res;
	}
	public function sumcountpro() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('sum(project_value) as sumpro, count(project_id) as countpro');
		$this->db->where('project_status', 'normal');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getproject_po() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_status', 'normal');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getprojectclose() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_status', 'close');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function sumcountproclose() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('sum(project_value) as sumpro, count(project_id) as countpro');
		$this->db->where('project_status', 'close');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getdoc_start() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('pr_prno');
		$query = $this->db->get('pr');
		$this->db->select('docno');
		$query2 = $this->db->get('pettycash');
		$res['pr'] = $query->result();
		$res['pc'] = $query2->result();
		return $res;
	}
	public function getdoc_start_po() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('po_pono');
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}
	public function getproject_center($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_id', $id);
		$this->db->where('project_status', 'normal');
		$this->db->where('account_total.compcode', $compcode);
		$this->db->join('account_total','account_total.act_code = project.acc_secondary','left outer');
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getproject_proj($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_id', $id);
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getproject_projj($pono) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->join('po', 'po.po_project = project.project_id');
		$this->db->where('po_pono', $pono);
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getproject_system($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('projectd_job,systemname');
		$this->db->join('project', 'project.project_code = project_item.project_code');
		$this->db->join('system', 'system.systemcode = project_item.projectd_job');
		$this->db->where('project.project_id', $id);
		$this->db->where('system.compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project_item');
		$res = $query->result();
		return $res;
	}
	public function getproject_enable() {
		$this->db->select('*');
		$this->db->where('project_status', 'normal');
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function getproject_disable() {
		$this->db->select('*');
		$this->db->where('project_status', 'disable');
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function count_enable() {
		$this->db->select('*');
		$this->db->where('project_status', 'normal');
		$query = $this->db->get('project');
		$result = $query->num_rows();
		return $result;
	}

	public function count_disable() {
		$this->db->select('*');
		$this->db->where('project_status', 'disable');
		$query = $this->db->get('project');
		$result = $query->num_rows();
		return $result;
	}

	//costcode
	public function getcost_type() {
		$this->db->select('*');
		$this->db->order_by('ctype_id', 'asc');
		$query = $this->db->get('cost_type');
		$res = $query->result();
		return $res;
	}

	public function getcost_group($typecode) {
		$this->db->select('*');
		$this->db->where('ctype_code', $typecode);
		$query = $this->db->get('cost_group');
		$res = $query->result();
		return $res;
	}

	public function getcost_subgroup($typecode, $groupcode) {
		$this->db->select('*');
		$this->db->where('ctype_code', $typecode);
		$this->db->where('cgroup_code', $groupcode);
		$this->db->order_by('csubgroup_code', 'asc');
		$query = $this->db->get('cost_subgroup');
		$res = $query->result();
		return $res;
	}

	//matcode
	public function getmat_type() {
		$this->db->select('*');
		$this->db->order_by('mattype_id', 'asc');
		$query = $this->db->get('mat_type');
		$res = $query->result();
		return $res;
	}

	public function getmat_group($type) {
		$this->db->select('*');
		$this->db->where('mattype_code', $type);
		$this->db->order_by('matgroup_id', 'asc');
		$query = $this->db->get('mat_group');
		$res = $query->result();
		return $res;
	}

	public function getmat_subgroup($type, $group) {
		$this->db->select('*');
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->order_by('matsubgroup_id', 'asc');
		$query = $this->db->get('mat_subgroup');
		$res = $query->result();
		return $res;
	}

	public function getmat_product($type, $group, $subgroup) {
		$this->db->select('*');
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->order_by('matid', 'asc');
		$query = $this->db->get('mat_product');
		$res = $query->result();
		return $res;
	}
	public function getmat_spec($type, $group, $subgroup, $product) {
		$this->db->select('*');
		$this->db->where('mattype_code', $type);
		$this->db->where('matgroup_code', $group);
		$this->db->where('matsubgroup_code', $subgroup);
		$this->db->where('matcode', $product);
		$this->db->order_by('matspec_id', 'asc');
		$query = $this->db->get('mat_spec');
		$res = $query->result();
		return $res;
	}
	public function allmaterial() {
		$this->db->select('*');
		$this->db->from('mat_product');
		$this->db->join('mat_subgroup', 'mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
		$this->db->join('mat_group', 'mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
		$this->db->join('mat_type', 'mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
		$this->db->join('mat_spec', 'mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code AND mat_spec.mattype_code = mat_type.mattype_code');

		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function allmatbb($input) {
		$this->db->select('*');
		$this->db->like('materialname', $input);
		$this->db->limit(300);
		$query = $this->db->get('mat_unit');
		$res = $query->result();
		return $res;
	}
	public function allmatbb_concat($input) {
		$res = $this->db->query('select CONCAT_WS(" ",materialname,materialspacname,materialbrandname) as mater,mattype_code,matgroup_code,matsubgroup_code, materialcode, matunit_name, matunit_code FROM mat_unit WHERE CONCAT_WS(" ",materialname,materialspacname,materialbrandname,materialcode) LIKE "%' . $input . '%" LIMIT 10')->result();
		// $this->db->like('concat_ws(materialname,materialspacname,materialbrandname)',$input);
		// $this->db->limit(300);
		// $query = $this->db->get('mat_unit');
		// $res = $query->result();
		return $res;
	}
	public function allmatboq($input){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$res = $this->db->query('select newmatnamee as mater,newmatcode,unitname from boq_item where newmatnamee LIKE "%' . $input . '%" LIMIT 10')->result();
		return $res;
	}
	public function allmatbb_concat_group($input) {
		$res = $this->db->query('select CONCAT_WS(" ",materialname,materialspacname,materialbrandname) as mater,mat_unit.mattype_code,mat_unit.matgroup_code,mat_unit.matsubgroup_code, mat_unit.materialcode, mat_unit.matunit_name FROM mat_unit join mat_group on mat_group.matgroup_code=mat_unit.matgroup_code WHERE mat_group.matgroup_name LIKE "%' . $input . '%" LIMIT 20')->result();
		// $this->db->like('concat_ws(materialname,materialspacname,materialbrandname)',$input);
		// $this->db->limit(300);
		// $query = $this->db->get('mat_unit');
		// $res = $query->result();
		return $res;
	}
	public function getmatcodet() {
		$query = $this->db->query("SELECT *
                              FROM mat_group
                               JOIN mat_subgroup ON mat_subgroup.mattype_code = mat_group.mattype_code
                              JOIN mat_product ON mat_product.mattype_code = mat_subgroup.mattype_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code AND mat_product.mattype_code = mat_group.mattype_code  AND mat_product.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_group.matgroup_code
                              JOIN mat_spec ON mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code
                              ");
		$res = $query->result();
		return $res;
	}
	public function allmaterial_pagination($limit, $start) {
		$this->db->select('*');
		$this->db->from('mat_product');
		$this->db->join('mat_subgroup', 'mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
		$this->db->join('mat_group', 'mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
		$this->db->join('mat_type', 'mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
		$this->db->join('mat_spec', 'mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code AND mat_spec.mattype_code = mat_type.mattype_code');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function countallmaterial() {
		$this->db->select('*');
		$this->db->from('mat_product');
		$this->db->join('mat_subgroup', 'mat_subgroup.matsubgroup_code = mat_product.matsubgroup_code');
		$this->db->join('mat_group', 'mat_group.matgroup_code = mat_product.matgroup_code AND mat_group.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code');
		$this->db->join('mat_type', 'mat_type.mattype_code = mat_group.mattype_code AND mat_type.mattype_code = mat_subgroup.mattype_code AND mat_type.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_product.mattype_code AND mat_group.mattype_code = mat_subgroup.mattype_code AND mat_subgroup.mattype_code = mat_product.mattype_code');
		$this->db->join('mat_spec', 'mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code AND mat_spec.mattype_code = mat_type.mattype_code');
		$query = $this->db->get();
		$res = $query->num_rows();
		return $res;
	}
	public function getmatcode() {
		$query = $this->db->query("SELECT *
                              FROM
                              mat_type
                              LEFT OUTER  JOIN mat_group ON mat_type.mattype_code = mat_group.mattype_code
                              LEFT OUTER  JOIN mat_subgroup ON mat_subgroup.mattype_code = mat_group.mattype_code AND mat_subgroup.mattype_code = mat_type.mattype_code AND mat_subgroup.matgroup_code = mat_group.matgroup_code
                              LEFT OUTER JOIN mat_product ON mat_product.mattype_code = mat_subgroup.mattype_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code AND mat_product.mattype_code = mat_group.mattype_code AND mat_product.mattype_code = mat_type.mattype_code AND mat_product.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_product.matgroup_code = mat_subgroup.matgroup_code AND mat_product.matgroup_code = mat_group.matgroup_code AND mat_product.mattype_code = mat_type.mattype_code
                              LEFT OUTER JOIN mat_spec ON mat_spec.mattype_code = mat_product.mattype_code AND mat_spec.matgroup_code = mat_product.matgroup_code AND mat_spec.matsubgroup_code = mat_product.matsubgroup_code AND mat_spec.matcode = mat_product.matcode AND mat_spec.mattype_code = mat_subgroup.mattype_code AND mat_spec.matgroup_code = mat_subgroup.matgroup_code AND mat_spec.matsubgroup_code = mat_subgroup.matsubgroup_code AND mat_spec.mattype_code = mat_group.mattype_code AND mat_spec.matgroup_code = mat_group.matgroup_code AND mat_spec.mattype_code = mat_type.mattype_code
                              group by
                              ");
		$res = $query->result();
		return $res;
	}
	public function allcostcode() {
		$this->db->select('*');
		$this->db->from('cost_type');
		$this->db->join('cost_group', 'cost_group.ctype_code = cost_type.ctype_code');
		$this->db->join('cost_subgroup', 'cost_subgroup.cgroup_code = cost_group.cgroup_code AND cost_subgroup.ctype_code = cost_type.ctype_code');
		// $this->db->join('cost_subgroup', 'cost_subgroup.cgroup_code = cost_group.cgroup_code AND cost_subgroup.ctype_code = cost_type.ctype_code');
		$this->db->where('cost_status',"N");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function changeprofile($username) {
		$this->db->select('*');
		$this->db->where('m_user', $username);
		$query = $this->db->get('member');
		$res = $query->result();
		foreach ($res as $value) {
			$img = $value->uimg;

		}
		return $img;
	}

	public function getprojectpett() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_status', 'normal');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getmemberr() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('member');
		$res = $query->result();
		return $res;
	}
	public function companyimg() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('comp_img');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('company');
		$res = $query->result();
		foreach ($res as $value) {
			$img = $value->comp_img;

		}
		return $img;
	}

	public function companyname($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('company');
		$res = $query->result();
		return $res;
	}

	public function pono_name($pono) {
		$this->db->select('*');
		$this->db->where('project_id', $pono);
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getdebtor($compcode) {
		$this->db->select('*');
		// $this->db->where('compcode',$compcode);
		$query = $this->db->get('debtor');
		$res = $query->result();
		return $res;
	}
	public function getdebtorcode($compcode, $debcode) {
		$this->db->select('*');
		$this->db->where('debtor_code', $debcode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('debtor');
		$res = $query->result();
		return $res;
	}
	public function getbank() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank');
		$res = $query->result();
		return $res;
	}

	public function geteditbank($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$this->db->where('bank_code', $id);
		$query = $this->db->get('bank');
		$res = $query->result();
		return $res;
	}
	public function getbankname($bankcode) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];

		$this->db->select('*');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank');
		$res = $query->result();
		return $res;
	}
	public function getbankbranch($bankcode) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank_branch');
		$res = $query->result();
		return $res;
	}
	public function getbankbranchname($bankcode, $branchcode) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('branch_name');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('branch_code', $branchcode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank_branch');
		$res = $query->result();
		return $res;
	}

	public function editbranchname($bankcode, $branchcode) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('branch_code', $branchcode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank_branch');
		$res = $query->result();
		return $res;
	}
	public function editbankaccount($bankcode, $branchcode, $bankacc) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('branch_code', $branchcode);
		$this->db->where('acc_code', $bankacc);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank_account');
		$res = $query->result();
		return $res;
	}
	public function bankaccount($bankcode, $branchcode) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('branch_code', $branchcode);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank_account');
		$res = $query->result();
		return $res;
	}
	public function bankaccountname($bankcode, $branchcode, $acc) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('acc_name,acc_code');
		$this->db->where('bank_code', $bankcode);
		$this->db->where('branch_code', $branchcode);
		$this->db->where('acc_code', $acc);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('bank_account');
		$res = $query->result();
		return $res;
	}

	public function getmamber_p($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$this->db->or_where('m_code','v');
		$query = $this->db->get('member');
		$res = $query->result();
		return $res;
	}
	public function costlevel($compcode){
		$this->db->select('costlevel');
		$this->db->where('sys_code',$compcode);
		$q = $this->db->get('syscode')->result_array();
		// foreach ($q as $key => $value) {
		//  $res = $value->multicomp;
		// }
		return $q;
	}

	
	function getprtopo($prno, $flag ,$system) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		if ($flag == "p") {
			$this->db->select('*');
			$this->db->from('pr');
			$this->db->join('project', 'project.project_id=pr.pr_project', 'left outer');
			// $this->db->join('department', 'department.department_id=pr.pr_department', 'left outer');
			// $this->db->where('pr_system', $system);
			$this->db->where('pr_project', $prno);
			$this->db->where('pr_status', 'enable');
			$this->db->where('pr_approve', 'approve');
			$this->db->where('po_open', 'no');
			$this->db->where('pr.compcode', $compcode);
			$this->db->where('pr.purchase_type !=', '3');
			$this->db->order_by('pr_prid', 'desc');

			$res = $this->db->get();
		} else if ($flag == "d") {
			$this->db->select('*');
			$this->db->from('pr');
			// $this->db->join('project', 'project.project_id=pr.pr_project', 'left outer');
			$this->db->join('department', 'department.department_id=pr.pr_department', 'left outer');
			$this->db->where('pr_department', $prno);
			$this->db->where('pr_system', $system);
			$this->db->where('pr_status', 'enable');
			$this->db->where('pr_approve', 'approve');
			$this->db->where('po_open', 'no');
			$this->db->where('pr.compcode', $compcode);
			$this->db->where('pr.purchase_type !=', '3');
			$this->db->order_by('pr_prid', 'desc');

			$res = $this->db->get();
		}

		return $res->result();
	}
	function load_pr_for_wo($project){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
			$this->db->select('*');
			$this->db->from('pr');
			$this->db->join('project', 'project.project_id=pr.pr_project', 'left outer');
			$this->db->join('department', 'department.department_id=pr.pr_department', 'left outer');
			$this->db->where('pr_project', $project);
			$this->db->where('pr_status', 'enable');
			// $this->db->where('pr_system', $system);
			$this->db->where('pr_approve', 'approve');
			$this->db->where('po_open','no');
			$this->db->where('wo_open',NULL);
			$this->db->where('pr.compcode', $compcode);
			$this->db->where('pr.purchase_type !=', '2');
			$this->db->order_by('pr_prid', 'desc');
			$res = $this->db->get();
			return $res->result();
	}
	function load_pr_wo($prno,$flag,$system) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];

		if ($flag == "p") {
			$this->db->select('*');
			$this->db->from('pr');
			$this->db->join('project', 'project.project_id=pr.pr_project', 'left outer');
			$this->db->join('department', 'department.department_id=pr.pr_department', 'left outer');
			$this->db->where('pr_project', $prno);
			$this->db->where('pr_status', 'enable');
			// $this->db->where('pr_system', $system);
			$this->db->where('pr_approve', 'approve');
			$this->db->where('po_open','no');
			$this->db->where('pr.compcode', $compcode);
			$this->db->where('pr.purchase_type !=', '2');
			$this->db->order_by('pr_prid', 'desc');

		$res = $this->db->get();
		} else if ($flag == "d") {
			$this->db->select('*');
			$this->db->from('pr');
			$this->db->join('department', 'department.department_id=pr.pr_department', 'left outer');
			$this->db->where('pr_department', $prno);
			
			$this->db->where('pr_status', 'enable');
			$this->db->where('pr_approve', 'approve');
			$this->db->where('po_open', 'no');
			$this->db->where('pr.compcode', $compcode);
			$this->db->where('pr.purchase_type !=', '2');
			$this->db->order_by('pr_prid', 'desc');

			$res = $this->db->get();
		}
		return $res->result();
	}
	public function pr_detail($prno,$compcode){
		$this->db->select('*');
		$this->db->where('pri_ref',$prno);
		$this->db->where('boq_type !=','1');
		$this->db->where('pri_status','no');
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('pr_item')->result();
		return $res;
	}
	function journal() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('gl_batch_header');
		$this->db->join('gl_book', 'gl_book.bookcode=gl_batch_header.bookcode');
		$res = $this->db->get();
		return $res->result();
	}

	public function getprd($ref) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('pri_ref', $ref);
		$this->db->where('pri_status', null);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('pr_item');
		$res = $query->result();
		return $res;
	}
	public function acc_chart($compcode) {
		$this->db->select('*');
		$this->db->where('act_status',"on");
		$this->db->where('act_header',"D");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result();
		return $res;
	}
	public function list_acc_chart($compcode) {
		$this->db->select('*');
		$this->db->where('act_status',"on");
		// $this->db->where('act_header',"D");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result();
		return $res;
	}
	public function h_acc_chart($compcode) {
		$this->db->select('*');
		$this->db->where('act_status',"on");
		$this->db->where('act_header',"H");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result();
		return $res;
	}
	public function less_other($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('less_other');
		$res = $query->result();
		return $res;
	}
	public function editacc_chart($id, $compcode) {
		$this->db->select('*');
		$this->db->where('act_id', $id);
		$this->db->where('act_status',"on");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result();
		return $res;
	}
	public function getproj_limit() {
		$this->db->select('project_id');
		$this->db->order_by('project_id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function get_whdata($pjid) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_id', $pjid);
		$this->db->where('system.compcode',$compcode);
		$this->db->join('system', 'ic_proj_warehouse.jobcode = system.systemcode');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get('ic_proj_warehouse');
		$res = $query->result();
		return $res;
	}
	public function get_whdata_array($whid) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('id',$whid);
		$this->db->where('system.compcode',$compcode);
		$this->db->join('system', 'ic_proj_warehouse.jobcode = system.systemcode');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get('ic_proj_warehouse');
		$res = $query->result_array();
		return $res;
	}
	public function get_whdata_new($pjid) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_id', $pjid);
		$this->db->where('ic_proj_warehouse.compcode',$compcode);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('ic_proj_warehouse');
		$res = $query->result();
		return $res;
	}
	public function costtype() {
		$this->db->select('*');
		$this->db->where('costtype_status !=', 'D');
		$q = $this->db->get('master_costtype');
		$res = $q->result();
		return $res;
	}

	public function system_m($compcode) {
		$this->db->select('*');
		$this->db->where('compcode',$compcode);
		$this->db->order_by('systemid','asc');
		$query = $this->db->get('system');
		$res = $query->result();
		return $res;
	}

	public function table_journal($ref) {
		$this->db->select('*');
		$this->db->from('gl_batch_detail');
		$this->db->join('account_total', 'account_total.act_code = gl_batch_detail.ac_code');
		$this->db->join('project', 'project.project_id = gl_batch_detail.pre_event');
		$this->db->join('system', 'system.systemcode = gl_batch_detail.jobcode');
		$this->db->join('department', 'department.department_id = gl_batch_detail.dpt_code');
		$this->db->join('vender', 'vender.vender_code = gl_batch_detail.acct_no');
		$this->db->where('vchno', $ref);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function table_apstable($ref) {
		$this->db->select('*');
		$this->db->from('lo_detail');
		$this->db->where('lo_ref', $ref);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function ud($vchno, $ud) {
		$this->db->where('vchno', $vchno);
		$q1 = $this->db->update('gl_batch_header', $ud);
		if ($q1) {
			return true;
		}
	}
	public function ud1($lineno, $ud1) {
		$this->db->where('lineno', $lineno);
		$q1 = $this->db->update('gl_batch_detail', $ud1);
		if ($q1) {
			return true;
		}
	}

	public function syscode_m($sys_code, $syscode_m) {
		$this->db->where('sys_code', $sys_code);
		$query = $this->db->update('syscode', $syscode_m);
		if ($query) {
			return true;
		}
	}

	public function getprojectpr() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('project');
		$this->db->distinct();
		// $this->db->join('pr','pr.pr_project = project.project_id','left outer');
		$this->db->where('project_status', 'normal');
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	function GetPoNewContract($po) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('pr');
		$this->db->join('project', 'project.project_id=pr.pr_project', 'left outer');
		$this->db->join('department', 'department.department_id=pr.pr_department', 'left outer');
		// $this->db->join('lo','project.project_id = lo.projectcode','left outer');

		$this->db->where('pr_project', $po);
		$this->db->where('purchase_type', '1');
		// $this->db->where('purchase_type','3');
		// $this->db->where('pr_status','enable');
		// $this->db->where('pr_approve','approve');
		// $this->db->where('po_open','no');
		$this->db->where('pr.compcode', $compcode);
		$this->db->order_by('pr_prid', 'desc');
		$res = $this->db->get();
		return $res->result();
	}
	public function getprncon($poo) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('pri_ref', $poo);
		// $this->db->where('pri_status',null);
		// $this->db->where('compcode',$compcode);
		$query = $this->db->get('pr_item');
		$res = $query->result();
		return $res;
	}

	public function table_apstablelodetail($ref) {
		$this->db->select('*');
		$this->db->from('lo_detail');
		$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
		$this->db->where('lo_ref', $ref);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function table_lo() {
		$this->db->select('*');
		$this->db->from('lo');
		$this->db->where('status',"approve");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function contract_pr() {
		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('purchase_type !=', '2');
		$this->db->where('pr_approve =', 'approve');
		$this->db->join('project', 'project.project_id=pr.pr_project', 'left outer');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function contract_prdetail($id) {
		$this->db->select('*');
		$this->db->from('pr_item');
		$this->db->where('pri_ref', $id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getvenders() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('vender');
		$this->db->distinct();
		// $this->db->join('pr','pr.pr_project = project.project_id','left outer');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('vender_id', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getpt() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');

		$this->db->from('pettycash');
		$this->db->where('pettycash.status', "delete");
		$this->db->join('pettycash_item', 'pettycash.docno=pettycash_item.pettycashi_ref', 'left outer');
		$this->db->order_by('docno', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getap_bill_delete() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('ap_billsuc_header');
		$this->db->where('deluser is not null', null);
		$this->db->order_by('ap_bill_id', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getpr() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('pr');
		$this->db->where('pr_status', "delete");
		// $this->db->join('pr','pr.pr_project = project.project_id','left outer');
		// $this->db->where('compcode',$compcode);
		$this->db->order_by('pr_prno', 'desc');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function allmaterials($projid) {
		$this->db->select('stock_matcode,stock_matname');
		$this->db->from('stockcard');
		$this->db->where('stock_project', $projid);
		$this->db->order_by('stock_matcode', 'asc');
		$this->db->group_by('stock_matcode');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function getpo_pro($pono) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->join('project', 'project.project_id=po.po_project');
		$this->db->where('po_pono', $pono);
		// $this->db->where('compcode',$compcode);
		// $this->db->order_by('project_id','desc');
		$query = $this->db->get('po');
		$res = $query->result();
		return $res;
	}
	public function get_ictypearea($projectid) {
		$this->db->select('*');
		$this->db->where('project_id', $projectid);
		$q = $this->db->get('ic_typearea')->result();
		return $q;
	}

	public function depreciation() {
		$this->db->select('*');
		$this->db->from('depreciation_header');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function depreciation_detail($id) {
		$this->db->select('*');
		$this->db->where('depreciation_codeh', $id);
		$this->db->from('depreciation_detail');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function depre_detail($id) {
		$this->db->select('*, depreciation_header.depreciation_id as id_h , depreciation_detail.depreciation_id as id_d');
		$this->db->join('depreciation_header', 'depreciation_header.depreciation_code=depreciation_detail.depreciation_codeh');
		$this->db->where('depreciation_codeh', $id);
		$this->db->from('depreciation_detail');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function depre_header($id) {
		$this->db->select('*');

		$this->db->where('depreciation_code', $id);
		$this->db->from('depreciation_header');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function codeasst() {
		$this->db->select('*');
		$this->db->from('asset_type');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function adddeprecii() {
		$this->db->select('*');
		$this->db->from('depreciation_header');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function project_name($projid) {
		$this->db->select('project_name');
		$this->db->where('project_id', $projid);
		$q = $this->db->get('project')->result();
		foreach ($q as $key => $value) {
			return $value->project_name;
		}
	}
	public function project_data($projid) {
		$this->db->select('project_code,project_name,project_mnameth,project_vat,a_wo');
		$this->db->where('project_id', $projid);
		$res = $this->db->get('project')->result_array();
		return $res;
	}
	public function getprojectsystem($pjcode,$compcode){
		$this->db->select('systemcode,systemname');
		$this->db->from('project_item');
		$this->db->join('system','system.systemcode = project_item.projectd_job');
		$this->db->where('project_code',$pjcode);
		$this->db->where('system.compcode',$compcode);
		$res = $this->db->get()->result();
		return $res;
	}
	public function asslocation() {
		$this->db->select('*');
		$this->db->from('ass_location');
		$this->db->where('location', 1);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function asslocation2() {
		$this->db->select('*');
		$this->db->from('ass_location');
		$this->db->where('location', 2);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getcontractor($projid) {
		$this->db->select('*');
		$this->db->where('project_status !=', "close");
		return $this->db->get('project')->result();
	}
	public function allcostcodee() {
		$this->db->select('*');
		$this->db->from('cost_type');
		$this->db->join('cost_group', 'cost_group.ctype_code = cost_type.ctype_code');
		$this->db->join('cost_subgroup', 'cost_subgroup.cgroup_code = cost_group.cgroup_code AND cost_subgroup.ctype_code = cost_type.ctype_code');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function acc_defualt($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$q = $this->db->get('company')->result();
		if ($q) {
			return $q;
		}
	}
	public function getmember_venber() {
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_id = member.m_project', 'left outer');
		$this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		$this->db->where('m_vender', null);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getvender_ven() {
		$this->db->select('*');
		$this->db->from('vender');
		$this->db->where('vender_type', 'external');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getvender_mem() {
		$this->db->select('*');
		$this->db->from('vender');
		$this->db->where('vender_type', 'employee');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function load_store_mat($projid, $compcode) {
		$this->db->select('store.store_matname,
              store.store_matcode,
              store.store_project,
              store.store_costcode,
              store.store_costname,
              store.store_id,
              store.store_type,
              Sum(store.store_qty) AS store_qty,
              store.store_unit,
              store.store_recqty,
              store.store_total,
              store.unitprice,
              store.discountprice,
              store.totalprice,
              store.wh,              ic_proj_warehouse.whname,
              store.compcode');
		$this->db->from('store');
		$this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.id = store.wh', 'left outer');
		$this->db->where('store_project', $projid);
		$this->db->where('store_total !=', '0');
		$this->db->where('status', null);
		$this->db->where('store.compcode', $compcode);
		$this->db->group_by("store.store_matcode");
		$query = $this->db->get();
		$mat = $query->result();
		return $mat;
	}

	public function ven_business($com) {
		$this->db->select('*');
		$this->db->join('company', 'company.compcode=master_business.compcode', 'left outer');
		$this->db->where('master_business.compcode', $com);
		$this->db->where('status','Y');
		$query = $this->db->get('master_business');
		$result = $query->result();
		return $result;
	}

	public function acc_expensother() {
		$this->db->select('*');
		$this->db->join('account_total', 'account_total.act_code=ap_expensother.ac_code', 'left outer');
		// $this->db->where("active",null);
		$query = $this->db->get('ap_expensother');
		$res = $query->result();
		return $res;
	}
	public function list_expensother() {
		$this->db->select('*');
		$this->db->join('account_total', 'account_total.act_code=ap_expensother.ac_code', 'left outer');
		$this->db->where("active",'true');
		$query = $this->db->get('ap_expensother');
		$res = $query->result();
		return $res;
	}
	public function get_expensother($exps) {
		$this->db->select('*');
		$this->db->where('expens_code', $exps);
		$this->db->where("active", null);
		$this->db->join('account_total', 'account_total.act_code=ap_expensother.ac_code', 'left outer');
		$query = $this->db->get('ap_expensother');
		$res = $query->result();
		return $res;
	}

	public function expensother_p() {
		$this->db->select('*');
		$this->db->from('ap_expensother');
		$this->db->join('cost_subgroup', 'cost_subgroup.costcode_d=ap_expensother.costcode', 'left outer');
		$this->db->where('ac_code2 !=', '');
		$this->db->where('active =', 'true');
		$this->db->order_by('expens_code', 'asc');

		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function expensother_d() {
		$this->db->select('*');
		$this->db->from('ap_expensother');
		$this->db->join('cost_subgroup', 'cost_subgroup.costcode_d=ap_expensother.costcode', 'left outer');
		$this->db->where('ac_code !=', '');
		$this->db->where('active =', 'true');
		$this->db->order_by('expens_code', 'asc');

		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function page_permission($type) {
		$this->db->select('*');
		$this->db->from('menu_right');
		$this->db->join('member', 'member.m_user=menu_right.m_user');
		$this->db->where('menu_right.m_user', $type);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function project_approve($pj) {
		$this->db->select('*');
		$this->db->where('project_code', $pj);
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function afa() {
		$this->db->select('*');
		$this->db->where('approve_project',"Repair");
		$this->db->where('type', "FA");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function apr($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "PR");
		$this->db->order_by('approve_sequence','asc');
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function apo($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "PO");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function awo($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "WO");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function apc($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "PC");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function abk($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "BK");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function aap($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "AP");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}

	public function aic($pj) {
		$this->db->select('*');
		$this->db->where('approve_project', $pj);
		$this->db->where('type', "IC");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}
	public function td($pjid) {
		$this->db->select('*');
		$this->db->where('approve.approve_project', $pjid);
		$this->db->where('approve.type',"TD");
		$this->db->order_by("approve_sequence", "asc");
		$query = $this->db->get('approve');
		$res = $query->result();
		return $res;
	}
	public function count_project_id() {
		$this->db->select('project_id');
		$this->db->from('project');
		$this->db->order_by('project_id', 'desc');
		$this->db->where('project_sub', 'no');
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}

		return $res;
	}

	public function count_sub_project($project_id) {
		$this->db->select('count(project_sub) as subproject_no');
		$this->db->from('project');
		$this->db->where('project_sub', $project_id);
		$query = $this->db->get();
		if ($query) {
			$res = $query->result_array();
		} else {
			$res = null;
		}
		return $res;
	}

	public function cutcode_project($project_id)
	{
		// var_dump($project_id);die();
		$this->db->select('SUBSTRING(project_code,7,9) as cutcode', FALSE);
		$this->db->from('project');
		$this->db->where('project_id', $project_id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function get_permission_master() {
		$this->db->select("*");
		$query = $this->db->get("master_permission");
		$res = $query->result_array();
		return $res;

	}
    public function pr_search($data){
        $this->db->select('pr_prno');
//        $this->db->like('pr_prno',$data);
        $query = $this->db->get('pr');
        $this->db->select('docno');
//        $this->db->like('docno', $data);
        $query2 = $this->db->get('pettycash');
        $res['pr'] = $query->result();
        $res['pc'] = $query2->result();
        return $res;
    }
    public function po_search($data){
        $this->db->select('po_pono');
//        $this->db->like('pr_prno',$data);
        $query = $this->db->get('po');
        $this->db->select('lo_lono');
//        $this->db->like('docno', $data);
        $query2 = $this->db->get('lo');
        $res['po'] = $query->result();
        $res['lo'] = $query2->result();
        return $res;
    }
    public function project_search($data){
        $this->db->select('project_name');
//        $this->db->like('pr_prno',$data);
        $query = $this->db->get('project');
        $res['project'] = $query->result();
        return $res;
    }
    public function mat_search($data){
        $this->db->select('stock_matname');
        $this->db->group_by('stock_matname,stock_type ,stock_matcode');
//        $this->db->like('pr_prno',$data);

        $query = $this->db->get('stockcard');
        $res['stockcard'] = $query->result();
        return $res;
    }
    public function vender_name($data,$compcode){
        $this->db->select('vender_code,vender_name');
//        $this->db->like('pr_prno',$data);
		$this->db->where('compcode',$compcode);
        $query = $this->db->get('vender');
        $res['vender'] = $query->result();
        return $res;
    }
     public function vender_name_assesment($data){
       $this->db->select('vender_id,vender_name');
        // $this->db->join('po', 'po.po_pono = vender_rate.po_code');
        // $this->db->where('ic_status','open');
        //  $this->db->group_by('vender_name');
        // $query = $this->db->get('vender_rate');
        $query = $this->db->get('vender');
        $res['vender'] = $query->result();
        return $res;
    }
  //   public function getreturn_issue($pro){
  //       $this->db->select("*");
  //       // $this->db->join('project', 'project.project_id = ic_issue_h.is_project');
  //       // $this->db->where('is_project', $pro);
		// $query = $this->db->get("ic_issue_h");
		// $res = $query->result_array();
		// return $res;
  //   }
    public function getreturn_issue($pro) {
		$this->db->select('*');
		$this->db->join('project', 'project.project_id = ic_issue_h.is_project');
		$this->db->where('is_project', $pro);
		$this->db->from('ic_issue_h');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
		 public function getreturn_issue_h($pro) {
		$this->db->select('*');
		$this->db->join('project', 'project.project_id = ic_issue_h.is_project');
		$this->db->where('is_project', $pro);
		$this->db->where('status',null);
		$this->db->from('ic_issue_h');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function getcost_subgroup_m() {
		$this->db->select('*');
		$this->db->where('cost_status',"N");
		$query = $this->db->get('cost_subgroup');
		$res = $query->result();
		return $res;
	}

	public function get_job_desc($compcode) {
		$this->db->select('*');
		$this->db->where('compcode',$compcode);
		$this->db->where('job_active',"Y");
		$query = $this->db->get('master_jobdesc');
		$res = $query->result();
		return $res;
	}

	public function get_job_type($compcode) {
		$this->db->select('*');
		$this->db->where('compcode',$compcode);
		// $this->db->where('type_active',"Y");
		$query = $this->db->get('master_jobtype');
		$res = $query->result();
		return $res;
	}

	public function get_business($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('master_business');
		$result = $query->result();
		return $result;
	}
	public function get_business_active($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$this->db->where('status','1');
		$query = $this->db->get('master_business');
		$result = $query->result();
		return $result;
	}

	public function get_system($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('system');
		$res = $query->result();
		return $res;
	}

	public function del_system($pj_code,$pj_job)
	{
		$this->db->where('project_code', $pj_code);
		$this->db->where('projectd_job', $pj_job);
		$query  = $this->db->delete('project_item');
		return $query;
	}


	public function get_address($compcode) {
		$this->db->select('*');
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('company');
		$res = $query->result();
		return $res;
	}
	
	public function get_system_m($compcode) {
		$this->db->select('*');
		$this->db->where('sys_active !=', "del");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('system');
		$res = $query->result();
		return $res;
	}
	// func by miniball 
	// ห้ามแก้ไข
	public function get_sys_tender($project_code)
	{
		$this->db->select('*');
		$this->db->from('project_item');
		$this->db->where('project_item.project_code', $project_code);
		$query = $this->db->get();
		if($query){
			$res = $query->result_array();
		}else{
			$res = null;
		}
		return $res;
	}
	// func by miniball 
	// ห้ามแก้ไข

	public function get_projectcode($project_id){

	}

	public function getreceive_m($code,$compcode) {
		$this->db->select('*');
		$this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = po_recitem.ic_warehouse');
		$this->db->join('po_receive','po_receive.po_reccode=po_recitem.poi_ref');
		$this->db->join('project','project.project_id=project');
		$this->db->where('project',$code);
		$this->db->where('po_recitem.compcode', $compcode);
		$this->db->where('poi_status !=','del');
		$query = $this->db->get('po_recitem');
		$res = $query->result();
		return $res;
	}
	public function getreceive_store_m($code,$compcode) {
		$this->db->select('*');
		$this->db->join('store','store.store_matcode = po_recitem.poi_matcode');
		// $this->db->join('project','project.project_id=store_project','left outer');
		// $this->db->join('po_receive','po_receive.po_reccode=po_recitem.poi_ref');
		$this->db->where('store_project',$code);
		$this->db->where('po_recitem.compcode', $compcode);
		$this->db->where('poi_status !=','del');
		$query = $this->db->get('po_recitem');
		$res = $query->result();
		return $res;
	}

	public function getpo_receive_m($code,$compcode) {
		$this->db->select('*');
		// $this->db->join('po_receive','po_receive.po_reccode=po_recitem.poi_ref');
		$this->db->where('project',$code);
		$this->db->where('po_receive.compcode', $compcode);
		// $this->db->where('poi_status !=','del');
		$query = $this->db->get('po_receive');
		$res = $query->result();
		return $res;
	}

	public function get_iccode_m() {
		$this->db->select('*');
		$this->db->where('project',$code);
		$this->db->where('po_receive.compcode', $compcode);
		// $this->db->where('poi_status !=','del');
		$query = $this->db->get('po_receive');
		$res = $query->result();
		return $res;
	}

	public function allpr_po() {
		$this->db->select('*');
		$this->db->where('pr_approve','approve');
		$this->db->where('po_open','no');
		$this->db->where('purchase_type !=','3');
		$this->db->order_by('pr_prid',"desc");
		$query = $this->db->get('pr');
		$res = $query->result();
		return $res;
	}
	
	public function allpr_wo() {
		$this->db->select('*');
		$this->db->where('pr_approve','approve');
		$this->db->where('po_open','no');
		$this->db->where('purchase_type !=','2');
		$this->db->order_by('pr_prid',"desc");
		$query = $this->db->get('pr');
		$res = $query->result();
		return $res;
	}
	// public function get_price_control(){
		
	// }
	public function get_tender_id($project_id){
		$this->db->select('bd_tenid');
		$this->db->from('project');
		$this->db->where('project_id', $project_id);
		$query = $this->db->get();

		if($query){
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function get_pricecontrol($tender_id){
		$this->db->select('*');
		$this->db->from('boq_item');
		$this->db->where('boq_bd', $tender_id);
		$query = $this->db->get();

		if($query){
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function load_store_mat2($projid, $compcode) {
		$this->db->select('store.store_matname,
              store.store_matcode,
              store.store_project,
              store.store_costcode,
              store.store_costname,
              store.store_id,
              store.store_type,
              Sum(store.store_qty) AS store_qty,
              store.store_unit,
              store.store_recqty,
              Sum(store.store_total) AS store_total,
              store.unitprice,
              store.discountprice,
              store.totalprice,
              store.wh,   
              ic_proj_warehouse.whname,           
              store.compcode');
		$this->db->from('store');
		$this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = store.wh', 'left outer');
		$this->db->where('store_project', $projid);
		$this->db->where('project_id', $projid);
		$this->db->where('store_total !=', '0');
		$this->db->where('status', null);
		$this->db->where('store.compcode', $compcode);
		
		$this->db->group_by('store.wh');
		$this->db->group_by('store.store_matcode');
		$query = $this->db->get();
		$mat = $query->result();
		return $mat;
	}

	public function load_store_mat22($projid, $compcode) {
		$this->db->select('store.store_matname,
              store.store_matcode,
              store.store_project,
              store.store_costcode,
              store.store_costname,
              store.store_id,
              store.store_type,
              Sum(store.store_qty) AS store_qty,
              store.store_unit,
              store.store_recqty,
              Sum(store.store_total) AS store_total,
              store.unitprice,
              store.discountprice,
              store.totalprice,
              store.wh,   
              ic_proj_warehouse.whname,           
              store.compcode');
		$this->db->from('store');
		$this->db->join('ic_proj_warehouse', 'ic_proj_warehouse.whcode = store.wh', 'left outer');
		$this->db->where('store_project', $projid);
		$this->db->where('project_id', $projid);
		$this->db->where('store_total !=', '0');
		$this->db->where('status', null);
		$this->db->where('store.compcode', $compcode);
		$this->db->group_by('store.store_matcode');
		$this->db->group_by('store.wh');
		$query = $this->db->get();
		$mat = $query->result();
		return $mat;
	}

	public function get_controll($project_id){
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where('project_id', $project_id);
		$query = $this->db->get();

		if($query){
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}
	public function load_stock_card(){
         $this->db->select('stockcard.stock_matname');
         $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
         $this->db->join('project','stockcard.stock_project = project.project_id');
         $this->db->group_by('stockcard.stock_matname');
         $query1 = $this->db->get('stockcard');  

         $this->db->select('store.wh');
         $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
         $this->db->join('project','stockcard.stock_project = project.project_id'); 
         $this->db->group_by('store.wh');
         $query2 = $this->db->get('stockcard');

         $this->db->select('stockcard.stock_matcode');
         $this->db->join('store','stockcard.stock_matcode = store.store_matcode');
         $this->db->join('project','stockcard.stock_project = project.project_id'); 
         $this->db->group_by('stockcard.stock_matcode');
         $query3 = $this->db->get('stockcard');
         
         $res['stock_name'] = $query1->result();
         $res['stock_wh'] = $query2->result();
         $res['stock_matcode'] = $query3->result();
         return $res;
      }

      public function c_price($pprice) {
		$this->db->select('*');
		$this->db->join('po','po.po_pono = po_item.poi_ref');
		$this->db->where('poi_matcode',$pprice);
		$this->db->order_by("poi_id","desc");
		$this->db->limit(10);
		$query = $this->db->get('po_item');
		$result = $query->result();
		return $result;
	}

	public function getreceive_app($id) {
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->join('system', 'system.systemcode = po_receive.system');
		$this->db->join('project','project.project_id = po_receive.project'); 
		$this->db->where('project',$id);
		$this->db->where('po_receive.compcode', $compcode);
		$this->db->where('system.compcode',$compcode);
		$this->db->where('receive_type','keyin');
		$this->db->where('approve','wait');
		$query = $this->db->get('po_receive');
		$res = $query->result();
		return $res;
	}
	public function m_load_system_type_2($id){
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$this->db->select('*');
		// $this->db->where('systemcode',$id);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('system')->result();
		
		return $res;
	}
	public function getreceive_app_all($id) {
		$session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->join('system', 'system.systemcode = po_receive.system');
		$this->db->join('project','project.project_id = po_receive.project'); 
		$this->db->where('project',$id);
		$this->db->where('po_receive.compcode', $compcode);
		$this->db->where('system.compcode',$compcode);
		$this->db->where('receive_type','keyin');
		// $this->db->where('approve','approve');
		$query = $this->db->get('po_receive');
		$res = $query->result();
		return $res;
	}
	public function get_project_item($code,$compcode) {
		$this->db->select('*');
		$this->db->join('system', 'system.systemcode = project_item.projectd_job');
		$this->db->where('project_code', $code);
		$this->db->where('system.compcode',$compcode);
		$query = $this->db->get('project_item');
		$res = $query->result();
		return $res;
	}
	public function getnameproject($project_id)
	{
		$this->db->select('project_name, project_sub');
		$this->db->from('project');
		$this->db->where('project_id', $project_id);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result();
		}else{
			$res = null;
		}

		return $res;
	}

	public function getsubproject($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_sub',$id);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function verder_all()
	{
		$this->db->select('vender_id, vender_name, vender_address');
		$this->db->from('vender');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}	

	public function asset_project($id)
	{
		$this->db->select('*');
		$this->db->from('asset');
		$this->db->where('fa_status =', '1');
		$this->db->where('fa_projectid', $id);
		// $this->db->where('fa_projectid !=', '');
		// $this->db->where('fa_projectid is NOT NULL', NULL, FALSE);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}	

	public function asset_department($id)
	{
		$this->db->select('*');
		$this->db->from('asset');
		$this->db->where('fa_status =', '1');
		$this->db->where('fa_departmentid =', $id);
		// $this->db->where('fa_departmentid !=', '');
		// $this->db->where('fa_departmentid is NOT NULL', NULL, FALSE);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function member_all()
	{
		$this->db->select('m_id, m_code, m_name');
		$this->db->from('member');
		$this->db->where('m_type !=', 'external');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function repair_all()
	{
		$this->db->select('*');
		$this->db->from('repair');
		$this->db->where('status_ative =', 'ative');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function project_all()
	{
		$this->db->select('project_id, project_name, project_code');
		$this->db->from('project');
		$this->db->where('project_status =','normal');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}	

	public function department_all()
	{
		$this->db->select('department_id, department_code, department_title');
		$this->db->from('department');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function get_repair_list($repair_id)
	{
		$this->db->select('*');
		$this->db->from('repair');
		$this->db->join('repair_detail', 'repair.id = repair_detail.ref_reair');
		$this->db->where('repair_detail.status_ative =', 'ative');
		$this->db->where('repair_detail.ref_reair', $repair_id);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function repair_approve()
	{
		$this->db->select('*');
		$this->db->from('repair');
		$this->db->where('approve =','approve');
		// $this->db->where('status_ative =','ative');
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}
	public function asset_search($data){
        $this->db->select('fa_asset');
        //$this->db->group_by('fa_asset');
        $query = $this->db->get('asset');
        $res['assetname'] = $query->result();
        $this->db->select('fa_projectname');
        $this->db->where('fa_projectname !=','');
        $this->db->group_by('fa_projectname');
        $query2 = $this->db->get('asset');
        $res['assetproject'] = $query2->result();
        $this->db->select('fa_departmentname');
        $this->db->where('fa_departmentname !=','');
        $this->db->group_by('fa_departmentname');
        $query3 = $this->db->get('asset');
        $res['assetdepartment'] = $query3->result();
        $this->db->select('fa_lisename');
        $this->db->where('fa_lisename !=','');
        $this->db->group_by('fa_lisename');
        $query4 = $this->db->get('asset');
        $res['assetuser'] = $query4->result();
        return $res;
        
}
	public function repair_search($data){
        $this->db->select('project_name');
        $this->db->where('project_name !=','');
        $this->db->group_by('project_name');
        $query = $this->db->get('repair');
        $res['project_name'] = $query->result();
        $this->db->select('department_name');
        $this->db->where('department_name !=','');
        $this->db->group_by('department_name');
        $query2 = $this->db->get('repair');
        $res['department_name'] = $query2->result();
        return $res;
        
 	}

	public function measurement_tool_pro($id)
	{
		$this->db->select('*');
		$this->db->from('asset');
		$this->db->where('fa_status =', '1');
		$this->db->where('fa_projectid', $id);
		
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}	

	public function measurement_tool_depart($id)
	{
		$this->db->select('*');
		$this->db->from('asset');
		$this->db->where('fa_status =', '1');
		$this->db->where('fa_departmentid =', $id);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;

	}

	public function calibration_all()
	{
		$this->db->select('*');
		$this->db->from('calibration_head');
		$this->db->where('status_active =', 'active');

		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function calibration_approve()
	{
		$this->db->select('*');
		$this->db->from('calibration_head');
		$this->db->where('approve =', 'approve');
		// $this->db->where('status_active =', 'active');

		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function calibration_byid($id)
	{
		$this->db->select('*');
		$this->db->from('calibration_head');
		$this->db->join('calibration_detail', 'calibration_head.id = calibration_detail.ref_cail');
		$this->db->where('calibration_detail.status_active =', 'active');
		$this->db->where('calibration_head.id', $id);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function get_cali_list($id)
	{
		$this->db->select('*');
		$this->db->from('calibration_head');
		$this->db->join('calibration_detail', 'calibration_head.id = calibration_detail.ref_cail');
		$this->db->where('calibration_detail.status_active =', 'ative');
		$this->db->where('calibration_detail.ref_cail', $id);
		$query = $this->db->get();

		if ($query) {
			$res = $query->result_array();
		}else{
			$res = null;
		}

		return $res;
	}

	public function getcontractor2() {
		$this->db->select('*');
		// $this->db->where('project_status !=', "close");
		return $this->db->get('department')->result();
	}

	public function acc_expensother_code($code) {
		$this->db->select('*');
		$this->db->where("expens_code",$code);
		$query = $this->db->get('ap_expensother');
		$res = $query->result();
		return $res;
	}

	public function task_h($code) {
		$this->db->select('*');
		$this->db->where("member_task",$code);
		$query = $this->db->get('task_h');
		$res = $query->result();
		return $res;
	}	

	public function getpr_count($compcode) {
		$data = array();

		$this->db->select('count(pr_approve) as count_pr');
		$this->db->where('pr_approve','approve');
		$query_approve = $this->db->get('pr');
		$res_approve  = $query_approve->result();
		$data['approve'] = $res_approve[0]->count_pr;
		
		$this->db->select('count(pr_approve) as count_pr');
		$this->db->where('pr_approve','wait');
		$this->db->where('pr_prdate',date('Y-m-d',now()));
		$this->db->where('compcode',$compcode);
		$q_now = $this->db->get('pr');
		$res_now  = $q_now->result();
		$data['prnow'] = $res_now[0]->count_pr;

		$this->db->select('count(pr_approve) as count_pr');
		$this->db->where('pr_approve','wait');
		$query_wait = $this->db->get('pr');
		$res_wait  = $query_wait->result();
		$data['wait'] = $res_wait[0]->count_pr;

		$this->db->select('count(po_open) as count_pr');
		$this->db->where('po_open','open');
		$query_open = $this->db->get('pr');
		$res_open  = $query_open->result();
		$data['open'] = $res_open[0]->count_pr;
		
		$this->db->select('count(pr_prid) as pr_prid');
		$this->db->where('DATE_FORMAT(pr_prdate,"%m") =  MONTH(CURDATE())');
		$this->db->where('compcode',$compcode);
		$q_thismonth = $this->db->get('pr')->result();
		$data['thismonth'] = $q_thismonth[0]->pr_prid;
		
		$this->db->select('count(status) as status');
		$this->db->where('status','wait');
		$this->db->where('docdate',date('Y-m-d',now()));
		$this->db->where('compcode',$compcode);
		$q_pcstatus = $this->db->get('pettycash');
		$res_pcnow  = $q_pcstatus->result();
		$data['pcnow'] = $res_pcnow[0]->status;

		$this->db->select('count(status) as status');
		$this->db->where('DATE_FORMAT(docdate,"%m") =  MONTH(CURDATE())');
		$this->db->where('compcode',$compcode);
		$pc_thismonth = $this->db->get('pettycash')->result();
		$data['pcthismonth'] = $pc_thismonth[0]->status;
		
		$this->db->select('count(id) as id');
		$this->db->where('DATE_FORMAT(date_decrement,"%m") =  MONTH(CURDATE())');
		$this->db->where('compcode',$compcode);
		$pr_decre = $this->db->get('decrement')->result();
		$data['decrementthis'] = $pr_decre[0]->id;

		


		return $data;

	}

	public function getpc_count() {
		$data = array();

		$this->db->select('count(pr_approve) as count_pr');
		$this->db->where('pr_approve','approve');
		$query_approve = $this->db->get('pr');
		$res_approve  = $query_approve->result();
		$data['approve'] = $res_approve[0]->count_pr;

		$this->db->select('count(pr_approve) as count_pr');
		$this->db->where('pr_approve','wait');
		$query_wait = $this->db->get('pr');
		$res_wait  = $query_wait->result();
		$data['wait'] = $res_wait[0]->count_pr;

		$this->db->select('count(po_open) as count_pr');
		$this->db->where('po_open','open');
		$query_open = $this->db->get('pr');
		$res_open  = $query_open->result();
		$data['open'] = $res_open[0]->count_pr;

		return $data;

	}

	public function getpr_chart()
	{

		for ($i=1; $i <= 12 ; $i++) { 
			$date = date("Y-");

			if($i <= 9){
				$date .= "0".$i;
			}else{
				$date .= $i;
			}
			$this->db->select('count(pr_approve) as count_pr');
			$this->db->where('pr_approve','approve');
			$this->db->like('pr_prdate', $date);
			$query_approve = $this->db->get('pr');
			$res_approve  = $query_approve->result();
			$data['approve'][$i] = $res_approve[0]->count_pr;

			$this->db->select('count(po_open) as count_pr');
			$this->db->where('po_open','open');
			$this->db->like('pr_prdate', $date);
			$query_open = $this->db->get('pr');
			$res_open  = $query_open->result();
			$data['open'][$i] = $res_open[0]->count_pr;

			$this->db->select('count(approve) as count_pc');
			$this->db->where('approve','approve');
			$this->db->like('docdate', $date);
			$query_approve_pc = $this->db->get('pettycash');
			$res_approve_pc  = $query_approve_pc->result();
			$data['approve_pc'][$i] = $res_approve_pc[0]->count_pc;


			$this->db->select('count(approve) as count_pc');
			$this->db->where('status !=','wait');
			$this->db->like('docdate', $date);
			$query_open_pc = $this->db->get('pettycash');
			$res_open_pc  = $query_open_pc->result();
			$data['open_pc'][$i] = $res_open_pc[0]->count_pc;




			
		}

		return $data;
	}
	
	public function countappove_project($year,$mount,$compcode,$modal,$project)
    {
      $this->db->select('count(bi_project) as approve,bi_approve,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_project',$project);
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }

    public function countdisappove_project($year,$mount,$compcode,$modal,$project)
    {
      $this->db->select('count(bi_project) as disapprove,bi_disapprove,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_project',$project);
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }


 	public function countwait_project($year,$mount,$compcode,$modal,$project)
    {
      $this->db->select('count(bi_project) as wait,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_project',$project);
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }
    public function countwait_department($year,$mount,$compcode,$modal,$dep)
    {
      $this->db->select('count(bi_department) as wait,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_department',$dep);
      $res = $this->db->get('bi_views_department')->result();
      return $res;
    }

    public function countopen_project($year,$mount,$compcode,$modal,$project)
    {
      $this->db->select('count(bi_project) as open,bi_open');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_project',$project);
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }

    public function getview_pr()
	{	


		$data = array();

		$this->db->select('sum(bi_wait) as wait');
		$this->db->where('bi_modal','pr');
		$query_wait = $this->db->get('bi_views_project');
		$res_wait  = $query_wait->result();
		$data['wait'] = $res_wait[0]->wait;

		$this->db->select('sum(bi_approve) as approve');
		$this->db->where('bi_modal','pr');
		$query_approve = $this->db->get('bi_views_project');
		$res_approve  = $query_approve->result();
		$data['approve'] = $res_approve[0]->approve;

		$this->db->select('sum(bi_open) as open');
		$this->db->where('bi_modal','pr');
		$query_open = $this->db->get('bi_views_project');
		$res_open  = $query_open->result();
		$data['open'] = $res_open[0]->open;

		$this->db->select('sum(bi_wait) as pc_wait');
		$this->db->where('bi_modal','pc');
		$query_wait = $this->db->get('bi_views_project');
		$res_wait  = $query_wait->result();
		$data['pc_wait'] = $res_wait[0]->pc_wait;

		$this->db->select('sum(bi_approve) as pc_approve');
		$this->db->where('bi_modal','pc');
		$query_approve = $this->db->get('bi_views_project');
		$res_approve  = $query_approve->result();
		$data['pc_approve'] = $res_approve[0]->pc_approve;

		$this->db->select('sum(bi_open) as pc_open');
		$this->db->where('bi_modal','pc');
		$query_approve = $this->db->get('bi_views_project');
		$res_approve  = $query_approve->result();
		$data['pc_open'] = $res_approve[0]->pc_open;
		return $data;

	}

	public function get_year()
    {
      $this->db->select('bi_year');
      $this->db->group_by("bi_year");
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }

    public function get_orderproject()
    {
      $this->db->select('*');
      $this->db->order_by("project_start",'desc');
      // $this->db->limit(5);
      $res = $this->db->get('project')->result();
      return $res;
    }


    public function detail_viewpro_m($pro)
	{	
	  $this->db->select('sum(bi_wait) as wait,sum(bi_approve) as approve,sum(bi_open) as open');
	  $this->db->where('bi_project',$pro);
	  $this->db->where("bi_modal" , "pr");
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }
    public function detail_viewpro_m2($pro)
	{	
	  $this->db->select('sum(bi_wait) as wait,sum(bi_approve) as approve,sum(bi_open) as open');
	  $this->db->where('bi_project',$pro);
	  $this->db->where("bi_modal" , "pc");
      $res = $this->db->get('bi_views_project')->result();
      return $res;
    }

 //    public function get_deparmentview()
	// {
 //      $res = $this->db->query("SELECT bi_department,SUM(pr_wait) as pr_wait,SUM(pr_open) as pr_open,SUM(pr_approve) as pr_approve,sum(pc_wait) as pc_wait,SUM(pc_approve) as pc_approve, SUM(pc_open) as pc_open,department_title from (
	// 		SELECT bi_department,bi_modal,'' as pr_wait,'' as pr_open,'' as pr_approve,bi_wait as pc_wait,bi_approve as pc_approve,bi_open as pc_open,department_title FROM bi_views_department JOIN department on department.department_id=bi_views_department.bi_department WHERE bi_modal = 'pc'
	// 		UNION all
	// 		SELECT bi_department,bi_modal,bi_wait as pr_wait,bi_open as pr_open,bi_approve as pr_approve,'' as pc_wait,'' as pc_open,'' as pc_approve,department_title FROM bi_views_department JOIN department on department.department_id=bi_views_department.bi_department WHERE bi_modal = 'pr'
	// 		) t
	// 		GROUP BY bi_department")->result();
 //      return $res;
 //    }

    public function countappove_department($year,$mount,$compcode,$modal,$dep)
    {
      $this->db->select('count(bi_department) as approve,bi_approve,bi_wait');
      $this->db->where('bi_modal',$modal);
      $this->db->where('bi_year',$year);
      $this->db->where('bi_month',$mount);
      $this->db->where('compcode',$compcode);
      $this->db->where('bi_department',$dep);
      $res = $this->db->get('bi_views_department')->result();
      return $res;
    }


    public function chart_pr()
    {
		$year ="2017";
	    for ($i=1; $i <= 12 ; $i++) { 

	      $this->db->select('sum(bi_wait) as pr_wait');
	      $this->db->where('bi_modal', "pr");
	      $this->db->where('bi_month', $i);
	      $this->db->where('bi_year', $year);
	      $query_wait = $this->db->get('bi_views_project');
	      $res_wait  = $query_wait->result();
	      $data['pr_wait'][$i] = $res_wait[0]->pr_wait*1;

	      $this->db->select('sum(bi_approve) as pr_approve');
	      $this->db->where('bi_modal', "pr");
	      $this->db->where('bi_month', $i);
	      $this->db->where('bi_year', $year);
	      $query_approve = $this->db->get('bi_views_project');
	      $res_approve  = $query_approve->result();
	      $data['pr_approve'][$i] = $res_approve[0]->pr_approve*1;

	      $this->db->select('sum(bi_open) as pr_open');
	      $this->db->where('bi_modal', "pr");
	      $this->db->where('bi_month', $i);
	      $this->db->where('bi_year', $year);
	      $query_open = $this->db->get('bi_views_project');
	      $res_open  = $query_open->result();
	      $data['pr_open'][$i] = $res_open[0]->pr_open*1;

	      $this->db->select('sum(bi_wait) as pc_wait');
	      $this->db->where('bi_modal', "pc");
	      $this->db->where('bi_month', $i);
	      $this->db->where('bi_year', $year);
	      $query_wait = $this->db->get('bi_views_project');
	      $res_wait  = $query_wait->result();
	      $data['pc_wait'][$i] = $res_wait[0]->pc_wait*1;

	      $this->db->select('sum(bi_approve) as pc_approve');
	      $this->db->where('bi_modal', "pc");
	      $this->db->where('bi_month', $i);
	      $this->db->where('bi_year', $year);
	      $query_approve = $this->db->get('bi_views_project');
	      $res_approve  = $query_approve->result();
	      $data['pc_approve'][$i] = $res_approve[0]->pc_approve*1;

	      $this->db->select('sum(bi_open) as pc_open');
	      $this->db->where('bi_modal', "pc");
	      $this->db->where('bi_month', $i);
	      $this->db->where('bi_year', $year);
	      $query_open = $this->db->get('bi_views_project');
	      $res_open  = $query_open->result();
	      $data['pc_open'][$i] = $res_open[0]->pc_open*1;

	    }
	    // echo "<pre>";
	    // var_dump($data);
	    return $data;
	}

	public function getcostcode_type() {
		$this->db->select('*');
		$this->db->where("cost_status","N");
		$this->db->order_by('csubgroup_id', 'asc');
		$this->db->group_by("ctype_code");
		$query = $this->db->get('cost_subgroup');
		$res = $query->result();
		return $res;
	}

	public function getcostcode_group() {
		$this->db->select('*');
		$this->db->where("cost_status","N");
		$this->db->order_by('csubgroup_id', 'asc');
		$this->db->group_by("cgroup_code");
		$query = $this->db->get('cost_subgroup');
		$res = $query->result();
		return $res;
	}
    public function getcostcode_subgroup() {
		$this->db->select('*');
		$this->db->where("cost_status","N");
		$this->db->order_by('csubgroup_id', 'asc');
		$this->db->group_by("csubgroup_code");
		$query = $this->db->get('cost_subgroup');
		$res = $query->result();
		return $res;
	}
	public function getcostcode_spec() {
		$this->db->select('*');
		$this->db->where("cost_status","N");
		$this->db->order_by('csubgroup_id', 'asc');
		$this->db->group_by("cgroup_code4");
		$query = $this->db->get('cost_subgroup');
		$res = $query->result();
		return $res;
	}

	public function get_postgl_m() {
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$compcode = $session_data['compcode'];

		$this->db->select('*');
		$this->db->join('project', 'project.project_id = gl_post_ar.gl_project', 'left outer');
		$this->db->where("gl_post_ar.compcode",$compcode);
		$this->db->where("status",null);
		$this->db->group_by("gl_refcode");
		$query = $this->db->get('gl_post_ar');
		$res = $query->result();
		return $res;
	}

	public function get_postgl_ap_m() {
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$compcode = $session_data['compcode'];

		$this->db->select('*');
		$this->db->join('project', 'project.project_id = gl_post_ap.gl_project', 'left outer');
		$this->db->where("gl_post_ap.compcode",$compcode);
		$this->db->where("status",null);
		$this->db->group_by("gl_refcode");
		$query = $this->db->get('gl_post_ap');
		$res = $query->result();
		return $res;
	}

	public function load_detail_m($code) {
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$compcode = $session_data['compcode'];

		$this->db->select('*');
		$this->db->join('account_total', 'account_total.act_code = gl_post_ar.gl_actcode', 'left outer');
		$this->db->join('debtor', 'debtor.debtor_code = gl_post_ar.gl_debtor', 'left outer');
		$this->db->where("gl_refcode",$code);
		$this->db->where("status",null);
		$query = $this->db->get('gl_post_ar');
		$res = $query->result();
		return $res;
	}

	public function glap_sum_m($code) {
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$compcode = $session_data['compcode'];

		$this->db->select('sum(gl_dr) as dr,sum(gl_cr) as cr');
		$this->db->where("gl_refcode",$code);
		$this->db->where("status",null);
		$this->db->group_by("gl_refcode");
		$query = $this->db->get('gl_post_ap');
		$res = $query->result();
		return $res;
	}

	public function glar_sum_m($code) {
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$compcode = $session_data['compcode'];

		$this->db->select('sum(gl_dr) as dr,sum(gl_cr) as cr');
		$this->db->where("gl_refcode",$code);
		$this->db->where("status",null);
		$this->db->group_by("gl_refcode");
		$query = $this->db->get('gl_post_ar');
		$res = $query->result();
		return $res;
	}
	public function load_detail_ap_m($code) {
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
      	$compcode = $session_data['compcode'];

		$this->db->select('*');
		$this->db->join('account_total', 'account_total.act_code = gl_post_ap.gl_actcode', 'left outer');
		$this->db->join('debtor', 'debtor.debtor_code = gl_post_ap.gl_debtor', 'left outer');
		$this->db->where("gl_refcode",$code);
		$this->db->where("status",null);
		$query = $this->db->get('gl_post_ap');
		$res = $query->result();
		return $res;
	}

	public function getproject_m() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_status', 'normal');
		$this->db->where('account_total.compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$this->db->join('account_total','account_total.act_code = project.acc_primary');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}

	public function all_costcode_group() {
		$this->db->select('*');
		$this->db->from("cost_group");
		$this->db->where("cgroup_status","yes");
		$this->db->group_by("cgroup_name");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function get_project($project_id){
		$this->db->select('*');
		$this->db->from("project");
		$this->db->where("project_id",$project_id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function get_project_store(){
		$this->db->select('*');
		$this->db->from("project");
		$this->db->where("store_center","1");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	
		

	public function get_project_store_byid($project_id){
		$this->db->select('*');
		$this->db->from("store");
		$this->db->where("store_project",$project_id);
		$this->db->join('project', 'project.project_id = store.store_project');
		$this->db->group_by('store_matcode');
		$this->db->group_by('wh');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function get_project_store_pr($mat){
		$this->db->select('project_id,project_name');
		$this->db->from("store");
		$this->db->where("store_matcode",$mat);
		$this->db->where("project.store_center","1");
		$this->db->join('project', 'project.project_id = store.store_project');
		$this->db->group_by('store_matcode');
		$this->db->group_by('wh');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function get_pb_archive($project_id){

		$this->db->select('*');
		$this->db->from("pb_booking");
		$this->db->where("from_project",$project_id);
		$this->db->join('system', 'system.systemcode = pb_booking.pb_system');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function get_pb_view($pb_no){

		$this->db->select('*');
		$this->db->from("pb_booking");
		$this->db->where("pb_no",$pb_no);
		$this->db->join('system', 'system.systemcode = pb_booking.pb_system');
		$query = $this->db->get();
		$res = $query->result();
		return $res;

	}

	public function get_pb_item($pb_no){

		$this->db->select('*');
		$this->db->from("pb_booking_item");
		$this->db->where("ref_no",$pb_no);
		$this->db->join('project', 'project.project_id = pb_booking_item.store_id');
		$query = $this->db->get();
		$res = $query->result();
		return $res;

	}

	public function modalrefpo($id){
		$this->db->select('*');
		$this->db->from("po");
		$this->db->where("wo_ref",$id);
		$this->db->where("ic_status","full");
		$this->db->where("poi_deduct_status","no");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function modalrefpo_detail($id){
		$this->db->select('*');
		$this->db->from("po_item");
		$this->db->where("poi_ref",$id);
		// $this->db->where("ic_status","full");
		$this->db->where("poi_deduct_status","no");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function list_deprecation(){
		$this->db->select('*');
		$this->db->where("status","no");
		$this->db->from("depreciation");
		// $this->db->join('depreciation_item', 'depreciation_item.de_code = depreciation.de_code');
		// $this->db->join('asset', 'asset.fa_assetcode = depreciation_item.de_ass');
		
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function list_modal_deprecation($id){
		$this->db->select('*');
		$this->db->from("depreciation_item");
		$this->db->where("de_code",$id);
		$this->db->join('asset', 'asset.fa_assetcode = depreciation_item.de_ass');
		$this->db->join('asset_type', 'asset.fa_atype = asset_type.at_code');
		$this->db->join('project', 'project.project_id = depreciation_item.de_pjid');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function list_writoff(){
		$this->db->select('*');
		$this->db->where("status","no");
		$this->db->from("fa_writeoff");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function modal_list_writeoff($id){
		$this->db->select('*');
		$this->db->from("fa_writeoffitem");
		$this->db->join('fa_writeoff', 'fa_writeoff.off_code = fa_writeoffitem.de_code');
		$this->db->join('asset', 'asset.fa_assetcode = fa_writeoff.off_asscode');
		$this->db->where("de_code",$id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function writeoff($id){
		$this->db->select('*');
		$this->db->from("fa_writeoff");
		$this->db->join('asset', 'asset.fa_assetcode = fa_writeoff.off_asscode');
		$this->db->where("off_code",$id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}


	public function ic_gl(){
		$this->db->select('*');
		$this->db->where("status","no");
		$this->db->from("ic_transfer");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function ic_issue_h(){
		$this->db->select('*');
		$this->db->from("ic_issue_h");
		$this->db->join('project','project.project_id = ic_issue_h.is_project');
		$this->db->join('system','ic_issue_h.is_system = system.systemcode');
		$this->db->where("gl_for_ic","1");
		$this->db->where("status","no");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function receive_po(){
		$this->db->select('*');
		$this->db->from("receive_po");
		$this->db->join('project','project.project_id = receive_po.project');
		$this->db->join('system','receive_po.system = system.systemcode');
		$this->db->where("gl_for_ic","1");
		$this->db->where("status","no");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function paid($compcode){
		$this->db->select('*');
		$this->db->from("type_paid");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function bank_master($compcode){
		$this->db->select('*');
		$this->db->from("master_bank");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function master_bank($compcode){
		$this->db->select('*');
		$this->db->from("master_bank");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	
	public function tax($compcode){
		$this->db->select('*');
		$this->db->from("setup_tax");
		$this->db->where("status","Y");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function taxfind($compcode,$id){
		$this->db->select('*');
		$this->db->from("setup_tax");
		$this->db->where("compcode",$compcode);
		$this->db->where("status","Y");
		$this->db->where("id_tax",$id);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function taxdes($compcode){
		$this->db->select('*');
		$this->db->from("setup_taxdes");
		$this->db->where("status","Y");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function taxdesfind($compcode,$id){
		$this->db->select('*');
		$this->db->from("setup_taxdes");
		$this->db->where("compcode",$compcode);
		$this->db->where("status","Y");
		$this->db->where("id_taxdes",$id);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function taxtype($compcode){
		$this->db->select('*');
		$this->db->from("setup_taxtype");
		$this->db->where("status","Y");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function taxtypefind($compcode,$id){
		$this->db->select('*');
		$this->db->from("setup_taxtype");
		$this->db->where("compcode",$compcode);
		$this->db->where("status","Y");
		$this->db->where("id_taxtype",$id);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	
	public function copy_gl($compcode){
		$this->db->select('*');
		$this->db->from("gl_batch_header");
		// $this->db->join("gl_batch_details","gl_batch_details.vchno = gl_batch_header.vchno");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	public function reverse($compcode){
		$this->db->select('*');
		$this->db->from("gl_batch_header");
		// $this->db->join("gl_batch_details","gl_batch_details.vchno = gl_batch_header.vchno");
		$this->db->where("compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	
	public function modal_copy_gl($id,$compcode){
		$this->db->select('*');
		$this->db->from("gl_batch_header");
		$this->db->join("gl_batch_details","gl_batch_details.vchno = gl_batch_header.vchno");
		$this->db->where("gl_batch_header.compcode",$compcode);
		$this->db->where("gl_batch_header.vchno",$id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	
	public function loadjournal_m($compcode){
		$this->db->select('*');
		$this->db->from("gl_batch_header");
		// $this->db->join("gl_book","gl_book.bookcode = gl_batch_header.bookcode");
		$this->db->where("gl_batch_header.compcode",$compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getapproveid($appid,$compcode)
    {
      $this->db->select('app_midid');
      $this->db->where('app_id',$appid);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('approve_pr');
      $res = $query->result();
      foreach ($res as $key => $value) {
        $id= $value->app_midid;
	  }
	  $this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
	}
	public function getpoapproveid($appid,$compcode)
    {
      $this->db->select('app_midid');
      $this->db->where('app_id',$appid);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('approve_po');
      $res = $query->result();
      foreach ($res as $key => $value) {
        $id= $value->app_midid;
	  }
	  $this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
	}
	public function getwoapproveid($appid,$compcode)
    {
      $this->db->select('app_midid');
      $this->db->where('app_id',$appid);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('approve_wo');
      $res = $query->result();
      foreach ($res as $key => $value) {
        $id= $value->app_midid;
	  }
	  $this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
	}
	public function getpcapproveid($appid,$compcode)
    {
      $this->db->select('app_midid');
      $this->db->where('app_id',$appid);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('approve_pc');
      $res = $query->result();
      foreach ($res as $key => $value) {
        $id= $value->app_midid;
	  }
	  $this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
	}
	public function getlineid($username,$compcode)
    {
      $this->db->select('lineid');
      $this->db->where('m_id',$username);
      $this->db->where('compcode',$compcode);
      $query = $this->db->get('member');
      $res = $query->result();
      foreach ($res as $key => $value) {
        return $value->lineid;
      }
     
    }
	public function getname($username,$compcode){
		$this->db->select('m_name');
		$this->db->where('m_id',$username);
		$this->db->where('compcode',$compcode);
		$query = $this->db->get('member');
		$res = $query->result();
		foreach ($res as $key => $value) {
		  return $value->m_name;
		}
	  }

	public function getprseq($pr,$compcode,$sequence){
		$seq = $sequence+1;
		$this->db->select('app_midid,COUNT(app_midid) as count','app_sequence');
		$this->db->where('app_pr',$pr);
		$this->db->where('status','no');
		$this->db->where('compcode',$compcode);
		$this->db->where('app_sequence',$seq);
		$query = $this->db->get('approve_pr');
		$res = $query->result();
		foreach ($res as $key => $value) {
		  $id =  $value->app_midid;
		  $count =  $value->count;
		}
		if ($count==0) {
			// return $pr;
			$this->db->select('pr_memid');
			$this->db->where('pr_prno',$pr);
			$this->db->where('compcode',$compcode);
			$res = $this->db->get('pr')->result();
			foreach ($res as $key => $value) {
				$id = $value->pr_memid; 
			}
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
		}else{
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}

		}

	}
	public function getprseq_line($pr,$compcode,$seq){
		$this->db->select('app_midid,COUNT(app_midid) as count','app_sequence');
		$this->db->where('app_pr',$pr);
		$this->db->where('status','no');
		$this->db->where('compcode',$compcode);
		$this->db->where('app_sequence',$seq);
		$query = $this->db->get('approve_pr');
		$res = $query->result();
		foreach ($res as $key => $value) {
		  $id =  $value->app_midid;
		  $count =  $value->count;
		}
		if ($count==0) {
			// return $pr;
			$this->db->select('pr_memid');
			$this->db->where('pr_prno',$pr);
			$this->db->where('compcode',$compcode);
			$res = $this->db->get('pr')->result();
			foreach ($res as $key => $value) {
				$id = $value->pr_memid; 
			}
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
		}else{
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}

		}

	}
	public function getposeq($pr,$compcode,$sequence){
		$seq = $sequence+1;
		$this->db->select('app_midid,COUNT(app_midid) as count','app_sequence');
		$this->db->where('app_pr',$pr);
		$this->db->where('status','no');
		$this->db->where('compcode',$compcode);
		$this->db->where('app_sequence',$seq);
		$query = $this->db->get('approve_po');
		$res = $query->result();
		foreach ($res as $key => $value) {
		  $id =  $value->app_midid;
		  $count =  $value->count;
		}
		if ($count==0) {
			// return $pr;
			$this->db->select('po_memid');
			$this->db->where('po_pono',$pr);
			$this->db->where('compcode',$compcode);
			$res = $this->db->get('po')->result();
			foreach ($res as $key => $value) {
				$ids = $value->po_memid; 
			}
			$this->db->select('lineid');
			$this->db->where('m_id',$ids);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
		}else{
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}

		}

	}
	public function getwoseq($pr,$compcode,$sequence){
		$seq = $sequence+1;
		$this->db->select('app_midid,COUNT(app_midid) as count','app_sequence');
		$this->db->where('app_pr',$pr);
		$this->db->where('status','no');
		$this->db->where('compcode',$compcode);
		$this->db->where('app_sequence',$seq);
		$query = $this->db->get('approve_wo');
		$res = $query->result();
		foreach ($res as $key => $value) {
		  $id =  $value->app_midid;
		  $count =  $value->count;
		}
		if ($count==0) {
			// return $pr;
			$this->db->select('user');
			$this->db->where('lo_lono',$pr);
			$this->db->where('compcode',$compcode);
			$res = $this->db->get('lo')->result();
			foreach ($res as $key => $value) {
				$id = $value->user; 
			}
			$this->db->select('lineid');
			$this->db->where('m_user',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
		}else{
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}

		}

	}
	public function getpcseq($pr,$compcode,$sequence){
		$seq = $sequence+1;
		$this->db->select('app_midid,COUNT(app_midid) as count','app_sequence');
		$this->db->where('app_pr',$pr);
		$this->db->where('status','no');
		$this->db->where('compcode',$compcode);
		$this->db->where('app_sequence',$seq);
		$query = $this->db->get('approve_pc');
		$res = $query->result();
		foreach ($res as $key => $value) {
		  $id =  $value->app_midid;
		  $count =  $value->count;
		}
		if ($count==0) {
			// return $pr;
			$this->db->select('useradd');
			$this->db->where('docno',$pr);
			$this->db->where('compcode',$compcode);
			$res = $this->db->get('pettycash')->result();
			foreach ($res as $key => $value) {
				$id = $value->useradd; 
			}
			$this->db->select('lineid');
			$this->db->where('m_user',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}
		}else{
			$this->db->select('lineid');
			$this->db->where('m_id',$id);
			$this->db->where('compcode',$compcode);
			$query = $this->db->get('member');
			$res = $query->result();
			foreach ($res as $key => $value) {
				return $value->lineid;
			}

		}

	}

	public function getprdetail($pr,$compcode){
		$this->db->select('pri_matname,pri_qty,pri_unit');
		$this->db->where('pri_ref',$pr);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('pr_item')->result();
		return $res;
	}
	public function getpodetail($po,$compcode){
		$this->db->select('poi_matname,poi_qty,poi_unit');
		$this->db->where('poi_ref',$po);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('po_item')->result();
		return $res;
	}
	public function getlodetail($po,$compcode){
		$this->db->select('lo_matname,lo_qty,lo_unit');
		$this->db->where('lo_ref',$po);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('lo_detail')->result();
		return $res;
	}
	public function getimgcomp($compcode)
	{
		$this->db->select('comp_img');
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('company')->result();
		foreach ($res as $key => $value) {
			return $img = $value->comp_img;
		}
	}

	public function getcostcodejson(){
		$this->db->select('*');
		$res = $this->db->get('cost_subgroup')->result();
			return $res;
	}
	public function getmatcodejson(){
		$this->db->select('*');
		$res = $this->db->get('mat_unit')->result();
			return $res;
	}
	public function getdata($bdcode,$compcode){
		// $this->db->select('systemname as boq_job,subcostcode,subcostcodename,CONCAT_WS(" - ",newmatnamee,newmatcode ) as newmatnamee,newmatcode,unitcode,unitname,qty_bg,matpricebg,matamtbg,labpricebg,labamtbg,totalamt,subpricebg,subamtbg');
		$this->db->select('
			systemname as boq_job,
			subcostcode,
			subcostcodename,
			subcostcodelabor,
			subcostnamelabor,
			newmatnamee,
			newmatcode,
			matcodelabor,
			matnamelabor,
			unitcode,
			unitname,
			qty_bg,
			matpricebg,
			matamtbg,
			labpricebg,
			labamtbg,
			totalamt,
			subpricebg,
			subamtbg'
		);
		$this->db->join('system','system.systemcode = boq_item.boq_job');
		$this->db->where('boq_bd',$bdcode);
		$this->db->where('status','N');
		$this->db->where('system.compcode',$compcode);
		// $this->db->group_by('newmatcode,subcostcode');
		$res = $this->db->get('boq_item')->result();
		// $data[] = array(
		// 	'boq_job' => $res[0]['boq_job'],
		// 	'subcostcode' => $res[0]['subcostcode'],
		// 	'subcostcodename' => $res[0]['subcostcodename'],
		// 	'newmatnamee' => $res[0]['newmatnamee'],
		// 	'newmatcode' => $res[0]['newmatcode'],
		// 	'unitcode' => $res[0]['unitcode'],
		// 	'unitname' => $res[0]['unitname'],
		// 	'qty_bg' => $res[0]['qty_bg'],
		// 	'matpricebg' => $res[0]['matpricebg'],
		// 	'matamtbg' => $res[0]['matamtbg'],
		// 	'labpricebg' => $res[0]['labpricebg'],
		// 	'labamtbg' => $res[0]['labamtbg'],
		// 	'totalamt' => $res[0]['totalamt'],
		// 	'subpricebg' => $res[0]['subpricebg'],
		// 	// 'subamtb' => $res[0]['subamtb'],
		// );
 		return $res;
	}
	public function getsystemboq($name) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('systemcode');
		$this->db->where('systemname',$name);
		$this->db->where('compcode',$compcode);
		// $this->db->order_by('systemcode', 'desc');
		$query = $this->db->get('system');
		$res = $query->result_array();
		return $res[0]['systemcode'];
	}
	public function getmatmame($matname){
		$this->db->select('materialcode');
		$this->db->where('materialname',$matname);
		$this->db->limit(1);
		$res = $this->db->get('mat_unit')->result_array();
		return $res[0]['materialcode'];
	}
	public function getcostcodename($costname){
		$this->db->select('costcode_d');
		$this->db->where('cgroup_name5',$costname);
		$res = $this->db->get('cost_subgroup')->result_array();
			return $res[0]['costcode_d'];
	}
	public function getunitname($unitname){
		$this->db->select('unit_code');
		$this->db->where('unit_name',$unitname);
		$res = $this->db->get('unit')->result_array();
			return $res[0]['unit_code'];
	}
	public function setupwt(){
		$this->db->select('id_wt,name_wt,per_wt');
		$this->db->order_by('per_wt','asc');
		$res = $this->db->get('setupwt')->result();
		return $res;
	}
	public function setuppiad(){
		$this->db->select('id,name');
		$res = $this->db->get('type_paid')->result();
		return $res;
	}
	public function getprojectunit($projcode){
		$this->db->select('*');
		$this->db->from('project_unit');
		$this->db->join('model_unit','model_unit.model_code = project_unit.model_code','left outer');
		$this->db->where('project_code',$projcode);
		$q = $this->db->get()->result();
		return $q;
	}
	public function project_name_by_code($projcode) {
		$this->db->select('project_name');
		$this->db->where('project_code', $projcode);
		$q = $this->db->get('project')->result();
		foreach ($q as $key => $value) {
			return $value->project_name;
		}
	}
	public function geteditprojectunit($projectcode,$unit,$compcode)
	{
		$this->db->select('unitcode,project_code,unit_name,qty');
		$this->db->where('project_code',$projectcode);
		$this->db->where('unitcode',$unit);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('project_unit')->result();
		return $res;
	}
	public function getunit_model($id){
		$this->db->select('id,model_code,model_name');
		$this->db->where('id',$id);
		$res = $this->db->get('model_unit')->result_array();
		return $res;
	}
	public function getunit_modelall(){
		$this->db->select('id,model_code,model_name');
		$res = $this->db->get('model_unit')->result();
		return $res;
	}
	public function getprojectunitname($projcode)
	{
		$this->db->select('unit_name');
		$this->db->where('project_code',$projcode);
		$q = $this->db->get('project_unit')->result();
		foreach ($q as $key => $value) {
			return $value->unit_name;
		}
	}
	public function getprojectunitname_name($projcode,$unitcode)
	{
		$this->db->select('unit_name');
		$this->db->where('project_code',$projcode);
		$this->db->where('unitcode',$unitcode);
		$q = $this->db->get('project_unit')->result();
		foreach ($q as $key => $value) {
			return $value->unit_name;
		}
	}
	public function getproject_unit($pjcode){
		$this->db->select('*');
		$this->db->where('project_code',$pjcode);
		$res = $this->db->get('project_unit')->result();
		return $res;
	}
	public function load_pr_unit($prno,$projectcode){
			$this->db->select('*');
			$this->db->where('prno',$prno);
			$this->db->where('project_code',$projectcode);
			$res = $this->db->get('pr_unit_detail')->result();
			return $res;
	}
	public function getprid($prid){
			$this->db->select('*');
			$this->db->where('pri_id', $prid);
			$item = $this->db->get('pr_item')->result_array();
			return $item;
	}
	public function numrowsprd($pri_ref){
		$this->db->select('*');
		$this->db->where('pri_ref', $pri_ref);
		$this->db->where('pri_status =', 'no'); 
		$chkitem = $this->db->get('pr_item');
		$num = $chkitem->num_rows();
		return $num;
	}
	public function countrowprwo($pri_ref){
		$this->db->select('*');
		$this->db->where('pri_ref', $pri_ref);
		$this->db->where('boq_type !=', "1");
		$chkitem = $this->db->get('pr_item');
		$num = $chkitem->num_rows();
		return $num;
	}
	public function countprwoopen($pri_ref){
		$this->db->select('*');
		$this->db->where('pri_ref', $pri_ref);
		$this->db->where('boq_type !=', "1");
		$this->db->where('pri_status','open');
		$chkitem = $this->db->get('pr_item');
		$num = $chkitem->num_rows();
		return $num;
	}
	public function set_approve_wo($project_code){
		$this->db->select('*');
		$this->db->from('approve');
		$this->db->where('approve_project', $project_code);
		$this->db->where('type', "WO");
		$app_pj = $this->db->get()->result();
		return $app_pj;
	}
	public function set_approve_wo_array($project_code){
		$this->db->select('*');
		$this->db->from('approve');
		$this->db->where('approve_project', $project_code);
		$this->db->where('type', "WO");
		$app_pj = $this->db->get()->result_array();
		return $app_pj;
	}
	public function app_wo_amount($project_code,$woamt){
		$this->db->select('*');
		$this->db->from('approve');
		$this->db->where('approve_project',$project_code);
		$this->db->where('type', "WO");
		$this->db->where('approve_cost >=',$woamt);
		$this->db->order_by("approve_sequence", "asc"); 
		$q = $this->db->get()->result();
		return $q;
	}
	public function getwo($lono){
		$this->db->select('*');
		$this->db->where('lo_lono',$lono);
		$res = $this->db->get('lo')->result_array();
		return $res;
	}
	public function getwodetail($lono){
		$this->db->select('*');
		$this->db->where('lo_ref',$lono);
		$res = $this->db->get('lo_detail')->result();
		return $res;
	}
	public function getrunno($compcode){
		$this->db->select('*');
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('setup_running')->result_array();
		return $res;
	}
	public function npo_coubt_row($compcode,$project_id){
		$this->db->select('*');
		$this->db->where('po_project', $project_id);
		$this->db->where('compcode',$compcode);
		$qu = $this->db->get('po');
		$res = $qu->num_rows();
		return $res;
	}
	public function npc_coubt_row($compcode,$project_id){
		$this->db->select('*');
		$this->db->where('project', $project_id);
		$this->db->where('compcode',$compcode);
		$qu = $this->db->get('pettycash');
		$res = $qu->num_rows();
		return $res;
	}
	public function nwo_coubt_row($compcode,$project_id){
		$this->db->select('*');
		$this->db->where('projectcode', $project_id);
		$this->db->where('compcode',$compcode);
		$qu = $this->db->get('lo');
		$res = $qu->num_rows();
		return $res;
	}
	function ngetpo_num($month,$compcode,$projectid)
    {
        $this->db->select('month(po_podate) as po_podate');
        $this->db->where('month(po_podate)',$month);
        $this->db->where('po_project',$projectid);
        $this->db->where('compcode',$compcode);
        $this->db->order_by('po_id','desc');
        $this->db->limit('1');
        $query = $this->db->get('po');
        return $query->result_array();
	}
	function ngetpc_num($month,$compcode,$projectid)
    {
        $this->db->select('month(docdate) as docdate');
        $this->db->where('month(docdate)',$month);
        $this->db->where('project',$projectid);
        $this->db->where('compcode',$compcode);
        $this->db->order_by('doc_id','desc');
        $this->db->limit('1');
        $query = $this->db->get('pettycash');
        return $query->result_array();
	}
	function ngetwo_num($month,$compcode,$projectid)
    {
        $this->db->select('month(lodate) as lodate');
        $this->db->where('month(lodate)',$month);
        $this->db->where('projectcode',$projectid);
        $this->db->where('compcode',$compcode);
        $this->db->order_by('lo_id','desc');
        $this->db->limit('1');
        $query = $this->db->get('lo');
        return $query->result_array();
	}
	function cgetpo_num($month,$compcode,$projectid)
    {
        $this->db->select('*');
        $this->db->where('month(po_podate)',$month);
        $this->db->where('po_project',$projectid);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('po');
        return $query->num_rows();
    }
	function cgetpc_num($month,$compcode,$projectid)
    {
        $this->db->select('*');
        $this->db->where('month(docdate)',$month);
        $this->db->where('project',$projectid);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('pettycash');
        return $query->num_rows();
    }
	function cgetwo_num($month,$compcode,$projectid)
    {
        $this->db->select('*');
        $this->db->where('month(lodate)',$month);
        $this->db->where('projectcode',$projectid);
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('lo');
        return $query->num_rows();
    }
	public function RunningNumber($module_type,$count_row,$month,$project,$module){
		$session_data = $this->session->userdata('sessed_in');
      	$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		
		$this->db->select('*');
		$this->db->where('module',$module);
		// $this->db->where('prefix',$module_type);
		$this->db->where('compcode',$compcode);
		$res = $this->db->get('setup_running')->result_array();
		
		$y = "y";
		$yy = "Y";
		$m = "m";
		$d = "d";
		switch ($res[0]['type']) {
			case '1': //YYMM
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).$month.$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).date($m).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).date($m)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).$month."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).date($m)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($y).date($m)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($y).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($y).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($y).date($m)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($y).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($y).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($y).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($y).date($m)."0".$count_row;
							}
						}
						
						break;
				}
				return true;
				break;
			case '2': //MMYY
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($y).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($y).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($y)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($y)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($y)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($m).date($y)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$month.date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($m).date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($m).date($y)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$month.date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($m).date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($m).date($y)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '3': //YYYYMM
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month.$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).date($m)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).date($m)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).date($m)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '4': //MMYYYY
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($yy).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($yy).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($m).date($yy)."0".$count_row;
							}
						}
						break;
					
					default:
					if(isset($month)){
						if ($count_row<=9) {
							return $res[0]['prefix'].$month.date($yy)."000".$count_row;
						}
						elseif ($count_row<=99) {
							return $res[0]['prefix'].$month.date($yy)."00".$count_row;
						}
						elseif ($count_row<=999) {
							return $res[0]['prefix'].$month.date($yy)."0".$count_row;
						}
					}else{
						if ($count_row<=9) {
							return $res[0]['prefix'].date($m).date($yy)."000".$count_row;
						}
						elseif ($count_row<=99) {
							return $res[0]['prefix'].date($m).date($yy)."00".$count_row;
						}
						elseif ($count_row<=999) {
							return $res[0]['prefix'].date($m).date($yy)."0".$count_row;
						}
					}
						break;
				}
				return true;
				break;
			case '5': //YYYYMMDD
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month.date($d).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m).date($d).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month.date($d)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month.date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).$month.date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).$month.date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).$month.date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '6': //DDMMYYYY
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).$month.date($yy).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).date($m).date($yy).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($d).$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($d).$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '7': //PJCODE-YYMM
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).$month.$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).date($m).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).$month."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($y).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($y).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($y).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($y).date($m)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '8': //PJCODE-MMYY
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($y).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($y).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($y)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".$month.date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".$month.date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".$month.date($y)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($m).date($y)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '9': //PJCODE-YYYYMM
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month.$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).$month."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).$month."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).date($m)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '10': //PJCODE-MMYYYY
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($yy).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($yy).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($m).date($yy)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '11': //PJCODE-YYYYMMDD
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).$month.date($d)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($yy).date($m).date($d)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			case '12': //PJCODE-DDMMYYYY
				switch (strlen($res[0]['running'])) {
					case '1':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy).$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy).$count_row;
							}
						}
						break;
					case '2':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '3':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
					case '4':
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
					
					default:
						if(isset($month)){
							if ($count_row<=9) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $res[0]['prefix'].$project."-".date($d).$month.date($yy)."0".$count_row;
							}
						}else{
							if ($count_row<=9) {
								return $module_type.$project."-".date($d).date($m).date($yy)."000".$count_row;
							}
							elseif ($count_row<=99) {
								return $module_type.$project."-".date($d).date($m).date($yy)."00".$count_row;
							}
							elseif ($count_row<=999) {
								return $module_type.$project."-".date($d).date($m).date($yy)."0".$count_row;
							}
						}
						break;
				}
				return true;
				break;
			default:
				echo "ไม่มีค่า";
				return true;
				break;
		
		}
	}
	public function getprintdefualt(){
		$this->db->select('print_defualt');
		$q = $this->db->get('setup_default')->result_array();
		return $q[0]['print_defualt'];
	}
	public function get_business_by_id($id,$compcode) {
		$this->db->select('*');
		$this->db->where('business_id', $id);
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('master_business');
		$result = $query->result_array();
		return $result;
	}
	public function getprojectsub(){
		$this->db->select('*');
		$this->db->where('project_substatus',"Y");
		$result = $this->db->get('project')->result();
		return $result;
	}
	public function getproject_array($id) {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('project_id', $id);
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result_array();
		return $res;
	}
	public function bdtender_mm() {
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->join('debtor','bdtender_h.bd_cus = debtor.debtor_code');
		$this->db->where('bdtender_h.compcode',$compcode);
		$query = $this->db->get('bdtender_h');
		$res = $query->result();
		return $res;
	}
	public function get_system_new($projectcode,$compcode){
		$this->db->select('projectd_job,systemname,job_amount,id');
		$this->db->from('project_item');
		$this->db->join('system', 'system.systemcode = project_item.projectd_job','left outer');
		$this->db->where('project_code',$projectcode);
		$this->db->where('system.compcode',$compcode);
		$result = $this->db->get()->result();
		return $result;
	}
	public function getsystemcompcode($compcode){
		$this->db->select('systemcode,systemname');
		$this->db->where('compcode',$compcode);
		$result = $this->db->get('system')->result();
		return $result;
	}
	public function getadmincontract($projid,$compcode){
		$this->db->select('projectm_id, mpro_adid, mpro_adname, mpro_adposition, mpro_adtel, mpro_ademail');
		$this->db->join('project', 'project.project_id = project_member.ref_project');
		$this->db->where('project_id',$projid);
		$this->db->where('project.compcode',$compcode);
		$this->db->where('mpro_adid !=','');
		$this->db->where('active !=','del');
		$result = $this->db->get('project_member')->result();
		return $result;
	}
	public function getconsultcontract($projid,$compcode){
		$this->db->select('projectm_id, mpro_consultid, mpro_consultname, mpro_consultposition, mpro_consulttel, mpro_consultemail');
		$this->db->join('project', 'project.project_id = project_member.ref_project');
		$this->db->where('project_id',$projid);
		$this->db->where('project.compcode',$compcode);
		$this->db->where('mpro_consultid !=','');
		$this->db->where('active !=','del');
		$result = $this->db->get('project_member')->result();
		return $result;
	}
	public function getaccountproject($acc_primary,$compcode){
		$this->db->select('act_name');
		$this->db->where('act_code',$acc_primary);
		$this->db->where('compcode',$compcode);
		$result = $this->db->get('account_total')->result_array();
		return $result;
	}
	public function getdataemployee(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_code = member.m_project', 'left outer');
		$this->db->join('m_position', 'm_position.id = member.m_position', 'left outer');
		// $this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		//  $this->db->where('m_type','employee');
		 $this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getdataemployee_active(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_code = member.m_project', 'left outer');
		$this->db->join('m_position', 'm_position.id = member.m_position', 'left outer');
		// $this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		//  $this->db->where('m_type','employee');
		 $this->db->where('member.compcode', $compcode);
		 $this->db->where('member.m_status', "o");
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function getdataemployee_array($m_id){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->from('member');
		$this->db->join('project', 'project.project_code = member.m_project', 'left outer');
		// $this->db->join('department', 'department.department_id = member.m_department', 'left outer');
		 $this->db->where('m_id',$m_id);
		 $this->db->where('member.compcode', $compcode);
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function getproject_open($compcode){
		$this->db->select('*');
		$this->db->where('project_status','normal');
		$this->db->where('compcode', $compcode);
		$this->db->order_by('project_id', 'desc');
		$query = $this->db->get('project');
		$res = $query->result();
		return $res;
	}
	public function getdataposition(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		//  $this->db->where('compcode', $compcode);
		$query = $this->db->get('m_position');
		$res = $query->result();
		return $res;
	}
	public function getdataposition_arr($m_position){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		 $this->db->where('id', $m_position);
		$query = $this->db->get('m_position');
		$res = $query->result_array();
		return $res;
	}
	public function getprojectjob(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('sys_active !=', "del");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('system');
		$res = $query->result();
		return $res;
	}
	public function getprojectjob_array($sys_id){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('systemid',$sys_id);
		$this->db->where('compcode',$compcode);
		$this->db->order_by('systemcode', 'desc');
		$query = $this->db->get('system');
		$res = $query->result_array();
		return $res;
	}
	public function get_job_type_array($id,$compcode) {
		$this->db->select('*');
		$this->db->where('type_id',$id);
		$this->db->where('compcode',$compcode);
		// $this->db->where('type_active',"Y");
		$query = $this->db->get('master_jobtype');
		$res = $query->result_array();
		return $res;
	}
	public function costtype_array($id,$compcode) {
		$this->db->select('*');
		$this->db->where('costtype_id',$id);
		$this->db->where('costtype_status !=', 'D');
		$q = $this->db->get('master_costtype');
		$res = $q->result_array();
		return $res;
	}
	public function h_acc_chart_d($compcode) {
		$this->db->select('*');
		$this->db->where('act_status',"on");
		$this->db->where('compcode', $compcode);
		$query = $this->db->get('account_total');
		$res = $query->result();
		return $res;
	}
	public function sclove_invoice_all($projid,$compcode)
        {
          $where_p = "(`ar_account_header`.`acc_project` = '$projid')";
          $this->db->select('ar_account_header.acc_invdate as date,ar_account_header.acc_cusamt as amount');
          $this->db->from('ar_account_header');
          $this->db->join('project','project.project_id = ar_account_header.acc_project');
          $this->db->where($where_p);
          $this->db->where('ar_account_header.acc_invtype','progress');
          $this->db->where('ar_account_header.compcode',$compcode);
          $this->db->group_by('period,year');
          $this->db->order_by('ar_account_header.acc_invdate','asc');
          $po = $this->db->get()->result();
          return $po;
        }
}