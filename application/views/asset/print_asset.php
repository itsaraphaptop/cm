 
<?php foreach ($res as $key){
$assetcode = $key->fa_assetcode;	
$fa_status = $key->fa_status;
	} ?>

<?php 

   $base_url = $this->config->item("url_report");
?>
  <?php if($fa_status==1){
    echo '<a href="'.$base_url.'stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=print_ass.mrt&ass='.$assetcode.'" class="btn bg-indigo-300">Print Form</a>';
  }else if($fa_status==2){

  }else if($fa_status==3){
     echo '<a href="'.$base_url.'stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=print_asswriteoff.mrt&ass='.$assetcode.'" class="btn bg-indigo-300">Print Form Write Off</a>';
  }
?>

<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#depreciation">View Depreciation</button>
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#expense">View Expense</button>
<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#trasfer">View Trasfer</button>



<?php 
$this->db->select('*');
$this->db->from('depreciation_item');
$this->db->where('de_ass',$assetcode);
$this->db->join('depreciation','depreciation.de_code = depreciation_item.de_code');
$query=$this->db->get()->result();
?>

<div class="modal fade" id="depreciation" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Depreciation</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="col-sm-12">
  <table class="table table-hover table-bordered table-striped table-xxs" >
                    <thead>
                      <tr>

                               <th style="text-align: center;">No.</th>
                               <th style="text-align: center;">Asset Code</th>   
                               <th style="text-align: center;">Asset Name</th>
                               <th style="text-align: center;">Year</th>
                               <th style="text-align: center;">Month</th>
                               <th style="text-align: center;">Beg. Date</th>
                               <th style="text-align: center;">End Date</th>
                               <th style="text-align: center;">Total Day</th>
                               <th style="text-align: center;">Dep. Amount</th>
                               <th style="text-align: center;">Project No.</th>
                               <th style="text-align: center;">Job.</th>
                               
                      </tr>
                    </thead>
                    <tbody>
                    <?php $n=1; $totall=0; foreach ($query as $key){ 
                    	$totall = $totall+$key->de_periond;
                    	?>
                      <tr>
                      <td style="text-align: center;"><?php echo $n; ?></td>
                      <td style="text-align: center;"><?php echo $key->de_ass;?></td>
                      <td style="text-align: center;"><?php echo $key->de_assname;?></td>
                      <td style="text-align: center;"><?php echo $key->de_yearr;?></td>
                      <td style="text-align: center;"><?php echo $key->de_month;?></td>
                      <td style="text-align: center;"><?php echo $key->de_fr;?></td>
                      <td style="text-align: center;"><?php echo $key->de_to;?></td>
                      <td style="text-align: center;"><?php echo $key->de_day;?></td>
                      <td style="text-align: center;"><?php echo $key->de_periond;?></td>
                      <td style="text-align: center;"><?php echo $key->de_pjname;?></td>
                      <td style="text-align: center;"><?php echo $key->de_job;?></td>
                      </tr>
                      <?php  $n++;	} ?>
                    </tbody>
<tr>
<td colspan="8"></td>
<td style="text-align: center;"><?php echo $totall;?></td>
<td colspan="2"></td>
</tr>
                   </table>
