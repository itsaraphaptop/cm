<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard -     ภาพรวมระบบ</span></h4>
			</div>
			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>
		</div>
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Purchase Archive</a></li>
      </ul>
		</div>
	</div>

	<div class="content">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Purchase Archive</h5>
				<div class="heading-elements">
					<ul class="icons-list">
         		<li><a data-action="collapse"></a></li>
         		<li><a data-action="reload"></a></li>
         		<li><a data-action="close"></a></li>
         	</ul>
       	</div>
			</div>
			<div class="panel-body">
				<div class="text-right">
            <a href="<?php echo base_url(); ?>purchase/opencreatepo" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
            <a href="/" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
        </div>
  		</div>
      <div class="dataTables_wrapper no-footer">
  			<div class="table-responsive">
  				<table class="table table-hover table-bordered  table-xxs datatable-basic">
						<thead>
							<tr>
								<th width="10%" class="text-center">PO No.</th>
								<th width="10%" class="text-center">PR No.</th>
								<th width="20%" class="text-center">Name</th>
								<th width="20%" class="text-center">Project/Department</th>
								<!-- <th>Detail</th> -->
                                                    <th width="20%" class="text-center">Vender</th>
								<th width="10%" class="text-center">Date</th>
                <th width="10%" class="text-center">Status</th>
								<th width="10%" class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($po as $val) {?>
							<tr>
  							<td class="text-center"><?php echo $val->po_pono; ?></td>
  							<td class="text-center"><?php echo $val->po_prno; ?></td>
  							<td><?php echo $val->po_prname; ?></td>
  							<td class="text-center"><?php echo $val->project_name; ?><?php echo $val->department_title; ?></td>
  							<!-- <td><?php echo $val->po_remark; ?></td> -->
                                                    <td><?php echo $val->po_vender;?></td>
  							<td class="text-center"><?php echo $val->po_podate; ?></td>
                <?php if ($val->po_approve=="approve") {?>
                <td class="text-center"><span class="label label-success"><?php echo $val->po_approve; ?></span></td>
                <?php }else{ ?>
                <td class="text-center"><span class="label label-warning">IN Processing</span></td>
                <?php } ?>
  							<td>
  								<ul class="icons-list">
  										<li><a data-toggle="modal" data-target="#open<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
  									<?php if ($val->po_approve=="approve") {?>
  										<li class="text-slate"><i class="icon-pencil7"></i></li>
  										<li class="text-slate"><i class="icon-trash"></i></li>
  									<?php }else{ ?>
  										<li><a class="preload" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
  										<li><a id="remove<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
  										<?php } ?>
  										<!-- <li><a href="<?php echo base_url(); ?>purchase/report_po/<?php echo $val->po_pono; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
                      <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=<?php echo $reporttype; ?>&pp=<?php echo $val->po_id; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
                                                                      
  								</ul>
  							</td>
							</tr>
              <script>
                $('#remove<?php echo $val->po_pono; ?>').on('click', function() {
                  swal({
                    title: "Are you sure?",
                    text: "Deleted ",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#EF5350",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel pls!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                  function(isConfirm){
                    if (isConfirm) {
                      var url="<?php echo base_url(); ?>purchase_active/deletepo/<?php echo $val->po_pono; ?>/<?php echo $val->po_prno; ?>";
                      var dataSet={
                      };
                      $.post(url,dataSet,function(data){
                        $(this).closest('tr').remove();
                          swal({
                            title: "Deleted!",
                            text: data,
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                      });
                    }
                   else {
                   swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                    });
                    }
                   window.location.href = "<?php echo base_url(); ?>purchase/po_archive";
                  });
                });
              </script>
						 <?php	} ?>
						</tbody>
					</table>
				</div>
      </div>
		</div> 

    <?php foreach ($po as $val2) {?>
		<div id="open<?php echo $val2->po_pono; ?>" class="modal fade">
			<div class="modal-dialog modal-full">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title"> #<?php echo $val2->po_pono; ?></h5>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6 content-group">
								<img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
	 							<!-- <ul class="list-condensed list-unstyled">
									<li>2269 Elba Lane</li>
									<li>Paris, France</li>
									<li>888-555-2311</li>
								</ul> -->
							</div>

							<div class="col-md-6 content-group">
								<div class="invoice-details">
									<h5 class="text-uppercase text-semibold"> #<?php echo $val2->po_pono; ?></h5>
									<ul class="list-condensed list-unstyled">
										<li>Date: <span class="text-semibold"><?php echo $val2->po_podate; ?></span></li>
										<!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
									</ul>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
									<span class="text-muted">PO No:</span>
									<ul class="list-condensed list-unstyled">
										<li><h5><?php echo $val->po_pono; ?></h5></li>
									</ul>
							</div>

							<div class="col-md-4">
								<span class="text-muted">PR Requsition:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_prname; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">PR No.:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_prno; ?></h5></li>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<span class="text-muted">Project/Department:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->project_name; ?><?php echo $val2->department_title; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">System:</span>
								<ul class="list-condensed list-unstyled">
									<?php if($val2->po_system == '1'){ ?><li><h5>OVERHEAD</h5></li>
									<?php }else if($val2->po_system == '2'){ ?><li><h5>AC</h5></li>
									<?php }else if($val2->po_system == '3'){ ?><li><h5>EE</h5></li>
									<?php }else if($val2->po_system == '4'){ ?><li><h5>SN</h5></li>
									<?php }else if($val2->po_system == '5'){ ?><li><h5>CIVIL</h5></li>
										<?php } ?>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<span class="text-muted">Vender:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_vender; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">Credit term:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_trem; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">Vender Tel:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_contact; ?></h5></li>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<span class="text-muted">Contact No:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_contactno; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">Quotation:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_quono; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">Delivery Day:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_deliverydate; ?></h5></li>
								</ul>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<span class="text-muted">Delivery Place:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_place; ?></h5></li>
								</ul>
							</div>
							<div class="col-md-4">
								<span class="text-muted">Remark:</span>
								<ul class="list-condensed list-unstyled">
									<li><h5><?php echo $val2->po_remark; ?></h5></li>
								</ul>
							</div>
						</div>
						<legend class="text-muted"> Detail</legend>
					</div>
  				<div class="container-fluid table-responsive">
  					<table class="table table-xxs table-bordered">
  						<thead>
  							<tr>
  								<th>#</th>
  								<th>Cost Code</th>
  								<th>Cost name</th>
  								<th>Material Name</th>
  								<th>Qty</th>
  								<th>Unit</th>
  								<th>Unit Price</th>
  								<th>Amount</th>
  								<th>Total</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
  							$this->db->select('*');
  							$this->db->where('poi_ref',$val2->po_pono);
  							// $this->db->where('compcode',$val2->compcode);
  							$query = $this->db->get('po_item');
  							$resi = $query->result();
  							 $n=1; foreach ($resi as $va) {?>
  								 <tr>
  									<td><?php echo $n; ?></td>
  									<td><?php echo $va->poi_costcode; ?></td>
  									<td><?php echo $va->poi_costname; ?></td>
  									<td><?php echo $va->poi_matname; ?></td>
  									<td><?php echo number_format($va->poi_qty,2); ?></td>
  									<td><?php echo $va->poi_unit; ?></td>
  									<td><?php echo number_format($va->poi_priceunit,2); ?></td>
  									<td><?php echo number_format($va->poi_amount,2); ?></td>
  									<td><?php echo number_format($va->poi_netamt,2); ?></td>
  								</tr>
  							<?php $n++; $qty = $qty+$va->poi_qty;
                $unitprice = $unitprice+$va->poi_priceunit;
                $amouttot = $amouttot+$va->poi_amount;
                $netamt = $netamt+$va->poi_netamt; } ?>

  						</tbody>
  						<tfooter>

                <th colspan="4" class="text-center">Total</th>
                <th><?php echo number_format($qty,2); ?></th>
                <td></td>
                <th><?php echo number_format($unitprice,2); ?></th>
                <th><?php echo number_format($amouttot,2); ?></th>
                <th><?php echo number_format($netamt,2); ?></th>

              </tfooter>
  					</table>
  					<br>
  				</div>
        	<div class="modal-footer">
        		<?php if ($val2->po_approve=="approve") {?>
        			<a class="btn btn-default disabled" href="#" ><i class="icon-pencil7"></i> Edit</a>
        		<?php }else{?>
        			<a class="btn btn-default" href="<?php echo base_url(); ?>index.php/purchase/editpo/<?php echo $val->po_pono; ?>" ><i class="icon-pencil7"></i> Edit</a>
        		<?php } ?>
        		<a class="btn btn-default" href="<?php echo base_url(); ?>purchase/report_po/<?php echo $val2->po_pono; ?>" ><i class="icon-printer4"></i> Print</a>
        		<button type="submit" class="btn btn-default" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
  				</div>
				</div>
			</div>
		</div>
		<?php } ?>

    <div class="footer text-muted">
      © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
    </div>
	</div>
</div>
