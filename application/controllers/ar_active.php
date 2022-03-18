<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ar_active extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->Model('ar_m');
            $this->load->model('datastore_m');
            $this->load->helper('date');
        }
        public function add_downpayment()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          try {
            $data = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_inv_header',$data);
            for ($i=0; $i < count($add['vati']); $i++) {
              $datad = array(
                'inv_ref' => $add['invono'],
                'inv_desc' => $add['descrepi'][$i],
                'inv_downamt' => $add['downamti'][$i],
                'inv_vatper' => $add['vatper'],
                'inv_vatamt' => $add['vati'][$i],
                'inv_beforewt' => $add['beforewti'][$i],
                'inv_wtper' => $add['wh'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->insert('ar_inv_detail',$datad);
            }
            redirect('ar/ar_edit_down_payment/'.$add['invono']);

          } catch (Exception $e) {
            echo $e;
          }


        }
        public function edit_downpayment()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $invno = $this->uri->segment(3);
          $add = $this->input->post();
            $data = array(
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'useredit' => $username,
              'editdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode

            );
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_inv_header',$data);
             for ($i=0; $i < count($add['vati']); $i++) {
               if($add['chki'][$i]=="I"){
                 $datad = array(
                'inv_ref' => $add['invono'],
                'inv_desc' => $add['descrepi'][$i],
                'inv_downamt' => $add['downamti'][$i],
                'inv_vatper' => $add['vatper'],
                'inv_vatamt' => $add['vati'][$i],
                'inv_beforewt' => $add['beforewti'][$i],
                'inv_wtper' => $add['wh'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->insert('ar_inv_detail',$datad);
             
            }else{
             
                 $datad = array(
                'inv_desc' => $add['descrepi'][$i],
                'inv_downamt' => $add['downamti'][$i],
                'inv_vatper' => $add['vatper'],
                'inv_vatamt' => $add['vati'][$i],
                'inv_beforewt' => $add['beforewti'][$i],
                'inv_wtper' => $add['wh'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'useredit' => $username,
                'editdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->where('invi_id',$add['ref'][$i]);
              $this->db->update('ar_inv_detail',$datad);
            }
            }

            redirect('ar/ar_edit_down_payment/'.$invno);

        


        }


        public function del_poi($inv_desc){
       $invno = $this->uri->segment(4);
            $this->db->where('inv_desc',$inv_desc);
                $this->db->delete('ar_inv_detail');
                 redirect('ar/ar_edit_down_payment/'.$invno);
                die;
             
    }
        public function del_inv()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          try {
            $invno = $this->uri->segment(3);
            $data = array(
              'inv_status' => "del",
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
            );
            $this->db->where('inv_no',$invno);
            if ($this->db->update('ar_inv_header',$data)) {
              redirect('ar/invoice_archaive');
            }
          } catch (Exception $e) {
            echo $e;
          }
        }
        // ar vorcher
      public function add_arvoucher()
      {
        $add = $this->input->post();
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        try {
          $data = array(
            'vou_no' => $add['vou_no'],
            'vou_date' => $add['ardate'],
            'vou_invno ' => $add['invno'],
            'vou_invdate' => $add['invdate'],
            'vou_invduedate' => $add['duedate'],
            'vou_invtype' => $add['type'],
            'vou_project' => $add['projectid'],
            'vou_owner' => $add['venderid'],
            'vou_contact' => $add['po'],
            'vou_contactamount' => $add['poamt'],
            'vou_period' => $add['period'],
            'vou_credit' => $add['crterm'],
            'vou_vat' => $add['vatper'],
            'vou_wt' => $add['wh'],
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );
          $this->db->insert('ar_voucher_header',$data);
          for ($i=0; $i < count($add['vati']); $i++) {
            $datad = array(
              'vou_ref' => $add['vou_no'],
              'vou_invno' => $add['invno'],
              'vou_desc' => $add['descrepi'][$i],
              'vou_downamt' => $add['downamti'][$i],
              'vou_vatper' => $add['vatper'],
              'vou_vatamt' => $add['vati'][$i],
              'vou_beforewt' => $add['beforewti'][$i],
              'vou_wtper' => $add['wh'],
              'vou_lesswt' => $add['lesswti'][$i],
              'vou_netamt' => $add['netamti'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_voucher_detail',$datad);
          }
          for ($gl=0; $gl < count($add['vatii']); $gl++) {
            $ar_gl = array(
              'vchno' => $add['vou_no'],
              'acct_no' => $add['accno_gl'][$gl],
              'amtdr' => $add['vatii'][$gl],
              'amtcr' => $add['amtcr'][$gl],
              'itemno' => $add['itemno'][$gl],
              'gl_type' => $add['gl_type'],
              'vchdate' => $add['ardate'],
              'glperiod' => $add['period'],
              'adduser' => $username,
              
            );
            $this->db->insert('ar_gl',$ar_gl);
          }

          $ar_gl2 = array(
              'vchno' => $add['vou_no'],
              'acct_no' => $add['accno_gll'],
              'amtdr' => $add['amtdr_v'],
              'amtcr' => $add['amtcr_v'],
              'itemno' => $add['itemno_v'],
              'gl_type' => $add['gl_type_v'],
              'vchdate' => $add['ardate'],
              'glperiod' => $add['period'],
              'adduser' => $username,
            );
          $this->db->insert('ar_gl',$ar_gl2);


          $upinv = array(
            'inv_status' => "vouopen"
          );
          $this->db->where('inv_no',$add['invno']);
          if($this->db->update('ar_inv_header',$upinv))
          {
              redirect('ar/ar_edit_vorcher/'.$add['vou_no']);
          }
          echo "update Inv No."." ".$add['invno']." "."Not Found";


        } catch (Exception $e) {
          echo $e;
        }

      }
          public function edit_arvoucher()
      {
        $add = $this->input->post();
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
          $data = array(
            'vou_date' => $add['ardate'],
            'vou_invno ' => $add['invno'],
            'vou_invdate' => $add['invdate'],
            'vou_invduedate' => $add['duedate'],
            'vou_invtype' => $add['type'],
            'vou_project' => $add['projectid'],
            'vou_owner' => $add['venderid'],
            'vou_contact' => $add['po'],
            'vou_contactamount' => $add['poamt'],
            'vou_period' => $add['period'],
            'vou_credit' => $add['crterm'],
            'vou_vat' => $add['vatper'],
            'vou_wt' => $add['wh'],
            'useredit' => $username,
            'editdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );
          $this->db->where('vou_no',$add['arno']);
          $this->db->update('ar_voucher_header',$data);

          for ($i=0; $i < count($add['vati']); $i++) {
            if($add['chki'][$i]=="I"){
            $datad = array(
              'vou_ref' => $add['arno'],
              'vou_invno' => $add['invno'],
              'vou_desc' => $add['descrepi'][$i],
              'vou_downamt' => $add['downamti'][$i],
              'vou_vatper' => $add['vatper'],
              'vou_vatamt' => $add['vati'][$i],
              'vou_beforewt' => $add['beforewti'][$i],
              'vou_wtper' => $add['wh'],
              'vou_lesswt' => $add['lesswti'][$i],
              'vou_netamt' => $add['netamti'][$i],
              'vou_payref' => $add['refpaymentnoi'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_voucher_detail',$datad);
          }else{
           $gl_m = array(
              'vou_ref' => $add['invno'],
              'vou_desc' => $add['descrepi'][$i],
              'vou_downamt' => $add['vati'][$i],
              'vou_vatper' => $add['vatper'],
              'vou_vatamt' => $add['vou_vatamt'][$i],
              'vou_beforewt' => $add['vou_beforewt'][$i],
              'vou_wtper' => $add['wh'],
              'vou_lesswt' => $add['vou_lesswt'][$i],
              'vou_netamt' => $add['vou_netamt'][$i],
              'vou_payref' => $add['refpaymentnoi'][$i],
              'useredit' => $username,
              'editdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->where('vou_id',$add['gl_id'][$i]);
            $this->db->update('ar_voucher_detail',$gl_m);

            $gl_v = array(
              'vchno' => $add['invno'],
              'acct_no' => $add['accno_gl'][$i],
            );
            $this->db->where('id_gl',$add['gl_idd'][$i]);
            $this->db->update('ar_gl',$gl_v);

          }
        }
      redirect('ar/ar_edit_vorcher/'.$add['arno']);
   
      }

      public function del_arvoucher($vou_id){
       $invno = $this->uri->segment(4);
            $this->db->where('vou_id',$vou_id);
                $this->db->delete('ar_voucher_detail');
                 redirect('ar/ar_edit_vorcher/'.$invno);
                die;
             
    }
      public function add_arreceipt()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        try {
          $data = array(
            'vou_no' => $add['re_no'],
            'vou_date' => $add['ardate'],
            'vou_rvrlno ' => $add['rvrlno'],
            'vou_rvrldate' => $add['rvrldate'],
            'vou_type' => $add['type'],
            'vou_taxtype' => $add['tax'],
            // 'vou_taxno' => $add['taxno'],
            'vou_project' => $add['projectid'],
            'vou_owner' => $add['venderid'],
            // 'vou_contact' => $add['po'],
            'vou_contactamount' => $add['poamt'],
            // 'vou_period' => $add['period'],
            // 'vou_credit' => $add['crterm'],
            'vou_vat' => $add['vatper'],
            'vou_wt' => $add['wh'],
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );
          $this->db->insert('ar_receipt_header',$data);
          for ($i=0; $i < count($add['vati']); $i++) {
            $datad = array(
              'vou_ref' => $add['re_no'],
              'vou_project' => $add['projectid'],
              'vou_invno' => $add['vou_no'],
              'vou_desc' => $add['descrepi'][$i],
              'vou_downamt' => $add['downamti'][$i],
              'vou_vatper' => $add['vatper'],
              'vou_vatamt' => $add['vati'][$i],
              'vou_beforewt' => $add['beforewti'][$i],
              'vou_wtper' => $add['wh'],
              'vou_lesswt' => $add['lesswti'][$i],
              'vou_netamt' => $add['netamti'][$i],
              // 'vou_payref' => $add['refpaymentnoi'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_receipt_detail',$datad);  
          }

          for ($gl=0; $gl < count($add['vatii']); $gl++) {
            $ar_gl = array(
              'vchno' => $add['re_no'],
              'acct_no' => $add['accno_gl'][$gl],
              'amtdr' => $add['vatii'][$gl],
              'amtcr' => $add['amtcr'][$gl],
              'itemno' => $add['itemno'][$gl],
              'gl_type' => $add['gl_type'],
              'vchdate' => $add['ardate'],
              'adduser' => $username,
              
            );
            $this->db->insert('ar_gl',$ar_gl);
          }
            $ar_gl2 = array(
              'vchno' => $add['re_no'],
              'acct_no' => $add['accno_gll'],
              'amtdr' => $add['amtdr_v'],
              'amtcr' => $add['amtcr_v'],
              'itemno' => $add['itemno_v'],
              'gl_type' => $add['gl_type_v'],
              'vchdate' => $add['ardate'],
              'adduser' => $username,
            );
          $this->db->insert('ar_gl',$ar_gl2);

          $upinv = array(
            'vou_status' => "receipt"
          );
          $this->db->where('vou_no',$add['vou_no']);
          $this->db->update('ar_voucher_header',$upinv);

          redirect('ar/edit_receipt/'.$add['re_no']);


        } catch (Exception $e) {
          echo $e;
        }

      }
      public function edit_arreceipt()
      {
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        try {
         $data = array(
            'vou_date' => $add['ardate'],
            'vou_no ' => $add['arno'],
            // 'vou_invdate' => $add['invdate'],
            // 'vou_invduedate' => $add['duedate'],
            // 'vou_invtype' => $add['type'],
            'vou_project' => $add['projectid'],
            'vou_owner' => $add['venderid'],
            'vou_contact' => $add['po'],
            'vou_contactamount' => $add['poamt'],
            // 'vou_period' => $add['period'],
            'vou_credit' => $add['crterm'],
            'vou_vat' => $add['vatper'],
            'vou_wt' => $add['wh'],
            'useredit' => $username,
            'editdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );
          $this->db->where('vou_no',$add['arno']);
          $this->db->update('ar_receipt_header',$data);

          for ($i=0; $i < count($add['vati']); $i++) {
            if($add['chki'][$i]=="I"){
            $datad = array(
              'vou_ref' => $add['arno'],
              'vou_invno' => $add['invno'],
              'vou_desc' => $add['descrepi'][$i],
              'vou_downamt' => $add['downamti'][$i],
              'vou_vatper' => $add['vatper'],
              'vou_vatamt' => $add['vati'][$i],
              'vou_beforewt' => $add['beforewti'][$i],
              'vou_wtper' => $add['wh'],
              'vou_lesswt' => $add['lesswti'][$i],
              'vou_netamt' => $add['netamti'][$i],
              'vou_payref' => $add['refpaymentnoi'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_receipt_detail',$datad);
          }else{
           $gl_m = array(
              'vou_ref' => $add['arno'],
              'vou_desc' => $add['descrepi'][$i],
              'vou_downamt' => $add['vati'][$i],
              'vou_vatper' => $add['vatper'],
              'vou_vatamt' => $add['vou_vatamt'][$i],
              'vou_beforewt' => $add['vou_beforewt'][$i],
              'vou_wtper' => $add['wh'],
              'vou_lesswt' => $add['vou_lesswt'][$i],
              'vou_netamt' => $add['vou_netamt'][$i],
              'vou_payref' => $add['refpaymentnoi'][$i],
              'useredit' => $username,
              'editdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->where('vou_id',$add['gl_id'][$i]);
            $this->db->update('ar_receipt_detail',$gl_m);

            $gl_v = array(
              'vchno' => $add['arno'],
              'acct_no' => $add['accno_gl'][$i],
            );
            $this->db->where('id_gl',$add['gl_idd'][$i]);
            $this->db->update('ar_gl',$gl_v);

          }
        }
          redirect('ar/edit_receipt/'.$add['arno']);

        } catch (Exception $e) {
          echo $e;
        }

      }


      public function add_invoicedown()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          // echo "<pre>";
          // var_dump($add);
          // die();

          try {
            if($add['chk']=="N"){
            $data = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'currency' => $add['currency'],
              'exchange' => $add['exchange'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_status' => "N",
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'ref_cer' => $add['refname'],
            );
            $this->db->insert('ar_invdown_header',$data);
            }else{
              $dataua = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              // 'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'inv_ret' => "0",
              'inv_adv' => "0",
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'ref_cer' => $add['refname'],
            );
            $this->db->where('inv_period',$add['period']); 
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_invdown_header',$dataua);
            }

            for ($i=0; $i < count($add['vati']); $i++) {
              if($add['chk'][$i]=="Y"){
              $dataup = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['systemcode'][$i],
                'inv_downamt' => $add['downamti'][$i],
                'inv_vatper' => $add['vatper'],
                'inv_vatamt' => $add['vati'][$i],
                'inv_beforewt' => $add['beforewti'][$i],
                'inv_wtper' => $add['wh'],
                'inv_period' => $add['period'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->where('inv_system',$add['systemcode'][$i]); 
              $this->db->where('inv_period',$add['period']); 
              $this->db->where('inv_ref',$add['invono']); 
              $this->db->update('ar_invdown_detail',$dataup);
              }else {
                $datad = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['system'][$i],
                'inv_downamt' => $add['downamti'][$i],
                // 'inv_deduction' => $add['deduction'][$i],
                'inv_todown' => $add['todown'][$i],
                'inv_vatper' => $add['vatper'],
                'inv_vatamt' => $add['vati'][$i],
                'inv_beforewt' => $add['beforewti'][$i],
                'inv_wtper' => $add['wh'],
                'inv_period' => $add['period'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              
              $this->db->insert('ar_invdown_detail',$datad);
              }
            }

            $submit = array(
                'status' => 'Y',
                'ref_ar' => $add['invono'],
            );
            $this->db->where('refferent',$add['refname']); 
            $this->db->update('progress_submit',$submit);

            redirect('ar/ar_edit_invdown/'.$add['invono'].'/'.$add['period']);

          } catch (Exception $e) {
            echo $e;
          }
      }

        public function edit_invoicedown()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          try {
              $dataua = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              // 'inv_contact' => $add['po'],

              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
            );
            $this->db->where('inv_period',$add['period']); 
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_invdown_header',$dataua);

            for ($i=0; $i < count($add['vati']); $i++) {
              $dataup = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['systemcode'][$i],
                'inv_downamt' => $add['downamti'][$i],
                'inv_vatper' => $add['vatper'],
                'inv_vatamt' => $add['vati'][$i],
                'inv_beforewt' => $add['beforewti'][$i],
                'inv_wtper' => $add['wh'],
                'inv_period' => $add['period'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->where('inv_system',$add['systemcode'][$i]); 
              $this->db->where('inv_period',$add['period']); 
              $this->db->where('inv_ref',$add['invono']); 
              $this->db->update('ar_invdown_detail',$dataup);              
            }
            redirect('ar/ar_edit_invdown/'.$add['invono'].'/'.$add['period']);

          } catch (Exception $e) {
            echo $e;
          }
        }

      public function add_invprogress()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          // echo "<pre>";
          // var_dump(parse_num($add['poamt']));
          // die();
          try {
            if($add['chk']=="N"){
            $data = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => parse_num($add['poamt']),
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_status' => "N",
              'inv_wt' => $add['wh'],
              'inv_lessadv' => $add['less_adv'],
              'inv_lessref' => $add['less_ref'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'currency' => $add['currency'],
              'exchange' => $add['exchange'],
              'ref_cer' => $add['refname'],
            );
            $this->db->insert('ar_invprogress_header',$data);
            }else{
              $dataua = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => parse_num($add['poamt']),
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'inv_lessadv' => $add['less_adv'],
              'inv_lessref' => $add['less_ref'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'currency' => $add['currency'],
              'exchange' => $add['exchange'],
              'ref_cer' => $add['refname'],

            );
            $this->db->where('inv_period',$add['period']); 
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_invprogress_header',$dataua);
            }

            for ($i=0; $i < count($add['vati']); $i++) {
              if($add['chk'][$i]=="Y"){
              $dataup = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['systemcode'][$i],
                'inv_progressamt' => $add['progressamt'][$i],
                'inv_vatamt' => $add['vati'][$i],
                'inv_lessadvance' => $add['lessadvance'][$i],
                'inv_lessretention' => $add['lessretention'][$i],
                'inv_period' => $add['period'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'inv_iwt' => $add['wh'],
                'inv_ilessadv' => $add['less_adv'],
                'inv_ilessret' => $add['less_ref'],
                'inv_ivat' => $add['vatper'],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode,
              );
              $this->db->where('inv_system',$add['systemcode'][$i]); 
              $this->db->where('inv_period',$add['period']); 
              $this->db->where('inv_ref',$add['invono']); 
              $this->db->update('ar_invprogress_detail',$dataup);
              }else {
                $datad = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['system'][$i],
                'inv_progressamt' => $add['progressamt'][$i],
                'inv_toprogress' => $add['topro'][$i],
                'inv_vatamt' => $add['vati'][$i],
                'inv_lessadvance' => $add['lessadvance'][$i],
                'inv_lessretention' => $add['lessretention'][$i],
                'inv_period' => $add['period'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'inv_iwt' => $add['wh'],
                'inv_ilessadv' => $add['less_adv'],
                'inv_ilessret' => $add['less_ref'],
                'inv_ivat' => $add['vatper'],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              
              $this->db->insert('ar_invprogress_detail',$datad);
              }
            }

            $submit = array(
                'status' => 'Y',
                'ref_ar' => $add['invono'],
            );
            $this->db->where('refferent',$add['refname']); 
            $this->db->update('progress_submit',$submit);

            redirect('ar/ar_edit_invprogress/'.$add['invono'].'/'.$add['period']);

          } catch (Exception $e) {
            echo $e;
          }
        }

        public function edit_invprogress()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          try {
              $dataua = array(  
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_wt' => $add['wh'],
              'inv_lessadv' => $add['less_adv'],
              'inv_lessref' => $add['less_ref'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'currency' => $add['currency'],
              'exchange' => $add['exchange']
            );
            $this->db->where('inv_period',$add['period']); 
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_invprogress_header',$dataua);

            for ($i=0; $i < count($add['vati']); $i++) {
              $dataup = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['systemcode'][$i],
                'inv_progressamt' => $add['progressamt'][$i],
                'inv_vatamt' => $add['vati'][$i],
                'inv_lessadvance' => $add['lessadvance'][$i],
                'inv_lessretention' => $add['lessretention'][$i],
                'inv_period' => $add['period'],
                'inv_lesswt' => $add['lesswti'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_payref' => $add['refpaymentnoi'][$i],
                'inv_iwt' => $add['wh'],
                'inv_ilessadv' => $add['less_adv'],
                'inv_ilessret' => $add['less_ref'],
                'inv_ivat' => $add['vatper'],
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->where('inv_system',$add['systemcode'][$i]); 
              $this->db->where('inv_period',$add['period']); 
              $this->db->where('inv_ref',$add['invono']); 
              $this->db->update('ar_invprogress_detail',$dataup);              
            }
            redirect('ar/ar_edit_invprogress/'.$add['invono'].'/'.$add['period']);

          } catch (Exception $e) {
            echo $e;
          }
        }

        public function add_invretention()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          try {
            if($add['chk']=="N"){
            $data = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_status' => "N",
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'currency' => $add['currency'],
              'exchange' => $add['exchange'],
              'ref_cer' => $add['refname'],
            );
            $this->db->insert('ar_invretention_header',$data);
            }else{
              $dataua = array(
              'inv_no ' => $add['invono'],
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_tax' => $add['tax'],
              'inv_lessadv' => "0",
              'inv_ret' => "0",
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'ref_cer' => $add['refname'],
            );
            $this->db->where('inv_period',$add['period']); 
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_invretention_header',$dataua);
            }

            for ($i=0; $i < count($add['vati']); $i++) {
              if($add['chk'][$i]=="Y"){
              $dataup = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['systemcode'][$i],
                'inv_retentionamt' => $add['retentionamt'][$i],
                'inv_vatamt' => $add['vati'][$i],
                'inv_period' => $add['period'],
                'inv_netamt' => $add['netamti'][$i],
                'inv_vat' => $add['vatper'],
                'inv_wt' => '0',
                'inv_lesswt' => '0',
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->where('inv_system',$add['systemcode'][$i]); 
              $this->db->where('inv_period',$add['period']); 
              $this->db->where('inv_ref',$add['invono']); 
              $this->db->update('ar_invretention_detail',$dataup);
              }else {
                $datad = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['system'][$i],
                'inv_retentionamt' => $add['progressamt'][$i],
                'inv_vatamt' => $add['vati'][$i],
                'inv_netamt' => $add['netamti'][$i],
                'inv_period' => $add['period'],
                'inv_vat' => $add['vatper'],
                'inv_wt' => '0',
                'inv_lesswt' => '0',
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->insert('ar_invretention_detail',$datad);
              }
            }

             $submit = array(
                'status' => 'Y',
                'ref_ar' => $add['invono'],
            );
            $this->db->where('refferent',$add['refname']); 
            $this->db->update('progress_submit',$submit);

            redirect('ar/ar_edit_invretention/'.$add['invono'].'/'.$add['period']);

          } catch (Exception $e) {
            echo $e;
          }
        }
        public function edit_invretention()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();
          try {
         $dataua = array(
              'inv_date' => $add['invdate'],
              'inv_duedate' => $add['duedate'],
              'inv_dateref' => $add['refdate'],
              'inv_type' => $add['type'],
              'inv_project' => $add['projectid'],
              'inv_owner' => $add['venderid'],
              'inv_contact' => $add['po'],
              'inv_contactamount' => $add['poamt'],
              'inv_period' => $add['period'],
              'inv_credit' => $add['crterm'],
              'inv_vat' => $add['vatper'],
              'inv_tax' => $add['tax'],
              'inv_remark' => $add['remark'],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->where('inv_period',$add['period']); 
            $this->db->where('inv_no',$add['invono']);
            $this->db->update('ar_invretention_header',$dataua);

            for ($i=0; $i < count($add['progressamt']); $i++) {
              $dataup = array(
                'inv_ref' => $add['invono'],
                'inv_system' => $add['systemcode'][$i],
                'inv_retentionamt' => $add['progressamt'][$i],
                'inv_vatamt' => $add['vati'][$i],
                'inv_period' => $add['period'],
                'inv_netamt' => $add['netamti'][$i],
                'inv_vat' => $add['vatper'],
                'inv_wt' => '0',
                'inv_lesswt' => '0',
                'useradd' => $username,
                'createdate' => date('Y-m-d H:i:s',now()),
                'compcode' => $compcode
              );
              $this->db->where('inv_system',$add['systemcode'][$i]); 
              $this->db->where('inv_period',$add['period']); 
              $this->db->where('inv_ref',$add['invono']); 
              $this->db->update('ar_invretention_detail',$dataup);
            }  
            redirect('ar/ar_edit_invretention/'.$add['invono'].'/'.$add['period']);

          } catch (Exception $e) {
            echo $e;
          }
        }

    public function add_araccount()
      {

        $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('ar_account_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
                $jvcode = "AR".date($datestring).date($mm)."000"."1";
                $acc_id ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('acc_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('ar_account_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->acc_id+1;
               }

               if ($x1<=9) {
                  $jvcode = "AR".date($datestring).date($mm)."000".$x1;
                  $acc_id = $x1;
               }
               elseif ($x1<=99) {
                 $jvcode = "AR".date($datestring).date($mm)."00".$x1;
                 $acc_id = $x1;
               }
               elseif ($x1<=999) {
                 $jvcode = "AR".date($datestring).date($mm)."0".$x1;
                 $acc_id = $x1;
               }
             }
        $add = $this->input->post();
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        // echo "<pre>";
        // var_dump($add);
        // die();
          $data = array(
            'acc_no' => $jvcode,
            'acc_invno' => $add['inv_no'],
            'acc_billdate' => $add['billdate'],
            'acc_invamt ' => $add['invamt'],
            'acc_invvat ' => $add['vatamt'],
            'acc_invwt ' => $add['wtamt'],
            'acc_vat' => $add['vat'],
            'acc_wt' => $add['wt'],
            'acc_adv' => $add['adv'],
            'acc_ret' => $add['ret'],
            'acc_invwt ' => $add['wtamt'],
            'acc_invdate' => $add['invdate'],
            'acc_due' => $add['duedate'],
            'acc_ardate' => $add['ardate'],
            'acc_project' => $add['projectid'],
            'acc_owner' => $add['venderid'],
            'acc_invtype' => $add['inv_type'],
            'acc_year' => $add['inv_year'],
            'acc_period' => $add['ar_period'],
            'year' => $add['invyear'],
            'period' => $add['invperiod'],
            'acc_invperiod' => $add['inv_period'],
            'acc_credit' => $add['crterm'],
            'acc_remark' => $add['remark'],
            'acc_current' => $add['current'],
            'acc_cusamt' => $add['cusamt'],
            'acc_advamt' => $add['advamt'],
            'acc_retamt' => $add['retamt'],
            'acc_tocr' => $add['to_cr_to'],
            'acc_todr' => $add['to_dr_to'],
            'gl_status' => 'N',
            'acc_status' => 'N',
            'clear_status' => 'N',
            'status_cn' => 'N',
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );
          $this->db->insert('ar_account_header',$data);
          
          if ($add['inv_type'] == "progress") {
            foreach ($add['amt_retention'] as $key => $value) {
              $data_pay_retention = array(
                'inv_no' => $add['inv_no'],
                'ar_no' => $jvcode,
                'project_id' => $add['projectid'],
                'system_code' => $add["system_code"][$key],
                'amt_retention' => $add['amt_retention'][$key],
                'compcode' => $compcode
              );
            $this->db->insert('payment_retention',$data_pay_retention);
            }
          }
           



          for ($i=0; $i < count($add['inv_ac']); $i++) {
            $datad = array(
              'acc_ref' => $jvcode,
              'acc_invno' => $add['inv_no'],
              'acc_codeac' => $add['inv_ac'][$i],
              'acc_dr' => $add['amt_dr'][$i],
              'acc_cr' => $add['amt_cr'][$i],
              'acc_systemcode' => $add['systemcode'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,

            );
            $this->db->insert('ar_account_detail',$datad);

            $data_gl = array(
              'vchno' => $jvcode,
              'vchdate' => date('Y-m-d',now()),
              'doctype' => 'ar_'.$add['inv_type'],
              'acct_no' =>  $add['inv_ac'][$i],
              'projectid' => $add['projectid'],
              'systemcode' => $add["systemcode"][$i],
              'amtdr' => $add['amt_dr'][$i],
              'amtcr' => $add['amt_cr'][$i],
              'glyear' => $add['inv_year'],
              'glperiod' => $add['ar_period'],
              'completegl' => 'N',
              'adduser' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'vendor_id' => $add['venderid'],
          
            );
            $this->db->insert('ar_gl',$data_gl);


          }
          if ($add['inv_type'] == "down") {
            $data_d = array(
            'inv_status' => 'Y',
            'inv_receiptamt' => $add['to_cr_to'],
            'inv_receipt' => $jvcode,
            );
          $this->db->where('inv_period',$add['inv_period']);
          $this->db->where('inv_no',$add['inv_no']);
          $this->db->update('ar_invdown_header',$data_d);

          }elseif ($add['inv_type'] == "progress") {
            $data_p = array(
            'inv_status' => 'Y',
            'inv_receiptamt' => $add['to_cr_to'],
            'inv_receipt' => $jvcode,
            );
          $this->db->where('inv_period',$add['inv_period']);
          $this->db->where('inv_no',$add['inv_no']);
          $this->db->update('ar_invprogress_header',$data_p);

          }else{
            $data_r = array(
            'inv_status' => 'Y',
            'inv_receiptamt' => $add['to_cr_to'],
            'inv_receipt' => $jvcode,
            );
          $this->db->where('inv_period',$add['inv_period']);
          $this->db->where('inv_no',$add['inv_no']);
          $this->db->update('ar_invretention_header',$data_r);
          }
          
          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_account_report.mrt&no=".$jvcode);
      }

      public function ar_clear()
    {
      $no = $this->uri->segment(3);
          $datt = array(
            'acc_status' => "N"
            );
           $this->db->where('acc_status','W');
           $this->db->update('ar_account_header',$datt);
           // {
            return true;
           // }
    }

    // lottae
    public function add_receipt(){
     
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        // echo "<pre>";
        // var_dump($add);
        // die();
        $datestring = "Y";
        $mm = "m";
        $dd = "d";

        $this->db->select('*');
        $qu = $this->db->get('ar_receipt_header');
        $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

        if ($res==0) {
          $jvcode = "RE".date($datestring).date($mm)."000"."1";
          $acc_id ="1";
        }else{
          $this->db->select('*');
          $this->db->order_by('vou_id','desc');
          $this->db->limit('1');
          $q = $this->db->get('ar_receipt_header');
          $run = $q->result();
          foreach ($run as $valx)
          {
            $x1 = $valx->vou_id+1;
          }

          if ($x1<=9) {
            $jvcode = "RE".date($datestring).date($mm)."000".$x1;
            $acc_id = $x1;
          }
          elseif ($x1<=99) {
             $jvcode = "RE".date($datestring).date($mm)."00".$x1;
             $acc_id = $x1;
          }
           elseif ($x1<=999) {
            $jvcode = "RE".date($datestring).date($mm)."0".$x1;
            $acc_id = $x1;
          }
        }

        $data = array(
            'vou_no' => $jvcode,
            'vou_invno' => $add['invno'],
            'vou_exchange' => $add['exchange_rale'],
            'vou_date' => $add['ardate'],
            'vou_amtadv' => $add['amtadv'],
            'vou_amtret' => $add['amtret'],
            'vou_project' => $add['projectid'],
            'vou_owner' => $add['venderid'],
            'vou_type' => $add['ar_type'],
            'vou_year' => $add['acc_year'],
            'vou_period' => $add['acc_invperiod'],
            'vou_remark' => $add['remark'],
            'vou_status' => 'N',
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );

        $this->db->trans_begin();

        $this->db->insert('ar_receipt_header',$data);
        $id = $this->db->insert_id();
        $net_total = 0;
        $amt_total = 0;
        $wt_total = 0;
        $vat_total = 0;

        $retention = array();
        $retention[] = 0;

        $down[] = array();
        $down[] = 0;
      foreach ($add["vat"] as $i => $value) {

                  $net_total += $add['net_amt'][$i];
                  $amt_total += $add['amt'][$i];
                  $wt_total += $add['amt_wt'][$i];
                  $vat_total += $add['amt_vat'][$i];
                  // var_dump($net_total);
                  $data_detail = array(
                        'vou_ref' => $jvcode,
                        'vou_invno' => $add['invno'],
                        'vou_period' => $add['inv_period'][$i],
                        'vou_type' => $add['inv_type'][$i],
                        'vou_system' => $add['inv_system'][$i],
                        'vou_project' => $add['projectid'],
                        'vou_downamt' => $add['amt'][$i],
                        'vou_wtper' => $add['wt'][$i],
                        'vou_lesswt' => $add['amt_wt'][$i],
                        'vou_adv' => $add['advance'][$i],
                        'vou_advamt' => $add['amt_advance'][$i],
                        'ar_no_ref' => $add['ar_no'][$i],
                        'vou_ret' => $add['perRetention'][$i],
                        'vou_retamt' => $add['amtRetention'][$i],
                        'vou_vatper' => $add['vat'][$i],
                        'vou_vatamt' => $add['amt_vat'][$i],
                        'vou_netamt' => $add['net_amt'][$i],
                        'useradd' => $username,
                        'createdate' => date('Y-m-d H:i:s',now()),
                        'compcode' => $compcode
                      );

                  $retention[] = $add['amtRetention'][$i];
                  $down[] = $add['amt_advance'][$i];
                  $this->db->insert('ar_receipt_detail',$data_detail);


                  $amt = 0;
                  $pay = 0;

                  $id_inv = explode("_",$add['invi_id'][$i])[1];

                  if($add["inv_type"][$i] == "down"){
                      //update payment
                      $inv_update = array(
                        'inv_payment' => $add['inv_payment'][$i]+$add['amt'][$i],
                      );
                      $this->db->where('invi_id',$id_inv);
                      $this->db->update('ar_invdown_detail',$inv_update);
                      //update payment
                      $this->db->select('inv_downamt,inv_payment');
                      $this->db->from('ar_invdown_detail');
                      $this->db->where('invi_id',$id_inv);
                      $res = $this->db->get()->result();
                      $amt = $res[0]->inv_downamt;
                      $pay = $res[0]->inv_payment;


                      if ($amt == $pay) {
                            /// update invdown
                            $status_update = array(
                              'active' => '0',
                            );
                            $this->db->where('invi_id',$id_inv);
                            $this->db->update('ar_invdown_detail',$status_update);
                            /// update invdown
              

                      }
                  }elseif($add["inv_type"][$i] == "progress"){
                     //update payment progress
                      $inv_update = array(
                        'inv_payment' => $add['inv_payment'][$i]+$add['amt'][$i],
                      );
                      $this->db->where('invi_id',$id_inv);
                      $this->db->update('ar_invprogress_detail',$inv_update);
                      //update payment progress

                      // get result amt,payment
                      $this->db->select('inv_progressamt,inv_payment');
                      $this->db->from('ar_invprogress_detail');
                      $this->db->where('invi_id',$id_inv);
                      $res = $this->db->get()->result();
                      $amt = $res[0]->inv_progressamt;
                      $pay = $res[0]->inv_payment;
                      // get result amt,payment


                      if ($amt == $pay) {
                            /// update progress
                            $status_update = array(
                              'active' => '0',
                            );
                            $this->db->where('invi_id',$id_inv);
                            $this->db->update('ar_invprogress_detail',$status_update);
                            /// update progress

                      }
                  }elseif($add["inv_type"][$i] == "retention"){

                      //update payment Retention
                      $inv_update = array(
                        'inv_payment' => $add['inv_payment'][$i]+$add['amt'][$i],
                      );
                      $this->db->where('invi_id',$id_inv);
                      $this->db->update('ar_invretention_detail',$inv_update);
                      //update payment Retention


                      // get result amt,payment
                      $this->db->select('inv_retentionamt,inv_payment');
                      $this->db->from('ar_invretention_detail');
                      $this->db->where('invi_id',$id_inv);
                      $res = $this->db->get()->result();
                      $amt = $res[0]->inv_retentionamt;
                      $pay = $res[0]->inv_payment;
                      // get result amt,payment

                      if ($amt == $pay) {
                            /// update Retention
                            $status_update = array(
                              'active' => '0',
                            );
                            $this->db->where('invi_id',$id_inv);
                            $this->db->update('ar_invretention_detail',$status_update);
                            /// update Retention   
                      }

                 
                  }elseif ($add["inv_type"][$i] == "other") {
                      $inv_update = array(
                          'bill_total' => $add['inv_payment'][$i]+$add['amt'][$i],
                      );
                      $this->db->where('ref_other',$add['ref_other'][$i]);
                      $this->db->update('other_detail',$inv_update);
                      //update payment
                      $this->db->select('otde_amount,bill_total');
                      $this->db->from('other_detail');
                      $this->db->where('ref_other',$add['ref_other'][$i]);
                      $res = $this->db->get()->result();
                      $amt = $res[0]->inv_downamt;
                      $pay = $res[0]->inv_payment;


                      if ($amt == $pay) {
                            /// update invdown
                            $status_update = array(
                              'status_bill' => '0',
                      );
                      $this->db->where('ref_other',$add['ref_other'][$i]);
                      $this->db->update('other_detail',$status_update);
                      
                      }else{
                        var_dump($value);
                        die("not found TYPE ");
                      }  
                  }elseif ($add["inv_type"][$i] == "trading") {
                    # code...
                  }else{

                  }

            $update_ar_no = array(
              'vou_arno' => $add['ar_no'][$i],
            );
            $this->db->where('vou_id',$id);
            $this->db->update('ar_receipt_header',$update_ar_no);

            /// update account
            $data_r = array(
              'acc_status' => 'Y',
            );
            $this->db->where('acc_no',$add['ar_no'][$i]);
            $this->db->update('ar_account_header',$data_r);
            /// update account

      }// foreach

          $data_update = array(
              'vou_amt' => $amt_total,
              'vou_vat ' => $vat_total,
              'vou_wt ' => $wt_total,
              'vou_net ' => $net_total,
              'vou_amtret'=>array_sum($retention),
              'vou_amtadv' =>array_sum($down)
          );
          $this->db->where('vou_id',$id);
          $this->db->update('ar_receipt_header',$data_update);
             
          if ($this->db->trans_status() === FALSE)
          {
                  $this->db->trans_rollback();
          }
          else
          {
                  $this->db->trans_commit();
                  $base_url = $this->config->item("url_report");
                  redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_receipt_report.mrt&no=".$jvcode);
          }


      
      }

      public function add_receiving()
      {
        $add = $this->input->post();
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();

        // echo "<pre>";
        // var_dump($add);
        // die();

          $datestring = "Y";
          $mm = "m";
          $dd = "d";

          $this->db->select('*');
          $qu = $this->db->get('ar_receiving_header');
          $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

          if ($res==0) {
            $jvcode = "RL".date($datestring).date($mm)."000"."1";
            $acc_id ="1";
          }else{
            $this->db->select('*');
            $this->db->order_by('vou_id','desc');
            $this->db->limit('1');
            $q = $this->db->get('ar_receiving_header');
            $run = $q->result();
            foreach ($run as $valx)
            {
              $x1 = $valx->vou_id+1;
            }

            if ($x1<=9) {
              $jvcode = "RL".date($datestring).date($mm)."000".$x1;
              $acc_id = $x1;
            }
            elseif ($x1<=99) {
               $jvcode = "RL".date($datestring).date($mm)."00".$x1;
               $acc_id = $x1;
            }
             elseif ($x1<=999) {
              $jvcode = "RL".date($datestring).date($mm)."0".$x1;
              $acc_id = $x1;
            }
          }

          $data = array(
            'vou_no' => $jvcode,
            'vou_arno' => $add['re_no'],
            'option_type' => $add['optiontype'],
            'vou_vno' => $add['vou_no'],
            'vou_amt' => $add['toamt'],
            'vou_vat ' => $add['tovat'],
            'vou_wt ' => $add['towt'],
            'vou_net ' => $add['tonet'],
            'vou_amtadv' => $add['toadv'],
            'vou_amtret' => $add['toret'],
            'vou_project' => $add['projectid'],
            'vou_owner' => $add['venderid'],
            'vou_bankcode' => $add['bankid'],
            'vou_branchcode' => $add['branchd'],
            'vou_date' => $add['vou_date'],
            'vou_ardate' => $add['ardate'],
            'vou_type' => $add['artype'],
            'chqno' => $add['chqno'],
            'vou_status' => 'N',
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
          );
          $this->db->insert('ar_receiving_header',$data);

          for ($i=0; $i < count($add['invno']); $i++) {
            $datad = array(
              'vou_ref' => $jvcode,
              'vou_invno' => $add['invno'][$i],
              'vou_period' => $add['period'][$i],
              'vou_type' => $add['type'][$i],
              'vou_system' => $add['systemcode'][$i],
              'vou_remark' => $add['remark'][$i],
              'vou_exchange' => $add['exchange'][$i],
              'vou_downamt' => $add['vouamt'][$i],
              'vou_adv' => $add['vouadv'][$i],
              'vou_project' => $add['projectid'],
              'vou_advamt' => $add['advamt'][$i],
              'vou_wtper' => $add['vouwt'][$i],
              'vou_lesswt' => $add['wtamt'][$i],
              'vou_ret' => $add['vouret'][$i],
              'vou_retamt' => $add['retamt'][$i],
              'vou_vatper' => $add['vouvat'][$i],
              'vou_vatamt' => $add['vatamt'][$i],
              'vou_netamt' => $add['netamt'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_receiving_detail',$datad);
          }
            $datap = array(
              'vou_ref' => $jvcode,
              // 'vou_invno' =>$add['invno'],
              'vou_type' =>$add['paidtype'],
              'vou_chqno' =>$add['chqno'],
              'vou_chqdate' =>$add['chqdate'],
              'vou_bank' =>$add['pa_bankid'],
              'vou_branch' =>$add['branchid'],
              'vou_downamt' =>$add['amount'],
              'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'compcode' => $compcode
              );
              $this->db->insert('ar_receiving_paird',$datap);
            for ($i=0; $i < count($add['chq_nod']); $i++) {
                $datapp = array(
              'vou_ref' => $jvcode,
              // 'vou_invno' =>$add['invno'][$i],
              'vou_type' =>$add['paidtyped'][$i],
              'vou_chqno' =>$add['chq_nod'][$i],
              'vou_chqdate' =>$add['chq_dated'][$i],
              'vou_bank' =>$add['pabankid'][$i],
              'vou_branch' =>$add['branchiddd'][$i],
              'vou_downamt' =>$add['amountd'][$i]
              );
              $this->db->insert('ar_receiving_paird',$datapp);
            }

            $data_r = array(
            'vou_status' => 'Y',
            'vou_rlno' => $jvcode,
            'vou_rldate' => $add['vou_date']
            );
          $this->db->where('vou_no',$add['re_no']);
          $this->db->update('ar_receipt_header',$data_r);


          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_receiving_report.mrt&no=".$jvcode);
      }

      public function add_clear()
      {
        $add = $this->input->post();
        $session_data = $this->session->userdata('sessed_in');
        $username = $session_data['username'];
        $compcode = $session_data['compcode'];
        $add = $this->input->post();
        
          $datestring = "Y";
          $mm = "m";
          $dd = "d";

          $this->db->select('*');
          $qu = $this->db->get('ar_clear_header');
          $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

          if ($res==0) {
            $jvcode = "C".date($datestring).date($mm)."000"."1";
            $acc_id ="1";
          }else{
            $this->db->select('*');
            $this->db->order_by('cl_id','desc');
            $this->db->limit('1');
            $q = $this->db->get('ar_clear_header');
            $run = $q->result();
            foreach ($run as $valx)
            {
              $x1 = $valx->cl_id+1;
            }

            if ($x1<=9) {
              $jvcode = "C".date($datestring).date($mm)."000".$x1;
              $acc_id = $x1;
            }
            elseif ($x1<=99) {
               $jvcode = "C".date($datestring).date($mm)."00".$x1;
               $acc_id = $x1;
            }
             elseif ($x1<=999) {
              $jvcode = "C".date($datestring).date($mm)."0".$x1;
              $acc_id = $x1;
            }
          }

          $data = array(
            'cl_no' => $jvcode,
            'cl_invno' => $add['arno'],
            'cl_rlno' => $add['re_no'],
            'cl_invdate' => $add['ardate'],
            'cl_billdate' => $add['cleardate'],
            'cl_invtype ' => $add['artype'],
            'cl_invamt ' => $add['reamot'],
            'cl_currency ' => $add['currency'],
            'cl_exchange' => $add['exchange'],
            'cl_project' => $add['projectid'],
            'cl_owner' => $add['venderid'],
            'cl_todr' => $add['to_dr'],
            'cl_tocr' => $add['to_cr'],
            'cl_branchcode' => $add['branchcode'],
            'cl_bankcode' => $add['bankcode'],
            'cl_period' => $add['period'],
            'cl_year' => $add['c_year'],
            'cl_remark' => $add['remark'],
            'cl_status' => 'N',
            'gl_status' => 'N',
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s',now()),
            'period' => date('m',now()),
            'year' => date('Y',now()),
            'compcode' => $compcode
          );
          $this->db->insert('ar_clear_header',$data);

          for ($i=0; $i < count($add['dr']); $i++) {
            $datad = array(
              'cl_ref' => $jvcode,
              'cl_invno' => $add['re_no'],
              'cl_systemcode' => $add['systemcode'][$i],
              'cl_dr' => $add['dr'][$i],
              'cl_cr' => $add['cr'][$i],
              'cl_codeac' => $add['syscode'][$i],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode
            );
            $this->db->insert('ar_clear_detail',$datad);

            $data_gl = array(
              'vchno' => $add['re_no'],
              'vchdate' => date('Y-m-d',now()),
              'doctype' => 'ar_clear',
              'acct_no' =>  $add['syscode'][$i],
              'projectid' => $add['projectid'],
              'systemcode' => $add['systemcode'][$i],
              'amtdr' => $add['dr'][$i],
              'amtcr' => $add['cr'][$i],
              'glyear' => date('Y',now()),
              'glperiod' => date('m',now()),
              'completegl' => 'N',
              'adduser' => $username,
              'createdate' => date('Y-m-d H:i:s',now()),
              'compcode' => $compcode,
              'vendor_id' => $add['venderid'],
            );
            $this->db->insert('ar_gl',$data_gl);

          }
            $data_d = array(
            'vou_status' => 'Y',
            );
          $this->db->where('vou_no',$add['re_no']);
          $this->db->update('ar_receiving_header',$data_d);

            $data_a = array(
            'clear_status' => 'Y',
            );
          $this->db->where('acc_no',$add['accno']);
          $this->db->update('ar_account_header',$data_a);

          $base_url = $this->config->item("url_report");
          redirect($base_url."stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_clear_report.mrt&no=".$jvcode);
      }
      public function selectdate()
    {

      $y = $this->input->post('y');
      $m = $this->input->post('m');
      $d = $this->input->post('d');
      $ps=$this->db->query("SELECT count(gl_id) as countact from gl_period where active='Y' and glperiod='$m' and glyear='$y' ")->result();
      foreach ($ps as $key => $value) {
        if ($value->countact==0) {
         echo "N";
        }
        echo "Y";
      }
      if ($d) {
        return true;
      }
      return true;
    }

    public function ar_clearremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $clno =$this->input->post('clno');
          $dd = array('vou_status' => "N" );
          $this->db->where("vou_no",$this->input->post('rlno'));
          $this->db->update('ar_receiving_header',$dd);
          $data = array(
              'ar_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'cl_status' => "D"
          );
          $this->db->where("cl_no",$clno);
           if($this->db->update('ar_clear_header',$data))
          {
            echo $clno;
          }else{
            echo "error";
            return false;
          }
    }

    public function ar_receivingremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $vou_no =$this->input->post('vou_no');
          $dd = array('vou_status' => "N" );
          $this->db->where("vou_no",$this->input->post('vou_arno'));
          $this->db->update('ar_receipt_header',$dd);
          $data = array(
              'vou_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'vou_status' => "D"
          );
          $this->db->where("vou_no",$vou_no);
           if($this->db->update('ar_receiving_header',$data))
          {
            echo $vou_no;
          }else{
            echo "error";
            return false;
          }
    }

    public function ar_receiptremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $vou_no =$this->input->post('vou_no');
          $dd = array('acc_status' => "N" );
          $this->db->where("acc_no",$this->input->post('vou_arno'));
          $this->db->update('ar_account_header',$dd);
          $data = array(
              'vou_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'vou_status' => "D"
          );
          $this->db->where("vou_no",$vou_no);
           if($this->db->update('ar_receipt_header',$data))
          {
            echo $vou_no;
          }else{
            echo "error";
            return false;
          }
    }

    public function ar_accountremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $acc_no =$this->input->post('acc_no');
          
          if ($this->input->post('acc_type') == "down") {
            $d = array('inv_status' => "N" );
            $this->db->where("inv_no",$this->input->post('acc_invno'));
            $this->db->update('ar_invdown_header',$d);
          }elseif ($this->input->post('acc_type') == "progress") {
            $p = array('inv_status' => "N" );
            $this->db->where("inv_no",$this->input->post('acc_invno'));
            $this->db->update('ar_invprogress_header',$p);
          }elseif ($this->input->post('acc_type') == "retention") {
            $r = array('inv_status' => "N" );
            $this->db->where("inv_no",$this->input->post('acc_invno'));
            $this->db->update('ar_invretention_header',$r);
          }
          $data = array(
              'acc_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'acc_status' => "D"
          );
          $this->db->where("acc_no",$acc_no);
           if($this->db->update('ar_account_header',$data))
          {
            echo $acc_no;
          }else{
            echo "error";
            return false;
          }
    }

    public function ar_downremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $inv_no =$this->input->post('inv_no');
          $data = array(
              'inv_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'inv_status' => "D"
          );
          $this->db->where("inv_period",$this->input->post('inv_period'));
          $this->db->where("inv_no",$inv_no);
           if($this->db->update('ar_invdown_header',$data))
          {
            echo $inv_no;
          }else{
            echo "error";
            return false;
          }
    }

    public function ar_progressremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $inv_no =$this->input->post('inv_no');
          $data = array(
              'inv_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'inv_status' => "D"
          );
          $this->db->where("inv_period",$this->input->post('inv_period'));
          $this->db->where("inv_no",$inv_no);
           if($this->db->update('ar_invprogress_header',$data))
          {
            echo $inv_no;
          }else{
            echo "error";
            return false;
          }
    }

    public function ar_retenremore()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $inv_no =$this->input->post('inv_no');
          $data = array(
              'inv_comment' => $this->input->post('comment'),
              'userdel' => $username,
              'deldate' => date('Y-m-d H:i:s',now()),
              'inv_status' => "D"
          );
          $this->db->where("inv_period",$this->input->post('inv_period'));
          $this->db->where("inv_no",$inv_no);
           if($this->db->update('ar_invretention_header',$data))
          {
            echo $inv_no;
          }else{
            echo "error";
            return false;
          }
    }

     public function ar_getpost_gl()
    {

      $year = $this->input->post('year');
      $period = $this->input->post('period');
      $type = $this->input->post('type');
      if($type){
          if ($type == "AR") {
          $sumar = $this->db->query("SELECT 'AR' as type,acc_no,SUM(acc_tocr) as tocr,SUM(acc_todr) as todr FROM ar_account_header  WHERE acc_status  != 'D' and acc_year = $year and acc_period = $period and gl_status  != 'Y' ")->result();

          foreach ($sumar as $sum) {
          $todr = $sum->todr;
          $tocr = $sum->tocr;
          }
        }elseif ($type == "RL") {
          $sumrl = $this->db->query("SELECT 'RL' as type,cl_no,SUM(cl_tocr) as tocr,SUM(cl_todr) as todr FROM ar_clear_header WHERE cl_status != 'D' and cl_period = $period and cl_year = $year  and gl_status  != 'Y' ")->result();

          foreach ($sumrl as $vv) {
          $todr = $vv->todr;
          $tocr = $vv->tocr;
        }
        }
        else{
          $sumall = $this->db->query("SELECT SUM(tocr) as stocr,SUM(todr) as stodr FROM (SELECT 'AR' as type,acc_no,SUM(acc_tocr) as tocr,SUM(acc_todr) as todr FROM ar_account_header  WHERE acc_status  != 'D' and acc_year = $year and acc_period = $period and gl_status  != 'Y'
          UNION ALL
          SELECT 'RL' as type,cl_no,SUM(cl_tocr) as tocr,SUM(cl_todr) as todr FROM ar_clear_header WHERE cl_status != 'D' and cl_period = $period and cl_year = $year and gl_status  != 'Y') t  ")->result();
          foreach ($sumall as $sumall) {
          $todr = $sumall->stodr;
          $tocr = $sumall->stocr;
          }
        }
        if ($type== "all") {
          $get = $this->db->query("SELECT 'AR' as type,acc_no,acc_project,acc_systemcode,acc_codeac,acc_cr,acc_dr,ar_account_header.compcode,acc_year,acc_period,project_name,systemname,act_name,acc_owner FROM ar_account_header JOIN ar_account_detail ON ar_account_detail.acc_ref=ar_account_header.acc_no LEFT JOIN project ON project.project_id = ar_account_header.acc_project LEFT JOIN system ON system.systemcode=ar_account_detail.acc_systemcode LEFT JOIN account_total on account_total.act_code=ar_account_detail.acc_codeac WHERE acc_status  != 'D' and acc_year = $year and acc_period = $period  and gl_status  != 'Y'
          UNION ALL
          SELECT 'RL' as type,cl_no,cl_project,cl_systemcode,cl_codeac,cl_cr,cl_dr,ar_clear_header.compcode,cl_year,cl_period,project_name,systemname,act_name,cl_owner FROM ar_clear_header JOIN ar_clear_detail ON ar_clear_detail.cl_ref = ar_clear_header.cl_no LEFT JOIN project ON project.project_id = ar_clear_header.cl_project LEFT JOIN system ON system.systemcode = ar_clear_detail.cl_systemcode LEFT JOIN account_total on account_total.act_code=ar_clear_detail.cl_codeac WHERE cl_status != 'D' and cl_year = $year and cl_period = $period  and gl_status  != 'Y'
          ")->result();
        }else{
          $get = $this->db->query("SELECT 'AR' as type,acc_no,acc_project,acc_systemcode,acc_codeac,acc_cr,acc_dr,ar_account_header.compcode,acc_year,acc_period,project_name,systemname,act_name,acc_owner FROM ar_account_header JOIN ar_account_detail ON ar_account_detail.acc_ref=ar_account_header.acc_no LEFT JOIN project ON project.project_id = ar_account_header.acc_project LEFT JOIN system ON system.systemcode=ar_account_detail.acc_systemcode LEFT JOIN account_total on account_total.act_code=ar_account_detail.acc_codeac WHERE acc_status  != 'D' and acc_year = $year and acc_period = $period and 'AR' = '$type' and gl_status  != 'Y'
          UNION ALL
          SELECT 'RL' as type,cl_no,cl_project,cl_systemcode,cl_codeac,cl_cr,cl_dr,ar_clear_header.compcode,cl_year,cl_period,project_name,systemname,act_name,cl_owner FROM ar_clear_header JOIN ar_clear_detail ON ar_clear_detail.cl_ref = ar_clear_header.cl_no LEFT JOIN project ON project.project_id = ar_clear_header.cl_project LEFT JOIN system ON system.systemcode = ar_clear_detail.cl_systemcode LEFT JOIN account_total on account_total.act_code=ar_clear_detail.cl_codeac WHERE cl_status != 'D' and cl_year = $year and cl_period = $period and 'RL' ='$type' and gl_status  != 'Y'
          ")->result();
        }
        if ($get) {
            foreach ($get as $ar) {
          echo 
            '<tr >'.
            '<td>'.
            '<input type="hidden" value="'.$ar->type.'" id="ar_type" name="ar_type[]"><input type="hidden" value="'.$ar->acc_no.'" id="ar_code" name="ar_code[]">'.$ar->acc_no.
            '</td>'.
            '<td>'.
            '<input type="hidden" value="'.$ar->acc_codeac.'" id="ar_actcode" name="ar_actcode[]">'.$ar->act_name.
            '</td>'.
            '<td>'.
            '<input type="hidden" value="'.$ar->acc_project.'" id="ar_project" name="ar_project[]">'.$ar->project_name.
            '</td>'.
            '<td>'.
            '<input type="hidden" value="'.$ar->acc_systemcode.'" id="ar_job" name="ar_job[]">'.$ar->systemname.
            '<input type="hidden" value="'.$ar->acc_owner.'" id="acc_owner" name="acc_owner[]">'.
            '</td>'.
            '<td align="right">'.
            '<input type="hidden" value="'.$ar->acc_dr.'" id="ar_dr" name="ar_dr[]">'.number_format($ar->acc_dr,2).
            '</td>'.
            '<td align="right">'.
            '<input type="hidden" value="'.$ar->acc_cr.'" id="ar_cr" name="ar_cr[]">'.number_format($ar->acc_cr,2).
            '</td>';
          echo '</tr>';
        }
        
          echo  '<script>'.
                  'var todr = "'.$todr.'";'.
                  'var tocr = "'.$tocr.'";'.
                    '$("#ar_dramt").val(todr);'.
                    '$("#ar_cramt").val(tocr);'.
                '</script>';
        }else{
          return true;
        }
      }else{
        return false;
      }
      return true;
    }

    public function ar_addpost_gl()
    {
      $session_data = $this->session->userdata('sessed_in');
      $username = $session_data['username'];
      $compcode = $session_data['compcode'];
      $add = $this->input->post();
      $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('gl_post_ar');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
               $doccode = "GR".date($datestring).date($mm)."000"."1";
               $apono ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('gl_id','desc');
               $this->db->limit('1');
               $q = $this->db->get('gl_post_ar');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->gl_id+1;
               }
              //  $apocode = "PV".date($datestring).date($mm).date($dd).$x1;
              //  $apono=$x1;
               if ($x1<=9) {
                  $doccode = "GR".date($datestring).date($mm)."000".$x1;
                  $apono=$x1;
               }
               elseif ($x1<=99) {
                 $doccode = "GR".date($datestring).date($mm)."00".$x1;
                 $apono=$x1;
               }
               elseif ($x1<=999) {
                 $doccode = "GR".date($datestring).date($mm)."0".$x1;
                 $apono=$x1;
               }
             }
// add gl_post_system
      for ($i=0; $i < count($add['ar_dr']); $i++) {
        $data = array(
          'gl_type' => $add['ar_type'][$i],
          'gl_refcode' => $add['ar_code'][$i],
          'gl_actcode' => $add['ar_actcode'][$i],
          'gl_project' => $add['ar_project'][$i],
          'gl_debtor' => $add['acc_owner'][$i],
          'gl_job' => $add['ar_job'][$i],
          'gl_dr' => $add['ar_dr'][$i],
          'gl_cr' => $add['ar_cr'][$i],
          'gl_year' => $add['yearsel'],
          'gl_period' => $add['glperiod'],
          'useradd' => $username,
          'compcode' => $compcode,
          'adddate' => date('Y-m-d H:i:s',now()),
          'gl_code' => $doccode,
          'status' => "wait"
        );  
      $this->db->insert('gl_post_ar',$data);
      
// add gl_post_system
      if ($add['ar_type'][$i] == "AR") {
        $dataacc = array(
          'gl_status' => "Y"
        );
        $this->db->where('acc_year',$add['yearsel']);
        $this->db->where('acc_period',$add['glperiod']);
        $this->db->where('acc_status !=',"D");
        $this->db->update('ar_account_header',$dataacc);
      }elseif ($add['ar_type'][$i] == "RL") {
        $datacl = array(
          'gl_status' => "Y"
        );
        $this->db->where('cl_year',$add['yearsel']);
        $this->db->where('cl_period',$add['glperiod']);
        $this->db->where('cl_status !=',"D");
        $this->db->update('ar_clear_header',$datacl);
      }

      }
      redirect('ar/ar_post_gl');
    }

    public function query_credit()
    {

        $no = $this->input->post('inv_no');
        $period = $this->input->post('inv_period');
        $acc_no = $this->input->post('acc_no');
        $check_no = substr($no, 0, 4);
        $datt = array(
            'acc_status' => "W"
        );
        $this->db->where('acc_no',$acc_no);
        $this->db->where('acc_invperiod',$period);
        $this->db->update('ar_account_header',$datt);

        $c_de = $this->db->query("SELECT count(inv_ref) as num  from ar_invdown_detail join ar_account_header on ar_account_header.acc_invno = ar_invdown_detail.inv_ref where  acc_status='W' and inv_ref='$no'  GROUP BY inv_ref,inv_period")->result();
        foreach ($c_de as $ii) {
            $id = $ii->num-1;
        }

        $de = $this->db->query("SELECT * from ar_invdown_detail join ar_invdown_header on ar_invdown_header.inv_no = ar_invdown_detail.inv_ref where inv_ref='$no'and ar_invdown_detail.inv_period=$period and inv_downamt != 0 group by inv_system")->result();

        $c_pro = $this->db->query("SELECT count(inv_ref) as num from ar_invprogress_detail join ar_account_header on ar_account_header.acc_invno = ar_invprogress_detail.inv_ref where  acc_status='W' and inv_ref='$no' GROUP BY inv_ref,inv_period")->result();

        foreach ($c_pro as $ii) {
            $id = $ii->num-1;
        }
        $pro = $this->db->query("SELECT * from ar_invprogress_detail join ar_invprogress_header on ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref where inv_ref='$no'and ar_invprogress_detail.inv_period=$period and inv_progressamt != 0 group by inv_system")->result();

        $c_re = $this->db->query("SELECT count(inv_ref) as num from ar_invretention_detail join ar_account_header on ar_account_header.acc_invno = ar_invretention_detail.inv_ref where  acc_status='W' and inv_ref='$no' GROUP BY inv_ref,inv_period")->result();
        foreach ($c_re as $ii) {
            $id = $ii->num-1;
        }

        $re = $this->db->query("SELECT * from ar_invretention_detail join ar_invretention_header on ar_invretention_header.inv_no = ar_invretention_detail.inv_ref where inv_ref='$no'and ar_invretention_detail.inv_period=$period and inv_retentionamt != 0 group by inv_system")->result();
        if($acc_no){
            if ($check_no == "INVD") {
                $i=$id; foreach ($de as $dd) {
                    $desys = $this->db->query("SELECT * from system where systemcode= $dd->inv_system")->result();
                    foreach ($desys as $ds) {
                        $nd = $ds->systemname;
                        $cd = $ds->systemcode;
                    }
                    ?>

                    <?php
                    echo
                        '<tr >'.
                        '<td>'.$i.'</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$dd->inv_ref.'" id="ar_ref" name="ar_ref[]">'.$dd->inv_ref.
                        '</td>'.
                        '<td><span class="label label-success">down</span><input type="hidden" value="'.$dd->inv_type.'" id="ar_type" name="ar_type[]"></td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$period.'" id="ar_period" name="ar_period[]">'.$period.
                        '</td>'.
                        '<td></td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$cd.'" id="ar_system" name="ar_system[]">'.$nd.
                        '</td>'.
                        '<td></td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;border: 1px solid #c7c6c6; height: 36px;padding: 7px 12px;" value="'.$dd->inv_downamt.'" id="ar_amt'.$i.'" name="ar_amt[]">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$dd->inv_downamt.'" id="ar_amtt'.$i.'" name="ar_amtt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_adv'.$i.'" name="ar_adv[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_advamt'.$i.'" name="ar_advamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$dd->inv_wtper.'" id="ar_wt'.$i.'" name="ar_wt[]">'.$dd->inv_wtper.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$dd->inv_lesswt.'" id="ar_wtamt'.$i.'" name="ar_wtamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_ret'.$i.'" name="ar_ret[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_retamt'.$i.'" name="ar_retamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$dd->inv_vatper.'" id="ar_vat'.$i.'" name="ar_vat[]">'.$dd->inv_vatper.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly  value="'.$dd->inv_vatamt.'" id="ar_vatamt'.$i.'" name="ar_vatamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$dd->inv_netamt.'" id="ar_netamt'.$i.'" name="ar_netamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<i class="icon-box-add" id="ok'.$i.'"></i>'.
                        '<i class="icon-pencil" id="sum'.$i.'"></i>'.
                        '</td>';
                    echo  '</tr>';
                    echo  '<script>'.

                        '$("#ar_amt'.$i.'").hide();'.

                        '$("#ok'.$i.'").hide();'.
                        '$("#sum'.$i.'").click(function(){'.
                        '$("#ok'.$i.'").show();'.
                        '$("#sum'.$i.'").hide();'.
                        '$("#ar_amtt'.$i.'").hide();'.
                        '$("#ar_amt'.$i.'").show();'.

                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wtamt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var net'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        '$("#to").val(amt'.$i.');'.
                        '$("#tow").val(wt'.$i.');'.
                        '$("#tov").val(vat'.$i.');'.
                        '$("#ton").val(net'.$i.');'.
                        '$("#de").val(amt'.$i.');'.
                        '});'.

                        '$("#ar_amt'.$i.'").keyup(function(){'.
                        'var smdr = $("#sumamt").val();'.
                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wt'.$i.'").val());'.
                        'var wtamt'.$i.' = parseFloat($("#ar_wtamt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vat'.$i.'").val());'.
                        'var vatamt'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var net'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        'var xw'.$i.' = (amt'.$i.'*wt'.$i.')/100;'.
                        'var xv'.$i.' = (amt'.$i.'*vat'.$i.')/100;'.
                        'var xn'.$i.' = (amt'.$i.'-xw'.$i.')+xv'.$i.';'.
                        '$("#ar_wtamt'.$i.'").val(xw'.$i.');'.
                        '$("#ar_vatamt'.$i.'").val(xv'.$i.');'.
                        '$("#ar_netamt'.$i.'").val(xn'.$i.');'.
                        '$("#de").val(amt'.$i.');'.
                        '});'.

                        '$("#ok'.$i.'").click(function(){'.
                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var wtamt'.$i.' = parseFloat($("#ar_wtamt'.$i.'").val());'.
                        'var vatamt'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var netamt'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vat'.$i.'").val());'.
                        'var xw'.$i.' = (amt'.$i.'*wt'.$i.')/100;'.
                        'var xv'.$i.' = (amt'.$i.'*vat'.$i.')/100;'.
                        'var tn'.$i.' = (amt'.$i.'+xv'.$i.')-xw'.$i.';'.
                        'var a1 = parseFloat($("#to").val());'.
                        'var a2 = parseFloat($("#de").val());'.
                        'var a3 = parseFloat($("#to_amt").val());'.
                        'if (a2 > a1) {'.
                        ' swal({'.
                        'title: "กรุณากรอกจำนวนเงินใหม่ จำนวนเงินเกินกำหนด !!.",'.
                        'text: "",'.
                        'confirmButtonColor: "#EA1923",'.
                        'type: "error"'.
                        '});'.
                        '$("#ok'.$i.'").show();'.
                        '$("#sum'.$i.'").hide();'.
                        '}else{'.
                        'var sum = (a3-a1)+a2;'.
                        '$("#to_amt").val(sum);'.
                        '$("#ar_amtt'.$i.'").val(a2);'.



                        'var w1 = parseFloat($("#tow").val());'.
                        'var w2 = parseFloat($("#to_wt").val());'.
                        'var v1 = parseFloat($("#tov").val());'.
                        'var v2 = parseFloat($("#to_vat").val());'.
                        'var n1 = parseFloat($("#ton").val());'.
                        'var n2 = parseFloat($("#to_net").val());'.

                        'var sumw = (w2-w1)+xw'.$i.';'.
                        '$("#to_wt").val(sumw);'.
                        '$("#ar_wtamt'.$i.'").val(xw'.$i.');'.

                        'var sumv = (v2-v1)+xv'.$i.';'.
                        '$("#to_vat").val(sumv);'.
                        '$("#ar_vatamt'.$i.'").val(xv'.$i.');'.

                        'var sumn = (n2-n1)+tn'.$i.';'.
                        '$("#to_net").val(sumn);'.
                        '$("#ar_netamt'.$i.'").val(tn'.$i.');'.

                        '$("#ok'.$i.'").hide();'.
                        '$("#sum'.$i.'").show();'.
                        '$("#ar_amtt'.$i.'").show();'.
                        '$("#ar_amt'.$i.'").hide();'.
                        '}'.
                        '});'.

                        '</script>';
                    $i++; }

            }
            elseif ($check_no == "INVP") {
                $toamt = 0;$i=$id; foreach ($pro as $pp) {
                    $prsys = $this->db->query("SELECT * from system where systemcode= $pp->inv_system")->result();
                    foreach ($prsys as $ps) {
                        $np = $ps->systemname;
                        $cp = $ps->systemcode;
                    }
                    echo
                        '<tr >'.
                        '<td>'.$i.'</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$pp->inv_ref.'" id="ar_ref" name="ar_ref[]">'.$pp->inv_ref.
                        '</td>'.
                        '<td><span class="label label-success">'.$pp->inv_type.'</span><input type="hidden" value="'.$pp->inv_type.'" id="ar_type" name="ar_type[]"></td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$period.'" id="ar_period" name="ar_period[]">'.$period.
                        '</td>'.
                        '<td></td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$cp.'" id="ar_system" name="ar_system[]">'.$np.
                        '</td>'.
                        '<td></td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;border: 1px solid #c7c6c6; height: 36px;padding: 7px 12px;" value="'.$pp->inv_progressamt.'" id="ar_amt'.$i.'" name="ar_amt[]">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$pp->inv_progressamt.'" id="ar_amtt'.$i.'" name="ar_amtt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden"  value="'.$pp->inv_ilessadv.'" id="ar_adv'.$i.'" name="ar_adv[]">'.$pp->inv_ilessadv.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$pp->inv_lessadvance.'" id="ar_advamt'.$i.'" name="ar_advamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$pp->inv_iwt.'" id="ar_wt'.$i.'" name="ar_wt[]">'.$pp->inv_iwt.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$pp->inv_lesswt.'" id="ar_wtamt'.$i.'" name="ar_wtamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden"  value="'.$pp->inv_ilessret.'" id="ar_ret'.$i.'" name="ar_ret[]">'.$pp->inv_ilessret.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$pp->inv_lessretention.'" id="ar_retamt'.$i.'" name="ar_retamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$pp->inv_ivat.'" id="ar_vat'.$i.'" name="ar_vat[]">'.$pp->inv_ivat.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$pp->inv_vatamt.'" id="ar_vatamt'.$i.'" name="ar_vatamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$pp->inv_netamt.'" id="ar_netamt'.$i.'" name="ar_netamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<i class="icon-box-add" id="ok'.$i.'"></i>'.
                        '<i class="icon-pencil" id="sum'.$i.'"></i>'.
                        '</td>';

                    echo  '</tr>';
                    echo  '<script>'.
                        '$("#ar_amt'.$i.'").hide();'.

                        '$("#ok'.$i.'").hide();'.
                        '$("#sum'.$i.'").click(function(){'.
                        '$("#ok'.$i.'").show();'.
                        '$("#sum'.$i.'").hide();'.
                        '$("#ar_amtt'.$i.'").hide();'.
                        '$("#ar_amt'.$i.'").show();'.

                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var adv'.$i.' = parseFloat($("#ar_advamt'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wtamt'.$i.'").val());'.
                        'var ret'.$i.' = parseFloat($("#ar_retamt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var net'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        '$("#to").val(amt'.$i.');'.
                        '$("#toa").val(adv'.$i.');'.
                        '$("#tow").val(wt'.$i.');'.
                        '$("#tor").val(ret'.$i.');'.
                        '$("#tov").val(vat'.$i.');'.
                        '$("#ton").val(net'.$i.');'.
                        '});'.

                        '$("#ar_amt'.$i.'").keyup(function(){'.
                        'var smdr = $("#sumamt").val();'.
                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wt'.$i.'").val());'.
                        'var adv'.$i.' = parseFloat($("#ar_adv'.$i.'").val());'.
                        'var ret'.$i.' = parseFloat($("#ar_ret'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vat'.$i.'").val());'.
                        'var net'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        'var xw'.$i.' = (amt'.$i.'*wt'.$i.')/100;'.
                        'var xa'.$i.' = (amt'.$i.'*adv'.$i.')/100;'.
                        'var xr'.$i.' = (amt'.$i.'*ret'.$i.')/100;'.
                        'var xv'.$i.' = (amt'.$i.'*vat'.$i.')/100;'.
                        'var xn'.$i.' = (amt'.$i.'+xv'.$i.')-(xw'.$i.'+xa'.$i.'+xr'.$i.');'.
                        '$("#ar_wtamt'.$i.'").val(xw'.$i.');'.
                        '$("#ar_vatamt'.$i.'").val(xv'.$i.');'.
                        '$("#ar_netamt'.$i.'").val(xn'.$i.');'.
                        '$("#de").val(amt'.$i.');'.
                        '});'.

                        '$("#ok'.$i.'").click(function(){'.
                        'var a1 = parseFloat($("#to").val());'.
                        'var a2 = parseFloat($("#de").val());'.
                        'var a3 = parseFloat($("#to_amt").val());'.

                        'var sum = (a3-a1)+a2;'.
                        '$("#to_amt").val(sum);'.
                        '$("#ar_amtt'.$i.'").val(a2);'.

                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var advamt'.$i.' = parseFloat($("#ar_advamt'.$i.'").val());'.
                        'var wtamt'.$i.' = parseFloat($("#ar_wtamt'.$i.'").val());'.
                        'var retamt'.$i.' = parseFloat($("#ar_retamt'.$i.'").val());'.
                        'var vatamt'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var netamt'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        'var adv'.$i.' = parseFloat($("#ar_adv'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wt'.$i.'").val());'.
                        'var ret'.$i.' = parseFloat($("#ar_ret'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vat'.$i.'").val());'.
                        'var xa'.$i.' = (amt'.$i.'*adv'.$i.')/100;'.
                        'var xw'.$i.' = (amt'.$i.'*wt'.$i.')/100;'.
                        'var xr'.$i.' = (amt'.$i.'*ret'.$i.')/100;'.
                        'var xv'.$i.' = (amt'.$i.'*vat'.$i.')/100;'.
                        'var tn'.$i.' = (amt'.$i.'+xv'.$i.')-(xa'.$i.'+xw'.$i.'+xr'.$i.');'.
                        'var a1 = parseFloat($("#toa").val());'.
                        'var a2 = parseFloat($("#to_adv").val());'.
                        'var w1 = parseFloat($("#tow").val());'.
                        'var w2 = parseFloat($("#to_wt").val());'.
                        'var r1 = parseFloat($("#tor").val());'.
                        'var r2 = parseFloat($("#to_ret").val());'.
                        'var v1 = parseFloat($("#tov").val());'.
                        'var v2 = parseFloat($("#to_vat").val());'.
                        'var n1 = parseFloat($("#ton").val());'.
                        'var n2 = parseFloat($("#to_net").val());'.

                        'var suma = (a2-a1)+xa'.$i.';'.
                        '$("#to_adv").val(suma);'.
                        '$("#ar_advamt'.$i.'").val(xa'.$i.');'.

                        'var sumw = (w2-w1)+xw'.$i.';'.
                        '$("#to_wt").val(sumw);'.
                        '$("#ar_wtamt'.$i.'").val(xw'.$i.');'.

                        'var sumr = (r2-r1)+xr'.$i.';'.
                        '$("#to_ret").val(sumr);'.
                        '$("#ar_retamt'.$i.'").val(xr'.$i.');'.

                        'var sumv = (v2-v1)+xv'.$i.';'.
                        '$("#to_vat").val(sumv);'.
                        '$("#ar_vatamt'.$i.'").val(xv'.$i.');'.

                        'var sumn = (n2-n1)+tn'.$i.';'.
                        '$("#to_net").val(sumn);'.
                        '$("#ar_netamt'.$i.'").val(tn'.$i.');'.

                        '$("#ok'.$i.'").hide();'.
                        '$("#sum'.$i.'").show();'.
                        '$("#ar_amtt'.$i.'").show();'.
                        '$("#ar_amt'.$i.'").hide();'.
                        '});'.
                        '</script>';

                    $i++; }
            }
            elseif ($check_no == "INVR") {
                $toamt = 0;$i=$id;  foreach ($re as $rr) {
                    $resys = $this->db->query("SELECT * from system where systemcode= $rr->inv_system")->result();
                    foreach ($resys as $rs) {
                        $nr = $rs->systemname;
                        $cr = $rs->systemcode;
                    }
                    echo
                        '<tr >'.
                        '<td>'.$i.'</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$rr->inv_ref.'" id="ar_ref" name="ar_ref[]">'.$rr->inv_ref.
                        '</td>'.
                        '<td><span class="label label-success">'.$rr->inv_type.'</span><input type="hidden" value="'.$rr->inv_type.'" id="ar_type" name="ar_type[]"></td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$period.'" id="ar_period" name="ar_period[]">'.$period.
                        '</td>'.
                        '<td></td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$cr.'" id="ar_system" name="ar_system[]">'.$nr.
                        '</td>'.
                        '<td></td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;border: 1px solid #c7c6c6; height: 36px;padding: 7px 12px;" value="'.$rr->inv_retentionamt.'" id="ar_amt'.$i.'" name="ar_amt[]">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$rr->inv_retentionamt.'" id="ar_amtt'.$i.'" name="ar_amtt[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_adv'.$i.'" name="ar_adv[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_advamt'.$i.'" name="ar_advamt[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_wt'.$i.'" name="ar_wt[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_wtamt'.$i.'" name="ar_wtamt[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_ret'.$i.'" name="ar_ret[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_retamt'.$i.'" name="ar_retamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<input type="hidden" value="'.$rr->inv_vat.'" id="ar_vat'.$i.'" name="ar_vat[]">'.$rr->inv_vat.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$rr->inv_vatamt.'" id="ar_vatamt'.$i.'" name="ar_vatamt[]">'.
                        '</td>'.
                        '<td style="padding: 1px 2px;text-align: right;">'.
                        '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$rr->inv_netamt.'" id="ar_netamt'.$i.'" name="ar_netamt[]">'.
                        '</td>'.
                        '<td>'.
                        '<i class="icon-box-add" id="ok'.$i.'"></i>'.
                        '<i class="icon-pencil" id="sum'.$i.'"></i>'.
                        '</td>';
                    echo  '</tr>';
                    echo  '<script>'.
                        '$("#ar_amt'.$i.'").hide();'.

                        '$("#ok'.$i.'").hide();'.
                        '$("#sum'.$i.'").click(function(){'.
                        '$("#ok'.$i.'").show();'.
                        '$("#sum'.$i.'").hide();'.
                        '$("#ar_amtt'.$i.'").hide();'.
                        '$("#ar_amt'.$i.'").show();'.

                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var net'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        '$("#to").val(amt'.$i.');'.
                        '$("#tov").val(vat'.$i.');'.
                        '$("#ton").val(net'.$i.');'.
                        '});'.
                        '$("#ar_amt'.$i.'").keyup(function(){'.
                        'var smdr = $("#sumamt").val();'.
                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var wt'.$i.' = parseFloat($("#ar_wt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vat'.$i.'").val());'.
                        'var xw'.$i.' = (amt'.$i.'*wt'.$i.')/100;'.
                        'var xv'.$i.' = (amt'.$i.'*vat'.$i.')/100;'.
                        'var xn'.$i.' = (amt'.$i.'-xw'.$i.')+xv'.$i.';'.
                        '$("#ar_wtamt'.$i.'").val(xw'.$i.');'.
                        '$("#ar_vatamt'.$i.'").val(xv'.$i.');'.
                        '$("#ar_netamt'.$i.'").val(xn'.$i.');'.
                        '$("#de").val(amt'.$i.');'.
                        '});'.

                        '$("#ok'.$i.'").click(function(){'.
                        'var a1 = parseFloat($("#to").val());'.
                        'var a2 = parseFloat($("#de").val());'.
                        'var a3 = parseFloat($("#to_amt").val());'.

                        'var sum = (a3-a1)+a2;'.
                        '$("#to_amt").val(sum);'.
                        '$("#ar_amtt'.$i.'").val(a2);'.

                        'var amt'.$i.' = parseFloat($("#ar_amt'.$i.'").val());'.
                        'var vatamt'.$i.' = parseFloat($("#ar_vatamt'.$i.'").val());'.
                        'var netamt'.$i.' = parseFloat($("#ar_netamt'.$i.'").val());'.
                        'var vat'.$i.' = parseFloat($("#ar_vat'.$i.'").val());'.
                        'var xv'.$i.' = (amt'.$i.'*vat'.$i.')/100;'.
                        'var tn'.$i.' = amt'.$i.'+xv'.$i.';'.
                        'var v1 = parseFloat($("#tov").val());'.
                        'var v2 = parseFloat($("#to_vat").val());'.
                        'var n1 = parseFloat($("#ton").val());'.
                        'var n2 = parseFloat($("#to_net").val());'.

                        'var sumv = (v2-v1)+xv'.$i.';'.
                        '$("#to_vat").val(sumv);'.
                        '$("#ar_vatamt'.$i.'").val(xv'.$i.');'.

                        'var sumn = (n2-n1)+tn'.$i.';'.
                        '$("#to_net").val(sumn);'.
                        '$("#ar_netamt'.$i.'").val(tn'.$i.');'.

                        '$("#ok'.$i.'").hide();'.
                        '$("#sum'.$i.'").show();'.
                        '$("#ar_amtt'.$i.'").show();'.
                        '$("#ar_amt'.$i.'").hide();'.
                        '});'.
                        '</script>';
                    $i++;}
            }

            $tt = $this->db->query("SELECT * from ar_account_header where acc_status = 'W'")->result();
            foreach ($tt as $oo) {
                $cc = $oo->acc_invno;
                $pp = $oo->acc_invperiod;
            }
            $checkk = substr($cc, 0, 4);
            if ($checkk == "INV0") {
                $check = $this->db->query("SELECT sum(inv_downamt) as amt,sum(inv_vatamt) as vat,sum(inv_lesswt) as wt,sum(inv_netamt) as net from ar_invdown_detail where inv_ref='$cc' and inv_period=$pp")->result();
                foreach ($check as $k) {
                    $to_amt = $k->amt;
                    $to_vat = $k->vat;
                    $to_wt = $k->wt;
                    $to_net = $k->net;
                }
                echo '<script>'.
                    'var a1 = parseFloat($("#to_amt").val());'.
                    'var w1 = parseFloat($("#to_wt").val());'.
                    'var v1 = parseFloat($("#to_vat").val());'.
                    'var n1 = parseFloat($("#to_net").val());'.
                    'var a2 = '.$to_amt.';'.
                    'var w2 = '.$to_wt.';'.
                    'var v2 = '.$to_vat.';'.
                    'var n2 = '.$to_net.';'.
                    'var suma = a1+a2;'.
                    'var sumw = w1+w2;'.
                    'var sumv = v1+v2;'.
                    'var sumn = n1+n2;'.
                    '$("#to_amt").val(suma);'.
                    '$("#to_wt").val(sumw);'.
                    '$("#to_vat").val(sumv);'.
                    '$("#to_net").val(sumn);'.
                    '$("#sssss").val("down");'.
                    '</script>';
            }elseif ($checkk=="INVP") {
                $check = $this->db->query("SELECT sum(inv_progressamt) as amt,sum(inv_vatamt) as vat,sum(inv_lesswt) as wt,sum(inv_lessadvance) as adv ,sum(inv_lessretention) as ret ,sum(inv_netamt) as net from ar_invprogress_detail where inv_ref='$cc' and inv_period=$pp")->result();
                foreach ($check as $k) {
                    $to_amt = $k->amt;
                    $to_vat = $k->vat;
                    $to_wt = $k->wt;
                    $to_adv = $k->adv;
                    $to_ret = $k->ret;
                    $to_net = $k->net;
                }
                echo '<script>'.
                    'var a1 = parseFloat($("#to_amt").val());'.
                    'var w1 = parseFloat($("#to_wt").val());'.
                    'var v1 = parseFloat($("#to_vat").val());'.
                    'var e1 = parseFloat($("#to_adv").val());'.
                    'var r1 = parseFloat($("#to_ret").val());'.
                    'var n1 = parseFloat($("#to_net").val());'.
                    'var a2 = '.$to_amt.';'.
                    'var w2 = '.$to_wt.';'.
                    'var v2 = '.$to_vat.';'.
                    'var n2 = '.$to_net.';'.
                    'var e2 = '.$to_adv.';'.
                    'var r2 = '.$to_ret.';'.
                    'var suma = a1+a2;'.
                    'var sumw = w1+w2;'.
                    'var sumv = v1+v2;'.
                    'var sumn = n1+n2;'.
                    'var sume = e1+e2;'.
                    'var sumr = r1+r2;'.
                    '$("#to_amt").val(suma);'.
                    '$("#to_wt").val(sumw);'.
                    '$("#to_vat").val(sumv);'.
                    '$("#to_adv").val(sume);'.
                    '$("#to_ret").val(sumr);'.
                    '$("#to_net").val(sumn);'.
                    '$("#sssss").val("progress");'.
                    '</script>';
            }elseif ($checkk=="INVR") {
                $check = $this->db->query("SELECT sum(inv_retentionamt) as amt,sum(inv_vatamt) as vat,sum(inv_lesswt) as wt,sum(inv_netamt) as net from ar_invretention_detail where inv_ref='$cc' and inv_period=$pp")->result();
                foreach ($check as $k) {
                    $to_amt = $k->amt;
                    $to_vat = $k->vat;
                    $to_wt = $k->wt;
                    $to_net = $k->net;
                }
                echo '<script>'.
                    'var a1 = parseFloat($("#to_amt").val());'.
                    'var w1 = parseFloat($("#to_wt").val());'.
                    'var v1 = parseFloat($("#to_vat").val());'.
                    'var n1 = parseFloat($("#to_net").val());'.
                    'var a2 = '.$to_amt.';'.
                    'var w2 = '.$to_wt.';'.
                    'var v2 = '.$to_vat.';'.
                    'var n2 = '.$to_net.';'.
                    'var suma = a1+a2;'.
                    'var sumw = w1+w2;'.
                    'var sumv = v1+v2;'.
                    'var sumn = n1+n2;'.
                    '$("#to_amt").val(suma);'.
                    '$("#to_wt").val(sumw);'.
                    '$("#to_vat").val(sumv);'.
                    '$("#to_net").val(sumn);'.
                    '$("#sssss").val("retention");'.
                    '</script>';
            }
            return true;
        }
        else
        {
            return false;
        }
        return true;

    }

    public function insert_credit(){
      $session_data = $this->session->userdata('sessed_in');
      // print_r($session_data);die();
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $input = $this->input->post();
          // echo "<pre>";
          // var_dump($input);
          // die();
             for ($i=0;$i < count($input['inv_system']);$i++){
            $data_detail = array(
                'createdate' => $input['createdate'][$i],
                'inv_invaoumt' => $input['inv_netamt'][$i],
                'inv_lesswt' => $input['inv_lesswt'][$i],
                'inv_ret' => $input['acc_retamt'][$i],
                'inv_vatper' => $input['project_vat'],
                'inv_vatamt' => $input['inv_vatper'][$i],
                'inv_wtper' => $input['project_wt'],
                'inv_adv' => $input['inv_adv'][$i],
                'inv_downamt' => $input['inv_downamt'][$i],
                'inv_system' => $input['inv_system'][$i],
                'inv_ref' => $input['cn_code'],
                'inv_period' => $input['inv_period'][$i],
                'inv_project' => $input['project_id'][$i],
                'inv_netaoumt' => $input['inv_netamt'][$i],
                'useradd' => $username,
                'compcode' => $compcode,
            );
            $this->db->insert('ar_credit_detail',$data_detail);
        }
        $data_header = array(
                'inv_no' => $input['cn_code'],
                'inv_invcode' => $input['invno'],
                'inv_acccode' => $input['acc_no'],
                'inv_project' => $input['project_id'],
                'inv_owner' => $input['debtor_code'],
                'inv_tax' => $input['debtor_tax'],
                'inv_wt ' => $input['project_wt'],
                'inv_vat' => $input['project_vat'],
                'inv_period ' => $input['acc_period'],
                'inv_year ' => $input['acc_year'],
                'inv_vat' => $input['project_vat'],
                'inv_type' => $input['acc_type'],
                'inv_status' => $input['wait'],
                'createdate' => date('Y-m-d H:i:s',now()),
                'inv_date' => date('Y-m-d',now()),
                'useradd' => $username,
                'compcode' => $compcode,
             );
        $this->db->insert('ar_credit_header',$data_header);

        // add gl_post_system
          // for ($ii=0; $ii < count($input['amt_dr']); $ii++) {
          //   $datag = array(
          //     'gl_refcode' => $input['cn_code'],
          //     'gl_actcode' => $input['inv_ac'][$ii],
          //     'gl_dr' => $input['amt_dr'][$ii],
          //     'gl_cr' => $input['amt_cr'][$ii],
          //     'useradd' => $username,
          //     'adddate' => date('Y-m-d H:i:s',now()),
          //     'gl_year' => $input['acc_year'],
          //     'gl_period' => $input['acc_period'],
          //     'compcode' => $compcode,
          //     'gl_job' => $input['systemcode'][$ii],
          //     'gl_project' => $input['project_id'],
          //     'gl_type' => "CNR",
          //     'status' => "N",
          //   );
          //   $this->db->insert('gl_post_system',$datag);
          // }
      // add gl_post_system

        $datacl = array(
                'status_cn' => "Y",
             );
        $this->db->where('acc_no',$input['acc_no']);
        if($this->db->update('ar_account_header',$datacl)){
           redirect($_SERVER['HTTP_REFERER']);
        }
    }
      public function query_recipt2()
    {
      $no = $this->input->post('inv_no');
      $period = $this->input->post('inv_period');
      $acc_no = $this->input->post('acc_no');
      $check_no = substr($no, 0, 4);
      $datt = array(
              'inv_status' => "W"
              );
            $this->db->where('inv_no',$no);
            $this->db->update('ar_credit_header',$datt);

      $de = $this->db->query("SELECT * from ar_credit_detail join ar_credit_header on ar_credit_header.inv_no = ar_credit_detail.inv_ref where inv_downamt != 0 and inv_ref='$no' group by inv_system")->result();
    //  where and   and 
      if($no){

        foreach ($de as $kk) { 
          $desys = $this->db->query("SELECT * from system where systemcode= $kk->inv_system")->result();
              foreach ($desys as $ds) {
                  $nd = $ds->systemname;
                  $cd = $ds->systemcode;
                  }
          echo 
            '<tr >'.
              '<td>'.
              '<input type="hidden" value="'.$kk->inv_invcode.'" id="ar_ref" name="ar_ref[]">'.$kk->inv_invcode.
              '</td>'.
              '<td><span class="label label-success">CN '.$kk->inv_type.'</span><input type="hidden" value="CN'.$kk->inv_type.'" id="ar_type" name="ar_type[]"></td>'.
              '<td>'.
              '<input type="hidden" value="'.$period.'" id="ar_period" name="ar_period[]">'.$period.
              '</td>'.
              '<td></td>'.
              '<td>'.
              '<input type="hidden" value="'.$cd.'" id="ar_system" name="ar_system[]">'.$nd.
              '</td>'.
              '<td>'.
              '<td>'.
              // '<input type="text" style="width: 75px;text-align: right;border: 1px solid #c7c6c6; height: 36px;padding: 7px 12px;" value="'.$kk->inv_downamt.'" id="ar_amt'.$kk->invi_id.'" name="ar_amt[]">'.
              '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$kk->inv_downamt.'" id="ar_amtt'.$kk->invi_id.'" name="ar_amtt[]">'.
              '</td>'.
              '<td>'.
              '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$kk->inv_adv.'" id="ar_adv'.$kk->invi_id.'" name="ar_adv[]">'.
              '</td>'.
              '<td>'.
                '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_advamt'.$kk->invi_id.'" name="ar_advamt[]">'.
              '</td>'.
              '<td>'.
                '<input type="hidden" value="'.$kk->inv_wtper.'" id="ar_wt'.$kk->invi_id.'" name="ar_wt[]">'.$kk->inv_wtper.
              '</td>'.
              '<td>'.
                '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$kk->inv_lesswt.'" id="ar_wtamt'.$kk->invi_id.'" name="ar_wtamt[]">'.
                '</td>'.
                '<td>'.
                  '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_ret'.$kk->invi_id.'" name="ar_ret[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="0" id="ar_retamt'.$kk->invi_id.'" name="ar_retamt[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="hidden" value="'.$kk->inv_vatper.'" id="ar_vat'.$kk->invi_id.'" name="ar_vat[]">'.$kk->inv_vatper.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly  value="'.$kk->inv_vatamt.'" id="ar_vatamt'.$kk->invi_id.'" name="ar_vatamt[]">'.
                  '</td>'.
                  '<td>'.
                  '<input type="text" style="width: 75px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly value="'.$kk->inv_netamt.'" id="ar_netamt'.$kk->invi_id.'" name="ar_netamt[]">'.
                  '</td>'.
                  '<td>'.

                  '</td>';
          echo '</tr>';
        }
      }
    }

    public function addjournal(){

          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $compcode = $session_data['compcode'];
          $add = $this->input->post();

            $datestring = "Y";
             $mm = "m";
             $dd = "d";

             $this->db->select('*');
             $qu = $this->db->get('ar_batch_header');
             $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

             if ($res==0) {
                $jvcode = "ARJ".date($datestring).date($mm)."000"."1";
                $id_vocher ="1";
             }else{
               $this->db->select('*');
               $this->db->order_by('id_vocher','desc');
               $this->db->limit('1');
               $q = $this->db->get('ar_batch_header');
               $run = $q->result();
               foreach ($run as $valx)
               {
                 $x1 = $valx->id_vocher+1;
               }

               if ($x1<=9) {
                  $jvcode = "ARJ".date($datestring).date($mm)."000".$x1;
                  $id_vocher = $x1;
               }
               elseif ($x1<=99) {
                 $jvcode = "ARJ".date($datestring).date($mm)."00".$x1;
                 $id_vocher = $x1;
               }
               elseif ($x1<=999) {
                 $jvcode = "ARJ".date($datestring).date($mm)."0".$x1;
                 $id_vocher = $x1;
               }
             }

             $data = array(
             'vchno' => $jvcode,
             'id_vocher' => $id_vocher,
             'vchdate' => $add['vchdate'],
             'glyear' => $add['glyear'],
             'glperiod' => $add['glperiod'],
             // 'bookcode' => $add['bookcode'],
             // 'refno' => $add['refnoo'],
             // 'refdate' => $add['refdate'],
             // 'sffumdr' => $add['sffumdr'],
             // 'sffumcr' => $add['sffumcr'],  
             // 'datatype' => $add['datatype'], 
             // 'dpt_code' => $add['dpt_code'],  
             // 'pucost' => $add['pucost'], 
             // 'printform' => $add['printform'],  
             // 'auto' => $add['auto'], 
             // 'pre_event' => $add['pre_event'],
            'chqno' => $add['chqno'], 
            'type_gl' => $add['type_gl'],  
            'project_id' => $add['proid'], 
            'subproject_id' => $add['sub_id'],   
            'bankid' => $add['bankid'], 
            'branchid' => $add['branchd'],
            'bankname' => $add['bankname'], 
            'branchname' => $add['branch'],
            'chqdate' => $add['chqdate'], 
             'adduser' => $username,
             'adddate' => date('Y-m-d'),
             'addtime' => date('H:i:s'),
             'compcode' => $compcode,
           );

           $this->db->insert('ar_batch_header',$data);

           for ($i=0; $i < count($add['chki']); $i++) {
            if($add['chki'][$i]!=""){ 
                  $data_d = array(
                    'vchno' => $jvcode,
                    'ac_code' => $add['acc_code'][$i],
                   'ac_name' => $add['acc_name'][$i],
                   'costcode' => $add['costcode'][$i],
                   'amtdr' => parse_num($add['dr'][$i]),
                   'amtcr' => parse_num($add['cr'][$i]),
                   // 'varchar' => $add['ven_code'][$i],
                   // 'namevendor' => $add['ven_name'][$i],
                   // 'jobcode' => $add['sys_code'][$i],
                   // 'systemname' => $add['sys_name'][$i],
                   // 'gldesc' => $add['description'][$i],
                   // 'dpt_title' => $add['dep_name'][$i],
                   // 'dpt_code' => $add['dep_code'][$i],
                   // 'namecus' => $add['cus_name'][$i],
                   // 'cust_code' => $add['cus_code'][$i],
                   // 'project_name' => $add['pro_name'][$i],
                   // 'project_id' => $add['pro_code'][$i],
                   // 'refdocdate' => $add['refdates'][$i],
                   // 'amount' => $add['amt'][$i],
                   // 'taxper' => $add['vat'][$i],
                   // 'refno' => $add['refno'][$i],
                   // 'tax' => $add['tax'][$i],
                   // 'paid' => $add['paid'][$i],
                   // 'taxamount' => $add['taxamt'][$i],
                   // 'taxtype' => $add['taxtype'][$i],
                   // 'taxno' => $add['taxnos'][$i],
                   // 'taxdate' => $add['taxdates'][$i],
                   // 'taxdes' => $add['taxdesc'][$i],
                   // 'taxid' => $add['taxid'][$i],
                   // 'address' => $add['address'][$i],
                   // 'wtno' => $add['wt'][$i],
                   // 'adduser' => $username,
                   // 'maincode' => $compcode,
                   // 'adddate' => date('Y-m-d'),
                   // 'addtime' => date('H:i:s'),
                   // 'boq_id' => $add['boq_id'][$i],
                   // 'bd_tender' =>$add["bd_tenid"][$i]

                  ); 
            $this->db->insert('ar_batch_detail',$data_d);

            $datag = array(
              'gl_refcode' => $jvcode,
              'gl_actcode' => $add['acc_code'][$i],
              'gl_dr' => parse_num($add['dr'][$i]),
              'gl_cr' => parse_num($add['cr'][$i]),
              'useradd' => $username,
              'adddate' => date('Y-m-d H:i:s',now()),
              'gl_date' => date('Y-m-d',now()),
              'gl_year' => $add['glyear'],
              'gl_period' => $add['glperiod'],
              'compcode' => $compcode,
              'gl_project' => $add['proid'],
              'gl_type' => "AR",
              'status' => "N",
            );
            $this->db->insert('gl_post_system',$datag);
            // add gl_post_system 
              }
            }
            echo $jvcode."/".$add['sub_id'];
            return true;
  } 

  public function edit_araccount(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();
    $this-> db->where('vchno', $post['acc_no']);
    $this-> db->delete('ar_gl');

    foreach ($post['id_row'] as $key => $value) {
      $update = array('acc_codeac' => $post['inv_ac'][$key]);
      $this->db->where('acc_id',$post['id_row'][$key]);
      $this->db->update('ar_account_detail',$update);

      $data_gl = array(
            'vchno' => $post['acc_no'],
            'vchdate' => $post['billdate'],
            'doctype' => 'ar_'.$post['invtype'],
            'acct_no' =>  $post['inv_ac'][$key],
            'projectid' => $post['projectid'],
            'systemcode' => $post["systemcode"][$key],
            'amtdr' => $post['acc_dr'][$key],
            'amtcr' => $post['acc_cr'][$key],
            'glyear' => $post['inv_year'],
            'glperiod' => $post['ar_period'],
            'completegl' => 'N',
            'adduser' => $username,
            'createdate' => date('Y-m-d H:i:s'),
            'compcode' => $compcode,
            'vendor_id' => $post['owner'],
      );
      $this->db->insert('ar_gl',$data_gl);
    }
    redirect('ar/ar_edit/'.$post['acc_no']);
    
  }

  public function edit_receipt(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();


    $data_header = array(
      'vou_remark' =>  $post['remark'],
    );

    $this->db->where('vou_no',$post['re_no']);
    $this->db->update('ar_receipt_header',$data_header);

    foreach ($post["vou_id"] as $i => $value) {

      $data_detail = array(
        'vou_downamt' => $post['vou_downamt'][$i],
        'vou_lesswt' => $post['vou_lesswt'][$i],
        'vou_advamt' => $post['vou_advamt'][$i],
        'vou_retamt' => $post['vou_retamt'][$i],
        'vou_vatamt' => $post['vou_vatamt'][$i],
        'vou_netamt' => $post['vou_netamt'][$i]
      );

      $this->db->where('vou_id',$post['vou_id'][$i]);
      $this->db->update('ar_receipt_detail',$data_detail);
    }

   
    redirect('ar/ar_receipt_edit/'.$post['re_no']);
 
    
  }


}