<br><br>
                   <div class="modal-footer">
					<button type="button" class="btn bg-primary" data-dismiss="modal">Close</button>
					
								</div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="expense" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Expense</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="col-sm-12">
             <div class="table-responsive">
               <table class="table table-bordered table-striped table-xxs" id="res">
                    <thead>
                      <tr>
                      
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Cost Code</th>   
                               <th style="text-align: center;">Maintenance Name</th>
                               <th style="text-align: center;">Doc Date</th>
                               <th style="text-align: center;">Module</th>
                               <th style="text-align: center;">Project Name / Dpt Name</th>
                               <th style="text-align: center;">Doc No</th>
                               <th style="text-align: center;">Next Date</th>
                               <th style="text-align: center;">Qty</th>
                               <th style="text-align: center;">Cerent Mile</th>
                               <th style="text-align: center;">Amount</th>
                               <th style="text-align: center;">Item Name(IC)</th>
                               <th style="text-align: center;">Remark</th>
                        
                             
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
$this->db->select('*');
$this->db->from('pettycash_item');
$this->db->where('petty_assetid',$assetcode);
$this->db->join('pettycash', 'pettycash.docno = pettycash_item.pettycashi_ref');
$query=$this->db->get()->result();
?>

 <?php $n=1; $allpc=0; foreach ($query as $e) {  $allpc=$allpc+$e->pettycashi_amounttot;?>

<?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$e->project);
$project=$this->db->get()->result();
foreach ($project as $key) {
$project_name = $key->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$e->department);
$dpt=$this->db->get()->result();
foreach ($dpt as $key1) {
$department_title = $key1->department_title;
}
?>
 <tr>
<td style="text-align: center;"><?php echo $n; ?></td>
<td style="text-align: center;"><?php echo $e->pettycashi_costcode;?><br><?php echo $e->pettycashi_costname;?></td>
<td style="text-align: center;"><?php echo $e->pettycashi_expenscode;?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $e->docdate;?></div></td>
<td style="text-align: center;">PC</td>
<td style="text-align: center;"><div style="width: 100px;"><?php if($e->project==""){
echo $department_title;	
}else{
echo $project_name;
	}
?>
</div></td>
<td style="text-align: center;"><?php echo $e->docno ;?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $e->pettycashi_amounttot ;?></td>
<td style="text-align: center;"><?php echo $e->pettycashi_expens ;?></td>
<td style="text-align: center;"><?php echo $e->remark ;?></td>

</tr>
 <?php $n++;  } ?>


<?php 
$this->db->select('*');
$this->db->from('po_item');
$this->db->where('po_assetid',$assetcode);
$this->db->join('po', 'po.po_pono = po_item.poi_ref');
$q=$this->db->get()->result();

?>
 <?php $n1=$n; $allpo=0; foreach ($q as $a) { $allpo=$allpo+$a->poi_netamt; ?>

 <?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$a->po_project);
$project1=$this->db->get()->result();
foreach ($project1 as $key111) {
$project_name1 = $key111->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$a->po_department);
$dpt1=$this->db->get()->result();
foreach ($dpt1 as $key11) {
$department_title1 = $key11->department_title;
}
?>
<tr>
	<td style="text-align: center;"><?php echo $n1; ?></td>
<td style="text-align: center;"><?php echo $a->poi_costcode; ?><br><?php echo $a->poi_costname; ?></td> 
<td style="text-align: center;"><?php echo $a->poi_matcode; ?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $a->po_podate; ?></div></td>
<td style="text-align: center;">PO</td>
<td style="text-align: center;">
<?php if($a->po_project==""){
echo $department_title1;	
}else{
echo $project_name1;
	}
?>
</td>
<td style="text-align: center;"><?php echo $a->poi_ref; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo number_format($a->poi_qty); ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $a->poi_netamt; ?></td>
<td style="text-align: center;"><?php echo $a->poi_matname; ?></td>
<td style="text-align: center;"><?php echo $a->poi_remark; ?></td>
</tr>

 <?php  $n1++; } ?>


<?php 
$this->db->select('*');
$this->db->from('pr_item');
$this->db->where('pr_assetid',$assetcode);
$this->db->join('pr', 'pr.pr_prno = pr_item.pri_ref');
$ee=$this->db->get()->result();
?>
 <?php $n2=$n1;  foreach ($ee as $aa) { ?>


 <?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$aa->pr_project);
$project11=$this->db->get()->result();
foreach ($project11 as $key1111) {
$project_name11111111 = $key1111->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$aa->pr_department);
$dpt11=$this->db->get()->result();
foreach ($dpt11 as $ke11) {
$department_title1111111 = $ke11->department_title;
}
?>
 <tr>
