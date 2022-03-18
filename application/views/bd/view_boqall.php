<div class="content-wrapper">

	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-body">
				<table class="table table-hover table-xss" id="tbTender">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tender Code.</th>
							<th>Tender Name</th>
							<th>Tender Date</th>
							<th>Customer/Owner</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
				$i =1;
					foreach ($res as $key => $value) {
				?>
						<tr>
							<td>
								<?=$i;?>
							</td>
							<td>
								<?=$value['bd_tenid'];?>
							</td>
							<td>
								<?=$value['bd_pname'];?>
							</td>
							<td>
								<?=$value['bd_date'];?>
							</td>
							<td>
								<?=$value['bd_cusn'];?>
							</td>
							<td>
								<a href="#" data-toggle="modal" boq_id="<?=$value['bd_tenid']?>" data-target="#view_boq_by_id"
								 class="view_boq">
									<i class="icon-folder-open"></i>
								</a>
								<a href="<?php echo base_url(); ?>bd/page_bd_tender_edit/<?=$value['bd_tenid'];?>">
									<i class="icon-pencil7"></i>
								</a>
								<a href="#" class="delid" delid="<?=$value['bd_tenid'];?>" data-original-title="Remove"
								 data-layout="bottomRight" data-type="confirm">
									<i class="icon-trash"></i>
								</a>
								<!-- <a href="#"><i class="icon-printer4"></i></a> -->
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
</div>
<div class="modal fade" id="view_boq_by_id" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Tender No.
					<span class="labeltitle"></span>
				</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>Tender No :</label>
								<input type="text" class="form-control input-xs" id="bd_tenid" value="" readonly="true">
							</div>
						</div>
						<div class="col-xs-4">
							<div class="form-group">
								<label class="display-block text-semibold">Type :</label>
								<label class="radio-inline disabled">
									<input type="radio" id="bd_bdstats1"> ConStruction
								</label>
								<label class="radio-inline disabled">
									<input type="radio" id="bd_bdstats2"> Real Estate
								</label>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label>Status :</label>
								<input type="text" class="form-control input-xs" id="bd_status" readonly="true">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label>Project No :</label>
								<input type="text" class="form-control input-xs" id="bd_pno" readonly="true">
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label class="control-label">Project Name :</label>
								<input type="text" class="form-control input-xs" id="bd_pname" readonly="true">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-2">
							<label class="control-label">Customer/Owner :</label>
							<input type="text" class="form-control input-xs" id="bd_cus" readonly="true">
						</div>
						<div class="col-xs-3">
							<label class="control-label">&nbsp;</label>
							<input type="text" class="form-control input-xs" id="bd_cusn" readonly="true">
						</div>
						<div class="form-group col-xs-3">
							<label class="control-label">Project Contract No. :</label>
							<input type="text" class="form-control input-xs" id="bd_conno" readonly="true">
						</div>
						<div class="col-xs-4">
							<label class="control-label">&nbsp;</label>
							<input type="text" class="form-control input-xs" id="bd_conname" readonly="true">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-xs-2">
							<label class="control-label">Unit Type :</label>
							<input type="text" class="form-control input-xs" id="bd_unit" readonly="true">
						</div>
						<div class="col-xs-3">
							<label class="control-label">&nbsp;</label>
							<input type="text" class="form-control input-xs" id="bd_unitname" readonly="true">
						</div>
						<div class="form-group col-xs-2">
							<label class="control-label">Unit No :</label>
							<input type="text" class="form-control input-xs" id="bd_unitno" readonly="true">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-xs-3">
							<label>Group Type :</label>
							<input type="text" class="form-control input-xs" id="bd_gtype" readonly="true">
						</div>
						<div class="col-xs-3">
							<label>Besiness Unit :</label>
							<input type="text" class="form-control input-xs" id="bd_besiness" readonly="true">
						</div>
						<div class="col-xs-3">
							<label>Product Type :</label>
							<input type="text" class="form-control input-xs" id="bd_produce" readonly="true">
						</div>
					</div>
					<div class="row">
						<table class="table table-hover table-bordered table-striped table-xxs">
							<thead>
								<tr>
									<th class="">No.</th>
									<th class="">Job</th>
									<th class="">Job Name</th>
									<th class="">Amount</th>
								</tr>
							</thead>
							<tbody id="modal_tb">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('body').attr('class', 'navbar-top pace-done');
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
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
	$('#tbTender').DataTable();
	$('.view_boq').click(function(event) {
		$('#modal_tb').empty();
		var id = $(this).attr('boq_id');

		$.post('<?php echo base_url(); ?>bd/sel_tender_by_id/' + id, function() {
			/*optional stuff to do after success */
		}).done(function(data) {
			try {
				var json_res = jQuery.parseJSON(data);
				$('#bd_tenid').val(json_res.header[0].bd_tenid);
				if (json_res.header[0].bd_bdstats == '1') {
					$('#bd_bdstats1').prop('checked', true);
					$('#bd_bdstats2').prop('checked', false)
				} else if (json_res.header[0].bd_bdstats == '2') {
					$('#bd_bdstats2').prop('checked', true);
					$('#bd_bdstats1').prop('checked', false)
				}
				$("#bd_status").val(json_res.header[0].bd_status);
				$("#bd_pno").val(json_res.header[0].bd_pno);
				$("#bd_pname").val(json_res.header[0].bd_pname);
				$("#bd_cus").val(json_res.header[0].bd_cus);
				$("#bd_cusn").val(json_res.header[0].bd_cusn);
				$("#bd_conno").val(json_res.header[0].bd_conno);
				$("#bd_conname").val(json_res.header[0].bd_conname);
				$("#bd_unit").val(json_res.header[0].bd_unit);
				$("#bd_unitname").val(json_res.header[0].bd_unitname);
				$("#bd_unitno").val(json_res.header[0].bd_unitno);
				$("#bd_gtype").val(json_res.header[0].bd_gtype);
				$("#bd_besiness").val(json_res.header[0].bd_besiness);
				$("#bd_produce").val(json_res.header[0].bd_produce);

				$.each(json_res.detail, function(index, val) {
					var patt = "<tr><td>" + (index + 1) + "</td><td>" + val.bdd_jobno + "</td><td>" + val.bdd_jobname +
						"</td><td>" + val.bdd_amount + "</td></tr>";
					$('#modal_tb').append(patt);
				});
			} catch (e) {
				console.log(data);
				console.log(e);
			}
		});
	});

	$('.delid').click(function(event) { // <-- changes
		var self = $(this);
		var id = $(this).attr('delid');

		noty({
			width: 200,
			text: "Do you want to Delete?",
			type: self.data('type'),
			dismissQueue: true,
			timeout: 1000,
			layout: self.data('layout'),
			buttons: (self.data('type') != 'confirm') ? false : [{
					addClass: 'btn btn-primary btn-xs',
					text: 'Ok',
					onClick: function($noty) { //this = button element, $noty = $noty element
						$.post('<?php echo base_url(); ?>bd/del_tender_by_id/' + id,
							function() {
								/*optional stuff to do after success */
							}).done(function(data) {
							// console.log(data);
							var json_res = jQuery.parseJSON(data);
							if (json_res.status == "true") {
								$noty.close();
								noty({
									force: true,
									text: 'Deleteted',
									type: 'success',
									layout: self.data('layout'),
									timeout: 1000
								});
								location.reload();
							} else {
								alert("ไม่สามารถลบได้");
							}
						});

					}
				},
				{
					addClass: 'btn btn-danger btn-xs',
					text: 'Cancel',
					onClick: function($noty) {
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

	$('#boq').attr('class', 'active');
	$('#archive_boq').attr('style', 'background-color:#dedbd8');
</script>