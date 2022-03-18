
<?php 
	 $session_data = $this->session->userdata('sessed_in');
	 $username = $session_data['username'];
	 $compcode = $session_data['compcode'];
?>
<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Invoice Down Archive</h5>
				<div class="heading-elements">
				</div>
			</div>

			<div class="panel-body">
				<label>Filter Status:</label>
				<button class="all label bg-orange"> Invoice Down ALL</button>
				<button class="not label label-danger">Invoice Down not Receipt</button>
				<button class="to label bg-green">Invoice Down Receipt</button>
			</div>
			<script>
				// $(document).ready(function() {
					$(".loadtable").html(
						"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
					);
					$(".loadtable").load('<?php echo base_url(); ?>ar/archivedown_ar_all');
				// });
				$(".all").click(function() {
					$(".loadtable").html(
						"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
					);
					$(".loadtable").load('<?php echo base_url(); ?>ar/archivedown_ar_all');
				});
				$(".not").click(function() {
					$(".loadtable").html(
						"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
					);
					$(".loadtable").load('<?php echo base_url(); ?>ar/archivedown_ar_not');
				});

				$(".to").click(function() {
					$(".loadtable").html(
						"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
					);
					$(".loadtable").load('<?php echo base_url(); ?>ar/archivedown_ar_to');
				});
			</script>
			<div class="loadtable dataTables_wrapper no-footer">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-xxs datatable-basic">
						<thead>
							<tr>
								<th class="text-center">No.</th>
								<th class="text-center">Invoice Down</th>
								<th class="text-center">Invoice Date</th>
								<th class="text-center">Project Name</th>
								<th class="text-center">Owner/Customer</th>
								<th class="text-center">Credit Term</th>
								<th class="text-center">Period</th>
								<th class="text-center">VAT</th>
								<th class="text-center">W/T</th>
								<th class="text-center">Amount</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=1; foreach($down as $e){?>
							<?php 
					$de=$this->db->query("SELECT sum(inv_vatamt) as vatamt,sum(inv_lesswt) as inv_wt,sum(inv_downamt) as toamt from ar_invdown_detail where inv_ref = '$e->inv_no' and inv_period = $e->inv_period")->result();
					foreach ($de as $dd) {									
						$vatamt = $dd->vatamt;
						$wtamt = $dd->inv_wt;
						$amt = $dd->toamt;
				 	?>
							<tr>
								<td>
									<?php echo $n; ?>
								</td>
								<td>
									<?php echo $e->inv_no; ?>
									<input type="hidden" id="inv_no<?php echo $e->inv_no.$e->inv_period; ?>" value="<?php echo $e->inv_no; ?>">
									<input type="hidden" id="inv_period<?php echo $e->inv_no.$e->inv_period; ?>"
									 value="<?php echo $e->inv_period; ?>">
								</td>
								<td>
									<?php echo $e->inv_date; ?>
								</td>
								<td>
									<?php echo $e->project_name; ?>
								</td>
								<td>
									<?php echo $e->debtor_name; ?>
								</td>
								<td>
									<?php echo $e->inv_credit; ?>
								</td>
								<td>
									<?php echo $e->inv_period; ?>
								</td>
								<td>
									<?php echo $dd->vatamt; ?>
								</td>
								<td>
									<?php echo $dd->inv_wt; ?>
								</td>
								<td>
									<?php echo $dd->toamt; ?>
								</td>
								<td>
									<ul class="icons-list">
										<li>
											<a class="realert btn-sm" data-toggle="modal" data-target="#realert<?php echo $e->inv_no.$e->inv_period;?>">
												<i class="icon-trash"></i>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>ar/ar_edit_invdown/<?php echo $e->inv_no; ?>/<?php echo $e->inv_period; ?>"
											 data-popup="tooltip" title="">
												<i class="icon-pencil7"></i>
											</a>
										</li>
										<li>
											<a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ar_invdown_report.mrt&id=<?php echo $e->inv_no; ?>&period=<?php echo $e->inv_period; ?>&compcode=<?php echo $compcode;?>"
											 data-popup="tooltip" title="" target="_blank" data-original-title="Print">
												<i class="icon-printer4"></i>
											</a>
										</li>
									</ul>
								</td>
							</tr>
							<?php $n++; } } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php foreach($down as $ee){ ?>
<div id="realert<?php echo $ee->inv_no.$ee->inv_period;?>" class="modal fade"
 data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header  bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Please fill in the deletion details
					<?php echo $ee->inv_no; ?>
				</h5>
			</div>
			<div class="modal-body">

				<div class="modal-body">
					<input type="text" class="form-control" name="comment" id="comment<?php echo $ee->inv_no.$ee->inv_period;?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" id="savedown<?php echo $ee->inv_no.$ee->inv_period;?>">
						<i class="icon-floppy-disk"></i> Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="icon-close2"></i> Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$("body").attr('class', 'navbar-top pace-done');
	$("#savedown<?php echo $ee->inv_no.$ee->inv_period;?>").click(function() {
		var url = "<?php echo base_url(); ?>ar_active/ar_downremore";
		var dataSet = {
			comment: $('#comment<?php echo $ee->inv_no.$ee->inv_period;?>').val(),
			inv_no: $('#inv_no<?php echo $ee->inv_no.$ee->inv_period;?>').val(),
			inv_period: $('#inv_period<?php echo $ee->inv_no.$ee->inv_period;?>').val(),
		}
		$.post(url, dataSet, function(data) {
			setTimeout(function() {
				window.location.href =
					"<?php echo base_url(); ?>index.php/ar/open_invdown_all";
			}, 1000);
		});
	});
</script>
<?php } 
