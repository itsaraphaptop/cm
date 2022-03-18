<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">

				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title">
							<i class="icon-cog3 position-left"></i> Withholding tax</h6>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=setwt.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<a type="button" data-toggle="modal" data-target="#newjob" class="newjob btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="basic table table-hover table-striped table-xxs datatable-basic">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<!-- <th class="text-center">W/T ID</th> -->
										<th class="text-center">W/T Name</th>
										<th class="text-center">W/T (%)</th>
										<th class="text-center">Active</th>
									</tr>
								</thead>




								<tbody>
									<?php
  $this->db->select('*');
  $this->db->from('setupwt');
  $setupwt = $this->db->get()->result();
  $n=1;
  foreach ($setupwt as $w) { ?>
									<tr>
										<td class="text-center">
											<?php echo $n; ?>
										</td>
										<!-- <td class="text-center">
											<?php echo $w->id_wt; ?>
										</td> -->
										<td class="text-left">
											<?php echo $w->name_wt; ?>
										</td>
										<td class="text-center">
											<?php echo $w->per_wt; ?> %
										</td>
										<td class="text-center">
											<ul class="icons-list">
												<li>
													<a type="button" data-toggle="modal" data-target="#editjob<?php echo $w->id_wt; ?>">
														<i class="icon-pencil7"></i>
													</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>contract_active/del_wt/<?php echo $w->id_wt; ?>">
														<i class="icon-trash"></i>
													</a>
												</li>
											</ul>
										</td>

									</tr>
									<?php $n++; }  ?>
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
				<h5 class="modal-title">Setup Job Description</h5>
			</div>
			<form action="<?php echo base_url(); ?>contract_active/addwt_per" method="post"
			 id="insert">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-lg-3 control-labelt">W/T Name :</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="namewt" name="namewt" placeholder="W/T Name">
						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="col-lg-3 control-labelt">W/T (%) :</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" id="perwt" name="perwt" placeholder="W/T (%)">
						</div>
					</div>
					<br>

					<div class="modal-footer" style="margin-top:100px;">
						<button type="button" id="saveadd" class="btn btn-success">
							<i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal">
							<i class="icon-close2"></i> Close</button>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>

<?php foreach ($setupwt as $vv) { ?>
<div id="editjob<?php echo $vv->id_wt; ?>" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Setup W/T</h5>
			</div>
			<form action="<?php echo base_url(); ?>contract_active/edit_wt/<?php echo $vv->id_wt; ?>"
			 method="post" id="editjobs">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-lg-3 control-labelt">W/T Name :</label>
						<div class="col-lg-9">
							<input type="text" value="<?php echo $vv->name_wt; ?>" class="form-control"
							 id="namewt" name="namewt" placeholder="W/T Name">
						</div>
					</div>
					<br>

					<div class="form-group">
						<label class="col-lg-3 control-labelt">W/T (%) :</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" value="<?php echo $vv->per_wt; ?>" id="perwt"
							 name="perwt" placeholder="W/T (%)">
						</div>
					</div>
					<br>
					<div class="modal-footer" style="margin-top:100px;">
						<button type="submit" id="saveedit" class=" btn btn-success">
							<i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal">
							<i class="icon-close2"></i> Close</button>
					</div>
			</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php } ?>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '200px',
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
	$('.basic').DataTable();

	$("#saveadd").click(function() {
		if ($("#namewt").val() == "") {
			swal({
				title: "กรุณากรอกชื่อ W/T!!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#perwt").val() == "") {
			swal({
				title: "กรุณากรอก เปอร์เซ็น!!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else {
			var frm = $('#insert');
			frm.submit(function(ev) {
				$.ajax({
					type: frm.attr('method'),
					url: frm.attr('action'),
					data: frm.serialize(),
					success: function(data) {
						swal({
							title: "Save Completed!!",
							text: "Save Completed!!.",
							// confirmButtonColor: "#66BB6A",
							type: "success"
						});
						setTimeout(function() {
							window.location.href =
								"<?php echo base_url(); ?>contract/wt_contract";
						}, 500);
					}
				});
				ev.preventDefault();
			});
			$("#insert").submit();
		}
	});
	$('#ma').attr('class', 'active');
	$('#ma4').attr('style', 'background-color:#dedbd8');
</script>

<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_setupwt');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Withholding tax</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Withholding tax and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/withholding_tax.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Withholding tax, upload an Excel (.xls) file:</p>
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