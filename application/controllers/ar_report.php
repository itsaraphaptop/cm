<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ar_report extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('ar_m');
        }
        function report_invoice()
        {
          $session_data = $this->session->userdata('sessed_in');
          $id = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['username'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          if ($username=="") {
            redirect('/');
          }
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['compimg'] = $this->ar_m->companyimgbycompcode($compcode,$id);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_print_v');
          $this->load->view('office/account/ar/report_ar/report_invoice_v');
          $this->load->view('base/footer_v');



        }
        function report_voucher()
        {
          $session_data = $this->session->userdata('sessed_in');
          $id = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['username'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          if ($username=="") {
            redirect('/');
          }
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['compimg'] = $this->ar_m->voucher_report($compcode,$id);
          $data['vhono'] = $this->ar_m->acctno_name($id);
          $data['com'] = $this->ar_m->voucher_report($compcode,$id);
          // $this->load->view('navtail/base_master/header_v',$data);
          // $this->load->view('navtail/base_master/tail_v');
          // $this->load->view('navtail/navtail_print_v');
          $this->load->view('office/account/ar/report_ar/ar_voucher_report_v',$data);
          // $this->load->view('base/footer_v');
        }

        function report_receipt()
        {
          $session_data = $this->session->userdata('sessed_in');
          $id = $this->uri->segment(3);
          $username = $session_data['username'];
          $data['username'] = $session_data['m_name'];
          $compcode = $session_data['compcode'];
          $userid = $session_data['m_id'];
          if ($username=="") {
            redirect('/');
          }
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['compimg'] = $this->ar_m->receipt_report($compcode,$id);
          $data['vhono'] = $this->ar_m->receipt_name($id);
          $this->load->view('office/account/ar/report_ar/ar_receipt_report_v',$data);
        }
        public function ar_vender_carry()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
              redirect('/');
          }

          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          $data['arvp'] = $this->get_arvp_con();
          $data['currency'] = $this->get_currency_con(false);
          $data['wt'] = $this->get_wt_con(false);
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/ar_carry_v');
          $this->load->view('base/footer_v');
        }
        public function add_vender_carry()
  {
    // $input = $this->input->post();
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $input = $this->input->post();
    $ins = $this->input->post('chkins');
    $upd = $this->input->post('chkupd');
    // echo "<pre>";
    // var_dump($input);die();
      foreach ($input['chkins'] as $key => $value) {
        // var_dump($input['vender_code']);
      // die();
      $insert = array(
          'vender_code' => $input['vender_code'][$key],
          'vender_name' => $input['vender_name'][$key],
          'cn' => $input['cn'][$key],
          'invoice_tax' => $input['invoice_tax'][$key],
          'tax' => $input['tax'][$key],
          'inv_taxdate' => $input['inv_taxdate'][$key],
          'due_date' => $input['due_date'][$key],
          'po_no' => $input['po_no'][$key],
          'data_type' => $input['data_type'][$key],
          'voucher_no' => $input['voucher_no'][$key],
          'voucher_date' => $input['voucher_date'][$key],
          'ac_vender' => $input['ac_vender'][$key],
          'project' => $input['proj'][$key],
          'systemcode' => $input['systemcode'][$key],
          'systemname' => $input['systemname'][$key],
          'currency' => $input['currency'][$key],
          'exchange' => $input['exchange'][$key],
          'amount' => $input['amount'][$key],
          'deduct_material' => $input['deduct_material'][$key],
          'per_avd' => $input['per_avd'][$key],
          'adr_amount' => $input['adr_amount'][$key],
          'amt_after_adv' => $input['amt_after_adv'][$key],
          'per_vat' => $input['per_vat'][$key],
          'vat_amount' => $input['vat_amount'][$key],
          'per_ret' => $input['per_ret'][$key],
          'ret_amount' => $input['ret_amount'][$key],
          'wt_code' => $input['wt_code'][$key],
          'per_wt' => $input['per_wt'][$key],
          'wt_amount' => $input['wt_amount'][$key],
          'net_amount' => $input['net_amount'][$key],
          'remark' => $input['remark'][$key],
          'doc_no' => $input['doc_no'][$key],
          'ap_amt' => $input['ap_amt'][$key],
          'paid_amount' => $input['paid_amount'][$key],
          'compcode' => $compcode,
          'active' => "Y"

        );
        
        $boolen =$this->db->insert('ar_vender_pull', $insert);
      }
      // echo "<pre>";
      // var_dump($insert);die();
      foreach ($input['chkupd'] as $key => $value) {
        // var_dump($input['vender_code']);
      // die();
      $update = array(
          'vender_code' => $input['vender_code_upd'][$key],
          'vender_name' => $input['vender_name_upd'][$key],
          'cn' => $input['cn_upd'][$key],
          'invoice_tax' => $input['invoice_tax_upd'][$key],
          'tax' => $input['tax_upd'][$key],
          'inv_taxdate' => $input['inv_taxdate_upd'][$key],
          'due_date' => $input['due_date_upd'][$key],
          'po_no' => $input['po_no_upd'][$key],
          'data_type' => $input['data_type_upd'][$key],
          'voucher_no' => $input['voucher_no_upd'][$key],
          'voucher_date' => $input['voucher_date_upd'][$key],
          'ac_vender' => $input['ac_vender_upd'][$key],
          'project' => $input['proj_upd'][$key],
          'systemcode' => $input['systemcode_upd'][$key],
          'systemname' => $input['systemname_upd'][$key],
          'currency' => $input['currency_upd'][$key],
          'exchange' => $input['exchange_upd'][$key],
          'amount' => $input['amount_upd'][$key],
          'deduct_material' => $input['deduct_material_upd'][$key],
          'per_avd' => $input['per_avd_upd'][$key],
          'adr_amount' => $input['adr_amount_upd'][$key],
          'amt_after_adv' => $input['amt_after_adv_upd'][$key],
          'per_vat' => $input['per_vat_upd'][$key],
          'vat_amount' => $input['vat_amount_upd'][$key],
          'per_ret' => $input['per_ret_upd'][$key],
          'ret_amount' => $input['ret_amount_upd'][$key],
          'wt_code' => $input['wt_code_upd'][$key],
          'per_wt' => $input['per_wt_upd'][$key],
          'wt_amount' => $input['wt_amount_upd'][$key],
          'net_amount' => $input['net_amount_upd'][$key],
          'remark' => $input['remark_upd'][$key],
          'doc_no' => $input['doc_no_upd'][$key],
          'ap_amt' => $input['ap_amt_upd'][$key],
          'paid_amount' => $input['paid_amount_upd'][$key],
          'compcode' => $compcode,
          'active' => "Y"

        );
        $this->db->where('arvp_id',$input['idrow'][$key]);
        $boolen =$this->db->update('ar_vender_pull', $update);
      }
      // echo "<pre>";
      // var_dump($update);die();

    redirect('ar_report/ar_vender_carry');
  }
  public function del_arvp($idrow)
  {   
      // var_dump($idrow);die();
      $update = array('active' => 'del');
      $this->db->where('arvp_id',$idrow);
      $boolen = $this->db->update('ar_vender_pull', $update);
      // var_dump($boolen);die();
      $res = array();
      if($boolen)
      {
        $res['status'] = true;
        $res['message'] = "ลบสำเร็จ !!";
      }else{
        $res['status'] = false;
        $res['message'] = "ลบไม่สำเร็จ !!";
      }
      echo json_encode($res);
  }
  public function get_currency_con($status_json = true)
  {
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $data['currency'] = $this->ar_m->get_currency($compcode);
    // echo "<pre>";
    if($status_json == true){
       echo json_encode($data['currency']);
    }else{
      return $data['currency'];
    }
    // var_dump($data['currency']);
  }
  public function get_wt_con($status_json = true)
  {
    $data['wt'] = $this->ar_m->get_wt();
    // echo "<pre>";
    if($status_json == true){
      echo json_encode($data['wt']);
    }else{
      return $data['wt'];
    }
    
    // echo "<pre>";
    // var_dump($data['wt']);
  }
  public function get_arvp_con()
  {
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $data = $this->ar_m->get_arvp($compcode);
    return $data;
  }
  public function view_sale_tax_val()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }

          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          // $data['proid'] = $proid;
          $compcode = $session_data['compcode'];
          // $data['vender'] = $this->cheque_m->vender_data($compcode);
          // $data['project'] = $this->cheque_m->project_data($compcode);
          // $data['system'] = $this->cheque_m->system_data($compcode);
          // $data['ap'] = $this->cheque_m->ap_data();
          // $data['pl'] = $this->cheque_m->pl_data();
          // $data['bank'] = $this->cheque_m->bank_data($compcode);

          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/report_ar/sale_tax_val',$data);
          $this->load->view('base/footer_v');
        }
        public function view_sales_tax_newvat()
        {
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          if ($username=="") {
            redirect('/');
          }

          $userid = $session_data['m_id'];
          $data['name'] = $session_data['m_name'];
          $data['depid'] = $session_data['m_depid'];
          $data['dep'] = $session_data['m_dep'];
          $data['projid'] = $session_data['projectid'];
          $projectid = $session_data['projectid'];
          $data['project'] = $session_data['m_project'];
          $data['imgu'] = $session_data['img'];
          // $data['proid'] = $proid;
          $compcode = $session_data['compcode'];
          // $data['vender'] = $this->cheque_m->vender_data($compcode);
          // $data['project'] = $this->cheque_m->project_data($compcode);
          // $data['system'] = $this->cheque_m->system_data($compcode);
          // $data['ap'] = $this->cheque_m->ap_data();
          // $data['pl'] = $this->cheque_m->pl_data();
          $data['input'] = $this->input->post();
          $datatype = $this->input->post('data');
          $year = $this->input->post('year');
          $month = $this->input->post('month');
          if ($month=='1'||$month=='2'||$month=='3'||$month=='4'||$month=='5'||$month=='6'||$month=='7'||$month=='8'||$month=='9') {
            $month = "0".$month;
          }
          // var_dump($month);die();
          $month_only = $this->input->post('month_only');
          // if ($datatype==1) {
          //   if ($month_only==1) {
          //   $data['apv'] = $this->cheque_m->apv_data_where($compcode,$year,$month);   
          //   }else{
          //   $data['apv'] = $this->cheque_m->apv_data($compcode);
          //     // var_dump($compcode.$year.$month);die();
          //   }
          // }else{
          //   if ($month_only==1) {
          //   $data['apv'] = $this->cheque_m->apv_exis_where($compcode,$year,$month);   
          //   }else{
          //   $data['apv'] = $this->cheque_m->apv_exis($compcode);
          //     // var_dump($compcode.$year.$month);die();
          //   }
          // }
          
          $this->load->view('navtail/base_master/header_v',$data);
          $this->load->view('navtail/base_master/tail_v');
          $this->load->view('navtail/navtail_ar_v');
          $this->load->view('office/account/ar/report_ar/view_sales_tax_newvat',$data);
          $this->load->view('base/footer_v');
        }
}