<td style="text-align: center;"><?php echo $n2; ?></td>
<td style="text-align: center;"><?php echo $aa->pri_costcode; ?><br><?php echo $aa->pri_costname; ?></td> 
<td style="text-align: center;"><?php echo $aa->pri_matcode; ?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $aa->pr_prdate; ?></div></td>
<td style="text-align: center;">PR</td>
<td style="text-align: center;">
<?php if($aa->pr_project==""){
echo $department_title1111111;	
}else{
echo $project_name11111111;
	}
?>
	
</td>
<td style="text-align: center;"><?php echo $aa->pri_ref; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo number_format($aa->pri_qty); ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $aa->pri_matname; ?></td>
<td style="text-align: center;"><?php echo $aa->pri_remark; ?></td>

</tr>
 <?php $n2++;  } ?>

 <?php 
$this->db->select('*');
$this->db->from('lo_detail');
$this->db->where('lo_assetid',$assetcode);
$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
$ww=$this->db->get()->result();
?>
 <?php $n3=$n2; $allwo=0; foreach ($ww as $w) { $allwo=$allwo+$w->lo_priceunit;
 	?>
 <tr>
	<td style="text-align: center;"><?php echo $n3; ?></td>
<td style="text-align: center;"><?php echo $w->lo_costcode; ?><br><?php echo $w->lo_costname; ?></td> 
<td style="text-align: center;"><?php echo $w->lo_matcode; ?></td>
<td style="text-align: center;"><div style="width: 100px;"><?php echo $w->lodate; ?></div></td>
<td style="text-align: center;">WO</td>
<td style="text-align: center;"><?php echo $w->projownername; ?></td>
<td style="text-align: center;"><?php echo $w->lo_ref; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo number_format($w->lo_qty); ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $w->lo_priceunit; ?></td>
<td style="text-align: center;"><?php echo $w->lo_matname; ?></td>
<td style="text-align: center;"></td>
</tr>
 <?php $n3++; } ?>

 <?php 
$this->db->select('*');
$this->db->from('ic_issue_d');
$this->db->where('ic_assetid',$assetcode);
$this->db->join('ic_issue_h', 'ic_issue_h.is_doccode = ic_issue_d.isi_doccode');
$ic=$this->db->get()->result();
?>
 <?php $n4=$n3; foreach ($ic as $c) { ?>

  <?php 
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id',$c->is_project);
$pjic=$this->db->get()->result();
foreach ($pjic as $icpj) {
$icpjjj = $icpj->project_name;
}
?>

<?php 
$this->db->select('*');
$this->db->from('department');
$this->db->where('department_id',$c->is_department);
$icc=$this->db->get()->result();
foreach ($icc as $dpticc) {
$icdpt = $dpticc->department_title;
}
?>

 <tr>
<td style="text-align: center;"><?php echo $n4; ?></td>
<td style="text-align: center;"><?php echo $c->isi_costcode; ?><br><?php echo $c->isi_costname; ?></td> 
<td style="text-align: center;"><?php echo $c->isi_matcode; ?></td>
<td style="text-align: center; "><div style="width: 100px;"><?php echo $c->is_bookdate; ?></div></td>
<td style="text-align: center;">IC</td>
<td style="text-align: center;">	
	<?php if($c->is_project==""){
echo $icdpt;	
}else{
echo $icpjjj;
	}
?>
</td>
<td style="text-align: center;"><?php echo $c->isi_doccode; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $c->isi_xqty; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $c->isi_matname; ?></td>
<td style="text-align: center;"><?php echo $c->isi_remark; ?></td>

</tr>

 <?php  $n4++;  } ?>

 <?php 
