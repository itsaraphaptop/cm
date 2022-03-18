<div class="page-header">

</div>
<div class="content">
	<div class="panel panel-flat ">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-hammer-wrench position-left"></i>External Calibration Master Plan & Master List</h6>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 form-group">
					<a type="button" href="<?php echo base_url(); ?>add_asset/list_save_cali" class="btn bg-violet-400"><i class="icon-floppy-disk"></i> บันทึกแผนการสอบเทียบ</a>
					<a type="button" href="<?php echo base_url(); ?>add_asset/calibration" class="btn btn-info pull-right"><i class="icon-plus-circle2"></i> New</a>
				</div>
			</div>
			<table class="table table-striped table-bordered table-xxs table-hover" id="mytable">
				<thead>
					<tr>
						<th>No.</th>
						<th>CB No.</th>
						<th>Approve</th>
						<th>เตรียมการโดย</th>
						<th>ตรวจสอบโดย</th>
						<!-- <th>Print</th> -->
						<th>Edit</th>
						<th>Delete</th>
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
						<td>
						<?php if ($value['approve'] == 'wait') { ?>
						<a href="#" class="label label-danger" style="cursor: text;"> <?=$value['approve'];?></a>
						<?php }else if ($value['approve'] == 'approve') { ?>
						<span class="label bg-success-400"><?=$value['approve'];?></span>
						<?php } ?>
						</td>
						<td><?=$value['prepareby_name'];?></td>
						<td><?=$value['checkby_name'];?></td>
<!-- 						<td>
							<?php if ($value['approve'] == 'approve') { ?>
								<a href="<?php echo base_url(); ?>add_asset/calibration_r/<?=$value['id'];?>" class="label label-primary"><i class="icon-printer4"></i> Print</a>
							<?php }else if ($value['approve'] == 'wait') { ?>
								<span class="label bg-warning"><?=$value['approve'];?></span>
							<?php } ?>
						</td> -->
						<td>
							<a href="<?php echo base_url(); ?>add_asset/formedit_cali/<?=$value['id'];?>" class="label label-info"><i class="icon-pencil7"></i> Edit</a>
						</td>
						<td>
							<a href="#" onclick="delete_cali($(this))" del_id="<?=$value['id'];?>" class="label label-danger delete"><i class="icon-trash"></i> Delete</a>
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
	function delete_cali(el) {
		var id = el.attr('del_id');
		var _this = el;
		swal({
			  	title: "คุณแน่ใช่ใช่ไหม?",
			  	text: "ต้องการลบใบสอบเทียบเครื่องมือวัดส่งภายนอก!",
			  	type: "warning",
			  	showCancelButton: true,
			  	confirmButtonClass: "btn-danger",
			  	confirmButtonText: "Yes, delete it!",
			  	closeOnConfirm: false
			},
			function(){
				$.post('<?php echo base_url(); ?>add_asset/del_cali/'+id, function() {
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

	$('#external').attr('class', 'active');
</script>