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
			<h6 class="panel-title"><i class="icon-hammer-wrench position-left"></i> บันทึกแจ้งซ่อมแล้วเสร็จ</h6>
		</div>
		<div class="panel-body">
			<form id="form" action="<?php echo base_url(); ?>add_asset/save_repair_form" method="post">
				<div class="row">
					<div class="col-xs-12 form-group">
						<div class="col-xs-2 col-lg-offset-3">
							<label>RP No.</label>
							<input type="text" name="code_doc" class="form-control" value="<?=$data[0]['code_doc'];?>" readonly="true">
						</div>
						<div class="col-xs-3">
							<label>วันที่ออกเอกสาร :</label>
							<input type="date" id="date_doc" name="date_doc" class="form-control" value="<?=$data[0]['date_doc'];?>" readonly="true">
							<input type="hidden" name="num" class="form-control">				
						</div>
						
					</div>
				</div>
				<div class="row" <?= ($data[0]['project_id'] == '') ? 'hidden="hidden"' : '';?> >
					<div class="col-xs-12 form-group">
						<div class="col-xs-2 col-lg-offset-3">
							<label>เลขที่โครงการ :</label>
							<input type="text" name="project_id" id="project_id" class="form-control" readonly="true" value="<?=$data[0]['project_id'];?>">
						</div>
						<div class="col-xs-3">
							<label>ชื่อโครงการ :</label>	
							<input type="text" name="project_name" id="project_name" class="form-control" readonly="true" value="<?=$data[0]['project_name'];?>">
						</div>
					</div>
				</div>
				<div class="row" <?= ($data[0]['department_id'] == '') ? 'hidden="hidden"' : '';?> >
					<div class="col-xs-12 form-group">
						<div class="col-xs-2 col-lg-offset-3">
							<label>เลขที่แผนก :</label>
							<input type="text" name="department_id" id="department_id" class="form-control" readonly="true" value="<?=$data[0]['department_id'];?>">
						</div>
						<div class="col-xs-3">
							<label>ชื่อแผนก :</label>	
							<input type="text" name="department_name" id="department_name" class="form-control" readonly="true" value="<?=$data[0]['department_name'];?>">

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 form-group">
						<div class="col-xs-2 col-lg-offset-3">
							<label>ร้านค้า :</label>
							<input type="text" name="vender_id" id="vender_id" class="form-control" readonly="true" value="<?=$data[0]['vender_id'];?>">
							<input type="hidden" name="id" value="<?=$repair_id;?>">
						</div>
						<div class="col-xs-3">
							<label>&nbsp;</label>	
							<input type="text" name="vender_name" id="vender_name" class="form-control" readonly="true" value="<?=$data[0]['vender_name'];?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 form-group">
						<div class="col-xs-2 col-lg-offset-3">
							<label>ผู้แจ้งซ่อม :</label>
							<input type="text" name="code_usernotify" id="m_code" class="form-control" readonly="true" value="<?=$data[0]['code_usernotify'];?>">
						</div>				
						<div class="col-xs-3">
							<label>&nbsp;</label>
							<input type="text" name="user_notify" id="m_name" class="form-control" readonly="true" value="<?=$data[0]['user_notify'];?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 form-group">
						<div class="col-xs-5 col-lg-offset-3">
							<label>หมายเหตุ :</label>
							<textarea rows="3" name="note" class="form-control" readonly="true"><?=$data[0]['note']; ?></textarea>
						</div>		
					</div>
				</div>
			<div class="row">
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
								<th>สถานะ</th>
								<!-- <th>ลบ</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach ($data as $key => $value) { 
						?>
							<tr>
								<td>
									<?=$value['fa_code'];?>
									<input type="hidden" name="fa_code_old[]" value="<?=$value['fa_code'];?>">
								</td>
								<td><?=$value['fa_name'];?></td>
								<td>
									<input type="text" name="problem_old[]" class="form-control" value="<?=$value['problem'];?>" readonly="true"/>
								</td>
								<td>
								<?php 
									$array_option = array(
										'1' => 'สั่งร้าน',
										'2' => 'เปลี่ยนอะไหล่',
										'3' => 'ซ่อมไม่ได้',
										'4' => 'อื่นๆ',
									);
								?>

									<!-- <select class="form-control process" name="status_repair[]" attr_no="<?=$value['fa_code'];?>" readonly="true">
										<?php foreach ($array_option as $k => $v) { ?>
											<option <?= ($value['status_repair'] == $k) ? 'selected="selected"' : '' ?> value="<?=$k;?>"><?=$v;?></option>
										<?php } ?>
									</select> -->
									<input type="hidden" name="status_repair_old[]" value="<?=$value['status_repair'];?>">
									<input type="text" name="repair_name_old[]" class="form-control input-xss" id="repair_name<?=$value['fa_code'];?>" value="<?=$value['repair_name']?>" readonly="true"/>
									<input <?= ($value['status_repair'] == 4 ) ? 'type="text"' : 'type="hidden"'; ?> name="another_old[]" class="form-control input-xss" id="note<?=$value['fa_code'];?>" readonly="true"  value="<?=$value['another'];?>"/>
								</td>
								<td>
									<input type="date" name="date_succ_old[]" class="form-control date" value="<?=$value['date_succ'];?>" readonly="true">
								</td>
								<td>
									<input type="date" name="date_succ_rel_old[]" class="form-control date_rel" value="<?=$value['date_succ_rel'];?>">
								</td>
								<td>
									<?php 
										$status = array(
											'1' => 'nomal',
											'3' => 'wire off'
										);	
									?>
									<select class="form-control" name="status[]">
										<?php foreach ($status as $k => $v) { ?>
											<option value="<?=$k;?>" <?= ($value['status'] == $k) ? 'selected="selected"' : '';?> ><?=$v;?></option>
										<?php } ?>
									</select>
								</td>
<!-- 								<td>
									<a href="#" onclick="delete_repair_byItem($(this))" del_id="<?=$value['fa_code'];?>" class="label label-danger delete"><i class="icon-trash"></i> Delete</a>
								</td> -->
							</tr>
						<?php 
							} 
						?>
						</tbody>
					</table>
				</form>
				</div>
				<div class="col-xs-12">
					<a  id="save" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</a>
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
	$('.date_rel').change(function(event) {
		/* Act on the event */
		var _val = $(this).val();
		if (_val == '') {
			$(this).attr('class', 'form-control date_rel border-lg border-danger');
		}else{
			$(this).attr('class', 'form-control date_rel border-lg border-success');
		}
	});
	// $('.date_rel').each( function(index, el) {
		// 	if($(el).val() == ""){
		// 		status = false;
		// 		$(el).attr('class', 'form-control date_rel border-lg border-danger');
		// 		return false;
		// 	}else{
		// 		$(el).attr('class', 'form-control date_rel border-lg border-success');
		// 	}
		// });
	function delete_repair_byItem(el) {
		var id = el.attr('del_id');
		var _this = el;
		// alert(id);
		swal({
			  	title: "คุณแน่ใช่ใช่ไหม?",
			  	text: "ต้องการรายการนี้ในแจ้งซ่อม!",
			  	type: "warning",
			  	showCancelButton: true,
			  	confirmButtonClass: "btn-danger",
			  	confirmButtonText: "Yes, delete it!",
			  	closeOnConfirm: false
			},
			function(){
				$.post('<?php echo base_url(); ?>add_asset/del_repair_byItem/'+id, function() {
				}).done(function(data){
					var json_res = jQuery.parseJSON(data);
					if (json_res.status == true) {
						swal("Deleted!", json_res.message, "success");
						_this.parent().parent().remove();
					}else{
						swal("Deleted!", json_res.message, "error");
					}
				});
			});
	}

	function show_input(el) {
		
		var value = el.val();
		var name = el.find('option:selected').text();;
		var fa_code = el.attr("attr_no");

		if(value==4){
			//alert(fa_code);
			$("#note"+fa_code).attr("type","text");
			$("#repair_name"+fa_code).val(name);
		}else{
			$("#note"+fa_code).attr("type","hidden");
			$("#repair_name"+fa_code).val(name);
		}
	}

	$('#vender').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/vender_modal', function() {
		}).done(function(data){
			$('#body_vender').html(data);
			$('#modal_vender').modal('toggle');
		});
	});

	$('#notify').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/member_modal', function() {
		}).done(function(data){
			$('#body_user').html(data);
			$('#modal_member').modal('toggle');
		});
	});

	$('#department').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/department_modal', function() {
		}).done(function(data){
			$('#body_department').html(data);
			$('#modal_department').modal('toggle');
		});
	});

	$('#project').click(function(event) {
		$.get('<?php echo base_url(); ?>add_asset/project_modal', function() {
		}).done(function(data){
			console.log(data);
			$('#body_project').html(data);
			$('#modal_project').modal('toggle');
		});
	});

	$('#save').click(function(event) {
		var array = [];
		var status = true;
		$('.date_rel').each( function(index, el) {
			if($(el).val() == ""){
				status = false;
				$(el).attr('class', 'form-control date_rel border-lg border-danger');
				return false;
			}else{
				$(el).attr('class', 'form-control date_rel border-lg border-success');
			}
		});

		if(status){
			$('#form').submit();
		}
	});
</script>