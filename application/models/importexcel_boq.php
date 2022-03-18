<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class importexcel_boq extends CI_Controller {
        public function __construct() {
            parent::__construct();

        }

      function bottoexcel($dataarray,$pj,$username,$compcode,$pjid,$countrow){
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
          $this->db->where('boq_bd',$pj);
          $this->db->delete('boq_item');
          $this->db->where('boq_code',$pj);
          $this->db->delete('boq_cost');
          
          $this->db->select('costlevel');
          $this->db->where('sys_code',$compcode);
          $sys = $this->db->get('syscode')->result_array();

          $session_data = $this->session->userdata('sessed_in');
          $m_id = $session_data['m_id'];
	        for($i=0;$i<$countrow;$i++){
	        	// if($dataarray[$i]['boq_job']!="(JOB)"){

              $this->db->select('costcode,csubgroup_name');
              $this->db->where('costcode',$dataarray[$i]['subcostcode']);
              $cost_subgroup = $this->db->get('cost_subgroup')->result();
              $matcostname = "";
              foreach ($cost_subgroup as $key) {
                $matsubcostcode = $dataarray[$i]['subcostcode'];
                $matcostname = $key->csubgroup_name;
              }
              $this->db->select('costcode,csubgroup_name');
              $this->db->where('costcode',$dataarray[$i]['subcostcodelabor']);
              $cost_subgrouplaber = $this->db->get('cost_subgroup')->result();
              $labcostname = "";
              foreach ($cost_subgrouplaber as $key) {
                $labsubcostcode = $dataarray[$i]['subcostcodelabor'];
                $labcostname = $key->csubgroup_name;
              }
              // $this->db->select('*');
              // $this->db->where('materialcode',$dataarray[$i]['newmatcode']);
              // $mat_unit = $this->db->get('mat_unit')->result();
              // $materialcode = "";
              // foreach ($mat_unit as $keyu) {
              //   $newmatcode = $dataarray[$i]['newmatcode'];
              //   $materialn = $keyu->materialname;
              //   $materials = $keyu->materialspacname;
              //   $materialcode = $materialn." ".$materials;


              // }

              $this->db->select('*');
              $this->db->where('unit_code',$dataarray[$i]['unitcode']);
              $unit = $this->db->get('unit')->result();
              $unitcode = "";
              foreach ($unit as $k) {
                $unitcode = $dataarray[$i]['unitcode'];
                $unit_name = $k->unit_name;
              }
              $dataexcel = array();
              $icount = 0;
              if($dataarray[$i]['boq_job']!="" && $dataarray[$i]['boq_job']!="JOB"){
	            // $data[] = array(
                    $dataexcel[$icount]['boq_bd'] = $pj;
                    $dataexcel[$icount]['boq_job'] =  trim($dataarray[$i]['boq_job']);
                    $dataexcel[$icount]['subcostcode'] =  trim($dataarray[$i]['subcostcode']);
                    $dataexcel[$icount]['subcostcodename'] =  $matcostname;
                    $dataexcel[$icount]['subcostcodelabor'] =  trim($dataarray[$i]['subcostcodelabor']);
                    $dataexcel[$icount]['subcostnamelabor'] =  $labcostname;
                    $dataexcel[$icount]['newmatcode'] =  trim($dataarray[$i]['newmatcode']);
                    $dataexcel[$icount]['newmatnamee'] =  trim($dataarray[$i]['newmatnameim']);
                    $dataexcel[$icount]['matcodelabor'] =  trim($dataarray[$i]['matcodelabor']);
                    $dataexcel[$icount]['matnamelabor'] =  trim($dataarray[$i]['newmatnamelabor']);
                    $dataexcel[$icount]['boqcode'] =  trim($dataarray[$i]['boqcode']);
                    $dataexcel[$icount]['matboq'] =  trim($dataarray[$i]['matboq']);
                    $dataexcel[$icount]['unitcode'] =  trim($unitcode);
                    $dataexcel[$icount]['unitname'] =  trim($unit_name);
                    $dataexcel[$icount]['qty_bg'] = parse_num($dataarray[$i]['qty_bg']);
                    $dataexcel[$icount]['matpricebg'] = parse_num($dataarray[$i]['matpricebg']);
                    $dataexcel[$icount]['matamtbg'] = parse_num($dataarray[$i]['matamtbg']);
                    $dataexcel[$icount]['labpricebg'] = parse_num($dataarray[$i]['labpricebg']);
                    $dataexcel[$icount]['labamtbg'] = parse_num($dataarray[$i]['labamtbg']);
                    $dataexcel[$icount]['subpricebg'] = parse_num($dataarray[$i]['subpricebg']);
                    $dataexcel[$icount]['subamtbg'] = parse_num($dataarray[$i]['subamtbg']);
                    $dataexcel[$icount]['totalamt'] = parse_num($dataarray[$i]['bgtotal']);
                    $dataexcel[$icount]['qtyboq'] =  parse_num($dataarray[$i]['qtyboq']);
                    $dataexcel[$icount]['matpriceboq'] = parse_num($dataarray[$i]['matpriceboq']);
                    $dataexcel[$icount]['matamtboq'] = parse_num($dataarray[$i]['matamtboq']);
                    $dataexcel[$icount]['labpriceboq'] = parse_num($dataarray[$i]['labpriceboq']);
                    $dataexcel[$icount]['labamtboq'] = parse_num($dataarray[$i]['labamtboq']);
                    $dataexcel[$icount]['subpriceboq'] = parse_num($dataarray[$i]['subpriceboq']);
                    $dataexcel[$icount]['subamtboq'] = parse_num($dataarray[$i]['subamtboq']);
                    $dataexcel[$icount]['totalamtboq'] = parse_num($dataarray[$i]['boqtotal']);
                    $dataexcel[$icount]['status'] = "N";
                    $dataexcel[$icount]['revise'] =  "0";
                    $dataexcel[$icount]['compcode'] = $compcode;
                    $dataexcel[$icount]['adduser'] = $username;
                    $dataexcel[$icount]['adduser_id'] = $m_id;
                    $dataexcel[$icount]['adddate'] = date("Y-m-d");
                    $dataexcel[$icount]['status_boq'] =  "N";
                    $dataexcel[$icount]['project_code'] =  $pjid;
	            // );
	            $this->db->insert_batch('boq_item',$dataexcel);
              $pimary = $this->db->insert_id();

               }
	              
	           }
	    }


      function bottoexcelcostcode($dataarray) {
              
              $this->db->empty_table('cost_subgroup');

              $session_data = $this->session->userdata('sessed_in');
              $username = $session_data['username'];
              $compcode = $session_data['compcode'];
                for($i=0;$i<count($dataarray);$i++){
                  if($dataarray[$i]['costcode1']!="Costcode1"){
                    $data = array(
                      'ctype_code' => $dataarray[$i]['costcode1'],
                      'ctype_name' => $dataarray[$i]['costname1'],
                      'cgroup_code' => $dataarray[$i]['costcode2'],
                      'cgroup_name' => $dataarray[$i]['costname2'],
                      'csubgroup_code' => $dataarray[$i]['costcode3'],
                      'csubgroup_name' => $dataarray[$i]['costname3'],
                      'cgroup_code4' => $dataarray[$i]['costcode4'], 
                      'cgroup_name4' => $dataarray[$i]['costname4'],
                      'cgroup_code5' => $dataarray[$i]['costcode5'],
                      'cgroup_name5' => $dataarray[$i]['costname5'],
                      'costcode_d' => $dataarray[$i]['costcode_d'],
                      'cosrcode_h' => $dataarray[$i]['costcode_h'],
                      'costhead' => $dataarray[$i]['costhead'],
                      'csubgroup_status' => 'yes',
                      'cost_status' => 'N',
                      'createdate' => date("Y-m-d"),
                      'compcode' => $compcode,
                      'user' =>$username,
                    );
                    $this->db->insert('cost_subgroup',$data);

                  }
                }
      }
	    public function getboq($compcode){
        $this->db->select('*');
        $this->db->where('compcode',$compcode);
        $query = $this->db->get('member');
        $res = $query->result();
        return $res;
      }
      public function uploadcompany($dataarray){
          echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray['cells'][$i][1]!="" && $dataarray['cells'][$i][1]!="company_taxnum"){
            $data = array(
              'company_taxnum' =>$dataarray['cells'][$i][1],
              'company_name' => $dataarray['cells'][$i][2],
              'company_address' =>  $dataarray['cells'][$i][3],
              'company_tel' =>  $dataarray['cells'][$i][4],
              'company_fax' =>  $dataarray['cells'][$i][5],
              'company_email' =>  $dataarray['cells'][$i][6],
              'company_contact' =>  $dataarray['cells'][$i][7],
              'compcode' =>  $dataarray['cells'][$i][8],
              'company_nameth' =>  $dataarray['cells'][$i][9],
              'company_add_en' =>  $dataarray['cells'][$i][10],
              'company_address2' =>  $dataarray['cells'][$i][11],
              'company_telen' =>  $dataarray['cells'][$i][4],
              'company_faxen' =>  $dataarray['cells'][$i][5],
              'company_emailen' =>  $dataarray['cells'][$i][6],
              'company_contacten' =>  $dataarray['cells'][$i][7],
              'company_taxnumen' =>  $dataarray['cells'][$i][8],
            );
            $this->db->insert('company',$data);
            // echo json_encode($data);
            }
          }
      }
      public function uploadmat($dataarray){
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['matunit_code']!=""){
              $data = array(
                'matunit_code' =>$dataarray[$i]['matunit_code'],
                'matunit_name' => $dataarray[$i]['matunit_name'],
                'matspec_code' =>  $dataarray[$i]['matspec_code'],
                'matspec_status' =>  $dataarray[$i]['matspec_status'],
                'mattype_code' =>  $dataarray[$i]['mattype_code'],
                'matgroup_code' =>  $dataarray[$i]['matgroup_code'],
                'matsubgroup_code' =>  $dataarray[$i]['matsubgroup_code'],
                'matcode' =>  $dataarray[$i]['matcode'],
                'matbrand_code' =>  $dataarray[$i]['matbrand_code'],
                'compcode' =>  $dataarray[$i]['compcode'],
                'materialcode' =>  $dataarray[$i]['materialcode'],
                'materialname' =>  $dataarray[$i]['materialname'],
                'materialspacname' =>  $dataarray[$i]['materialspacname'],
                'materialbrandname' =>  $dataarray[$i]['materialbrandname'],
              );
              $this->db->insert('mat_unit',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadunit($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['unit_code']!=""){
              $data = array(
                'unit_code' =>$dataarray[$i]['unit_code'],
                'unit_name' => $dataarray[$i]['unit_name'],
                'compcode' =>  $dataarray[$i]['compcode'],
                'user' =>  $username,
              );
              $this->db->insert('unit',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploademployee($data){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($data);$i++){
          if($data['cells'][$i][1]!="" && $data['cells'][$i][1]!="m_code"){
              $dataa = array(
                'm_code' => $data['cells'][$i][1],
                'm_name' => $data['cells'][$i][2],
                'm_user' => $data['cells'][$i][3],
                'm_pass' => sha1(sha1(md5($data['cells'][$i][4]))),
                'm_position' => $data['cells'][$i][5],
                'm_type' => $data['cells'][$i][6],
                'm_email' => $data['cells'][$i][7],
                'm_tel' => $data['cells'][$i][8],
                'compcode' =>   $compcode,
              );
              
              $this->db->insert('member',$dataa);
              // echo json_encode($dataa);
          }
        }
      }
      public function uploadpjjob($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['systemcode']!=""){
              $data = array(
                'systemcode' =>$dataarray[$i]['systemcode'],
                'systemname' => $dataarray[$i]['systemname'],
                'compcode' =>  $compcode,
                'useradd' =>  $compcode,
                'sys_active' => 'Y',
              );
              $this->db->insert('system',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadacchart($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['act_code']!=""){
              $data = array(
                'act_code' =>$dataarray[$i]['act_code'],
                'act_name' => $dataarray[$i]['act_name'],
                'act_header' =>$dataarray[$i]['act_header'],
                'act_acc_h' => $dataarray[$i]['act_acc_h'],
                'compcode' =>  $compcode,
                'useradd' =>  $username,
                'act_status' => 'on',
              );
              $this->db->insert('account_total',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadaccbank($dataarray,$dataarray2,$dataarray3){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['bank_code']!=""){
              $data = array(
                'bank_code' =>$dataarray[$i]['bank_code'],
                'branch_code' => $dataarray[$i]['branch_code'],
                'acc_name' =>$dataarray[$i]['acc_name'],
                'acc_type' => $dataarray[$i]['acc_type'],
                'compcode' =>  $compcode,
                'user_add' =>  $username,
              );
              $this->db->insert('bank_account',$data);
              // echo json_encode($data);
          }
        }
        for($i=0;$i<count($dataarray2);$i++){
          if($dataarray2[$i]['branch_code']!=""){
              $data2 = array(
                'bank_code' =>$dataarray2[$i]['bank_code'],
                'branch_code' =>$dataarray2[$i]['branch_code'],
                'branch_name' => $dataarray2[$i]['branch_name'],
                'branch_addr' =>$dataarray2[$i]['branch_address'],
                'compcode' =>  $compcode,
                'user_add' =>  $username,
              );
              $this->db->insert('bank_branch',$data2);
              // echo json_encode($data2);
          }
        }
        for($i=0;$i<count($dataarray3);$i++){
          if($dataarray3[$i]['bank_code']!=""){
              $data3 = array(
                'bank_code' =>$dataarray3[$i]['bank_code'],
                'bank_name' => $dataarray3[$i]['bank_name'],
                'bank_addr' =>$dataarray3[$i]['bank_address'],
                'compcode' =>  $compcode,
                'user_add' =>  $username,
              );
              $this->db->insert('bank',$data3);
              // echo json_encode($data3);
          }
        }
      }
      public function uploadoptional($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['op_code']!=""){
              $data = array(
                'op_code' =>$dataarray[$i]['op_code'],
                'op_name' => $dataarray[$i]['op_name'],
                // 'status_open' =>  '',
              );
              $this->db->insert('option_type',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadwtsetup($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['id_wt']!=""){
              $data = array(
                'id_wt' =>$dataarray[$i]['id_wt'],
                'name_wt' => $dataarray[$i]['name_wt'],
                'per_wt' => $dataarray[$i]['per_wt'],
                'user' =>  $username,
              );
              $this->db->insert('setupwt',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadvenderlist($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['vender_code']!=""){
              $data = array(
                'vender_code' =>$dataarray[$i]['vender_code'],
                'vender_name' => $dataarray[$i]['vender_name'],
                'vender_address' => $dataarray[$i]['vender_address'],
                'vender_tel' => $dataarray[$i]['vender_tel'],
                'vender_fax' => $dataarray[$i]['vender_fax'],
                'vender_tax' => $dataarray[$i]['vender_tax'],
                'vender_taxtype' => $dataarray[$i]['vender_taxtype'],
                'vender_credit' => $dataarray[$i]['vender_credit'],
                'vender_sale' => $dataarray[$i]['vender_sale'],
                'vender_size' => $dataarray[$i]['vender_size'],
                'vender_type' => $dataarray[$i]['vender_type'],
                'vat' =>  $dataarray[$i]['vat'],
                'vender_mobile' =>  $dataarray[$i]['mobile'],
                'compcode' => $compcode,
                'useradd' => $username,
              );
              $this->db->insert('vender',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadexpense($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['expens_code']!=""){
              $data = array(
                'expens_code' =>$dataarray[$i]['expens_code'],
                'expens_name' => $dataarray[$i]['expens_name'],
                'active' => 'true',
                'adduser' => $username,
              );
              $this->db->insert('ap_expensother',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadlessother($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['id_lessother']!=""){
              $data = array(
                // 'id_lessother' =>$dataarray[$i]['id_lessother'],
                'less_name' => $dataarray[$i]['less_name'],
                'less_ac' =>$dataarray[$i]['less_ac'],
                'less_costcode' => $dataarray[$i]['less_costcode'],
                'less_tax' =>$dataarray[$i]['less_tax'],
                'less_taxtype' => $dataarray[$i]['less_taxtype'],
                'less_costname' => $dataarray[$i]['less_costname'],
                'status' => 'Y',
                'addby' => $username,
                'compcode' => $compcode,
              );
              $this->db->insert('less_other',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploaddebtor($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['debtor_code']!=""){
              $data = array(
                // 'id_lessother' =>$dataarray[$i]['id_lessother'],
                'debtor_code' => $dataarray[$i]['debtor_code'],
                'debtor_name' =>$dataarray[$i]['debtor_name'],
                'debtor_address' => $dataarray[$i]['debtor_address'],
                'debtor_tel' =>$dataarray[$i]['debtor_tel'],
                'debtor_fax' => $dataarray[$i]['debtor_fax'],
                'debtor_tax' => $dataarray[$i]['debtor_tax'],
                'debtor_taxtype' => $dataarray[$i]['debtor_taxtype'],
                'debtor_credit' => $dataarray[$i]['debtor_credit'],
                'debtor_sale' => $dataarray[$i]['debtor_sale'],
                'debtor_worktype' => $dataarray[$i]['debtor_worktype'],
                'debtor_size' => $dataarray[$i]['debtor_size'],
                'debtor_status' => 'on',
                'useradd' => $username,
                'compcode' => $compcode,
              );
              $this->db->insert('debtor',$data);
              // echo json_encode($data);
          }
        }
      }
      public function uploadglbook($dataarray){
        $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
          $username = $session_data['username'];
        // echo json_encode($dataarray);
        for($i=0;$i<count($dataarray);$i++){
          if($dataarray[$i]['bookcode']!=""){
              $data = array(
                // 'id_lessother' =>$dataarray[$i]['id_lessother'],
                'bookcode' => $dataarray[$i]['bookcode'],
                'booknamz' =>$dataarray[$i]['booknamz'],
                'gl_type' => $dataarray[$i]['gl_type'],
                'active' => 'Y',
                'adduser' => $username,
                'compcode' => $compcode,
              );
              $this->db->insert('gl_book',$data);
              // echo json_encode($data);
          }
        }
      }
}