<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">PR Booking Archive</h5>
				<div class="heading-elements">
				</div>
			</div>
			<div class="loadtable dataTables_wrapper no-footer">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-xxs datatable-basic">
						<thead>
							<tr>
								<th width="10%" class="text-center">PB No.</th>
								<th width="20%" class="text-center">PB Date.</th>
								<th width="15%" class="text-center">Name</th>
								<th width="20%" class="text-center">System</th>
								<th width="80%" class="text-center">Detail</th>
								<th width="8%" class="text-center">Approval Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php
								foreach ($archive as $key => $value) {
							?>
								<tr>
									<td><?= $value->pb_no ?></td>
									<td><?= $value->pb_date ?></td>
									<td><?= $value->pb_useradd ?></td>
									<td><?= $value->systemname ?></td>
									<td><?= $value->pb_remark ?></td>
									<td><?= $value->pb_approve ?></td>
									<td>
										<a id="openpo_v" class="preload booking" href="#" data-toggle="modal" pb_no="<?= $value->pb_no ?>" data-target="#view_booking">
											<i class="icon-folder-open"></i>
										</a>

										<a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_booking.mrt&pb=<?php echo $value->pb_id; ?>&pri=<?php echo $value->pb_no; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a>

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
	</div>
</div>



<div id="view_booking" class="modal fade" role="dialog">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div id="booking_v">
			
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.booking').click(function(event) {
		var pb_no = $(this).attr('pb_no');
		$('#booking_v').load('<?php echo base_url(); ?>office/booking_view/'+pb_no);
	
	});
</script>