<?php foreach ($prd as $u) {
$aaaaaaaaaaa = $u->lo_lono;
}?>
<?php
$this->db->select('*');
$this->db->from('ap_billsuc_header');
$this->db->where('ap_bill_type',1);
$this->db->where('ap_bill_contractno',$aaaaaaaaaaa);
$query=$this->db->get();
$query1 = $query->num_rows();
?>


<div id="table">
  <div class="col-md-12">
    <div class="row">
      <br><br><br>
      <!-- <a href="../report/contract_report_aps/'.$aaaaaaaaaaa.'" class="preload btn btn-danger btn-sm" name="button"><i class="icon-shredder"></i> Print</a>     -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-xxs">
          <thead>
            <tr>
              <th>#</th>
              <th>Cost Code</th>
              <th>Cost Name</th>
              <th>Material Code</th>
              <th>Material Name</th>
              <th>Remark 1</th>
              <th>Asset Code</th>
              <th>Qty</th>
              <th>Unit</th>
              <th>Price</th>
              <th>Amount</th>
              <th>Balance</th>
              <th>This Qty</th>
              <th>This Amout</th>
              <th>Previous Qty</th>
              <th>Previous Amount</th>
              <th>Remark 2</th>
              <th>Remark 3 </th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php $i=1; $tot=0; $a=0; foreach ($prd as $u) {?>
            <?php
            $this->db->select('*');
            $this->db->from('ap_billsuc_header');
            $this->db->where('ap_bill_type',1);
            $this->db->where('ap_bill_contractno',$u->lo_lono);
            $query=$this->db->get();
            $query1 = $query->num_rows();
            ?>
            
            <tr id="amount_tr<?php echo $i; ?>">
              
              <th><?php echo $i; ?><input type="hidden" name="chki[]" id="chki<?php echo $i; ?>" value=""></th>
              <th><input type="text" name="api_costcode[]" id="api_costcode<?php echo $i; ?>"  value="<?php echo $u->lo_costcode; ?>"  class="form-control btn-xs" style="width: 200px;" readonly="true"></th>
              <th><input type="text" name="api_costname[]" id="api_costname<?php echo $i; ?>" value="<?php echo $u->lo_costname; ?>" class="form-control btn-xs" style="width: 200px;" readonly="true"></th>
              <th><input type="text" name="api_matcode[]" id="api_matcode<?php echo $i; ?>" readonly="true" value="<?php echo $u->lo_matcode; ?>" class="form-control btn-xs" style="width: 200px;"></th>
              <th><input type="text" readonly="true" name="api_matname[]" id="api_matname<?php echo $i; ?>"  value="<?php echo $u->lo_matname; ?>" class="form-control btn-xs" style="width: 200px;"></th>
              
              <th><input type="text" id="api_remark<?php echo $i; ?>" name="api_remark[]" value="<?php echo $u->other; ?>" class="form-control btn-xs" style="width: 200px;"></th>
              <th><input type="text" id="api_assetcode<?php echo $i; ?>" name="api_assetcode[]" value="" class="form-control btn-xs" style="width: 200px;"></th>
              <th><input type="text" name="api_qty[]" id="api_qty<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_qty ;?>" style="width: 100px;"></th>
              
              <th><div class="input-group"><input  readonly="true" type="text" name="api_unit[]" id="api_unit<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_unit; ?>" style="width: 100px;"></div></th>
              
              
              <th><input type="text" name="api_price[]" id="api_price<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->lo_priceunit; ?>" style="width: 100px;" readonly="true"></th>
              <th><input type="text" name="api_amount[]" id="api_amount<?php echo $i; ?>" value="<?php echo $u->total_nat_amount; ?>" class="form-control btn-xs" style="width: 100px;"></th>
              <th><input type="text" name="api_balance[]" id="api_balance<?php echo $i; ?>" value="<?php echo $u->ap_billsucamout ;?>" class="form-control btn-xs" style="width: 200px;" readonly="true">
              <input type="hidden" name="lo_idd[]" id="lo_idd<?php echo $i; ?>" value="<?php echo $u->lo_idd ;?>" class="form-control btn-xs" style="width: 100px;" readonly="true">
            </th>
            <th><div class="input-group"><input type="text" name="api_thisqty[]" id="api_thisqty<?php echo $i; ?>"  value="0" class="form-control btn-xs per" style="width: 100px;" readonly="true"><span class="input-group-addon bg-primary">%</span></div></th>
            <th><input type="text" name="api_thisamount[]" id="api_thisamount<?php echo $i; ?>" value="0" class="form-control btn-xs amt" style="width: 200px;">
          </th>
          <th><input type="text" name="api_previousqty[]" id="api_previousqty<?php echo $i; ?>" value="<?php echo $u->previousqty; ?>" class="form-control btn-xs" style="width: 100px;" ></th>
          <th><input type="text" name="api_previousamount[]" id="api_previousamount<?php echo $i; ?>" value="<?php echo $u->previousamount; ?>" class="form-control btn-xs" style="width: 100px;"></th>
          <th><input type="text" name="api_remark2[]" id="api_remark2<?php echo $i; ?>" value="<?php echo $u->other_2; ?>" class="form-control btn-xs" style="width: 200px;" ></th>
          <th><input type="text" name="api_remark3[]" id="api_remark3<?php echo $i; ?>" value="<?php echo $u->other_3; ?>" class="form-control btn-xs" style="width: 200px;" ></th>
          
          
        </tr>
        <script>
        $("#ap_bill_code").val("<?php echo $u->lo_idd; ?>-<?php echo date("dmY"); ?>");
        </script>
        <script>
        $("#numlodetail").val("<?php echo $i ?>");
        
        $('#api_thisamount<?php echo $i ?>').keyup(function(event) {
        var numlodetail = $("#numlodetail").val();
        
        for(i=0; i<=numlodetail; i++){
          var api_thisamount = $("#api_thisamount"+i+"").val();
          var api_amount = $("#api_amount"+i+"").val();
          var tot = parseFloat($("#ap_contractamount").val());
          var vat = parseFloat($("#ap_vat").val());
          var totvat = parseFloat($("#ap_pay").val()*vat)/100;
          var ba = (api_amount-api_thisamount)*1;
          var aaaaa = (api_thisamount/api_amount)*100;
          
          var aaaaaxxxx = aaaaa.toFixed(2);
          $("#api_thisqty"+i+"").val(aaaaaxxxx);
          $("#api_balance"+i+"").val(ba);
          var sumcer = 0; var amt = 0; var ss=0; var balance=0; var dddz=0;

          $('.amt').each(function() {
          // if (!isNaN(this.value) && this.value.length != 0) {
              sumcer += parseFloat($(this).val()*1);
              dddz += parseFloat($(this).val()*100)/tot;
              // }   
             
             console.log(dddz);
            });
            $("#api_thisper").val(dddz.toFixed(2));
            $("#ap_payper").val(dddz.toFixed(2));
            $("#ap_vatper").val(totvat.toFixed(2));

            $("#api_thisamounttotal").val(sumcer);
            $("#ap_pay").val(sumcer);
          }
        
        });
        if($("#ap_contractamount").val() == $("#ap_progressamount").val()){
        $("#ap_bill_inv").prop('disabled', true);
        $("#ap_bill_date").prop('disabled', true);
        $("#ap_bill_duedate").prop('disabled', true);
        $("#ap_bill_invdate").prop('disabled', true);
        $("#ap_bill_crterm").prop('disabled', true);
        $("#ap_pay").prop('disabled', true);
        $("#ap_payper").prop('disabled', true);
        $("#ap_redown").prop('disabled', true);
        $("#ap_redownper").prop('disabled', true);
        $("#ap_vat").prop('disabled', true);
        $("#ap_vatper").prop('disabled', true);
        $("#ap_deduct_ret").prop('disabled', true);
        $("#ap_deduct_retper").prop('disabled', true);
        $("#ap_wt").prop('disabled', true);
        $("#ap_wtper").prop('disabled', true);
        $("#ap_wtamount").prop('disabled', true);
        $("#ap_amount").prop('disabled', true);
        $("#ap_remark").prop('disabled', true);
        $("#ap_paydate").prop('disabled', true);
        }
        </script>
        <?php $i++; $ii=$i;  $tot=$tot+$u->total_nat_amount;
        $a=$a+$u->previousamount;
        } ?>
        
        
        <tr>
          <th class="text-center btn-xs" colspan="10">Total. </th>
          <th class="text-center"><input type="text" name="" id="tot" class="form-control btn-xs" value="<?php echo number_format($tot); ?>" style="width: 100px;" readonly="true"></th>
          <!-- <th class="text-center btn-xs" colspan="1"></th> -->
          <th class="text-center"><input type="text" name="api_balance" id="api_balance" class="form-control btn-xs" value="" style="width: 200px;" readonly="true"></th>
          <th class="text-center"><input type="text" name="api_thisper" id="api_thisper" class="form-control btn-xs" value="" style="width: 200px;" readonly="true"></th>
          <th class="text-center"><input type="text" name="api_thisamounttotal" id="api_thisamounttotal" class="form-control btn-xs" value="" style="width: 200px;" readonly="true"></th>
          <th class="text-center btn-xs" colspan="1"></th>
          <th class="text-center"><input type="text" name="" id="ttt" class="form-control btn-xs" value="<?php echo $a; ?>" style="width: 100px;" readonly="true"></th>
          <th class="text-center btn-xs" colspan="2"></th>
          
          
          
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php $i=1; foreach ($prd as $u) {?>
<div id="opnewmat<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-full">
<div class="modal-content ">
  <div class="modal-header bg-info">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h5 class="modal-title">เพิ่มรายการ</h5>
  </div>
  <div class="modal-body">
    <div class="row" id="modal_mat<?php echo $i; ?>"></div>
  </div>
</div>
</div>
</div>
<!-- material -->
<div class="modal fade" id="openunit<?php echo $i; ?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
  </div>
  <div class="panel-body">
    <div id="modal_unit<?php echo $i; ?>">
    </div>
  </div>
</div>
</div>
</div>

<script>
$(".openun<?php echo $i; ?>").click(function(){
$("#modal_mat<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$("#modal_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $i; ?>');
});
$("#modalunit<?php echo $i; ?>").click(function(){
$('#modal_unit<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$("#modal_unit<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/unit/<?php echo $i; ?>');
});
</script>


     <?php $i++; } ?>