<div class="content-wrapper">

	<div class="content">
		<div class="panel panel-flat">
			
			<div class="loadtable dataTables_wrapper no-footer">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-xs datatable-basics">
						<thead>
							<tr>
								<th>Booking Code</th>
								<th>Book Date</th>
								<th>Name</th>
								<th>address</th>
								<th>Remark</th>
								<th>Additional message</th>
								<th>Active</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach ($view as $key) { ?>
								<td><?php echo $key->book_code; ?></td>
								<td><?php echo date("d/m/Y",strtotime($key->date_book)); ?></td>
								<td><?php echo $key->name_book; ?></td>
								<td><?php echo $key->address_book; ?></td>
								<td><?php echo $key->remark; ?></td>
								<td><?php echo $key->message; ?></td>
								<td>
									<a data-toggle="modal" data-target="#approvemodal<?php echo $key->book_code; ?>" data-popup="tooltip" title="" data-original-title="Approve" class="approvemodal<?php echo $key->book_code; ?> label label-success label-block"><i class="icon-checkmark2"></i> Approve</a>

									<a data-toggle="modal" data-target="#cancelmodal<?php echo $key->book_code; ?>" data-popup="tooltip" title="" data-original-title="Cancel" class="cancelmodal<?php echo $key->book_code; ?> label label-danger label-block"><i class="icon-checkmark2"></i> Cancel</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- modal -->
<?php foreach ($view as $key) { ?>
<div class="modal fade" id="approvemodal<?php echo $key->book_code; ?>" data-backdrop="false">
	<div class="modal-dialog modal-full">
	  <div class="modal-content">
	    <div class="modal-header bg-primary">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <h4 class="modal-title" id="myModalLabel">Approve Booking <?php echo $key->book_code; ?></h4>
	    </div>
	      <div class="modal-body">
	        <div id="modal_detail<?php echo $key->book_code; ?>">
	        </div>
	      </div>
	  </div>
	</div>
</div> <!--end modal -->
<div class="modal fade" id="cancelmodal<?php echo $key->book_code; ?>" data-backdrop="false">
	<div class="modal-dialog modal-full">
	  <div class="modal-content">
	    <div class="modal-header bg-primary">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      <h4 class="modal-title" id="myModalLabel">Cancel Booking <?php echo $key->book_code; ?></h4>
	    </div>
	      <div class="modal-body">
	        <div id="modal_cancel<?php echo $key->book_code; ?>">
	        </div>
	      </div>
	  </div>
	</div>
</div> <!--end modal -->
<script>
    $(".approvemodal<?php echo $key->book_code; ?>").click(function(){
      $("#modal_detail<?php echo $key->book_code; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_detail<?php echo $key->book_code; ?>").load('<?php echo base_url(); ?>inventory/detail_booking/<?php echo $key->book_code; ?>/<?php echo $pro; ?>');
    });

    $(".cancelmodal<?php echo $key->book_code; ?>").click(function(){
      $("#modal_cancel<?php echo $key->book_code; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_cancel<?php echo $key->book_code; ?>").load('<?php echo base_url(); ?>inventory/cancel_booking/<?php echo $key->book_code; ?>/<?php echo $pro; ?>');
    });
</script>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$('#imp').attr('class', 'active');
$('#imp_sub1').attr('style', 'background-color:#dedbd8');
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
$('.datatable-basics').DataTable();

   $('#imp').attr('class', 'active');
   $('#reservation').attr('class', 'active');
   $('#imp_sub13').attr('style', 'background-color:#dedbd8');
</script>