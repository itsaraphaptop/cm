<!-- Main content -->
<div class="content-wrapper">

				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Archive IC Reiceive</h5>
							<h5 class="panel-title">Project  (<?php echo $projectsegment; ?>) <?php echo $projname; ?></h5>
							<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a href="<?php echo base_url(); ?>index.php/inventory/receive_po_list/<?php echo $projectsegment; ?>" type="button" class="preload btn btn-default"><i class="icon-undo2"></i>Back</a></li>
			                		</ul>
		                	</div>
						</div>
						<div class="panel-body">

						</div>
						<div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-xxs table-hover datatable-basics">
					          <thead>
						          <tr >
						              <th class="text-center">เลขที่ใบรับสินค้า</th>
						              <th class="text-center" >วันที่รับของ</th>
						              <th class="text-center">เลขที่ใบกำกับ</th>
													<th class="text-center" >วันที่ใบกำกับ:</th>
													<th class="text-center">เลขที่ใบส่งของ</th>
													<th class="text-center">ร้านค้า</th>
						              <th class="text-center">เปิด</th>
						          </tr>
					          </thead>
					          <tbody>
											<?php $n=1; foreach ($res as $v) {?>
												<tr class="text-center">
													<td><?php echo $v->po_reccode; ?></td>
													<td><?php echo $v->po_recdate; ?></td>
													<td><?php echo $v->taxno; ?></td>
													<td><?php echo $v->taxdate; ?></td>
													<td><?php echo $v->docode ?></td>
													<td><?php echo $v->venderid; ?></td>
													<td>
														<button data-toggle="modal" data-target="#open<?php echo $v->po_reccode;?>" class="label label-primary label-xs" name="button">เปิด</button>
														<!-- <a href="<?php echo base_url(); ?>inventory/edit_receive_po_header/<?php echo $v->po_reccode;  ?>/<?php echo $v->po_pono; ?>/e"  class="label label-warning label-xs" name="button">แก้ไข</a> -->
														<!-- <a href="<?php echo base_url(); ?>inventory/print_inventory/<?php echo $v->po_reccode; ?>/<?php echo $v->po_pono;  ?>"  class="label label-info label-xs" name="button">พิมพ์</a> -->
													<a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=receipt.mrt&doccode=<?php echo $v->po_reccode; ?>" target="_blank" class="label label-info label-xs" name="button">พิมพ์</a>

													</td>
												</tr>
												<?php } ?>
					      	</tbody>
					      </table>
					    </div>
						</div>
					</div>
					<!-- /highlighting rows and columns -->


				</div>
				<!-- /content area -->
<!-- Footer -->

			        <!-- /footer -->
</div>
<!-- /Main content -->
<?php $n=1; foreach ($res as $v) {?>
<div id="open<?php echo $v->po_reccode;?>" class="modal fade" data-backdrop="false">
					 <div class="modal-dialog modal-full">
						 <div class="modal-content">
							 <div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
								 <h5 class="modal-title">เลขที่ใบรับสินค้า <?php echo $v->po_reccode; ?></h5>
							 </div>

							 <div class="modal-body">
								 <div class="container-fluid">
								 <div class="row">
								 	<div class="col-md-6">
								 		<div class="form-group">
											<label for="">เลขที่ใบรับสินค้า: <?php echo $v->po_reccode; ?></label>
								 		</div>
								 	</div>
									<div class="col-md-6">
								 		<div class="form-group">
											<label for="">วันที่รับของ: <?php echo $v->po_recdate; ?></label>
								 		</div>
								 	</div>
								 </div>
								 <div class="row">
								 	<div class="col-md-6">
								 		<div class="form-group">
											<label for="">เลขที่ใบกำกับ: <?php echo $v->taxno; ?></label>
								 		</div>
								 	</div>
									<div class="col-md-6">
								 		<div class="form-group">
											<label for="">วันที่ใบกำกับ: <?php echo $v->taxdate; ?></label>
								 		</div>
								 	</div>
								 </div>
								 <div class="row">
								 	<div class="col-md-6">
								 		<div class="form-group">
											<label for="">เลขที่ใบส่งของ: <?php echo $v->docode; ?></label>
								 		</div>
								 	</div>
									<div class="col-md-6">
								 		<div class="form-group">
											<label for="">ร้านค้า: <?php echo $v->venderid; ?></label>
								 		</div>
								 	</div>
								 </div>
							 </div>
							 </div>
							 <table class="table table-bordered table-striped table-xxs table-hover">
								<thead>
									<tr>
										<th width="10%">No.</th>
										<th width="20%">Material Code</th>
										<th>Material Name</th>
										<th> Cost Code</th>
										<th>Cost Name</th>
										<th width="10%">QTY</th>
										<th width="10%">Unit</th>
									</tr>
								</thead>
								<tbody>
								<?php $q = $this->db->query("select * from po_recitem where poi_ref='$v->po_reccode'");
								$resi = $q->result(); $o=1;
								 foreach ($resi as $key => $value) {?>
									<tr>
									 <td><?php echo $o; ?></td>
									 <td><?php echo $value->poi_matcode; ?></td>
									 <td><?php echo $value->poi_matname; ?></td>
									 <td><?php echo $value->poi_costcode; ?></td>
									 <td><?php echo $value->poi_costname; ?></td>
									 <td><?php echo $value->poi_qty; ?></td>
									 <td><?php echo $value->poi_unit; ?></td>
									</tr>
								<?php $o++; } ?>
							</tbody>
							</table>
							 <div class="modal-footer">
								 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
								 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
							 </div>
						 </div>
					 </div>
				 </div>

				 <?php $n++; } ?>
<script>
	$('[data-popup="tooltip"]').tooltip();

	$.extend( $.fn.dataTable.defaults, {
       autoWidth: false,
       columnDefs: [{
           orderable: false,
           width: '100px',
           targets: [ 3 ]
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

$('.datatable-basics').DataTable();
</script>
