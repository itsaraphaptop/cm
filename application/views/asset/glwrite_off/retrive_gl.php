<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Date</th>
<th>Project / Department</th>
<th>Fix Asset Code :</th>
<th>Fix Asset Name :</th>
<th>Vchno</th>
<th>Status</th>
<th width="5%">จัดการ</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><div style="width: 150px;"><?php echo $val->off_date; ?></div></td>
<td><?php echo $val->off_pjname; ?><?php echo $val->off_depname; ?></td>
<td><?php echo $val->off_asscode; ?></td>
<td><?php echo $val->off_assname; ?></td>
<td><?php echo $val->vchno; ?></td>
<td><?php echo $val->status; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#off_asscode").val("<?php echo $val->off_asscode; ?>");
    $("#off_assname").val("<?php echo $val->off_assname; ?>");
    $("#off_chkmodule").val("<?php echo $val->off_chkmodule; ?>");
    $("#depid").val("<?php echo $val->off_depid; ?>");
    $("#depname").val("<?php echo $val->off_depname; ?>");
    $("#off_vch").val("<?php echo $val->off_vch; ?>");
    $("#projectidd").val("<?php echo $val->off_pjno; ?>");
    $("#projectnamee").val("<?php echo $val->off_pjname; ?>");
    $("#off_chkdepra").val("<?php echo $val->off_chkdepra; ?>");
    $("#off_buyam").val("<?php echo $val->off_buyam; ?>");
    $("#off_depre").val("<?php echo $val->off_depre; ?>");
    $("#off_depas").val("<?php echo $val->off_depas; ?>");
    $("#off_buyd").val("<?php echo $val->off_buyd; ?>");
    $("#off_buycode").val("<?php echo $val->off_buycode; ?>");
    $("#off_date").val("<?php echo $val->off_date; ?>");
    $("#off_depday").val("<?php echo $val->off_depday; ?>");
    $("#off_depdayper").val("<?php echo $val->off_depdayper; ?>");
    $("#off_thiam").val("<?php echo $val->off_thiam; ?>");

	if(1=='<?php echo $val->off_type; ?>'){
   		$("#off_type1").prop('checked', true);
   	}else if(2=='<?php echo $val->off_type; ?>'){
   		$("#off_type2").prop('checked', true);
   	}else if(3=='<?php echo $val->off_type; ?>'){
   		$("#off_type3").prop('checked', true);
   	}

   	$("#off_amt").val("<?php echo $val->off_amt; ?>");
   	$("#off_vatper").val("<?php echo $val->off_vatper; ?>");
   	$("#off_vat").val("<?php echo $val->off_vat; ?>");
   	$("#off_netam").val("<?php echo $val->off_netam; ?>");
   	$("#off_loss").val("<?php echo $val->off_loss; ?>");
   	$("#off_remark").val("<?php echo $val->off_remark; ?>");
     
  $("#res").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#res").load('<?php echo base_url(); ?>index.php/add_asset/retrive_glitem/<?php echo $val->off_code; ?>');

  $('#off_vch').val('<?php echo $val->vchno; ?>');

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





