<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="control-label">รายงานภาษีซื้อ</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/view_sales_tax_newvat" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-3">
									YEAR
									<input type="number" class="form-control" name="year" value="<?php echo date("Y") ?>">
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-3">
									MONTH
									<input type="number" class="form-control" name="month" value="<?php echo date("m") ?>">
								</div>
								<div class="col-sm-3">
									<br>
									<input type="checkbox" name="month_only" checked="" value="1"> This Monthly Only
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-12">
									Data
								</div>
								<br>
								<div class="col-sm-12">
										<div class="col-sm-2">
											<input type="radio" name="data" value="1" checked> New VAT
										</div>
										<div class="col-sm-3">
											<input type="radio" name="data" value="2"> Existing VAT
										</div>
								</div>
							</div>
						</div>
					</div>
						<div class="form-group col-sm-12" style="text-align: right; ">
							<button class="btn btn-success btn-xs">Search</button>
							<a href="<?=base_url();?>ap/main_index" type="button" class="btn btn-danger btn-xs">Close</a>
						</div>
				</form>	
			</div>
		</div>
	</div>
</div>