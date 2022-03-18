<table class="table table-bordered table-xxs datatable-basicc">
	<thead>
		<tr>
			<th>Type Code</th>
			<th>Type Name</th>
			<th>Active</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($res as $key => $value) {?>
		<tr>
			<td><?php echo $value->type_code; ?></td>
			<td><?php echo $value->type_name; ?></td>
			<th>
				<button class="sell label label-primary" data-dismiss="modal" data-matcode="<?php echo $value->type_code; ?>" data-matname="<?php echo $value->type_name; ?>"> SELECT</button>
			</th>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
	$(".sell").click(function(){
		$("#taye_code").val($(this).data('matcode'));
		$("#taye_name").val($(this).data('matname'));
	});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
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
  $('.datatable-basicc').DataTable();
</script>