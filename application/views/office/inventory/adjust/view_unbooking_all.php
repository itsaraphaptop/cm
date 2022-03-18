<div class="table-responsive">
	<table class="table table-hover table-bordered  table-xxs datatable-basicsc<?php echo $pro; ?>">
		<thead>
			<tr>
				<th>Book Code</th>
				<th>Book Date</th>
				<th>Status</th>
				<th>Remark</th>
			</tr>	
		</thead>
		<tbody>
			<tr>
			<?php foreach ($view as $key) {?>
				<td>
					<?php echo $key->book_code; ?>
				</td>
				<td>
					<?php echo $key->date_book; ?>
				</td>
				<td>
					<?php echo $key->status; ?>
				</td>
				<td>
					<?php echo $key->remark; ?>
				</td>
			</tr>
			<?php } ?>
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
           width: '140px',
           targets: [ 0 ]
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

$('.datatable-basicsc<?php echo $pro; ?>').DataTable();
</script>