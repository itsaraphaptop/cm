
<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class contract_active extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->Model('office_m');
		$this->load->model('datastore_m');
		$this->load->model('count_m');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url','file','line_alert','notify_message','line_oa_api'));
	}

	public function newloi() {
		$session_data = $this->session->userdata('sessed_in');
		$data['res'] = $this->datastore_m->getvender();
		//$data['getpr'] = $this->office_m->getprapprove();
		$data['getproj'] = $this->datastore_m->getproject();
		$data['getdep'] = $this->datastore_m->department();
		$this->load->view('office/contract/new_contract_v', $data);

	}
	public function addloi() {

		 $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          $aps = "WO";
          
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

            $this->db->select('*');
			$qu = $this->db->get('lo');
			$res = $qu->num_rows(); //เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $lono = "WO".date($datestring).date($mm)."000"."1";
                $aps_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('lo_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('lo');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->lo_id + 1;
               }

               if ($x1<=9) {
                  $lono = "WO".date($datestring).date($mm)."000".$x1;
                  $aps_item = $x1;
               }
               elseif ($x1<=99) {
                 $lono = "WO".date($datestring).date($mm)."00".$x1;
                 $aps_item = $x1;
               }
               elseif ($x1<=999) {
                 $lono = "WO".date($datestring).date($mm)."0".$x1;
                 $aps_item = $x1;
               }
             }


		
		$add = $this->input->post();
		$flag = $this->uri->segment(3);

		$data = array(
			'lo_lono' => $lono,
			'prno' => $add['pr_name'],
			'lodate' => $add['lodate'],
			'refquono' => $add['refquono'],
			'quodate' => $add['quodate'],
			'projectcode' => $add['projectid'],
			'projownername' => $add['projectname'],
			'contact' => $add['venid'],
			'contactor' => $add['contactor'],
			'subcontact' => $add['venderid'],
			'addresssub' => $add['addresssub'],
			'cosubcontact' => $add['cosubcontact'],
			'tel_subcontact' => $add['telsubcontact'],
			'fax_subcontact' => $add['faxsubcontact'],
			'contacttype' => $add['contacttype'],
			'system' => $add['system'],
			'attach' => $add['attach'],
			'contactdesc' => nl2br($add['contactdesc']),
			'contactamount' => $add['contactamount'],
			'period_amt' => $add['contactamount'],
			'tax' => $add['tax'],
			'advpercent' => $add['advper'],
			'adv_count' => $add['adv_count'],
			'advance' => $add['advance'],
			'advancee' => $add['advancee'],
			'retentionmethod' => $add['retentionmethod'],
			'other_advance' => $add['other_advance'],
			'other_advance1' => $add['other_advance1'],
			'start_contact' => $add['startcontact'],
			'stop_contact' => $add['stopcontact'],
			'per_fines' => $add['per_fines'],
			'amount' => $add['amount'],
			'perday_other' => $add['perday_other'],
			'retention' => $add['retention'],
			'after_sale' => $add['after_sale'],
			'manual' => $add['manual'],
			'other' => $add['other'],
			'other_2' => $add['other2'],
			'other_3' => $add['other3'],
			'other4' => $add['other4'],
			'other5' => $add['other5'],
			'other6' => $add['other6'],
			'other7' => $add['other7'],
			'other8' => $add['other8'],
			'other9' => $add['other9'],
			'other10' => $add['other10'],
			'vat' => $add['vat'],
			'advance1' => $add['advance1'],
			'advancee1' => $add['advancee1'],
			'otherpr1' => $add['otherpr1'],
			'otherpr2' => $add['otherpr2'],
			'otherpr3' => $add['otherpr3'],
			'status' => "wait",
			'user' => $username,
			'checkdoc1' => $add['checkdoc_1'],
			'checkdoc2' => $add['checkdoc_2'],
			'retentionper' => $add['retentionper'],
			'retentionp' => $add['retention'],
			'unit' => $add['unit_time'],
			'unit1' => $add['unit1'],
			'putput' => $add['put'],
			'status' => $add['c_wo'],
			'dpid'=>$add['depid'],
			'dpname'=>$add['depname'],
			'createdate' => date('Y-m-d H:i:s',now()),
			'compcode' => $compcode,


		);

		$this->db->insert('lo', $data);

		for ($i = 0; $i < count($add['chki']); $i++) {

			$data_d = array(
				'lo_ref' => $lono,
				'lo_costcode' => $add['costcodei'][$i],
				'lo_costname' => $add['costnamei'][$i],
				'lo_matcode' => $add['matcodei'][$i],
				'lo_matname' => $add['matnamei'][$i],
				'lo_qty' => $add['qtyi'][$i],
				'lo_unit' => $add['uniti'][$i],
				'lo_priceunit' => parse_num($add['amounti'][$i]),
				'lo_price' => parse_num($add['priceuniti'][$i]),
				'lo_asset' => $add['statusass'][$i],
				'lo_assetid' => $add['accode'][$i],
				'lo_assetname' => $add['acname'][$i],
				'lo_disper' => parse_num($add['disci1'][$i]),
				'lo_disper2' => parse_num($add['disci2'][$i]),
				'lo_disper3' => parse_num($add['disci3'][$i]),
				'lo_disper4' => parse_num($add['disci4'][$i]),
				'lo_vat' => $add['vat'],
				'lo_disamt' => parse_num($add['disamti'][$i]),
				'total_disc' => parse_num($add['too_di'][$i]),
				'total_vat' => parse_num($add['to_vat'][$i]),
				'total_nat_amount' => $add['netamti'][$i],
				'type_cost' => $add['type_cost'][$i],

				'creatuser' => $username,
				'createdate' => date('Y-m-d H:i:s'),
				'compcode' => $compcode,
				
			);
			$this->db->insert('lo_detail', $data_d);

			

			$this->db->select('*');
			$this->db->where('pri_id', $add['priidi'][$i]);
			$item = $this->db->get('pr_item')->result();
			$pri_qty = 0;
			$pri_sumqty = 0;
			$pri_qty = "";
			$pri_sumqty = "";
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
			$this->db->where('pri_status =', 'no');
			$chkitem = $this->db->get('pr_item');
			$num = $chkitem->num_rows();

			if ($num == "0") {
				$data_f = array(
					'po_open' => "wo",
					'wo_open' => "wo",
				);
				$this->db->where('pr_prno', $pri_ref);
				$this->db->update('pr', $data_f);
			}

		}

		if ($add['a_wo'] == "1") {
		for ($i = 0; $i < count($add['approve_sequence']); $i++) {
			if ($add['c_wo'] == "wait") {
				
					$aprrove = array(
						'app_pr' => $lono,
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
					$this->db->insert('approve_wo', $aprrove);
							} 
					}
			}else if ($add['a_wo'] == "2") {
		  $this->db->select('*');
          $this->db->from('approve');
          $this->db->where('approve_project',$add['putprojectcode']);
          $this->db->where('type', "WO");
          $this->db->where('approve_cost >=',$add['contactamount']);
          $this->db->order_by("approve_sequence", "asc"); 
          $q = $this->db->get()->result();
          foreach ($q as $qq) {          
          $aprrove1 = array(
            'app_pr' => $lono,
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
          $this->db->insert('approve_wo',$aprrove1);
          }
          }


          $year = date('Y');
	      $mount = date('m');
	      $modal="wo";
	      if ($add['c_wo'] == "wait") {
	        if ($flag == "p") {
	          $count = $this->datastore_m->countwait_project($year,$mount,$compcode,$modal,$add['projectid']);
	          foreach ($count as $key => $value) {
	            $bi_wait = $value->bi_wait;
	            $wait = $value->wait;
	          }
	          if ($wait == 0) {
	          $view = array(
	                'bi_modal'    => $modal,
	                'compcode'    => $compcode,
	                'bi_year'     => $year,
	                'bi_month'    => $mount,
	                'bi_wait'     => 1,
	                'bi_project'  => $add['projectid'],
	              );
	              $this->db->insert('bi_views_project',$view);
	          }else{
	          $view = array(
	                'bi_wait'     => @$bi_wait+1,
	              );
	            $this->db->where('bi_project',$add['projectid']);
	            $this->db->where('bi_modal',$modal);
	            $this->db->where('bi_month',$mount);
	            $this->db->where('bi_year',$year);
	            $this->db->update('bi_views_project',$view);
	          }
	        }elseif ($flag == "d") {
	          $count = $this->datastore_m->countwait_department($year,$mount,$compcode,$modal,$add['depid']);
	          foreach ($count as $key => $value) {
	            $bi_wait = $value->bi_wait;
	            $wait = $value->wait;
	          }
	          if ($wait == 0) {
	          $view = array(
	                'bi_modal'    => $modal,
	                'compcode'    => $compcode,
	                'bi_year'     => $year,
	                'bi_month'    => $mount,
	                'bi_wait'     => 1,
	                'bi_department'  => $add['depid'],
	              );
	              $this->db->insert('bi_views_department',$view);
	          }else{
	          $view = array(
	                'bi_wait'     => @$bi_wait+1,
	              );
	            $this->db->where('bi_department',$add['depid']);
	            $this->db->where('bi_modal',$modal);
	            $this->db->where('bi_month',$mount);
	            $this->db->where('bi_year',$year);
	            $this->db->update('bi_views_department',$view);
	          }
	        }
	      }else{
	        if ($flag == "p") {
	          $count = $this->datastore_m->countappove_project($year,$mount,$compcode,$modal,$add['projectid']);
	          foreach ($count as $key => $value) {
	            $bi_approve = $value->bi_approve;
	            $approve = $value->approve;
	          }
	          if ($approve == 0) {
	          $view = array(
	                'bi_modal'    => $modal,
	                'compcode'    => $compcode,
	                'bi_year'     => $year,
	                'bi_month'    => $mount,
	                'bi_approve'     => 1,
	                'bi_project'  => $add['projectid'],
	              );
	              $this->db->insert('bi_views_project',$view);
	          }else{
	          $view = array(
	                'bi_approve'     => @$bi_approve+1,
	              );
	            $this->db->where('bi_project',$add['projectid']);
	            $this->db->where('bi_modal',$modal);
	            $this->db->where('bi_month',$mount);
	            $this->db->where('bi_year',$year);
	            $this->db->update('bi_views_project',$view);
	          }
	        }elseif ($flag == "d") {
	          $count = $this->datastore_m->countappove_department($year,$mount,$compcode,$modal,$add['depid']);
	          foreach ($count as $key => $value) {
	            $bi_approve = $value->bi_approve;
	            $approve = $value->approve;
	          }
	          if ($approve == 0) {
	          $view = array(
	                'bi_modal'    => $modal,
	                'compcode'    => $compcode,
	                'bi_year'     => $year,
	                'bi_month'    => $mount,
	                'bi_approve'     => 1,
	                'bi_department'  => $add['depid'],
	              );
	              $this->db->insert('bi_views_department',$view);
	          }else{
	          $view = array(
	                'bi_approve'     => @$bi_approve+1,
	              );
	            $this->db->where('bi_department',$add['depid']);
	            $this->db->where('bi_modal',$modal);
	            $this->db->where('bi_month',$mount);
	            $this->db->where('bi_year',$year);
	            $this->db->update('bi_views_department',$view);
	          }
	        }
	      }

        



		
		redirect('contract/editcontract/' . $lono.'/'.$flag);
	}

	public function receive_loi() {
		$session_data = $this->session->userdata('sessed_in');
		$data['res'] = $this->office_m->receive_loi();
		$data['resi'] = $this->office_m->receive_loi();
		$this->load->view('office/contract/all_contract_v');
	}
	public function delete_loi() {
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$this->db->delete('member', array('m_id' => $id));

		$this->db->delete('menu_right', array('m_user' => $username));
		echo $id;
		return true;
	}
	public function editloi() {
		$id = $this->uri->segment(3);
		$session_data = $this->session->userdata('sessed_in');
		$data['getproj'] = $this->datastore_m->getproject();
		$username = $session_data['username'];
		$this->db->select('*');
		$this->db->from('lo');
		$this->db->join('project', 'project.project_id = lo.projectcode', 'left outer');
		$this->db->where('lo_lono', $id);
		$q = $this->db->get();

		$data['res'] = $q->result();

		$this->load->view('office/contract/edit_contract_v', $data);
	}
	public function updateorder() {
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode =  $session_data['compcode'];
		$id = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data1 = array(
			// 'prno' => $this->input->post('loprno'),
			'lodate' => $this->input->post('lodate'),
			'refquono' => $this->input->post('refquono'),
			'quodate' => $this->input->post('quodate'),
			'projectcode' => $this->input->post('projectid'),
			'projownername' => $this->input->post('project'),
			'department' => $this->input->post('putdpt'),
			'contact' => $this->input->post('vendid'),
			'contactor' => $this->input->post('contactor'),
			'subcontact' => $this->input->post('venderid'),
			'addresssub' => $this->input->post('addresssub'),
			'cosubcontact' => $this->input->post('cosubcontact'),
			'tel_subcontact' => $this->input->post('telsubcontact'),
			'fax_subcontact' => $this->input->post('faxsubcontact'),

			'contacttype' => $this->input->post('contacttype'),
			'system' => $this->input->post('system'),
			'jobtype' => $this->input->post('jobtype'),
			'attach' => $this->input->post('attach'),
			'contactdesc' => nl2br($this->input->post('contactdesc')),
			'contactamount' => $this->input->post('contactamount'),
			'period_amt' => $this->input->post('contactamount'),
			'disamount' => $this->input->post('disamount'),
			'amtbal' => $this->input->post('amtbal'),
			'discount' => $this->input->post('discount'),
			'netamount' => $this->input->post('netamount'),
			'vatper' => $this->input->post('vatper'),
			'tax' => $this->input->post('tax'),
			'amountre' => $this->input->post('amountre'),
			'paypermonth' => $this->input->post('paypermonth'),
			'paycon' => $this->input->post('paycon'),
			'after' => $this->input->post('after'),
			'advance' => $this->input->post('advance'),
			'advancee' => $this->input->post('advancee'),
			'retentionmethod' => $this->input->post('retentionmethod'),
			'other_advance' => $this->input->post('other_advance'),
			'other_advance1' => $this->input->post('other_advance1'),
			'contractperiod' => $this->input->post('contractperiod'),
			'annuity_contracts' => $this->input->post('annuitycontracts'),
			'pay_progess' => $this->input->post('payprogess'),
			'empsub' => $this->input->post('empsub'),
			'less_ret' => $this->input->post('lessret'),
			'less_adv_pay' => $this->input->post('lesspay'),
			'less_other' => $this->input->post('lessother'),
			'start_contact' => $this->input->post('startdate'),
			'stop_contact' => $this->input->post('stopcontact'),
			'per_fines' => $this->input->post('per_fines'),
			'amount' => $this->input->post('amount'),
			'perday_other' => $this->input->post('perday_other'),
			'retention' => $this->input->post('retention'),
			'after_sale' => $this->input->post('after_sale'),
			'manual' => $this->input->post('manual'),
			'deliverydate' => $this->input->post('deliverydate'),
			'location' => $this->input->post('location'),
			'put' => $this->input->post('put'),
			'accord_contact' => $this->input->post('accordcontact'),
			'accord_type' => $this->input->post('accordtype'),
			'other' => $this->input->post('other'),
			'other_2' => $this->input->post('other2'),
			'other_3' => $this->input->post('other3'),
			'other4' => $this->input->post('other4'),
			'other5' => $this->input->post('other5'),
			'other6' => $this->input->post('other6'),
			'other7' => $this->input->post('other7'),
			'other8' => $this->input->post('other8'),
			'other9' => $this->input->post('other9'),
			'other10' => $this->input->post('other10'),
			'createdate' => $this->input->post('createdate'),
			'updatedate' => $this->input->post('updatedate'),
			'checkdoc1' => $this->input->post('checkdoc_1'),
			'checkdoc2' => $this->input->post('checkdoc_2'),
			'retentionbank' => $this->input->post('mainreten'),
			'advcheck' => $this->input->post('advcheck'),
			'advpercent' => $this->input->post('advper'),
			'adv_count' => $this->input->post('adv_count'),
			'agreement' => $this->input->post('agreement'),
			'vat' => $this->input->post('vat'),
			'advance1' => $this->input->post('advance1'),
			'advancee1' => $this->input->post('advancee1'),

			'retentionper' => $this->input->post('retentionper'),
			'retentionp' => $this->input->post('retentionp'),

			'otherpr1' => $this->input->post('otherpr1'),
			'otherpr2' => $this->input->post('otherpr2'),
			'otherpr3' => $this->input->post('otherpr3'),
			'otherpr4' => $this->input->post('otherpr4'),

			'unit' => $this->input->post('unit'),
			'unit1' => $this->input->post('unit1'),
			'putput' => $this->input->post('put'),

		);
		$this->db->where('lo_lono', $id);
		$q = $this->db->update('lo', $data1);


		redirect('contract/editcontract/'.$id.'/'.$flag);

	}

	public function edit_rowwo(){
		$add = $this->input->post();
		$id = $this->uri->segment(3);
		$wo = $this->uri->segment(4);
		$flag = $this->uri->segment(5);
		$data1 = array(
			'lo_matname' => $add['newmatnamei'],
			'lo_matcode' => $add['newmatcodei'],
			'lo_costname' => $add['costnameint'],
			'lo_costcode' => $add['codecostcodeint'],
			'remark_mat' => $add['remark_mat'],
			'type_cost' => $add['type_cost'],
			'lo_qty' => $add['qty'],
			'lo_unit' => $add['punit'],
			'cpqtyic' => $add['cqtyic'],
			'pqtyic' => $add['pqtyic'],
			'lo_unitic' => $add['punitic'],
			'lo_priceunit' => $add['price_unit'],
			'lo_price' => $add['amount'],
			'lo_disper' => $add['discountper1'],
			'lo_disper2' => $add['discountper2'],
			'lo_disper3' => $add['discountper3'],
			'lo_disper4' => $add['discountper4'],
			'lo_disamt' => $add['pdiscex'],
			'total_disc' => $add['disamt'],
			'total_vat' => $add['to_vat'],
			'total_nat_amount' => $add['netamt'],
			'remark' => $add['remark'],
			'lo_assetid' => $add['accode'],
			'lo_assetname' => $add['acname'],
			'lo_asset' => $add['statusass'],
		);
		$this->db->where('lo_idd', $id);
		$this->db->update('lo_detail', $data1);

		$data2 = array(
			'contactamount' => $add['sumlo'],
		);
		$this->db->where('lo_lono', $wo);
		$this->db->update('lo', $data2);


		redirect('contract/editcontract/'.$wo.'/'.$flag);


		
	}

		public function inset_editwo(){
		$add = $this->input->post();
		$wo = $this->uri->segment(3);
		$flag = $this->uri->segment(4);
		$data1 = array(
			'lo_ref' =>$wo,
			'lo_matname' => $add['newmatname'],
			'lo_matcode' => $add['newmatcode'],
			'lo_costname' => $add['costnameint'],
			'lo_costcode' => $add['codecostcodeint'],
			'remark_mat' => $add['remark_mat'],
			'type_cost' => $add['type_cost'],
			'lo_qty' => $add['qty'],
			'lo_unit' => $add['punit'],
			'cpqtyic' => $add['cqtyic'],
			'pqtyic' => $add['pqtyic'],
			'lo_unitic' => $add['punitic'],
			'lo_priceunit' => $add['price_unit'],
			'lo_price' => $add['amount'],
			'lo_disper' => $add['discountper1'],
			'lo_disper2' => $add['discountper2'],
			'lo_disper3' => $add['discountper3'],
			'lo_disper4' => $add['discountper4'],
			'lo_disamt' => $add['pdiscex'],
			'total_disc' => $add['disamt'],
			'total_vat' => $add['to_vat'],
			'total_nat_amount' => $add['netamt'],
			'remark' => $add['remark'],
			'lo_assetid' => $add['accode'],
			'lo_assetname' => $add['acname'],
			'lo_asset' => $add['statusass'],
		);
		$this->db->insert('lo_detail',$data1);
		

		$data2 = array(
			'contactamount' => $add['sumlo'],
		);
		$this->db->where('lo_lono',$wo);
		$this->db->update('lo', $data2);

		redirect('contract/editcontract/'.$wo.'/'.$flag);
	}






	public function del_poi() {
		$id = $this->input->post('id');
		$this->db->delete('lo_detail', array('lo_idd' => $id));
	}
	public function delcontract() {
		$id = $this->uri->segment(3);
		$idlono = $this->uri->segment(4);
		$this->db->where('lo_idd', $id);
		$this->db->delete('lo_detail');
		redirect('contract/editcontract/' . $idlono);
	}
	

	public function addwt_per() {
	$compcode =  $session_data['compcode'];
	$add = $this->input->post();
	$a = array(
		'name_wt' =>  $add['namewt'], 
		'per_wt' =>  $add['perwt'],
		'date' =>  date('Y-m-d'),
		'time' =>  date('H:i:s'),
		'user' =>  $compcode,
		);
	$this->db->insert('setupwt',$a);
	redirect('contract/wt_contract');
	}

	public function del_wt() {
		$id = $this->uri->segment(3);
	   $this->db->delete('setupwt', array('id_wt' => $id));
	   redirect('contract/wt_contract');
	}

	public function edit_wt() {
	$id = $this->uri->segment(3);
	$compcode =  $session_data['compcode'];
	$username = $session_data['username'];
	$add = $this->input->post();
	$a = array(
		'name_wt' =>  $add['namewt'], 
		'per_wt' =>  $add['perwt'],
		'date' =>  date('Y-m-d'),
		'time' =>  date('H:i:s'),
		'user' =>  $compcode,
		);
	$this->db->where('id_wt',$id);
	$q = $this->db->update('setupwt', $a);
	redirect('contract/wt_contract');
	}
	
	public function wo_del(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$compcode = $session_data['compcode'];
		$pono = $this->input->post('pono');

		$this->db->where('app_pr', $pono);
		$this->db->delete('approve_wo');

		$update = array(
		    'status' => 'delete',
		    'deluser' => $username,
		    'deldate' => date('Y-m-d'),
		 	);

		$this->db->where('lo_lono' , $pono);
		$query = $this->db->update('lo',$update);
		if ($query) {

			$return['status'] = true; 

	    }else{

	        $return['status'] = false;

	    }

	    echo json_encode($return);
	}
	public function test_post_wo(){
		$session_data = $this->session->userdata('sessed_in');
		$username = $session_data['username'];
		$fullname = $session_data['m_name'];
		$compcode = $session_data['compcode'];
		$lo = "WO";
		$add = $this->input->post();
		$datestring = "Y";
		$mm = "m";
		$dd = "d";
		if ($add['flagedit']=="edit") {
				$data_h = array(
					'lodate' => $add['lodate'],
					'prno' => $add['pr_name'],
					'refquono' => $add['refquono'],
					'quodate' => $add['quodate'],
					'ref_prdate' => $add['refprdate'],
					'projectcode' => $add['projectid'],
					'contact' => $add['venid'],
					'contactor' => $add['subcontact'],
					'subcontact' => $add['venid'],
					'cosubcontact' => $add['cosubcontact'],
					'contacttype' => $add['contacttype'],
					'system' => $add['system'],
					'contactamount' => $add['contactamount'],
					'disamount' => $add['decreamount'],
					// 'netamount' => $add['netamt'],
					'vatper' => $add['vat'],
					'disc_type' => $add['discounttype'],
					'discount' => $add['discount'],
					'tax' => $add['tax'],
					// 'billing' => $add['billing'],
					'amonthper' => $add['amonthper'],
					'peridate' => $add['peridate'],
					'typepay' => $add['typepay'],
					'paymentcondition' => $add['paymentcondition'],
					'retentionp' => $add['retentionduration'],
					'retentionper' => $add['retentionper'],
					'start_contact' => $add['datestart'],
					'stop_contact' => $add['dateend'],
					'advance' => $add['advance'],
					'paywithin' => $add['paydate'],
					'guarantee_type' => $add['typepaid'],
					// 'advpercent' => $add['Period'],
					'period_type' => $add['paytype'],
					'retention' => $add['retentionamt'],
					'less_other' => $add['lessotheramt'],
					'retentionmethod' => $add['calretention'],
					'other' => $add['refwo'],
					'otherpr1' => $add['remark1'],
					'otherpr2' => $add['remark2'],
					'otherpr3' => $add['remark3'],
					'otherpr4' => $add['remark4'],
					'other5' => $add['remark5'],
					'other6' => $add['remark6'],
					'other7' => $add['remark7'],
					'other8' => $add['remark8'],
					'other9' => $add['remark9'],
					'other10' => $add['remark10'],
				);
				$this->db->where('lo_lono',$add['lolono']);
				$this->db->update('lo',$data_h);
				for ($i=0; $i < count($add['costcode']) ; $i++) { 
					$data_d = array(
						'lo_matcode' => $add['matcode'][$i],
						'lo_matname' => $add['matname'][$i],
						'lo_costcode' => $add['costcode'][$i],
						// 'lo_costname' => $add[''][$i],
						'lo_qty' => $add['qty'][$i],
						'lo_unit' => $add['unitcode'][$i],
						'lo_priceunit' => $add['priceunit'][$i],
						'lo_disper' => $add['disone'][$i],
						'lo_disper2' => $add['distwo'][$i],
						'lo_disamt' => $add['spedist'][$i],
						'lo_vat' => $add['vat'],
						'period' => $add['perioditem'][$i],
						'creatuser' => $username,
						'createdate' => date('Y-m-d H:i:s'),
						'compcode' => $compcode,
						'lo_price' => $add['amtbefor'][$i],
						'total_nat_amount' => parse_num($add['amt'][$i]),
						'lo_unitic' => $add['unitcode'][$i],
						'remark' => $add['pri_remark'][$i],
						'type_cost' => $add['contacttype'],
						'boq_type' => $add['boq_type'][$i],
						'loi_project' => $add['projectid'],
					);
					$this->db->where('lo_ref',$add['lolono']);
					$this->db->where('lo_idd',$add['prid'][$i]);
					$this->db->update('lo_detail',$data_d);
				}
				$data_appro = array('status' => 'no' );
				$this->db->where('app_pr',$add['lolono']);
				$this->db->update('approve_wo',$data_appro);

				

				echo $add['lolono'];

				return true;
		}else{
			$module = 'WO';
			$module_type = '';
			$project = $add['projectcode_h'];
			$project_id = $add['projectid'];
			$input = date('m', strtotime($add['lodate']));
	
			$datestring = "Y";
			$m = "m";
			$d = "d";
			
			$count_row = $this->datastore_m->nwo_coubt_row($compcode,$project_id);//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
			// echo $count_row;
			// die();
			if ($count_row==0) {
				$count_row = 1;
				$lono = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
				// echo $lono;
				// die();
			}else{
				$run = $this->datastore_m->ngetwo_num($input,$compcode,$project_id);
				
				if (isset($run[0]['lodate'])==$input) {
					if($run[0]['lodate']<=10){
						$month = "0".$run[0]['lodate'];
					}else{
						$month = $run[0]['lodate'];
					}
					$count = $this->datastore_m->cgetwo_num($input,$compcode,$project_id);
					$x1 = $count+1;
					$lono = $this->datastore_m->RunningNumber($module_type,$x1,$month,$project,$module);
					// echo $lono;
					// die();
				}else{
					$x1 = 1;
					$dd = $input;
					$lono = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
					// echo $lono;
					// die();
				}
				
			}
			//   echo $pono;
				$data_h = array(
					'lo_lono' => $lono,
					'lodate' => $add['lodate'],
					'prno' => $add['pr_name'],
					'refquono' => $add['refquono'],
					'quodate' => $add['quodate'],
					'ref_prdate' => $add['refprdate'],
					'projectcode' => $add['projectid'],
					'contact' => $add['venid'],
					'contactor' => $add['subcontact'],
					'subcontact' => $add['venid'],
					'cosubcontact' => $add['cosubcontact'],
					'contacttype' => $add['contacttype'],
					'system' => $add['system'],
					'contactamount' => $add['contactamount'],
					'disamount' => $add['decreamount'],
					'netamount' => $add['netamt'],
					'amtbal' => $add['netamt'],
					'vatper' => $add['vat'],
					'disc_type' => $add['discounttype'],
					'discount' => $add['discount'],
					'tax' => $add['tax'],
					// 'billing' => $add['billing'],
					'amonthper' => $add['amonthper'],
					'peridate' => $add['peridate'],
					'typepay' => $add['typepay'],
					'paymentcondition' => $add['paymentcondition'],
					'retentionp' => $add['retentionduration'],
					'retentionper' => $add['retentionper'],
					'start_contact' => $add['datestart'],
					'stop_contact' => $add['dateend'],
					'advance' => $add['advance'],
					'paywithin' => $add['paydate'],
					'guarantee_type' => $add['typepaid'],
					// 'advpercent' => $add['Period'],
					'period_type' => $add['paytype'],
					'retention' => $add['retentionamt'],
					'less_other' => $add['lessotheramt'],
					'retentionmethod' => $add['calretention'],
					'compcode' => $compcode,
					'other' => $add['refwo'],
					'otherpr1' => $add['remark1'],
					'otherpr2' => $add['remark2'],
					'otherpr3' => $add['remark3'],
					'otherpr4' => $add['remark4'],
					'other5' => $add['remark5'],
					'other6' => $add['remark6'],
					'other7' => $add['remark7'],
					'other8' => $add['remark8'],
					'other9' => $add['remark9'],
					'other10' => $add['remark10'],
					'user' => $username
				);
				$this->db->insert('lo',$data_h);
				for ($i=0; $i < count($add['costcode']) ; $i++) { 
					
					$data_d = array(
						'lo_ref' => $lono,
						'lo_matcode' => $add['matcode'][$i],
						'lo_matname' => $add['matname'][$i],
						'lo_costcode' => $add['costcode'][$i],
						// 'lo_costname' => $add[''][$i],
						'lo_qty' => $add['qty'][$i],
						'lo_unit' => $add['unitcode'][$i],
						'lo_priceunit' => $add['priceunit'][$i],
						'lo_disper' => $add['disone'][$i],
						'lo_disper2' => $add['distwo'][$i],
						'lo_disamt' => $add['spedist'][$i],
						'lo_vat' => $add['vat'],
						'period' => $add['perioditem'][$i],
						'creatuser' => $username,
						'createdate' => date('Y-m-d H:i:s'),
						'compcode' => $compcode,
						'lo_price' => $add['amtbefor'][$i],
						'total_nat_amount' => $add['amt'][$i],
						'lo_unitic' => $add['unitcode'][$i],
						'remark' => $add['pri_remark'][$i],
						'type_cost' => $add['contacttype'],
						'boq_type' => $add['boq_type'][$i],
						'loi_project' => $add['projectid'],
					);
					// print_r($add);
					
					$this->db->insert('lo_detail',$data_d);
					
					
					// echo json_encode($data);
					// if ($add['prid'][$i]) {

						# code...
						$uptpr = $this->datastore_m->getprid($add['prid'][$i]);
						if ($add['prid'][$i]!="") {
							$d_pr = array(
								'pri_sumqty' => $uptpr[0]['pri_sumqty'] + $add['qty'][$i],
							);
							$this->db->where('pri_id',$add['prid'][$i]);
							$this->db->update('pr_item',$d_pr);
						}
						
						if ($uptpr[0]['pri_qty'] == $uptpr[0]['pri_sumqty'] + $add['qty'][$i]) {
							$data_c = array(
								'pri_status' => "open",
							);
							$this->db->where('pri_id', $add['prid'][$i]);
							$this->db->update('pr_item', $data_c);
						}
						$numprd = $this->datastore_m->numrowsprd($add['pri_ref'][$i]);
						$countprwo = $this->datastore_m->countrowprwo($add['pri_ref'][$i]);
						$countprwoopen = $this->datastore_m->countprwoopen($add['pri_ref'][$i]);

						if ($countprwo==$countprwoopen) {
							$data_f = array(
								// 'po_open' => "wo",
								'wo_open' => "open",
							);
							$this->db->where('pr_prno', $add['pri_ref'][$i]);
							$this->db->update('pr', $data_f);
						}
					// }else{

					// }
					// die();
				}
							if ($add['a_wo']=="1") {
								$approve = $this->datastore_m->set_approve_wo($add['projectcode_h']);
								foreach ($approve as $key => $value) {
									$data_approve = array(
										'app_pr' => $lono,
										'app_project' => $add['projectcode_h'],
										'app_sequence' => $value->approve_sequence,
										'app_midid' => $value->approve_mid,
										'app_midname' => strtolower($value->approve_mname),
										'lock' => $value->approve_lock,
										'status' => "no",
										'type' => "P",
										'cost' => $value->approve_cost,
										'creatuser' => $username,
										'creatudate' => date('y-m-d'),
										'compcode' => $compcode,
									);
									$this->db->insert('approve_wo', $data_approve);
									// $pushID = $this->datastore_m->getlineid($value->approve_mid,$compcode);
								}
								$seq = 0;
								$pushID = $this->datastore_m->getwoseq($lono,$compcode,$seq);
							// 	$message = "เอกสาร WO ใหม่ รออนุมัติ \n";
							// 	$message .= "Doc No : {$lono} \n";
							// 	$message .= "Remark : ".$add['subcontact']." \n";
							// 	$message .= "Number of items : ".count($add['qty'])." \n";
							// 	$message .= "----------------------------------------- \n";
							// 	$n=1;
							// 	for ($i=0; $i < count($add['qty']); $i++) {
							// 	  $message .= $i+$n.". ".$add['matname'][$i]." จำนวน ".parse_num($add['qty'][$i])." ". parse_num($add['priceunit'][$i])." \n";
							// 	  $message .= "----------------------------------------- \n";
							// 	}
							//    $ddd = $add['system'];
							//    $sss = $add['venid'];
							// 	// $message .= "----------------------------------------- \n";
							// 	$message .= "Created by : ". $username." \n";
							// 	$message .= "Print Preview \n";
								
							// 	$message .= base_url('stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=wo_new.mrt&lono='.$lono.'&system_id='.$ddd.'&subcontact='.$sss.'&compcode='.$compcode.'') . " \n";
							
					  
							// 	notify_message($message,$pushID);

								$line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
								$line = $line_api_service[0]['line_api'];
								$data = array( 
									"id" => $pushID,
									"type" =>"message",
									"text" => "Doc No. : ".$lono,
									"price" => $fullname,
									"pay" =>"3",
									"unit" =>"4",
									"doc" =>"5",
									"compcode_line" => "6",
									"user" =>"7",
									"link" => $line,
									"base_url" => base_url('contract/newapprovecontract_p/'.$add['projectid'].'/'.'p'.'/'.$add['projectcode_h'])
							
							
								);
								// print_r($data);
								// die();
								// line_oa_api($data,$line);

										
							}else if($add['a_wo'] == "2"){
								$app_amt = $this->datastore_m->app_wo_amount($add['projectcode_h'],$add['contactamount']);
								foreach ($app_amt as $key => $qq) {
									$appr_amt = array(
										'app_pr' => $lono,
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
									$this->db->insert('approve_wo',$appr_amt);
								}
							}
				
			
				echo $lono;
				return true;
		}
	
	}
}



