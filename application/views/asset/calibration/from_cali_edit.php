<div class="page-header">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Home</span> - External Calibration Master Plan & Master List</h4>
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
			<li class="active">แผนการสอบเทียบเครื่องมือวัดส่งภายนอก</li>
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
			<h6 class="panel-title"><i class="icon-hammer-wrench position-left"></i>External Calibration Master Plan & Master List</h6>
		</div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>add_asset/edit_calibration" id="form_cali">		
			<div class="row form-group">
				<div class="col-xs-2 col-xs-offset-2">
					<label>EC No :</label>
					<input type="text" name="ec_code" class="form-control" readonly="true" value="<?=$data[0]['cb_code'];?>">
					<input type="hidden" name="id_bin" value="<?=$id_bin;?>">
				</div>
				<div class="col-xs-3">
					<label>เตรียมการโดย :</label>
					<div class="input-group">
						<input type="text" name="prepareBy_name" class="form-control" id="prepareBy_name" value="<?=$data[0]['prepareby_name'];?>" readonly="true">
						<input type="hidden" name="prepareBy_code" id="prepareBy_code" value="<?=$data[0]['prepareby_code'];?>">
						<span class="input-group-addon bg-primary" id="prepare_search" style="cursor: pointer;"><i class="icon-search4"></i></span>
					</div>
				</div>
				<div class="col-xs-3">
					<label>ตรวจสอบโดย :</label>
					<div class="input-group">
						<input type="text" name="checkBy_name" id="checkBy_name" class="form-control" value="<?=$data[0]['checkby_name'];?>" readonly="true">
						<input type="hidden" name="checkBy_code" id="checkBy_code" value="<?=$data[0]['checkby_code']?>">
						<span class="input-group-addon bg-primary" id="check_search" style="cursor: pointer;"><i class="icon-search4"></i></span>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-xs-1 col-xs-offset-2">
					<label>Project No :</label>
					<input type="text" id="project_id" class="form-control" value="" readonly="true">
				</div>
				<div class="col-xs-3">
					<label>Project Name :</label>	
					<div class="input-group">
						<input type="text" id="project_name" class="form-control" value="" readonly="true">
						<span class="input-group-addon bg-primary" style="cursor: pointer;" id="project_search"><i class="icon-search4"></i></span>
					</div>
				</div>
				<div class="col-xs-1">
					<label>Department No :</label>
					<input type="text" id="department_id" class="form-control" readonly="true">
				</div>
				<div class="col-xs-3">
					<label>Department Name :</label>
					<div class="input-group">
						<input type="text" id="department_name" class="form-control"  readonly="true">
						<span class="input-group-addon bg-primary" style="cursor: pointer;" id="department_search"><i class="icon-search4"></i></span>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<button type="button" class="btn bg-teal-400" id="add_item"><i class="icon-plus-circle2"></i> Add tiem</button>
			</div>
			<div class="row form-group">
				<div class="table-responsive">
				<table class="table table-striped table-bordered table-xxs table-hover" style="overflow-x: auto">
					<thead>
						<tr>
							<th><div style="width: 200px;">แผนก/โครงการที่ใช้งาน</div></th>
							<th><div style="width: 200px;">ชื่อเครื่องมือวัด</div></th>
							<th><div style="width: 200px;">ยี่ห้อ/รุ่น</div></th>
							<th><div style="width: 200px;">Serial No.</div></th>
							<th><div style="width: 200px;">เลขที่ ID</div></th>
							<th><div style="width: 200px;">ระยะเวลาสอบเทียบ</div></th>
							<th><div style="width: 200px;">วันที่สอบเทียบ</div></th>
							<th><div style="width: 200px;">วันสอบเทียบครั้งต่อไป</div></th>
							<th><div style="width: 200px;">ผลการครวจสอบค่าใน Certification Of Calibration</div></th>
							<th><div style="width: 200px;">การจัดการเครื่องมือที่ไม่ผ่าน (ระบุด้วย)</div></th>
							<th><div style="width: 200px;">ผู้ตรวจสอบ</div></th>
							<th></th>
						</tr>
					</thead>
					<tbody id="body_cb">
					<?php foreach ($data as $key => $value) { ?>
						<tr>
							<td>
								<?=$value['name'];?>
								<input type="hidden" name="name_old[]" class="form-control" value="<?=$value['name'];?>">	
								<input type="hidden" name="pro_id_old[]" value="<?=$value['project_id'];?>">
								<input type="hidden" name="type_old[]" value="<?=$value['type'];?>">	
								<input type="hidden" name="asset_id[]" value="<?=$value['id'];?>">	
							</td>
							<td>
							<div class="input-group">
								<input type="text" id="asset_pro<?=$value['asset_id'];?>" name="asset_pro_old[]" class="form-control" readonly="true" value="<?=$value['asset_name'];?>">
								<span class="input-group-addon bg-primary" style="cursor: pointer;" asset_pro="<?=$value['asset_id'];?>" pro_id="<?=$value['project_id'];?>" type="<?=$value['type'];?>" onclick="sel_asset($(this))"><i class="icon-search4"></i></span>
							</div>
							</td>
							<td>
								<input type="text" name="band_pro_old[]" class="form-control" id="band_pro<?=$value['asset_id'];?>" value="<?=$value['band_name'];?>" readonly="true">
							</td>
							<td>
								<input type="text" name="ser_no_pro_old[]" class="form-control" id="ser_no_pro<?=$value['asset_id'];?>" value="<?=$value['serail_number'];?>" readonly="true">
							</td>
							<td>
								<input type="text" name="num_id_pro_old[]" class="form-control" id="num_id_pro<?=$value['asset_id'];?>" value="<?=$value['asset_id'];?>" readonly="true">
							</td>
							<td>
								<input type="text" name="cali_period_old[]" class="form-control" id="date_one<?=$value['asset_id'];?>" value="<?=$value['cali_period'];?>" readonly="true">
							</td>
							<td>
								<input type="date" name="cali_date_old[]" class="form-control" id="date_two<?=$value['asset_id'];?>" attr_id="<?=$value['asset_id'];?>" onchange="myDate1($(this))"  value="<?=$value['cali_date'];?>">
							</td>
							<td>
								<input type="date" name="next_cali_date_old[]" class="form-control" id="date_three<?=$value['asset_id'];?>" attr_id="<?=$value['asset_id'];?>" onchange="myDate2($(this))" value="<?=$value['next_cali_date'];?>">
							</td>
							<td>
							<?php $array = array('','ไม่ผ่าน','ผ่าน'); ?>
							<select class="form-control" name="cali_check_old[]">
							<?php foreach ($array as $k => $v) { ?>
								<option value="<?=$k;?>" <?= ($value['cali_check'] == $k) ? 'selected="selected"' : ''; ?>><?=$v;?></option>
							<?php } ?>
							</select>
							</td>
							<td>
								<input type="text" name="mana_asset_old[]" class="form-control" value="<?=$value['mana_asset']?>">
							</td>
							<td>
							<div class="input-group">
								<input type="text" id="user_check<?=$value['asset_id'];?>" name="user_check_old[]" class="form-control" value="<?=$value['user_check'];?>">
								<span class="input-group-addon bg-primary" style="cursor: pointer;" row="<?=$value['asset_id'];?>" pro_id="<?=$value['project_id'];?>"  onclick="user_check($(this))"><i class="icon-search4"></i></span>
							</div>
							</td>
							<td>
								<a href="#" class="label label-danger" del_id="<?=$value['id'];?>" onclick="del_cali_item($(this))"><i class="icon-trash"></i> Delete</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
			</div>
			</form>
			<div class="row form-group">
				<button type="button" class="btn btn-success" id="save"><i class="icon-floppy-disk"></i> Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title" id="title_md"></h5>
			</div>
			<div class="modal-body" id="body_modal">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->

<script type="text/javascript">
	var base_url = "<?=base_url(); ?>";
	var pro_id 			= $('#project_id').val();
	var pro_name 		= $('#project_name').val();
	var depart_id 		= $('#department_id').val();
	var depart_name 	= $('#department_name').val();
	var prepareBy_code 	= $('#prepareBy_code').val();
	var prepareBy_name 	= $('#prepareBy_name').val();
	var checkBy_code 	= $('#checkBy_code').val();
	var checkBy_name 	= $('#checkBy_name').val();
	function sel_asset(el){
		var asset_pro = el.attr('asset_pro');
		var pro_id = el.attr('pro_id');
		var type = el.attr('type');
		// alert(pro_id+" "+asset_pro);
		if (type == 'p') {
			$.post(base_url+'add_asset/asset_byitem/'+pro_id+'/'+asset_pro+'/p', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$('#title_md').html('ชื่อเครื่องมือวัด');
				$('#body_modal').html(data);
				$('#modal').modal('toggle');
			});
		}else if (type == 'd') {
			// alert('depart');
			$.post(base_url+'add_asset/asset_byitem/'+pro_id+'/'+asset_pro+'/d', function() {
				/*optional stuff to do after success */
			}).done(function(data){
				$('#title_md').html('ชื่อเครื่องมือวัด');
				$('#body_modal').html(data);
				$('#modal').modal('toggle');
			});
		}

	}	

	function user_check(el){
		// console.log(el);
		var row = el.attr('row');
		var pro_id = el.attr('pro_id');
		// alert(row+" "+pro_id);
		$.post(base_url+'add_asset/modal_checkTr/'+row, function() {
			/*optional stuff to do after success */
		}).done(function(data){
			// $('#body_modal1').empty();
			// $('#title_md1').empty();
			$('#title_md').html('ชื่อผู้ตรวจสอบ');
			$('#body_modal').html(data);
			$('#modal').modal('toggle');
		});

	}

	function delete_row(el) {
		el.parent().parent().remove();
	}

	function myDate1(el) {
		var val = $(el).val();
		var id = $(el).attr('attr_id');

	   	var year = val.substring(0, 4)*1+1;
	   	var month = val.substring(5, 7);
	   	var day = val.substring(8,10);
	   	var date_three = $('#date_three'+id).val();
	   	if (date_three !='') {
			$.post('<?php echo base_url(); ?>add_asset/time_cali/'+val+'/'+date_three,function() {

			}).done(function(data) {
				var to = id;
				var json_res = jQuery.parseJSON(data);
				var patt = '';
				console.log(json_res);
				if (json_res.y != 0) {

					patt += json_res.y+' ปี ';

					if (json_res.m != 0) {
						patt += json_res.y+' เดือน ';
					}
					if (json_res.d != 0) {
						patt += json_res.d+' วัน';
					}
					$('#date_one'+to).val('');
					$('#date_one'+to).val(patt);

				}else{
					if (json_res.m != 0) {
						patt += json_res.y+' เดือน ';
					}

					if (json_res.m != 0) {
						patt += json_res.m+' เดือน ';
					}
					$('#date_one'+to).val('');
					$('#date_one'+to).val(patt);
				}
			});
	   	}else{

		   	$('#date_three'+id).val(year+'-'+month+'-'+day);
		   	$('#date_one'+id).val('1 ปี');
	   	}
	}

	function myDate2(el) {
		var val = $(el).val();
		var id = $(el).attr('attr_id');
		var date_two = $('#date_two'+id).val();
		if (date_two != '') {
			// alert('Ajax');
			$.post('<?php echo base_url(); ?>add_asset/time_cali/'+date_two+'/'+val,function() {

			}).done(function(data) {
				var to = id;
				var json_res = jQuery.parseJSON(data);
				var patt = '';
				console.log(json_res);
				if (json_res.y != 0) {

					patt += json_res.y+' ปี ';

					if (json_res.m != 0) {
						patt += json_res.y+' เดือน ';
					}
					if (json_res.d != 0) {
						patt += json_res.d+' วัน';
					}
					$('#date_one'+to).val('');
					$('#date_one'+to).val(patt);

				}else{
					if (json_res.m != 0) {
						patt += json_res.y+' เดือน ';
					}

					if (json_res.m != 0) {
						patt += json_res.m+' เดือน ';
					}
					$('#date_one'+to).val('');
					$('#date_one'+to).val(patt);
				}
			});
		}else{
			swal('กรุณากรอก', 'วันที่สอบเทียบ', 'error');
			$(el).val('');
		}
	}
	// pre_code  	= code เตรียมการโดย
	// pre_name  	= ชื่อเตรียมการโดย
	// check_code 	= code ตรวจสอบโดย 
	// check_name 	= ชื่อตรวจสอบโดย
	// type_id		= id ของ project OR department
	// type_name	= ชื่อของ project OR department
	function add_item(pre_code, pre_name, check_code, check_name, type_id, type_name, type){
		var count_tr = $('#body_cb > tr').length;
		// alert(type);
			var patt = '<tr>'+
							'<td>'+type_name+'<input type="hidden" name="pro_id[]" value="'+type_id+'" /><input type="hidden" name="pro_name[]" value="'+type_name+'" /><input type="hidden" name="type[]" value="'+type+'" /></td>'+
							'<td>'+
							'<div class="input-group">'+
								'<input type="text" id="asset_pro'+count_tr+'" name="asset_pro[]" class="form-control" readonly="true">'+
								'<span class="input-group-addon bg-primary" style="cursor: pointer;" asset_pro="'+count_tr+'" pro_id="'+type_id+'" type="'+type+'" onclick="sel_asset($(this))"><i class="icon-search4"></i></span>'+
							'</div>'+
							'</td>'+
							'<td><input type="text" name="band_pro[]" id="band_pro'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="text" name="ser_no_pro[]" id="ser_no_pro'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="text" name="num_id_pro[]" id="num_id_pro'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="text" name="cali_period_pro[]" id="date_one'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="date" name="cali_date_pro[]" id="date_two'+count_tr+'" attr_id="'+count_tr+'" onchange="myDate1($(this))" class="form-control" /></td>'+
							'<td><input type="date" name="next_cali_date_pro[]" id="date_three'+count_tr+'" attr_id="'+count_tr+'" onchange="myDate2($(this))" class="form-control" /></td>'+
							'<td>'+
							'<select name="cali_check_pro[]" class="form-control">'+
								'<option value="0"></option>'+
								'<option value="1">ไม่ผ่าน</option>'+
								'<option value="2">ผ่าน</option>'+
							'</select>'+
							'</td>'+
							'<td><input type="text" class="form-control" name="mana_asset_pro[]" /></td>'+
							'<td>'+
							'<div class="input-group">'+
								'<input type="text" id="user_check'+count_tr+'" name="user_check_pro[]" class="form-control">'+
								'<span class="input-group-addon bg-primary" style="cursor: pointer;" row="'+count_tr+'" pro_id="'+type_id+'" onclick="user_check($(this))"><i class="icon-search4"></i></span>'+
							'</div>'+
							'</td>'+
							'<td><a href="#" onclick="delete_row($(this))" class="label label-danger"><i class="icon-trash"></i> Delete</a></td>'+
						'</tr>';
			$('#body_cb').append(patt);

	}


	$('#prepare_search').click(function() {
		$.get(base_url+'add_asset/member_modal_prepare', function() {
		}).done(function(data){
			$('#title_md').html('เตรียมการโดย');
			$('#body_modal').html(data);
			$('#modal').modal('toggle');
		});
	});
	$('#check_search').click(function() {
		$.get(base_url+'add_asset/member_modal_check', function() {
		}).done(function(data){
			$('#title_md').html('ตรวจสอบโดย');
			$('#body_modal').html(data);
			$('#modal').modal('toggle');
		});
	});
	$('#project_search').click(function() {
		$('#department_id').val('');
		$('#department_name').val('');
		$.get(base_url+'add_asset/project_modal', function() {
		}).done(function(data){
			$('#title_md').html('ตรวจสอบโดย');
			$('#body_modal').html(data);
			$('#modal').modal('toggle');
		});
	});
	$('#department_search').click(function() {
		// department_modal
		$('#project_id').val('');
		$('#project_name').val('');
		$.get(base_url+'add_asset/department_modal', function() {
		}).done(function(data){
			$('#title_md').html('ตรวจสอบโดย');
			$('#body_modal').html(data);
			$('#modal').modal('toggle');
		});
	});
	$('#add_item').click(function() {
		var pro_id 			= $('#project_id').val();
		var pro_name 		= $('#project_name').val();
		var depart_id 		= $('#department_id').val();
		var depart_name 	= $('#department_name').val();
		var prepareBy_code 	= $('#prepareBy_code').val();
		var prepareBy_name 	= $('#prepareBy_name').val();
		var checkBy_code 	= $('#checkBy_code').val();
		var checkBy_name 	= $('#checkBy_name').val();

		// if (prepareBy_code == '') {
		// 	swal('กรุณาเลือก','เตรียมการโดย','error');
			// return false;
		// }else{

			// if (checkBy_code == '') {
			// 	swal('กรุณาเลือก','ตรวจสอบโดย','error');
			// 	// return false;
			// }else{
				// alert(pro_id+" "+depart_id);
				if (pro_id !='' ||  depart_id !='') {
					if (pro_id !='' ) {
						add_item(prepareBy_code, prepareBy_name, checkBy_code, checkBy_name, pro_id, pro_name, 'p');
					}else{
						add_item(prepareBy_code, prepareBy_name, checkBy_code, checkBy_name, depart_id, depart_name, 'd');
					}
				}else{
					swal('กรุณาเลือก','โครงการหรือแผนก','error');
					// return false;
				}
			// }
		// }		

		
	});

	$('#save').click(function() {
		var count_tr = $('#body_cb > tr').length;
		// alert(count_tr);
		if (count_tr > 0) {
			$('#form_cali').submit();
		}else{
			swal('กรุณาตรวจสอบ', 'โปรดเพิ่มรายการ', 'error');
			// return false;
		}
	});

	function del_cali_item(el) {
		var id = el.attr('del_id');
		var _this = el;
		swal({
			  	title: "คุณแน่ใช่ใช่ไหม?",
			  	text: "ต้องการลบรายการนี้!",
			  	type: "warning",
			  	showCancelButton: true,
			  	confirmButtonClass: "btn-danger",
			  	confirmButtonText: "Yes, delete it!",
			  	closeOnConfirm: false
			},
			function(){
				$.post('<?php echo base_url(); ?>add_asset/del_cali_item/'+id, function() {
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
</script>