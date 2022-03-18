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

      <?php   $boq = $this->db->query("select * from boq_item where boq_project='$bdno' and status!='1'")->result();  ?>

      <?php $allforcast="0";  $allboq="0"; $boq_lab_boqamt="0"; foreach ($boq as $val) {
        $allboq = $allboq+$val->boq_budget_total;
        $allforcast = $allforcast+$val->forecastbg;
        $boq_lab_boqamt = $boq_lab_boqamt+$val->boq_lab_boqamt;
 
      } ?>
			<div class="content-wrapper">
      <div class="panel panel-body">
	

				<form action="<?php echo base_url(); ?>index.php/management_active/approvebudget/<?php echo $pjcode; ?>" method="post">
				<div class="content">
				<div class="panel panel-body">
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
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $project_start ;?>">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                    <input type="date" class="form-control input-sm" id="bd_pname" name="bd_pname" readonly="" value="<?php echo $project_stop ;?>">
                    
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
                    <input type="text" class="form-control input-sm text-right" id="bd_pname" name="bd_pname" readonly="" value="<?php echo number_format(0-$allboq,2); ?>">
                    
                  </div>
                  </div>

                   <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label">Start </label>
                    <br>
                    <label class="radio-inline">
                      <input type="radio" name="approve_bg" id="approve_bg" value="1" <?php if($approve_bg=="1"){ echo "checked='true'"; } if($approve_bg=="1"){ echo 'onclick="return false"'; } ?>>
                      Yes
                    </label>

                    <label class="radio-inline">
                      <input type="radio" name="approve_bg" id="approve_bg" value="0" <?php if($approve_bg=="0"){ echo "checked='true'"; } if($approve_bg=="1"){ echo 'onclick="return false"'; } ?>>
                      No
                    </label>
             
                  </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                    <label class="control-label"> <p style="color: red;">(Edit by:  <?php echo $approve_user ; ?>)</p></label>
                    <br>
                    <label class="control-label">
                    <?php if($controlbg=="1"){
                      echo '<input type="checkbox" name="bd_type" id="bd_type1"   onclick="return false;">';
                      }else if($controlbg=="2"){
                        echo '<input type="checkbox" name="bd_type" id="bd_type1"  checked="true"   onclick="return false;">';
                        } ?>
                      
                      Control BOQ
                    </label>

             
                    
                  </div>
                  </div>


                 
                  </div>

                  <div class="row">
                  	<div class="col-md-1">
                    <div class="form-group">
                    <label class="control-label">Revise : </label>
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
					

                  </div>


						</div>
						</div>
							<div class="panel panel-flat">
								
								<div class="panel-body">
								<div class="text-right">
                          <a href="#" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                          <!-- <a  id="addtorow"  class="btn btn-default"><i class="icon-stackoverflow"></i> ADD Rows</a> -->
                          <button type="submit" class="preload btn btn-info"><i class="icon-floppy-disk position-left"></i> Save </button>
                          <a href="" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                        </div>
								</div>

							</div>
							    <div class="panel panel-flat" >
                
                <div class="panel-body" >
                  <div class="tabbable" >
                    <ul class="nav nav-tabs nav-tabs-top top-divided">
                      <li class="active"><a href="#top-divided-tab1" data-toggle="tab"><i class="icon-file-text"></i> 1 Budget Cost</a></li>
                      <li ><a href="#top-divided-tab2" data-toggle="tab"><i class="icon-lifebuoy"></i> 2 Cost Code</a></li>
                      <li><a href="#top-divided-tab3" data-toggle="tab"><i class="icon-compass4"></i> 3 Cost Code Summary</a></li>
                    </ul>

                    <div class="tab-content">
                      <div class="tab-pane" id="top-divided-tab1">
<div class="table-responsive" id="table_wrapper">
              <table class="table table-bordered table-framed">
                <thead>
                  <tr style='background-color: #F5F5F5;'>
                  
                    <th style="border: 2px solid black; " class="text-center">G-code</th>
                    <th style="border: 2px solid black; " class="text-center">Sub-Code</th>
                    <th style="border: 2px solid black; " class="text-center">Description</th>
                    <?php foreach($cost_name as $key => $val) { ?>
                    <th style="border: 2px solid black; " class="text-center"><?=$val['ctype_name'];?></th>
                    <?php } ?>
                    <th style="border: 2px solid black; " class="text-center">Total(1)</th>
                    <th style="border: 2px solid black; " class="text-center">BOQ(2)</th>
                    <th style="border: 2px solid black; " class="text-center">COST-SAVING (2) - (1)</th>
                    <!-- <th class="text-center">Payment Submit</th>
                    <th class="text-center">Payment Certificet9e</th>
                    <th class="text-center">Payment Bal.Submit</th> -->

                  </tr>
                </thead>
                <tbody>
