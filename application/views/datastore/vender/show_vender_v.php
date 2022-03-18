<div class="panel-body">
	<table id="datatable" class="table table-hover">
		<thead>
			<tr>
				<th>Code</th>
				<th>Vender Name</th>
				<th>Tel</th>
				<th>Sale</th>
				<!-- <th></th> -->
				<!-- <th></th> -->
				<!-- <th></th> -->
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $n=1; foreach ($res as $val) {?>
			<tr>
				<td><?php echo $val->vender_code; ?></td>
				<td><?php echo $val->vender_name; ?></td>
				<td><?php echo $val->vender_tel; ?></td>
				<td><?php echo $val->vender_sale; ?></td>
				<!-- <td></td> -->
				<!-- <td></td> -->
				<!-- <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-search"></span> </button></td> -->
				<td><button class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash"></span> </button></td>
			</tr>
			<?php $n++; } ?>
		</tbody>
	</table>
</div>

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>