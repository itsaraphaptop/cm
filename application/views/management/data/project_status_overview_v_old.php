<style type="text/css"> 
div#divTblHdFix{
    width:75%;
    height:200px;
    border:1px solid #333333;
    border-width:0 0 1px 0;
    overflow:hidden;
}
table#tblHdFix{
    width:100%;
    height:200px;
    border:1px solid #333333;
}
thead.theadFix{
    background-color:#2DBAC6;
}
thead.theadFix > tr > th{
    color:#FFFFFF;
    border: solid #333333;
    border-width: 0px 1px 1px 0px;  
}
tr.tr-odd{
    background-color:#FFFFFF;
}
tr.tr-odd > td{
    text-align:center;
    border: solid #333333;
    border-width:0px 1px 1px 0px;       
}
tr.tr-even{
    background-color:#EAEAEA;
}
tr.tr-even > td{
    text-align:center;
    border: solid #333333;
    border-width: 0px 1px 1px 0px;          
}
tbody.tbodyShow{
    height: 200px;
    overflow-y: auto;
    overflow-x: hidden;
}   
</style>

<div class="content-wrapper">

     <div class="content">
     

        <div class="col-sm-12">
        <div class="panel panel-flat">
            <div class="table-responsive"  id="divTblHdFix">
              <table class="table datatable-basic dataTable no-footer" id="tblHdFix">
                <thead>
                  <tr>
                   <th class="text-center">#</th>
                    <th></th>
                    <th class="text-left"><div style="width: 150px;">Project</div></th>
                    <th class="text-left"><div style="width: 150px;">Project Name</div></th>
                    <th class="text-center"><div style="width: 150px;">Start  date</div></th>
                    <th class="text-center"><div style="width: 150px;">End date</div></th>
                    <th class="text-center"><div style="width: 150px;">Contract Revenue (1) <!-- Budget ใน BQ --></div></th>
                    <th class="text-center"><div style="width: 150px;">Vo Revenue (2) <!-- Budget  ใน BQ ในงานเพิ่ม --></div></th>
                    <th class="text-center"><div style="width: 200px;">Total Revenue (1) + (2) = (3) <!-- Budget ใน BQ  กับ Budget ใน BQ งานเพิ่ม รวมกัน --></div></th>
                    <th class="text-center"><div style="width: 200px;">Contract Budget (4)<!--  ประมาณค่าใช้จ่าย Forcash --></div></th>
                    <th class="text-center"><div style="width: 150px;">Vo Budget (5) <!-- ประมาณค่าใช้จ่าย Forcash งานเพิ่ม --></div></th>
                    <th class="text-center"><div style="width: 200px;">Total Budget (4) + (5) = (6) <!-- รวม Forcash งานเพิ่มและงานหลัก --></div></th>
                    <th class="text-center"><div style="width: 200px;">Purchase Cost <!-- PO WO Petty cash GL --></div></th>
                    <th class="text-center"><div style="width: 200px;">Actual Cost <!-- PO WO Petty cash GL --></div></th>

                    <th class="text-center"><div style="width: 250px;">(M) Contract GP (%) (1) - (4) / (1) = (7)</div></th>
                    <th class="text-center"><div style="width: 250px;">Vo GP (%) (2) - (5) / (2) = (8)</th>
                    <th class="text-center"><div style="width: 250px;">Average GP (%) (3) - (6) / (3) = (9)</div></th>
                    <th class="text-center"><div style="width: 250px;">Accum Contract IV. (Now) (10) <!-- AR ยึดการออก Invoice หมวดที่ 4 AR งานหลัก type Progress --></div></th>
                    <th class="text-center"><div style="width: 250px;">UnContract IV (1)-(10) = (11) </div></th>
                    <th class="text-center"><div style="width: 150px;">Accum VO IV (12) <!-- ออก invoice progress งานเพิ่ม (AR) --></div></th>
                    <th class="text-center"><div style="width: 250px;">UnVo IV (2)-(12) = (13) </div></th>
                    <th class="text-center"><div style="width: 250px;">Accum Contract Cost (14)<!-- AP+AR+GL  TYPE บัญชี หมวด 5 (14) งานหลัก --></div></th>
                    <th class="text-center"><div style="width: 250px;">Accum VO Cost (15)<!-- AP+AR+GL --><!--   TYPE บัญชี หมวด 5 (15) งานเพิ่ม --></div></th>
                    <th class="text-center"><div style="width: 350px;">Accum Contract Revenue (Cost to cost) (14)/(4)*(1) = (16) </div></th>
                    <th class="text-center"><div style="width: 350px;">Accum VO Revenue (Cost to cost) (15)/(5)*(2) = (17) </div></th>
                    
                    <th class="text-center"><div style="width: 250px;">Cash Flow (10) + (12) = (18)</div></th>
                    <th class="text-center"><div style="width: 250px;">ForeCash Contract Budget (19)</div></th>
                    <th class="text-center"><div style="width: 250px;">ForeCash Vo Budget (20)</div></th>
                    <th class="text-center"><div style="width: 250px;">ForeCash Total Budget (21)</div></th>
                    <th class="text-center"><div style="width: 250px;">ForeCash Contract GP(%) (22)</div></th>
                    <th class="text-center"><div style="width: 250px;">ForeCash Vo GP(%) (23)</div></th>
                    <th class="text-center"><div style="width: 250px;">ForeCash Average GP(%) (24)</div></th>

                   
                  </tr>
                </thead>
                <tbody>
              
                 <?php
                  $session_data = $this->session->userdata('sessed_in');
                  $compcode = $session_data['compcode'];
                  $this->db->select('*');
                  $this->db->from('company');
                  $this->db->where('compcode',$compcode);
                  $compa = $this->db->get()->result();
                  $start_accost = 0;
                  $end_accost = 0;
                  $startrev = 0;
                  $endrev= 0;
                  $array_income = array();
                  $array_bg_vo = array();
                  foreach ($compa as $c) {
                    $start_accost = $c->start_accost;
                    $end_accost = $c->end_accost;
                    $startrev = $c->startrev;
                    $endrev = $c->endrev;
                  }
                 ?>
                 <?php
                 $n=1;
                 $pjidsub = 0;
                 foreach ($pj as $p) { 
                  $pjidsub = $p->project_sub;
                  ?>
                 
                 <?php 
                  $this->db->select("sum(project_value) as sum_project_value");
                  $this->db->where("project_id",$p->project_id);
                  $res = $this->db->get("project")->result_array();
                  $val_income = 0 ;

                  if(count($res) > 0){
                    $val_income = $res[0]["sum_project_value"];
                  }

                  $this->db->select("project_id,bd_tenid");

                  $this->db->where("project_sub",$p->project_id);
                  $res_project_sub = $this->db->get("project")->result_array();
        

          foreach ($res_project_sub as $key => $item) {                  
            $this->db->select("sum(project_value) as sum_project_value");
            $this->db->where("project_id",$item["project_id"]);
            $res = $this->db->get("project")->result_array();
            $array_income[] = $res[0]["sum_project_value"];

            $this->db->select("sum(totalamtboq) as sum_budget_vo");
            $this->db->where("boq_bd",$item["bd_tenid"]);
            $res_bg_vo = $this->db->get("boq_item")->result_array();
            $array_bg_vo[] = $res_bg_vo[0]["sum_budget_vo"];

           
          }

        $this->db->select("sum(totalamtboq) as sum_budget_total");
        $this->db->where("boq_bd",$p->bd_tenid);
        $res = $this->db->get("boq_item")->result_array();
        // var_dump($res);
        $val_incomebg = 0 ;
        if(count($res) > 0){
          $val_incomebg = $res[0]["sum_budget_total"];
        }

        $this->db->select("SUM(amtdr) as sum_amtdr");
                  // $this->db->select("*");
                  $this->db->from("gl_batch_header");
                  $this->db->join("gl_batch_details","gl_batch_header.vchno=gl_batch_details.vchno");
                  
                  $this->db->where("gl_batch_details.project_id",$p->project_id);
                  $result_sum_sum_amtdr= $this->db->get()->result_array()[0]["sum_amtdr"]*1;                                
                // gl

                  $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                  $this->db->from("ap_cheque_header");
                  $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
                
                  $this->db->where("ap_cheque_detail.api_project",$p->project_id);
                  $this->db->where("ap_cheque_detail.api_type","apv");
                  $result_sum_api_netamt_apv= $this->db->get()->result_array()[0]["sum_api_netamt"]*1;

                  $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                  $this->db->from("ap_cheque_header");
                  $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
          
                  $this->db->where("ap_cheque_detail.api_project",$p->project_id);
                  $this->db->where("ap_cheque_detail.api_type","apo");
                  $result_sum_api_netamt_apo= $this->db->get()->result_array()[0]["sum_api_netamt"]*1;

                  $this->db->select("SUM(ap_cheque_detail.api_netamt) as sum_api_netamt");
                  $this->db->from("ap_cheque_header");
                  $this->db->join("ap_cheque_detail","ap_cheque_header.ap_code = ap_cheque_detail.api_code");
            
                  $this->db->where("ap_cheque_detail.api_project",$p->project_id);
                  $this->db->where("ap_cheque_detail.api_type","aps");
                  $result_sum_api_netamt_aps= $this->db->get()->result_array()[0]["sum_api_netamt"]*1;

                  //var_dump($result_sum_api_netamt);
                  // select SUM(ap_cheque_detail.api_netamt) as sum_api_netamt FROM ap_cheque_header INNER JOIN ap_cheque_detail on(ap_cheque_header.ap_code = ap_cheque_detail.api_code)
                  $sum_all = ($result_sum_api_netamt_apv+$result_sum_api_netamt_apo+$result_sum_api_netamt_aps+$result_sum_sum_amtdr);
                  $actual_cost_sum[] = $sum_all;
                 
                  $this->db->select('sum(poi_netamt) as poei'); //PO
                 $this->db->from('po');
                 $this->db->join('po_item','po.po_pono = po_item.poi_ref');
                 $this->db->where('po_project',$p->project_id);
                 $po = $this->db->get()->result();
               
                 foreach ($po as $poei) {
                   $posum = $poei->poei;
                 }

                  $this->db->select('sum(contactamount) as woei'); //WO
                 $this->db->from('lo');
                 $this->db->where('projectcode',$p->project_id);
                 $wo = $this->db->get()->result();

                 foreach ($wo as $woei) {
                   $wosum = $woei->woei;
                 }

                  $this->db->select('sum(pettycashi_amounttot) as pcei'); //PC
                 $this->db->from('pettycash');
                 $this->db->join('pettycash_item','pettycash.docno = pettycash_item.pettycashi_ref');
                 $this->db->where('project',$p->project_id);
                 $pc = $this->db->get()->result();
                 foreach ($pc as $pcei) {
                   $pcsum = $pcei->pcei;
                 }

                 $this->db->select('sum(amtdr) as glei'); //GL
                 $this->db->from('gl_batch_details');
                 $this->db->where('project_id',$p->project_id);
                 $gl = $this->db->get()->result();
                 foreach ($gl as $glei) {
                   $glsum = $glei->glei;
                 }



                      $this->db->select('*');//AR หมวด 4
                      $this->db->from('ar_account_header');
                      $this->db->join('ar_account_detail','ar_account_detail.acc_ref = ar_account_header.acc_no');
                      $this->db->where('acc_project',$p->project_id);
                      $this->db->where('acc_codeac >=',$startrev);
                      $this->db->where('acc_codeac <=',$endrev);
                      $arsub = $this->db->get()->result();
                      $acc_cr = 0;
                      foreach ($arsub as $kars) {
                        $acc_cr = $acc_cr+$kars->acc_cr;
                      }

                      $this->db->select("project_id,bd_tenid");
                      $this->db->where("project_sub",$p->project_id);
                      $res_project_sub = $this->db->get("project")->result_array();
                      foreach ($res_project_sub as $key => $valuep) {
                              
                            $this->db->select('*');//AR หมวด 4
                            $this->db->from('ar_account_header');
                            $this->db->join('ar_account_detail','ar_account_detail.acc_ref = ar_account_header.acc_no');
                            $this->db->where('acc_project',$valuep["project_id"]);
                            $this->db->where('acc_codeac >=',$startrev);
                            $this->db->where('acc_codeac <=',$endrev);
                            $arsub = $this->db->get()->result();
                            $acc_crsub = 0;
                            foreach ($arsub as $kars) {
                              $acc_crsub = $acc_crsub+$kars->acc_cr;
                            }
                      }


                  $this->db->select('*');//AR
                  $this->db->from('ar_account_header');
                  $this->db->join('ar_account_detail','ar_account_detail.acc_ref = ar_account_header.acc_no');
                  $this->db->where('acc_project',$p->project_id);
                  $this->db->where('acc_codeac >=',$start_accost);
                  $this->db->where('acc_codeac <=',$end_accost);
                  $ara = $this->db->get()->result();
                  $acc_cra = 0;
                  foreach ($ara as $kara) {
                    $acc_cra = $acc_cra+$kara->acc_cr;
                  }

                  $this->db->select('*');//GL
                  $this->db->from('gl_batch_details');
                  $this->db->where('project_id',$p->project_id);
                  $this->db->where('ac_code >=',$start_accost);
                  $this->db->where('ac_code <=',$end_accost);
                  $glbatch = $this->db->get()->result();
                  $amtdr = 0;
                  foreach ($glbatch as $gl) {
                  $amtdr = $amtdr+$gl->amtdr;
                  }


                  $this->db->select('*');//AP
                  $this->db->from('ap_gl');
                  $this->db->where('projectid',$p->project_id);
                  $this->db->where('acct_no >=',$start_accost);
                  $this->db->where('acct_no <=',$end_accost);
                  $this->db->where('doctype !=',"cnv");
                  $this->db->where('doctype !=',"cns");
                  $apbatch = $this->db->get()->result();
                  $amtdrap = 0;
                  foreach ($apbatch as $ap) {
                  $amtdrap = $amtdrap+$ap->amtdr;
                  }


                      $this->db->select("project_id,bd_tenid");
                      $this->db->where("project_sub",$p->project_id);
                      $res_project_sub = $this->db->get("project")->result_array();
                      foreach ($res_project_sub as $key => $valuep) {

                  $this->db->select('*');//AR
                  $this->db->from('ar_account_header');
                  $this->db->join('ar_account_detail','ar_account_detail.acc_ref = ar_account_header.acc_no');
                  $this->db->where('acc_project',$valuep["project_id"]);
                  $this->db->where('acc_codeac >=',$start_accost);
                  $this->db->where('acc_codeac <=',$end_accost);
                  $ara = $this->db->get()->result();
                  $acc_crasub = 0;
                  foreach ($ara as $kara) {
                    $acc_crasub = $acc_crasub+$kara->acc_cr;
                  }

                  $this->db->select('*');//GL
                  $this->db->from('gl_batch_details');
                  $this->db->where('project_id',$valuep["project_id"]);
                  $this->db->where('ac_code >=',$start_accost);
                  $this->db->where('ac_code <=',$end_accost);
                  $glbatch = $this->db->get()->result();
                  $amtdrsub = 0;
                  foreach ($glbatch as $gl) {
                  $amtdrsub = $amtdrsub+$gl->amtdr;
                  }


                  $this->db->select('*');//AP
                  $this->db->from('ap_gl');
                  $this->db->where('projectid',$valuep["project_id"]);
                  $this->db->where('acct_no >=',$start_accost);
                  $this->db->where('acct_no <=',$end_accost);
                  $this->db->where('doctype !=',"cnv");
                  $this->db->where('doctype !=',"cns");
                  $apbatch = $this->db->get()->result();
                  $amtdrapsub = 0;
                  foreach ($apbatch as $ap) {
                  $amtdrapsub = $amtdrapsub+$ap->amtdr;
                  }
                      }



                  $this->db->select('*');
                  $this->db->from('project');
                  $this->db->where('project_id',$valuep["project_id"]);
                  $this->db->join('boq_item','boq_item.boq_bd = project.bd_tenid',"left");
                  $query = $this->db->get()->result();
                  $forecastbgsub = 0;
                  foreach ($query as $k) {
                  $forecastbgsub = $forecastbgsub+$k->forecastbg;
                  }


                  $this->db->select("project_id,bd_tenid");
                      $this->db->where("project_sub",$p->project_id);
                      $res_project_sub = $this->db->get("project")->result_array();
                      foreach ($res_project_sub as $key => $valuep) {
                        
                           $this->db->select('*');
                  $this->db->from('project');
                  $this->db->where('project_id',$p->project_id);
                  $this->db->join('boq_item','boq_item.boq_bd = project.bd_tenid',"left");
                  $query = $this->db->get()->result();
                  $forecastbg = 0;
                  foreach ($query as $k) {
                  $forecastbg = $forecastbg+$k->forecastbg;
                  }
                        }
                  
                  ?>

                
               

                 <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                  <tr>
                   <td class="text-center" width="5%"><?php echo $n; ?></td>
                   <td class="text-center" width="5%"><a href="<?php echo base_url(); ?>index.php/management/costac/<?php echo $p->project_code; ?>/<?php echo $p->project_id; ?>" class="label label-success" >Select</a></th>
                   <td class="text-left" width="25%"><?php echo $p->project_code; ?></td>
                   <td class="text-left"><div class="table-responsive"><?php echo $p->project_name; ?></div></td>
                   <td class="text-center"><?php $date = new DateTime($p->project_start); echo  $date->format('d/m/Y'); ?></td>
                   <td class="text-center"><?php $date1 = new DateTime($p->project_stop); echo  $date1->format('d/m/Y'); ?></td>
                   <td  class="text-right"><?php echo number_format($val_income,2); ?></td>
                   <td  class="text-right"><?php echo number_format(array_sum($array_income),2); ?></td>
                   <td  class="text-right"><?php echo number_format(array_sum($array_income)+$val_income,2); ?></td>
                   <td  class="text-right"><?php echo number_format($val_incomebg,2); ?></td>
                   <td  class="text-right"><?php echo number_format(array_sum($array_bg_vo),2); ?></td>
                   <td  class="text-right"><?php echo number_format(array_sum($array_bg_vo)+$val_incomebg,2); ?></td>
                   <td  class="text-right"><?php echo number_format($posum+$wosum+$pcsum+$glsum,2); ?></td>
                   <td  class="text-right"><?php echo number_format($sum_all,2); ?></td>
                   <td  class="text-right"><?php echo number_format(($val_income-$val_incomebg)/$val_income,2); ?></td>
                   <td  class="text-right"><?php echo number_format((array_sum($array_income)-array_sum($array_bg_vo))/array_sum($array_income),2); ?></td>
                   <td  class="text-right"><?php echo number_format(((array_sum($array_income)+$val_income)-(array_sum($array_bg_vo)+$val_incomebg))/(array_sum($array_income)+$val_income),2); ?></td>
                  <td class="text-right"><?php echo number_format($acc_cr,2); ?></td>
                  <td class="text-right"><?php echo number_format($val_income-((array_sum($array_income)-array_sum($array_bg_vo))/array_sum($array_income)),2); ?></td>
                  <td class="text-right"><?php echo number_format($acc_crsub,2); ?></td>
                  <td  class="text-right"><?php echo number_format(array_sum($array_income)-$acc_crsub,2); ?></td>
                  <td class="text-right"><?php echo number_format(($acc_cra+$amtdr+$amtdrap),2); ?></td>
                  <td class="text-right"><?php echo number_format(($acc_crasub+$amtdrsub+$amtdrapsub),2); ?></td>
                  <td class="text-right"><?php echo number_format((($acc_cra+$amtdr+$amtdrap)/$val_incomebg)*$val_income,2); ?></td>
                  <td class="text-right"><?php echo number_format((($acc_crasub+$amtdrsub+$amtdrapsub)/array_sum($array_bg_vo))*array_sum($array_income),2); ?></td>
                  <td class="text-right"><?php echo number_format($acc_cr+$acc_crsub,2); ?></td>
                  <td class="text-right"><?php echo number_format($forecastbg,2); ?></td>
                  <td class="text-right"><?php echo number_format($forecastbgsub,2); ?></td>
                  <td class="text-right"><?php echo number_format($forecastbg+$forecastbgsub,2); ?></td>
                  <td class="text-right"><?php echo number_format(($forecastbg-$val_income)/$val_income,2); ?></td>
                  <td class="text-right"><?php echo number_format(($forecastbgsub-array_sum($array_income))/array_sum($array_income),2); ?></td>
                  <td class="text-right"><?php echo number_format((($forecastbg-$val_income)/$val_income)+(($forecastbgsub-array_sum($array_income))/array_sum($array_income)),2); ?></td>



                  
                
                  
           
                  </tr>
                   <?php $n++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

</div>
<script type="text/javascript">
  $('#overview').attr('class','active');
</script>