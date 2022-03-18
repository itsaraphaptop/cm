
<?php 
	 $session_data = $this->session->userdata('sessed_in');
	 $username = $session_data['username'];
	 $compcode = $session_data['compcode'];
?>
<table class="table table-hover table-bordered table-xxs basic">
	<thead>
		<tr>
			<th class="text-center">No.</th>
									<th class="text-center">Invoice Down</th>
									<th class="text-center">Invoice Date</th>
									<th class="text-center">Project/Department</th>
									<th class="text-center">Owner/Customer</th>
									<th class="text-center">Credit Term</th>
									<th class="text-center">Period</th>
									<th class="text-center">VAT</th>
									<th class="text-center">W/T</th>
									<th class="text-center">Amount</th>
									<th class="text-center">Actions</th>
		</tr>
	</thead>
	<tbody class="text-center">
		<?php $n=1; foreach($all as $e){?>
		<tr>
			<td><?php echo $n; ?></td>
				<?php 

					$de=$this->db->query("SELECT sum(inv_vatamt) as vatamt,sum(inv_lesswt) as inv_wt,sum(inv_downamt) as toamt from ar_invdown_detail where inv_ref = '$e->inv_no' and inv_period = $e->inv_period")->result();
					foreach ($de as $dd) {
						$vatamt = $dd->vatamt;
						$wtamt = $dd->inv_wt;
						$amt = $dd->toamt;
					}
				 ?>
			<td><?php echo $e->inv_no;?><input type="hidden" id="inv_no<?php echo $e->inv_no.$e->inv_period; ?>" value="<?php echo $e->inv_no; ?>"><input type="hidden" id="inv_period<?php echo $e->inv_no.$e->inv_period; ?>" value="<?php echo $e->inv_period; ?>"></td>
			<td ><?php echo $e->inv_date; ?></td>
			<td><?php echo $e->project_name; ?></td>
			<td><?php echo $e->debtor_name; ?></td>
			<td><?php echo $e->inv_credit; ?></td>
			<td><?php echo $e->inv_period; ?></td>
			<td><?php echo $vatamt; ?></td>
			<td><?php echo $wtamt; ?></td>
			<td><?php echo $amt; ?></td>
			<td>
				<ul class="icons-list">
					
					<?php if ($e->inv_status=="N") {
					?>
					<li><a href="<?php echo base_url(); ?>ar/ar_edit_invdown/<?php echo $e->inv_no; ?>/<?php echo $e->inv_period; ?>" data-popup="tooltip" title=""><i class="icon-pencil7"></i></a></li>
					<li><a class="realert btn-sm" data-toggle="modal" data-target="#realert<?php echo $e->inv_no.$e->inv_period;?>"><i class="icon-trash"></i></a></li>
					<?php
					}elseif ($e->inv_status=="Y") {
					?>
					<li>
					<a href="<?php echo base_url(); ?>ar/open_arinvdown/<?php echo $e->inv_no; ?>/<?php echo $e->inv_period; ?>" data-popup="tooltip"><i class="icon-folder-open"></i></a>
					</li>
					<?php
					}	
					?>
					<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invdown_report.mrt&id=<?php echo $e->inv_no; ?>&period=<?php echo $e->inv_period; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
				 </ul>
			</td>
		</tr>
		<?php $n++; } ?>
	</tbody>
</table>
<?php foreach($all as $ee){ ?>
<div id="realert<?php echo $ee->inv_no.$ee->inv_period;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h5 class="modal-title">Please fill in the deletion details <?php echo $ee->inv_no ?></h5>
				</div>
			<div class="modal-body">
                
				<div class="modal-body">
					<input type="text" class="form-control" name="comment" id="comment<?php echo $ee->inv_no.$ee->inv_period;?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="savedown<?php echo $ee->inv_no.$ee->inv_period;?>"><i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Cancel</button>
				</div>
            </div>
        </div>
    </div>
</div>
<script>
	$("#savedown<?php echo $ee->inv_no.$ee->inv_period;?>").click(function(){
	var url="<?php echo base_url(); ?>ar_active/ar_downremore";
	var dataSet={
		comment: $('#comment<?php echo $ee->inv_no.$ee->inv_period;?>').val(),
		inv_no: $('#inv_no<?php echo $ee->inv_no.$ee->inv_period;?>').val(),
		inv_period: $('#inv_period<?php echo $ee->inv_no.$ee->inv_period;?>').val(),
	}
	$.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ar/open_invdown_all";
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
