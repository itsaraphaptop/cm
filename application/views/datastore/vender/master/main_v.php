<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>
<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<!-- /info alert -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Vender/SubContractor</h6>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=vender.mrt&comp=<?php echo "
							 $compcode " ?>" class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<a type="button" href="<?php echo base_url(); ?>data_master/new_vender" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
					</div>

					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-xxs table-hover table-striped datatable-basic">
								<thead>
									<tr>
										<th>Vender Code</th>
										<th>Vender Name</th>
										<th>Telephone</th>
										<th>Sale Contact</th>
										<th>Active</th>
									</tr>
								</thead>
								<tbody>
									<?php $n=1; foreach ($res as $val) {?>
									<tr>
										<td>
											<?php echo $val->vender_code; ?>
										</td>
										<td>
											<?php echo $val->vender_name; ?>
										</td>
										<td>
											<?php echo $val->vender_tel; ?>
										</td>
										<td>
											<?php echo $val->vender_sale; ?>
										</td>
										<td>
											<a href="<?php echo base_url(); ?>data_master/edit_vender/<?php echo $val->vender_code; ?>">
												<i class="icon-pencil7"></i>
											</a>
											<!-- <a href="<?php echo base_url(); ?>datastore_active/del_vender/
											<?php echo $val->vender_code; ?>">
											<i class="icon-trash"></i>
											</a> -->
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
	$('#ma5').attr('style', 'background-color:#dedbd8');
</script>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_venderlist');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Vender/SubContractor</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Vender/SubContractor and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/venderlist.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Vender/SubContractor, upload an Excel (.xls) file:</p>
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