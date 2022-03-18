<?php 
foreach ($pj as $pje) {
	$project_name = $pje->project_name;
  $project_code = $pje->project_code;
  $project_id = $pje->project_id;
  $c_pr = $pje->c_pr;
  $a_pr = $pje->a_pr;
  $c_po = $pje->c_po;
  $a_po = $pje->a_po;
  $c_wo = $pje->c_wo;
  $a_wo = $pje->a_wo;
  $c_pc = $pje->c_pt;
  $a_pc = $pje->a_pt;
  $c_bk = $pje->c_bk;
  $c_ap = $pje->c_ap;
  $c_ic = $pje->c_ic;
  $a_td = $pje->a_td;
}
?>
<div class="content">
    <div class="panel panel-white">
        <div class="panel-heading">
            <h2 class="panel-title"><b>Setup Approve Project : <?php echo $project_name; ?></b></h2>
            <br>


            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                 <?php if($tendercode==""){?>
                     <li class="active"><a href="#solid-rounded-tab1" data-toggle="tab">Purchasc Reguisition</a></li>
                 <?php }else{ ?>
                    <li class="active"><a href="#solid-rounded-tab8" data-toggle="tab">Tender Biding</a></li>
                     <li><a href="#solid-rounded-tab1" data-toggle="tab">Purchasc Reguisition</a></li>
                 <?php } ?>
                  
                    <li><a href="#solid-rounded-tab2" data-toggle="tab">Purchase Order</a></li>
                    <li><a href="#solid-rounded-tab3" data-toggle="tab">Work Order</a></li>
                    <li><a href="#solid-rounded-tab4" data-toggle="tab">Petty Cash</a></li>
                    <li><a href="#solid-rounded-tab5" data-toggle="tab">Booking</a></li>
                    <!-- <li><a href="#solid-rounded-tab6" data-toggle="tab">Account Payable</a></li> -->
                    <!-- <li><a href="#solid-rounded-tab7" data-toggle="tab">Inventory Control</a></li> -->
                </ul>


                <div class="tab-content">
                    
                   

                    <div class="tab-pane" id="solid-rounded-tab2">
                        <form action="<?php echo base_url(); ?>datastore_active/approve_po/<?php echo $project_code; ?>" method="post" id="save_po">
                            <div class="form-group">
                                <h1>PO</h1>
                                <h3><input type="checkbox" <?php if($c_po=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_pot" id="chkpj_pot"> <b>Control</b></h3>
                                <input type="hidden" value="<?php echo $c_po; ?>" name="chkpj_po" id="chkpj_po">
                                <label class="radio-inline">
                                    <input type="radio" name="po1" id="po1" value="1" <?php if($a_po=="1"){ echo "checked"; } ?>>
                                    Approve ตามลำดับ
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="po1" id="po2" value="2" <?php if($a_po=="2"){ echo "checked"; } ?>>
                                    Approve ตามวงเงิน
                                </label>
                            </div>
                            <input type="hidden" value="<?php echo $a_po; ?>" name="po" id="po">
                            <script>
                                $("#chkpj_pot").click(function() {
                                    if ($("#chkpj_pot").prop("checked")) {
                                        $("#chkpj_po").val("1");
                                    } else {
                                        $("#chkpj_po").val("0");
                                    }
                                });

                                $("#po1").click(function() {
                                    if ($("#po1").prop("checked")) {
                                        $("#po").val("1");
                                    }
                                });

                                $("#po2").click(function() {
                                    if ($("#po2").prop("checked")) {
                                        $("#po").val("2");
                                    }
                                });
                            </script>
                            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">NO.</th>
                                        <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                        <th width="5%" class="text-center">Member ID</th>
                                        <th width="20%" style="text-align: center;">Member Name</th>
                                        <th width="10%" class="text-center">Position</th>
                                        <th width="10%" style="text-align: center;">Cost</th>
                                        <th width="10%" style="text-align: center;">Lock</th>
                                        <th width="10%" style="text-align: center;">Sign</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="body2">


                                    <?php $n=1; foreach ($po as $apo) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $n; ?><input type="hidden" name="chkpo[]" value="Y"><input type="hidden" name="idpo[]" value="<?php echo $apo->id; ?>"></td>
                                        <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequencepo[]" value="<?php echo $apo->approve_sequence; ?>"></td>
                                        <td><input type="text" class="form-control input-sm " id="approve_mid2<?php echo $n; ?>" name="approve_midpo[]" value="<?php echo $apo->approve_mid; ?>" readonly></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="approve_mnamepo[]" id="approve_mname2<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $apo->approve_mname; ?>" readonly>
                                                <span class="input-group-btn">
                                            <button type="button" class="accopen22<?php echo $n; ?> btn btn-info btn-sm" id="approvem22<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal22<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                                            </span>
                                            </div>
                                        </td>
                                        <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_positionpo[]" value="<?php echo $apo->approve_position; ?>"></td>
                                        <td><input type="text" class="form-control input-sm text-right text-right" id="approve_cost<?php echo $n; ?>" onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'" name="approve_costpo[]" value="<?php echo $apo->approve_cost; ?>"></td>
                                        <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock2<?php echo $n; ?>" name="approve_lockpo[]" <?php if($apo->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock2po[]" id="lock2<?php echo $n; ?>"
                                                value="<?php echo $apo->approve_lock; ?>"></td>
                                        <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PO,<?=$apo->approve_mid;?>"></td>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_po_pc_wo/<?php echo $apo->id; ?>/<?php echo $project_code; ?>/<?php echo $apo->approve_sequence;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    </tr>

                                    <script>
                                        $("#approve_lock2<?php echo $n; ?>").click(function() {
                                            if ($("#approve_lock2<?php echo $n; ?>").prop("checked")) {
                                                $("#lock2<?php echo $n; ?>").val("Y");
                                            } else {
                                                $("#lock2<?php echo $n; ?>").val("N");
                                            }

                                        });
                                    </script>

                                    <div id="approvemodal22<?php echo $n; ?>" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header bg-info">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">เพิ่มรายการ</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" id="approvems22<?php echo $n; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var two = "2";
                                        $('.accopen22<?php echo $n; ?>').click(function() {
                                            $('#approvems22<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                            $("#approvems22<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + two);
                                        });
                                    </script>
                                    <?php $n++; }  ?>
                                </tbody>


                            </table>
                            <br>
                            <a class="addrow btn bg-info" id="insertpodetail2">Add Member</a>
                            <a type="button" class="btn bg-success" id="save_poo"> <span>Save PO</span></a>
                        </form>
                    </div>

                    <div class="tab-pane" id="solid-rounded-tab3">
                        <form action="<?php echo base_url(); ?>datastore_active/approve_wo/<?php echo $project_code; ?>" method="post" id="save_wo">
                            <div class="form-group">
                                <h1>WO</h1>
                                <h3><input type="checkbox" <?php if($c_wo=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_wot" id="chkpj_wot"> <b>Control</b> </h3>
                                <input type="hidden" value="<?php echo $c_wo; ?>" name="chkpj_wo" id="chkpj_wo">
                                <label class="radio-inline">
                                <input type="radio" name="wo1" id="wo1" value="1" <?php if($a_wo=="1"){ echo "checked"; } ?>>
                                Approve ตามลำดับ
                                </label>

                                <label class="radio-inline">
                                <input type="radio" name="wo1" id="wo2" value="2" <?php if($a_wo=="2"){ echo "checked"; } ?>>
                                Approve ตามวงเงิน
                                </label>
                            </div>
                            <input type="hidden" value="<?php echo $a_wo; ?>" name="wo" id="wo">

                            <script>
                                $("#chkpj_wot").click(function() {
                                    if ($("#chkpj_wot").prop("checked")) {
                                        $("#chkpj_wo").val("1");
                                    } else {
                                        $("#chkpj_wo").val("0");
                                    }
                                });

                                $("#wo1").click(function() {
                                    if ($("#wo1").prop("checked")) {
                                        $("#wo").val("1");
                                    }
                                });

                                $("#wo2").click(function() {
                                    if ($("#wo2").prop("checked")) {
                                        $("#wo").val("2");
                                    }
                                });
                            </script>
                            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">NO.</th>
                                        <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                        <th width="5%" class="text-center">Member ID</th>
                                        <th width="20%" style="text-align: center;">Member Name</th>
                                        <th width="10%" class="text-center">Position</th>
                                        <th width="10%" style="text-align: center;">Cost</th>
                                        <th width="10%" style="text-align: center;">Lock</th>
                                        <th width="10%" style="text-align: center;">Sign</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="body3">
                                    <?php $n=1; foreach ($wo as $awo) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $n; ?><input type="hidden" name="chkwo[]" value="Y"><input type="hidden" name="idwo[]" value="<?php echo $awo->id; ?>"></td>
                                        <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequencewo[]" value="<?php echo $awo->approve_sequence; ?>"></td>
                                        <td><input type="text" class="form-control input-sm " id="approve_mid3<?php echo $n; ?>" name="approve_midwo[]" value="<?php echo $awo->approve_mid; ?>" readonly></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="approve_mnamewo[]" id="approve_mname3<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $awo->approve_mname; ?>" readonly>
                                                <span class="input-group-btn">
                                                <button type="button" class="accopen33<?php echo $n; ?> btn btn-info btn-sm" id="approvem33<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal33<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_positionwo[]" value="<?php echo $awo->approve_position; ?>"></td>
                                        <td><input type="text" class="form-control input-sm text-right text-right" id="approve_cost<?php echo $n; ?>" name="approve_costwo[]" value="<?php echo $awo->approve_cost; ?>"></td>
                                        <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock3<?php echo $n; ?>" name="approve_lockwo[]" <?php if($awo->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock3wo[]" id="lock3<?php echo $n; ?>"
                                                value="<?php echo $awo->approve_lock; ?>"></td>
                                        <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,WO,<?=$awo->approve_mid; ?>"></td>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_po_pc_wo/<?php echo $awo->id; ?>/<?php echo $project_code; ?>/<?php echo $awo->approve_sequence;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    </tr>

                                    <script>
                                        $("#approve_lock3<?php echo $n; ?>").click(function() {
                                            if ($("#approve_lock3<?php echo $n; ?>").prop("checked")) {
                                                $("#lock3<?php echo $n; ?>").val("Y");
                                            } else {
                                                $("#lock3<?php echo $n; ?>").val("N");
                                            }

                                        });
                                    </script>

                                    <div id="approvemodal33<?php echo $n; ?>" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header bg-info">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">เพิ่มรายการ</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" id="approvems33<?php echo $n; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var three = "3";
                                        $('.accopen33<?php echo $n; ?>').click(function() {
                                            $('#approvems33<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                            $("#approvems33<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + three);
                                        });
                                    </script>
                                    <?php $n++; }  ?>
                                </tbody>

                            </table>
                            <br>
                            <a class="addrow btn bg-info" id="insertpodetail3">Add Member</a>
                            <a type="button" class="btn bg-success" id="save_woo"> <span>Save WO</span></a>
                        </form>
                    </div>

                    <div class="tab-pane" id="solid-rounded-tab4">
                        <form action="<?php echo base_url(); ?>datastore_active/approve_pc/<?php echo $project_code; ?>" method="post" id="save_pc">
                            <div class="form-group">
                                <h1>PETTY CASH </h1>
                                <h3><input type="checkbox" <?php if($c_pc=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_pct" id="chkpj_pct"> <b>Control</b> </h3>
                                <input type="hidden" value="<?php echo $c_pc; ?>" name="chkpj_pc" id="chkpj_pc">
                                <label class="radio-inline">
                                <input type="radio" name="pc1" id="pc1" value="1" <?php if($a_pc=="1"){ echo "checked"; } ?>>
                                Approve ตามลำดับ
                                </label>

                                <label class="radio-inline">
                                <input type="radio" name="pc1" id="pc2" value="2" <?php if($a_pc=="2"){ echo "checked"; } ?>>
                                Approve ตามวงเงิน
                                </label>
                            </div>
                            <input type="hidden" value="<?php echo $a_pc; ?>" name="pc" id="pc">
                            <script>
                                $("#chkpj_pct").click(function() {
                                    if ($("#chkpj_pct").prop("checked")) {
                                        $("#chkpj_pc").val("1");
                                    } else {
                                        $("#chkpj_pc").val("0");
                                    }
                                });

                                $("#pc1").click(function() {
                                    if ($("#pc1").prop("checked")) {
                                        $("#pc").val("1");
                                    }
                                });

                                $("#pc2").click(function() {
                                    if ($("#pc2").prop("checked")) {
                                        $("#pc").val("2");
                                    }
                                });
                            </script>
                            <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">NO.</th>
                                        <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                        <th width="5%" class="text-center">Member ID</th>
                                        <th width="20%" style="text-align: center;">Member Name</th>
                                        <th width="10%" class="text-center">Position</th>
                                        <th width="10%" style="text-align: center;">Cost</th>
                                        <th width="10%" style="text-align: center;">Lock</th>
                                        <th width="10%" style="text-align: center;">Sign</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="body4">
                                    <?php $n=1; foreach ($pc as $apc) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $n; ?><input type="hidden" name="chkpc[]" value="Y"><input type="hidden" name="idpc[]" value="<?php echo $apc->id; ?>"></td>
                                        <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequencepc[]" value="<?php echo $apc->approve_sequence; ?>"></td>
                                        <td><input type="text" class="form-control input-sm " id="approve_mid4<?php echo $n; ?>" name="approve_midpc[]" value="<?php echo $apc->approve_mid; ?>" readonly></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="approve_mnamepc[]" id="approve_mname4<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $apc->approve_mname; ?>" readonly>
                                                <span class="input-group-btn">
                                                <button type="button" class="accopen44<?php echo $n; ?> btn btn-info btn-sm" id="approvem44<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal44<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_positionpc[]" value="<?php echo $apc->approve_position; ?>"></td>
                                        <td><input type="text" class="form-control input-sm text-right text-right" id="approve_cost<?php echo $n; ?>" name="approve_costpc[]" value="<?php echo $apc->approve_cost; ?>"></td>
                                        <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock4<?php echo $n; ?>" name="approve_lockpc[]" <?php if($apc->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock4pc[]" id="lock4<?php echo $n; ?>"
                                                value="<?php echo $apc->approve_lock; ?>"></td>
                                        <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PETTY CASH,<?=$apc->approve_mid; ?>"></td>
                                        <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_po_pc_wo/<?php echo $apc->id; ?>/<?php echo $project_code; ?>/<?php echo $apc->approve_sequence;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    </tr>

                                    <script>
                                        $("#approve_lock4<?php echo $n; ?>").click(function() {
                                            if ($("#approve_lock4<?php echo $n; ?>").prop("checked")) {
                                                $("#lock4<?php echo $n; ?>").val("Y");
                                            } else {
                                                $("#lock4<?php echo $n; ?>").val("N");
                                            }

                                        });
                                    </script>

                                    <div id="approvemodal44<?php echo $n; ?>" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header bg-info">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">เพิ่มรายการ</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" id="approvems44<?php echo $n; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var f = "4";
                                        $('.accopen44<?php echo $n; ?>').click(function() {
                                            $('#approvems44<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                            $("#approvems44<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + f);
                                        });
                                    </script>

                                    <?php  $n++; }  ?>
                                </tbody>

                            </table>
                            <br>
                            <a class="addrow btn bg-info" id="insertpodetail4">Add Member</a>
                            <a type="button" class="btn bg-success" id="save_pcc" hidden> <span>Save PETTY CASH</span></a>

                        </form>
                    </div>

                    <div class="tab-pane" id="solid-rounded-tab7">
                        <h2 class="panel-title">Inventory Control</h2>
                        <form action="<?php echo base_url(); ?>datastore_active/approve_ic/<?php echo $project_code; ?>" method="post" id="iccp">
                            <h3><input type="checkbox" <?php if($c_ic=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_ick" id="chkpj_ick">

                                <input type="hidden" value="<?php echo $c_ic; ?>" name="chkpj_ic" id="chkpj_ic">

                                <script>
                                    $("#chkpj_ick").click(function() {
                                        if ($("#chkpj_ick").prop("checked")) {
                                            $("#chkpj_ic").val("1");
                                        } else {
                                            $("#chkpj_ic").val("0");
                                        }
                                    });
                                </script>
                                <b>Control</b></h3>

                            <div class="form-group">
                                <p></p>
                                <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <!-- <th width="10%" style="text-align: center;">Cost</th> -->
                                            <th width="10%" style="text-align: center;">Lock</th>
                                            <th width="10%" style="text-align: center;">Sign</th>
                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body7">
                                        <?php $n=1; foreach ($ic as $aic) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $n; ?><input type="hidden" name="chkpr[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $aic->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $aic->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid7<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $aic->approve_mid; ?>" readonly></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname7<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $aic->approve_mname; ?>" readonly>
                                                    <span class="input-group-btn">
                              <button type="button" class="accopen77<?php echo $n; ?> btn btn-info btn-sm" id="approvem66<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal77<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                            </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $aic->approve_position; ?>"></td>

                                            <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock7<?php echo $n; ?>" name="approve_lock[]" <?php if($aic->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock1[]" id="lock7<?php echo $n; ?>"
                                                    value="<?php echo $aic->approve_lock; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$aic->approve_mid ?>"></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_bk/<?php echo $aic->id; ?>/<?php echo $project_code; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>
                                        <script>
                                            $("#approve_lock7<?php echo $n; ?>").click(function() {
                                                if ($("#approve_lock7<?php echo $n; ?>").prop("checked")) {
                                                    $("#lock7<?php echo $n; ?>").val("Y");
                                                } else {
                                                    $("#lock7<?php echo $n; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <div id="approvemodal77<?php echo $n; ?>" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="approvems77<?php echo $n; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var seven = "7";
                                            $('.accopen77<?php echo $n; ?>').click(function() {
                                                $('#approvems77<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                                $("#approvems77<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + seven);
                                            });
                                        </script>
                                        <?php $n++; }  ?>
                                </table>

                            </div>
                            <br>
                            <a class="btn bg-info" id="insertpodetail7">Add Member</a>
                            <a type="button" class="btn bg-success" id="saveic" hidden> <span>Save IC</span></a>
                        </form>
                    </div>

                    <div class="tab-pane" id="solid-rounded-tab6">
                        <form action="<?php echo base_url(); ?>datastore_active/approve_ap/<?php echo $project_code; ?>" method="post" id="accp">
                            <h2 class="panel-title">Account Payable</h2>

                            <h3><input type="checkbox" <?php if($c_ap=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_apk" id="chkpj_apk">

                                <input type="hidden" value="<?php echo $c_ap; ?>" name="chkpj_ap" id="chkpj_ap">

                                <script>
                                    $("#chkpj_apk").click(function() {
                                        if ($("#chkpj_apk").prop("checked")) {
                                            $("#chkpj_ap").val("1");
                                        } else {
                                            $("#chkpj_ap").val("0");
                                        }
                                    });
                                </script>
                                <b>Control</b> <a class="btn bg-info" id="insertpodetail6">Add Member</a></h3>

                            <div class="form-group">
                                <p></p>
                                <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <!-- <th width="10%" style="text-align: center;">Cost</th> -->
                                            <th width="10%" style="text-align: center;">Lock</th>
                                            <th width="10%" style="text-align: center;">Sign</th>
                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body6">
                                        <?php $n=1; foreach ($ap as $aap) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $n; ?><input type="hidden" name="chkpr[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $aap->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $aap->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid6<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $aap->approve_mid; ?>" readonly></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname6<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $aap->approve_mname; ?>" readonly>
                                                    <span class="input-group-btn">
                              <button type="button" class="accopen66<?php echo $n; ?> btn btn-info btn-sm" id="approvem66<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal66<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                            </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $aap->approve_position; ?>"></td>

                                            <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock6<?php echo $n; ?>" name="approve_lock[]" <?php if($aap->approve_lock=="Y"){ echo 'checked'; }; ?>>
                                                <input type="hidden" name="lock1[]" id="lock6<?php echo $n; ?>" value="<?php echo $aap->approve_lock; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$aap->approve_mid ?>"></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_bk/<?php echo $aap->id; ?>/<?php echo $project_code; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>
                                        <script>
                                            $("#approve_lock6<?php echo $n; ?>").click(function() {
                                                if ($("#approve_lock6<?php echo $n; ?>").prop("checked")) {
                                                    $("#lock6<?php echo $n; ?>").val("Y");
                                                } else {
                                                    $("#lock6<?php echo $n; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <div id="approvemodal66<?php echo $n; ?>" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="approvems66<?php echo $n; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var six = "6";
                                            $('.accopen66<?php echo $n; ?>').click(function() {
                                                $('#approvems66<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                                $("#approvems66<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + six);
                                            });
                                        </script>
                                        <?php $n++; }  ?>
                                </table>

                            </div>
                            <br><a type="button" class="btn bg-info" id="saveap" hidden> <span>Save AP</span></a>
                        </form>

                    </div>

                    <div class="tab-pane" id="solid-rounded-tab5">
                        <form action="<?php echo base_url(); ?>datastore_active/approve_prbooking/<?php echo $project_code; ?>" method="post" id="book">
                            <h2 class="panel-title">Booking</h2>

                            <h3><input type="checkbox" <?php if($c_bk=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_prt" id="chkpj_prt">

                                <input type="hidden" value="<?php echo $c_bk; ?>" name="chkpj_bk" id="chkpj_bk">

                                <script>
                                    $("#chkpj_prt").click(function() {
                                        if ($("#chkpj_prt").prop("checked")) {
                                            $("#chkpj_bk").val("1");
                                        } else {
                                            $("#chkpj_bk").val("0");
                                        }
                                    });
                                </script>
                                <b>Control</b></h3>

                            <div class="form-group">
                                <p></p>
                                <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <!-- <th width="10%" style="text-align: center;">Cost</th> -->
                                            <th width="10%" style="text-align: center;">Lock</th>
                                            <th width="10%" style="text-align: center;">Sign</th>
                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body5">
                                        <?php $n=1; foreach ($bk as $abk) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $n; ?><input type="hidden" name="chkpr[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $abk->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $abk->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid5<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $abk->approve_mid; ?>" readonly></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname5<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $abk->approve_mname; ?>" readonly>
                                                    <span class="input-group-btn">
                              <button type="button" class="accopen55<?php echo $n; ?> btn btn-info btn-sm" id="approvem11<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal55<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                            </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $abk->approve_position; ?>"></td>

                                            <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock5<?php echo $n; ?>" name="approve_lock[]" <?php if($abk->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock1[]" id="lock5<?php echo $n; ?>"
                                                    value="<?php echo $abk->approve_lock; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$abk->approve_mid ?>"></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_bk/<?php echo $abk->id; ?>/<?php echo $project_code; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>
                                        <script>
                                            $("#approve_lock5<?php echo $n; ?>").click(function() {
                                                if ($("#approve_lock5<?php echo $n; ?>").prop("checked")) {
                                                    $("#lock5<?php echo $n; ?>").val("Y");
                                                } else {
                                                    $("#lock5<?php echo $n; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <div id="approvemodal55<?php echo $n; ?>" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="approvems55<?php echo $n; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var five = "5";
                                            $('.accopen55<?php echo $n; ?>').click(function() {
                                                $('#approvems55<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                                $("#approvems55<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + five);
                                            });
                                        </script>
                                        <?php $n++; }  ?>
                                </table>

                            </div>
                            <br>
                            <a class="btn bg-info" id="insertpodetail5">Add Member</a>
                            <a type="button" class="btn bg-success" id="save_bk" hidden> <span>Save Booking</span></a>
                        </form>

                    </div>
                    
                    <?php if($tendercode==""){?>
                        <div class="tab-pane active" id="solid-rounded-tab1">
                            <form action="<?php echo base_url(); ?>datastore_active/approve_pr/<?php echo $project_code; ?>" method="post" id="save_pr">
                                <div class="form-group">
                                    <h1>PR </h1>
                                    <h3><input type="checkbox" <?php if($c_pr=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_prtx" id="chkpj_prtx">
                                        <input type="hidden" value="<?php echo $c_pr; ?>" name="chkpj_pr" id="chkpj_pr">
                                        <b>Control</b> </h3>
                                    <label class="radio-inline">
                                        <input type="radio" name="pr1" id="pr1" value="1" <?php if($a_pr=="1"){ echo "checked"; } ?>>
                                        Approve ตามลำดับ
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="pr1" id="pr2" value="2" <?php if($a_pr=="2"){ echo "checked"; } ?>>
                                        Approve ตามวงเงิน
                                    </label>

                                    <input type="hidden" value="<?php echo $a_pr; ?>" name="pr" id="pr">
                                </div>
                                <script>
                                    $("#chkpj_prtx").click(function() {
                                        if ($("#chkpj_prtx").prop("checked")) {
                                            $("#chkpj_pr").val("1");
                                        } else {
                                            $("#chkpj_pr").val("0");
                                        }
                                    });

                                    $("#pr1").click(function() {
                                        if ($("#pr1").prop("checked")) {
                                            $("#pr").val("1");
                                        }
                                    });

                                    $("#pr2").click(function() {
                                        if ($("#pr2").prop("checked")) {
                                            $("#pr").val("2");
                                        }
                                    });
                                </script>
                                <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <th width="10%" style="text-align: center;">Cost</th>
                                            <th width="10%" style="text-align: center;">Lock</th>
                                            <th width="10%" style="text-align: center;">Sign</th>

                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body1">
                                        <?php $n=1; foreach ($pr as $apr) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $n; ?><input type="hidden" name="chkpr[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $apr->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $apr->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid1<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $apr->approve_mid; ?>" readonly></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname1<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $apr->approve_mname; ?>" readonly>
                                                    <span class="input-group-btn">
                                                <button type="button" class="accopen11<?php echo $n; ?> btn btn-info btn-sm" id="approvem11<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal11<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                                                </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $apr->approve_position; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-right text-right" id="approve_cost<?php echo $n; ?>" name="approve_cost[]" value="<?php echo $apr->approve_cost; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock1<?php echo $n; ?>" name="approve_lock[]" <?php if($apr->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock1[]" id="lock1<?php echo $n; ?>"
                                                    value="<?php echo $apr->approve_lock; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$apr->approve_mid ?>"></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_po_pc_wo/<?php echo $apr->id; ?>/<?php echo $project_code; ?>/<?php echo $apr->approve_sequence;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>
                                        <script>
                                            $("#approve_lock1<?php echo $n; ?>").click(function() {
                                                if ($("#approve_lock1<?php echo $n; ?>").prop("checked")) {
                                                    $("#lock1<?php echo $n; ?>").val("Y");
                                                } else {
                                                    $("#lock1<?php echo $n; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <div id="approvemodal11<?php echo $n; ?>" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="approvems11<?php echo $n; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var one = "1";
                                            $('.accopen11<?php echo $n; ?>').click(function() {
                                                $('#approvems11<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                                $("#approvems11<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + one);
                                            });
                                        </script>
                                        <?php $n++; }  ?>
                                    </tbody>
                                </table>
                                <br>
                                <a class="addrow btn bg-info" id="insertpodetail1">Add Member</a>
                                <a type="button" class="btn bg-success" id="save_prr"> <span>Save PR</span></a>
                            </form>
                        </div>
                    <?php }else{ ?>
                        <div class="tab-pane active" id="solid-rounded-tab8">
                            <form action="<?php echo base_url(); ?>datastore_active/approve_td/<?php echo $project_code; ?>/<?php echo $tendercode;?>" method="post" id="save_td">
                                <div class="form-group">
                                    <h1>Tender Biding </h1>
                                    <h3><input type="checkbox" <?php if($c_pr=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_tdtx" id="chkpj_tdtx">
                                        <input type="hidden" value="<?php echo $c_pr; ?>" name="chkpj_td" id="chkpj_td">
                                        <b>Control</b> </h3>
                                    <label class="radio-inline">
                                        <input type="radio" name="td1" id="td1" value="1" <?php if($a_td=="1"){ echo "checked"; } ?>>
                                        Approve ตามลำดับ
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="td1" id="td2" value="2" <?php if($a_td=="2"){ echo "checked"; } ?>>
                                        Approve ตามวงเงิน
                                    </label>

                                    <input type="hidden" value="<?php echo $a_td; ?>" name="td" id="td">
                                </div>
                                <script>
                                    $("#chkpj_tdtx").click(function() {
                                        if ($("#chkpj_tdtx").prop("checked")) {
                                            $("#chkpj_td").val("1");
                                        } else {
                                            $("#chkpj_td").val("0");
                                        }
                                    });

                                    $("#td1").click(function() {
                                        if ($("#td1").prop("checked")) {
                                            $("#td").val("1");
                                        }
                                    });

                                    $("#td2").click(function() {
                                        if ($("#td2").prop("checked")) {
                                            $("#td").val("2");
                                        }
                                    });
                                </script>
                                <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <th width="10%" style="text-align: center;">Cost</th>
                                            <th width="10%" style="text-align: center;">Lock</th>
                                            <th width="10%" style="text-align: center;">Sign</th>

                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body8">
                                        <?php $n=1; foreach ($td as $apr) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $n; ?><input type="hidden" name="chktd[]" value="Y"><input type="hidden" name="idtd[]" value="<?php echo $apr->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $apr->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid8<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $apr->approve_mid; ?>" readonly></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname8<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $apr->approve_mname; ?>" readonly>
                                                    <span class="input-group-btn">
                                                <button type="button" class="accopen8<?php echo $n; ?> btn btn-info btn-sm" id="approvem8<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal8<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                                                </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $apr->approve_position; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-right text-right" id="approve_cost<?php echo $n; ?>" name="approve_cost[]" value="<?php echo $apr->approve_cost; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock8<?php echo $n; ?>" name="approve_lock[]" <?php if($apr->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock8[]" id="lock8<?php echo $n; ?>"
                                                    value="<?php echo $apr->approve_lock; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$apr->approve_mid ?>"></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_po_pc_wo/<?php echo $apr->id; ?>/<?php echo $project_code; ?>/<?php echo $apr->approve_sequence;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>
                                        <script>
                                            $("#approve_lock8<?php echo $n; ?>").click(function() {
                                                if ($("#approve_lock8<?php echo $n; ?>").prop("checked")) {
                                                    $("#lock8<?php echo $n; ?>").val("Y");
                                                } else {
                                                    $("#lock8<?php echo $n; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <div id="approvemodal8<?php echo $n; ?>" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="approvems8<?php echo $n; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var eg = "8";
                                            $('.accopen8<?php echo $n; ?>').click(function() {
                                                $('#approvems8<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                                $("#approvems8<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + eg);
                                            });
                                        </script>
                                        <?php $n++; }  ?>
                                    </tbody>
                                </table>
                                <br>
                                <a class="addrow btn bg-info" id="insertpodetail8">Add Member</a>
                                <a type="button" class="btn bg-success" id="save_tdd"> <span>Save</span></a>
                            </form>
                        </div>
                        <div class="tab-pane" id="solid-rounded-tab1">
                            <form action="<?php echo base_url(); ?>datastore_active/approve_pr/<?php echo $project_code; ?>" method="post" id="save_pr">
                                <div class="form-group">
                                    <h1>PR </h1>
                                    <h3><input type="checkbox" <?php if($c_pr=="1" ) { echo 'checked'; } ?> value="1" name="chkpj_prtx" id="chkpj_prtx">
                                        <input type="hidden" value="<?php echo $c_pr; ?>" name="chkpj_pr" id="chkpj_pr">
                                        <b>Control</b> </h3>
                                    <label class="radio-inline">
                                        <input type="radio" name="pr1" id="pr1" value="1" <?php if($a_pr=="1"){ echo "checked"; } ?>>
                                        Approve ตามลำดับ
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="pr1" id="pr2" value="2" <?php if($a_pr=="2"){ echo "checked"; } ?>>
                                        Approve ตามวงเงิน
                                    </label>

                                    <input type="hidden" value="<?php echo $a_pr; ?>" name="pr" id="pr">
                                </div>
                                <script>
                                    $("#chkpj_prtx").click(function() {
                                        if ($("#chkpj_prtx").prop("checked")) {
                                            $("#chkpj_pr").val("1");
                                        } else {
                                            $("#chkpj_pr").val("0");
                                        }
                                    });

                                    $("#pr1").click(function() {
                                        if ($("#pr1").prop("checked")) {
                                            $("#pr").val("1");
                                        }
                                    });

                                    $("#pr2").click(function() {
                                        if ($("#pr2").prop("checked")) {
                                            $("#pr").val("2");
                                        }
                                    });
                                </script>
                                <table class="table table-hover table-bordered table-striped table-xxs" id="res">
                                    <thead>
                                        <tr>
                                            <th width="5%" style="text-align: center;">NO.</th>
                                            <th width="5%" style="text-align: center;">Confirmation sequence</th>
                                            <th width="5%" class="text-center">Member ID</th>
                                            <th width="20%" style="text-align: center;">Member Name</th>
                                            <th width="10%" class="text-center">Position</th>
                                            <th width="10%" style="text-align: center;">Cost</th>
                                            <th width="10%" style="text-align: center;">Lock</th>
                                            <th width="10%" style="text-align: center;">Sign</th>

                                            <th width="10%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body1">
                                        <?php $n=1; foreach ($pr as $apr) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $n; ?><input type="hidden" name="chkpr[]" value="Y"><input type="hidden" name="idpr[]" value="<?php echo $apr->id; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-center" id="approve_sequence<?php echo $n; ?>" name="approve_sequence[]" value="<?php echo $apr->approve_sequence; ?>"></td>
                                            <td><input type="text" class="form-control input-sm " id="approve_mid121<?php echo $n; ?>" name="approve_mid[]" value="<?php echo $apr->approve_mid; ?>" readonly></td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="approve_mname[]" id="approve_mname1<?php echo $n; ?>" class="form-control input-xs" value="<?php echo $apr->approve_mname; ?>" readonly>
                                                    <span class="input-group-btn">
                                                <button type="button" class="accopen11<?php echo $n; ?> btn btn-info btn-sm" id="approvem11<?php echo $n; ?>" data-toggle="modal" data-target="#approvemodal11<?php echo $n; ?>" ><i class="icon-search4"></i></button>
                                                </span>
                                                </div>
                                            </td>
                                            <td><input type="text" class="form-control input-sm" id="approve_position<?php echo $n; ?>" name="approve_position[]" value="<?php echo $apr->approve_position; ?>"></td>
                                            <td><input type="text" class="form-control input-sm text-right text-right" id="approve_cost<?php echo $n; ?>" name="approve_cost[]" value="<?php echo $apr->approve_cost; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock1<?php echo $n; ?>" name="approve_lock[]" <?php if($apr->approve_lock=="Y"){ echo 'checked'; }; ?>><input type="hidden" name="lock1[]" id="lock1<?php echo $n; ?>"
                                                    value="<?php echo $apr->approve_lock; ?>"></td>
                                            <td style="text-align: center;"><input type="checkbox" name="sign[]" value="<?=$n;?>,<?=$project_code ?>,PR,<?=$apr->approve_mid ?>"></td>
                                            <td class="text-center"><a href="<?php echo base_url(); ?>datastore_active/delpr_po_pc_wo/<?php echo $apr->id; ?>/<?php echo $project_code; ?>/<?php echo $apr->approve_sequence;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                        </tr>
                                        <script>
                                            $("#approve_lock1<?php echo $n; ?>").click(function() {
                                                if ($("#approve_lock1<?php echo $n; ?>").prop("checked")) {
                                                    $("#lock1<?php echo $n; ?>").val("Y");
                                                } else {
                                                    $("#lock1<?php echo $n; ?>").val("N");
                                                }
                                            });
                                        </script>
                                        <div id="approvemodal11<?php echo $n; ?>" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header bg-info">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">เพิ่มรายการ </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="approvems11<?php echo $n; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            var one = "121";
                                            $('.accopen11<?php echo $n; ?>').click(function() {
                                                $('#approvems11<?php echo $n; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                                $("#approvems11<?php echo $n; ?>").load('<?php echo base_url(); ?>share/member/<?php echo $n; ?>/' + one);
                                            });
                                        </script>
                                        <?php $n++; }  ?>
                                    </tbody>
                                </table>
                                <br>
                                <a class="addrow btn bg-info" id="insertpodetail1">Add Member</a>
                                <a type="button" class="btn bg-success" id="save_prr"> <span>Save PR</span></a>
                            </form>
                        </div>
                    <?php }?>

                </div>
            </div>


        </div>
    </div>
</div>
<div class="rowmat1"></div>
<div class="rowmat2"></div>
<div class="rowmat3"></div>
<div class="rowmat4"></div>
<div class="rowmat5"></div>
<div class="rowmat8"></div>
<script>
    $("#insertpodetail1").click(function() {
        addrow1();
        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });


        $('#save_prr').show();
    });

    function addrow1() {
        var row = ($('#body1 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkpr[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequence[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid1' + row + '" name="approve_mid[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mname[]" id="approve_mname1' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem1' + row + '" data-toggle="modal" data-target="#approvemodal1' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_position[]" value=""></td>' +
            '<td><input type="text" class="form-control input-sm text-right" id="approve_cost' + row + '" name="approve_cost[]" value=".00"></td>' +
            '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock1' + row + '" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock1' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PR"></td>' +
            '<td class="text-center">' +
            '<a id="removepr' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body1').append(tr);

        $(document).on('click', 'a#removepr' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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

        $("#approve_lock1" + row + "").click(function() {
            if ($("#approve_lock1" + row + "").prop("checked")) {
                $("#lock1" + row + "").val("Y");
            } else {
                $("#lock1" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var one = "1";
        var rowmat1 = ' <div id="approvemodal1' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems1' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem1' + row).click(function() {
            $('#approvems1' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems1" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + one);
        });
        $('.rowmat1').append(rowmat1);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>

<script>
    $("#insertpodetail2").click(function() {
        addrow2();

        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });

        $('#save_poo').show();
    });

    function addrow2() {
        var row = ($('#body2 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkpo[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequencepo[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid2' + row + '" name="approve_midpo[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mnamepo[]" id="approve_mname2' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem2' + row + '" data-toggle="modal" data-target="#approvemodal2' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_positionpo[]" value=""></td>' +
            '<td><input type="text" class="form-control input-sm text-right" id="approve_cost' + row + '" onchange="format(this)" onblur="if(this.value.indexOf(".")==-1)this.value=this.value+".00" name="approve_costpo[]" value=".00"></td>' +
            '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock2' + row + '" name="approve_lockpo[]" value="1"><input type="hidden" name="lock2po[]" id="lock2' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PO"></td>' +
            '<td class="text-center">' +
            '<a id="removepo' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body2').append(tr);
        $(document).on('click', 'a#removepo' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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


        $("#approve_lock2" + row + "").click(function() {
            if ($("#approve_lock2" + row + "").prop("checked")) {
                $("#lock2" + row + "").val("Y");
            } else {
                $("#lock2" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var two = "2";
        var rowmat2 = ' <div id="approvemodal2' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems2' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem2' + row).click(function() {
            $('#approvems2' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems2" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + two);
        });
        $('.rowmat2').append(rowmat2);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>

<script>
    $("#insertpodetail3").click(function() {
        addrow3();

        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });
        $('#save_woo').show();
    });

    function addrow3() {
        var row = ($('#body3 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkwo[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequencewo[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid3' + row + '" name="approve_midwo[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mnamewo[]" id="approve_mname3' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem3' + row + '" data-toggle="modal" data-target="#approvemodal3' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_positionwo[]" value=""></td>' +
            '<td><input type="text" class="form-control input-sm text-right" id="approve_cost' + row + '" name="approve_costwo[]" value=".00"></td>' +
            '<td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock3' + row + '" name="approve_lockwo[]" value="1"><input type="hidden" name="lock3wo[]" id="lock3' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,WO"></td>' +
            '<td class="text-center">' +
            '<a id="removewo' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body3').append(tr);

        $(document).on('click', 'a#removewo' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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

        $("#approve_lock3" + row + "").click(function() {
            if ($("#approve_lock3" + row + "").prop("checked")) {
                $("#lock3" + row + "").val("Y");
            } else {
                $("#lock3" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var three = "3";
        var rowmat3 = ' <div id="approvemodal3' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems3' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem3' + row).click(function() {
            $('#approvems3' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems3" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + three);
        });
        $('.rowmat3').append(rowmat3);


    }

    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>



<script>
    $("#insertpodetail4").click(function() {
        addrow4();
        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });

        $('#save_pcc').show();
    });

    function addrow4() {
        var row = ($('#body4 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkpc[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequencepc[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid4' + row + '" name="approve_midpc[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mnamepc[]" id="approve_mname4' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem4' + row + '" data-toggle="modal" data-target="#approvemodal4' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_positionpc[]" value=""></td>' +
            '<td><input type="text" class="form-control input-sm text-right" id="approve_cost' + row + '" name="approve_costpc[]" value=".00"></td>' +
            '<td style="text-align: center;"><input type="checkbox" class="input-sm" id="approve_lock4' + row + '" name="approve_lockpc[]" value="1"><input type="hidden" name="lock4pc[]" id="lock4' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PETTY CASH"></td>' +
            '<td class="text-center">' +
            '<a id="removepc' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body4').append(tr);

        $(document).on('click', 'a#removepc' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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
        $("#approve_lock4" + row + "").click(function() {
            if ($("#approve_lock4" + row + "").prop("checked")) {
                $("#lock4" + row + "").val("Y");
            } else {
                $("#lock4" + row + "").val("N");
            }

        });


        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var f = "4";
        var rowmat3 = ' <div id="approvemodal4' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems4' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem4' + row).click(function() {
            $('#approvems4' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems4" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + f);
        });
        $('.rowmat3').append(rowmat3);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>


<script>
    $("#saveap").click(function(e) {

        var frm = $('#accp');
        frm.submit(function(ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function(data) {


                    swal({
                        title: "AP Setup Aprove" + data,
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" +$.trim(data)+"/"+"<?=$tendercode;?>";
                    }, 500);
                }
            });
            ev.preventDefault();

        });
        $("#accp").submit(); //Submit  the FORM

    });
</script>
<script>
    $("#save_bk").click(function(e) {

        var frm = $('#book');
        frm.submit(function(ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function(data) {


                    swal({
                        title: "BK Setup Aprove" + data,
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" +$.trim(data)+"/"+"<?=$tendercode;?>";
                    }, 500);
                }
            });
            ev.preventDefault();

        });
        $("#book").submit(); //Submit  the FORM

    });
</script>

<script>
    $("#save_prr").click(function(e) {

        var chkpj_pr = $('#chkpj_pr').val();
        var pr = $('#body1 tr').length;

        if (chkpj_pr == "1" && pr == "0") {
            swal({
                title: "Please add member",
                text: "กรุณาเพิ่มผู้ใช้งาน",
                type: "error"
            });
        } else {
            var frm = $('#save_pr');
            frm.submit(function(ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function(data) {


                        swal({
                            title: "PR Setup Aprove" + data,
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" +$.trim(data)+"/"+"<?=$tendercode;?>";
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
            $("#save_pr").submit(); //Submit  the FORM
        }
    });
</script>
<script>
    $("#save_tdd").click(function(e) {

        var chkpj_td = $('#chkpj_td').val();
        var td = $('#body8 tr').length;

        if (chkpj_td == "1" && td == "0") {
            swal({
                title: "Please add member",
                text: "กรุณาเพิ่มผู้ใช้งาน",
                type: "error"
            });
        } else {
            var frm = $('#save_td');
            frm.submit(function(ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function(data) {


                        swal({
                            title: "TD Setup Aprove" + data,
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        // setTimeout(function() {
                        //     window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" + data;
                        // }, 500);
                    }
                });
                ev.preventDefault();

            });
            $("#save_td").submit(); //Submit  the FORM
        }
    });
</script>

<script>
    $("#save_poo").click(function(e) {
        var chkpj_po = $('#chkpj_po').val();
        var po = $('#body2 tr').length;
        if (chkpj_po == "1" && po == "0") {
            swal({
                title: "Please add member",
                text: "กรุณาเพิ่มผู้ใช้งาน",
                type: "error"
            });
        } else {
            var frm = $('#save_po');
            frm.submit(function(ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function(data) {
                        swal({
                            title: "PO Setup Aprove" + data,
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" +$.trim(data)+"/"+"<?=$tendercode;?>";
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
            $("#save_po").submit(); //Submit  the FORM
        }
    });
</script>

<script>
    $("#save_woo").click(function(e) {

        var chkpj_wo = $('#chkpj_wo').val();
        var wo = $('#body3 tr').length;

        if (chkpj_wo == "1" && wo == "0") {

            swal({
                title: "Please add member",
                text: "กรุณาเพิ่มผู้ใช้งาน",
                type: "error"
            });

        } else {
            var frm = $('#save_wo');
            frm.submit(function(ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function(data) {
                        swal({
                            title: "WO Setup Aprove" + data,
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/"+$.trim(data)+"/"+"<?=$tendercode;?>#solid-rounded-tab2";
                            // window.location.href = "<?php echo base_url(); ?>setup_wh/setup_warehouse_new/" + "<?php echo $project_id; ?>" + "/" + data;
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
            $("#save_wo").submit(); //Submit  the FORM
        }
    });
</script>

<script>
    $("#save_pcc").click(function(e) {
        var chkpj_pc = $('#chkpj_pc').val();
        var pc = $('#body4 tr').length;

        if (chkpj_pc == "1" && pc == "0") {
            swal({
                title: "Please add member",
                text: "กรุณาเพิ่มผู้ใช้งาน",
                type: "error"
            });
        } else {
            var frm = $('#save_pc');
            frm.submit(function(ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function(data) {
                        swal({
                            title: "PETTY CASH Setup Aprove" + data,
                            text: "Save Completed!!.",
                            // confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" + "<?php echo $pjcodesegment;?>"+"/"+"<?=$tendercode;?>";
                        }, 500);
                    }
                });
                ev.preventDefault();

            });
            $("#save_pc").submit(); //Submit  the FORM
        }
    });
</script>
<script>
    $("#saveic").click(function(e) {

        var frm = $('#iccp');
        frm.submit(function(ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function(data) {
                    swal({
                        title: "Inventory Control Setup Aprove" + data,
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url(); ?>data_master/approve_prpo/" +$.trim(data)+"/"+"<?=$tendercode;?>";
                    }, 500);
                }
            });
            ev.preventDefault();

        });
        $("#iccp").submit(); //Submit  the FORM

    });
</script>

<script type="text/javascript">
    $("[name='sign[]']").click(function() {
        var val = $(this).val();
        var array = val.split(",");

        var status = $(this).prop("checked");

        if (array.length < 4) {
            alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
            $(this).prop("checked", false);
        } else {
            send_sign(array, status);
        }
    });

    function send_sign(array_info, status) {
        //alert(5555)
        var url = "<?=base_url()?>datastore_active/update_sign";

        $.post(url, {
            array: array_info,
            status: status
        }, function() {

        }).done(function(data) {
            alert(data);

        });

    }
</script>




<script>
    $("#insertpodetail5").click(function() {
        addrow5();
        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });


        $('#save_prr').show();
    });

    function addrow5() {
        var row = ($('#body5 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkpr[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequence[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid5' + row + '" name="approve_mid[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mname[]" id="approve_mname5' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem5' + row + '" data-toggle="modal" data-target="#approvemodal5' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_position[]" value=""></td>' +

            '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock5' + row + '" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock1' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PR"></td>' +
            '<td class="text-center">' +
            '<a id="removepr' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body5').append(tr);

        $(document).on('click', 'a#removepr' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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

        $("#approve_lock5" + row + "").click(function() {
            if ($("#approve_lock5" + row + "").prop("checked")) {
                $("#lock5" + row + "").val("Y");
            } else {
                $("#lock5" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var five = "5";
        var rowmat5 = ' <div id="approvemodal5' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems5' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem5' + row).click(function() {
            $('#approvems5' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems5" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + five);
        });
        $('.rowmat5').append(rowmat5);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>


<script>
    $("#insertpodetail6").click(function() {
        addrow6();
        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });


        $('#save_prr').show();
    });

    function addrow6() {
        var row = ($('#body6 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkpr[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequence[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid6' + row + '" name="approve_mid[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mname[]" id="approve_mname6' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem6' + row + '" data-toggle="modal" data-target="#approvemodal6' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_position[]" value=""></td>' +

            '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock5' + row + '" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock6' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PR"></td>' +
            '<td class="text-center">' +
            '<a id="removepr' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body6').append(tr);

        $(document).on('click', 'a#removepr' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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

        $("#approve_lock6" + row + "").click(function() {
            if ($("#approve_lock6" + row + "").prop("checked")) {
                $("#lock6" + row + "").val("Y");
            } else {
                $("#lock6" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var six = "6";
        var rowmat6 = ' <div id="approvemodal6' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems6' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem6' + row).click(function() {
            $('#approvems6' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems6" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + six);
        });
        $('.rowmat5').append(rowmat6);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>

<script>
    $("#insertpodetail7").click(function() {
        addrow7();
        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });


        $('#save_icc').show();
    });

    function addrow7() {
        var row = ($('#body7 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chkpr[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequence[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid7' + row + '" name="approve_mid[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mname[]" id="approve_mname7' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem7' + row + '" data-toggle="modal" data-target="#approvemodal7' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_position[]" value=""></td>' +

            '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock7' + row + '" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock7' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PR"></td>' +
            '<td class="text-center">' +
            '<a id="removeic' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body7').append(tr);

        $(document).on('click', 'a#removeic' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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

        $("#approve_lock7" + row + "").click(function() {
            if ($("#approve_lock7" + row + "").prop("checked")) {
                $("#lock7" + row + "").val("Y");
            } else {
                $("#lock7" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var seven = "7";
        var rowmat7 = ' <div id="approvemodal7' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems7' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem7' + row).click(function() {
            $('#approvems7' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems7" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + seven);
        });
        $('.rowmat5').append(rowmat7);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>

<script>
    $("#insertpodetail8").click(function() {
        addrow8();
        $("[name='sign[]']").click(function() {
            var val = $(this).val();
            var array = val.split(",");

            var status = $(this).prop("checked");

            if (array.length < 4) {
                alert("กรุณากดปุ่ม save ก่อน ถึงจะทำการยืนยันได้");
                $(this).prop("checked", false);
            } else {
                send_sign(array, status);
            }
        });


        $('#save_td').show();
    });

    function addrow8() {
        var row = ($('#body8 tr').length) - 0 + 1;
        var tr = '<tr id="' + row + '">' +
            '<td class="text-center">' + row + '<input type="hidden" name="chktd[]" value="X"></td>' +
            '<td><input type="text" class="form-control input-sm text-center" id="approve_sequence' + row + '" name="approve_sequence[]" value="' + row + '"></td>' +
            '<td><input type="text" class="form-control input-sm " id="approve_mid8' + row + '" name="approve_mid[]" value="" readonly></td>' +
            '<td>' +
            '<div class="input-group">' +
            '<input type="text" name="approve_mname[]" id="approve_mname8' + row + '"  class="form-control input-xs" readonly>' +
            '<span class="input-group-btn" >' +
            '<button type="button" class="accopen btn btn-info btn-sm" id="approvem8' + row + '" data-toggle="modal" data-target="#approvemodal8' + row + '" ><i class="icon-search4"></i></button>' +
            ' </span>' +
            '</div>' +
            '</td>' +
            '<td><input type="text" class="form-control input-sm" id="approve_position' + row + '" name="approve_position[]" value=""></td>' +
            '<td><input type="text" class="form-control input-sm text-right" id="approve_cost' + row + '" name="approve_cost[]" value=".00"></td>' +
            '<td style="text-align: center;"><input type="checkbox" class=" input-sm" id="approve_lock8' + row + '" name="approve_lock[]" value="1"><input type="hidden" name="lock1[]" id="lock1' + row + '" value="N"></td>' +
            '<td style="text-align: center;"><input type="checkbox" name="sign[]" value="' + row + ',<?=$project_code ?>,PR"></td>' +
            '<td class="text-center">' +
            '<a id="removetd' + row + '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="glyphicon glyphicon-trash"></i></a>' +

            '</td>' +

            '</tr>';



        $('#body8').append(tr);

        $(document).on('click', 'a#removetd' + row + '', function() { // <-- changes

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
                        onClick: function($save) {
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

        $("#approve_lock8" + row + "").click(function() {
            if ($("#approve_lock8" + row + "").prop("checked")) {
                $("#lock8" + row + "").val("Y");
            } else {
                $("#lock8" + row + "").val("N");
            }

        });

        $("#approve_cost" + row + "").keydown(function() {
            var approve_costw = $("#approve_cost" + roww + "").val();
            var approve_cost = $("#approve_cost" + row + "").val();
            if (approve_costw < approve_cost) {
                $("#approve_cost" + row + "").val("0.00");
            }

        });
        var one = "8";
        var rowmat8 = ' <div id="approvemodal8' + row + '" class="modal fade">' +
            '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content ">' +
            '<div class="modal-header bg-info">' +
            '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
            '<h5 class="modal-title">เพิ่มรายการ</h5>' +
            '</div>' +
            '<div class="modal-body">' +
            '<div class="row" id="approvems8' + row + '">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('#approvem8' + row).click(function() {
            $('#approvems8' + row).html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#approvems8" + row).load('<?php echo base_url(); ?>share/member/' + row + '/' + one);
        });
        $('.rowmat8').append(rowmat8);


    }




    var timeoutID;

    function delayedAlert() {
        timeoutID = window.setTimeout(refrshna, 1500);
    }

    function refrshna() {
        $('#res').html("<img src='<?php echo base_url(); ?>index.php/assets/images/loading.gif'> Loading...");
        $("#res").load('<?php echo base_url(); ?>index.php/asset_active/getlesssetup/');
    }
</script>