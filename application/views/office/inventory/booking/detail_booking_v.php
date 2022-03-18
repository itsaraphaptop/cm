<div class="table-responsive">
	<table class="table table-bordered table-striped table-xs datatable-basics">
		<thead>
			<tr>
				<th>Booking Code</th>
				<th>Material Code</th>
				<th>Material Name</th>
				<th>Cost Code</th>
				<th>Cost Name</th>
				<th>QTY</th>
				<th>Unit</th>
				<th>Price/Unit</th>
				<th>WareHouse</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php foreach ($det as $key) { ?>
				<td><?php echo $key->ref_codetransfer; ?></td>
				<td><?php echo $key->mat_code; ?></td>
				<td><?php echo $key->mat_name; ?></td>
				<td><?php echo $key->costcode; ?></td>
				<td><?php echo $key->costname; ?></td>
				<td><?php echo $key->qty; ?></td>
				<td><?php echo $key->unit; ?></td>
				<td><?php echo $key->priceunit; ?></td>
				<td><?php echo $key->whname; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<br>
	<a href="<?php echo base_url(); ?>inventory_active/approve_booking/<?php echo $key->ref_codetransfer; ?>/<?php echo $pro; ?>" type="button"  id="save" class="btn btn-success"><i class="icon-checkmark2"></i> Approve</a>
	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i>  Close</button>
</div>