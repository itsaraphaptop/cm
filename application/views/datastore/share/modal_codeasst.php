<table class="table table-xxs table-hover datatable-basicxcat_code" >
<thead>
<tr>
<th>No.</th>
<th>Asset Code</th>
<th>Asset Type</th>
<th>Cost Code</th>
<th>Cost Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->at_code; ?></td>
<td><?php echo $val->at_typet; ?></td>
<td><?php echo $val->at_idcost; ?></td>
<td><?php echo $val->at_namecost; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#fa_atype").val("<?php echo $val->at_code; ?>");
    $("#fa_atypename").val("<?php echo $val->at_typet; ?>");

     $("#at_acaid1").val("<?php echo $val->at_acaid; ?>");
    $("#at_aca1").val("<?php echo $val->at_aca; ?>");

     $("#at_acdid2").val("<?php echo $val->at_acdid; ?>");
    $("#at_acd2").val("<?php echo $val->at_acd; ?>");

     $("#at_costid3").val("<?php echo $val->at_costid; ?>");
    $("#at_cost3").val("<?php echo $val->at_cost; ?>");

     $("#at_acaccid4").val("<?php echo $val->at_acaccid; ?>");
    $("#at_acacc4").val("<?php echo $val->at_acacc; ?>");

    $("#fa_group").val("<?php echo $val->at_group; ?>");



  $("#att").val("<?php echo $val->at_code; ?>");
   $("#attn").val("<?php echo $val->at_typet; ?>");
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
  $(".datatable-basicxcat_code").DataTable();
</script>
