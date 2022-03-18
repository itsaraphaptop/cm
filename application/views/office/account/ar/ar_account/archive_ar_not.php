<?php 
	 $session_data = $this->session->userdata('sessed_in');
	 $username = $session_data['username'];
	 $compcode = $session_data['compcode'];
?>
<table class="table table-hover table-bordered table-xxs basic">
	<thead>
		<tr>
			<th class="text-center">No.</th>
						<th class="text-center">AR Account</th>
						<<th class="text-center">AR Date</th>
						<th class="text-center">Invoice No.</th>
						<th class="text-center">Invoice Date</th>
						<th class="text-center">Project/Department</th>
						<th class="text-center">Amount</th>
						<th class="text-center">W/T</th>
						<th class="text-center">VAT</th>
						<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody class="text-center">
	<?php $n=1; foreach($res as $e){?>
			<tr>
				<td><?php echo $n; ?></td>

				<td><?php echo $e->acc_no; ?></td>
				<td><?php echo $e->acc_billdate; ?></td>
				<td><?php echo $e->acc_invno; ?></td>
				<td><?php echo $e->acc_invdate; ?></td>
				<td><?php echo $e->project_name; ?></td>
				<td><?php echo $e->acc_invamt; ?></td>
				<td><?php echo $e->acc_invvat; ?></td>
				<td><?php echo $e->acc_invwt; ?></td>
				<td>
					<ul class="icons-list">
						<li><a href="#" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
						<li><a href="<?= base_url() ?>ar/ar_edit/<?= $e->acc_no; ?>"><i class="icon-pencil7"></i></a></li>
						<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_account_report.mrt&no=<?php echo $e->acc_no; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
					 </ul>
				</td>
			</tr>
		<?php $n++; } ?>
	</tbody>
</table>

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
  $('.basic').DataTable();
</script>
