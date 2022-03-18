<?php $flag = $this->uri->segment(4); ?>
<?php $dname = $this->uri->segment(3); ?>
<!-- Main content -->
<?php if ($flag == 'd') {
    $this->db->select('department_id,department_title');
    $this->db->where('department_id', $dname);
    $q = $this->db->get('department');
    $res = $q->result(); ?>
<?php foreach ($res as $key => $value) {
    $depidd = $value->department_id;
    $dpname = $value->department_title;
    $pjname = "";
    $projectida = "";
} ?>
<?php 
} ?>
<?php if ($flag == 'p') {
    $this->db->select('project_id,project_name');
    $this->db->where('project_id', $dname);
    $q = $this->db->get('project');
    $res = $q->result(); ?>
<?php foreach ($res as $key => $value) {
    $depidd = "";
    $projectida = $value->project_id;
    $dpname = "";
    $pjname = $value->project_name;;
} ?>
<?php 
} ?>
<?php
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id', $projectida);
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
<div class="content-wrapper">
    <form id="contactForm1" action="<?php echo base_url(); ?>purchase_active/addnew/<?php echo $bd_tenid; ?>/<?php echo $flag; ?>" method="post" enctype="multipart/form-data">
        <!-- Page header -->
        <div class="page-header">

            <!-- Content area -->

            <div class="content">
                <div class="row">
                    <div class="panel panel-flat border-top-lg border-top-success">
                        <div class="panel-heading ">
                            <h5 class="panel-title">Purchase Order System &nbsp;
                                <?php if ($chkconbqq == "1") {
                                    echo '<a class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</a>';
                                } else {
                                    echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</a>';
                                } ?>&nbsp;
                                <?php if ($controlbg == "2") {
                                    echo '<a class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</a>';
                                } else {
                                    echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</a>';
                                } ?>

                                <input type="hidden" id="ckkcontrolbg" value="<?php echo $controlbg; ?>">
                            </h5>
                            <?php 
                                $this->db->select('multicomp,costlevel,close_btn_pr_to_po');
                                $this->db->where('sys_code',$compcode);
                                $chkbtnpr = $this->db->get('syscode')->result_array();
                                if ($chkbtnpr[0]['close_btn_pr_to_po'] != "Y") { ?>
                            
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a class="openpr btn btn-info btn-sm" data-toggle="modal" id="sss"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select PR</a></li>
                                </ul>
                            </div>
                            <?php }?>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#PO1" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i>
                                        Purchase Order</a></li>
                                <li><a href="#PO2" data-toggle="tab"><i class="icon-attachment"></i>Attachment File</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="PO1">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="display-block text-semibold" data-i18n="nav.posystem.pono" data-i18n-target="span"><span>เลขที่ใบสั่งซื้อ</span></label>
                                                <input type="text" name="pono" id="pono" class="ppono form-control"
                                                    placeholder="PO No." readonly="true" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="display-block text-semibold">ผู้ขอสั่งซื้อ</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control" readonly value="<?php echo $name; ?>"
                                                        name="memname" id="memname">
                                                    <input type="hidden" name="memid" id="memid">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="openemp btn btn-default btn-icon"
                                                            data-toggle="modal" data-target="#open"><i class="icon-search4"></i></button>
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
                                                    <input type="text" class="form-control daterange-single" id="pcdate"
                                                        name="pcdate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="prno">เลขที่ใบขอสั่งซื้อ</label>
                                                <input type="text" name="prno" id="prno" placeholder="กรอกเลขที่ใบขอซื้อ"
                                                    class="form-control" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="prno">เลขที่หนังสือสังจ้าง</label>
                                                <input type="text" name="wono" id="wono" placeholder="กรอกเลขที่ใบขอซื้อ"
                                                    class="form-control" readonly="">
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
                                                    <?php if ($flag == 'p') { ?>
                                                    <input type="text" class="form-control" readonly="readonly"
                                                        placeholder="Project" value="<?php echo $pjname; ?>" name="projectname"
                                                        id="projectname">

                                                    <input type="hidden" readonly="true" value="<?php echo $projectida; ?>"
                                                        class="pproject1 form-control" name="projectid" id="putprojectid">
                                                    <input type="hidden" readonly="true" value="<?php echo $project_code; ?>"
                                                        class="form-control" name="putprojectcode" id="putprojectcode">
                                                    <?php 
                                                } ?>

                                                    <?php if ($flag == 'd') { ?>
                                                    <input type="text" class="form-control" readonly="readonly"
                                                        placeholder="Project" value="" name="projectname" id="projectname">
                                                    <input type="hidden" readonly="true" value="" class="pproject1 form-control"
                                                        name="projectid" id="putprojectid">
                                                    <input type="hidden" readonly="true" value="" class="form-control"
                                                        name="putprojectcode" id="putprojectcode">
                                                    <?php 
                                                } ?>
                                                    <!-- <div class="input-group-btn">
																						<button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
														</div> -->
                                                    <?php if ($flag == 'p') { ?>
                                                    <input type="hidden" readonly="true" value="<?php echo $projectida; ?>"
                                                        class="pproject1 form-control" name="projectid" id="putprojectid">
                                                    <input type="hidden" class="form-control" name="c_po" id="c_po"
                                                        value="<?php if ($c_po == 0) {
                                                                    echo "
                                                        approve";
                                                                } else {
                                                                    echo "wait";
                                                                } ?>">
                                                    <input type="hidden" class="form-control" name="a_po" id="a_po"
                                                        value="<?php echo $a_po; ?>">
                                                    <?php 
                                                } ?>
                                                    <?php if ($flag == 'd') { ?>
                                                    <input type="hidden" readonly="true" value="" class="pproject1 form-control"
                                                        name="projectid" id="putprojectid">
                                                    <input type="hidden" class="form-control" name="c_po" id="c_po"
                                                        value="">
                                                    <input type="hidden" class="form-control" name="a_po" id="a_po"
                                                        value="">
                                                    <?php 
                                                } ?>
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
                                                    <input type="text" class="form-control" readonly="readonly"
                                                        placeholder="Department" value="<?php echo $dpname; ?>" name="depname"
                                                        id="depname">
                                                    <input type="hidden" readonly="true" value="<?php echo $depidd; ?>"
                                                        class="form-control" name="depid" id="depid">
                                                    <div class="input-group-btn">
                                                        <!-- <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="code">ระบบ</label>
                                                    <div id="sstem">
                                                        <select class="form-control" id="system">
                                                            <option value=""></option>
                                                            <?php if ($flag == 'd') { ?>

                                                            <option value="1">OVERHEAD</option>
                                                            <?php 
                                                        } ?>

                                                            <?php foreach ($system_array as $key => $system) { ?>
                                                            <option value="<?= $system["value"] ?>">
                                                                <?= $system["name"]; ?>
                                                            </option>
                                                            <?php 
                                                        } ?>
                                                        </select>
                                                        <input type="hidden" name="system" id="tem" value="">
                                                    </div>
                                                    <script>
                                                        $('#system').change(function(){
														var system = $('#system').val();
														$('#tem').val(system);
														$('#system').attr("disabled", true);
														});
													</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="display-block text-semibold">ร้านค้า:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-icon" type="button"><i
                                                                    class="icon-user"></i></button>
                                                        </span>
                                                        <input type="text" class="form-control" name="vender" id="vender"
                                                            readonly>
                                                        <input type="hidden" name="venderid" id="venderid">
                                                        <div class="input-group-btn">
                                                            <a class="ven btn btn-default btn-icon" data-toggle="modal"
                                                                data-target="#openvender"><i class="icon-search4"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label>ภาษี:</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control text-center" id="vatper"
                                                        name="vatper" placeholder="7%" value="7">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                            <script>
                                                $('#vatper').keyup(function(){
													var vatper = $('#vatper').val();
													if(vatper==""){
														$('#vatper').val(0);
													}
												});
											</script>
                                            <div class="col-md-2">
                                                <label>ส่วนลดพิเศษคิดแบบ :</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="s1" name="s1">
                                                        <option value="1">Some items</option>
                                                        <option value="2">Average of all items</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>จำนวนเงิน :</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-right" id="s2" name="s2"
                                                        readonly="">
                                                    <a type="button" id="s3" class="btn btn-info btn-sm input-group-addon">Calculate</a>
                                                </div>
                                            </div>
                                            <script>
                                                $("#s1").click(function(){
													var s1 = parseFloat($("#s1").val());
													if(s1=="1"){
														$("#s2").prop( "readonly", true );
													}else if(s1=="0"){
														$("#s2").prop( "readonly", true );
													}else if(s1=="2"){
														$("#s2").prop( "readonly", false  );
													}
												});
											</script>

                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="team">เงื่อนไขชำระ</label>
                                                    <input type="number" name="team" placeholder="กรอกเงื่อนไขการชำระ" id="team" class="form-control">
                                                    <!--      <input type="hidden" required="" name="po_vat"  id="po_vat" class="form-control"> -->
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label for="contact">เบอร์ติดต่อ</label>
                                                    <input type="text" name="contact" placeholder="กรอกเบอร์โทรศํพท์"
                                                        id="tel" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="team">เงื่อนไขอื่นๆ</label>
                                                    <input type="text" name="teamother" placeholder="กรอกเงื่อนไขการชำระ" id="teamother" class="form-control">
                                                    <!--      <input type="hidden" required="" name="po_vat"  id="po_vat" class="form-control"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label for="contact">จ่ายล่วงหน้า</label>
                                                <div class="input-group">

                                                    <input type="number" name="downper" class="form-control text-right"
                                                        value="0" id="downper">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="contact">&nbsp;</label>
                                                    <input type="number" name="down" id="down" class="form-control text-right"
                                                        value="0" readonly="">
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
													
														var summarydi = $('#summarydi').val();
														var downper = $('#downper').val();
														var sumdown = (summarydi*downper)/100;
														$('#down').val(sumdown);
													
												}
												});
											</script>

                                            <div class="col-md-1">
                                                <label for="contact">เงินประกัน</label>
                                                <div class="input-group">

                                                    <input type="number" name="retentionper" id="retentionper" class="form-control text-right"
                                                        value="0">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="contact">&nbsp;</label>
                                                    <input type="number" name="retention" id="retention" class="form-control text-right"
                                                        value="0" readonly="">
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
													
														var summarydi = $('#summarydi').val();
														var retentionper = $('#retentionper').val();
														var sumretention = (summarydi*retentionper)/100;
														$('#retention').val(sumretention);
													
												}
												});
											</script>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="contactno">เลขที่สัญญา</label>
                                                    <input type="text" name="contactno" id="contactno" placeholder="กรอกเลขที่สัญญา"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="quono">ใบเสนอราคา</label>
                                                    <input type="text" name="quono" id="quono" placeholder="กรอกเลขที่เสนอราคา"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="deliverydate">วันที่ส่งมอบ</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                    <input type="date" name="deliverydate" class="form-control" id="deliverydate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">สถานที่ส่งของ</label>
                                                    <textarea name="place" class="form-control" rows="4" cols="40"><?php echo $pjname; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">หมายเหตุ</label>
                                                    <textarea name="remark" id="remark" class="form-control" rows="4" cols="40"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">ผู้ติดต่อ</label>
                                                    <input name="contractstorename" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
                                                    <label for="">
                                                        <?php echo $bg->costcode; ?> (M) </label>
                                                    <input type="text" name="costbg" id="costbgmat<?php echo $bg->costcode; ?>"
                                                        class="form-control text-right" value="<?php echo (($costcost / 100) * $bg->controlper) - $matitalcost; ?>">
                                                    <input type="text" name="controlmat" id="controlmat<?php echo $bg->costcode; ?>"
                                                        class="form-control text-right" value="<?php echo number_format($bg->control); ?>">
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
                                                    <label for="">
                                                        <?php echo $bg2->costcode; ?> (L) </label>
                                                    <input type="text" name="costbg" id="costbglebour<?php echo $bg2->costcode; ?>"
                                                        class="form-control text-right" value="<?php echo (($costcost2 / 100) * $bg2->controlper) - $matitalcost2; ?>">
                                                    <input type="text" name="controllebour" id="controllebour<?php echo $bg2->costcode; ?>"
                                                        class="form-control text-right" value="<?php echo number_format($bg2->control); ?>">
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
                                                    <label for="">
                                                        <?php echo $bg3->costcode; ?> (S) </label>
                                                    <input type="text" name="costbg" id="costbgsub<?php echo $bg3->costcode; ?>"
                                                        class="form-control text-right" value="<?php echo (($costcost3 / 100) * $bg3->controlper) - $matitalcost3; ?>">
                                                    <input type="text" name="controlsub" id="controlsub<?php echo $bg3->costcode; ?>"
                                                        class="form-control text-right" value="<?php echo number_format($bg3->control); ?>">
                                                </div>
                                            </div>
                                            <?php 
                                        } ?>
                                        </div>
                                        <!--  -->
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered table-striped table-xxs" id="gg">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="text-center">Select</th>
                                                        <th>
                                                            <div style="width: 250px;">Material Code</div>
                                                        </th>
                                                        <th>
                                                            <div style="width: 250px;">Material</div>
                                                        </th>
                                                        <th>Cost Code</th>
                                                        <th>Qty</th>
                                                        <th>Unit</th>
                                                        <th>Price/Unit</th>
                                                        <th>Amount</th>
                                                        <th>Disc.(%)</th>
                                                        <th>Disc.Amt</th>
                                                        <th>Total Disc</th>
                                                        <th>Total Vat</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="top">

                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="7" class="text-center">Summary</td>

                                                        <!-- <td></td> -->
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summaryunit"
                                                                    name="summaryunit" value="0"></div>
                                                        </td>
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summaryamt"
                                                                    name="summaryamt" value="0"></div>
                                                        </td>
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summaryd1"
                                                                    name="summaryd1" value="0"></div>
                                                        </td>
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summarydis"
                                                                    name="summarydis" value="0"></div>
                                                        </td>
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summarydi"
                                                                    name="summarydi" value="0"></div>
                                                        </td>
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summaryvat"
                                                                    name="summaryvat" value="0"></div>
                                                        </td>
                                                        <td>
                                                            <div style="width: 100px;"><input type="text" readonly
                                                                    class="form-control input-sm text-right" id="summarytot"
                                                                    name="summarytot" value="0"></div>
                                                        </td>
                                                        <td></td>
                                                        <!-- <td><label id="summarytot"></label></td> -->

                                                    </tr>
                                                </tbody>
                                                <?php if ($flag == 'p') {
                                                    $this->db->select('*');
                                                    $this->db->from('approve');
                                                    $this->db->where('approve_project', $project_code);
                                                    $this->db->where('type', "PO");
                                                    $app_pj = $this->db->get()->result();
                                                    foreach ($app_pj as $app) {
                                                        ?>
                                                <tbody>
                                                    <tr hidden>
                                                        <td><input type="text" name="approve_sequence[]" value="<?php echo $app->approve_sequence; ?>"></td>
                                                        <td><input type="text" name="approve_mid[]" value="<?php echo $app->approve_mid; ?>"></td>
                                                        <td><input type="text" name="approve_mname[]" value="<?php echo $app->approve_mname; ?>"></td>
                                                        <td><input type="text" name="approve_lock[]" value="<?php echo $app->approve_lock; ?>"></td>
                                                        <td><input type="text" name="approve_cost[]" value="<?php echo $app->approve_cost; ?>"></td>
                                                    </tr>
                                                </tbody>
                                                <?php 
                                            } ?>
                                                <?php 
                                            } ?>
                                            </table>
                                        </div>
                                        <!--  -->
                                    </div>
                                    <br />
                                </div>

                                <div class="tab-pane" id="PO2">
                                    <div class="form-group">
                                        <label class="control-label input-xs" style="text-align: right;">Attachment
                                            File <span class="text-danger">*</span></label>
                                        <div class="col-lg-3">
                                            <input type="file" name="userfile" class="file-styled" accept=".jpg,.jpeg,.png,.pdf"
                                                required="required">
                                            <span class="text-danger">Only file .jpg , .jpeg , .png , .pdf <p>Maximum
                                                    2MB</p></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
									<div class="form-group">
										<button type="button" class="btn btn-info btn-xs" id="s"><i class="glyphicon glyphicon-plus"></i>Add</button>
									</div>
								</div> -->
                                    <!-- <table class="table table-hover table-bordered table-striped table-xxs" >
										<thead>
											<tr>
											<td>No.</td>
											<td>File</td>
											<td></td>
											</tr>
										</thead>
										<tbody id="img">
											
										</tbody>
									</table> -->
                                    <br>
                                </div>
                            </div>
                            <div class="text-right">
                                <a id="refesh" class="btn btn-default btn-xs"><i class="icon-plus22"></i> New</a>
                                <a data-toggle="modal" id="inst" class="btn btn-default btn-xs"><i class="icon-stackoverflow"></i>
                                    ADD Rows</a>
                                <button type="button" id="savee" class="save btn bg-success btn-xs" /><i class="icon-floppy-disk position-left"></i>Save</button>
                                <a href="<?php echo base_url(); ?>purchase/opencreatepo" class="btn btn-default btn-xs"><i
                                        class="icon-close2 position-left"></i> Close</a>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </form>