$this->db->select('*');
$this->db->from('fa_maintenanceasset');
$this->db->where('asfa_asscode',$assetcode);
$famtn=$this->db->get()->result();
?>
 <?php $n5=$n4; $allfa=0; foreach ($famtn as $th) { 
 	$allfa=$allfa+$th->asfa_netam;

 	?>
<tr>
<td style="text-align: center;"><?php echo $n5; ?></td>
<td style="text-align: center;"><div style="width: 200px;"><?php echo $th->asfa_cost; ?><br><?php echo $th->asfa_name; ?></div></td> 
<td style="text-align: center;">-</td>
<td style="text-align: center; "><div style="width: 100px;"><?php echo $th->asfa_docdate; ?></div></td>
<td style="text-align: center;">FA</td>
<td style="text-align: center;"><?php echo $th->fa_projectname; ?><?php echo $th->fa_departmentname; ?></td>
<td style="text-align: center;"><?php echo $th->asfa_old; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $th->asfa_qty; ?></td>
<td style="text-align: center;"><?php echo $th->asfa_milk; ?></td>
<td style="text-align: center;"><?php echo $th->asfa_netam; ?></td>
<td style="text-align: center;">-</td>
<td style="text-align: center;"><?php echo $th->asfa_des1; ?><br><?php echo $th->asfa_des2; ?><br><?php echo $th->asfa_des3; ?><br><?php echo $th->asfa_des4; ?><br><?php echo $th->asfa_des5; ?></td>

</tr>
  <?php  $n5++;  } ?>

  <tr>
<td colspan="10" style="text-align: center;">รวม</td>
<td style="text-align: center;"><?php echo number_format($allfa+$allwo+$allpo+$allpc,4); ?></td>
<td colspan="3"></td>
</tr>
                    </tbody>

                  </table>
                  </div>
                    <br><br>
             </div>
           
            <div class="modal-footer">
			
			<button type="button" class="btn bg-primary" data-dismiss="modal">Close</button>
					
								</div>
            
            </div>
        </div>
    </div>
  </div>
</div>

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
  // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
?>
<?php 
$this->db->select('*');
$this->db->from('transfer_item');
$this->db->where('transfer_assetcode',$assetcode);
$this->db->join('transfer','transfer.transfer_code = transfer_item.transfer_code');     
$trasfer=$this->db->get()->result();
?>
<div class="modal fade" id="trasfer" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">View Trasfer</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="col-sm-12">
  <table class="table table-hover table-bordered table-striped table-xxs" >
                    <thead>
                      <tr>

                   
                               <th style="text-align: center;">No</th>
                               <th style="text-align: center;">Asset Code</th>   
                               <th style="text-align: center;">Asset Name</th>
                               <th style="text-align: center;">Serial No.</th>
                               <th style="text-align: center;">From Project</th>
                               <th style="text-align: center;">From Job</th>
                               <th style="text-align: center;">From Dpt. Code</th>
                               <th style="text-align: center;">User by</th>
                               <th style="text-align: center;">User Name</th>
                               <th style="text-align: center;">% Availablity</th>
                               <th style="text-align: center;">Trasfer to</th>
                               <th style="text-align: center;">Trasfer Date</th>
                               <th style="text-align: center;">Emp. Code To.</th>
                               <th style="text-align: center;">Employee Name</th>
                               <th style="text-align: center;">remark</th>

                               
                      </tr>
                    </thead>
                    <tbody>
                    <?php $n=1;foreach ($trasfer as $tras) { ?>
                    <tr>
                    <td><?php echo $n; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_assetcode; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_assetname; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_sr; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_projectname; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_job; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_departmentname; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_liseid; ?></td> 
<td style="text-align: center;"><?php echo $tras->transfer_lisename; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_availablity; ?></td>
<td style="text-align: center;"><?php echo $tras->proto; ?><?php echo $tras->departto; ?></td>  
<td style="text-align: center;"><?php echo DateThai($tras->transfer_assdate); ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_id; ?></td>  
<td style="text-align: center;"><?php echo $tras->transfer_name; ?></td>   
<td style="text-align: center;"><?php echo $tras->transfer_remark; ?></td>   
                    </tr>
                    <?php $n++; } ?>
                    </tbody>
                    </table>
                    </div>

            </div>
             <div class="modal-footer">
             <hr>
			<button type="button" class="btn bg-primary" data-dismiss="modal">Close</button>
					
								</div>
            </div>
        </div>
    </div>
  </div>
</div>


