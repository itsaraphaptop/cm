<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acc_active extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('datastore_m');
            $this->load->model('office_m');
            $this->load->model('acc_m');
        }

        ////////////////// insert apv_h
        public function add_apv_h()
        {
        	 	$datestring = "Y";
	            $mm = "m";
	            $dd = "d";
                              $this->db->select('*');
                              $qu = $this->db->get('apv_header');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $apvcode = "APV".date($datestring).date($mm).date($dd)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('apv_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('apv_header');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->apv_id+1;
                                    }
                                  $apvcode = "APV".date($datestring).date($mm).date($dd).$x1;
                                }
        	$data = array(
				'apv_code' 			=> $apvcode,
				'apv_pono' 			=> $this->input->post('pono'),
				'apv_vender'		=> $this->input->post('ven'),
				'apv_type' 			=> "apv",
				'apv_duedate'		=> $this->input->post('duedate'),
				'apv_inv' 			=> $this->input->post('invo'),
				'apv_crterm' 		=> $this->input->post('cterm'),
				'apv_project' 		=> $this->input->post('projectid'),
				'apv_system' 		=> $this->input->post('system'),
				'apv_department' 	=> $this->input->post('departid'),
				'apv_netamt' 		=> $this->input->post('amount'),
				'apv_vat' 			=> $this->input->post('tax'),
				'apv_totamt' 		=> $this->input->post('totamount'),
				'apv_useradd' 		=> $this->input->post('user'),
                'apv_date'          => $this->input->post('apvdate')

        		);
        	if($this->acc_m->ins_apv_h($data))
        	{
                $poreccode = $this->input->post('porecx');
                $datapo = array(
                    'apv_status' => 'open'
                    );
                $this->db->where('po_reccode',$poreccode);
                $this->db->update('po_receive',$datapo);
        		echo $apvcode;
        		return true;
        	}
        	else
        	{
        		return false;
        	}

        }

        public function apv_h_new()  /// apv เพิ่ใหม่
        {
            $data = array(
                'apv_code'          => $this->input->post('apvno'),
                'apv_pono'          => $this->input->post('pono'),
                'apv_vender'        => $this->input->post('vender'),
                'apv_type'          => "apvn",
                'apv_duedate'       => $this->input->post('duedate'),
                'apv_inv'           => $this->input->post('invno'),
                'apv_crterm'        => $this->input->post('cterm'),
                'apv_project'       => $this->input->post('putproject'),
                'apv_system'        => $this->input->post('system'),
                'apv_department'    => $this->input->post('putdpt'),
                'apv_useradd'       => $this->input->post('user'),
                'apv_date'          => $this->input->post('apvdate'),
                'apv_do'            => $this->input->post('porecx')
                );
            if ($this->db->insert('apv_header',$data)) {
                echo $this->input->post('apvno');
               return true;
            }else
            {
                return false;
            }

        }
        public function editapv_h_()  /// apv เพิ่ใหม่
        {
          $id = $this->input->post('code');
            $data = array(
                'apv_pono'          => $this->input->post('pono'),
                'apv_vender'        => $this->input->post('vender'),
                'apv_type'          => "apvn",
                'apv_duedate'       => $this->input->post('duedate'),
                'apv_inv'           => $this->input->post('invno'),
                'apv_crterm'        => $this->input->post('cterm'),
                'apv_project'       => $this->input->post('putproject'),
                'apv_system'        => $this->input->post('system'),
                'apv_department'    => $this->input->post('putdpt'),
                'apv_useradd'       => $this->input->post('user'),
                'apv_date'          => $this->input->post('apvdate'),
                'apv_do'            => $this->input->post('porecx')
                );
            $this->db->where('apv_code',$id);
            if ($this->db->update('apv_header',$data)) {
                echo $this->input->post('code');
               return true;
            }else
            {
                return false;
            }

        }

        public function add_apo_h()
        {
                $datestring = "Y";
                $mm = "m";
                $dd = "d";
                              $this->db->select('*');
                              $qu = $this->db->get('apo_header');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $apocode = "APO".date($datestring).date($mm).date($dd)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('apo_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('apo_header');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x1 = $valx->apo_id+1;
                                    }
                                  $apocode = "APO".date($datestring).date($mm).date($dd).$x1;
                                }
                $data = array(
                    'apo_code' => $apocode,
                    'apo_ventype' => $this->input->post('ventype'),
                    'apo_vender' => $this->input->post('ven'),
                    'apo_project' => $this->input->post('projectid'),
                    'apo_system' => $this->input->post('system'),
                    'apo_department' => $this->input->post('departid'),
                    'apo_useradd' => $this->input->post('user'),
                    'apo_prref' => $this->input->post('docno'),
                    'apo_date' => $this->input->post('apodate'),
                    'apo_type' => "apo"
                    );
                if($this->acc_m->ins_apo_h($data))
                {
                    $prref = $this->input->post('docno');
                    $ref = array(
                        'status' => "paid"
                        );
                    $this->db->where('docno',$prref);
                    $this->db->update('pettycash',$ref);
                    echo $apocode;
                    return true;
                }
                else
                {
                    return false;
                }
        }

        public function insapvdetail()
        {
          $id = $this->input->post('apvno');
          $data = array(
              'apvi_ref' => $this->input->post('apvno'),
              'apvi_qty' => $this->input->post('pqty'),
              'apvi_unit' => $this->input->post('punit'),
              'apvi_priceunit' =>$this->input->post('pprice_unit'),
              'apvi_amount' => $this->input->post('pamountcre'),
              'apvi_discountper1' => $this->input->post('pdiscper1'),
              'apvi_discountper2' => $this->input->post('pdiscper2'),
              'po_disex' => $this->input->post('pdiscex'),
              'apvi_disamt' => $this->input->post('pdisamt'),
              'apvi_vat' => $this->input->post('pvat'),
              'apvi_netamt' => $this->input->post('pnetamt'),
              'apvi_remark' => $this->input->post('premark'),
              'apvi_costcode' => $this->input->post('codecostcode'),
              'apvi_costname' => $this->input->post('costname'),
              'apvi_matcode' => $this->input->post('matcodeb6'),
              'apvi_matname' => $this->input->post('matname')
            );
           $this->db->insert('apv_detail',$data);
          echo $this->input->post('apvno');
           return true;
        }

        public function editapv_d()
        {
              $id = $this->input->post('apvid');
              $apvno = $this->input->post('apvno');
              $data = array(
                'apvi_matcode' => $this->input->post('matcodeb6'),
                'apvi_matname' => $this->input->post('matname'),
                'apvi_costcode' => $this->input->post('codecostcode'),
                'apvi_costname' => $this->input->post('costname'),
                'apvi_qty' => $this->input->post('pqty'),
                'apvi_unit' => $this->input->post('punit'),
                'apvi_priceunit' => $this->input->post('pprice_unit'),
                'apvi_amount' => $this->input->post('pamount'),
                'apvi_discountper1' => $this->input->post('pdiscper1'),
                'apvi_discountper2' => $this->input->post('pdiscper2'),
                'po_disex' => $this->input->post('pdiscex'),
                'apvi_disamt' => $this->input->post('pdisamt'),
                'apvi_vat' => $this->input->post('pvat'),
                'apvi_netamt' => $this->input->post('pnetamt'),
                'apvi_remark' => $this->input->post('premark'),
              );
              $this->db->where('apvi_ref',$apvno);
              $this->db->where('apvi_id',$id);
              $query = $this->db->update('apv_detail',$data);
              if ($query)
              {
               echo $apvno;
               return true;
              }
              else
              {
                return false;
              }
        }

  public function add_ar_other() {
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();

      $this->db->select('*');
      $qu = $this->db->get('ar_account_header');
      $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
      $yy = "Y";
      $mm = "m";
      $ar = "ARO";

      if ($res==0) {
          $ar_no = $ar.date($yy).date($mm).sprintf("%04d",1);
      }else{
          $no = $res+1;
          $ar_no = $ar.date($yy).date($mm).sprintf("%04d",$no);
      }

      $data = array(
        'acc_no' => $ar_no,
        'acc_invno' => $post["ot_code"],
        'acc_billdate' => $post["ot_date"],
        'acc_invdate' => $post["ot_date"],
        'acc_invamt ' => $post["amt"],
        'acc_vat' => $post["ot_vat"],
        'acc_wt' => $post["ot_wt"],
        'acc_due' => $post["ot_duedate"],
        'acc_ardate' => date('Y-m-d'),
        'acc_project' => $post['ot_pro_id'],
        'acc_owner' => $post["cus_code"],
        'acc_invtype' => 'other',
        'acc_year' => $post['year'],
        'acc_period' => $post['period'],
        'year' => $post['year'],
        'period' => $post['period'],
        'acc_invperiod' => $post['period'],
        'acc_credit' => $post['ot_crterm'],
        'acc_remark' => $post['ot_remark'],
        'gl_status' => 'N',
        'acc_status' => 'N',
        'clear_status' => 'N',
        'status_cn' => 'N',
        'useradd' => $username,
        'createdate' => date('Y-m-d H:i:s'),
        'compcode' => $compcode
      );
      $this->db->insert('ar_account_header',$data);

    // echo "<pre>";
    // var_dump($data);
    // die();

      foreach ($post["system_id"] as $key => $value) {
        $datad = array(
          'acc_ref' => $ar_no,
          'acc_invno' => $post["ot_code"],
          'acc_codeac' => $post["acc_code"][$key],
          'acc_dr' => $post["debit"][$key],
          'acc_cr' => $post["credit"][$key],
          'acc_systemcode' => $post["sys_head_code"],
          'useradd' => $username,
          'createdate' => date('Y-m-d H:i:s'),
          'compcode' => $compcode,
        );
      $this->db->insert('ar_account_detail',$datad);

        $data_gl = array(
              'vchno' => $ar_no,
              'vchdate' => date('Y-m-d'),
              'doctype' => 'ar_pthen',
              'acct_no' =>  $post["acc_code"][$key],
              'projectid' => $post['ot_pro_id'],
              'systemcode' => $post["sys_head_code"],
              'amtdr' => $post["debit"][$key],
              'amtcr' => $post["credit"][$key],
              'glyear' => date($yy),
              'glperiod' => date($mm),
              'completegl' => 'N',
              'adduser' => $username,
              'createdate' => date('Y-m-d H:i:s'),
              'compcode' => $compcode,
              'vendor_id' => $post["cus_code"],
          
            );
        $query_row = $this->db->insert('ar_gl',$data_gl);
      }

      
      $update_invoice = array(
        "active" => "0",
        "ar_no" => $ar_no,
      );
      $this->db->where('ot_code',$post["ot_code"]);
      $this->db->update('other_header',$update_invoice);

    $return = array();
    if ($query_row) {
      $return['status']   = true;
      $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
      $return['ar']  = $ar_no; 
    }else{
      $return['status']   = false;
      $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
    }

    echo json_encode($return);
  }

  public function edit_ar_other(){
    $post = $this->input->post();

    $data = array(
        "year" => $post['year_ar'],
        "pariod" => $post['pariod_ar'],
        "ar_date" => $post['date_ar'],   
    );
    $this->db->where('ar_no',$post["ar_no"]);
    $query = $this->db->update('ar_account_other_header',$data);

    foreach ($post['id'] as $key => $value) {
      $data_update = array(
        "acc_code" => $post["acc_code"][$key],
        "acc_name" => $post["acc_name"][$key]
      );

      $this->db->where('id',$post['id'][$key]);
      $data_update = $this->db->update('ar_accourt_othen_detail',$data_update);
    }


    $return = array();
    if ($query) {
      $return['status']   = true;
      $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
    }else{
      $return['status']   = false;
      $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
    }
    
    echo json_encode($return);
  }

  public function add_bill(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();
    $data_header = array(
                          "bill_ot_no" => $post['v_no'],
                          "bill_ot_project_code" => $post['project_code'],
                          "bill_ot_project_name" => $post['project_name'],
                          "bill_ot_cus_code" => $post['customer_name'],
                          "bill_ot_cus_name" => $post['cus_name'],
                          "bill_ot_date" => $post['date'],
                          "bill_ot_tax" => $post['tax'],
                          "bill_ot_remark" => $post['remark'],
                          "user_create" => $username,
                          "date_create" => date('Y-m-d H:i:s'),
                          "compcode" => $compcode,
                        );
      $query_header = $this->db->insert('bill_other_header', $data_header);

    foreach ($post['amount'] as $key => $data) {
      $data_detail = array(
        "bill_ref_no" => $post['v_no'],
        "invoice_no" => $post["invoice"],
        "invoice_des" => $post['invoice_des'][$key],
        "bill_date" => date('Y-m-d'),
        "bill_amount" => $post['amount'][$key],
        "bill_vat" => $post['vat'][$key],
        "bill_vat_amt" => $post['vat_amt'][$key],
        "bill_wt" => $post['wt'][$key],
        "bill_wt_amt" => $post['wt_amt'][$key],
        "bill_amount_receipt" => $post['amount'][$key],
        "bill_qty" => $post['amount'][$key]/$post['amount_total'][$key],
        "bill_unit_id" => $post['unit_id'][$key],
        "bill_unit_code" => $post['unit_code'][$key],
        "bill_unit_name" => $post['unit_name'][$key],
      );

      $query_detail = $this->db->insert('bill_other_detail', $data_detail);


        $chk_price = ($post['amount_total'][$key])-($post['amount'][$key]+$post['bill_total'][$key]);

        if ($chk_price == 0) {
          $update_in = array(
            "bill_total" => $post['amount'][$key]+$post['bill_total'][$key],
            "status_bill" => 0,
          );
          $this->db->where('otde_id',$post["id_in"][$key]);
          $query_update = $this->db->update('other_detail',$update_in);
          

        }else{
          $update_in = array(
            "bill_total" => $post['amount'][$key]+$post['bill_total'][$key],
          );
          $this->db->where('otde_id',$post["invoice"]);
          $query_update = $this->db->update('other_detail',$update_in);
        }

        
        
    }

    $this->db->select('*');
    $this->db->where('status_bill',1);
    $this->db->where('ref_other',$post["invoice_id"]);
    $qu = $this->db->get('other_detail');
    $res = $qu->num_rows();
    if ($res == 0) {
      $update_status_bill = array(
        "active" => 0,
      );
      $this->db->where('ref_invice',$post["invoice"]);
      $query_update = $this->db->update('ar_account_other_header',$update_status_bill);
    }

    $return = array();
        if ($query_update) {
          $return['status']   = true;
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    echo json_encode($return);
  }

  public function add_receive(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();
    $this->db->select('*');
    $qu = $this->db->get('receipt_header');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
    $yy = "Y";
    $mm = "m";
    $rv = "RV";

    if ($res==0) {
        $rv_no = $rv.date($yy).date($mm).sprintf("%04d",1);
    }else{
        $no = $res+1;
        $rv_no = $rv.date($yy).date($mm).sprintf("%04d",$no);
    }

      $data_header = array(
          "recoipt_no" => $rv_no,
          "project_code" => $post["project_code"],
          "project_name" => $post["project_name"],
          "cus_code" => $post["customer_code"],
          "cus_name" => $post["customer_name"],
          "rept_amt" => $post["rept_amount"],
          "vat_amt" => $post["vat_amount"],
          "less_other_id" => $post["less_other_id"],
          "less_other_name" => $post["less_other_name"],
          "less_other_price" => $post["less_other_price"],
          "currency_name" => $post["currency_name"],
          "currency_id" => $post["currency_id"],
          "exchange" => $post["v_exchanges"],
          "remark" => $post["remark"],
          "to_bank_name" => $post["bankname"],
          "to_bank_branch" => $post["branch"],
          "to_bank_acno" => $post["acno"],
          "to_bank_acid" => $post["acid"],
          "voucher_date" => $post["v_date"],
          "compcode" => $compcode,
      );

      $query_header = $this->db->insert('receipt_header', $data_header);
      
       foreach ($post['paid'] as $key => $data) {
          $data_detail = array(
            "ref_no" => $rv_no,
            "chq_no" => $post["chq_no"][$key],
            "chq_date" => $post["chq_date"][$key],
            "bank" => $post["bank_name"][$key],
            "branch" => $post["branch_paid"][$key],
            "amount" => $post["amount_paid"][$key],
          );
          $query_detail = $this->db->insert('receipt_detail', $data_detail);
       }
       
      $update_status_bill = array(
        "active" => 0,
      );
      $this->db->where('bill_ot_no',$post["s_no"]);
      $query_update = $this->db->update('bill_other_header',$update_status_bill);

    $return = array();
        if ($query_detail) {
          $return['status']   = true;
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    echo json_encode($return);
  }

  public function ar_clear(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();
    $data_header = array(
        "receipt_no" => $post["rv_no"],
        "receipt_date" => $post["v_date"],
        "year" => $post["year"],
        "period" => $post["Period"],
        "project_code" => $post["project_code"],
        "project_name" => $post["project_name"],
        "cus_code" => $post["customer_code"],
        "cus_name" => $post["customer_name"],
        "rcpt_amt" => $post["rcpt_net_amt"],
        "currency" => $post["currency"],
        "exchange" => $post["exchange"],
        "paid_net_amt" => $post["paid_net_amt"],
        "less_other" => $post["less_other"],
        "to_bank" => $post["to_bank"],
        "to_bank_ac" => $post["ac_code"],
        "remark" => $post["remark"],
        "compcode" => $compcode,
    );

    $query = $this->db->insert('voucher_header', $data_header);

    $data_row1 = array(
        "ref_no" => $post["rv_no"],
        "acc_code" => $post["acc_code_1"],
        "acc_name" => $post["acc_name_1"],
        "cost_code" => $post["cost_code_1"],
        "debit" => $post["debit_1"],
        "credit" => '0',
        "user_create" => $username,
        "date_create" => date('Y-m-d'),   
      );
    $query_1 = $this->db->insert('voucher_detail', $data_row1);

    $data_row2 = array(
        "ref_no" => $post["rv_no"],
        "acc_code" => $post["acc_code_2"],
        "acc_name" => $post["acc_name_2"],
        "cost_code" => $post["cost_code_2"],
        "debit" => $post["debit_2"],
        "credit" => '0',
        "user_create" => $username,
        "date_create" => date('Y-m-d'),   
      );
    $query_2 = $this->db->insert('voucher_detail', $data_row2);  

    $data_row3 = array(
        "ref_no" => $post["rv_no"],
        "acc_code" => $post["acc_code_3"],
        "acc_name" => $post["acc_name_3"],
        "cost_code" => $post["cost_code_3"],
        "debit" => '0',
        "credit" => $post["credit_3"],
        "user_create" => $username,
        "date_create" => date('Y-m-d'),   
      );
    $query_3 = $this->db->insert('voucher_detail', $data_row3);

    $data_row4 = array(
        "ref_no" => $post["rv_no"],
        "acc_code" => $post["acc_code_4"],
        "acc_name" => $post["acc_name_4"],
        "cost_code" => $post["cost_code_4"],
        "debit" => '0',
        "credit" => $post["credit_4"],
        "user_create" => $username,
        "date_create" => date('Y-m-d'),   
      );
    $query_4 = $this->db->insert('voucher_detail', $data_row4);

    $update_status = array(
        "active" => 0,
      );
    $this->db->where('recoipt_no',$post["rv_no"]);
    $query_update = $this->db->update('receipt_header',$update_status);

    $return = array();
        if ($query_update) {
          $return['status']   = true;
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    echo json_encode($return);
  }

  public function add_ar_reduce(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();
    // run number
    $this->db->select('*');
    $qu = $this->db->get('reduce_trading_header');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
    $yy = "Y";
    $mm = "m";
    $rd = "RD";

    if ($res==0) {
        $rd_no = $rd.date($yy).date($mm).sprintf("%04d",1);
    }else{
        $no = $res+1;
        $rd_no = $rd.date($yy).date($mm).sprintf("%04d",$no);
    }
    // run number
    $data_header = array(
      'rd_no' => $rd_no, 
      'ref_inv_no' => $post['inv_no'], 
      'ref_inv_date' => $post['inv_date'],
      'project_code' => $post['project_code'], 
      'project_name' => $post['project_name'], 
      'cus_code' => $post['cus_code'], 
      'cus_name' => $post['cus_name'], 
      'vat' => $post['vat'], 
      'currency' => $post['curency'], 
      'exchange' => $post['exchange'], 
      'cr_term' => $post['cr_term'], 
      'due_date' => $post['due_date'], 
      'remark' => $post['remark'], 
      'user_craet' => $username, 
      'date_craet' => date('Y-m-d'), 
      'compcode' => $compcode, 
    );
    $query_header = $this->db->insert('reduce_trading_header', $data_header);

    foreach ($post['system'] as $key => $value) {
      $data_detail = array(
        'ref_rd_no' => $rd_no,
        'system' => $post['system'][$key],
        'mat_code' => $post['mat_code'][$key],
        'mat_name' => $post['mat_name'][$key],
        'qty' => $post['qty'][$key],
        'price_unit' => $post['price_unit'][$key],
        'amount' => $post['amount'][$key],
        'discount' => $post['discount'][$key],
        'net_amount' => $post['netamount'][$key],
        'ref_ic_no' => $post['doccode'][$key],
      );
      $query_detail = $this->db->insert('reduce_trading_detail', $data_detail);
    }

    $update_status = array(
        "active" => 0,
      );
    $this->db->where('trad_inv',$post["inv_no"]);
    $query_update = $this->db->update('trad_header',$update_status);
    
    $return = array();
        if ($query_update) {
          $return['status']   = true;
          $return['ar_rd']   = $rd_no;
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    
    echo json_encode($return);
  }

  public function ar_reduce_edit(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];
    $post = $this->input->post();
    $data_header = array(
      'vat' => $post['vat'], 
      'remark' => $post['remark'], 
    );
    $this->db->where('rd_no',$post["rd_no"]);
    $update_header = $this->db->update('reduce_trading_header',$data_header);

    foreach ($post['system'] as $key => $value) {
      $data_detail = array(
        'price_unit' => $post['price_unit'][$key],
        'amount' => $post['amount'][$key],
        'discount' => $post['discount'][$key],
        'net_amount' => $post['netamount'][$key],
      );
      $this->db->where('ref_rd_no',$post["rd_no"]);
      $update_detail= $this->db->update('reduce_trading_detail',$data_detail);
    }

    $return = array();
        if ($update_detail) {
          $return['status']   = true;
          $return['ar_rd']   = $post["rd_no"];
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    echo json_encode($return);    
    
  }

  public function add_ar_receipt_trading(){
    $session_data = $this->session->userdata('sessed_in');
    $username = $session_data['username'];
    $compcode = $session_data['compcode'];

    $post = $this->input->post();
    // echo "<pre>";
    // var_dump($post);
    // die();

    // run number
    $this->db->select('*');
    $qu = $this->db->get('ar_account_header');
    $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา
    $yy = "Y";
    $mm = "m";
    $art = "ART";

    if ($res==0) {
        $art_no = $art.date($yy).date($mm).sprintf("%04d",1);
    }else{
        $no = $res+1;
        $art_no = $art.date($yy).date($mm).sprintf("%04d",$no);
    }
    // run number

    $data = array(
            'acc_no' => $art_no,
            'acc_invno' => $post['inv_no'],
            'acc_billdate' => date('Y-m-d'),
            'acc_invamt ' => $post['amt'],
            'acc_invvat ' => $post['vat'],
            'acc_vat' => $post['vat'],
            'acc_invdate' => $post['inv_date'],
            'acc_due' => $post['due_date'],
            'acc_ardate' => date('Y-m-d'),
            'acc_project' => $post['project_id'],
            'acc_owner' => $post['customer_code'],
            'acc_invtype' => 'trading',
            'acc_year' => date($yy),
            'acc_period' => date($mm),
            'year' => date($yy),
            'period' => date($mm),
            'acc_invperiod' => date($mm),
            'acc_credit' => $post['cr_term'],
            'acc_remark' => $post['remark'],
            'gl_status' => 'N',
            'acc_status' => 'N',
            'clear_status' => 'N',
            'status_cn' => 'N',
            'useradd' => $username,
            'createdate' => date('Y-m-d H:i:s'),
            'compcode' => $compcode
          );
         $this->db->insert('ar_account_header',$data);

        foreach ($post['system_id'] as $key => $value) {
          $data_detail = array(
              'acc_ref' => $art_no,
              'acc_invno' => $post['inv_no'],
              'acc_codeac' => $post['acc_code'][$key],
              'acc_dr' => $post['debit'][$key],
              'acc_cr' => $post['credit'][$key],
              'acc_systemcode' => $post['system_code'][$key],
              'useradd' => $username,
              'createdate' => date('Y-m-d H:i:s'),
              'compcode' => $compcode,
              'cost_code' => $post['cost_code'][$key],
          );
          $this->db->insert('ar_account_detail',$data_detail);

          $data_gl = array(
              'vchno' => $art_no,
              'vchdate' => date('Y-m-d'),
              'doctype' => 'ar_trading',
              'acct_no' =>  $post['acc_code'][$key],
              'projectid' => $post['project_id'],
              'systemcode' => $post["system_code"][$key],
              'amtdr' => $post['debit'][$key],
              'amtcr' => $post['credit'][$key],
              'glyear' => date($yy),
              'glperiod' => date($mm),
              'completegl' => 'N',
              'adduser' => $username,
              'createdate' => date('Y-m-d H:i:s'),
              'compcode' => $compcode,
              'vendor_id' => $post['customer_code'],
          
            );
            $this->db->insert('ar_gl',$data_gl);

        }

    $update_status = array(
        "ar_no" => $art_no,
        "active_ar" => 0,
      );
    $this->db->where('trad_inv',$post["inv_no"]);
    $query_update = $this->db->update('trad_header',$update_status);
    
    $return = array();
        if ($query_update) {
          $return['status']   = true;
          $return['ar_rd']   = $art_no;
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    
    echo json_encode($return);
  }

  public function edit_ar_receipt_trading(){
    $post = $this->input->post();

    $data_header = array(
      'year' => $post['year'], 
      'pariod' => $post['pariod'], 
      'date' => $post['date'], 
    );
    $this->db->where('id',$post["ar_id"]);
    $query_update = $this->db->update('ar_account_trading_header',$data_header);

    foreach ($post["art_detail_id"] as $key => $value) {
      $data_detail = array(
        'acc_code' => $post['acc_code'][$key], 
        'acc_name' => $post['acc_name'][$key], 
        'cost_code' => $post['cost_code'][$key], 
      );
      $this->db->where('id',$post['art_detail_id'][$key]);
      $detail_update = $this->db->update('ar_accourt_trading_detail',$data_detail);
    }

    $return = array();
        if ($detail_update) {
          $return['status']   = true;
          $return['message']  = 'บันทึกข้อมูลเรียบร้อย'; 
        }else{
          $return['status']   = false;
          $return['message']  = 'บันทึกข้อมูลไม่สำเร็จ';
        }
    
    echo json_encode($return);
  }


}

// array(8) {
//   ["ar_id"]=>
//   string(1) "1"
//   ["date"]=>
//   string(10) "2018-03-13"
//   ["year"]=>
//   string(4) "2018"
//   ["pariod"]=>
//   string(2) "03"
//   ["art_detail_id"]=>
//   array(3) {
//     [0]=>
//     string(1) "1"
//     [1]=>
//     string(1) "2"
//     [2]=>
//     string(1) "3"
//   }
//   ["acc_code"]=>
//   array(3) {
//     [0]=>
//     string(7) "1121010"
//     [1]=>
//     string(7) "2220020"
//     [2]=>
//     string(7) "4200010"
//   }
//   ["acc_name"]=>
//   array(3) {
//     [0]=>
//     string(66) "ลูกหนี้การค้า - ในประเทศ"
//     [1]=>
//     string(75) "ภาษีขายยังไม่ครบกำหนดชำระ"
//     [2]=>
//     string(63) "รายได้จากการขายสินค้า"
//   }
//   ["cost_code"]=>
//   array(3) {
//     [0]=>
//     string(0) ""
//     [1]=>
//     string(0) ""
//     [2]=>
//     string(0) ""
//   }
// }
