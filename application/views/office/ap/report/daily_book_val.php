<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="control-label">รายงานสมุดรายวัน AP</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/report_daily_book" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-3">
									YEAR
									<input type="number" class="input-sm form-control" name="year" value="<?php echo date("Y") ?>">
								</div>
								<div class="col-sm-3">
									PERIOD
									<input type="number" class="input-sm form-control" name="period" value="<?php echo date("m") ?>">
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-3">
									Voucher Code
									<select class="input-sm form-control" name="code_vouc">
										<option value="">เลือกทั้งหมด</option>
										<?php foreach ($ap as $key => $value) { ?>
											<option value="<?=$value['vchno'];?>"><?=$value['vchno'];?></option>";
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-3">
									Voucher Date
									<input type="date" name="date_vouc" class="input-sm form-control">
								</div>
								<div class="col-sm-3">
									Project/Department
									<select class="input-sm form-control" name="id_pro">
										<option value="">เลือกทั้งหมด</option>
										<?php foreach ($pro as $key => $val) { ?>
											<option value="<?=$val->project_id;?>"><?=$val->project_name;?></option>";
										<?php } ?>
									</select>
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