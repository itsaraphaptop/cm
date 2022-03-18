<table class="table table-xxs">
  <thead>
    <tr>
      <th>#</th>
      <th>Invoice No</th>
      <th>Project</th>
      <th>Invoice Date</th>
      <th>Period</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php $n=1; foreach ($per as $key) {   
  ?>
    <tr>
      <td><?php echo $n; ?></td>
      <td><?php echo $key->inv_no; ?></td>
      <td><?php echo $key->project_name; ?></td>
      <td><?php echo $key->inv_date; ?></td>
      <td><?php echo $key->inv_period; ?></td>
      <td><?php echo $key->inv_credit; ?></td>
      <td>
      <button class="load_inv<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid<?php echo $n;?>="<?php echo $key->project_code;?>" data-projname<?php echo $n;?>="<?php echo $key->project_name;?>" data-peri<?php echo $n;?>="<?php echo $key->inv_period;?>" data-dismiss="modal">เลือก</button></td>
      <script>
      $('.load_inv<?php echo $n; ?>').click(function(){
        $("#projectid").val($(this).data('projid<?php echo $n;?>'));
        $("#projectname").val($(this).data('projname<?php echo $n;?>'));
        $("#period").val($(this).data('peri<?php echo $n;?>'));
        $("#crterm").val($(this).data('peri<?php echo $n;?>'));
        $('#refname').val('<?php echo $key->ref_cer; ?>');
        $('#invono').val('<?php echo $key->inv_no; ?>');
        $('#remark').val('<?php echo $key->inv_remark; ?>');
        $("#invprogress").load('<?php echo base_url(); ?>index.php/ar/ret_edit_invprogress/'+"<?php echo $key->inv_no;?>/"+"<?php echo $key->inv_period;?>");

      });
      </script>
      <?php $n++; } ?>
    </tr>
  </tbody>
</table>
