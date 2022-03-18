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
						<th class="text-center">AR Date</th>
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
					<?php if ($e->acc_status == "N") {
					?>
						<li><a class="realert btn-sm" data-toggle="modal" data-target="#realert<?php echo $e->acc_no;?>"><i class="icon-trash"></i></a></li>
					<?php	
					} ?>
						<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_account_report.mrt&no=<?php echo $e->acc_no; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
					 </ul>
				</td>
			</tr>
		<?php $n++; } ?>
	</tbody>
</table>
<?php foreach($res as $ee){ ?>
<div id="realert<?php echo $ee->acc_no;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h5 class="modal-title">Please fill in the deletion details <?php echo $ee->acc_no; ?></h5>
				</div>
			<div class="modal-body">
                
				<div class="modal-body">
					<input type="text" class="form-control" name="comment" id="comment<?php echo $ee->acc_no;?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="saveaccount<?php echo $ee->acc_no;?>"><i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Cancel</button>
				</div>
            </div>
        </div>
    </div>
</div>
<script>
	$("#saveaccount<?php echo $ee->acc_no;?>").click(function(){
	var url="<?php echo base_url(); ?>ar_active/ar_accountremore";
	var dataSet={
		comment: $('#comment<?php echo $ee->acc_no;?>').val(),
		acc_no: $('#acc_no<?php echo $ee->acc_no;?>').val(),
		acc_invno: $('#acc_invno<?php echo $ee->acc_no;?>').val(),
		acc_type: $('#acc_type<?php echo $ee->acc_no;?>').val(),
	}
	$.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ar/ar_accountall";
        }, 1000);
      });
	} );
</script>
<?php } ?>

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
