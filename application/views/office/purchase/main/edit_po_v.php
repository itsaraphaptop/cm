<?php $revise_status = $this->uri->segment(4); ?>
<?php foreach ($res as $key => $v) {
	$poid = $v->po_id;
	$pono = $v->po_pono;
	$prreqname = $v->po_prname;
	$prmemid = $v->po_memid;
	$podate = $v->po_podate;
	$prno = $v->po_prno;
	$projid = $v->po_project;
	$dpid = $v->po_department;
	$system = $v->po_system;
	$venname = $v->po_vender;
	$venid = $v->po_venderid;
	$qprojname = $this->db->query("select project_name from project where project_id='$v->po_project'");
	$qpres = $qprojname->result();
	foreach ($qpres as $pe) {
		$projectname = $pe->project_name;
	}
	$qpdp = $this->db->query("select department_title from department where department_id='$v->po_department'");
	$qdpres = $qpdp->result();
	foreach ($qdpres as $de) {
		$departname = $de->department_title;
	}
	$term = $v->po_trem;
	$contact = $v->po_contact;
	$contactno = $v->po_contactno;
	$quono = $v->po_quono;
	$delidate = $v->po_deliverydate;
	$place = $v->po_place;
	$remark = $v->po_remark;
	$vatper = $v->po_vatper;
	$discounts1 = $v->discounts1;
	$discounts2 = $v->discounts2;
	$downper = $v->downper;
	$down = $v->down;
	$retentionper = $v->retentionper;
	$retention = $v->retention;
	$wo = $v->wo_ref;
	$store_contact = $v->contact_store;
	$teamother = $v->teamother;
} ?>
<?php
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id', $projid);
$boq = $this->db->get()->result();
$bd_tenid = 0;
$chkconbqq = 0;
$controlbg = 0;
?>
<?php foreach ($boq as $eboq) {
	$chkconbqq = $eboq->chkconbqq;
	$controlbg = $eboq->controlbg;
	$bd_tenid = $eboq->bd_tenid;
	$chkconbqq = $eboq->chkconbqq;
	$project_code = $eboq->project_code;
	$c_po = $eboq->c_po;
	$a_po = $eboq->a_po;


}
?>
 <?php

$this->db->select('*');
$this->db->where('boq_bd', $bd_tenid);
$this->db->where('status', 0);
$priboqid = $this->db->get('boq_item')->result();
?>

 <?php

$this->db->select('*');
$this->db->where('poi_ref', $pono);
$previse = $this->db->get('po_item_revise')->num_rows();
?>

