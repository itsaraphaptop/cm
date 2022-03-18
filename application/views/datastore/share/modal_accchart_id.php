<table class="table table-xxs table-hover datatable-basicxc3" >
<thead>
<tr>
<th>No.</th>
<th>Tender ID</th>
<th>Tender Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($copyboq as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->bd_tenid; ?></td>
<td><?php echo $val->bdtender_d; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary" data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    


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
