<?php $flag = $this->uri->segment(4); ?>
<?php $projid = $this->uri->segment(3); ?>
<?php   $this->load->helper('date');?>
<?php
$projectida = $this->uri->segment(3);
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

<?php
$this->db->select('*');
$this->db->where('boq_bd', $bd_tenid);
$this->db->where('status', 0);
$priboqid = $this->db->get('boq_item')->result();
?>

<div class="content-wrapper">
    <div class="content">

        <div class="row">

            <form id="fpetty" action="<?php echo base_url(); ?>pettycash_active/newpettycash/<?php echo $type; ?>" method="post" enctype="multipart/form-data">
                <div class="panel panel-flat">
                    <div class="panel-heading ">
                        <h5 class="panel-title">Petty Cash
                            <?php if ($chkconbqq == "1") {
                                echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</button>';
                            } else {
                                echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</button>';
                            } ?>&nbsp;
                            <?php if ($controlbg == "2") {
                                echo '<button class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</button>';
                            } else {
                                echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';
                            } ?>
                        </h5>
                        <input type="hidden" id="ckkcontrolbg" value="<?php echo $controlbg; ?>">
                    </div>

                    <div class="panel-body">




                        <div class="row">
                            <!-- <div class="col-md-6"> -->
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-component">
                                    <li class="active"><a href="#basic-rounded-tab1" data-toggle="tab">Petty Cash
                                            Detail</a></li>
                                    <li><a href="#basic-rounded-tab2" data-toggle="tab">Attachment File</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic-rounded-tab1">
                                        <fieldset>
                                            <div class="col-md-6">


                                                <div class="form-group">
                                                    <label>No.:</label>
                                                    <input type="text" class="form-control" readonly="readonly" id="pcno"
                                                        placeholder="Petty Cash No.">
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="code">Vender Type :</label>
                                                            <select class="form-control" name="vendertype" id="vendertype">
                                                                <option value="1">Employee</option>
                                                                <option value="2">External</option>
                                                            </select>
                                                            <input type="hidden" class="form-control" name="ventype"
                                                                value="1" id="ventype">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Pay To.:</label>
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-icon" type="button"><i
                                                                            class="icon-user"></i></button>
                                                                </span>
                                                                <input type="text" class="form-control text-left"
                                                                    placeholder="จ่ายให้กับ" name="venname" id="venname"
                                                                    readonly="true">
                                                                <input type="hidden" name="venid" id="venid">
                                                                <input type="text" class="form-control text-left"
                                                                    placeholder="จ่ายให้กับ" name="memname" id="memname"
                                                                    readonly="true">
                                                                <input type="hidden" name="memid" id="memid">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="openemp btn btn-info btn-icon"
                                                                        data-toggle="modal" data-target="#open"><i
                                                                            class="icon-search4"></i></button>
                                                                    <button type="button" class="openext btn btn-info btn-icon"
                                                                        data-toggle="modal" data-target="#openvenh"><i
                                                                            class="icon-search4"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($flag == 'd') {
                                                    $this->db->select('department_title');
                                                    $this->db->where('department_id', $projid);
                                                    $q = $this->db->get('department');
                                                    $ress = $q->result();

                                                    foreach ($ress as $key => $value) {
                                                        $dpname = $value->project_name;
                                                        $pjname = "";
                                                        $projectida = "";
                                                    }

                                                    echo ' <div class="form-group">
                                              <label>Department:</label>
                                              <div class="input-group">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                              </span>

                                              <input type="text" class="form-control" readonly="readonly" placeholder="Department" value=' . $dpname . ' name="depname" id="depname">
                                              <input type="hidden" readonly="true" value=' . $depid . ' class="form-control input-sm input-sm" name="depid" id="depid">
                                              <div class="input-group-btn">

                                                </ul>
                                              </div>
                                            </div>
                                            </div>
                                            '; ?>
                                                <?php 
                                            } ?>

                                                <?php if ($flag == 'p') {
                                                    $this->db->select('project_name');
                                                    $this->db->where('project_id', $projid);
                                                    $q = $this->db->get('project');
                                                    $resss = $q->result();
                                                    ?>
                                                <?php foreach ($resss as $key => $value) {
                                                    $dpname = "";
                                                    $pjname = $value->project_name;
                                                    ?>

                                                <div class="form-group">
                                                    <label>Project:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default btn-icon" type="button"><i
                                                                    class="icon-office"></i></button>
                                                        </span>
                                                        <input type="text" class="form-control" readonly="readonly"
                                                            placeholder="Project" value="<?php echo $pjname; ?>" name="projectname"
                                                            id="projectnamee">
                                                        <?php if ($flag == "p") { ?>
                                                        <input type="hidden" readonly="true" value="<?php echo $projid; ?>"
                                                            class="pproject1 form-control input-sm" name="projectid" id="putprojectid">

                                                        <input type="hidden" readonly="true" value="<?php echo $flag; ?>"
                                                            class="pproject1 form-control input-sm" name="flag">
                                                        <?php 
                                                    } ?>
                                                        <div class="input-group-btn">

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php	
                                            } ?>
                                                <?php 
                                            } ?>

                                                <?php if ($flag == 'p') { ?>

                                                <input type="hidden" readonly="true" value="<?php echo $project_code; ?>"
                                                    class="form-control" name="putprojectcode" id="putprojectcode">
                                                <input type="hidden" class="form-control" name="c_pt" id="c_pt" value="<?php if ($c_pt == 0) {
                                                                                                                            echo "
                                                    approve";
                                                                                                                        } else {
                                                                                                                            echo "wait";
                                                                                                                        } ?>">
                                                <input type="hidden" class="form-control" name="a_pt" id="a_pt" value="<?php echo $a_pt; ?>">

                                                <?php 
                                            } ?>
                                                <input type="hidden" class="form-control" readonly="readonly"
                                                    placeholder="Project" value="<?php echo $pjname; ?>" name="projectname"
                                                    id="projectnamee">
                                                <input type="hidden" readonly="true" value="<?php echo $projid; ?>"
                                                    class="pproject1 form-control input-sm" name="projectid" id="putprojectid">

                                                <input type="hidden" readonly="true" value="<?php echo $flag; ?>" class="pproject1 form-control input-sm"
                                                    name="flag">
                                                <div class="input-group-btn">
                                                    <!-- <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
                                                    </ul>
                                                </div>





                                                <input type="hidden" class="form-control" readonly="readonly"
                                                    placeholder="Department" value="<?php echo $dpname; ?>" name="depname"
                                                    id="depname">
                                                <input type="hidden" readonly="true" value="<?php echo $depid; ?>"
                                                    class="form-control input-sm input-sm" name="depid" id="depid">
                                                <div class="input-group-btn">
                                                    <!-- <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button> -->
                                                    </ul>
                                                </div>




                                            </div>
                                            <div class="col-md-6">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date: </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                <input type="text" class="form-control daterange-single"
                                                                    id="pcdate" name="pcdate">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Due Date: </label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                <input type="text" class="form-control daterange-single"
                                                                    id="duedate" name="duedate">
                                                                <input type="hidden" class="form-control" value="1" id="crterm"
                                                                    name="crterm">
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
                                                                <?php foreach ($array_system as $key => $system) { ?>
                                                                <option value="<?= $system['value'] ?>">
                                                                    <?= $system["name"] ?>
                                                                </option>
                                                                <?php 
                                                            } ?>
                                                                <?php if ($flag == 'd') { ?>
                                                                <?php echo "<option value='1'>Overhead</option>" ?>
                                                                <?php 
                                                            } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Advance To </label>
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-icon" type="button"><i
                                                                            class="icon-user"></i></button>
                                                                </span>
                                                                <input type="text" class="form-control" placeholder="Advance To"
                                                                    readonly value="<?php echo $name; ?>" name="advname"
                                                                    id="advname">
                                                                <input type="hidden" name="advid" id="advid" value="<?php echo $m_id; ?>">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="openadv btn btn-info btn-icon"
                                                                        data-toggle="modal" data-target="#openadv"><i
                                                                            class="icon-search4"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Remark:</label>
                                                            <input id="c" class="form-control" placeholder="Remark" name="remark" id="remark">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- </div> -->
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
                                        <div class="row">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-xxs" id="data">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>No.</th>
                                                            <th>Cost Code</th>
                                                            <th>Expense</th>
                                                            <th>Amount</th>
                                                            <th>VAT %</th>
                                                            <th>VAT Amount</th>
                                                            <th>W/T %</th>
                                                            <th>W/T Amount</th>
                                                            <th>Net Amount</th>
                                                            <th>Tax Name</th>
                                                            <th>Paid Date (W/T)</th>
                                                            <th>Tax Type</th>
                                                            <th>Invoice/Receipt Date.</th>
                                                            <th>Vender(W/T)</th>

                                                        </tr>
                                                    </thead>
                                                    <input type="hidden" id="row" name="row" value="" />
                                                    <input type="hidden" id="rowc" name="row" value="" />
                                                    <tbody id="body">
                                                        <tr>
                                                            <td colspan="17" class="text-center">NO DATA</td>
                                                        </tr>
                                                    </tbody>
                                                    <tr hidden>
                                                        <td><input type="text" name="summarytot" id="summarytot" value="0"></td>
                                                    </tr>
                                                    <?php if ($flag == 'p') { ?>
                                                    <?php
                                                    $this->db->select('*');
                                                    $this->db->from('approve');
                                                    $this->db->where('approve_project', $project_code);
                                                    $this->db->where('type', "PC");
                                                    $app_pj = $this->db->get()->result();
                                                    foreach ($app_pj as $app) {
                                                        ?>
                                                    <tr hidden>
                                                        <td><input type="text" name="approve_sequence[]" value="<?php echo $app->approve_sequence; ?>"></td>
                                                        <td><input type="text" name="approve_mid[]" value="<?php echo $app->approve_mid; ?>"></td>
                                                        <td><input type="text" name="approve_mname[]" value="<?php echo $app->approve_mname; ?>"></td>
                                                        <td><input type="text" name="approve_lock[]" value="<?php echo $app->approve_lock; ?>"></td>
                                                        <td><input type="text" name="approve_cost[]" value="<?php echo $app->approve_cost; ?>"></td>
                                                    </tr>
                                                    <?php 
                                                } ?>
                                                    <?php 
                                                } ?>
                                                </table>
                                            </div>
                                        </div>


                                        <br>
                                        <div class="text-right">
                                            <a href="<?php echo base_url(); ?>petty_cash/newpettycash/<?php echo $projid; ?>/<?php echo $flag; ?>"
                                                class="preload btn btn-info"><i class="icon-plus22"></i> New</a>
                                            <a data-toggle="modal" id="inst" class="btn btn-primary"><i class="icon-stackoverflow"></i>
                                                ADD Rows</a>
                                            <button type="button" id="spetty" class="btn btn-success"><i class="icon-floppy-disk position-left"></i>
                                                Save </button>
                                            <a href="<?php echo base_url(); ?>petty_cash/archive_pettycash" class="btn btn-danger"><i
                                                    class="icon-close2 position-left"></i> Close</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="basic-rounded-tab2">
                                        <div class="form-group">
                                            <label class="control-label input-xs" style="text-align: right;">Attachment File <span class="text-danger">*</span></label>
                                            <div class="col-lg-3">
                                                <input type="file" name="userfile" class="file-styled" accept=".jpg,.jpeg,.png,.pdf">
                                                <span class="text-danger">Only file .jpg , .jpeg , .png , .pdf <p>Maximum 2MB</p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
        <!-- editrow -->
        <div id="editrow"></div>
        <div class="editexpen"></div>
        <div class="editexpenn"></div>
        <div class="editexpennn"></div>
        <div class="editexpennnn"></div>
        <!-- /editrow -->

        <!-- modal edit -->

        <div id="edit" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="code_x" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">edit</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Materail Name</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" id="newmatname_edit" placeholder="Materail Name" class="form-control"
                                            readonly="true">
                                        <input type="text" id="newmatcode_edit" placeholder="Materail Name" class="form-control"
                                            readonly="true">
                                        <input type="hidden" id="ac_code_edit" class="form-control ">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-icon" id="mat_edit"><i class="icon-search4"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="">Cost Code</label>
                                <div class="input-group">
                                    <input type="text" id="costname_edit" readonly="true" placeholder="Cost Code" class="form-control ">
                                    <input type="text" id="codecostcode_edit" readonly="true" placeholder="Cost Code"
                                        class="form-control input-sm">
                                    <input type="hidden" id="type_edit" readonly="true" placeholder="Cost Code" class="form-control input-sm">


                                    <span class="input-group-btn">
                                        <?php if ($controlbg == "2") { ?>
                                        <button class="btn btn btn-info btn-icon" data-toggle="modal"><span class="glyphicon glyphicon-search"></span></button>
                                        <?php 
                                    } else { ?>
                                        <button type="button" class="modalcost btn btn-info btn-icon" data-toggle="modal"
                                            data-target="#costcode"><i class="icon-search4"></i></button>
                                        <?php 
                                    } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="type_costhide_edit">
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type_cost" id="type_cost_edit" class="form-control" >
                                        <option value=""></option>
                                        <option value="1">MATERIAL</option>
                                        <option value="2">LABOR.</option>
                                        <option value="3">SUB CON.</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="closebg_edit">
                            <div class="row">
                                <hr>
                            </div>



                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="">Vender Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control typeahead-remote input-sm" placeholder="Vender Name"
                                            name="vender" id="vender_edit">
                                        <span class="input-group-btn">
                                            <button type="button" class="modalcost btn btn-info btn-icon" data-toggle="modal"
                                                data-target="#openven"><i class="icon-search4"></i></button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="addrvender">Address Vender</label>
                                        <input type="text" id="addrvender_edit" name="addrvender" placeholder="Address Vender"
                                            class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="adddes">Detail</label>
                                        <input type="text" name="adddes" id="adddes_edit" placeholder="Detail" class="form-control input-sm">
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <label for="">Ref. Asset Code</label>
                                    <div class="input-group">
                                        <input type="hidden" id="accode_edit" readonly="true" class="form-control input-sm">
                                        <input type="text" id="acname_edit" readonly="true" class="form-control input-sm">
                                        <input type="hidden" id="statusass_edit" readonly="true" class="form-control input-sm">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-sm" id="refasset_edit" data-toggle="modal"
                                                data-target="#refass"><span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="checkbox checkbox-switchery switchery-xs">
                                        <label class="display-block">
                                            <input type="checkbox" class="switchery" id="chktax_edit"> TAX
                                        </label>
                                    </div>
                                    <input type="hidden" id="intputchktax_edit" name="intputchktax">
                                </div>
                                <div class="row" id="taxchk_edit" style="display:none;">
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="">TAX No. </label>
                                            <input type="text" class="form-control input-sm" id="taxno_edit"
                                                placeholder="TAX No">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label>TAX Date </label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="date" class="taxdate form-control" id="taxdate_edit" name="taxdate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-2" hidden="true">
                                    <div class="form-group">
                                        <label for="addrvender">QTY</label>
                                        <input type="text" id="amount_edit" name="amount" placeholder="QTY" class="form-control"
                                            value="1">
                                    </div>
                                </div>

                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label for="unitprice">Amount</label>
                                        <input type="text" id="unitprice_edit" onkeyup="cal_modal_edit()" name="unitprice"
                                            placeholder="Amount" class="numbersOnly form-control text-right">
                                    </div>
                                </div>
                                <div id="controlpc"></div>
                                <div class="col-xs-2">
                                    <label for="addrvender">Vat %</label>
                                    <div class="input-group">
                                        <input type="text" id="taxvv_edit" onkeyup="cal_modal_edit()" class="form-control text-right"
                                            value="0">
                                        <span class="numbersOnly input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="addrvender">VAT Amount</label>
                                        <input type="text" id="netamt_edit" name="netamt" class="form-control text-right"
                                            readonly="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row" <?php if ($controlbg != "2") {
                                                echo "hidden";
                                            } ?>>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Budget Control</label>
                                        <input class="form-control text-right border-danger" type="text" name="totalcost[]"
                                            id="totalcost_edit" value="" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <label for="dod">Invoice/Receipt No.</label>
                                    <input type="text" id="dod_edit" name="dod" class="form-control">
                                </div>

                                <div class="col-xs-3">
                                    <label for="dodate">Invoice/Receipt Date</label>
                                    <input type="date" id="dodate_edit" name="dodate" class="form-control" value="<?php echo date('Y-m-d H:i:s',now());?>">
                                </div>
                                <div class="col-xs-3">
                                    <label for="dodate">TAX ID</label>
                                    <input type="text" maxlength="13" id="taxid_edit" name="taxid" class="form-control">
                                    <input type="hidden" id="vventype_edit" name="vventype" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="checkbox checkbox-switchery switchery-xs">
                                        <label class="display-block">
                                            <input type="checkbox" class="switchery" id="whchktax_edit"> W/T
                                        </label>
                                    </div>
                                    <input type="hidden" id="intputwhchktax_edit" name="intputwhchktax">
                                </div>
                            </div>

                            <div id="whtaxchk_edit" style="display:none;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label type="tax"> TYPE W/T</label>
                                            <select class="form-control input-sm" name="tax" id="tax_edit">
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
                                            <label for=""> W/T Amount</label>
                                            <input type="text" class="form-control input-sm" id="totwh_edit" readonly="true"
                                                placeholder="W/T Amount">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="addrvender">Paid W/T</label>
                                            <input type="date" id="paydate_edit" name="payday" class="form-control daterange-single">
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label for="">Tax Type</label>
                                        <div class="form-group">
                                            <select name="taxtype" id="taxtype_edit" class="form-control">
                                                <option value="0">ไม่มี</option>
                                                <option value="1">ภ.ง.ด. 1</option>
                                                <option value="2">ภ.ง.ด. 1ก พิเศษ</option>
                                                <option value="3">ภ.ง.ด. 2</option>
                                                <option value="4">ภ.ง.ด. 2ก</option>
                                                <option value="5">ภ.ง.ด. 3</option>
                                                <option value="6">ภ.ง.ด. 3ก</option>
                                                <option value="7">ภ.ง.ด. 53</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="">Vender Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control typeahead-remote" placeholder="Vender Name"
                                                name="venderwt" id="venderwt_edit" value="0">
                                            <span class="input-group-btn">
                                                <button type="button" class="modalcost btn btn-default btn-icon"
                                                    data-toggle="modal" data-target="#openvenwt"><i class="icon-search4"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12" style="margin-top:10px;">
                                        <div class="form-group">
                                            <label for="addrvender">Address Vender</label>
                                            <input type="text" id="addrvenderwt_edit" name="addrvenderwt" placeholder="Address Vender"
                                                class="form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label for="addrvender">Net Amount</label>
                                        <input type="text" id="amttot_edit" name="amttot" class="text-right form-control"
                                            readonly="true">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" id="save_edit" onclick="edit_row($(this))" class="btn btn-primary"
                                    data-dismiss="modal"><i class="glyphicon glyphicon-ok"> edit</i></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i>
                                    Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->





    <!-- Basic modal -->
    <div id="insertrow" class="modal fade" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" id="code_x" data-dismiss="modal">X</button>
                    <h5 class="modal-title">Insert Petty Cash</h5>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="">Expend</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <!-- <span class="input-group-addon">
                            <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                          </span> -->
                                    <input type="text" id="newmatname" placeholder="Expend Name" class="form-control "
                                        readonly="true">
                                    <input type="text" id="newmatcode" placeholder="Expend Name" class="form-control "
                                        readonly="true">
                                    <input type="hidden" id="ac_code" class="form-control ">
                                    <span class="input-group-btn">
                                        <button type="button" class="openun btn btn-info btn-icon" data-toggle="modal"
                                            data-target="#opnewmat"><i class="icon-search4"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="">Cost Code</label>
                            <div class="input-group">
                                <input type="text" id="costname" readonly="true" placeholder="Cost Code" class="form-control ">
                                <input type="text" id="codecostcode" readonly="true" placeholder="Cost Code" class="form-control input-sm">
                                <input type="hidden" id="type" readonly="true" placeholder="Cost Code" class="form-control input-sm">


                                <span class="input-group-btn">
                                    <?php if ($controlbg == "2") { ?>
                                    <button class="btn btn btn-info btn-icon" id="selectcostcodeboq" data-toggle="modal"
                                        data-target="#boq"><span class="glyphicon glyphicon-search"></span></button>
                                    <?php 
                                } else { ?>
                                    <button type="button" class="modalcost btn btn-info btn-icon" data-toggle="modal"
                                        data-target="#costcode"><i class="icon-search4"></i></button>
                                    <?php 
                                } ?>
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

                    <div class="row" id="type_costhide">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type_cost" id="type_cost" class="form-control" required="">
                                    <option value=""></option>
                                    <option value="1">MATERIAL</option>
                                    <option value="2">LABOR.</option>
                                    <option value="3">SUB CON.</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="closebg">
                        <div class="row">
                            <hr>
                        </div>



                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Vender Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control typeahead-remote input-sm" placeholder="Vender Name"
                                        name="vender" id="vender">
                                    <span class="input-group-btn">
                                        <button type="button" class="modalcost btn btn-info btn-icon" data-toggle="modal"
                                            data-target="#openven"><i class="icon-search4"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="addrvender">Address Vender</label>
                                    <input type="text" id="addrvender" name="addrvender" placeholder="Address Vender"
                                        class="form-control input-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="adddes">Detail</label>
                                    <input type="text" name="adddes" id="adddes" placeholder="Detail" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label for="">Ref. Asset Code</label>
                                <div class="input-group">
                                    <input type="hidden" id="accode" readonly="true" class="form-control input-sm">
                                    <input type="text" id="acname" readonly="true" class="form-control input-sm">
                                    <input type="hidden" id="statusass" readonly="true" class="form-control input-sm">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal"
                                            data-target="#refass"><span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="checkbox checkbox-switchery switchery-xs">
                                    <label class="display-block">
                                        <input type="checkbox" class="switchery" id="chktax"> TAX
                                    </label>
                                </div>
                                <input type="hidden" id="intputchktax" name="intputchktax">
                            </div>
                            <div class="row" id="taxchk">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="">TAX No. </label>
                                        <input type="text" class="form-control input-sm" id="taxno" placeholder="TAX No">
                                    </div>
                                </div>
                                <div class="col-xs-3">

                                    <div class="form-group">
                                        <label>TAX Date </label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input type="date" class="taxdate form-control" id="taxdate" name="taxdate">
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
                        <br>
                        <div class="row">
                            <div class="col-xs-2" hidden="true">
                                <div class="form-group">
                                    <label for="addrvender">QTY</label>
                                    <input type="text" id="amount" name="amount" placeholder="QTY" class="form-control"
                                        value="1">
                                </div>
                            </div>

                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label for="unitprice">Amount</label>
                                    <input type="text" id="unitprice" name="unitprice" placeholder="Amount" class="numbersOnly form-control text-right">
                                </div>
                            </div>
                            <div id="controlpc"></div>
                            <div class="col-xs-2">
                                <label for="addrvender">Vat %</label>
                                <div class="input-group">
                                    <input type="text" id="taxvv" class="form-control text-right" value="0">
                                    <span class="numbersOnly input-group-addon" id="basic-addon2">%</span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="addrvender">VAT Amount</label>
                                    <input type="text" id="netamt" name="netamt" class="form-control text-right"
                                        readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="row" <?php if ($controlbg != "2") {
                                            echo "hidden";
                                        } ?>>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label>Budget Control</label>
                                    <input class="form-control text-right border-danger" type="text" name="totalcost[]"
                                        id="totalcost" value="" readonly="">
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
                                <input type="date" id="dodate" name="dodate" class="form-control" value="<?php echo date('Y-m-d H:i:s',now());?>">
                            </div>
                            <div class="col-xs-3">
                                <label for="dodate">TAX ID</label>
                                <input type="text" style="color: red;background-color: rgba(85, 85, 85, 0);border: aliceblue;"
                                    id="alrtt">
                                <input type="text" maxlength="13" id="taxid" name="taxid" class="form-control">
                                <input type="hidden" id="vventype" name="vventype" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-3">
                                <div class="checkbox checkbox-switchery switchery-xs">
                                    <label class="display-block">
                                        <input type="checkbox" class="switchery" id="whchktax"> W/T
                                    </label>
                                </div>
                                <input type="hidden" id="intputwhchktax" name="intputwhchktax">
                            </div>
                        </div>

                        <div id="whtaxchk">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label type="tax"> TYPE W/T</label>
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
                                        <label for=""> W/T Amount</label>
                                        <input type="text" class="form-control input-sm" id="totwh" readonly="true"
                                            placeholder="W/T Amount">
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="addrvender">Paid W/T</label>
                                        <input type="date" id="paydate" name="payday" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-xs-3">
                                    <label for="">Tax Type</label>
                                    <div class="form-group">
                                        <select name="taxtype" id="taxtype" class="form-control">
                                            <option value="0">ไม่มี</option>
                                            <option value="1">ภ.ง.ด. 1</option>
                                            <option value="2">ภ.ง.ด. 1ก พิเศษ</option>
                                            <option value="3">ภ.ง.ด. 2</option>
                                            <option value="4">ภ.ง.ด. 2ก</option>
                                            <option value="5">ภ.ง.ด. 3</option>
                                            <option value="6">ภ.ง.ด. 3ก</option>
                                            <option value="7">ภ.ง.ด. 53</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="">Vender Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control typeahead-remote" placeholder="Vender Name"
                                            name="venderwt" id="venderwt" value="0">
                                        <span class="input-group-btn">
                                            <button type="button" class="modalcost btn btn-default btn-icon"
                                                data-toggle="modal" data-target="#openvenwt"><i class="icon-search4"></i></button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12" style="margin-top:10px;">
                                    <div class="form-group">
                                        <label for="addrvender">Address Vender</label>
                                        <input type="text" id="addrvenderwt" name="addrvenderwt" placeholder="Address Vender"
                                            class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="form-group">
                                    <label for="addrvender">Net Amount</label>
                                    <input type="text" id="amttot" name="amttot" class="text-right form-control"
                                        readonly="true">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">

                            <button type="button" id="addtorow" class="btn btn-primary"><i class="glyphicon glyphicon-ok">
                                    Insert</i></button>
                            <button type="button" id="ctr" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- /basic modal -->

