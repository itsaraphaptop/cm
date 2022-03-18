<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="control-label">รายงานภาษีหัก ณ ที่จ่าย</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/view_withholding_taxes_data" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-12">
									เลือก
								</div>
								<div class="col-sm-1">
									<input type="radio" name="type" value="1" checked=""> ภ.ง.ด 53
								</div>
								<div class="col-sm-1">
									<input type="radio" name="type" value="2"> ภ.ง.ด 3
								</div>
								<div class="col-sm-1">
									<input type="radio" name="type" value="3"> ภ.ง.ด 1
								</div>
								<div class="col-sm-1">
									<input type="radio" name="type" value="4"> ภ.ง.ด 2
								</div>
								<div class="col-sm-1">
									<input type="radio" name="type" value="5"> อื่นๆ
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-2">
									YEAR
									<input type="number" class="form-control" name="year" value="<?php echo date("Y") ?>">
								</div>
								<div class="col-sm-2">
									MONTH
									<input type="number" class="form-control" name="month" value="<?php echo date("m") ?>">
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