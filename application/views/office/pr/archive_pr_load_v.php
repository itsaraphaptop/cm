<!-- Main content -->
<?php 
	$session_data = $this->session->userdata('sessed_in');
	$data['username'] = $session_data['username'];
	$compcode = $session_data['compcode'];
?>
					<!-- Highlighting rows and columns -->
					
							<table class="table table-hover table-xxs basic">
							<thead>
								<tr>
									<th width="15%" class="text-center">PR No.</th>
									<th width="10%" class="text-center">PR Date.</th>
									<th width="15%" class="text-center">Name</th>
									<th width="8%" class="text-center">Type Of PR</th>
									<th width="8%" class="text-center">Approval Status</th>
									<th width="10%" class="text-center">Status</th>
									<th width="10%" class="text-center">OPEN PO</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody class="text-center">
							<?php $n=1; foreach($getpr as $val){?>
									
									<?php 
										$this->db->select('*');
										$this->db->where('project_id',$val->pr_project);
										$q = $this->db->get('project');
										$res = $q->result();
										$pjname = "";
										foreach ($res as $r) {
											$pjname = $r->project_name;
										}
									?>

									
									<tr>
									<td><?php echo $val->pr_prno; ?></td>
									<td><?php echo $val->pr_prdate; ?></td>

									<td class="text-left"><?php echo $val->pr_reqname; ?></td>
									<!-- <td><a data-toggle="modal" class="editable editable-click"
									data-target="#open<?php echo $val->pr_prno; ?>"><?php echo $pjname; ?><?php echo $val->department_title; ?></a></td> -->
									<td class="text-left"><?php if($val->purchase_type=="1"){echo "<span class='label bg-orange'>PO/WO</span>";}elseif($val->purchase_type=="2"){echo "<span class='label bg-info'>PO ONLY</span>";}elseif($val->purchase_type=="3"){echo "<span class='label bg-purple'>WO ONLY</span>";} ?></td>
									<td><a data-toggle="modal" data-target="#checkauth<?php echo $val->pr_prno; ?>"><span class="label bg-green">Check</span></a></td>
									<!-- <td class="text-left"><?php if($val->pr_costtype=="15"){echo "Cost";}elseif($val->pr_costtype=="17"){echo "Stock";}elseif($val->pr_costtype=="18"){echo "Asset tool";}elseif($val->pr_costtype=="19"){echo "Asset Office Equipment";}elseif($val->pr_costtype=="20"){echo "Asset Vehicle";} ?></td>
									<td class="text-left"><?php if($val->purchase_type=="1"){echo "PO/WO";}elseif($val->purchase_type=="2"){echo "PO ONLY";}elseif($val->purchase_type=="3"){echo "WO ONLY";} ?></td>
									<td class="text-left"><?php echo $val->pr_remark; ?></td> -->

									<?php if ($val->pr_approve=="wait"){ ?>
										<td><span class="label label-info"><?php if ($val->pr_approve=="wait") {echo "IN Process";} ?></span></td>
									<?php }else if($val->pr_approve=="approve"){ ?>
										<td><span class="label label-success"><?php echo $val->pr_approve; ?></span></td>
									<?php }elseif($val->pr_approve=="disapprove"){ ?>
										<td><span class="label label-danger"><?php if($val->pr_approve=="disapprove"){echo "not allowed";} ?></span></td>
									<?php }elseif($val->pr_approve=="reject"){ ?>
										<td><span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->pr_prno; ?>"><?php if($val->pr_approve=="reject"){echo "PR reject";} ?></span></td>
									<?php }else{ ?>
										<td><span class="label bg-danger"><?php if($val->pr_approve=="delete"){echo "delete";} ?></span></td>
									<?php } ?>

									<?php if ($val->po_open=="open"){ ?>
										<td><a data-toggle="modal" data-target="#openpo<?php echo $val->pr_prno; ?>"><span class="label bg-green">OPEN</span></a></td>
										<?php }else if ($val->po_open=="no" && $val->pr_approve=="reject") { ?>
										<td><span class="label label-warning">PR Reject</span></td>
										<?php }else if ($val->po_open=="no" && $val->pr_approve=="delete") { ?>
										<td><span class="label label-danger">PR Delete</span></td>
										<?php }else { ?>
										<td><span class="label label-info">In Process</span></td>
									<?php }?>
									<td width="15%">
										<ul class="icons-list">
												<li><a id="openpo_v" class="preload" href="<?php echo base_url(); ?>index.php/pr/openpr/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
											<?php if ($val->pr_approve=="approve") {?>
												<li class="text-slate"><i class="icon-pencil7"></i></li>
												<li class="text-slate"><i class="icon-trash"></i></li>
											<?php } elseif ($val->pr_approve=="reject") { ?>
												<li class="text-slate"><i class="icon-pencil7"></i></li>
												<li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"  onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"  ></i></a></li>
											<?php }else{ ?>
												<li><a class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
												<li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"  onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"  ></i></a></li>
												<?php } ?>
												<!-- <li><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
										<li><a href="<?php echo base_url(); ?>report/viewerload?type=pr&typ=form&var1=<?php echo $val->pr_prid;?>&var2=<?php echo $val->pr_prno;?>&var3=<?php echo $compcode;?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>

										</ul>
									</td>
								</tr>
								<?php $n++; } ?>
							</tbody>
						</table>
					<!-- /highlighting rows and columns -->



				<!-- /content area -->
			<!-- /main content -->
