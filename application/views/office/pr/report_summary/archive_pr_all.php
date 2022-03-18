<?php
		function my_format_date($date){

			return date("d-m-Y",strtotime($date)) ;
		}

 ?>
<style type="text/css" media="screen">



/**
 * Framework starts from here ...
 * ------------------------------
 */

.tree,
.tree ul {
  
  padding:0;
  list-style:none;
  color:#369;
  position:relative;
}

.tree ul {margin-right:.100em} /* (indentation/2) */

.tree:before,
.tree ul:before {
  content:"";
  display:block;
  width:0;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  border-left:1px solid;
}

.tree li {
  margin:0;
  padding:0 1.5em; /* indentation + .5em */
  line-height:2em; /* default list item's `line-height` */
  font-weight:bold;
  position:relative;
}

.tree li:before {
  content:"";
  display:block;
  width:20px; /* same with indentation */
  height:0;
  border-top:1px solid;
  margin-top:-1px; /* border top width */
  position:absolute;
  top:1em; /* (line-height/2) */
  left:0;
}

.tree li:last-child:before {
  background:white; /* same with body background */
  height:auto;  
}
</style>
<!-- Main content -->
			<div class="content-wrapper">

					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">PR Archive</h5>
							<div class="heading-elements">
		                	</div>
						</div>

						<div class="panel-body">
						<label>Filter Status:</label>
						<button class="all label bg-orange"> OVER ALL</button>
						<button class="in label label-info"> In Process</button>
						<button class="apprv label label-success"> Approve</button>
						<button class="pm label bg-violet"> PM APPROVE</button>
						<button class="notal label label-danger"> not allowed</button>
						<button class="cancel label bg-danger"> Cancel</button>
						<button class="opopen label bg-green"> OPEN PO</button>
						</div>
						<script>
							$(".in").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all/wait');
							});
							$(".apprv").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all/approve');
							});
							$(".notal").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all/disapprove');
							});
							$(".pm").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all/pmapprove');
							});
							$(".all").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all');
							});
							$(".opopen").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all/approve/open');
							});
							$(".cancel").click(function(){
								$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
								$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load_all/no');
							});
						</script>
						<div class="loadtable dataTables_wrapper no-footer">
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-xxs datatable-basic">
							<thead>
								<tr>
									<th width="10%" class="text-center">PR No.</th>
									<th width="10%" class="text-center">PR Date.</th>
									<th width="15%" class="text-center">Name</th>
									<th width="20%" class="text-center">Project/Department</th>
									<th width="20%" class="text-center">System</th>
									<th width="5%" class="text-center">TYPE</th>
									<th width="8%" class="text-center">For</th>
									<th width="80%" class="text-center">Detail</th>
									<th width="80%" class="text-center">Approve</th>
									<th width="10%" class="text-center">Status</th>
									<th width="10%" class="text-center">OPEN PO</th>
									<th width="10%" class="text-center">File Download</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody class="text-center">
							<?php $n=1; foreach($getpr as $val){?>
								<tr>
									<td><?php echo $val->pr_prno; ?></td>
									<td><?php echo $val->pr_prdate; ?></td>

									<td><?php echo $val->pr_reqname; ?></td>
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
								
									<td><a data-toggle="modal" class="editable editable-click"
									data-target="#open<?php echo $val->pr_prno; ?>"><?php echo $pjname; ?><?php echo $val->department_title; ?></a></td>
									<td class="text-left"><?php if($val->pr_system=="1"){ echo "OVERHEAD";}else if($val->pr_system=="2"){echo "AC";}else if($val->pr_system=="3"){ echo "EE";}elseif($val->pr_system=="4"){ echo "SN";}elseif($val->pr_system=="5"){ echo "CIVIL";}  ?></td>
									<td class="text-left"><?php if($val->pr_costtype=="15"){echo "Cost";}elseif($val->pr_costtype=="17"){echo "Stock";}elseif($val->pr_costtype=="18"){echo "Asset tool";}elseif($val->pr_costtype=="19"){echo "Asset Office Equipment";}elseif($val->pr_costtype=="20"){echo "Asset Vehicle";} ?></td>
									<td class="text-left"><?php if($val->purchase_type=="1"){echo "PO/WO";}elseif($val->purchase_type=="2"){echo "PO ONLY";}elseif($val->purchase_type=="3"){echo "WO ONLY";} ?></td>
									<td class="text-left"><?php echo $val->pr_remark; ?></td>
									<td><button type="button" class="label label-info" data-toggle="modal" data-target="#modal_theme_primary1<?php echo $val->pr_prno; ?>">Approve<i class="icon-play3 position-right"></i></button></td>

									<?php if ($val->pr_approve=="wait"){ ?>
										<td><span class="label label-info"><?php if ($val->pr_approve=="wait") {echo "IN Process";} ?></span></td>
									<?php }else if($val->pr_approve=="approve"){ ?>
										<td><span class="label label-success"><?php echo $val->pr_approve; ?></span></td>
									<?php }elseif($val->pr_approve=="disapprove"){ ?>
										<td><span class="label label-danger"><?php if($val->pr_approve=="disapprove"){echo "not allowed";} ?></span></td>
									<?php }elseif($val->pr_approve=="reject"){ ?>
										<td><span class="label bg-orange" data-toggle="modal" data-target="#modal_reject<?php echo $val->pr_prno; ?>"><?php if($val->pr_approve=="reject"){echo "reject";} ?></span></td>
									<?php }else{ ?>
										<td><span class="label bg-violet"><?php if($val->pr_approve=="pmapprove"){echo "PM APPROVE";} ?></span></td>
									<?php } ?>

									<?php if ($val->po_open=="open"){ ?>
										<td><a data-toggle="modal" data-target="#openpo<?php echo $val->pr_prno; ?>"><span class="label bg-green">OPEN</span></a></td>
									<?php }else{ ?>
										<td><span class="label label-warning">In Process</span></td>
									<?php }?>
									<td>  <?php 
                          $this->db->select('*');
                          $this->db->from('select_file_pr');
                          $this->db->where('pr_ref',$val->pr_prno);
                          $file=$this->db->get()->result();
                          foreach ($file as $f) { ?>
                            <b >เอกสารแนบ : <a href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file ?>" style="color: red;">Download !!</a></b>
                          <?php } ?></td>
									<td width="15%" >
										<ul class="icons-list">
												<li><a id="openpo_v" class="preload" href="<?php echo base_url(); ?>index.php/pr/openpr/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
											<?php if ($val->pr_approve=="approve") {?>
												<li class="text-slate"><i class="icon-pencil7"></i></li>
												<li class="text-slate"><i class="icon-trash"></i></li>
											<?php }else{ ?>
												<li><a class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
												<li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"  onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"  ></i></a></li>
												<?php } ?>
												<!-- <li><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
										<li><a target="_blank" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_form.mrt&pr=<?php echo $val->pr_prid; ?>&pri=<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>

										</ul>
									</td>

								</tr>
								<?php $n++; } ?>
							</tbody>
						</table>
						</div>
					</div>
					</div>
					<!-- /highlighting rows and columns -->



					 <!-- Footer -->
			          <!-- <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div> -->
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
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
									                  <small>&nbsp&nbsp <?php echo $value->project_name;?><?php echo $value->department_title; ?></small>
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

         <div id="modal_theme_primary1<?php echo $val->pr_prno; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $val->pr_prno; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_pr');
                          $this->db->where('app_project',$val->project_code);
                          $this->db->where('app_pr',$val->pr_prno);
                          $scc=$this->db->get()->result(); ?>
                            <?php 
                $ts1 = "";
                $tl1 = "";
                $name1 = "";
                $date1 = "";
                $time1 = "";
                $ts2 = "";
                $tl2 = "";
                $name2 = "";
                $date2 = "";
                $time2 = "";
                $ts3 = "";
                $tl3 = "";
                $name3 = "";
                 $date3 = "";
                $time3 = "";
                $ts4 = "";
                $tl4 = "";
                $name4 = "";
                 $date4 = "";
                $time4 = "";
                $ts5 = "";
                $tl5 = "";
                $name5 = "";
                 $date5 = "";
                $time5 = "";
                $ts6 = "";
                $tl6 = "";
                $name6 = "";
                 $date6 = "";
                $time6 = "";
                $ts7 = "";
                $tl7  = "";
                $name7 = "";
                 $date7 = "";
                $time7 = "";
                $ts8 = "";
                $tl8 = "";
                $name8 = "";
                 $date8 = "";
                $time8 = "";
                $ts9 = "";
                $tl9 = "";
                $name9 = "";
                 $date9 = "";
                $time9 = "";
                $ts10 = "";
                $tl10 = "";
                $name10 = "";
                $date10 = "";
                $time10 = "";
                foreach ($scc as $t) { 
                        if($t->app_sequence=="1"){
                          $ts1=$t->status;
                          $tl1 = $t->lock;
                          $name1 = $t->app_midname;
                          $date1 = $t->app_date;
                		  $time1 = $t->app_time;
                        }else if($t->app_sequence=="2"){
                          $ts2=$t->status;
                          $tl2 = $t->lock;
                          $name2 = $t->app_midname;
                           $date2 = $t->app_date;
                		  $time2 = $t->app_time;
                        }else if($t->app_sequence=="3"){
                          $ts3=$t->status;
                          $tl3 = $t->lock;
                          $name3 = $t->app_midname;
                           $date3 = $t->app_date;
                		  $time3 = $t->app_time;
                        }else if($t->app_sequence=="4"){
                          $ts4=$t->status;
                          $tl4 = $t->lock;
                          $name4 = $t->app_midname;
                           $date4 = $t->app_date;
                		  $time4 = $t->app_time;
                        }else if($t->app_sequence=="5"){
                          $ts5=$t->status;
                          $tl5 = $t->lock;
                          $name5 = $t->app_midname;
                           $date5 = $t->app_date;
                		  $time5 = $t->app_time;
                        }else if($t->app_sequence=="6"){
                          $ts6=$t->status;
                          $tl6 = $t->lock;
                          $name6 = $t->app_midname;
                           $date6 = $t->app_date;
                		  $time6 = $t->app_time;
                        }else if($t->app_sequence=="7"){
                          $ts7=$t->status;
                          $tl7 = $t->lock;
                          $name7 = $t->app_midname;
                           $date7 = $t->app_date;
                		  $time7 = $t->app_time;
                        }else if($t->app_sequence=="8"){
                          $ts8=$t->status;
                          $tl8 = $t->lock;
                          $name8 = $t->app_midname;
                           $date8 = $t->app_date;
                		  $time8 = $t->app_time;
                        }else if($t->app_sequence=="9"){
                          $ts9=$t->status;
                          $tl9 = $t->lock;
                          $name9 = $t->app_midname;
                           $date9 = $t->app_date;
                		  $time9 = $t->app_time;
                        }else if($t->app_sequence=="10"){
                          $ts10=$t->status;
                          $tl10 = $t->lock;
                          $name10 = $t->app_midname;
                           $date10 = $t->app_date;
                		  $time10 = $t->app_time;
                        }
                      } ?>
  <div >

  <ul class="tree">       
    <ul>
    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully. '.my_format_date($date1).' '.$time1.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
      <ul>
        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date2).' '.$time2.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                    <ul>
                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date3).' '.$time3.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date4).' '.$time4.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date5).' '.$time5.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date6).' '.$time6.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date7).' '.$time7.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date8).' '.$time8.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date9).' '.$time9.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.  '.my_format_date($date10).' '.$time10.'</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
            
              
        </li>
         

      


    </li>
    
</div>
                </div>

                <div class="modal-footer">
                  
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