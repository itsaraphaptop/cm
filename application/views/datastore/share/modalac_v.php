<table class="table table-striped table-xxs datatable-basicunit" >
<thead>
<tr>
<th>act_code</th>
<th>act_name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php foreach ($getac as $valj){ ?>
<tr>
<td><?php echo $valj->act_code;?></td>
<td><?php echo $valj->act_name; ?></td>
<td><button class="openunt<?php echo $m;?> btn btn-xs btn-block btn-primary" data-toggle="modal"  data-vunit<?php echo $m;?>="<?php echo $valj->act_code;?>" data-dismiss="modal">SELECT</button></td>
</tr>

<script>
    $(".openunt<?php echo $m;?>").click(function(){
      $("#actext<?php echo $m;?>").val($(this).data('vunit<?php echo $m;?>'));
      $("#eactext<?php echo $m;?>").val($(this).data('vunit<?php echo $m;?>'));
      $("#account").val($(this).data('vunit<?php echo $m;?>'));
    });
  </script>

<?php } ?>
</tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $('.datatable-basicunit').DataTable();
</script>
