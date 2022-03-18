<script type="text/javascript">
	
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

	function delete_tr(el) {
		el.parent().parent().remove();
	}

	function checkval(el){
		var val = el.val();
		if(val == ""){
			$(el).attr('class', 'form-control date border-lg border-danger');
		}else{
			$(el).attr('class', 'form-control date border-lg border-success');
		}
			// alert(5555);

	}
	function getdata(el) {
			var fa_no = el.attr('fa_no');
			var fa_code = el.attr('fa_code');
			var fa_name = el.attr('fa_name');
			el.parent().parent().remove();

			var patt = '<tr>'+
							'<td>'+fa_code+'<input type="hidden" name="fa_code[]" value="'+fa_code+'"/></td>'+
							'<td>'+fa_name+'<input type="hidden" name="fa_name[]" value="'+fa_name+'"/></td>'+
							'<td><input type="text" name="problem[]" class="form-control" /></td>'+
							'<td>'+
								'<select class="form-control process" name="status_repair[]" attr_no="'+fa_code+'" onchange="show_input($(this))">'+
									'<option value="1">สั่งร้าน</option>'+
									'<option value="2">เปลี่ยนอะไหล่</option>'+
									'<option value="3">ซ่อมไม่ได้</option>'+
									'<option value="4">อื่นๆ</option>'+
								'</select>'+
								'<input type="hidden" name="repair_name[]" class="form-control input-xss" id="repair_name'+fa_code+'" value="สั่งร้าน"/>'+
								'<input type="hidden" name="another[]" class="form-control input-xss" id="note'+fa_code+'"  value=""/>'+
							'</td>'+
							'<td><input type="date" name="date_succ[]" class="form-control date_rel"  onchange="checkval($(this))"/></td>'+
							'<td><input type="date" name="date_succ_rel[]" class="form-control" /></td>'+
							'<td><a href="#" onclick="delete_tr($(this))" del_id="'+fa_code+'" class="label label-danger delete"><i class="icon-trash"></i> Delete</a></td>'+
						'</tr>';
			$('#body_tabeldetail').append(patt);

	}


	
</script>
<table class="table table-hover table table-xxs" id="Mytable2">
	<thead>
		<tr>
			<th>No.</th>
			<th>ชนิด/ยี่ห้อ/รุ่น</th>
			<th>หมายเลขเครื่อง</th>
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = 1;
			foreach ($rows as $key => $value) { 
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$value['fa_assetcode'];?></td>
			<td><?=$value['fa_asset'];?></td>
			<td><button class="btn btn-primary" fa_no="<?=$value['fa_no'];?>" fa_code="<?=$value['fa_assetcode'];?>" fa_name="<?=$value['fa_asset'];?>" onclick="getdata($(this))">เลือก</button></td>
		</tr>
		<?php 
				$i++;
			} 
		?>
	</tbody>
</table>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
	$('#Mytable2').DataTable();

</script>
