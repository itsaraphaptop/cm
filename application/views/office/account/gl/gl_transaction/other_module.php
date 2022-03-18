<div class="page-header">
	<div class="panel-body">
		<div class="row">
			<div class="col-sm-12">
				<h4>List of Voucher frome Other Module <button class="label bg-blue" id="click_select">Click</button></h4>
			</div>

			<div class="col-sm-4">
				<div class="table-responsive">
							<table class="table table-bordered table-xs">
								<thead>
									<tr>
										<th>Action</th>
										<th>#</th>
										<th>Vocher</th>
										<th>Date</th>
										<th>Module</th>
										<th>POST</th>
										
									</tr>
								</thead>
								<tbody id="loadglpost">
									
									
								</tbody>
							</table>
						</div>
			</div>

			<div class="col-sm-8">
				<div class="table-responsive">
							<table class="table table-bordered table-xs">
								<thead>
									<tr>
										<th>#</th>
										<th>Vocher No.</th>
										<th>Date</th>
										<th>A/C.</th>
										<th>Project / Department</th>
										<th>Job</th>
										<th>Costcode</th>
										<th class="text-right">dr.</th>
										<th class="text-right">cr.</th>
									</tr>
								</thead>
								<tbody id="detail_gl">
									
									
								</tbody>
							</table>
						</div>
			</div>
		</div>
	</div>
</div>
<div id="modal_form_vertical" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h5 class="modal-title">Criteria</h5>
			</div>
			<form action="#">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>GL Year</label>
								<input value="<?php echo date('Y'); ?>" type="number" id="glyear"  class="form-control input-xs text-center">
							</div>
							<div class="col-sm-6">
								<label>GL Period</label>
								<input value="<?php echo date('m'); ?>" type="number" id="glperiod"  class="form-control input-xs text-center">
							</div>
						
					
							<!-- <div class="col-sm-6">
								<label>Data type</label>
								<select  id="datatype" class="form-control input-xs">
									<option value=""></option>
									<option value="all">ALL</option>
									<option value="apv">AP (P/O)</option>
									<option value="aps">AP (Subcontractor)</option>
									<option value="apo">AP (Other)</option>
									<option value="pvpl">PV / PL</option>
								</select>
							</div> -->
							</div>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-link btn-xs" data-dismiss="modal">Close</button>
						<button type="button" id="glaa"  class="btn btn-primary btn-xs">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		$('#glaa').click(function(event) {
			$('#modal_form_vertical').modal('toggle');
			var glyear = $('#glyear').val();
			var glperiod = $('#glperiod').val();

			$('#loadglpost').load('<?php echo base_url(); ?>gl/loadglpost/'+glyear+'/'+glperiod);
		});
	</script>

	<script>
		$('#modal_form_vertical').modal('show');


		$('#click_select').click(function(event) {
			$('#modal_form_vertical').modal('show');
		});
	</script>