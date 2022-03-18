<div class="content-wrapper">

				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">

						<div class="panel-body">
						<div class="container-fluid">
							<!-- <div class="form-group"> -->
							<label>Filter:  </label>
								<button class="label label-default"> Total</button>
								<button class="label label-warning"> Waiting</button>
								<button class="label label-success"> Full</button>
							<!-- </div> -->
						</div>
						</div>
						<div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-xs datatable-basics">
					          <thead>
						          <tr>
						              <th class="text-center" width="13%">Receive No.</th>
						              <th class="text-center" width="13%">Requestor</th>
						              <th class="text-left" width="20%">Project Name</th>
						              <th class="text-left" width="20%">Seller / Vender</th>
						              <th class="text-center" width="10%">IC Status</th>
						              <th class="text-center" width="17%">Active</th>
						          </tr>
					          </thead>
					          <tbody>

					          <?php $n = 1;foreach ( $res as $val ) {?>
											<?php $this->db->select( '*' );
 $this->db->where( 'po_pono', $val->po_pono );
 $query = $this->db->get( 'receive_po' );
 $res   = $query->num_rows();

 ////// นับจำนวนรายนการในใบสั่งซื้อที่ยังไมได้รับของ
 $this->db->select( '*' );
 $this->db->where( 'poi_receive', "0" );
 $this->db->where( 'poi_ref', $val->po_pono );
 $qu   = $this->db->get( 'po_item' );
 $resu = $qu->num_rows();

 ?>

					                  <tr>
					                      <td><?php echo $val->po_pono; ?></td>
					                      <td><?php echo $val->po_prname; ?></td>
					                      <td><?php echo $val->project_name; ?></td>
					                      <td><?php echo $val->po_vender; ?></td>
					                      <!-- <td><?php echo $val->po_remark; ?></td> -->
					                      <?php if ( $val->ic_status == "full" ) {?>
					                      <!-- <td class="text-center"> -->
											<?php if ( $val->po_project == "" ) {?>
												<!-- <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_department; ?>/d" class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $res; ?> ใบ"><?php echo $res; ?></a> -->
											<?php } else {?>
												<!-- <a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>/p" class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $res; ?> ใบ"><?php echo $res; ?></a> -->
											<?php }?>


					                      <!-- </td> -->
																<!-- <td class="text-center"><a class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $resu; ?> รายการ"><?php echo $resu; ?></a></td> -->
																<td><span class="label label-success">full</span></td>
																<?php if ( $val->po_project == "" ) {?>
																<td><a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_department; ?>/d" class="label label-info label-xs" disabled="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> OPEN</a>
																<a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_department; ?>/d" class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> RETURN</a> </td>
																<?php } else {?>
																	<td><a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>/p" class="label label-info label-xs" disabled="true"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> OPEN</a>
																	<a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>/p" class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> RETURN</a> </td>
																<?php }?>



					                      <?php } else {?>
																<!-- <td class="text-center"><a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>" class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $res; ?> ใบ"><?php echo $res; ?></a></td> -->
																<!-- <td class="text-center"><a class="editable editable-click" data-popup="tooltip" title="" data-original-title="<?php echo $resu; ?> รายการ"><?php echo $resu; ?></a></td> -->
																<td><span class="label label-warning">Waiting</span></td>
																<?php if ( $val->po_project == "" ) {?>
																<td><a href="<?php echo base_url(); ?>inventory/receive_header/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>dd" class="preload label label-primary label-xs"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Receive</a>
																<a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>dd" class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> RETURN</a> </td>
																<?php } else {?>
																<td><a href="<?php echo base_url(); ?>inventory/receive_header/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>/p" class="preload label label-primary label-xs"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Receive</a>
																<a href="<?php echo base_url(); ?>inventory/archive_receive_po/<?php echo $val->po_pono; ?>/<?php echo $val->po_project; ?>/p" class="label label-warning label-xs" disabled="true"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> RETURN</a> </td>
																<?php }?>
										<?php }?>
					                  </tr>
					          <?php $n++;}?>


					      	</tbody>
					      </table>
					    </div>
						</div>
					</div>
					<!-- /highlighting rows and columns -->


				</div>
				<!-- /content area -->
<!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			        <!-- /footer -->
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
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
