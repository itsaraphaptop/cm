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
			<form method="post" action="<?php echo base_url(); ?>add_asset/add_calibration" id="form_cali">		
			<div class="row form-group">
				<div class="col-xs-2 col-xs-offset-2">
					<label>EC No :</label>
					<input type="text" name="ec_code" class="form-control" readonly="true" value="<?=$cb_code;?>">
				</div>
				<div class="col-xs-3">
					<label>เตรียมการโดย :</label>
					<div class="input-group">
						<input type="text" name="prepareBy_name" class="form-control" id="prepareBy_name" readonly="true">
						<input type="hidden" name="prepareBy_code" id="prepareBy_code">
						<span class="input-group-addon bg-primary" id="prepare_search" style="cursor: pointer;"><i class="icon-search4"></i></span>
					</div>
				</div>
				<div class="col-xs-3">
					<label>ตรวจสอบโดย :</label>
					<div class="input-group">
						<input type="text" name="checkBy_name" id="checkBy_name" class="form-control"  readonly="true">
						<input type="hidden" name="checkBy_code" id="checkBy_code">
						<span class="input-group-addon bg-primary" id="check_search" style="cursor: pointer;"><i class="icon-search4"></i></span>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-xs-2 col-xs-offset-2">
					<label>Project No :</label>
					<input type="text" id="project_id" class="form-control" readonly="true">
				</div>
				<div class="col-xs-4">
					<label>Project Name :</label>	
					<div class="input-group">
						<input type="text" id="project_name" class="form-control" readonly="true">
						<span class="input-group-addon bg-primary" style="cursor: pointer;" id="project_search"><i class="icon-search4"></i></span>
					</div>
				</div>
				<!-- <div class="col-xs-1">
					<label>Department No :</label>
					<input type="text" id="department_id" class="form-control" readonly="true">
				</div>
				<div class="col-xs-3">
					<label>Department Name :</label>
					<div class="input-group">
						<input type="text" id="department_name" class="form-control"  readonly="true">
						<span class="input-group-addon bg-primary" style="cursor: pointer;" id="department_search"><i class="icon-search4"></i></span>
					</div>
				</div> -->
			</div>
			<div class="row form-group">
				<button type="button" class="btn bg-teal-400" id="add_item"><i class="icon-plus-circle2"></i> Add tiem</button>
			</div>
			<div class="row form-group">
				<div class="table-responsive">
				<table class="table table-striped table-bordered table-xxs table-hover table-responsive" style="overflow-x:auto;">
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
		if (type == 'p') {
			var patt = '<tr>'+
							'<td>'+type_name+'<input type="hidden" name="pro_id[]" value="'+type_id+'" /><input type="hidden" name="pro_name[]" value="'+type_name+'" /></td>'+
							'<td>'+
							'<div class="input-group">'+
								'<input type="text" id="asset_pro'+count_tr+'" name="asset_pro[]" class="form-control" readonly="true">'+
								'<span class="input-group-addon bg-primary" style="cursor: pointer;" asset_pro="'+count_tr+'" pro_id="'+type_id+'" type="p" onclick="sel_asset($(this))"><i class="icon-search4"></i></span>'+
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
		}else if (type == 'd') {
			var patt = '<tr>'+
							'<td>'+type_name+'<input type="hidden" name="depart_id[]" value="'+type_id+'" /><input type="hidden" name="depart_name[]" value="'+type_name+'" /></td>'+
							'<td>'+
							'<div class="input-group">'+
								'<input type="text" id="asset_pro'+count_tr+'" name="asset_depart[]" class="form-control" readonly="true">'+
								'<span class="input-group-addon bg-primary" style="cursor: pointer;" asset_pro="'+count_tr+'" pro_id="'+type_id+'" type="d" onclick="sel_asset($(this))"><i class="icon-search4"></i></span>'+
							'</div>'+
							'</td>'+
							'<td><input type="text" name="band_depart[]" id="band_pro'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="text" name="ser_no_depart[]" id="ser_no_pro'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="text" name="num_id_depart[]" id="num_id_pro'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="text" name="cali_period_depart[]" id="date_one'+count_tr+'" class="form-control" readonly="true"/></td>'+
							'<td><input type="date" name="cali_date_depart[]" id="date_two'+count_tr+'" attr_id="'+count_tr+'" class="form-control" onchange="myDate1($(this))" /></td>'+
							'<td><input type="date" name="next_cali_date_depart[]" id="date_three'+count_tr+'" attr_id="'+count_tr+'" class="form-control" onchange="myDate2($(this))" /></td>'+
							'<td>'+
							'<select name="cali_check_depart[]" class="form-control">'+
								'<option value="0"></option>'+
								'<option value="1">ไม่ผ่าน</option>'+
								'<option value="2">ผ่าน</option>'+
							'</select>'+
							'</td>'+
							'<td><input type="text" class="form-control" name="mana_asset_depart[]" /></td>'+
							'<td>'+
							'<div class="input-group">'+
								'<input type="text" id="user_check'+count_tr+'" name="user_check_depart[]" class="form-control">'+
								'<span class="input-group-addon bg-primary" style="cursor: pointer;" row="'+count_tr+'" pro_id="'+type_id+'" onclick="user_check($(this))"><i class="icon-search4"></i></span>'+
							'</div>'+
							'</td>'+
							'<td><a href="#" onclick="delete_row($(this))" class="label label-danger"><i class="icon-trash"></i> Delete</a></td>'+
						'</tr>';
			$('#body_cb').append(patt);
		}else{
			console.log('ไม่มี type');
		}
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
			// swal('กรุณาเลือก','เตรียมการโดย','error');
			// return false;
		// }else{

			// if (checkBy_code == '') {
				// swal('กรุณาเลือก','ตรวจสอบโดย','error');
				// return false;
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
</script>