<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th class="text-center">Voucher No.</th>
      <th class="text-center">Voucher Date.</th>
      <th class="text-center">Referent No.</th>
      <th class="text-center">Remark :</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $n=1;  foreach ($loadoption as $e) {?>
        <tr>
          <td class="text-center"><?php echo $e->apo_vender; ?></td>
          <td class="text-center"><?php echo $e->apo_date; ?></td>
          <td class="text-center"><?php echo $e->apo_no; ?></td>
          <td class="text-center"><?php echo $e->apo_remark; ?></td>
          <td class="text-center"><?php echo $e->apo_no; ?></td>
      <td class="text-center"><a type="button"  class="se<?php echo $n;?> label bg-teal" name="button" data-dismiss="modal">Select</a></td>
    </tr>

<script>
   $(".se<?php echo $n;?>").click(function(){
      $("#apo_code").val("<?php echo $e->apo_code; ?>");
      $("#vender").val("<?php echo $e->apo_vender; ?>");
      $("#acct_no").val("<?php echo $e->vender_code; ?>");
      $("#vender_name").val("<?php echo $e->vender_name; ?>");
      $("#apo_bankcode").val("<?php echo $e->bank_name; ?>");
      $("#bank_id").val("<?php echo $e->bank_id; ?>");
      $("#apo_branchcode").val("<?php echo $e->branch_name; ?>");
      $("#branch_id").val("<?php echo $e->branch_id; ?>");
      $("#apo_bankaccount").val("<?php echo $e->apo_bankaccount; ?>");
      $("#apo_remark").val("<?php echo $e->apo_remark; ?>");
      $("#namechq").val("<?php echo ''; ?>");
      $("#chqno").val("<?php echo ''; ?>");
      
      $("#optt").val("Y");
      $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#table").load('<?php echo base_url(); ?>ap_active/load_optiontable/'+"<?php echo $e->apo_vender; ?>");
    });
  </script>


    <?php $n++; } ?>
  </tbody>
</table>

<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