</div>
<script type="text/javascript">
    $("#refesh").click(function() {
        location.reload();
    });
</script>
<script>
    $("#s").click(function(){
								abc();
								});
								function abc()
								{
								var row = ($('#img tr').length)-0+1;
								var tr = '<tr id="'+row+'">'+
										'<td class="text-center">'+row+'</td>'+
										'<td><input type="file" name="userfile" class="form-control"></td>'+
										'<td class="text-center">'+
												'<a id="close'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>'+
										'</td>'+
								'</tr>';
								
								$('#img').append(tr);

									$(document).on('click', 'a#close'+row+'', function () { // <-- changes
								var self = $(this);
								noty({
								width: 200,
								text: "Do you want to Delete?",
								type: self.data('type'),
								dismissQueue: true,
								timeout: 1000,
								layout: self.data('layout'),
								buttons: (self.data('type') != 'confirm') ? false : [
								{
								addClass: 'btn btn-primary btn-xs',
								text: 'Ok',
								onClick: function ($noty) { //this = button element, $noty = $noty element
								$noty.close();
								self.closest('tr').remove();
								noty({
								force: true,
								text: 'Deleteted',
								type: 'success',
								layout: self.data('layout'),
								timeout: 1000,
								});
								}
								},
								{
								addClass: 'btn btn-danger btn-xs',
								text: 'Cancel',
								onClick: function ($save) {
								$save.close();
								save({
								force: true,
								text: 'You clicked "Cancel" button',
								type: 'error',
								layout: self.data('layout'),
								timeout: 1000,
								});
								}
								}
								]
								});
								return false;
								});
								}


							
								</script>
<!-- /Content area -->

