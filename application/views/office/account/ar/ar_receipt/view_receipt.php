<div class="table-responsive">
	<table class="table table-hover table-bordered  table-xxs datatable-basicsc<?php echo $pro; ?>">
		<thead>
			<tr>
				<th>Invoice No.</th>
				<th>Invoice Type</th>
				<th>Period</th>
				<th>Project Name</th>
				<th>Owner/Customer Name</th>
				<th>Voucher No</th>
			</tr>	
		</thead>
		<tbody>
			<tr>
			<?php foreach ($view as $key) {?>
				<td>
					<?php echo $key->acc_invno; ?>
				</td>
				<td>
					<span class="label label-success"><?php echo $key->acc_invtype; ?></span></td>
				<td>
					<?php echo $key->acc_period; ?>
				</td>
				<td>
					<?php echo $key->project_name; ?>
					<!-- <?php echo $key->department_title; ?> -->
				</td>
				<td>
					<?php echo $key->debtor_name; ?>
				</td>
				<td>
					<?php echo $key->acc_no; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
			<?php foreach ($cn as $cc) {?>
				<td>
					<?php echo $cc->inv_no; ?>
				</td>
				<td>
					<span class="label label-success">CN</span></td>
				<td>
					<?php echo $cc->inv_period; ?>
				</td>
				<td>
					<?php echo $cc->project_name; ?>
					<!-- <?php echo $cc->department_title; ?> -->
				</td>
				<td>
					<?php echo $cc->debtor_name; ?>
				</td>
				<td>
					<?php echo $cc->inv_acccode; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="modal-footer">
		<!-- <a data-dismiss="modal" class="btn bg-danger"><i class="icon-close2"></i> Close</a> -->
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
           targets: [ 1 ]
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
