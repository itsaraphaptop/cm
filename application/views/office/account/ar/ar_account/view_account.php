<div class="table-responsive">
	<table class="table table-hover table-bordered  table-xxs datatable-basicsc<?php echo $pro; ?>">
		<thead>
			<tr>
				<th>Invoice No.</th>
				<th>Invoice Type</th>
				<th>Period</th>
				<th>Project Name</th>
				<th>Owner Name</th>
			</tr>	
		</thead>
		<tbody>
			<tr>
			<?php foreach ($down as $key) {?>
				<td>
					<?php echo $key->inv_no; ?>
				</td>
				<td>
					<span class="label label-success"><?php echo $key->inv_type; ?></apan>
				</td>
				<td>
					<?php echo $key->inv_period; ?>
				</td>
				<td>
					<?php echo $key->project_name; ?>
					<!-- <?php echo $key->department_title; ?> -->
				</td>
				<td>
					<?php echo $key->debtor_name; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
			<?php foreach ($proress as $pror) {?>
				<td>
					<?php echo $pror->inv_no; ?>
				</td>
				<td>
					<span class="label label-success"><?php echo $pror->inv_type; ?></apan>
				</td>
				<td>
					<?php echo $pror->inv_period; ?>
				</td>
				<td>
					<?php echo $pror->project_name; ?>
					<!-- <?php echo $pror->department_title; ?> -->
				</td>
				<td>
					<?php echo $pror->debtor_name; ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
			<?php foreach ($reten as $ren) {?>
				<td>
					<?php echo $ren->inv_no; ?>
				</td>
				<td>
					<span class="label label-success"><?php echo $ren->inv_type; ?></apan>
				</td>
				<td>
					<?php echo $ren->inv_period; ?>
				</td>
				<td>
					<?php echo $ren->project_name; ?>
					<!-- <?php echo $ren->department_title; ?> -->
				</td>
				<td>
					<?php echo $ren->debtor_name; ?>
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
