
<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th class="text-center">No.</th>
<th class="text-center">Date</th>
<th class="text-center">Project / Department</th>
<th class="text-center">Document No :</th>

<th class="text-center">จัดการ</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td class="text-center"><?php echo $val->timeadd; ?></td>
<td class="text-center"><div style="width: 150px;"><?php echo $val->co_code; ?></div></td>
<td class="text-center"><?php echo $val->co_projectname; ?><?php echo $val->co_departmentname; ?></td>

<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>

<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
  $("#co_accode").val("<?php echo $val->co_code; ?>");
    $("#depid").val('<?php echo $val->co_departmentid;?>');
    $("#depname").val('<?php echo $val->co_departmentname;?>');
    $("#projectidd").val("<?php echo $val->co_projectid; ?>");
    $("#projectnamee").val("<?php echo $val->co_projectname ; ?>");
    $("#co_all1").val("<?php echo $val->co_all1; ?>");

    $("#co_all2").val("<?php echo $val->co_all2; ?>");
    $("#co_all3").val("<?php echo $val->co_all3;?>");
    $("#co_chk1").val("<?php echo $val->co_chk1; ?>");
    $("#co_chk2").val("<?php echo $val->co_chk2; ?>");
    $("#co_chk3").val("<?php echo $val->co_chk3; ?>");
    $("#chkstatus").val("X");
  $("#body").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#body").load('<?php echo base_url(); ?>index.php/add_asset/count_red/'+"<?php echo $val->co_code; ?>");

  $("#delate").show();
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