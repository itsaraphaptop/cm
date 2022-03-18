<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gl_report extends CI_Controller {
	public function __construct() {
            parent::__construct();
            $this->load->model("gl_m");
        }
  public function gl_general_ledger()
    {
      $session_data = $this->session->userdata('sessed_in');
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
      $data['aa'] = $this->gl_m->get_account();
      $data['pp'] = $this->gl_m->get_project();
      $data['ff'] = $this->gl_m->get_project_f();
      $data['tt'] = $this->gl_m->get_project_t();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_print_v');
      $this->load->view('office/account/gl/gl_main_v');
      $this->load->view('office/account/gl/report/gl_general_ledger');
      $this->load->view('base/footer_v');
    }

    public function get_general_ledger()
    {
      $year = $this->uri->segment(3);
      $start = $this->uri->segment(4);
      $end = $this->uri->segment(5);
      $f_acc = $this->uri->segment(6);
      $t_acc = $this->uri->segment(7);
      $typelist = $this->uri->segment(8);
      $f_pro = $this->uri->segment(9);
      $t_pro = $this->uri->segment(10);
      $fcode = $this->uri->segment(11);
      $tcode = $this->uri->segment(12);
      if ($f_acc==0 && $t_acc==0) {
      $get = $this->db->query("SELECT * from account_total order by act_code ")->result();
      
    }else if($t_acc!=0 && $f_acc!=0 ){
      $get = $this->db->query("SELECT * from account_total WHERE act_code >= $f_acc and act_code <= $t_acc order by act_code ")->result();
      
    }else if($t_acc==0 && $f_acc!=0){
      $get = $this->db->query("SELECT * from account_total WHERE act_code >= $f_acc order by act_code ")->result();
      
    }else{
      $get = $this->db->query("SELECT * from account_total WHERE act_code <= $t_acc order by act_code ")->result();
    }

      
      foreach ($get as $ke) {

      $tot = 0;
      $qty = 0;
        if ($typelist == 1) {
          $for = $this->db->query("SELECT des,actcode,acc_remark,vender,acc_project,project_name,type,taxno,acc_ardate,acc_due,acc_period,acc_year,actcode,acc_cr,acc_dr,acc_no,compcode,project_id
          FROM (
          SELECT CONCAT('INV.No.#  ',ar_account_header.acc_invno,'  Period#  ',acc_invperiod) as des,acc_remark,null as vender,acc_project,project_name,'AR' as type,null as taxno,acc_ardate,acc_due,acc_period,acc_year,acc_codeac as actcode,acc_cr,acc_dr,acc_no,ar_account_header.compcode,project_id FROM ar_account_header JOIN ar_account_detail ON ar_account_detail.acc_ref = ar_account_header.acc_no LEFT JOIN project on project.project_code=ar_account_header.acc_project WHERE acc_status != 'D'
          UNION ALL
          SELECT CONCAT('CHQ #  ',cl_chqno,'  CHQ Date #  ',cl_datechq) as des,cl_remark,null as vender,cl_project,project_name,'AR' as type,null as taxno,cl_ardate,null,cl_period,cl_year,cl_codeac as actcode,cl_cr,cl_dr,cl_rlno ,ar_clear_header.compcode,project_id from ar_clear_header JOIN ar_clear_detail on ar_clear_detail.cl_ref=ar_clear_header.cl_no LEFT JOIN project on project.project_code=ar_clear_header.cl_project WHERE cl_status != 'D'
          )t
          WHERE acc_year = $year
          AND acc_period >= $start
          AND acc_period <= $end 
          AND actcode = $ke->act_code
          AND project_id >= $f_pro
          AND project_id <= $t_pro 
          AND acc_no >= '$fcode'
          AND acc_no <= '$tcode' ")->result();
        }elseif ($typelist == 2) {
          $for = $this->db->query("SELECT des,actcode,acc_remark,vender,acc_project,project_name,type,taxno,acc_ardate,acc_due,acc_period,acc_year,actcode,acc_cr,acc_dr,acc_no,compcode,project_id
          FROM (
          SELECT CONCAT('CHQ#  ',ap_checkno,'  Date CHQ#  ',ap_datechq) as des,ap_remark as acc_remark,vender_name as vender,ap_project as acc_project,project_name,'AP' as type,null as taxno,ap_date as acc_ardate,doc_date as acc_due,ap_period as acc_period,ap_year as acc_year,acct_no  as actcode,amtcr as acc_cr,amtdr as acc_dr,ap_no as acc_no,ap_pettycash_header.compcode,project.project_id FROM ap_pettycash_header JOIN ap_gl on ap_pettycash_header.ap_no =ap_gl.vchno LEFT JOIN project on project.project_id=ap_pettycash_header.ap_project LEFT JOIN vender on vender.vender_code=ap_pettycash_header.ap_vendor WHERE ap_status != 'delect'
          UNION ALL
          SELECT CONCAT('CHQ#  ',apv_checkno,'  Date CHQ#  ',apv_datechq) as des,apv_dascr,vender_name,apv_project,project_name,'AP' as type,apv_inv,apv_date,apv_duedate,apv_glperiod,apv_glyear,acct_no,amtcr,amtdr,apv_code,apv_header.compcode,project.project_id FROM apv_header JOIN ap_gl on apv_header.apv_code = ap_gl.vchno AND ap_gl.doctype = apv_header.apv_type LEFT JOIN project on project.project_id=apv_header.apv_project LEFT JOIN vender on vender.vender_code=apv_header.apv_vender  WHERE apv_status != 'delect'
          UNION ALL
          SELECT CONCAT('CHQ#  ',aps_checkno,'  Date CHQ#  ',aps_datechq) as des,aps_remark,vender_name,aps_project,project_name,'AP' as type,aps_invno,aps_invdate,aps_duedate,aps_period,aps_year,acct_no,amtcr,amtdr,aps_code,aps_header.compcode,project.project_id FROM aps_header JOIN ap_gl on aps_header.aps_code = ap_gl.vchno AND ap_gl.doctype = aps_header.aps_type LEFT JOIN project on project.project_id=aps_header.aps_project LEFT JOIN vender on vender.vender_code=aps_header.aps_vender WHERE aps_status != 'delete' 
          UNION ALL
          SELECT CONCAT('CHQ#  ',apd_checkno,'  Date CHQ#  ',apd_datechq) as des,apd_descrip,vender_name,apd_project,project_name,'AP' as type,apd_tax_no,apd_date,apd_duedate,apd_period,apd_year,acct_no,amtcr,amtdr,apd_code,ap_down_header.compcode,project.project_id FROM ap_down_header JOIN ap_gl on ap_down_header.apd_code = ap_gl.vchno AND ap_gl.doctype = ap_down_header.apd_type LEFT JOIN project on project.project_id=ap_down_header.apd_project LEFT JOIN vender on vender.vender_code=ap_down_header.apd_vender WHERE apd_status != 'delete' 
          UNION ALL
          SELECT CONCAT('CHQ#  ',apr_checkno,'  Date CHQ#  ',apr_datechq) as des,apr_descrip,vender_name,apr_project,project_name,'AP' as type,apr_tax_no,apr_date,apr_duedate,apr_period,apr_year,acct_no,amtcr,amtdr,apr_code,ap_ret_header.compcode,project.project_id FROM ap_ret_header JOIN ap_gl on ap_ret_header.apr_code = ap_gl.vchno AND ap_gl.doctype = ap_ret_header.apr_type LEFT JOIN project on project.project_id=ap_ret_header.apr_project LEFT JOIN vender on vender.vender_code=ap_ret_header.apr_vender WHERE apr_status != 'delete'
          )t
          WHERE acc_year = $year
          AND acc_period >= $start
          AND acc_period <= $end 
          AND actcode = $ke->act_code
          AND project_id >= $f_pro
          AND project_id <= $t_pro 
          AND acc_no >= '$fcode'
          AND acc_no <= '$tcode' ")->result();
        }elseif ($typelist == 3) {
          $for = $this->db->query("SELECT des,actcode,acc_remark,vender,acc_project,project_name,type,taxno,acc_ardate,acc_due,acc_period,acc_year,actcode,acc_cr,acc_dr,acc_no,compcode,project_id
          FROM (
          SELECT CONCAT('CHQ#  ','  Date CHQ#  ') as des,null as acc_remark,null as vender,gl_batch_header.dpt_code as acc_project,project_name,'GL' as type,null as taxno,vchdate as acc_ardate,null as acc_due,glperiod as acc_period,glyear as acc_year,ac_code as actcode,amtcr as acc_cr,amtdr as acc_dr,gl_batch_header.vchno as acc_no,gl_batch_header.compcode,project_id FROM gl_batch_header JOIN gl_batch_detail on gl_batch_detail.vchno = gl_batch_header.vchno LEFT JOIN project on project.project_code=gl_batch_header.dpt_code
          )t
          WHERE acc_year = $year
          AND acc_period >= $start
          AND acc_period <= $end 
          AND actcode = $ke->act_code
          AND project_id >= $f_pro
          AND project_id <= $t_pro
          AND acc_no >= '$fcode'
          AND acc_no <= '$tcode'  ")->result();
        }else{
          $for = $this->db->query("SELECT des,actcode,acc_remark,vender,acc_project,project_name,type,taxno,acc_ardate,acc_due,acc_period,acc_year,actcode,acc_cr,acc_dr,acc_no,compcode,project_id
          FROM (
          SELECT CONCAT('INV.No.#  ',ar_account_header.acc_invno,'  Period#  ',acc_invperiod) as des,acc_remark,null as vender,acc_project,project_name,'AR' as type,null as taxno,acc_ardate,acc_due,acc_period,acc_year,acc_codeac as actcode,acc_cr,acc_dr,acc_no,ar_account_header.compcode,project.project_id FROM ar_account_header JOIN ar_account_detail ON ar_account_detail.acc_ref = ar_account_header.acc_no LEFT JOIN project on project.project_code=ar_account_header.acc_project WHERE acc_status != 'D'
          UNION ALL
          SELECT CONCAT('CHQ #  ',cl_chqno,'  CHQ Date #  ',cl_datechq) as des,cl_remark,null as vender,cl_project,project_name,'AR' as type,null as taxno,cl_ardate,null,cl_period,cl_year,cl_codeac as actcode,cl_cr,cl_dr,cl_rlno ,ar_clear_header.compcode,project.project_id from ar_clear_header JOIN ar_clear_detail on ar_clear_detail.cl_ref=ar_clear_header.cl_no LEFT JOIN project on project.project_code=ar_clear_header.cl_project WHERE cl_status != 'D'
          UNION ALL
          SELECT CONCAT('CHQ#  ',ap_checkno,'  Date CHQ#  ',ap_datechq) as des,ap_remark,vender_name,ap_project,project_name,'AP' as type,null as taxno,ap_date,doc_date,ap_period,ap_year,acct_no  as actcode,amtcr,amtdr,ap_no,ap_pettycash_header.compcode,project.project_id FROM ap_pettycash_header JOIN ap_gl on ap_pettycash_header.ap_no =ap_gl.vchno LEFT JOIN project on project.project_id=ap_pettycash_header.ap_project LEFT JOIN vender on vender.vender_code=ap_pettycash_header.ap_vendor WHERE ap_status != 'delect'
          UNION ALL
          SELECT CONCAT('CHQ#  ',apv_checkno,'  Date CHQ#  ',apv_datechq) as des,apv_dascr,vender_name,apv_project,project_name,'AP' as type,apv_inv,apv_date,apv_duedate,apv_glperiod,apv_glyear,acct_no,amtcr,amtdr,apv_code,apv_header.compcode,project.project_id FROM apv_header JOIN ap_gl on apv_header.apv_code = ap_gl.vchno AND ap_gl.doctype = apv_header.apv_type LEFT JOIN project on project.project_id=apv_header.apv_project LEFT JOIN vender on vender.vender_code=apv_header.apv_vender  WHERE apv_status != 'delect'
          UNION ALL
          SELECT CONCAT('CHQ#  ',aps_checkno,'  Date CHQ#  ',aps_datechq) as des,aps_remark,vender_name,aps_project,project_name,'AP' as type,aps_invno,aps_invdate,aps_duedate,aps_period,aps_year,acct_no,amtcr,amtdr,aps_code,aps_header.compcode,project.project_id FROM aps_header JOIN ap_gl on aps_header.aps_code = ap_gl.vchno AND ap_gl.doctype = aps_header.aps_type LEFT JOIN project on project.project_id=aps_header.aps_project LEFT JOIN vender on vender.vender_code=aps_header.aps_vender WHERE aps_status != 'delete'  AND aps_code >= '$fcode'
          UNION ALL
          SELECT CONCAT('CHQ#  ',apd_checkno,'  Date CHQ#  ',apd_datechq) as des,apd_descrip,vender_name,apd_project,project_name,'AP' as type,apd_tax_no,apd_date,apd_duedate,apd_period,apd_year,acct_no,amtcr,amtdr,apd_code,ap_down_header.compcode,project.project_id FROM ap_down_header JOIN ap_gl on ap_down_header.apd_code = ap_gl.vchno AND ap_gl.doctype = ap_down_header.apd_type LEFT JOIN project on project.project_id=ap_down_header.apd_project LEFT JOIN vender on vender.vender_code=ap_down_header.apd_vender WHERE apd_status != 'delete' 
          UNION ALL
          SELECT CONCAT('CHQ#  ',apr_checkno,'  Date CHQ#  ',apr_datechq) as des,apr_descrip,vender_name,apr_project,project_name,'AP' as type,apr_tax_no,apr_date,apr_duedate,apr_period,apr_year,acct_no,amtcr,amtdr,apr_code,ap_ret_header.compcode,project.project_id FROM ap_ret_header JOIN ap_gl on ap_ret_header.apr_code = ap_gl.vchno AND ap_gl.doctype = ap_ret_header.apr_type LEFT JOIN project on project.project_id=ap_ret_header.apr_project LEFT JOIN vender on vender.vender_code=ap_ret_header.apr_vender WHERE apr_status != 'delete'
          UNION ALL
          SELECT CONCAT('CHQ#  ','  Date CHQ#  ') as des,null,null,gl_batch_header.dpt_code,project_name,'GL' as type,null,vchdate,null,glperiod,glyear,ac_code,amtcr,amtdr,gl_batch_header.vchno,gl_batch_header.compcode,project_id FROM gl_batch_header JOIN gl_batch_detail on gl_batch_detail.vchno = gl_batch_header.vchno LEFT JOIN project on project.project_code=gl_batch_header.dpt_code
          )t
          WHERE acc_year = $year
          AND acc_period >= $start
          AND acc_period <= $end 
          AND actcode = $ke->act_code
          AND project_id >= $f_pro
          AND project_id <= $t_pro
          AND acc_no >= '$fcode'
          AND acc_no <= '$tcode' ")->result();
            }
          if ($start != 1) {
          $ss = $this->db->query("SELECT p_period,years,act_code,SUM(dr) as amtdr,SUM(cr) as amtcr
          FROM    (
            SELECT acc_period as p_period,acc_year as years,acc_codeac as act_code,SUM(acc_dr) as dr,SUM(acc_cr) as cr FROM ar_account_header JOIN ar_account_detail ON ar_account_detail.acc_ref = ar_account_header.acc_no WHERE acc_status != 'D' and acc_period < $start and acc_codeac = '$ke->act_code' and acc_year <= $year GROUP BY acc_codeac
            UNION ALL
            SELECT glperiod as p_period,glyear as years,ac_code as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM gl_batch_header JOIN gl_batch_detail on gl_batch_detail.vchno = gl_batch_header.vchno WHERE glperiod < $start and ac_code = '$ke->act_code' and glyear <= $year GROUP BY ac_code
            UNION ALL
            SELECT cl_period as p_period,cl_year as years,cl_codeac as act_code,SUM(cl_dr) as dr,SUM(cl_cr) as cr FROM ar_clear_header JOIN ar_clear_detail on ar_clear_detail.cl_ref=ar_clear_header.cl_no WHERE cl_status != 'D' and cl_period < $start and cl_codeac = '$ke->act_code' and cl_year <= $year GROUP BY cl_codeac
            UNION ALL
            SELECT ap_period as p_period,ap_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM ap_pettycash_header JOIN ap_gl on ap_pettycash_header.ap_no =ap_gl.vchno WHERE ap_status !=  'delete' and ap_period < $start  and acct_no = '$ke->act_code' and ap_year <= $year GROUP BY acct_no
            UNION ALL
            SELECT apv_glperiod as p_period,apv_glyear as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM apv_header JOIN ap_gl on apv_header.apv_code = ap_gl.vchno AND ap_gl.doctype = apv_header.apv_type WHERE apv_status != 'delete' and apv_glperiod < $start  and acct_no = '$ke->act_code' and apv_glyear <= $year GROUP BY acct_no
            UNION ALL
            SELECT aps_period as p_period,aps_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM aps_header JOIN ap_gl on aps_header.aps_code = ap_gl.vchno AND ap_gl.doctype = aps_header.aps_type WHERE aps_status != 'delete' and aps_period < $start and acct_no = '$ke->act_code' and aps_year <= $year GROUP BY acct_no
            UNION ALL
            SELECT apd_period as p_period,apd_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM ap_down_header JOIN ap_gl on ap_down_header.apd_code = ap_gl.vchno AND ap_gl.doctype = ap_down_header.apd_type WHERE apd_status != 'delete' and apd_period < $start and acct_no = '$ke->act_code' and apd_year <= $year GROUP BY acct_no
            UNION ALL
            SELECT apr_period as p_period,apr_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM ap_ret_header JOIN ap_gl on ap_ret_header.apr_code = ap_gl.vchno AND ap_gl.doctype = ap_ret_header.apr_type WHERE apr_status != 'delete' and apr_period < $start and acct_no = '$ke->act_code' and apr_year <= $year GROUP BY acct_no
                ) t
            GROUP BY act_code")->result();
            }else{
            $ss = $this->db->query("SELECT p_period,years,act_code,SUM(dr) as amtdr,SUM(cr) as amtcr
            FROM    (
            SELECT acc_period as p_period,acc_year as years,acc_codeac as act_code,SUM(acc_dr) as dr,SUM(acc_cr) as cr FROM ar_account_header JOIN ar_account_detail ON ar_account_detail.acc_ref = ar_account_header.acc_no WHERE acc_status != 'D' and acc_period < $start and acc_codeac = '$ke->act_code' and acc_year <= $year -1 GROUP BY acc_codeac
            UNION ALL
            SELECT glperiod as p_period,glyear as years,ac_code as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM gl_batch_header JOIN gl_batch_detail on gl_batch_detail.vchno = gl_batch_header.vchno WHERE glperiod < $start and ac_code = '$ke->act_code' and glyear <= $year -1 GROUP BY ac_code
            UNION ALL
            SELECT cl_period as p_period,cl_year as years,cl_codeac as act_code,SUM(cl_dr) as dr,SUM(cl_cr) as cr FROM ar_clear_header JOIN ar_clear_detail on ar_clear_detail.cl_ref=ar_clear_header.cl_no WHERE cl_status != 'D' and cl_period < $start and cl_codeac = '$ke->act_code' and cl_year <= $year -1 GROUP BY cl_codeac
            UNION ALL
            SELECT ap_period as p_period,ap_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM ap_pettycash_header JOIN ap_gl on ap_pettycash_header.ap_no =ap_gl.vchno WHERE ap_status !=  'delete' and ap_period < $start  and acct_no = '$ke->act_code' and ap_year <= $year -1 GROUP BY acct_no
            UNION ALL
            SELECT apv_glperiod as p_period,apv_glyear as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM apv_header JOIN ap_gl on apv_header.apv_code = ap_gl.vchno AND ap_gl.doctype = apv_header.apv_type WHERE apv_status != 'delete' and apv_glperiod < $start  and acct_no = '$ke->act_code' and apv_glyear <= $year -1 GROUP BY acct_no
            UNION ALL
            SELECT aps_period as p_period,aps_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM aps_header JOIN ap_gl on aps_header.aps_code = ap_gl.vchno AND ap_gl.doctype = aps_header.aps_type WHERE aps_status != 'delete' and aps_period < $start and acct_no = '$ke->act_code' and aps_year <= $year -1 GROUP BY acct_no
            UNION ALL
            SELECT apd_period as p_period,apd_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM ap_down_header JOIN ap_gl on ap_down_header.apd_code = ap_gl.vchno AND ap_gl.doctype = ap_down_header.apd_type WHERE apd_status != 'delete' and apd_period < $start and acct_no = '$ke->act_code' and apd_year <= $year -1 GROUP BY acct_no
            UNION ALL
            SELECT apr_period as p_period,apr_year as years,acct_no as act_code,SUM(amtdr) as dr,SUM(amtcr) as cr FROM ap_ret_header JOIN ap_gl on ap_ret_header.apr_code = ap_gl.vchno AND ap_gl.doctype = ap_ret_header.apr_type WHERE apr_status != 'delete' and apr_period < $start and acct_no = '$ke->act_code' and apr_year <= $year -1 GROUP BY acct_no
                ) t
            GROUP BY act_code")->result();
          }
        
        echo "<tr>".
              "<td colspan='11'><h4><b><u>".$ke->act_code."   ".$ke->act_name."</b></u></h4></td>";
          echo  "</tr>";
        if ($ss) {
          foreach ($ss as $sum) {
          $ba = $sum->amtdr - $sum->amtcr;
          echo "<tr>".
              "<td colspan='8' class='text-center'>BF</td>".
              "<td>".$sum->amtdr."</td>".
              "<td>".$sum->amtcr."</td>".
              "<td>".$ba."</td>";
          echo  "</tr>";
          echo "<tr>".
                "<td colspan='11' class='text-center'>Balance Forward</td>";
          echo  "</tr>";
          
          }
        }else{
          $ba = 0;
          echo "<tr>".
              "<td colspan='8' class='text-center'>BF</td>".
              "<td>0</td>".
              "<td>0</td>".
              "<td>0</td>";
          echo  "</tr>";
          echo "<tr>".
                "<td colspan='11' class='text-center'>Balance Forward</td>";
          echo  "</tr>";
        }
        $todr = 0;
      $tocr = 0;
      $toba = 0;
      foreach ($for as $de) {
        if ($de->acc_cr==0) {
            $tot = ($tot+$de->acc_dr)+$ba;
         echo "<tr>".
              "<td class='text-center'>".$de->acc_ardate."</td>".
              "<td class='text-center'>".$de->acc_no."</td>".
              "<td class='text-center'>".$de->taxno."</td>".
              "<td class='text-center'>".$de->acc_ardate."</td>".
              "<td class='text-center'>".$de->type."</td>".
              "<td class='text-center'></td>".
              "<td class='text-center'></td>".
              "<td class='text-center'>".$de->project_name."</td>".
              "<td class='text-center'>".$de->acc_dr."</td>".
              "<td class='text-right'>".$de->acc_cr."</td>".
              "<td class='text-right'>".number_format($tot,2)."</td>";
          echo  "</tr>";
          echo "<tr>".
              "<td class='text-center' colspan='2'>".$de->vender."</td>".
              "<td class='text-center' colspan='4'>".$de->des."</td>".
              "<td colspan='2'>".$de->acc_remark."</td>".
              "<td class='text-center' colspan='3'></td>";
          echo  "</tr>";
          $todr = $todr+$de->acc_dr;
        }elseif ($de->acc_dr==0) {
          $tot = ($tot-$de->acc_cr)-$ba;
         
          echo  "<tr>".
              "<td class='text-center'>".$de->acc_ardate."</td>".
              "<td class='text-center'>".$de->acc_no."</td>".
              "<td class='text-center'>".$de->taxno."</td>".
              "<td class='text-center'>".$de->acc_ardate."</td>".
              "<td class='text-center'>".$de->type."</td>".
              "<td class='text-center'></td>".
              "<td class='text-center'></td>".
              "<td class='text-center'>".$de->project_name."</td>".
              "<td class='text-center'>".$de->acc_dr."</td>".
              "<td class='text-right'>".$de->acc_cr."</td>".
              "<td class='text-right'>".number_format($tot,2)."</td>";
            echo "</tr>";
            echo "<tr>".
              "<td class='text-center' colspan='2'>".$de->vender."</td>".
              "<td class='text-center' colspan='4'>".$de->des."</td>".
              "<td colspan='2'>".$de->acc_remark."</td>".
              "<td class='text-center' colspan='3'></td>";
          echo  "</tr>";
         $tocr = $tocr+$de->acc_cr; 
        }
        
        
        $toba = $tot;
      }
      echo "<tr>".
              "<td colspan='8' class='text-center'>SUMMARY</td>".
              "<td>".$todr."</td>".
              "<td>".$tocr."</td>".
              "<td>".$toba."</td>";
          echo  "</tr>";
    }
          
  }
   public function gl_report_v() {
      $session_data = $this->session->userdata('sessed_in');
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
      $data['aa'] = $this->gl_m->get_account();
      $data['pp'] = $this->gl_m->get_project();
      $data['ff'] = $this->gl_m->get_project_f();
      $data['tt'] = $this->gl_m->get_project_t();
      $this->load->view('navtail/base_master/header_v',$data);
      $this->load->view('navtail/base_master/tail_v');
      // $this->load->view('navtail/navtail_print_v');
      $this->load->view('office/account/gl/report/gl_report_v');
      $this->load->view('base/footer_v');
    }
        public function gl_report_r(){
          $datestr =  $this->input->get('start');
          $dateend =  $this->input->get('end');
          $dateyear =  $this->input->get('year');
          $data = $this->session->userdata('sessed_in');

          $get_session ="&get_session={$sess_name}";
          echo  print_r($this->input->get());
          //query
          $where_year = "and gl_year = '$dateyear'";
          $where_date = "and adddate BETWEEN '$datestr' AND '$dateend'";       
    
           //session name
          $data = $this->session->userdata('sessed_in');
          $sess_name = $data['m_name'];          
          $compcode = $data['compcode'];          
          //if
          // if($datestr == "")$where_date ="and adddate BETWEEN '' AND '$dateend'"; 
          // if($dateyear == "")$where_year ="and gl_year = '$dateyear'"; 
          // if($datestr == "") $datestr="0000-00-00";
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $stockcard_file= "gl_report.mrt";
          $urls = "report/viewerloadreport?module=gl&typ=report&reportname={$stockcard_file}";

           //getdata get_wh_data
          // $get_datestr ="&get_datestr={$datestr}";
          // $get_dateend ="&get_dateend={$dateend}"; 
          // $get_year ="&get_year={$dateyear}"; 
          // $get_date = "&get_date={$where_date}";   
          // $get_session ="&get_session={$sess_name}";


          $send= "{$urls}&var1=&var2=&var3={$datestr}&var4={$dateend}&var5={$dateyear}&var6=&var7=&var8=&var9=&var10={$compcode}";
         $base_url = $this->config->item("url_report");
         redirect($send); 
         // echo $send;
        }
        public function gl_general_report(){
          $session_data = $this->session->userdata('sessed_in');
          $username = $session_data['username'];
          $companycode = $session_data['compcode'];
          $m = $this->input->get('typelist');
          $year = $this->input->get('year');
          $start = $this->input->get('pstart');
          $stop = $this->input->get('pend');
          $sacc = $this->input->get('f_acc');
          $eacc = $this->input->get('t_acc');
          $spro = $this->input->get('f_pro');
          $epro = $this->input->get('t_pro');
          $sdoc = $this->input->get('f_code');
          $edoc = $this->input->get('t_code');
          
          if($m=="0"){
            $gl_type = "all";
            $where = "where glyear = '$year' AND glperiod >= '$start' AND glperiod <= '$stop'";
          }else if($m=="1"){
            $gl_type = "AP";
            $where = "where gl_type = 'AP' AND glyear = '$year' AND glperiod >= '$start' AND glperiod <= '$stop'";
          }else if($m=="2"){
            $gl_type = "AR";
            $where = "where gl_type = 'AR' AND glyear = '$year' AND glperiod >= '$start' AND glperiod <= '$stop'";
          }else if($m=="3"){
            $gl_type = "GL";
            $where = "where gl_type = 'GL' AND glyear = '$year' AND glperiod >= '$start' AND glperiod <= '$stop'";
          }

          if($sacc!="" || $eacc!=""){
            $acc =  "AND ac_code >= '$sacc' AND ac_code <= '$eacc'";
          }else{
            $acc = "";
          }

          if($spro!="" || $epro!=""){
            $p = "AND project_id >= '$spro' AND project_id <= '$epro'";
          }else{
            $p = "";
          }

         


          $get_m = "&get_m={$where}";
          $acc_m = "&acc_m={$acc}";
          $pro_m = "&pro_m={$p}";
          
          // $urls = "stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=";
          $urls = "report/viewerloadgl?module=gl&typ=report&reportname=";
          $stockcard_file= "gl_general_r.mrt";
          $send= "{$urls}{$stockcard_file}&glyear={$year}&glperiodstart={$start}&glperiodstop={$stop}&gl_type={$gl_type}&ac_codestart={$sacc}&ac_codestop={$eacc}&projectstart={$spro}&projectstop={$epro}&companycode={$companycode}";
          $base_url = $this->config->item("url_report");
          redirect($send);
        }
    
}