<div class="rowmat"></div>
<div class="cost"></div>
<div id="insertrow" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Insert PO Detail</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="">Materail Name</label>
                        <div class="form-group" id="error">
                            <div class="input-group" id="error">
                                <!--  <span class="input-group-addon">
															<input type="checkbox" id="chk" aria-label="กำหนดเอง">
							</span> -->
                                <input type="text" id="newmatname" placeholder="Materail Name" class="form-control"
                                    disabled>
                                <input type="text" id="newmatcode" placeholder="Material Code" class="form-control"
                                    disabled>
                                <span class="input-group-btn">
                                    <a class="openund btn btn-info " data-toggle="modal" data-target="#opnewmattt"><span
                                            class="glyphicon glyphicon-search"></span></a>
                                    <a class="openun btn btn-info btn-block" data-toggle="modal" data-target="#opnewmat"><span
                                            class="glyphicon glyphicon-search"></span></a>

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label for="">Cost Name</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="costnameint" readonly="true" placeholder="Cost Name" class="form-control">
                            <input type="text" id="codecostcodeint" readonly="true" placeholder="Cost Code" class="form-control">
                            <input type="hidden" id="type" readonly="true" placeholder="Cost Code" class="form-control">

                            <span class="input-group-btn">
                                <?php if ($controlbg == "2") {
                                    echo '<button class="btn btn-info" id="selectcostcodeboq" data-toggle="modal" data-target="#boq"><span class="glyphicon glyphicon-search"></span></button>';
                                } else {
                                    echo '<button class="modalcost btn btn-info" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span></button>';
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qty">Detail Of Materail</label>
                            <input type="text" id="remark_mat" name="remark_mat" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3" id="type_costhide">
                        <div class="form-group">
                            <label>Type of Cost</label>
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
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div id="closebg">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group" id="errorcost">
                                <label for="qty">QTY</label>
                                <input type="number" id="pqty" name="qty" placeholder="กรอกปริมาณ" class="form-control"
                                    value="1" onkeyup="intOnly($(this),1)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <label for="unit">Unit</label>
                                <input type="text" id="unit" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control">
                                <span class="input-group-btn">
                                    <a class="openun btn btn-info btn-sm" data-toggle="modal" id="modalunit"
                                        data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="qty">Convert IC</label>
                                <input type="number" id="cpqtyic" name="cqtyic" placeholder="กรอกปริมาณ IC" class="form-control"
                                    value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="qty">QTY IC</label>
                                <input type="number" id="pqtyic" name="pqtyic" placeholder="กรอกปริมาณ IC" class="form-control"
                                    value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label for="unit">Unit IC</label>
                                <input type="text" id="punitic" name="punitic" readonly="true" placeholder="กรอกหน่วย"
                                    class="form-control" value="" readonly="">
                                <span class="input-group-btn">
                                    <a class="unitic btn btn-info btn-sm" data-toggle="modal" data-target="#openunitic"
                                        style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <script>
                        $("#pqty").keyup(function() {
					var xqty = ($("#pqty").val());
					var cpqtyic = ($("#cpqtyic").val());
					var xpq = xqty*cpqtyic;
					$("#pqtyic").val(xpq);
					});
				$("#cpqtyic").keyup(function() {
					var xqty = ($("#pqty").val());
					var cpqtyic = ($("#cpqtyic").val());
					var xpq = xqty*cpqtyic;
					$("#pqtyic").val(xpq);
					});
			</script>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_unit">Price/Unit</label>
                                <input type="number" id="pprice_unit" name="price_unit" placeholder="กรอกราคา/หน่วย"
                                    class="form-control border-danger border-lg text-right" value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน"
                                    class="form-control text-right" value="0">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 1 (%)</label>
                                <input type='number' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right"
                                    value="0" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 2 (%)</label>
                                <input type='number' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right"
                                    value="0" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 3 (%)</label>
                                <input type='number' id="pdiscper3" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right"
                                    value="0" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 4 (%)</label>
                                <input type='number' id="pdiscper4" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right"
                                    value="0" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="endtproject">Special Discount</label>
                                <input type='number' id="pdiscex" name="discountper2" class="form-control text-right"
                                    value="0" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="endtproject">Amount After Discount</label>
                                <input type='number' id="pdisamt" name="disamt" class="form-control text-right" value="0" />
                                <input type="hidden" id="pvat" value="0">
                            </div>
                        </div>

                    </div>
                    <div class="row" <?php if ($controlbg != "2") {
                                        echo "hidden";
                                    } ?>>

                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Budget Control</label>
                                <input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost"
                                    value="" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="endtproject">Vat</label>
                                <input type='number' id="to_vat" name="to_vat" class="form-control text-right" value="7" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="endtproject">Net Amount</label>
                                <input type='number' id="pnetamt" name="netamt" class="form-control text-right" value="0" />
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="endtproject">Remarks</label>
                                <input type='text' id="premark" name="remark" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="">Ref. Asset Code</label>
                            <div class="input-group">
                                <input type="hidden" id="accode" name="accode" readonly="true" class="form-control">
                                <input type="text" id="acname" name="acname" readonly="true" class="form-control">
                                <input type="hidden" id="statusass" name="statusass" readonly="true" class="form-control">
                                <input type="hidden" id="pri_id" name="priidi[]" value="PO">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass"><span
                                            class="glyphicon glyphicon-search"></span></button>
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

                    <div class="modal-footer">
                        <input type="hidden" name="poid" value="">
                        <a id="insertpodetail" class="btn btn-info">Insert</a>
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main content -->
<script>
    $('#closebg').hide();
	 $('#type_costhide').hide();
     $("#type_cost").change(function(){
      var type_cost = $("#type_cost").val();
      var codecostcodeint = $('#codecostcodeint').val();
      var ckkcontrolbg = $('#ckkcontrolbg').val();
      $('#pprice_unit').val("0");
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
        	var costbgsub=  $('#costbgsub'+codecostcodeint+'').val();
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
<!-- modal  โครงการ-->
<div class="modal fade" id="openproj" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
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
</div>
<!--end modal -->
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
</div>
<!--end modal -->
<!-- Full width modal -->
<div id="openpr" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">x</button>
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
<div id="loadprv" class="modal fade" data-backdrop="false">
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
		$("#modal_project").load('<?php echo base_url(); ?>share/project');
		});
		$(".opendepart").click(function(){
		$('#modal_department').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
		$("#modal_department").load('<?php echo base_url(); ?>share/department');
		});

		// $("#system").change(function(){
        //     var chkprv = parseFloat($("#chkprv").val());
        //     var system = $('#system').val();
        //     var dpnames = "<?php echo $dname; ?>";
        //     $('#loadpr').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        //     $("#loadpr").load("<?php echo base_url(); ?>purchase/load_pr2/"+ dpnames +'/<?php echo $flag; ?>/'+system+'/<?php echo $bd_tenid; ?>');
        //     });
        //     $(".ven").click(function(){
        //     $("#loadvender").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        //     $("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
		// });
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
		$("#modal_unitic").load('<?php echo base_url(); ?>share/unitid2');
		});
		</script>
<div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
</div>
<!--end modal -->
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
<div class="modal fade" id="boq" data-backdrop="false">
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
</div>
<!--end modal -->

<script>
    $("#modalunit").click(function() {
        $('#modal_unit').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_unit").load('<?php echo base_url(); ?>share/unit');
    });
    $(".insertnewmat").click(function() {
        $("#modal_newmat").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode_new');
    });
    $(".modalcost").click(function() {
        $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_cost").load('<?php echo base_url(); ?>share/costcode');
    });
