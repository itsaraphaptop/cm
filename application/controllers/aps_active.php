<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class aps_active extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->helper('date');
        }
        public function addaps()
        {
        	$session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          $aps = "aps";
          try {
            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('aps_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $apscode = "APS".date($datestring).date($mm)."000"."1";
                $aps_item ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('aps_item','desc');
               $this->db->limit('1');
               $q = $this->db->get('aps_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->aps_item+1;
               }

               if ($x1<=9) {
                  $apscode = "APS".date($datestring).date($mm)."000".$x1;
                  $aps_item = $x1;
               }
               elseif ($x1<=99) {
                 $apscode = "APS".date($datestring).date($mm)."00".$x1;
                 $aps_item = $x1;
               }
               elseif ($x1<=999) {
                 $apscode = "APS".date($datestring).date($mm)."0".$x1;
                 $aps_item = $x1;
               }
             }
             // add headeer
             	$data = array(
             		'aps_code' => $apscode,
             		'aps_item' => $aps_item,
             		'aps_lono' => $add['loino'],
             		'aps_period' => $add['period'],
             		'aps_contact' => $add['subcon'],
             		'aps_date' => $add['apsdate'],
             		'aps_project' => $add['projid'],
             		'aps_department' => $add['depid'],
             		'aps_system' => $add['apssystem'],
             		'aps_invno' => $add['invno'],
             		'aps_invdate' => $add['invdate'],
             		'aps_amount' => $add['amth'],
             		'aps_vatper' => $add['vat'],
             		'aps_vattot' => $add['invamth'],
                'aps_wt' => $add['wt'],
                'aps_wttot' => $add['wtamt'],
                'aps_retention' => $add['retenrion'],
                'aps_netamt' => $add['netamth'],
                'aps_totnetamt' => $add['netamteh'],
                'aps_remark' => $add['remark'],
                'adduser' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode 
             		);
             	$this->db->insert('aps_header',$data);
             // add detail
	            for ($i=0; $i < count($add['qtyi']); $i++) {
	            	$data_d = array(
	            		'apsi_ref'=> $apscode,
	            		'apsi_matcode' => $add['matidi'][$i],
	            		'apsi_matname' => $add['matnamei'][$i],
	            		'apsi_costcode' => $add['costidi_gl'][$i],
	            		'apsi_costname' => $add['costnamei_gl'][$i],
	            		'apsi_qty' => $add['qtyi'][$i],
	            		'apsi_amount' => $add['amounti'][$i],
	            		'apsi_unit' => $add['uniti'][$i],
	            		'apsi_amount' => $add['amounti'][$i],
	            		'adduser' => $username,
	            		'createdate' => date('Y-m-d H:i:s',now()),
	            		'compcode' => $compcode
	            		);
	            	$this->db->insert('aps_detail',$data_d);
	            }

              for ($i=0; $i < count($add['accno_gl']); $i++) {
                $data_c = array(
                  'vchno'=> $apscode,
                  'vchdate' => $add['apsdate'],
                  'doctype' => $aps,
                  'acct_no' => $add['accno_gl'][$i],
                  'projectid' => $add['projid'],
                  'systemcode' => $add['apssystem'],
                  'amtdr' => $add['dr_gl'][$i],
                  'amtcr' => $add['cr_gl'][$i],
                  'vatper' => $add['vat'],
                  'vatamt' => $add['invamt'],
                  'glyear' => date('Y'),
                  'glperiod' => date('m'),
                  'completegl' => 'N',
                  'costcode' => $add['costidi_gl'][$i],
                  'matcode' => $add['matidi_gl'][$i],
                  'matname' => $add['matnamei_gl'][$i],         
                  'adduser' => $username,
                  'createdate' => date('Y-m-d H:i:s',now()),
                  'compcode' => $compcode
                  );
                $this->db->insert('ap_gl',$data_c);
              }

	         // update LOI
	            if ($add['netamteh']!=0) {
	            	$upd_loi_h = array(
	            	'period' => $add['period']+1,
	            	'period_amt' => $add['netamteh']
	            	);
	            $this->db->where('lo_lono',$add['loino']);
	            $this->db->update('lo',$upd_loi_h);
	            }else{
	            $upd_loi_h = array(
	            	'period' => $add['period']+1,
	            	'period_amt' => $add['netamteh'],
	            	'status' => "open"
	            	);
	            $this->db->where('lo_lono',$add['loino']);
	            $this->db->update('lo',$upd_loi_h);
	        	}
	            redirect('ap/edit_aps/'.$apscode."/".$add['loino']."/".$add['period']);
              
             // /test
        } catch (Exception $e) {
            echo $e;
        }
      }
      public function editaps()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $apscode = $this->input->post('apsno');
          $add = $this->input->post();
          try {
           
             // add headeer
              $data = array(
                'aps_date' => $add['apsdate'],
                // 'aps_project' => $add['projid'],
                // 'aps_department' => $add['depid'],
                'aps_system' => $add['apssystem'],
                'aps_invno' => $add['invno'],
                'aps_invdate' => $add['invdate'],
                'aps_amount' => $add['amth'],
                'aps_vatper' => $add['vat'],
                'aps_vattot' => $add['invamth'],
                'aps_wt' => $add['wt'],
                'aps_wttot' => $add['wtamt'],
                'aps_retention' => $add['retenrion'],
                'aps_netamt' => $add['netamth'],
                'aps_totnetamt' => $add['netamteh'],
                'aps_remark' => $add['remark'],
                'adduser' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
                );
              $this->db->where('aps_code',$apscode);
              $this->db->update('aps_header',$data);
              $apsiid = $this->input->post('apsiid');

              for ($i=0; $i < count($add['qtyi']); $i++) {
                if($add['chki'][$i]=="I"){
                $data_d = array(
                  'apsi_matcode' => $add['matidi'][$i],
                  'apsi_matname' => $add['matnamei'][$i],
                  'apsi_costcode' => $add['costidi'][$i],
                  'apsi_costname' => $add['costnamei'][$i],
                  'apsi_qty' => $add['qtyi'][$i],
                  'apsi_unit' => $add['uniti'][$i],
                  'apsi_amount' => $add['amounti'][$i],
                  'adduser' => $username,
                  'createdate' => date('Y-m-d H:i:s',now()),
                  );
                $this->db->where('apsi_id',$apsiid[$i]);
                $this->db->update('aps_detail',$data_d);
              }            

              for ($i=0; $i < count($add['accno_gl']); $i++) {
                $data_c = array(
                  'vchno'=> $apscode,
                  'vchdate' => $add['apsdate'],
                  'doctype' => $aps,
                  'acct_no' => $add['accno_gl'][$i],
                  'projectid' => $add['projid'],
                  'systemcode' => $add['apssystem'],
                  'amtdr' => $add['dr_gl'][$i],
                  'amtcr' => $add['cr_gl'][$i],
                  'vatper' => $add['vat'],
                  'vatamt' => $add['invamt'],
                  'glyear' => date('Y'),
                  'glperiod' => date('m'),
                  'completegl' => 'N',
                  'costcode' => $add['costidi_gl'][$i],
                  'matcode' => $add['matidi_gl'][$i],
                  'matname' => $add['matnamei_gl'][$i],         
                  'adduser' => $username,
                  'createdate' => date('Y-m-d H:i:s',now()),
                  'compcode' => $compcode
                  );
                $this->db->where('id_apgl',$add['id_apgl'][$i]);
                $this->db->update('ap_gl',$data_c);
              }
            }
          
              redirect('ap/edit_aps/'.$apscode."/".$add['loino']."/".$add['period']);
              
             // /test
        } catch (Exception $e) {
             echo $e;
        }
      }

      public function approve_paid_aps()
      {
        $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
        try {
          $add = $this->input->post();
           $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('ap_billsuc_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $pvcode = "PV".date($datestring).date($mm)."000"."1";
               $apono ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('apo_no','desc');
               $this->db->limit('1');
               $q = $this->db->get('pv_apo_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->apo_no+1;
               }
              //  $pvcode = "PV".date($datestring).date($mm).date($dd).$x1;
              //  $apono=$x1;
               if ($x1<=9) {
                  $pvcode = "PV".date($datestring).date($mm)."000".$x1;
                  $apono=$x1;
               }
               elseif ($x1<=99) {
                 $pvcode = "PV".date($datestring).date($mm)."00".$x1;
                 $apono=$x1;
               }
               elseif ($x1<=999) {
                 $pvcode = "PV".date($datestring).date($mm)."0".$x1;
                 $apono=$x1;
               }

             }
              $data = array(
               'apo_code' => $pvcode,
               'apo_no' => $apono,
               'apo_vender' => $add['vcode'],
               'apo_project'=> $add['projectid'],
               'apo_system' => $add['aposystem'],
               'apo_department' => $add['departmenttid'],
               'apo_date' => $add['apodate'],
               'apo_doctype' => 'aps',
               'apo_bankcode' => $add['bankid'],
               'apo_branchcode' => $add['branchid'],
               'apo_bankaccount' => $add['acid'],
               'apo_remark' => $add['remark'],
               'apo_useradd' => $username,
               'apo_createdate' => date('Y-m-d H:i:s',now()),
               'compcode' => $compcode,
             );
             $this->db->insert('pv_apo_header',$data);

             for ($i=0; $i < count($add['chki']); $i++) {
               if ($add['chki'][$i]!="") {
                 $data_d = array(
                   'doci_ref' => $pvcode,
                   'doci_apcvcode' => $add['apscodei'][$i],
                   'doci_pono' => $add['lonoi'][$i],
                   'doci_date' => $add['datei'][$i],
                   'doci_netamt' => $add['netamti'][$i],
                   'doci_chk' => "Y",
                   'compcode' => $compcode,
                   'useradd' => $username,
                   'createdate'=> date('Y-m-d H:i:s',now()),
                 );
                 $this->db->insert('pv_apo_detail',$data_d);
                 $up_d = array(
                   'aps_status' => "approve"
                 );
                 $this->db->where('aps_code',$add['apscodei'][$i]);
                 $this->db->update('aps_header',$up_d);
               }
               else{

               }

             }
             redirect('ap/edit_approve_aps/'.$add['vcode'].'/'.$pvcode);
        } catch (Exception $e) {
          
        }
      } 

       public function load_apstable()
            {
            $ref = $this->uri->segment(3);
            $this->load->model('datastore_m');
            $data['prd'] = $this->datastore_m->table_apstable($ref);
             $this->load->view('office/account/ap/aps/load_apstable',$data);
            }

      public function load_detaillo()
            {
            $ref = $this->uri->segment(3);
            $this->load->model('datastore_m');
            $data['prd'] = $this->datastore_m->table_apstablelodetail($ref);
             $this->load->view('office/account/ap/aps/load_dataillo',$data);
            }

       public function progress_history()
            {
            $ref = $this->uri->segment(3);
            $this->load->model('datastore_m');
            $data['prd'] = $this->datastore_m->table_apstablelodetail($ref);
             $this->load->view('office/account/ap/aps/progress_history',$data);
            }


      public function load_apstableGL()
            {
            $ref = $this->uri->segment(3);
            $data['vendid'] = $this->uri->segment(4);
            $this->load->model('datastore_m');
            $data['prd'] = $this->datastore_m->table_apstable($ref);
            $this->load->view('office/account/ap/aps/load_apstableGL',$data);
            }

      public function load_bill_subcon_v()
            {
            $this->load->model('datastore_m');
            $data['prd'] = $this->datastore_m->table_lo();
            $this->load->view('office/account/ap/aps/load_bill_subcon_v',$data);
            }

      public function delsub(){
          $id = $this->uri->segment(3);
          $this->db->where('ap_bill_code',$id);
          $this->db->delete('ap_billsuc_header');

          $this->db->where('ap_bill_no',$id);
          $this->db->delete('ap_billsuc_detail');

          redirect('pr/open_billsubc');
      }
            

      public function description_aps()
      {
        $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $code = $this->input->post('ap_bill_contractno');
          $ap_bill_type = $this->input->post('ap_bill_typee');
          $ap_period = $this->input->post('ap_period');
        try {
        $add = $this->input->post();
           $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('ap_billsuc_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $FID = "S".date($datestring).date($mm)."000"."1";
               $apono ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('ap_bill_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('ap_billsuc_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->ap_bill_id+1;
               }
              //  $FID = "PV".date($datestring).date($mm).date($dd).$x1;
              //  $apono=$x1;
               if ($x1<=9) {
                  $FID = "S".date($datestring).date($mm)."000".$x1;
                  $apono=$x1;
               }
               elseif ($x1<=99) {
                 $FID = "S".date($datestring).date($mm)."00".$x1;
                 $apono=$x1;
               }
               elseif ($x1<=999) {
                 $FID = "S".date($datestring).date($mm)."0".$x1;
                 $apono=$x1;
               }

             }

             if (isset($add['ap_redown'])) {
               $redown = 0;
              }else{
                $redown = $add['ap_redown'];
             }
             if (isset($add['ap_vat'])) {
               $ap_vat = 0;
              }else{
                $ap_vat = $add['ap_vat'];
             }
         if ($add['ap_bill_typee']=="1") {
              $data = array( 
               'ap_bill_contractno' => $add['ap_bill_contractno'],        
               'ap_bill_project' => $add['ap_bill_project'],
               'ap_bill_vender'=> $add['ap_bill_vender'],              
               'ap_contracttype' => $add['ap_contracttype'],
               'ap_bill_datatype' => $add['ap_bill_datatype'],
               'ap_contractamount' => $add['ap_contractamount'],
               'ap_progressamount' => $add['ap_progressamount'],
               // 'ap_cerrency' => $add['ap_cerrency'],
               // 'ap_exchange' => $add['ap_exchange'],
               // 'ap_costcode' => $add['ap_costcode'],
               'ap_advanceper' => $add['ap_advanceper'],
               'ap_advanceamount'=> $add['ap_advanceamount'],
               'ap_retentionper' => $add['ap_retentionper'],
               'ap_retentionamount' => $add['ap_retentionamount'],
               'ap_progress_billper' => $add['ap_progress_billper'],
               'ap_bill_code' => $FID,
               'ap_bill_date' => $add['ap_bill_date'],
               'ap_bill_duedate' => $add['ap_bill_duedate'],
               'ap_retention_balance' => $add['ap_retention_balance'],
               'ap_bill_type' => $add['ap_bill_typee'],
               'ap_progress_bill'=> $add['ap_progress_bill'],
               'ap_advance_bill' => $add['ap_advance_bill'],
               'ap_retention_progress' => $add['ap_retention_progress'],
               'ap_deduct_mat_bill' => $add['ap_deduct'],
               'ap_retention_acc' => $add['ap_retention_acc'],
               'ap_owner' => $add['ap_bill_vender'],
               'ap_vender_name' => $add['ap_bill_vendername'],
               'ap_period' => $add['ap_period'],
               'ap_bill_inv' => $add['ap_bill_inv'],
               'ap_bill_tax' => $add['ap_bill_taxin'],
               'ap_bill_invdate'=> $add['ap_bill_invdate'],
               'ap_bill_crterm' => $add['ap_bill_crterm'],
               'ap_payto' => $add['ap_payto'],
               'ap_pay' => $add['ap_pay'],
               'ap_payper' => $add['ap_payper'],
              //  'ap_compwork' => $add['ap_compwork'],
               'ap_deduct_mat' => $add['ap_deduct'],
              //  'ap_branch' => $add['ap_branch'],
               'ap_redown' => $redown,
               'ap_redownper' => $add['ap_redownper'],
               'ap_vat' => $ap_vat,
               'ap_vatper' => $add['ap_vatper'],
               'ap_deduct_ret'=> $add['ap_deduct_ret'],
               'ap_deduct_retper' => $add['ap_deduct_retper'],
               'ap_wt' => $add['ap_wt'],
               'ap_wtper' => $add['ap_wtper'],
               'ap_wtamount' => $add['ap_wtamount'],
               'ap_amount' => $add['ap_amount'],
              //  'ap_before_less' => $add['ap_before_less'],         
              //  'ap_after_less' => $add['ap_after_less'],
               'ap_remark' => $add['ap_remark'],
               'ap_paydate'=> $add['ap_paydate'],
              //  'ap_voucherno' => $add['ap_voucherno'],
               'ap_frome' => $add['ap_frome1'],
               'ap_status' => "N",
               'ap_amountdown'  => $add['ap_amountdown'],
               'ap_amount_total' => $add['ap_amount2'],
               'ap_system' => $add['ap_bill_systemcode'],
               'ap_deduct' => $add['ap_deduct'],
               'createuser' => $username,
               'createdate' => date('Y-m-d H:i:s',now()),
               'compcode' => $compcode,
             );
             $this->db->insert('ap_billsuc_header',$data);

             for ($i=0; $i < count($add['chki']); $i++) {
               if ($add['chki'][$i]=="") {
                 $data_d = array(
                   'ap_bill_no' => $FID,
                   'api_bill_ref' => $add['ap_bill_contractno'],
                   'api_costcode' => $add['api_costcode'][$i],
                   'api_costname' => $add['api_costname'][$i],
                   'api_matcode' => $add['api_matcode'][$i],
                  //  'api_desc' => $add['api_desc'][$i],
                   'api_remark' => $add['api_remark'][$i],
                   'api_assetcode' => $add['api_assetcode'][$i],
                   'api_qty' => $add['api_qty'][$i],
                   'api_unit' => $add['api_unit'][$i],
                   'api_price' => $add['api_price'][$i],
                   'api_amount' => $add['api_amount'][$i],
                  //  'api_balance' => $add['api_balance'][$i],
                   'api_thisqty' => isset($add['api_thisqty'][$i]),
                   'api_thisamount' => $add['api_thisamount'][$i],
                  //  'api_previousqty' => $add['api_previousqty'][$i],
                  //  'api_previousamount' => $add['api_previousamount'][$i],
                   'api_matname' => $add['api_matname'][$i],


                   'createuser' => $username,
                   'createdate' => date('Y-m-d H:i:s',now()),
                 );
                 $this->db->insert('ap_billsuc_detail',$data_d);
               }
             }

             for ($i=0; $i < count($add['chki']); $i++) {
               if ($add['api_balance'][$i]=="") {
                 $data_c = array(
                   'ap_billsucamout'=>$add['api_amount'][$i]-$add['api_thisamount'][$i],
                    'previousqty' => $add['api_thisqty'][$i]+$add['api_previousqty'][$i],
                    'previousamount' => $add['api_thisamount'][$i],
                 );
                 $this->db->where('lo_idd',$add['lo_idd'][$i]);
                $this->db->update('lo_detail',$data_c);
               }else if ($add['api_balance'][$i]!="0") {
                $data_d = array(
                   'ap_billsucamout'=>$add['api_balance'][$i]-$add['api_thisamount'][$i],
                   'previousqty' => $add['api_thisqty'][$i]+$add['api_previousqty'][$i],
                   'previousamount' => $add['api_thisamount'][$i]+$add['api_previousamount'][$i],
                 );
                 $this->db->where('lo_idd',$add['lo_idd'][$i]);
                $this->db->update('lo_detail',$data_d);
               }
             }

          
             
          }else if ($add['ap_bill_typee']=="2") {
              $data = array( 
               'ap_bill_contractno' => $add['ap_bill_contractno'],        
               'ap_bill_project' => $add['ap_bill_project'],
               'ap_bill_vender'=> $add['ap_bill_vender'],              
               'ap_contracttype' => $add['ap_contracttype'],
               'ap_bill_datatype' => $add['ap_bill_datatype'],
               'ap_contractamount' => $add['ap_contractamount'],
               'ap_progressamount' => $add['ap_progressamount'],
              //  'ap_cerrency' => $add['ap_cerrency'],
              //  'ap_exchange' => $add['ap_exchange'],
              //  'ap_costcode' => $add['ap_costcode'],
               'ap_advanceper' => $add['ap_advanceper'],
               'ap_advanceamount'=> $add['ap_advanceamount'],
               'ap_retentionper' => $add['ap_retentionper'],
               'ap_retentionamount' => $add['ap_retentionamount'],
               'ap_bill_code' => $FID,
               'ap_progress_billper' => $add['ap_progress_billper'],
               'ap_bill_date' => $add['ap_bill_date'],
               'ap_bill_duedate' => $add['ap_bill_duedate'],
               'ap_retention_balance' => $add['ap_retention_balance'],
               'ap_bill_type' => $add['ap_bill_typee'],
               'ap_progress_bill'=> $add['ap_progress_bill'],
               'ap_advance_bill' => $add['ap_advance_bill'],
               'ap_retention_progress' => $add['ap_retention_progress'],
               'ap_deduct_mat_bill' => $add['ap_deduct'],
               'ap_retention_acc' => $add['ap_retention_acc'],
               'ap_owner' => $add['ap_bill_vender'],
               'ap_vender_name' => $add['ap_bill_vendername'],
               'ap_period' => $add['ap_period'],
               'ap_bill_inv' => $add['ap_bill_inv'],
               'ap_bill_tax' => $add['ap_bill_taxin'],
               'ap_bill_invdate'=> $add['ap_bill_invdate'],
               'ap_bill_crterm' => $add['ap_bill_crterm'],
               'ap_payto' => $add['ap_payto'],
               'ap_pay' => $add['ap_pay'],
               'ap_amount' => $add['ap_pay'],
               'ap_payper' => $add['ap_payper'],
               'ap_frome' => $add['ap_frome1'],
               'ap_amountdown'  => $add['ap_amountdown'],
               'ap_amount_total' => $add['ap_amount2'],
               'ap_deduct' => $add['ap_deduct'],
               'ap_status' => "N",
               'ap_redown' => $redown,
               'ap_redownper' => $add['ap_redownper'],
               'ap_system' => $add['ap_bill_systemcode'],
               'createuser' => $username,
               'createdate' => date('Y-m-d H:i:s',now()),
               'compcode' => $compcode,
             );
             $this->db->insert('ap_billsuc_header',$data);
            }else if($add['ap_bill_typee']=="3") {
              $data = array( 
               'ap_bill_contractno' => $add['ap_bill_contractno'],        
               'ap_bill_project' => $add['ap_bill_project'],
               'ap_bill_vender'=> $add['ap_bill_vender'],              
               'ap_contracttype' => $add['ap_contracttype'],
               'ap_bill_datatype' => $add['ap_bill_datatype'],
               'ap_contractamount' => $add['ap_contractamount'],
               'ap_progressamount' => $add['ap_progressamount'],
               'ap_cerrency' => $add['ap_cerrency'],
               'ap_exchange' => $add['ap_exchange'],
               'ap_costcode' => $add['ap_costcode'],
               'ap_advanceper' => $add['ap_advanceper'],
               'ap_advanceamount'=> $add['ap_advanceamount'],
               'ap_retentionper' => $add['ap_retentionper'],
               'ap_retentionamount' => $add['ap_retentionamount'],
               'ap_bill_code' => $FID,
               'ap_progress_billper' => $add['ap_progress_billper'],
               'ap_bill_date' => $add['ap_bill_date'],
               'ap_bill_duedate' => $add['ap_bill_duedate'],
               'ap_retention_balance' => $add['ap_retention_balance'],
               'ap_bill_type' => $add['ap_bill_typee'],
               'ap_progress_bill'=> $add['ap_progress_bill'],
               'ap_advance_bill' => $add['ap_advance_bill'],
               'ap_retention_progress' => $add['ap_retention_progress'],
               'ap_deduct_mat_bill' => $add['ap_deduct_mat_bill'],
               'ap_retention_acc' => $add['ap_retention_acc'],
               'ap_owner' => $add['ap_owner'],
               'ap_period' => $add['ap_period'],
               'ap_bill_inv' => $add['ap_bill_inv'],
               'ap_bill_tax' => $add['ap_bill_tax'],
               'ap_bill_invdate'=> $add['ap_bill_invdate'],
               'ap_bill_crterm' => $add['ap_bill_crterm'],
               'ap_payto' => $add['ap_payto'],
               'ap_pay' => $add['ap_pay'],
               'ap_amount' => $add['ap_pay'],
               'ap_payper' => $add['ap_payper'],
               'ap_frome' => $add['ap_frome1'],
               'ap_amountdown'  => $add['ap_amountdown'],
               'ap_amount_total' => $add['ap_amount2'],
               'ap_deduct' => $add['ap_deduct'],
               'ap_status' => "N",
               'ap_redown' => $redown,
               'ap_redownper' => $add['ap_redownper'],
               'ap_system' => $add['ap_bill_systemcode'],
               'createuser' => $username,
               'createdate' => date('Y-m-d H:i:s',now()),
               'compcode' => $compcode,
             );
             $this->db->insert('ap_billsuc_header',$data);
            }

            if(count($add['xor'])!="0"){
            for ($i=0; $i < count($add['xor']); $i++) {
               if ($add['xor'][$i]=="") {
                 $data_bill = array(
                   'ref_bill_lessother' => $FID,
                   'less_name' => $add['bd_jobno'][$i],
                   'id_bill' => $add['ap_bill_contractno'],
                   'less_amount' => $add['bd_amount'][$i],
                   'less_remark' => $add['bd_remark'][$i],
                   'less_refitem' => $add['bd_refitem'][$i],
                   'ac' => $add['ac'][$i],  
                   'add_by' => $username,
                   'compcode' => $compcode,
                   'add_date' => date('Y-m-d'),
                 );
                 $this->db->insert('bill_lessother',$data_bill);
               }
             }
           }

            if(count($add['deduct_poi_id'])!="0"){
             for ($i=0; $i < count($add['deduct_poi_id']); $i++) {
                 $deduct = array(
                   'deduct_ref' => $FID,
                   'deduct_poi_id' => $add['deduct_poi_id'][$i],
                   'deduct_poi_matcode' => $add['deduct_poi_matcode'][$i],
                   'deduct_poi_qty' => $add['deduct_poi_qty'][$i],
                   'deduct_poi_priceunit' => $add['deduct_poi_priceunit'][$i],
                   'deduct_type' => $add['deduct_type'][$i],
                   'deduct_qty' => $add['deduct_qty'][$i],
                   'deduct_pricesub' => $add['deduct_pricesub'][$i],
                   'deduct_amount' => $add['deduct_amount'][$i],
                   'deduct_remark' => $add['deduct_remark'][$i],
                 );
                 $this->db->insert('deduct_subcontractor',$deduct);

                 if($add['deduct_type'][$i]!=""){
                  $this->db->select('*');
                  $this->db->where('poi_id',$add['deduct_poi_id'][$i]);
                  $item = $this->db->get('po_item')->result();
                  $poi_disamt = 0;
                  $poi_sumdeduct = 0;
                  $poi_ref = "";
                  foreach ($item as $keyitem) {
                    $poi_disamt = $keyitem->poi_disamt;
                    $poi_sumdeduct = $keyitem->poi_sumdeduct;
                    $poi_ref = $keyitem->poi_ref;
                  }

                $data_e = array(
                'poi_sumdeduct' => $poi_sumdeduct + $add['deduct_amount'][$i],
                );
                  $this->db->where('poi_id', $add['deduct_poi_id'][$i]);
                  $this->db->update('po_item', $data_e);

                if ($poi_disamt == number_format($poi_sumdeduct, 2, '.', '') + number_format($add['deduct_amount'][$i], 2, '.', '')) {
                    $data_c = array(
                      'poi_deduct_status' => "open",
                    );
                    $this->db->where('poi_id', $add['deduct_poi_id'][$i]);
                    $this->db->update('po_item', $data_c);
                  }

            
                }

                $this->db->select('*');
                $this->db->where('poi_ref', $poi_ref);
                $this->db->where('poi_deduct_status =', 'no');
                $chkitem = $this->db->get('po_item');
                $num = $chkitem->num_rows();

                if ($num == "0") {
                  $data_f = array(
                    'poi_deduct_status' => "open",
                  );
                  $this->db->where('po_pono', $poi_ref);
                  $this->db->update('po', $data_f);
                }

             }
           }

              
              if ($add['ap_bill_typee']=="1") { 
             
              // redirect('stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_progress.mrt&bill='.$FID.'&ap_period='.$ap_period.'&bill_type='.$ap_bill_type.''); 
              redirect('report/viewerload?type=pg&typ=bill_progr&var1='.$FID.'&var2='.$ap_period.'&var3='.$ap_bill_type.''); 
              }else if ($add['ap_bill_typee']=="2"){
             
              // redirect('stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_down.mrt&bvarill='.$FID.'&ap_period='.$ap_period.'&bill_type='.$ap_bill_type.''); 
              redirect('report/viewerload?type=pg&typ=bill_down&var1='.$FID.'&var2='.$ap_period.'&var3='.$ap_bill_type.''); 
              }else if ($add['ap_bill_typee']=="3"){
             
              // redirect('stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_ret.mrt&bill='.$FID.'&ap_period='.$ap_period.'&bill_type='.$ap_bill_type.''); 
              redirect('report/viewerload?type=pg&typ=bill_ret&var1='.$FID.'&var2='.$ap_period.'&var3='.$ap_bill_type.''); 
              }   
        } catch (Exception $e) {
          
        }
    }

    public function print_sub(){
      $id = $this->uri->segment(3);
      $base_url = $this->config->item("url_report");
      // redirect($base_url.'stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=print_progress.mrt&id='.$id.'');
      redirect('report/viewerload?type=pg&typ=print_prog&var1='.$id.'');
    } 

}
