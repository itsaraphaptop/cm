<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Expens</h5>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=expensother.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<a type="button" href="<?php echo base_url(); ?>data_master/new_expens" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
					</div>

					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-xxs table-hover table-striped datatable-basic">
								<thead>
									<tr>
										<th class="text-center">Expens Code</th>
										<th class="text-center">Expens Name</th>
										<th class="text-center">Cost Code</th>
										<th class="text-center">A/C for Employee</th>
										<th class="text-center">A/C for External</th>
										<th class="text-center">Active</th>
									</tr>
								</thead>
								<tbody>
									<?php $n=1; foreach ($res as $ex) {?>
									<tr>
										<td>
											<?php echo $ex->expens_code; ?>
										</td>
										<td>
											<?php echo $ex->expens_name; ?>
										</td>
										<td>
											<?php echo $ex->costcode; ?>
										</td>
										<td>
											<?php echo $ex->ac_name; ?>
										</td>
										<td>
											<?php echo $ex->ac_name2; ?>
										</td>
										<td>
											<ul class="icons-list">
												<li>
													<a href="<?php echo base_url(); ?>data_master/edit_expens/<?php echo $ex->expens_code; ?>">
														<i class="icon-pencil7"></i>
													</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>ap_active/delexp/<?php echo $ex->expens_code; ?>">
														<i class="icon-trash"></i>
													</a>
												</li>
											</ul>
										</td>
									</tr>
									<?php $n++; } ?>
								</tbody>
							</table>
						</div>

					</div>

				</div>
				<!-- Footer -->
				<div class="footer text-muted">
					<!-- © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
				</div>
				<!-- /footer -->
			</div>
		</div>
	</div>
</div>
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
			// pageLength: 100,
			// lengthMenu: '<span>Show:</span> _MENU_',
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
	$('#ma6').attr('style', 'background-color:#dedbd8');
</script>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_expense');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Expens Cost</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Expens Cost and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/expensother.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Expens Cost, upload an Excel (.xls) file:</p>
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