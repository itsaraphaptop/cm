<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Transfer Code</th>
<th>Transfer Date</th>
<th>Project / Department</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->transfer_code; ?></td>
<td><?php echo $val->transfer_date; ?></td>
<td><?php echo $val->fa_departmentname; ?><?php echo $val->fa_projectname; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    
    $("#savetranfer").hide();
    
    $("#transfer_code").val("<?php echo $val->transfer_code; ?>");

    $("#transfer_date").val("<?php echo $val->transfer_date; ?>");
    $("#depid").val("<?php echo $val->fa_departmentid; ?>");
    $("#depname").val("<?php echo $val->fa_departmentname; ?>");
    $("#projectidd").val("<?php echo $val->fa_projectid; ?>");
    $("#projectnamee").val("<?php echo $val->fa_projectname; ?>");
    $("#transfer_de").val("<?php echo $val->transfer_de; ?>");

    $("#transfer_assdate").val("<?php echo $val->transfer_assdate; ?>");
    $("#transfer_driver").val("<?php echo $val->transfer_driver; ?>");
    $("#transfer_registration").val("<?php echo $val->transfer_registration; ?>");
    $("#transfer_carrier").val("<?php echo $val->transfer_carrier; ?>");

$("#tfc").val("<?php echo $val->transfer_code; ?>");

 
  $("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#body").load('<?php echo base_url(); ?>index.php/add_asset/transfer_retrive_detail/'+"<?php echo $val->transfer_code; ?>");
   	
  $("#print").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#print").load('<?php echo base_url(); ?>index.php/add_asset/transfer_print/'+"<?php echo $val->transfer_code; ?>");
  });


</script>
<?php $n++; } ?>
</tbody>
</table>
<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc").DataTable();
</script>





