<?php 
	 $session_data = $this->session->userdata('sessed_in');
	 $username = $session_data['username'];
	 $compcode = $session_data['compcode'];
?>
<table class="table table-hover table-bordered table-xxs basic">
	<thead>
		<tr>
			<th class="text-center">No.</th>
						<th class="text-center">Invoice Retention</th>
						<th class="text-center">Invoice Date</th>
						<th class="text-center">Project/Department</th>
						<th class="text-center">Owner/Customer</th>
						<th class="text-center">Credit Term</th>
						<th class="text-center">Period</th>
						<th class="text-center">VAT</th>
						<th class="text-center">W/T</th>
						<th class="text-center">Amount</th>
						<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody class="text-center">
	<?php $n=1; foreach($to as $e){?>
		<tr>
			<td><?php echo $n; ?></td>
				<?php 
					$pp=$this->db->query("SELECT * from project where project_id = '$e->inv_project' ")->result();
					foreach ($pp as $key) {
						$proname = $key->project_name;
						// var_dump($key->project_name);
					}
					$de=$this->db->query("SELECT sum(inv_vatamt) as vatamt,sum(inv_lesswt) as inv_wt,sum(inv_retentionamt) as toamt from ar_invretention_detail where inv_ref = '$e->inv_no' and inv_period = $e->inv_period")->result();
					foreach ($de as $dd) {
						$vatamt = $dd->vatamt;
						$wtamt = $dd->inv_wt;
						$amt = $dd->toamt;
					}

					$ow=$this->db->query("SELECT * from debtor where debtor_code = '$e->inv_owner'")->result();
					foreach ($ow as $oo) {
						$owname = $oo->debtor_name;
					}
				 ?>
			<td><?php echo $e->inv_no; ?></td>
			<td><?php echo $e->inv_date; ?></td>
			<td><?php echo $proname; ?></td>
			<td><?php echo $owname; ?></td>
			<td><?php echo $e->inv_credit; ?></td>
			<td><?php echo $e->inv_period; ?></td>
			<td><?php echo $vatamt; ?></td>
			<td><?php echo $wtamt; ?></td>
			<td><?php echo $amt; ?></td>
			<td>
				<ul class="icons-list">
					<li>
					<a href="<?php echo base_url(); ?>ar/open_arinvretention/<?php echo $e->inv_no; ?>/<?php echo $e->inv_period; ?>" data-popup="tooltip"><i class="icon-folder-open"></i></a>
					</li>
					<li><a href="#" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
					<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invretention_report.mrt&id=<?php echo $e->inv_no; ?>&period=<?php echo $e->inv_period; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
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
