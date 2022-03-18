<?php 
	 $session_data = $this->session->userdata('sessed_in');
	 $username = $session_data['username'];
	 $compcode = $session_data['compcode'];
?>
<div class="table-responsive">
<table class="table table-hover table-bordered table-xxs basic">
	<thead >
		<tr>
			<th class="text-center">No.</th>
					<th class="text-center">Receving No</th>
					<th class="text-center">Receving Date</th>
					<th class="text-center">Project Name</th>
					<th class="text-center">Owner/Customer</th>
					<th class="text-center">Less Advance</th>
					<th class="text-center">Less Retention</th>
					<th class="text-center">VAT</th>
					<th class="text-center">W/T</th>
					<th class="text-center">Amount</th>
					<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody >
	<?php $n=1; foreach($all as $e){?>
		<tr>
			<td><?php echo $n; ?></td>
			<td><input type="hidden" value="<?php echo $e->vou_no; ?>" id="vou_no<?php echo $e->vou_no; ?>"><input type="hidden" value="<?php echo $e->vou_arno; ?>" id="vou_arno<?php echo $e->vou_no; ?>"><?php echo $e->vou_no; ?></td>
			<td><?php echo $e->vou_date; ?></td>
			<td><?php echo $e->project_name; ?></td>
			<td><?php echo $e->debtor_name; ?></td>
			<td><?php echo $e->vou_amtadv; ?></td>
			<td><?php echo $e->vou_amtret; ?></td>
			<td><?php echo $e->vou_vat; ?></td>
			<td><?php echo $e->vou_wt; ?></td>
			<td><?php echo $e->vou_net; ?></td>
			<td>
				<ul class="icons-list">
					<?php if ($e->vou_status == "N") {
					?>
					<li><a class="realert btn-sm" data-toggle="modal" data-target="#realert<?php echo $e->vou_no; ?>"><i class="icon-trash"></i></a></li>
					<?php	
					} ?>
					<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_receiving_report.mrt&no=<?php echo $e->vou_no; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
				 </ul>
			</td>
		</tr>
		<?php $n++;  } ?>
	</tbody>
</table>
</div>	
<?php foreach($all as $ee){ ?>
<div id="realert<?php echo $ee->vou_no; ?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h5 class="modal-title">Please fill in the deletion details  <?php echo $ee->vou_no; ?></h5>
				</div>
			<div class="modal-body">
                
				<div class="modal-body">
					<input type="text" class="form-control" name="comment" id="comment<?php echo $ee->vou_no; ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="savereceiving<?php echo $ee->vou_no; ?>"><i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Cancel</button>
				</div>
            </div>
        </div>
    </div>
</div>
<script>
	$("#savereceiving<?php echo $ee->vou_no; ?>").click(function(){
	var url="<?php echo base_url(); ?>ar_active/ar_receivingremore";
	var dataSet={
		comment: $('#comment<?php echo $ee->vou_no; ?>').val(),
		vou_no: $('#vou_no<?php echo $ee->vou_no; ?>').val(),
		vou_arno: $('#vou_arno<?php echo $ee->vou_no; ?>').val(),
	}
	$.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ar/ar_receivingall";
        }, 1000);
      });
	} );
</script>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

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