</div>
<!-- /content area -->

</div>

<script>
    $('#mat_edit').click(function() {
    // modal_mat_edit modal show
    $('#modal_mat_edit').modal('show');
    $('#content_edit').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#content_edit").load('<?php echo base_url(); ?>petty_cash/acount_total')
    // content_edit
  });
  $('#closebg').hide();
   $('#type_costhide').hide();

   $("#type_cost").change(function(){
  
      var type_cost = $("#type_cost").val();
      var codecostcodeint = $('#codecostcode').val();
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
  $('#closebg').hide();
  }
 });
</script>

<div class="modal fade" id="refass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
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
<div id="opnewmat" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Item</h5>
            </div>
            <div class="modal-body">
                <div class="row" id="modal_mat"></div>

            </div>
        </div>
    </div> <!-- matcode-->
</div>
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add CostCode</h4>
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
                <h4 class="modal-title" id="myModalLabel">Add CostCode</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="modal_boq">
                </div>

            </div>
        </div>
    </div>
</div><!-- end modal matcode and costcode -->

<div class="modal fade" id="modal_mat_edit" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Item</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="content_edit">
                </div>

            </div>
        </div>
    </div>
</div>
<script>


    $('#selectcostcodeboq').click(function(){
  $('#closebg').hide();
  $('#type_cost').val("");
  var system = $('#system').val();
   $('#modal_boq').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
   $("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system);
 });
</script>
<!-- modal เลือกหน่วย -->
<div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Unit</h4>
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
<div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Pay To</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row">
                        <div>
                            <table class="table table-xxs table-hover datatable-basirc">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Pay To Name</th>
                                        <th>Project/Department</th>
                                        <th width="5%">Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1; ?>
                                    <?php foreach ($mem as $val) { ?>
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
                                        <td><button class="openr<?php echo $n; ?> btn btn-xs btn-block btn-primary"
                                                data-toggle="modal" data-mname<?php echo $n; ?>="<?php echo $val->vender_name; ?>" data-mid<?php echo $n; ?>="<?php echo $val->vender_code; ?>" data-dismiss="modal">SELECT</button></td>
                                    </tr>

                                    <script>
                                        $('.openr<?php echo $n; ?>').click(function(){
                        $('#memid').val($(this).data('mid<?php echo $n; ?>'));
                        $('#memname').val($(this).data('mname<?php echo $n; ?>'));

                      })
                      </script>

                                    <?php $n++;
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
<!-- Full width modal -->
<div id="openadv" class="modal fade" data-backdrop="false" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Advance Name</h5>
            </div>

            <div class="modal-body">
                <div id="adv">

                </div>
            </div>
            <br>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
                <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
            </div>
        </div>
    </div>
</div>
<!-- /full width modal -->


<!-- modal  โครงการ-->
<div class="modal fade" id="openproj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
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
<div class="modal fade" id="opendepart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
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
<!-- modal โครงการ เลือกร้านค้า-->
<div class="modal fade" id="openvenh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Vender</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-xxs table-hover datatable-basircvender">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Vender Name</th>
                                    <th>Address Vender</th>
                                    <th width="5%">Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 1; ?>
                                <?php foreach ($ven as $val) { ?>
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
                                    <td><button class="openr<?php echo $n; ?> btn btn-xs btn-block btn-primary"
                                            data-toggle="modal" data-vender_name<?php echo $n; ?>="<?php echo $val->vender_name; ?>" data-vender_code<?php echo $n; ?>="<?php echo $val->vender_code; ?>" data-dismiss="modal">SELECT</button></td>
                                </tr>

                                <script>
                                    $('.openr<?php echo $n; ?>').click(function(){
                      $('#venid').val($(this).data('vender_code<?php echo $n; ?>'));
                      $('#venname').val($(this).data('vender_name<?php echo $n; ?>'));
                      $(".openext").hide();

                    })
                    </script>

                                <?php $n++;
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
<!-- modal เลือกร้านค้า ใน modal -->
<div class="modal fade" id="openven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Vender</h4>
            </div>
            <div class="modal-body">
                <table class="table datatable-basici">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Vender Name</th>
                            <th>Address Vender</th>
                            <th width="5%">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($res as $val) { ?>
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
                            <td><button class="openvendmodal<?php echo $n; ?> btn btn-xs btn-block btn-primary" data-taxidr<?php echo $n; ?>="<?php echo $val->vender_tax; ?>" data-toggle="modal" data-vnameh<?php echo $n; ?>="<?php echo $val->vender_name; ?>" data-addrh<?php echo $n; ?>="<?php echo $val->vender_address; ?>" data-crteam="<?php echo $val->vender_credit; ?>" data-vtel="<?php echo $val->vender_tel; ?>" data-type<?php echo $n; ?>="<?php echo $val->vender_type; ?>" data-dismiss="modal">SELECT</button></td>
                        </tr>
                        <script>
                            $(".openvendmodal<?php echo $n; ?>").click(function(event) {
                                $("#vender").val($(this).data('vnameh<?php echo $n; ?>'));
                                $("#addrvender").val($(this).data('addrh<?php echo $n; ?>'));
                                $("#taxid").val($(this).data('taxidr<?php echo $n; ?>'));
                                $("#vender_edit").val($(this).data('vnameh<?php echo $n; ?>'));
                                $("#addrvender_edit").val($(this).data('addrh<?php echo $n; ?>'));
                                $("#venderwt").val($(this).data('vnameh<?php echo $n; ?>'));
                                $("#addrvenderwt").val($(this).data('addrh<?php echo $n; ?>'));
                            });
                        </script>
                        <?php $n++;
                    } ?>
                    </tbody>
                </table>
                <script>
                    $(".datatable-basici").DataTable();
          </script>

            </div>
        </div>
    </div>
</div>
<!--end modal -->


<!--modal W/T -->


<!-- modal เลือกร้านค้า ใน modal -->
<div class="modal fade" id="openvenwt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Vender</h4>
            </div>
            <div class="modal-body">
                <table class="table datatable-basiciee">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Vender Name</th>
                            <th>Address Vender</th>
                            <th width="5%">Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($res as $val) { ?>
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
                            <td><button class="openvendmodalwt<?php echo $n; ?> btn btn-xs btn-block btn-primary"
                                    data-toggle="modal" data-vnameh<?php echo $n; ?>="<?php echo $val->vender_name; ?>" data-addrh<?php echo $n; ?>="<?php echo $val->vender_address; ?>" data-crteam="<?php echo $val->vender_credit; ?>" data-vtel="<?php echo $val->vender_tel; ?>" data-dismiss="modal">SELECT</button></td>
                        </tr>
                        <script>
                            $(".openvendmodalwt<?php echo $n; ?>").click(function(event) {
                                $('#venderwt_edit').val($(this).data('vnameh<?php echo $n; ?>'));
                                $('#addrvenderwt_edit').val($(this).data('addrh<?php echo $n; ?>'));
                                $("#venderwt").val($(this).data('vnameh<?php echo $n; ?>'));
                                $("#addrvenderwt").val($(this).data('addrh<?php echo $n; ?>'));
                            });
                        </script>
                        <?php $n++;
                    } ?>
                    </tbody>
                </table>

                <script>
                    $(".datatable-basiciee").DataTable();
                </script>

            </div>
        </div>
    </div>
</div>
<!--end modal -->
<script>
    //  $("#myform").validate();
</script>
<script>
    // even in modal edit
    $('#whchktax_edit').click(function() {
        let val = $(this).is(":checked");
        if (val === true) {
            $('#whtaxchk_edit').css('display', 'block');
        } else {
            $('#whtaxchk_edit').css('display', 'none');
        }
    });

    $('#chktax_edit').click(function() {
        let val = $(this).is(":checked");
        if (val === true) {
            $('#taxchk_edit').css('display', 'block');
        } else {
            $('#taxchk_edit').css('display', 'none');
        }
    });
    // even in modal edit


    // $("#vender").keyup(function(){
    //    $('#taxid').prop('disabled', false);
    //  });
    $('#chk').click(function(event) {
        if ($('#chk').prop('checked')) {
            $('#newmatname').prop('disabled', false);
        } else {
            $('#newmatname').prop('disabled', true);
        }
    });
    $("#ctr , #code_x").click(function() {
        $("#controlpc").empty();
    });
    $("#addtorow").click(function(event) {
        //_pay ค่าที่ใช้ไป
        var chtax = $(this).attr('attr-chtax');
        var chwt = $(this).attr('attr-chwt');

        // alert(_pay +" "+_temp+" "+_total+" "+id_re);
        $('#rowc').val(1);

        if ($("#taxid").val() == "" && $("#ventype").val() == "2") {
            swal({
                title: "Please fill  Tax Id!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#codecostcode").val() == "") {
            swal({
                title: "Please Select Costcode!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#newmatcode").val() == "") {
            swal({
                title: "Please Select Materail!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#unitprice").val() == "") {
            swal({
                title: "Please Fill Amount!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#intputchktax").val() == "Y" && $("#taxvv").val() == 0) {
            swal({
                title: "Please Fill Tax No. !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#intputchktax").val() == "Y" && $("#taxno").val() == "") {
            swal({
                title: "Please Fill Invoice No. !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#intputchktax").val() == "Y" && $("#taxdate").val() == "") {
            swal({
                title: "Please Fill Invoice Date !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else {
            var status = $('#whchktax').is(':checked');

            if (status === true) {
                if ($('#tax').val() == '0') {
                    swal({
                        title: "Please select TYPE W/T !!.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                    });
                    return false;
                }

                if ($('#taxtype').val() == '0') {
                    swal({
                        title: "Please select Tax Type !!.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                    });
                    return false;
                }
            }

            var ckkcontrolbg = $('#ckkcontrolbg').val();
            if (ckkcontrolbg == "2") {
                var type_cost = $("#type_cost").val();
                // $("#costbgmat"+costcode+"").val(totalcost);
                if (type_cost == 1) {
                    var totalcost = parseFloat($('#totalcost').val());
                    var costcode = $('#codecostcode').val();

                    var pamount = parseFloat($('#unitprice').val());
                    var costbgmat = parseFloat($('#costbgmat' + costcode + '').val());
                    $("#costbgmat" + costcode + "").val(costbgmat - pamount);
                } else if (type_cost == 2) {
                    var totalcost = parseFloat($('#totalcost').val());
                    var costcode = $('#codecostcode').val();
                    var pamount = parseFloat($('#unitprice').val());
                    var costbglebour = parseFloat($('#costbglebour' + costcode + '').val());
                    $("#costbglebour" + costcode + "").val(costbglebour - pamount);
                } else if (type_cost == 3) {
                    var totalcost = parseFloat($('#totalcost').val());
                    var costcode = $('#codecostcode').val();
                    var pamount = parseFloat($('#unitprice').val());
                    var costbgsub = parseFloat($('#costbgsub' + costcode + '').val());
                    $("#costbgsub" + costcode + "").val(costbgsub - pamount);
                }
            }
            var chtax = $('#chktax').is(':checked');
            var chwt = $('#whchktax').is(':checked');

            addrow(chtax, chwt);
            $(".addboxpri").show();

            // alert("TAX = "+$('#chktax').is( ":checked" )+" W/T"+  $('#whchktax').is( ":checked" ))

            if ($('#chktax').is(":checked") === true) {

                $('#chktax').click();

            }
            if ($('#whchktax').is(":checked") === true) {
                $('#whchktax').click();

            }
            // $("#whchktax").prop('checked', false);
            $("#taxchk").hide();
            $("#whtaxchk").hide();
            $("#newmatname").val("");
            $("#newmatcode").val("");
            $("#costname").val("");
            $("#codecostcode").val("");
            $("#unit").val("");
            $("#remarkitem").val("");
            $("#codecostcode").val("");
            $("#costname").val("");
            $('#unitprice').val("");
            $("#amttot").val("");
            $("#netamt").val("");
            $("#totwh").val("0");
            $("#tax").val("0");
            $("#taxtype").val("0");
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
            $("#taxid").val("");
            $("#totalcost").val("");
            $("#type_cost").val("");
            $('#closebg').hide();
            $("#eve").hide();

            // editrow();

        }
        // var boq_id_moin = $("#boq_id").val();
        var id_re = $("#boq_id").val();
        var _temp = $('#costbg' + id_re).val() * 1;
        var _pay1 = $('#costcontrol').val() * 1;
        // alert(_pay1+" "+_temp);
        // var _total_in = _temp - _pay1*1;

        // alert(_temp+" "+_total);
        $('#costbg' + id_re).val(_pay1);
        $("#controlpc").empty();

    });

    function cal_modal_edit() {
        let amt = $('#unitprice_edit').val() * 1;
        let vat = $('#taxvv_edit').val() * 1;

        $('#netamt_edit').val(amt * vat / 100);
        let net = $('#netamt_edit').val() * 1;
        let wt = $('#tax_edit').val() * 1;
        $('#totwh_edit').val(amt * wt / 100);
        $('#amttot_edit').val(amt + net - wt);
    }

    $('#tax_edit').change(function() {
        let val = $(this).val() * 1;
        let amt = $('#unitprice_edit').val() * 1;
        let wtamt = amt * val / 100;
        $('#totwh_edit').val(wtamt);
        let vatamt = $('#netamt_edit').val() * 1;
        $('#amttot_edit').val(amt + vatamt - wtamt);
    })


    function edit_row(el) {
        let id = el.attr('attr-id');
        let matcode = $("#newmatname_edit").val();
        let costname = $("#newmatcode_edit").val();
        let intputchktax = $("#intputchktax_edit").val();
        let intputwhchktax = $("#intputwhchktax_edit").val();
        let vender = $("#vender_edit").val();
        let addrvender = $("#addrvender_edit").val();
        let taxno = $("#taxno_edit").val();
        let taxdate = $("#taxdate_edit").val();
        let taxv = $("#taxv_edit").val();
        let boq_id = $("#boq_id_edit").val();
        let type = $("#type_edit").val();
        let type_cost = $('#type_cost_edit').val();
        let venderwt = $("#venderwt_edit").val();
        let adddes = $('#adddes_edit').val();
        let taxid = $('#taxid_edit').val();
        let addrvenderwt = $("#addrvenderwt_edit").val();
        let accode = $("#accode_edit").val();
        let acname = $("#acname_edit").val();
        let statusass = $("#statusass_edit").val();
        let costcode = $("#codecostcode_edit").val();
        let matname = $("#newmatname_edit").val();
        let acccode = $("#ac_code_edit").val();
        let unitprice = $('#unitprice_edit').val();
        let netamt = $("#netamt_edit").val();
        let taxvv = $("#taxvv_edit").val();
        let tax = $("#tax_edit").val();
        let totwh = $("#totwh_edit").val();
        let amttot = $("#amttot_edit").val();
        let paydate = $('#paydate_edit').val();
        let dod = $('#dod_edit').val();
        let taxtype = $("#taxtype_edit").val();
        let dodate = $('#dodate_edit').val();

        $(`#matcodei${id}`).val(matcode);
        $(`#costnamei${id}`).val(costname);
        $(`#venderi${id}`).val(vender);
        $(`#addrvenderi${id}`).val(addrvender);
        $(`#taxdatei${id}`).val(taxdate);
        $(`#taxvi${id}`).val(taxv);
        $(`#boq_id${id}`).val(boq_id);
        $(`#type${id}`).val(type);
        $(`#type_cost${id}`).val(type_cost);
        $(`#venderwt${id}`).val(venderwt);
        $(`#adddes${id}`).val(adddes);
        $(`#taxidd${id}`).val(taxid);
        $(`#addrvenderwt${id}`).val(addrvenderwt);
        $(`#accode${id}`).val(accode);
        $(`#acname${id}`).val(acname);
        $(`#statusass${id}`).val(statusass);
        $(`#costcode${id}`).val(costcode);
        $(`#matnamei${id}`).val(matname);
        $(`#ac_code${id}`).val(acccode);
        $(`#too_dii${id}`).val(unitprice);
        $(`#netamti${id}`).val(netamt);
        $(`#taxvvi${id}`).val(taxvv);
        $(`#taxi${id}`).val(tax);
        $(`#totwhi${id}`).val(totwh);
        $(`#amttoti${id}`).val(amttot);
        $(`#paydate${id}`).val(paydate);
        $(`#dod${id}`).val(dod);
        $(`#taxtypei${id}`).val(taxtype);
        $(`#dodate${id}`).val(dodate);


        el.attr(`price${id}`, unitprice);
        el.attr(`attr-matcode${id}`, matcode);
        el.attr(`attr-costname${id}`, costname);
        el.attr(`attr-vender${id}`, vender);
        el.attr(`attr-addrvender${id}`, addrvender);
        el.attr(`attr-taxno${id}`, taxno);
        el.attr(`attr-taxdate${id}`, taxdate);
        el.attr(`attr-taxv${id}`, taxv);
        el.attr(`attr-boq_id${id}`, boq_id);
        el.attr(`attr-type${id}`, type);
        el.attr(`attr-type_cost${id}`, type_cost);
        el.attr(`attr-venderwt${id}`, venderwt);
        el.attr(`attr-adddes${id}`, adddes);
        el.attr(`attr-taxid${id}`, taxid);
        el.attr(`attr-addrvenderwt${id}`, addrvenderwt);
        el.attr(`attr-accode${id}`, accode);
        el.attr(`attr-acname${id}`, acname);
        el.attr(`attr-statusass${id}`, statusass);
        el.attr(`attr-costcode${id}`, costcode);
        el.attr(`attr-matname${id}`, matname);
        el.attr(`attr-acccode${id}`, acccode);

        el.attr(`attr-netamt${id}`, netamt);
        el.attr(`attr-taxvv${id}`, taxvv);
        el.attr(`attr-tax${id}`, tax);
        el.attr(`attr-totwh${id}`, totwh);
        el.attr(`attr-amttot${id}`, amttot);
        el.attr(`attr-paydate${id}`, paydate);
        el.attr(`attr-dod${id}`, dod);
        el.attr(`attr-taxtype${id}`, taxtype);
        el.attr(`attr-dodate${id}`, dodate);

        $(`#td_costcode${id}`).html(costcode);
        $(`#td_costname${id}`).html(matname);
        $(`#td_amount${id}`).html(unitprice);
        $(`#td_vatper${id}`).html(netamt);
        $(`#td_vat${id}`).html(taxvv);
        $(`#td_wtper${id}`).html(tax);
        $(`#td_wtamt${id}`).html(totwh);
        $(`#td_netamount${id}`).html(amttot);
        // $(`#td_taxname${id}`).html(taxname);
        $(`#td_do${id}`).html(paydate);
        $(`#td_paidday${id}`).html(taxtype);
        $(`#td_dodate${id}`).html(dodate);
        alert(`#td_namevender${id} = ${venderwt}`);
        $(`#td_namevender${id}`).html(venderwt);

        el.attr('attr-chtax', $('#chktax_edit').is(':checked'));
        el.attr('attr-chwt', $('#whchktax_edit').is(':checked'));

        // let qty = $('#amount').val();
        // let unit = $("#unit").val();
        // let remark = $("#remarkitem").val();
        // let totvat = $("#totvat").val();
        // let xpd1 =$("#xpd1").val();
    }

    function edit_modal(el) {
        $('#edit').modal('show');
        let id = el.attr(`attr-id`);
        let price = el.attr(`price${id}`);
        let matcode = el.attr(`attr-matcode${id}`);
        let costname = el.attr(`attr-costname${id}`);
        let intputchktax = el.attr(`attr-intputchktax${id}`);
        let vender = el.attr(`attr-vender${id}`);
        let addrvender = el.attr(`attr-addrvender${id}`);
        let taxno = el.attr(`attr-taxno${id}`);
        let taxdate = el.attr(`attr-taxdate${id}`);
        let taxv = el.attr(`attr-taxv${id}`);
        let boq_id = el.attr(`attr-boq_id${id}`);
        let type = el.attr(`attr-type${id}`);
        let type_cost = el.attr(`attr-type_cost${id}`);
        let venderwt = el.attr(`attr-venderwt${id}`);
        let adddes = el.attr(`attr-adddes${id}`);
        let taxid = el.attr(`attr-taxid${id}`);
        let addrvenderwt = el.attr(`attr-addrvenderwt${id}`);
        let accode = el.attr(`attr-accode${id}`);
        let acname = el.attr(`attr-acname${id}`);
        let statusass = el.attr(`attr-statusass${id}`);
        let costcode = el.attr(`attr-costcode${id}`);
        let matname = el.attr(`attr-matname${id}`);
        let acccode = el.attr(`attr-acccode${id}`);
        let unitprice = el.attr(`attr-unitprice${id}`);
        let netamt = el.attr(`attr-netamt${id}`);
        let taxvv = el.attr(`attr-taxvv${id}`);
        let tax = el.attr(`attr-tax${id}`);
        let totwh = el.attr(`attr-totwh${id}`);
        let amttot = el.attr(`attr-amttot${id}`);
        let paydate = el.attr(`attr-paydate${id}`);
        let dod = el.attr(`attr-dod${id}`);
        let taxtype = el.attr(`attr-taxtype${id}`);
        let dodate = el.attr(`attr-dodate${id}`);
        let chtax = el.attr(`attr-chtax${id}`);
        let chwt = el.attr(`attr-chwt${id}`);
        console.log(
            `
    price = ${price}, 
    id = ${id}, 
    matcode = ${matcode}, 
    costname = ${costname},
    intputchktax = ${intputchktax},
    vender = ${vender},
    addrvender = ${addrvender},
    taxno = ${taxno},
    taxdate = ${taxdate},
    taxv = ${taxv},
    boq_id = ${boq_id},
    type = ${type},
    type_cost = ${type_cost},
    venderwt = ${venderwt},
    adddes = ${adddes},
    taxid = ${taxid},
    addrvenderwt = ${addrvenderwt},
    accode = ${accode},
    acname = ${acname},
    statusass = ${statusass},
    costcode = ${costcode},
    matname = ${matname},
    acccode = ${acccode},
    unitprice = ${unitprice},
    netamt = ${netamt},
    taxvv = ${taxvv},
    tax = ${tax},
    totwh = ${totwh},
    amttot = ${amttot},
    paydate = ${paydate},
    dod = ${dod},
    taxtype = ${taxtype},
    dodate = ${dodate},
  `
        );

        $('#newmatname_edit').val(matname);
        $('#newmatcode_edit').val(matcode);
        $('#costname_edit').val(costname);
        $('#codecostcode_edit').val(costcode);
        $('#vender_edit').val(vender);
        $('#addrvender_edit').val(addrvender);

        $('#adddes_edit').val(adddes);
        $('#accode_edit').val(accode);
        $('#acname_edit').val(acname);
        $('#statusass_edit').val(statusass);
        $('#taxno_edit').val(taxno);
        $('#taxdate_edit').val(taxdate);
        $('#unitprice_edit').val(price);
        $('#taxvv_edit').val(taxvv);
        $('#netamt_edit').val(netamt);
        $('#dod_edit').val(dod);
        $('#dodate_edit').val(dodate);
        $('#taxid_edit').val(taxid);
        $('#totwh_edit').val(totwh);
        $('#paydate_edit').val(paydate);
        $('#venderwt_edit').val(venderwt);
        $('#addrvenderwt_edit').val(addrvenderwt);
        $('#amttot_edit').val(amttot);
        $(`#type_cost_edit option[value=${type_cost}]`).attr('selected', 'selected');
        $(`#tax_edit option[value=${tax}]`).attr('selected', 'selected');
        $(`#taxtype_edit option[value=${taxtype}]`).attr('selected', 'selected');
        if (chtax == 'true') {
            $('#chktax_edit').click();
        }

        if (chwt == 'true') {
            $('#whchktax_edit').click();
        }

        $('#save_edit').attr('attr-id', id);

    }


    function addrow(chtax, chwt) {

        $('td[class="text-center"]').closest('tr').remove();
        var matcode = $("#newmatcode").val();
        var row = ($('#body tr').length - 0) + 1;
        var taxid = $('#taxid').val();
        var adddes = $('#adddes').val();
        var dod = $('#dod').val();
        var dodate = $('#dodate').val();
        var paydate = $('#paydate').val();
        var qty = $('#amount').val();
        var matname = $("#newmatname").val();
        var acccode = $("#ac_code").val();
        var unit = $("#unit").val();
        var remark = $("#remarkitem").val();
        var costcode = $("#codecostcode").val();
        var costname = $("#costname").val();
        var unitprice = $('#unitprice').val();
        var amttot = $("#amttot").val();
        var netamt = $("#netamt").val();
        var taxv = $("#taxvv").val();
        var taxvv = $("#taxvv").val();
        var totvat = $("#totvat").val();
        var totwh = $("#totwh").val();
        var intputchktax = $("#intputchktax").val();
        var intputwhchktax = $("#intputwhchktax").val();
        var vender = $("#vender").val();
        var venderwt = $("#venderwt").val();
        var addrvender = $("#addrvender").val();
        var addrvenderwt = $("#addrvenderwt").val();
        var taxno = $("#taxno").val();
        var taxdate = $("#taxdate").val();
        var intputchktax = $("#intputchktax").val();
        var intputwhchktax = $("#intputwhchktax").val();
        var accode = $("#accode").val();
        var acname = $("#acname").val();
        var statusass = $("#statusass").val();
        var tax = $("#tax").val();
        var totwh = $("#totwh").val();
        var taxtype = $("#taxtype").val();
        var xpd1 = $("#xpd1").val();
        var boq_id = $("#boq_id").val();
        var type = $("#type").val();
        var type_cost = $('#type_cost').val();
        if (type_cost == 1) {
            var typename = "MATERIAL";
        } else if (type_cost == 2) {
            var typename = "LABOR";
        } else if (type_cost == 3) {
            var typename = "SUB CON";
        }

        $('#costbg' + boq_id + '').val(xpd1);
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

        var totwh = $("#totwh").val();
        if (taxtype == '0') {
            var taxtypename = "ไม่มี";
        } else if (taxtype == '1') {
            var taxtypename = "ภ.ง.ด. 1?";
        } else if (taxtype == '2') {
            var taxtypename = "ภ.ง.ด. 1ก พิเศษ";
        } else if (taxtype == '3') {
            var taxtypename = "ภ.ง.ด. 2";
        } else if (taxtype == '4') {
            var taxtypename = "ภ.ง.ด. 2ก";
        } else if (taxtype == '5') {
            var taxtypename = "ภ.ง.ด. 3";
        } else if (taxtype == '6') {
            var taxtypename = "ภ.ง.ด. 3?";
        } else if (taxtype == '7') {
            var taxtypename = "ภ.ง.ด. 53";
        }

        var up = parseFloat($('#unitprice').val());
        var summarytot = parseFloat($('#summarytot').val());
        $('#summarytot').val(up + summarytot);
        var tr =
            `<tr id="${row}">
               <td class="hidden-center" style="width:80px;">
                  <ul class="icons-list">
                  <li>
                    <a href="#"
                      id="return${row}"
                      boq_id${row}="costbg${boq_id}" 
                      price${row}="${unitprice}" 
                      onclick="edit_modal($(this))" 
                      attr-id="${row}"
                      attr-matcode${row}="${matcode}"
                      attr-costname${row}="${costname}"
                      attr-intputchktax${row}="${intputchktax}"
                      attr-vende${row}r="${vender}"
                      attr-addrvender${row}="${addrvender}"
                      attr-taxno${row}="${taxno}"
                      attr-taxdate${row}="${taxdate}"
                      attr-taxv${row}="${taxv}"
                      attr-boq_id${row}="${boq_id}"
                      attr-type${row}="${type}"
                      attr-type_cost${row}="${type_cost}"
                      attr-venderwt${row}="${venderwt}"
                      attr-adddes${row}="${adddes}"
                      attr-taxid${row}="${taxid}"
                      attr-addrvenderwt${row}="${addrvenderwt}"
                      attr-accode${row}="${accode}"
                      attr-acname${row}="${acname}"
                      attr-statusass${row}="${statusass}"
                      attr-costcode${row}="${costcode}"
                      attr-matname${row}="${matname}"
                      attr-acccode${row}="${acccode}"
                      attr-unitprice${row}="${unitprice}"
                      attr-netamt${row}="${netamt}"
                      attr-taxvv${row}="${taxvv}"
                      attr-tax${row}="${tax}"
                      attr-totwh${row}="${totwh}"
                      attr-amttot${row}="${amttot}"
                      attr-paydate${row}="${paydate}"
                      attr-dod${row}="${dod}"
                      attr-taxtype${row}="${taxtype}"
                      attr-dodate${row}="${dodate}"
                      attr-chtax${row}="${chtax}"
                      attr-chwt${row}="${chwt}"
                    >
                      <i class="icon-pencil7"></i>
                    </a>
                    </li>
                  <li><a id="delete" price="${unitprice}" boq_id="costbg${boq_id}" class="del${row} noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>
                </ul>
                <input type="hidden" name="matcodei[]" id="matcodei${row}" value="${matcode}" />
                <input type="hidden" name="costnamei[]" id="costnamei${row}" value="${costname}" />
                <input type="hidden" name="intputchktaxi[]" id="intputchktaxi${row}" value="${intputchktax}" />
                <input type="hidden" name="intputwhchktaxi[]" id="intputwhchktaxi${row}" value="${intputwhchktax}" />
                <input type="hidden" name="venderi[]" id="venderi${row}" value="${vender}" />
                <input type="hidden" name="addrvenderi[]" id="addrvenderi${row}" value="${addrvender}" />
                <input type="hidden" name="taxnoi[]" id="taxnoi${row}" value="${taxno}" />
                <input type="hidden" name="taxdatei[]" id="taxdatei${row}" value="${taxdate}" />
                <input type="hidden" name="taxvi[]" id="taxvi${row}" value="${taxv}" />
                <input type="hidden" name="boq_id[]" id="boq_id${row}" value="${boq_id}" />
                <input type="hidden" name="typei[]" id="type${row}" value="${type}" />
                <input type="hidden" name="type_costi[]" id="type_cost${row}" value="${type_cost}">
                <input type="hidden" id="venderwt${row}" name="venderwt[]" value="${venderwt}" />
                <input type="hidden" id="adddes${row}" name="adddesi[]" value="${adddes}" />
                <input type="hidden" id="taxidd${row}" name="taxidd[]" value="${taxid}" />
                <input type="hidden" id="addrvenderwt${row}" name="addrvenderwt[]" value="${addrvenderwt}" />
                <input type="hidden" id="accode${row}" name="accode[]" value="${accode}" />
                <input type="hidden" id="acname${row}" name="acname[]" value="${acname}" />
                <input type="hidden" id="statusass${row}" name="statusass[]" value="${statusass}" />
                <input type="hidden" id="costcode${row}" name="costcodei[]" value="${costcode}" />
                <input type="hidden" id="matnamei${row}" name="matnamei[]" value="${matname}" />
                <input type="hidden" id="ac_code${row}" name="ac_code[]" value="${acccode}" />
                <input type="hidden" id="too_dii${row}" name="unitpricei[]" value="${unitprice}" />
                <input type="hidden" id="netamti${row}" name="netamti[]" value="${netamt}" />
                <input type="hidden" id="taxvvi${row}" name="taxvvi[]" value="${taxvv}" />
                <input type="hidden" id="taxi${row}" name="taxi[]" value="${tax}" />
                <input type="hidden" id="totwhi${row}" name="totwhi[]" value="${totwh}" />
                <input type="hidden" id="amttoti${row}" name="amttoti[]" value="${amttot}" />
                <input type="hidden" id="paydate${row}" name="paydatei[]" value="${paydate}" />
                <input type="hidden" id="dod${row}" name="dodi[]" value="${dod}" />
                <input type="hidden" id="taxtypei${row}" name="taxtypei[]" value="${taxtype}" />
                <input type="hidden" id="dodate${row}" name="dodatei[]" value="${dodate}" />
                </td>
                <td>${row}</td>
                <td id="td_costcode${row}">${costcode}</td>
                <td id="td_costname${row}">${matname}</td>
                <td id="td_amount${row}">${unitprice}</td>
                <td id="td_vatper${row}">${netamt}</td>
                <td id="td_vat${row}">${taxvv}</td>
                <td id="td_wtper${row}">${tax}</td>
                <td id="td_wtamt${row}">${totwh}</td>
                <td id="td_netamount${row}">${amttot}</td>
                <td id="td_taxname${row}">${taxname}</td>
                <td id="td_do${row}">${paydate}</td>
                <td id="td_paidday${row}">${taxtype}</td>
                <td id="td_dodate${row}">${dodate}</td>
                <td id="td_namevender${row}">${venderwt}</td>
            </tr>`;
        $('#body').append(tr);
        $("#return" + row).click(function() {
            // if(){}
            var boq_id_e_re = $(this).attr('boq_id'); // costbg+id
            var amount = $("#td_amount" + row).text() * 1; //ดึงค่ามาเพื่อไปคืน temp
            var _temp = $("#" + boq_id_e_re).val() * 1; //ดึงค่าจาก temp
            $("#unitprice" + row).val(amount);
            $("#unitprice_hide" + row).val(amount);
            var _total = _temp + amount;

            $("#bg_total" + row).val(_total); //นำค่าจาก temp ไปใช้ใน modal edit

            $("#bg_hidden" + row).val(_total);
            var me_bg_hidden = $("#bg_hidden" + row).val() * 1;
            var kee = $("#unitprice" + row).val() * 1;
            var real_m = me_bg_hidden - kee;
            $("#real_total" + row).val(real_m);

            var type_cost = $("#typerow" + row + "").val();
            var costcodetype = $("#codecostcode" + row + "").val();
            var rowsum_di = parseFloat($("#unitprice" + row + "").val());
            if (type_cost == 1) {
                var costbg = parseFloat($('#costbgmat' + $("#codecostcode" + row + "").val() + '').val());
                $('#costbgmat' + costcodetype + '').val(costbg + rowsum_di);
                $('#totalcost' + row + '').val(costbg + rowsum_di);
            } else if (type_cost == 2) {
                var costbg = parseFloat($('#costbglebour' + $("#codecostcode" + row + "").val() + '').val());
                $('#costbglebour' + costcodetype + '').val(costbg + rowsum_di);
                $('#totalcost' + row + '').val(costbg + rowsum_di);
            } else if (type_cost == 3) {
                var costbg = parseFloat($('#costbgsub' + $("#codecostcode" + row + "").val() + '').val());
                $('#costbgsub' + costcodetype + '').val(costbg + rowsum_di);
                $('#totalcost' + row + '').val(costbg + rowsum_di);
            }

        });





        $("#unitprice" + row).keyup(function() {

            var _keypay = $(this).val() * 1;
            if (_keypay == '') {
                $(this).val(0);
            }
            // var u_hide =$("#unitprice_hide"+row).val();
            $("#unitprice_hide" + row).val(_keypay);

            var unitprice = $("#unitprice" + row).val() * 1; //ค่าจาก temp และ ค่าของตัวเองที่ใช้ไปรวมกัน
            var bg_hidden = $("#bg_hidden" + row).val() * 1; //ค่าจาก temp และ ค่าของตัวเองที่ใช้ไปรวมกัน

            var ckkcontrolbg = $('#ckkcontrolbg').val();
            if (ckkcontrolbg == "2") {
                //alert(ckkcontrolbg);
                var type_cost = $("#type_cost" + row + "").val();

                var codecostcodeint = $('#codecostcode' + row + '').val();
                if (type_cost == 1) {
                    var controlmat = $('#controlmat' + codecostcodeint + '').val();
                    if (controlmat == "1") {
                        var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val());
                        $('#totalcost' + row + '').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost' + row + '').val());
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
                            $("#unitprice" + row + "").val('0');
                        }
                    }
                } else if (type_cost == 2) {
                    var controllebour = $('#controllebour' + codecostcodeint + '').val();
                    if (controllebour == "1") {
                        var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val());
                        $('#totalcost' + row + '').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost' + row + '').val());
                        var costcodecc = $('#costbglebour' + codecostcodeint + '').val();
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
                            $("#unitprice" + row + "").val('0');
                        }
                    }

                } else if (type_cost == 3) {
                    var controlsub = $('#controlsub' + codecostcodeint + '').val();
                    if (controlsub == "1") {
                        var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val());
                        $('#totalcost' + row + '').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost' + row + '').val());
                        var costcodecc = $('#costbgsub' + codecostcodeint + '').val();
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
                            $("#unitprice" + row + "").val('0');
                        }
                    }

                } //if parseFloa
            } // if ckkcontrolbg



            var _sum = bg_hidden - _keypay * 1;
            $("#bg_total" + row).val(_sum);
            $("#real_total" + row).val(_sum);
            var vat = $("#taxvv" + row).val() * 1;
            if (vat > 0 && vat != null && vat != '') {
                var vat_r = _keypay * (vat * 1) / 100;
                var real_nun = _keypay * 1 + vat_r * 1;
            } else {

                var vat_r = 0;
                var real_nun = _keypay * 1;
            }


            $("#netamt" + row).val(vat_r.toFixed(2));
            $("#amttot_modal" + row).val(real_nun);



        });

        $("#type_cost" + row + "").change(function(event) {
            var type_cost = $("#type_cost" + row + "").val();
            var costcodetype = $("#codecostcodeint" + row + "").val();
            var rowsum_di = parseFloat($("#unitprice" + row + "").val());
            var codecostcodeint = $('#codecostcode' + row + '').val();
            var controlmat = $('#controlmat' + codecostcodeint + '').val();

            if (type_cost == 1) {
                $('#closebg' + row + '').show();
                var costbg = $('#costbgmat' + codecostcodeint).val();
                $('#totalcost' + row + '').val(costbg);

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
                    $("#unitprice" + row + "").val('0');

                }

            } else if (type_cost == 2) {
                $('#closebg' + row + '').show();
                var costbgl = $('#costbglebour' + codecostcodeint).val();
                $('#totalcost' + row + '').val(costbgl);
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
                    $("#unitprice" + row + "").val('0');

                }


            } else if (type_cost == 3) {
                $('#closebg' + row + '').show();
                var costbgl = $('#costbgsub' + codecostcodeint).val();
                $('#totalcost' + row + '').val(costbgl);

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
                    $("#unitprice" + row + "").val('0');

                }
            }
        });

        var opnewmat = ' <div id="opnewmat' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_newmat' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('.editexpen').append(opnewmat);

        $('.openun' + row).click(function() {
            $('#modal_newmat' + row).html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $('#modal_newmat' + row).load(
                '<?php echo base_url(); ?>share/modalexpensothershare/<?php echo $type; ?>/' +
                row);
        });

        var opnewmatt = '<div class="modal fade" id="costcode' + row +
            '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_cost' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('.editexpenn').append(opnewmatt);
        $('.selectcostcode' + row).click(function() {
            $('#modal_cost' + row).html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $('#modal_cost' + row).load('<?php echo base_url(); ?>share/costcodeeditpt/' + row);
        });
        var opvender = '<div class="modal fade" id="openven' + row +
            '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_vender' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.editexpennn').append(opvender);

        var opvenderwt = '<div class="modal fade" id="openvenwt' + row +
            '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">' +
            '<div class="modal-dialog modal-full">' +
            '<div class="modal-content">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div id="modal_venderwt' + row + '"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('.editexpennnn').append(opvenderwt);

        $('.modalcost' + row).click(function() {
            $('#modal_venderwt' + row).html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $('#modal_venderwt' + row).load('<?php echo base_url(); ?>share/vender_wt/' + row);
        });

        var opvenderwt = '<div class="modal fade" id="boqq' + row + '" data-backdrop="false">' +
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
        $('.editexpennnn').append(opvenderwt);
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


        $('#chktax' + row).click(function() {

            $('#taxchk' + row).toggle()
        });

        if ($('#taxno' + row).val() == "") {
            $('#taxchk' + row).hide();
            $('#chktax' + row).removeAttr('checked');
        } else {
            $('#taxchk' + row).show();
            $('#chktax' + row).attr('checked', 'true');
        }


        $('#whchktax' + row).click(function() {

            $('#whtaxchk' + row).toggle()
        });

        if ($('#totwh' + row).val() == "0") {
            $('#whtaxchk' + row).hide();
            $('#whchktax' + row).removeAttr('checked');
        } else {
            $('#whtaxchk' + row).show();
            $('#whchktax' + row).attr('checked', 'true');
        }



        $('.modalvender' + row).click(function() {
            $('#modal_vender' + row).html(
                "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $('#modal_vender' + row).load('<?php echo base_url(); ?>share/vender_pt/' + row);
        });

        $("#edittorow" + row).click(function(event) {
            //  alert(555);

            if (type_cost == 1) {
                var totalcost = parseFloat($('#totalcost' + row + '').val());
                var costcode = $('#codecostcode' + row + '').val();

                var pamount = parseFloat($('#unitprice' + row + '').val());
                var costbgmat = parseFloat($('#costbgmat' + costcode + '').val());
                $("#costbgmat" + costcode + "").val(costbgmat - pamount);
            } else if (type_cost == 2) {
                var totalcost = parseFloat($('#totalcost' + row + '').val());
                var costcode = $('#codecostcode' + row + '').val();
                var pamount = parseFloat($('#unitprice' + row + '').val());
                var costbglebour = parseFloat($('#costbglebour' + costcode + '').val());
                $("#costbglebour" + costcode + "").val(costbglebour - pamount);
            } else if (type_cost == 3) {
                var totalcost = parseFloat($('#totalcost' + row + '').val());
                var costcode = $('#codecostcode' + row + '').val();
                var pamount = parseFloat($('#unitprice' + row + '').val());
                var costbgsub = parseFloat($('#costbgsub' + costcode + '').val());
                $("#costbgsub" + costcode + "").val(costbgsub - pamount);
            }


            var hh = $("#real_total" + row).val() * 1; //ค่าของ ที่สามารถคอนโทรได้ ที่ลดแล้ว
            var boq_id = $(this).attr('boq_id');
            $('#' + boq_id).val(hh);
            var u_hide = $("#unitprice_hide" + row).val();
            // alert(u_hide);
            $(".del" + row).attr('price', u_hide);
            $("#return" + row).attr('price', u_hide);


            $("#td_costcode" + row).html('<td id="td_costcode' + row + '">' + $("#costname" + row).val() +
                '<input type="hidden" id="costname' + row + '" name="costcodei[]" value="' + $(
                    "#codecostcode" + row).val() + '" /></td>');

            $("#td_costname" + row).html('<td id="td_costname' + row + '">' + $("#newmatname" + row).val() +
                '<input type="hidden" id="newmatname' + row + '" name="matnamei[]" value="' + $(
                    "#newmatname" + row).val() + '" /><input type="hidden" id="newmatcode' + row +
                '" name="ac_code[]" value="' + $("#newmatcode" + row).val() + '" /></td>');

            $("#td_descript" + row).html('<td id="td_descript' + row + '">' + $("#adddes" + row).val() +
                '<input type="hidden" id="adddes' + row + '" name="adddes[]" value="' + $("#adddes" + row).val() +
                '" /></td>');

            $("#td_addressv" + row).html('<td id="td_addressv' + row + '">' + $("#addrvender" + row).val() +
                '<input type="hidden" id="addrvender' + row + '" name="addrvenderwt[]" value="' + $(
                    "#addrvender" + row).val() + '" /></td>');

            $("#td_namevender" + row).html('<td id="td_namevender' + row + '">' + $("#vender" + row).val() +
                '<input type="hidden" id="vender' + row + '" name="venderwt[]" value="' + $("#vender" + row)
                .val() + '" /></td>');


            $("#td_amount" + row).html('<td id="td_amount' + row + '">' + u_hide +
                '<input type="hidden" id="unitprice' + row + '" name="unitpricei[]" value="' + u_hide +
                '" /></td>');


            $("#td_vatper" + row).html('<td id="td_vatper' + row + '">' + $("#netamt" + row).val() +
                '<input type="hidden" id="netamt' + row + '" name="netamti[]" value="' + $("#netamt" + row)
                .val() + '" /></td>');


            $("#td_vat" + row).html('<td id="td_vat' + row + '">' + $("#taxvv" + row).val() +
                '<input type="hidden" id="taxvv' + row + '" name="taxvvi[]" value="0" /></td>');

            $("#td_wtper" + row).html('<td id="td_wtper' + row + '">' + $("#tax" + row).val() +
                '<input type="hidden" id="tax' + row + '" name="taxi[]" value="' + $("#tax" + row).val() +
                '" /></td>');



            $("#td_vat" + row).html('<td id="td_vat' + row + '">' + $("#taxvv" + row).val() +
                '<input type="hidden" id="taxvv' + row + '" name="taxvvi[]" value="0" /></td>');

            $("#td_wtper" + row).html('<td id="td_wtper' + row + '">' + $("#tax" + row).val() +
                '<input type="hidden" id="tax' + row + '" name="taxi[]" value="' + $("#tax" + row).val() +
                '" /></td>');

            $("#td_wtamt" + row).html('<td id="td_wtamt' + row + '">' + $("#totwh" + row).val() +
                '<input type="hidden" id="totwh' + row + '" name="totwhi[]" value="' + $("#totwh" + row).val() +
                '" /></td>');


            $("#td_netamount" + row).html('<td id="td_netamount' + row + '">' + $("#amttot_modal" + row).val() +
                '<input type="hidden" id="amttoti' + row + '" name="amttoti[]" value="' + $("#amttot_modal" +
                    row).val() * 1 + '" /></td>');

            $("#td_taxname" + row).html('<td id="td_taxname' + row + '">' + taxname + '</td>');



            $("#td_paidday" + row).html('<td id="td_paidday' + row + '">' + $("#taxtype" + row).val() +
                '<input type="hidden" id="taxtype' + row + '" name="taxtypei[]" value="' + $("#taxtype" +
                    row).val() + '" /></td>');

            $("#td_do" + row).html('<td id="td_do' + row + '">' + $("#paydate" + row).val() +
                '<input type="hidden" id="paydate' + row + '" name="paydate[]" value="' + $("#paydate" +
                    row).val() + '" /></td>');

            $("#td_dodate" + row).html('<td id="td_dodate' + row + '">' + $("#dodate" + row).val() +
                '<input type="hidden" id="dodate' + row + '" name="dodate[]" value="' + $("#dodate" + row).val() +
                '" /><input type="hidden" id="taxid' + row + '" name="taxidd[]" value="' + $("#taxid" + row)
                .val() + '"/><input type="hidden" id="type_cost' + row + '" name="type_cost[]" value="' + $(
                    "#type_cost" + row).val() + '"/></td>');


            // $("[data-target='#edit_modal"+row+"']").attr('price', td_unitprice);

        });





        $("#taxvv" + row).keyup(function(event) {
            if ($("#taxvv" + row).val() == "") {
                $("#taxvv" + row).val(0);
            }
            var tuni = parseInt($("#unitprice" + row).val());
            var ttaxvv = parseInt($("#taxvv" + row).val());
            var c = (tuni * ttaxvv) / 100;
            $("#netamt" + row).val(c.toFixed(2));
        });









        $("#tax" + row).change(function(event) {
            var etax = $("#tax" + row).val();
            var euni = $("#unitprice" + row).val();
            var b = ((euni * etax) / 100);
            $("#totwh" + row).val(b);
        });





    }

    $(document).on('click', 'a#delete', function() { // <-- changes
        // Initialize
        var car_num = $(this).attr('price');
        var boq_id = $(this).attr('boq_id');
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
                        // ตัวแปร gg คือ
                        var gg = car_num * 1;
                        var id = boq_id;
                        // alert(gg);
                        var old = $('#' + id).val() * 1;
                        $('#' + id).val(gg + old);
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
</script>
<script>
    $("#pcdate").change(function() {

        var d1 = $("#pcdate").val();
        var d2 = $("#duedate").val();
        var dd1 = new Date(d1);
        var dd2 = new Date(d2);
        var t1 = dd1.getTime();
        var t2 = dd2.getTime();
        var tod = parseInt((t2 - t1) / (24 * 3600 * 1000));
        $('#crterm').val(tod);
    });
    $("#duedate").change(function() {

        var d1 = $("#pcdate").val();
        var d2 = $("#duedate").val();
        var dd1 = new Date(d1);
        var dd2 = new Date(d2);
        var t1 = dd1.getTime();
        var t2 = dd2.getTime();
        var tod = parseInt((t2 - t1) / (24 * 3600 * 1000));
        $('#crterm').val(tod);
    });
    // $(document).ready(function() {
        $(".openext").hide();
        $("#venid").hide();
        $("#alrtt").hide();
        $("#venname").hide();
        $('#totwh').val('0');
        $('#crterm').val('1');
    // });


    $("#unitprice").keyup(function() {
        // var sum  = (parseFloat($("#amount").val())*parseFloat($("#unitprice").val())) || 0;
        // $("#amttot").val(sum);
        // $("#netamt").val(sum);
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


            var ckkcontrolbg = $('#ckkcontrolbg').val();
            var unitprice = parseFloat($("#unitprice").val());
            if (ckkcontrolbg == "2") {
                //alert(ckkcontrolbg);
                var type_cost = $("#type_cost").val();

                var codecostcodeint = $('#codecostcode').val();
                if (type_cost == 1) {
                    var controlmat = $('#controlmat' + codecostcodeint + '').val();
                    if (controlmat == "1") {
                        var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
                        var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
                        var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
            }

            $("#amttot").val(sum.toFixed(2));
            $("#netamt").val(((sum.toFixed(2) + vat.toFixed(2)) - totwh.toFixed(2)));
            $("#totvat").val(vat.toFixed(2));
            $("#totwh").val(totwh.toFixed(2));
        } else if ($('#chktax').prop('checked')) {

            var ckkcontrolbg = $('#ckkcontrolbg').val();
            var unitprice = parseFloat($("#unitprice").val());
            if (ckkcontrolbg == "2") {
                //alert(ckkcontrolbg);
                var type_cost = $("#type_cost").val();

                var codecostcodeint = $('#codecostcode').val();
                if (type_cost == 1) {
                    var controlmat = $('#controlmat' + codecostcodeint + '').val();
                    if (controlmat == "1") {
                        var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
                        var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
                        var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
            }

        } else if ($('#whchktax').prop('checked')) {

            var vatt = parseFloat($("#netamt").val());
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
            $("#amttot").val((sum.toFixed(2) + vatt.toFixed(2)));
            // $("#netamt").val((sum-totwh));
            $("#totvat").val(vat.toFixed(2));
            $("#totwh").val(totwh.toFixed(2));

            var ckkcontrolbg = $('#ckkcontrolbg').val();
            var unitprice = parseFloat($("#unitprice").val());
            if (ckkcontrolbg == "2") {
                //alert(ckkcontrolbg);
                var type_cost = $("#type_cost").val();

                var codecostcodeint = $('#codecostcode').val();
                if (type_cost == 1) {
                    var controlmat = $('#controlmat' + codecostcodeint + '').val();
                    if (controlmat == "1") {
                        var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
                        var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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
                        var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
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

                } //if parseFloa
            }

        } else {
            var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
            var taxvv = parseFloat($("#taxvv").val());
            var sumvat = sum * taxvv / 100;
            $("#amttot").val((sum + taxvv).toFixed(2));
            $("#netamt").val(sumvat.toFixed(2));

            var ckkcontrolbg = $('#ckkcontrolbg').val();
            var unitprice = parseFloat($("#unitprice").val());
            if (ckkcontrolbg == "2") {
                //alert(ckkcontrolbg);
                var type_cost = $("#type_cost").val();

                var codecostcodeint = $('#codecostcode').val();
                if (type_cost == 1) {
                    var controlmat = $('#controlmat' + codecostcodeint + '').val();
                    if (controlmat == "1") {
                        var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
                        var costcodecc = $('#costbgmat' + codecostcodeint + '').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                            swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });
                            $("#unitprice").val('0');
                            $("#taxvv").val('0');
                            $("#netamt").val('0');
                            $("#totalcost").val(costbg);
                            $("#amttot").val('0');
                        }
                    }
                } else if (type_cost == 2) {
                    var controllebour = $('#controllebour' + codecostcodeint + '').val();
                    if (controllebour == "1") {
                        var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
                        var costcodecc = $('#costbglebour' + codecostcodeint + '').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                            swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });
                            $("#unitprice").val('0');
                            $("#taxvv").val('0');
                            $("#netamt").val('0');
                            $("#totalcost").val(costbg);
                            $("#amttot").val('0');
                        }
                    }

                } else if (type_cost == 3) {
                    var controlsub = $('#controlsub' + codecostcodeint + '').val();
                    if (controlsub == "1") {
                        var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val());
                        $('#totalcost').val(costbg - unitprice);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost').val());
                        var costcodecc = $('#costbgsub' + codecostcodeint + '').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                            swal({
                                title: "รายการมากกว่าใน Budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                            });
                            $("#unitprice").val('0');
                            $("#taxvv").val('0');
                            $("#netamt").val('0');
                            $("#totalcost").val(costbg);
                            $("#amttot").val('0');
                        }
                    }

                } //if parseFloa
            }

        }

    });
    $('#taxv').keyup(function(event) {

        var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($("#taxv")
            .val()) / 100 || 0;
        var wh = parseFloat($("#totwh").val());
        var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var tot = (sum + vat) - wh || 0;

        $("#netamt").val(tot.toFixed(2));

    });

    $('#taxvv').keyup(function(event) {

        var vatt = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($(
            "#taxvv").val()) / 100 || 0;
        var whh = parseFloat($("#totwh").val());
        var summ = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
        var tottt = (summ + vatt) - whh || 0;
        var vatamt = (tottt - summ);
        $("#netamt").val(vatamt.toFixed(2));
        $("#amttot").val(tottt.toFixed(2));
    });


    $("#vendertype").change(function() {
        if ($("#vendertype").val() == "1") {
            $(".openemp").show();
            $(".openext").hide();
            $("#venid").hide();
            $("#venname").hide();
            $("#memid").show();
            $("#memname").show();
            $("#ventype").val(1);
        } else if (($("#vendertype").val() == "2")) {
            $(".openext").show();
            $(".openemp").hide();
            $("#venid").show();
            $("#venname").show();
            $("#memid").hide();
            $("#memname").hide();
            $("#ventype").val(2);
            var sss = "กรุณากรอก Tax ID ของร้านค้า";
            $('#alrtt').val(sss);

        }
    });

    $(".openadv").click(function() {
        $("#adv").load('<?php echo base_url(); ?>share/member2');
    });




    $(".openun").click(function() {
        $('#modal_mat').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_mat").load('<?php echo base_url(); ?>share/modalexpensother/<?php echo $type; ?>');
    });
    $(".modalcost").click(function() {
        $('#modal_cost').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_cost").load('<?php echo base_url(); ?>share/costcode');
    });
    $("#modalunit").click(function() {
        $('#modal_unit').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_unit").load('<?php echo base_url(); ?>share/unit');
    });
    $(".openproj").click(function() {
        $('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_project").load('<?php echo base_url(); ?>share/project');
    });
    $(".opendepart").click(function() {
        $('#modal_department').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_department").load('<?php echo base_url(); ?>share/department');
    });
    $('.daterange-single').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
</script>


<script>
    $('a.preload').on('click', function() {
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
    $('#chk').click(function(event) {
        if ($('#chk').prop('checked')) {
            $('#newmatname').prop('disabled', false);
        } else {
            $('#newmatname').prop('disabled', true);
        }
    });
    $('#chktax').click(function(event) {
        if ($('#chktax').prop('checked')) {
            $('#intputchktax').val("Y");
            $("#taxchk").show();
            // $("#taxv").val('7');
            var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($(
                "#taxv").val()) / 100 || 0;
            var wh = parseFloat($("#totwh").val());
            var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
            var tot = (sum + vat) - wh || 0;
            // $("#netamt").val(tot);
            $('#totvat').val(vat.toFixed(2));
        } else {
            $('#intputchktax').val("");
            $("#taxchk").hide();
            var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($(
                "#taxv").val()) / 100 || 0;
            var wh = parseFloat($("#totwh").val());
            var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
            var tot = (sum + vat) - wh || 0;
            var totvat = tot - vat;
            // $("#netamt").val(totvat);
            $('#totvat').val("0");
        }
    });
    $('#whchktax').click(function(event) {
        if ($('#whchktax').prop('checked')) {
            $("#whtaxchk").show();
            $('#intputwhchktax').val("Y");

        } else {
            if ($('#chktax').prop('checked')) {
                $("#whtaxchk").hide();
                $('#intputwhchktax').val("");
                var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($(
                    "#taxv").val()) / 100 || 0;
                var netamt = parseFloat($("#netamt").val());
                var wh = parseFloat($("#totwh").val());
                var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
                var tot = netamt + wh || 0;
                // $("#netamt").val(tot);
                $("#tax").val("0");
                $('#totwh').val('0');
                $('#taxtype').val('0');
            } else {
                $("#whtaxchk").hide();
                $('#intputwhchktax').val("");
                var vat = ((parseFloat($("#amount").val()) * parseFloat($("#unitprice").val()))) * parseFloat($(
                    "#taxv").val()) / 100 || 0;
                var netamt = parseFloat($("#netamt").val());
                var wh = parseFloat($("#totwh").val());
                var sum = (parseFloat($("#amount").val()) * parseFloat($("#unitprice").val())) || 0;
                var tot = netamt + wh || 0;
                $("#netamt").val(tot.toFixed(2));
                $("#tax").val("0");
                $('#totwh').val('0');
                $("#taxtype").val("0");
            }


        }
    });
</script>

<script>
    $('#tax').change(function(event) {
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
                $('#totwh').val(totwhtax.toFixed(2));
                // $('#netamt').val(totamount);
                $('#totwh').val(totwhtax.toFixed(2));
                break;
            case '1':
                var amount = $("#amount").val();
                var unitprice = $("#unitprice").val();
                var net = (amount * unitprice);
                var totwhtax = net * 1 / 100;
                var vat = $("#taxv").val();
                var totvat = (net * vat) / 100;
                var totamount = (net + totvat) - totwhtax;
                $('#totwh').val(totwhtax.toFixed(2));
                var res = parseFloat($("#amttot").val());
                var totwh = parseFloat($("#totwh").val());
                var ress = res - totwh;
                $('#amttot').val(ress.toFixed(2));

                break;
            case '2':
                var amount = $("#amount").val();
                var unitprice = $("#unitprice").val();
                var net = (amount * unitprice);
                var totwhtax = net * 2 / 100;
                var vat = $("#taxv").val();
                var totvat = (net * vat) / 100;
                var totamount = (net + totvat) - totwhtax;
                $('#totwh').val(totwhtax.toFixed(2));
                var res = parseFloat($("#amttot").val());
                var totwh = parseFloat($("#totwh").val());
                var ress = res - totwh;
                $('#amttot').val(ress.toFixed(2));
                break;
            case '3':
                var amount = $("#amount").val();
                var unitprice = $("#unitprice").val();
                var net = (amount * unitprice);
                var totwhtax = net * 3 / 100;
                var vat = $("#taxv").val();
                var totvat = (net * vat) / 100;
                var totamount = (net + totvat) - totwhtax;
                $('#totwh').val(totwhtax.toFixed(2));
                var res = parseFloat($("#amttot").val());
                var totwh = parseFloat($("#totwh").val());
                var ress = res - totwh;
                $('#amttot').val(ress.toFixed(2));
                break;
            case '5':
                var amount = $("#amount").val();
                var unitprice = $("#unitprice").val();
                var net = (amount * unitprice);
                var totwhtax = net * 5 / 100;
                var vat = $("#taxv").val();
                var totvat = (net * vat) / 100;
                var totamount = (net + totvat) - totwhtax;
                $('#totwh').val(totwhtax.toFixed(2));
                var res = parseFloat($("#amttot").val());
                var totwh = parseFloat($("#totwh").val());
                var ress = res - totwh;
                $('#amttot').val(ress.toFixed(2));

                break;
            case '15':
                var amount = $("#amount").val();
                var unitprice = $("#unitprice").val();
                var net = (amount * unitprice);
                var totwhtax = net * 15 / 100;
                var vat = $("#taxv").val();
                var totvat = (net * vat) / 100;
                var totamount = (net + totvat) - totwhtax;
                $('#totwh').val(totwhtax.toFixed(2));
                var res = parseFloat($("#amttot").val());
                var totwh = parseFloat($("#totwh").val());
                var ress = res - totwh;
                $('#amttot').val(ress.toFixed(2));
                break;
        }
        var amount = $("#amount").val();
        var unitprice = $("#unitprice").val();
        var net = $("#netamt").val();
        var whtot = $("#totwh").val();
        var tot = (amount * unitprice) - whtot;
        // $('#netamt').val(totamount);
    });

    $("#inst").click(function(event) {
        $("#row").val(1);
        // count()
        if ($("#vendertype").val() == "1" && $("#memid").val() == "") {
            swal({
                title: "Please Select Pay To !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });

        } else if ($("#vendertype").val() == "2" && $("#venid").val() == "") {
            swal({
                title: "Please Select Pay To !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });

        } else {
            $("#insertrow").modal('show');
        }

        $(".addboxpri").show();
        $('#chktax').prop('check');
        $("#whchktax").prop('checked', false);
        $("#taxchk").hide();
        $("#whtaxchk").hide();
        $("#newmatname").val("");
        $("#newmatcode").val("");
        $("#costname").val("");
        $("#codecostcode").val("");
        $("#unit").val("");
        $("#remarkitem").val("");
        $("#codecostcode").val("");
        $("#costname").val("");
        $('#unitprice').val("");
        $("#amttot").val("");
        $("#netamt").val("");
        $("#totwh").val("0");
        $("#tax").val("0");
        $("#taxtype").val("0");
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
        $("#taxid").val("");
    });


    $("#spetty").click(function(e) {

        var rowCount = $('#body tr').length;

        if ($("#vendertype").val() == "1" && $("#memid").val() == "") {
            swal({
                title: "Please Pay To !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });

        } else if ($("#vendertype").val() == "2" && $("#venid").val() == "") {
            swal({
                title: "Please Pay To !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });

        } else if ($("#row").val() == "") {
            swal({
                title: "กรุณาเพิ่มรายการ !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else if ($("#rowc").val() == "") {
            swal({
                title: "กรุณาเพิ่มรายการ !!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });



        } else if (rowCount == "") {
            swal({
                title: "กรุณาเพิ่มรายการ!!.",
                text: "",
                confirmButtonColor: "#EA1923",
                type: "error"
            });
        } else {
            var frm = $('#fpetty');
            swal({
                title: "Save Completed!!.",
                text: "Save Completed!!.",
                // confirmButtonColor: "#66BB6A",
                type: "success"
            });
            $("#fpetty").submit();
        }
    });
</script>

<script>
    // Switchery
    // ------------------------------

    // Initialize multiple switches
    if (Array.prototype.forEach) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    } else {
        var elems = document.querySelectorAll('.switchery');
        for (var i = 0; i < elems.length; i++) {
            var switchery = new Switchery(elems[i]);
        }
    }

    // Colored switches
    var primary = document.querySelector('.switchery-primary');
    var switchery = new Switchery(primary, {
        color: '#2196F3'
    });

    var danger = document.querySelector('.switchery-danger');
    var switchery = new Switchery(danger, {
        color: '#EF5350'
    });

    var warning = document.querySelector('.switchery-warning');
    var switchery = new Switchery(warning, {
        color: '#FF7043'
    });

    var info = document.querySelector('.switchery-info');
    var switchery = new Switchery(info, {
        color: '#00BCD4'
    });



    // Checkboxes/radios (Uniform)
    // ------------------------------

    // Default initialization
    $(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });

    // File input
    $(".file-styled").uniform({
        wrapperClass: 'bg-blue',
        fileButtonHtml: '<i class="icon-file-plus"></i>'
    });


    //
    // Contextual colors
    //

    // Primary
    $(".control-primary").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-primary-600 text-primary-800'
    });

    // Danger
    $(".control-danger").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-danger-600 text-danger-800'
    });

    // Success
    $(".control-success").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-success-600 text-success-800'
    });

    // Warning
    $(".control-warning").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-warning-600 text-warning-800'
    });

    // Info
    $(".control-info").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-info-600 text-info-800'
    });

    // Custom color
    $(".control-custom").uniform({
        radioClass: 'choice',
        wrapperClass: 'border-indigo-600 text-indigo-800'
    });



    // Bootstrap switch
    // ------------------------------

    $(".switch").bootstrapSwitch();
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
    // $("#vender").blur(function(){
    //   var name = $("#vender").val();
    //   var url="<?php echo base_url(); ?>share/venaddr";
    //     var dataSet={
    //       vendercode: name,
    //     };
    //       $.post(url,dataSet,function(data){
    //            $("#addrvender").val(data);

    //       });
    // });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js">
</script>

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
        drawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
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
        drawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });
    $('.datatable-basircmem').DataTable();
</script>
<script>
    $('.numbersOnly').keyup(function() {
        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });

    $('#pc').attr('class', 'active');
    $('#new_pc').attr('style', 'background-color:#dedbd8');
</script>