<!--                   <?php
                      $run = 0;
                        foreach ($data as $key1 => $item) { 
                      ?>
                        <tr  style="font-weight: bold; background-color: #FF7F64;">
                          <td><?=$item[0]["sub_code"]?></td>
                          <td></td>
                          <td><?=$item[0]["sub_name"]?></td>
                          <?php foreach($cost_name as $key2 => $val2) { ?>
                            <td class="text-right"><?= ($item[0]["cost"] == $val2['ctype_name']) ? number_format($item[0]["total_cost"],2) : '';?></td>
                          <?php } ?>
                          <td class="text-right"><?=number_format($item[0]["total_cost"],2); ?></td>
                          <td class="text-right"><?=number_format($item[0]["total_boq"],2); ?></td>
                          <td class="text-right"><?=number_format($item[0]["total_boq"] - $item[0]["total_cost"],2); ?></td>
                        </tr>

                        <?php 
                        foreach($item as $key3 => $item_sub_group) {
                          // var_dump($item_sub_group);
                          $sum_group_round = $item_sub_group["summ"];
                         $sum_group = 0;


                        ?>
                          <tr <?= ($item_sub_group["status"].$item_sub_group["typecost"] == "H2" || $item_sub_group["status"].$item_sub_group["typecost"] == "H3") ? "style='background-color:#FEBAAB'" : "";?>>
                            <?php if($key3!=0) {?>
                                <td></td>
                                <td><?=$item_sub_group["sub_code"]?></td>
                                <td><?=$item_sub_group["sub_name"]?></td>
                                <?php foreach($cost_name as $key4 => $val4) { ?>
                                <td class="text-right">
                                <?php 
                                if($item_sub_group["cost"] == $val4['ctype_name']) 
                                { 
                                  $sum_group += $item_sub_group["summ"];
                                  if ($item_sub_group["status"].$item_sub_group["typecost"] == "H2" || $item_sub_group["status"].$item_sub_group["typecost"] == "H3") {
                                    echo number_format($item_sub_group["summ"],2);
                                  }else{
                                    echo number_format($sum_group,2);
                                  }
                                }else{

                                }
                                ?>
                                  
                                </td>
                                <?php } ?>
                                <td class="text-right">
                                  <?=number_format($sum_group,2);?>
                                </td>
                                <td class="text-right">
                                  <?=number_format($item_sub_group['boq'],2); ?>                                
                                </td>
                                <td class="text-right">
                                  <?=number_format($item_sub_group['boq'] - $sum_group, 2);?>
                                </td>

                            <?php $sum_group = 0; }?>
                          </tr>
                        <?php } ?>
                      <?php } ?> -->
                </tbody>
               
                </table>

                </div>
                      </div>


                      <script>
                        // $(document).ready(function() {
  $("#btnExport").click(function(e) {
    e.preventDefault();

    //getting data from our table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('table_wrapper');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');

    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'Budget Cost' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
  });
