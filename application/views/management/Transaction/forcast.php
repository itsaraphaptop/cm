<?php
function DateThai($strDate) 
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
$strDate = date("Y-m-d");
// echo "Time now : ".DateThai($strDate);
?>
<?php
$pjcode = $this->uri->segment(3);
?>
<?php $tender = $this->db->query("select * from project where project_code='$pjcode'")->result();
foreach ($tender as $key) {
$project_code = $key->project_code;
$project_name = $key->project_name;
$project_start = $key->project_start;
$project_stop = $key->project_stop;
$controlbg = $key->controlbg;
$bdno = $key->bd_tenid;
$project_id = $key->project_id;
$project_detail = $key->project_detail;
$forcast_useredit = $key->forcast_useredit;
$revise = $key->revise;
$approve_bg = $key->approve_bg;
$approve_bg = $key->approve_bg;
    $approve_user = $key->approve_user;
    $revise_user = $key->revise_user;

}
?>
<?php   $boq = $this->db->query("select * from boq_item where boq_bd='$bdno' and status!='1'")->result();  ?>
<?php $allforcast="0";  $allboq="0"; $boq_lab_boqamt="0"; foreach ($boq as $val) {
$allboq = $allboq+$val->boq_budget_total;
$allforcast = $allforcast+$val->forecastbg;
$boq_lab_boqamt = $boq_lab_boqamt+$val->boq_lab_boqamt;

} ?>
<div class="content-wrapper">
  
    <form action="<?php echo base_url(); ?>index.php/management_active/forcastinsert/<?php echo $pjcode; ?>" method="post">
      <div class="content">
        <div class="panel panel-flat">
          <div class="panel-heading">
            
            <div class="row">
              <div class="col-md-1">
                <div class="form-group">
                  <label class="control-label">Project Name :</label>
                  <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $project_code ;?>">
                  
                </div>
              </div>
              <div class="col-md-3">
                <label class="control-label">&nbsp;</label>
                <div class="form-group">
                  
                  <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $project_name ;?>">
                  
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Ref. Code</label>
                  <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">&nbsp;</label>
                  <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Start</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $project_start ;?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">&nbsp;</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $project_stop ;?>">
                  
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Total Budget :</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo number_format($allboq,2); ?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">BOQ :</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo number_format($boq_lab_boqamt,2) ; ?>">
                  
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Cost Saving :</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="- <?php echo number_format($allboq,2); ?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Start</label>
                  <br>
                  <label class="radio-inline">
                    <input type="radio" name="bd_type" id="bd_type1" <?php if($approve_bg=="1"){ echo "checked='true'"; } ?> value="1" onclick="return false;">
                    Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="bd_type" id="bd_type2" <?php if($approve_bg=="0"){ echo "checked='true'"; } ?> value="0" onclick="return false;">
                    No
                  </label>
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label"><p style="color: red;">(Edit by:  <?php echo $approve_user ; ?>)</p></label>
                  <br>
                  <label class="control-label">
                    <?php if($controlbg=="1"){
                    echo '<input type="checkbox" name="bd_type" id="bd_type1"   onclick="return false;">';
                    }else if($controlbg=="2"){
                    echo '<input type="checkbox" name="bd_type" id="bd_type1"  checked="true"   onclick="return false;">';
                    }else if($controlbg=="0"){
                    echo '<input type="checkbox" name="bd_type" id="bd_type1"   onclick="return false;">';
                    } ?>
                    
                    Control BOQ
                  </label>
                  
                  
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-1">
                <div class="form-group">
                  <label class="control-label">Revise :</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $revise; ?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">&nbsp; </label>
                  <p style="color: #778899;">(Edit by:  <?php echo $revise_user ; ?>)</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Description :</label>
                  <input type="text" class="form-control input-sm" id="project_detail" name="project_detail" value="<?php echo $project_detail; ?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Forecast Budget :</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo number_format($allforcast,2); ?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">&nbsp;</label>
                  <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $forcast_useredit; ?>">
                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Start Date :</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" value="<?php echo $project_start; ?>">
                  
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">&nbsp;</label>
                  <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" value="<?php echo $project_stop; ?>">
                  
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label class="control-label">Month</label>
                  <input type="text" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                  
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Project Worktype :</label>
                  <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                  
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Progress :</label>
                  <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="">
                  
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group col-md-3">
                  <button type="button" class="btn btn-primary btn-block btn-icon btn-rounded input-xs" id="copy"><span>Copy Current Budget</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-flat">
          
          <div class="panel-body">
            <div class="text-right">
              <a href="#" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
              <!-- <a  id="addtorow"  class="btn btn-default"><i class="icon-stackoverflow"></i> ADD Rows</a> -->
              <button type="button" id="submit" class="btn btn-info"><i class="icon-floppy-disk position-left"></i> Save </button>
              <a href="" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
            </div>
          </div>
        </div>
        <div class="panel panel-flat">
          
          <div class="panel-body">
            <div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-top top-divided">
                <li class="active"><a href="#top-divided-tab1" data-toggle="tab"><i class="icon-file-text"></i> 1 Budget Cost</a></li>
                <li><a href="#top-divided-tab2" data-toggle="tab"><i class="icon-lifebuoy"></i> 2 Cost Code</a></li>
                
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="top-divided-tab1">
                  <div class="tab-pane" id="top-divided-tab3">
                    <div class="table-responsive">
                      <table class="table table-bordered table-framed" >
                        <thead>
                          
                          <tr>
                            
                            <th class="text-center">No</th>
                            <th class="text-center">Control</th>
                            <th class="text-center">Cost Code</th>
                            <th class="text-center">Cost Name</th>
                            <th class="text-center"><div style="width: 150px;"></div>Contract</th>
                            <th class="text-center"><div style="width: 150px;"></div>Current Budget <br>(1)</th>
                            <th class="text-center"><div style="width: 150px;"></div>Total PU Cost <br>(2)</th>
                            <th class="text-center"><div style="width: 150px;"></div>Budget Balance <br>(3) = (1) - (2)</th>
                            <th class="text-center"><div style="width: 150px;"></div>Forcast Budget (4)</th>
                            <th class="text-center"><div style="width: 150px;"></div>To Be Ordered<br> (5) = (4) - (2)</th>
                            <th class="text-center"><div style="width: 150px;"></div>Variance Budget<br> (6)  = (1) - (4)</th>
                            <th class="text-center"><div style="width: 150px;"></div>Actual Cost (7)</th>
                            <th class="text-center"><div style="width: 150px;"></div>To bepaid<br> (8)  = (4) - (7)</th>
                            <th class="text-center">Remark</th>
                            
                          </tr>
                          
                        </thead>
                        <tbody>
                        <?php 
                              $i = 1;
                              foreach ($boq_cost_type1 as $key => $value) {
                          ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td class="text-center">
                                  <?php  
                                    if ($value->control == 1) {
                                  ?>
                                  <div class="checkbox disabled" align="text-center">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" checked="checked" disabled="disabled" cost_code="<?= $value->costcode ?>"  bd="<?= $value->boq_code ?>" value="1" checked="true">
                                    </label>
                                  </div>
                                  <?php
                                    }else{
                                  ?>
                                  <div class="checkbox disabled" align="text-center">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" disabled="disabled" cost_code="<?= $value->costcode ?>" bd="<?= $value->boq_code ?>" value="0">
                                    </label>
                                  </div>
                                  <?php
                                    }
                                  ?>
                                </td>
                                <!-- <td>
                                  <div class="input-group">
                                    <input type="text"  cost_code="<?= $value->costcode ?>" bd="<?= $value->boq_code ?>" class="controlper form-control" value="<?= $value->controlper?>">
                                    <span class="input-group-addon">%</span>
                                  </div>
                                <input type="text" cost_code="<?= $value->costcode ?>" class="controlper  form-control" value="<?= $value->controlper?>">
                                </td> -->
                                <td><?= $value->costname ?></td>
                                <td><?= $value->costcode ?></td>
                                <td><input type="text" name="" class="form-control ct text-right" readonly="true" value="<?= $value->total_cost ?>"></td>
                                <td><input type="text" name="" class="form-control cb text-right" id="cb<?=$value->bd_cost;?>" readonly="true" value="<?= $value->total_boq ?>"></td>
                                <td>
                                  <?php 
                                    $this->db->select('sum(poi_amount) as total_poi_amount');
                                    $this->db->from('po_item');
                                    $this->db->where('poi_costcode', $value->costcode);
                                    $this->db->where('type_cost', $value->type);
                                    $data = $this->db->get();
                                    $res = $data->result();
                                    $budget_ba1 = 0;
                                    if ($res[0]->total_poi_amount == "") {
                                      $budget_ba1;
                                    }else{
                                      $budget_ba1 =  $res[0]->total_poi_amount;
                                    }

                                    $this->db->select_sum('total_disc');
                                    $this->db->where('projectcode',$project_id);
                                    $this->db->where('lo_costcode',$value->costcode);
                                    $this->db->where('type_cost',$value->type);// type1
                                    $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                    $qscostwo = $this->db->get('lo_detail')->result();
                                    $total_disc1 = 0;
                                    foreach ($qscostwo as $cwo) {
                                     $total_disc1 = $cwo->total_disc;
                                    }

                                    // wo
                                    $this->db->select_sum('pettycashi_unitprice');
                                    $this->db->where('project',$project_id);
                                    $this->db->where('pettycashi_costcode',$value->costcode);
                                    $this->db->where('type_cost',$value->type);// type1
                                    $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                    $qscostpc = $this->db->get('pettycash_item')->result();
                                    $pettycashi_unitprice1 = 0;
                                    foreach ($qscostpc as $cpc) {
                                     $pettycashi_unitprice1 = $cpc->pettycashi_unitprice;
                                    }
                                    // pc

                                    $this->db->select_sum('amtcr');
                                    $this->db->where('project_id',$project_id);
                                    $this->db->where('cust_code',$value->costcode);
                                    $this->db->where('type_cost',$value->type);// type1
                                    $qscostgl = $this->db->get('gl_batch_details')->result();
                                    $amtcr1 = 0;
                                    foreach ($qscostgl as $cgl) {
                                     $amtcr1 = $cgl->amtcr;
                                    }

                                    $tatol1 =$budget_ba1+$total_disc1+$pettycashi_unitprice1+$amtcr1;
                                    // echo $budget_ba1;
                                  ?>
                                  <input type="text" name="" class="form-control tpc text-right" id="tpc<?=$value->bd_cost;?>" value="<?=$tatol1;?>" readonly="true">
                                </td>
                                <td><input type="text" name="" class="form-control bb text-right" value="<?=$value->total_boq-$budget_ba1;?>" readonly="true"></td>
                                <td><input type="text" name="" class="form-control forecast text-right" id="<?=$value->bd_cost;?>" value="<?= $value->forecast; ?>"></td>
                                <td><input type="text" name="" class="form-control tbo text-right" id="tbo<?=$value->bd_cost;?>" value="<?=$value->forecast-$budget_ba1;?>" readonly="true"></td>
                                <td><input type="text" name="" class="form-control vb text-right" id="vb<?=$value->bd_cost;?>" value="<?= $value->total_boq-$value->forecast ?>" readonly="true"></td>
                                <td>
                                  <?php 
                                    $this->db->select('sum(poi_amount) as total_poi_amount');
                                    $this->db->from('po_item');
                                    $this->db->join('po', 'po.po_pono = po_item.poi_ref');
                                    $this->db->where('poi_costcode', $value->costcode);
                                    $this->db->where('po.apv_open', 'open');
                                    $this->db->where('type_cost', $value->type);
                                    $data = $this->db->get();
                                    $res = $data->result();

                                    $actual_cost1 = 0;
                                    if ($res[0]->total_poi_amount == "") {
                                      $actual_cost1;
                                    }else{
                                      $actual_cost1 =  $res[0]->total_poi_amount;
                                    }
                                    // echo $actual_cost1;
                                  ?>
                                  <input type="text" name="" class="form-control ac text-right" id="ac<?=$value->bd_cost;?>" value="<?=$actual_cost1;?>" readonly="true">
                                </td>
                                <td>
                                  <input type="text" name="" class="form-control tb text-right" id="tb<?=$value->bd_cost;?>" value="<?= $value->forecast-$actual_cost1 ?>" readonly="true">
                                </td>
                                <td></td>
                              </tr>
                          <?php
                              }
                          ?>



                          <?php 
                              foreach ($boq_cost_type2 as $key => $value) {
                          ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td class="text-center">
                                  <?php  
                                    if ($value->control == 1) {
                                  ?>
                                    <!-- <input type="checkbox" cost_code="<?= $value->costcode ?>"  bd="<?= $value->boq_code ?>" class="control_2" value="1" checked="true"> -->
                                  <div class="checkbox disabled" align="text-center">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" checked="checked" disabled="disabled" cost_code="<?= $value->costcode ?>"  bd="<?= $value->boq_code ?>" value="1" checked="true">
                                    </label>
                                  </div>
                                  <?php
                                    }else{
                                  ?>
                                    <!-- <input type="checkbox" cost_code="<?= $value->costcode ?>" bd="<?= $value->boq_code ?>" class="control_2" value="0"> -->
                                  <div class="checkbox disabled" align="text-center">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" disabled="disabled" cost_code="<?= $value->costcode ?>" bd="<?= $value->boq_code ?>" value="0">
                                    </label>
                                  </div>
                                  <?php
                                    }
                                  ?>
                                </td>
                                <td><?= $value->costname ?></td>
                                <td><?= $value->costcode ?></td>
                                <td><input type="text" name="" class="form-control ct text-right" value="<?= $value->total_cost ?>" readonly="true"></td>
                                <td><input type="text" name="" id="cb<?=$value->bd_cost;?>" class="form-control cb text-right" value="<?= $value->total_boq ?>" readonly="true"></td>
                                <td>
                                  <?php
                                    $this->db->select('sum(poi_amount) as total_poi_amount');
                                    $this->db->from('po_item');
                                    $this->db->where('poi_costcode', $value->costcode);
                                    $this->db->where('type_cost', $value->type);
                                    $data = $this->db->get();
                                    $res = $data->result();
                                    $budget_ba2 = 0;
                                    if ($res[0]->total_poi_amount == "") {
                                      $budget_ba2;
                                    }else{
                                      $budget_ba2 =  $res[0]->total_poi_amount;
                                    }

                                    $this->db->select_sum('total_disc');
                                    $this->db->where('projectcode',$project_id);
                                    $this->db->where('lo_costcode',$value->costcode);
                                    $this->db->where('type_cost',$value->type);// type1
                                    $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                    $qscostwo = $this->db->get('lo_detail')->result();
                                    $total_disc2 = 0;
                                    foreach ($qscostwo as $cwo) {
                                     $total_disc2 = $cwo->total_disc;
                                    }

                                    // wo
                                    $this->db->select_sum('pettycashi_unitprice');
                                    $this->db->where('project',$project_id);
                                    $this->db->where('pettycashi_costcode',$value->costcode);
                                    $this->db->where('type_cost',$value->type);// type1
                                    $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                    $qscostpc = $this->db->get('pettycash_item')->result();
                                    $pettycashi_unitprice2 = 0;
                                    foreach ($qscostpc as $cpc) {
                                     $pettycashi_unitprice2 = $cpc->pettycashi_unitprice;
                                    }
                                    // pc

                                    $this->db->select_sum('amtcr');
                                    $this->db->where('project_id',$project_id);
                                    $this->db->where('cust_code',$value->costcode);
                                    $this->db->where('type_cost',$value->type);// type1
                                    $qscostgl = $this->db->get('gl_batch_details')->result();
                                    $amtcr2 = 0;
                                    foreach ($qscostgl as $cgl) {
                                     $amtcr2 = $cgl->amtcr;
                                    }

                                    $tatol2 =$budget_ba2+$total_disc2+$pettycashi_unitprice2+$amtcr2;
                                    // echo $budget_ba2;
                                  ?>
                                  <input type="text" name="" id="tpc<?=$value->bd_cost;?>" class="form-control tpc text-right" value="<?=$tatol2;?>" readonly="true">
                                </td>
                                <td><input type="text" name="" class="form-control bb text-right" value="<?=$value->total_boq-$budget_ba2;?>" readonly="true"></td>
                                <td><input type="text" name="" class="form-control forecast text-right" id="<?=$value->bd_cost;?>" value="<?= $value->forecast; ?>"></td>
                                <td><input type="text" name="" id="tbo<?=$value->bd_cost;?>" class="form-control tbo text-right" value="<?= $value->forecast-$budget_ba2; ?>" readonly="true"></td>
                                <td><input type="text" name="" id="vb<?=$value->bd_cost;?>" class="form-control vb text-right" value="<?= $value->total_boq-$value->forecast ?>" readonly="true"></td>
                                <td>
                                  <?php 
                                    $this->db->select('sum(poi_amount) as total_poi_amount');
                                    $this->db->from('po_item');
                                    $this->db->join('po', 'po.po_pono = po_item.poi_ref');
                                    $this->db->where('poi_costcode', $value->costcode);
                                    $this->db->where('po.apv_open', 'open');
                                    $this->db->where('type_cost', $value->type);
                                    $data = $this->db->get();
                                    $res = $data->result();

                                    $actual_cost2 = 0;
                                    if ($res[0]->total_poi_amount == "") {
                                      $actual_cost2;
                                    }else{
                                      $actual_cost2 =  $res[0]->total_poi_amount;
                                    }
                                    // echo $actual_cost2;
                                  ?>
                                  <input type="text" name="" class="form-control ac text-right" id="ac<?=$value->bd_cost;?>" value="<?=$actual_cost2;?>" readonly="true">
                                </td>
                                <td><input type="text" name="" id="tb<?=$value->bd_cost;?>" class="form-control tb text-right" value="<?= $value->forecast-$actual_cost2 ?>" readonly="true"></td>
                                <td></td>

                              </tr>
                          <?php
                              }
                          ?>
                      
                         
                        </tbody>
                        <tr>
                          <td colspan="4" class="text-center">Total</td>
                          <td class="text-right"><input type="text" name="" id="sumct" class="form-control text-right" readonly="true"></td>
                          <td class="text-right"><input type="text" name="" id="sumcb" class="form-control text-right" readonly="true"></td>
                          <td class="text-right"><input type="text" name="" id="sumtpc" class="form-control text-right" readonly="true"></td>
                          <td class="text-right"><input type="text" name="" id="sumbb" class="form-control text-right" readonly="true"></td>
                          <td class="text-center"><input class="form-control input-xs text-right" type="text" id="sumfc" name="forcasttotal" readonly="" value=""></td>
                          <td class="text-center"><input class="form-control input-xs text-right" type="text" id="sumtbo" name="" readonly="" value=""></td>
                          <td class="text-center"><input class="form-control input-xs text-right" type="text" id="sumvb" name="" readonly="" value=""></td>
                          <td class="text-center"><input class="form-control input-xs text-right" type="text" id="sumac" name="" value="" readonly=""></td>
                          <td class="text-center"><input class="form-control input-xs text-right" type="text" id="sumtb" name="" readonly="" value=""></td>
                          <td class="text-center"></td>
                        </tr>
                        
                      </table>
                        <script type="text/javascript">
                          $('.forecast').keyup(function(event) {
                            var id = $(this).attr('id');
                            var _val = $(this).val();
                            var tpc_val = $('#tpc'+id).val();
                            var cb_val = $('#cb'+id).val();
                            var tpc_val = $('#tpc'+id).val();
                            var ac_val = $('#ac'+id).val();
                            $('#tbo'+id).val(_val-tpc_val);
                            $('#vb'+id).val(cb_val-_val);
                            $('#tb'+id).val(_val-ac_val);
                            sum_total('forecast','sumfc');
                            sum_total('tbo','sumtbo');
                            sum_total('vb','sumvb');
                            sum_total('tb','sumtb');
                          });
                          function sum_total(class_name, target){
                              var sum = 0;
                              // iterate through each td based on class and add the values
                              $("."+class_name).each(function() {

                                  var value = $(this).val();
                                  // add only if the value is number
                                  if(!isNaN(value) && value.length != 0) {
                                      sum += parseFloat(value);
                                  }
                              });
                              $('#'+target).val(sum);
                            }

                          sum_total('ct','sumct');
                          sum_total('cb','sumcb');
                          sum_total('tpc','sumtpc');
                          sum_total('bb','sumbb');
                          sum_total('forecast','sumfc');
                          sum_total('tbo','sumtbo');
                          sum_total('vb','sumvb');
                          sum_total('ac','sumac');
                          sum_total('tb','sumtb');
                          $('#submit').click(function(event) {
                            $('.forecast').each(function(index, el) {
                              $.post('<?=base_url();?>management/update_forecast', 
                              {
                                id: el.getAttribute("id")*1, 
                                forecast: el.value*1
                              }, function() {
                              }).done(function(data){
                                try{
                                  var json_res = jQuery.parseJSON(data);
                                  if (json_res.status === true) {
                                    // shownoti('Success', json_res.message, 'success');
                                  }else{
                                    // shownoti('error', json_res.message, 'danger');
                                  }
                                }catch(e){
                                  shownoti('error', e, 'danger');
                                }
                              });
                            });

                          });

                        </script>
                    </div></div>
                  </div>
                  <div class="tab-pane" id="top-divided-tab2">
                    <div class="table-responsive">
                      <table class="table table-bordered table-framed">
                        <thead>
                          <tr >
                            
                            <th class="text-center">No</th>
                            <th class="text-center">Cost Code</th>
                            <th class="text-center">Cost Name</th>
                            <th class="text-center">BOQ</th>
                            <th class="text-center">Budget</th>
                            <th class="text-center">By</th>
                            <th class="text-center">Modify Date</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_bd',$bdno);
                          
                          $this->db->where('status',0);
                          $gb = $this->db->get('boq_item')->result();
                          
                          ?>
                          <?php $n=1;  foreach ($gb as $gbb){   ?>
                          <?php
                          $this->db->select('*');
                          
                          $this->db->where('status',0);
                          $costmat = $this->db->get('boq_item')->result();
                          $costs=0;
                          $amt=0;
                          $boq_amt = 0;
                          ?>
                          <?php foreach ($costmat as $cos){
                          $costs = $costs+$cos->boq_budget_amt;
                          $amt = $amt + $cos->boq_total_amt;
                          $boq_amt = $boq_amt + $cos->boq_amt;
                          }?>
                          <tr <?php if($gbb->boq_costmat==""){ echo 'hidden'; } ?>>
                            <td class="text-center"><?php echo $n;?></td>
                            <td class="text-center"><?php echo $gbb->boq_costmat; ?></td>
                            <td class="text-left"><?php echo $gbb->boq_costmatname; ?></td>
                            
                            <td class="text-right"><?php echo number_format($boq_amt,2); ?></td>
                            <td class="text-right"><?php echo number_format($costs,2); ?></td>
                            <td class="text-right"><?php echo $gbb->adduser; ?></td>
                            <td class="text-right"><?php echo DateThai($gbb->adddate); ?></td>
                          </tr>
                          <?php $n++; } ?>
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_bd',$bdno);
                         
                          $this->db->where('status',0);
                          $query = $this->db->get('boq_item')->result();
                          
                          ?>
                          <?php $a=$n; foreach ($query as $gbbb){  ?>
                          <?php
                          $this->db->select('*');
                        
                          $this->db->where('status',0);
                          $costmatt = $this->db->get('boq_item')->result();
                          $costss=0;
                          $amtt=0;
                          $boq_lab_boqamt = 0;
                          ?>
                          <?php  foreach ($costmatt as $coss){
                          $costss = $costss+$coss->boq_lab_amt;
                          $amtt = $amtt + $coss->boq_total_amt;
                          $boq_lab_boqamt = $boq_lab_boqamt+$coss->boq_lab_boqamt;
                          }?>
                          <tr <?php if($gbbb->boq_costsub==""){ echo 'hidden'; } ?>>
                            <td class="text-center"><?php echo $a; ?></td>
                            
                            <td class="text-center"><?php echo $gbbb->boq_costsub; ?></td>
                            <td class="text-left"><?php echo $gbbb->boq_costsubname; ?></td>
                            
                            <td class="text-right"><?php echo number_format($boq_lab_boqamt,2); ?></td>
                            <td class="text-right"><?php echo number_format($costss,2); ?></td>
                            <td class="text-right"><?php echo $gbbb->adduser; ?></td>
                            <td class="text-right"><?php echo DateThai($gbbb->adddate); ?></td>
                          </tr>
                          <?php $a++;  } ?>
                          
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_bd',$bdno);
                          $this->db->where('status',0);
                          $allll = $this->db->get('boq_item')->result();
                          $boq_budget_amt = 0;
                          $boq_lab_amt = 0;
                          $boq_amt11 = 0;
                          $boq_lab_boqamt11 = 0;
                          ?>
                          <?php  foreach ($allll as $allamt){
                          $boq_budget_amt = $boq_budget_amt+$allamt->boq_budget_amt;
                          $boq_lab_amt = $boq_lab_amt+$allamt->boq_lab_amt;
                          $boq_amt11 = $boq_amt11 + $allamt->boq_amt;
                          $boq_lab_boqamt11 = $boq_lab_boqamt11 + $allamt->boq_lab_boqamt;
                          }?>
                          <tr>
                            <td colspan="3" class="text-center"><b>Total</b></td>
                            <td class="text-right"><b><?php echo number_format($boq_amt11+$boq_lab_boqamt11,2); ?></b></td>
                            <td class="text-right"><b><?php echo number_format($boq_budget_amt+$boq_lab_amt,2); ?></b></td>
                            
                            <td colspan="2" class="text-center"><b></b></td>
                          </tr>
                          
                        </table>

                      </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
        </form>

        <script>
          $('#copy').click(function(){

          });
          $('#tra').attr('class', 'active');
          $('#tra_sub6').attr('style', 'background-color:#dedbd8');
        </script>