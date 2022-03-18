<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Owner / Customer
							<p></p>
						</h5>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=debtor.mrt"
							 class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<!-- <button href="<?php echo base_url(); ?>data_master/new_debtor" type="button" class="btn bg-slate">
							<i class=" icon-arrow-left13"></i> Back</button> -->
							<a type="button" href="<?php echo base_url(); ?>data_master/new_debtor" class="preload btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>
						<a class="heading-elements-toggle">
							<i class="icon-menu"></i>
						</a>
					</div>

					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-xxs table-hover table-striped datatable-basic">
								<thead>
									<tr>
										<th>Debtor Code</th>
										<th>Debtor Name</th>
										<th>Telephone</th>
										<th>Contact</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($res as $v) {?>
									<tr>
										<td width="10%">
											<?php echo $v->debtor_code; ?>
										</td>
										<td>
											<?php echo $v->debtor_name; ?>
										</td>
										<td width="20%">
											<?php echo $v->debtor_tel; ?>
										</td>
										<td width="20%">
											<?php echo $v->debtor_sale; ?>
										</td>
										<td width="10%">
											<ul class="icons-list">
												<li>
													<a data-toggle="modal" data-target="#open<?php echo $v->debtor_code; ?>" data-popup="tooltip"
													 title="" data-original-title="Open">
														<i class="icon-folder-open"></i>
													</a>
												</li>
												<li>
													<a class="preload" href="<?php echo base_url(); ?>data_master/edit_debtor/<?php echo $v->debtor_code; ?>"
													 data-popup="tooltip" title="" data-original-title="Edit">
														<i class="icon-pencil7"></i>
													</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>datastore_active/del_debtor/<?php echo $v->debtor_code; ?>"
													 data-popup="tooltip" title="" data-original-title="Remove">
														<i class="icon-trash"></i>
													</a>
												</li>

											</ul>
										</td>
									</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- Basic modal -->
				<?php foreach ($res as $val2) {?>
				<div id="open<?php echo $val2->debtor_code; ?>" class="modal fade">
					<div class="modal-dialog modal-lg">
						<div class="modal-content ">
							<div class="modal-header btn-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Debtor Code.:
									<?php echo $val2->debtor_name; ?>
								</h5>
							</div>
							<div class="modal-body">
								<div class="col-md-6">
									<div class="form-group">
										<label class="display-block text-semibold">Debtor Code</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_code; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Bussiness :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_worktype; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Debtor Name :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_name; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Debtor address</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_address; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">TAX ID :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_tax; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Credit Term :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_credit; ?>
										</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="display-block text-semibold">Bussiness Size</label>
										<label class="display-block text-semibold">
											<?php if($val2->debtor_size=="L"){echo "Large";}elseif ($val2->debtor_size=="M") {echo "Middle";}else{echo "Small";} ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Bussiness Status:</label>
										<label class="display-block text-semibold">
											<?php if($val2->debtor_status){echo "ACTIVE";}else{echo "Blacklist";} ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">TAX Type:</label>
										<label class="display-block text-semibold">
											<?php if($val2->debtor_taxtype == '1'){ echo "ภ.ง.ด.2"; }elseif($val2->debtor_taxtype == '2'){echo "ภ.ง.ด.3";}elseif($val2->debtor_taxtype == '3'){echo "ภ.ง.ด.53";}
																		elseif($val2->debtor_taxtype == '4'){echo "ภ.ง.ด.54";}else{echo "ภ.ง.ด.1";}?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Telephone :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_tel; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">FAX :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_fax; ?>
										</label>
									</div>
									<div class="form-group">
										<label class="display-block text-semibold">Contract :</label>
										<label class="display-block text-semibold">
											<?php echo $val2->debtor_sale; ?>
										</label>
									</div>
								</div>
							</div>

							<div class="modal-footer">

								<button type="submit" class="btn btn-danger" data-dismiss="modal">
									<i class="icon-close2"></i> Close</button>

							</div>


						</div>
					</div>
				</div>
				<?php } ?>
				<!-- /basic modal -->

			</div>
		</div>
	</div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			targets: [4]
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
	$('#ma8').attr('style', 'background-color:#dedbd8');
</script>
<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_debtor');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Owner/Costomer</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Owner/Costomer and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/debtor.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Owner/Costomer, upload an Excel (.xls) file:</p>
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