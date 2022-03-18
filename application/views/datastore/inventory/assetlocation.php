<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Asset Location<p></p></h6>
			<div class="heading-elements">
				<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate"><i class="icon-arrow-left13"></i> Back</a>
				<a type="button" data-toggle="modal" data-target="#newjob" class="newjob btn btn-info"><i class="icon-plus-circle2"></i> New</a>
				<a style="text-align: left;"><a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=asslo.mrt&lo=1" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="basic table table-hover table-striped table-xxs datatable-basic">
					<thead>
						<tr>
							<th>No. </th>
							<th>Location Code</th>
							<th>Location Name</th>
							<th>Remark</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php $n=1; foreach ($res as $key) { ?>
						<td><?php echo $n; ?></td>
						<td><?php echo $key->location_code; ?></td>
						<td><?php echo $key->location_name; ?></td>
						<td><?php echo $key->location_remark; ?></td>
						<td style="text-align: center;">
							<a  type="button" data-toggle="modal" data-target="#editpro<?php echo $key->id_location; ?>"><i class="icon-pencil7"></i></a>
							<a href="<?php echo base_url(); ?>asset_active/delinsertmasterlocation/<?php echo $key->id_location; ?>" ><i class="icon-trash"></i></a></td>
					</tr>
					<?php $n++; } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	
	
	
	<div id="newjob" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Setup Asset Location</h5>
				</div>
				<form action="<?php echo base_url(); ?>asset_active/insertmasterlocation" method="post" id="insert">
					<div class="modal-body">
						<!-- <div class="col-md-4">
							<label>Type :</label>
							<div class="form-group">
								<select class="form-control" name="location">
									<option value="1">Project</option>
									<option value="2">Department</option>
								</select>
							</div>
						</div> -->
						<div class="col-md-4">
							<label>Location Code :</label>
							<div class="form-group">
								<input type="hidden" class="form-control" name="location" value="1">
								<input type="text" name="location_code" id="location_code" class="form-control ">
							</div>
						</div>
						<div class="col-md-4">
							<label>Location Name :</label>
							<div class="form-group">
								<input type="text" name="location_name" id="location_name" class="form-control ">
							</div>
						</div>
						<div class="col-md-12">
							<label>Remark :</label>
							<div class="form-group">
								<input type="text" name="location_remark" id="location_remark" class="form-control ">
							</div>
						</div>
						<div class="modal-footer" style="margin-top:100px;">
							<button type="submit" id="saveadd" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
							<button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php foreach ($res as $key) {?>
	<div id="editpro<?php echo $key->id_location; ?>" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Setup Asset Location</h5>
				</div>
				<form action="<?php echo base_url(); ?>asset_active/edit_location/<?php echo $key->id_location; ?>" method="post" id="editjobs">
					<div class="modal-body">
						<div class="col-md-4">
							<label>Type :</label>
							<div class="form-group">
								<input type="hidden" name="location" id="location" class="form-control " value="<?php echo $key->location; ?>">
								<input type="text" name="location" id="location" class="form-control " value="Project" readonly="">
							</div>
						</div>
						<div class="col-md-4">
							<label>Location Code :</label>
							<div class="form-group">
								<input readonly="" type="text" name="location_code" id="location_code" class="form-control " value="<?php echo $key->location_code; ?>" >
							</div>
						</div>
						<div class="col-md-4">
							<label>Location Name :</label>
							<div class="form-group">
								<input type="text" name="location_name" id="location_name" class="form-control " value="<?php echo $key->location_name; ?>">
							</div>
						</div>
						<div class="col-md-12">
							<label>Remark :</label>
							<div class="form-group">
								<input type="text" name="location_remark" id="location_remark" class="form-control " value="<?php echo $key->location_remark; ?>">
							</div>
						</div>
						<div class="modal-footer" style="margin-top:100px;">
							<button type="submit" id="saveedit" class=" btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
							<button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
	<!-- <?php foreach ($res1 as $key1) {?>
	<div id="editde<?php echo $key1->id_location; ?>" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header btn-primary">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Setup Asset Location</h5>
				</div>
				<form action="<?php echo base_url(); ?>asset_active/edit_location/<?php echo $key1->id_location; ?>" method="post" id="editjobs">
					<div class="modal-body">
						<div class="col-md-4">
							<label>Type :</label>
							<div class="form-group">
								<input type="hidden" name="location" id="location" class="form-control " value="<?php echo $key->location; ?>">
								<input type="text" name="location" id="location" class="form-control " value="Department" readonly="">
							</div>
						</div>
						<div class="col-md-4">
							<label>Location Code :</label>
							<div class="form-group">
								<input readonly="" type="text" name="location_code" id="location_code" class="form-control " value="<?php echo $key1->location_code; ?>">
							</div>
						</div>
						<div class="col-md-4">
							<label>Location Name :</label>
							<div class="form-group">
								<input type="text" name="location_name" id="location_name" class="form-control " value="<?php echo $key1->location_name; ?>">
							</div>
						</div>
						<div class="col-md-12">
							<label>Remark :</label>
							<div class="form-group">
								<input type="text" name="location_remark" id="location_remark" class="form-control " value="<?php echo $key1->location_remark; ?>">
							</div>
						</div>
						<div class="modal-footer" style="margin-top:100px;">
							<button type="submit" id="saveedit" class=" btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
							<button type="button" class="btn bg-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?> -->
<script>
  $('#mfa').attr('class', 'active');
  $('#mfa4').attr('style', 'background-color:#dedbd8');
</script>