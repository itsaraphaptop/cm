<table class="table table-xxs table-hover datatable-basicxc" >
<thead>
<tr>
<th>No.</th>
<th>Project / Department</th>
<th>Asset Code</th>
<th>Asset Name</th>
<th>Amount</th>
<th>Status</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php $n=1;?>
<?php foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->fa_projectname; ?><?php echo $val->fa_departmentname; ?></td>
<td><?php echo $val->fa_assetcode; ?></td>
<td><?php echo $val->fa_asset; ?></td>
<td><?php echo $val->fa_amount; ?></td>
<td></td>
<td><button class="opendeptorz<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>


<script>
  $(".opendeptorz<?php echo $n;?>").click(function(event) {
    $("#accode").val('<?php echo $val->fa_assetcode; ?>');
    $("#acname").val('<?php echo $val->fa_asset; ?>');
    $("#statusass").val("1");

    $("#accode<?php echo $id;?>").val('<?php echo $val->fa_assetcode; ?>');
    $("#acname<?php echo $id;?>").val('<?php echo $val->fa_asset; ?>');
    $("#statusass<?php echo $id;?>").val("1");

    $("#accode_edit<?php echo $id;?>").val('<?php echo $val->fa_assetcode; ?>');
    $("#acname_edit<?php echo $id;?>").val('<?php echo $val->fa_asset; ?>');
    $("#statusass_edit<?php echo $id;?>").val("1");

 	$("#paccode").val('<?php echo $val->fa_assetcode; ?>');
    $("#pacname").val('<?php echo $val->fa_asset; ?>');
    $("#pstatusass").val("1");

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



