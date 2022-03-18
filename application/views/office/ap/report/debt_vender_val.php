<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="control-label">รายงานการตัดเจ้าหนี้ (แสดงรายละเอียด)</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/report_debt_vender" method="post">
					<div class="row">
						<div class="form-group col-sm-12">
							<div class="col-sm-4">
								เจ้าหนี้ 
								<select class="form-control input-sm" name="vender">
									<option value="">ทั้งหมด</option>
									<?php foreach ($vender as $key => $value) { ?>
									<option value="<?=$value->vender_code?>"><?=$value->vender_name?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-4">
								โครงการ 
								<select class="form-control input-sm" name="pro">
									<option value="">ทั้งหมด</option>
									<?php foreach ($project as $key => $value) { ?>
									<option value="<?=$value->project_code?>"><?=$value->project_name?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-4">
								ระบบ 
								<select class="form-control input-sm" name="system">
									<option value="">ทั้งหมด</option>
									<?php foreach ($system as $key => $value) { ?>
									<option value="<?=$value->systemcode?>"><?=$value->systemname?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<div class="col-sm-2"> 
								เลขที่เช็ค (จาก)
								<select class="form-control input-sm" name="chkno1">
									<option value="">ทั้งหมด</option>
									<?php foreach ($ap as $key => $value) { ?>
									<option value="<?=$value->ap_code?>"><?=$value->ap_code?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-2">
								เลขที่เช็ค (ถึง)
								<select class="form-control input-sm" name="chkno2">
									<option value="">ทั้งหมด</option>
									<?php foreach ($ap as $key => $value) { ?>
									<option value="<?=$value->ap_code?>"><?=$value->ap_code?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-2">
								เลขที่ PL/PV (จาก)
								<select class="form-control input-sm" name="plno1">
									<option value="">ทั้งหมด</option>
									<?php foreach ($pl as $key => $value) { ?>
									<option value="<?=$value->ap_pl?>"><?=$value->ap_pl?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-2">
								เลขที่ PL/PV (ถึง)
								<select class="form-control input-sm" name="plno2">
									<option value="">ทั้งหมด</option>
									<?php foreach ($pl as $key => $value) { ?>
									<option value="<?=$value->ap_pl?>"><?=$value->ap_pl?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-sm-4">
								ธนาคาร 
								<select class="form-control input-sm" name="bank">
									<option value="">ทั้งหมด</option>
									<?php foreach ($bank as $key => $value) { ?>
									<option value="<?=$value->bank_code?>"><?=$value->bank_name?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<div class="col-sm-2"> 
								วันที่เช็ค (จาก)
								<input type="date" class="form-control input-sm" name="chkdate1">
							</div>
							<div class="col-sm-2">
								วันที่เช็ค (ถึง)
								<input type="date" class="form-control input-sm" name="chkdate2">
							</div>
							<div class="col-sm-2">
								วันที่ตัดหนี้ (จาก)
								<input type="date" class="form-control input-sm" name="cleardate1">
							</div>
							<div class="col-sm-2">
								วันที่ตัดหนี้ (ถึง)
								<input type="date" class="form-control input-sm" name="cleardate2">
							</div>
						</div>
					</div>
					<div class="form-group col-sm-12" style="text-align: right; ">
						<button class="btn btn-success btn-xs">Search</button>
						<a href="<?=base_url();?>ap_cheque/view_debt_vender" type="button" class="btn btn-danger btn-xs">Close</a>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>