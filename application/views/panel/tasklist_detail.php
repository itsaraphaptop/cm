<?php 
$ref = $this->uri->segment(3);
$task = $this->uri->segment(4);
?>			
			<div class="panel panel-flat">
						<div class="panel-heading">
							<div class="col-xs-6">
							<h5 class="panel-title"><?php echo $task; ?></h5>
						</div>
						</div>

					
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th><div class="col-sm-6 text-left">SUBJECT</div><div class="col-sm-6 text-right"><a data-toggle="modal" data-target="#modal_fulldetail"><i class="glyphicon glyphicon-plus"></i></a></div></th>
									<th class="text-center">ACTION</th>
									<th class="text-center">DUE DATE</th>
									<th class="text-center">CATEGORIES</th>
									<th class="text-center"><i class="icon-flag3" style="color: red;"></th>
									
								</tr>
							</thead>
							<tbody>

							<?php 
							$this->db->select('*');
							$this->db->where("refd_task",$ref);
							$query = $this->db->get('task_d');
							$task_d = $query->result();
							$n = 1;
							foreach ($task_d as $d) { ?>
								<tr>
									<td class="text-center"><?php echo $n; ?></td>
									<td><?php if($d->status_task=="2"){ ?><strike <?php if($d->date_task<=date('Y-m-d')){ echo 'style="color: red"'; }else{ echo 'style="color: green"'; } ?>><?php } ?><?php echo $d->sub_task; ?><?php if($d->status_task=="2"){ ?></strike><?php } ?></td>
									<td class="text-center">
									<p><a data-toggle="modal" data-target="#modal_editdetail<?php echo $d->id; ?>"><i class="glyphicon glyphicon-wrench"></i></a> 
									<a id="remove_detail<?php echo $d->id; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a></p>
									</td>
									<td class="text-center"><?php if($d->status_task=="2"){ ?><strike <?php if($d->date_task<=date('Y-m-d')){ echo 'style="color: red"'; }else{ echo 'style="color: green"'; } ?>><?php } ?><?php echo $d->date_task; ?><?php if($d->status_task=="2"){ ?></strike><?php } ?></td>
									<td class="text-center"><?php if($d->status_task=="2"){ ?><strike><?php } ?><i class="icon-square" style="color: <?php echo $d->categorie; ?>;"></i><?php if($d->status_task=="2"){ ?></strike><?php } ?></td>
									
									<td class="text-center">
										<?php if($d->status_task=="0"){ ?>
										<a href="<?php echo base_url(); ?>index.php/office/status_task/<?php echo $d->id; ?>"><i class="icon-flag3" style="color: red;"></i></a>
										<?php }else if($d->status_task=="1"){ ?>
										<a href="<?php echo base_url(); ?>index.php/office/status_chk/<?php echo $d->id; ?>"><i class="icon-checkmark4" style="color: green;"></i></a>
										<?php }else if($d->status_task=="2"){  ?>
										<i class="icon-checkmark4" style="color: green;"></i>
										<?php } ?>
									</td>
								</tr>

								<script>
												$(document).on('click', 'a#remove_detail<?php echo $d->id; ?>', function () { // <-- changes
												var self = $(this);
												noty({
												width: 200,
												text: "Do you want to Delete?",
												type: self.data('type'),
												dismissQueue: true,
												timeout: 1000,
												layout: self.data('layout'),
												buttons: (self.data('type') != 'confirm') ? false : [
												{
												addClass: 'btn btn-primary btn-xs',
												text: 'Ok',
												onClick: function ($noty) { //this = button element, $noty = $noty element
												$noty.close();
												self.closest('tr').remove();
												noty({
												force: true,
												text: 'Deleteted',
												type: 'success',
												layout: self.data('layout'),
												timeout: 1000,
												});
												window.location.href = '<?php echo base_url(); ?>index.php/office/deltasklist_detail/<?php echo $d->id; ?>';
												}
												},
												{
												addClass: 'btn btn-danger btn-xs',
												text: 'Cancel',
												onClick: function ($noty) {
												$noty.close();
												noty({
												force: true,
												text: 'You clicked "Cancel" button',
												type: 'error',
												layout: self.data('layout'),
												timeout: 1000,
												});
												}
												}
												]
												});
												return false;
												});
												</script>
							<?php $n++; }  ?>
							</tbody>
						</table>
					</div>




<script>
  $(".datatable-basicball").DataTable();
</script>


<div id="modal_fulldetail" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">ADD SUBJECT</h5>
			</div>
			<form action="<?php echo base_url(); ?>index.php/office/tasklist_detail/<?php echo $ref; ?>" method="post">
				<div class="modal-body">
					<div class="col-sm-6">
						<div class="form-group">
							<label>CATEGORIES</label>
							<input class="form-control input-sm" type="color" name="categorie" required="">
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label>DUE DATE</label>
							<input class="form-control input-sm" type="date" name="date_task" required="">
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label>SUBJECT</label>
							<input class="form-control input-sm" type="text" name="sub_task" required="">
						</div>
					</div>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php foreach ($task_d as $d) { ?>
<div id="modal_editdetail<?php echo $d->id; ?>" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">ADD SUBJECT</h5>
			</div>
			<form action="<?php echo base_url(); ?>index.php/office/tasklist_detail_edit/<?php echo $d->id; ?>" method="post">
				<div class="modal-body">
					<div class="col-sm-6">
						<div class="form-group">
							<label>CATEGORIES</label>
							<input class="form-control input-sm" type="color" name="categorie" required="" value="<?php echo $d->categorie; ?>">
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label>DUE DATE</label>
							<input class="form-control input-sm" type="date" name="date_task" required="" value="<?php echo $d->date_task; ?>">
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group">
							<label>SUBJECT</label>
							<input class="form-control input-sm" type="text" name="sub_task" required="" value="<?php echo $d->sub_task; ?>">
						</div>
					</div>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php  }  ?>