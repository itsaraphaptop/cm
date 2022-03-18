<div class="table-responsive">
	<table class="table table-hover table-bordered  table-xxs datatable-basicsc<?php echo $pro; ?>">
		<thead>
			<tr>
				<th class="text-center">เลขที่รับสินค้า</th>
	              <th class="text-center">วันที่รับของ</th>
	              <th class="text-center">ร้านค้า</th>
	              <th class="text-center">โครงการ</th>
	              <th class="text-center">ระบบ</th>
			</tr>	
		</thead>
		<tbody>
			<tr>
			<?php foreach ($view as $key) {?>
				<td><?php echo $key->po_reccode; ?></td>
                      <td><?php echo $key->po_recdate; ?></td>
                      <td><?php echo $key->venderid; ?></td>
                      <td><?php echo $key->project_name; ?></td>
                      <td><?php echo $key->systemname; ?></td>
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

$('.datatable-basicsc<?php echo $pro; ?>').DataTable();
</script>
