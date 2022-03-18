<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Vender Name</th>
<th>Address</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php   $n =1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->vender_name; ?></td>
<td><?php echo $val->vender_address; ?></td>
<td><button class="openvensmo<?php echo $id ; ?> btn btn-xs btn-block btn-primary" data-toggle="modal"  data-vnameh="<?php echo $val->vender_name;?>" data-addrh="<?php echo $val->vender_address; ?>" data-crteam="<?php echo $val->vender_credit;?>" data-vtel="<?php echo $val->vender_tel; ?>" data-code="<?php echo $val->vender_code; ?>" data-id="<?php echo $val->vender_id; ?>" 
  data-tax="<?php echo $val->vender_tax; ?>" data-dismiss="modal">SELECT</button></td>
</tr>
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

<script>
  $(".openvensmo<?php echo $id ; ?>").click(function(event) {
    // $("#vender<?php echo $id ; ?>").val($(this).data('vnameh')); 
    $("#memname").val('');
    // $("#vender<?php echo $id ; ?>").val($(this).data('vnameh'));
    $("#addrvender<?php echo $id ; ?>").val($(this).data('addrh'));

    $("#acct_no").val($(this).data('code'));
    $("#vendor_id").val($(this).data('code'));
    $("#venderid").val($(this).data('code'));
    $("#namevendor").val($(this).data('vnameh'));
    $("#nameve").val($(this).data('vnameh'));
    $("#tax_de").val($(this).data('tax'));

	 $("#acct_no<?php echo $id; ?>").val($(this).data('code'));
    $("#namevendor<?php echo $id; ?>").val($(this).data('vnameh'));

    $("#ap_paytoname").val($(this).data('vnameh'))
    $("#ap_payto").val($(this).data('id'));

    $("#subid").val($(this).data('code'));
    $("#subname").val($(this).data('vnameh'));

  });
</script>