<?php foreach ($getpr as $value) {?>
<!-- Custom background color -->
								<div id="open<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header ">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
												<div class="row">
									                <div class="col-md-6">
									                  <div class="form-group">
									                    <h5 for="">PR No.:</h5>
									                    <small>&nbsp&nbsp <?php echo $value->pr_prno;?></small>
									                    <input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
									                  </div>
									               </div>
									               <div class="col-md-6">
									                    <h5 for="">PR Date:</h5>
									                    <small>&nbsp&nbsp <?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></small>
									               </div>
									             </div>
									             <div class="row">
									               <div class="col-md-6">
									                    <h5 for="">Name :</h5>
									                    <small>&nbsp&nbsp <?php echo $value->pr_reqname;?></small>
									               </div>
									               <div class="col-md-6">
									                 <h5 for="">Project/Department:</h5>
									                  <small>&nbsp&nbsp <?php echo $value->project_name;?></small>
									               </div>
									             </div>
									             <div class="row">
									               <div class="col-md-6">
									                    <h5 for="">Delivery Date:</h5>
									                     <small>&nbsp&nbsp <?php echo date('d/m/Y' ,strtotime($value->pr_delidate)); ?></small>
									               </div>
									             </div>
									              <div class="row">
									              <div class="col-md-6">
									                 <h5 for="">Place:</h5>
									                  <small>&nbsp&nbsp <?php echo $value->pr_deliplace;?></small>
									               </div>
									               <div class="col-md-6">
									                 <h5 for="">Remark:</h5>
									                  <small>&nbsp&nbsp <?php echo $value->pr_remark;?></small>
									               </div>
									             </div>

											</div>
											<table class="table table-bordered table-striped table-xxs">
													<thead>
														<tr>
															<th>No.</th>
								                          <th>รหัสต้นทุน</th>
								                          <th>ชื่อวัสดุ</th>
								                          <th>จำนวน</th>
								                         </tr>
								                      </thead>
								                      <tbody>
								                          <?php   $n =1;?>

								                          <?php
								                          $prpr = $value->pr_prno;
								                          $this->db->select('*');
								                          $this->db->where('pri_ref', $prpr);
								                          $q =  $this->db->get('pr_item');
								                          $res = $q->result();
								                          foreach ($res as $valj){ ?>
								                        <tr>
																					<td><?php echo $n; ?></td>
								                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
								                          <td><?php echo $valj->pri_matname; ?></td>
								                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
								                         </tr>
								                          <?php $n++; } ?>
								                      </tbody>
												</table><br>
												<div class="row">
													<div class="form-group">
														<div class="modal-footer">
															<button type="button" class="btn bg-teal-600" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
										</div>
									</div>
								</div>
<?php foreach ($getpr as $key => $val) {?>

<div id="checkauth<?php echo $value->pr_prno; ?>" class="modal fade">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header  bg-info ">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<!-- <h5 class="modal-title">PR No.: <?php echo $value->pr_prno; ?></h5> -->
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<h5 for="">PR No.:</h5>
						<small><?php echo $value->pr_prno;?></small>
						<input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
					</div>
				</div>
				<div class="col-md-6">
					<h5 for="">PR Date:</h5>
					<small><?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></small>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h5 for="">Name :</h5>
					<small><?php echo $value->pr_reqname;?></small>
				</div>
				<div class="col-md-6">
					<h5 for="">Project :</h5>
					<small>
						<?php
							if ($flag == "p") {
								echo $val->project_name;
							}else{
								echo $val->department_title;
							}
						?>
					</small>
				</div>
			</div>
		</div>
		<table class="table table-bordered table-striped table-xxs">
			<thead>
				<tr>
					<th>No.</th>
					<th>Authorize Name</th>
					<th>Date</th>
					<th>Status</th>
					<th>Reject Date</th>
					<th>Remark</th>
				</tr>
			</thead>
			<tbody>
				<?php   $n =1;
				$this->db->select('*');
				$this->db->where('app_pr', $value->pr_prno);
				$q =  $this->db->get('approve_pr');
				$pr_open = $q->result();
				foreach ($pr_open as $pr){    ?>
				<tr>
					<td width="5%"><?php echo $n; ?></td>
					<td width="20%"><?php echo $pr->app_midname ?></td>
					<td width="10%"><?php echo $pr->app_date ?></td>
					<td width="10%"><?php echo (in_array($pr->status,array("yes","approve"))) ? "<span class='label label-success'>Approve</span>" : "<span class='label label-danger'>".($pr->status)."</span>";?></td>
					<td width="10%"><?php echo explode(" ", $pr->reject_date)[0]; ?></td>
					<td width="30%"><?php echo $pr->reject_remark ?></td>
				</tr>
				<?php $n++; }  ?>
			</tbody>
		</table><br>
		<div class="row">
			<div class="form-group">
				<div class="modal-footer">
					<button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php } ?>
<div id="openpo<?php echo $value->pr_prno; ?>" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

							<?php

							$this->db->select('*');
							$this->db->from('po');
							$this->db->where('po_prno', $value->pr_prno);
							$this->db->join('project', 'project.project_id = po.po_project','left outer');
							$this->db->join('department','department.department_id = po.po_department','left outer');
							$this->db->join('system','system.systemcode = po.po_system','left outer');
							$q =  $this->db->get();
							$res = $q->result();
							foreach ($res as $valp){
							$prno = $valp->po_prno;
							$podate = $valp->po_podate;
							$poproject = $valp->project_name;
							$podepartment = $valp->department_title;
							$posystem = $valp->systemname;
							$povender = $valp->po_vender;

							$potrem = $valp->po_trem;
							$pocontact = $valp->po_contact;
							$pocontactno = $valp->po_contactno;
							$poquono = $valp->po_quono;
							$podeliverydate = $valp->po_deliverydate;
							$poplace = $valp->po_place;
							$poremark = $valp->po_remark;
							$popono = $valp->po_pono;


							} ?>
				<h5 class="modal-title">Open Detail PO No. : <?php echo $popono; ?></h5>
			</div>

		<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<h5 for="">PO No.:</h5>
						<small>&nbsp;&nbsp; <?php echo $popono; ?></small>
						<input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
					</div>
				</div>
				<div class="col-md-3">
					<h5 for="">PO Date:</h5>
					<small>&nbsp;&nbsp; <?php echo date('d/m/Y' ,strtotime($podate)); ?></small>
				</div>

				<div class="col-md-3">
					<h5 for="">Project/Department:</h5>
					<small>&nbsp;&nbsp; <?php echo $poproject;?><?php echo $podepartment;?></small>
				</div>
				<div class="col-md-3">
					<h5 for="">System :</h5>
					<small>&nbsp;&nbsp; <?php echo $posystem;?></small>
				</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						<h5 for="">Vender :</h5>
						<small>&nbsp;&nbsp; <?php echo $povender; ?></small>
						<input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
						</div>
					</div>
				<div class="col-md-3">
					<h5 for="">เงื่อนไขชำระ :</h5>
					<small>&nbsp;&nbsp; <?php echo $potrem; ?></small>
				</div>

				<div class="col-md-3">
					<h5 for="">เบอร์ติดต่อ :</h5>
					<small>&nbsp;&nbsp; <?php echo $pocontact;?></small>
				</div>
						<div class="col-md-3">
					<h5 for="">ใบเสนอราคา :</h5>
					<small>&nbsp;&nbsp; <?php echo $pocontactno;?></small>
				</div>
				</div>
				<div class="row">
				<div class="col-md-3">
					<h5 for="">วันที่ส่งมอบ :</h5>
					<small>&nbsp;&nbsp; <?php echo $podeliverydate;?></small>
				</div>
				</div>

				<div class="row">
				<div class="col-md-6">
				<h5 for="">Place Deliverry :</h5>
				<small>&nbsp;&nbsp; <?php echo $poplace;?></small>

				</div>
				<div class="col-md-6">
				<h5 for="">Additional message :</h5>
				<small>&nbsp;&nbsp; <?php echo $poremark;?></small>

				</div>
				</div>

				<br><br>
				<table class="table table-bordered table-striped table-xxs">
					<thead>
						<tr>
							<th>No.</th>
							<th>Material Code</th>
							<th>Material Name</th>
							<th>Cost Code</th>
							<th>Cost Name</th>
							<th>Qty</th>
							<th>Unit</th>
							<th>Price/Unit</th>
							<th>Amount</th>
							<th>Disc.1</th>
							<th>Disc.2</th>
							<th>Disc.Amt</th>
							<th>Total</th>
						</tr>
						<?php $totamt=0;  $n =1;?>
						<?php
							$this->db->select('*');
							$this->db->from('po_item');
							$this->db->where('poi_ref',$popono);
							$q =  $this->db->get();
							$res = $q->result();
							foreach ($res as $p){ ?>
						<tr>
							<td><?php echo $n; ?></td>
							<td><?php echo $p->poi_matcode; ?></td>
							<td><?php echo $p->poi_matname; ?></td>
							<td><?php echo $p->poi_costcode; ?></td>
							<td><?php echo $p->poi_costname; ?></td>
							<td><?php echo $p->poi_qty; ?></td>
							<td><?php echo $p->poi_unit; ?></td>
							<td><?php echo $p->poi_priceunit; ?></td>
							<td><?php echo number_format($p->poi_amount,2); ?></td>
							<td><?php echo $p->poi_discountper1; ?></td>
							<td><?php echo $p->poi_discountper2 ?></td>
							<td><?php echo $p->poi_disamt; ?></td>
							<td><?php echo number_format($p->poi_netamt,2); ?></td>

						</tr>
						<?php $n++; $totamt = $totamt+$p->poi_netamt; } ?>
						<tr>
							<td colspan="12" class="text-center">Summary</td>
							<td><?php echo number_format($totamt,2); ?></td>

						</tr>
					</thead>
					<tbody>

					</tbody>
				</table><br>

				<div class="row">
					<div class="form-group">
						<div class="modal-footer">
							<button type="button" class="btn bg-success" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<?php } ?>

<?php $n=1; foreach($getpr as $val){?>
         <div id="modal_reject<?php echo $val->pr_prno; ?>" class="modal fade">
            <div class="modal-dialog">
              	<div class="modal-content">
	                <div class="modal-header bg-primary">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h6 class="modal-title">Reject No. <?php echo $val->pr_prno; ?></h6>
	                </div>
	            	<div class="modal-body">
	            		<div class="form-group">
                      		<label>หมายเหตุ</label>
                      		<input type="text" class="form-control" readonly="true" value="<?php echo $val->reject_remark; ?>">
                    	</div>
	            	</div>
	            	<div class="modal-footer">
						<a data-dismiss="modal" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
					</div>
	            </div>
	        </div>
	    </div>
 <?php } ?>
								<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

								<!-- /core JS files -->
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
								  $('.basic').DataTable();
								</script>
