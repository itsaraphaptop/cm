<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">AR Tradding Archive</h5>
				<div class="heading-elements">
					<a type="base_url" href="<?php echo base_url(); ?>index.php/ar/invoice_sales/<?php echo $pro; ?>" class="btn btn-info btn-lg"> New</a>
				</div>
			</div>
			<div class="loadtable dataTables_wrapper no-footer">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-xxs datatable-basic">
						<thead>
							<tr>
								<th width="10%" class="text-center">Invoice No.</th>
								<th width="10%" class="text-center">Invoice Date.</th>
								<th width="25%" class="text-center">System</th>
								<th width="30%" class="text-center">Customer Project</th>
								<th width="20%" class="text-center">Due Date</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<!-- <?php echo "<pre>"; var_dump($trad); ?> -->
							<?php
								foreach ($trad as $key => $value) {
							?>
								<tr>
									<td><?= $value['trad_inv'] ?></td>
									<td><?= $value['inv_date'] ?></td>
									<td><?= $value['systemname'] ?></td>
									<td><?= $value['cus_projectname'] ?></td>
									<td><?= $value['due_date'] ?></td>
									<td>
										<a href="<?php echo base_url(); ?>ar/edit_invoice_sales/<?= $pro; ?>/<?= $value['trad_inv'];?>/<?= $value['trad_id'];?>">
											<i class="icon-folder-open"></i>
										</a>

										<a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=invoice_tradding.mrt&tid=<?php echo $value['trad_inv'];?>"><i class="icon-printer4"></i>
										</a>

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