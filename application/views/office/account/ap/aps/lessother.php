<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>

<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">
							<i class="icon-cog3 position-left"></i> Setup Less Other</h5>
						<div class="heading-elements">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
							<a href="<?php echo base_url(); ?>data_master" class="btn bg-slate">
								<i class="icon-arrow-left13"></i> Back</a>
							<a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=lessother.mrt&comp=<?php echo "
							 $compcode " ?>" class="preload btn btn-info">
								<i class="icon-printer4"></i> Print </a>
							<a type="button" data-toggle="modal" data-target="#newless" class="newless btn btn-info">
								<i class="icon-plus-circle2"></i> New</a>
						</div>

					</div>
					<div class="panel-body">
						<!-- <div class="row" id="table"> -->

						<div class="table-responsive">
							<table class="basic table table-hover table-striped table-xxs datatable-basic">
								<thead>
									<tr>
										<th>Less Other Code</th>
										<th>Less Other Name</th>
										<th>Account </th>
										<th>Cost Code</th>
										<th>Tax</th>
										<th>Tax Type</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php foreach ($de as $key) { ?>
										<td>
											<?php echo $key->id_lessother; ?>
										</td>
										<td>
											<?php echo $key->less_name; ?>
										</td>
										<td>
											<?php echo $key->less_ac." - ".$key->act_name; ?>
										</td>
										<td>
											<?php echo $key->less_costcode." - ".$key->less_costname; ?>
										</td>
										<td>
											<?php if ($key->less_tax == "Y") {
                        echo "มีภาษี";
                      }else {
                        echo "ไม่มีภาษี";
                      } ?>

										</td>
										<td>
											<?php if ($key->less_taxtype == 0) {
                        echo "ไม่มีหัก";
                      }else if ($key->less_taxtype == 1)  {
                        echo "ค่าขนส่ง 1%";
                      }else if ($key->less_taxtype == 2)  {
                        echo "ค่าโฆษณา 2%";
                      }else if ($key->less_taxtype == 3)  {
                        echo "ค่าบริการ 3%";
                      }else if ($key->less_taxtype == 5)  {
                        echo "ค่าเช่า 5%";
                      }else if ($key->less_taxtype == 7)  {
                        echo "ค่าจ้างเหมา 3%";
                      }else if ($key->less_taxtype == 8)  {
                        echo "เงินชดเชย 3%";
                      }else if ($key->less_taxtype == 9)  {
                        echo "ค่าจ้างแรงงาน 3%";
                      }else if ($key->less_taxtype == 15)  {
                        echo "ดอกเบี้ยจ่าย 15%";
                      } ?>
										</td>
										<td>
											<a type="button" data-toggle="modal" data-target="#editless<?php echo $key->id_lessother; ?>">
												<i class="icon-pencil7"></i>
											</a>
											<a href="<?php echo base_url(); ?>asset_active/delectlessother/<?php echo $key->id_lessother; ?>">
												<i class="icon-trash"></i>
											</a>
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



<div id="newless" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Setup Less Other</h5>
			</div>
			<form action="<?php echo base_url(); ?>asset_active/inslessother" method="post"
			 id="insert">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2">Less Other Code</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" name="lesscode" readonly="">
							</div>
						</div>
						<div class="col-md-2">Less Other Name</div>
						<div class="col-md-5">
							<div class="form-group">
								<input type="text" class="form-control" name="lessname">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">A/C Code</div>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="accno" name="accountcode" readonly="">
								<span class="input-group-btn">
									<button type="button" data-toggle="modal" data-target="#acoount" class="acoount btn btn-info btn-icon">
										<i class="icon-search4"></i>
									</button>
								</span>
							</div>
						</div>
						<div class="col-md-2">A/C Name</div>
						<div class="col-md-5">
							<div class="form-group">
								<input type="text" class="form-control" name="" id="accountname" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">Cost Code</div>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" name="costcode" id="vcostcode" readonly="">
								<span class="input-group-btn">
									<button type="button" data-toggle="modal" data-target="#costcode" class="costcode btn btn-info btn-icon">
										<i class="icon-search4"></i>
									</button>
								</span>
							</div>
						</div>
						<div class="col-md-2">Cost Name</div>
						<div class="col-md-5">
							<div class="form-group">
								<input type="text" class="form-control" id="costname" name="costname" readonly="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<div class="checkbox">
								<label>
									<input type="checkbox" id="chk">
									<input type="hidden" id="chkvat" value="N" name="chkvat"> Tax
								</label>
							</div>
						</div>
						<div class="col-md-2">Tax Type</div>
						<div class="col-md-5">
							<div class="form-group">
								<select class="form-control" name="taxtype">
									<option value="0">ไม่มีหัก</option>
									<option value="1">ค่าขนส่ง 1%</option>
									<option value="2">ค่าโฆษณา 2%</option>
									<option value="3">ค่าบริการ 3%</option>
									<option value="5">ค่าเช่า 5%</option>
									<option value="7">ค่าจ้างเหมา 3%</option>
									<option value="8">เงินชดเชย 3%</option>
									<option value="9">ค่าจ้างแรงงาน 3%</option>
									<option value="15">ดอกเบี้ยจ่าย 15%</option>
								</select>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" id="saveadd" class="btn btn-success">
							<i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal">
							<i class="icon-close2"></i> Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php foreach ($de as $key) { ?>
<div id="editless<?php echo $key->id_lessother; ?>" class="modal fade" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header btn-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Setup Less Other</h5>
			</div>
			<form action="<?php echo base_url(); ?>asset_active/editlessother/<?php echo $key->id_lessother; ?>"
			 method="post" id="insert">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2">Less Other Code</div>
						<div class="col-md-3">
							<div class="form-group">
								<input type="text" class="form-control" value="<?php echo $key->id_lessother; ?>"
								 name="lesscode" readonly="">
							</div>
						</div>
						<div class="col-md-2">Less Other Name</div>
						<div class="col-md-5">
							<div class="form-group">
								<input type="text" class="form-control" name="lessname" value="<?php echo $key->less_name; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">A/C Code</div>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" id="at_acdid<?php echo $key->id_lessother; ?>"
								 name="accountcode" readonly="" value="<?php echo $key->less_ac; ?>">
								<span class="input-group-btn">
									<button type="button" data-toggle="modal" data-target="#acoount<?php echo $key->id_lessother; ?>"
									 class="acoount<?php echo $key->id_lessother; ?> btn btn-info btn-icon">
										<i class="icon-search4"></i>
									</button>
								</span>
							</div>
						</div>
						<div class="col-md-2">A/C Name</div>
						<div class="col-md-5">
							<div class="form-group">
								<input type="text" class="form-control" name="" id="at_acd<?php echo $key->id_lessother; ?>"
								 readonly="" value="<?php echo $key->act_name; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">Cost Code</div>
						<div class="col-md-3">
							<div class="input-group">
								<input type="text" class="form-control" name="costcode" id="codecostcode<?php echo $key->id_lessother; ?>"
								 readonly="" value="<?php echo $key->less_costcode; ?>">
								<span class="input-group-btn">
									<button type="button" data-toggle="modal" data-target="#costcode<?php echo $key->id_lessother; ?>"
									 class="costcode<?php echo $key->id_lessother; ?> btn btn-info btn-icon">
										<i class="icon-search4"></i>
									</button>
								</span>
							</div>
						</div>
						<div class="col-md-2">Cost Name</div>
						<div class="col-md-5">
							<div class="form-group">
								<input type="text" class="form-control" id="costname<?php echo $key->id_lessother; ?>"
								 name="costname" readonly="" value="<?php echo $key->less_costname; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<div class="checkbox">
								<label>
									<?php if ($key->less_tax == "Y") { ?>
									<input type="checkbox" id="chk<?php echo $key->id_lessother; ?>" checked="">
									<?php }else{ ?>
									<input type="checkbox" id="chk<?php echo $key->id_lessother; ?>">
									<?php } ?>
									<input type="hidden" id="chkvat<?php echo $key->id_lessother; ?>" value="N"
									 name="chkvat"> Tax
								</label>
							</div>
						</div>
						<script>
							$("#chk" + <?php echo $key->id_lessother; ?> ).click(function() {
								if ($("#chk" + <?php echo $key->id_lessother; ?> ).prop(
										"checked")) {
									$("#chkvat" + <?php echo $key->id_lessother; ?> ).val("Y");
								} else {
									$("#chkvat" + <?php echo $key->id_lessother; ?> ).val("N");
								}
							});
						</script>
						<div class="col-md-2">Tax Type</div>
						<div class="col-md-5">
							<div class="form-group">
								<select class="form-control" name="taxtype">
									<?php if($key->less_taxtype  == '0'){ ?>
									<option value="0" selected>ไม่มีหัก</option>
									<?php } else { ?>
									<option value="0">ไม่มีหัก</option>
									<?php }?>
									<?php if($key->less_taxtype == '1'){ ?>
									<option value="1" selected>ค่าขนส่ง 1%</option>
									<?php } else { ?>
									<option value="1">ค่าขนส่ง 1%</option>
									<?php }?>
									<?php if($key->less_taxtype == '2'){ ?>
									<option value="2" selected>ค่าโฆษณา 2%</option>
									<?php } else { ?>
									<option value="2">ค่าโฆษณา 2%</option>
									<?php }?>
									<?php if($key->less_taxtype == '3'){ ?>
									<option value="3" selected>ค่าบริการ 3%</option>
									<?php } else { ?>
									<option value="3">ค่าบริการ 3%</option>
									<?php }?>
									<?php if($key->less_taxtype == '5'){ ?>
									<option value="5" selected>ค่าเช่า 5%</option>
									<?php } else { ?>
									<option value="5">ค่าเช่า 5%</option>
									<?php }?>
									<?php if($key->less_taxtype == '7'){ ?>
									<option value="7" selected>ค่าจ้างเหมา 3%</option>
									<?php } else { ?>
									<option value="7">ค่าจ้างเหมา 3%</option>
									<?php }?>
									<?php if($key->less_taxtype == '8'){ ?>
									<option value="8" selected>ค่าจ้างแรงงาน 3%</option>
									<?php } else { ?>
									<option value="8">ค่าจ้างแรงงาน 3%</option>
									<?php }?>
									<?php if($key->less_taxtype == '9'){ ?>
									<option value="9" selected>ค่าจ้างแรงงาน 3%</option>
									<?php } else { ?>
									<option value="9">ค่าจ้างแรงงาน 3%</option>
									<?php }?>
									<?php if($key->less_taxtype == '15'){ ?>
									<option value="15" selected>ดอกเบี้ยจ่าย 15%</option>
									<?php } else { ?>
									<option value="15">ดอกเบี้ยจ่าย 15%</option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" id="saveadd" class="btn btn-success">
							<i class="icon-floppy-disk"></i> Save</button>
						<button type="button" class="btn bg-danger" data-dismiss="modal">
							<i class="icon-close2"></i> Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="acoount<?php echo $key->id_lessother; ?>" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Account Code</h6>
			</div>
			<div class="modal-body">
				<div id="loadprimary<?php echo $key->id_lessother; ?>"></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="costcode<?php echo $key->id_lessother; ?>" tabindex="-1"
 role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">CostCode</h4>
			</div>
			<div class="modal-body">
				<div id="modal_cost<?php echo $key->id_lessother; ?>"></div>
			</div>
		</div>
	</div>
</div>


<script>
	$('.acoount' + <?php echo $key->id_lessother; ?> ).click(function() {
		$('#loadprimary' + <?php echo $key->id_lessother; ?> ).html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loadprimary' + <?php echo $key->id_lessother; ?> ).load(
			'<?php echo base_url(); ?>index.php/share/accchart/' + <?php echo $key->id_lessother; ?>
		);
	});

	$(".costcode<?php echo $key->id_lessother; ?>").click(function() {
		$('#modal_cost<?php echo $key->id_lessother; ?>').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#modal_cost<?php echo $key->id_lessother; ?>").load(
			'<?php echo base_url(); ?>index.php/share/costcode_id/' + <?php echo $key->id_lessother; ?>
		);
	});
</script>
<?php } ?>
<div id="acoount" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Account Code</h6>
			</div>
			<div class="modal-body">
				<div id="loadprimary"></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">CostCode</h4>
			</div>
			<div class="modal-body">
				<div id="modal_cost"></div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#ma').attr('class', 'active');
	$('#ma7').attr('style', 'background-color:#dedbd8');
	$('.acoount').click(function() {
		$('#loadprimary').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loadprimary').load(
			'<?php echo base_url(); ?>index.php/share/accchart1');
	});

	$(".costcode").click(function() {
		$('#modal_cost').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#modal_cost").load(
			'<?php echo base_url(); ?>index.php/share/costcode');
	});

	$("#chk").click(function() {
		if ($("#chk").prop("checked")) {
			$("#chkvat").val("Y");
		} else {
			$("#chkvat").val("N");
		}
	});
</script>
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
</script>

<div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_lessother');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Expens Cost</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Expens Cost and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/less_other.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
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