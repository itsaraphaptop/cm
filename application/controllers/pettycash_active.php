<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class pettycash_active extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('datastore_m');
    $this->load->helper('date');
    $this->load->helper(array('form', 'url', 'file','line_oa_api'));
    $this->load->library('image_lib'); 
    
  }
  public function newpettycash()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $fullname = $session_data['m_name'];
    $compcode = $session_data['compcode'];
    $add = $this->input->post();
    $project_id = $this->input->post("projectid");
    $flag = $this->input->post("flag");
    $project_code =  $add['putprojectcode'];
    try {
      // $datestring = "Y";
      // $m = "m";
      // $d = "d";
      // $res = $this->datastore_m->pc_count_row();
      // if ($res == 0) {
      //   $pcno = "PC" . date($datestring) . date($m) . "000" . "1";
      //   $pc_item = 1;
      // } else {
      //   $run = $this->datastore_m->get_pc_num();
      //   foreach ($run as $valx) {
      //     $x1 = $valx->doc_id + 1;
      //   }
      //   if ($x1 <= 9) {
      //     $pcno = "PC" . date($datestring) . date($m) . "000" . $x1;
      //     $pc_item = $x1;
      //   } elseif ($x1 <= 99) {
      //     $pcno = "PC" . date($datestring) . date($m) . "00" . $x1;
      //     $pc_item = $x1;
      //   } elseif ($x1 <= 999) {
      //     $pcno = "PC" . date($datestring) . date($m) . "0" . $x1;
      //     $pc_item = $x1;
      //   } elseif ($x1 <= 9999) {
      //     $pcno = "PC" . date($datestring) . date($m) . $x1;
      //     $pc_item = $x1;
      //   }

      // }
      	$module = 'Pettycash';
			$module_type = '';
			$project = $project_code;
			$input = date('m', strtotime($add['pcdate']));
	  
			$datestring = "Y";
			$m = "m";
			$d = "d";
			
			$count_row = $this->datastore_m->npc_coubt_row($compcode,$project_id);//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
			if ($count_row==0) {
				$count_row = 1;
				$pc_item = 1;
				$pcno = $this->datastore_m->RunningNumber($module_type,$count_row,$input,$project,$module);
				// echo $pono;
				// die();
			}else{
				$run = $this->datastore_m->ngetpc_num($input,$compcode,$project_id);
       
				if (isset($run[0]['docdate'])==$input) {
          // echo "1";
					// die();
					if($run[0]['docdate']<=10){
						$month = "0".$run[0]['docdate'];
					}else{
						$month = $run[0]['docdate'];
					}
					$count = $this->datastore_m->cgetpc_num($input,$compcode,$project_id);
          $x1 = $count+1;
          $pc_item = $count+1;
					$pcno = $this->datastore_m->RunningNumber($module_type,$x1,$month,$project,$module);
					// echo $pcno;
					// die();
				  }else{
          // echo "2";
          // die();
          $x1 = 1;
          $pc_item = 1;
					$dd = $input;
					$pcno = $this->datastore_m->RunningNumber($module_type,$x1,$dd,$project,$module);
				  }
				  
			  }
			  // echo $pcno;
			  // die();
       
       
    $config['upload_path'] = './select_file_pc/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
    $config['max_size'] = '204800';
    $config['max_width'] = '9999';
    $config['max_height'] = '9999';
    $rand = rand(1111, 9999);
    $date = date("Y-m-d");
    $config['file_name'] = $date.$rand;
    $this->load->library('upload',$config);

    $error = array();
    $success = array();

    foreach ($_FILES as $field_name => $file) {
      var_dump($field_name);
            // die();
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
          var_dump($field_name);
          $select_file_pc = array(
            'name_file' => $upload_data['file_name'],
            'pc_ref' => $pcno,
            'date' => date('y-m-d'),
            'time' => date('H:i:s'),
            'user' => $compcode,
          );
          $this->db->insert('select_file_pc', $select_file_pc);
        }
      }
    }      
      if ($add['ventype'] == "1") {
        $data = array(
          'docno' => $pcno,
          'doc_runno' => $pc_item,
          'vender_type' => $add['ventype'],
          'ven_id' => $add['memid'],
          'vender' => $add['memname'],
          'memadv' => $add['advid'],
          'advname' => $add['advname'],
          'project' => $add['projectid'],
          'department' => $add['depid'],
          'docdate' => $add['pcdate'],
          'duedate' => $add['duedate'],
          'crterm' => $add['crterm'],
          'system' => $add['system'],
          'remark' => $add['remark'],
          'status' => 'wait',
          'approve' => $add['c_pt'],
          'useradd' => $username,
          'compcode' => $compcode

        );
        $this->db->insert('pettycash', $data);
        if ($add['a_pt'] == "1") {
          for ($i = 0; $i < count($add['approve_sequence']); $i++) {
            if ($add['c_pt'] == "wait") {
              $aprrove = array(
                'app_pr' => $pcno,
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
              $this->db->insert('approve_pc', $aprrove);
            }
          }
        } else if ($add['a_pt'] == "2") {

          $this->db->select('*');
          $this->db->from('approve');
          $this->db->where('approve_project', $add['putprojectcode']);
          $this->db->where('type', "PC");
          $this->db->where('approve_cost >=', $add['summarytot']);
          $this->db->order_by("approve_sequence", "asc");
          $q = $this->db->get()->result();
          foreach ($q as $qq) {
            $aprrove = array(
              'app_pr' => $pcno,
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
            $this->db->insert('approve_pc', $aprrove);
          }

        }
      } else {
        $data = array(
          'docno' => $pcno,
          'doc_runno' => $pc_item,
          'vender_type' => $add['ventype'],
          'ven_id' => $add['venid'],
          'vender' => $add['venname'],
          'memadv' => $add['advid'],
          'advname' => $add['advname'],
          'project' => $add['projectid'],
          'department' => $add['depid'],
          'docdate' => $add['pcdate'],
          'system' => $add['system'],
          'remark' => $add['remark'],
          'status' => 'wait',
          'approve' => $add['c_pt'],
          'useradd' => $username,
          'compcode' => $compcode
        );
        $this->db->insert('pettycash', $data);

        if ($add['a_pt'] == "1") {
          for ($i = 0; $i < count($add['approve_sequence']); $i++) {
            if ($add['a_pt'] == "wait") {
              $aprrove = array(
                'app_pr' => $pcno,
                'app_project' => $add['putprojectcode'],
                'app_sequence' => $add['approve_sequence'][$i],
                'app_midid' => $add['approve_mid'][$i],
                'app_midname' => $add['approve_mname'][$i],
                'lock' => $add['approve_lock'][$i],
                'status' => "no",
                'type' => "P",
                'cost' => $add['approve_cost'][$i],
                'creatuser' => $username,
                'creatudate' => date('y-m-d'),
                'compcode' => $compcode,
              );
              $this->db->insert('approve_pc', $aprrove);
            }
          }
        } else if ($add['a_pt'] == "2") {

          $this->db->select('*');
          $this->db->from('approve');
          $this->db->where('approve_project', $add['putprojectcode']);
          $this->db->where('type', "PC");
          $this->db->where('approve_cost >=', $add['summarytot']);
          $this->db->order_by("approve_sequence", "asc");
          $q = $this->db->get()->result();
          foreach ($q as $qq) {
            $aprrove = array(
              'app_pr' => $pcno,
              'app_project' => $qq->approve_project,
              'app_sequence' => $qq->approve_sequence,
              'app_midid' => $qq->approve_mid,
              'app_midname' => $qq->approve_mname,
              'lock' => $qq->approve_lock,
              'status' => "no",
              'type' => "C",
              'cost' => $qq->approve_cost,
              'creatuser' => $username,
              'creatudate' => date('y-m-d'),
              'compcode' => $compcode,
            );
            $this->db->insert('approve_pc', $aprrove);
          }

        }
      }
      $seq = 0;
      $pushID = $this->datastore_m->getpcseq($pcno,$compcode,$seq);
      $line_api_service = $this->db->query("select line_api from setup_default limit 1")->result_array();
      $line = $line_api_service[0]['line_api'];
      $data = array( 
        "id" => $pushID,
        "type" =>"message",
        "text" => "Doc No. : ".$pcno,
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
      $id = $this->db->insert_id();
      for ($i = 0; $i < count($add['matcodei']); $i++) {
        $data_d = array(
          'pettycashi_ref' => $pcno,
          'pettycashi_expenscode' => $add['matcodei'][$i],
          'pettycashi_accode' => $add['ac_code'][$i],
          'pettycashi_expens' => $add['matnamei'][$i],
          'pettycashi_costcode' => $add['costcodei'][$i],
          'pettycashi_costname' => $add['costnamei'][$i],
          'pettycashi_description' => $add['adddesi'][$i],

          'pettycashi_vender' => $add['venderi'][$i],
          'pettycashi_addrvender' => $add['addrvenderi'][$i],
          'pettycashi_taxid' => $add['taxidd'][$i],
                // 'pettycashi_wttype' => $add['tax'][$i],
          'pettycashi_invno' => $add['taxnoi'][$i],
          // 'pettycashi_invdate' => $add['taxdatei'][$i],
          'pettycashi_vatflag' => $add['intputchktaxi'][$i],
          'pettycashi_taxflag' => $add['intputwhchktaxi'][$i],
          'pettycashi_vat' => $add['taxvvi'][$i],
          'pettycashi_vatt' => $add['taxvvi'][$i],
          'pettycashi_unitprice' => $add['unitpricei'][$i], 
                // 'pettycashi_unit' => $add['uniti'][$i],
          'pettycashi_amounttot' => $add['unitpricei'][$i],
          'pettycashi_netamt' => $add['amttoti'][$i],
                'pattycashi_totvat' => $add['netamti'][$i],
          'pettycashi_wh' => $add['taxi'][$i],
          'pettycashi_totwh' => $add['totwhi'][$i],
          // 'pettycashi_paydate' => $add['paydatei'][$i],
          'pettycashi_dod' => $add['dodi'][$i],
          // 'pettycashi_dodate' => $add['dodatei'][$i],
          'pettycashi_venderwt' => $add['venderwt'][$i],
          'pettycashi_addrvenderwt' => $add['addrvenderwt'][$i],
          'pettycashi_taxtype' => $add['taxtypei'][$i],
          'petty_assetid' => $add['accode'][$i],
          'petty_assetname' => $add['acname'][$i],
          'petty_asset' => $add['statusass'][$i],
          'compcode' => $compcode,
          'cost_type' => $add['typei'][$i],
          'po_boq' => $add['boq_id'][$i],
          'type_cost' => $add['type_costi'][$i],
          'pettycashi_project' => $add['projectid'],
        );

        $this->db->insert('pettycash_item', $data_d);

      }
      $year = date('Y');
      $mount = date('m');
      $modal = "pc";
      $flag = $this->uri->segment(3);
        // if ($add['c_pr'] == "wait") {
      if ($flag == "p") {
        $count = $this->datastore_m->countwait_project($year, $mount, $compcode, $modal, $add['projectid']);
        foreach ($count as $key => $value) {
          $bi_wait = $value->bi_wait;
          $wait = $value->wait;

          if ($wait == 0) {
            $view = array(
              'bi_modal' => "pc",
              'compcode' => $compcode,
              'bi_year' => $year,
              'bi_month' => $mount,
              'bi_wait' => 1,
              'bi_project' => $add['projectid'],
            );
            $this->db->insert('bi_views_project', $view);
          } else {
            $view = array(
              'bi_modal' => "pc",
              'compcode' => $compcode,
              'bi_year' => $year,
              'bi_month' => $mount,
              'bi_wait' => @$bi_wait + 1,
            );
            $this->db->where('bi_project', $add['projectid']);
            $this->db->where('bi_modal', $modal);
            $this->db->where('bi_month', $mount);
            $this->db->where('bi_year', $year);
            $this->db->update('bi_views_project', $view);
          }
        }
      } else {
        $count = $this->datastore_m->countappove_department($year, $mount, $compcode, $modal, $add['depid']);
        foreach ($count as $key => $value) {
          $bi_approve = $value->bi_approve;
          $approve = $value->approve;
              // $bi_wait = $value->bi_wait;

          if ($approve == 0) {
            $view = array(
              'bi_modal' => "pc",
              'compcode' => $compcode,
              'bi_year' => $year,
              'bi_month' => $mount,
              'bi_approve' => 1,
              'bi_department' => $add['depid'],
            );
            $this->db->insert('bi_views_department', $view);
          } else {
            $view = array(
              'bi_modal' => "pc",
              'compcode' => $compcode,
              'bi_year' => $year,
              'bi_month' => $mount,
              'bi_approve' => @$bi_approve + 1,
            );
            $this->db->where('bi_department', $add['depid']);
            $this->db->where('bi_modal', $modal);
            $this->db->where('bi_month', $mount);
            $this->db->where('bi_year', $year);
            $this->db->update('bi_views_department', $view);
          }
        }
      }
      // }



      redirect('petty_cash/editpettycash/' . $pcno . '/' . $project_id . '/' . $flag . '');

    } catch (Exception $e) {
      return $e;
    }
  }

  public function addtorow()
  {
          // $input = $this->input->post();
          // echo '<pre>';
          // print_r($input);
          // die();
    $proj = $this->uri->segment(3);
    $ff = $this->uri->segment(4);
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    if ($this->input->post('dodate')=="") {
      $pettycashi_dodate = null;
    }else{
      $pettycashi_dodate = $this->input->post('dodate');
    }
    $data_d = array(
      'pettycashi_ref' => $this->input->post('docno'),
      'pettycashi_expenscode' => $this->input->post('matcodei'),
      'pettycashi_expens' => $this->input->post('matnamei'),
      'pettycashi_costcode' => $this->input->post('costcodei'),
      'pettycashi_costname' => $this->input->post('costnamei'),
      'pettycashi_accode' => $this->input->post('acccode'),
      'pettycashi_vender' => $this->input->post('venderi'),
      'pettycashi_addrvender' => $this->input->post('addrvenderi'),
      'pettycashi_amount' => $this->input->post('qtyi'),
      'pettycashi_invno' => $this->input->post('taxnoi'),
      // 'pettycashi_invdate' => $this->input->post('taxdatei'),
      'pettycashi_vatflag' => $this->input->post('intputchktaxi'),
      'pettycashi_taxflag' => $this->input->post('intputwhchktaxi'),
      'pettycashi_vat' => $this->input->post('taxvi'),
      'pettycashi_vatt' => $this->input->post('taxvvi'),
      'pettycashi_unitprice' => $this->input->post('unitpricei'),
      'pettycashi_unit' => $this->input->post('uniti'),
      'pettycashi_amounttot' => $this->input->post('amttoti'),
      'pettycashi_netamt' => $this->input->post('netamti'),
      'pattycashi_totvat' => $this->input->post('totvati'),
      'pettycashi_wh' => $this->input->post('taxi'),
      'pettycashi_totwh' => $this->input->post('totwhi'),
      // 'pettycashi_paydate' => $this->input->post('totwhi'),
      'pettycashi_dod' => $this->input->post('dod'),
      'pettycashi_dodate' => $pettycashi_dodate,
      'pettycashi_venderwt' => $this->input->post('venderwt'),
      'pettycashi_addrvenderwt' => $this->input->post('addrvenderwt'),
      'pettycashi_description' => $this->input->post('adddes'),
      'petty_assetid' => $this->input->post('accode'),
      'petty_assetname' => $this->input->post('acname'),
      'petty_asset' => $this->input->post('statusass'),
      'pettycashi_taxid' => $this->input->post('taxid'),
      'compcode' => $compcode,
      'cost_type' => $this->input->post('type'),
      'type_cost' => $this->input->post('type_cost'),

    );
            // echo '<pre>';
            // print_r($data_d);die();
    if ($this->db->insert('pettycash_item', $data_d)) {
      echo $this->input->post('docno') . "/" . $proj . "/" . $ff;
    } else {
      echo "error";
      return false;
    }
  }

  public function delpettycashdetail()
  {
    $ref = $this->input->post('ref');
    $id = $this->input->post('id');
    $this->db->delete('pettycash_item', array('pettycashi_id' => $id));
    echo $ref;
    return true;
  }


  public function pc_disapprove()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $docno = $this->uri->segment(3);
    $data = array(
      'approve' => "wait",
      'approve_by' => $username,
      'approve_date' => date('Y-m-d H:i:s', now()),
    );
    $this->db->where('docno', $docno);
    if ($this->db->update('pettycash', $data)) {
      redirect('petty_cash/all_pettycash');
    } else {
      return false;
    }
  }



  public function editpettycash()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $docno = $this->uri->segment(3);
    $id = $this->uri->segment(4);
    $data = array();
    if ($this->input->post('vendertype') == "2") {
      $data = array(
        'vender_type' => $this->input->post('vendertype'),
        'ven_id' => $this->input->post('venid'),
        'memadv' => $this->input->post('advid'),
        'advname' => $this->input->post('advname'),
        'vender' => $this->input->post('venname'),
        'project' => $this->input->post('projectid'),
        'department' => $this->input->post('depid'),
        'docdate' => $this->input->post('pcdate'),
        'system' => $this->input->post('system'),
        'remark' => $this->input->post('remark'),
        'useredit' => $username,
      );
      $this->db->where('docno', $docno);
      $this->db->update('pettycash', $data);
    } else {
      $data = array(
        'vender_type' => $this->input->post('vendertype'),
        'ven_id' => $this->input->post('memid'),
        'memadv' => $this->input->post('advid'),
        'advname' => $this->input->post('advname'),
        'vender' => $this->input->post('memname'),
        'project' => $this->input->post('projectid'),
        'department' => $this->input->post('depid'),
        'docdate' => $this->input->post('pcdate'),
        'system' => $this->input->post('system'),
        'remark' => $this->input->post('remark'),
        'useredit' => $username,
      );
      $this->db->where('docno', $docno);
      $this->db->update('pettycash', $data);
    }
    
    $config['upload_path'] = './select_file_pc/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
    $config['max_size'] = '204800';
    $config['max_width'] = '9999';
    $config['max_height'] = '9999';
    $rand = rand(1111, 9999);
    $date = date("Y-m-d");
    $config['file_name'] = $date.$rand;
    $this->load->library('upload',$config);

    $error = array();
    $success = array();

    foreach ($_FILES as $field_name => $file) {
      var_dump($field_name);
            // die();
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
          var_dump($field_name);
          $select_file_pc = array(
            'name_file' => $upload_data['file_name'],
            'pc_ref' => $docno,
            'date' => date('y-m-d'),
            'time' => date('H:i:s'),
            'user' => $compcode,
          );
          $this->db->insert('select_file_pc', $select_file_pc);
        }
      }
    }      

    redirect('petty_cash/editpettycash/' . $docno . "/" . $data["project"]."/p");
  }


  public function edittorow()
  {
    $id = $this->uri->segment(3);
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $item = $this->input->post('item');
    $data_d = array(
			// 'pettycashi_ref' => $this->input->post('docno'),
      'pettycashi_expenscode' => $this->input->post('matcodei'),
      'pettycashi_expens' => $this->input->post('matnamei'),
      'pettycashi_costcode' => $this->input->post('costcodei'),
      'pettycashi_accode' => $this->input->post('ac_code'),
      'pettycashi_costname' => $this->input->post('costnamei'),
      'pettycashi_vender' => $this->input->post('venderi'),
      'pettycashi_addrvender' => $this->input->post('addrvenderi'),
      'pettycashi_amount' => $this->input->post('qtyi'),
      'pettycashi_invno' => $this->input->post('taxnoi'),
      'pettycashi_invdate' => $this->input->post('taxdatei'),
      'pettycashi_vatflag' => $this->input->post('intputchktaxi'),
      'pettycashi_taxflag' => $this->input->post('intputwhchktaxi'),
      'pettycashi_vat' => $this->input->post('taxvi'),
      'pettycashi_vatt' => $this->input->post('taxvvi'),
      'pettycashi_unitprice' => $this->input->post('unitpricei'),
      'pettycashi_unit' => $this->input->post('uniti'),
      'pettycashi_amounttot' => $this->input->post('amttoti'),
      'pettycashi_netamt' => $this->input->post('netamti'),
      'pattycashi_totvat' => $this->input->post('totvati'),
      'pettycashi_wh' => $this->input->post('taxi'),
      'pettycashi_totwh' => $this->input->post('totwhi'),
      'pettycashi_description' => $this->input->post('description'),
      'pettycashi_paydate' => $this->input->post('paydate'),
      'pettycashi_dod' => $this->input->post('dod'),
      'pettycashi_dodate' => $this->input->post('dodate'),
      'pettycashi_venderwt' => $this->input->post('venderwt'),
      'pettycashi_addrvenderwt' => $this->input->post('addrvenderwt'),
      'petty_assetid' => $this->input->post('accode'),
      'petty_assetname' => $this->input->post('acname'),
      'petty_asset' => $this->input->post('statusass'),
      'pettycashi_taxid' => $this->input->post('tax'),
			// 'compcode' => $compcode
    );
    $this->db->where('pettycashi_id', $id);
    $this->db->update('pettycash_item', $data_d);

    echo "error";
    return false;

  }

  public function delete_pettycash()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $docno = $this->uri->segment(3);
    $pj = $this->uri->segment(4);

    $this->db->where('app_pr', $docno);
    $this->db->delete('approve_pc');

    $data = array(
      'status' => "delete",
      'userdel' => $username,
    );
    $this->db->where('docno', $docno);
    if ($this->db->update('pettycash', $data)) {
      redirect('petty_cash/archive_pettycash/' . $pj);
    } else {
      return false;
    }

  }
  public function pc_approve()
  {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $docno = $this->uri->segment(3);
    $data = array(
      'approve' => "approve",
      'approve_by' => $username,
      'approve_date' => date('Y-m-d H:i:s', now()),
    );
    $this->db->where('docno', $docno);
    if ($this->db->update('pettycash', $data)) {
      redirect('petty_cash/approve');
    } else {
      return false;
    }
  }

  public function return_to_balance()
  {
    $price_re = $this->input->post('price_re');
    $boq_id_re = $this->input->post('boq_id');
    $sql_update_pettycashi_unitprice = "update boq_item SET boq_item.boq_balance = boq_item.boq_balance-{$price_re} WHERE boq_item.boq_id = {$boq_id_re}";
    $query = $this->db->query($sql_update_pettycashi_unitprice);
    if ($query) {
      $res = true;
    } else {
      $res = false;
    }

    return $res;
  }

