<div class="table-responsive">
	<table class="table table-hover table-bordered  table-xxs datatable-basicsc<?php echo $mat; ?>">
		<thead>
			<tr>
				<th>Doc No.</th>
				<th>Type</th>
				<th>QTY</th>
				<th>Price</th>
			</tr>	
		</thead>
		<tbody>
			<tr>
			<?php foreach ($view as $key) {?>
				<td>
					<?php echo $key->book_code; ?>
				</td>
				<td>
					<span class="label label-warning"><?php echo $key->status; ?></span>
				</td>
				<td>
					<?php echo $key->qty; ?>
				</td>
				<td>
					<?php echo $key->priceunit; ?>
				</td>
			</tr>
			<?php } ?>
			<tr style="font-weight: bold;">
				<?php foreach ($summary as $sum) { ?>
				
				<td colspan="2" class="text-center ">Total</td>
				<td><?php echo $sum->toqty; ?></td>
				<td><?php echo $sum->toprice; ?></td>
				<?php } ?>
			</tr>
			
		</tbody>
	</table>
	<div class="modal-footer">
		<a data-dismiss="modal" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$('[data-popup="tooltip"]').tooltip();

	$.extend( $.fn.dataTable.defaults, {
       autoWidth: false,
       columnDefs: [{
           orderable: false,
           width: '100px',
           targets: [ 4 ]
       }],
       dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
       language: {
           search: '<span>Filter:</span> _INPUT_',
           lengthMenu: '<span>Show:</span> _MENU_',
           paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
       },
       drawCallback: function () {
           $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
       },
       preDrawCallback: function() {
           $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
       }
   });

$('.datatable-basicsc<?php echo $mat; ?>').DataTable();
</script>
