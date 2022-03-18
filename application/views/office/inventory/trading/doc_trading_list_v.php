
			<div class="content-wrapper">

				<div class="content">

					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"> Archive Trading</h5>
								</div>

						<div class="panel-body">
              <div class="dataTables_wrapper no-footer">
  						<div class="table-responsive">
							<table id="datatable-basic" class="table table-hover table-striped table-xs basic">
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
    							  <td><?php echo $value->trading_doccode; ?></td>
    				<td><?php echo $value->trading_bookcode; ?></td>
                    <td><?php echo $value->trading_reqname; ?></td>
                    <td><?php echo $value->trading_place; ?></td>
                    <!-- <td><span class="label label-danger">inprogress</span></td> -->
                    <td class="text-center">
                      <ul class="icons-list">
                          <!-- <li><a class="preload" href="" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li> -->
                          <!-- <li><a href="#" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li> -->
                          <li><a href="<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_issue.mrt&doccode=<?php echo $value->trading_doccode; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
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



				
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

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


  $('#imp').attr('class', 'active');
   $('#trading').attr('class', 'active');
   $('#imp_trading_8').attr('style', 'background-color:#dedbd8');
  </script>
