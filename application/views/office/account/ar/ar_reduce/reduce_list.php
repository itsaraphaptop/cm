<div class="page-header">
	<div class="panel-body">
		<div class="row">
			<a href="<?= base_url() ?>ar/ar_reduce" class="btn btn-primary pull-right"><i class="icon-plus2"></i> New</a>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3>Reduce Debt Trading</h3>
			</div>
		</div>
		<div class="row">
			<table class="table table-xxs table-hover table-bordered basic">
				<thead>
					<tr>
						<th>No</th>
						<th>Reduce No</th>
						<th>Invoice No</th>
						<th>Project</th>
						<th>Customer</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i=0;
					foreach ($rd_header as $key => $value) {
					$i++;
				?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $value->rd_no ?></td>
						<td><?= $value->ref_inv_no ?></td>
						<td><?= $value->project_code ?> - <?= $value->project_name ?></td>
						<td><?= $value->cus_code ?> - <?= $value->cus_name ?></td>
						<td><a class="label bg-warning" href="<?= base_url() ?>ar/ar_reduce_edit/<?= $value->rd_no ?>"><i class="icon-pencil7"></i> Edit</a></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

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
  $('.basic').DataTable();
</script>