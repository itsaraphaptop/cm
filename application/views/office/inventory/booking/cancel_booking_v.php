<form id="insertform" name="insertform" action="<?php echo base_url(); ?>inventory_active/cancel_booking/<?php echo $pro; ?>" method="post">
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
				<td><?php echo $key->ref_codetransfer; ?>
					<input type="hidden" value="<?php echo $key->ref_codetransfer; ?>" name="code">
				</td>
				<td><?php echo $key->mat_code; ?>
					<input type="hidden" value="<?php echo $key->mat_code; ?>" name="mat_code[]">
				</td>
				<td><?php echo $key->mat_name; ?></td>
				<td><?php echo $key->costcode; ?></td>
				<td><?php echo $key->costname; ?></td>
				<td><?php echo $key->qty; ?>
					<input type="hidden" value="<?php echo $key->qty; ?>" name="qty[]">
				</td>
				<td><?php echo $key->unit; ?></td>
				<td><?php echo $key->priceunit; ?></td>
				<td><?php echo $key->whname; ?>
					<input type="hidden" value="<?php echo $key->wh; ?>" name="wh[]">
					<input type="hidden" value="<?php echo $key->store_id; ?>" name="store_id[]">

				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<br>
	<button type="submit"  id="save" class="btn btn-danger"><i class="icon-checkmark2"></i> Cancel</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i>  Close</button>
</div>