</script>
<script>
    $("#cpqtyic").keydown(function() {
        $("#pqtyic").val($("#qty").val() * $("#cpqtyic").val());
    });
    // $("#pqty,#pprice_unit").number(true);
    // event cal
    $("#pqty ,#pprice_unit ,#pdiscper1 ,#pdiscper2 ,#pdiscper3 ,#pdiscper4 ,#pdiscex").keyup(function() {

        var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
        var ckkcontrolbg = $('#ckkcontrolbg').val();
        //alert(ckkcontrolbg);
        if (ckkcontrolbg == "2") {
            if (isNaN(totalcost)) {
                $("#closebg").hide();
                $('#type_costhide').hide();
                $("#type_cost").val("");
                $("#costnameint").val("");
                $("#codecostcodeint").val("");
                $("#pprice_unit").val("");

                swal({
                    title: "ไม่มีรายการ Budget",
                    text: "",
                    confirmButtonColor: "#EA1923",
                    type: "error"
                });
            }
        }
        var xqty = ($("#pqty").val());
        var xprice = ($("#pprice_unit").val());
        var xamount = xqty * xprice;
        var xdiscper1 = ($("#pdiscper1").val());
        var xdiscper2 = ($("#pdiscper2").val());
        var xdiscper3 = ($("#pdiscper3").val());
        var xdiscper4 = ($("#pdiscper4").val());
        var xdiscper5 = parseFloat($("#pdiscex").val());
        var xvatt = ($("#vatper").val());
        var xpd1 = xamount - (xamount * xdiscper1) / 100;
        var xpd2 = xpd1 - (xpd1 * xdiscper2) / 100;
        var xpd3 = xpd2 - (xpd2 * xdiscper3) / 100;
        var xpd4 = xpd3 - (xpd3 * xdiscper4) / 100;
        var xpd8 = ((xpd4 - xdiscper5) * xvatt) / 100;
        var total_di = xamount - xpd4;
        var xvat = ($("#vatper").val());
        var chkcontroll = $("#chkcontroll").val();
        var boq_id = $("#boq_id").val();
        $("#pamount").val((xamount));
        $("#too_di").val((total_di));
        $("#to_vat").val((xpd8));
        $("#tot_vat").val((xpd8));
        if (xdiscper5 != 0) {
            vxpd4 = xpd4 - xdiscper5;
            $("#pdisamt").val((vxpd4));
            $("#too_di").val((vxpd4));
            vxpd5 = (xpd4 - xdiscper5) + xpd8;
            $("#pnetamt").val((vxpd5));
        } else if (xdiscper2 != 0) {
            $("#pdisamt").val((xpd4));
            $("#too_di").val((xpd4));
            vxpd2 = xpd4 + xpd8;
            $("#pnetamt").val((vxpd2));
        } else if (xdiscper3 != 0) {
            $("#pdisamt").val((xpd4));
            $("#too_di").val((xpd4));
            vxpd3 = xpd4 + xpd8;
            $("#pnetamt").val((vxpd3));
        } else if (xdiscper4 != 0) {
            $("#pdisamt").val((xpd4));
            $("#too_di").val((xpd4));
            vxpd5 = xpd4 + xpd8;
            $("#pnetamt").val((vxpd5));
        } else {
            $("#pdisamt").val((xpd1));
            $("#too_di").val((xpd1));
            vxpd1 = xpd4 + xpd8;
            $("#pnetamt").val((vxpd1));
        }

        var ckkcontrolbg = $('#ckkcontrolbg').val();
        //alert(ckkcontrolbg);
        if (ckkcontrolbg == "2") {
            //alert(ckkcontrolbg);
            var type_cost = $("#type_cost").val();

            var codecostcodeint = $('#codecostcodeint').val();
            if (type_cost == 1) {
                var controlmat = $('#controlmat' + codecostcodeint + '').val();
                if (controlmat == "1") {
                    var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val().replace(/,/g, ""));
                    $('#totalcost').val(costbg - xpd1 + xdiscper5);
                    //alert(totalcost);
                    var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
                    var costcodecc = $('#costbgmat' + codecostcodeint + '').val();
                    if (parseFloat(totalcost) < parseFloat("0")) {
                        swal({
                            title: "รายการมากกว่าใน Budget.",
                            text: "",
                            confirmButtonColor: "#EA1923",
                            type: "error"
                        });
                        $("#pprice_unit").val('0');
                        $("#pdisamt").val('0');
                        $("#pamount").val('0');
                        $("#totalcost").val(costbg);
                        $("#to_vats").val('0');
                        $("#pnetamt").val('0');
                    }
                }
            } else if (type_cost == 2) {
                var controllebour = $('#controllebour' + codecostcodeint + '').val();
                if (controllebour == "1") {
                    var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val().replace(/,/g, ""));
                    $('#totalcost').val(costbg - xpd1 + xdiscper5);
                    //alert(totalcost);
                    var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
                    var costcodecc = $('#costbglebour' + codecostcodeint + '').val();
                    if (parseFloat(totalcost) < parseFloat("0")) {
                        swal({
                            title: "รายการมากกว่าใน Budget.",
                            text: "",
                            confirmButtonColor: "#EA1923",
                            type: "error"
                        });
                        $("#pprice_unit").val('0');
                        $("#pdisamt").val('0');
                        $("#pamount").val('0');
                        $("#totalcost").val(costbg);
                        $("#to_vats").val('0');
                        $("#pnetamt").val('0');
                    }
                }

            } else if (type_cost == 3) {
                var controlsub = $('#controlsub' + codecostcodeint + '').val();
                if (controlsub == "1") {
                    var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val().replace(/,/g, ""));
                    $('#totalcost').val(costbg - xpd1 + xdiscper5);
                    //alert(totalcost);
                    var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
                    var costcodecc = $('#costbgsub' + codecostcodeint + '').val();
                    if (parseFloat(totalcost) < parseFloat("0")) {
                        swal({
                            title: "รายการมากกว่าใน Budget.",
                            text: "",
                            confirmButtonColor: "#EA1923",
                            type: "error"
                        });
                        $("#pprice_unit").val('0');
                        $("#pdisamt").val('0');
                        $("#pamount").val('0');
                        $("#totalcost").val(costbg);
                        $("#to_vats").val('0');
                        $("#pnetamt").val('0');
                    }
                }

            } //if parseFloa
        } // if ckkcontrolbg
    });
    $("#insertpodetail").click(function() {
        if ($("#newmatcode").val() == "") {
            swal({
                title: "Please Chack!",
                text: "Material Code Not Found",
                confirmButtonColor: "#2196F3"
            });
            $("#error").attr("class", "input-group has-error has-feedback");
            $("#newmatname").focus();
        } else if ($("#codecostcodeint").val() == "") {
            swal({
                title: "Please Chack!",
                text: "Cost Code Not Found",
                confirmButtonColor: "#2196F3"
            });
            $("#errorcost").attr("class", "input-group has-error has-feedback");
            $("#costnameint").focus();
        } else if ($("#unit").val() == "") {
            swal({
                title: "Please Chack!",
                text: "Qty Not Found",
                confirmButtonColor: "#2196F3"
            });
            $("#errorcost").attr("class", "input-group has-error has-feedback");
            $("#unit").focus();
        } else if ($("#type_cost").val() == "") {
            swal({
                title: "Please Chack!",
                text: "Type Not Found",
                confirmButtonColor: "#2196F3"
            });
            $("#errorcost").attr("class", "input-group has-error has-feedback");
            $("#type_cost").focus();
        } else {
            var ckkcontrolbg = $('#ckkcontrolbg').val();
            //alert(ckkcontrolbg);
            if (ckkcontrolbg == "2") {
                var type_cost = $("#type_cost").val();
                if (type_cost == 1) {
                    var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
                    var costcode = $('#codecostcodeint').val();
                    var pamount = parseFloat($('#pamount').val().replace(/,/g, ""));
                    var costbgmat = parseFloat($('#costbgmat' + costcode + '').val().replace(/,/g, ""));
                    $("#costbgmat" + costcode + "").val(costbgmat - pamount);
                } else if (type_cost == 2) {
                    var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
                    var costcode = $('#codecostcodeint').val();
                    var pamount = parseFloat($('#pamount').val().replace(/,/g, ""));
                    var costbglebour = parseFloat($('#costbglebour' + costcode + '').val().replace(/,/g, ""));
                    $("#costbglebour" + costcode + "").val(costbglebour - pamount);
                } else if (type_cost == 3) {
                    var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
                    var costcode = $('#codecostcodeint').val();
                    var pamount = parseFloat($('#pamount').val().replace(/,/g, ""));
                    var costbglebour = parseFloat($('#costbgsub' + costcode + '').val().replace(/,/g, ""));
                    $("#costbgsub" + costcode + "").val(costbglebour - pamount);
                }
            }

            addrow_insert();

            $("#newmatname").val("");
            $("#newmatcode").val("");
            $("#costnameint").val("");
            $("#codecostcodeint").val("");
            $("#unit").val("");
            $('#totalcost').val("");
            $("#pqty").val("1");
            $('#type_cost').val("");
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
            $("#type_costhide").hide();
            $("#error").attr("class", "input-group");
            $("#errorcost").attr("class", "input-group");
            $("#insertrow .close").click()
        }


    });
    $('#chk').click(function(event) {
        if ($('#chk').prop('checked')) {
            $('#newmatname').prop('disabled', false);
        } else {
            $('#newmatname').prop('disabled', true);
        }
    });


    $("#s3").click(function() {
        if ($(".type_cost").val() == "") {
            swal({


                title: "Please select Type of Cost  !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"

            });
        } else {
            var _count = ($("#top tr").length - 0);

            var s2 = parseFloat($('#s2').val());

            console.log(s2);
            for (var i = 1; i <= _count; i++) {
                console.log(_count);
                var sum = 0;
                // var amounti = $("#gg > tbody > tr > td#samount"+row+" > input#amounti"+row+"").val();
                var zum2 = parseFloat($('#zum2' + i).val().replace(/,/g, ""));
                var amounti = parseFloat($('#amounti' + i).val().replace(/,/g, ""));
                var summaryamt = parseFloat($('#summaryamt').val().replace(/,/g, ""));
                // var s2 = parseFloat($('#s2').val());
                var zumtotal = ((amounti / summaryamt * s2));
                // console.log(aaaaaa);
                // alert("amounti ="+amounti+" summaryamt ="+summaryamt+" s2 ="+s2+"  zumtotal ="+zumtotal);
                var zum1 = parseFloat($('#zum1' + i).val().replace(/,/g, ""));
                var qtyi = parseFloat($('#qtyi' + i).val().replace(/,/g, ""));
                var vatper = parseFloat($('#vatper').val().replace(/,/g, ""));
                $("#disci1" + i).val("0");
                $("#disci2" + i).val("0");
                $("#disci3" + i).val("0");
                $("#disci4" + i).val("0");

                $("#disall" + i).val("0");
                console.log(s2/_count);
                $("#zum1" + i).val(s2.toFixed(2).replace(/,/g, "")/ _count);
                // $("#zum1" + i).val(zumtotal.toFixed(2).replace(/,/g, "")/ i);
                var total_s2 = s2/_count;
                console.log(amounti-total_s2);
                $("#zum2" + i).val(amounti - total_s2.toFixed(2).replace(/,/g, ""));
                // $("#zum2" + i).val(amounti - zumtotal.toFixed(2).replace(/,/g, ""));
                $("#zum3" + i).val((((amounti - total_s2) * vatper) / 100).toFixed(2).replace(/,/g, ""));
                // $("#zum3" + i).val((((amounti - zumtotal) * vatper) / 100).toFixed(2).replace(/,/g, ""));
                $("#zum4" + i).val(((((amounti - total_s2) * vatper) / 100) + amounti - total_s2).toFixed(2).replace(/,/g, ""));
                // $("#zum4" + i).val(((((amounti - zumtotal) * vatper) / 100) + amounti - zumtotal).toFixed(2).replace(/,/g, ""));
                $("#zum5" + i).val(((amounti - total_s2) / qtyi).toFixed(2).replace(/,/g, ""));
                // $("#zum5" + i).val(((amounti - zumtotal) / qtyi).toFixed(2).replace(/,/g, ""));

                // $("#summaryd1").val("0");
                // $("#summaryd2").val("0");
                // $("#summaryd3").val("0");
                // $("#summaryd4").val("0");
                $("#pdiscex" + i).val(zumtotal.toFixed(2).replace(/,/g, ""));
                $("#pdisamt" + i).val(amounti - zumtotal.toFixed(2).replace(/,/g, ""));
                $("#to_vat" + i).val((((amounti - zumtotal) * vatper) / 100).toFixed(2).replace(/,/g, ""));
                $("#pnetamt" + i).val(((((amounti - zumtotal) * vatper) / 100) + amounti - zumtotal).toFixed(2).replace(/,/g, ""));


                var sum = 0;
                $(".txt").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summaryunit").val(sum.toFixed(2).replace(/,/g, ""));
                var sum1 = 0;
                $(".txt1").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum1 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summaryamt").val(sum1.toFixed(2).replace(/,/g, ""));
                var sum2 = 0;
                $(".txt2").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum2 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summarydis").val(sum2.toFixed(2).replace(/,/g, ""));
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
                $("input#summaryvat").val(sum4.toFixed(2).replace(/,/g, ""));
                var sum5 = 0;
                $(".txt5").each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum5 += parseFloat(this.value);
                        $(this).css("background-color", "#FEFFB0");
                    } else if (this.value.length != 0) {
                        $(this).css("background-color", "red");
                    }
                });
                $("input#summarytot").val(sum5.toFixed(2).replace(/,/g, ""));
            }
        }

    });

    function addrow_insert() {

        var row = ($('#top tr').length - 0) + 1;
        var newmatname = $("#newmatname").val();
        var newmatcode = $("#newmatcode").val();
        var codecostcodeint = $("#codecostcodeint").val();
        var costnameint = $("#costnameint").val();
        var pqty = $("#pqty").val();
        var unit = $("#unit").val();
        var pprice_unit = parseFloat($("#pprice_unit").val());
        var pamount = parseFloat($("#pamount").val());
        var pdiscex = parseFloat($("#pdiscex").val());
        var pdisamt = parseFloat($("#pdisamt").val());
        var to_vat = parseFloat($("#to_vat").val());
        var pnetamt = parseFloat($("#pnetamt").val());
        var cpqtyic = $("#cpqtyic").val();
        var pqtyic = $("#pqtyic").val();
        var punitic = $("#punitic").val();
        var accode = $("#accode").val();
        var acname = $("#acname").val();
        var statusass = $("#statusass").val();
        var premark = $("#premark").val();
        var pdiscper1 = parseFloat($("#pdiscper1").val());
        var pdiscper2 = parseFloat($("#pdiscper2").val());
        var pdiscper3 = parseFloat($("#pdiscper3").val());
        var pdiscper4 = parseFloat($("#pdiscper4").val());
        var total = parseFloat(pdiscper1 + pdiscper2 + pdiscper3 + pdiscper4);
        var boq_id = $('#boq_id').val();
        var costcontrol = parseFloat($('#costcontrol').val());
        var cost = parseFloat($('#costbg' + boq_id + '').val());
        var tcost = parseFloat(cost - pdisamt);
        var chkcontroll = $('#chkcontroll').val();
        var pri_id = $('#pri_id').val();
        var type = $('#type').val();
        var reamrki = $('#premark').val();
        var refprno = $('#refprno').val();
        var remark_mat = $('#remark_mat').val();
        var type_cost = $('#type_cost').val();
        var datesend = $('#datesend').val();

        if (type_cost == 1) {
            var typename = "MATERIAL";
        } else if (type_cost == 2) {
            var typename = "LABOR";
        } else if (type_cost == 3) {
            var typename = "SUB CON";
        }
        $('#costbg' + boq_id + '').val(costcontrol);
        $('#eve').hide();
        var ckkcontrolbg = $('#ckkcontrolbg').val();
        if (ckkcontrolbg == "2") {
            var chk = 'hidden';
            var chk1 = '';
        } else {
            var chk = '';
            var chk1 = 'hidden';
        }

        var summaryunit = parseFloat($('#summaryunit').val());
        var summaryamt = parseFloat($('#summaryamt').val());
        var summaryd1 = parseFloat($('#summaryd1').val());
        var summarydis = parseFloat($('#summarydis').val());
        var summarydi = parseFloat($('#summarydi').val());
        var summaryvat = parseFloat($('#summaryvat').val());
        var summarytot = parseFloat($('#summarytot').val());


        $('#summaryunit').val(summaryunit + pprice_unit);
        $('#summaryamt').val(summaryamt + pamount);
        $('#summaryd1').val(summaryd1 + total);
        $('#summarydis').val(summarydis + pdiscex);
        $('#summarydi').val(summarydi + pdisamt);
        $('#summaryvat').val(summaryvat + to_vat);
        $('#summarytot').val(summarytot + pnetamt);
        var tr = '<tr id="' + row + '">' +
            '<td>' + row + '</td>' +
            '<td>' + '<div class="checkbox checkbox-switchery switchery-xs switchery-double">' +
            '<label>' +
            '<input type="checkbox"  id="a' + row + '"  class="switchery" checked="checked">' +
            '<input type="hidden" name="chki[]" id="chki' + row + '" value="Y">' +
            '<input type="hidden" name="chkbgadd[]" id="chkbgadd' + row + '" value="0">' +
            '</label>' +
            '</div>' +
            '</td>' +
            '<td class="text-right" id="smatcode' + row + '"><input type="hidden" name="matcodei[]" value="' +
            newmatcode +
            '"><div class="input-group"><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="' +
            newmatcode + '"><span class="input-group-btn"><a data-toggle="modal" data-target="#edit' + row +
            '" data-popup="tooltip" title="Edit" id="editfa' + row + '"  id="bgbd' + row +
            '" class="btn btn-default btn-icon"><i class="icon-search4"></i></a><a class="btn btn-default btn-icon" id="removee' +
            row +
            '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></span></div></td>' +
            '<td class="text-right" id="smatname' + row + '">' + newmatname +
            '<input type="hidden" name="matnamei[]" value="' + $("#newmatname").val() + '"></td>' +

            '<td class="text-right" id="scostcode' + row + '">' + codecostcodeint +
            '<input type="hidden" name="costcodei[]" id="costcode' + row + '" value="' + codecostcodeint +
            '"><input type="hidden" name="costnamei[]" value="' + costnameint + '"></td>' +
            '<td class="text-right" id="sqtyi' + row + '">' + pqty + '<input type="hidden" name="qtyi[]" value="' +
            pqty + '"></td>' +
            '<td class="text-right" id="sunit' + row + '">' + unit + '<input type="hidden" name="uniti[]" value="' +
            unit + '"></td>' +
            '<td class="text-right" id="spriceunit' + row + '">' + pprice_unit +
            '<input type="hidden" name="priceuniti[]" value="' + pprice_unit + '"></td>' +
            '<td class="text-right" id="samount' + row + '">' + pamount +
            '<input type="hidden" name="amounti[]" value="' + pamount + '"></td>' +
            '<td class="text-right" id="sdisone' + row + '">' + total + '<input type="hidden" name="disci1[]" value="' +
            pdiscper1 + '"></td>' +
            '<td hidden>' + pdiscper2 + '<input type="hidden" name="disci2[]" value="' + pdiscper2 + '"></td>' +
            '<td hidden>' + pdiscper3 + '<input type="hidden" name="disci3[]" value="' + pdiscper3 + '"></td>' +
            '<td hidden>' + pdiscper4 + '<input type="hidden" name="disci4[]" value="' + pdiscper4 + '"></td>' +
            '<td class="text-right" id="sdisamt' + row + '">' + pdiscex +
            '<input type="hidden" name="disamti[]" value="' + pdiscex + '"></td>' +
            '<td class="text-right" 	id="tto_di' + row + '">' + pdisamt + '<input type="hidden" id="too_dii' + row +
            '" name="too_di[]" value="' + pdisamt.toFixed(2) + '"></td>' +
            '<td class="text-right" id="total_vat' + row + '">' + to_vat +
            '<input type="hidden" name="to_vat[]" value="' + to_vat + '"></td>' +
            '<td class="text-right" id="snetamt' + row + '">' + pnetamt +
            '<input type="hidden" name="netamti[]" value="' + pnetamt +
            '"><input type="hidden"  name="chkhidden[]" value=""><input type="hidden" name="accode[]" value="' + accode +
            '"><input type="hidden" name="acname[]" value="' + acname +
            '"><input type="hidden" name="statusass[]" value="' + statusass +
            '"><input type="hidden" name="premark[]" value="' + premark +
            '"><input type="hidden" name="remark_mat[]" value="' + remark_mat + '"><input type="hidden" id="typerow' +
            row + '"  name="type_cost[]" value="' + type_cost + '"><input type="hidden" id="datesend' + row +
            '"  name="datesend[]" value="' + datesend + '"></td>' +
            '<td style="color:#BEBEBE;" >' + row + '<input type="hidden" name="type[]" value="' + type +
            '"><input type="hidden"  name="priidi[]" value="' + pri_id +
            '"><input type="hidden"  name="cqtyic[]" value="' + cpqtyic +
            '"><input type="hidden"  name="pqtyic[]" value="' + pqtyic +
            '"><input type="hidden"  name="punitic[]" value="' + punitic +
            '"><input type="hidden"  name="pqtyic[]" value="' + pqtyic +
            '"><input type="hidden"  name="reamrki[]" value="' + reamrki +
            '"><input type="hidden"  name="refprno[]" value="NO"><input type="hidden" name="pri_woref[]"" value="NO"></td>' +
            '</tr>';
        $('#top').append(tr);
        $('#editfa' + row + '').click(function(event) {
            var too = parseFloat($('#too_dii' + row + '').val());
            var summaryunit = parseFloat($('#summaryunit').val());
            var summaryamt = parseFloat($('#summaryamt').val());
            var summaryd1 = parseFloat($('#summaryd1').val());
            var summarydis = parseFloat($('#summarydis').val());
            var summarydi = parseFloat($('#summarydi').val());
            var summaryvat = parseFloat($('#summaryvat').val());
            var summarytot = parseFloat($('#summarytot').val());
            var cost = parseFloat($('#costbg' + boq_id + '').val());
            $('#costbg' + boq_id + '').val(cost + too);
            $('#summaryunit').val(summaryunit - pprice_unit);
            $('#summaryamt').val(summaryamt - pamount);
            $('#summaryd1').val(summaryd1 - total);
            $('#summarydis').val(summarydis - pdiscex);
            $('#summarydi').val(summarydi - pdisamt);
            $('#summaryvat').val(summaryvat - to_vat);
            $('#summarytot').val(summarytot - pnetamt);
            var type_cost = $("#typerow" + row + "").val();
            var costcodetype = $("#costcode" + row + "").val();
            var rowsum_di = parseFloat($("#too_dii" + row + "").val().replace(/,/g, ""));
            var ckkcontrolbg = $('#ckkcontrolbg').val();
            //alert(ckkcontrolbg);
            if (ckkcontrolbg == "2") {
                if (type_cost == 1) {
                    var costbg = parseFloat($('#costbgmat' + $("#costcode" + row + "").val() + '').val().replace(
                        /,/g, ""));
                    $('#costbgmat' + costcodetype + '').val(costbg + rowsum_di);
                    $('#totalcost' + row + '').val(costbg + rowsum_di);
                } else if (type_cost == 2) {
                    var costbg = parseFloat($('#costbglebour' + $("#costcode" + row + "").val() + '').val().replace(
                        /,/g, ""));
                    $('#costbglebour' + costcodetype + '').val(costbg + rowsum_di);
                    $('#totalcost' + row + '').val(costbg + rowsum_di);
                } else if (type_cost == 3) {
                    var costbg = parseFloat($('#costbgsub' + $("#costcode" + row + "").val() + '').val().replace(
                        /,/g, ""));
                    $('#costbgsub' + costcodetype + '').val(costbg + rowsum_di);
                    $('#totalcost' + row + '').val(costbg + rowsum_di);
                }
            }
        });

        $(document).on('click', 'a#removee' + row + '', function() { // <-- changes
            var self = $(this);
            noty({
                width: 200,
                text: "Do you want to Delete?",
                type: self.data('type'),
                dismissQueue: true,
                timeout: 1000,
                layout: self.data('layout'),
                buttons: (self.data('type') != 'confirm') ? false : [{
                        addClass: 'btn btn-primary btn-xs',
                        text: 'Ok',
                        onClick: function($noty) { //this = button element, $noty = $noty element
                            $noty.close();
                            self.closest('tr').remove();
                            noty({
                                force: true,
                                text: 'Deleteted',
                                type: 'success',
                                layout: self.data('layout'),
                                timeout: 1000,
                            });
                        }
                    },
                    {
                        addClass: 'btn btn-danger btn-xs',
                        text: 'Cancel',
                        onClick: function($noty) {
                            $noty.close();
                            noty({
                                force: true,
                                text: 'You clicked "Cancel" button',
                                type: 'error',
                                layout: self.data('layout'),
                                timeout: 1000,
                            });
                        }
                    }
                ]
            });
            return false;
        });
        var rowmat = '<div id="edit' + row + '" class="modal fade" data-backdrop="false">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">x</button>'+
            '<h5 class="modal-title">Edit' + newmatname + '</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row">' +
            '<div class="col-xs-6">' +
            '<label for="">รายการซื้อ</label>' +
            '<div class="form-group" id="error' + row + '">' +
            '<input type="text" id="newmatname' + row +
            '"  placeholder="เลือกรายการซื้อ" class="form-control " value="' + newmatname + '" readonly="">' +
            '<input type="text" id="newmatcode' + row +
            '"  placeholder="เลือกรายการซื้อ" class="form-control " value="' + newmatcode + '" disabled>' +
            '</div>' +
            '</div>' +
            '<div class="col-xs-6">' +
            '<label for="">รายการต้นทุน</label>' +
            '<div class="input-group">' +
            '<input type="text" id="costnameint' + row +
            '" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="' + costnameint + '">' +
            '<input type="text" id="codecostcodeint' + row +
            '" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="' + codecostcodeint + '">' +
            '<input type="hidden" id="chkhidden' + row +
            '" readonly="true" placeholder="" class="form-control " value="' + boq_id + '">' +
            '<input type="hidden" id="type' + row + '" readonly="true" placeholder="" class="form-control " value="' +
            type + '">' +
            '<span class="input-group-btn">' +
            '<button class="btn btn-primary ' + chk1 + '" id="selectcostcodeboqq' + row +
            '" data-toggle="modal" data-target="#boqq' + row +
            '"><span class="glyphicon glyphicon-search"></span></button>' +
            '<a class="costcodeii' + row + ' btn btn-primary ' + chk + '" data-toggle="modal" data-target="#costcodeii' +
            row + '"><span class="glyphicon glyphicon-search"></span></a>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label for="qty">รายละเอียดเพิ่มเติม</label>' +
            '<input type="text" id="remark_mat' + row + '" name="remark_mat" class="form-control" value="' +
            remark_mat + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3" id="type_costhide' + row + '">' +
            '<div class="form-group">' +
            '<label>Type of Cost</label>' +
            '<select id="type_cost' + row + '" class="form-control">' +
            '<option value="' + type_cost + '">' + typename + '</option>' +
            '<option value="1">MATERIAL</option>' +
            '<option value="2">LABOR</option>' +
            '<option value="3">SUB CON</option>' +
            '</select>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<hr>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div id="closebg' + row + '">' +
            '<div class="row">' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label for="qty">ปริมาณ</label>' +
            '<input type="number" id="pqty' + row +
            '" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="' + pqty + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-xs-3">' +
            '<div class="input-group">' +
            '<label for="unit">หน่วย</label>' +
            '<input type="text" id="punit' + row +
            '" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="' + unit +
            '">' +
            '<span class="input-group-btn" >' +
            '<a class="unit' + row + ' btn btn-primary" data-toggle="modal" data-target="#openunit' + row +
            '" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span></a>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="form-group">' +
            '<label for="qty">แปลงค่า IC</label>' +
            '<input type="number" id="cpqtyic' + row +
            '" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="' + cpqtyic + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="form-group">' +
            '<label for="qty">ปริมาณ IC</label>' +
            '<input type="number" id="pqtyic' + row +
            '" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="' + pqtyic + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="input-group">' +
            '<label for="unit">หน่วย IC</label>' +
            '<input type="text" id="punitic' + row +
            '" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="' +
            punitic + '">' +
            '<span class="input-group-btn" >' +
            '<a class="unitic' + row + ' btn btn-primary" data-toggle="modal" data-target="#openunitic' + row +
            '" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> </a>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            ' <div class="row">' +
            '<div class="col-md-6">' +
            ' <div class="form-group">' +
            '<label for="price_unit">ราคา/หน่วย</label>' +
            '<input type="number" id="pprice_unit' + row +
            '"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="' +
            pprice_unit + '">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            ' <div class="form-group">' +
            '<label for="amount">จำนวนเงิน</label>' +
            '<input type="number" id="pamount' + row +
            'name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="' +
            pamount + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            ' <label for="endtproject">ส่วนลด 1 (%)</label>' +
            '<input type="number" id="pdiscper1' + row +
            '" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper1 +
            '" />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label for="endtproject">ส่วนลด 2 (%)</label>' +
            ' <input type="number" id="pdiscper2' + row +
            '" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper2 +
            '" />' +
            '</div>' +
            '</div>' +
            ' <div class="col-md-3">' +
            '<div class="form-group">' +
            '<label for="endtproject">ส่วนลด 3 (%)</label>' +
            '<input type="number" id="pdiscper3' + row +
            '" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper3 +
            '" />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label for="endtproject">ส่วนลด 4 (%)</label>' +
            '<input type="number" id="pdiscper4' + row +
            '" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper4 +
            '" />' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            ' <div class="form-group">' +
            '<label for="endtproject">ส่วนลดพิเศษ</label>' +
            '<input type="number" id="pdiscex' + row + '" name="discountper2" class="form-control text-right" value="' +
            pdiscex + '"/>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<div class="form-group">' +
            '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>' +
            '<input type="number" id="pdisamt' + row + '" name="disamt" class="form-control text-right" value="' +
            pdisamt + '/>' +
            '<input type="hidden" name="too_di" id="too_di' + row + '" value="0">' +
            '<input type="hidden" name="tot_vat[]" id="tot_vat' + row + '" value="0">' +
            '</div>' +
            ' </div>' +
            ' </div>' +
            '<div class="row" ' + chk1 + ' id="removecost">' +
            '<div class="col-xs-3">' +
            '<div class="form-group">' +
            '<label>Budget Control</label>' +
            '<input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost' + row +
            '" value=""  readonly="">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-2">' +
            '<div class="form-group">' +
            '<label for="endtproject">vat</label>' +
            '<input type="number" id="to_vats' + row + '" name="to_vat" class="form-control text-right" value="' +
            to_vat + '" readonly="true"/>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<div class="form-group">' +
            '<label for="endtproject">จำนวนเงินสุทธิ</label>' +
            '<input type="number" id="pnetamt' + row + '" name="netamt" class="form-control text-right" value="' +
            pnetamt + '" readonly="true"/>' +
            '</div>' +
            ' </div>' +
            '<div class="col-md-8">' +
            '<div class="form-group">' +
            '<label for="endtproject">หมายเหตุ</label>' +
            '<input type="text" id="premark' + row + '" name="remark" class="form-control" value="' + premark + '"/>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            ' <input type="hidden" name="poid" value="">' +
            ' </div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-xs-6">' +
            ' <label for="">Ref. Asset Code</label>' +
            '<div class="input-group">' +
            '<input type="text" id="accode' + row + '" name="accode"  readonly="true"  class="form-control " value="' +
            accode + '">' +
            '<input type="text" id="acname' + row + '" name="acname" readonly="true"  class="form-control " value="' +
            acname + '">' +
            '<input type="hidden" id="statusass' + row +
            '" name="statusass" readonly="true"  class="form-control " value="' + statusass + '">' +
            '<input type="hidden" id="refprno' + row + '" name="refprno[]" value="">' +
            '<input type="hidden" id="pri_id' + row + '" name="priidi[]" value="' + pri_id + '">' +
            '<span class="input-group-btn" >' +
            '<a class="btn btn-info" id="refasset' + row + '" data-toggle="modal" data-target="#refass' + row +
            '"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '<div class="col-xs-6">' +
            '<div class="form-group">' +
            '<label for="datesend ">Delivery Date</label>' +
            ' <input type="date" class="form-control" id="datesend' + row + '" name="datesend[]" value="' + datesend +
            '" style="width: 200px">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="modal-footer">' +
            '<a id="insertpodetail' + row + '" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            ' </div>' +
            '</div>';
        $('.rowmat').append(rowmat);
        var cost = '<div class="modal fade" id="costcodeii' + row + '" data-backdrop="false">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_costii' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.cost').append(cost);
        $(".costcodeii" + row + "").click(function() {
            $('#modal_costii' + row + '').html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_costii" + row + "").load('<?php echo base_url(); ?>share/costcode_id/' + row);
        });
        var cost = '<div class="modal fade" id="openunit' + row + '" data-backdrop="false">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_unit' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.cost').append(cost);
        $(".unit" + row + "").click(function() {
            $('#modal_unit' + row + '').html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_unit" + row + "").load('<?php echo base_url(); ?>share/unitid/' + row);
        });
        var cost = '<div class="modal fade" id="openunitic' + row + '" data-backdrop="false">' +
            '<div class="modal-dialog">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_unitic' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.cost').append(cost);
        $(".unitic" + row + "").click(function() {
            $('#modal_unitic' + row + '').html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_unitic" + row + "").load('<?php echo base_url(); ?>share/unitid2/' + row);
        });
        var cost = '<div class="modal fade" id="refass' + row + '" data-backdrop="false">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>' +
            ' </div>' +
            '<div class="modal-body">' +
            '<div id="refasscode' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.cost').append(cost);
        $('#refasset' + row + '').click(function() {
            $('#refasscode' + row + '').html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#refasscode" + row + "").load('<?php echo base_url(); ?>share/modalshare_asset/' + row);
        });
        var cost = '<div class="modal fade" id="boqq' + row + '" data-backdrop="false">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">Cost Code</h4>' +
            ' </div>' +
            '<div class="modal-body">' +
            '<div id="modal_boqq' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.cost').append(cost);
        $('#selectcostcodeboqq' + row + '').click(function() {
            $('#closebg' + row + '').hide();
            $('#type_cost' + row + '').val("");
            $('#type_costhide' + row + '').hide();
            var system = $('#system').val();
            $('#modal_boqq' + row + '').html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_boqq" + row + "").load(
                '<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/' + system + '/' +
                row);
        });


        $("#insertpodetail" + row + "").click(function() {
            var xdiscper1 = parseFloat($('#pdiscper1' + row + '').val());
            var xdiscper2 = parseFloat($('#pdiscper2' + row + '').val());
            var xdiscper3 = parseFloat($('#pdiscper3' + row + '').val());
            var xdiscper4 = parseFloat($('#pdiscper4' + row + '').val());
            var sumxdic = xdiscper1 + xdiscper2 + xdiscper3 + xdiscper4;



            var summaryunit = parseFloat($('#summaryunit').val());
            var summaryamt = parseFloat($('#summaryamt').val());
            var summaryd1 = parseFloat($('#summaryd1').val());
            var summarydis = parseFloat($('#summarydis').val());
            var summarydi = parseFloat($('#summarydi').val());
            var summaryvat = parseFloat($('#summaryvat').val());
            var summarytot = parseFloat($('#summarytot').val());
            var pprice_unit = parseFloat($("#pprice_unit" + row + "").val());
            var pamount = parseFloat($("#pamount" + row + "").val());
            var total = parseFloat(sumxdic);
            var pdiscex = parseFloat($("#pdiscex" + row + "").val());
            var pdisamt = parseFloat($("#pdisamt" + row + "").val());
            var to_vat = parseFloat($("#to_vats" + row + "").val());
            var pnetamt = parseFloat($("#pnetamt" + row + "").val());

            $('#summaryunit').val(summaryunit + pprice_unit);
            $('#summaryamt').val(summaryamt + pamount);
            $('#summaryd1').val(summaryd1 + total);
            $('#summarydis').val(summarydis + pdiscex);
            $('#summarydi').val(summarydi + pdisamt);
            $('#summaryvat').val(summaryvat + to_vat);
            $('#summarytot').val(summarytot + pnetamt);

            var type_cost = $("#type_cost" + row + "").val();

            // $("#costbgmat"+costcode+"").val(totalcost);
            if (ckkcontrolbg == "2") {
                if (type_cost == 1) {
                    var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
                    var costcode = $('#codecostcodeint' + row + '').val();
                    var pamount = parseFloat($('#pamount' + row + '').val().replace(/,/g, ""));
                    var costbgmat = parseFloat($('#costbgmat' + costcode + '').val());
                    $("#costbgmat" + costcode + "").val(costbgmat - pamount);
                } else if (type_cost == 2) {
                    var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
                    var costcode = $('#codecostcodeint' + row + '').val();
                    var pamount = parseFloat($('#pamount' + row + '').val().replace(/,/g, ""));
                    var costbglebour = parseFloat($('#costbglebour' + costcode + '').val());
                    $("#costbglebour" + costcode + "").val(costbglebour - pamount);
                } else if (type_cost == 3) {
                    var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
                    var costcode = $('#codecostcodeint' + row + '').val();
                    var pamount = parseFloat($('#pamount' + row + '').val().replace(/,/g, ""));
                    var costbgsub = parseFloat($('#costbgsub' + costcode + '').val());
                    $("#costbgsub" + costcode + "").val(costbglebour - pamount);
                }
            }

            if ($("#newmatcode" + row + "").val() != "") {
                $("#smatcode" + row + "").html(
                    "<div class='input-group'><input type='text' class='form-control ' name='matcodei[]' id='matcodei' required  value=" +
                    $("#newmatcode" + row + "").val() +
                    "><span class='input-group-btn'><a data-toggle='modal' data-target='#edit" + row +
                    "' id='editcost" + row +
                    "' class='btn btn-default btn-icon'><i class='icon-search4'></i></a></span><input type='hidden' name='chkbgadd[]' id='chkbgadd' value='1'><input type='hidden' id='chkhidden' name='chkhidden[]' value='" +
                    $("#chkhidden" + row + "").val() + "'></div>");
                $("#matnametext" + row + "").val($('#newmatname' + row + '').val());
                $("#scostcode" + row + "").html('<a class="editable editable-clicks">' + $("#codecostcodeint" +
                        row + "").val() + '</a><input type="hidden" name="costcodei[]" value=' + $(
                        "#codecostcodeint" + row + "").val() +
                    '><input type="hidden" name="costnamei[]" value=' + $("#costnameint" + row + "").val() +
                    '><input type="hidden" name="costmatsub[]" value=' + $("#costmatsub" + row + "").val() +
                    '>');
                $("#scostname" + row + "").html('<a class="editable editable-clicks">' + $("#costnameint" + row +
                    "").val() + '</a>');
                $("#sqtyi" + row + "").html("<a class='editable editable-clicks'>" + $("#pqty" + row + "").val() +
                    "</a><input type='hidden' name='qtyi[]' id='qtyi" + row + "' value=" + $("#pqty" + row +
                        "").val() + "><input type='hidden' name='cqtyic[]' value=" + $("#cpqtyic" + row +
                        "").val() + "><input type='hidden' name='pqtyic[]' value=" + $("#pqtyic" + row + "")
                    .val() + ">");
                $("#spriceunit" + row + "").html("<input type='text' name='priceuniti[]' value=" + $(
                        "#pprice_unit" + row + "").val() +
                    "   class='txt form-control input-sm text-right' readonly><input type='hidden' name='punitic[]' value=" +
                    $("#punitic" + row + "").val() + ">");
                $("#sunit" + row + "").html("<a class='editable editable-clicks'>" + $("#punit" + row + "").val() +
                    "</a><input type='hidden' name='uniti[]' value=" + $("#punit" + row + "").val() + ">");
                $("#samount" + row + "").html(
                    "<input class='txt1 form-control input-sm text-right' type='text' id='amounti" + row +
                    "' name='amounti[]' value=" + $("#pamount" + row + "").val() + " readonly>");
                $("#sdisone" + row + "").html(
                    "<input class='form-control input-sm text-right' type='text'  value=" + sumxdic +
                    " readonly><input class='form-control input-sm' type='hidden' name='disci1[]' id='disci1" +
                    row + "' value=" + $("#pdiscper1" + row + "").val() +
                    " readonly><input class='form-control input-sm' type='hidden' name='disci2[]' id='disci2" +
                    row + "' value=" + $("#pdiscper2" + row + "").val() +
                    " readonly><input class='form-control input-sm' type='hidden' name='disci3[]' id='disci3" +
                    row + "' value=" + $("#pdiscper3" + row + "").val() +
                    " readonly><input  class='form-control input-sm' type='hidden' name='disci4[]' id='disci4" +
                    row + "' value=" + $("#pdiscper4" + row + "").val() + " readonly>");
                $("#sdisamt" + row + "").html(
                    "<input type='text' class='txt2 form-control input-sm text-right' name='disamti[]'  id='zum1" +
                    row + "' value=" + $("#pdiscex" + row + "").val() + " readonly>");
                $("#tto_di" + row + "").html(
                    "<input type='text' class='txt3 form-control input-sm text-right' name='too_di[]' id='zum2" +
                    row + "' value=" + $("#pdisamt" + row + "").val() + " readonly>");
                $("#total_vat" + row + "").html(
                    "<input type='text' class='txt4 form-control input-sm text-right' name='to_vat[]' id='zum3" +
                    row + "' value=" + $("#to_vats" + row + "").val() +
                    " readonly><input type='hidden' class='form-control input-sm text-right' name='remark_mat[]' value=" +
                    $("#remark_mat" + row + "").val() +
                    " readonly><input type='hidden' class='form-control input-sm text-right' name='datesend[]' value=" +
                    $("#datesend" + row + "").val() + " readonly>");
                $("#snetamt" + row + "").html(
                    "<input type='hidden' name='refprno[]' value=''><input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4" +
                    row + "' value=" + $("#pnetamt" + row + "").val() +
                    " readonly><input type='hidden' name='reamrki[]' value=" + $("#premark" + row + "").val() +
                    "><input type='hidden' name='accode[]' value=" + $("#accode" + row + "").val() +
                    "><input type='hidden' name='acname[]' value=" + $("#acname" + row + "").val() +
                    "><input type='hidden' name='statusass[]' value=" + $("#statusass" + row + "").val() +
                    "><input type='hidden' name='priidi[]' value=" + $("#pri_id" + row + "").val() +
                    "><input type='hidden' name='type_cost[]' value=" + $("#type_cost" + row + "").val() +
                    ">");



            } else {
                swal({
                    title: "Please Chack!",
                    text: "Material Code Not Found",
                    confirmButtonColor: "#2196F3"
                });
                $("#error" + row + "").attr("class", "input-group has-error has-feedback");
                $("#newmatname" + row + "").focus();
            }
            if ($("#pprice_unit" + row + "").val() != 0) {} else {
                swal({
                    title: "Unit Price Not Found!",
                    text: "Unit Price Not Found",
                    confirmButtonColor: "#2196F3"
                });
            }
            $('#editcost' + row + '').click(function(event) {

                var ssummaryunit = parseFloat($('#summaryunit').val());
                var ssummaryamt = parseFloat($('#summaryamt').val());
                var ssummaryd1 = parseFloat($('#summaryd1').val());
                var ssummarydis = parseFloat($('#summarydis').val());
                var ssummarydi = parseFloat($('#summarydi').val());
                var ssummaryvat = parseFloat($('#summaryvat').val());
                var ssummarytot = parseFloat($('#summarytot').val());
                $('#summaryunit').val(ssummaryunit - pprice_unit);
                $('#summaryamt').val(ssummaryamt - pamount);
                $('#summaryd1').val(ssummaryd1 - total);
                $('#summarydis').val(ssummarydis - pdiscex);
                $('#summarydi').val(ssummarydi - pdisamt);
                $('#summaryvat').val(ssummaryvat - to_vat);
                $('#summarytot').val(ssummarytot - pnetamt);

                var type_cost = $("#type_cost" + row + "").val();
                var costcodetype = $("#codecostcodeint" + row + "").val();
                var rowsum_di = parseFloat($("#pdisamt" + row + "").val().replace(/,/g, ""));
                var ckkcontrolbg = $('#ckkcontrolbg').val();
                //alert(ckkcontrolbg);
                if (ckkcontrolbg == "2") {
                    if (type_cost == 1) {
                        var costbg = parseFloat($('#costbgmat' + $("#codecostcodeint" + row + "").val() +
                            '').val().replace(/,/g, ""));
                        $('#costbgmat' + costcodetype + '').val(costbg + rowsum_di);
                        $('#totalcost' + row + '').val(costbg + rowsum_di);
                    } else if (type_cost == 2) {
                        var costbg = parseFloat($('#costbglebour' + $("#codecostcodeint" + row + "").val() +
                            '').val().replace(/,/g, ""));
                        $('#costbglebour' + costcodetype + '').val(costbg + rowsum_di);
                        $('#totalcost' + row + '').val(costbg + rowsum_di);
                    } else if (type_cost == 3) {
                        var costbg = parseFloat($('#costbgsub' + $("#codecostcodeint" + row + "").val() +
                            '').val().replace(/,/g, ""));
                        $('#costbgsub' + costcodetype + '').val(costbg + rowsum_di);
                        $('#totalcost' + row + '').val(costbg + rowsum_di);
                    }
                }




            });
        });

        $("#type_cost" + row + "").change(function(event) {
            alert("dfddf");
            var type_cost = $("#type_cost" + row + "").val();
            var costcodetype = $("#codecostcodeint" + row + "").val();
            var rowsum_di = parseFloat($("#pdisamt" + row + "").val().replace(/,/g, ""));
            var codecostcodeint = $('#codecostcodeint' + row + '').val();
            var controlmat = $('#controlmat' + codecostcodeint + '').val();


            $('#pprice_unit' + row + '').val("0");
            if (type_cost == 1) {
                $('#closebg' + row + '').show();
                var costbg = $('#costbgmat' + codecostcodeint).val();
                $('#totalcost' + row + '').val(costbg);
                if (ckkcontrolbg == "2") {
                    if (isNaN(costbg)) {
                        $('#totalcost').val(0);
                        swal({
                            title: "Over budget.",
                            text: "",
                            confirmButtonColor: "#EA1923",
                            type: "error"
                        });
                        $("#closebg" + row + "").hide();
                        $("#pprice_unit" + row + "").val('0');
                        $("#pdisamt" + row + "").val('0');
                        $("#pamount" + row + "").val('0');
                        $("#to_vat" + row + "").val('0');
                        $("#pnetamt" + row + "").val('0');
                        $('#type_cost' + row + '').val("0");
                    }
                }
            } else if (type_cost == 2) {
                $('#closebg' + row + '').show();
                var costbgl = $('#costbglebour' + codecostcodeint).val();
                $('#totalcost' + row + '').val(costbgl);

                if (ckkcontrolbg == "2") {
                    if (isNaN(costbgl)) {
                        $('#totalcost').val(0);
                        swal({
                            title: "Over budget.",
                            text: "",
                            confirmButtonColor: "#EA1923",
                            type: "error"
                        });
                        $("#closebg" + row + "").hide();
                        $("#pprice_unit" + row + "").val('0');
                        $("#pdisamt" + row + "").val('0');
                        $("#pamount" + row + "").val('0');
                        $("#to_vat" + row + "").val('0');
                        $("#pnetamt" + row + "").val('0');
                        $('#type_cost' + row + '').val("0");
                    }
                }

            } else if (type_cost == 3) {
                $('#closebg' + row + '').show();
                var costbgl = $('#costbgsub' + codecostcodeint).val();
                $('#totalcost' + row + '').val(costbgl);

                if (ckkcontrolbg == "2") {
                    if (isNaN(costbgl)) {
                        $('#totalcost').val(0);
                        swal({
                            title: "Over budget.",
                            text: "",
                            confirmButtonColor: "#EA1923",
                            type: "error"
                        });
                        $("#closebg" + row + "").hide();
                        $("#pprice_unit" + row + "").val('0');
                        $("#pdisamt" + row + "").val('0');
                        $("#pamount" + row + "").val('0');
                        $("#to_vat" + row + "").val('0');
                        $("#pnetamt" + row + "").val('0');
                        $('#type_cost' + row + '').val("0");
                    }
                }
            }
        });

        $(document).on('click', 'a#remove' + row + '', function() { // <-- changes
            var self = $(this);
            noty({
                width: 200,
                text: "Do you want to Delete?",
                type: self.data('type'),
                dismissQueue: true,
                timeout: 1000,
                layout: self.data('layout'),
                buttons: (self.data('type') != 'confirm') ? false : [{
                        addClass: 'btn btn-primary btn-xs',
                        text: 'Ok',
                        onClick: function($noty) { //this = button element, $noty = $noty element
                            $noty.close();
                            self.closest('tr').remove();
                            noty({
                                force: true,
                                text: 'Deleteted',
                                type: 'success',
                                layout: self.data('layout'),
                                timeout: 1000,
                            });
                        }
                    },
                    {
                        addClass: 'btn btn-danger btn-xs',
                        text: 'Cancel',
                        onClick: function($noty) {
                            $noty.close();
                            noty({
                                force: true,
                                text: 'You clicked "Cancel" button',
                                type: 'error',
                                layout: self.data('layout'),
                                timeout: 1000,
                            });
                        }
                    }
                ]
            });
            return false;
        });
        $('#pprice_unit' + row + ',#pqty' + row + ', #pdiscex' + row + ",#pdiscper1" + row + ",#pdiscper2" + row +
            ",#pdiscper3" + row + ",#pdiscper4" + row).keyup(function() {

            // to_vats
            //alert(555)
            var xqty = parseFloat($('#pqty' + row + '').val());
            var xprice = parseFloat($('#pprice_unit' + row + '').val());
            var xamount = xqty * xprice;
            var xdiscper1 = parseFloat($('#pdiscper1' + row + '').val());
            var xdiscper2 = parseFloat($('#pdiscper2' + row + '').val());
            var xdiscper3 = parseFloat($('#pdiscper3' + row + '').val());
            var xdiscper4 = parseFloat($('#pdiscper4' + row + '').val());
            var xdiscper5 = parseFloat($('#pdiscex' + row + '').val());
            var xvatt = parseFloat($('#vatper').val());
            var xpd1 = xamount - (xamount * xdiscper1) / 100;
            var xpd2 = xpd1 - (xpd1 * xdiscper2) / 100;
            var xpd3 = xpd2 - (xpd2 * xdiscper3) / 100;
            var xpd4 = xpd3 - (xpd3 * xdiscper4) / 100;
            var xpd8 = ((xpd4 - xdiscper5) * xvatt) / 100;
            var total_di = xamount - xpd4;
            var xvat = parseFloat($('#vatper').val());
            $('#pamount' + row + '').val((xamount));
            $('#too_di' + row + '').val(total_di);
            //                 //alert(xpd8)
            $('#to_vats' + row + '').val((xpd8));
            //$("[name='^to_vat']").val(xvatt)
            //$('#to_vats'+row+'').val(xpd8);
            // $("")
            $('#tot_vat' + row + '').val(xvatt);
            // error
            if (xdiscper5 != 0) {
                vxpd4 = xpd4 - xdiscper5;
                $('#pdisamt' + row + '').val((vxpd4));
                $('#too_di' + row + '').val((vxpd4));
                vxpd5 = (xpd4 - xdiscper5) + xpd8;
                $('#pnetamt' + row + '').val((vxpd5));
            } else if (xdiscper2 != 0) {
                $('#pdisamt' + row + '').val((xpd4));
                $('#too_di' + row + '').val((xpd4));
                vxpd2 = xpd4 + xpd8;
                $('#pnetamt' + row + '').val((vxpd2));
            } else if (xdiscper3 != 0) {
                $('#pdisamt' + row + '').val((xpd4));
                $('#too_di' + row + '').val((xpd4));
                vxpd3 = xpd4 + xpd8;
                $('#pnetamt' + row + '').val((vxpd3));
            } else if (xdiscper4 != 0) {
                $('#pdisamt' + row + '').val((xpd4));
                $('#too_di' + row + '').val((xpd4));
                vxpd5 = xpd4 + xpd8;
                $('#pnetamt' + row + '').val((vxpd5));
            } else {
                $('#pdisamt' + row + '').val((xpd1));
                $('#too_di' + row + '').val((xpd1));
                vxpd1 = xpd4 + xpd8;
                $('#pnetamt' + row + '').val((vxpd1));
            }

            var ckkcontrolbg = $('#ckkcontrolbg').val();
            if (ckkcontrolbg == "2") {
                //alert(ckkcontrolbg);
                var type_cost = $("#type_cost" + row + "").val();

                var codecostcodeint = $('#codecostcodeint' + row + '').val();
                if (type_cost == 1) {
                    var controlmat = $('#controlmat' + codecostcodeint + '').val();
                    if (controlmat == "1") {
                        var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val().replace(/,/g, ""));
                        $('#totalcost' + row + '').val(costbg - xpd1 + xdiscper5);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
                        var costcodecc = $('#costbgmat' + codecostcodeint + '').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                            swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });
                            $("#pprice_unit" + row + "").val('0');
                            $("#pdisamt" + row + "").val('0');
                            $("#pamount" + row + "").val('0');
                            $("#totalcost" + row + "").val(costcodecc);
                            $("#to_vats" + row + "").val('0');
                            $("#pnetamt" + row + "").val('0');
                        }
                    }
                } else if (type_cost == 2) {
                    var controllebour = $('#controllebour' + codecostcodeint + '').val();
                    if (controllebour == "1") {
                        var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val().replace(/,/g,
                            ""));
                        $('#totalcost' + row + '').val(costbg - xpd1 + xdiscper5);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
                        var costcodecc = $('#costbgmat' + codecostcodeint + '').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                            swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });
                            $("#pprice_unit" + row + "").val('0');
                            $("#pdisamt" + row + "").val('0');
                            $("#pamount" + row + "").val('0');
                            $("#totalcost" + row + "").val(costcodecc);
                            $("#to_vats" + row + "").val('0');
                            $("#pnetamt" + row + "").val('0');
                        }
                    }

                } else if (type_cost == 3) {
                    var controlsub = $('#controlsub' + codecostcodeint + '').val();
                    if (controlsub == "1") {
                        var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val().replace(/,/g, ""));
                        $('#totalcost' + row + '').val(costbg - xpd1 + xdiscper5);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
                        var costcodecc = $('#costbgmat' + codecostcodeint + '').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                            swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });
                            $("#pprice_unit" + row + "").val('0');
                            $("#pdisamt" + row + "").val('0');
                            $("#pamount" + row + "").val('0');
                            $("#totalcost" + row + "").val(costcodecc);
                            $("#to_vats" + row + "").val('0');
                            $("#pnetamt" + row + "").val('0');
                        }
                    }

                } //if parseFloa
            } // if ckkcontrolbg
        });

        function rowadd() {
            var tr = '<tr>' +
                '<td colspan="13" class="text-center">No Data</td>'
            '</tr>';
            $('#body').append(tr);
        }
        $("#a" + row + "").click(function() {
            if ($("#a" + row + "").prop("checked")) {
                $("#chki" + row + "").val("Y");
            } else {
                $("#chki" + row + "").val("");
            }
        });
        $("#cpqtyic" + row + "").keyup(function() {
            var qtyx = $("#pqty" + row + "").val() * $("#cpqtyic" + row + "").val();
            $("#pqtyic" + row + "").val(qtyx);
        });
    }
