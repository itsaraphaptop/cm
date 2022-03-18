<!-- Main content -->
<?php $flag = $this->uri->segment(4); ?>
<?php $depid = $this->uri->segment(3); ?>
<div class="content-wrapper">
<div class="content">
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
			<button class="notal label label-danger"> not allowed</button>
			<button class="cancel label bg-danger"> Cancel</button>
			<button class="opopen label bg-green"> OPEN PO</button>
		</div>
		<script>
			$(".in").click(function(){
		$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/wait');
		});
		$(".apprv").click(function(){
		$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/approve');
		});
		$(".notal").click(function(){
		$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/disapprove');
		});
		// $(".pm").click(function(){
		// $(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		// $(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/pmapprove');
		// });
		$(".all").click(function(){
		$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>');
		});
		$(".opopen").click(function(){
		$(".loadtable").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
		$(".loadtable").load('<?php echo base_url(); ?>pr/archive_pr_load/<?php echo $projectid; ?>/approve/open');
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
							<!-- <th width="20%" class="text-center">Project/Department</th> -->
							<th width="20%" class="text-center">System</th>
							<th width="5%" class="text-center">TYPE</th>
							<th width="8%" class="text-center">For</th>
							<th width="20%" class="text-center">PR QTY</th>
							<th width="20%" class="text-center">PO QTY</th>
							<th width="5%" class="text-center">Pr Outstanding</th>
							<th width="8%" class="text-center">Approval Status</th>
							<th width="80%" class="text-center">Detail</th>
							<th width="10%" class="text-center">Status</th>
							<th width="10%" class="text-center">OPEN PO</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php $n=1; foreach($getpr as $val){  ?>
						<tr>
							<td><?php echo $val->pr_prno; ?></td>
							<td><?php echo $val->pr_prdate; ?></td>
							<td><?php echo $val->pr_reqname; ?></td>
							<!-- <td>
								
									<?php
									if ($flag == "p") {
										echo $val->project_name;
									}else{
										echo $val->department_title;
									}
									?>
								
							</td> -->
							<?php
								$system = $val->pr_system;
								$this->db->select('*');
								$this->db->where('systemcode', $system);
								$q =  $this->db->get('system');
								$syt = $q->result();
								foreach ($syt as $sys){  ?>
							<td class="text-left">
							<?php echo $sys->systemname; ?>
							</td>
							<?php } ?>
							<td class="text-left"><?php if($val->pr_costtype=="15"){echo "Cost";}elseif($val->pr_costtype=="17"){echo "Stock";}elseif($val->pr_costtype=="18"){echo "Asset tool";}elseif($val->pr_costtype=="19"){echo "Asset Office Equipment";}elseif($val->pr_costtype=="20"){echo "Asset Vehicle";} ?></td>
							<td class="text-left"><?php if($val->purchase_type=="1"){echo "PO/WO";}elseif($val->purchase_type=="2"){echo "PO ONLY";}elseif($val->purchase_type=="3"){echo "WO ONLY";} ?></td>

							<?php
								$pr_prno = $val->pr_prno;
								$this->db->select('sum(pri_qty) as total_pr,sum(pri_sumqty) as total_po');
								$this->db->where('pri_ref', $pr_prno);
								$pr =  $this->db->get('pr_item');
								$pr_item = $pr->result();
								foreach ($pr_item as $pr){ 									
									$sum_qty = $pr->total_pr-$pr->total_po;
								 } ?>
							<td class="text-left"><?php echo $pr->total_pr; ?></td>
							<td class="text-left"><?php echo $pr->total_po; ?></td>
							<td class="text-left"><?php echo $sum_qty; ?></td>
							<td class="text-left"><a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>"><span class="label bg-green">Check</span></a></td>
							<td class="text-left"><?php echo $val->pr_remark; ?></td>						

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
							<td><a data-toggle="modal" data-target="#openstatus<?php echo $val->pr_prno; ?>"><span class="label bg-green">OPEN</span></a></td>
							<?php }else{ ?>
							<td></td>
							<?php }?>
							<td width="15%">
								<ul class="icons-list">
									<li><a id="openpo_v" class="preload" href="<?php echo base_url(); ?>index.php/pr/openpr/<?php echo $val->pr_prno; ?>/<?php echo $flag; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
									<?php if ($val->pr_approve=="approve") {?>
									<li class="text-slate"><i class="icon-pencil7"></i></li>
									<li class="text-slate"><i class="icon-trash"></i></li>
									<?php } elseif ($val->pr_approve=="reject") { ?>
									<li class="text-slate"><i class="icon-pencil7"></i></li>
									<li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>/<?php echo $flag; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"  onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"  ></i></a></li>
									<?php }else{ ?>
									<li><a class="preload" href="<?php echo base_url(); ?>index.php/pr/editpr/<?php echo $val->pr_prno; ?>/<?php echo $flag; ?>" data-popup="tooltip" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
									<li><a href="<?php echo base_url(); ?>pr/delpr/<?php echo $val->pr_prno; ?>/<?php echo $val->pr_project; ?>/<?php echo $flag; ?>" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"  onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')"  ></i></a></li>
									<?php } ?>
									<!-- <li><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li> -->
									<li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_form.mrt&pr=<?php echo $val->pr_prid; ?>&pri=<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
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
<?php foreach ($getpr as $value) { 
	

	?>
<!-- Custom background color -->
<div id="open<?php echo $value->pr_prno; ?>" class="modal fade">
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
<?php foreach($getpr as $val){  ?>
	<div id="openstatus<?php echo $val->pr_prno; ?>" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h5 class="modal-title">Open Detail PR No. : <?php echo $val->pr_prno; ?></h5>
				</div>
				<div class="modal-body">				
					<table class="table table-bordered table-striped table-xxs">
						<thead>
							<tr>
								<th>PO NO.</th>
							</tr>
							<?php
					$this->db->select('*');
					$this->db->from('po');
					$this->db->where('po_prno',$val->pr_prno);
					$this->db->join('project', 'project.project_id = po.po_project','left outer');
					$this->db->join('department','department.department_id = po.po_department','left outer');
					$this->db->join('system','system.systemcode = po.po_system','left outer');
					$q =  $this->db->get();
					$res = $q->result();
					foreach ($res as $valpp){ ?>
							
							<tr>
								<td><a data-toggle="modal" data-target="#openpo<?php echo $valpp->po_prno; ?>" ><?php echo $valpp->po_pono; ?></a></td>
							</tr>
					<?php } ?>
							
						</thead>
						<tbody>
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
	</div>
<?php } ?>
<div id="openpo<?php echo $value->pr_prno; ?>" class="modal fade">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<?php
				$this->db->select('*');
				$this->db->from('po');
				$this->db->where('po_prno', $value->pr_prno);
				$this->db->join('project', 'project.project_id = po.po_project','left outer');
				$this->db->join('po_item', 'po_item.poi_ref = po.po_pono','left outer');
				// $this->db->join('department','department.department_id = po.po_department','left outer');
				$this->db->join('system','system.systemcode = po.po_system','left outer');
				$q =  $this->db->get();
				$res = $q->result();
				foreach ($res as $valp){
				$prno = $valp->po_prno;
				$podate = $valp->po_podate;
				$poproject = $valp->project_name;
				// $podepartment = $valp->department_title;
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
						<h5 for="">Project</h5>						
						<small>&nbsp;&nbsp; <?php echo $poproject;?></small>						
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
							<th>Receive QTY</th>
							<th>Balance QTY</th>							
							<th>Receive No</th>
							<th>Receive Date</th>
							<th>Price/Unit</th>
							<th>Amount</th>							
							<th>Disc.Amt</th>
							<th>Total</th>
						</tr>
						 
						<?php
					
						$totamt=0;  $n =1;
						$this->db->select('*');
						$this->db->from('po_item');
						$this->db->where('poi_ref',$popono);
						$q =  $this->db->get();
						$res = $q->result();
						foreach ($res as $p){ 
								//$p->poi_matname;


							$this->db->select('*');
							$this->db->from('receive_po');						
							$this->db->join('receive_poitem',"receive_po.po_reccode=receive_poitem.poi_ref");

							$this->db->where('po_pono',$p->poi_ref);
							$this->db->where('poi_matcode',$p->poi_matcode);
							$this->db->limit(1);
							$res_array = $this->db->get()->result_array();
						
							if(count($res_array)!= 0){
								$qty_re = $res_array[0]["poi_qty"];
								$Receive_No = $res_array[0]["po_reccode"];
								$receive_date = $res_array[0]["po_recdate"];
							}else{
								$qty_re = 0;
								$Receive_No = "";
								$receive_date = "";
							}


							?>
						<tr>
							<td><?php echo $n; ?></td>
							<td><?php echo $p->poi_matcode; ?></td>
							<td><?php echo $p->poi_matname; ?></td>
							<td><?php echo $p->poi_costcode; ?></td>
							<td><?php echo $p->poi_costname; ?></td>
							<td><?php echo number_format($p->poi_qty*1); ?></td>
							<td><?php echo $p->poi_unit; ?></td>
							
							<td><?=$qty_re?></td>
							<td><?php echo ($p->poi_qty-$qty_re) ?></td>
							<td><?php echo $Receive_No ?></td>
							<td><?php echo $receive_date?></td>
							<td><?php echo $p->poi_priceunit; ?></td>
							<td><?php echo number_format($p->poi_amount,2); ?></td>							
							<td><?php echo $p->poi_disamt; ?></td>
							<td><?php echo number_format($p->poi_netamt,2); ?></td>
						</tr>
						<?php $n++; $totamt = $totamt+$p->poi_netamt; } ?>
						<tr>
							<td colspan="14" class="text-center">Summary</td>
							<td><?php echo number_format($totamt,2); ?></td>
						</tr>
					</thead>
					<tbody>
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
</div>




<?php } ?>


<?php $n=1; foreach($getpr as $val){?>
    <div id="modal_reject<?php echo $val->pr_prno; ?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Reject No. <?php echo $val->pr_prno; ?></h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
				<label>หมายเหตุ</label>
				<input type="text" class="form-control" readonly="true" value="<?php echo $val->reject_remark; ?>">
			</div>
            </div>
        </div>
          <div class="modal-footer">
            <a data-dismiss="modal" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
          </div>
        </div>
      </div>
    </div>

<?php } ?>
<script type="text/javascript">
$('#purchase').attr('class', 'active'); 
$('#pb_archive').attr('style', 'background-color:#dedbd8');
</script>

