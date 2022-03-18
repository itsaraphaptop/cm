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
						<th class="text-center">Project Name</th>
						<th class="text-center">DR</th>
						<th class="text-center">CR</th>
						<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody class="text-center">
				<?php $n=1; foreach($no as $e){?>
					<tr>
						<td><?php echo $n; ?></td>
						<td><?php echo $e->cl_no; ?><input type="hidden" id="cl_no<?php echo $e->cl_no; ?>" value="<?php echo $e->cl_no; ?>"><input type="hidden" id="cl_rlno<?php echo $e->cl_no; ?>" value="<?php echo $e->cl_rlno; ?>"></td>
						<td><?php echo $e->cl_billdate; ?></td>
						<td><?php echo $e->project_name; ?></td>
						<td><?php echo $e->cl_todr; ?></td>
						<td><?php echo $e->cl_tocr; ?></td>
						<td>
							<ul class="icons-list">
								<li><a class="realert btn-sm" data-toggle="modal" data-target="#realert<?php echo $e->cl_no; ?>"><i class="icon-trash"></i></a></li>
								<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_clear_report.mrt&no=<?php echo $e->cl_no; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
							 </ul>
						</td>
					</tr>
					<?php $n++; } ?>
				</tbody>
</table>
<?php foreach($no as $ee){ ?>
	<div id="realert<?php echo $ee->cl_no;?>" class="modal fade" data-backdrop="false">
	    <div class="modal-dialog">
	        <div class="modal-content">
				<div class="modal-body">
	                <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h5 class="modal-title">Please fill in the deletion details <?php echo $ee->cl_no; ?></h5>
					</div>
					<div class="modal-body">
						<input type="text" class="form-control" name="comment" id="comment<?php echo $ee->cl_no;?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="saveclear<?php echo $ee->cl_no;?>"><i class="icon-floppy-disk"></i> save</button>
						<button type="button" class="btn btn-link" data-dismiss="modal"><i class="icon-close2"></i> Cancel</button>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
<script>
	$("#saveclear<?php echo $ee->cl_no;?>").click(function(){
	var url="<?php echo base_url(); ?>ar_active/ar_clearremore";
	var dataSet={
		comment: $('#comment<?php echo $ee->cl_no;?>').val(),
		clno: $('#cl_no<?php echo $ee->cl_no;?>').val(),
		rlno: $('#cl_rlno<?php echo $ee->cl_no;?>').val(),
	}
	$.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ar/ar_clearall";
        }, 1000);
      });
	} );
</script>
<?php } ?>
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$("#realert").hide();
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
