<!-- Main content  trans-->
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
		<!-- Highlighting rows and columns -->

		<div class="panel panel-flat">


			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-highlight">
						<li class="active">
							<a href="#default-pill1" data-toggle="tab" aria-expanded="false">Project</a>
						</li>
						<li class="">
							<a href="#default-pill2" data-toggle="tab" aria-expanded="true">Department</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="default-pill1">
							<div class="col-md-12">
								<div class="dataTables_wrapper no-footer">
									<div class="table-responsive">
                                        <table class="table table-xxs table-hover" id="tbcus">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Project Code</th>
                                                    <th>Project Name</th>
                                                    <th>Owner Name</th>
                                                    <th>Type</th>
                                                    <th class="text-center">Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; foreach ($rows as $key => $value) { ?>
                                                <tr  <?php if($value['status']=="W"){ echo 'style="color: #6699FF";'; }else if($value['status']=="Y"){
                                                    echo 'style="color: #FF3300";';
                                                } ?>>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value['site_no']; ?></td>
                                                    <td><?php echo $value['after_site_no']; ?></td>
                                                    <td><?php echo $value['after_customer']; ?></td>
                                                    <td><?php echo $value['payment_type']; ?></td>
                                                    <td class="text-center"><?php echo $value['status']; ?></td>
                                                    <td><a href="<?php echo base_url();?>management/ProgressSubmitEdit/<?php echo $value['submit_no'];?>/pgsub" class="label label-primary">Select</a></td>
                                                </tr>
                                            <?php $i++;} ?>
                                            </tbody>
                                        </table>
									</div>
								</div>
							</div>
						</div>
                        <div class="tab-pane" id="default-pill2">
                        </div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /content area -->

</div>
<!-- /main content -->
<!-- /core JS files -->
<script>
	$.extend($.fn.dataTable.defaults, {
		autoWidth: false,
		columnDefs: [{
			orderable: false,
			width: '100px',
			targets: [2]
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

    $('#project_h').attr('class', 'active');
  $('#project_arr').attr('style', 'background-color:#dedbd8');
</script>