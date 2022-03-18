<?php foreach ($getbooking as $key) {
	$project_code = $key->project_code;
	$project_name =$key->project_name;
 }
 
 
 $session_data = $this->session->userdata('sessed_in');
 $username = $session_data['username'];
 $compcode = $session_data['compcode'];
 
 ?>
<div class="content-wrapper">

		<div class="content">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Booking Archive Project</h5>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered  table-xxs datatable-basic">
							<thead>
								<tr>
									<th class="text-center" width="10%">Booking Code</th>
									<th class="text-center" width="10%">Issue Code</th>
									<th>Remark</th>
									<th class="text-center" width="10%">Status</th>
									<th class="text-center" width="20%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($getbooking as $key => $value) {?>
								<tr>
									<td><?php echo $value->book_code; ?></td>
									<td><?php echo $value->issuecode; ?></td>
									<td><?php echo $value->remark; ?></td>
									<?php if ($value->status=="issue") {?>
										<td><span class="label label-success"><?php echo $value->status; ?></span></td>
									<?php }else{?>
										<td><span class="label label-danger"><?php echo $value->status; ?></span></td>
									<?php }?>
									<td>
										<a href="<?php echo base_url(); ?>report/viewerload?type=ic&typ=ic_booking&var1=<?php echo $value->book_code; ?>&var2=<?php echo $compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a>
										<!-- <a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_booking.mrt&doccode=<?php echo $value->book_code; ?>&compcode=<?php echo $compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a> -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php foreach ($getbooking as $key => $value) {
					$this->db->select('project_code,project_name');
					$this->db->where('project_id',$value->from_project);
					$q = $this->db->get('project');
					$res = $q->result();
					foreach ($res as $ue) {
						$proj_code = $ue->project_code;
						$proj_name = $ue->project_name;
					}
			?>
			<form id="contactForm1" action="<?php echo base_url(); ?>inventory_active/revese_booking" method="post">
				<div class="modal fade" id="reves<?php echo $value->book_code;?>" data-backdrop="false">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Reverse Material</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-4">
										<label for="">Book Code : <?php echo $value->book_code; ?></label><input type="hidden" name="bookno" value="<?php echo $value->book_code; ?>">
										<label for="">Project Code : <?php echo $proj_code; ?></label><input type="hidden" name="projeid" value="<?php echo $value->from_project; ?>">
										<label for="">Project Name : <?php echo $proj_name; ?></label>
										<label for="">Address : <?php echo $value->address_book; ?></label>
										<br>
										<label for="">Remark : <?php echo $value->remark; ?></label>
										<br>
										<label for="">Message : <?php echo $value->message; ?></label>
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<label for="">Book Date : <?php echo $value->date_book; ?></label>
										<label for="">Book Name : <?php echo $value->name_book; ?></label>
									</div>
								</div>
							</div>
							<table class="table table-xxs table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Material Code</th>
										<th>Material Name</th>
										<th>Qty</th>
										<th>Unit</th>
									</tr>
								</thead>
								<tbody>
									<?php $n=1; foreach ($item as $key ) {?>
									<tr>
										<td><?php echo $n; ?></td>
										<td><?php echo $key->mat_code; ?><input type="hidden" name="matcodei[]" value="<?php echo $key->mat_code; ?>"></td>
										<td><?php echo $key->mat_name; ?></td>
										<td><input type="number" class="form-control input-sm" name="qtyi[]" value="<?php echo $key->qty; ?>"></td>
										<td><?php echo $key->unit; ?></td>
									</tr>
									<?php $n++; ?>
								</tbody>
							</table>
							<?php
								$ee = $this->db->query("SELECT * from project where project_id='$proj'")->result();
								foreach ($ee as $sec) {
									$seci = $sec->acc_secondary;
									$pri = $sec->acc_primary;
								}
							?>
							
							<input type="hidden" value="<?php echo $seci; ?>" name="acc_code[]">
							<input type="hidden" name="dr[]" value="<?php echo $key->qty*$key->priceunit; ?>">
							<input type="hidden" name="cr[]" value="0">
							<input type="hidden" value="<?php echo $pri; ?>" name="acc_code[]">
							<input type="hidden" name="dr[]" value="0">
							<input type="hidden" name="cr[]" value="<?php echo $key->qty*$key->priceunit; ?>">
							<?php }  ?>
							<br>
							<div class="modal-footer">
								<button type="submit"  id="save" class="btn btn-danger">Reverse</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
					</div> <!--end modal -->
				</form>
				<?php } ?>
				<!-- Highlighting rows and columns -->
				<!-- /highlighting rows and columns -->
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->
		<!-- <script type="text/javascript">
		$("#save").click(function(){
			var frm = $('#contactForm1');
			frm.submit(function (ev) {
					$.ajax({
							type: frm.attr('method'),
							url: frm.attr('action'),
							data: frm.serialize(),
							success: function (data) {
								// $("#pono").val(data);
								alert('data');
							}
					});
					ev.preventDefault();
			});
		});
		</script> -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>

  $('#imp').attr('class', 'active');
  $('#reservation').attr('class', 'active');
  $('#imp_sub6').attr('style', 'background-color:#dedbd8');

$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '150px',
         targets: [ 0 ]
     }],
     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
     language: {
         search: '<span>Filter:</span> _INPUT_',
         lengthMenu: '<span>Show:</span> _MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
     },
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basic').DataTable(); 



</script>