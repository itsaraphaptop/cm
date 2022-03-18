<?php
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>
		
			<div class="content-wrapper">

				<div class="content">

					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Document Issue Archive</h5>
								</div>

						<div class="panel-body">
              <div class="dataTables_wrapper no-footer">
  						<div class="table-responsive">
							<table class="table table-bordered table-striped table-xs datatable-basic">
							<thead>
								<tr>
									<th  class="text-center">Doc No.</th>
									<th  class="text-center">Booking No.</th>
									<th  class="text-center">Request Name</th>
									<th  class="text-center">Detail Place</th>
									<th  class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							  <?php foreach ($res as $value) {?>
                  <tr  class="text-center">
    							  <td><?php echo $value->is_doccode; ?></td>
    				<td><?php echo $value->is_bookcode; ?></td>
                    <td><?php echo $value->is_reqname; ?></td>
                    <td><?php echo $value->is_place; ?></td>
                    <!-- <td><span class="label label-danger">inprogress</span></td> -->
                    <td class="text-center">
                      <ul class="icons-list">
                          <li><a class="preload" href="<?php echo base_url();?>inventory/edit_issue/<?php echo $value->is_doccode;?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                          <!-- <li><a href="#" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li> -->
                          <!-- <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_issue.mrt&doccode=<?php echo $value->is_doccode; ?>&compcode=<?php echo $compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
                          <li><a href="<?php echo base_url();?>report/viewerload?type=ic&typ=ic_issue&var1=<?php echo $value->is_doccode; ?>&var2=<?php echo $compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                      </ul>
                    </td>
                  </tr>
							  <?php } ?>
							</tbody>
						</table>
						</div>
          </div>
					</div>
          </div>
					<!-- /highlighting rows and columns -->



					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

  <script>
	$.extend( $.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '150px',
			targets: [0 ]
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


	$('#imp').attr('class', 'active');
	$('#issue').attr('class', 'active');
	$('#imp_sub8').attr('style', 'background-color:#dedbd8');
  </script>
