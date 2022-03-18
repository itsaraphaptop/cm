<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class bd_m extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function getsystem() {
		$this->db->select('*');
		$query = $this->db->get('system');
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
	
	public function bdtender_count($compcode) {
		$this->db->select('bd_no');
		$this->db->where('compcode',$compcode);
		$query = $this->db->get('bdtender_h');
		$res = $query->num_rows();
		return $res;
	}
	
	public function bdtender_win($compcode) {
		$this->db->select('bd_no');
		$this->db->where('bd_status !=', 'Wait');
		$this->db->where('compcode',$compcode);
		$query = $this->db->get('bdtender_h');
		$res = $query->num_rows();
		return $res;
	}

	public function bdtender_tender($compcode) {
		$this->db->select('bd_no');
		$this->db->where('bd_status',null);
		$this->db->where('compcode',$compcode);
		$query = $this->db->get('bdtender_h');
		$res = $query->num_rows();
		return $res;
	}


	public function td_boq($pjid,$m_id) {
		$this->db->select('*');
		$this->db->where('boq_item.boq_bd', $pjid);
		$this->db->where('boq_item.adduser_id',$m_id);
		$this->db->where('boq_item.status',"N");
		$query = $this->db->get('boq_item');
		$res = $query->result();
		return $res;
	}

		public function boq_td_boq($pjid,$m_id) {
		$this->db->select('*');
		$this->db->where('boq_item.boq_bd', $pjid);
		$this->db->where('boq_item.adduser_id',$m_id);
		$this->db->where('boq_item.status_boq',"N");
		$query = $this->db->get('boq_item');
		$res = $query->result();
		return $res;
	}

	public function bdtender_m() {
		$this->db->select('*');
		$query = $this->db->get('bdtender_h');
		$res = $query->result();
		return $res;
	}
	public function bdtender_m_h_by_id($id) {
		$this->db->select('*');
		$this->db->from('bdtender_h');
		// $this->db->join('bdtender_d', 'bdtender_h.bd_tenid = bdtender_d.bdd_tenid');
		$this->db->where('bdtender_h.bd_tenid', $id);
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function bdtender_m_d_by_id($id) {
		$this->db->select('*');
		$this->db->from('bdtender_d');
		$this->db->where('bdtender_d.bdd_tenid', $id);
		$query = $this->db->get();
		if ($query) {
			$res = $query->result_array();
		} else {
			$res = false;
		}
		return $res;
	}
	public function get_data_header() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$this->db->select('*');
		$this->db->where('compcode',$compcode);
		$this->db->from('bdtender_h');
		$query = $this->db->get();
		if ($query) {
			$res = $query->result_array();
		} else {
			$res = false;
		}
		return $res;
	}
	public function get_header_by_id($id) {
		$this->db->select('*');
		$this->db->from('bdtender_h');
		$this->db->where('bdtender_h.bd_tenid', $id);
		$query = $this->db->get();
		if ($query) {
			$res = $query->result_array();
		} else {
			$res = false;
		}
		return $res;
	}
	public function del_byid($id) {
		$this->db->where('bd_tenid', $id);
		$query_header = $this->db->delete('bdtender_h');
		$this->db->where('bdd_tenid', $id);
		$query_detail = $this->db->delete('bdtender_d');
		if ($query_header && $query_detail) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}
	public function del_row_d($bdd_tenid, $id) {
		$this->db->where('bdd_jobno', $id);
		$this->db->where('bdd_tenid', $bdd_tenid);
		$query = $this->db->delete('bdtender_d');
		if ($query) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
	}
	public function del_approve_tender($tender,$id)
	{
		$this->db->where('approve_project',$tender);
		$this->db->where('approve_sequence',$id);
		$q = $this->db->delete('approve');
		if ($q) {
			$result = true;
		} else {
			$result = false;
		}
		return $result;
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
	public function bdtender_d($id) {
		$this->db->select('*');
		$this->db->where('bdd_tenid', $id);
		$query = $this->db->get('bdtender_d');
		$res = $query->result();
		return $res;
	}
	public function getboqproject($pjid,$start,$stop) {
		$this->db->select('*');
		$this->db->where('boq_bd',$pjid);
		$this->db->where('status', "Y");
		$this->db->join('system','system.systemcode = boq_item.boq_job');
		$this->db->limit($stop,$start); 
		$query = $this->db->get('boq_item');
		$ress = $query->result();
		return $ress;
	}
	public function getboqprojectkendo($pjid,$ref_revise) {
		if ($ref_revise != "0") {
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$this->db->select('*,newmatnamee as matcon');
			$this->db->join('system','system.systemcode = boq_item.boq_job','left outer');
			$this->db->where('boq_bd',$pjid);
			// $this->db->where('status', "Y");
			$this->db->where('system.compcode',$compcode);
			$this->db->where('revise',$ref_revise);
			// $this->db->group_by('boq_job,newmatcode');
			$query = $this->db->get('boq_item');
			$ress = $query->result();
		}else{
			$session_data = $this->session->userdata('sessed_in');
			$compcode = $session_data['compcode'];
			$this->db->select('*,newmatnamee as matcon');
			$this->db->join('system','system.systemcode = boq_item.boq_job','left outer');
			$this->db->where('boq_bd',$pjid);
			$this->db->where('status', "Y");
			$this->db->where('system.compcode',$compcode);
			$this->db->where('revise',0);
			// $this->db->group_by('boq_job,newmatcode');
			$query = $this->db->get('boq_item');
			$ress = $query->result();

		}
		return $ress;
	}
	public function sumcosta($tdn)
	{
		$this->db->select('*,SUM(cost) as total,SUM(boq) as totalboq');
		$this->db->where('boq_code',$tdn);
		$this->db->where('costcode !=',"");
		$this->db->group_by('costcode');
		$costmat = $this->db->get('boq_cost')->result();
		return $costmat;
	}
	public function sumcost($tdn)
	{
		$this->db->select('subcostcode,subcostcodename,boq_job,SUM(totalamt) as total,SUM(totalamtboq) as totalboq');
		$this->db->where('boq_bd',$tdn);
		//$this->db->where('subcostcode !=',"");
		$this->db->group_by('subcostcode,boq_job');
		$data = $this->db->get('boq_item')->result();
		return $data;
	}
	public function sumpocost($project_id)
	{
		$this->db->select( 'po_system,sum(poi_amount) as po_amount ,subcostcode,subcostcodename,boq_job,SUM(totalamt) as total,SUM(totalamtboq) as totalboq' );
		$this->db->from( 'po' );
		$this->db->join( 'po_item', 'po_item.poi_ref = po.po_pono' );
		$this->db->join( 'boq_item', 'boq_item.boq_job = po.po_system and boq_item.subcostcode = po_item.poi_costcode');
		$this->db->where( 'po_project', $project_id );
		// $this->db->where( 'poi_costcode !=', "" );
		$this->db->group_by( 'poi_costcode,po_system,subcostcode' );
		$data = $this->db->get()->result();
		return $data;


	}




	public function copy_boq() {
		$this->db->select('*');
		$query = $this->db->get('bdtender_h');
		$ress = $query->result();
		return $ress;
	}
	
	public function getpj($pjid) {
		$this->db->select('*');
		$this->db->where('project_id', $pjid);
		$query = $this->db->get('project');
		$dpj = $query->result();
		return $dpj;
	}
	public function getboqprojectgroup($pjid) {
		$this->db->select('*');
		$this->db->where('boq_bd', $pjid);
		$this->db->where('status', 0);
		$query = $this->db->get('boq_item');
		$ressg = $query->result();
		return $ressg;
	}
	public function getboqprojectgroupby($pjid) {
		$this->db->select('*');
		$this->db->where('boq_bd', $pjid);
		$this->db->where('status', 0);
		
		$query = $this->db->get('boq_item');
		$ressg = $query->result();
		return $ressg;
	}
	public function GetRev($pjid) {
		$this->db->select('*');
		$this->db->where('boq_bd', $pjid);
		
		$query = $this->db->get('boq_item');
		$rev = $query->result();
		return $rev;
	}
	public function getproject_user() {
		$this->db->select('*');
		$this->db->from('bdtender_h');
		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}
	public function proo($pjkey) {
		$this->db->select('*');
		$this->db->from('pr_item');
		$this->db->where('pr_project', $pjkey);
		$this->db->where('pri_boqrow', 0);
		$this->db->join('pr', 'pr.pr_prno = pr_item.pri_ref');
		$proo = $this->db->get();
		$res = $proo->result();
		return $res;
	}
	public function getboqg($pjid, $rev) {
		$this->db->select('*');
		$this->db->join('cost_subgroup', 'cost_subgroup.costcode_d = boq_item.boq_costmat');
		$this->db->join('cost_group', 'cost_group.ctype_code = cost_subgroup.ctype_code');
		$this->db->select_sum('totalamt', 'bgtt');
		$this->db->select_sum('totalamtboq', 'boqtt');
		$this->db->select_sum('boq_budget_amt', 'boqbgamt');
		$this->db->select_sum('boq_amt', 'boqamt');
		$this->db->where('boq_bd', $pjid);
		$this->db->where('boq_rev', $rev);
		$this->db->group_by('cgroup_name');
		$query = $this->db->get('boq_item');
		$boqg = $query->result();
		return $boqg;
	}
	public function getboqsubg($pjid, $rev) {
		$this->db->select('*');
		$this->db->join('cost_subgroup', 'cost_subgroup.costcode_d = boq_item.boq_costmat');
		$this->db->select_sum('totalamt', 'bgtt');
		$this->db->select_sum('totalamtboq', 'boqtt');
		$this->db->select_sum('boq_budget_amt', 'boqbgamt');
		$this->db->select_sum('boq_lab_amt', 'boqlabamt');
		$this->db->where('boq_bd', $pjid);
		$this->db->where('boq_rev', $rev);
		
		$query = $this->db->get('boq_item');
		$boqsubg = $query->result();
		return $boqsubg;
	}
	public function get_unit() {
		$this->db->select(["unit_code", "unit_name"]);
		$this->db->from("unit");
		$query = $this->db->get();
		return $query->result_array();
	} // end method get_unit
	public function add_bom_m($input) {
		$data_header = [];
		$data_header = array(
			"bom_code" => $input['bom_code'],
			"bom_descrip" => $input['bom_descrip'],
		);
		$data_detail = [];
		foreach ($input['mat_code'] as $key => $value) {
			$data_detail[] = array(
				"ref_bom_code" => $input['bom_code'],
				"mat_code" => $input['mat_code'][$key],
				"type" => $input['type'][$key],
				"desc" => $input['desc'][$key],
				"qty" => parse_num($input['qty'][$key]),
				"unit_code" => $input['unit_code'][$key],
				"price" => parse_num($input['price'][$key]),
				"mat_name" => $input['mat_name'][$key],
				"unit_name" => $input['unit_name'][$key],
				"mat_name" => $input['mat_name'][$key],
				"unit_name" => $input['unit_name'][$key],
			);
		}
		if ($this->db->insert('bom_header', $data_header)) {
			if ($this->db->insert_batch('bom_detail', $data_detail)) {
				return true;
			} else {
				$this->db->where('bom_code', $input['bom_code']);
				$this->db->delete('bom_header');
				return false;
			}
		} else {
			return false;
		}
	} // end method add_bom_m
	public function get_bom_m($id_bom) {
		$data = array();
		$this->db->select('*');
		$this->db->from("bom_detail");
		$this->db->where("ref_bom_code", $id_bom);
		$query_detail = $this->db->get();
		$this->db->select('*');
		$this->db->from("bom_header");
		$this->db->where("bom_code", $id_bom);
		$query_header = $this->db->get();
		$detail = $query_detail->result_array();
		$header = $query_header->result_array();
		$data = ['header' => $header, 'detail' => $detail];
		return $data;
	} // end method get_bom_m
	public function update_bom_m($input) {
		$data_header = [];
		// echo '<pre>';
		// print_r($input);die();
		$data_header = array(
			"bom_code" => $input['bom_code'],
			"bom_descrip" => $input['bom_descrip'],
		);
		// $data_detail_update = array();
		// $data_detail_insert = array();
		foreach ($input['mat_code'] as $key => $value) {
			// echo $key+1;
			if ($input['chk'][$key] == 'u') {
				$data_detail_update = array(
					"ref_bom_code" => $input['bom_code'],
					"mat_code" => $input['mat_code'][$key],
					"type" => $input['type'][$key],
					"desc" => $input['desc'][$key],
					"qty" => $input['qty'][$key],
					"unit_code" => $input['unit_code'][$key],
					"price" => $input['price'][$key],
					"mat_name" => $input['mat_name'][$key],
					"unit_name" => $input['unit_name'][$key],
				);

				$this->db->where('id', $input['id'][$key]);
				$this->db->update('bom_detail', $data_detail_update);

			} else if ($input['chk'][$key] == 'i') {
				$data_detail_insert = array(
					"ref_bom_code" => $input['bom_code'],
					"mat_code" => $input['mat_code'][$key],
					"type" => $input['type'][$key],
					"desc" => $input['desc'][$key],
					"qty" => $input['qty'][$key],
					"unit_code" => $input['unit_code'][$key],
					"price" => $input['price'][$key],
					"mat_name" => $input['mat_name'][$key],
					"unit_name" => $input['unit_name'][$key],
				);
				$this->db->insert('bom_detail', $data_detail_insert);
			}
		}

		return true;
	} // end method update_bom_m
	public function bom_header() {
		$data = array();
		$this->db->select('*');
		$this->db->from("bom_header");
		$query_header = $this->db->get();
		$header = $query_header->result_array();
		$data = $header;
		return $data;
	} // end method bom_header
	public function show_bom($code) {
		$data = array();
		$this->db->select('*');
		$this->db->from("bom_detail");
		$this->db->where("ref_bom_code", $code);
		$query_detail = $this->db->get();
		$detail = $query_detail->result_array();
		$data = $detail;
		return $data;
	} // end method show_bom
	public function del_bom($id) {
		$this->db->where('id', $id);
		$res = $this->db->delete('bom_detail');
		return true;
	}
	public function show_all_bom() {
		$data = array();
		$this->db->select('*');
		$this->db->from("bom_header");
		$query_detail = $this->db->get();
		$detail = $query_detail->result_array();
		$data = $detail;
		return $data;
	}
	public function bom_detail($bom) {
		$this->db->select('*');
		$this->db->where('ref_bom_code',$bom);
		$this->db->from("bom_detail");
		$query_detail = $this->db->get()->result();
		return $query_detail;
	}
	public function cost_type() {
		$data = array();
		$this->db->select('*');
		$this->db->from("cost_type");
		$query_cost_typel = $this->db->get();
		$data = $query_cost_typel->result_array();
		return $data;
	}
	public function add_boq($boq,$id) {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		//var_dump($username);
		$data_row = array();
		foreach ($boq['boq_bd'] as $key => $data) {
			if ($boq['chk'][$key] === 'i') {

			
				$data_insert = array(
					"boq_bd" => $id,
					// "boq_control"       =>  '0',
					"boq_job" => $boq['systeme'][$key],
					"boq_mcode" => $boq['newmatcode'][$key],
					"boq_mname" => $boq['newmatnamee'][$key],
					"boq_subcode" => $boq['laborcode'][$key],
					"boq_subname" => $boq['laborname'][$key],
					"controlcost" => '100',
					"chkcontroll"=>"1",
					"boq_costmat" => $boq['codecostcode'][$key],
					"boq_costmatname" => $boq['codecostname'][$key],
					"boq_costsub" => $boq['subcostcode'][$key],
					"boq_costsubname" => $boq['subcostcodename'][$key],
					"boq_boqcode" => $boq['boqcode'][$key],
					"boq_boqmat" => $boq['matboq'][$key],
					"boq_bom" => $boq['bom'][$key],
					"boq_ucode" => $boq['unitcode'][$key],
					"boq_uname" => $boq['unitname'][$key],
					"boq_budget_qty" => parse_num($boq['qty_bg'][$key]),
					"boq_budget_price" => parse_num($boq['matpricebg'][$key]),
					"boq_budget_amt" => parse_num($boq['matamtbg'][$key]),
					"boq_lab_price" => parse_num($boq['labpricebg'][$key]),
					"boq_lab_amt" => parse_num($boq['labamtbg'][$key]),
					"totalamt" => parse_num($boq['totalamt'][$key]),
					"boq_prqty" => '0',
					"boq_qty" => parse_num($boq['qtyboq'][$key]),
					"boq_price" => parse_num($boq['matpriceboq'][$key]),
					"boq_amt" => parse_num($boq['matamtboq'][$key]),
					"boq_lab_boqprice" => parse_num($boq['labpriceboq'][$key]),
					"boq_lab_boqamt" => parse_num($boq['labamtboq'][$key]),
					"totalamtboq" => parse_num($boq['totalamtboq'][$key]),
					"adduser" => $username,
					"adddate" => $boq['date'][$key],
					"code_type1" => $boq['code_type1'][$key],
					"code_type2" => $boq['code_type2'][$key],
					"code_group1" => $boq['code_group1'][$key],
					"code_group2" => $boq['code_group2'][$key],
					"code_subgroup1" => $boq['code_subgroup1'][$key],
					"code_subgroup2" => $boq['code_subgroup2'][$key],
					"forecastbg"=> "0",
					"boq_control"=>"1",
					"boq_controll"=>"1",
				);
				$this->db->insert('boq_item', $data_insert);
				$data = $boq['boq_bd'];
			} else {

				$data_update = array(
					"boq_bd" => $id,
					// "boq_control"       =>  '0',
					"boq_job" => $boq['systeme'][$key],
					"boq_mcode" => $boq['newmatcode'][$key],
					"boq_mname" => $boq['newmatnamee'][$key],
					"boq_subcode" => $boq['laborcode'][$key],
					"boq_subname" => $boq['laborname'][$key],
					"controlcost" => '100',
					"boq_costmat" => $boq['codecostcode'][$key],
					"boq_costmatname" => $boq['codecostname'][$key],
					"boq_costsub" => $boq['subcostcode'][$key],
					"boq_costsubname" => $boq['subcostcodename'][$key],
					"boq_boqcode" => $boq['boqcode'][$key],
					"boq_boqmat" => $boq['matboq'][$key],
					
					"boq_ucode" => $boq['unitcode'][$key],
					"boq_uname" => $boq['unitname'][$key],
					"boq_budget_qty" => parse_num($boq['qty_bg'][$key]),
					"boq_budget_price" => parse_num($boq['matpricebg'][$key]),
					"boq_budget_amt" => parse_num($boq['matamtbg'][$key]),
					"boq_lab_price" => parse_num($boq['labpricebg'][$key]),
					"boq_lab_amt" => parse_num($boq['labamtbg'][$key]),
					"totalamt" => parse_num($boq['totalamt'][$key]),
					"boq_prqty" => '0',
					"boq_qty" => parse_num($boq['qtyboq'][$key]),
					"boq_price" => parse_num($boq['matpriceboq'][$key]),
					"boq_amt" => parse_num($boq['matamtboq'][$key]),
					"boq_lab_boqprice" => parse_num($boq['labpriceboq'][$key]),
					"boq_lab_boqamt" => parse_num($boq['labamtboq'][$key]),
					"totalamtboq" => parse_num($boq['totalamtboq'][$key]),
					"edituser" => $username,
					"editdate" => $boq['date'][$key],
				);
			        // echo "<pre>";
				        // var_dump($boq['idd'][$key]);
				        // var_dump($data_update);
				$this->db->where('boq_id', $boq['idd'][$key]);
				$this->db->update('boq_item', $data_update);
				$data = $boq['boq_bd'];
				}
				}
				return $data;
				}
				
				public function bdtender_h_type($type_in) {
					$session_data = $this->session->userdata('sessed_in');
					$compcode = $session_data['compcode'];
					$this->db->select('*');
					$this->db->where('bd_status !=','close');
					$this->db->where('compcode',$compcode);
					$this->db->from('bdtender_h');
					$query = $this->db->get();
					if ($query) {
					$res = $query->result_array();
					} else {
					$res = null;
					}
					return $res;
				}
				public function getprojecttender($compcode){
					$this->db->select('bdtender_h.bd_tenid as bdid,type_in,bd_pname,bd_status,project.chkconbqq,controlbg,project_id');
					$this->db->from('bdtender_h');
					$this->db->join('project','project.bd_tenid = bdtender_h.bd_tenid','left outer');
					$this->db->where('bd_status !=','close');
					$this->db->where('bdtender_h.compcode',$compcode);
					$this->db->order_by('bdtender_h.bd_tenid','ASC');
					$query = $this->db->get();
					if ($query) {
					$res = $query->result_array();
					} else {
					$res = null;
					}
					return $res;
				}
				public function bdtender_h_type_close($compcode) {
					$this->db->select('bdtender_h.bd_tenid as bdid,type_in,bd_pname,bd_status,project.chkconbqq,controlbg,project_id');
					$this->db->from('bdtender_h');
					$this->db->join('project','project.bd_tenid = bdtender_h.bd_tenid','left outer');
					$this->db->where('bd_status','close');
					$this->db->where('bdtender_h.compcode',$compcode);
					$this->db->order_by('bdtender_h.bd_tenid','ASC');
					$query = $this->db->get();
					if ($query) {
						$res = $query->result_array();
					} else {
						$res = null;
					}
					return $res;
				}

	public function sumbudamt($project_id)
	{
		$this->db->select('SUM(totalamt) as total_budamt');
		$this->db->from('boq_item');
		$this->db->where('boq_bd', $project_id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function sumboqamt($project_id)
	{
		$this->db->select('SUM(totalamtboq) as total_boqamt');
		$this->db->from('boq_item');
		$this->db->where('boq_bd', $project_id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function getjob($bd)
	{
		$this->db->select('*');
		$this->db->from('bdtender_d');
		$this->db->where('bdd_tenid', $bd);
		$query = $this->db->get()->result();
		return $query;
	}

	public function filter_boq($bd,$cc)
	{
		$this->db->select('*');
		$this->db->from('boq_item');
		$this->db->where('boq_bd', $bd);
		$this->db->where('subcostcode',$cc);
		$query = $this->db->get()->result();
		return $query;
	}

	public function filter_boq_all($bd)
	{
		$this->db->select('*');
		$this->db->from('boq_item');
		$this->db->where('boq_bd', $bd);
		$query = $this->db->get()->result();
		return $query;
	}
	public function getcontrolcount($compcode)
	{
		$boq = $this->db->query(' select chkconbqq ,COUNT(chkconbqq) as status from project where chkconbqq = "1" and project_status="normal"')->result();
		foreach ($boq as $key => $value) {
			$data['controlboq'] = $value->chkconbqq;
			$data['statusboq'] = $value->status;
		}
		$bg = $this->db->query(' select controlbg ,COUNT(controlbg) as status from project where controlbg = "2" and project_status="normal"')->result();
		foreach ($bg as $key => $value) {
			$data['controlbg'] = $value->controlbg;
			$data['statusbg'] = $value->status;
		}
		
		return $data;
		
	}
	
	public function getcontrol($compcode)
	{
		$contrlall = $this->db->query("select bd_status, count(bd_status) as status from  bdtender_h WHERE binary bd_status = 'wait' and compcode='$compcode'")->result(); 
		foreach ($contrlall as $key => $value) {
			$data['controlall'] = $value->bd_status;
			$data['statusall'] = $value->status;
		}
		$inprogress = $this->db->query("select bd_status, count(bd_status) as status from  bdtender_h WHERE binary bd_status = 'Wait' and compcode='$compcode'")->result();
		foreach ($inprogress as $key => $value) {
			$data['controlbd'] = $value->bd_status;
			$data['statusbd'] = $value->status;
		}
		return $data;
	}
	public function getprojectcost($compcode)
	{
		$this->db->select('bdtender_h.bd_tenid,bd_pname,project_id,status, SUM(totalamt) as totalbudget, SUM(totalamtboq) as totalboq,project.project_code');
		$this->db->from('boq_item');
		$this->db->join('bdtender_h','bdtender_h.bd_tenid = boq_item.boq_bd','right outer');
		$this->db->join('project','project.bd_tenid = bdtender_h.bd_tenid','left outer');
		$this->db->where('bdtender_h.compcode',$compcode);
		$this->db->where('totalamt is NOT NULL', NULL, FALSE);
		$this->db->where('bd_status !=','close');
		$this->db->where('boq_item.status','Y');
		$this->db->group_by('bdtender_h.bd_tenid');
		$res = $this->db->get()->result();
		return $res;
	
	
	}
	public function copyboq($tdcode){
		$this->db->select('*');
		$this->db->where('boq_bd',$tdcode);
		$res = $this->db->get('boq_item')->result();
		return $res;
	}
	public function copybom($bomcode){
		$this->db->select('*');
		$this->db->where('ref_bom_code',$bomcode);
		$res = $this->db->get('bom_detail')->result();
		return $res;
	}
	public function subjobcost($td,$ref_bd){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$res = $this->db->query("
		select systemcode as po_system,systemname,sum(totalamt) as totalboq from boq_item 
		left outer join system on system.systemcode = boq_item.boq_job
		where boq_bd = '".$td."' and revise = '".$ref_bd."' and boq_item.compcode = '".$compcode."' and system.compcode = '".$compcode."' GROUP BY boq_job order by systemid asc
		")->result();
		return $res;
	}
	public function get_revise_heading($tdcode){
		$res = $this->db->query("select ref_bd from heading_bd where boq_bd = '".$tdcode."' order by `id` desc limit 1")->result_array();
		if ($res) {
			$ref = $res[0]['ref_bd'];
		}else{
			$ref = 0;
		}
		return $ref;
	  }
	  public function get_heading_bdreivse($ref_bd){
		$res = $this->db->query("select ref_bd from heading_bdrevise where ref_heading = '".$ref_bd."' order by `id` desc limit 1")->result_array();
			if ($res) {
				$ref = $res[0]['ref_bd'];
			}else{
				$ref = 0;
			}
		return $ref;
	  }
	  public function getcostsubkendo($bd,$ref_revise,$projectid){
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$res =   $this->db->query("
		SELECT 
		subcostcode as cosrcode_h,
		subcostcode as costcode,
		subcostcode,
		csubgroup_name,
		IFNULL(SUM(DISTINCT boq_item.totalamt), 0 ) AS totalamt,
		 IFNULL(SUM(DISTINCT po_item.poi_netamt),0) AS po_amt 
	FROM
		cost_subgroup
	left outer JOIN boq_item ON boq_item.subcostcode = cost_subgroup.costcode 
	left outer JOIN po_item ON po_item.poi_costcode = cost_subgroup.costcode and boq_item.subcostcode = po_item.poi_costcode and cost_subgroup.costcode = boq_item.subcostcode and po_item.compcode = boq_item.compcode and boq_item.project_code= po_item.poi_project
	WHERE
				boq_item.boq_bd = '$bd' 
				AND cost_subgroup.compcode = '$compcode'
				and boq_item.revise = '$ref_revise'
			GROUP BY
				costcode
				")->result();
		return $res;
				
	  }
}

