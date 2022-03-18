<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>
<!-- Main content  trans-->
			<div class="content-wrapper">





				<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title" style="text-align: left;"><i class="icon-cog3 position-left"></i>Purchase Archive</h5>
              <div class="heading-elements">
              <a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=warehouse.mrt&comp=<?php echo "$compcode" ?>" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
              <a href="<?php echo base_url(); ?>data_master" type="button" class="btn bg-danger" name="button"><i class="icon-close2"></i> Close</a>
						</div>
            </div>

						<div class="panel-body">
              <div class="table-responsive">
					            <table class="table table-hover table-striped table-xxs datatable-basic">
                <thead>
                  <tr>
                    <th>Project Code</th>
                    <th>Project Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($getproj as $key => $value) {?>
                  <tr>
                    <td><?php echo $value->project_code; ?></td>
                    <td><?php echo $value->project_name; ?></td>
                    <td><a href="<?php echo base_url(); ?>setup_wh/setup_warehouse_new/<?php echo $value->project_id; ?>/<?php echo $value->project_code; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>




					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

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
$('#mic').attr('class', 'active');
$('#mic1').attr('style', 'background-color:#dedbd8');
</script>