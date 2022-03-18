<?php foreach ($getpc as $value) {
  $docid = $value->doc_id;
  $docno = $value->docno;
  $system = $value->system;
  $pettycashdate = $value->docdate;
  $duedate = $value->duedate;
  $memadv = $value->memadv;
  $advname = $value->advname;
  $project = $value->project;
  $projectname = $value->project_name;
  $ventype = $value->vender_type;
  if ($ventype == "1") {
    $mname = $value->vender;
    $mid = $value->ven_id;
    $payto = "";
    $venid = "";
  } else {
    $payto = $value->vender;
    $venid = $value->ven_id;
    $mname = "";
    $mid = "";
  }
  $remark = $value->remark;
  $advname = $value->advname;
  $advid = $value->memadv;
}
foreach($check_controll as $key => $val){
$controlbg = $val['controlbg'];
$bd_tenid = $val['bd_tenid'];
}

$pc = $this->uri->segment(3);;
$doc_no = $this->uri->segment(4);;
$fa = $this->uri->segment(5);
?>

<?php
$projid = $this->uri->segment(4);
$this->db->select('*');
$this->db->from('project');
$this->db->where('project_id', $projid);
$boq = $this->db->get()->result();
$bd_tenid = 0;
$chkconbqq = 0;
$controlbg = 0;
$project_code = "";
?>
<?php foreach ($boq as $eboq) {
  $chkconbqq = $eboq->chkconbqq;
  $controlbg = $eboq->controlbg;
  $bd_tenid = $eboq->bd_tenid;
  $chkconbqq = $eboq->chkconbqq;
  $project_code = $eboq->project_code;
  $c_pt = $eboq->c_pt;
  $a_pt = $eboq->a_pt;
}
?>
<!-- $id boq_id -->
<div class="content-wrapper">

  <div class="content">
    <div class="row">
      <form method="post" id="fpeyty" action="<?php echo base_url(); ?>pettycash_active/editpettycash/<?php echo $docno; ?>" enctype="multipart/form-data">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h5 class="panel-title">PETTY CASH <?php if ($chkconbqq == "1") {echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>';} else {echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>';}?>&nbsp; <?php if ($controlbg == "2") {echo '<button class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</button>';} else {echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';}?> </h5>
            <div class="heading-elements">
            </div>
          </div>
          <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-component">
                    <li class="active"><a href="#basic-rounded-tab1" data-toggle="tab">Petty Cash
                            Detail</a></li>
                    <li><a href="#basic-rounded-tab2" data-toggle="tab">Attachment File</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="basic-rounded-tab1">
                      <div class="row">
                        <!-- <div class="col-md-6"> -->
                        <fieldset>
                          <div class="col-md-6">
                            <input type="hidden" id="ckkcontrolbg" value="<?php echo $controlbg; ?>">
                            <div class="form-group">
                              <label>No.:</label>
                              <input type="text" class="form-control" value="<?php echo $docno; ?>" readonly="readonly" id="pcno" placeholder="Petty Cash No.">
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="code">Vender Type :</label>
                                  <select class="form-control" name="vendertype" id="vendertype">
                                        <?php if ($ventype == '1') {?>
                                        <option value="1" selected>Employee</option>
                                        <?php } else {?>
                                        <option value="1">Employee</option>
                                        <?php }?>
                                        <?php if ($ventype == '2') {?>
                                        <option value="2" selected>External</option>
                                        <?php } else {?>
                                        <option value="2">External</option>
                                        <?php }?>
                                      </select>
                                </div>
                              </div>
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label>Pay To.:</label>
                                  <div class="input-group">
                                    <span class="input-group-btn">
                                          <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                        </span>
                                    <input type="text" name="memname" id="memname" readonly="true" placeholder="จ่ายให้กับ" value="<?php echo $mname; ?>" class="form-control">
                                    <input type="hidden" name="memid" id="memid" value="<?php echo $mid; ?>">
                                    <input type="text" name="venname" id="venname" readonly="true" placeholder="จ่ายให้กับ" value="<?php echo $payto; ?>" class="form-control">
                                    <input type="hidden" name="venid" id="venid" value="<?php echo $venid; ?>">
                                    <div class="input-group-btn">
                                      <button type="button" class="openemp btn btn-default btn-icon" data-toggle="modal" data-target="#open"><i class="icon-search4"></i></button>
                                      <button type="button" class="openext btn btn-default btn-icon" data-toggle="modal" data-target="#openvenh"><i class="icon-search4"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <?php if($fa=="p"){ ?>
                            <div class="form-group">
                              <label>Project:</label>
                              <div class="input-group">
                                <span class="input-group-btn">
                                      <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                                    </span>
                                <input type="text" class="form-control" readonly="readonly" placeholder="Project" value="<?php echo $projectname; ?>" name="projectname"
                                  id="projectname">
                                <input type="hidden" readonly="true" value="<?php echo $project; ?>" class="pproject1 form-control input-sm" name="projectid"
                                  id="projectid">
                                <div class="input-group-btn">
                                  <button type="button" data-toggle="modal" data-target="#openproj" class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <?php } ?>

                            <?php if($fa=="d"){ ?>
                            <div class="form-group">
                              <label>Department:</label>
                              <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                  </span>
                                <input type="text" class="form-control" readonly="readonly" placeholder="Department" value="<?php echo $depname; ?>" name="depname"
                                  id="depname">
                                <input type="hidden" readonly="true" value="<?php echo $departid; ?>" class="form-control input-sm input-sm" name="depid"
                                  id="depid">
                                <div class="input-group-btn">
                                  <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button>
                                </div>
                              </div>
                            </div>
                            <?php } ?>


                          </div>

                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Date: </label>
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="date" class="form-control daterange-single" id="pcdate" name="pcdate" value="<?php echo $pettycashdate; ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Due Date: </label>
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="date" class="form-control daterange-single" id="duedate" name="duedate" value="<?php echo $duedate; ?>">
                                    <input type="hidden" class="form-control" value="1" id="crterm" name="crterm">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="code">System</label>
                                  <select class="form-control" name="system" id="system">
                                    <?php
                                    $this->db->select('*');
                                    $this->db->where('systemcode', $system);
                                    $q = $this->db->get('system')->result();
                                    ?>
                                    ?>
                                    <?php  foreach ($q as $v) {
                                    $systemname = $v->systemname ;
                                    }  ?>
                                    <option value="<?php echo $system; ?>"><?php echo $systemname; ?></option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Advance To </label>
                                  <div class="input-group">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Advance To" readonly value="<?php echo $advname; ?>" name="advname"
                                      id="advname">
                                    <input type="hidden" name="advid" id="advid" value="<?php echo $advid; ?>">
                                    <div class="input-group-btn">
                                      <button type="button" class="openadv btn btn-default btn-icon" data-toggle="modal" data-target="#openadv"><i class="icon-search4"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Remark:</label>
                                  <input class="form-control" required="required" placeholder="Remark" name="remark" id="remark" value="<?php echo $remark; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <!-- </div> -->
            
                        <div class="row">
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('type',"1");
                          $this->db->group_by("costcode");
                          $priboqid = $this->db->get('boq_cost')->result();
                          ?>
                          <?php foreach ($priboqid as $bg) { ?>
                          <?php
                          $this->db->select_sum('cost');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('costcode',$bg->costcode);
                          $this->db->where('type',"1");
                          $costboqcontrol = $this->db->get('boq_cost')->result();
                          foreach ($costboqcontrol as $bc) {
                          $costcost = $bc->cost;
                          }

                          $this->db->select_sum('poi_amount');
                                $this->db->where('po_project',$doc_no);
                                $this->db->where('poi_costcode',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $this->db->join('po','po.po_pono = po_item.poi_ref');
                                $qscostpo = $this->db->get('po_item')->result();
                                $poi_amount = 0;
                              foreach ($qscostpo as $cpo) {
                                $poi_amount = $cpo->poi_amount;
                                }
                                // po
                                $this->db->select_sum('total_disc');
                                $this->db->where('projectcode',$doc_no);
                                $this->db->where('lo_costcode',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                $qscostwo = $this->db->get('lo_detail')->result();
                                $total_disc = 0;
                              foreach ($qscostwo as $cwo) {
                                $total_disc = $cwo->total_disc;
                                }

                                // wo
                                $this->db->select_sum('pettycashi_unitprice');
                                $this->db->where('project',$doc_no);
                                $this->db->where('pettycashi_costcode',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                $qscostpc = $this->db->get('pettycash_item')->result();
                                $pettycashi_unitprice = 0;
                              foreach ($qscostpc as $cpc) {
                                $pettycashi_unitprice = $cpc->pettycashi_unitprice;
                                }
                                // pc

                                $this->db->select_sum('amtcr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $qscostgl = $this->db->get('gl_batch_details')->result();
                                $amtcr = 0;
                              foreach ($qscostgl as $cgl) {
                                $amtcr = $cgl->amtcr;
                                }


                                $this->db->select_sum('amtdr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $qscostgls = $this->db->get('gl_batch_details')->result();
                                $amtdr = 0;
                              foreach ($qscostgls as $cgls) {
                                $amtdr = $cgls->amtdr;
                                }
                                // GL


                                $matitalcost = ($poi_amount+$total_disc+$pettycashi_unitprice+$amtcr)-$amtdr;
                          ?>
                          <div class="col-md-2" hidden>
                            <div class="form-group">
                              <label for=""><?php echo $bg->costcode; ?> (M) </label>
                              <input type="text" name="costbg" id="costbgmat<?php echo $bg->costcode;?>" class="form-control text-right" value="<?php echo (($costcost/100)*$bg->controlper)-$matitalcost; ?>">
                              <input type="text" name="controlmat" id="controlmat<?php echo $bg->costcode;?>" class="form-control text-right" value="<?php echo number_format($bg->control); ?>">
                            </div>
                          </div>
                          
                          <?php } ?>

                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('type',"2");
                          $this->db->group_by("costcode");
                          $priboqid2 = $this->db->get('boq_cost')->result();
                          ?>
                          <?php foreach ($priboqid2 as $bg2) { ?>
                          <?php
                          $this->db->select_sum('cost');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('costcode',$bg2->costcode);
                          $this->db->where('type',"2");
                          $costboqcontrol2 = $this->db->get('boq_cost')->result();
                          foreach ($costboqcontrol2 as $bc2) {
                            $costcost2 = $bc2->cost;
                          }

                          $this->db->select_sum('poi_amount');
                                $this->db->where('po_project',$doc_no);
                                $this->db->where('poi_costcode',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $this->db->join('po','po.po_pono = po_item.poi_ref');
                                $qscostpo2 = $this->db->get('po_item')->result();
                                $poi_amount2 = 0;
                              foreach ($qscostpo2 as $cpo2) {
                                $poi_amount2 = $cpo2->poi_amount;
                                }
                                // po
                                $this->db->select_sum('total_disc');
                                $this->db->where('projectcode',$doc_no);
                                $this->db->where('lo_costcode',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                $qscostwo2 = $this->db->get('lo_detail')->result();
                                $total_disc2 = 0;
                              foreach ($qscostwo2 as $cwo2) {
                                $total_disc2 = $cwo2->total_disc;
                                }

                                // wo
                                $this->db->select_sum('pettycashi_unitprice');
                                $this->db->where('project',$doc_no);
                                $this->db->where('pettycashi_costcode',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                $qscostpc2 = $this->db->get('pettycash_item')->result();
                                $pettycashi_unitprice2 = 0;
                              foreach ($qscostpc2 as $cpc2) {
                                $pettycashi_unitprice2 = $cpc2->pettycashi_unitprice;
                                }
                                // pc

                                $this->db->select_sum('amtcr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $qscostgl2 = $this->db->get('gl_batch_details')->result();
                                $amtcr2 = 0;
                              foreach ($qscostgl2 as $cgl2) {
                                $amtcr2 = $cgl2->amtcr;
                                }


                                $this->db->select_sum('amtdr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $qscostgls2 = $this->db->get('gl_batch_details')->result();
                                $amtdr2 = 0;
                              foreach ($qscostgls2 as $cgls2) {
                                $amtdr2 = $cgls2->amtdr;
                                }
                                // GL


                                $matitalcost2 = ($poi_amount2+$total_disc2+$pettycashi_unitprice2+$amtcr2)-$amtdr2;
                          ?>
                          <div class="col-md-2" hidden>
                            <div class="form-group">
                              <label for=""><?php echo $bg2->costcode; ?> (L) </label>
                              <input type="text" name="costbg" id="costbglebour<?php echo $bg2->costcode;?>" class="form-control text-right" value="<?php echo (($costcost2/100)*$bg2->controlper)-$matitalcost2; ?>">
                              <input type="text" name="controllebour" id="controllebour<?php echo $bg2->costcode;?>" class="form-control text-right" value="<?php echo number_format($bg2->control); ?>">
                            </div>
                          </div>

                          <?php } ?>
                          
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('type',"3");
                          $this->db->group_by("costcode");
                          $priboqid3 = $this->db->get('boq_cost')->result();
                          ?>
                          <?php foreach ($priboqid3 as $bg3) { ?>
                          <?php
                          $this->db->select_sum('cost');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('costcode',$bg3->costcode);
                          $this->db->where('type',"3");
                          $costboqcontrol3 = $this->db->get('boq_cost')->result();
                          foreach ($costboqcontrol3 as $bc3) {
                            $costcost3 = $bc3->cost;
                          }

                          $this->db->select_sum('poi_amount');
                                $this->db->where('po_project',$doc_no);
                                $this->db->where('poi_costcode',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $this->db->join('po','po.po_pono = po_item.poi_ref');
                                $qscostpo3 = $this->db->get('po_item')->result();
                                $poi_amount3 = 0;
                              foreach ($qscostpo3 as $cpo3) {
                                $poi_amount3 = $cpo3->poi_amount;
                                }
                                // po
                                $this->db->select_sum('total_disc');
                                $this->db->where('projectcode',$doc_no);
                                $this->db->where('lo_costcode',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                $qscostwo3 = $this->db->get('lo_detail')->result();
                                $total_disc3 = 0;
                              foreach ($qscostwo3 as $cwo3) {
                                $total_disc3 = $cwo3->total_disc;
                                }

                                // wo
                                $this->db->select_sum('pettycashi_unitprice');
                                $this->db->where('project',$doc_no);
                                $this->db->where('pettycashi_costcode',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                $qscostpc3 = $this->db->get('pettycash_item')->result();
                                $pettycashi_unitprice3 = 0;
                              foreach ($qscostpc3 as $cpc3) {
                                $pettycashi_unitprice3 = $cpc3->pettycashi_unitprice;
                                }
                                // pc

                                $this->db->select_sum('amtcr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $qscostgl3 = $this->db->get('gl_batch_details')->result();
                                $amtcr3 = 0;
                              foreach ($qscostgl3 as $cgl3) {
                                $amtcr3 = $cgl3->amtcr;
                                }


                                $this->db->select_sum('amtdr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $qscostgls3 = $this->db->get('gl_batch_details')->result();
                                $amtdr3 = 0;
                              foreach ($qscostgls3 as $cgls3) {
                                $amtdr3 = $cgls2->amtdr;
                                }
                                // GL


                                $matitalcost3 = ($poi_amount3+$total_disc3+$pettycashi_unitprice3+$amtcr3)-$amtdr3;
                          ?>
                          <div class="col-md-2" hidden>
                            <div class="form-group">
                              <label for=""><?php echo $bg3->costcode; ?> (S) </label>
                              <input type="text" name="costbg" id="costbgsub<?php echo $bg3->costcode;?>" class="form-control text-right" value="<?php echo (($costcost3/100)*$bg3->controlper)-$matitalcost3; ?>">
                              <input type="text" name="controlsub" id="controlsub<?php echo $bg3->costcode;?>" class="form-control text-right" value="<?php echo number_format($bg3->control); ?>">
                            </div>
                          </div>


                          
                          <?php } ?>
                        </div>
                        <div class="row">
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('type',"1");
                          $this->db->group_by("costcode");
                          $priboqid = $this->db->get('boq_cost')->result();
                          ?>
                          <?php foreach ($priboqid as $bg) { ?>
                          <?php
                          $this->db->select_sum('cost');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('costcode',$bg->costcode);
                          $this->db->where('type',"1");
                          $costboqcontrol = $this->db->get('boq_cost')->result();
                          foreach ($costboqcontrol as $bc) {
                          $costcost = $bc->cost;
                          }

                          $this->db->select_sum('poi_amount');
                                $this->db->where('po_project',$doc_no);
                                $this->db->where('poi_costcode',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $this->db->join('po','po.po_pono = po_item.poi_ref');
                                $qscostpo = $this->db->get('po_item')->result();
                                $poi_amount = 0;
                              foreach ($qscostpo as $cpo) {
                                $poi_amount = $cpo->poi_amount;
                                }
                                // po
                                $this->db->select_sum('total_disc');
                                $this->db->where('projectcode',$doc_no);
                                $this->db->where('lo_costcode',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                $qscostwo = $this->db->get('lo_detail')->result();
                                $total_disc = 0;
                              foreach ($qscostwo as $cwo) {
                                $total_disc = $cwo->total_disc;
                                }

                                // wo
                                $this->db->select_sum('pettycashi_unitprice');
                                $this->db->where('project',$doc_no);
                                $this->db->where('pettycashi_costcode',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                $qscostpc = $this->db->get('pettycash_item')->result();
                                $pettycashi_unitprice = 0;
                              foreach ($qscostpc as $cpc) {
                                $pettycashi_unitprice = $cpc->pettycashi_unitprice;
                                }
                                // pc

                                $this->db->select_sum('amtcr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $qscostgl = $this->db->get('gl_batch_details')->result();
                                $amtcr = 0;
                              foreach ($qscostgl as $cgl) {
                                $amtcr = $cgl->amtcr;
                                }


                                $this->db->select_sum('amtdr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg->costcode);
                                $this->db->where('type_cost',"1");
                                $qscostgls = $this->db->get('gl_batch_details')->result();
                                $amtdr = 0;
                              foreach ($qscostgls as $cgls) {
                                $amtdr = $cgls->amtdr;
                                }
                                // GL


                                $matitalcost = ($poi_amount+$total_disc+$pettycashi_unitprice+$amtcr)-$amtdr;
                          ?>
                          <div class="col-md-2" hidden>
                            <div class="form-group">
                              <label for=""><?php echo $bg->costcode; ?> (M) </label>
                              <input type="text" name="costbg" id="costbgmat<?php echo $bg->costcode;?>" class="form-control text-right" value="<?php echo (($costcost/100)*$bg->controlper)-$matitalcost; ?>">
                              <input type="text" name="controlmat" id="controlmat<?php echo $bg->costcode;?>" class="form-control text-right" value="<?php echo number_format($bg->control); ?>">
                            </div>
                          </div>
                          
                          <?php } ?>

                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('type',"2");
                          $this->db->group_by("costcode");
                          $priboqid2 = $this->db->get('boq_cost')->result();
                          ?>
                          <?php foreach ($priboqid2 as $bg2) { ?>
                          <?php
                          $this->db->select_sum('cost');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('costcode',$bg2->costcode);
                          $this->db->where('type',"2");
                          $costboqcontrol2 = $this->db->get('boq_cost')->result();
                          foreach ($costboqcontrol2 as $bc2) {
                            $costcost2 = $bc2->cost;
                          }

                          $this->db->select_sum('poi_amount');
                                $this->db->where('po_project',$doc_no);
                                $this->db->where('poi_costcode',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $this->db->join('po','po.po_pono = po_item.poi_ref');
                                $qscostpo2 = $this->db->get('po_item')->result();
                                $poi_amount2 = 0;
                              foreach ($qscostpo2 as $cpo2) {
                                $poi_amount2 = $cpo2->poi_amount;
                                }
                                // po
                                $this->db->select_sum('total_disc');
                                $this->db->where('projectcode',$doc_no);
                                $this->db->where('lo_costcode',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                $qscostwo2 = $this->db->get('lo_detail')->result();
                                $total_disc2 = 0;
                              foreach ($qscostwo2 as $cwo2) {
                                $total_disc2 = $cwo2->total_disc;
                                }

                                // wo
                                $this->db->select_sum('pettycashi_unitprice');
                                $this->db->where('project',$doc_no);
                                $this->db->where('pettycashi_costcode',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                $qscostpc2 = $this->db->get('pettycash_item')->result();
                                $pettycashi_unitprice2 = 0;
                              foreach ($qscostpc2 as $cpc2) {
                                $pettycashi_unitprice2 = $cpc2->pettycashi_unitprice;
                                }
                                // pc

                                $this->db->select_sum('amtcr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $qscostgl2 = $this->db->get('gl_batch_details')->result();
                                $amtcr2 = 0;
                              foreach ($qscostgl2 as $cgl2) {
                                $amtcr2 = $cgl2->amtcr;
                                }


                                $this->db->select_sum('amtdr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg2->costcode);
                                $this->db->where('type_cost',"2");
                                $qscostgls2 = $this->db->get('gl_batch_details')->result();
                                $amtdr2 = 0;
                              foreach ($qscostgls2 as $cgls2) {
                                $amtdr2 = $cgls2->amtdr;
                                }
                                // GL


                                $matitalcost2 = ($poi_amount2+$total_disc2+$pettycashi_unitprice2+$amtcr2)-$amtdr2;
                          ?>
                          <div class="col-md-2" hidden>
                            <div class="form-group">
                              <label for=""><?php echo $bg2->costcode; ?> (L) </label>
                              <input type="text" name="costbg" id="costbglebour<?php echo $bg2->costcode;?>" class="form-control text-right" value="<?php echo (($costcost2/100)*$bg2->controlper)-$matitalcost2; ?>">
                              <input type="text" name="controllebour" id="controllebour<?php echo $bg2->costcode;?>" class="form-control text-right" value="<?php echo number_format($bg2->control); ?>">
                            </div>
                          </div>

                          <?php } ?>
                          
                          <?php
                          $this->db->select('*');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('type',"3");
                          $this->db->group_by("costcode");
                          $priboqid3 = $this->db->get('boq_cost')->result();
                          ?>
                          <?php foreach ($priboqid3 as $bg3) { ?>
                          <?php
                          $this->db->select_sum('cost');
                          $this->db->where('boq_code',$bd_tenid);
                          $this->db->where('costcode',$bg3->costcode);
                          $this->db->where('type',"3");
                          $costboqcontrol3 = $this->db->get('boq_cost')->result();
                          foreach ($costboqcontrol3 as $bc3) {
                            $costcost3 = $bc3->cost;
                          }

                          $this->db->select_sum('poi_amount');
                                $this->db->where('po_project',$doc_no);
                                $this->db->where('poi_costcode',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $this->db->join('po','po.po_pono = po_item.poi_ref');
                                $qscostpo3 = $this->db->get('po_item')->result();
                                $poi_amount3 = 0;
                              foreach ($qscostpo3 as $cpo3) {
                                $poi_amount3 = $cpo3->poi_amount;
                                }
                                // po
                                $this->db->select_sum('total_disc');
                                $this->db->where('projectcode',$doc_no);
                                $this->db->where('lo_costcode',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $this->db->join('lo','lo.lo_lono = lo_detail.lo_ref');
                                $qscostwo3 = $this->db->get('lo_detail')->result();
                                $total_disc3 = 0;
                              foreach ($qscostwo3 as $cwo3) {
                                $total_disc3 = $cwo3->total_disc;
                                }

                                // wo
                                $this->db->select_sum('pettycashi_unitprice');
                                $this->db->where('project',$doc_no);
                                $this->db->where('pettycashi_costcode',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $this->db->join('pettycash','pettycash.docno = pettycash_item.pettycashi_ref');
                                $qscostpc3 = $this->db->get('pettycash_item')->result();
                                $pettycashi_unitprice3 = 0;
                              foreach ($qscostpc3 as $cpc3) {
                                $pettycashi_unitprice3 = $cpc3->pettycashi_unitprice;
                                }
                                // pc

                                $this->db->select_sum('amtcr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $qscostgl3 = $this->db->get('gl_batch_details')->result();
                                $amtcr3 = 0;
                              foreach ($qscostgl3 as $cgl3) {
                                $amtcr3 = $cgl3->amtcr;
                                }


                                $this->db->select_sum('amtdr');
                                $this->db->where('project_id',$doc_no);
                                $this->db->where('cust_code',$bg3->costcode);
                                $this->db->where('type_cost',"3");
                                $qscostgls3 = $this->db->get('gl_batch_details')->result();
                                $amtdr3 = 0;
                              foreach ($qscostgls3 as $cgls3) {
                                $amtdr3 = $cgls2->amtdr;
                                }
                                // GL


                                $matitalcost3 = ($poi_amount3+$total_disc3+$pettycashi_unitprice3+$amtcr3)-$amtdr3;
                          ?>
                          <div class="col-md-2" hidden>
                            <div class="form-group">
                              <label for=""><?php echo $bg3->costcode; ?> (S) </label>
                              <input type="text" name="costbg" id="costbgsub<?php echo $bg3->costcode;?>" class="form-control text-right" value="<?php echo (($costcost3/100)*$bg3->controlper)-$matitalcost3; ?>">
                              <input type="text" name="controlsub" id="controlsub<?php echo $bg3->costcode;?>" class="form-control text-right" value="<?php echo number_format($bg3->control); ?>">
                            </div>
                          </div>


                          
                          <?php } ?>
                        </div>
                        <div class="row">
                        <div class="panel-body">
                          <div class="row col-xs-12">
                            <div class="table-responsive">
                              <table class="table table-xxs table-hover table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Cost Code</th>
                                    <th>Expense</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>% VAT</th>
                                    <th>VAT</th>
                                    <th>%W/T</th>
                                    <th>W/T Amt.</th>
                                    <th>Net Amount</th>
                                    <th>Tax Name</th>
                                    <th>Paid Date (W/T)</th>
                                    <th>D/O</th>
                                    <th>D/O Date</th>
                                    <th>Vendor(W/T)</th>
                                    <th>Address(W/T)</th>
                                    <th style="width: 100px;">Ref. Asset Code</th>
                                    
                                  </tr>
                                </thead>
                                <tbody id="body">
                                  <?php $n = 1;
                                  $qty = 0;
                                  $unitprice = 0;
                                  $amouttot = 0;
                                  $vattot = 0;
                                  $whtot = 0;
                                  $netamt6 = 0;
                                  foreach ($getpci as $value) {
                                  
                                  ?>
                                  <tr>
                                      <td class="hidden-center">
                                      <ul class="icons-list">
                                        <li><a href="#" id="edit<?php echo $value->pettycashi_id; ?>" data-popup="tooltip" data-toggle="modal"
                                            data-target="#editrow<?php echo $value->pettycashi_id; ?>" title="" data-original-title="Edit" po-boq="<?=$value->po_boq; ?>" petty-id="<?php echo $value->pettycashi_id; ?>" price-old="<?=$value->pettycashi_unitprice;?>"><i class="icon-pencil7"></i></a></li>
                                        <li><a id="delete<?php echo $value->pettycashi_id; ?>" class="noty-runner" data-popup="tooltip"
                                            title="" data-original-title="Remove" data-layout="bottomRight" po-boq="<?=$value->po_boq; ?>" data-type="confirm" return-del="<?=$value->pettycashi_unitprice; ?>"><i class="icon-trash"></i></a></li>
                                      </ul>
                                    </td>
                                    <td>
                                      <?php echo $n; ?>
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_costcode; ?><input type="hidden" name="matcodei[]" value="<?php echo $value->pettycashi_costcode; ?>" />
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_expens; ?><input type="hidden" name="matnamei[]" value="<?php echo $value->pettycashi_expens; ?>" />
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_description; ?><input type="hidden" name="adddes[]" value="<?php echo $value->pettycashi_description; ?>" />
                                    </td>
                                    <td id="unitpric<?=$n;?>">
                                      <?php echo $value->pettycashi_unitprice; ?><input type="hidden" name="unitpricei[]" value="<?php echo $value->pettycashi_unitprice; ?>">
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_vatt; ?><input type="hidden" name="taxvvi[]" value="<?php echo $value->pettycashi_vatt; ?>" />
                                    </td>
                                    <td>
                                      <?php echo $value->pattycashi_totvat; ?><input type="hidden" name="netamti[]" value="<?php echo $value->pattycashi_totvat; ?>" />
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_wh; ?><input type="hidden" name="taxi[]" value="<?php echo $value->pettycashi_wh; ?>" />
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_totwh; ?><input type="hidden" name="totwhi[]" value="<?php echo $value->pettycashi_totwh; ?>" />
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_netamt; ?><input type="hidden" name="amttoti[]" value="<?php echo $value->pettycashi_netamt; ?>" />
                                    </td>
                                    <td>
                                      <?php if ($value->pettycashi_wh == '0') {
                                      echo "ไม่มีหัก";
                                      }?>
                                      <?php if ($value->pettycashi_wh == '1') {
                                      echo "ค่าขนส่ง 1%";
                                      }?>
                                      <?php if ($value->pettycashi_wh == '2') {
                                      echo "ค่าโฆษณา 2%";
                                      }?>
                                      <?php if ($value->pettycashi_wh == '3') {
                                      echo "ค่าบริการ 3%";
                                      }?>
                                      <?php if ($value->pettycashi_wh == '5') {
                                      echo "ค่าเช่า 5%";
                                      }?>
                                      <?php if ($value->pettycashi_wh == '15') {
                                      echo "ดอกเบี้ยจ่าย 15%";
                                      }?>
                                    </td>
                                    <td>
                                      <?php echo $value->pettycashi_paydate; ?><input type="hidden" name="paydate[]" value="<?php echo $value->pettycashi_paydate; ?>" /></td>
                                    <td>
                                      <?php echo $value->pettycashi_dod; ?><input type="hidden" name="dod[]" value="<?php echo $value->pettycashi_dod; ?>" /></td>
                                    <td>
                                      <?php echo $value->pettycashi_dodate; ?><input type="hidden" name="dodate[]" value="<?php echo $value->pettycashi_dodate; ?>" /></td>
                                    <td>
                                      <?php echo $value->pettycashi_venderwt; ?><input type="hidden" name="venderwt[]" value="<?php echo $value->pettycashi_venderwt; ?>" /></td>
                                    <td>
                                      <?php echo $value->pettycashi_addrvenderwt; ?><input type="hidden" name="addrvenderwt[]" value="<?php echo $value->pettycashi_addrvenderwt; ?>"
                                      /></td>
                                    <td>
                                      <?php echo $value->petty_assetid; ?>
                                    </td>
                                  
                                  </tr>
                                  <!--  -->
                                  <div id="editrow<?php echo $value->pettycashi_id; ?>" class="modal fade" data-backdrop="false">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content ">
                                        <div class="modal-header bg-info">
                                          <button type="button" class="close" id="cc<?=$n;?>" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">แก้ไขรายการ</h5>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-xs-6">
                                              <label for="">รายการซื้อ</label>
                                              <div class="input-group">
                                                <!-- <span class="input-group-addon"> -->
                                                  <!-- <input type="checkbox" id="chk<?php echo $value->pettycashi_id; ?>" aria-label="กำหนดเอง"> -->
                                                <!-- </span> -->
                                                <input type="text" id="aaccode<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_accode; ?>" class="form-control ">
                                                <input type="text" id="newmatname<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_expens; ?>" placeholder="เลือกรายการซื้อ"
                                                  class="form-control input-sm">
                                                <input type="hidden" id="newmatcode<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_expenscode; ?>"
                                                  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                                                <span class="input-group-btn">
                                                  <button type="button" class="openun<?php echo $value->pettycashi_id; ?> btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmats<?php echo $value->pettycashi_id; ?>"><i class="icon-search4"></i></button>
                                                </span>
                                              </div>

                                            </div>
                                            <div class="col-xs-6">
                                              <label for="">รายการต้นทุน</label>
                                              <div class="input-group">
                                                <input type="text" id="vcostcode<?php echo $value->pettycashi_id; ?>" readonly="true" value="<?php echo $value->pettycashi_costcode; ?>"
                                                  placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                                <input type="text" id="list<?php echo $value->pettycashi_id; ?>" readonly="true" value="<?php echo $value->pettycashi_costname; ?>"
                                                  placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                                <span class="input-group-btn">
                                                  <?php if($controlbg == '1'){ ?>
                                                  <button type="button" class="modalcost btn btn-default btn-icon" data-toggle="modal" data-target="#costcode"><i class="icon-search4"></i></button>
                                                  <?php }else{ ?>
                                                  <button type="button" class="btn btn-default btn-icon" id="selectcostcodeboq<?php echo $value->pettycashi_id; ?>" data-toggle="modal" data-target="#boq_con<?php echo $value->pettycashi_id; ?>"><span class="glyphicon glyphicon-search"></span></button>
                                                <?php } ?>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-md-3" id="type_costhide<?php echo $n; ?>" style="">
                                                <div class="form-group">
                                                  <label>Type of Cost </label>
                                                  <select name="type_cost" id="type_cost<?php echo $value->pettycashi_id; ?>" class="form-control" value="<?php echo $value->type_cost; ?>">
                                                  <option value=""></option>
                                                      <option value="1">MATERIAL</option>
                                                      <option value="2">LABOR</option>
                                                      <option value="3">SUB CON</option>
                                                    
                                                      </select>
                                                </div>
                                              </div>
                                          </div>
                                          <!-- <div class="row"> -->
                                              <hr>
                                            <!-- </div> -->
                                    <div id="closebg<?php echo $value->pettycashi_id; ?>">
                                          <div class="row">
                                            <div class="col-xs-12">
                                              <label for="">ร้านค้า</label>
                                              <div class="input-group">
                                                <input type="text" class="form-control typeahead-remote" placeholder="กรอกชื่อร้านค้า" value="<?php echo $value->pettycashi_vender; ?>"
                                                  name="vender" id="vender<?=$value->pettycashi_id;?>">
                                                <span class="input-group-btn">
                                                  <button type="button" class="btn btn-default btn-icon add_id_tomodal" peid="<?=$value->pettycashi_id;?>" data-toggle="modal" data-target="#openven"><i class="icon-search4"></i></button>
                                                </span>
                                              </div>
                                              <!-- /input-group -->
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12" style="margin-top:10px;">
                                              <div class="form-group">
                                                <label for="addrvender">ที่อยู่ร้านค้า</label>
                                                <input type="text" id="addrvender<?=$value->pettycashi_id;?>" name="addrvender" value="<?php echo $value->pettycashi_addrvender; ?>"
                                                  placeholder="กรอกร้านค้า" class="form-control">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12">
                                              <div class="form-group">
                                                <label for="adddes">รายละเอียดเพิ่มเติม</label>
                                                <input type="text" name="adddes" id="adddes<?=$value->pettycashi_id;?>" placeholder="ระบุรายละเอียดเพิ่มเติม" class="form-control"
                                                  value="<?php echo $value->pettycashi_description; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-5">
                                              <label for="">Ref. Asset Code</label>
                                              <div class="input-group">
                                                <input type="hidden" id="accode<?=$value->pettycashi_id;?>" name="accode" readonly="true" class="form-control input-sm"
                                                  value="<?php echo $value->petty_assetid; ?>">
                                                <input type="text" id="acname<?=$value->pettycashi_id;?>" name="acname" readonly="true" class="form-control input-sm"
                                                  value="<?php echo $value->petty_assetname; ?>">
                                                <input type="hidden" id="statusass<?=$value->pettycashi_id;?>" name="statusass" readonly="true" class="form-control input-sm"
                                                  value="<?php echo $value->petty_asset; ?>">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-info btn-sm refasset<?=$value->pettycashi_id;?>" data-toggle="modal" data-target="#refass<?=$value->pettycashi_id;?>"><span class="glyphicon glyphicon-search"></span>ค้นหา</button>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <br>

                                          <div class="row">
                                            <div class="col-xs-2">
                                              <div class="form-group">
                                                <label for="unitprice">ราคา</label>
                                                <input type="number" id="unitprice<?php echo $value->pettycashi_id; ?>" name="unitprice" value="<?php echo $value->pettycashi_unitprice; ?>"
                                                  placeholder="กรอกราคาต่อหน่วย" class="form-control">
                                                  <input type="hidden" id="old<?=$n;?>">
                                              </div>
                                            </div>
                                            
                                  
                                            <div class="col-xs-2">
                                              <label for="">ภาษี</label>
                                              <div class="input-group">
                                                <input type="text" class="taxdate form-control input-sm" id="taxvv<?php echo $value->pettycashi_id; ?>" name="taxvvi" value="<?php echo $value->pettycashi_vatt; ?>"
                                                  placeholder="ภาษี" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">%</span>
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <div class="form-group">
                                                <label for="addrvender">จำนวนเงิน(vat)</label>
                                                <input type="number" id="netamt<?php echo $value->pettycashi_id; ?>" name="netamt" value="<?php echo $value->pettycashi_netamt; ?>"
                                                  placeholder="กรอกจำนวนเงิน" class="form-control">
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <div class="form-group">
                                                <label>วันที่จ่าย</label>
                                                <input type="date" id="paydate<?php echo $value->pettycashi_id; ?>" name="payday" class="form-control" value="<?php echo $value->pettycashi_paydate; ?>">
                                              </div>
                                            </div>
                                          </div>
                                            <?php if($controlbg=="2") {?>
                                      <div class="row">
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <label>Budget Control</label>
                                                <input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost<?php echo $value->pettycashi_id; ?>" value=""  readonly="">
                                            </div>
                                        </div>
                                      </div>
                                      <?php }?>
                                          <div class="row">
                                            <div class="col-xs-3">
                                              <label for="dod">Invoice/Receipt No.</label>
                                              <input type="text" id="dod<?php echo $value->pettycashi_id; ?>" name="dod" class="form-control" value="<?php echo $value->pettycashi_dod ?>">
                                            </div>
                                            <div class="col-xs-3">
                                              <label for="dodate">Invoice/Receipt Date</label>
                                              <input type="date" id="dodate<?php echo $value->pettycashi_id; ?>" name="dodate" class="form-control" value="<?php echo $value->pettycashi_dodate; ?>">
                                            </div>
                                            <div class="col-xs-3">
                                              <label for="dodate">TAX ID</label>
                                              <input type="text" maxlength="13" id="taxidddd<?php echo $value->pettycashi_id; ?>" name="taxid" readonly="true" value="<?php echo $value->pettycashi_taxid; ?>"
                                                class="form-control">
                                              <input type="hidden" id="typeven<?php echo $value->pettycashi_id; ?>" name="typeven" readonly="true" value="" class="form-control">
                                            </div>
                                          </div><br>
                                          <div class="row">
                                            <div class="col-xs-3">
                                              <?php if ($value->pettycashi_vatflag == "Y") {?>
                                              <input type="checkbox" checked id="chktax<?php echo $value->pettycashi_id; ?>"> ใบกำกับภาษี
                                              <input type="hidden" id="intputchktax<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_vatflag; ?>">
                                              <?php } else {?>
                                              <input type="checkbox" id="chktax<?php echo $value->pettycashi_id; ?>"> ใบกำกับภาษี
                                              <input type="hidden" id="intputchktax<?php echo $value->pettycashi_id; ?>">
                                              <?php }?>
                                            </div>
                                            <div class="col-xs-3">
                                              <?php if ($value->pettycashi_taxflag == "Y") {?>
                                              <input type="checkbox" checked id="whchktax<?php echo $value->pettycashi_id; ?>"> หัก
                                              ณ ที่จ่าย
                                              <input type="hidden" id="intputwhchktax<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_taxflag; ?>">
                                              <?php } else {?>
                                              <input type="checkbox" id="whchktax<?php echo $value->pettycashi_id; ?>"> หัก ณ ที่จ่าย
                                              <input type="hidden" id="intputwhchktax<?php echo $value->pettycashi_id; ?>">
                                              <?php }?>
                                            </div>
                                          </div>
                                          <div class="row" id="taxchk<?php echo $value->pettycashi_id; ?>">
                                            <div class="col-xs-3">
                                              <div class="form-group">
                                                <label for="">เลขที่ใบกำกับภาษี</label>
                                                <input type="text" class="form-control input-sm" id="taxno<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_invno; ?>"
                                                  placeholder="กรอกใบกำกับภาษี">
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <div class="form-group">
                                                <label for="">วันที่ใบกำกับภาษี</label>
                                                <input type="text" class="taxdate form-control" data-mask="9999-99-99" id="taxdate<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_invdate; ?>"
                                                  placeholder="กรอกใบกำกับภาษี">
                                                <span class="help-block">2015-01-30</span>
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <label for="">ภาษี</label>
                                              <div class="input-group">
                                                <input type="text" class="taxdate form-control input-sm" id="taxv<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_vat; ?>"
                                                  readonly="true" placeholder="ภาษี" aria-describedby="basic-addon2">
                                                <span class="input-group-addon" id="basic-addon2">%</span>
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <div class="from-group">
                                                <label for="">จำนวนภาษี</label>
                                                <input type="text" class="taxdate form-control input-sm" id="totvat<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pattycashi_totvat; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row" id="whtaxchk<?php echo $value->pettycashi_id; ?>">
                                            <div class="col-xs-3">
                                              <div class="form-group">
                                                <label type="tax"> หักภาษี ณ ที่จ่าย</label>
                                                <select class="form-control input-sm" name="tax" id="tax<?php echo $value->pettycashi_id; ?>">
                                                    <?php if ($value->pettycashi_wh == '0') {?><option value="0" selected>ไม่มีหัก</option><?php } else {?><option value="0">ไม่มีหัก</option><?php }?>
                                                    <?php if ($value->pettycashi_wh == '3') {?><option value="3" selected>ค่าบริการ 3%</option><?php } else {?><option value="3">ค่าบริการ 3%</option><?php }?>
                                                    <?php if ($value->pettycashi_wh == '1') {?><option value="1" selected>ค่าขนส่ง 1%</option><?php } else {?><option value="1">ค่าขนส่ง 1%</option><?php }?>
                                                    <?php if ($value->pettycashi_wh == '5') {?><option value="5" selected>ค่าเช่า 5%</option><?php } else {?><option value="5">ค่าเช่า 5%</option><?php }?>
                                                    <?php if ($value->pettycashi_wh == '2') {?><option value="2" selected>ค่าโฆษณา 2%</option><?php } else {?><option value="2">ค่าโฆษณา 2%</option><?php }?>
                                                    <?php if ($value->pettycashi_wh == '15') {?><option value="15" selected>ดอกเบี้ยจ่าย 15%</option><?php } else {?><option value="15">ดอกเบี้ยจ่าย 15%</option><?php }?>
                                                  </select>
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <div class="form-group">
                                                <label for=""> ยอดหัก ณ ที่จ่าย</label>
                                                <input type="text" class="form-control input-sm" id="totwh<?php echo $value->pettycashi_id; ?>" value="<?php echo $value->pettycashi_totwh; ?>"
                                                  placeholder="ยอดหัก ณ ที่จ่าย">
                                              </div>
                                            </div>
                                            <div class="form-group col-xs-3">
                                              <label for="">Tax Type</label>
                                              <div class="form-group">
                                                <select name="taxtype" id="taxtype" class="form-control">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">ภ.ง.ด. 1</option>
                                                    <option value="2">ภ.ง.ด. 1ก พิเศษ</option>
                                                    <option value="3">ภ.ง.ด.  2</option>
                                                    <option value="4">ภ.ง.ด. 2ก</option>
                                                    <option value="5">ภ.ง.ด.  3</option>
                                                    <option value="6">ภ.ง.ด. 3ก</option>
                                                    <option value="7">ภ.ง.ด. 53</option>
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row" id="whtaxchkk<?php echo $value->pettycashi_id; ?>">
                                            <div class="col-xs-12">
                                              <label for="">ร้านค้า</label>
                                              <div class="input-group">
                                                <input type="text" class="form-control typeahead-remote" placeholder="กรอกชื่อร้านค้า" name="venderwt" id="venderwt<?php echo $value->pettycashi_id; ?>"
                                                  value="<?php echo $value->pettycashi_venderwt; ?>">
                                                <span class="input-group-btn">
                                                    <button type="button" class="modalcost btn btn-default btn-icon" data-toggle="modal" data-target="#openvenwt"><i class="icon-search4"></i></button>
                                                  </span>
                                              </div>
                                              <!-- /input-group -->
                                            </div>
                                          </div>
                                          <div class="row" id="whtaxchkkk<?php echo $value->pettycashi_id; ?>">
                                            <div class="col-xs-12" style="margin-top:10px;">
                                              <div class="form-group">
                                                <label for="addrvender">ที่อยู่ร้านค้า</label>
                                                <input type="text" id="addrvenderwt<?php echo $value->pettycashi_id; ?>" name="addrvenderwt" placeholder="กรอกร้านค้า" class="form-control"
                                                  value="<?php echo $value->pettycashi_addrvenderwt; ?>">
                                              </div>
                                            </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-xs-2">
                                              <div class="form-group">
                                                <label for="addrvender">จำนวนเงิน</label>
                                                <input type="number" id="amttot<?php echo $value->pettycashi_id; ?>" name="amttot" value="<?php echo $value->pettycashi_amounttot; ?>"
                                                  placeholder="กรอกจำนวนเงิน" class="form-control">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 text-right">
                                              <div class="form-group">
                                                <button type="button" id="edittorow<?php echo $value->pettycashi_id; ?>" class="opdetail btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                      </div>

                                    
                                    </div>
                                  </div>

                                  <script>
                                      $('#type_cost<?php echo $value->pettycashi_id; ?>').val("<?php echo $value->type_cost; ?>");
                                      
                                            if(<?php echo $value->type_cost; ?>=="1"){
                                              var pamount = parseFloat($('#unitprice<?php echo $value->pettycashi_id; ?>').val());
                                              var costbgmat = parseFloat($('#costbgmat<?php echo $value->pettycashi_costcode; ?>').val());
                                              $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbgmat+pamount);
                                            }else if(<?php echo $value->type_cost; ?>=="2"){
                                              var pamount = parseFloat($('#unitprice<?php echo $value->pettycashi_id; ?>').val());
                                              var costbglebour = parseFloat($('#costbglebour<?php echo $value->pettycashi_costcode; ?>').val());
                                              $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbglebour+pamount);
                                            }else if(<?php echo $value->type_cost; ?>=="3"){
                                              var pamount = parseFloat($('#unitprice<?php echo $value->pettycashi_id; ?>').val());
                                              var costbgsub = parseFloat($('#costbgsub<?php echo $value->pettycashi_costcode; ?>').val());
                                              $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbgsub+pamount);
                                            }
                                      

                                            var type_cost = $("#type_cost<?php echo $value->pettycashi_id; ?>").val();
                                          var codecostcodeint = $('#vcostcode<?php echo $value->pettycashi_id; ?>').val();
                                            var ckkcontrolbg = $('#ckkcontrolbg').val();

                                      $('#type_cost<?php echo $value->pettycashi_id; ?>').change(function(event) {
                                      var codecostcodeint = $('#vcostcode<?php echo $value->pettycashi_id; ?>').val();
                                      var type_cost = $('#type_cost<?php echo $value->pettycashi_id; ?>').val();


                                      if(type_cost=="1"){
                                      
                                      $("#closebg<?php echo $value->pettycashi_id; ?>").show();
                                        if(ckkcontrolbg==2){
                                            var costbgmat =  $('#costbgmat'+codecostcodeint+'').val();
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbgmat);
                                          
                                          
                                            
                                            if(isNaN(costbgmat)){
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(0);
                                              swal({
                                          title: "Over budget.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                          });
                                          $("#closebg<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#unitprice<?php echo $value->pettycashi_id; ?>").val('0');
                                          $("#type_cost<?php echo $value->pettycashi_id; ?>").val('0');  
                                          
                                            } 
                                            
                                          }
                                      }else if(type_cost=="2"){
                                        
                                      $("#closebg<?php echo $value->pettycashi_id; ?>").show();
                                          if(ckkcontrolbg==2){
                                            var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbglebour);
                                          
                                            
                                            if(isNaN(costbglebour)){
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(0);
                                              swal({
                                          title: "Over budget.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                          });
                                          $("#closebg<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#unitprice<?php echo $value->pettycashi_id; ?>").val('0');
                                          $("#type_cost<?php echo $value->pettycashi_id; ?>").val('0');  
                                          
                                            } 
                                            
                                          }
                                      }else if(type_cost=="3"){
                                      $("#closebg<?php echo $value->pettycashi_id; ?>").show();
                                          if(ckkcontrolbg==2){
                                            var costbgsub =  $('#costbgsub'+codecostcodeint+'').val();
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbgsub);
                                          
                                            if(isNaN(costbgsub)){
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(0);
                                              swal({
                                          title: "Over budget.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                          });
                                          $("#closebg<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#unitprice<?php echo $value->pettycashi_id; ?>").val('0');
                                          $("#type_cost<?php echo $value->pettycashi_id; ?>").val('0');  
                                          
                                            }
                                          }
                                      }else{
                                      $('#closebg').hide();
                                      }
                                      });
                                      </script>


                                  <!--  -->
                                  <div class="modal fade" id="boq_con<?php echo $value->pettycashi_id; ?>" data-backdrop="false">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header bg-info">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row" id="modal_boq<?php echo $value->pettycashi_id; ?>"></div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <script>
                                    $('#selectcostcodeboq<?php echo $value->pettycashi_id; ?>').click(function () {
                                      var system = $('#system').val();
                                        $('#closebg<?php echo $value->pettycashi_id; ?>').hide();
                                        $('#type_cost<?php echo $value->pettycashi_id; ?>').val("");
                                      $('#modal_boq<?php echo $value->pettycashi_id; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                                      $("#modal_boq<?php echo $value->pettycashi_id; ?>").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/' +system+'/<?php echo $value->pettycashi_id; ?>');
                                    });
                                  </script>
                                  
                                  <div id="opnewmats<?php echo $value->pettycashi_id; ?>" class="modal fade" data-backdrop="false">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content ">
                                        <div class="modal-header bg-info">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">เพิ่มรายการ</h5>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row" id="modal_mat<?php echo $value->pettycashi_id; ?>"></div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- matcode-->
                                  </div>

                                  <script>
                                    $(".openun<?php echo $value->pettycashi_id; ?>").click(function () {
                                      $('#modal_mat<?php echo $value->pettycashi_id; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                                      $("#modal_mat<?php echo $value->pettycashi_id; ?>").load('<?php echo base_url(); ?>share/expensother_m/' +<?php echo $value->pettycashi_id; ?>);
                                    });
                                  </script>

                                  <div class="modal fade" id="refass<?=$value->pettycashi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header bg-info">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row" id="refasscode<?=$value->pettycashi_id;?>">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <script>
                                  $('.refasset<?=$value->pettycashi_id;?>').click(function(){
                                  $('#refasscode<?=$value->pettycashi_id;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                  $("#refasscode<?=$value->pettycashi_id;?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?=$value->pettycashi_id;?>');
                                  });
                                </script>
                                  <script>
                                    $(document).on('click', '#delete<?php echo $value->pettycashi_id; ?>', function () { // <-- changes
                                    // alert(555);
                                    var _renum = 0;
                                    var po_boqq = 0;
                                    var _po_boq = $(this).attr("po-boq");
                                    var num_ = $(this).attr('return-del')*1;
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
                                          onClick: function ($noty) { //this = button element, $noty = $noty element
                                            $noty.close();
                                            self.closest('tr').remove();
                                            _renum = num_;
                                            po_boqq = _po_boq;
                                            // alert(_renum+" "+po_boqq);

                                              var url = "<?php echo base_url(); ?>pettycash_active/delpettycashdetail";
                                              var dataSet = {
                                                id: "<?php echo $value->pettycashi_id; ?>",
                                                ref: "<?php echo $value->pettycashi_ref; ?>"
                                              };
                                              $.post("<?php echo base_url(); ?>pettycash_active/return_to_balance", { price_re: _renum, boq_id:po_boqq}, function () {
                                              });
                                              $.post(url, dataSet, function (data) {
                                                // setTimeout(function () {
                                                  location.reload();
                                                // }, 1000);
                                              });
                                              
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
                                          onClick: function ($noty) {
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
                                  </script>
                                  <script>
                                    $('#tax<?php echo $value->pettycashi_id; ?>').change(function (event) {
                                      var tax = $("#tax<?php echo $value->pettycashi_id; ?>").val();
                                      var def = $("#unitprice<?php echo $value->pettycashi_id; ?>").val();
                                      $("#unitprice<?php echo $value->pettycashi_id; ?>").val(def);
                                      switch (tax) {
                                        case '0':
                                          var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                          var netamtt = parseFloat($("#netamt<?php echo $value->pettycashi_id; ?>").val());
                                          var amount = parseFloat($('#netamt<?php echo $value->pettycashi_id; ?>').val());
                                          var totwh = parseFloat($('#totwh<?php echo $value->pettycashi_id; ?>').val());
                                          var c0 = unitprice + netamtt;
                                          $('#amttot<?php echo $value->pettycashi_id; ?>').val(c0);
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val(net);;
                                          break;
                                        case '1':
                                          var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                          var amount = parseFloat($('#netamt<?php echo $value->pettycashi_id; ?>').val());
                                          var totwh = parseFloat($('#totwh<?php echo $value->pettycashi_id; ?>').val());
                                          var net = (unitprice * 1) / 100;
                                          var totwhtax = (unitprice + net) - amount;
                                          var c1 = unitprice + amount;
                                          var c11 = c1 - net;
                                          $('#amttot<?php echo $value->pettycashi_id; ?>').val(c11);
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val(net);
                                          break;
                                        case '2':
                                          var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                          var amount = parseFloat($('#netamt<?php echo $value->pettycashi_id; ?>').val());
                                          var totwh = parseFloat($('#totwh<?php echo $value->pettycashi_id; ?>').val());
                                          var net = (unitprice * 2) / 100;
                                          var totwhtax = (unitprice + net) - amount;
                                          var c2 = unitprice + amount;
                                          var c21 = c2 - net;
                                          $('#amttot<?php echo $value->pettycashi_id; ?>').val(c21);
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val(net);
                                          break;
                                        case '3':
                                          var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                          var amount = parseFloat($('#netamt<?php echo $value->pettycashi_id; ?>').val());
                                          var totwh = parseFloat($('#totwh<?php echo $value->pettycashi_id; ?>').val());
                                          var net = (unitprice * 3) / 100;
                                          var totwhtax = (unitprice + net) - amount;
                                          var c3 = unitprice + amount;
                                          var c31 = c3 - net;
                                          $('#amttot<?php echo $value->pettycashi_id; ?>').val(c31);
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val(net);
                                          break;
                                        case '5':
                                          var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                          var amount = parseFloat($('#netamt<?php echo $value->pettycashi_id; ?>').val());
                                          var totwh = parseFloat($('#totwh<?php echo $value->pettycashi_id; ?>').val());
                                          var net = (unitprice * 5) / 100;
                                          var totwhtax = (unitprice + net) - amount;
                                          var c5 = unitprice + amount;
                                          var c51 = c5 - net;
                                          $('#amttot<?php echo $value->pettycashi_id; ?>').val(c51);
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val(net);
                                          break;
                                        case '15':
                                          var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                          var amount = parseFloat($('#netamt<?php echo $value->pettycashi_id; ?>').val());
                                          var totwh = parseFloat($('#totwh<?php echo $value->pettycashi_id; ?>').val());
                                          var net = (unitprice * 15) / 100;
                                          var totwhtax = (unitprice + net) - amount;
                                          var c15 = unitprice + amount;
                                          var c615 = c15 - net;
                                          $('#amttot<?php echo $value->pettycashi_id; ?>').val(c615);
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val(net);
                                          break;
                                      }
                                      // var amount = $("#amount<?php echo $value->pettycashi_id; ?>").val();
                                      // var unitprice = $("#unitprice<?php echo $value->pettycashi_id; ?>").val();
                                      // var net = $("#netamt<?php echo $value->pettycashi_id; ?>").val();
                                      // var whtot = $("#totwh<?php echo $value->pettycashi_id; ?>").val();
                                      // var tot = (amount*unitprice)-whtot;
                                      // $('#netamt<?php echo $value->pettycashi_id; ?>').val(totamount);
                                    });
                                  </script>
                                  <script>
                                    $("#unitprice<?php echo $value->pettycashi_id; ?>").keyup(function () {
                                      var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                      var taxvv = parseFloat($("#taxvv<?php echo $value->pettycashi_id; ?>").val());
                                      var sum = (unitprice * taxvv) / 100;
                                      var tt = (unitprice + sum);
                                      var ckkcontrolbg = $("#ckkcontrolbg").val();
                                                      //alert(ckkcontrolbg);
                                            if(ckkcontrolbg=="2"){
                                            //alert(ckkcontrolbg);
                                            var type_cost = $("#type_cost<?php echo $value->pettycashi_id; ?>").val();

                                          var codecostcodeint = $('#vcostcode<?php echo $value->pettycashi_id; ?>').val();
                                            if(type_cost==1){
                                            var controlmat = $('#controlmat'+codecostcodeint+'').val();
                                            if(controlmat=="1"){
                                            var costbg = parseFloat($('#costbgmat'+codecostcodeint+'').val().replace(/,/g,""));
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbg-unitprice);
                                            //alert(totalcost);
                                            var totalcost = parseFloat($('#totalcost<?php echo $value->pettycashi_id; ?>').val().replace(/,/g,""));
                                            var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
                                            if (parseFloat(totalcost) < parseFloat("0")) {
                                            swal({
                                            title: "Over budjet",
                                            text: "",
                                            confirmButtonColor: "#EA1923",
                                            type: "error"
                                            });
                                            $("#pprice_unit<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#pdisamt<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#pamount<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#totalcost<?php echo $value->pettycashi_id; ?>").val(costcodecc);
                                            $("#amttot<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#unitprice<?php echo $value->pettycashi_id; ?>").val('0');
                                            }
                                            }
                                            }else if(type_cost==2){
                                            var controllebour = $('#controllebour'+codecostcodeint+'').val();
                                                  if(controllebour=="1"){
                                            var costbg = parseFloat($('#costbglebour'+codecostcodeint+'').val().replace(/,/g,""));
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbg-unitprice);
                                            //alert(totalcost);
                                            var totalcost = parseFloat($('#totalcost<?php echo $value->pettycashi_id; ?>').val().replace(/,/g,""));
                                            var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
                                            if (parseFloat(totalcost) < parseFloat("0")) {
                                            swal({
                                            title: "Over budjet",
                                            text: "",
                                            confirmButtonColor: "#EA1923",
                                            type: "error"
                                            });
                                            $("#pprice_unit<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#pdisamt<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#pamount<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#totalcost<?php echo $value->pettycashi_id; ?>").val(costcodecc);
                                            $("#amttot<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#unitprice<?php echo $value->pettycashi_id; ?>").val('0');
                                            }
                                          }
                                        }else if(type_cost==3){
                                            var controlsub = $('#controlsub'+codecostcodeint+'').val();
                                                  if(controlsub=="1"){
                                            var costbg = parseFloat($('#costbgsub'+codecostcodeint+'').val().replace(/,/g,""));
                                            $('#totalcost<?php echo $value->pettycashi_id; ?>').val(costbg-unitprice);
                                            //alert(totalcost);
                                            var totalcost = parseFloat($('#totalcost<?php echo $value->pettycashi_id; ?>').val().replace(/,/g,""));
                                            var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
                                            if (parseFloat(totalcost) < parseFloat("0")) {
                                            swal({
                                            title: "Over budjet",
                                            text: "",
                                            confirmButtonColor: "#EA1923",
                                            type: "error"
                                            });
                                            $("#pprice_unit<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#pdisamt<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#pamount<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#totalcost<?php echo $value->pettycashi_id; ?>").val(costcodecc);
                                            $("#amttot<?php echo $value->pettycashi_id; ?>").val('0');
                                            $("#unitprice<?php echo $value->pettycashi_id; ?>").val('0');
                                            }
                                          }
                                        }  //if parseFloa
                                      }// if ckkcontrolbg
                                      $("#netamt<?php echo $value->pettycashi_id; ?>").val(sum);
                                      $("#amttot<?php echo $value->pettycashi_id; ?>").val(tt);
                                    });
                                    $('#taxvv<?php echo $value->pettycashi_id; ?>').keyup(function (event) {
                                      // var vat = ((parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val())*parseFloat($("#unitprice").val())))*parseFloat($("#taxv<?php echo $value->pettycashi_id; ?>").val())/100 || 0;
                                      // var wh = parseFloat($("#totwh<?php echo $value->pettycashi_id; ?>").val());
                                      // var sum  = (parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val())*parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val())) || 0;
                                      // var tot = (sum+vat)-wh || 0;
                                      // $("#netamt<?php echo $value->pettycashi_id; ?>").val(tot);
                                      var unitprice = parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val());
                                      var taxvv = parseFloat($("#taxvv<?php echo $value->pettycashi_id; ?>").val());
                                      var sum = (unitprice * taxvv) / 100;
                                      var tt = (unitprice - sum);
                                      $("#netamt<?php echo $value->pettycashi_id; ?>").val(sum);
                                      $("#amttot<?php echo $value->pettycashi_id; ?>").val(tt);
                                    });
                                  </script>
                                  <script>
                                    $("#cc<?=$n?>").click(function(){
                                      // var p_olld = $("#old<?=$n?>").val()*1;
                                      var begin_cost = $("#cost_begin<?=$n;?>").val()*1;
                                      // alert(begin_cost);
                                      var bboq_ =$("#boq_id<?=$n;?>").val();
                                      // var re_cosst = bboq_ - p_olld;
                                      $("#costbg"+bboq_).val(begin_cost);
                                    });
                                    $("#edit<?php echo $value->pettycashi_id; ?>").click(function () {

                                      var pamount = parseFloat($('#unitprice<?php echo $value->pettycashi_id; ?>').val());
                                var codecostcodeint = $('#vcostcode<?php echo $value->pettycashi_id; ?>').val();
                                var type_cost = $('#type_cost<?php echo $value->pettycashi_id; ?>').val();
                                
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


                                      var price_old = $(this).attr('price-old')*1;
                                      var boq_id_re = $(this).attr("po-boq");
                                      // var boq_id_re = $("#boq_id<?=$n;?>").val();
                                      // alert(boq_id_re);
                                      //atiwat
                                      var cost_price = $("#costbg"+boq_id_re).val()*1;
                                      var re_cost =cost_price + price_old;
                                      $("#cost_begin<?=$n ?>").val(cost_price);
                                      $("#costbg"+boq_id_re).val(re_cost);
                                      $("#xpd<?=$n ?>").val(re_cost);
                                      // $.post("<?php echo base_url(); ?>pettycash/return_price_old/"+price_old+"/"+boq_id_re, function (){
                                      // });
                                      // alert(price_old);
                                      $("#old<?=$n;?>").val(price_old);
                                      if ($('#chktax<?php echo $value->pettycashi_id; ?>').prop('checked')) {
                                        $("#taxchk<?php echo $value->pettycashi_id; ?>").show();
                                      } else {
                                        $("#taxchk<?php echo $value->pettycashi_id; ?>").hide();
                                      }
                                      if ($("#whchktax<?php echo $value->pettycashi_id; ?>").prop('checked')) {
                                        $("#whtaxchk<?php echo $value->pettycashi_id; ?>").show();
                                        $("#whtaxchkk<?php echo $value->pettycashi_id; ?>").show();
                                        $("#whtaxchkkk<?php echo $value->pettycashi_id; ?>").show();
                                      } else {
                                        $("#whtaxchk<?php echo $value->pettycashi_id; ?>").hide();
                                        $("#whtaxchkk<?php echo $value->pettycashi_id; ?>").hide();
                                        $("#whtaxchkkk<?php echo $value->pettycashi_id; ?>").hide();
                                        $('#venderwt<?php echo $value->pettycashi_id; ?>').val('-');
                                        $('#addrvenderwt<?php echo $value->pettycashi_id; ?>').val('-');
                                      }
                                    });
                                    $('#chk<?php echo $value->pettycashi_id; ?>').click(function (event) {
                                      if ($('#chk<?php echo $value->pettycashi_id; ?>').prop('checked')) {
                                        $('#newmatname<?php echo $value->pettycashi_id; ?>').prop('disabled', false);
                                      } else {
                                        $('#newmatname<?php echo $value->pettycashi_id; ?>').prop('disabled', true);
                                      }
                                    });
                                    $('#chktax<?php echo $value->pettycashi_id; ?>').click(function (event) {
                                      if ($('#chktax<?php echo $value->pettycashi_id; ?>').prop('checked')) {
                                        $("#taxchk<?php echo $value->pettycashi_id; ?>").show();
                                        $('#intputchktax<?php echo $value->pettycashi_id; ?>').val("Y");
                                        $("#taxchk<?php echo $value->pettycashi_id; ?>").show();
                                        $("#taxv<?php echo $value->pettycashi_id; ?>").val('7');
                                        var vat = ((parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                            parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val()))) *
                                          parseFloat($("#taxv<?php echo $value->pettycashi_id; ?>").val()) / 100 || 0;
                                        var wh = parseFloat($("#totwh<?php echo $value->pettycashi_id; ?>").val());
                                        var sum = (parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                          parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val())) || 0;
                                        var tot = (sum + vat) - wh || 0;
                                        // $("#netamt<?php echo $value->pettycashi_id; ?>").val(tot);
                                        $('#totvat<?php echo $value->pettycashi_id; ?>').val(vat);
                                      } else {
                                        $('#intputchktax<?php echo $value->pettycashi_id; ?>').val("");
                                        $("#taxchk<?php echo $value->pettycashi_id; ?>").hide();
                                        var vat = ((parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                            parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val()))) *
                                          parseFloat($("#taxv<?php echo $value->pettycashi_id; ?>").val()) / 100 || 0;
                                        var wh = parseFloat($("#totwh<?php echo $value->pettycashi_id; ?>").val());
                                        var sum = (parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                          parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val())) || 0;
                                        var tot = (sum + vat) - wh || 0;
                                        var totvat = tot - vat;
                                        // $("#netamt<?php echo $value->pettycashi_id; ?>").val(totvat);
                                        $('#totvat<?php echo $value->pettycashi_id; ?>').val("0");
                                      }
                                    });
                                    $('#whchktax<?php echo $value->pettycashi_id; ?>').click(function (event) {
                                      if ($('#whchktax<?php echo $value->pettycashi_id; ?>').prop('checked')) {
                                        $("#whtaxchk<?php echo $value->pettycashi_id; ?>").show();
                                        $("#whtaxchkk<?php echo $value->pettycashi_id; ?>").show();
                                        $("#whtaxchkkk<?php echo $value->pettycashi_id; ?>").show();
                                        $('#intputwhchktax<?php echo $value->pettycashi_id; ?>').val("Y");
                                      } else {
                                        if ($('#chktax<?php echo $value->pettycashi_id; ?>').prop('checked')) {
                                          $("#whtaxchk<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#whtaxchkk<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#whtaxchkkk<?php echo $value->pettycashi_id; ?>").hide();
                                          $('#intputwhchktax<?php echo $value->pettycashi_id; ?>').val("");
                                          var vat = ((parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                              parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val()))) *
                                            parseFloat($("#taxv<?php echo $value->pettycashi_id; ?>").val()) / 100 || 0;
                                          var netamt = parseFloat($("#netamt<?php echo $value->pettycashi_id; ?>").val());
                                          var wh = parseFloat($("#totwh<?php echo $value->pettycashi_id; ?>").val());
                                          var sum = (parseFloat($("#amount").val()) * parseFloat($(
                                            "#unitprice<?php echo $value->pettycashi_id; ?>").val())) || 0;
                                          var tot = netamt + wh || 0;
                                          // $("#netamt<?php echo $value->pettycashi_id; ?>").val(tot);
                                          $("#tax<?php echo $value->pettycashi_id; ?>").val("0");
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val('0');
                                        } else {
                                          $("#whtaxchk<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#whtaxchkk<?php echo $value->pettycashi_id; ?>").hide();
                                          $("#whtaxchkkk<?php echo $value->pettycashi_id; ?>").hide();
                                          $('#intputwhchktax<?php echo $value->pettycashi_id; ?>').val("");
                                          var vat = ((parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                              parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val()))) *
                                            parseFloat($("#taxv<?php echo $value->pettycashi_id; ?>").val()) / 100 || 0;
                                          var netamt = parseFloat($("#netamt<?php echo $value->pettycashi_id; ?>").val());
                                          var wh = parseFloat($("#totwh<?php echo $value->pettycashi_id; ?>").val());
                                          var sum = (parseFloat($("#amount<?php echo $value->pettycashi_id; ?>").val()) *
                                            parseFloat($("#unitprice<?php echo $value->pettycashi_id; ?>").val())) || 0;
                                          var tot = netamt + wh || 0;
                                          // $("#netamt<?php echo $value->pettycashi_id; ?>").val(tot);
                                          $("#tax<?php echo $value->pettycashi_id; ?>").val("0");
                                          $('#totwh<?php echo $value->pettycashi_id; ?>').val('0');
                                          $('#venderwt<?php echo $value->pettycashi_id; ?>').val('-');
                                          $('#addrvenderwt<?php echo $value->pettycashi_id; ?>').val('-');
                                        }
                                      }
                                    });
                                  </script>
                                  <script>
                                    $("#edittorow<?php echo $value->pettycashi_id; ?>").click(function () {
                                      if ($("#taxidddd<?php echo $value->pettycashi_id; ?>").val() == "" && $(
                                          "#typeven<?php echo $value->pettycashi_id; ?>").val() == "external") {
                                        swal({
                                          title: "กรุณาหรอก Tax Id!!.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                        });
                                      } else if ($("#vcostcode<?php echo $value->pettycashi_id; ?>").val() == "") {
                                        swal({
                                          title: "กรุณาเลือก รายการต้นทุน!!.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                        });
                                      } else if ($("#newmatcode<?php echo $value->pettycashi_id; ?>").val() == "") {
                                        swal({
                                          title: "กรุณาเลือก รายการซื้อ!!.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                        });
                                      } else if ($("#unitprice<?php echo $value->pettycashi_id; ?>").val() == "") {
                                        swal({
                                          title: "กรุณากรอก จำนวนเงิน!!.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                        });
                                      } else {
                                        var pc_id  = '<?php echo $value->pettycashi_id; ?>';
                                      
                                        var url = "<?= base_url() ?>pettycash_active/edittorow/"+pc_id+"";
                                        var dataSet = {
                                          item: '<?php echo $value->pettycashi_id; ?>',
                                          docno: $('#pcno').val(),
                                          matcodei: $("#newmatcode<?php echo $value->pettycashi_id; ?>").val(),
                                          matnamei: $("#newmatname<?php echo $value->pettycashi_id; ?>").val(),
                                          costcodei: $("#vcostcode<?php echo $value->pettycashi_id; ?>").val(),
                                          costnamei: $("#list<?php echo $value->pettycashi_id; ?>").val(),
                                          venderi: $("#vender<?php echo $value->pettycashi_id; ?>").val(),
                                          addrvenderi: $("#addrvender<?php echo $value->pettycashi_id; ?>").val(),
                                          // qtyi: $("#amount<?php echo $value->pettycashi_id; ?>").val(),
                                          taxnoi: $("#taxno<?php echo $value->pettycashi_id; ?>").val(),
                                          taxdatei: $("#taxdate<?php echo $value->pettycashi_id; ?>").val(),
                                          intputchktaxi: $("#intputchktax<?php echo $value->pettycashi_id; ?>").val(),
                                          intputwhchktaxi: $("#intputwhchktax<?php echo $value->pettycashi_id; ?>").val(),
                                          taxvi: $("#taxv<?php echo $value->pettycashi_id; ?>").val(),
                                          taxvvi: $("#taxvv<?php echo $value->pettycashi_id; ?>").val(),
                                          unitpricei: $("#unitprice<?php echo $value->pettycashi_id; ?>").val(),
                                          uniti: $("#unit<?php echo $value->pettycashi_id; ?>").val(),
                                          amttoti: $("#amttot<?php echo $value->pettycashi_id; ?>").val(),
                                          netamti: $("#netamt<?php echo $value->pettycashi_id; ?>").val(),
                                          totvati: $("#totvat<?php echo $value->pettycashi_id; ?>").val(),
                                          taxi: $("#tax<?php echo $value->pettycashi_id; ?>").val(),
                                          totwhi: $("#totwh<?php echo $value->pettycashi_id; ?>").val(),
                                          description: $("#adddes<?php echo $value->pettycashi_id; ?>").val(),
                                          paydate: $("#paydate<?php echo $value->pettycashi_id; ?>").val(),
                                          dodate: $("#dodate<?php echo $value->pettycashi_id; ?>").val(),
                                          dod: $("#dod<?php echo $value->pettycashi_id; ?>").val(),
                                          ac_code: $("#aaccode<?php echo $value->pettycashi_id; ?>").val(),
                                          venderwt: $("#venderwt<?php echo $value->pettycashi_id; ?>").val(),
                                          addrvenderwt: $("#addrvenderwt<?php echo $value->pettycashi_id; ?>").val(),
                                          accode: $("#accode<?php echo $value->pettycashi_id; ?>").val(),
                                          acname: $("#acname<?php echo $value->pettycashi_id; ?>").val(),
                                          tax: $("#taxidddd<?php echo $value->pettycashi_id; ?>").val(),
                                          statusass: $("#statusass<?php echo $value->pettycashi_id; ?>").val(),
                                        
                                        }
                                    
                                        $.post(url, dataSet, function (data) {
                                          
                                          setTimeout(function () {
                                            // window.location.replace("<?php echo base_url(); ?>pettycash_active/edittorow/"+pc_id+"/"+ data+"");
                                          window.location.href = "<?php echo base_url(); ?>petty_cash/editpettycash/<?php echo $docno; ?>/<?php echo $projid; ?>/<?php echo $fa; ?>";
                                            // window.location.href = "<?php echo base_url(); ?>pettycash_active/edittorow/"+pc_id+"/"+ data;
                                          },);
                                          // alert(data);
                                        });
                                      }
                                    });
                                  </script>
          
                                  <!-- end modal matcode and costcode -->
                                  <?php $n++;
                                        $qty = $qty + $value->pettycashi_amount;
                                        $unitprice = $unitprice + $value->pettycashi_unitprice;
                                        $amouttot = $amouttot + $value->pettycashi_amounttot;
                                        $vattot = $vattot + $value->pattycashi_totvat;
                                        $whtot = $whtot + $value->pettycashi_totwh;
                                        $netamt6 = $netamt6 + $value->pettycashi_netamt;
                                      }?>
                                </tbody>
                                <tr>
                                  <th colspan="4" class="text-center">Total</th>
                                  <td></td>
                                  <th>
                                    <?php echo number_format($unitprice, 2); ?>
                                  </th>
                                  <th></th>
                                  <th>
                                    <?php echo number_format($vattot, 2); ?>
                                  </th>
                                  <td></td>
                                  <th>
                                    <?php echo number_format($whtot, 2); ?>
                                  </th>
                                  <th>
                                    <?php echo number_format($netamt6, 2); ?>
                                  </th>
                                  <td colspan="7"></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                          <div class="panel-body">
                          <div class="text-right">
                            <?php $flag = $this->uri->segment(5);?>
                            <?php $idd = $this->uri->segment(4);?>
                            <a href="<?php echo base_url(); ?>petty_cash/newpettycash/<?php echo $idd; ?>/<?php echo $flag; ?>" class="preload btn btn-default"><i class="icon-plus22"></i> New</a>
                            <a data-toggle="modal" id="inst" data-target="#insertrow" class="btn btn-default"><i class="icon-stackoverflow"></i> Add Rows</a>
                            <button type="button" id="editheader" class="btn btn-info"><i class="icon-floppy-disk position-left"></i> Save </button>
                            <!-- <a href="<?php echo base_url(); ?>petty_cash/print_pettycash/<?php echo $docno; ?>"  class="btn btn-default"><i class="icon-printer2"></i> Print</a> -->
                            <!-- <a target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pettycash.mrt&docno=<?php echo $docid; ?>&compcode=<?php echo $compcode;?>"
                              data-popup="tooltip" title="" data-original-title="Print" class="btn btn-default"><i class="icon-printer4"></i> Print</a> -->
                            <a target="_blank" href="<?php echo base_url();?>report/viewerload?type=pc&typ=form&var1=<?php echo $docid; ?>&var2=<?php echo $compcode;?>"
                              data-popup="tooltip" title="" data-original-title="Print" class="btn btn-default"><i class="icon-printer4"></i> Print</a>
                            <a href="<?php echo base_url(); ?>petty_cash/archive_pettycash" class="btn btn-default"><i class="icon-close2 position-left"></i> Close</a>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="basic-rounded-tab2">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <!-- <form id="form" method="post" enctype="multipart/form-data"> -->
                                  <label class="control-label input-xs col-lg-3">Attachment File <span class="text-danger">*</span></label>
                                  <div class="col-lg-3">
                                      <input type="file" name="userfile" class="file-styled" accept=".jpg,.jpeg,.png,.pdf" required="required" id="file">
                                      
                                  </div>
                                  
                                  <input type="hidden" name="pc_ref" value="<?=$docno; ?>">
                              <!-- </form> -->
                          </div>
                      </div>
                      <!-- <script>
                        $('#file').change(function(event) {
                            var formData = new FormData($('#form')[0]);
                            var file = $('#file').val();
                            alert(file);
                            if (file!='') {
                                $.ajax({
                                    url: '<?php echo base_url(); ?>pettycash_active/editupload',
                                    type: 'POST',
                                    data: formData,
                                    async: false,
                                    cache: false,
                                    contentType: false,
                                    enctype: 'multipart/form-data',
                                    processData: false,
                                    success: function(response) {
                                        show_nonti('Success!!!'+response, 'Upload File Successful',
                                            'success');
                                        setTimeout(function() {
                                            location.reload();
                                        }, 500);
                                    }
                                });
                                return false;
                            } else {
                                swal("Fail!", "กรุณาเลือกไฟล์", "error");
                            }

                        });
                    </script> -->
                    </div>
                    <legend class="text-size-mini text-muted no-border no-padding">File</legend>
                    <?php
                      $this->db->select('*');
                      $this->db->from('select_file_pc');
                      $this->db->where('pc_ref',$docno);
                      $file=$this->db->get()->result();
                      
                      foreach ($file as $f) { 
                          $filesize = "select_file_pc/" . $f->name_file;
                          $kb       = filesize( $filesize ) / 1024;
                          $mb       = $kb / 1024;

                    ?>
                    <p>
                        <!-- <b>เอกสารแนบ : <?php echo $f->name_file;?> <a href="<?php echo base_url(); ?>select_file_pr/<?php echo $f->name_file ?>" style="color: red;"> Download !!</a></b> -->
                            <!-- attachment file -->
                                <ul class="media-list">
                                    <li class="media">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="media-left media-middle">
                                                <?php if ( get_mime_by_extension( $f->name_file ) == "application/pdf" ) {?>
                                                    <i class="icon-file-pdf icon-2x"></i>
                                                <?php } else {?>
                                                    <i class="icon-file-picture icon-2x"></i>
                                                <?php }?>
                                            </div>

                                            <div class="media-body">
                                                <a class="media-heading text-semibold" href="<?php echo base_url(); ?>select_file_pc/<?php echo $f->name_file; ?>" target="_blank"> <?php echo $f->name_file;?> </a>
                                                <ul class="list-inline list-inline-separate list-inline-condensed text-size-mini text-muted">
                                                    <li><?php echo number_format($mb,2);?> MB</li>
                                                </ul>
                                            </div>

                                            <div class="media-right">
                                                <ul class="icons-list icons-list-extended text-nowrap">
                                                    <li><a href="<?php echo base_url(); ?>select_file_pc/<?php echo $f->name_file; ?>" target="_blank"><i class="icon-download"></i></a></li>
                                                    <li><a id="delfile<?=$f->id_sl;?>" del_id="<?=$f->id_sl;?>"><i class="icon-trash"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </li>
                                </ul>
                            <!-- // attachmant file -->
                          <script>
                              $('#delfile<?=$f->id_sl;?>').click(function() {
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
                                              $.post('<?php echo base_url(); ?>pr/del_file_by_id/' + id+ '/pc', function() {})
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
                        <?php } ?>
                      </p> 
                       <?php
                $this->db->select('*');
                $this->db->from('select_file_pc');
                $this->db->where('pc_ref',$docno);
               
                $a=$this->db->get()->num_rows();
                ?>
                        <?php if($a==0){ ?>
                         <?php } ?>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </form>
        <!-- editrow -->
        <div id="editrow"></div>
        <!-- /editrow -->
        <!-- Basic modal -->
        <div id="insertrow" class="modal fade" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content ">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">เพิ่มรายการ111</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="">รายการซื้อ</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                            <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                          </span>
                      <input type="text" id="newmatname" placeholder="เลือกรายการซื้อ" class="form-control " readonly="true">
                      <input type="text" id="newmatcode" placeholder="เลือกรายการซื้อ" class="form-control ">
                      <input type="hidden" id="ac_code" class="form-control ">
                      <span class="input-group-btn">
                            <button type="button" class="openun btn btn-default btn-icon" data-toggle="modal" data-target="#opnewmat"><i class="icon-search4"></i></button>
                          </span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <label for="">รายการต้นทุน</label>
                    <div class="input-group">
                      <input type="text" id="list" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control ">
                      <input type="text" id="vcostcode" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                      <input type="hidden" id="type" >
                      <span class="input-group-btn">
                      <?php if($controlbg == '1'){ ?>
                      <button type="button" class="modalcost btn btn-default btn-icon" data-toggle="modal" data-target="#costcode"><i class="icon-search4"></i></button>
                      <?php }else{ ?>
                      <button type="button" class="btn btn-default btn-icon" id="selectcostcodeboq" data-toggle="modal" data-target="#boq_con"><span class="glyphicon glyphicon-search"></span></button>
                      <?php } ?>
                          <!-- <button type="button" class="modalcost btn btn-default btn-icon" data-toggle="modal" data-target="#costcode"><i class="icon-search4"></i></button> -->
                      </span>
                    </div>
                  </div>
                </div>
                
                <!--  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="">รายการซื้อ</label>
                          <input type="text" class="form-control input-sm" id="list" name="list" placeholder="กรอกรายการสั่งซื้อ">
                        </div>
                      </div>
                    </div> -->
                <div class="row">

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
                  <div class="col-xs-12">
                    <label for="">ร้านค้า</label>
                    <div class="input-group">
                      <input type="text" class="form-control typeahead-remote" placeholder="กรอกชื่อร้านค้า" name="vender" id="vender">
                      <span class="input-group-btn">
                            <button type="button" class="modalcost btn btn-default btn-icon" data-toggle="modal" data-target="#openven"><i class="icon-search4"></i></button>
                          </span>
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12" style="margin-top:10px;">
                    <div class="form-group">
                      <label for="addrvender">ที่อยู่ร้านค้า</label>
                      <input type="text" id="addrvender" name="addrvender" placeholder="กรอกร้านค้า" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="adddes">รายละเอียดเพิ่มเติม</label>
                      <input type="text" name="adddes" id="adddes" placeholder="ระบุรายละเอียดเพิ่มเติม" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label for="">Ref. Asset Code</label>
                    <div class="input-group">
                      <input type="text" id="accode" name="accode" readonly="true" class="form-control input-sm">
                      <input type="text" id="acname" name="acname" readonly="true" class="form-control input-sm">
                      <input type="hidden" id="statusass" name="statusass" readonly="true" class="form-control input-sm">
                      <span class="input-group-btn">
                        <a class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass"><span class="glyphicon glyphicon-search"></span>ค้นหา</a>
                      </span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-xs-3">
                    <div class="checkbox checkbox-switchery switchery-xs">
                      <label class="display-block">
                              <input type="checkbox" class="switchery" id="chktax"> ใบกำกับภาษี
                            </label>
                    </div>
                    <input type="hidden" id="intputchktax" name="intputchktax">
                  </div>
                  <div class="row" id="taxchk">
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label for="">เลขที่ใบกำกับภาษี</label>
                        <input type="text" class="form-control input-sm" id="taxno" placeholder="กรอกใบกำกับภาษี">
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <!-- <div class="form-group">
                              <label for="">วันที่ใบกำกับภาษี</label>
                              <input type="text" class="taxdate form-control input-sm" id="taxdate" placeholder="กรอกใบกำกับภาษี">
                            </div> -->
                      <div class="form-group">
                        <label>วันที่ใบกำกับภาษี: </label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                          <input type="date" class="taxdate form-control daterange-singles" id="taxdate" name="taxdate">
                        </div>
                      </div>
                      <script>
                        $('.daterange-singles').daterangepicker({
                          singleDatePicker: true,
                          locale: {
                            format: 'YYYY-MM-DD'
                          }
                        });
                      </script>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2" hidden="true">
                    <div class="form-group">
                      <label for="addrvender">จำนวน</label>
                      <input type="text" id="amount" name="amount" placeholder="กรอกจำนวน" class="form-control" value="1">
                    </div>
                  </div>
                  <div class="col-xs-2">
                    <div class="form-group">
                      <label for="unitprice">ราคา</label>
                      <input type="text" id="unitprice" name="unitprice" placeholder="กรอกราคาต่อหน่วย" class="form-control">
                    </div>
                  </div>

                
                  <div class="col-xs-2">
                    <label for="addrvender">ภาษี</label>
                    <div class="input-group">
                      <input type="text" id="taxvv" class="form-control" value="0">
                      <span class="input-group-addon" id="basic-addon2">%</span>
                    </div>
                  </div>
                  <div class="col-xs-3">
                    <div class="form-group">
                      <label for="addrvender">จำนวนเงิน(vat)</label>
                      <input type="text" id="netamt" name="netamt" class="form-control" readonly="true">
                    </div>
                  </div>
                </div>
                  <div class="row"  <?php if($controlbg!="2"){ echo "hidden"; } ?>>
              
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Budget Control</label>
                                        <input class="form-control text-right border-danger  text-right" type="text" name="totalcost[]" id="totalcost" value=""  readonly="">
                                    </div>
                                </div>
                            </div>
                <div class="row">
                  <div class="col-xs-3">
                    <label for="dod">Invoice/Receipt No.</label>
                    <input type="text" id="dod" name="dod" class="form-control">
                  </div>
                  <div class="col-xs-3">
                    <label for="dodate">Invoice/Receipt Date</label>
                    <input type="date" id="dodate" name="dodate" class="form-control">
                  </div>
                  <div class="col-xs-3">
                    <label for="dodate">TAX ID</label>
                    <input type="text" id="taxida" name="taxida" value="" class="form-control">
                    <input type="hidden" id="ventype" name="ventype" readonly="true" value="" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3">
                    <div class="checkbox checkbox-switchery switchery-xs">
                      <label class="display-block">
                              <input type="checkbox" class="switchery" id="whchktax"> หัก ณ ที่จ่าย
                            </label>
                    </div>
                    <input type="hidden" id="intputwhchktax" name="intputwhchktax">
                  </div>
                </div>
                <div id="whtaxchk">
                  <div class="row">
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label type="tax"> หักภาษี ณ ที่จ่าย</label>
                        <select class="form-control input-sm" name="tax" id="tax">
                                <option value="0">ไม่มีหัก</option>
                                <option value="3">ค่าบริการ 3%</option>
                                <option value="1">ค่าขนส่ง 1%</option>
                                <option value="5">ค่าเช่า 5%</option>
                                <option value="2">ค่าโฆษณา 2%</option>
                                <option value="15">ดอกเบี้ยจ่าย 15%</option>
                              </select>
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label for=""> ยอดหัก ณ ที่จ่าย</label>
                        <input type="text" class="form-control input-sm" id="totwh" readonly="true" placeholder="ยอดหัก ณ ที่จ่าย">
                      </div>
                    </div>
                    <div class="col-xs-3">
                      <div class="form-group">
                        <label for="addrvender">วันที่จ่าย</label>
                        <input type="date" id="paydate" name="payday" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <label for="">ร้านค้า</label>
                      <div class="input-group">
                        <input type="text" class="form-control typeahead-remote" placeholder="กรอกชื่อร้านค้า" name="venderwt" id="venderwt">
                        <span class="input-group-btn">
                                <button type="button" class="modalcost btn btn-default btn-icon" data-toggle="modal" data-target="#openvenwt"><i class="icon-search4"></i></button>
                              </span>
                      </div>
                      <!-- /input-group -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12" style="margin-top:10px;">
                      <div class="form-group">
                        <label for="addrvender">ที่อยู่ร้านค้า</label>
                        <input type="text" id="addrvenderwt" name="addrvenderwt" placeholder="กรอกร้านค้า" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2">
                    <div class="form-group">
                      <label for="addrvender">จำนวนเงินสุทธิ</label>
                      <input type="text" id="amttot" name="amttot" class="form-control" readonly="true">
                    </div>
                  </div>
                </div>
                <br>
                <!--         <div class="row">
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label for="dis">ส่วนลด</label>
                              <input type="text" id="disc" name="disc" placeholder="กรอกส่วนลด"  class="form-control">
                            </div>
                          </div>
                        </div> -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" id="addtorow" class="btn btn-info">Insert</button>
                </div>
              </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                      <button type="button" id="addtorow" data-dismiss="modal" class="btn btn-info">Insert</button>
                    </div> -->
          </div>
        </div>
    </div>
    <!-- /basic modal -->
  </div>
  <!-- /content area -->
</div>
<script>
                     $('#closebg').hide();
                     $('#type_costhide').hide();
                       $("#type_cost").change(function(){
                        var type_cost = $("#type_cost").val();
                        var codecostcodeint = $('#vcostcode').val();
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
<!--  -->
<div class="modal fade" id="boq_con" data-backdrop="false">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header bg-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                              </div>
                              <div class="modal-body">
                              <div class="row" id="modal_boq"></div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <script>
                          $('#selectcostcodeboq').click(function () {
                            var system = $('#system').val();
                            // alert(system);
                            $('#closebg').hide();
                              $('#type_cost').val("");
                            $('#modal_boq').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                            $("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/' + system);
                          });
                        </script>                                
<div class="modal fade" id="refass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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
  $('#refasset').click(function () {
    $('#refasscode').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#refasscode").load('<?php echo base_url(); ?>share/modalshare_asset');
  });
</script>

<div class="modal fade" id="refass_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
      </div>
      <div class="modal-body">
        <div class="row refasscode">
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // $('.refasset<?=$value->pettycashi_id; ?>').click(function () {
  //   $('.refasscode<?=$value->pettycashi_id; ?>').html("<img src='<?=base_url(); ?>assets/images/loading.gif'> Loading...");
  //   $(".refasscode<?=$value->pettycashi_id; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?php echo $value->pettycashi_id; ?>');
  // });
</script>
<div id="opnewmat" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มรายการ</h5>
      </div>
      <div class="modal-body">
        <div class="row" id="modal_mat"></div>
      </div>
    </div>
  </div>
  <!-- matcode-->
</div>
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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
</div>
<!-- end modal matcode and costcode -->
<!-- modal เลือกหน่วย -->
<div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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
<!--  -->
<!-- modal เลือกรผู้ขอเบิก -->
<div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          <div class="row">
            <div>
              <table class="table table-xxs table-hover datatable-basirc">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ชื่อผู้ขอเบิก</th>
                    <th>แผนก/โครงการ</th>
                    <th width="5%">จัดการ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n = 1;?>
                  <?php foreach ($mem as $val) {?>
                  <tr>
                    <th scope="row">
                      <?php echo $n; ?>
                    </th>
                    <td>
                      <?php echo $val->vender_name; ?>
                    </td>
                    <td>
                      <?php echo $val->vender_address; ?>
                    </td>
                    <td><button class="openr<?php echo $n; ?> btn btn-xs btn-block btn-info" data-toggle="modal" data-mname<?php
                        echo $n; ?>="<?php echo $val->vender_name; ?>" data-mid<?php echo $n; ?>="<?php echo $val->vender_code; ?>"  data-dismiss="modal">เลือก</button></td>
                  </tr>
                  <script>
                    $('.openr<?php echo $n; ?>').click(function () {
                      $('#memid').val($(this).data('mid<?php echo $n; ?>'));
                      $('#memname').val($(this).data('mname<?php echo $n; ?>'));
                    })
                  </script>
                  <?php $n++;}?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(".add_id_tomodal").click(function() {
    //pass id pettycash_id to modal
    var petty_id = $(this).attr("peid");
    $('.add-id').attr("petty_id",petty_id);
  });
  // add-id
  $('.refasset_2').click(function(){
    //ball
    // $(this).attr()
    
    $('.refasscode').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $(".refasscode").load('<?php echo base_url(); ?>share/modalshare_asset');
  });

</script>
<!--end modal -->
<!-- modal เลือกร้านค้า -->
<div class="modal fade" id="openvenh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          <div class="row">
            <table class="table table-xxs table-hover datatable-basircvender">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>ชื่อร้านค้า</th>
                  <th>ที่อยู่ร้านค้า</th>
                  <th width="5%">จัดการ</th>
                </tr>
              </thead>
              <tbody>
                <?php $n = 1;?>
                <?php foreach ($ven as $val) {?>
                <tr>
                  <th scope="row">
                    <?php echo $n; ?>
                  </th>
                  <td>
                    <?php echo $val->vender_name; ?>
                  </td>
                  <td>
                    <?php echo $val->vender_address; ?>
                  </td>
                  <td><button class="openrn<?php echo $n; ?> btn btn-xs btn-block btn-info" data-toggle="modal" data-taxid="<?php echo $val->vender_tax; ?>"
                      data-vender_name<?php echo $n; ?>="<?php echo $val->vender_name; ?>" data-vender_code<?php echo $n; ?>="<?php echo $val->vender_code; ?>" data-type<?php echo $n; ?>="<?php echo $val->vender_type; ?>"  data-dismiss="modal">เลือก</button></td>
                </tr>
                <script>
                  $('.openrn<?php echo $n; ?>').click(function () {
                    $('#venid').val($(this).data('vender_code<?php echo $n; ?>'));
                    $('#venname').val($(this).data('vender_name<?php echo $n; ?>'));
                    $('#taxid').val($(this).data('taxid<?php echo $n; ?>'));
                  })
                </script>
                <?php $n++;}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end modal -->
<!-- Full width modal -->
<div id="openadv" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Select Advance Name</h5>
      </div>
      <div class="modal-body">
        <div id="adv">
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
<!-- modal  โครงการ-->
<div class="modal fade" id="openproj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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
</div>
<!--end modal -->
<!-- modal  แผนก-->
<div class="modal fade" id="opendepart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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
<!-- modal เลือกร้านค้า ใน modal -->
<div class="modal fade" id="openven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
      <div class="modal-body">
        <table class="table datatable-basici">
          <thead>
            <tr>
              <th>No.</th>
              <th>ชื่อร้านค้า</th>
              <th>ที่อยู่ร้านค้า</th>
              <th width="5%">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            <?php $n = 1;?>
            <?php foreach ($res as $v) {?>
            <tr>
              <th scope="row">
                <?php echo $n; ?>
              </th>
              <td>
                <?php echo $v->vender_name; ?>
              </td>
              <td>
                <?php echo $v->vender_address; ?>
              </td>
              <td><button class="openvendmodal btn btn-xs btn-block btn-info add-id" data-toggle="modal" data-taxidr="<?php echo $v->vender_tax; ?>"
                  data-vnameh="<?php echo $v->vender_name; ?>" data-addrh="<?php echo $v->vender_address; ?>" data-crteam="<?php echo $v->vender_credit; ?>"
                  data-vtel="<?php echo $v->vender_tel; ?>" data-type="<?php echo $v->vender_type; ?>" data-dismiss="modal">เลือก</button></td>
            </tr>
            <?php $n++;}?>
          </tbody>
        </table>
        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
        <!-- /core JS files -->
        <script>
          $(".datatable-basici").DataTable();
        </script>
        <script>
          $(".openvendmodal").click(function (event) {
            // $("#venname").val($(this).data('vnameh'));
            // $("#memname").val('');
            var pee = $(this).attr('petty_id');
            var _name = $(this).attr('data-vnameh');
            var _addr = $(this).attr('data-addrh');
            $("#vender").val(_name);
            $("#addrvender").val(_addr);
            $("#vender"+pee).val(_name);
            $("#addrvender"+pee).val(_addr);
            $("#taxida"+pee).val($(this).data('taxidr'));
            $("#ventype"+pee).val($(this).data('type'));
            $("#venderwt"+pee).val($(this).data('vnameh'));
            $("#addrvenderwt"+pee).val($(this).data('addrh'));
          });
          ///tae  
        </script>
      </div>
    </div>
  </div>
</div>
<!--end modal -->

<script>
  $('#chk').click(function (event) {
    if ($('#chk').prop('checked')) {
      $('#newmatname').prop('disabled', false);
    } else {
      $('#newmatname').prop('disabled', true);
    }
  });
  $("#addtorow").click(function (event) {

    if ($("#taxida").val() == "" && $("#ventype").val() == "external") {
      swal({
        title: "กรุณาหรอก Tax Id!!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#vcostcode").val() == "") {
      swal({
        title: "กรุณาเลือก รายการต้นทุน!!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#newmatcode").val() == "") {
      swal({
        title: "กรุณาเลือก รายการซื้อ!!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#unitprice").val() == "") {
      swal({
        title: "กรุณากรอก จำนวนเงิน!!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#taxid").val() == "") {
      swal({
        title: "กรุณากรอก จำนวนเงิน!!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#intputchktax").val() == "Y" && $("#taxvv").val() == 0) {
      swal({
        title: "กรุณากรอกภาษี !!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#intputchktax").val() == "Y" && $("#taxno").val() == "") {
      swal({
        title: "กรุณากรอกเลขที่ใบกำกับภาษี !!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else if ($("#intputchktax").val() == "Y" && $("#taxdate").val() == "") {
      swal({
        title: "กรุณากรอกวันที่ใบกำกับภาษี !!.",
        text: "",
        confirmButtonColor: "#EA1923",
        type: "error"
      });
    } else {
      var bbooq = $("#boq_id").val();
      var unitP = $("#unitprice").val();
      // alert(unitP);
      // return false;

      var url = "<?php echo base_url(); ?>pettycash_active/addtorow/<?php echo $pc; ?>/<?php echo $fa; ?>";
      var dataSet = {
        docno: $('#pcno').val(),
        matcodei: $("#newmatcode").val(),
        matnamei: $("#newmatname").val(),
        costcodei: $("#vcostcode").val(),
        costnamei: $("#list").val(),
        venderi: $("#vender").val(),
        addrvenderi: $("#addrvender").val(),
        qtyi: $("#amount").val(),
        taxid: $("#taxid").val(),
        taxnoi: $("#taxno").val(),
        taxdatei: $("#taxdate").val(),
        intputchktaxi: $("#intputchktax").val(),
        intputwhchktaxi: $("#intputwhchktax").val(),
        taxvi: $("#taxv").val(),
        taxvvi: $("#taxvv").val(),
        unitpricei: $("#unitprice").val(),
        uniti: $("#unit").val(),
        amttoti: $("#amttot").val(),
        netamti: $("#netamt").val(),
        totvati: $("#totvat").val(),
        taxi: $("#tax").val(),
        totwhi: $("#totwh").val(),
        adddes: $('#adddes').val(),
        dod: $('#dod').val(),
        acccode: $('#ac_code').val(),
        dodate: $('#dodate').val(),
        paydate: $('#paydate').val(),
        venderwt: $("#venderwt").val(),
        addrvenderwt: $("#addrvenderwt").val(),
        accode: $("#accode").val(),
        acname: $("#acname").val(),
        taxid: $("#taxida").val(),
        statusass: $("#statusass").val(),
        type : $("#type").val(),
        type_cost: $("#type_cost").val(),
      }
      //ตัดค่าใน boq_item boq_balance

      $.post(url, dataSet, function (data) {
        location.reload();
        setTimeout(function () {
          window.location.href = "<?php echo base_url(); ?>petty_cash/editpettycash/<?php echo $docno; ?>/<?php echo $projid; ?>/<?php echo $fa; ?>";
        }, 1000);
      }).done(function(data) {
        // console.log(data);
      });

    }
  });

  function addrow() {
    var row = ($('#body tr').length - 0) + 1;
    var adddes = $('#adddes').val();
    var dod = $('#dod').val();
    var dodate = $('#dodate').val();
    var paydate = $('#paydate').val();
    var venderwt = $("#venderwt").val();
    var addrvenderwt = $("#addrvenderwt").val();
    var acccode = $("#ac_code").val();
    var qty = $('#amount').val();
    var matname = $("#newmatname").val();
    var matcode = $("#newmatcode").val();
    var unit = $("#unit").val();
    var remark = $("#remarkitem").val();
    var costcode = $("#vcostcode").val();
    var costname = $("#list").val();
    var unitprice = $('#unitprice').val();
    var amttot = $("#amttot").val();
    var netamt = $("#netamt").val();
    var totvat = $("#totvat").val();
    var totwh = $("#totwh").val();
    var intputchktax = $("#intputchktax").val();
    var intputwhchktax = $("#intputwhchktax").val();
    if (tax == '0') {
      var taxname = "ไม่มีหัก";
    } else if (tax == '3') {
      var taxname = "ค่าบริการ 3%";
    } else if (tax == '1') {
      var taxname = "ค่าขนส่ง 1%";
    } else if (tax == '5') {
      var taxname = "ค่าเช่า 5%";
    } else if (tax == '2') {
      var taxname = "ค่าโฆษณา 2%";
    } else if (tax == '15') {
      var taxname = "ดอกเบี้ยจ่าย 15%";
    }
    var tr = '<tr id="' + row + '">' +
      '<td>' + row + '</td>' +
      '<td>' + costcode + '<input type="hidden" name="costcodei[]" value="' + costcode + '" /></td>' +
      '<td>' + matname + '<input type="hidden" name="matnamei[]" value="' + matname +
      '" /><input type="text" name="ac_code[]" value="' + acccode + '" /></td>' +
      '<td>' + adddes + '<input type="hidden" name="adddes[]" value="' + adddes + '" /></td>' +
      '<td>' + unitprice + '<input type="hidden" name="unitpricei[]" value="' + unitprice + '" /></td>' +
      '<td>' + taxvv + '<input type="hidden" name="taxvvi[]" value="' + taxvv + '" /></td>' +
      '<td>' + netamt + '<input type="hidden" name="netamti[]" value="' + netamt + '" /></td>' +
      '<td>' + tax + '<input type="hidden" name="taxi[]" value="' + tax + '" /></td>' +
      '<td>' + totwh + '<input type="hidden" name="totwhi[]" value="' + totwh + '" /></td>' +
      '<td>' + amttot + '<input type="hidden" name="amttoti[]" value="' + amttot + '" /></td>' +
      '<td>' + taxname + '</td>' +
      '<td>' + paydate + '<input type="hidden" name="paydate[]" value="' + paydate + '" /></td>' +
      '<td>' + dod + '<input type="hidden" name="dod[]" value="' + dod + '" /></td>' +
      '<td>' + dodate + '<input type="hidden" name="dodate[]" value="' + dodate + '" /></td>' +
      '<td>' + venderwt + '<input type="hidden" name="venderwt[]" value="' + venderwt + '" /></td>' +
      '<td>' + addrvenderwt + '<input type="hidden" name="addrvenderwt[]" value="' + addrvenderwt + '" /></td>' +
      '<td class="hidden-center">' +
      '<ul class="icons-list">' +
      // '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
      '<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>' +
      '</ul>' +
      '<input type="hidden" name="matcodei[]" value="' + matcode + '" />' +
      '<input type="hidden" name="costnamei[]" value="' + costname + '" />' +
      '<input type="hidden" name="intputchktaxi[]" value="' + intputchktax + '" />' +
      '<input type="hidden" name="intputwhchktaxi[]" value="' + intputwhchktax + '" />' +
      '<input type="hidden" name="venderi[]" value="' + vender + '" />' +
      '<input type="hidden" name="addrvenderi[]" value="' + addrvender + '" />' +
      '<input type="hidden" name="taxnoi[]" value="' + taxno + '" />' +
      '<input type="hidden" name="taxdatei[]" value="' + taxdate + '" />' +
      '<input type="hidden" name="intputchktaxi[]" value="' + intputchktax + '" />' +
      '<input type="hidden" name="intputwhchktaxi[]" value="' + intputwhchktax + '" />' +
      '<input type="hidden" name="taxvi[]" value="' + taxv + '" />' +
      '</td>' +
      '</tr>';
    $('#body').append(tr);
    var modal = '<div id="edit_modal' + row + '" class="modal fade" data-backdrop="false">' +
      '<div class="modal-dialog modal-lg">' +
      '<div class="modal-content ">' +
      '<div class="modal-header bg-info">' +
      '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
      '<h5 class="modal-title">เพิ่มรายการ' + row + '' + matname + '</h5>' +
      '</div>' +
      '<div class="modal-body">' +
      '<div class="row">' +
      '<div class="col-xs-6">' +
      '<label for="">รายการซื้อ</label>' +
      '<div class="input-group">' +
      '<span class="input-group-addon">' +
      '<input type="checkbox" id="chk" aria-label="กำหนดเอง">' +
      '</span>' +
      '<input type="text" id="newmatname' + row +
      '" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="' + matname + '">' +
      '<input type="hidden" id="newmatcode' + row +
      '"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="' + matcode + '">' +
      '<span class="input-group-btn" >' +
      '<button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>' +
      '</div>' +
      '</div>' +
      '<div class="col-xs-6">' +
      '<label for="">รายการต้นทุน</label>' +
      '<div class="input-group">' +
      '<input type="text" id="costname' + row +
      '" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="' + costname + '">' +
      '<input type="hidden" id="codecostcode' + row +
      '" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="' + costcode + '">' +
      '<span class="input-group-btn" >' +
      '<button class="btn btn-info btn-sm" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>' +
      '</span>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '<div class="row">' +
      '<div class="col-xs-6">' +
      '<div class="form-group">' +
      '<label for="qty">ปริมาณ</label>' +
      '<input type="text" id="qtyf' + row + '" placeholder="กรอกปริมาณ" class="form-control"  value="' + qty + '">' +
      '</div>' +
      '</div>' +
      '<div class="col-xs-6">' +
      '<div class="input-group">' +
      '<label for="unit">หน่วย</label>' +
      '<input type="text" id="unit' + row +
      '" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="' + unit + '">' +
      '<span class="input-group-btn" >' +
      '<button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>' +
      '</span>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '<div class="row">' +
      '<div class="col-xs-12">' +
      '<div class="form-group">' +
      '<label for="endtproject">หมายเหตุ</label>' +
      '<textarea rows="4" cols="50" type="text" id="remarkitem' + row + '" class="form-control" >' + remark +
      '</textarea>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '<div class="modal-footer">' +
      '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>' +
      '<button type="button" id="editrows' + row + '" data-dismiss="modal" class="btn btn-info">Edit Row</button>' +
      '</div>' +
      '</div>' +
      '</div>' +
      '</div>';
    $('#editrow').append(modal);
  }
  $(document).on('click', 'a#delete', function () { // <-- changes
    // Initialize
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
          onClick: function ($noty) {
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
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>
  // $(document).ready(function () {
    var type = $('#vendertype').val();
    if (type == '1') {
      $(".openext").hide();
      $("#venname").hide();
    } else {
      $(".openemp").hide();
      $("#memname").hide();
    }
    $(".openext").hide();
    $(".openproj").hide();
    $(".opendepart").hide();
    $('#totwh').val('0');
    $("#amount,#unitprice").keyup(function () {
      if ($('#chktax').prop('checked') && $('#whchktax').prop('checked')) {
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var vat = sum * 7 / 100;
        var wh = parseFloat($("#totwh").val());
        if ($("#tax").val() == "0") {
          var totwh = sum * 0 / 100;
        } else if ($("#tax").val() == "3") {
          var totwh = sum * 3 / 100;
        } else if ($("#tax").val() == "1") {
          var totwh = sum * 1 / 100;
        } else if ($("#tax").val() == "5") {
          var totwh = sum * 5 / 100;
        } else if ($("#tax").val() == "2") {
          var totwh = sum * 2 / 100;
        } else if ($("#tax").val() == "15") {
          var totwh = sum * 15 / 100;
        }
        // $("#amttot").val(sum);
        // $("#netamt").val((sum+vat)-totwh);
        // $("#totvat").val(vat);
        // $("#totwh").val(totwh);

      } else if ($('#chktax').prop('checked')) {
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var vat = sum * 7 / 100;
        $("#amttot").val(sum);
        // $("#netamt").val((sum+vat));
        $("#totvat").val(vat);
        $("#totwh").val(totwh);
      } else if ($('#whchktax').prop('checked')) {
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        // var vat = sum*7/100;
        var wh = parseFloat($("#totwh").val());
        if ($("#tax").val() == "0") {
          var totwh = sum * 0 / 100;
        } else if ($("#tax").val() == "3") {
          var totwh = sum * 3 / 100;
        } else if ($("#tax").val() == "1") {
          var totwh = sum * 1 / 100;
        } else if ($("#tax").val() == "5") {
          var totwh = sum * 5 / 100;
        } else if ($("#tax").val() == "2") {
          var totwh = sum * 2 / 100;
        } else if ($("#tax").val() == "15") {
          var totwh = sum * 15 / 100;
        }
        // $("#amttot").val(sum);
        // $("#netamt").val((sum-totwh));
        // $("#totvat").val(vat);
        // $("#totwh").val(totwh);
      } else {
        //atiwat
        var Key = $(this).val()*1;
        var booqid = $("#boq_id").val();
        var cooscon = $("#costcontrol").val()*1;
        var TemP = $("#costbg"+booqid).val()*1;
        
        if(Key > TemP){
          swal({
              title: "รายการมากว่าใน Budget",
              text: "",
              confirmButtonColor: "#EA1923",
              type: "error"
          });
          $(this).val(0);
          $("#costcontrol").val(TemP);
        }
        var Real = TemP - Key;
        $("#costcontrol").val(Real);
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var taxvv = parseFloat($("#taxvv").val());
        var sumvat = sum * taxvv / 100;
        $("#amttot").val(sum + sumvat);
        $("#netamt").val(sumvat);
      }

           var ckkcontrolbg = $('#ckkcontrolbg').val();
                  //alert(ckkcontrolbg);

                  var xpd1 = parseFloat($('#unitprice').val());
                  if(ckkcontrolbg=="2"){
                  //alert(ckkcontrolbg);
                  var type_cost = $("#type_cost").val();

                  var codecostcodeint = $('#vcostcode').val();
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
                  $("#unitprice").val('0');
                  $("#netamt").val('0');
                  $("#taxvv").val('0');
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
                  $("#unitprice").val('0');
                  $("#netamt").val('0');
                  $("#taxvv").val('0');
                  $("#totalcost").val(costcodecc);
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
                  $("#unitprice").val('0');
                  $("#netamt").val('0');
                  $("#taxvv").val('0');
                  $("#totalcost").val(costcodecc);
                  $("#to_vats").val('0');
                  $("#pnetamt").val('0');
                  }
                }

                  }   //if parseFloa
                  }// if ckkcontrolbg
    });
    $('#taxv').keyup(function (event) {
      var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxv").val()) /
        100 || 0;
      var wh = parseFloat($("#totwh").val());
      var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
      var tot = (sum + vat) - wh || 0;
      // $("#netamt").val(tot);
    });
    $('#taxvv').keyup(function (event) {
      var vatt = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxvv")
        .val()) / 100 || 0;
      var whh = parseFloat($("#totwh").val());
      // var summ  = (parseFloat($("#amount").val())*parseFloat($("#unitprice").val())) || 0;
      var a = parseFloat($("#unitprice").val());
      var b = parseFloat($("#taxvv").val());
      // var tottt = (summ+vatt)-whh || 0;
      var vat = (a * b) / 100;
      $("#netamt").val(vat);
      $("#amttot").val(a + vat);
    });
  // });
  $("#vendertype").change(function () {
    if ($("#vendertype").val() == "1") {
      $("#venname").hide();
      $("#venid").hide();
      $("#memname").show();
      $("#memid").show();
      $(".openemp").show();
      $(".openext").hide();
    } else if (($("#vendertype").val() == "2")) {
      $("#venname").show();
      $("#venid").show();
      $("#memname").hide();
      $("#memid").hide();
      $(".openemp").hide();
      $(".openext").show();
      $("#memname").val("");
    }
  });
  $(".openadv").click(function () {
    $("#adv").load('<?php echo base_url(); ?>share/member2');
  });
  $(".openun").click(function () {
    $('#modal_mat').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_mat").load('<?php echo base_url(); ?>share/expensother_m');
  });
  $(".modalcost").click(function () {
    
    $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_cost").load('<?php echo base_url(); ?>share/costcode');
  });
  $("#modalunit").click(function () {
    $('#modal_unit').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_unit").load('<?php echo base_url(); ?>share/unit');
  });
  $(".openproj").click(function () {
    $('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_project").load('<?php echo base_url(); ?>share/project');
  });
  $(".opendepart").click(function () {
    $('#modal_department').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_department").load('<?php echo base_url(); ?>share/department');
  });
</script>
<script>
  $('a.preload').on('click', function () {
    $.blockUI({
      message: '<i class="icon-spinner4 spinner"></i>',
      timeout: 3000, //unblock after 5 seconds
      overlayCSS: {
        backgroundColor: '#1b2024',
        opacity: 0.8,
        cursor: 'wait'
      },
      css: {
        border: 0,
        color: '#fff',
        padding: 0,
        backgroundColor: 'transparent'
      }
    });
  });
</script>
<script>
  $('#chk').click(function (event) {
    if ($('#chk').prop('checked')) {
      $('#newmatname').prop('disabled', false);
    } else {
      $('#newmatname').prop('disabled', true);
    }
  });
  $('#chktax').click(function (event) {
    if ($('#chktax').prop('checked')) {
      $('#intputchktax').val("Y");
      $("#taxchk").show();
      $("#taxv").val('7');
      var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxv").val()) /
        100 || 0;
      var wh = parseFloat($("#totwh").val());
      var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
      var tot = (sum + vat) - wh || 0;
      // $("#netamt").val(tot);
      $('#totvat').val(vat);
    } else {
      $('#intputchktax').val("");
      $("#taxchk").hide();
      var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxv").val()) /
        100 || 0;
      var wh = parseFloat($("#totwh").val());
      var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
      var tot = (sum + vat) - wh || 0;
      var totvat = tot - vat;
      // $("#netamt").val(totvat);
      $('#totvat').val("0");
    }
  });
  $('#whchktax').click(function (event) {
    if ($('#whchktax').prop('checked')) {
      $("#whtaxchk").show();
      $('#intputwhchktax').val("Y");
    } else {
      if ($('#chktax').prop('checked')) {
        $("#whtaxchk").hide();
        $('#intputwhchktax').val("");
        var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxv").val()) /
          100 || 0;
        var netamt = parseFloat($("#netamt").val());
        var wh = parseFloat($("#totwh").val());
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var tot = netamt + wh || 0;
        // $("#netamt").val(tot);
        $("#tax").val("0");
        $('#totwh').val('0');
      } else {
        $("#whtaxchk").hide();
        $('#intputwhchktax').val("");
        var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxv").val()) /
          100 || 0;
        var netamt = parseFloat($("#netamt").val());
        var wh = parseFloat($("#totwh").val());
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var tot = netamt + wh || 0;
        // $("#netamt").val(tot);
        $("#tax").val("0");
        $('#totwh').val('0');
      }
    }
  });
</script>
<script>
  $('#tax').change(function (event) {
    var tax = $("#tax").val();
    var a = parseFloat($("#unitprice").val());
    var b = parseFloat($("#netamt").val());
    var ans = a + b;
    $("#amttot").val(ans);
    switch (tax) {
      case '0':
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = (amount * unitprice);
        var totwhtax = net * 0 / 100;
        var vat = $("#taxv").val();
        var totvat = (net * vat) / 100;
        var totamount = (net + totvat) - totwhtax;
        $('#totwh').val(totwhtax);
        // $('#netamt').val(totamount);
        $('#totwh').val(totwhtax);
        break;
      case '1':
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = (amount * unitprice);
        var totwhtax = net * 1 / 100;
        var vat = $("#taxv").val();
        var totvat = (net * vat) / 100;
        var totamount = (net + totvat) - totwhtax;
        $('#totwh').val(totwhtax);
        var res = parseFloat($("#amttot").val());
        var totwh = parseFloat($("#totwh").val());
        var ress = res - totwh;
        $('#amttot').val(ress);
        break;
      case '2':
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = (amount * unitprice);
        var totwhtax = net * 2 / 100;
        var vat = $("#taxv").val();
        var totvat = (net * vat) / 100;
        var totamount = (net + totvat) - totwhtax;
        $('#totwh').val(totwhtax);
        var res = parseFloat($("#amttot").val());
        var totwh = parseFloat($("#totwh").val());
        var ress = res - totwh;
        $('#amttot').val(ress);
        break;
      case '3':
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = (amount * unitprice);
        var totwhtax = net * 3 / 100;
        var vat = $("#taxv").val();
        var totvat = (net * vat) / 100;
        var totamount = (net + totvat) - totwhtax;
        $('#totwh').val(totwhtax);
        var res = parseFloat($("#amttot").val());
        var totwh = parseFloat($("#totwh").val());
        var ress = res - totwh;
        $('#amttot').val(ress);
        break;
      case '5':
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = (amount * unitprice);
        var totwhtax = net * 5 / 100;
        var vat = $("#taxv").val();
        var totvat = (net * vat) / 100;
        var totamount = (net + totvat) - totwhtax;
        $('#totwh').val(totwhtax);
        var res = parseFloat($("#amttot").val());
        var totwh = parseFloat($("#totwh").val());
        var ress = res - totwh;
        $('#amttot').val(ress);
        break;
      case '15':
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = (amount * unitprice);
        var totwhtax = net * 15 / 100;
        var vat = $("#taxv").val();
        var totvat = (net * vat) / 100;
        var totamount = (net + totvat) - totwhtax;
        $('#totwh').val(totwhtax);
        var res = parseFloat($("#amttot").val());
        var totwh = parseFloat($("#totwh").val());
        var ress = res - totwh;
        $('#amttot').val(ress);
        break;
    }
    var amount = $("#amount").val();
    var unitprice = $("#unitprice").val();
    var net = $("#netamt").val();
    var whtot = $("#totwh").val();
    var tot = (amount * unitprice) - whtot;
    // $('#netamt').val(totamount);
  });
  $("#inst").click(function (event) {
    $(".addboxpri").show();
    $('#chktax').prop('check');
    $("#whchktax").prop('checked', false);
    $("#taxchk").hide();
    $("#whtaxchk").hide();
    $("#newmatname").val("");
    $("#newmatcode").val("");
    $("#list").val("");
    $("#vcostcode").val("");
    $("#unit").val("");
    $("#remarkitem").val("");
    $("#codecostcode").val("");
    $("#costname").val("");
    $('#unitprice').val("");
    $("#amttot").val("");
    $("#netamt").val("");
    $("#totwh").val("0");
    $("#tax").val("0");
    $("#totvat").val("0");
    $("#taxno").val("");
    $("#taxdate").val("");
    $("#vender").val("");
    $("#addrvender").val("");
    $("#adddes").val("");
    $("#venderwt").val("");
    $("#addrvenderwt").val("");
    $("#taxvv").val("0");
    $("#dod").val("");
    $("#dodate").val("");
    $("#paydate").val("");
  });

</script>
<?php foreach ($getpci as $value) {?>
<!-- modal เลือกร้านค้า -->
<div class="modal fade" id="openven<?php echo $value->pettycashi_id; ?>" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
      <div class="modal-body">
        <table class="table table-xxs table-hover datatable-basicxcc">
          <thead>
            <tr>
              <th>No.</th>
              <th>ชื่อร้านค้า</th>
              <th>ที่อยู่ร้านค้า</th>
              <th width="5%">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            <?php $n = 1;?>
            <?php foreach ($res as $val) {?>
            <tr>
              <th scope="row">
                <?php echo $n; ?>
              </th>
              <td>
                <?php echo $val->vender_name; ?>
              </td>
              <td>
                <?php echo $val->vender_address; ?>
              </td>
              <td><button class="openvensmo<?php echo $value->pettycashi_id; ?> btn btn-xs btn-block btn-info" data-toggle="modal"
                  data-taxid="<?php echo $val->vender_tax; ?>" data-vnameh="<?php echo $val->vender_name; ?>" data-addrh="<?php echo $val->vender_address; ?>"
                  data-crteam="<?php echo $val->vender_credit; ?>" data-vtel="<?php echo $val->vender_tel; ?>" data-type="<?php echo $val->vender_type; ?>"
                  data-dismiss="modal">เลือก</button></td>
            </tr>
            <?php $n++;}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!--end modal -->
<script>
  $(".openvensmo<?php echo $value->pettycashi_id; ?>").click(function (event) {
    $("#venname<?php echo $value->pettycashi_id; ?>").val($(this).data('vnameh'));
    $("#memname<?php echo $value->pettycashi_id; ?>").val('');
    $("#vender<?php echo $value->pettycashi_id; ?>").val($(this).data('vnameh'));
    $("#addrvender<?php echo $value->pettycashi_id; ?>").val($(this).data('addrh'));
    $("#taxidddd<?php echo $value->pettycashi_id; ?>").val($(this).data('taxid'));
    $("#typeven<?php echo $value->pettycashi_id; ?>").val($(this).data('type'));
  });
</script>
<?php }?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/autosize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/formatter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/typeahead/handlebars.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/passy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/inputs/maxlength.min.js"></script>
<script>
  $.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
      orderable: false,
      width: '100px',
      targets: [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      search: '<span>Filter:</span> _INPUT_',
      lengthMenu: '<span>Show:</span> _MENU_',
      paginate: {
        'first': 'First',
        'last': 'Last',
        'next': '&rarr;',
        'previous': '&larr;'
      }
    },
    drawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
  });
  $(".datatable-basicxcc").DataTable();
</script>
<script>
  // Remote data
  // ------------------------------
  // Constructs the suggestion engine
  var bestPictures = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('vender_name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '<?php echo base_url(); ?>share/getvender',
    remote: '<?php echo base_url(); ?>assets/json/queries/%QUERY.json'
  });
  // Initialize engine
  bestPictures.initialize();
  // Initialize
  $('.typeahead-remote').typeahead(null, {
    name: 'best-pictures',
    displayKey: 'vender_name',
    source: bestPictures.ttAdapter()
  });
  // $("#vender").blur(function () {
  //   var name = $("#vender").val();
  //   var url = "<?php echo base_url(); ?>share/venaddr";
  //   var dataSet = {
  //     vendercode: name,
  //   };
  //   $.post(url, dataSet, function (data) {
  //     $("#addrvender").val(data);
  //   });
  // });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!-- /core JS files -->
<script>
  $.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
      orderable: false,
      width: '100px',
      targets: [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      search: '<span>Filter:</span> _INPUT_',
      lengthMenu: '<span>Show:</span> _MENU_',
      paginate: {
        'first': 'First',
        'last': 'Last',
        'next': '&rarr;',
        'previous': '&larr;'
      }
    },
    drawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
  });
  $('.datatable-basircvender').DataTable();
</script>
<script>
  $.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
      orderable: false,
      width: '100px',
      targets: [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
      search: '<span>Filter:</span> _INPUT_',
      lengthMenu: '<span>Show:</span> _MENU_',
      paginate: {
        'first': 'First',
        'last': 'Last',
        'next': '&rarr;',
        'previous': '&larr;'
      }
    },
    drawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function () {
      $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
  });
  $('.datatable-basircmem').DataTable();
</script>

<?php foreach ($getpc as $value) { ?>
                       <div class="modal fade" id="costcode" data-backdrop="false">
                          <div class="modal-dialog modal-full">
                            <div class="modal-content">
                              <div class="modal-header bg-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                              </div>
                              <div class="modal-body">
                                <!--  -->
                                <div class="row">
                                  <div id="tabcost1" class="col-xs-12">
                                    <h4>รายการประเภทต้นทุน 1</h4>
                                    <select multiple class="form-control" id="cost1" style="height:150px;">
                                          </select>
                                  </div>
                                  <div id="tabcost2" class="col-xs-6">
                                    <h4>รายการประเภทต้นทุน 2</h4>
                                    <select multiple class="form-control" id="cost2" style="height:150px;"></select>
                                  </div>
                                  <div id="tabcost3" class="col-xs-6">
                                    <h4>รายการประเภทต้นทุน 3</h4>
                                    <select multiple class="form-control" id="cost3" style="height:150px;">
                                        </select>
                                  </div>
                                  <div id="tabcost4" class="col-xs-6">
                                    <h4>รายการประเภทต้นทุน 4</h4>
                                    <select multiple class="form-control" id="cost4" style="height:150px;"></select>
                                  </div>
                                  <div id="cost-control" class="col-xs-12">
                                    <hr>
                                    <div class="row" style="margin-top:10px;">
                                      <div class="col-xs-12">
                                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup">สร้าง CostCode</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
                                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
                                <!--  -->
                              <!--   <script>
                                  $("#vender<?php echo $value->pettycashi_id; ?>").blur(function () {
                                    var name = $("#vender<?php echo $value->pettycashi_id; ?>").val();
                                    var url = "<?php echo base_url(); ?>share/venaddr";
                                    var dataSet = {
                                      vendercode: name,
                                    };
                                    $.post(url, dataSet, function (data) {
                                      $("#addrvender<?php echo $value->pettycashi_id; ?>").val(data);
                                    });
                                  });
                                </script> -->
                              </div>
                            </div>
                          </div>
                        </div>

                          <?php  } ?>
<script type="text/javascript">
$("#editheader").click(function(e){
   var frm = $('#fpetty');
    swal({
        title: "Save Completed!!.",
        text: "Save Completed!!.",
        type: "success"
    });
  $("#fpeyty").submit();
})
  $('#pc').attr('class', 'active'); 
$('#archive_pc').attr('style', 'background-color:#dedbd8');
</script>