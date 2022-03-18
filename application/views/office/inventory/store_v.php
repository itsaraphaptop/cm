<div class="content-wrapper">
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
			</div>
			<div class="heading-elements">
			</div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Store</a></li>
			</ul>
		</div>
	</div>
		<div class="content">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Store Project - <?php echo $project; ?></h5>
					<div class="heading-elements">
						<a href="<?php echo base_url(); ?>inventory/main_store_list"><span class="label label-default heading-text">Back</span></a>
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
                	</div>
				</div>

				<div class="panel-body">
					<div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-xxs datatable-basic">
								<thead>
									<tr>
										<th  class="text-center">Material Code</th>
										<th  class="text-center">Material Name</th>
										<th  class="text-center">QTY (IN)<br>(1)</th>
										<th  class="text-center">Qty (Out) Book <br>(2)</th>
										<th  class="text-center">Qty (Out) Un Book<br>(3)</th>
										<th  class="text-center">Qty Balance<br>(1-2-3)=(4)</th>
										<th class="text-center">IC Qyt Bal<br>(1-2)=(5)</th>
										<th  class="text-center">Unit</th>
										<th class="text-center">Warehouse</th>
										<!-- <th  class="text-center">Actions</th> -->
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($res as $value) {
										if ($value->store_qty != 0 || $value->unbooking != 0 || $value->booking != 0) {
									
									$total = $value->store_totalqty;
									$icqty = $total-$value->booking;
									$qytbal =$total-$value->unbooking-$value->booking;
									?>
									<tr>
										<td><?php echo $value->store_matcode; ?></td>
										<td><?php echo $value->store_matname; ?></td>
										<td class="text-right">
											<a data-toggle="modal" data-target="#qtyin<?php echo $value->store_matcode; ?>" class="qtyin<?php echo $value->store_matcode; ?>"> <?php echo number_format($value->store_totalqty,2); ?></a>
										</td>
										<td class="text-right">
											<a data-toggle="modal" data-target="#booking<?php echo $value->store_matcode; ?>" class="booking<?php echo $value->store_matcode; ?>"> <?php echo number_format($value->booking,2); ?></a>
										</td>
										<td class="text-right">
											<a data-toggle="modal" data-target="#upbook<?php echo $value->store_matcode; ?>" class="upbook<?php echo $value->store_matcode; ?>"><?php echo number_format($value->unbooking,2); ?></a>
										</td>
										<td class="text-right"><?php echo number_format($qytbal); ?></td>
										<td class="text-right"><?php echo number_format($icqty); ?></td>
										<td><?php echo $value->store_unit; ?></td>
										<td><?php echo $value->whname; ?></td>
										<?php
										}
										?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

		</div>
</div>
	<?php foreach ($res as $value) { ?>
		<!-- modal  booking-->
           <div class="modal fade" id="booking<?php echo $value->store_matcode; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Material <?php echo $value->store_matcode."  ".$value->store_matname; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="mat_booking<?php echo $value->store_matcode; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->

          <!-- modal  qtyin-->
           <div class="modal fade" id="qtyin<?php echo $value->store_matcode; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Material <?php echo $value->store_matcode."  ".$value->store_matname; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="mat_qtyin<?php echo $value->store_matcode; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end qtyin -->
          <!-- modal  upbook-->
           <div class="modal fade" id="upbook<?php echo $value->store_matcode; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Material <?php echo $value->store_matcode."  ".$value->store_matname; ?></h4>
                </div>
                  <div class="modal-body">
                    <div id="mat_upbook<?php echo $value->store_matcode; ?>">
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end upbook -->
<script>

	$(".booking<?php echo $value->store_matcode; ?>").click(function(){
        $("#mat_booking<?php echo $value->store_matcode; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#mat_booking<?php echo $value->store_matcode; ?>").load('<?php echo base_url(); ?>inventory/mat_booking/<?php echo $value->store_matcode; ?>/<?php echo $value->wh; ?>/<?php echo $value->store_project; ?>');
    });

    $(".qtyin<?php echo $value->store_matcode; ?>").click(function(){
        $("#mat_qtyin<?php echo $value->store_matcode; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#mat_qtyin<?php echo $value->store_matcode; ?>").load('<?php echo base_url(); ?>inventory/mat_qtyin/<?php echo $value->store_matcode; ?>/<?php echo $value->wh; ?>/<?php echo $value->store_project; ?>');
    });

    $(".upbook<?php echo $value->store_matcode; ?>").click(function(){
        $("#mat_upbook<?php echo $value->store_matcode; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#mat_upbook<?php echo $value->store_matcode; ?>").load('<?php echo base_url(); ?>inventory/mat_upbook/<?php echo $value->store_matcode; ?>/<?php echo $value->wh; ?>/<?php echo $value->store_project; ?>');
    });
 </script>    

 <?php } ?>
 <script>
$.extend( $.fn.dataTable.defaults, {
		 autoWidth: false,
		 columnDefs: [{
				 orderable: false,
				 width: '30%',
				 targets: [ 1 ]
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
