<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-header">
				<div class="col-sm-12">
					<h3 class="control-label"> รายงานทะเบียนเช็ค </h3>
				</div>
			</div>
			<div class="panel-body" class="result">
				<form method="post" action="<?php echo base_url(); ?>ap_cheque/report_ap_cheque">
					<div class="form-group">
						<div class="row col-sm-12">
							<label class="control-label"><h5>Payment Status</h5></label><br>
								<input type="radio" class="choice" name="paystatus" value="" checked>all &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" class="choice" name="paystatus" value="wait"> not Paid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" class="choice" name="paystatus" value="confirm"> Paid not clear &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" class="choice" name="paystatus" value="complete"> Clear PV/PL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
					</div>
					<div class="row col-sm-12">
						<br>
					</div>
					<div class="col-sm-12">
						<div class="form-group footer-modal">
							<div class="col-sm-10"></div>
							<div class="col-sm-1">
								<button class="btn btn-success" id="submit" type="submit"> Search </button>
							</div>
							<div class="col-sm-1">
								<button class="btn btn-danger" id="back" type="button"> Close </button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#back').click(function(event) {
		window.location.href = "<?=base_url();?>ap_cheque/view_ap_cheque";
	});
</script>