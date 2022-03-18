<table class="table table-xxs table-hover datatable-basicxc3" >
<thead>
<tr>
<th>No.</th>
<th>PO</th>
<th>Vender</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->po_pono; ?></td>
<td><?php echo $val->po_vender; ?></td>
<td><a class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-target="#loadwo">SELECT</a></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
  	$("#detail_po").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#detail_po").load('<?php echo base_url(); ?>share/loadpodetail/<?php echo $val->po_pono; ?>/<?php echo $n;?>');
  });
</script>
<?php $n++; } ?>
</tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
  $(".datatable-basicxc3").DataTable();
</script>