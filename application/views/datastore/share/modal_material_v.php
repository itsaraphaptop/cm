<table class="table table-xxs table-hover datatable-basicfff" >
<thead>
<tr>
<th>Material Code</th>
<th>Material Name</th>
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
<td><?php echo $vali->matgroup_name; ?> <?php echo $vali->matsubgroup_name;?> <?php echo $vali->matname;?> </td>
<td><?php echo $vali->matsubgroup_name; ?></td>
<td><?php echo $vali->matname; ?></td>
<td><button class="opennmat<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-mmatcode="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?><?php echo $vali->matcode; ?><?php echo  $vali->matspec_code;?>"  data-nmatgroupname="<?php echo $vali->matgroup_name; ?> <?php echo $vali->matsubgroup_name;?> <?php echo $vali->matname;?> " data-munit="<?php echo $vali->matname; ?>" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
$(".opennmat<?php echo $n;?>").click(function() {
  $("#newmatname").val($(this).data('nmatgroupname'));
  $("#newmatcode").val($(this).data('mmatcode'));
$("#unit").val($(this).data('munit'));
$("#punit").val($(this).data('munit'));
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
