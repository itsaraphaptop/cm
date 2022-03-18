<table class="table table-xxs table-hover datatable-basicxc" >
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
<td><?php echo $val->act_code; ?></td>
<td><?php echo $val->act_name; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#accno").val("<?php echo $val->act_code; ?>");
    $("#accname").val("<?php echo $val->act_name; ?>");
    // $("#accno").val("<?php echo $val->act_code; ?>");
    $("#accountname").val("<?php echo $val->act_name; ?>");
    $("#codename").val("<?php echo $val->act_name; ?>");

    $("#accno_upd").val("<?php echo $val->act_code; ?>");
    $("#codename_upd").val("<?php echo $val->act_name; ?>");
    
      $("#new_acname2").val("<?php echo $val->act_code; ?>");
    $("#new_accode2").val("<?php echo $val->act_name; ?>");

        $("#off_apcode").val("<?php echo $val->act_code; ?>");
    $("#off_apname").val("<?php echo $val->act_name; ?>");

    $("#acc_codes<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#act_names<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");
    
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
  $(".datatable-basicxc").DataTable();
</script>
