<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">

			<div class="content">
				<!-- /info alert -->

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Optional
							<p></p>
						</h5>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<!-- <button href="<?php echo base_url(); ?>data_master/new_Optional" type="button" class="btn bg-slate">
							<i class=" icon-arrow-left13"></i> Back</button> -->
							<a type="button" href="<?php  $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=option.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<button type="button" data-toggle="modal" data-target="#newOptional" class="newOptional preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</button>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-xxs table-hover table-striped datatable-basic">
								<thead>
									<tr>
										<th>Optional Code</th>
										<th>Optional Name</th>
										<th width="15%">Active</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($res as $v) {?>
									<tr>
										<td>
											<?php echo $v->op_code; ?>
										</td>
										<td>
											<?php echo $v->op_name; ?>
										</td>
										<td>
											<ul class="icons-list">
												<?php if ($v->status_open) {
                                }else { ?>
												<li>
													<li class="" type="button" data-toggle="modal" data-target="#modal_op<?php echo $v->op_id;?>">
														<a href="#">
															<i class="icon-pencil7"></i>
														</a>
													</li>
													<li>
														<a href="<?php echo base_url(); ?>index.php/datastore_active/del_op/<?php echo $v->op_id;?>">
															<i class="icon-trash"></i>
														</a>
													</li>
													<?php } ?>
											</ul>
										</td>
									</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="newOptional" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">New Optional</h5>
			</div>
			<form action="<?php echo base_url(); ?>index.php/datastore_active/addoptional"
			 method="post" id="insert">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-lg-3 control-labelt">Optional Code:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="op_code" name="op_code" placeholder="Optional Code">
						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="col-lg-3 control-labelt">Optional Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="op_name" name="op_name" placeholder="Optional Name">
						</div>
					</div>
					<br>

					<div class="modal-footer" style="margin-top:100px;">
						<button type="submit" class="save btn bg-success">
							<span class="icon-floppy-disk"></span> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal">
							<i class="icon-close2"></i> Close</button>

					</div>
			</form>
			</div>
		</div>
	</div>
</div>
<?php foreach ($res as $vv) {?>
<div id="modal_op<?php echo $vv->op_id; ?>" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Edit Optional</h5>
			</div>
			<form action="<?php echo base_url(); ?>index.php/datastore_active/upd_option/<?php echo $vv->op_id; ?>"
			 method="post" id="upd_Optional">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-lg-3 control-labelt">Optional Code:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="op_code" name="op_code" placeholder="Optional Code" value="<?php echo $vv->op_code; ?>">
							<input type="hidden" name="op_id" id="op_id" value="<?php echo $vv->op_id; ?>">
						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="col-lg-3 control-labelt">Optional Name:</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="op_name" name="op_name" placeholder="Optional Name" value="<?php echo $vv->op_name; ?>">
						</div>
					</div>
					<br>
					<div class="modal-footer" style="margin-top:100px;">
						<button type="submit" class="save btn bg-success">
							<span class="icon-floppy-disk"></span> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal">
							<i class="icon-close2"></i> Close</button>
					</div>
			</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>


<!-- Footer -->
<div class="footer text-muted">
	<!--   © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
</div>
<!-- /footer -->
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '150px',
			targets: [0]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: {
				'first': 'First',
				'last': 'Last',
				'next': '&rarr;',
				'previous': '&larr;'
			}
		},
		drawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
		},
		preDrawCallback: function() {
			$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
		}
	});
	$('.datatable-basic').DataTable();
	$('[data-popup="tooltip"]').tooltip();
	$('#ma').attr('class', 'active');
	$('#ma3').attr('style', 'background-color:#dedbd8');
</script>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_optional_pay');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Optional Pay Type</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Optional Pay Type and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/optional_pay_type.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Optional Pay Type, upload an Excel (.xls) file:</p>
        <div class="form-group">
          <input type="file" class="file-styled" id="file_upload" name="userfile">
        </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="submit" class="uploadfile btn btn-success">Import File</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    <?php echo form_close();?>
    <div id="load"></div>
    </div>
  </div>
</div>
<script>
  $(".uploadfile").click(function(){
      $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
  });
</script>