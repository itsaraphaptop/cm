<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="control-label">รายงานใบสำคัญ</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-4">
							<a href="<?php echo base_url(); ?>ap_cheque/report_certificate">
								<li class="form-control" style="background-color: #1a66ff;" 
									onMouseover="this.style.backgroundColor='#99bbff';" 
									onMouseout="this.style.backgroundColor='#1a66ff';">
									<p style="color:#FFFFFF;">แสดงรายละเอียด</p><br>
								</li>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-4">
							<a href="<?php echo base_url(); ?>ap_cheque/report_certificate_summary">
								<li class="form-control" style="background-color: #1a66ff;" 
								onMouseover="this.style.backgroundColor='#99bbff';" 
								onMouseout="this.style.backgroundColor='#1a66ff';">
									<p style="color:#FFFFFF;">สรุป</p>
								</li>
						</a>
						</div>
					</div>
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script type="text/javascript">
	$('.datatable-basic').DataTable();
	  $('#report').attr('class', 'active');
      $('#rp1').attr('class', 'active');
      $('#r1').attr('style', 'background-color:#dedbd8');
    </script>