<!-- Main content -->
<div class="content-wrapper">

		<!-- Content area -->
		<form id="mainpost" method="post" >
		<!-- action="<?php echo base_url(); ?>purchase_active/editpo" -->
			<div class="content">
				<div class="row">
					<div class="panel panel-flat border-top-lg border-top-success">
						<div class="panel-heading ">
							<h5 class="panel-title">Purchase Order System  &nbsp; <?php if ($chkconbqq == "1") {
								echo '<a class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</a>';
							} else {
								echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</a>';
							}
							?>&nbsp; <?php if ($controlbg == "2") {
																echo '<a class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</a>';
															} else {
																echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</a>';
															}
															?>
							<?php if ($revise_status == "revise") { ?>
							<a class="in label label-info"> Revise : <?php echo $previse; ?> </a>
							<?php 
					} ?>
							<input type="hidden" id="ckkcontrolbg" value="<?php echo $controlbg; ?>">
							</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<!-- <li<a class="openpr btn btn-info btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> àÅ×Í¡ãº¢Í«×éÍ</a></li> -->
									<!-- <li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li> -->
								</ul>
							</div>
						</div>
						<div class="panel-body">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#PO1" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> Purchase Order</a></li>
							<li><a href="#PO2" data-toggle="tab"><i class="icon-attachment"></i>Attachment File</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="PO1">
							<!-- tab 1 -->
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="display-block text-semibold" data-i18n="nav.posystem.pono" data-i18n-target="span"><span>เลขที่ใบสั่งซื้อ</span></label>
										<input type="text" name="pono" id="pono" class="ppono form-control" placeholder="PO No." readonly="true" value="<?php echo $pono; ?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="display-block text-semibold">ผู้ขอสั่งซื้อ</label>
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
											</span>
											<input type="text" class="form-control" readonly value="<?php echo $prreqname; ?>"  name="memname" id="memname" >
											<input type="hidden" name="memid" id="memid" value="<?php echo $prmemid; ?>">
											<div class="input-group-btn">
												<button type="button" class="openemp btn btn-default btn-icon" data-toggle="modal" data-target="#open"><i class="icon-search4"></i></button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label data-i18n="nav.posystem.podate" data-i18n-target="span"><span>วันที่สั่งซื้อ</span></label>
										<label for="prno">&nbsp;</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar22"></i></span>
											
											<input type="date" class="form-control" id="pcdate" name="pcdate" value="<?php echo $podate; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="prno">เลขที่ใบขอสั่งซื้อ</label>
										<input type="text" name="prno" id="prno"  class="form-control" value="<?php echo $prno; ?>" readonly="">
									</div>
								</div>
								<div class="col-md-2">
										<div class="form-group">
											<label for="prno">เลขที่หนังสือสังจ้าง</label>
											<input type="text" name="wono" id="wono" placeholder="กรอกเลขที่ใบขอซื้อ" class="form-control" readonly="" value="<?php echo $wo; ?>">
										</div>
									</div>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="display-block text-semibold">โครงการ / แผนก :</label>
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
											</span>
											<input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php if ($projid == "") {
																																																																																																				echo "";
																																																																																																			} else {
																																																																																																				echo $projectname;
																																																																																																			} ?>" name="projectname" id="projectname">
											<input type="hidden" readonly="true" value="<?php echo $projid; ?>" class="pproject1 form-control input-sm" name="projectid" id="putprojectid">
											<div class="input-group-btn">
												<!-- <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3" hidden>
									<div class="form-group">
										<label class="display-block text-semibold">Department:</label>
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
											</span>
											<input type="text" class="form-control" readonly="readonly" placeholder="Department" value="<?php if ($dpid == "") {
																																																																																																							echo "";
																																																																																																						} else {
																																																																																																							echo $departname;
																																																																																																						} ?>"  name="depname" id="depname" >
											<input type="hidden" readonly="true" value="<?php echo $dpid; ?>" class="form-control input-sm input-sm" name="depid" id="depid">
											<div class="input-group-btn">
												<!-- <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="code">ระบบ</label>
									<input type="hidden" class="form-control" name="system" id="system" value="<?php echo $system;?>">
									<input type="text" readonly class="form-control" value="<?php echo $sys[0]['systemname'];?>">
									<!-- <select class="form-control" name="system" id="system">
										<?php foreach ($item as $key => $value) {
										$q = $this->db->query("select * from system where systemcode='$value->projectd_job'")->result();
										foreach ($q as $key => $v) { ?>
										<option value="<?php echo $value->projectd_job; ?>"><?php echo $v->systemname; ?></option>
										<?php 
								}
							} ?>
									</select> -->
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="display-block text-semibold">ร้านค้า:</label>
									<div class="input-group">
										<span class="input-group-btn">
											<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
										</span>
										<input type="text" class="form-control" readonly   name="vender" id="vender" value="<?php echo $venname; ?>">
										<input type="hidden" name="venderid" id="venderid" value="<?php echo $venid; ?>">
										<div class="input-group-btn">
											<a class="ven btn btn-default btn-icon" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-1">
								<label>ภาษี:</label>
								<div class="input-group">
									<input type="text" class="form-control text-center" id="vatper" name="vatper" placeholder="7%" value="<?php echo $vatper; ?>">
									<span class="input-group-addon">%</span>
								</div>
							</div>
							<div class="col-md-2">
								<label>ส่วนลดพิเศษคิดแบบ :</label>
								<div class="form-group">
									<select class="form-control" id="s1" name="s1">
										<?php if ($discounts1 == "1") {
										echo '<option value="1">Some items</option>';
										echo '<option value="2">Average of all items</option>';

									} else if ($discounts1 == "2") {
										echo '<option value="2">Average of all items</option>';
										echo '<option value="1">Some items</option>';
									} ?>
										
										
									</select>
									
								</div>
							</div>
							<div class="col-md-2">
								<label>จำนวนเงิน :</label>
								<div class="input-group">
									<input type="text" class="form-control text-right" id="s2" name="s2" <?php if ($discounts1 == "1") {
																																																																														echo 'disabled';
																																																																													} ?> value="<?php echo $discounts2; ?>">
									<a type="button" id="s3" class="btn btn-info btn-sm input-group-addon">คำนวณ</a>
								</div>
							</div>
							<script>
							
								$("#s1").on("click",function(){
									var s1 = parseFloat($("#s1").val());
									if(s1=="1"){
										$("#s2").prop( "disabled", true );
									}else if(s1=="0"){
										$("#s2").prop( "disabled", true );
									}else if(s1=="2"){
										$("#s2").prop( "disabled", false  );
									}
								});
							</script>
							<div class="col-md-1">
								<div class="form-group">
									<label for="team">เงื่อนไขชำระ</label>
									<input type="text" name="team"  id="team" class="form-control" value="<?php echo $term; ?>">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label for="contact">เบอร์ติดต่อ</label>
									<input type="text" name="contact" id="tel" class="form-control" value="<?php echo $contact; ?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="team">เงื่อนไขอื่นๆ</label>
									<input type="text" name="teamother"  id="teamother" class="form-control" value="<?php echo $teamother; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-1">
									<label for="contact">จ่ายล่วงหน้า</label>
									<div class="input-group">
										
										<input type="number" name="downper"   class="form-control text-right" value="<?php echo number_format($downper); ?>" id="downper">
										<span class="input-group-addon">%</span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="contact">&nbsp;</label>
										<input type="number" name="down" id="down"  class="form-control text-right" value="<?php echo $down; ?>" readonly="">
									</div>
								</div>

								<script>
									$('#downper').keyup(function(event) {
									if($(".type_cost").val()==""){
									  	swal({
										title: "Please select Type of Cost  !!",
										text: "",
										confirmButtonColor: "#EA1923",
										type: "error"

									  });  
									  $('#downper').val("0");
									  $('#down').val("0");
									  }else{
										
											var summarydi = $('#summarydi').val().replace(/,/g,"");
											var downper = $('#downper').val();
											var sumdown = (summarydi*downper)/100;
											$('#down').val(sumdown);
										
									}
									});
								</script>

								<div class="col-md-1">
									<label for="contact">เงินประกัน</label>
									<div class="input-group">
										
										<input type="number" name="retentionper" id="retentionper"  class="form-control text-right" value="<?php echo number_format($retentionper); ?>">
										<span class="input-group-addon">%</span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="contact">&nbsp;</label>
										<input type="number" name="retention" id="retention"   class="form-control text-right" value="<?php echo $retention; ?>" readonly="">
									</div>
								</div>

								<script>
									$('#retentionper').keyup(function(event) {
									if($(".type_cost").val()==""){
									  	swal({
										title: "Please select Type of Cost  !!",
										text: "",
										confirmButtonColor: "#EA1923",
										type: "error"

									  });  
									  $('#retentionper').val("0");
									  $('#retention').val("0");
									  }else{
										
											var summarydi = $('#summarydi').val().replace(/,/g,"");
											var retentionper = $('#retentionper').val();
											var sumretention = (summarydi*retentionper)/100;
											$('#retention').val(sumretention);
										
									}
									});
								</script>
							<div class="col-md-2">
								<div class="form-group">
									<label for="contactno">เลขที่สัญญา</label>
									<input type="text" name="contactno" id="contactno"  class="form-control" value="<?php echo $contactno; ?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="quono">ใบเสนอราคา .</label>
									<input type="text" name="quono" id="quono"  class="form-control" value="<?php echo $quono; ?>">
								</div>
							</div>
							<div class="col-md-2">
								<label for="deliverydate">วันที่ส่งมอบ .</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="icon-calendar22"></i></span>
									<input type="date" name="deliverydate" class="form-control" id="deliverydate" value="<?php echo $delidate; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">สถานที่ส่งของ</label>
									<textarea name="place" class="form-control" rows="4" cols="40"><?php echo $place; ?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">หมายเหตุ </label>
									<textarea name="remark" class="form-control" rows="4" cols="40"><?php echo $remark; ?></textarea>
								</div>
							</div>
							 <div class="col-md-2">
								<div class="form-group">
									<label for="">ผู้ติดต่อ</label>
									<input name="contractstorename" class="form-control" value="<?php echo $store_contact; ?>"/>
								</div>
							</div>
						</div>
				<div class="row">
								<?php
							$this->db->select('*');
							$this->db->where('boq_code', $bd_tenid);
							$this->db->where('type', "1");
							$this->db->group_by("costcode");
							$priboqid = $this->db->get('boq_cost')->result();
							?>
								<?php foreach ($priboqid as $bg) { ?>
								<?php
							$this->db->select_sum('cost');
							$this->db->where('boq_code', $bd_tenid);
							$this->db->where('costcode', $bg->costcode);
							$this->db->where('type', "1");
							$costboqcontrol = $this->db->get('boq_cost')->result();
							foreach ($costboqcontrol as $bc) {
								$costcost = $bc->cost;
							}

							$this->db->select_sum('poi_amount');
							$this->db->where('po_project', $projectida);
							$this->db->where('poi_costcode', $bg->costcode);
							$this->db->where('type_cost', "1");
							$this->db->join('po', 'po.po_pono = po_item.poi_ref');
							$qscostpo = $this->db->get('po_item')->result();
							$poi_amount = 0;
							foreach ($qscostpo as $cpo) {
								$poi_amount = $cpo->poi_amount;
							}
          						// po
							$this->db->select_sum('total_disc');
							$this->db->where('projectcode', $projectida);
							$this->db->where('lo_costcode', $bg->costcode);
							$this->db->where('type_cost', "1");
							$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
							$qscostwo = $this->db->get('lo_detail')->result();
							$total_disc = 0;
							foreach ($qscostwo as $cwo) {
								$total_disc = $cwo->total_disc;
							}

          						// wo
							$this->db->select_sum('pettycashi_unitprice');
							$this->db->where('project', $projectida);
							$this->db->where('pettycashi_costcode', $bg->costcode);
							$this->db->where('type_cost', "1");
							$this->db->join('pettycash', 'pettycash.docno = pettycash_item.pettycashi_ref');
							$qscostpc = $this->db->get('pettycash_item')->result();
							$pettycashi_unitprice = 0;
							foreach ($qscostpc as $cpc) {
								$pettycashi_unitprice = $cpc->pettycashi_unitprice;
							}
          						// pc

							$this->db->select_sum('amtcr');
							$this->db->where('project_id', $projectida);
							$this->db->where('cust_code', $bg->costcode);
							$this->db->where('type_cost', "1");
							$qscostgl = $this->db->get('gl_batch_details')->result();
							$amtcr = 0;
							foreach ($qscostgl as $cgl) {
								$amtcr = $cgl->amtcr;
							}


							$this->db->select_sum('amtdr');
							$this->db->where('project_id', $projectida);
							$this->db->where('cust_code', $bg->costcode);
							$this->db->where('type_cost', "1");
							$qscostgls = $this->db->get('gl_batch_details')->result();
							$amtdr = 0;
							foreach ($qscostgls as $cgls) {
								$amtdr = $cgls->amtdr;
							}
          						// GL


							$matitalcost = ($poi_amount + $total_disc + $pettycashi_unitprice + $amtcr) - $amtdr;
							?>
								<div class="col-md-2" hidden>
									<div class="form-group">
										<label for=""><?php echo $bg->costcode; ?> (M) </label>
										<input type="text" name="costbg" id="costbgmat<?php echo $bg->costcode; ?>" class="form-control text-right" value="<?php echo (($costcost / 100) * $bg->controlper) - $matitalcost; ?>">
										<input type="text" name="controlmat" id="controlmat<?php echo $bg->costcode; ?>" class="form-control text-right" value="<?php echo number_format($bg->control); ?>">
									</div>
								</div>
								
								<?php 
						} ?>

								<?php
							$this->db->select('*');
							$this->db->where('boq_code', $bd_tenid);
							$this->db->where('type', "2");
							$this->db->group_by("costcode");
							$priboqid2 = $this->db->get('boq_cost')->result();
							?>
								<?php foreach ($priboqid2 as $bg2) { ?>
								<?php
							$this->db->select_sum('cost');
							$this->db->where('boq_code', $bd_tenid);
							$this->db->where('costcode', $bg2->costcode);
							$this->db->where('type', "2");
							$costboqcontrol2 = $this->db->get('boq_cost')->result();
							foreach ($costboqcontrol2 as $bc2) {
								$costcost2 = $bc2->cost;
							}

							$this->db->select_sum('poi_amount');
							$this->db->where('po_project', $projectida);
							$this->db->where('poi_costcode', $bg2->costcode);
							$this->db->where('type_cost', "2");
							$this->db->join('po', 'po.po_pono = po_item.poi_ref');
							$qscostpo2 = $this->db->get('po_item')->result();
							$poi_amount2 = 0;
							foreach ($qscostpo2 as $cpo2) {
								$poi_amount2 = $cpo2->poi_amount;
							}
          						// po
							$this->db->select_sum('total_disc');
							$this->db->where('projectcode', $projectida);
							$this->db->where('lo_costcode', $bg2->costcode);
							$this->db->where('type_cost', "2");
							$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
							$qscostwo2 = $this->db->get('lo_detail')->result();
							$total_disc2 = 0;
							foreach ($qscostwo2 as $cwo2) {
								$total_disc2 = $cwo2->total_disc;
							}

          						// wo
							$this->db->select_sum('pettycashi_unitprice');
							$this->db->where('project', $projectida);
							$this->db->where('pettycashi_costcode', $bg2->costcode);
							$this->db->where('type_cost', "2");
							$this->db->join('pettycash', 'pettycash.docno = pettycash_item.pettycashi_ref');
							$qscostpc2 = $this->db->get('pettycash_item')->result();
							$pettycashi_unitprice2 = 0;
							foreach ($qscostpc2 as $cpc2) {
								$pettycashi_unitprice2 = $cpc2->pettycashi_unitprice;
							}
          						// pc

							$this->db->select_sum('amtcr');
							$this->db->where('project_id', $projectida);
							$this->db->where('cust_code', $bg2->costcode);
							$this->db->where('type_cost', "2");
							$qscostgl2 = $this->db->get('gl_batch_details')->result();
							$amtcr2 = 0;
							foreach ($qscostgl2 as $cgl2) {
								$amtcr2 = $cgl2->amtcr;
							}


							$this->db->select_sum('amtdr');
							$this->db->where('project_id', $projectida);
							$this->db->where('cust_code', $bg2->costcode);
							$this->db->where('type_cost', "2");
							$qscostgls2 = $this->db->get('gl_batch_details')->result();
							$amtdr2 = 0;
							foreach ($qscostgls2 as $cgls2) {
								$amtdr2 = $cgls2->amtdr;
							}
          						// GL


							$matitalcost2 = ($poi_amount2 + $total_disc2 + $pettycashi_unitprice2 + $amtcr2) - $amtdr2;
							?>
								<div class="col-md-2" hidden>
									<div class="form-group">
										<label for=""><?php echo $bg2->costcode; ?> (L) </label>
										<input type="text" name="costbg" id="costbglebour<?php echo $bg2->costcode; ?>" class="form-control text-right" value="<?php echo (($costcost2 / 100) * $bg2->controlper) - $matitalcost2; ?>">
										<input type="text" name="controllebour" id="controllebour<?php echo $bg2->costcode; ?>" class="form-control text-right" value="<?php echo number_format($bg2->control); ?>">
									</div>
								</div>

								<?php 
						} ?>
								
								<?php
							$this->db->select('*');
							$this->db->where('boq_code', $bd_tenid);
							$this->db->where('type', "3");
							$this->db->group_by("costcode");
							$priboqid3 = $this->db->get('boq_cost')->result();
							?>
								<?php foreach ($priboqid3 as $bg3) { ?>
								<?php
							$this->db->select_sum('cost');
							$this->db->where('boq_code', $bd_tenid);
							$this->db->where('costcode', $bg3->costcode);
							$this->db->where('type', "3");
							$costboqcontrol3 = $this->db->get('boq_cost')->result();
							foreach ($costboqcontrol3 as $bc3) {
								$costcost3 = $bc3->cost;
							}

							$this->db->select_sum('poi_amount');
							$this->db->where('po_project', $projectida);
							$this->db->where('poi_costcode', $bg3->costcode);
							$this->db->where('type_cost', "3");
							$this->db->join('po', 'po.po_pono = po_item.poi_ref');
							$qscostpo3 = $this->db->get('po_item')->result();
							$poi_amount3 = 0;
							foreach ($qscostpo3 as $cpo3) {
								$poi_amount3 = $cpo3->poi_amount;
							}
          						// po
							$this->db->select_sum('total_disc');
							$this->db->where('projectcode', $projectida);
							$this->db->where('lo_costcode', $bg3->costcode);
							$this->db->where('type_cost', "3");
							$this->db->join('lo', 'lo.lo_lono = lo_detail.lo_ref');
							$qscostwo3 = $this->db->get('lo_detail')->result();
							$total_disc3 = 0;
							foreach ($qscostwo3 as $cwo3) {
								$total_disc3 = $cwo3->total_disc;
							}

          						// wo
							$this->db->select_sum('pettycashi_unitprice');
							$this->db->where('project', $projectida);
							$this->db->where('pettycashi_costcode', $bg3->costcode);
							$this->db->where('type_cost', "3");
							$this->db->join('pettycash', 'pettycash.docno = pettycash_item.pettycashi_ref');
							$qscostpc3 = $this->db->get('pettycash_item')->result();
							$pettycashi_unitprice3 = 0;
							foreach ($qscostpc3 as $cpc3) {
								$pettycashi_unitprice3 = $cpc3->pettycashi_unitprice;
							}
          						// pc

							$this->db->select_sum('amtcr');
							$this->db->where('project_id', $projectida);
							$this->db->where('cust_code', $bg3->costcode);
							$this->db->where('type_cost', "3");
							$qscostgl3 = $this->db->get('gl_batch_details')->result();
							$amtcr3 = 0;
							foreach ($qscostgl3 as $cgl3) {
								$amtcr3 = $cgl3->amtcr;
							}


							$this->db->select_sum('amtdr');
							$this->db->where('project_id', $projectida);
							$this->db->where('cust_code', $bg3->costcode);
							$this->db->where('type_cost', "3");
							$qscostgls3 = $this->db->get('gl_batch_details')->result();
							$amtdr3 = 0;
							foreach ($qscostgls3 as $cgls3) {
								$amtdr3 = $cgls2->amtdr;
							}
          						// GL


							$matitalcost3 = ($poi_amount3 + $total_disc3 + $pettycashi_unitprice3 + $amtcr3) - $amtdr3;
							?>
								<div class="col-md-2" hidden>
									<div class="form-group">
										<label for=""><?php echo $bg3->costcode; ?> (S) </label>
										<input type="text" name="costbg" id="costbgsub<?php echo $bg3->costcode; ?>" class="form-control text-right" value="<?php echo (($costcost3 / 100) * $bg3->controlper) - $matitalcost3; ?>">
										<input type="text" name="controlsub" id="controlsub<?php echo $bg3->costcode; ?>" class="form-control text-right" value="<?php echo number_format($bg3->control); ?>">
									</div>
								</div>


								
								<?php 
						} ?>
							</div>
							<!--  -->
						<div class="table-responsive">
							<style type="text/css">
								.tablew {
							width: 150%;
							max-width: 500%;
							}
							</style>
							<!-- <div class="row" id="table" > -->
							<table class="tablew table-hover table-bordered table-striped table-xxs">
								<thead>
									<tr>
										
										<th></th>
										<th class="text-center" style="width: 300px;">Select</th>
										<th>No.</th>
										<th>Material Code</th>
										<th class="text-center">Material Name</th>
										<th class="text-center">Cost Code</th>
										<th>Qty</th>
										<th>Unit</th>
										<th>Price/Unit</th>
										<th>Amount</th>
										<th>Disc.1(%)</th>
										<th>Disc.2(%)</th>
										<th>Disc.3(%)</th>
										<th>Disc.4(%)</th>
										<th>Disc.Amt</th>
										<th>Total Disc</th>
										<th>Total Vat</th>
										<th>Total</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="body">
									<?php $n = 1;
								$totamtunit = 0;
								$totdi1 = 0;
								$totdi2 = 0;
								$totdi3 = 0;
								$totdi4 = 0;
								$totdisc = 0;
								$totamt = 0;
								$totvat = 0;
								$totdi = 0;
								$poi_amount = 0;
								foreach ($poi as $p) { ?>
									
									
									<!-- <?php var_dump($p) ?> -->
									<tr>
										<td >
											<div style="width:50px;">
												<ul class="icons-list">
													<li><a data-toggle="modal" data-target="#edit<?php echo $n; ?>" data-popup="tooltip" title="Edit" id="edit_btn<?php echo $n; ?>"><i class="icon-pencil7"></i></a></li>
													<li><a data-popup="tooltip" id="remove<?php echo $p->poi_id; ?>" title="Remove"><i class="icon-trash"></i></a></li>
													<!-- <li><a href="#" data-popup="tooltip" title="Options"><i class="icon-cog7"></i></a></li> -->
												</ul>
											</div>
										</td>
										
										
										<?php if ($p->poi_chk != "") { ?>
										<td width="3%" class="text-center">
											<div class="checkbox checkbox-switchery switchery-xs">
												<label>
													<input type="checkbox" checked="checked" id="a<?php echo $n; ?>"  class="switchery">
													<input type="hidden" name="chki[]" id="chki<?php echo $n; ?>" value="Y">
													<input type="hidden" id="poiidi<?php echo $n; ?>" name="poiidi[]" value="<?php echo $p->poi_id; ?>">
												</label>
											</div>
										</td>
										<?php 
								} else { ?>
										<td width="3%" class="text-center">
											<div class="checkbox checkbox-switchery switchery-xs">
												<label>
													<input type="checkbox" id="a<?php echo $n; ?>"  class="switchery">
													<input type="hidden" name="chki[]" id="chki<?php echo $n; ?>" value="Y">
													<input type="hidden" name="poiidi[]" value="<?php echo $p->poi_id; ?>">
												</label>
											</div>
										</td>
										<?php 
								} ?>
										<td><?php echo $n; ?></td>
										<td id="smatcode<?php echo $n; ?>"><?php echo $p->poi_matcode; ?>
										</td>
										<td id="smatname<?php echo $n; ?>"  style="width: 500px;"><?php echo $p->poi_matname; ?>
										</td>
										<td id="scostname<?php echo $n; ?>"><?php echo $p->poi_costcode; ?>
											<input type="hidden" name="costnamei[]" value="<?php echo $p->poi_costname; ?>">
											<input type="hidden" name="codtcodei[]" id="codtcodei<?php echo $n; ?>" value="<?php echo $p->poi_costcode; ?>">
										</td>
										<td id="sqtyi<?php echo $n; ?>"><?php echo number_format($p->poi_qty,2); ?>
											<input type="hidden" id="qtyi" name="qtyi[]" value="<?php echo $p->poi_qty; ?>">
										</td>
										<td id="sunit<?php echo $n; ?>"><?php echo $p->poi_unit; ?>
											<input type="hidden" name="uniti[]" value="<?php echo $p->poi_unit; ?>">
										</td>
										<td id="spriceunit<?php echo $n; ?>">
											<input class='txt1 form-control input-sm' type='text' id='<?php echo $n; ?>' name='amounti[]' value="<?php echo $p->poi_priceunit; ?>" readonly>
										</td>
										<td id="samount<?php echo $n; ?>">
											<input class="txt1 form-control input-sm" type="text" id="amounti<?php echo $n; ?>" name="amounti[]" value="<?php echo $p->poi_amount; ?>" readonly="">
										</td>
										<td id="sdisone<?php echo $n; ?>">
											<input class='form-control input-sm' type='text' name='disci1[]' id='disci1<?php echo $n; ?>' value="<?php echo $p->poi_discountper1; ?>" readonly>
										</td>
										<td id="sdistwo<?php echo $n; ?>"><input class='form-control input-sm' type='text' name='disci2[]' id='disci2<?php echo $n; ?>' value="<?php echo $p->poi_discountper2; ?>" readonly>
										</td>
										<td id="sdisthree<?php echo $n; ?>"><input class='form-control input-sm' type='text' name='disci3[]' id='disci3<?php echo $n; ?>' value="<?php echo $p->poi_discountper3; ?>" readonly>
										</td>
										<td id="sdisfour<?php echo $n; ?>"><input class='form-control input-sm' type='text' name='disci4[]' id='disci4<?php echo $n; ?>' value="<?php echo $p->poi_discountper4; ?>" readonly>
										</td>
										<td id="sdisce<?php echo $n; ?>">
											<input type='text' class='txt2 form-control input-sm' name='disamti[]'  id='zum1<?php echo $n; ?>' value="<?php echo $p->poi_disce; ?>" readonly>
										</td>
										<td id="sdisamt<?php echo $n; ?>">
											<input type='text' class='txt3 form-control input-sm' name='too_di[]' id='zum2<?php echo $n; ?>' value="<?php echo $p->poi_disamt; ?>" readonly>
										</td>
										<td id="total_vat<?php echo $n; ?>">
											<input type='text' class='txt4 form-control input-sm' name='to_vat[]' id='zum3<?php echo $n; ?>' value="<?php echo $p->poi_vat; ?>" readonly>
										</td>
										<td id="snetamt<?php echo $n; ?>">
											<input type='text' class='txt5 form-control input-sm' name='netamti[]' id='zum4<?php echo $n; ?>' value="<?php echo $p->poi_netamt; ?>" readonly>
											<input type="hidden"  id="type_costm<?php echo $n; ?>" value="<?php echo $p->type_cost; ?>">
										</td>
										<td hidden="">
											<ul class="icons-list">
												<li><a data-toggle="modal" data-target="#edit<?php echo $n; ?>" data-popup="tooltip" title="Edit" id="edit_btn<?php echo $n; ?>" ><i class="icon-pencil7"></i></a></li>
												<li><a data-popup="tooltip" id="remove<?php echo $p->poi_id; ?>" title="Remove"><i class="icon-trash"></i></a></li>
												
											</ul>
											<input type="hidden" name="matcodei[]" id="matcodetext<?php echo $n; ?>" value="<?php echo $p->poi_matcode; ?>">
											<input type="hidden" name="matnamei[]" id="matnametext<?php echo $n; ?>" value="<?php echo $p->poi_matname; ?>">
											<input type="hidden"  id="matnametext<?php echo $n; ?>" value="<?php echo $p->poi_matname; ?>">
											
										</td>
										<td style="color: #BEBEBE;"><?php echo $n; ?></td>
									</tr>
										

									<!-- Full width modal -->
									<?php $n++;
								$totamtunit = $totamtunit + $p->poi_amount;
								$totdi1 = $totdi1 + $p->poi_discountper1;
								$totdi2 = $totdi2 + $p->poi_discountper2;
								$totdi3 = $totdi3 + $p->poi_discountper3;
								$totdi4 = $totdi4 + $p->poi_discountper4;
								$totdisc = $totdisc + $p->poi_disce;
								$totdi = $totdi + $p->poi_disamt;
								$totvat = $totvat + $p->poi_vat;
								$totamt = $totamt + $p->poi_netamt;
								$poi_amount = $poi_amount + $p->poi_priceunit;
								$totalamt = parse_num(number_format($totamt,2));
							} ?>

										<tr>
																<td colspan="8" class="text-center">Summary</td>
																<td><input type="text" readonly class="form-control input-sm" id="summaryunit" name="summaryunit" value="<?php echo number_format($poi_amount, 2); ?>"></td>
																<td><span id="totamtunit"><input type="text" readonly class="form-control input-sm" id="summaryamt" name="summaryamt" value="<?php echo number_format($totamtunit, 2); ?>"></span><input type="hidden" id="txt_totamtunit" name="" value="<?php echo $totamtunit; ?>"></td>
																<td><span id="totdi1"><input type="text" readonly class="form-control input-sm" id="summaryd1" name="summaryd1" value="<?php echo number_format($totdi1, 2); ?>"><span><input type="hidden" id="txt_totdi1" name="" value="<?php echo $totdi1; ?>"></td>
																<td><span id="totdi2"><input type="text" readonly class="form-control input-sm" id="summaryd2" name="summaryd2" value="<?php echo number_format($totdi2, 2); ?>"></span><input type="hidden" id="txt_totdi2" name="" value="<?php echo $totdi2; ?>"></td>
																<td><input type="text" readonly class="form-control input-sm" id="summaryd3" name="summaryd3" value="<?php echo number_format($totdi3, 2); ?>"></td>
																<td><input type="text" readonly class="form-control input-sm" id="summaryd4" name="summaryd4" value="<?php echo number_format($totdi4, 2); ?>"></td>
																<td><input type="text" readonly class="form-control input-sm" id="summarydis" name="summarydis"  value="<?php echo number_format($totdisc, 2); ?>"></td>
																<td><input type="text" readonly class="form-control input-sm" id="summarydi" name="summarydi" value="<?php echo number_format($totdi, 2); ?>"></td>
																<td><input type="text" readonly class="form-control input-sm" id="summaryvat" name="summaryvat" value="<?php echo number_format($totvat, 2); ?>"></td>
																<td><input type="text" readonly class="form-control input-sm" id="summarytot" name="summarytot" value="<?php echo number_format($totamt, 2); ?>">
																<td></td>
															</tr>
								</tbody>
							</table>
						</div>
						<!-- //tab1 -->
					</div>
					<div class="tab-pane" id="PO2">
					<!-- tab2 -->
					 <!-- file attach -->
					 <div class="row">
                                                <div class="col-md-6">
														<div class="form-group">
															<!-- <form id="sendupload" name="sendupload" method="post" enctype="multipart/form-data"> -->
																<label class="control-label input-xs col-lg-3">Attachment File <span class="text-danger">*</span></label>
																<div class="col-lg-3">
																	<input type="file" name="userfile" class="file-styled" accept=".jpg,.jpeg,.png,.pdf" required="required" id="file">
																	
																</div>
															
																<input type="hidden" name="po_ref" value="<?php echo $pono; ?>">
															<!-- </form> -->
														
														</div>
													</div>
                                            <!-- <script>
                                                $('#file').change(function(event) {
                                                    // alert("change");
                                                    // var file = $(this).val();
                                                    var formD = new FormData($('#sendupload'));
                                                    var file = $('#file').val();
                                                    if (file != '') {
                                                        $.ajax({
                                                            url: '<?php echo base_url(); ?>purchase_active/ajax_upload_edit_po',
															type: 'POST',
															method: 'POST',
                                                            data: formD,
                                                            async: false,
                                                            cache: false,
                                                            contentType: false,
                                                            enctype: 'multipart/form-data',
                                                            processData: false,
                                                            success: function(response) {
                                                                show_nonti('Success!!!'+response, 'Upload File Successful',
                                                                    'success');
                                                                // setTimeout(function() {
                                                                //     location.reload();
                                                                // }, 500);
                                                            }
                                                        });
                                                        return false;
                                                    } else {
                                                        swal("Fail!", "กรุณาเลือกไฟล์", "error");
                                                    }

                                                });
                                            </script> -->
                  
                                           <!-- //file attach -->
					 </div>
                    <legend class="text-size-mini text-muted no-border no-padding">File</legend>
                    <?php
																			$this->db->select('*');
																			$this->db->from('select_file_po');
																			$this->db->where('po_ref', $pono);
																			$file = $this->db->get()->result();

																			foreach ($file as $f) {
																				$filesize = "select_file_po/" . $f->name_file;
																				$kb = filesize($filesize) / 1024;
																				$mb = $kb / 1024;
																				?>
                      	<p>
                            <!-- attachment file -->
                                <ul class="media-list">
                                    <li class="media">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="media-left media-middle">
                                                <?php if (get_mime_by_extension($f->name_file) == "application/pdf") { ?>
                                                    <i class="icon-file-pdf icon-2x"></i>
                                                <?php 
																																														} else { ?>
                                                    <i class="icon-file-picture icon-2x"></i>
                                                <?php 
																																														} ?>
                                            </div>

                                            <div class="media-body">
                                                <a class="media-heading text-semibold" href="<?php echo base_url(); ?>select_file_po/<?php echo $f->name_file; ?>" target="_blank"> <?php echo $f->name_file; ?> </a>
                                                <ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
                                                    <li><?php echo number_format($mb, 2); ?> MB</li>
                                                </ul>
                                            </div>

                                            <div class="media-right">
                                                <ul class="icons-list icons-list-extended text-nowrap">
                                                    <li><a href="<?php echo base_url(); ?>select_file_po/<?php echo $f->name_file; ?>" target="_blank"><i class="icon-download"></i></a></li>
                                                    <li><a id="delfile<?= $f->id_sl; ?>" del_id="<?= $f->id_sl; ?>"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </li>
                                </ul>
								 <script>
                        
									$('#delfile<?= $f->id_sl; ?>').click(function() {
										var id = $(this).attr('del_id');
										swal({
												title: "คุณแน่ใจใช่ไหม ?",
												text: "ต้องการลบไฟล์!",
												type: "warning",
												showCancelButton: true,
												confirmButtonColor: "#DD6B55",
												confirmButtonText: "Yes, delete it!",
												cancelButtonText: "No, cancel plx!",
												closeOnConfirm: false,
												closeOnCancel: false
											},
											function(isConfirm) {
												if (isConfirm) {
													$.post('<?php echo base_url(); ?>pr/del_file_by_id/' + id+ '/po', function() {})
														.done(function(data) {
															console.log(data);
															var json_res = jQuery.parseJSON(data);
															if (json_res.status === true) {

																swal("Deleted!", json_res.message, "success");

															} else {

																swal("Deleted!", json_res.message, "success");

															}
															$('.confirm').click(function() {
																location.reload();
															});

														});
												} else {
													swal("Cancelled", "ยกเลิอกการลบไฟล์เรียร้อยแล้ว", "error");
												}
											});
									});
								</script>
                        <?php 
																						} ?>
                      	</p> 
                            <!-- // attachmant file -->
					<!-- //tab2 -->
					</div>
				</div>
			</div>
												<br>
												<div class="text-right form-group">
													<a href="<?php echo base_url(); ?>purchase/opencreatepo" class="btn btn-default btn-xs"><i class="icon-plus22"></i> New</a>
													<a data-toggle="modal" id="inst" data-target="#insertrowpr" class="btn btn-default btn-xs"><i class="icon-stackoverflow"></i> ADD PR DETAIL</a>
													<a data-toggle="modal" data-target="#insertrow" class="btn btn-default btn-xs "><i class="icon-stackoverflow"></i> ADD Rows</a>
													<button type="button" class="mainsubmit btn bg-success btn-xs"><i class="icon-floppy-disk position-left"></i> Save </button>
													<!-- <a href="<?php echo base_url(); ?>purchase/report_po/<?php echo $pono; ?>" class="btn btn-default btn-xs"><i class="icon-printer4"></i> Print</a> -->
													<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>report/viewerload?type=po&typ=form&var1=<?php echo $poid; ?>&var2=<?php echo $pono; ?>&var3=<?=$compcode;?>&var4=<?php echo numwordsthai($totalamt); ?>&var5=<?php echo $projid; ?>" target="_blank" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i> Print</a>
													<a href="<?php echo base_url(); ?>purchase/po_archive" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
												</div>
								</form>

					<script>
					$(".mainsubmit").click(function(e){
						
						// $("#mainpost").submit();
						 	// alert("change");
                                                    // var file = $(this).val();
                                                    var formData = new FormData($('#mainpost')[0]);
                                                    // var file = $('#file').val();
                                                    // alert(file);
                                                    // if (file != '') {
                                                        $.ajax({
                                                            url: '<?php echo base_url(); ?>purchase_active/editpo',
                                                            type: 'POST',
                                                            data: formData,
                                                            async: false,
                                                            cache: false,
                                                            contentType: false,
                                                            enctype: 'multipart/form-data',
                                                            processData: false,
                                                            success: function(response) {
                                                                show_nonti('Success!!!', 'Successful',
                                                                    'success');
                                                                setTimeout(function() {
                                                                    location.reload();
                                                                }, 500);
                                                            }
                                                        });
                                                        // return false;
                                                    // } else {
                                                    //     swal("Fail!", "กรุณาเลือกไฟล์", "error");
                                                    // }
						// alert('ddd');
					});
					</script>	

						<?php $n = 1;
					foreach ($poi as $p) { ?>
								<div id="edit<?php echo $n; ?>" class="modal fade" data-backdrop="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													
													<h5 class="modal-title">Edit PO Detail <?php echo $p->poi_matname; ?></h5>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-xs-6">
															<label for="">รายการซื้อ</label>
															<div class="input-group" id="error<?php echo $n; ?>">
																<!--  <span class="input-group-addon">
																		<input type="checkbox" id="chk" aria-label="กำหนดเอง">
																</span> -->
																<input type="text" readonly="true" id="newmatname<?php echo $n; ?>"  placeholder="" class="form-control input-sm" value='<?php echo $p->poi_matname; ?>'>
																<input readonly="true" type="text" id="newmatcode<?php echo $n; ?>"  placeholder="" class="form-control input-sm" value="<?php echo $p->poi_matcode; ?>">
																<span class="input-group-btn" >
																<a class="openund<?php echo $n; ?> btn btn-primary  input-sm" data-toggle="modal" data-target="#opnewmattt<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span></a>
																<a class="openun<?php echo $n; ?> btn btn-primary btn-block input-sm" data-toggle="modal" data-target="#opnewmat<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span></a>
							
															</span>
																
															</div>
														</div>
												
														<div class="col-xs-6">
															<label for="">รายการต้นทุน <?php echo $controlbg; ?></label>
															<div class="input-group" id="errorcost">
																<input type="text" id="costnameint<?php echo $n; ?>" readonly="true" placeholder="" class="form-control input-sm" value="<?php echo $p->poi_costname; ?>">
																<input type=text id="codecostcodeint<?php echo $n; ?>" readonly="true" placeholder="" class="form-control input-sm" value="<?php echo $p->poi_costcode; ?>">
																
																<input ice_ type="hidden" id="last_boq_id<?= $n ?>" value="<?= $p->po_boq; ?>">
																<span class="input-group-btn" >
																	<?php if ($controlbg == "2") { ?>
																	<a class="btn btn-primary" id="selectcostcodeboq<?php echo $n; ?>" data-toggle="modal" data-target="#boq<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span></a>
																	<?php 
															} else { ?>
																	<a class="costcode<?php echo $n; ?> btn btn-primary" data-toggle="modal" data-target="#costcode<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span></a>
																	<?php 
															} ?>
																	?>
																</span>
															</div>
														</div>
														
													</div>
													<div class="row">

												<div class="col-md-6">
													<div class="form-group">
	                								<label>Detail Of Materail</label>
	                								<input type="text" id="remark_mat<?php echo $n;?>" class="form-control" value="<?php echo $p->remark_mat; ?>">
	              									</div>
	              								</div>

	              								<div class="col-md-3" id="type_costhide<?php echo $n; ?>" style="">
													<div class="form-group">
														<label>Type of Cost </label>
														<select name="type_cost" id="type_cost<?php echo $n; ?>" class="form-control" value="<?php echo $p->type_cost; ?>">
														<option value=""></option>
												        <option value="1">MATERIAL</option>
												        <option value="2">LABOR</option>
												        <option value="3">SUB CON</option>
												       
												        </select>
													</div>
												</div>

															

													</div>
													<div class="row">
														<hr>
													</div>
													<div id="closebg<?php echo $n; ?>">
													<div class="row">
														<div class="col-md-3">
															<div class="form-group" id="errorcost">
																<label for="qty">ปริมาณ</label>
																<input type="text" id="pqty<?php echo $n; ?>" name="qty"  placeholder="" class="form-control" value="<?php echo $p->poi_qty; ?>" onkeyup="intOnly($(this),1)">
															</div>
														</div>
														<div class="col-xs-3">
															<div class="input-group">
																<label for="unit">Unit</label>
																<input type="text" id="punit<?php echo $n; ?>" name="punit" readonly="true" placeholder="" class="form-control input-sm" value="<?php echo $p->poi_unit; ?>">
																<span class="input-group-btn" >
																	<a class="unit<?php echo $n; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit<?php echo $n; ?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> Search</a>
																</span>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="qty">แปลงค่า IC</label>
																<input type="number" id="cpqtyic" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="<?php echo $p->poi_qtyic; ?>">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="qty">ปริมาณ IC</label>
																<input type="text" id="pqtyic" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="<?php echo $p->poi_totqtyic; ?>">
															</div>
														</div>
														<div class="col-xs-2">
															<div class="input-group">
																<label for="unit">หน่วย IC</label>
																<input type="text" id="punitic<?php echo $n; ?>" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="<?php echo $p->poi_unitic; ?>" readonly="">
																<span class="input-group-btn" >
																	<a class="unitic<?php echo $n; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic<?php echo $n; ?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
																</span>
															</div>
														</div>
													</div>
													<script>
														$("#pqty").keyup(function() {
														var xqty = ($("#pqty").val().replace(/,/g,"")*1);
														var cpqtyic = ($("#cpqtyic").val().replace(/,/g,"")*1);
														var xpq = xqty*cpqtyic;
														$("#pqtyic").val(xpq);
															});
														$("#cpqtyic").keyup(function() {
														var xqty = ($("#pqty").val().replace(/,/g,"")*1);
														var cpqtyic = ($("#cpqtyic").val().replace(/,/g,"")*1);
														var xpq = xqty*cpqtyic;
														$("#pqtyic").val(xpq);
															});
													</script>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="price_unit">ราคา/หน่วย</label>
																<input type="text" id="pprice_unit<?php echo $n; ?>"  name="price_unit" placeholder="" class="form-control border-danger border-lg text-right" value="<?php echo $p->poi_priceunit; ?>">
																<input type="hidden" name="">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="amount">จำนวนเงิน</label>
																<input type="text" id="pamount<?php echo $n; ?>" readonly="true" name="amount" placeholder="" class="form-control text-right" value="<?php echo $p->poi_amount; ?>">
															</div>
														</div>
														
														
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 1 (%)</label>
																<input type='text' id="pdiscper1<?php echo $n; ?>" name="discountper1" placeholder="" class="form-control text-right" value="<?php echo $p->poi_discountper1; ?>" />
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 2 (%)</label>
																<input type='text' id="pdiscper2<?php echo $n; ?>" name="discountper2" placeholder="" class="form-control text-right" value="<?php echo $p->poi_discountper2; ?>" />
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 3 (%)</label>
																<input type='text' id="pdiscper3<?php echo $n; ?>" name="discountper3" placeholder="" class="form-control text-right" value="<?php echo $p->poi_discountper3; ?>" />
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 4 (%)</label>
																<input type='text' id="pdiscper4<?php echo $n; ?>" name="discountper4" placeholder="" class="form-control text-right" value="<?php echo $p->poi_discountper4; ?>" />
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="endtproject">ส่วนลดพิเศษ</label>
																<input type='text' id="pdiscex<?php echo $n; ?>" name="discountper2" class="form-control text-right" value="<?php echo $p->poi_disce; ?>"/>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
																<input type='text' id="pdisamt<?php echo $n; ?>" name="disamt" class="form-control text-right" value="<?php echo $p->poi_disamt; ?>"/>

																<input ice_ type='hidden' id="old_pdisamt<?php echo $n; ?>" name="old_pdisamt" class="form-control" value="<?php echo $p->poi_disamt; ?>"/>
																<input type="hidden" id="pvat<?php echo $n; ?>" value="0">
																
															</div>
														</div>
														
													</div>

													<?php if ($controlbg == "2") { ?>
														<div class="row">
															<div class="col-xs-3">
																	<div class="form-group">
																			<label>Budget Control</label>
																			<input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost<?php echo $n; ?>" value=""  readonly="">
																	</div>
															</div>
														</div>
														<?php 
												} ?>
													<div class="row">
														<div class="col-md-2">
															<div class="form-group">
																<label for="endtproject">vat</label>
																<input type='text' id="to_vat<?php echo $n; ?>" name="to_vat" class="form-control" value="<?php echo $p->poi_vat; ?>" readonly="true"/>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="endtproject">จำนวนเงินสุทธิ</label>
																<input type='text' id="pnetamt<?php echo $n; ?>" name="netamt" class="form-control" value="<?php echo $p->poi_netamt; ?>"/>
															</div>
														</div>
														
														<div class="col-md-8">
															<div class="form-group">
																<label for="endtproject">หมายเหตุ</label>
																<input type='text' id="premark<?php echo $n; ?>" name="eremark" class="form-control" value="<?php echo $p->poi_remark; ?>"/>
															</div>
														</div>
														<div class="col-xs-6">
															<label for="">Ref. Asset Code</label>
															<div class="input-group">
																<input type="hidden" id="accode<?php echo $n; ?>" name="accode"  readonly="true"  class="form-control input-sm" value="<?php echo $p->po_assetid; ?>">
																<input type="text" id="acname<?php echo $n; ?>" name="acname" readonly="true"  class="form-control input-sm" value="<?php echo $p->po_assetname; ?>">
																<input type="hidden" id="statusass<?php echo $n; ?>" name="statusass" readonly="true"  class="form-control input-sm" value="<?php echo $p->po_asset; ?>">
																<span class="input-group-btn" >
																	<a class="btn btn-info btn-sm" id="refasset<?php echo $n; ?>" data-toggle="modal" data-target="#refass<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
																</span>
															</div>
														</div>
														<div class="col-xs-6">
											                <div class="form-group">
											                  <label for="datesend ">Delivery Date</label>
											                  <input type="date" class="form-control" id="datesend" name="datesend" style="width: 200px">
											                </div>
											              </div>
														<div class="col-md-6">
															<input type="hidden" name="poid" id="poi_idi<?php echo $n; ?>" value="<?php echo $p->poi_id; ?>">
														</div>
													</div>

													<script>
														$('#type_cost<?php echo $n; ?>').val("<?php echo $p->type_cost; ?>");
														
      												    if("<?php echo $p->type_cost; ?>"=="1"){
      												    	var pamount = parseFloat($('#pamount<?php echo $n; ?>').val());
      												    	var costbgmat = parseFloat($('#costbgmat<?php echo $p->poi_costcode; ?>').val());
      												    	$('#totalcost<?php echo $n; ?>').val(costbgmat+pamount);
      												    }else if("<?php echo $p->type_cost; ?>"=="2"){
      												    	var pamount = parseFloat($('#pamount<?php echo $n; ?>').val());
      												    	var costbglebour = parseFloat($('#costbglebour<?php echo $p->poi_costcode; ?>').val());
      												    	$('#totalcost<?php echo $n; ?>').val(costbglebour+pamount);
      												    }else if("<?php echo $p->type_cost; ?>"=="3"){
      												    	var pamount = parseFloat($('#pamount<?php echo $n; ?>').val());
      												    	var costbglebour = parseFloat($('#costbgsub<?php echo $p->poi_costcode; ?>').val());
      												    	$('#totalcost<?php echo $n; ?>').val(costbglebour+pamount);
      												    }
														

      												    var type_cost = $("#type_cost<?php echo $n; ?>").val();
     												    var codecostcodeint = $('#codecostcodeint<?php echo $n; ?>').val();
      												    var ckkcontrolbg = $('#ckkcontrolbg').val();

														$('#type_cost<?php echo $n; ?>').change(function(event) {
														var codecostcodeint = $('#codecostcodeint<?php echo $n; ?>').val();
														var type_cost = $('#type_cost<?php echo $n; ?>').val();


														if(type_cost=="1"){
													   
													   $("#closebg<?php echo $n; ?>").show();
												       if(ckkcontrolbg==2){
												        	var costbgmat =  $('#costbgmat'+codecostcodeint+'').val();
												        	$('#totalcost<?php echo $n; ?>').val(costbgmat);

												        	
												        	
												        	if(isNaN(costbgmat)){
												        	$('#totalcost<?php echo $n; ?>').val(0);
												        	  swal({
															  title: "Over budget.",
															  text: "",
															  confirmButtonColor: "#EA1923",
															  type: "error"
															  });
															  $("#closebg<?php echo $n; ?>").hide();
															  $("#pprice_unit<?php echo $n; ?>").val('0');
															  $("#pdisamt<?php echo $n; ?>").val('0');
															  $("#pamount<?php echo $n; ?>").val('0');
															  $("#to_vats<?php echo $n; ?>").val('0');
															  $("#pnetamt<?php echo $n; ?>").val('0');
															  $("#type_cost<?php echo $n; ?>").val('0');	
															  
												        	}	
												        	
												      	}
														}else if(type_cost=="2"){
														$("#closebg<?php echo $n; ?>").show();
												        if(ckkcontrolbg==2){
												        	var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
												        	$('#totalcost<?php echo $n; ?>').val(costbglebour);

												        	
												        	if(isNaN(costbglebour)){
												        	$('#totalcost<?php echo $n; ?>').val(0);
												        	  swal({
															  title: "Over budget.",
															  text: "",
															  confirmButtonColor: "#EA1923",
															  type: "error"
															  });
															  $("#closebg<?php echo $n; ?>").hide();
															  $("#pprice_unit<?php echo $n; ?>").val('0');
															  $("#pdisamt<?php echo $n; ?>").val('0');
															  $("#pamount<?php echo $n; ?>").val('0');
															  $("#to_vats<?php echo $n; ?>").val('0');
															  $("#pnetamt<?php echo $n; ?>").val('0');
															  $("#type_cost<?php echo $n; ?>").val('0');	
															  
												        	}	
												        	
												      	}
														}else if(type_cost=="3"){
														$("#closebg<?php echo $n; ?>").show();
												        if(ckkcontrolbg==2){
												        	var costbgsub =  $('#costbgsub'+codecostcodeint+'').val();
												        	$('#totalcost<?php echo $n; ?>').val(costbgsub);

												        	if(isNaN(costbgsub)){
												        	$('#totalcost<?php echo $n; ?>').val(0);
												        	  swal({
															  title: "Over budget.",
															  text: "",
															  confirmButtonColor: "#EA1923",
															  type: "error"
															  });
															  $("#closebg<?php echo $n; ?>").hide();
															  $("#pprice_unit<?php echo $n; ?>").val('0');
															  $("#pdisamt<?php echo $n; ?>").val('0');
															  $("#pamount<?php echo $n; ?>").val('0');
															  $("#to_vats<?php echo $n; ?>").val('0');
															  $("#pnetamt<?php echo $n; ?>").val('0');
															  $("#type_cost<?php echo $n; ?>").val('0');	
															  
												        	}
												      	}
														}else{
														$('#closebg').hide();
														}
														});
														</script>

											
												<div class="modal-footer">
													
													<a id="insertpodetail<?php echo $n; ?>"  data-dismiss="modal" class="btn btn-primary">Insert</a>
													
												</div>
											</div>
											</div>
										</div>
									</div>
								</div>

								<div id="opnewmat<?php echo $n; ?>" class="modal fade">
												<div class="modal-dialog modal-full">
													<div class="modal-content ">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">เพิ่มรายการ</h5>
														</div>
														<div class="modal-body">
															<div class="row" id="modal_mat<?php echo $n; ?>"></div>
														</div>
													</div>
												</div>
											</div>
											<script>
											$(".openun<?php echo $n; ?>").click(function(){
											
											$("#modal_mat<?php echo $n; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#modal_mat<?php echo $n; ?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $n; ?>');
											});
											</script>
										<div id="opnewmattt<?php echo $n; ?>" class="modal fade" data-backdrop="false">
												<div class="modal-dialog modal-full">
													<div class="modal-content ">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">เพิ่มรายการ</h5>
														</div>
														<div class="modal-body">
															<div class="row" id="modal_matdd<?php echo $n; ?>"></div>
														</div>
													</div>
												</div>
											</div>
											<script>
											$(".openund<?php echo $n; ?>").click(function(){
											
											$("#modal_matdd<?php echo $n; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#modal_matdd<?php echo $n; ?>").load('<?php echo base_url(); ?>share/material_id/<?php echo $n; ?>');
											});
											</script>

											<div class="modal fade" id="boq<?php echo $n; ?>"  data-backdrop="false">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header bg-info">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
																	</div>
																	<div class="modal-body">
																		<div class="row" id="modal_boq<?php echo $n; ?>">
																		</div>
																	</div>
																</div>
															</div>
															</div><!-- end modal matcode and costcode -->
															<script>
															$('#selectcostcodeboq<?php echo $n; ?>').click(function(){
															$('#closebg<?php echo $n; ?>').hide();
															$('#type_cost<?php echo $n; ?>').val("");
															var system = $('#system').val();
															$('#modal_boq<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
															$("#modal_boq<?php echo $n; ?>").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system+'/<?php echo $n; ?>');
															});
															</script>

													<div class="modal fade" id="costcode<?php echo $n; ?>" data-backdrop="false">
														<div class="modal-dialog modal-full">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">Select CostCode</h4>
																</div>
																<div class="modal-body">
																	<div class="panel-body">
																		<div class="row" id="modal_costcode<?php echo $n; ?>">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														</div> <!--end modal -->
														<script>
														$(".costcode<?php echo $n; ?>").click(function(){
														$("#modal_costcode<?php echo $n; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
														$("#modal_costcode<?php echo $n; ?>").load('<?php echo base_url(); ?>share/costcode_id/<?php echo $n; ?>');
														});
														</script>
											
											
									<script type="text/javascript">
										
										$('#edit_btn<?php echo $n; ?>').click(function(event) {
											var pamount = parseFloat($('#pamount<?php echo $n; ?>').val());
											var codecostcodeint = $('#codtcodei<?php echo $n; ?>').val();
											var type_cost = $('#type_cost<?php echo $n; ?>').val();
											
											if(type_cost=="1"){
												var costbgmat =  parseFloat($('#costbgmat'+codecostcodeint+'').val());
												$('#costbgmat'+codecostcodeint+'').val(costbgmat+pamount);
												
											}else if(type_cost=="2"){
												var costbglebour =  parseFloat($('#costbglebour'+codecostcodeint+'').val());
												$('#costbglebour'+codecostcodeint+'').val(costbglebour+pamount);
												
											}else if(type_cost=="3"){
												var costbgsub =  parseFloat($('#costbgsub'+codecostcodeint+'').val());
												$('#costbgsub'+codecostcodeint+'').val(costbgsub+pamount);
												
											}

											
										});
											
									
									</script>


									<!-- /Main content -->
									<script type="text/javascript">
									$("#pqty<?php echo $n; ?> ,#pprice_unit<?php echo $n; ?> ,#pdiscper1<?php echo $n; ?> ,#pdiscper2<?php echo $n; ?> ,#pdiscper3<?php echo $n; ?> ,#pdiscper4<?php echo $n; ?> ,#pdiscex<?php echo $n; ?>").keyup(function(){
											var ckkcontrolbg = $('#ckkcontrolbg').val();
											var chkcontroll  = $("#chkcontroll<?php echo $n; ?>").val();  
											//xpd1
											//alert(ckkcontrolbg);
											var xqty = ($("#pqty<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xprice = ($("#pprice_unit<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xamount = xqty*xprice;
											var xdiscper1 = ($("#pdiscper1<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xdiscper2 = ($("#pdiscper2<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xdiscper3 = ($("#pdiscper3<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xdiscper4 = ($("#pdiscper4<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xdiscper5 = ($("#pdiscex<?php echo $n; ?>").val().replace(/,/g,"")*1);
											var xvatt = ($("#vatper").val().replace(/,/g,"")*1);
											var xpd1 = xamount - (xamount*xdiscper1)/100;
											var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
											var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
											var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
											var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
											var total_di = xamount-xpd4;
											var xvat = ($("#vatper").val().replace(/,/g,"")*1);
											var boq_id =$("#boq_id<?php echo $n; ?>").val();
											
											$("#pamount<?php echo $n; ?>").val((xamount));
											$("#too_di<?php echo $n; ?>").val((total_di));
											$("#to_vat<?php echo $n; ?>").val((xpd8));
											$("#tot_vat<?php echo $n; ?>").val((xpd8));
											if(xdiscper5 != 0){
											vxpd4 = xpd4-xdiscper5;
											$("#pdisamt<?php echo $n; ?>").val((vxpd4));
											$("#too_di<?php echo $n; ?>").val((vxpd4));
											vxpd5 = (xpd4-xdiscper5) + xpd8;
											$("#pnetamt<?php echo $n; ?>").val((vxpd5));
											}
											else if(xdiscper2 != 0){
											$("#pdisamt<?php echo $n; ?>").val((xpd4));
											$("#too_di<?php echo $n; ?>").val((xpd4));
											vxpd2 = xpd4 + xpd8;
											$("#pnetamt<?php echo $n; ?>").val((vxpd2));
											}
											else if(xdiscper3 != 0){
											$("#pdisamt<?php echo $n; ?>").val((xpd4));
											$("#too_di<?php echo $n; ?>").val((xpd4));
											vxpd3 = xpd4 + xpd8;
											$("#pnetamt<?php echo $n; ?>").val((vxpd3));
											}
											else if(xdiscper4 != 0){
											$("#pdisamt<?php echo $n; ?>").val((xpd4));
											$("#too_di<?php echo $n; ?>").val((xpd4));
											vxpd5 = xpd4 + xpd8;
											$("#pnetamt<?php echo $n; ?>").val((vxpd5));
											}
											else
											{
											$("#pdisamt<?php echo $n; ?>").val((xpd1));
											$("#too_di<?php echo $n; ?>").val((xpd1));
											vxpd1 = xpd4 + xpd8;
											$("#pnetamt<?php echo $n; ?>").val((vxpd1));
											}
									
												//ice

										var ckkcontrolbg = $("#ckkcontrolbg").val();
																					  //alert(ckkcontrolbg);
										  if(ckkcontrolbg=="2"){
										  //alert(ckkcontrolbg);
										  var type_cost = $("#type_cost<?php echo $n; ?>").val();

										 var codecostcodeint = $('#codecostcodeint<?php echo $n; ?>').val();
										  if(type_cost==1){
										  var controlmat = $('#controlmat'+codecostcodeint+'').val();
										  if(controlmat=="1"){
										  var costbg = parseFloat($('#costbgmat'+codecostcodeint+'').val().replace(/,/g,""));
										  $('#totalcost<?php echo $n; ?>').val(costbg-xpd1);
										  //alert(totalcost);
										  var totalcost = parseFloat($('#totalcost<?php echo $n; ?>').val().replace(/,/g,""));
										  var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
										  if (parseFloat(totalcost) < parseFloat("0")) {
										  swal({
										  title: "Over budjet",
										  text: "",
										  confirmButtonColor: "#EA1923",
										  type: "error"
										  });
										  $("#pprice_unit<?php echo $n; ?>").val('0');
										  $("#pdisamt<?php echo $n; ?>").val('0');
										  $("#pamount<?php echo $n; ?>").val('0');
										  $("#totalcost<?php echo $n; ?>").val(costcodecc);
										  $("#to_vats<?php echo $n; ?>").val('0');
										  $("#pnetamt<?php echo $n; ?>").val('0');
										  }
										  }
										  }else if(type_cost==2){
										  var controllebour = $('#controllebour'+codecostcodeint+'').val();
										        if(controllebour=="1"){
										  var costbg = parseFloat($('#costbglebour'+codecostcodeint+'').val().replace(/,/g,""));
										  $('#totalcost<?php echo $n; ?>').val(costbg-xpd1);
										  //alert(totalcost);
										  var totalcost = parseFloat($('#totalcost<?php echo $n; ?>').val().replace(/,/g,""));
										  var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
										  if (parseFloat(totalcost) < parseFloat("0")) {
										  swal({
										  title: "Over budjet",
										  text: "",
										  confirmButtonColor: "#EA1923",
										  type: "error"
										  });
										  $("#pprice_unit<?php echo $n; ?>").val('0');
										  $("#pdisamt<?php echo $n; ?>").val('0');
										  $("#pamount<?php echo $n; ?>").val('0');
										  $("#totalcost<?php echo $n; ?>").val(costcodecc);
										  $("#to_vats<?php echo $n; ?>").val('0');
										  $("#pnetamt<?php echo $n; ?>").val('0');
										  }
										}
									}else if(type_cost==3){
										  var controlsub = $('#controlsub'+codecostcodeint+'').val();
										        if(controlsub=="1"){
										  var costbg = parseFloat($('#costbgsub'+codecostcodeint+'').val().replace(/,/g,""));
										  $('#totalcost<?php echo $n; ?>').val(costbg-xpd1);
										  //alert(totalcost);
										  var totalcost = parseFloat($('#totalcost<?php echo $n; ?>').val().replace(/,/g,""));
										  var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
										  if (parseFloat(totalcost) < parseFloat("0")) {
										  swal({
										  title: "Over budjet",
										  text: "",
										  confirmButtonColor: "#EA1923",
										  type: "error"
										  });
										  $("#pprice_unit<?php echo $n; ?>").val('0');
										  $("#pdisamt<?php echo $n; ?>").val('0');
										  $("#pamount<?php echo $n; ?>").val('0');
										  $("#totalcost<?php echo $n; ?>").val(costcodecc);
										  $("#to_vats<?php echo $n; ?>").val('0');
										  $("#pnetamt<?php echo $n; ?>").val('0');
										  }
										}
									}  //if parseFloa
								}// if ckkcontrolbg

							});



									$("#insertpodetail").click(function(){
									
									if ($("#newmatcode").val()=="") {
											swal({
											title: "Please Chack!",
											text: "Material Code Not Found",
											confirmButtonColor: "#2196F3"
									});
									$("#error").attr("class", "input-group has-error has-feedback");
									$("#newmatname").focus();
									}else if ($("#codecostcodeint").val()=="") {
											swal({
											title: "Please Chack!",
											text: "Cost Code Not Found",
											confirmButtonColor: "#2196F3"
									});
									$("#errorcost").attr("class", "input-group has-error has-feedback");
									$("#costnameint").focus();
									}else if ($("#unit").val()=="") {
											swal({
													title: "Please Chack!",
													text: "Qty Not Found",
													confirmButtonColor: "#2196F3"
											});
									$("#errorcost").attr("class", "input-group has-error has-feedback");
									$("#unit").focus();
									}else{

									addrow();
									$("#newmatname").val("");
									$("#newmatcode").val("");
									$("#costnameint").val("");
									$("#codecostcodeint").val("");
									$("#unit").val("");
									
									$("#pqty").val("1");
									$("#pprice_unit").val("0");
									$("#pamount").val("0");
									$("#pdiscex").val("0");
									$("#pdisamt").val("0");
									$("#to_vat").val("0");
									$("#pnetamt").val("");
									$("#accode").val("");
									$("#acname").val("");
									$("#statusass").val("");
									$("#premark").val("");
									$("#pdiscper1").val("0");
									$("#pdiscper2").val("0");
									$("#pdiscper3").val("0");
									$("#pdiscper4").val("0");
									$("#error").attr("class", "input-group");
									$("#errorcost").attr("class", "input-group");
									$("#insertrow .close").click()
									}
									});
									$("#savee").click(function(e){
									if ($("#venderid").val()=="") {
									swal({
									title: "กรุณาเลือกร้านค้า!",
									// text: "danger",
									confirmButtonColor: "#FF0000",
									// type: "success"
									});
									}else if($("#summaryunit").val()=="0"){
									swal({
									title: "กรุณายืนยันราคาในใบขอซื้อ!",
									// text: "danger",
									confirmButtonColor: "#FF0000",
									// type: "success"
									});
									}else{
									var frm = $('#contactForm1');
									frm.submit(function (ev) {
									$.ajax({
									type: frm.attr('method'),
									url: frm.attr('action'),
									data: frm.serialize(),
									success: function (data) {
									swal({
									title: "PO"+data,
									text: "Save Completed!!.",
									// confirmButtonColor: "#66BB6A",
									type: "success"
									});
									setTimeout(function() {
									window.location.href = "<?php echo base_url(); ?>purchase/editpo/"+data;
									}, 500);
									}
									});
									ev.preventDefault();
									});
									$("#contactForm1").submit(); //Submit  the FORM
									}
									});
									//
									//
									</script>

									<!-- modal  โครงการ-->
									<div class="modal fade" id="openproj" data-backdrop="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Select Project</h4>
												</div>
												<div class="modal-body">
													<div class="panel-body">
														<div class="row" id="modal_project">
														</div>
													</div>
												</div>
											</div>
										</div>
										</div> <!--end modal -->
										<!-- modal  แผนก-->
										<div class="modal fade" id="opendepart" data-backdrop="false">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Select Department</h4>
													</div>
													<div class="modal-body">
														<div class="panel-body">
															<div class="row" id="modal_department">
															</div>
														</div>
													</div>
												</div>
											</div>
											</div> <!--end modal -->
											<!-- Full width modal -->
											<div id="openpr" class="modal fade" data-backdrop="false">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">Select Purchase Requsition</h5>
														</div>
														<div class="modal-body">
															<div id="loadpr">
															</div>
														</div>
														<br>
														<div class="modal-footer">
															<a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
															<!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
														</div>
													</div>
												</div>
											</div>
											<!-- /full width modal -->
											<div id="loadprv" class="modal fade"  data-backdrop="false">
												<div class="modal-dialog modal-full">
													<div class="modal-content ">
														
														<div id="load_detailpr_v"></div>
														
														
													</div>
												</div>
											</div>
											<!-- Full width modal -->
											<div id="openvender" class="modal fade" data-backdrop="false">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">Select Vender</h5>
														</div>
														<div class="modal-body">
															<div id="loadvender">
															</div>
														</div>
														<br>
														<div class="modal-footer">
															<a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
															<!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
														</div>
													</div>
												</div>
											</div>
											<!-- /full width modal -->
											<div class="modal fade" id="refass<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
														</div>
														<div class="modal-body">
															<div class="row" id="refasscode<?php echo $n; ?>">
															</div>
														</div>
													</div>
												</div>
											</div>
											<script>
											$('#refasset<?php echo $n; ?>').click(function(){
											$('#refasscode<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#refasscode<?php echo $n; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?php echo $n; ?>');
											});
											</script>

											
											<div class="modal fade" id="openunit<?php echo $n; ?>" data-backdrop="false">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
														</div>
														<div class="modal-body">
															<div id="modal_unit<?php echo $n; ?>"></div>
														</div>
													</div>
												</div>
												</div><!-- end modal matcode and costcode -->
												<script>
												$(".unit<?php echo $n; ?>").click(function(){
												$('#modal_unit<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
												$("#modal_unit<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/unitid/<?php echo $n; ?>');
												});
												</script>
												<script>
												$("#chkprice<?php echo $n; ?>").click(function(){
												var xqty = parseFloat($("#pqty<?php echo $n; ?>").val());
												var xprice = parseFloat($("#pprice_unit<?php echo $n; ?>").val());
												var xamount = xqty*xprice;
												var xdiscper1 = parseFloat($("#pdiscper1<?php echo $n; ?>").val());
												var xdiscper2 = parseFloat($("#pdiscper2<?php echo $n; ?>").val());
												var xdiscper3 = parseFloat($("#pdiscper3<?php echo $n; ?>").val());
												var xdiscper4 = parseFloat($("#pdiscper4<?php echo $n; ?>").val());
												var xdiscper5 = parseFloat($("#pdiscex<?php echo $n; ?>").val());
												var xvatt = parseFloat($("#vatper").val());
												var xpd1 = xamount - (xamount*xdiscper1)/100;
												var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
												var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
												var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
												var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
												var total_di = xamount-xpd4;
												var xvat = parseFloat($("#vatper").val());
												$("#pamount<?php echo $n; ?>").val(xamount);
												$("#too_di<?php echo $n; ?>").val(total_di);
												$("#to_vat<?php echo $n; ?>").val(xpd8);
												$("#tot_vat<?php echo $n; ?>").val(xpd8);
												if(xdiscper5 != 0){
												vxpd4 = xpd4-xdiscper5;
												$("#pdisamt<?php echo $n; ?>").val(vxpd4);
												$("#too_di<?php echo $n; ?>").val(vxpd4);
												vxpd5 = (xpd4-xdiscper5) + xpd8;
												$("#pnetamt<?php echo $n; ?>").val(vxpd5);
												}
												else if(xdiscper2 != 0){
												$("#pdisamt<?php echo $n; ?>").val(xpd4);
												$("#too_di<?php echo $n; ?>").val(xpd4);
												vxpd2 = xpd4 + xpd8;
												$("#pnetamt<?php echo $n; ?>").val(vxpd2);
												}
												else if(xdiscper3 != 0){
												$("#pdisamt<?php echo $n; ?>").val(xpd4);
												$("#too_di<?php echo $n; ?>").val(xpd4);
												vxpd3 = xpd4 + xpd8;
												$("#pnetamt<?php echo $n; ?>").val(vxpd3);
												}
												else if(xdiscper4 != 0){
												$("#pdisamt<?php echo $n; ?>").val(xpd4);
												$("#too_di<?php echo $n; ?>").val(xpd4);
												vxpd5 = xpd4 + xpd8;
												$("#pnetamt<?php echo $n; ?>").val(vxpd5);
												}
												else
												{
												$("#pdisamt<?php echo $n; ?>").val(xpd1);
												$("#too_di<?php echo $n; ?>").val(xpd1);
												vxpd1 = xpd4 + xpd8;
												$("#pnetamt<?php echo $n; ?>").val(vxpd1);
												}
												});
												$("#insertpodetail<?php echo $n; ?>").click(function(){
												if ($("#newmatcode<?php echo $n; ?>").val()!="") {
												var url="<?php echo base_url(); ?>purchase_active2/update_po_detail/<?php echo $revise_status; ?>";
													var dataSet={
													pono : $("#pono").val(),
													matname : $("#newmatname<?php echo $n; ?>").val(),
													matcode : $("#newmatcode<?php echo $n; ?>").val(),
													costname: $("#costnameint<?php echo $n; ?>").val(),
													costcode: $("#codecostcodeint<?php echo $n; ?>").val(),
													poi_id: $("#poi_idi<?php echo $n; ?>").val(),
													qty: $("#pqty<?php echo $n; ?>").val(),
													priceunit:$("#pprice_unit<?php echo $n; ?>").val(),
													unit: $("#punit<?php echo $n; ?>").val(),
													amount: $("#pamount<?php echo $n; ?>").val(),
													pdiscper1: $("#pdiscper1<?php echo $n; ?>").val(),
													pdiscper2: $("#pdiscper2<?php echo $n; ?>").val(),
													pdiscper3: $("#pdiscper3<?php echo $n; ?>").val(),
													pdiscper4: $("#pdiscper4<?php echo $n; ?>").val(),
													pdiscex: $("#pdiscex<?php echo $n; ?>").val(),
													pdisamt: $("#pdisamt<?php echo $n; ?>").val(),
													old_pdisamt:$("#old_pdisamt<?php echo $n; ?>").val(),
													to_vat: $("#to_vat<?php echo $n; ?>").val(),
													pnetamt: $("#pnetamt<?php echo $n; ?>").val(),
													povatper_h: $("#vatper").val(),
													boq_id:$("#boq_id<?php echo $n; ?>").val(),
													boq_id_last:$("#last_boq_id<?php echo $n; ?>").val(),
													type_cost:$("#type_cost<?php echo $n; ?>").val(),
													projectid:$("#putprojectid").val(),


													pono_revise  : $("#pono").val(),
													matname_revise  : $("#newmatname_revise<?php echo $n; ?>").val(),
													matcode_revise  : $("#newmatcode_revise<?php echo $n; ?>").val(),
													costname_revise : $("#costnameint_revise<?php echo $n; ?>").val(),
													costcode_revise : $("#codecostcodeint_revise<?php echo $n; ?>").val(),
													poi_id_revise : $("#poi_idi_revise<?php echo $n; ?>").val(),
													qty_revise : $("#pqty_revise<?php echo $n; ?>").val(),
													priceunit_revise :$("#pprice_unit_revise<?php echo $n; ?>").val(),
													unit_revise : $("#punit_revise<?php echo $n; ?>").val(),
													amount_revise : $("#pamount_revise<?php echo $n; ?>").val(),
													pdiscper1_revise : $("#pdiscper1_revise<?php echo $n; ?>").val(),
													pdiscper2_revise : $("#pdiscper2_revise<?php echo $n; ?>").val(),
													pdiscper3_revise : $("#pdiscper3_revise<?php echo $n; ?>").val(),
													pdiscper4_revise : $("#pdiscper4_revise<?php echo $n; ?>").val(),
													pdiscex_revise : $("#pdiscex_revise<?php echo $n; ?>").val(),
													pdisamt_revise : $("#pdisamt_revise<?php echo $n; ?>").val(),
													old_pdisamt_revise :$("#old_pdisamt_revise<?php echo $n; ?>").val(),
													to_vat_revise : $("#to_vat_revise<?php echo $n; ?>").val(),
													pnetamt_revise : $("#pnetamt_revise<?php echo $n; ?>").val(),
													povatper_h_revise : $("#vatper").val(),
													boq_id_revise :$("#boq_id_revise<?php echo $n; ?>").val(),
													boq_id_last_revise :$("#last_boq_id_revise<?php echo $n; ?>").val(),
													remark_mat: $("#remark_mat<?php echo $n;?>").val()

												};
												$.post(url,dataSet,function(data){

													// if(data == "true"){
														setTimeout(function() {
														   window.location.href = "<?php echo base_url(); ?>purchase/editpo/"+$("#pono").val()+"/<?php echo $revise_status; ?>";
														}, 100);
													// }else{
													// 	alert("error");
													// }
												});

												
												}else{
													alert("Please Select Meterial Code");
													$("#newmatname<?php echo $n; ?>").focus();
												}
												});
													$("#a<?php echo $n; ?>").click(function(){
														if ($("#a<?php echo $n; ?>").prop("checked")) {
															$("#chki<?php echo $n; ?>").val("Y");
														}else{
															$("#chki<?php echo $n; ?>").val("");
														}
													});

												$("#close_modal<?php echo $n; ?> , #close_modal_icon<?php echo $n; ?>").click(function(){
													var old_pdisamt_close = $("#old_pdisamt<?= $n ?>").val();
													var ref_boq_id = $("#boq_id<?= $n ?>");
													var ref_costbg = $("#costbg"+ref_boq_id.val()).val();
													var return_costbg_temp = (ref_costbg*1 - old_pdisamt_close*1)
													$("#costbg"+ref_boq_id.val()).val(return_costbg_temp);
													$("#pprice_unit<?= $n ?>").val(old_pdisamt_close);
													//alert(last_costbg);
													// alert(5555);
												});
												</script>
												<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/bootbox.min.js"></script>
												<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
												<script>
												// Alert combination
												$('#remove<?php echo $p->poi_id; ?>').on('click', function() {
													
													var idp = $('#poiidi<?php echo $n; ?>').val();
														swal({
															title: "Are you sure?",
															text: "Deleted "+idp,
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
																var url="<?php echo base_url(); ?>purchase_active/del_poi";
																var dataSet={
																id: "<?php echo $p->pri_id; ?>",
																code: "<?php echo $p->poi_ref; ?>",
																item: "<?php echo $p->poi_id; ?>",
																prno: "<?php echo $prno; ?>",
																boq_id:"<?= $p->po_boq ?>",
																pdisamt:"<?= $p->poi_disamt; ?>"
																};
																$.post(url,dataSet,function(data){
																	// alert(data);
																	//console.log(data)
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
															window.location.href = "<?php echo base_url(); ?>purchase/editpo/<?php echo $p->poi_ref; ?>";
													});
												});
												</script>
												<!-- modal  á¼¹¡-->
												<div class="modal fade" id="insertmatnew<?php echo $n; ?>" data-backdrop="false">
													<div class="modal-dialog modal-full">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">New Material</h4>
															</div>
															<div class="modal-body">
																<div class="panel-body">
																	<div class="row" id="modal_newmat<?php echo $n; ?>">
																	</div>
																</div>
															</div>
														</div>
													</div>
													</div> <!--end modal -->
													<script>
													$(".insertnewmat<?php echo $n; ?>").click(function(){
													$("#modal_newmat<?php echo $n; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
													$("#modal_newmat<?php echo $n; ?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $n; ?>');
													});
													</script>

													<div class="modal fade" id="openunitic<?php echo $n; ?>" data-backdrop="false">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">หน่วย</h4>
														</div>
														<div class="modal-body">
															<div id="modal_unitic<?php echo $n; ?>"></div>
														</div>
													</div>
												</div>
												</div><!-- end modal matcode and costcode -->
												<script>
												$(".unitic<?php echo $n; ?>").click(function(){
												$('#modal_unitic<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
												$("#modal_unitic<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/unitid2/<?php echo $n; ?>');
												});
												</script>

									<?php $n++;
							} ?>



<script>
							$("#s3").click(function() {
							var s2 = parseFloat($('#s2').val());
							if(s2!="0"){
							var sum = 0;
							var zum2 = parseFloat($('#zum2<?php echo $n; ?>').val());
							var amounti = parseFloat($('#amounti<?php echo $n; ?>').val());
							var summaryamt = parseFloat($('#summaryamt').val());
							var s2 = parseFloat($('#s2').val());
							var zumtotal = ((amounti/summaryamt*s2));
							
							var sum = 0;
							$(".txt").each(function() {
							if (!isNaN(this.value) && this.value.length != 0) {
							sum += parseFloat(this.value);
							$(this).css("background-color", "#FEFFB0");
							}else if (this.value.length != 0){
							$(this).css("background-color", "red");
							}
							});
							$("input#summaryunit").val(sum.toFixed(2));
							var sum1 = 0;
							$(".txt1").each(function() {
							if (!isNaN(this.value) && this.value.length != 0) {
							sum1 += parseFloat(this.value);
							$(this).css("background-color", "#FEFFB0");
							}else if (this.value.length != 0){
							$(this).css("background-color", "red");
							}
							});
							$("input#summaryamt").val(sum1.toFixed(2));
							var sum2 = 0;
							$(".txt2").each(function() {
							if (!isNaN(this.value) && this.value.length != 0) {
							sum2 += parseFloat(this.value);
							$(this).css("background-color", "#FEFFB0");
							}else if (this.value.length != 0){
							$(this).css("background-color", "red");
							}
							});
							$("input#summarydis").val(sum2.toFixed(2));
							var sum3 = 0;
							$(".txt3").each(function() {
							if (!isNaN(this.value) && this.value.length != 0) {
							sum3 += parseFloat(this.value);
							$(this).css("background-color", "#FEFFB0");
							}else if (this.value.length != 0){
							$(this).css("background-color", "red");
							}
							});
							$("input#summarydi").val(sum3.toFixed(2));
							var sum4 = 0;
							$(".txt4").each(function() {
							if (!isNaN(this.value) && this.value.length != 0) {
							sum4 += parseFloat(this.value);
							$(this).css("background-color", "#FEFFB0");
							}else if (this.value.length != 0){
							$(this).css("background-color", "red");
							}
							});
							$("input#summaryvat").val(sum4.toFixed(2));
							var sum5 = 0;
							$(".txt5").each(function() {
							if (!isNaN(this.value) && this.value.length != 0) {
							sum5 += parseFloat(this.value);
							$(this).css("background-color", "#FEFFB0");
							}else if (this.value.length != 0){
							$(this).css("background-color", "red");
							}
							});
							$("input#summarytot").val(sum5.toFixed(2));
							}
							});
							</script>
							<!-- /Main content -->
							<!-- modal  â¤Ã§¡ÒÃ-->
							<div class="modal fade" id="openproj" data-backdrop="false">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Select Project</h4>
										</div>
										<div class="modal-body">
											<div class="panel-body">
												<div class="row" id="modal_project">
												</div>
											</div>
										</div>
									</div>
								</div>
								</div> <!--end modal -->
								<!-- modal  á¼¹¡-->
								<div class="modal fade" id="opendepart" data-backdrop="false">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Select Department</h4>
											</div>
											<div class="modal-body">
												<div class="panel-body">
													<div class="row" id="modal_department">
													</div>
												</div>
											</div>
										</div>
									</div>
									</div> <!--end modal -->
									<!-- Full width modal -->
									<div id="openpr" class="modal fade" data-backdrop="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Select Purchase Requsition</h5>
												</div>
												<div class="modal-body">
													<div id="loadpr">
													</div>
												</div>
												<br>
												<div class="modal-footer">
													<a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
													<!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
												</div>
											</div>
										</div>
									</div>
									<!-- /full width modal -->
									<!-- Full width modal -->
									<div id="openvender" class="modal fade" data-backdrop="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Select Vender</h5>
												</div>
												<div class="modal-body">
													<div id="loadvender">
													</div>
												</div>
												<br>
												<div class="modal-footer">
													<a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
													<!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
												</div>
											</div>
										</div>
									</div>
									<!-- /full width modal -->
									<script>
									$(".openproj").click(function(){
									$('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
									$("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
									});
									$(".opendepart").click(function(){
									$('#modal_department').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
									$("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
									});
									$(".openpr").click(function(){
									$('#loadpr').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
									$("#loadpr").load('<?php echo base_url(); ?>purchase/load_pr');
									});
									$(".ven").click(function(){
									$("#loadvender").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
									$("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
									});
									</script>

									<div id="insertrowpr" class="modal fade" data-backdrop="false">
										<div class="modal-dialog modal-full">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Insert PR Detail</h5>
												</div>
												<div class="modal-body" id="prdetail">
												</div>
												<div class="modal-footer">
													<button class="btn btn-default btn-xs" data-dismiss="modal"><i class="icon-close2 position-left"></i> Close</button>
												</div>
											</div>
										</div>
									</div>
									<script>
										$("#inst").click(function(){
									$("#prdetail").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
									$("#prdetail").load('<?php echo base_url(); ?>share/modal_pr_detail2/'+$("#prno").val()+"/"+$("#pono").val());
									});
									</script>
									
									<!-- Full width modal -->
									<form id="insert_po_item" method="post" >
									<!-- action="<?= base_url() ?>purchase_active2/add_po_item/<?php echo $pono; ?>" -->
									<input type="hidden"  name="vatper" value="<?php echo $vatper; ?>">
									<div id="insertrow" class="modal fade" data-backdrop="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Insert PO Detail</h5>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-xs-6">
															<label for="">รายการซื้อ</label>
															<div class="input-group" id="error">
																<!--  <span class="input-group-addon">
																		<input type="checkbox" id="chk" aria-label="กำหนดเอง">
																</span> -->
																<input type="text" id="newmatname" name="matname"  placeholder="Material Code" class="form-control" readonly="">
																<input type="text" id="newmatcode" name="matcode"  placeholder="Material Code" class="form-control" readonly="">
																
																<span class="input-group-btn" >
																	<a class="openund btn btn-primary " data-toggle="modal" data-target="#opnewmattt"><span class="glyphicon glyphicon-search"></span></a>
																	<a class="openun btn btn-primary btn-block" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span></a>
																	
																</span>
															</div>
														</div>
														<div class="col-xs-6">
															<label for="">รายการต้นทุน</label>
															<div class="input-group" id="errorcost">
																<input type="text" id="costnameint" name="costname"  readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control">
																<input type="text" id="codecostcodeint" name="costcode"  readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control">
																
																<span class="input-group-btn" >
																	<?php if ($controlbg == "2") {
																	echo '<a class="btn btn-primary" id="selectcostcodeboq" data-toggle="modal" data-target="#boq"><span class="glyphicon glyphicon-search"></span></a>';
																} else {
																	echo '<a class="modalcost btn btn-primary" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span></a>';
																}
																?>
																</span>
															</div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-xs-6">
															<div class="form-group">
																<label>Detail Of Materail</label>
																<input type="text" id="remark_mat" class="form-control" value="">
															</div>
														</div>
													<div class="col-md-3" id="type_costhide">
																<div class="form-group">
																	<label>Type</label>
																	<select name="type_cost" id="type_cost" class="form-control" required="">
																	<option value=""></option>
					        										<option value="1">MATERIAL</option>
					        										<option value="2">LABOR</option>
					        										<option value="3">SUB CON</option>
					        										</select>
																</div>
															</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-xs-12">
																<hr>
															</div>
														</div>
													</div>
													<div id="closebg">
													<div class="row">
														<div class="col-md-3">
															<div class="form-group text-right" id="errorcost">
																<label for="qty">ปริมาณ</label>
																<input type="text" id="pqty" name="qty"  placeholder="กรอกปริมาณ" class="form-control" value="1" onkeyup="intOnly($(this),1)">
															</div>
														</div>
														<div class="col-xs-3">
															<div class="input-group">
																<label for="unit">หน่วย</label>
																<input type="text" id="unit" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control">
																<span class="input-group-btn" >
																	<a class="openun btn btn-primary btn-sm" data-toggle="modal" id="modalunit" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
																</span>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="qty">แปลงค่า IC</label>
																<input type="number" id="cpqtyic" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control  text-right" value="1">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="qty">ปริมาณ IC</label>
																<input type="text" id="pqtyic" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control  text-right" value="1">
															</div>
														</div>
														<div class="col-xs-2">
															<div class="input-group">
																<label for="unit">หน่วย IC</label>
																<input type="text" id="punitic" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control" value="" readonly="">
																<span class="input-group-btn" >
																	<a class="unitic btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
																</span>
															</div>
														</div>
													</div>
													<script>
														$("#pqty").keyup(function() {
															var xqty = ($("#pqty").val().replace(/,/g,"")*1);
															var cpqtyic = ($("#cpqtyic").val().replace(/,/g,"")*1);
															var xpq = xqty*cpqtyic;
															$("#pqtyic").val(xpq);
															});
														$("#cpqtyic").keyup(function() {
															var xqty = ($("#pqty").val().replace(/,/g,"")*1);
															var cpqtyic = ($("#cpqtyic").val().replace(/,/g,"")*1);
															var xpq = xqty*cpqtyic;
															$("#pqtyic").val(xpq);
															});
													</script>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="price_unit">ราคา/หน่วย</label>
																<input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg  text-right" value="0">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="amount">จำนวนเงิน</label>
																<input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control  text-right" value="0">
															</div>
														</div>
														
														
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 1 (%)</label>
																<input type='text' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="form-control  text-right" value="0"/>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 2 (%)</label>
																<input type='text' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="form-control  text-right" value="0" />
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 3 (%)</label>
																<input type='text' id="pdiscper3" name="discountper3" placeholder="กรอกส่วนลด" class="form-control  text-right" value="0"/>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="endtproject">ส่วนลด 4 (%)</label>
																<input type='text' id="pdiscper4" name="discountper4" placeholder="กรอกส่วนลด" class="form-control  text-right" value="0" />
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="endtproject">ส่วนลดพิเศษ</label>
																<input type='text' id="pdiscex" name="discountper2" class="form-control  text-right" value="0"/>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
																<input type='text' id="pdisamt" name="disamt" class="form-control  text-right" value="0"/>
																<input type="hidden" id="pvat" value="0">
															</div>
														</div>
														<div class="row"  <?php if ($controlbg != "2") { echo "hidden";	} ?>>
							
																<div class="col-xs-3">
																		<div class="form-group">
																				<label>Budget Control</label>
																				<input class="form-control text-right border-danger  text-right" type="text" name="totalcost[]" id="totalcost" value=""  readonly="">
																		</div>
																</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-2">
															<div class="form-group">
																<label for="endtproject">vat</label>
																<input type='text' id="to_vat" name="to_vat" class="form-control  text-right" value="7"/>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="endtproject">จำนวนเงินสุทธิ</label>
																<input type='text' id="pnetamt" name="netamt" class="form-control  text-right" value="0"/>
															</div>
														</div>
														
														<div class="col-md-8">
															<div class="form-group">
																<label for="endtproject">หมายเหตุ</label>
																<input type='text' id="premark" name="remark" class="form-control"/>
															</div>
														</div>
														<div class="col-xs-6">
															<label for="">Ref. Asset Code</label>
															<div class="input-group">
																<input type="hidden" id="accode" name="accode"  readonly="true"  class="form-control">
																<input type="text" id="acname" name="acname" readonly="true"  class="form-control">
																<input type="hidden" id="statusass" name="statusass" readonly="true"  class="form-control">
																<span class="input-group-btn" >
																	<a class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
																</span>
															</div>
														</div>
														<div class="col-xs-6">
											                <div class="form-group">
											                 <label for="datesend ">Delivery Date</label>
											                 <input type="date" class="form-control" id="datesend" name="datesend" style="width: 200px">
											                </div>
											              </div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="hidden" name="poid" value="">
													<a type="button" id="insertpodetail" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</a>
													<a class="btn btn-default" data-dismiss="modal">ยกเลิก</a>
												</div>
											</div>
											</div>
										</div>
									</div>
									</form>
									<script>
										 $('#closebg').hide();
										 $('#type_costhide').hide();
									     $("#type_cost").change(function(){
									      var type_cost = $("#type_cost").val();

									      $('#pprice_unit').val("0");
									      
									      var codecostcodeint = $('#codecostcodeint').val();
									      var ckkcontrolbg = $('#ckkcontrolbg').val();
									      if(type_cost==1){
									        $("#closebg").show();
									       if(ckkcontrolbg==2){
									        	var costbgmat =  $('#costbgmat'+codecostcodeint+'').val();
									        	$('#totalcost').val(costbgmat);
									      	

									      	if(isNaN(costbgmat)){
												$('#totalcost').val(0);
												  swal({
													title: "Over budget.",
													text: "",
													confirmButtonColor: "#EA1923",
													type: "error"
												 });
												$("#closebg").hide();
												$("#pprice_unit").val('0');
												$("#pdisamt").val('0');
												$("#pamount").val('0');
												$("#to_vats").val('0');
												$("#pnetamt").val('0');
												$("#type_cost").val('0');	
															  
											}
											}
									      }else if(type_cost==2){
									        $("#closebg").show();
									        if(ckkcontrolbg==2){
									        	var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
									        	$('#totalcost').val(costbglebour);

									        	if(isNaN(costbglebour)){
												$('#totalcost').val(0);
												  swal({
													title: "Over budget.",
													text: "",
													confirmButtonColor: "#EA1923",
													type: "error"
												 });
												$("#closebg").hide();
												$("#pprice_unit").val('0');
												$("#pdisamt").val('0');
												$("#pamount").val('0');
												$("#to_vats").val('0');
												$("#pnetamt").val('0');
												$("#type_cost").val('0');	
															  
											}
									      	}
									      }else if(type_cost==3){
									        $("#closebg").show();
									        if(ckkcontrolbg==2){
									        	var costbgsub =  $('#costbgsub'+codecostcodeint+'').val();
									        	$('#totalcost').val(costbgsub);

									        	if(isNaN(costbgsub)){
												$('#totalcost').val(0);
												  swal({
													title: "Over budget.",
													text: "",
													confirmButtonColor: "#EA1923",
													type: "error"
												 });
												$("#closebg").hide();
												$("#pprice_unit").val('0');
												$("#pdisamt").val('0');
												$("#pamount").val('0');
												$("#to_vats").val('0');
												$("#pnetamt").val('0');
												$("#type_cost").val('0');	
															  
											}
									      	}
									      }else if(type_cost==""){
									        $("#closebg").hide();
									      }
									    });
									</script>
									<script type="text/javascript">
									$("#insertpodetail").click(function(event) {
										// var form = $("#insert_po_item")
										 var formData = new FormData($('#insert_po_item')[0]);

										if ($("#newmatcode").val()=="") {
										 swal({
												 title: "Please Chack!",
												 text: "Material Code Not Found",
												 confirmButtonColor: "#2196F3"
										 });
										 	$("#error").attr("class", "input-group has-error has-feedback");
											$("#newmatname").focus();
										}else if ($("#codecostcodeint").val()=="") {
												swal({
														title: "Please Chack!",
														text: "Cost Code Not Found",
														confirmButtonColor: "#2196F3"
												});
													$("#errorcost").attr("class", "input-group has-error has-feedback");
													$("#costnameint").focus();
										}else if ($("#unit").val()=="") {
												swal({
														title: "Please Chack!",
														text: "Qty Not Found",
														confirmButtonColor: "#2196F3"
												});
													$("#errorcost").attr("class", "input-group has-error has-feedback");
													$("#unit").focus();
										}else{

											// form.submit();
											// alert("change");
                                                    // var file = $(this).val();
                                                   
                                                    // var file = $('#file').val();
                                                    // alert(file);
                                                    // if (file != '') {
                                                        $.ajax({
                                                            url: '<?php echo base_url(); ?>purchase_active2/add_po_item/<?php echo $pono; ?>',
                                                            type: 'POST',
                                                            data: formData,
                                                            async: false,
                                                            cache: false,
                                                            contentType: false,
                                                            enctype: 'multipart/form-data',
                                                            processData: false,
                                                            success: function(response) {
                                                                show_nonti('Success!!!', response,
                                                                    'success');
                                                                setTimeout(function() {
                                                                    location.reload();
                                                                }, 500);
                                                            }
                                                        });
                                                    //     return false;
                                                    // } else {
                                                    //     swal("Fail!", "กรุณาเลือกไฟล์", "error");
                                                    // }

										}
										
										//alert(55)
									});
									</script>
									<!-- /full width modal -->
									<!--  -->
									<div class="modal fade" id="openproj" data-backdrop="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Select Project</h4>
												</div>
												<div class="modal-body">
													<div class="panel-body">
														<div class="row" id="modal_project">
														</div>
													</div>
												</div>
											</div>
										</div>
										</div> <!--end modal -->
										<!-- modal  แผนก-->
										<div class="modal fade" id="opendepart" data-backdrop="false">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Select Department</h4>
													</div>
													<div class="modal-body">
														<div class="panel-body">
															<div class="row" id="modal_department">
															</div>
														</div>
													</div>
												</div>
											</div>
											</div> <!--end modal -->
											<!-- Full width modal -->
											<div id="openpr" class="modal fade" data-backdrop="false">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">Select Purchase Requsition</h5>
														</div>
														<div class="modal-body">
															<div id="loadpr">
															</div>
														</div>
														<br>
														<div class="modal-footer">
															<a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
															<!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
														</div>
													</div>
												</div>
											</div>
											<!-- /full width modal -->
											<div id="loadprv" class="modal fade"  data-backdrop="false">
												<div class="modal-dialog modal-full">
													<div class="modal-content ">
														
														<div id="load_detailpr_v"></div>
														
														
													</div>
												</div>
											</div>
											<!-- Full width modal -->
											<div id="openvender" class="modal fade" data-backdrop="false">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">Select Vender</h5>
														</div>
														<div class="modal-body">
															<div id="loadvender">
															</div>
														</div>
														<br>
														<div class="modal-footer">
															<a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
															<!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
														</div>
													</div>
												</div>
											</div>
											<!-- /full width modal -->
											
											<script>
												$(".openproj").click(function(){
											$('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
											});
											$(".opendepart").click(function(){
											$('#modal_department').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
											});

											$("#system").change(function(){
											var chkprv = parseFloat($("#chkprv").val());
											var system = $('#system').val();
											$('#loadpr').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											
											$("#loadpr").load('<?php echo base_url(); ?>purchase/load_pr2/'+"<?php echo 555; ?>"+'/<?php echo 555; ?>/'+system);
											// $("#loadpr").load('<?php echo base_url(); ?>purchase/load_pr2/'+<?php //echo $dname; ?>+'/<? php// echo $flag; ?>/'+system);
											
											});
											$(".ven").click(function(){
											$("#loadvender").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
											});
											</script>
											<!-- Full width modal -->
											
											<div class="modal fade" id="refass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
														</div>
														<div class="modal-body">
															<div class="row" id="refasscode">
															</div>
														</div>
													</div>
												</div>
											</div>
											<script>
											$('#refasset').click(function(){
											$('#refasscode').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#refasscode").load('<?php echo base_url(); ?>share/modalshare_asset');
											});
											</script>
											<!--  -->
											<div id="opnewmat" class="modal fade">
												<div class="modal-dialog modal-full">
													<div class="modal-content ">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">เพิ่มรายการ</h5>
														</div>
														<div class="modal-body">
															<div class="row" id="modal_mat"></div>
														</div>
													</div>
												</div>
											</div>
											<script>
											$(".openun").click(function(){
											var row = ($('#body tr').length-0)+1;
											$("#modal_mat").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#modal_mat").load('<?php echo base_url(); ?>share/getmatcode/'+row);
											});
											</script>
											<div id="opnewmattt" class="modal fade" data-backdrop="false">
												<div class="modal-dialog modal-full">
													<div class="modal-content ">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">เพิ่มรายการ</h5>
														</div>
														<div class="modal-body">
															<div class="row" id="modal_matdd"></div>
														</div>
													</div>
												</div>
											</div>
											<script>
											$(".openund").click(function(){
											var row = ($('#body tr').length-0)+1;
											$("#modal_matdd").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
											$("#modal_matdd").load('<?php echo base_url(); ?>share/material_alone/'+row);
											});
											</script>
											<!-- modal เลือกหน่วย -->
											<div class="modal fade" id="openunitic" data-backdrop="false">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="myModalLabel">หน่วย</h4>
														</div>
														<div class="modal-body">
															<div id="modal_unitic"></div>
														</div>
													</div>
												</div>
												</div><!-- end modal matcode and costcode -->
												<script>
												$(".unitic").click(function(){
												$('#modal_unitic').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
												$("#modal_unitic").load('<?php echo base_url(); ?>index.php/share/unitid2');
												});
												</script>
												<div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
															</div>
															<div class="panel-body">
																<div id="modal_unit">
																</div>
															</div>
														</div>
													</div>
													</div> <!--end modal -->
													<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-full">
															<div class="modal-content">
																<div class="modal-header bg-info">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
																</div>
																<div class="modal-body">
																	<div id="modal_cost"></div>
																</div>
															</div>
														</div>
														</div><!-- end modal matcode and costcode -->

														<div class="modal fade" id="boq"  data-backdrop="false">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header bg-info">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
																	</div>
																	<div class="modal-body">
																		<div class="row" id="modal_boq">
																		</div>
																	</div>
																</div>
															</div>
															</div><!-- end modal matcode and costcode -->
															<script>
															$('#selectcostcodeboq').click(function(){
															$('#closebg').hide();
															$('#type_cost').val("");
															var system = $('#system').val();
															$('#modal_boq').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
															$("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system);
															});
															</script>
															<!-- /full width modal -->

															<div class="modal fade" id="insertmatnew" data-backdrop="false">
																<div class="modal-dialog modal-full">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<h4 class="modal-title" id="myModalLabel">New Material</h4>
																		</div>
																		<div class="modal-body">
																			<div class="panel-body">
																				<div class="row" id="modal_newmat">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																</div> <!--end modal -->
																
																<script>
																					$("#modalunit").click(function(){
																$('#modal_unit').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
																$("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
																});
																$(".insertnewmat").click(function(){
																$("#modal_newmat").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
																$("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode_new');
																});
																$(".modalcost").click(function(){
																$('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
																$("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
																});
																</script>
																<script>
																		$("#pqty ,#pprice_unit ,#pdiscper1 ,#pdiscper2 ,#pdiscper3 ,#pdiscper4 ,#pdiscex").keyup(function(){
																			// alert(555)
																		var xqty = ($("#pqty").val().replace(/,/g,"")*1);
																		var xprice = ($("#pprice_unit").val().replace(/,/g,"")*1);
																		var xamount = xqty*xprice;
																		var xdiscper1 = ($("#pdiscper1").val().replace(/,/g,"")*1);
																		var xdiscper2 = ($("#pdiscper2").val().replace(/,/g,"")*1);
																		var xdiscper3 = ($("#pdiscper3").val().replace(/,/g,"")*1);
																		var xdiscper4 = ($("#pdiscper4").val().replace(/,/g,"")*1);
																		var xdiscper5 = ($("#pdiscex").val().replace(/,/g,"")*1);
																		var xvatt = ($("#vatper").val().replace(/,/g,"")*1);
																		var xpd1 = xamount - (xamount*xdiscper1)/100;
																		var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
																		var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
																		var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
																		var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
																		var total_di = xamount-xpd4;
																		var xvat = ($("#vatper").val().replace(/,/g,"")*1);
																		var chkcontroll = $("#chkcontroll").val();
																		var boq_id = $("#boq_id").val();
																		$("#pamount").val((xamount));
																		$("#too_di").val((total_di));
																		$("#to_vat").val((xpd8));
																		$("#tot_vat").val((xpd8));
																		if(xdiscper5 != 0){
																			vxpd4 = xpd4-xdiscper5;
																			$("#pdisamt").val((vxpd4));
																			$("#too_di").val((vxpd4));
																			vxpd5 = (xpd4-xdiscper5) + xpd8;
																			$("#pnetamt").val((vxpd5));
																		}
																		else if(xdiscper2 != 0){
																			$("#pdisamt").val((xpd4));
																			$("#too_di").val((xpd4));
																			vxpd2 = xpd4 + xpd8;
																			$("#pnetamt").val((vxpd2));
																		}
																		else if(xdiscper3 != 0){
																			$("#pdisamt").val((xpd4));
																			$("#too_di").val((xpd4));
																			vxpd3 = xpd4 + xpd8;
																			$("#pnetamt").val((vxpd3));
																		}
																		else if(xdiscper4 != 0){
																			$("#pdisamt").val((xpd4));
																			$("#too_di").val((xpd4));
																			vxpd5 = xpd4 + xpd8;
																			$("#pnetamt").val((vxpd5));
																		}
																		else
																		{
																			$("#pdisamt").val((xpd1));
																			$("#too_di").val((xpd1));
																			vxpd1 = xpd4 + xpd8;
																			$("#pnetamt").val((vxpd1));
																		}

																		var ckkcontrolbg = $('#ckkcontrolbg').val();
								  //alert(ckkcontrolbg);
								  if(ckkcontrolbg=="2"){
								  //alert(ckkcontrolbg);
								  var type_cost = $("#type_cost").val();

								  var codecostcodeint = $('#codecostcodeint').val();
								  if(type_cost==1){
								  var controlmat = $('#controlmat'+codecostcodeint+'').val();
								  if(controlmat=="1"){
								  var costbg = parseFloat($('#costbgmat'+codecostcodeint+'').val().replace(/,/g,""));
								  $('#totalcost').val(costbg-xpd1);
								  //alert(totalcost);
								  var totalcost = parseFloat($('#totalcost').val().replace(/,/g,""));
								  var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
								  if (parseFloat(totalcost) < parseFloat("0")) {
								  swal({
								  title: "Over budjet",
								  text: "",
								  confirmButtonColor: "#EA1923",
								  type: "error"
								  });
								  $("#pprice_unit").val('0');
								  $("#pdisamt").val('0');
								  $("#pamount").val('0');
								  $("#totalcost").val(costcodecc);
								  $("#to_vats").val('0');
								  $("#pnetamt").val('0');
								  }
								  }
								  }else if(type_cost==2){
								  var controllebour = $('#controllebour'+codecostcodeint+'').val();
								        if(controllebour=="1"){
								  var costbg = parseFloat($('#costbglebour'+codecostcodeint+'').val().replace(/,/g,""));
								  $('#totalcost').val(costbg-xpd1);
								  //alert(totalcost);
								  var totalcost = parseFloat($('#totalcost').val().replace(/,/g,""));
								  var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
								  if (parseFloat(totalcost) < parseFloat("0")) {
								  swal({
								  title: "Over budjet",
								  text: "",
								  confirmButtonColor: "#EA1923",
								  type: "error"
								  });
								  $("#pprice_unit").val('0');
								  $("#pdisamt").val('0');
								  $("#pamount").val('0');
								  $("#totalcost").val(costbglebour);
								  $("#to_vats").val('0');
								  $("#pnetamt").val('0');
								  }
								}

								  }else if(type_cost==3){
								  var controlsub = $('#controlsub'+codecostcodeint+'').val();
								        if(controlsub=="1"){
								  var costbg = parseFloat($('#costbgsub'+codecostcodeint+'').val().replace(/,/g,""));
								  $('#totalcost').val(costbg-xpd1);
								  //alert(totalcost);
								  var totalcost = parseFloat($('#totalcost').val().replace(/,/g,""));
								  var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
								  if (parseFloat(totalcost) < parseFloat("0")) {
								  swal({
								  title: "Over budjet",
								  text: "",
								  confirmButtonColor: "#EA1923",
								  type: "error"
								  });
								  $("#pprice_unit").val('0');
								  $("#pdisamt").val('0');
								  $("#pamount").val('0');
								  $("#totalcost").val(costcodecc);
								  $("#to_vats").val('0');
								  $("#pnetamt").val('0');
								  }
								}

								  }   //if parseFloa
								  }// if ckkcontrolbg
							});
						</script>
<script type="text/javascript">
	$('#po_purchase').attr('class', 'active');
	$('#archive_po').attr('style', 'background-color:#dedbd8');

	$("#s3").click(function() {
		var _count = ($("#body tr").length - 1);

            var s2 = parseFloat($('#s2').val());

            console.log(s2);
            for (var i = 1; i <= _count; i++) {
                console.log(_count);
                var sum = 0;
                // var amounti = $("#gg > tbody > tr > td#samount"+row+" > input#amounti"+row+"").val();
                var zum2 = parseFloat($('#zum2' + i).val());
                var amounti = parseFloat($('#amounti' + i).val());
                var summaryamt = parseFloat($('#summaryamt').val());
                // var s2 = parseFloat($('#s2').val());
                var zumtotal = ((amounti / summaryamt * s2));
                // console.log(aaaaaa);
                // alert("amounti ="+amounti+" summaryamt ="+summaryamt+" s2 ="+s2+"  zumtotal ="+zumtotal);
                var zum1 = parseFloat($('#zum1' + i).val());
                var qtyi = parseFloat($('#qtyi' + i).val());
                var vatper = parseFloat($('#vatper').val());
                $("#disci1" + i).val("0");
                $("#disci2" + i).val("0");
                $("#disci3" + i).val("0");
                $("#disci4" + i).val("0");

                $("#disall" + i).val("0");
                console.log(s2/_count);
                $("#zum1" + i).val(s2.toFixed(2)/ _count);
                // $("#zum1" + i).val(zumtotal.toFixed(2)/ i);
                var total_s2 = s2/_count;
				console.log(parseFloat($('#amounti' + i).val()));
                console.log(amounti-total_s2);
                $("#zum2" + i).val(amounti - total_s2.toFixed(2));
                // $("#zum2" + i).val(amounti - zumtotal.toFixed(2));
                $("#zum3" + i).val((((amounti - total_s2) * vatper) / 100).toFixed(2));
                // $("#zum3" + i).val((((amounti - zumtotal) * vatper) / 100).toFixed(2));
                $("#zum4" + i).val(((((amounti - total_s2) * vatper) / 100) + amounti - total_s2).toFixed(2));
                // $("#zum4" + i).val(((((amounti - zumtotal) * vatper) / 100) + amounti - zumtotal).toFixed(2));
                $("#zum5" + i).val(((amounti - total_s2) / qtyi).toFixed(2));
                // $("#zum5" + i).val(((amounti - zumtotal) / qtyi).toFixed(2));

                // $("#summaryd1").val("0");
                // $("#summaryd2").val("0");
                // $("#summaryd3").val("0");
                // $("#summaryd4").val("0");
                $("#pdiscex" + i).val(zumtotal.toFixed(2));
                $("#pdisamt" + i).val(amounti - zumtotal.toFixed(2));
                $("#to_vat" + i).val((((amounti - zumtotal) * vatper) / 100).toFixed(2));
                $("#pnetamt" + i).val(((((amounti - zumtotal) * vatper) / 100) + amounti - zumtotal).toFixed(2));


                var sum = 0;
                $(".txt").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summaryunit").val(sum.toFixed(2));
                var sum1 = 0;
                $(".txt1").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum1 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summaryamt").val(sum1.toFixed(2));
                var sum2 = 0;
                $(".txt2").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum2 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summarydis").val(sum2.toFixed(2));
                var sum3 = 0;
                $(".txt3").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum3 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summarydi").val(sum3.toFixed(2));
                var sum4 = 0;
                $(".txt4").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum4 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summaryvat").val(sum4.toFixed(2));
                var sum5 = 0;
                $(".txt5").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum5 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summarytot").val(sum5.toFixed(2));
            }
	});
	// $(document).ready(function(){
		$("#system").prop("readonly", true);
	// });
</script>