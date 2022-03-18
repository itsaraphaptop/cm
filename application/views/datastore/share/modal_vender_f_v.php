<table class="table table-xxs table-hover datatable-basicxcvender_name" >
<thead>
<tr>
<th>No.</th>
<th>Vender Name</th>
<th>Address</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php $n = 1;?>
<?php foreach ($res as $val) {?>
<tr>
<th scope="row"><?php echo $n; ?></th>
<td><?php echo $val->vender_name; ?></td>
<td><?php echo $val->vender_address; ?></td>
<td><button class="openvensmo<?php echo $n; ?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-venid<?php echo $n; ?>="<?php echo $val->vender_id; ?>" data-vensale<?php echo $n; ?>="<?php echo $val->vender_sale; ?>" data-vnameh<?php echo $n; ?>="<?php echo $val->vender_name; ?>" data-addrh<?php echo $n; ?>="<?php echo $val->vender_address; ?>" data-crteam<?php echo $n; ?>="<?php echo $val->vender_credit; ?>" data-vtel<?php echo $n; ?>="<?php echo $val->vender_tel; ?>" data-venremark<?php echo $n; ?>="<?php echo $val->vender_remark;?>" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".openvensmo<?php echo $n; ?>").click(function(event) {
    $("#venname<?php echo $n; ?>").val($(this).data('vnameh<?php echo $n; ?>'));
    $("#memname<?php echo $n; ?>").val('');
    $("#vender<?php echo $n; ?>").val($(this).data('vnameh<?php echo $n; ?>'));
    $("#addrvender<?php echo $n; ?>").val($(this).data('addrh<?php echo $n; ?>'));
    $("#subcontact").val($(this).data('vnameh<?php echo $n; ?>'));
    $("#cosubcontact").val($(this).data('vensale<?php echo $n; ?>'));
    $("#venderid").val($(this).data('venid<?php echo $n; ?>'));
    $("#venderidd").val($(this).data('venid<?php echo $n; ?>'));
    $("#vender").val($(this).data('vnameh<?php echo $n; ?>'));
    $("#team").val("<?php echo $val->vender_credit; ?>");
    $("#tel").val("<?php echo $val->vender_tel; ?>");
    $("#fax").val("<?php echo $val->vender_fax; ?>");
    $("#venname").val("<?php echo $val->vender_name; ?>");
    $("#venid").val("<?php echo $val->vender_id; ?>");
    $("#addresssub").val($(this).data('addrh<?php echo $n; ?>'));
    $("#teamother").val($(this).data('venremark<?php echo $n; ?>'));
    // alert("eeee");
    var vtype = "<?php echo $val->vender_type?>";
    if (vtype=="employee") {
      $("#vatper").val(0);
    }else{
      $("#vatper").val(7);
    }

    $("#venderid1").val($(this).data('venid<?php echo $n; ?>'));
  });
</script>
<?php $n++;}?>
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
  $(".datatable-basicxcvender_name").DataTable();
</script>
