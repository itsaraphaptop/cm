<div class="content-wrapper">
	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="control-label">รายงานการตัดเจ้าหนี้ (สรุป)</h3>
					</div>
				</div>
				<form action="<?=base_url();?>ap_cheque/report_debt_vender_all" method="post">
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