public function editupload(){
 
  $datestring = "Y";
  $m = "m";
  $d = "d";
  $session_data = $this->session->userdata('sessed_in');
  $username = $session_data['username'];
  $compcode = $session_data['compcode'];
  if (isset($_FILES['styled_file']['name'])) {
    $config['upload_path'] = './select_file_pc/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|rar|docx|xls|pdf|zip|xlsx';
    $config['max_size'] = '204800';
    $config['max_width']  = '9999';
    $config['max_height']  = '9999';
    $rand = rand(1111,9999);
    $date= date("Y-m-d ");
    $config['file_name']  = $date.$rand;
    $error = array();
    $success = array();
    $this->load->library('upload', $config);
    $pcno = $this->input->post('pc_ref');
    foreach($_FILES as $field_name => $file)
    {
    if (!$this->upload->do_upload($field_name)){
      $error['upload'][] = $this->upload->display_errors();
    }else{
      $upload_data = $this->upload->data();
      if (!$this->image_lib->resize())
      {
        $error['resize'][] = $this->image_lib->display_errors();
      }else{
        $data['success'] = $upload_data;
        $select_file_pc = array(
        'name_file' => $upload_data['file_name'],
        'pc_ref' => $pcno,
        'date' => date('y-m-d'),
        'time' => date('H:i:s'),
        'user' => $compcode,
        );
        $query = $this->db->insert('select_file_pc',$select_file_pc);
        }
      }
    }
  }else{
    echo "ไม่มีไฟล์";
  }
}


}