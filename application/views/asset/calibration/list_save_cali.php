<div class="page-header">

</div>
<div class="content">
	<div class="panel panel-flat ">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-law"></i>External Calibration Master Plan & Master List</h6>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-xxs table-hover" id="mytable">
				<thead>
					<tr>
						<th>No.</th>
						<th>RP No.</th>
						<!-- <th>Approve</th> -->
						<th>บันทึกแผนการสอบเทียบ</th>
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
						<td><?=$value['cb_code'];?></td>
		<!-- 				<td>
							<?php if ($value['approve'] == 'wait') { ?>
								<a href="#" class="label label-danger" style="cursor: text;"> <?=$value['approve'];?></a>
							<?php }else if ($value['approve'] == 'approve') { ?>
								<a href="#" class="label label-success" style="cursor: text;"> <?=$value['approve'];?></a>
							<?php } ?>
						</td> -->
						<td>
							<?php if ($value['status_active'] == 'disable') {?>
								<a href="#" class="label label-success" style="cursor: text;"> บันทึกเรียบร้อยแล้ว</a>
							<?php } else if ($value['status_active'] == 'active') { ?>
								<a href="<?php echo base_url(); ?>add_asset/form_save_cali/<?=$value['id'];?>" class="label label-primary"><i class="icon-floppy-disk"></i> บันทึก</a>
							<?php } ?>
						</td>
						<td>
							<?php if ($value['status_active'] == 'disable') {?>
								<a href="<?php echo base_url(); ?>add_asset/calibration_r/<?=$value['id'];?>" class="label label-primary"><i class="icon-printer4"></i> Print</a>
							<?php } else if ($value['status_active'] == 'active') { ?>
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
$('#set_up').attr('class', 'active');
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


</script>