</script>
<script>
    $("#sss").click(function() {
        // if ($("#system").val() == "") {
        //     swal({
        //         title: "Select System !!",
        //         text: "",
        //         confirmButtonColor: "#EA1923",
        //         type: "error"
        //     });
        // } else {
            $("#openpr").modal('show');
            
	
            var chkprv = parseFloat($("#chkprv").val());
            var system = $('#system').val();
            var dpnames = "<?php echo $dname; ?>";
            $('#loadpr').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#loadpr").load("<?php echo base_url(); ?>purchase/load_pr2/"+ dpnames +'/<?php echo $flag; ?>/'+system+'/<?php echo $bd_tenid; ?>');
            });
            $(".ven").click(function(){
            $("#loadvender").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
        // }
    });


    $("#inst").click(function() {
        if ($("#system").val() == "") {
            swal({
                title: "Select System !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else {
            $("#insertrow").modal('show');
        }
    });
</script>

<script type="text/javascript">
    $("#savee").click(function(e) {
        if ($("#venderid").val() == "") {
            swal({
                // title: "Select Vender !!",
                // // text: "danger",
                // confirmButtonColor: "#FF0000",
                // // type: "success"

                title: "Select Vender  !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"

            });



        } else if ($(".type_cost").val() == "") {
            swal({


                title: "Please select Type of Cost  !!",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"

            });

        } else {
            
            // var frm = $('#contactForm1');
            // frm.submit(function (ev) {
            //     $.ajax({
            //         type: frm.attr('method'),
            //         url: frm.attr('action'),
            //         data: frm.serialize(),
            //         success: function (data) {
                        swal({
                            title: "บันทึกสำเร็จ",
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
            //         }
            //     });
            //     ev.preventDefault();
            // });
            $("#save").prop('disabled',true);
            $("#contactForm1").submit(); //Submit  the FORM
        }
    });
    //
    //
</script>

<script type="text/javascript">
    $('#po_purchase').attr('class', 'active');
    $('#new_po').attr('style', 'background-color:#dedbd8');
</script>