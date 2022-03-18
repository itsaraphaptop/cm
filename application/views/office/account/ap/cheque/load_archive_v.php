

<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th class="text-center">Payment No.</th>
      <th class="text-center">PO/WO No.</th>
      <th class="text-center">Due Date</th>
      <th class="text-center">Remark :</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $n=1;  foreach ($archive as $e) {?>
        <tr>
          <td class="text-center"><?php echo $e->runno; ?></td>
          <td class="text-center"><?php echo $e->plno; ?></td>
          <td class="text-center"><?php echo $e->chqdate; ?></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
      <td class="text-center"><a type="button"  class="xx<?php echo $n;?> label bg-teal" name="button" data-dismiss="modal">Select</a></td>
    </tr>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script>
   $(".xx<?php echo $n;?>").click(function(){
      $("#apo_code").val("<?php echo $e->runno; ?>");
      $("#refno").val("<?php echo $e->refno; ?>");
      $("#vender").val("<?php echo $e->acct_no; ?>");
      $("#rdfdate").val("<?php echo $e->rdfdate; ?>");
      $("#vender_name").val("<?php echo $e->vender_name; ?>");
      $("#apo_bankcode").val("<?php echo $e->bank_name; ?>");
      $("#bank_id").val("<?php echo $e->bank_id; ?>");
      $("#apo_branchcode").val("<?php echo $e->branch_name; ?>");
      $("#branch_id").val("<?php echo $e->branch_id; ?>");
      $("#apo_bankaccount").val("<?php echo $e->account_code; ?>");
      $("#namechq").val("<?php echo $e->namechq; ?>");
      $("#payactive").val("<?php echo $e->payactive; ?>");
      $("#chqno").val("<?php echo $e->chqno; ?>");
      $("#chqdate").val("<?php echo $e->chqdate; ?>");
      $("#vchdate").val("<?php echo $e->vchdate; ?>");
      $("#optt").val("");
      $("#table").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#table").load('<?php echo base_url(); ?>ap_active/load_archivetable/'+"<?php echo $e->acct_no; ?>");

    });
  </script>


    <?php $n++; } ?>
  </tbody>
</table>
