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

	public function td_boq($pjid,$m_id) {
		$this->db->select('*');
		$this->db->where('boq_item.boq_bd', $pjid);
		$this->db->where('boq_item.boq_bd', $pjid);
		$this->db->where('boq_item.adduser_id',$m_id);
		$this->db->where('boq_item.status',"N");
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
		$this->db->select('*');
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
	public function bdtender_mm() {
		$this->db->select('*');
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


			// $data_detail_update[] = array(
			// 	"ref_bom_code" => $input['bom_code'],
			// 	"mat_code" => $input['mat_code'][$key],
			// 	"type" => $input['type'][$key],
			// 	"desc" => $input['desc'][$key],
			// 	"qty" => $input['qty'][$key],
			// 	"unit_code" => $input['unit_code'][$key],
			// 	"price" => $input['price'][$key],
			// 	"mat_name" => $input['mat_name'][$key],
			// 	"unit_name" => $input['unit_name'][$key],
			// );
			// if ($input['chk'][$key] === 'u') {
			// 	// u = update
			// 	// i = insert
			// 	// by tae
			// 	// $this->db->where('id', $input['id'][$key]);
			// 	$this->db->update('bom_detail', $data_detail);
			// 	// return true;
			// } else if ($input['chk'][$key] === 'i') {
				
			// 	// $this->db->insert_batch('bom_detail', $data_detail);
			// 	// return true;
			// } else {
			// 	// echo 'else';
			// 	// return false;
			// }
		}
		// echo '<pre>';
		// print_r($data_detail_update);
		// print_r($data_detail_insert);
		// die();

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

			// --------------------------------------------------
		 
   			// if($boq['codecostcode'][$key]!=""){
   			// $cot1 = $boq['codecostcode'][$key];
      //      $this->db->select('*');
      //      $this->db->where('costcode_d',$cot1);
      //      $subgroup = $this->db->get('cost_subgroup')->result();

	     //      foreach ($subgroup as $s1) {

	     //      $subcost1 = $s1->costcode_d;
	     //      $subname1 = $s1->csubgroup_name;
	     //      $costhead1 = $s1->costhead;
	     //      $cgroup_code1 = $s1->ctype_code; 

	     //      $this->db->select('*');
	     //      $this->db->where('costcode_d',$s1->cosrcode_h);
	     //      $subgroup2 = $this->db->get('cost_subgroup')->result();

		    //       foreach ($subgroup2 as $s2) {
		    //       $subcost2 = $s2->costcode_d;
		    //       $subname2 = $s2->csubgroup_name;
		    //       $costhead2 = $s2->costhead;
		    //       $cgroup_code2 = $s2->ctype_code; 

		    //       $this->db->select('*');
		    //       $this->db->where('costcode_d',$s2->cosrcode_h);
		    //       $subgroup3 = $this->db->get('cost_subgroup')->result();

			   //        foreach ($subgroup3 as $s3) {
			   //            $subcost3 = $s3->costcode_d;
			   //            $subname3 = $s3->csubgroup_name;
			   //            $costhead3 = $s3->costhead;
			   //            $cgroup_code3 = $s3->ctype_code; 

			   //        $this->db->select('*');
			   //        $this->db->where('costcode_d',$s3->cosrcode_h);
			   //        $subgroup4 = $this->db->get('cost_subgroup')->result();

				  //         foreach ($subgroup4 as $s4) {
				  //             $subcost4 = $s4->costcode_d;
				  //             $subname4 = $s4->csubgroup_name;
				  //             $costhead4 = $s4->costhead;
				  //             $cgroup_code4 = $s4->ctype_code; 
				  //         }         
			   //        }        
		    //       }
	     //      }
       
          	 
   //        $detail_a = array(
   //        	"sub_boq" => $id, 
   //          "sub_code" =>  $subcost1, 
   //          "sub_name" => $subname1, 
   //          "cost_no" => parse_num($boq['matamtbg'][$key]),
   //          "status" => $costhead1, 
   //          "typecost"=>"4", 
   //          "cost"=>$cgroup_code1, 
   //          "boq"=> parse_num($boq['matamtboq'][$key]),
   //        	);
   //        $this->db->insert('detail_boq', $detail_a);

          
   //        $detail_b = array(
   //         "sub_boq" => $id, 
   //         "sub_code" =>  $subcost2, 
   //         "sub_name" => $subname2, 
   //         "status" => $costhead2, 
   //          "typecost"=>"3", 
   //          "cost"=>$cgroup_code2, 
   //        	);
   //        $this->db->insert('detail_boq', $detail_b);
         
   //         $detail_c = array(
   //         "sub_boq" => $id, 
   //         "sub_code" =>  $subcost3, 
   //         "sub_name" => $subname3, 
   //         "status" => $costhead3, 
   //         "typecost"=>"2", 
   //         "cost"=>$cgroup_code3, 
   //        	);
   //        $this->db->insert('detail_boq', $detail_c);
          
   //        $detail_d = array(
   //         "sub_boq" => $id, 
   //         "sub_code" =>  $subcost4, 
   //         "sub_name" => $subname4, 
   //         "status" => $costhead4, 
   //         "typecost"=>"1", 
   //         "cost"=>$cgroup_code4, 
   //        	);
   //        $this->db->insert('detail_boq', $detail_d);
   //        	}
			// // --------------------------------------------------

   //        // --------------------------------------------------

          
 		// if($boq['subcostcode'][$key]!=""){
 		// 	$cost2 = $boq['subcostcode'][$key];
   //         $this->db->select('*');
   //         $this->db->where('costcode_d',$cost2);
   //         $subgroup = $this->db->get('cost_subgroup')->result();

   //        foreach ($subgroup as $s1) {

   //        $subcost11 = $s1->costcode_d; 
   //        $subname11 = $s1->csubgroup_name; 
   //        $costhead11 = $s1->costhead; 
   //        $cgroup_code11 = $s1->ctype_code; 

   //        $this->db->select('*');
   //        $this->db->where('costcode_d',$s1->cosrcode_h);
   //        $subgroup2 = $this->db->get('cost_subgroup')->result();

	  //         foreach ($subgroup2 as $s2) {
	  //         $subcost22 = $s2->costcode_d;
	  //         $subname22 = $s2->csubgroup_name;
	  //         $costhead22 = $s2->costhead;
	  //         $cgroup_code22 = $s2->ctype_code; 

	  //         $this->db->select('*');
	  //         $this->db->where('costcode_d',$s2->cosrcode_h);
	  //         $subgroup3 = $this->db->get('cost_subgroup')->result();

		 //          foreach ($subgroup3 as $s3) {
		 //              $subcost33 = $s3->costcode_d;
		 //              $subname33 = $s3->csubgroup_name;
		 //              $costhead33 = $s3->costhead;
		 //              $cgroup_code33 = $s3->ctype_code; 

			//           $this->db->select('*');
			//           $this->db->where('costcode_d',$s3->cosrcode_h);
			//           $subgroup4 = $this->db->get('cost_subgroup')->result();

			// 	          foreach ($subgroup4 as $s4) {
			// 	              $subcost44 = $s4->costcode_d;
			// 	              $subname44 = $s4->csubgroup_name;
			// 	              $costhead44 = $s4->costhead;
			// 	              $cgroup_code44 = $s4->ctype_code; 
			// 	          }         
		 //          }        
	  //         }
   //        }

         
          
   //        $detail_a = array(
   //        	"sub_boq" => $id, 
   //          "sub_code" =>  $subcost11, 
   //          "sub_name" => $subname11, 
   //          "cost_no" => parse_num($boq['labamtbg'][$key]),
   //          "status" => $costhead11, 
   //          "typecost"=>"4", 
   //          "cost"=>$cgroup_code11, 
   //          "boq"=>parse_num($boq['labamtboq'][$key]),
   //        	);
   //        $this->db->insert('detail_boq', $detail_a);
         
   //        $detail_b = array(
   //        	"sub_boq" => $id, 
   //          "sub_code" =>  $subcost22, 
   //          "sub_name" => $subname22, 
   //          "status" => $costhead22, 
   //          "typecost"=>"3", 
   //          "cost"=>$cgroup_code22, 
   //        	);
   //        $this->db->insert('detail_boq', $detail_b);
           
   //         $detail_c = array(
   //         "sub_boq" => $id, 
   //          "sub_code" =>  $subcost33, 
   //          "sub_name" => $subname33, 
   //          "status" => $costhead33, 
   //          "typecost"=>"2", 
   //          "cost"=>$cgroup_code33, 
   //        	);
   //        $this->db->insert('detail_boq', $detail_c);
         
   //        $detail_d = array(
   //        	"sub_boq" => $id, 
   //          "sub_code" =>  $subcost44, 
   //          "sub_name" => $subname44, 
   //          "status" => $costhead44, 
   //          "typecost"=>"1", 
   //          "cost"=>$cgroup_code44, 
   //        	);
   //        $this->db->insert('detail_boq', $detail_d);
   //        }

          
          // ========================================================
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
	$this->db->select('*');
	$this->db->from('bdtender_h');
	$this->db->where('type_in', $type_in);
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
}

