
<div class="content">
	<div class="panel panel-flat ">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-hammer-wrench position-left"></i>บันทึกแจ้งซ่อมแล้วเสร็จ</h6>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-xxs table-hover" id="mytable">
				<thead>
					<tr>
						<th>No.</th>
						<th>RP No.</th>
						<th>Vender</th>
						<th>บันทึกแจ้งซ่อม</th>
						<th>Print</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$i = 1;
					foreach ($data as $key => $value) {
				?>
					<tr>
						<td><?=$i;?></td>
						<td><?=$value['code_doc'];?></td>
						<td><?=$value['vender_name'];?></td>
						<td>
							<?php if ($value['status_ative'] == 'disable') {?>
								<a href="#" class="label label-success" style="cursor: text;"> บันทึกเรียบร้อยแล้ว</a>
							<?php } else if ($value['status_ative'] == 'ative') { ?>
								<a href="<?php echo base_url(); ?>add_asset/noti_repair/<?=$value['id'];?>" class="label label-primary"><i class="icon-floppy-disk"></i> บันทึก</a>
							<?php } ?>
						</td>
						<td>
							<?php if ($value['status_ative'] == 'disable') {?>
								<a href="<?php echo base_url(); ?>add_asset/report_repair/<?=$value['id'];?>" class="label label-primary"><i class="icon-printer4"></i> Print</a>
							<?php } else if ($value['status_ative'] == 'ative') { ?>
								<a href="#" class="label label-warning" style="cursor: text;"> รอการบันทึก</a>
							<?php } ?>
							
						</td>
					</tr>
				<?php 
				$i++;
					} 
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#mytable').DataTable();
	// function delete_repair(el) {
	// 	var id = el.attr('del_id');
	// 	var _this = el;
	// 	swal({
	// 		  	title: "คุณแน่ใช่ใช่ไหม?",
	// 		  	text: "ต้องการลบใบแจ้งซ่อม!",
	// 		  	type: "warning",
	// 		  	showCancelButton: true,
	// 		  	confirmButtonClass: "btn-danger",
	// 		  	confirmButtonText: "Yes, delete it!",
	// 		  	closeOnConfirm: false
	// 		},
	// 		function(){
	// 			$.post('<?php echo base_url(); ?>add_asset/del_repair/'+id, function() {
	// 			}).done(function(data){
	// 				var json_res = jQuery.parseJSON(data);
	// 				if (json_res.status == true) {
	// 					swal("Deleted!", json_res.message, "success");
	// 					_this.parent().parent().remove();
	// 				}else{
	// 					swal("Deleted!", json_res.message, "error");
	// 				}
	// 			});
	// 		});
	// }

	  $('#repair').attr('class', 'active');
</script>