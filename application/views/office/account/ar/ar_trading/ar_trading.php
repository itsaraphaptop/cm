<div class="page-header">
	<div class="panel-body">
		<div class="row">
			<a href="<?= base_url() ?>ar/add_ar_trading" class="btn btn-primary pull-right"><i class="icon-plus2"></i> New</a>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h3>Select Account Receivble Trading</h3>
			</div>
		</div>
		<div class="row">
			<table class="table table-xxs table-hover table-bordered basic">
				<thead>
					<tr>
						<th>No</th>
						<th>Acc No</th>
						<th>Invoice No</th>
						<th>Project</th>
						<th>Customer</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i=0;
					foreach ($art_header as $key => $value) {
					$i++;
				?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $value->acc_no ?></td>
						<td><?= $value->acc_invno ?></td>
						<td><?= $value->project_code ?> - <?= $value->project_name ?></td>
						<td><?= $value->debtor_code ?> - <?= $value->debtor_name ?></td>
						<td>
							<?php if ($value->acc_status == "N") {
						?>
							<a  href="<?= base_url() ?>ar/ar_reduce_edit/<?= $value->acc_no ?>"><i class="icon-pencil7"></i></a>
						<?php
							}else{
						?>
							<a href="<?= base_url() ?>ar/ar_reduce_view/<?= $value->acc_no ?>"><i class="icon-file-text2"></i></a>
						<?php
							}
						?>
						</td>
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