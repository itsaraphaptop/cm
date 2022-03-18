<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Home</span> - Repair</h4>
		</div>
		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
				<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
			</div>
		</div>
		<a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a>
	</div>
	<div class="breadcrumb-line">
		<ul class="breadcrumb">
			<li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
			<li class="active">แจ้งซ่อมอุปกรณ์</li>
		</ul>
		<ul class="breadcrumb-elements">
			<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-gear position-left"></i>
					Settings
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
					<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
					<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
				</ul>
			</li>
		</ul>
		<a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
	</div>
</div>
<div class="content">
	<div class="panel panel-flat ">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-hammer-wrench position-left"></i>Repair</h6>
		</div>
		<div class="panel-body">
			<form id="form" action="<?php echo base_url(); ?>add_asset/add_repair" method="post">
			<div class="row">
				<div class="col-xs-12 form-group">
					<div class="col-xs-2 col-lg-offset-3">
						<label>RP No.</label>
						<input type="text" name="code_doc" class="form-control" value="<?=$code_run;?>" readonly="true">
					</div>
					<div class="col-xs-2">
						<label>วันที่ออกเอกสาร :</label>
						<input type="date" id="date_doc" name="date_doc" class="form-control" value="<?php echo date("Y-m-d");?>">
						<input type="hidden" name="num" class="form-control">				
					</div>
					<div class="col-xs-1">
						<label>&nbsp;</label>
						<select class="form-control" id="select" name="type">
							<option value="p">Project</option>
							<option value="d">Department</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row" id="sel_pro">
				<div class="col-xs-12 form-group">
					<div class="col-xs-2 col-lg-offset-3">
						<label>เลขที่โครงการ :</label>
						<input type="text" name="project_id" id="project_id" class="form-control" readonly="true">
					</div>
					<div class="col-xs-3">
						<label>ชื่อโครงการ :</label>	
						<div class="input-group">
							<input type="text" name="project_name" id="project_name" class="form-control" readonly="true">
							<span class="input-group-addon bg-primary" style="cursor: pointer;" id="project"><i class="icon-search4"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row" hidden="hidden" id="sel_depart">
				<div class="col-xs-12 form-group">
					<div class="col-xs-2 col-lg-offset-3">
						<label>เลขที่แผนก :</label>
						<input type="text" name="department_id" id="department_id" class="form-control" readonly="true">
					</div>
					<div class="col-xs-3">
						<label>ชื่อแผนก :</label>	
						<div class="input-group">
							<input type="text" name="department_name" id="department_name" class="form-control" readonly="true">
							<span class="input-group-addon bg-primary" style="cursor: pointer;" id="department"><i class="icon-search4"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					<div class="col-xs-2 col-lg-offset-3">
						<label>ร้านค้า :</label>
						<input type="text" name="vender_id" id="vender_id" class="form-control" readonly="true">
					</div>
					<div class="col-xs-3">
						<label>&nbsp;</label>	
						<div class="input-group">
							<input type="text" name="vender_name" id="vender_name" class="form-control" readonly="true">
							<span class="input-group-addon bg-primary" style="cursor: pointer;" id="vender"><i class="icon-search4"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 form-group">
					<div class="col-xs-2 col-lg-offset-3">
						<label>ผู้แจ้งซ่อม :</label>
						<input type="text" name="code_usernotify" id="m_code" class="form-control" readonly="true">
					</div>				
					<div class="col-xs-3">
						<label>&nbsp;</label>
						<div class="input-group">
							<input type="text" name="user_notify" id="m_name" class="form-control" readonly="true">
							<span class="input-group-addon bg-primary" style="cursor: pointer;" id="notify"><i class="icon-search4"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-5 col-lg-offset-3">
						<label>หมายเหตุ :</label>
						<textarea rows="3" name="note" class="form-control"></textarea>
					</div>		
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 form-group">
					<button type="button" class="btn bg-teal-400" id="asset">เลือกทรัพย์สิน</button>
				</div>
				<div class="col-xs-12 form-group">
					<table class="table table-striped table-bordered table-xxs table-hover" id="repair">
						<thead>
							<tr>
								<th>หมายเลขเครื่อง</th>
								<th>ชนิด/ยี่ห้อ/รุ่น/เครื่องจักร/อุปรกรณ์</th>
								<th>ปัญหาที่แจ้ง /อาการเสีย</th>
								<th>การดำเนินการ</th>
								<th>กำหนดคาดว่าแล้วเสร็จ</th>
								<th>กำหนดเสร็จจริง</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="body_tabeldetail">
						
						</tbody>
					</table>
				</form>
				</div>
				<div class="col-xs-12">
					<button type="button" id="save" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Vender modal -->
