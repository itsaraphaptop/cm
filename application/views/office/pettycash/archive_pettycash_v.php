<?php
    function my_format_date($date){

      return date("d-m-Y",strtotime($date)) ;
    }

 ?>
<style type="text/css" media="screen">
	.tree,
	.tree ul {

		padding: 0;
		list-style: none;
		color: #369;
		position: relative;
	}

	.tree ul {
		margin-right: .100em
	}

	/* (indentation/2) */

	.tree:before,
	.tree ul:before {
		content: "";
		display: block;
		width: 0;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		border-left: 1px solid;
	}

	.tree li {
		margin: 0;
		padding: 0 1.5em;
		/* indentation + .5em */
		line-height: 2em;
		/* default list item's `line-height` */
		font-weight: bold;
		position: relative;
	}

	.tree li:before {
		content: "";
		display: block;
		width: 20px;
		/* same with indentation */
		height: 0;
		border-top: 1px solid;
		margin-top: -1px;
		/* border top width */
		position: absolute;
		top: 1em;
		/* (line-height/2) */
		left: 0;
	}

	.tree li:last-child:before {
		background: white;
		/* same with body background */
		height: auto;
	}
</style>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>
					<i class="icon-arrow-left52 position-left"></i>
					<span class="text-semibold"> Pettycash Archive</span>
				</h4>
			</div>

			
		</div>

		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>office/main_index">
						<i class="icon-home2 position-left"></i>PR Purchase</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>index.php/pr/archive_pr">Pettycash Archive</a>
				</li>
		</div>
	</div>
	<!-- /page header -->



	<!-- Content area -->
	<div class="content">



		<!-- Highlighting rows and columns -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Pettycash Archive</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li>
							<a data-action="collapse"></a>
						</li>
						<li>
							<a data-action="reload"></a>
						</li>
						<li>
							<a data-action="close"></a>
						</li>
					</ul>
				</div>
			</div>

			<!-- 						<div class="panel-body">
							<div class="text-right">
	                          <a href="<?php echo base_url(); ?>index.php/petty_cash/newpettycash" class="preload btn btn-default">
			<i class="icon-plus22"></i> New</a>
			<a href="/" class="btn btn-default">
				<i class="icon-close2 position-left"></i> Close</a>
		</div>
	</div> -->

	<div class="dataTables_wrapper no-footer">
		<div class="table-responsive">
			<table class="table table-hover table-xxs datatable-basic">
				<thead>
					<tr>
						<th>Petty Cash No.</th>
						<th>Name</th>
						<th>Project/Department</th>
						<th>Detail</th>
						<th>Date</th>
						<th class="text-center">Status</th>
						<th class="text-center">Open Pettycash</th>
						<th width="10%" class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($getpettycash as $val) {?>
					<tr>
						<td width="10%">
							<?php echo $val->docno; ?>
						</td>
						<td  width="15%">
							<?php echo $val->vender; ?>
							<?php echo $val->member; ?>
						</td>
						<td>
							<?php
									if ($type == "p") {
									 	echo $val->project_name;
									 } else{
									 	echo $val->department_title;
									 	}  ?>
						</td>
						<td>
							<?php echo $val->remark; ?>
						</td>
						<td width="10%">
							<?php echo $val->docdate; ?>
						</td>

						<?php if ($val->status == "paid") { ?>
						<td align="center"  width="10%">
							<span class="label bg-green">OPEN</span>
						</td>
						<?php }elseif ($val->status == "complete") { ?>
						<td align="center"  width="10%">
							<span class="apprv label label-success"> Approve</span>
						</td>
						<?php	}else{  ?>
						<td align="center"  width="10%">
							<span class="wait label label-warning">Wait</span>
						</td>
						<?php	} ?>

						<?php if ($val->approve == "wait") { ?>
						<td align="center" width="10%">
							<span class="label label-warning">Wait</span>
						</td>
						<?php }elseif ($val->approve == "approve") { ?>
						<td align="center" width="10%">
							<span class="apprv label label-success"> Approve</span>
						</td>
						<?php	}elseif ($val->approve == "reject"){  ?>
						<td align="center" width="10%">
							<span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->docno; ?>">Reject</span>
						</td>
						<?php	}elseif ($val->approve == null) { ?>
						<td align="center" width="10%">
							<span class="label label-warning">Wait</span>
						</td>
						<?php } ?>


						<?php if ($val->status == "wait") {
										if ($val->approve == "wait") {
?>
						<td align="center">
							<ul class="icons-list">
								<li>
									<a data-toggle="modal" data-target="#open<?php echo $val->docno; ?>" data-popup="tooltip"
									 title="" data-original-title="Open">
										<i class="icon-folder-open"></i>
									</a>
								</li>
								<li>
									<!-- <a target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pettycash.mrt&docno=<?php echo $val->doc_id; ?>&compcode=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a> -->
									<a target="_blank" href="<?php echo base_url();?>report/viewerload?type=pc&typ=form&var1=<?php echo $val->doc_id; ?>&var2=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li>
								<li>
									<a class="preload" href="<?php echo base_url(); ?>index.php/petty_cash/editpettycash/<?php echo $val->docno; ?>/<?php echo $val->project ?>/<?php echo $type; ?>"
									 data-popup="tooltip" title="" data-original-title="Edit">
										<i class="icon-pencil7"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>pettycash_active/delete_pettycash/<?php echo $val->docno; ?>/<?php echo $val->project;; ?>"
									 data-popup="tooltip" title="" data-original-title="Remove">
										<i class="icon-trash"></i>
									</a>
								</li>
							</ul>
						</td>
						<?php  }else if ($val->approve == null)  { ?>
						<td align="center">
							<ul class="icons-list">
								<li>
									<a data-toggle="modal" data-target="#open<?php echo $val->docno; ?>" data-popup="tooltip"
									 title="" data-original-title="Open">
										<i class="icon-folder-open"></i>
									</a>
								</li>
								<!-- <li>
									<a target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pettycash.mrt&docno=<?php echo $val->doc_id; ?>&compcode=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li> -->
								<li>
									<a target="_blank" href="<?php echo base_url();?>report/viewerload?type=pc&typ=form&var1=<?php echo $val->doc_id; ?>&var2=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li>
								<li>
									<a class="preload" href="<?php echo base_url(); ?>index.php/petty_cash/editpettycash/<?php echo $val->docno; ?>/<?php echo $val->project; ?>"
									 data-popup="tooltip" title="" data-original-title="Edit">
										<i class="icon-pencil7"></i>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>pettycash_active/delete_pettycash/<?php echo $val->docno; ?>/<?php echo $val->project;; ?>"
									 data-popup="tooltip" title="" data-original-title="Remove">
										<i class="icon-trash"></i>
									</a>
								</li>
							</ul>
						</td>
						<?php }else{ ?>
						<td align="center">
							<ul class="icons-list">
								<li>
									<a data-toggle="modal" data-target="#open<?php echo $val->docno; ?>" data-popup="tooltip"
									 title="" data-original-title="Open">
										<i class="icon-folder-open"></i>
									</a>
								</li>
								<!-- <li>
									<a target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pettycash.mrt&docno=<?php echo $val->doc_id; ?>&compcode=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li> -->
								<li>
									<a target="_blank" href="<?php echo base_url();?>report/viewerload?type=pc&typ=form&var1=<?php echo $val->doc_id; ?>&var2=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li>
								<!-- <li><a class="preload" href="<?php echo base_url(); ?>index.php/petty_cash/editpettycash/
								<?php echo $val->docno; ?>/
								<?php echo $val->project; ?>" data-popup="tooltip" title="" data-original-title="Edit">
								<i class="icon-pencil7"></i>
								</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>pettycash_active/delete_pettycash/<?php echo $val->docno; ?>"
									 data-popup="tooltip" title="" data-original-title="Remove">
										<i class="icon-trash"></i>
									</a>
								</li> -->
							</ul>
						</td>
						<?php } ?>
						<?php }else{ ?>
						<td align="center">
							<ul class="icons-list">
								<li>
									<a data-toggle="modal" data-target="#open<?php echo $val->docno; ?>" data-popup="tooltip"
									 title="" data-original-title="Open">
										<i class="icon-folder-open"></i>
									</a>
								</li>
								<!-- <li>
									<a target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pettycash.mrt&docno=<?php echo $val->doc_id; ?>&compcode=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li> -->
								<li>
									<a target="_blank" href="<?php echo base_url();?>report/viewerload?type=pc&typ=form&var1=<?php echo $val->doc_id; ?>&var2=<?php echo $compcode;?>"
									 data-popup="tooltip" title="" data-original-title="Print">
										<i class="icon-printer4"></i>
									</a>
								</li>
								<!-- <li><a class="preload" href="<?php echo base_url(); ?>index.php/petty_cash/editpettycash/
								<?php echo $val->docno; ?>/
								<?php echo $val->project; ?>" data-popup="tooltip" title="" data-original-title="Edit">
								<i class="icon-pencil7"></i>
								</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>pettycash_active/delete_pettycash/<?php echo $val->docno; ?>"
									 data-popup="tooltip" title="" data-original-title="Remove">
										<i class="icon-trash"></i>
									</a>
								</li> -->
							</ul>
						</td>
						<?php	} ?>
					</tr>
					<?php	} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /highlighting rows and columns -->
