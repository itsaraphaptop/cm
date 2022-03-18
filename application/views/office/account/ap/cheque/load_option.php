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
    <?php $n=1; foreach ($loadoption as $e) {?>
    <tr>
      <td class="text-center"><?php echo $e->apo_no; ?></td>
      <td class="text-center"><a type="button"  class="se<?php echo $n;?> label bg-teal" name="button" data-dismiss="modal">Select</a></td>
    </tr>
  </tbody>
</table>