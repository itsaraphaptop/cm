<?php 
	 $session_data = $this->session->userdata('sessed_in');
	 $username = $session_data['username'];
	 $compcode = $session_data['compcode'];
?>
<script type="text/javascript">
	$('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
  <div class="page-header">
  	<div class="content">
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Tax Invoice Archive</h5>
		<div class="heading-elements">
    	</div>
	</div>

	<div class="panel-body">
		<label>Filter Status:</label>
			<button class="all label bg-orange">Tax Invoice ALL</button>
			<button class="not label label-danger">Tax Invoice not Receipt</button>
			<button class="to label bg-green">Tax Invoice Receipt</button>
	</div>
	<script>
		$(".all").click(function(){
			$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$(".loadtable").load('<?php echo base_url(); ?>ar/arc_receipt_ar_all');
		});
		$(".not").click(function(){
			$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$(".loadtable").load('<?php echo base_url(); ?>ar/arc_receipt_ar_not');
		});

		$(".to").click(function(){
			$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
			$(".loadtable").load('<?php echo base_url(); ?>ar/arc_receipt_ar_to');
		});
	</script>
	<div class="loadtable dataTables_wrapper no-footer">
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-xxs datatable-basic">
				<thead >
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Tax Invoice</th>
						<th class="text-center">Invoice Date</th>
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
					<?php $n=1; foreach($re as $e){?>
					<tr>
						<td><?php echo $n; ?></td>
						<td><?php echo $e->vou_no; ?><input type="hidden" id="vou_no<?php echo $e->vou_no; ?>" value="<?php echo $e->vou_no; ?>"><input type="hidden" id="vou_arno<?php echo $e->vou_no; ?>" value="<?php echo $e->vou_arno; ?>"></td>
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
								<li><a class="realert btn-sm" data-toggle="modal" data-target="#realert<?php echo $e->vou_no;?>"><i class="icon-trash"></i></a></li>
								<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_receipt_report.mrt&no=<?php echo $e->vou_no; ?>&compcode=<?php echo $compcode;?>" data-popup="tooltip" title="" target="_blank" data-original-title="Print"><i class="icon-printer4"></i></a></li>
							 </ul>
						</td>
					</tr>
					<?php $n++;  } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
<?php foreach($re as $ee){ ?>
<div id="realert<?php echo $ee->vou_no;?>" class="modal fade" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        	 <div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h5 class="modal-title">Please fill in the deletion details <?php echo $ee->vou_no; ?></h5>
				</div>
			<div class="modal-body">
               
				<div class="modal-body">
					<input type="text" class="form-control" name="comment" id="comment<?php echo $ee->vou_no;?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="savereceipt<?php echo $ee->vou_no;?>"><i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Cancel</button>
				</div>
            </div>
        </div>
    </div>
</div> 
<script>
	$("#savereceipt<?php echo $ee->vou_no;?>").click(function(){
	var url="<?php echo base_url(); ?>ar_active/ar_receiptremore";
	var dataSet={
		comment: $('#comment<?php echo $ee->vou_no;?>').val(),
		vou_no: $('#vou_no<?php echo $ee->vou_no;?>').val(),
		vou_arno: $('#vou_arno<?php echo $ee->vou_no;?>').val(),
	}
	$.post(url,dataSet,function(data){
        setTimeout(function() {
          window.location.href = "<?php echo base_url(); ?>index.php/ar/ar_receiptall";
        }, 1000);
      });
	} );
</script>
<?php } ?>