// });
                      </script>


                      <div class="tab-pane " id="top-divided-tab2">
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
    $this->db->where('boq_project',$bdno);
      $this->db->group_by('boq_costmat');
      $this->db->where('status',0);
      $this->db->where('boq_costmat !=',"");
      $gb = $this->db->get('boq_item')->result();

 
      ?>
                              <?php $n=1;  foreach ($gb as $gbb){   ?>
          <?php
    $this->db->select('*');       
    $this->db->where('boq_costmat',$gbb->boq_costmat);
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
          <tr>
            <td class="text-center"><?php echo $n;?></td>
            <td class="text-center"><?php echo $gbb->boq_costmat; ?></td>
            <td class="text-center"><?php echo $gbb->boq_costmatname; ?></td>
            
            <td class="text-right"><?php echo number_format($boq_amt,2); ?></td>
            <td class="text-right"><?php echo number_format($costs,2); ?></td>
                  <td class="text-right"><?php echo $gbb->adduser; ?></td>
             <td class="text-right"><?php echo DateThai($gbb->adddate); ?></td>
          </tr>
            <?php $n++; } ?>
      <?php
    $this->db->select('*');       
    $this->db->where('boq_project',$bdno);
      $this->db->group_by('boq_costsub');
      $this->db->where('status',0);
      $this->db->where('boq_costsub !=',"");
      $query = $this->db->get('boq_item')->result();

 
      ?>

      <?php $a=$n; foreach ($query as $gbbb){  ?>

                <?php
    $this->db->select('*');       
    $this->db->where('boq_costsub',$gbbb->boq_costsub);
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
          <tr>
            <td class="text-center"><?php echo $a; ?></td>
            
            <td class="text-center"><?php echo $gbbb->boq_costsub; ?></td>
            <td class="text-center"><?php echo $gbbb->boq_costsubname; ?></td>
            
            <td class="text-right"><?php echo number_format($boq_lab_boqamt,2); ?></td>
            <td class="text-right"><?php echo number_format($costss,2); ?></td>
            <td class="text-right"><?php echo $gbbb->adduser; ?></td>
             <td class="text-right"><?php echo DateThai($gbbb->adddate); ?></td>
          </tr>
        <?php $a++;  } ?>

    

      <?php
    $this->db->select('*');       
    $this->db->where('boq_project',$bdno);
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
         
             <td colspan="3" class="text-center"><b></b></td>
          </tr>
                  
                </table>
                      </div>
                      </div>

                      <div class="tab-pane" id="top-divided-tab3" >
                      <div class="table-responsive" >
                        <!-- <table class="table table-bordered table-framed" >
                <thead>
              
                 <tr>
                  
                   <th style="border: 2px solid black; " class="text-center">No</th>
                            <th style="border: 2px solid black; " class="text-center">Control </th>
                            <th style="border: 2px solid black; " class="text-center">% Control</th>
                            <th style="border: 2px solid black; " class="text-center">COST C. (MATERIAL)</th>
                            <th style="border: 2px solid black; " class="text-center">COST N. (MATERIAL)</th>
                            <th style="border: 2px solid black; " class="text-center">COST C. (LABOR.SUB CON.)</th>
                            <th style="border: 2px solid black; " class="text-center">COST N. (LABOR.SUB CON.)</th>
                            <?php foreach($cost_name as $key => $val) { ?>
                            <th style="border: 2px solid black; " class="text-center">
                              <?=$val['ctype_name'];?>
                            </th>
                            <?php } ?>
                            <th style="border: 2px solid black; " class="text-center"><b>Total Budget Cost</b></th>
                            <th style="border: 2px solid black; " class="text-center"><b>This Budget Control</b></th>
                            <th style="border: 2px solid black; " class="text-center">Contract Cost</th>
                            <th style="border: 2px solid black; " class="text-center" style='color: #009900; background: #CCFFFF;'><b>Total PU Cost(Use)</b></th>
                            <?php foreach($cost_name as $key => $val) { ?>
                    <th style="border: 2px solid black; " style='color: #009900; background: #CCFFFF;'><?=$val['ctype_name'];?></th>
                    <?php } ?>
                            <th style="border: 2px solid black; " class="text-center" style='color: #009900; background: #CCFFFF;'><b>Budget Control Bal.</b></th>

                            <th style="border: 2px solid black; " class="text-center"><b>Forecast Budget</b></th>
                            <th style="border: 2px solid black; " class="text-center">By</th>
                            <th style="border: 2px solid black; " class="text-center">Modify Date</th>
                            <th style="border: 2px solid black; " class="text-center"></th>
                            <th style="border: 2px solid black; " class="text-center">Controlper By</th>
                            <th style="border: 2px solid black; " class="text-center">Control Date</th>
                            <th></th>

                  </tr>


                  
                </thead>
                <tbody >

          

                     <tbody>
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_project',$bdno);
                          $this->db->where('status !=',1);
                          $costsummary = $this->db->get('boq_item')->result();
                          ?>
                          <?php $a=1; foreach ($costsummary as $bg){ ?>
                          
                          
                          <tr>
                            
                            <td class="text-center" ><?php echo $a; ?><input class="form-control input-xs text-right" type="hidden" name="boq_id[]" id="boq_id<?php echo $n;?>" value="<?php echo $bg->boq_id; ?>"></td>
                            <td class="text-center">
                              <input type="hidden" name="boq_control" id="boq_control<?php echo $n;?>">
                              <input type="checkbox" class="chkcontroll" name="chkcontroll[]"  value="1" id="chkcontroll<?php echo $n; ?>" <?php if($bg->chkcontroll=="1"){ echo "checked"; } ?>>
                            </td>
                            <td class="text-right"><div style="width: 100px;"><input class="poi_control<?php echo $n; ?> form-control input-xs text-right" type="text" name="poi_control[]" id="poi_control<?php echo $n; ?>" value="<?php echo $bg->controlcost;?>"  <?php if($approve_bg!="0"){echo 'readonly=""';}; ?>></div></td>
                            <td><?php echo $bg->boq_costmat; ?></td>
                            <td><?php echo $bg->boq_costmatname; ?></td>
                            <td><?php echo $bg->boq_costsub; ?></td>
                            <td><?php echo $bg->boq_costsubname; ?></td>
                            <?php foreach($cost_name as $key => $val) { ?>
                            <td class="text-right">
                            <?php if($bg->code_type1==$val['ctype_name']){
                               echo number_format($bg->boq_budget_amt,2);
                              } ?>
                             <?php if($bg->code_type2==$val['ctype_name']){
                               echo number_format($bg->boq_lab_amt,2);
                              } ?>
                            </td>

                            <?php } ?>
                              <td class="text-right"><?php  echo number_format($bg->boq_budget_total,2); ?></td>
                            <td class="text-right"><?php  echo number_format(($bg->boq_budget_total/100)*$bg->controlcost,2); ?></td>
                            <td></td>
                            <td></td>
                             <?php foreach($cost_name as $key => $val) { ?>
                            <th class="text-center">
                              <?=$val['ctype_name'];?>
                            </th>
                            <?php } ?>
                            <td></td>
                             <td class="text-right"><?php echo number_format($bg->forecastbg,2); ?></td>
                    <td class="text-center"><?php echo $bg->adduser; ?></td>
                    <td class="text-center"><div style="width: 100px;"><?php echo DateThai($bg->adddate); ?></div></td>
                    <td class="text-center"></td>
                    <td class="text-center"><?php echo $bg->controlcostuser; ?></td>
                    <td class="text-center"><?php echo $bg->controlcostdate; ?></td>
                          </tr>
                          <?php $a++; } ?>
                        </tbody>


                
                </table> -->
                <table class="table table-bordered table-framed">
                        <thead>
                          <tr>
                            <th style="border: 2px solid black; " class="text-center">No</th>
                            <th style="border: 2px solid black; " class="text-center">Control </th>
                            <th style="border: 2px solid black;  width: 150px;" class="text-center">% Control</th>
                            <th style="border: 2px solid black; " class="text-center">Cost Code</th>
                            <th style="border: 2px solid black; " class="text-center">Cost Name</th>
                          
                            <th style="border: 2px solid black; " class="text-center" style='color: #009900; background: #CCFFFF;'><b>Budget Control Bal.</b></th>
                            <th style="border: 2px solid black; ">PU Cost</th>
                            <th style="border: 2px solid black; ">MATERIAL</th>
                            <th style="border: 2px solid black; ">LABOR</th>
                            <th style="border: 2px solid black; ">SUB CON</th>
                            <th style="border: 2px solid black; " class="text-center"><b>Forecast Budget</b></th>
                           
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
                                    <input type="checkbox" cost_code="<?= $value->costcode ?>"  bd="<?= $value->boq_code ?>" class="control" value="1" checked="true">
                                  <?php
                                    }else{
                                  ?>
                                    <input type="checkbox" cost_code="<?= $value->costcode ?>" bd="<?= $value->boq_code ?>" class="control" value="0">
                                  <?php
                                    }
                                  ?>
                                </td>
                                <td>
                                  <div class="input-group">
                                    <input type="text"  cost_code="<?= $value->costcode ?>" bd="<?= $value->boq_code ?>" class="controlper form-control" value="<?= $value->controlper?>">
                                    <span class="input-group-addon">%</span>
                                  </div>
                                <!-- <input type="text" cost_code="<?= $value->costcode ?>" class="controlper  form-control" value="<?= $value->controlper?>"> -->
                                </td>
                                <td><?= $value->costcode ?></td>
                                <td><?= $value->costname ?></td>
                                <td><?= $value->total_cost ?></td>

                                <td>
                                  <?php 
                                  $this->db->select('SUM(poi_amount) as po_amount');
                                  $this->db->where('po_project',$id_project);
                                  $this->db->where('poi_costcode',$value->costcode);
                                  $this->db->join('po','po.po_pono = po_item.poi_ref');
                                  $po = $this->db->get('po_item')->result();
                                  $po_amount = $po[0]->po_amount;

                                  $this->db->select('SUM(total_disc) as wo_amount');
                                  $this->db->where('projectcode',$id_project);
                                  $this->db->where('lo_costcode',$value->costcode);
                                  $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                  $wo = $this->db->get('lo_detail')->result();
                                  $wo_amount = $wo[0]->wo_amount;

                                  $this->db->select('SUM(pettycashi_unitprice) as pc_amount');
                                  $this->db->where('project',$id_project);
                                  $this->db->where('pettycashi_costcode',$value->costcode);
                                  $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                  $pc = $this->db->get('pettycash_item')->result();
                                  $pc_amount = $pc[0]->pc_amount;

                                  $sum = $pc_amount+$wo_amount+$po_amount;
                                  ?>
                                  <span style="cursor:pointer" costcode="<?= $value->costcode ?>" class="show_pu badge badge-flat border-success text-success-600 pull-center"  data-toggle="modal" data-target="#pu_model"><?= number_format($sum,2) ?></span>
                       
                                </td>
                               <td>
                                  <?php 
                                  $this->db->select('SUM(poi_amount) as po_amount');
                                  $this->db->where('po_project',$id_project);
                                  $this->db->where('poi_costcode',$value->costcode);
                                  $this->db->where('type_cost','1');
                                  $this->db->join('po','po.po_pono = po_item.poi_ref');
                                  $po_mat = $this->db->get('po_item')->result();
                                  $po_m = $po_mat[0]->po_amount;

                                  $this->db->select('SUM(total_disc) as wo_amount');
                                  $this->db->where('projectcode',$id_project);
                                  $this->db->where('lo_costcode',$value->costcode);
                                  $this->db->where('type_cost','1');
                                  $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                  $wo_mat = $this->db->get('lo_detail')->result();
                                  $wo_m = $wo_mat[0]->wo_amount;

                                  $this->db->select('SUM(pettycashi_unitprice) as pc_amount');
                                  $this->db->where('project',$id_project);
                                  $this->db->where('pettycashi_costcode',$value->costcode);
                                  $this->db->where('type_cost','1');
                                  $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                  $pc_mat = $this->db->get('pettycash_item')->result();
                                  $pc_m = $pc_mat[0]->pc_amount;

                                  $MATERIAL = $pc_m+$wo_m+$po_m;
                                  ?>
                                  <span style="cursor:pointer" class="material badge badge-flat border-info text-info-600 pull-center" costcode="<?= $value->costcode ?>" data-toggle="modal" data-target="#material_model"><?= number_format($MATERIAL,2) ?></span>


                        
                                </td>
                                <td>
                                  <?php 
                                  $this->db->select('SUM(poi_amount) as po_amount');
                                  $this->db->where('po_project',$id_project);
                                  $this->db->where('poi_costcode',$value->costcode);
                                  $this->db->where('type_cost','2');
                                  $this->db->join('po','po.po_pono = po_item.poi_ref');
                                  $po_labor = $this->db->get('po_item')->result();
                                  $po_l = $po_labor[0]->po_amount;

                                  $this->db->select('SUM(total_disc) as wo_amount');
                                  $this->db->where('projectcode',$id_project);
                                  $this->db->where('lo_costcode',$value->costcode);
                                  $this->db->where('type_cost','2');
                                  $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                  $wo_labor = $this->db->get('lo_detail')->result();
                                  $wo_l = $wo_labor[0]->wo_amount;

                                  $this->db->select('SUM(pettycashi_unitprice) as pc_amount');
                                  $this->db->where('project',$id_project);
                                  $this->db->where('pettycashi_costcode',$value->costcode);
                                  $this->db->where('type_cost','2');
                                  $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                  $pc_labor = $this->db->get('pettycash_item')->result();
                                  $pc_l = $pc_labor[0]->pc_amount;

                                  $LABOR = $pc_l+$wo_l+$po_l;
                                  ?>
                                  <span style="cursor:pointer" costcode="<?= $value->costcode ?>" class="labor badge badge-flat border-violet text-violet-600 pull-center" data-toggle="modal" data-target="#labor_model"><?= number_format($LABOR,2) ?></span>
                                </td>
                                <td>
                                  <?php 
                                  $this->db->select('SUM(poi_amount) as po_amount');
                                  $this->db->where('po_project',$id_project);
                                  $this->db->where('poi_costcode',$value->costcode);
                                  $this->db->where('type_cost','3');
                                  $this->db->join('po','po.po_pono = po_item.poi_ref');
                                  $po_subcon = $this->db->get('po_item')->result();
                                  $po_s = $po_subcon[0]->po_amount;

                                  $this->db->select('SUM(total_disc) as wo_amount');
                                  $this->db->where('projectcode',$id_project);
                                  $this->db->where('lo_costcode',$value->costcode);
                                  $this->db->where('type_cost','3');
                                  $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                  $wo_subcon = $this->db->get('lo_detail')->result();
                                  $wo_s = $wo_subcon[0]->wo_amount;

                                  $this->db->select('SUM(pettycashi_unitprice) as pc_amount');
                                  $this->db->where('project',$id_project);
                                  $this->db->where('pettycashi_costcode',$value->costcode);
                                  $this->db->where('type_cost','3');
                                  $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                  $pc_subcon = $this->db->get('pettycash_item')->result();
                                  $pc_s = $pc_subcon[0]->pc_amount;

                                  $subcon = $pc_s+$wo_s+$po_s;
                                  ?>
                                  <span style="cursor:pointer" costcode="<?= $value->costcode ?>" class="subcon badge badge-flat border-pink text-pink-600 pull-center" data-toggle="modal" data-target="#subcon_model"><?= number_format($subcon,2) ?></span>
                                </td>
                                <td><?= $value->forecast ?></td>
                              </tr>
                          <?php
                              }
                          ?>



                         
                      
                        </tbody>
                      </table>

                </div></div>

                      
                    </div>
                  </div>
                </div>
              </div>
