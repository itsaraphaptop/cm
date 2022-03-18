<style>
.table-condensed{
  font-size: 10.5px;
}
</style>

<?php $lo_lono=0; foreach ($prd as $u) {
$lo_lono = $u->lo_lono;
}?>
<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_type',1);
$this->db->where('ap_bill_contractno',$lo_lono);
$query=$this->db->get();

?>





        

<?php $i=1; foreach (array_slice($prd,0,1) as $u) {?>

<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_contractno',$lo_lono);
$this->db->where('ap_bill_type',1);
$this->db->join('vender','vender.vender_id = ap_billsuc_header.ap_bill_vender',"left");
$query= $this->db->get()->result();
?>
<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_contractno',$lo_lono);
$this->db->where('ap_bill_type',2);
$this->db->join('vender','vender.vender_id = ap_billsuc_header.ap_bill_vender',"left");
$query1=$this->db->get()->result();
?>
<?php $downn=0; foreach ($query1 as $keygen) { ?>

<?php $downn=$downn+$keygen->ap_pay; } ?>
<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_contractno',$lo_lono);
$this->db->where('ap_bill_type',3);
$this->db->join('vender','vender.vender_id = ap_billsuc_header.ap_bill_vender',"left");
$query2=$this->db->get()->result();
?>
<?php  $aaa=0; $ap_redownper=0; $amoutalltot=0; $vender=""; $ap_contractamount=0; $allcontract=0; $all=0; $ap_retentionamount=0; $whall=0; foreach ($query as $val) {
$ap_contractamount = $val->ap_contractamount;
$ap_progressamount = $val->ap_progressamount;
$vender = $val->vender_name;
$ap_retentionamount = $val->ap_retentionamount;
$ap_vat = $val->ap_vat;
$ap_redown = $val->ap_redown;
$ap_contractamountdown = ($ap_contractamount*$ap_redown)/100;
$all = ($ap_contractamount*$ap_vat)/100 + $val->ap_contractamount ;
$allcontract = $ap_contractamount*$ap_vat/100 ;
$whall = ($ap_contractamount-$ap_contractamountdown)*$val->ap_wtper/100;
$amoutalltot = $amoutalltot+$val->ap_pay;
?>
<?php } ?>



  <div>
    <h5 >ผู้รับจ้าง (<?php echo $lo_lono; ?>) : <?php echo $vender ;?> มูลค่างาน : <?php echo number_format($ap_contractamount) ;?> บาท ยอดคงเหลือ : <?php echo number_format($ap_contractamount-$amoutalltot)  ;?> บาท</h5>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-xxs table-condensed">
        <thead>
          <tr>
            <th>Type</th>
            <th >Period</th>
            <th >Bill No</th>
            <th >Date</th>
            <th >Due Date</th>
            <th >Amout<br><p style="color: red;">(<?php echo number_format($ap_contractamount) ;?>)</p></th>
            <th >%</th>
            <th >Down</th>
            <th >Vat<br><p style="color: red;">(<?php echo number_format($allcontract); ?>)</p></th>
            <th >Total Amount<br><p style="color: red;">(<?php echo number_format($all) ;?>)</p></th>
            <th >W/H<br><p style="color: red;">(<?php echo number_format($whall) ;?>)</th>
            <th >Retention<br><p style="color: red;">(<?php echo number_format($ap_retentionamount) ;?>)</p></th>
            <th>Net Amout</th>
            <th>Print</th>
            <th>Action</th>
                    <!-- <th >Less Other</th> -->
                    
          </tr>
        </thead>
                <?php $downpay=0; foreach ($query1 as $key1) { ?>
        <tbody id="tbody">
          <tr>
            <td><?php if($key1->ap_bill_type==2){echo "Down";}else if($key1->ap_bill_type==1){
            echo "Prograss";}else if($key1->ap_bill_type==3){ echo "Retention"; } ?></td>
            <td class="text-right"><?php echo $key1->ap_period ;?>.</td>
            <td class="text-right"><?php echo $key1->ap_bill_code; ?></td>
            <td class="text-right"><?php echo date('d/m/Y',strtotime($key1->ap_bill_date)) ;?></td>
            <td class="text-right"><?php echo date('d/m/Y',strtotime($key1->ap_bill_duedate)) ;?></td>
            <td class="text-right">0.00</td>
            <td class="text-right"></td>
            <td class="text-right"><?php echo number_format($key1->ap_pay); ?></td>
            <td class="text-right">0.00</td>
            <td class="text-right">0.00</td>
            <td class="text-right"><?php echo number_format($key1->ap_wtamount); ?></td>
            <td class="text-right"><?php echo number_format($key1->ap_deduct_retper); ?></td>
            <td class="text-right"><?php echo number_format($key1->ap_pay); ?></td>
            <td><a class="label label-primary" href="<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_down.mrt&bill=<?php echo $key1->ap_bill_code ;?>&ap_period=<?php echo $key1->ap_period ;?>&bill_type=<?php echo $key1->ap_bill_type; ?>" target="_blank"><i class="icon-printer4"></i> Print</a></td>
            <td class="text-center">
              <?php if(count($query1)==$key1->ap_period){ ?>
              <a href="<?php echo base_url(); ?>index.php/aps_active/delsub/<?php echo $key1->ap_bill_code; ?>"><i class="glyphicon glyphicon-trash"></i></a>
              <?php }  ?>
            </td>
          </tr>
          <?php $downpay=$downpay+$key1->ap_pay; } ?>
          <?php $n=1; $tot=0; $tper=0; $down=0; $am=0;  $vat=0; $wh=0; $ammm=0; $na=0; $bill=0; foreach ($query as $key) { ?>
          <tr>
            <td><?php if($key->ap_bill_type==2){echo "Down";}else if($key->ap_bill_type==1){
            echo "Prograss";}else if($key->ap_bill_type==3){ echo "Retention"; } ?></td>
            <td class="text-right"><?php echo $key->ap_period ;?>.</td>
            <td class="text-right"><?php echo $key->ap_bill_code; ?></td>
            <td class="text-right"><?php echo date('d/m/Y',strtotime($key->ap_bill_date)) ;?></td>
            <td class="text-right"><?php echo date('d/m/Y',strtotime($key->ap_bill_duedate)) ;?></td>
            <td class="text-right"><?php echo number_format($key->ap_pay); ?></td>
            <td class="text-right"><?php echo number_format($key->ap_payper); ?></td>
            <td class="text-right">- <?php echo number_format($key->ap_redownper); ?></td>
            <td class="text-right"><?php echo number_format($key->ap_vatper); ?></td>
            <td class="text-right"><?php echo number_format($key->ap_pay+$key->ap_vatper); ?></td>
            <td class="text-right">- <?php echo number_format($key->ap_wtamount); ?></td>
            <td class="text-right">- <?php echo number_format($key->ap_deduct_retper); ?></td>
            <td class="text-right"><?php echo number_format($key->ap_amount); ?></td>
            <td><a class="label label-primary" href="<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_progress.mrt&bill=<?php echo $key->ap_bill_code ;?>&ap_period=<?php echo $key->ap_period ;?>&bill_type=<?php echo $key->ap_bill_type; ?>&compcode=<?php echo $compcode;?>" target="_blank"><i class="icon-printer4"></i> Print</a></td>
            <td class="text-center">
              <?php if(count($query)==$key->ap_period){ ?>
              <a href="<?php echo base_url(); ?>index.php/aps_active/delsub/<?php echo $key->ap_bill_code; ?>"><i class="glyphicon glyphicon-trash"></i></a>
              <?php }  ?>
            </td>
            <!-- <td></td> -->
            
          </tr>
          <?php $n++;
          $tot=$tot+$key->ap_pay;
          $tper = $tper+$key->ap_payper;
          $down = $down+$key->ap_redownper;
          $am = $am+$key->ap_pay+$key->ap_vatper;
          $vat =$vat+$key->ap_vatper;
          $wh = $wh+$key->ap_wtamount;
          $ammm =$ammm+$key->ap_deduct_retper;
          $na=$na+$key->ap_amount;
          $bill=$bill+$key->ap_progress_billper;
          } ?>
        <?php $ap_retention_acc=0; $reappay=0; foreach ($query2 as $key) { ?>
        <tbody id="tbody">
          <tr>
            <td><?php if($key->ap_bill_type==2){echo "Down";}else if($key->ap_bill_type==1){
            echo "Prograss";}else if($key->ap_bill_type==3){ echo "Retention"; } ?></td>
            <td class="text-right"><?php echo $key->ap_period ;?> </td>
            <td class="text-right"><?php echo $key->ap_bill_code; ?></td>
            <td class="text-right"><?php echo date('d/m/Y',strtotime($key->ap_bill_date)) ;?></td>
            <td class="text-right"><?php echo date('d/m/Y',strtotime($key->ap_bill_duedate)) ;?></td>
            <td class="text-right">0.00</td>
            <td class="text-right"><?php echo $bill; ?></td>
            <td class="text-right"><?php echo number_format($key->ap_redownper); ?></td>
            <td class="text-right"><?php echo number_format($key->ap_vatper); ?></td>
            <td class="text-right">0.00</td>
            <td class="text-right">0.00</td>
            <td class="text-right"><?php echo number_format($key->ap_pay); ?></td>
            <td class="text-right"><?php echo number_format($key->ap_pay); ?></td>
            <td class="text-center">
                <?php if(count($query2)==$key->ap_period){ ?>
              <a href="<?php echo base_url(); ?>index.php/aps_active/delsub/<?php echo $key->ap_bill_code; ?>"><i class="glyphicon glyphicon-trash"></i></a>
              <?php }  ?>
            </td>
          </tr>
          <?php $ap_retention_acc=$ap_retention_acc+$key->ap_retention_acc; $reappay=$reappay+$key->ap_pay; } ?>
          <tr>
            <td class="text-right"></td>
            <td class="text-right">Total</td>
            <td class="text-right"></td>
            <td class="text-right"></td>
            <td class="text-right"></td>
            <td class="text-right"><?php echo number_format($tot); ?></td>
            <td class="text-right"><?php echo number_format($tper,2);?></td>
            <td class="text-right"><?php echo number_format($down); ?></td>
            <td class="text-right"><?php echo number_format($vat);?></td>
            <td class="text-right"><?php echo number_format($am);?></td>
            <td class="text-right"><?php echo number_format($wh);?></td>
            <td class="text-right"><?php echo number_format($ammm,2) ;?></td>
            <td class="text-right"><?php echo number_format($na+$down+$ammm); ?></td>
          </tr>
          <tr>
            <td class="text-right"></td>
            <td class="text-right">Balance</td>
            <td class="text-right"></td>
            <td class="text-right"></td>
            <td class="text-right"></td>
            <td class="text-right"><?php echo number_format($ap_contractamount-$tot); ?></td>
            <td class="text-right"><?php echo number_format($tper-100,2);?></td>
            <td class="text-right"><?php echo number_format($down-$downpay); ?></td>
            <td class="text-right"><?php echo number_format($vat-$allcontract);?></td>
            <td class="text-right"><?php echo number_format($all-$am);?></td>
            <td class="text-right"><?php echo number_format($whall-$wh);?></td>
            <td class="text-right"><?php echo number_format($ap_retentionamount-$reappay,2) ;?></td>
            <td class="text-right"><?php echo number_format((($na+$down)+$ammm)); ?></td>
          </tr>
                  
        </tbody>
      </table>
    </div>
  </div>
  <br>



      <div id="printlo" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Print วางบิลผู้รับเหมา</h5>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-striped table-xxs">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th >Period</th>
                    <th >Bill No</th>
                    <th >Date</th>
                    <th >Due Date</th>
                    <th>Pay</th>
                    <th >Print</th>
                    
                    
                  </tr>
                </thead>
                <?php $downpay=0; foreach ($query1 as $key1) { ?>
                <tbody id="tbody">
                  <tr>
                    <td><?php if($key1->ap_bill_type==2){echo "Down";}else if($key1->ap_bill_type==1){
                    echo "Prograss Payment";}else if($key1->ap_bill_type==3){ echo "Retention"; } ?></td>
                    <td><?php echo $key1->ap_period ;?></td>
                    <td><?php echo $key1->ap_bill_code; ?></td>
                    <td><?php echo $key1->ap_bill_date ;?></td>
                    <td><?php echo $key1->ap_bill_duedate ;?></td>
                    <td><?php echo number_format($key1->ap_pay) ;?></td>
                    <td  style="text-align: center;"><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_down.mrt&bill=<?php echo $key1->ap_bill_code ;?>&ap_period=<?php echo $key1->ap_period ;?>&bill_type=<?php echo $key1->ap_bill_type; ?>" target="_blank"><i class="icon-shredder"></i></a></td>
                    
                  </tr>
                  <?php $downpay=$downpay+$key1->ap_pay; } ?>
                  <?php $n=1; $tot=0; $tper=0; $down=0; $am=0;  $vat=0; $wh=0; $ammm=0; $na=0; $bill=0; foreach ($query as $key) { ?>
                  <tr>
                    <td><?php if($key->ap_bill_type==2){echo "Down";}else if($key->ap_bill_type==1){
                    echo "Prograss Payment";}else if($key->ap_bill_type==3){ echo "Retention"; } ?></td>
                    <td><?php echo $key->ap_period ;?></td>
                    <td><?php echo $key->ap_bill_code; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($key->ap_bill_date)) ;?></td>
                    <td><?php echo date('d/m/Y',strtotime($key->ap_bill_duedate)) ;?></td>
                    <td><?php echo number_format($key->ap_pay) ;?></td>
                    <td  style="text-align: center;"><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_progress.mrt&bill=<?php echo $key->ap_bill_code ;?>&ap_period=<?php echo $key->ap_period ;?>&bill_type=<?php echo $key->ap_bill_type; ?>" target="_blank"><i class="icon-shredder"></i></a></td>
                    
                  </tr>
                  <?php $n++;
                  $tot=$tot+$key->ap_pay;
                  $tper = $tper+$key->ap_payper;
                  $down = $down+$key->ap_redownper;
                  $am = $am+$key->ap_pay+$key->ap_vatper;
                  $vat =$vat+$key->ap_vatper;
                  $wh = $wh+$key->ap_wtamount;
                  $ammm =$ammm+$key->ap_deduct_retper;
                  $na=$na+$key->ap_amount;
                  $bill=$bill+$key->ap_progress_billper;
                  } ?>
                  <?php $ap_retention_acc=0; $reappay=0; foreach ($query2 as $key) { ?>
                  <tbody id="tbody">
                    <tr>
                      <td><?php if($key->ap_bill_type==2){echo "Down";}else if($key->ap_bill_type==1){
                      echo "Prograss Payment";}else if($key->ap_bill_type==3){ echo "Retention"; } ?></td>
                      <td><?php echo $key->ap_period ;?></td>
                      <td><?php echo $key->ap_bill_code; ?></td>
                      <td><?php echo date('d/m/Y',strtotime($key->ap_bill_date)) ;?></td>
                      <td><?php echo date('d/m/Y',strtotime($key->ap_bill_duedate)) ;?></td>
                      <td><?php echo number_format($key->ap_pay) ;?></td>
                      <td  style="text-align: center;"><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=bill_ret.mrt&bill=<?php echo $key->ap_bill_code ;?>&ap_period=<?php echo $key->ap_period ;?>&bill_type=<?php echo $key->ap_bill_type; ?>" target="_blank"><i class="icon-shredder"></i></a></td>
                    </tr>
                    <?php $ap_retention_acc=$ap_retention_acc+$key->ap_retention_acc; $reappay=$reappay+$key->ap_pay; } ?>
                    
                  </tbody>
                </table>
              </div>
              <br>
              <div class="modal-footer">
                <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
              </div>
            </div>
          </div>
        </div> <?php $i++; } ?>