<!--  -->
<!-- Basic modal -->
<?php foreach ($getpettycash as $val2) {?>
<div id="open<?php echo $val2->docno; ?>" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Petty Cash No.:
					<?php echo $val2->docno; ?>
				</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 content-group">
						<img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>"
						 class="content-group mt-10" alt="" style="width: 120px;" data-pin-nopin="true">
						<!-- <ul class="list-condensed list-unstyled">
																	<li>2269 Elba Lane</li>
																	<li>Paris, France</li>
																	<li>888-555-2311</li>
																</ul> -->
					</div>

					<div class="col-md-6 content-group">
						<div class="invoice-details">
							<h5 class="text-uppercase text-semibold">Petty Cash #
								<?php echo $val2->docno; ?>
							</h5>
							<ul class="list-condensed list-unstyled">
								<li>Date:
									<span class="text-semibold">
										<?php echo $val2->docdate; ?>
									</span>
								</li>
								<!-- <li>Due date: <span class="text-semibold">May 12, 2015</span></li> -->
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<span class="text-muted">Pay To:</span>
						<ul class="list-condensed list-unstyled">
							<li>
								<h5>
									<?php echo $val->member; ?>
									<?php echo $val2->vender; ?>
								</h5>
							</li>

						</ul>
					</div>

					<div class="col-md-4">
						<span class="text-muted">Project:</span>
						<ul class="list-condensed list-unstyled">
							<li>
								<h5>
									<?php if ($val2->project_name==""){echo $val2->department_title;}else{echo $val2->project_name;} ?>

								</h5>
							</li>

						</ul>
					</div>
					<div class="col-md-4">
						<span class="text-muted">Date:</span>
						<ul class="list-condensed list-unstyled">
							<li>
								<h5>
									<?php echo $val2->docdate; ?>
								</h5>
							</li>

						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<span class="text-muted">Remark:</span>
						<ul class="list-condensed list-unstyled">
							<li>
								<h5>
									<?php echo $val2->remark; ?>
								</h5>
							</li>

						</ul>
					</div>
					<div class="col-md-4">
						<span class="text-muted">System:</span>
						<ul class="list-condensed list-unstyled">
							<?php if($val2->system == '1'){ ?>
							<li>
								<h5>OVERHEAD</h5>
							</li>
							<?php }else if($val2->system == '2'){ ?>
							<li>
								<h5>AC</h5>
							</li>
							<?php }else if($val2->system == '3'){ ?>
							<li>
								<h5>EE</h5>
							</li>
							<?php }else if($val2->system == '4'){ ?>
							<li>
								<h5>SN</h5>
							</li>
							<?php }else if($val2->system == '5'){ ?>
							<li>
								<h5>CIVIL</h5>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<legend class="text-muted"> Detail</legend>

			</div>
			<div class="table-responsive">
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
							<th>Vat</th>
							<th>Tax</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $n=1; $qty=0; $unitprice=0; $amouttot=0; $vattot=0; $whtot=0; $netamt=0;
																			$this->db->select('*');
																			$this->db->where('pettycashi_ref',$val2->docno);
																			$this->db->where('pettycashi_project',$val2->project);
																			$this->db->where('compcode',$compcode);
																			$query = $this->db->get('pettycash_item');
																			$resi = $query->result();
																			 $n=1; foreach ($resi as $va) {?>
						<tr>
							<td>
								<?php echo $n; ?>
							</td>
							<td>
								<?php echo substr($va->pettycashi_costcode,10); ?>
							</td>
							<td>
								<?php echo $va->pettycashi_costname; ?>
							</td>
							<td>
								<?php echo $va->pettycashi_expens; ?>
							</td>
							<td>
								<?php echo number_format($va->pettycashi_amount,2); ?>
							</td>
							<td>
								<?php echo $va->pettycashi_unit; ?>
							</td>
							<td>
								<?php echo number_format($va->pettycashi_unitprice,2); ?>
							</td>
							<td>
								<?php echo number_format($va->pettycashi_amounttot,2); ?>
							</td>
							<td>
								<?php echo number_format($va->pattycashi_totvat,2); ?>
							</td>
							<td>
								<?php echo number_format($va->pettycashi_totwh,2); ?>
							</td>
							<td>
								<?php echo number_format($va->pettycashi_netamt,2); ?>
							</td>
						</tr>
						<?php $n++; $qty = $qty+$va->pettycashi_amount;
		                                  $unitprice = $unitprice+$va->pettycashi_unitprice;
		                                  $amouttot = $amouttot+$va->pettycashi_amounttot;
		                                  $vattot = $vattot+$va->pattycashi_totvat;
		                                  $whtot = $whtot+$va->pettycashi_totwh;
		                                  $netamt = $netamt+$va->pettycashi_netamt; } ?>

					</tbody>
					<tfooter>

						<th colspan="4" class="text-center">Total</th>
						<th>
							<?php echo number_format($qty,2); ?>
						</th>
						<td></td>
						<th>
							<?php echo number_format($unitprice,2); ?>
						</th>
						<th>
							<?php echo number_format($amouttot,2); ?>
						</th>
						<th>
							<?php echo number_format($vattot,2); ?>
						</th>
						<th>
							<?php echo number_format($whtot,2); ?>
						</th>
						<th>
							<?php echo number_format($netamt,2); ?>
						</th>

					</tfooter>
				</table>
				<br>
			</div>
			<div class="modal-footer">
				<!-- <a class="btn btn-default" href="<?php echo base_url(); ?>petty_cash/print_pettycash/
				<?php echo $va->pettycashi_ref; ?>">
				<i class="icon-printer4"></i> Print</a> -->
				<button type="submit" class="btn btn-default" data-dismiss="modal">
					<i class="icon-close2 position-left"></i> Close</button>

			</div>


		</div>
	</div>
</div>
<?php } ?>
<!-- /basic modal -->
<!--  -->


<!-- Footer -->
<div class="footer text-muted">
	© 2016.
	<a href="#">NinjaERP Business Intelligence</a> by
	<a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
</div>
<!-- /footer -->

</div>
<!-- /content area -->

</div>
<!-- /main content -->
<?php $n=1; foreach($getpettycash as $val2){?>
<div id="modal_reject<?php echo $val2->docno; ?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Reject No.
					<?php echo $val2->docno; ?>
				</h6>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>หมายเหตุ</label>
					<input type="text" class="form-control" readonly="true" value="<?php echo $val2->reject_remark; ?>">
				</div>
			</div>
			<div class="modal-footer">
				<a data-dismiss="modal" class="btn bg-danger">
					<i class="icon-close2"></i> Close</a>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<script type="text/javascript">
	$('#pc').attr('class', 'active'); 
$('#archive_pc').attr('style', 'background-color:#dedbd8');
</script>