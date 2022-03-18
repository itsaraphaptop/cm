<!-- Main content  trans-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - Inventory</span></h4>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<!-- <li><a href="<?php echo base_url(); ?>inventory/receive_transfer_store">Receive Transfer Material</a></li> -->
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Booking</h5>
							<div class="heading-elements">
								<!-- <ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul> -->
		                	</div>
						</div>

						<div class="table-responsive">
					            <table class="table table-hover table-bordered  table-xxs datatable-basic">
                <thead>
                  <tr>
                    <th>Project Code</th>
                    <th>Project Name</th>
                    <th>View</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($getproj as $key => $value) {
                  	?>
                  <tr>
                    <td><?php echo $value->project_code; ?></td>
                    <td><?php echo $value->project_name; ?></td>
                    
                    <?php 
                      $this->db->select('');
                    $this->db->from('asset');
                    $this->db->where('fa_projectid', $value->project_id);
                    $this->db->where('compcode', $compcode);
                    $query = $this->db->get();
                    $result1 = $query->num_rows();
                      ?>
                      <td>
                      <button data-toggle="modal" data-target="#booking<?php echo $value->project_id; ?>" class="booking<?php echo $value->project_id; ?> label label-info"> View</button>
                      <span class="count badge bg-warning-400"><?php echo $result1; ?></span>
                    </td>
                    	<td><a href="<?php echo base_url(); ?>add_asset/add_assets/<?php echo $value->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<?php 
foreach ($getproj as $value) {
 ?>
 <!-- modal  เนเธเธฃเธเธเธฒเธฃ-->
           <div class="modal fade" id="booking<?php echo $value->project_id; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">View Booking <?php echo $value->project_id; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="modal_detail<?php echo $value->project_id; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->

           <!-- modal  เนเธเธฃเธเธเธฒเธฃ-->
           <div class="modal fade" id="booking_all<?php echo $value->project_id; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">View Booking <?php echo $value->project_id; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="modal_detail_all<?php echo $value->project_id; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->
    <script>
            $(".booking<?php echo $value->project_id; ?>").click(function(){
              $("#modal_detail<?php echo $value->project_id; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_detail<?php echo $value->project_id; ?>").load('<?php echo base_url(); ?>inventory/view_unbooking/<?php echo $value->project_id; ?>');
            });

            $(".booking_all<?php echo $value->project_id; ?>").click(function(){
              $("#modal_detail_all<?php echo $value->project_id; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_detail_all<?php echo $value->project_id; ?>").load('<?php echo base_url(); ?>inventory/view_unbooking_all/<?php echo $value->project_id; ?>');
            });
    </script>
<?php } ?>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
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