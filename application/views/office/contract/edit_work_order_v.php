<div class="content-wrapper">
    <div class="page-header">
        <div class="content">
            <div class="row">
                <div class="panel panel-flat border-top-lg border-top-success">
                    <div class="panel-heading ">
                        <h5 class="panel-title">Work Order System &nbsp;
                            <a class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</a>&nbsp;
                            <a class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</a>
                            <input type="hidden" id="ckkcontrolbg" value="2">
                        </h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a class="openpr btn btn-info btn-sm" data-toggle="modal" data-target="#openpr" id="sss"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Select PR</a></li>
                            </ul>
                        </div>
                        <!-- <a class="heading-elements-toggle"><i class="icon-menu"></i></a> -->
                    </div>
                    <form id="workorderport" class="form-validate-jquery" action="<?php echo base_url();?>contract_active/test_post_wo" novalidate="novalidate" method="post">
                        <div class="panel-body">
                            <div class="tabbable tab-content-bordered">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="active"><a href="#PO1" data-toggle="tab"><i class="glyphicon glyphicon-list-alt"></i> หนังสือสัญญาจ้าง</a></li>
                                    <!-- <li><a href="#PO2" data-toggle="tab"><i class="icon-menu3"></i>เงื่อนไขอื่นๆ</a></li> -->
                                    <!-- <li><a href="#PO3" data-toggle="tab"><i class="icon-menu3"></i>รายละเอียดงวดงาน</a></li> -->
                                    <!-- <li><a href="#PO3" data-toggle="tab"><i class="icon-attachment"></i>Attachment File</a></li> -->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane has-padding active" id="PO1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label class="">เลขที่เอกสาร </label>
                                                            <input type="text" name="lolono" id="lolono" class="form-control" readonly="readonly" value="<?=$res[0]['lo_lono'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="lodate">วันที่เอกสาร <span class="text-danger">*</span></label>
                                                        <input type="date" name="lodate" id="date" required="required" placeholder="กรอกวันที่เอกสาร" class="form-control" value="<?= $res[0]['lodate']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="refquono">อ้างอิงใบเสนอราคาเลขที่</label>
                                                            <input type="text" name="refquono" placeholder="กรอกอ้างอิงใบเสนอราคา" class="form-control" id="refquono" value="<?= $res[0]['refquono'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="quodate">วันที่ใบเสนอราคา</label>
                                                            <input type="date" name="quodate" placeholder="กรอกวันที่ใบเสนอราคา" class="form-control date" id="quodate" value="<?=$res[0]['quodate'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="pr_name">อ้างอิงใบขอซื้อเลขที่</label>
                                                            <input type="text" class="form-control" required="required" name="pr_name" id="pr_id_ref" value="<?=$res[0]['prno'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="refprdate">อ้างอิงวันที่ใบขอซื้อ <span class="text-danger">*</span></label>
                                                        <input type="date" name="refprdate" id="refprdate" required="required" placeholder="กรอกวันที่เอกสาร" class="form-control" value="<?= $res[0]['ref_prdate']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <?php if ($flag == "p") {?>
                                                            <label for="pr_name">โครงการ</label>
                                                            <input type="text" name="projectname" readonly="true" class="form-control" value="<?php echo $pj[0]['project_name']; ?>">
                                                            <input type="hidden" name="projectid" class="form-control input-sm" id="projectid" value="<?php echo $proid; ?>">
                                                            <input type="hidden" name="projectcode" class="form-control input-sm" id="projectcode" value="<?php echo $projectcode; ?>">
                                                        <?php } else { ?>
                                                            <label for="project">ชื่อแผนก</label>
                                                            <input type="text" class="form-control" readonly="readonly" placeholder="Department" value="<?php echo $pj[0]['project_name']; ?>" name="depname" id="depname">
                                                            <input type="hidden" readonly="true" value="<?php echo $proid; ?>" class="form-control" name="depid" id="depid">
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="vtype">ประเภทผู้รับเหมา</label>
                                                            <select class="form-control" name="vtype" id="vtype">
                                                                <option value="1">External</option>
                                                                <option value="2">Employee</option>
                                                            </select>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="project">ชื่อผู้รับจ้างช่วง / บริษัท <span class="text-danger">*</span></label>
                                                            <div class="input-group"> 
                                                                <input type="text" name="subcontact" placeholder="ชื่อ หรือ บริษัท" class="form-control " id="subcontact" value="<?=$res[0]['contactor'];?>">
                                                                <input type="hidden" name="venid" id="venid" value="<?=$res[0]['contact'];?>">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="openvender btn btn-default" data-toggle="modal" data-target="#openvender"><i class="icon-search4"></i></button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="venderid" id="venderid" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="project">ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน <span class="text-danger">*</span></label>
                                                            <input type="text" name="cosubcontact" placeholder="ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน" class="form-control" id="cosubcontact" value="<?=$res[0]['cosubcontact'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        
                                                            <label>ประเภทสัญญา <span class="text-danger">*</span></label> 
                                                            <select class="form-control" name="contacttype" id="contacttype">
                                                                <!-- <option value="1">ค่าแรง</option>
                                                                <option value="2">ค่าของ</option>
                                                                <option value="3">ทั้งค่าแรงและค่าของ</option>
                                                                <option value="4">ค่าเช่า</option>
                                                                <option value="5">ค่าบริการ</option> -->
                                                                <?php if($res[0]['contacttype'] == '1'){ ?>
                                                                    <option value="1" selected>ค่าแรง</option>
                                                                <?php } else { ?>
                                                                    <option value="1">ค่าแรง</option>
                                                                <?php }?>
                                                                <?php if($res[0]['contacttype'] == '2'){ ?>
                                                                    <option value="2" selected>ค่าของ</option>
                                                                <?php } else { ?>
                                                                    <option value="2">ค่าของ</option>
                                                                <?php }?>
                                                                <?php if($res[0]['contacttype'] == '3'){ ?>
                                                                    <option value="3" selected>ทั้งค่าแรงและค่าของ</option>
                                                                <?php } else { ?>
                                                                    <option value="3">ทั้งค่าแรงและค่าของ</option>
                                                                <?php }?>
                                                                <?php if($res[0]['contacttype'] == '4'){ ?>
                                                                     <option value="4" selected>ค่าเช่า</option>
                                                                <?php } else { ?>
                                                                     <option value="4">ค่าเช่า</option>
                                                                <?php }?>
                                                                <?php if($res[0]['contacttype'] == 5){ ?>
                                                                     <option value="5" selected>ค่าบริการ</option>
                                                                <?php } else { ?>
                                                                     <option value="5">ค่าบริการ</option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>ระบบงาน <span class="text-danger">*</span></label> 
                                                            <select class="form-control" name="system" id="system">
                                                                <?php foreach ($system as $key => $value) {?>
                                                                    <option value = "<?php echo $value->systemcode; ?>" 
                                                                <?php
                                                                    if ($value->systemcode == $res[0]['system']){
                                                                        echo 'selected="selected"';
                                                                    } 
                                                                ?> >
                                                                <?php echo $value->systemname; ?> 
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label><b>มูลค่างาน(ไม่รวม Vat)</b></label>
                                                            <div class="input-group">
                                                                <input type="text" name="contactamount" class="form-control text-right" id="contactamount" value="<?=$res[0]['contactamount'];?>" readonly="">
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>ลดมูลค่า</label>
                                                            <div class="input-group">
                                                                <input type="text" name="decreamount" class="form-control text-right" id="decreamount" value="<?=$res[0]['disamount'];?>">
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>คงเหลือ</label>
                                                            <div class="input-group">
                                                                <input type="text" name="amt" class="form-control text-right" id="amt" value="<?=$res[0]['amtbal'];?>" >
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>ภาษี</label>
                                                            <div class="input-group">
                                                                <input type="text" name="vat" class="form-control text-right" id="vatper" value="<?php echo $res[0]['vatper'];?>">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>ส่วนลดพิเศษคิดแบบ</label>
                                                            <select class="form-control" name="discounttype" id="discounttype">
                                                                <option value="1">Some item</option>
                                                                <option value="2">Average all item</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">ส่วนลด</label>
                                                            <div class="input-group">
                                                                <input type="text" name="discount" class="form-control text-right" value="0" id="discount" readonly value="<?=$res[0]['discount'];?>">
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>หัก ณ ที่จ่าย <span class="text-danger">*</span></label>
                                                            <div class="form-group">
                                                                <select class="form-control" name="tax" id="tax">
                                                               
                                                                <?php foreach ($wt as $key => $value) {?>
                                                                    <option value = "<?php echo $value->id_wt; ?>" 
                                                                <?php
                                                                    if ($value->id_wt == $res[0]['tax']){
                                                                        echo 'selected="selected"';
                                                                    } 
                                                                ?> >
                                                                <?php echo $value->name_wt; ?> 
                                                                    </option>
                                                                <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">จำนวนที่รับวางบิลไปแล้ว</label>
                                                            <div class="input-group">
                                                                <input type="text" name="billing" class="form-control text-right" value="0" id="billing">
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <legend><h5 class="text-primary">เงื่อนไขการจ่ายเงิน</h5></legend>
                                            </div>
                                            <div class="col-md-3">
                                                <legend><h5 class="text-primary">การประกันผลงาน</h5></legend>
                                            </div>
                                            <div class="col-md-3">
                                                <legend><h5 class="text-primary">ระยะเวลาสัญญา</h5></legend>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">กำหนดจ่ายเงินเดือนละ</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" value="1" id="amonthper" name="amonthper" value="<?=$res[0]['paypermonth'];?>">
                                                                <span class="input-group-addon">งวด</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">แต่ละงวดชำระภายใน</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" id="peridate" name="peridate" value="<?php echo $res[0]['peridate'];?>">
                                                                <span class="input-group-addon">วัน</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">หลังจาก</label>
                                                            <select class="form-control" name="typepay" id="typepay">
                                                                <?php if($res[0]['typepay'] == '1'){ ?>
                                                                    <option value="1" selected>วันส่งมอบ</option>
                                                                <?php } else { ?>
                                                                    <option value="1">วันส่งมอบ</option>
                                                                <?php }?>
                                                                <?php if($res[0]['typepay'] == '2'){ ?>
                                                                    <option value="2" selected>วันรับวางบิล</option>
                                                                <?php } else { ?>
                                                                    <option value="2">วันรับวางบิล</option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">จ่ายเป็น</label>
                                                            <select name="paymentcondition" id="paymentcondition" class="form-control">
                                                          

                                                            
                                                            <?php foreach ($piad as $key => $value) {?>
                                                                    <option value = "<?php echo $value->id; ?>" 
                                                                <?php
                                                                    if ($value->id == $res[0]['paymentcondition']){
                                                                        echo 'selected="selected"';
                                                                    } 
                                                                ?> >
                                                                <?php echo $value->name; ?> 
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">ระยะเวลาประกันผลงาน</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" name="retentionduration" id="retentionduration" value="<?php echo $res[0]['retentionp'];?>">
                                                                <span class="input-group-addon">วัน</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="">หักเงินประกันผลงาน</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control text-right" name="retentionper" id="retentionper" value="<?php echo $res[0]['retentionper'];?>">
                                                                    <span class="input-group-addon">%</span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">เริ่มตั้งแต่ <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="datestart" id="datestart" value="<?= $res[0]['start_contact']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">เริ่มตั้งแต่ <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="dateend" id="dateend" value="<?= $res[0]['stop_contact']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">เงินล่วงหน้า</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" name="advance" id="advance" value="<?php echo $res[0]['advance'];?>">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">ชำระภายใน</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="paydate" id="paydate" value="<?php echo $res[0]['paywithin'];?>">
                                                                <span class="input-group-addon">วัน</span> 
                                                            </div>
                                                            <span class="has-success help-block">เมื่อลงนามในสัญญา</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">คำประกัน</label>
                                                        <select class="form-control" name="typepaid" id="typepaid">
                                                                <?php if($res[0]['guarantee_type'] == '3'){ ?>
                                                                    <option value="3" selected>ไม่มีการวางค้ำประกัน</option>
                                                                <?php } else { ?>
                                                                    <option value="3">ไม่มีการวางค้ำประกัน</option>
                                                                <?php }?>
                                                                <?php if($res[0]['guarantee_type'] == '1'){ ?>
                                                                    <option value="1" selected>โดยใช้เช็ควางค้ำประกันจนหักคืนครบ</option>
                                                                <?php } else { ?>
                                                                    <option value="1">โดยใช้เช็ควางค้ำประกันจนหักคืนครบ</option>
                                                                <?php }?>
                                                                <?php if($res[0]['guarantee_type'] == '2'){ ?>
                                                                    <option value="2" selected>โดยใช้ Bank Garantee วางค้ำประกันจนหักคืนครบ</option>
                                                                <?php } else { ?>
                                                                    <option value="2">โดยใช้ Bank Garantee วางค้ำประกันจนหักคืนครบ</option>
                                                                <?php }?>
                                                        </select>
                                                    </div>
                                                   
                                                </div>
                                                <div class="row">
                                                    <!-- <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">เงินงวดสัญญา</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" name="Period" id="Period" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">การจ่ายเงิน</label>
                                                            <select class="form-control" name="paytype" id="paytype">
                                                                <?php if($res[0]['period_type'] == '1'){ ?>
                                                                    <option value="1" selected>จ่ายเมื่อติดตั้งแล้วเสร็จ</option>
                                                                <?php } else { ?>
                                                                    <option value="1">จ่ายเมื่อติดตั้งแล้วเสร็จ</option>
                                                                <?php }?>
                                                                <?php if($res[0]['period_type'] == '2'){ ?>
                                                                    <option value="2" selected>จ่ายเมื่อส่งของแล้วเสร็จ</option>
                                                                <?php } else { ?>
                                                                    <option value="2">จ่ายเมื่อส่งของแล้วเสร็จ</option>
                                                                <?php }?>
                                                                <?php if($res[0]['period_type'] == '3'){ ?>
                                                                    <option value="3" selected>จ่ายตามความก้าวหน้าของงาน</option>
                                                                <?php } else { ?>
                                                                    <option value="3">จ่ายตามความก้าวหน้าของงาน</option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">หักเงินประกันผลงาน</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" name="retentionamt" id="retentionamt" value="<?php echo $res[0]['retention'];?>">
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">หักอื่นๆ</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control text-right" name="lessotheramt" id="lessotheramt" value="<?php echo $res[0]['less_other'];?>">
                                                                <span class="input-group-addon">บาท</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">คำนวณการหักเงินประกันผลงาน</label>
                                                            <select class="form-control" name="calretention" id="calretention">
                                                                <?php if($res[0]['retentionmethod'] == '1'){ ?>
                                                                    <option value="1" selected>ความก้าวหน้าของงาน</option>
                                                                <?php } else { ?>
                                                                    <option value="1">ความก้าวหน้าของงาน</option>
                                                                <?php }?>
                                                                <?php if($res[0]['retentionmethod'] == '2'){ ?>
                                                                    <option value="2" selected>ความก้าวหน้าของงาน + ภาษี</option>
                                                                <?php } else { ?>
                                                                    <option value="2">ความก้าวหน้าของงาน + ภาษี</option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="">อ้างอิงสัญญา</label>
                                                            <input type="text" class="form-control" name="refwo" id="refwo" value="<?php echo $res[0]['other'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <legend><h5 class="text-primary">รายละเอียดของงาน</h5></legend>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="loadpritem">
                                                <div class="table-responsive pre-scrollable">
                                                    <table class="table table-bordered table-hover table-xxs table-striped">
                                                        <thead>
                                                            <tr class="active">
                                                                <th class="text-center">Delete</th>
                                                                <th>No.</th>
                                                                <th>BOQ Type</th>
                                                                <th><div style="width: 150px;">Costcode</div></th>
                                                                <th><div style="width: 150px;"> Mat. Code</th>
                                                                <th><div style="width: 250px;">Material Name</th>
                                                                <!-- <th><div style="width: 150px;">Asset Code</th> -->
                                                                <th><div style="width: 100px;">QTY</th>
                                                                <th><div style="width: 100px;">Unit Code</th>
                                                                <th><div style="width: 100px;">Unit Name</th>
                                                                <th><div style="width: 100px;">Price/Unit</th>
                                                                <th><div style="width: 100px;">Amount Before</th>
                                                                <th><div style="width: 100px;">% Disc. 1</th>
                                                                <th><div style="width: 100px;">Disc. amt 1</th>
                                                                <th><div style="width: 100px;">% Disc. 2</th>
                                                                <th><div style="width: 100px;">Disc. amt 2</th>
                                                                <th><div style="width: 150px;">Special Discount</th>
                                                                <th><div style="width: 100px;">Amount</th>
                                                                <th><div style="width: 100px;">Peroid</th>
                                                                <th><div style="width: 150px;">PR No,.</th>
                                                                <th><div style="width: 250px;">Discription</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="trrow">
                                                            <?php $totalamt=0; $i=1; foreach ($resi as $key => $value) {
                                                                $disamt1 = ($value->lo_price*$value->lo_disper)/100;
                                                                $disamt2 = ($disamt1*$value->lo_disper2)/100;
                                                                $netamt = (($value->lo_price-$disamt1)-$disamt2)-$value->lo_disamt;
                                                            ?>
                                                            <tr id="<?= $i;?>">
                                                                <td class="text-center">
                                                                    <ul class="icons-list">
                                                                        <li><a id="delete<?= $i; ?>"><i class="icon-trash"></i></a></li>
                                                                    </ul>
                                                                </td>
                                                                <td><?= $i; ?></td>
                                                                <td>
                                                                    <?php if($value->boq_type=='2'){echo '<label class="label label-warning">Labor</label>';}else{echo '<label class="label label-warning">Not Select BOQ</label>';}?>
                                                                    <input type="hidden" name="boq_type[]" value="<?php echo $value->boq_type;?>">
                                                                </td>
                                                                <td>
                                                                    <div class="input-group input-group-xs">
                                                                        <input class="form-control input-xs" type="text" name="costcode[]" id="codecostcode<?=$i;?>" value="<?=$value->lo_costcode;?>">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="costcode<?=$i;?> btn btn-default" data-toggle="modal" data-target="#costcode<?=$i;?>"><i class="icon-search4"></i></button>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group input-group-xs">
                                                                        <input class="form-control input-xs" type="text" name="matcode[]" id="newmatcode<?=$i;?>" value="<?=$value->lo_matcode;?>" readonly>
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="openund<?=$i;?> btn btn-default" data-toggle="modal" data-target="#opnewmattt<?=$i;?>"><i class="icon-search4"></i></button>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs" type="text" name="matname[]" id="newmatname<?=$i;?>" value="<?=$value->lo_matname;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right qty" type="text" name="qty[]" id="qty<?=$i;?>" value="<?=$value->lo_qty;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right unitcode" type="text" name="unitcode[]" id="newunitcode<?=$i;?>" value="" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right unit" type="text" name="unit[]" id="unit<?=$i;?>" value="<?=$value->lo_unit;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right priceunit" type="text" name="priceunit[]" id="priceunit<?=$i;?>" value="<?=$value->lo_priceunit;?>">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right amtbefor" type="text" name="amtbefor[]" id="amtbefor<?=$i;?>" value="<?=$value->total_nat_amount;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right disone" type="text" name="disone[]" id="disone<?=$i;?>" value="<?=$value->lo_disper;?>">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right disoneamt" type="text" name="disoneamt[]" id="disoneamt<?=$i;?>" value="<?= $disamt1;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right distwo" type="text" name="distwo[]" id="distwo<?=$i;?>" value="<?= $value->lo_disper2;?>">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right distwoamt" type="text" name="distwoamt[]" id="distwoamt<?=$i;?>" value="<?= $disamt2;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right spedist" type="text" name="spedist[]" id="spedist<?=$i;?>" value="<?= $value->lo_disamt;?>">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right amt" type="text" name="amt[]" id="amt<?=$i;?>" value="<?= $netamt;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right period" type="text" name="perioditem[]" id="period<?=$i;?>" value="1" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs text-right lo_ref" type="text" name="lo_ref[]" id="lo_ref<?=$i;?>" value="<?= $value->lo_ref;?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control input-xs lo_remark" type="text" name="pri_remark[]" id="lo_remark<?=$i;?>" value="<?= $value->remark;?>">
                                                                    <input class="form-control input-xs prid" type="hidden" name="prid[]" id="prid<?=$i;?>" value="<?= $value->lo_idd;?>">
                                                                </td>
                                                            </tr>
                                                            <script>
                                                                //     $("#qty<?=$i;?>").keyup(function(){
                                                                //     var q = $("#qty<?=$i;?>").val();
                                                                //     var w = $("#priceunit<?=$i;?>").val();
                                                                //     var e = $("#disone<?=$i;?>").val();
                                                                //     var ew = $("#distwo<?=$i;?>").val();
                                                                //     var tw = $("#spedist<?=$i;?>").val();
                                                                //     var r = ((q*w)*e)/100;
                                                                //     var y = (q*w)-r;
                                                                //     var rw = (r*ew)/100;
                                                                //     var yrw = y-rw;
                                                                //     var tq = yrw-tw;
                                                                //     $("#amt<?=$i;?>").val(tq);
                                                                //     $("#contactamount").val(tq);
                                                                //     $("#amtbefor<?=$i;?>").val(q*w);
                                                                //     $("#disoneamt<?=$i;?>").val(r);
                                                                //     $("#distwoamt<?=$i;?>").val(rw);
                                                                //     $("#contactamount").val(tq);
                                                                //     $(".totsummary").val(tq);
                                                                //     var sumcer = 0; var amt = 0;
                                                                //     $('.amt').each(function() {
                                                                //             sumcer += ($(this).val()*1);
                                                                //     });
                                                                //     $("#contactamount").val(sumcer);
                                                                //     $(".totsummary").val(sumcer);
                                                                    
                                                                // });
                                                                $("#priceunit<?=$i;?>").keyup(function(){
                                                                    var q = $("#qty<?=$i;?>").val();
                                                                    var w = $("#priceunit<?=$i;?>").val();
                                                                    var e = $("#disone<?=$i;?>").val();
                                                                    var ew = $("#distwo<?=$i;?>").val();
                                                                    var tw = $("#spedist<?=$i;?>").val();
                                                                    var r = ((q*w)*e)/100;
                                                                    var y = (q*w)-r;
                                                                    var rw = (r*ew)/100;
                                                                    var yrw = y-rw;
                                                                    var tq = yrw-tw;
                                                                    $("#amt<?=$i;?>").val(tq);
                                                                    $("#contactamount").val(tq);
                                                                    $("#amtbefor<?=$i;?>").val(q*w);
                                                                    $("#disoneamt<?=$i;?>").val(r);
                                                                    $("#distwoamt<?=$i;?>").val(rw);
                                                                    $("#contactamount").val(tq);
                                                                    $(".totsummary").val(tq);
                                                                    var sumcer = 0; var amt = 0;
                                                                    $('.amt').each(function() {
                                                                            sumcer += ($(this).val()*1);
                                                                    });
                                                                    $("#contactamount").val(sumcer);
                                                                    $(".totsummary").val(sumcer);
                                                                });
                                                                $("#disone<?=$i;?>").keyup(function(){
                                                                    var q = $("#qty<?=$i;?>").val();
                                                                    var w = $("#priceunit<?=$i;?>").val();
                                                                    var e = $("#disone<?=$i;?>").val();
                                                                    var ew = $("#distwo<?=$i;?>").val();
                                                                    var tw = $("#spedist<?=$i;?>").val();
                                                                    var r = ((q*w)*e)/100;
                                                                    var y = (q*w)-r;
                                                                    var rw = (r*ew)/100;
                                                                    var yrw = y-rw;
                                                                    var tq = yrw-tw;
                                                                    $("#amt<?=$i;?>").val(tq);
                                                                    $("#contactamount").val(tq);
                                                                    $("#amtbefor<?=$i;?>").val(q*w);
                                                                    $("#disoneamt<?=$i;?>").val(r);
                                                                    $("#distwoamt<?=$i;?>").val(rw);
                                                                    $("#contactamount").val(tq);
                                                                    $(".totsummary").val(tq);
                                                                    var sumcer = 0; var amt = 0;
                                                                    $('.amt').each(function() {
                                                                            sumcer += ($(this).val()*1);
                                                                    });
                                                                    $("#contactamount").val(sumcer);
                                                                    $(".totsummary").val(sumcer);
                                                                });
                                                                $("#distwo<?=$i;?>").keyup(function(){
                                                                    var q = $("#qty<?=$i;?>").val();
                                                                    var w = $("#priceunit<?=$i;?>").val();
                                                                    var e = $("#disone<?=$i;?>").val();
                                                                    var ew = $("#distwo<?=$i;?>").val();
                                                                    var tw = $("#spedist<?=$i;?>").val();
                                                                    var r = ((q*w)*e)/100;
                                                                    var y = (q*w)-r;
                                                                    var rw = (r*ew)/100;
                                                                    var yrw = y-rw;
                                                                    var tq = yrw-tw;
                                                                    $("#amt<?=$i;?>").val(tq);
                                                                    $("#contactamount").val(tq);
                                                                    $("#amtbefor<?=$i;?>").val(q*w);
                                                                    $("#disoneamt<?=$i;?>").val(r);
                                                                    $("#distwoamt<?=$i;?>").val(rw);
                                                                    $("#contactamount").val(tq);
                                                                    $(".totsummary").val(tq);
                                                                    var sumcer = 0; var amt = 0;
                                                                    $('.amt').each(function() {
                                                                            sumcer += ($(this).val()*1);
                                                                    });
                                                                    $("#contactamount").val(sumcer);
                                                                    $(".totsummary").val(sumcer);
                                                                });
                                                                $("#spedist<?=$i;?>").keyup(function(){
                                                                    var q = $("#qty<?=$i;?>").val();
                                                                    var w = $("#priceunit<?=$i;?>").val();
                                                                    var e = $("#disone<?=$i;?>").val();
                                                                    var ew = $("#distwo<?=$i;?>").val();
                                                                    var tw = $("#spedist<?=$i;?>").val();
                                                                    var r = ((q*w)*e)/100;
                                                                    var y = (q*w)-r;
                                                                    var rw = (r*ew)/100;
                                                                    var yrw = y-rw;
                                                                    var tq = yrw-tw;
                                                                    $("#amt<?=$i;?>").val(tq);
                                                                    $("#contactamount").val(tq);
                                                                    $("#amtbefor<?=$i;?>").val(q*w);
                                                                    $("#disoneamt<?=$i;?>").val(r);
                                                                    $("#distwoamt<?=$i;?>").val(rw);
                                                                    $("#contactamount").val(tq);
                                                                    $(".totsummary").val(tq);
                                                                    var sumcer = 0; var amt = 0;
                                                                    $('.amt').each(function() {
                                                                            sumcer += ($(this).val()*1);
                                                                    });
                                                                    $("#contactamount").val(sumcer);
                                                                    $(".totsummary").val(sumcer);
                                                                });
                                                            </script>
                                                            <?php  $i++; $totalamt+=$netamt; } ?>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="15" class="text-center">Total Summary</td>
                                                                <td class="text-right"><input type="text" class="form-control input-xs text-right totsummary" readonly value="<?=$totalamt;?>"></td>
                                                                <td clospan="2"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="tab-pane has-padding" id="PO2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <legend><h5 class="text-primary">เงื่อนไขอื่นๆที่ต้องการแจ้งระบุในสัญญา</h5></legend>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3"></div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">1: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark1" id="remark1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">2: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark2" id="remark2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">3: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark3" id="remark3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">4: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark4" id="remark4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">5: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark5" id="remark5">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">6: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark6" id="remark6">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">7: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark7" id="remark7">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">8: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark8" id="remark8">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">9: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark9" id="remark9">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-horizontal">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-1 control-label">10: <span class="text-danger">*</span></label>
                                                    <div class="col-lg-11">
                                                        <input type="text" class="form-control" placeholder="" name="remark10" id="remark10">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="a_wo" id="a_wo" value="<?php echo $pj[0]['a_wo']; ?>">
                                        <input type="text" class="form-control" name="flagedit" id="flagedit" value="edit">
                                    </div>
                                    <div class="tab-pane has-padding" id="PO3">
                                        <div class="content">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <button class="label label-primary" type="button" id="addprogress"><i class="icon-plus22"></i> เพิ่มงวดงาน</button>
                                                    </div>
                                                </div>
                                                <div class="table-reponsive">
                                                    <div class="panel-group panel-group-control panel-group-control-right content-group-lg">
                                                        <div id="pjprogress">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <script>
                                            $("#addprogress").click(function(){
                                                addprogressrow();
                                            });
                                            function addprogressrow(){
                                                var row = ($('#pjprogress div h6').length-0)+1;
                                            var rowa = ($("#work"+row+" h5").length-0)+1;
                                                var tr = '<div class="panel panel-white">'+
                                                            '<div class="panel-heading">'+
                                                                '<h6 class="panel-title">'+
                                                                    '<a data-toggle="collapse" data-toggle="collapse" href="#collapsible-control-right-group'+row+'">งวดที่ #'+row+'</a>'+
                                                                '</h6>'+
                                                            '</div>'+
                                                            '<div id="collapsible-control-right-group'+row+'" class="panel-collapse collapse">'+
                                                                '<div class="panel-body">'+
                                                                    '<button type="button" class="label label-info" id="addwork'+row+'"><i class="icon-plus22"></i> เพิ่มงาน</button>'+
                                                                    '<div id="work'+row+'">'+
                                                                    '<table class="table table-bordered table-xxs table-striped table-hover">'+
                                                                        '<thead>'+
                                                                            '<tr>'+
                                                                                '<th>ชื่อกิจกรรม</th>'+
                                                                                '<th>Weight</th>'+
                                                                                '<th>Workday</th>'+
                                                                                '<th>วันที่ตามแผนงาน</th>'+
                                                                                '<th>%งาน</th>'+
                                                                                '<th>วันที่เสร็จจริง</th>'+
                                                                                '<th>วันที่เบิก</th>'+
                                                                            '</tr>'+
                                                                        '</thead>'+
                                                                        '<tbody id="trrow'+row+'">'+
                                                                            '<tr>'+
                                                                            '</tr>'+
                                                                        '</tbody>'+
                                                                    '</table>'+
                                                                    
                                                                    '</div>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '<script>'+
                                                    '$("#addwork'+row+'").click(function(){'+
                                                            'var work =  "<tr id='+row+'>"+'+
                                                                            '"<td><input class='+"form-control input-sm"+'/></td>"+'+
                                                                            '"<td><input class='+"form-control input-sm"+'/></td>"+'+
                                                                            '"<td><input type='+"date"+' class='+"form-control input-sm"+'/></td>"+'+
                                                                            '"<td><input type='+"date"+' class='+"form-control input-sm"+'/></td>"+'+
                                                                            '"<td><input class='+"form-control input-sm"+'/></td>"+'+
                                                                            '"<td><input type='+"date"+' class='+"form-control input-sm"+'/></td>"+'+
                                                                            '"<td><input type='+"date"+' class='+"form-control input-sm"+'/></td>"+'+
                                                                        '"</tr>";'+
                                                            '$("#trrow'+row+'").append(work);'+
                                                        '});'+
                                                    '<\/script>' ;
                                                $('#pjprogress').append(tr); 
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                         <br>
                            <div class="text-right">
                                <a id="refesh" class="btn btn-default btn-xs"><i class="icon-plus22"></i> New</a>
                                <a data-toggle="modal" id="inst" class="btn btn-default btn-xs"><i class="icon-stackoverflow"></i> ADD Rows</a>
                                <button type="button" id="savee" class="save btn bg-success btn-xs"><i class="icon-floppy-disk position-left"></i>Save</button>
                                <button type="button" id="print" class="print btn bg-primary btn-xs"><i class="icon-printer4 position-left"></i>Print</button>
                                <a href="<?php echo base_url();?>contract/newcontract" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                            </div>
                                <br>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="openpr" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Select PR </h6>
            </div>

            <div class="modal-body">
                <div id="prprdetail"></div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 <div class="modal fade" id="openvender">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                <h4 class="modal-title" id="myModalLabel">ผู้รับจ้างช่วง / บริษัท</h4>
            </div>
            <div class="modal-body">
                <div id="loadvender">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#lessotheramt").change(function(){
        var total = parseFloat($(".totsummary").val());
        var lass = parseFloat($("#lessotheramt").val());
        var amt = parseFloat(total-lass);
        $("#contactamount").val(amt);
    });
    $("#retentionper").change(function(){
       _retencout();
    });
    $(".openvender").click(function(){
        $("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#loadvender").load('<?php echo base_url();?>share/vender_f');
    });
    $("#discounttype").change(function(){
        if ($("#discounttype").val()==1) {
            $("#discount").prop("readonly",true);
        }else{
            $("#discount").prop("readonly",false);
        }
    });
    $("#discount").keyup(function(){
        var s2 = parseFloat($('#discount').val());
        var tot = parseFloat($('#contactamount').val());
        if(s2 > tot){
            alert('ยอดส่วนลดมากกว่ายอดสั่งจ้างทั้งหมด');
            $('#discount').focus();
        }else{
            var _count = ($("#trrow tr").length - 0);
            console.log(_count);
            
            console.log(s2);
            for (var i = 1; i <= _count; i++) {
                console.log(_count);
                var sum = 0;
                var zum2 = s2/_count;
                console.log(zum2);
                var q = $("#qty"+i).val();
                var w = $("#priceunit"+i).val();
                var e = $("#disone"+i).val();
                var ew = $("#distwo"+i).val();
                var tw = $("#spedist"+i).val();
                var r = ((q*w)*e)/100;
                var y = (q*w)-r;
                var rw = (r*ew)/100;
                var yrw = y-rw;
                console.log(yrw-zum2);
                $("#spedist"+i).val(parseFloat(zum2.toFixed(4).replace(/,/g, "")));
                $("#amt"+i).val(yrw-zum2);
                var totalsum = 0;
            $(".amt").each(function(){
                    if (!isNaN(this.value) && this.value.length != 0) {
                        totalsum += parseFloat(this.value);
                    }
            });
                $(".totsummary").val(totalsum);
                $("#contactamount").val(totalsum);
            }
            _retencout();
        }
    });
    function _retencout(){
        var total = parseFloat($(".totsummary").val());
        var reten = parseFloat($("#retentionper").val());
        var retemamt = ((total*reten)/100);
        $("#retentionamt").val(retemamt);
    }

    $(".openpr").click(function(){
        $('#prprdetail').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $('#prprdetail').load('<?php echo base_url();?>purchase/load_pr_wo/<?php echo $proid; ?>');
    });
</script>
<div id="costmodal"></div>
<div id="matmodal"></div>
<script>
    $('#inst').click(function(){
        addrow();
    });
    function addrow(){
        var pr_code = $("#pr_id_ref").val();
        $('td[class="text-left"]').closest('tr').remove();
        var row = ($('#trrow tr').length-0)+1;
        var rowr = row-1;
        var tr = '<tr id="'+row+'">'+
                '<td class="text-center">'+
                    '<ul class="icons-list">'+
                        '<li><a id="delete1"><i class="icon-trash"></i></a></li>'+
                    '</ul>'+
                '</td>'+
                '<td>'+row+'</td>'+
                '<td>'+
                    '<div class="input-group input-group-xs">'+
                        '<input class="form-control input-xs" type="text" name="costcode[]" id="codecostcode'+row+'">'+
                        '<span class="input-group-btn">'+
                            '<button type="button" class="costcode'+row+' btn btn-default" data-toggle="modal" data-target="#costcode'+row+'"><i class="icon-search4"></i></button>'+
                        '</span>'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<div class="input-group input-group-xs">'+
                        '<input class="form-control input-xs" type="text" name="matcode[]" id="newmatcode'+row+'" readonly>'+
                        '<span class="input-group-btn">'+
                            '<button type="button" class="openund'+row+' btn btn-default" data-toggle="modal" data-target="#opnewmattt'+row+'"><i class="icon-search4"></i></button>'+
                        '</span>'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs" type="text" name="matname[]" id="newmatname'+row+'" readonly>'+
                '</td>'+
                // '<td>'+
                //     '<div class="input-group input-group-xs">'+
                //         '<input class="form-control input-xs" type="text">'+
                //         '<span class="input-group-btn">'+
                //             '<button type="button" class="btn btn-default"><i class="icon-search4"></i></button>'+
                //         '</span>'+
                //     '</div>'+
                // '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right qty"  type="text" value="0.0000" id="qty'+row+'">'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs" type="text" name="unitcode[]" id="unitcode'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs" type="text" name="unit[]" id="unitname'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right priceunit" type="text" name="priceunit[]" value="0.0000" id="priceunit'+row+'">'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right amtbefor" type="text" value="0.0000" name="amtbefor[]" id="amtbefor'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right" type="text" value="0.0000" name="disone[]" id="disone'+row+'">'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right" type="text" value="0.0000" name="disoneamt[]" id="disoneamt'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right" type="text" value="0.0000" name="distwo[]" id="distwo'+row+'">'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right" type="text" value="0.0000" name="distwoamt[]" id="distwoamt'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right" type="text" value="0.0000" name="spedist[]" id="spedist'+row+'">'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right amt" type="text" value="0.0000" name="amt[]" id="amt'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right period" type="text" value="1" name="perioditem[]" id="period'+row+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs text-right" type="text" name="lo_ref[]" id="pr_ref'+row+'" value="'+pr_code+'" readonly>'+
                '</td>'+
                '<td>'+
                    '<input class="form-control input-xs" type="text" name="pri_remark[]">'+
                '</td>'+
                 '<input class="form-control input-xs" type="text" id="prid'+row+'" name="prid[]">'+
            '</tr>';
        $('#trrow').append(tr);
        $("#qty"+row).keyup(function(){
            var q = $("#qty"+row).val();
            var w = $("#priceunit"+row).val();
            var e = $("#disone"+row).val();
            var ew = $("#distwo"+row).val();
            var tw = $("#spedist"+row).val();
            var r = ((q*w)*e)/100;
            var y = (q*w)-r;
            var rw = (r*ew)/100;
            var yrw = y-rw;
            var tq = yrw-tw;
            $("#amt"+row).val(tq);
            $("#contactamount").val(tq);
            $("#amtbefor"+row).val(q*w);
            $("#disoneamt"+row).val(r);
            $("#distwoamt"+row).val(rw);
            $("#contactamount").val(tq);
            var sumcer = 0; var amt = 0;
            $('.amt').each(function() {
                    sumcer += ($(this).val()*1);
            });
            $("#contactamount").val(sumcer);
            $(".totsummary").val(sumcer);
        });
        $("#priceunit"+row).keyup(function(){
            var q = $("#qty"+row).val();
            var w = $("#priceunit"+row).val();
            var e = $("#disone"+row).val();
            var ew = $("#distwo"+row).val();
            var tw = $("#spedist"+row).val();
            var r = ((q*w)*e)/100;
            var y = (q*w)-r;
            var rw = (r*ew)/100;
            var yrw = y-rw;
            var tq = yrw-tw;
            $("#amt"+row).val(tq);
            $("#contactamount").val(tq);
            $("#amtbefor"+row).val(q*w);
            $("#disoneamt"+row).val(r);
            $("#distwoamt"+row).val(rw);
            $("#contactamount").val(tq);
            var sumcer = 0; var amt = 0;
            $('.amt').each(function() {
                    sumcer += ($(this).val()*1);
            });
            $("#contactamount").val(sumcer);
            $(".totsummary").val(sumcer);
        });
        $("#disone"+row).keyup(function(){
            var q = $("#qty"+row).val();
            var w = $("#priceunit"+row).val();
            var e = $("#disone"+row).val();
            var ew = $("#distwo"+row).val();
            var tw = $("#spedist"+row).val();
            var r = ((q*w)*e)/100;
            var y = (q*w)-r;
            var rw = (r*ew)/100;
            var yrw = y-rw;
            var tq = yrw-tw;
            $("#amt"+row).val(tq);
            $("#contactamount").val(tq);
            $("#amtbefor"+row).val(q*w);
            $("#disoneamt"+row).val(r);
            $("#distwoamt"+row).val(rw);
            $("#contactamount").val(tq);
            var sumcer = 0; var amt = 0;
            $('.amt').each(function() {
                    sumcer += ($(this).val()*1);
            });
            $("#contactamount").val(sumcer);
            $(".totsummary").val(sumcer);
        });
        $("#distwo"+row).keyup(function(){
            var q = $("#qty"+row).val();
            var w = $("#priceunit"+row).val();
            var e = $("#disone"+row).val();
            var ew = $("#distwo"+row).val();
            var tw = $("#spedist"+row).val();
            var r = ((q*w)*e)/100;
            var y = (q*w)-r;
            var rw = (r*ew)/100;
            var yrw = y-rw;
            var tq = yrw-tw;
            $("#amt"+row).val(tq);
            $("#contactamount").val(tq);
            $("#amtbefor"+row).val(q*w);
            $("#disoneamt"+row).val(r);
            $("#distwoamt"+row).val(rw);
            $("#contactamount").val(tq);
            var sumcer = 0; var amt = 0;
            $('.amt').each(function() {
                    sumcer += ($(this).val()*1);
            });
            $("#contactamount").val(sumcer);
            $(".totsummary").val(sumcer);
        });
        $("#spedist"+row).keyup(function(){
            var q = $("#qty"+row).val();
            var w = $("#priceunit"+row).val();
            var e = $("#disone"+row).val();
            var ew = $("#distwo"+row).val();
            var tw = $("#spedist"+row).val();
            var r = ((q*w)*e)/100;
            var y = (q*w)-r;
            var rw = (r*ew)/100;
            var yrw = y-rw;
            var tq = yrw-tw;
            $("#amt"+row).val(tq);
            $("#contactamount").val(tq);
            $("#amtbefor"+row).val(q*w);
            $("#disoneamt"+row).val(r);
            $("#distwoamt"+row).val(rw);
            $("#contactamount").val(tq);
            var sumcer = 0; var amt = 0;
            $('.amt').each(function() {
                    sumcer += ($(this).val()*1);
            });
            $("#contactamount").val(sumcer);
            $(".totsummary").val(sumcer);
        });
        
        
        var cost = '<div class="modal fade" id="costcode' + row + '" data-backdrop="false">' +
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
        $('#costmodal').append(cost);
        $(".costcode" + row + "").click(function() {
            $('#modal_costii' + row + '').html( "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
            $("#modal_costii" + row + "").load('<?php echo base_url(); ?>share/costcode_id/' + row);
        });
        var mat = '<div id="opnewmattt'+row+'" class="modal fade" data-backdrop="false">'+
                    '<div class="modal-dialog modal-full">'+
                        '<div class="modal-content ">'+
                            '<div class="modal-header">'+
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                '<h5 class="modal-title">เพิ่มรายการ'+row+'</h5>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row" id="modal_matdd'+row+'"></div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $('#matmodal').append(mat);
                $(".openund"+row+"").click(function(){
                    $("#modal_matdd"+row+"").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                    $("#modal_matdd"+row+"").load('<?php echo base_url(); ?>share/material_alone/'+row);
                });
    }
    $("#savee").click(function(){
        // $("#workorderport").submit();
        var frm = $('#workorderport');
        frm.submit(function (ev) {
        // $(".content").html('<div class="loading">Loading&#8230;</div>');
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                    success: function (data) {
                    swal({
                            title: ""+data,
                            text: "Save Completed!!.",
                            confirmButtonColor: "#66BB6A",
                            type: "success"
                        });
                    $("#lolono").val(data);
                    }
            });
            ev.preventDefault();
        });
        $("#workorderport").submit();
        $("#flagedit").val('edit');
    });
    $("#print").on('click',function(){
        var compcode = "<?php echo $compcode?>";
        var lono = $("#lolono").val();
        var projectid = $("#projectid").val();
        // window.location.href = "<?php echo base_url(); ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=wo_new.mrt&lono="+lono+"&system_id="+$("#system").val()+"&subcontact="+$("#venid").val()+"&compcode="+compcode+"";
        window.location.href = "<?php echo base_url(); ?>report/viewerload?type=wo&typ=form&var1="+lono+"&var2="+compcode+"&var3="+projectid;
    });
</script>