<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
			</div>
		</div>
		<div class="content">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Select Project Planning</h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>
				<div class="panel-body">
					<div class="tabbable">
						<div class="tab-content">
							<div class="tab-pane active" id="bottom-tab1">
								<div class="col-md-12">
										<div class="dataTables_wrapper no-footer">
									        <div class="table-responsive">
									            <table class="table table-hover table-bordered  table-xxs datatable-basic">
													<thead>
														<tr>
															<th>Project Code</th>
															<th>Project Name</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
															<?php foreach ($getproj as $key => $value) { ?>
	
															<tr>
																<td><?php echo $value->project_code; ?></td>
																<td><?php echo $value->project_name; ?></td>
																<td><a href="<?php echo base_url(); ?>index.php/ar/ar_receivingother/<?php echo $value->project_id; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>

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
			</div>
		</div>
			<!-- /main content -->
	</div>
</div>

<?php 
foreach ($getproj as $value) {
 ?>
 <!-- modal  โครงการ-->
           <div class="modal fade" id="account<?php echo $value->project_id; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">View Project Account <?php echo $value->project_id; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="modal_detail<?php echo $value->project_id; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->
    <script>
            $(".account<?php echo $value->project_id; ?>").click(function(){
              $("#modal_detail<?php echo $value->project_id; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_detail<?php echo $value->project_id; ?>").load('<?php echo base_url(); ?>ar/view_account/<?php echo $value->project_id; ?>');
            });
    </script>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 2 ]
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