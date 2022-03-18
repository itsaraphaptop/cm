<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Archive IC Reiceive</a></li>
					</div>
				</div>
				<!-- /page header -->
				<div class="content">
					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat border-top-lg border-top-warning">
						<div class="panel-heading">
							<h5 class="panel-title">Archive IC Reiceive</h5>
							<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a href="<?php echo base_url(); ?>index.php/inventory/open" type="button" class="preload btn btn-default"><i class="icon-undo2"></i>Back</a></li>
			                		</ul>
		                	</div>
						</div>
						<div class="panel-body">

						</div>
						<div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-xs datatable-basics">
					          <thead>
						          <tr>
						              <th class="text-center">เลขที่ใบสั่งซื้อ</th>
						              <th class="text-center" >ผู้ขอซื้อ</th>
						              <th>ร้านค้า</th>
						              <th class="text-center">รายละเอียดใบสั่งซื้อ</th>
													<th class="text-center" >ใบรับสินค้า</th>
													<th class="text-center">รายการ</th>
						              <th class="text-center" >สถานะ</th>
						              <th class="text-center">เปิด</th>
						          </tr>
					          </thead>
					          <tbody>


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
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script> -->
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
