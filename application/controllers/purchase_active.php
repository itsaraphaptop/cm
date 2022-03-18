<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'controllers/email.php';
class purchase_active extends email
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('office_m');
		$this->load->model('datastore_m');
		// $this->load->model('count_m');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url', 'file','notify_message','line_oa_api'));
		$this->load->library('image_lib');


	}
	function testaddpo()
	{
		// print_r($this->input->post());
		// $this->input->post();
		// echo "aaa";
		// return true;
		$session_data = $this->session->userdata('sessed_in');
		$compcode = $session_data['compcode'];
		$this->load->model('pr_m');
		$id = '361';
		$pushID = $this->pr_m->getlineid($id,$compcode);
		$a = $pushID[0]['m_email'];
		$b = "test";
		$c = "test";
		$this->_sendmail($a,$b,$c);
	}
	public function parse_num($number)
	{
		$search = [
			",",
		];
		$replace = [
			"",
		];
		$number = str_ireplace($search, $replace, $number);
		return $number;
	}
	public function addnew()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$fullname = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$tenid = $this->uri->segment(3);
		$datestring = "Y";
		$mm = "m";
		$dd = "d";
		$project_id = $this->input->post('projectid');
		$dpid = $this->input->post('depid');
		//// project
		$this->db->select('project_code');
		$this->db->where('project_id', $project_id);
		$quu = $this->db->get('project');
		$ress = $quu->result();
		foreach ($ress as $pe) {
			$project_code = $pe->project_code;
		}
		//
		// department
		$this->db->select('department_code');
		$this->db->where('department_id', $dpid);
		$qud = $this->db->get('department');
		$resd = $qud->result();
		foreach ($resd as $dp) {
			$department_code = $dp->department_code;
		}
		$add = $this->input->post();
		//
		// echo $project_id;
		// 	die();
		if ($project_id == "" && $dpid != "") {
			//   depart
			// $this->db->select('*');
			// $this->db->where('po_department', $dpid);
			// $qu = $this->db->get('po');
			// $res = $qu->num_rows(); //เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
			// if ($res == 0) {
			// 	$apvcode = date($datestring) . "-" . $department_code . "-" . "000" . "1";
			// 	$apv_item = "1";
			// 	$x1 = "1";
			// } else {
			// 	$this->db->select('*');
			// 	$this->db->where('po_department', $dpid);
			// 	$this->db->order_by('po_poid', 'desc');
			// 	$this->db->limit('1');
			// 	$q = $this->db->get('po');
			// 	$run = $q->result();
			// 	foreach ($run as $valx) {
			// 		$x1 = $valx->po_poid + 1;
			// 	}
			// 	if ($x1 <= 9) {
			// 		$apvcode = date($datestring) . "-" . $department_code . "-" . "000" . $x1;
			// 		$apv_item = $x1;
			// 	} elseif ($x1 <= 99) {
			// 		$apvcode = date($datestring) . "-" . $department_code . "-" . "00" . $x1;
			// 		$apv_item = $x1;
			// 	} elseif ($x1 <= 999) {
			// 		$apvcode = date($datestring) . "-" . $department_code . "-" . "0" . $x1;
			// 		$apv_item = $x1;
			// 	} elseif ($x1 <= 9999) {
			// 		$apvcode = date($datestring) . "-" . $department_code . "-" . "0" . $x1;
			// 		$apv_item = $x1;
			// 	}
			// }
			//  /depart
			
			$module = 'PO';
			$module_type = '';
			$project = $department_code;
			$input = date('m', strtotime($add['pcdate']));
			
	  
			$datestring = "Y";
			$m = "m";
			$d = "d";
			
			$count_row = $this->datastore_m->npo_coubt_row($compcode,$dpid);//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
			// echo $count_row;
			// die();
			if ($count_row==0) {
				$count_row = 1;
				$pono = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
				// echo $pono;
				// die();
			}else{
				$run = $this->datastore_m->ngetpo_num($input,$compcode,$dpid);
				
				if (isset($run[0]['po_podate'])==$input) {
					if($run[0]['po_podate']<=10){
						$month = "0".$run[0]['po_podate'];
					}else{
						$month = $run[0]['po_podate'];
					}
					$count = $this->datastore_m->cgetpo_num($input,$compcode,$dpid);
					$x1 = $count+1;
					$pono = $this->datastore_m->RunningNumber($module_type,$x1,$month,$project,$module);
					// echo $prno;
					// die();
				  }else{
					$x1 = 1;
					$dd = $input;
					$pono = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
				  }
				  
			  }
			//   echo $prno;
			//   die();
		} else {
			//  project
			// $this->db->select('*');
			// $this->db->where('po_project', $project_id);
			// $qu = $this->db->get('po');
			// $res = $qu->num_rows(); //เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
			// if ($res == 0) {
			// 	// $apvcode = date($datestring)."-".$project_code."-"."000"."1";
			// 	$apvcode = $project_code . "-" . "000" . "1";
			// 	$apv_item = "1";
			// 	$x1 = "1";
			// } else {
			// 	$this->db->select('*');
			// 	$this->db->where('po_project', $project_id);
			// 	$this->db->order_by('po_poid', 'desc');
			// 	$this->db->limit('1');
			// 	$q = $this->db->get('po');
			// 	$run = $q->result();
			// 	foreach ($run as $valx) {
			// 		$x1 = $valx->po_poid + 1;
			// 	}
			// 	if ($x1 <= 9) {
			// 		$apvcode = $project_code . "-" . "000" . $x1;
			// 		// $apvcode = date($datestring)."-".$project_code."-"."000".$x1;
			// 		$apv_item = $x1;
			// 	} elseif ($x1 <= 99) {
			// 		$apvcode = $project_code . "-" . "00" . $x1;
			// 		// $apvcode = date($datestring)."-".$project_code."-"."00".$x1;
			// 		$apv_item = $x1;
			// 	} elseif ($x1 <= 999) {
			// 		$apvcode = $project_code . "-" . "0" . $x1;
			// 		// $apvcode = date($datestring)."-".$project_code."-"."0".$x1;
			// 		$apv_item = $x1;
			// 	} elseif ($x1 <= 9999) {
			// 		$apvcode = $project_code . "-" . "0" . $x1;
			// 		// $apvcode = date($datestring)."-".$project_code."-"."0".$x1;
			// 		$apv_item = $x1;
			// 	}
			// }
			//  /project
			

			$module = 'PO';
			$module_type = '';
			$project = $project_code;
			$input = date('m', strtotime($add['pcdate']));
			
	  
			$datestring = "Y";
			$m = "m";
			$d = "d";
			
			$count_row = $this->datastore_m->npo_coubt_row($compcode,$project_id);//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
			// echo $count_row;
			// die();
			if ($count_row==0) {
				$count_row = 1;
				$pono = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
				// echo $pono;
				// die();
			}else{
				$run = $this->datastore_m->ngetpo_num($input,$compcode,$project_id);
				
				if (isset($run[0]['po_podate'])==$input) {
					if($run[0]['po_podate']<=10){
						$month = "0".$run[0]['po_podate'];
					}else{
						$month = $run[0]['po_podate'];
					}
					$count = $this->datastore_m->cgetpo_num($input,$compcode,$project_id);
					$x1 = $count+1;
					$pono = $this->datastore_m->RunningNumber($module_type,$x1,$month,$project,$module);
					// echo $prno;
					// die();
				  }else{
					$x1 = 1;
					$dd = $input;
					$pono = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
				  }
				  
			  }
			//   echo $pono;
			//   die();
		}
		


		$data = array(
			'po_pono' => $pono,
			'po_poid' => $count_row,
			'po_project' => $add['projectid'],
			'po_podate' => $add['pcdate'],
			'po_prname' => $add['memname'],
			'po_memid' => $add['memid'],
			'po_prno' => $add['prno'],
			'po_department' => $add['depid'],
			'po_system' => $add['system'],
			'PO_vender' => $add['vender'],
			'po_venderid' => $add['venderid'],
			'po_trem' => $add['team'],
			'po_contact' => $add['contact'],
			'po_contactno' => $add['contactno'],
			'po_quono' => $add['quono'],
			'po_deliverydate' => $add['deliverydate'],
			'po_place' => $add['place'],
			'po_remark' => $add['remark'],
			'po_vatper' => $add['vatper'],
			'discounts1' => $add['s1'],
			'discounts2' => $add['s2'],
			'useradd' => $username,
			'usercreate' => date('Y-m-d H:i:s', now()),
			'compcode' => $compcode,
			'po_approve' => $add['c_po'],
			'downper' => $add['downper'],
			'down' => $add['down'],
			'sumdown' => '0',
			'retentionper' => $add['retentionper'],
			'retention' => $add['retention'],
			'sumretention' => '0',
			'status_down' => "wait",
			'status_retention' => "wait",
			'wo_ref' => $add['wono'],
			'poi_deduct_status' => 'no',
			'contact_store' => $add['contractstorename'],
			'teamother' => $add['teamother']
		);
		$this->db->insert('po', $data);
		for ($i = 0; $i < count($add['chki']); $i++) {
			if ($add['chki'][$i] == "Y") {
				$data_d = array(
					'poi_ref' => $pono,
					'poi_qtyic' => $this->parse_num($add['cqtyic'][$i]),
					'poi_totqtyic' => $this->parse_num($add['pqtyic'][$i]),
					'poi_matcode' => $this->parse_num($add['matcodei'][$i]),
					'poi_matname' => $add['matnamei'][$i],
					'poi_costcode' => $add['costcodei'][$i],
					'poi_costname' => $add['costnamei'][$i],
					'poi_qty' => $this->parse_num($add['qtyi'][$i]),
					'poi_unit' => $this->parse_num($add['uniti'][$i]),
					'poi_unitic' => $this->parse_num($add['punitic'][$i]),
					'poi_priceunit' => $this->parse_num($add['priceuniti'][$i]),
					'poi_amount' => $this->parse_num($add['amounti'][$i]),
					'poi_discountper1' => $this->parse_num($add['disci1'][$i]),
					'poi_discountper2' => $this->parse_num($add['disci2'][$i]),
					'poi_discountper3' => $this->parse_num($add['disci3'][$i]),
					'poi_discountper4' => $add['disci4'][$i],
					'poi_disce' => $this->parse_num($add['disamti'][$i]),
					'poi_disamt' => $this->parse_num($add['too_di'][$i]),
					'poi_vat' => $this->parse_num($add['to_vat'][$i]),
					'poi_vatper' => $this->parse_num($add['vatper']),
					'poi_netamt' => $this->parse_num($add['netamti'][$i]),
					'poi_remark' => $this->parse_num($add['reamrki'][$i]),
					'pr_no' => $this->parse_num($add['refprno'][$i]),
					'po_assetid' => $this->parse_num($add['accode'][$i]),
					'po_assetname' => $this->parse_num($add['acname'][$i]),
					'po_asset' => $this->parse_num($add['statusass'][$i]),
					'pri_id' => $this->parse_num($add['priidi'][$i]),
					'poi_chk' => 'Y',
					'poi_deduct_status' => 'no',
					// 'po_boq' => $this->parse_num($add['chkhidden'][$i]),
					'compcode' => $compcode,
					'cost_type' => $this->parse_num($add['type'][$i]),
					'remark_mat' => $this->parse_num($add['remark_mat'][$i]),
					'type_cost' => $add['type_cost'][$i],
					'wo_ref' => $add['pri_woref'][$i],
					'poi_project' => $add['projectid'],
				);
				$this->db->insert('po_item', $data_d);
				$idpo_item = $this->db->insert_id();



				$this->office_m->pucost($add['costcodei'][$i], $add['costnamei'][$i], $add['too_di'][$i], $add['type_cost'][$i], $idpo_item);
			}
	// Attachment file

			$file_po = './select_file_po';
			if (!file_exists($file_po)) {
				mkdir($file_po, 0777, true);
			}
			$config['upload_path'] = './select_file_po/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|rar|docx|xls|pdf|zip|xlsx';
			$config['max_size'] = '204800';
			$config['max_width'] = '9999';
			$config['max_height'] = '9999';
			$rand = rand(1111, 9999);
			$date = date("Y-m-d ");
			$config['file_name'] = $date . $rand;
			$this->load->library('upload', $config);

			$error = array();
			$success = array();
			foreach ($_FILES as $field_name => $file) {
				if (!$this->upload->do_upload($field_name)) {
					$error['upload'][] = $this->upload->display_errors();
				} else {
					$upload_data = $this->upload->data();
					if (!$this->image_lib->resize()) {
						$error['resize'][] = $this->image_lib->display_errors();
						echo "error";
					} else {
						$data['success'] = $upload_data;
						echo "OK Good";
						var_dump($_FILES);
						$select_file_po = array(
							'name_file' => $upload_data['file_name'],
							'po_ref' => $pono,
							'date' => date('y-m-d'),
							'time' => date('H:i:s'),
							'user' => $compcode,
						);
						$this->db->insert('select_file_po', $select_file_po);
					}
				}
			}
// end Attachment File

			$this->db->select('*');
			$this->db->where('pri_id', $add['priidi'][$i]);
			$this->db->where('pri_project',$add['projectid']);
			$item = $this->db->get('pr_item')->result();
			$pri_qty = 0;
			$pri_sumqty = 0;
			// $pri_qty = "";
			// $pri_sumqty = "";
			$pri_ref = "";
			foreach ($item as $keyitem) {
				$pri_qty = $keyitem->pri_qty;
				$pri_sumqty = $keyitem->pri_sumqty;
				$pri_ref = $keyitem->pri_ref;
			}

			if ($add['priidi'][$i] != "") {
				$data_e = array(
					'pri_sumqty' => $pri_sumqty + $add['qtyi'][$i],
				);
				$this->db->where('pri_id', $add['priidi'][$i]);
				$this->db->update('pr_item', $data_e);
			}
			if ($pri_qty == $pri_sumqty + $add['qtyi'][$i]) {
				$data_c = array(
					'pri_status' => "open",
				);
				$this->db->where('pri_id', $add['priidi'][$i]);
				$this->db->update('pr_item', $data_c);
			}
			$this->db->select('*');
			$this->db->where('pri_ref', $pri_ref);
			$this->db->where('pri_project',$add['projectid']);
			$this->db->where('pri_status =', 'no');
			$chkitem = $this->db->get('pr_item');
			$num = $chkitem->num_rows();

			if ($num == "0") {
				$data_f = array(
					'po_open' => "open",
				);
				$this->db->where('pr_prno', $pri_ref);
				$this->db->update('pr', $data_f);

			}
		}

		if ($add['a_po'] == "1") {
			if (isset($add['approve_sequence'])) {
				for ($i = 0; $i < count($add['approve_sequence']); $i++) {
					if ($add['c_po'] == "wait") {
						$aprrove = array(
							'app_pr' => $pono,
							'app_project' => $add['putprojectcode'],
							'app_sequence' => $add['approve_sequence'][$i],
							'app_midid' => $add['approve_mid'][$i],
							'app_midname' => strtolower($add['approve_mname'][$i]),
							'lock' => $add['approve_lock'][$i],
							'status' => "no",
							'type' => "P",
							'cost' => $add['approve_cost'][$i],
							'creatuser' => $username,
							'creatudate' => date('y-m-d'),
							'compcode' => $compcode,
						);
						$this->db->insert('approve_po', $aprrove);
						$aaaaaa = $add['approve_mid'][0];

					}
				}
			}
		} else if ($add['a_po'] == "2") {
			$this->db->select('*');
			$this->db->from('approve');
			$this->db->where('approve_project', $add['putprojectcode']);
			$this->db->where('type', "PO");
			$this->db->where('approve_cost >=', $add['summarytot']);
			$this->db->order_by("approve_sequence", "asc");
			$q = $this->db->get()->result();
			foreach ($q as $qq) {
				$aprrove = array(
					'app_pr' => $pono,
					'app_project' => $qq->approve_project,
					'app_sequence' => $qq->approve_sequence,
					'app_midid' => $qq->approve_mid,
					'app_midname' => strtolower($qq->approve_mname),
					'lock' => $qq->approve_lock,
					'status' => "no",
					'type' => "C",
					'cost' => $qq->approve_cost,
					'creatuser' => $username,
					'creatudate' => date('y-m-d'),
					'compcode' => $compcode,
				);
				$this->db->insert('approve_po', $aprrove);
				$aaaaaa = $qq->approve_mid;
			}
		}
		// redirect('purchase/editpo/'.$apvcode);
		
		$pushID = $this->office_m->getlineid($aaaaaa, $compcode);
	// echo $pushID[0]['lineid'];
	// die();

		// notify_message($line_message,$pushID[0]['lineid']);
		$line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
		$line = $line_api_service[0]['line_api'];
          $data = array( 
            "id" => $pushID[0]['lineid'],
            "type" =>"message",
            "text" => "Doc No. : ".$pono,
            "price" => $fullname,
            "pay" =>"3",
            "unit" =>"4",
            "doc" =>"5",
            "compcode_line" => "6",
            "user" =>"7",
            "link" => $line,
            "base_url" => base_url('purchase/purchase_approve/' . $add['projectid'] . '/p' . '/' . $add['putprojectcode'])
	
    
        );
		// print_r($data);
		// die();
          line_oa_api($data,$line);

		redirect('purchase/editpo/' . $pono.'/normal'."/".$add['projectid']);
		
		// echo $apvcode;
		// return true;
		//  $add = $this->input->post();
		//  for($i=0; $i < count($add['qtyi']); $i++){
			// 	 echo $add['refprno'][$i];
		//  }
	}
	public function editpo()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$pono = $this->input->post('pono');
		$add = $this->input->post();
		//line
		$res = $this->office_m->getuserapprovepo($pono);
          $pushID = $this->office_m->getlineid($res[0]['app_midid'],$compcode);
          // echo $pushID[0]['lineid'];
          // die();
          $remark = $this->input->post('remarkedit');
          $message = "แก้ไขเอกสาร PO : ".$pono." \n";
          $message .= "หมายเหตุ : ".$remark."\n";

          $res = notify_message($message,$pushID[0]['lineid']);
		//end line
		$data = array(
			'po_project' => $add['projectid'],
			'po_podate' => $add['pcdate'],
			'po_prname' => $add['memname'],
			'po_memid' => $add['memid'],
			'po_prno' => $add['prno'],
			'po_project' => $add['projectid'],
			'po_department' => $add['depid'],
			'po_system' => $add['system'],
			'PO_vender' => $add['vender'],
			'po_venderid' => $add['venderid'],
			'po_trem' => $add['team'],
			'po_contact' => $add['contact'],
			'po_contactno' => $add['contactno'],
			'po_quono' => $add['quono'],
			'po_deliverydate' => $add['deliverydate'],
			'po_place' => $add['place'],
			'po_remark' => $add['remark'],
			'po_vatper' => $add['vatper'],
			'useredit' => $username,
			'editdate' => date('Y-m-d H:i:s', now()),
			'compcode' => $compcode,
			'downper' => $add['downper'],
			'down' => $add['down'],
			'retentionper' => $add['retentionper'],
			'retention' => $add['retention'],
			'contact_store' => $add['contractstorename'],
			'teamother' => $add['teamother'],
			'po_approve' => 'wait'
			// 'type_cost' => $add['type_cost'],
		);
		$this->db->where('po_pono', $pono);
		if($this->db->update('po', $data))
		{
		  $data_approve = array(
			'status' => "no"
		  );
		  $this->db->where('app_pr',$pono);
		  $this->db->update('approve_po',$data_approve);
		  echo $id;
		//   return true;
		}
		else
		{
		//   return false;
		}

		$datestring = "Y";
		$m = "m";
		$d = "d";
		$file_po = './select_file_po';
		if (!file_exists($myfile)) {
			mkdir($myfile, 0777, true);
		}
		if (isset($_FILES['userfile']['name'])) {
			$config['upload_path'] = './select_file_po/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|rar|docx|xls|pdf|zip|xlsx';
			$config['max_size'] = '204800';
			$config['max_width'] = '9999';
			$config['max_height'] = '9999';
			$rand = rand(1111, 9999);
			$date = date("Y-m-d ");
			$config['file_name'] = $date . $rand;
			$error = array();
			$success = array();
			$this->load->library('upload', $config);
			foreach ($_FILES as $field_name => $file) {
				if (!$this->upload->do_upload($field_name)) {
					$error['upload'][] = $this->upload->display_errors();
				} else {
					$upload_data = $this->upload->data();
					if (!$this->image_lib->resize()) {
						$error['resize'][] = $this->image_lib->display_errors();
					} else {
						$data['success'] = $upload_data;
						$select_file_po = array(
							'name_file' => $upload_data['file_name'],
							'po_ref' => $pono,
							'date' => date('y-m-d'),
							'time' => date('H:i:s'),
							'user' => $compcode,
						);
						$query = $this->db->insert('select_file_po', $select_file_po);
					}
				}
			}
			echo $pono;
			return true;

		} else {
			echo "ไม่มีไฟล์";
			return true;
		}
		
		// redirect('purchase/editpo/' . $pono);
	}
	public function flag_pr()
	{
		$prid = $this->input->post('pri_id');
		$prno = $this->input->post('pr_prno');
		$datt = array(
			'pri_status' => "open",
		);
		$this->db->where('pri_id', $prid);
		$this->db->where('pri_ref', $prno);
		if ($this->db->update('pr_item', $datt)) {
			return true;
		}
	}
	public function delflag_pr()
	{
		$prid = $this->input->post('pri_id');
		$prno = $this->input->post('pr_prno');
		$datt = array(
			'pri_status' => null
		);
		$this->db->where('pri_id', $prid);
		$this->db->where('pri_ref', $prno);
		if ($this->db->update('pr_item', $datt)) {
			return true;
		}
	}
	public function del_poi()
	{

		// var_dump($this->input->post());
		// die();
		try {
			$id = $this->input->post('id');
			$code = $this->input->post('code');
			$item = $this->input->post('item');
			$boq_id = $this->input->post("boq_id");
			//echo "$boq_id";
			// ค่าเงินของเดิมที่ต้องเอาไปคืนในตาราง boq
			$pdisamt = $this->input->post("pdisamt");

			if ($id == "" || $id == "0") {
				$this->db->delete('po_item', array('poi_id' => $item));

				// return boq 

				$boq_index = $boq_id;
				if ($boq_id = !"") {
					
					//echo "update ไม่ดึง pr";
					$pdisamt = $pdisamt * 1;
					$sql = "update boq_item SET boq_item.boq_balance = boq_item.boq_balance - {$pdisamt} WHERE boq_item.boq_id = {$boq_index}";
					$bool_return = $this->db->query($sql);

					if ($bool_return) {
						//var_dump($sql);
						// update สำเสร็จ

					}
				}

			} else {

				$this->db->delete('po_item', array('poi_ref' => $code, 'pri_id' => $id, 'poi_id' => $item));
				$data = array(
					'pri_status' => "no",
					'pri_sumqty' => '0',
				);

				$this->db->where('pri_id', $id);
				$this->db->update('pr_item', $data);
				$dpo = array(
					'po_open' => "no",
				);
				$this->db->where('pr_prno', $this->input->post('prno'));
				$this->db->update('pr', $dpo);
				$boq_index = $boq_id;
				// return boq 
				if ($boq_id = !"") {
					//echo "update ดึง pr";
					$pdisamt = $pdisamt * 1;
					$sql = "update boq_item SET boq_item.boq_balance = boq_item.boq_balance - {$pdisamt} WHERE boq_item.boq_id = {$boq_index}";
					$bool_return = $this->db->query($sql);
					if ($bool_return) {
						//var_dump($sql);
						// update สำเสร็จ

					}
				}

			}
			echo "PO No." . $code;
		} catch (Exception $e) {
			echo $e;
		}
	}
	public function deletepo()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];

		$remark = $this->input->post("remark");

		$id = $this->uri->segment(3);
		$prno = $this->uri->segment(4);
		$aa = array(
			'po_open' => "no",
		);
		$this->db->where('pr_prno', $prno);
		$this->db->update('pr', $aa);
		$data = array(
			'po_status' => "del",
			'userdelete' => $username,
			'deletedate' => date('Y-m-d H:i:s', now()),
		);



		$this->db->where('po_pono', $id);
		$q = $this->db->update('po', $data);

		$data_remark = array(
			"remark" => $remark,
			"code" => $id,
			"date" => date('Y-m-d H:i:s'),
			"user" => $username,
			"type" => "PO"

		);

		var_dump($data_remark);
		$this->db->insert("remark_table", $data_remark);

		if ($q) {
			// redirect('purchase/po_archive');
			echo $id;
			return true;
		}
	}
	public function approve_purchase()
	{
		$id = $this->uri->segment(3);
		$id1 = $this->uri->segment(4);
		$prno = $this->uri->segment(5);
		$flag = $this->uri->segment(6);
		$data = array(
			'po_approve' => "approve",
		);
		$this->db->where('po_id', $id);
		$q = $this->db->update('po', $data);
		if ($q) {
			$daa = array('po_open' => "open");
			$this->db->where('pr_prno', $prno);
			$this->db->update('pr', $daa);
			redirect('purchase/purchase_approve/' . $id1 . '/' . $flag);
		}
	}
	public function cancel_purchase()
	{
		$id = $this->uri->segment(3);
		$id1 = $this->uri->segment(4);
		$id2 = $this->uri->segment(5);
		$id3 = $this->uri->segment(6);
		$data = array(
			'po_approve' => "wait",
		);
		$this->db->where('po_id', $id);
		$q = $this->db->update('po', $data);
		$datad = array(
			'status' => "no",
		);
		$this->db->where('app_pr', $id3);
		$this->db->update('approve_po', $datad);
		if ($q) {
			redirect('purchase/purchase_approve/' . $id1 . "/p" . "/" . $id2);
		}
	}
	public function add_comprice()
	{
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$add = $this->input->post();
		$datestring = "Y";
		$mm = "m";
		$dd = "d";

		$this->db->select('*');
		$qu = $this->db->get('pr_compare_header');
		$res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

		if ($res == 0) {
			$cnvcode = "CP" . date($datestring) . date($mm) . "000" . "1";
			$pr_id = "1";
		} else {
			$this->db->select('*');
			$this->db->order_by('pr_id', 'desc');
			$this->db->limit('1');
			$q = $this->db->get('pr_compare_header');
			$run = $q->result();
			foreach ($run as $valx) {
				$x1 = $valx->pr_id + 1;
			}

			if ($x1 <= 9) {
				$cnvcode = "CP" . date($datestring) . date($mm) . "000" . $x1;
				$pr_id = $x1;
			} elseif ($x1 <= 99) {
				$cnvcode = "CP" . date($datestring) . date($mm) . "00" . $x1;
				$pr_id = $x1;
			} elseif ($x1 <= 999) {
				$cnvcode = "CP" . date($datestring) . date($mm) . "0" . $x1;
				$pr_id = $x1;
			}
		}
		for ($i = 0; $i < count($add['vendercode']); $i++) {
			$vender = array(
				'pri_code' => $cnvcode,
				'pr_venderid' => $add['vendercode'][$i],
				'pr_vendername' => $add['venname'][$i],
				'pr_project' => $add['projectid'],
				'pr_prno' => $add['prno'],
				'useradd' => $username,
				'compcode' => $compcode,
				'createdate' => date('Y-m-d H:i:s', now()),
			);
			$this->db->insert('pr_vender', $vender);
		}

		$header = array(
			'pr_code' => $cnvcode,
			'pr_project' => $add['projectid'],
			'pr_prno' => $add['prno'],
			'pr_place' => $add['place'],
			'pr_ownername' => $add['owner'],
			'pr_ownerid' => $add['venderid'],
			'pr_prdate' => $add['docdate'],
			'pr_date' => date('Y-m-d', now()),
			'useradd' => $username,
			'compcode' => $compcode,
			'createdate' => date('Y-m-d H:i:s', now()),
		);
		$this->db->insert('pr_compare_header', $header);

		for ($l=0; $l < count($add['vendercode']); $l++) { 
		for ($d = 0; $d < count($add['matcode']); $d++) {
				$detal = array(
					'pri_ref' => $cnvcode,
					'pri_matcode' => $add['matcode'][$d],
					'pri_matname' => $add['pri_matname'][$d],
					'pri_project' => $add['projectid'],
					'pri_prno' => $add['prno'],
					'pri_qty' => $add['pri_qty'][$d],
					'pri_unit' => $add['prii_unit'][$d],
					'pri_remark' => $add['remark'][$d],
					'pri_priceunit' => $add['priceunit'][$d],
					'pri_vender' => $add['vendercode'][$l],
					'useradd' => $username,
					'compcode' => $compcode,
					'createdate' => date('Y-m-d H:i:s', now()),
				);
				$this->db->insert('pr_compare_detail', $detal);
			}
		}

		for ($l=0; $l < count($add['vendercode']); $l++) { 
			$datavender = array(
				'cpcode' => $cnvcode, 
				'pr_ref' => $add['prno'], 
				'cpdate' => $add['docdate'], 
				'cpvenderid' => $add['vendercode'][$l], 
				'cpvenderteam' => $add['vencr'][$l], 
				'cpvendertel' => $add['ventel'][$l], 
				'cpvenderfax' => $add['venfax'][$l],
				'compcode' => $compcode, 
				'createuser' => $username, 
				'createdate' => date('Y-m-d H:i:s', now()), 
			);
			$this->db->insert('pr_compare_vender',$datavender);
		}

		$pr = array(
			'compare' => "Y",
		);
		$this->db->where('pr_prno', $add['prno']);
		$this->db->update('pr', $pr);

		echo $add['projectid'];
	}

	public function po_del()
	{

		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$pono = $this->input->post('pono');
		$prno = $this->input->post('prno');
		$projectid = $this->input->post('projectid');
		$projectcode = $this->input->post('projectcode');
		$updateapp = array(
			'status' => 'delete',
			'del_user' => $username,
			'app_date' => date('Y-m-d'),
			'del_time' => date('H:i:s'),
		);
		$this->db->where('app_pr', $pono);
		$this->db->where('app_project',$projectcode);
		$this->db->update('approve_po',$updateapp);
	
		$update = array(
			'po_approve' => 'delete',
			'userdelete' => $username,
			'deletedate' => date('Y-m-d H:i:s', now()),
		);

		$this->db->where('po_pono', $pono);
		$this->db->where('po_project',$projectid);
		$query = $this->db->update('po', $update);
		if ($query) {
			$updpr = array(
				'po_open' => 'no',
				'dis_remark' => 'PO Delete '.date('Y-m-d H:i:s', now()),
			);
			$this->db->where('pr_prno',$prno);
			$this->db->where('pr_project',$projectid);
			$this->db->update('pr',$updpr);
			$updpritem = array(
				'pri_status' => 'no', 
				'pri_pono' => $pono,
			);
			$this->db->where('pri_ref',$prno);
			$this->db->where('pri_project',$projectid);
			$this->db->update('pr_item',$updpritem);
	
			$return['status'] = true;

		} else {

			$return['status'] = false;

		}

		echo json_encode($return);



	}
	public function ajax_upload_edit_po()
	{



	}
	public function addrowcompare(){
		$session_data = $this->session->userdata('sessed_in');
		$compcode =  $session_data['compcode'];
		$add = $this->input->post();
		print_r($add);
		for ($i=0; $i < count($add['discvender']); $i++) { 
			$dvender = array(
				'cpvenderteam' =>  $this->parse_num($add['crvender'][$i]), 
				'cpdate' =>  $add['datevender'][$i], 
				'rq_disc' => $this->parse_num($add['discvender'][$i]), 
				'quovender' => trim($add['quovender'][$i]), 
			);
			$this->db->where('cpvenderid',$add['vendid'][$i]);
			$this->db->where('compcode',$compcode);
			$this->db->update('pr_compare_vender',$dvender);
		}
		// return true;
		for ($i=0; $i < count($add['pri_qty']); $i++) { 
			$data = array(
				'pri_priceunit' => $this->parse_num($add['priceunit'][$i]), 
				'pri_disc' => $this->parse_num($add['disc'][$i]), 
				'pri_cr' => $this->parse_num($add['cr'][$i]), 
				'pri_amount' => $this->parse_num($add['amount'][$i]), 
				'pri_remark' => trim($add['remark'][$i]), 
			);
			$this->db->where('pri_id',$add['pri_id'][$i]);
			$this->db->where('compcode',$compcode);
			$this->db->update('pr_compare_detail',$data);
		}
		$prarray = array(
			'compare' => "C" , 
		);
		$this->db->where('pr_code',$add['no']);
		$this->db->where('compcode',$compcode);
		$this->db->update('pr_compare_header',$prarray);
		return true;
	}
}