</div>

            </div>

    
        
        
            </form>


 <?php foreach ($costsummary as $bg){  ?>
         <div id="bgsell<?php echo $bg->boq_id; ?>" class="modal fade">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">PO &nbsp;<code>Total PU Cost(Use)</code></h5>
               </div>

      <div class="col-lg-12">
                    <div class="table-responsive">
<table class="tablew table-hover table-bordered table-striped table-xxs" >
                    <thead>
                      <tr>
                        <th class="text-center" width="2%">No.</th>
                        <th class="text-center" width="10%">PO_Ref</th>
                        <th class="text-center" width="10%">Material Code</th>
                        <th class="text-center" width="10%">Material</th>
                        <th class="text-center" width="10%">Cost Code</th>
                        <th class="text-center" width="10%">Cost Name</th>
                        <th class="text-center" width="10%">Qty</th>
                        <th class="text-center" width="10%">Unit</th>
                        <th class="text-center" width="10%">Total PU Cost(Use)</th>
                      </tr>
                    </thead>
                    <tbody id="body">
                          <?php
      $this->db->select('*');       
      $this->db->where('po_boq',$bg->boq_id);
      $bgsell = $this->db->get('po_item')->result();
      ?>
      <?php $n=1; foreach ($bgsell as $abg ) { ?>
   

                    <tr>
                    <td class="text-center"><?php echo $n; ?></td>
                    <td class="text-center"><?php echo $abg->poi_ref; ?></td>
                    <td class="text-center"><?php echo $abg->poi_matcode; ?></td>
                    <td class="text-center"><?php echo $abg->poi_matname; ?></td>
                    <td class="text-center"><?php echo $abg->poi_costcode; ?></td>
                    <td class="text-center"><?php echo $abg->poi_costname; ?></td>
                    <td class="text-center"><?php echo $abg->poi_qty; ?></td>
                    <td class="text-center"><?php echo $abg->poi_unit; ?></td>
                    <td class="text-center"><?php echo $abg->poi_amount; ?></td>
                    </tr>
                       <?php   } ?>
                    </tbody>
                    </table>
                    
                  </div>
       
         </div>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
             </div>
           </div>
         </div>
        <?php } ?>

