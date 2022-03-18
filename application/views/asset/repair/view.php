
<div class="content">
	<div class="panel panel-flat ">
		<div class="panel-heading">
			<h6 class="panel-title"><i class="icon-hammer-wrench position-left"></i>Repair list</h6>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 form-group">
					<a type="button" href="<?php echo base_url(); ?>add_asset/save_repair" class="btn bg-violet-400"><i class="icon-floppy-disk"></i> บันทึกแจ้งซ่อมแล้วเสร็จ</a>
					<a type="button" href="<?php echo base_url(); ?>add_asset/repair" class="btn btn-info pull-right"><i class="icon-plus-circle2"></i> New</a>
				</div>
			</div>
			<table class="table table-striped table-bordered table-xxs table-hover" id="mytableRepair">
				<thead>
					<tr>
						<th>No.</th>
						<th>RP No.</th>
						<th>Vender</th>
						<th>Approve</th>
						<th>Edit</th>
						<!-- <th>Print</th> -->
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
						<td><?=$value['code_doc'];?></td>
						<td><?=$value['vender_name'];?></td>
						<td>
							<?php if ($value['approve'] == 'wait') { ?>
								<span class="label bg-danger-400"><?=$value['approve'];?></span>
								
							<?php }else if ($value['approve'] == 'approve') { ?>
								<span class="label bg-success-400"><?=$value['approve'];?></span>
							<?php }else if ($value['approve'] == 'reject') {  ?>
								<span class="label bg-warning-400"><?=$value['approve'];?></span>
							<?php } ?>
						</td>
						<td>
							<a href="<?php echo base_url(); ?>add_asset/form_repair_edit/<?=$value['id'];?>" class="label label-info"><i class="icon-pencil7"></i> Edit</a>
						</td>
						<!-- <td>
							<?php if ($value['approve'] == 'approve') { ?>	
								<a href="<?php echo base_url(); ?>add_asset/report_repair/<?=$value['id'];?>" class="label label-primary"><i class="icon-printer4"></i> Print</a>
							<?php }else {?>
								<a href="#" class="label label-warning" style="cursor: text;"> wait</a>
							<?php } ?>
						</td> -->
						<td>
							<a href="#" onclick="delete_repair($(this))" del_id="<?=$value['id'];?>" class="label label-danger delete"><i class="icon-trash"></i> Delete</a>
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
	$('#mytableRepair').DataTable();
	function delete_repair(el) {
		var id = el.attr('del_id');
		var _this = el;
		swal({
			  	title: "คุณแน่ใช่ใช่ไหม?",
			  	text: "ต้องการลบใบแจ้งซ่อม!",
			  	type: "warning",
			  	showCancelButton: true,
			  	confirmButtonClass: "btn-danger",
			  	confirmButtonText: "Yes, delete it!",
			  	closeOnConfirm: false
			},
			function(){
				$.post('<?php echo base_url(); ?>add_asset/del_repair/'+id, function() {
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

	  $('#repair').attr('class', 'active');
</script>