<!-- Main content  trans-->
<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			<!-- Highlighting rows and columns -->
			<div class="panel panel-flat">
				<div class="panel-heading">
                    <h6 class="panel-title">Archive Compare<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                </div>
				<div class="panel-body">
						<div class="tab-content">
                            <div class="col-md-12">
                                <div class="dataTables_wrapper no-footer">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered  table-xxs datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">PR No.</th>
                                                    <th>Place</th>
                                                    <th>Date</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $n=1; foreach ($getpo as $key => $value) {?>
                                                <tr>
                                                    <td><?php echo $n++;?></td>
                                                    <td><?php echo $value->pr_code; ?></td>
                                                    <td><?php echo $value->pr_place;?></td>
                                                    <td><?php echo $value->pr_prdate; ?></td>
                                                    
                                                    <td class="text-center">
                                                    <!-- <a class="label label-warning" data-toggle="modal" data-target="#open<?php echo $value->pr_project;?>">open</a> -->
                                                    <a href="<?php echo base_url(); ?>purchase/edit_compare_price/<?php echo $value->pr_project; ?>/<?php echo $value->pr_code;?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a>
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
			
			<!-- Highlighting rows and columns -->
			<!-- /highlighting rows and columns -->
		</div>
		<!-- /content area -->
	</div>
	<!-- /main content -->

	<!-- /core JS files -->


    
	<?php foreach ($getpo as $key => $val) {?>
	<div id="open<?php echo $val->pr_project;?>" class="modal fade" data-backdrop="false">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><i class="icon-cross"></i></button>
					<h5 class="modal-title">Open Compare No: <?= $val->pr_code;?></h5>
				</div>
				<div class="modal-body">
					<div class="col-md-4">Compare :</div>
					<div class="col-md-4">dd</div>
					<div class="col-md-4">dd</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<script>
	$.extend( $.fn.dataTable.defaults, {
	autoWidth: false,
	columnDefs: [{
	orderable: false,
	width: '100px',
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
    
  $('#compare').attr('class', 'active');
  $('#archive_rq').attr('style', 'background-color:#dedbd8');
</script>