<div id="pu_model" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">PU Cost</div>
            </div>
            <div class="modal-body">
                <div id="show_pu_cost"></div>
            </div>
        </div>

    </div>
</div>



<div id="material_model" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Material</div>
            </div>
            <div class="modal-body">
                <div id="show_material_model"></div>
            </div>
        </div>

    </div>
</div>

<div id="labor_model" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Labor</div>
            </div>
            <div class="modal-body">
                <div id="show_labor_model"></div>
            </div>
        </div>

    </div>
</div>

<div id="subcon_model" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Labor</div>
            </div>
            <div class="modal-body">
                <div id="show_subcon_model"></div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
  $('#tra').attr('class', 'active');
  $('#tra_sub4').attr('style', 'background-color:#dedbd8');
</script>
<script type="text/javascript">
  $('.control').click(function(event) {
    var cost_code = $(this).attr('cost_code');
    var bd = $(this).attr('bd');
    var control = $(this).val();
    if (control == 1 ) {
      $(this).val(0);
    }else{
      $(this).val(1);
    }
      $.get('<?php echo base_url(); ?>management/update_cost_type1/'+cost_code+'/'+control+'/'+bd, function(data) {
      }).done(function(data){
        console.log(data)
      });
    
  });

 $('.control_2').click(function(event) {
    var cost_code = $(this).attr('cost_code');
    var bd = $(this).attr('bd');
    var control = $(this).val();
    if (control == 1 ) {
      $(this).val(0);
    }else{
      $(this).val(1);
    }
      $.get('<?php echo base_url(); ?>management/update_cost_type2/'+cost_code+'/'+control+'/'+bd, function(data) {
      }).done(function(data){
        console.log(data)
      });
    
  });





  $('.controlper').keyup(function(event) {
    var cost_code = $(this).attr('cost_code');
    var controlper = $(this).val();
    var bd = $(this).attr('bd');
    $.get('<?php echo base_url(); ?>management/update_controlper_type1/'+cost_code+'/'+controlper+'/'+bd, function(data) {
      }).done(function(data){
        console.log(data)
      });
  });

  $('.controlper_2').keyup(function(event) {
    var cost_code = $(this).attr('cost_code');
    var controlper = $(this).val();
    var bd = $(this).attr('bd');
    $.get('<?php echo base_url(); ?>management/update_controlper_type2/'+cost_code+'/'+controlper+'/'+bd, function(data) {
      }).done(function(data){
        console.log(data)
      });
  });


  $('.show_pu').click(function(event) {
    $('#show_pu_cost').empty();
    var cost_bytae = $(this).attr('costcode');
    var project_id = '<?= $id_project ?>';
    var compcode = '<?= $compcode ?>';
    // alert(compcode)
    $( "#show_pu_cost" ).load("<?= base_url() ?>management/pu_cost/"+project_id+'/'+cost_bytae+'/'+compcode);

  });

  $('.material').click(function(event) {
  $('#show_material_model').empty();
  var cost_bytae = $(this).attr('costcode');
  var project_id = '<?= $id_project ?>';
  var compcode = '<?= $compcode ?>';
  //   // alert(compcode)
  $( "#show_material_model" ).load("<?= base_url() ?>management/material_cost/"+project_id+'/'+cost_bytae+'/'+compcode);

});

$('.labor').click(function(event) {
  $('#show_labor_model').empty();
  var cost_bytae = $(this).attr('costcode');
  var project_id = '<?= $id_project ?>';
  var compcode = '<?= $compcode ?>';
    // alert(compcode)
  $("#show_labor_model").load("<?= base_url() ?>management/labor_cost/"+project_id+'/'+cost_bytae+'/'+compcode);

});

$('.subcon').click(function(event) {
  $('#show_subcon_model').empty();
  var cost_bytae = $(this).attr('costcode');
  var project_id = '<?= $id_project ?>';
  var compcode = '<?= $compcode ?>';
    // alert(compcode)
  $("#show_subcon_model").load("<?= base_url() ?>management/subcon_cost/"+project_id+'/'+cost_bytae+'/'+compcode);

});

</script>