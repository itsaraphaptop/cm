<table class="table table-xxs table-hover datatable-basicxc2" >
<thead>
<tr>
<th>No.</th>
<th>Account Code</th>
<th>Account Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?=$val->act_code; ?></td>
<td><?=$val->act_name; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" attr-code="<?=$val->act_code; ?>" attr-name="<?=$val->act_name; ?>" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    var code = $(this).attr('attr-code');
    var name = $(this).attr('attr-name');
    $(`#<?=$id?>code<?=$row?>`).val(code);
    $(`#<?=$id?>name<?=$row?>`).val(name);
  });
</script>
<?php $n++; } ?>
</tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc2").DataTable();
</script>
