<table class="table table-xxs table-hover datatable-basicfff" >
<thead>
<tr>
<th>Materail Code</th>
<th>Materail Name</th>
<th>SPEC</th>
<th>Unit</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php
foreach ($allmaterial as $vali){ ?>
<tr>
<td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?><?php echo $vali->matcode; ?><?php echo  $vali->matspec_code;?></td>
<td><?php echo $vali->matgroup_name; ?> <?php echo $vali->matsubgroup_name;?> <?php echo $vali->matname;?> <?php echo $vali->matspec_name;?></td>
<td><?php echo $vali->matsubgroup_name; ?></td>
<td><?php echo $vali->matname; ?></td>
<td><button class="opennmat<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-munit="<?php echo $vali->matname;?>" data-mmatcode="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?><?php echo $vali->matcode; ?><?php echo  $vali->matspec_code;?>"  data-nmatgroupname="<?php echo $vali->matgroup_name; ?> <?php echo $vali->matsubgroup_name;?> <?php echo $vali->matname;?> <?php echo $vali->matspec_name;?>" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
$(".opennmat<?php echo $n;?>").click(function() {
  $("#newmatname<?php echo $idd; ?>").val($(this).data('nmatgroupname'));
  $("#newmatcode<?php echo $idd; ?>").val($(this).data('mmatcode'));

 $("#newmatname").val($(this).data('nmatgroupname'));
  $("#newmatcode").val($(this).data('mmatcode'));
  $("#unit").val($(this).data('munit'));

  $("#newmatcodej<?php echo $idd; ?>").val($(this).data('mmatcode'));
  $("#newmatnamej<?php echo $idd; ?>").val($(this).data('nmatgroupname'));
$("#unit<?php echo $idd; ?>").val($(this).data('munit'));
$("#qty<?php echo $idd; ?>").val("1");
});
</script>
<?php $n++; } ?>
</tbody>
</table>
</div>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $('.datatable-basicfff').DataTable();
</script>