<div id="modal_vender" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">เลือกร้านค้า</h5>
			</div>
			<div class="modal-body" id="body_vender">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /Vender modal -->

<!-- Asset modal -->
<div id="modal_asset" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">เลือกทรัพย์สิน</h5>
			</div>
			<div class="modal-body" id="body_asset">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /Asset modal -->

<!-- Notify modal -->
<div id="modal_member" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">เลือกผู้แจ้งซ่อม</h5>
			</div>
			<div class="modal-body" id="body_user">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /Notify modal -->

<!-- Project modal -->
<div id="modal_project" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">เลือกโครงการ</h5>
			</div>
			<div class="modal-body" id="body_project">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /Project modal -->

<!-- Department modal -->
<div id="modal_department" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">เลือกโครงการ</h5>
			</div>
			<div class="modal-body" id="body_department">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- /Department modal -->

<script type="text/javascript">
	$('#select').change(function(event) {
		var _val = $(this).val();
		
		if(_val == 'p') {
			$('#department_id').val('');
			$('#department_name').val('');
			$('#sel_depart').attr('hidden','hidden');
			$('#sel_pro').removeAttr('hidden');
		}else{
			$('#project_id').val('');
			$('#project_name').val('');
			$('#sel_pro').attr('hidden','hidden');
			$('#sel_depart').removeAttr('hidden');
		}
	});

	$('#project').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/project_modal', function() {
		}).done(function(data){
			console.log(data);
			$('#body_project').html(data);
			$('#modal_project').modal('toggle');
		});
	});

	$('#vender').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/vender_modal', function() {
		}).done(function(data){
			$('#body_vender').html(data);
			$('#modal_vender').modal('toggle');
		});
	});


	$('#department').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/department_modal', function() {
		}).done(function(data){
			$('#body_department').html(data);
			$('#modal_department').modal('toggle');
		});
	});

	$('#notify').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/member_modal', function() {
		}).done(function(data){
			$('#body_user').html(data);
			$('#modal_member').modal('toggle');
		});
	});

	$('#asset').click(function(event) {
		var project = $('#project_id').val();
		var department = $('#department_id').val();
		if (project != '' || department != '') {
			var check_type = $('#select').val();
			var date_doc = $('#date_doc').val();
			var date_succ = $('#date_succ').val();

			if (date_doc == '') {
				swal('กรุณากรอก','วันที่ออกเอกสาร!','error');
				return false;
			}		
			if (check_type =='p') {

				$.get('<?php echo base_url(); ?>add_asset/asset_modal/'+check_type+'/'+project, function() {
				}).done(function(data){
					// console.log(data);
					$('#body_asset').html(data);
					$('#modal_asset').modal('toggle');
				});
			}else if (check_type =='d') {
				$.get('<?php echo base_url(); ?>add_asset/asset_modal/'+check_type+'/'+department, function() {
				}).done(function(data){
					// console.log(data);
					$('#body_asset').html(data);
					$('#modal_asset').modal('toggle');
				});
			}
		}else{
			swal('กรุณาเลือก','โครงการหรือแผนก','error');
		}
	});

	$('#save').click(function(event) {
		var m_name = $('#m_name').val();
		var lenght = $('#body_tabeldetail > tr').length;
		if (m_name == '') {
			swal('กรุณาเลือก','ชื่อผู้แจ้งซ่อม','error');
			return false;
		}

		if (lenght == 0) {
			swal('กรุณาเลือก','รายการทรัพย์สิน','error');
			return false;
		}else{

			var status = true;
			$('.date').each( function(index, el) {
				if($(el).val() == ""){
					status = false;
					$(el).attr('class', 'form-control date border-lg border-danger');
					return false;
				}else{
					$(el).attr('class', 'form-control date border-lg border-success');
				}
			});

			$('.date').change(function(event) {
				if($(el).val() == ""){
					$(el).attr('class', 'form-control date border-lg border-danger');
				}else{
					$(el).attr('class', 'form-control date border-lg border-success');
				}
			});

			if(status){
				$('#form').submit();
			}
		}


	});
</script>