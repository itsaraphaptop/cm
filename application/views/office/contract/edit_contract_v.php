<style>
     .fieldset-success {
         border: 1px solid #40ff00;
         padding: 10px;
     }
     .fieldset-info {
         border: 1px solid #00bfff;
         padding: 10px;
     }
     .fieldset-worning {
         border: 1px solid #80ff00;
         padding: 10px;
     }
     .fieldset-default {
         border: 1px solid #80ff00;
         padding: 10px;
     }
</style>


<?php foreach ($res as $val) {
    $loid  = $val->lo_id;
    $lono = $val->lo_lono;
    $ref_quono = $val->refquono;
    $lo_date = $val->lodate;
    $quo_date = $val->quodate;
    $owner_name = $val->projownername;
    $contac_tor = $val->contactor;
    $sub_contact = $val->subcontact;
    $address_sub = $val->addresssub;
    $co_subcontact = $val->cosubcontact;
    $telsubcontact = $val->tel_subcontact;
    $faxsubcontact = $val->fax_subcontact;
    $checkdoc_1 = $val->checkdoc1;
    $checkdoc_2 = $val->checkdoc2;
    $at_tach = $val->attach;
    $contact_type = $val->contacttype;
    $sys_tem = $val->system;
    $contact_desc = $val->contactdesc;
    $contact_amount = $val->contactamount;
    $taxall = $val->tax;
    $adv_check = $val->advcheck;
    $adv_percent = $val->advpercent;
    $advcount = $val->adv_count;
    $otheradvance = $val->other_advance;
    $otheradvance1 = $val->other_advance1;
    $advper_contract = $val->advpercent;
    $reten = $val->retention;
    $retenbank = $val->retentionbank;
    // $main_reten = $val->mainreten;
    $aftersale = $val->after_sale;
    $man_ual = $val->manual;
    // $start_date = $val->startdate;
    // $stop_date = $val->stopdate;
    $perfines = $val->per_fines;
    $amount_a = $val->amount;
    $accordcontact = $val->accord_contact;
    $perdayother = $val->perday_other;
    $agree = $val->agreement;
    $projectcode = $val->projectcode;

    $project_name = $val->project_name;
    $other1 = $val->other;
    $other2 = $val->other_2;
    $other3 = $val->other_3;
    $other4 = $val->other4;
    $other5 = $val->other5;
    $other6 = $val->other6;
    $other7 = $val->other7;
    $other8 = $val->other8;
    $other9 = $val->other9;
    $other10 = $val->other10;
    $startcontact = $val->start_contact;
    $stopcontact = $val->stop_contact;
    $advance_ch = $val->advance;
    $advancee = $val->advancee;
    $retentionmethod = $val->retentionmethod;

    $retentionper = $val->retentionper;
    $retentionp = $val->retentionp;
    $advance1 = $val->advance1;
    $advancee1 = $val->advancee1;
    $vat = $val->vat;
    $otherpr1 = $val->otherpr1;
    $otherpr2 = $val->otherpr2;
    $otherpr3 = $val->otherpr3;
    $otherpr4 = $val->otherpr4;

    $unit = $val->unit;
    $unit1 = $val->unit1;
    $putput = $val->putput;
    $contact = $val->contact;
    $dpid = $val->dpid;
    $dpname = $val->dpname;
    
   
$qev = $this->db->query("select * from vender where vender_id='$val->subcontact'");
            $rven = $qev->result();
            foreach ($rven as $ue) {
        $sub_contactname = $ue->vender_name;
      }
} 


?>
<?php
  $flag = $this->uri->segment(4);
  $this->db->select('*');
  $this->db->from('project');
  $this->db->where('project_id',$projectcode);
  $boq = $this->db->get()->result();
  $bd_tenid = 0;
  $chkconbqq = 0;
  $controlbg = 0;

?>

<?php
    $this->db->select('*');       
    $this->db->where('boq_bd',$bd_tenid);
    $this->db->where('status',0);
    $priboqid = $this->db->get('boq_item')->result();
?>
<?php foreach ($boq as $eboq) {
  $chkconbqq = $eboq->chkconbqq;
  $controlbg = $eboq->controlbg;
  $bd_tenid = $eboq->bd_tenid;
  $chkconbqq = $eboq->chkconbqq;
  $project_code = $eboq->project_code;
  $c_wo = $eboq->c_wo;
  $a_wo = $eboq->a_wo;
}
?>
<?php foreach ($lo as $detail) { 
$id =  $detail->lo_idd;
  }?>

<?php
    $this->db->select('*');
    $this->db->where('lo_ref',$lono);
    $a = $this->db->get('lo_detail')->result();
    $sumlo=0;
    foreach ($a as $keya) {
      $sumlo = $sumlo+$keya->lo_price;
    }
?>
<div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="http://app.mekabase.com/index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ </h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="http://app.mekabase.com/index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="index.html"><i class="icon-home2 position-left"></i> ระบบใบสั่งซื้อ</a></li>
              <li>เพิ่มใบสั่งจ้างใหม่</li>
            </ul>

            <ul class="breadcrumb-elements">
              <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-gear position-left"></i>
                  Settings
                  <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                  <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                  <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
              </li>
            </ul>
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>

        <div class="content">
          <div class="panel panel-flat border-top-lg border-top-primary">
            <div class="panel-heading">
                            <h5 class="panel-title">ใบสั่งจ้างใหม่ &nbsp; <?php if($chkconbqq=="1"){ echo '<a class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</a>'; }else{ echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</a>'; }
                        ?>&nbsp; <?php if($controlbg=="2"){ echo '<a class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</a>'; }else{ echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</a>'; }
                        ?>
                           </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                </ul>
                            </div>
                        </div>

<div class="tabbable">
  <ul class="nav nav-tabs nav-tabs-highlight">
    <li class="active"><a href="#tab1" data-toggle="tab">ข้อมูลโครงการ</a></li>
    <li><a href="#tab2" data-toggle="tab">สัญญา</a></li>
    <li><a href="#tab3" data-toggle="tab">ค่าปรับ/ระยะเวลา</a></li>
  </ul>
</div>
  <form action="<?php echo base_url();?>index.php/contract_active/updateorder/<?php echo $lono; ?>/<?php echo $flag; ?>" method="post">
<input type="hidden" id="ckkcontrolbg" value="<?php echo $controlbg; ?>">
<div class="tab-content">
  <div class="tab-pane active" id="tab1">
    <div class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="form-row">
            <div class="col-md-6">
            <label for="lono">เลขที่ใบสั่งจ้าง</label>
            <input type="text" readonly="true" name="lolono" placeholder="กรอกเลขที่เอกสาร" value="<?php echo $lono; ?>" class="form-control" id="lolono">
            </div>
            <div class="col-md-6">
              <label for="lodate">วันที่เอกสาร</label>
              <input type="date" name="lodate" placeholder="กรอกวันที่เอกสาร" value="<?php echo $lo_date; ?>" class="form-control daterange-single" id="lodate">
            </div>

          <div class="col-md-12">
            <label for="project">โครงการ/แผนก</label>
            <div class="form-group">
              <input type="text" name="project" readonly="true" value="<?php echo $project_name; ?>"  class="form-control  input-md" id="projectname">
              <input type="hidden" name="projectid" readonly="true" value="<?php echo $projectcode; ?>" class="form-control input-sm"  id="projectid">
             <!--  <span class="input-group-btn">
                <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon "><i class="icon-search4"></i></button>
              </span> -->
            </div>
          </div>
          <div class="col-md-12">

              <div class="form-group">
                 <label for="project">ชื่อแผนก</label>
                 <input type="text" class="form-control" readonly="readonly" placeholder="Department" value="<?php echo $dpname; ?>" name="depname" id="depname">
                <input type="hidden" readonly="true" value="<?php echo $dpid; ?>" class="form-control" name="depid" id="depid">
                              </div>
                

              </div>

          <div class="col-md-12">
              <label for="project">ชื่อเจ้าของโครงการ</label>
              <input type="text" name="ownername" readonly="true" value="<?php echo $owner_name; ?>" placeholder="ชื่อเจ้าของโครงการ" class="form-control" id="ownername">
          </div>

          <div class="col-md-12">
              <div class="form-group">
              <label for="project">ชื่อผู้รับเหมาหลัก</label>
                <input type="text" name="contactor" readonly="true" placeholder="ชื่อผู้รับเหมาหลัก" class="form-control" value="<?php echo $contac_tor; ?>" id="contactor">
              </div>
            </div>

            <div class="col-md-12">
             <label>เอกสารแนบประกอบ :</label>
               <div class="form-group">
               <?php  if ($checkdoc_1=='1') {?>
               <label class="checkbox-inline"><input type="checkbox" checked name="checkdoc1" id="checkdoc1">รายการแบบและสเปคอ้างอิง  </label>
               <input  type="hidden" name="checkdoc_1" placeholder="checkbox" value="<?php echo $checkdoc_1; ?>" class="form-control input-sm" id="checkdoc_1">
              <?php }else{ ?>
                 <label class="checkbox-inline"><input type="checkbox" name="checkdoc1" id="checkdoc1">รายการแบบและสเปคอ้างอิง  </label>
                  <input  type="hidden" name="checkdoc_1" placeholder="checkbox" class="form-control input-sm" id="checkdoc_1">
              <?php } ?>
               <?php  if ($checkdoc_2=='1') {?>
               <label class="checkbox-inline"><input type="checkbox" checked name="checkdoc2" id="checkdoc2">ใบเสนอราคา</label>
               <input  type="hidden" name="checkdoc_2" placeholder="checkbox" value="<?php echo $checkdoc_2; ?>" class="form-control input-sm" id="checkdoc_2">
              <?php }else{ ?>
                 <label class="checkbox-inline"><input type="checkbox" name="checkdoc2" id="checkdoc2">ใบเสนอราคา</label>
                   <input  type="hidden" name="checkdoc_2" placeholder="checkbox" class="form-control input-sm" id="checkdoc_2">
              <?php } ?>
                 </div>

             </div>
            <div class="col-md-12">
              <label>อ้างอิงสัญญา :</label>
              <div class="input-group">
                <div class="radio">
                  <label><input type="radio" class="styled" name="otherpr1" id="otherpr1" value="Y" <?php if ($otherpr1=='Y') { echo 'checked'; } ?>>มี</label>
                </div>
                
                <?php if($otherpr1=='Y'){
                echo '<div id="showpr">
                  <input type="text" class="form-control input-sm" name="otherpr2" value="'.$otherpr2.'">
                  <input type="text" class="form-control input-sm" name="otherpr3" value="'.$otherpr3.'">
                  <input type="text" class="form-control input-sm" name="otherpr4" value="'.$otherpr4.'">
                </div>';
                }
                ?>
                
                <script>
                $('#otherpr1').click(function() {
                $('#showpr').toggle();
                });
                </script>
                <div class="radio">
                  <label><input type="radio" class="styled" name="otherpr1" id="otherpr" value="X" <?php if ($otherpr1=='X') { echo 'checked'; } ?>>ไม่มี</label>
                </div>
                
                
              </div>
            </div>

          </div>
        </div>
      <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-6">
              <label for="refquono">อ้างอิงใบเสนอราคาเลขที่</label>
              <input type="text" name="refquono" placeholder="กรอกอ้างอิงใบเสนอราคาเลขที่" value="<?php echo $ref_quono; ?>" class="form-control" id="refquono">
            </div>
            <div class="col-md-6">
              <label for="quodate">วันที่ใบเสนอราคา</label>
              <input type="date" name="quodate" placeholder="กรอกวันที่ใบเสนอราคา" value="<?php echo $quo_date; ?>" class="form-control daterange-single" id="quodate">
            </div>

            <div class="col-md-12">
            <label for="project">ชื่อผู้รับจ้างช่วง / บริษัท</label>
              <input type="text" name="subcontact" value="<?php echo $sub_contactname; ?>" placeholder="ชื่อ หรือ บริษัท"  class="form-control " id="subcontact">
              <input type="hidden" name="venderid" id="venderid" class="form-control" value="<?= $sub_contact ?>" >
            </div>

            <div class="col-md-12">
              <div class="form-group">
              <label for="project">ที่อยู่ผู้รับจ้างช่วง</label>
                <input type="text" value="<?php echo $address_sub; ?>" name="addresssub" placeholder="ที่อยู่ผู้รับจ้างช่วง"  class="form-control" id="addresssub">
              </div>
            </div>
    
            <div class="col-md-12">
              <div class="form-group">
              <label for="project">ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน</label>
                <input type="text" name="cosubcontact" placeholder="ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน"  value="<?php echo $co_subcontact; ?>" class="form-control" id="cosubcontact">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tel.</label>
                <input type="text" name="telsubcontact" placeholder="กรอกหมายเลขโทรศัพท์"  value="<?php echo $telsubcontact; ?>" class="form-control" id="telsubcontact">
              </div>
            </div>
            <div class="col-md-6">
              <label for="">Fax.</label>
              <div class="form-group">
                <input type="text" name="faxsubcontact" value="<?php echo $faxsubcontact; ?>" placeholder="กรอกหมายเลข Fax" class="form-control" id="faxsubcontact">
              </div>
            </div>

            <div class="col-md-12">
             <label>เอกสารแนบอื่นๆ :</label>
              <div class="form-group">
                <input type="text" value="<?php echo $at_tach; ?>"  placeholder="เอกสารแนบอื่นๆ" class="form-control input-sm" name="attach" id="attach">
              </div>
            </div>

          </div>
        </div>
        </div>




      </div>
    </div>
    <div class="tab-pane" id="tab2">
      <div class="content">
        <div class="row">
          <div class="col-md-6">
          <legend><h4> ลักษณะสัญญา</h4></legend>
            <div class="col-md-6">
              <label>เป็นสัญญา :</label>
              <div class="form-group">
                <select class="form-control" name="contacttype" value="<?php echo $contact_type; ?>" id="contacttype">
                  <?php if($contact_type == '1'){ ?><option value="1" selected>ค่าแรง</option><?php } else { ?><option value="1">ค่าแรง</option><?php }?>
                  <?php if($contact_type == '2'){ ?><option value="2" selected>ค่าของ</option><?php } else { ?><option value="2">ค่าของ</option><?php }?>
                  <?php if($contact_type == '3'){ ?><option value="3" selected>ทั้งค่าแรงและค่าของ</option><?php } else { ?><option value="3">ทั้งค่าแรงและค่าของ</option><?php }?>
                  <?php if($contact_type == '4'){ ?><option value="4" selected>ค่าเช่า</option><?php } else { ?><option value="4">ค่าเช่า</option><?php }?>
                  <?php if($contact_type == '5'){ ?><option value="5" selected>ค่าบริการ</option><?php } else { ?><option value="5">ค่าบริการ</option><?php }?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <?php $dddd = $this->db->query("select * from system where systemcode = '$sys_tem'")->result();
              foreach ($dddd as $key) {
              $name = $key->systemname;
              }
              ?>
              <label>ระบบ :</label>
              <div class="form-group">
                <select class="form-control" name="system" value="<?php echo $sys_tem; ?>" id="system">
                  <option value="<?php echo $sys_tem; ?>"><?php echo $name; ?></option>
                  <?php $p = $this->db->query("select * from project where project_id = '$projectcode'")->result();
                  foreach ($p as $key => $aaaa) {
                  $projectcodee = $aaaa->project_code;
                  }
                  ?>
                  <?php
                  $q = $this->db->query("select * from project_item where project_code = '$projectcodee'")->result(); ?>
                  <?php foreach ($q as $key => $v) { ?>
                  
                  <?php $a = $this->db->query("select * from system where systemcode = '$v->projectd_job'")->result(); ?>
                  <?php foreach ($a as $key => $b) { ?>
                  
                  <?php if($sys_tem  == '$v->projectd_job'){ ?>
                  <option value="<?php echo $v->projectd_job; ?>" selected>
                  <?php echo $b->systemname; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $v->projectd_job; ?>"><?php echo $b->systemname; ?></option>
                  <?php }?>
                  <?php  }  ?>
                  <?php  }  ?>
                  
                  
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <label>ลักษณะงานที่จ้าง : </label>
              <div class="form-group">
                <textarea type="text" class="form-control input-sm"  rows="5" cols="10" placeholder="ลักษณะงานที่จ้าง" name="contactdesc" id="contactdesc"><?php echo $contact_desc; ?></textarea>
              </div>
            </div>


                 <legend><h4> เงื่อนไขการจ่ายเงิน </h4></legend>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="col-md-3 control-label">4.1 เงินล่วงหน้า </label>
                          <div class="col-md-3">
                            <div class="input-group">
                              <input type="text" class="form-control" name="advance" id="advance" value="<?php echo $advance_ch; ?>">
                              <span class="input-group-addon">%</span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input type="text" class="form-control" name="advancee" id="advancee" value="<?php echo $advancee; ?>">
                            </div>
                            <br>
                          </div>
                          <label class="col-md-3 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คืนเงินล่วงหน้า</label>
                          <div class="col-md-3">
                            <div class="input-group">
                              <input type="text" class="form-control" name="advance1" id="advance1" value="<?php echo $advance1; ?>">
                              <span class="input-group-addon">%</span>
                            </div>
                            
                          </div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input type="text" class="form-control" name="advancee1" id="advancee1" value="<?php echo $advancee1; ?>">
                            </div>
                            
                          </div>
                          <div class="col-md-3"></div>
                          <div class="col-md-4">
                            <div class="radio">
                              <label><input type="radio" class="styled" <?php if ($adv_check=='B') { echo 'checked'; } ?> name="advcheck" id="checkadv" value="B">BG  </label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" class="styled" <?php if ($adv_check=='C') { echo 'checked'; } ?> name="advcheck" id="checkadv" value="C">เช็คไม่ลงวันที่ </label>
                            </div>
                            <br>
                          </div>
                          <div class="form-group">
                            <div class="col-md-offset-3 col-md-7">
                              <input type="text" class="form-control" placeholder="กรอกเงื่อนไขการจ่ายเงิน" value="<?php echo $otheradvance; ?>" name="other_advance" id="other_advance">
                            </div>
                            <br>
                          </div>
                          <label class="col-md-3 control-label">4.2 เงินงวดสัญญา : </label>
                          <div class="col-md-6">
                            <div class="radio">
                              <label><input type="radio" class="styled" <?php if ($adv_percent=='1') { echo 'checked'; } ?> name="advper" id="advpercent" value="1">100% จ่ายตามความก้าวหน้าของงาน เดือนละ</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" class="styled" <?php if ($adv_percent=='2') { echo 'checked'; } ?> name="advper" id="advpercent" value="2">100% จ่ายเมื่อติดตั้งแล้วเสร็จ</label>
                            </div>
                            <input  type="hidden" name="advper_contract" placeholder="radio" value="<?php echo $advper_contract; ?>" class="form-control input-sm" id="advper_contract">
                          </div>
                          <div class="col-md-3">
                            <div class="radio">
                              <label><input type="radio" class="styled" <?php if ($advcount=='1') { echo 'checked'; } ?> name="adv_count" id="adv_quantity" value="1">1 ครั้ง</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" class="styled" <?php if ($advcount=='2') { echo 'checked'; } ?> name="adv_count" id="adv_quantity" value="2">2 ครั้ง</label>
                            </div>
                            
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-3 col-md-7">
                            <input type="text" class="form-control" placeholder="อื่นๆ" value="<?php echo $otheradvance1; ?>" name="other_advance1" id="other_advance1">
                            <br>
                          </div>
                        </div>

                        <label class="col-md-3 control-label">4.3 หักเงินประกันผลงาน :</label>

                       <div class="col-md-4">
                          <div class="input-group">                           
                            <input type="text" class="form-control" id="retentionper" name="retentionper" value="<?php echo $retentionper; ?>">
                            <span class="input-group-addon">%</span>
                          </div>
                        </div>

                         <div class="col-md-4">
                          <div class="input-group">             
                            <input type="text" class="form-control" id="retentionp" name="retentionp" value="<?php echo $retentionp; ?>">

                          </div>
                          <br>
                        </div>
                        <br/>
                        <div class="col-md-3"><label for="">Less Retention Method :</label></div>
                         <div class=" col-md-6">
                              <div class="form-group">
                                   <select class="form-control input-sm" name="retentionmethod" id="retentionmethod">
                                  <?php if($retentionmethod == '1'){ ?><option value="1" selected>Progress</option>
                                  <?php } else { ?><option value="1">Progress</option><?php }?>
                                  <?php if($retentionmethod == '2'){ ?><option value="2" selected>Progress + Vat</option><?php } else { ?><option value="2">Progress + Vat</option><?php }?>                    
                            </select>
                              </div>
                            </div>


                      </div>


          </div>
          <div class="col-md-6">
            <legend><h4> มูลค่าสัญญา</h4></legend>
            <div class="col-md-6">
              <label>มูลค่างาน (ไม่รวม Vat) :</label>
              <div class="input-group">
                <input type="text" name="contactamount" placeholder="00" value="<?php echo $contact_amount; ?>" class="form-control" id="contactamount" readonly>
                <span class="input-group-addon">บาท</span>
              </div>
            </div>
            <div class="col-sm-6">
              <label>Vat :</label>
              <div class="input-group">
                <input type="text" name="vat"  id="vat" placeholder="00" value="<?php echo $vat; ?>" class="form-control">
                <span class="input-group-addon">% </span>
              </div>
            </div>

            <div class="col-md-6">
             <label>หัก ณ ที่จ่าย :</label>
              <div class="form-group">
                     <select class="form-control" name="tax" id="tax" value="<?php echo $taxall; ?>">
                     <?php
                      $this->db->select('*');
                      $this->db->from('setupwt');
                      $this->db->where('id_wt',$taxall);
                      $data = $this->db->get()->result();
                      foreach ($data as $key => $datawt) {
                        
                  ?>
                    <option value="<?= $datawt->id_wt ?>"><?= $datawt->name_wt ?></option>
                  <?php
                      }
                  ?>

                   <?php
                      $this->db->select('*');
                      $this->db->from('setupwt');
                     
                      $data = $this->db->get()->result();
                      foreach ($data as $key => $datawt) {
                        
                  ?>
                    <option value="<?= $datawt->id_wt ?>"><?= $datawt->name_wt ?></option>
                  <?php
                      }
                  ?>
                  </select>
                 </div>
             </div>   
            </div>

             <div class="col-md-6">
                      <legend ><h4>การประกันผลงาน</h4></legend>
                      <div class="form-group">
                        <label class="col-md-4 control-label">5.1 ระยะเวลาประกันผลงาน</label>
                        <div class="col-md-8">
                              <div class="input-group">
                              <input type="text" class="form-control" value="<?php echo $reten; ?>" name="retention" id="retention" style="width: 100px;">
                                <select name="unit" class="form-control" style="width: 100px;">
                                <option value="<?php echo $unit ; ?>"><?php if($unit=='1'){
                                    echo "วัน";
                                  }else if($unit=='2'){

                                    echo "เดือน";
                                    }else if($unit=='3'){
                                      echo "ปี";
                                      } ?></option>
                                <option value="1">วัน</option>
                                <option value="2">เดือน</option>
                                <option value="3">ปี</option>
                              </select>
                          </div>
                            <div class="radio">
                              <label><input type="radio" class="styled" id="retentiontype"  <?php if ($retenbank=='B') { echo 'checked'; } ?> name="mainreten" value="B">BG</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" class="styled" id="retentiontype" <?php if ($retenbank=='C') { echo 'checked'; } ?> name="mainreten" value="C">เช็คไม่ลงวันที่</label>
                           </div>
                           
                           
                       </div>
                      </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">5.2 การบริการหลังการขาย</label>
                        <div class="col-md-8">
                              <div class="input-group">
                              <input type="text" class="form-control" placeholder="เดือน/ปี" value="<?php echo $aftersale; ?>" name="after_sale" id="after_sale" style="width: 100px;">
                              <select name="unit1" class="form-control" style="width: 100px;">
                                <option value="<?php echo $unit1; ?>"><?php if($unit1=='1'){
                                    echo "วัน";
                                  }else if($unit1=='2'){

                                    echo "เดือน";
                                    }else if($unit1=='3'){
                                      echo "ปี";
                                      } ?></option>
                                <option value="1">วัน</option>
                                <option value="2">เดือน</option>
                                <option value="3">ปี</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <br> <br> <br><br> <br> <br>
                    <div class="form-group">
                      <label class="col-md-4 control-label">5.3 คู่มือการดูแลรักษา</label>
                        <div class="col-md-8">
                              <div class="form-group">
                              <input type="text" class="form-control" placeholder="จำนวน/ชุด" value="<?php echo $man_ual; ?>" name="manual" id="manual">
                          </div>
                      </div>
                    </div>
                      
                      </div>
                    </div>




          </div>


        </div>

        <div class="tab-pane" id="tab3">
       <div class="content">
         <div class="row">
        <div class="col-md-6">
          <legend ><h4>ค่าปรับ</h4></legend>
          <div class="form-horizontal">
            <div class="form-group">
              <label class="col-md-2 control-label">7.1 ค่าปรับ %</label>
              <div class="col-md-2">
                <input type="text" class="form-control" placeholder="" value="<?php echo $perfines; ?>" name="per_fines" id="per_fines">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">7.2 ยอดเงิน</label>
              <div class="col-md-2">
                <input type="text" class="form-control" placeholder="00" value="<?php echo $amount_a; ?>" name="amount" id="amount">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label">7.3 อื่นๆ</label>
              <div class="col-md-6">
                 <input type="text" class="form-control" placeholder="" value="<?php echo $perdayother; ?>" name="perday_other" id="perday_other">
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-6">
          <legend><h4> ระยะเวลาการจ้าง</h4></legend>
            <div class="row">
              <div class="col-md-6">
                <label for="startdate">เริ่มตั้งแต่</label>
                   <input type="date" name="startdate" placeholder="" value="<?php echo $startcontact; ?>" class="form-control" id="startdate">
              </div>
              <div class="col-md-6">
                <label for="stopcontact">ถึงวันที่</label>
                  <input type="date" name="stopcontact" placeholder="" value="<?php echo $stopcontact; ?>" class="form-control" id="stopdate">
              </div>
              <div class="col-md-6">
                <br>
                <label for="stopcontact">ต้องการทำสัญญาคุมหรือไม่</label>
                <div class="input-group">
                  <div class="radio">
                    <label><input type="radio" class="styled" name="put" id="put" value="Y"  <?php if ($putput=='Y') { echo 'checked'; } ?>>ต้องการ</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" class="styled" name="put" id="put" value="N" <?php if ($putput=='N') { echo 'checked'; } ?>>ไม่ต้องการ</label>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <legend><h4> การเพิ่มลดของมูลค่าสัญญา</h4></legend>
          <div class="row">
            <div class="form-group">
              <label class="col-md-12 control-label">ผู้รับจ้างยอมรับว่าปริมาณงานอาจเพิ่มหรือลดลงจากการสั่งจ้างในครั้งนี้ สามารถยึดถือราคาเดิมได้ตลอดโครงการ</label>
            </div>
            <div class="form-group">
              <div class="col-md-1"></div>
              <div class="col-md-8">
                <div class="radio">
                  <label><input type="radio" class="styled" <?php if ($agree=='Y') { echo 'checked'; } ?> name="agreement" id="agreement" value="Y">ยอมรับ</label>
                </div>
                <div class="radio">
                  <label><input type="radio" class="styled" <?php if ($agree=='N') { echo 'checked'; } ?> name="agreement" id="agreement" value="N">ไม่ยอมรับ</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-md-6">
        <legend><h4> ข้อมูลอื่นๆที่ต้องการแจ้งระบุในสัญญา</h4></legend>
        <div class="row">
          <div class="form-group">
            <label class="col-md-2 control-label">1.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other1; ?>" name="other" id="other">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">2.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other2; ?>" name="other2" id="other2">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">3.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other3; ?>" name="other3" id="other3">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">4.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other4; ?>" name="other4" id="other4">
              </div>
            </div>
          </div>

                              <div class="form-group">
            <label class="col-md-2 control-label">5.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other5; ?>" name="other5" id="other5">
              </div>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-2 control-label">6.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other6; ?>" name="other6" id="other6">
              </div>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-2 control-label">7.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other7; ?>" name="other7" id="other7">
              </div>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-2 control-label">8.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other8; ?>" name="other8" id="other8">
              </div>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-2 control-label">9.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other9; ?>" name="other9" id="other9">
              </div>
            </div>
          </div>
                    <div class="form-group">
            <label class="col-md-2 control-label">10.</label>
            <div class="col-md-10">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="ระบุรายการเพิ่มเติม" value="<?php echo $other10; ?>" name="other10" id="other10">
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
       </div>
    </div>

    </div>



  

                  
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
</div> 
                            <div class="modal fade" id="openvender">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
                          </div>
                            <div class="modal-body">
                                <div id="tablevender">

                                </div>
                            </div>
                        </div>
                      </div>
                    </div> <!--end modal -->

                      <script>
    $(".openproj").click(function(){
    $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });

    $(".openvender").click(function(event) {
    $("#tablevender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#tablevender").load('<?php echo base_url(); ?>share/vender_f')
    });

    $(".openun").click(function(){
    var row = ($('#body tr').length-0)+1;
    $("#modal_mat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_mat").load('<?php echo base_url(); ?>share/getmatcode/'+row);
    });
    $(".modalcost").click(function(){
    $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
   });
    $("#modalunit").click(function(){
    $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
   });
    </script>
                        <br>
                        
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
                      $this->db->where('po_project',$projectcode);
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
                      $this->db->where('projectcode',$projectcode);
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
                      $this->db->where('project',$projectcode);
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
                      $this->db->where('project_id',$projectcode);
                      $this->db->where('cust_code',$bg->costcode);
                      $this->db->where('type_cost',"1");
                      $qscostgl = $this->db->get('gl_batch_details')->result();
                      $amtcr = 0;
                    foreach ($qscostgl as $cgl) {
                      $amtcr = $cgl->amtcr;
                      }


                      $this->db->select_sum('amtdr');
                      $this->db->where('project_id',$projectcode);
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
                      $this->db->where('po_project',$projectcode);
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
                      $this->db->where('projectcode',$projectcode);
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
                      $this->db->where('project',$projectcode);
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
                      $this->db->where('project_id',$projectcode);
                      $this->db->where('cust_code',$bg2->costcode);
                      $this->db->where('type_cost',"2");
                      $qscostgl2 = $this->db->get('gl_batch_details')->result();
                      $amtcr2 = 0;
                    foreach ($qscostgl2 as $cgl2) {
                      $amtcr2 = $cgl2->amtcr;
                      }


                      $this->db->select_sum('amtdr');
                      $this->db->where('project_id',$projectcode);
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
                      $this->db->where('po_project',$projectcode);
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
                      $this->db->where('projectcode',$projectcode);
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
                      $this->db->where('project',$projectcode);
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
                      $this->db->where('project_id',$projectcode);
                      $this->db->where('cust_code',$bg3->costcode);
                      $this->db->where('type_cost',"3");
                      $qscostgl3 = $this->db->get('gl_batch_details')->result();
                      $amtcr3 = 0;
                    foreach ($qscostgl3 as $cgl3) {
                      $amtcr3 = $cgl3->amtcr;
                      }


                      $this->db->select_sum('amtdr');
                      $this->db->where('project_id',$projectcode);
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

 <div class="modal-footer">
                        <div class="col-md-12">
                          <div class="form-group">
                          <a href="<?php echo base_url();?>index.php/report/contract_report/<?php echo $lono; ?>" class="preload btn btn-info" name="button"><i class="icon-shredder"></i> Print</a>
                            <button type="button" class="addrow btn btn-default btn-xs" data-toggle="modal" data-target="#insertrow"><i class="icon-stackoverflow"></i> ADD ROW</button>
                            <button id="saved" class="btn btn-success pull-right">
                            <i class="icon-floppy-disk position-left"></i> Save
                            </button >

                            </div>
                          </div>
                        
                        </div>

                        </form>   
                      <div class="table-responsive" id="table" style="overflow-x:auto;">
                         <table class="table table-bordered table-striped table-hover table-xxs" id="res">
                           <thead>
                            <tr>
                              <th>No.</th>
                              <th><div style="width: 250px;">Material Code</div></th>
                              <th><div style="width: 200px;">Material</div></th>
                              <th><div style="width: 150px;">Cost Code</div></th>
                              <th><div style="width: 75px;">Qty</div></th>
                              <th><div style="width: 100px;">Unit</div></th>
                              <th><div style="width: 150px;">Price/Unit</th>
                              <th><div style="width: 150px;">Amount</div></th>
                              <th><div style="width: 150px;">Disc.(%)</div></th>
                              <th><div style="width: 150px;">Disc.Amt</div></th>
                              <th><div style="width: 150px;">Total Disc</div></th>
                              <th><div style="width: 150px;">Total Vat</div></th>
                              <th><div style="width: 150px;">Total Net Amount</div></th>
                              <th></th>
                              <th></th>
                            </tr>
                           </thead>
                             
                           <tbody id="body">
                           <?php $i=1; foreach ($lo as $detail) { ?>
                           <tr>
                               <td><?php echo $i; ?>
                               <input type="hidden" name="loidd[]" id="lo_idd" value="<?php echo $detail->lo_idd; ?>">
                                <input type="hidden" name="chki[]" id="chki<?php echo $i; ?>" class="form-control btn-xs" value="x">

                                <input type="hidden" name="chki[]" id="type_cost<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $detail->type_cost; ?>">
                               </td>
                           
                               <td>
                                  <div class="input-group">
                                    <input type="text" name="matidi[]" id="lo_matcode<?php echo $i; ?>" readonly="true" class="form-control" value="<?php echo $detail->lo_matcode; ?>" >
                                    <span class="input-group-btn">
                                    <a data-toggle="modal" data-target="#edit_mat<?php echo $i; ?>" data-popup="tooltip" title="Edit" id="edit_btn<?php echo $i; ?>"  id="bgbd<?php echo $i; ?>'" class="openunn_<?php echo $i; ?> btn btn-default btn-icon"><i class="icon-search4"></i></a>
                                    <a class="btn btn-default btn-icon" id="remove<?php echo $detail->lo_idd; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a>
                                   </span>

                                    <!-- <input type="hidden" name="[]" id="matcodetext<?php echo $n;?>" value="<?php echo $detail->poi_matcode; ?>"> -->
                                    <!-- <input type="hidden" name="matnamei[]" id="matnametext<?php echo $n;?>" value="<?php echo $detail->poi_matname; ?>"> -->
                                  </div>

                                  <form action="<?php echo base_url();?>index.php/contract_active/edit_rowwo/<?php echo $detail->lo_idd; ?>/<?php echo $lono; ?>/<?php echo $flag; ?>" method="post">
                                  <div id="edit_mat<?php echo $i; ?>" class="modal fade" data-backdrop="false">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          
                                          <h5 class="modal-title">Edit WO Detail</h5>
                                        </div>
                                        <div class="modal-body">
                                          <input type="hidden" id="sumlo<?php echo $i; ?>" value="<?php echo $sumlo; ?>" name="sumlo" class="form-control input-sm">
                                          <div class="row">
                                            <div class="col-xs-6">
                                              <label for="">รายการซื้อ</label>
                                              <div class="input-group" id="error">
                                                <!--  <span class="input-group-addon">
                                                  <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                                                </span> -->
                                                <input type="text" id="newmatname<?php echo $i; ?>" value="<?php echo $detail->lo_matname; ?>" name="newmatnamei"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" readonly>
                                                <input type="text" id="newmatcode<?php echo $i; ?>" value="<?php echo $detail->lo_matcode; ?>" name="newmatcodei" placeholder="Material Code" class="form-control input-sm" readonly>
                                                <span class="input-group-btn" >
                                                  <a class="openund_edit<?php echo $i; ?> btn btn-primary " data-toggle="modal" data-target="#show_mat<?php echo $i; ?>"><span class="glyphicon glyphicon-search"></span></a>
                                                  <a class="openun_edit<?php echo $i; ?> btn btn-primary btn-block" data-toggle="modal" data-target="#opne_mat<?php echo $i; ?>"><span class="glyphicon glyphicon-search"></span></a>
                                                  
                                                </span>
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <label for="">รายการต้นทุน</label>
                                              <div class="input-group" id="errorcost">
                                                <input type="text" id="costnameint<?php echo $i; ?>" value="<?php echo $detail->lo_costname; ?>" name="costnameint" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                                <input type="text" id="codecostcodeint<?php echo $i; ?>" value="<?php echo $detail->lo_costcode; ?>" name="codecostcodeint" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                                
                                                <span class="input-group-btn" >
                                                  <?php if ($controlbg == "2") {
                                                  echo '<a class="btn btn-primary" id="selectcostcodeboq_edit'.$i.'" data-toggle="modal" data-target="#boq_edit'.$i.'"><span class="glyphicon glyphicon-search"></span></a>';
                                                  } else {
                                                  echo '<a class="modalcost_edit'.$i.' btn btn-primary" data-toggle="modal" data-target="#costcode_edit'.$i.'"><span class="glyphicon glyphicon-search"></span></a>';
                                                  }
                                                  ?>
                                                </span>
                                              </div>
                                            </div>
                                            
                                  </div>
                                    <div class="row">

                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Detail Of Materail</label>
                                                    <input type="text" id="remark_mat<?php echo $i; ?>" name="remark_mat" class="form-control input-sm" value="">
                                                    </div>
                                                  </div>

                                        <div class="col-md-3" id="type_costhide<?php echo $i; ?>" style="">
                                            <div class="form-group">
                                              <label>Type of Cost </label>
                                              <select name="type_cost" id="type_costt<?php echo $i; ?>" class="form-control input-sm">
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
                                        <div id="closebg<?php echo $i; ?>">
                                          <div class="row">
                                            <div class="col-md-2">
                                              <div class="form-group" id="errorcost">
                                                <label for="qty">ปริมาณ</label>
                                                <input type="text" id="pqty<?php echo $i; ?>" name="qty" value="<?php echo $detail->lo_qty; ?>"  placeholder="กรอกปริมาณ" class="form-control input-sm" >
                                              </div>
                                            </div>
                                            <div class="col-xs-2">
                                              <div class="input-group">
                                                <label for="unit">หน่วย</label>
                                                <input type="text" id="unit<?php echo $i; ?>" name="punit" value="<?php echo $detail->lo_unit; ?>" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">
                                                <span class="input-group-btn" >
                                                  <a class="show_unit<?php echo $i; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#show_unit_v<?php echo $i; ?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                                </span>
                                              </div>
                                            </div>
                                          
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="qty">แปลงค่า IC</label>
                                                <input type="number" id="cpqtyic<?php echo $i; ?>" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control input-sm" value="<?php echo $detail->cpqtyic; ?>">
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="qty">ปริมาณ IC</label>
                                                <input type="text" id="pqtyic<?php echo $i; ?>" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control input-sm" value="<?php echo $detail->pqtyic; ?>">
                                              </div>
                                            </div>
                                            <div class="col-xs-3">
                                              <div class="input-group">
                                                <label for="unit">หน่วย IC</label>
                                                <input type="text" id="punitic<?php echo $i; ?>" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="<?php echo $detail->lo_unitic; ?>" readonly="">
                                                <span class="input-group-btn" >
                                                  <a class="unitic_edit<?php echo $i; ?> btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic_edit<?php echo $i; ?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                          <script>
                                          $("#pqty<?php echo $i; ?>").keyup(function() {
                                          var xqty = ($("#pqty<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                          var cpqtyic = ($("#cpqtyic<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                          var price_unit = ($('#pprice_unit<?php echo $i; ?>').val().replace(/,/g,"")*1);
                                          var total_price = (price_unit*xqty);
                                          var xpq = xqty*cpqtyic;
                                          $('#pamount<?php echo $i; ?>').val(total_price);
                                          $("#pqtyic<?php echo $i; ?>").val(xpq);
                                          });
                                          $("#cpqtyic<?php echo $i; ?>").keyup(function() {
                                          var xqty = ($("#pqty<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                          var cpqtyic = $("#cpqtyic<?php echo $i; ?>");
                                          var xpq = xqty*cpqtyic;
                                          $("#pqtyic<?php echo $i; ?>").val(xpq);
                                          });
                                          </script>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="price_unit">ราคา/หน่วย</label>
                                                <input type="number" id="pprice_unit<?php echo $i; ?>"  name="price_unit" value="<?php echo $detail->lo_priceunit; ?>" placeholder="กรอกราคา/หน่วย" class="form-control input-sm border-danger border-lg" value="0">
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="amount">จำนวนเงิน</label>
                                                <input type="text" id="pamount<?php echo $i; ?>" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control input-sm" value="<?php echo $detail->lo_price; ?>">
                                              </div>
                                            </div>
                                          <script type="text/javascript">
                                          $('#pprice_unit<?php echo $i; ?>').keyup(function() {

                                            var price_unit = ($('#pprice_unit<?php echo $i; ?>').val().replace(/,/g,"")*1);
                                            var xqty = ($("#pqty<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                            var total_price = (price_unit*xqty);

                                            $('#pamount<?php echo $i; ?>').val(total_price);
                                          });
                                          </script> 
                                            
                                          </div>
                                          <div class="row">
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="endtproject">ส่วนลด 1 (%)</label>
                                                <input type='text' id="pdiscper1<?php echo $i; ?>" name="discountper1" placeholder="กรอกส่วนลด" class="form-control input-sm" value="<?php echo $detail->lo_disper; ?>"/>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="endtproject">ส่วนลด 2 (%)</label>
                                                <input type='text' id="pdiscper2<?php echo $i; ?>" name="discountper2" placeholder="กรอกส่วนลด" class="form-control input-sm" value="<?php echo $detail->lo_disper2; ?>" />
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="endtproject">ส่วนลด 3 (%)</label>
                                                <input type='text' id="pdiscper3<?php echo $i; ?>" name="discountper3" placeholder="กรอกส่วนลด" class="form-control input-sm" value="<?php echo $detail->lo_disper3; ?>"/>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="endtproject">ส่วนลด 4 (%)</label>
                                                <input type='text' id="pdiscper4<?php echo $i; ?>" name="discountper4" placeholder="กรอกส่วนลด" class="form-control input-sm" value="<?php echo $detail->lo_disper4; ?>" />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="endtproject">ส่วนลดพิเศษ</label>
                                                <input type='text' id="pdiscex<?php echo $i; ?>" name="pdiscex" class="form-control input-sm" value="<?php echo $detail->lo_disamt; ?>"/>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                                                <input type='text' id="pdisamt<?php echo $i; ?>" name="disamt" class="form-control input-sm" value="<?php echo $detail->total_disc; ?>" />
                                                <input type="hidden" id="pvat" value="0">
                                              </div>
                                            </div>
                          
                                          </div>
                                          <div class="row"  <?php if($controlbg!="2"){ echo "hidden"; } ?>>
                                              <div class="col-xs-3">
                                                  <div class="form-group">
                                                      <label>Budget Control</label>
                                                      <input class="form-control input-sm text-right border-danger  text-right" type="text" name="totalcost" id="totalcost<?php echo $i; ?>" value=""  readonly="">
                                                  </div>
                                              </div>
                                          </div>

                                          <script>
                            $('#type_costt<?php echo $i; ?>').val("<?php echo $detail->type_cost; ?>");
                            
                                  if(<?php echo $detail->type_cost; ?>=="1"){
                                    var pamount = parseFloat($('#pamount<?php echo $i; ?>').val());
                                    var costbgmat = parseFloat($('#costbgmat<?php echo $detail->lo_costcode; ?>').val());
                                    $('#totalcost<?php echo $i; ?>').val(costbgmat+pamount);
                                  }else if(<?php echo $detail->type_cost; ?>=="2"){
                                    var pamount = parseFloat($('#pamount<?php echo $i; ?>').val());
                                    var costbglebour = parseFloat($('#costbglebour<?php echo $detail->lo_costcode; ?>').val());
                                    $('#totalcost<?php echo $i; ?>').val(costbglebour+pamount);
                                  }else if(<?php echo $detail->type_cost; ?>=="3"){
                                    var pamount = parseFloat($('#pamount<?php echo $i; ?>').val());
                                    var costbgsub = parseFloat($('#costbgsub<?php echo $detail->lo_costcode; ?>').val());
                                    $('#totalcost<?php echo $i; ?>').val(costbgsub+pamount);
                                  }
                            

                            var type_cost = $("#type_cost<?php echo $i; ?>").val();
                            var codecostcodeint = $('#codecostcodeint<?php echo $i; ?>').val();
                            var ckkcontrolbg = $('#ckkcontrolbg').val();

                            $('#type_costt<?php echo $i; ?>').change(function(event) {
                            var codecostcodeint = $('#codecostcodeint<?php echo $i; ?>').val();
                            var type_cost = $('#type_costt<?php echo $i; ?>').val();


                            if(type_cost=="1"){
                             
                             $("#closebg<?php echo $i; ?>").show();
                               if(ckkcontrolbg==2){
                                  var costbgmat =  $('#costbgmat'+codecostcodeint+'').val();
                                  $('#totalcostt<?php echo $i; ?>').val(costbgmat);

                                  
                                  if(isNaN(costbgmat)){
                                  $('#totalcostt<?php echo $i; ?>').val(0);
                                    swal({
                                title: "Over budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                                });
                                $("#closebg<?php echo $i; ?>").hide();
                                $("#pprice_unit<?php echo $i; ?>").val('0');
                                $("#pdisamt<?php echo $i; ?>").val('0');
                                $("#pamount<?php echo $i; ?>").val('0');
                                $("#to_vats<?php echo $i; ?>").val('0');
                                $("#pnetamt<?php echo $i; ?>").val('0');
                                $("#type_costt<?php echo $i; ?>").val('0');  
                                
                                  } 
                                  
                                }
                            }else if(type_cost=="2"){
                            $("#closebg<?php echo $i; ?>").show();
                                if(ckkcontrolbg==2){
                                  var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
                                  $('#totalcostt<?php echo $i; ?>').val(costbglebour);

                                  
                                  
                                  if(isNaN(costbglebour)){
                                  $('#totalcostt<?php echo $i; ?>').val(0);
                                    swal({
                                title: "Over budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                                });
                                $("#closebg<?php echo $i; ?>").hide();
                                $("#pprice_unit<?php echo $i; ?>").val('0');
                                $("#pdisamt<?php echo $i; ?>").val('0');
                                $("#pamount<?php echo $i; ?>").val('0');
                                $("#to_vats<?php echo $i; ?>").val('0');
                                $("#pnetamt<?php echo $i; ?>").val('0');
                                $("#type_costt<?php echo $i; ?>").val('0');  
                                
                                  } 
                                  
                                }
                            }else if(type_cost=="3"){
                            $("#closebg<?php echo $i; ?>").show();
                                if(ckkcontrolbg==2){
                                  var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
                                  $('#totalcostt<?php echo $i; ?>').val(costbglebour);

                                  if(isNaN(costbglebour)){
                                  $('#totalcostt<?php echo $i; ?>').val(0);
                                    swal({
                                title: "Over budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                                });
                                $("#closebg<?php echo $i; ?>").hide();
                                $("#pprice_unit<?php echo $i; ?>").val('0');
                                $("#pdisamt<?php echo $i; ?>").val('0');
                                $("#pamount<?php echo $i; ?>").val('0');
                                $("#to_vats<?php echo $i; ?>").val('0');
                                $("#pnetamt<?php echo $i; ?>").val('0');
                                $("#type_costt<?php echo $i; ?>").val('0');  
                                
                                  }
                                }
                            }else{
                            $('#closebg').hide();
                            }
                            });
                            </script>

                                          <div class="row">
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="endtproject">vat</label>
                                                <input type='text' id="to_vat<?php echo $i; ?>" class="form-control input-sm" name="to_vat"  value="<?php echo $detail->total_vat; ?>"/>
                                              </div>
                                            </div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="endtproject">จำนวนเงินสุทธิ</label>
                                                <input type='text' id="pnetamt<?php echo $i; ?>" name="netamt" class="form-control input-sm" value="<?php echo $detail->total_nat_amount; ?>"/>
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-8">
                                              <div class="form-group">
                                                <label for="endtproject">หมายเหตุ</label>
                                                <input type='text' id="premark<?php echo $i; ?>" name="remark" class="form-control input-sm" value="<?php echo $detail->remark; ?>"/>
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <label for="">Ref. Asset Code </label>
                                              <div class="input-group">
                                                <input type="hidden" id="accod<?php echo $i; ?>" name="accode"  readonly="true"  class="form-control input-sm" value="<?php echo $detail->lo_assetid; ?>">
                                                <input type="text" id="acname<?php echo $i; ?>" name="acname" readonly="true"  class="form-control input-sm" value="<?php echo $detail->lo_assetname; ?>">
                                                <input type="hidden" id="statusass" name="statusass" readonly="true"  class="form-control input-sm" value="">
                                                <span class="input-group-btn" value="<?php echo $detail->lo_asset; ?>">
                                                  <a class="btn btn-info btn-sm" id="refasset<?php echo $i; ?>" data-toggle="modal" data-target="#refass<?php echo $i; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                                </span>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                  <script type="text/javascript">
                    
                    $('#edit_btn<?php echo $i; ?>').click(function(event) {
                      var pamount = parseFloat($('#total_disc<?php echo $i; ?>').val());
                      var codecostcodeint = $('#lo_costid<?php echo $i; ?>').val();
                      var type_cost = $('#type_cost<?php echo $i; ?>').val();
                      
                      if(type_cost=="1"){
                        var costbgmat =  parseFloat($('#costbgmat'+codecostcodeint+'').val());
                        $('#costbgmat'+codecostcodeint+'').val(costbgmat+pamount);
                        
                      }else if(type_cost=="2"){
                        var costbglebour =  parseFloat($('#costbglebour'+codecostcodeint+'').val());
                        $('#costbglebour'+codecostcodeint+'').val(costbglebour+pamount);
                        
                      }else if(type_cost=="3"){
                        var costbglebour =  parseFloat($('#costbglebour'+codecostcodeint+'').val());
                        $('#costbglebour'+codecostcodeint+'').val(costbglebour+pamount);
                        
                      }
                    });
                      
                  
                  </script>
                            <script>

                            $('#type_cost<?php echo $i; ?>').val("<?php echo $detail->type_cost; ?>");
                            
                                  if(<?php echo $detail->type_cost; ?>=="1"){
                                    var pamount = parseFloat($('#pamount<?php echo $i; ?>').val());
                                    var costbgmat = parseFloat($('#costbgmat<?php echo $detail->lo_costcode; ?>').val());
                                    $('#totalcost<?php echo $i; ?>').val(costbgmat+pamount);
                                  }else if(<?php echo $detail->type_cost; ?>=="2"){
                                    var pamount = parseFloat($('#pamount<?php echo $i; ?>').val());
                                    var costbglebour = parseFloat($('#costbglebour<?php echo $detail->lo_costcode; ?>').val());
                                    $('#totalcost<?php echo $i; ?>').val(costbglebour+pamount);
                                  }else if(<?php echo $detail->type_cost; ?>=="3"){
                                    var pamount = parseFloat($('#pamount<?php echo $i; ?>').val());
                                    var costbglebour = parseFloat($('#costbglebour<?php echo $detail->lo_costcode; ?>').val());
                                    $('#totalcost<?php echo $i; ?>').val(costbglebour+pamount);
                                  }
                            

                                var type_cost = $("#type_cost<?php echo $i; ?>").val();
                                var codecostcodeint = $('#codecostcodeint<?php echo $i; ?>').val();
                                var ckkcontrolbg = $('#ckkcontrolbg').val();

                            $('#type_cost<?php echo $i; ?>').change(function(event) {
                            var codecostcodeint = $('#codecostcodeint<?php echo $i; ?>').val();
                            var type_cost = $('#type_cost<?php echo $i; ?>').val();


                            if(type_cost=="1"){
                             
                             $("#closebg<?php echo $i; ?>").show();
                               if(ckkcontrolbg==2){
                                  var costbgmat =  $('#costbgmat'+codecostcodeint+'').val();
                                  $('#totalcost<?php echo $i; ?>').val(costbgmat);

                                  if(isNaN(costbgmat)){
                                  $('#totalcost<?php echo $i; ?>').val(0);
                                  if(isNaN(costbgmat)){
                                  $('#totalcost<?php echo $i; ?>').val(0);
                                    swal({
                                title: "Over budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                                });
                                $("#closebg<?php echo $i; ?>").hide();
                                $("#pprice_unit<?php echo $i; ?>").val('0');
                                $("#pdisamt<?php echo $i; ?>").val('0');
                                $("#pamount<?php echo $i; ?>").val('0');
                                $("#to_vats<?php echo $i; ?>").val('0');
                                $("#pnetamt<?php echo $i; ?>").val('0');
                                $("#type_cost<?php echo $i; ?>").val('0');  
                                
                                  } 
                                  }
                                }
                            }else if(type_cost=="2"){
                            $("#closebg<?php echo $i; ?>").show();
                                if(ckkcontrolbg==2){
                                  var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
                                  $('#totalcost<?php echo $i; ?>').val(costbglebour);

                                  if(isNaN(costbgmat)){
                                  $('#totalcost<?php echo $i; ?>').val(0);
                                  if(isNaN(costbglebour)){
                                  $('#totalcost<?php echo $i; ?>').val(0);
                                    swal({
                                title: "Over budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                                });
                                $("#closebg<?php echo $i; ?>").hide();
                                $("#pprice_unit<?php echo $i; ?>").val('0');
                                $("#pdisamt<?php echo $i; ?>").val('0');
                                $("#pamount<?php echo $i; ?>").val('0');
                                $("#to_vats<?php echo $i; ?>").val('0');
                                $("#pnetamt<?php echo $i; ?>").val('0');
                                $("#type_cost<?php echo $i; ?>").val('0');  
                                
                                  } 
                                  }
                                }
                            }else if(type_cost=="3"){
                            $("#closebg<?php echo $i; ?>").show();
                                if(ckkcontrolbg==2){
                                  var costbglebour =  $('#costbglebour'+codecostcodeint+'').val();
                                  $('#totalcost<?php echo $i; ?>').val(costbglebour);

                                  if(isNaN(costbglebour)){
                                  $('#totalcost<?php echo $i; ?>').val(0);
                                    swal({
                                title: "Over budget.",
                                text: "",
                                confirmButtonColor: "#EA1923",
                                type: "error"
                                });
                                $("#closebg<?php echo $i; ?>").hide();
                                $("#pprice_unit<?php echo $i; ?>").val('0');
                                $("#pdisamt<?php echo $i; ?>").val('0');
                                $("#pamount<?php echo $i; ?>").val('0');
                                $("#to_vats<?php echo $i; ?>").val('0');
                                $("#pnetamt<?php echo $i; ?>").val('0');
                                $("#type_cost<?php echo $i; ?>").val('0');  
                                
                                  }
                                }
                            }else{
                            $('#closebg').hide();
                            }
                            });
                            </script>
                                        <div class="modal-footer">
                                          <input type="hidden" name="poid" value="">
                                          <button type="submit" class="btn btn-primary" >ยืนยันการเพิ่มข้อมูล</button>
                                          
                                        </div>
                                      </form>
                                      </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="modal fade" id="refass<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header bg-info">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
                            </div>
                            <div class="modal-body">
                              <div class="row" id="refasscode<?php echo $i; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                      $('#refasset<?php echo $i; ?>').click(function(){
                      $('#refasscode<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                      $("#refasscode<?php echo $i; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?php echo $i; ?>');
                      });
                      </script>
                                  <script type="text/javascript">
                                      $("#pqty<?php echo $i; ?> ,#pprice_unit<?php echo $i; ?> ,#pdiscper1<?php echo $i; ?> ,#pdiscper2<?php echo $i; ?> ,#pdiscper3<?php echo $i; ?> ,#pdiscper4<?php echo $i; ?> ,#pdiscex<?php echo $i; ?>").keyup(function(){
                                    var xqty = ($("#pqty<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xprice = ($("#pprice_unit<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xamount = xqty*xprice;
                                    var xdiscper1 = ($("#pdiscper1<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xdiscper2 = ($("#pdiscper2<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xdiscper3 = ($("#pdiscper3<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xdiscper4 = ($("#pdiscper4<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xdiscper5 = ($("#pdiscex<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xvatt = ($("#vat<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var xpd1 = xamount - (xamount*xdiscper1)/100;
                                    var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                                    var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                                    var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                                    var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                                    var total_di = xamount-xpd4;
                                    var xvat = ($("#vat<?php echo $i; ?>").val().replace(/,/g,"")*1);
                                    var chkcontroll = $("#chkcontroll").val();
                                      $("#pamount<?php echo $i; ?>").val((xamount));
                                      $("#too_di<?php echo $i; ?>").val((total_di));
                                      $("#to_vat<?php echo $i; ?>").val((xpd8));
                                      $("#tot_vat<?php echo $i; ?>").val((xpd8));
                                      var item_price = $("#lo_priceunit<?php echo $i; ?>").val();
                                      var price_bd = $("#price_bd<?php echo $i; ?>").val();

                                      

                                      var costcontrol = ($("#costcontrol<?php echo $i; ?>").val()*1);
                                      var bd = $("#cost_bd<?php echo $i; ?>").val();
                                      var boq_id = $("#boq_id<?php echo $i; ?>").val();
                                      var costbg = ($("#costbg"+boq_id).val()*1);

                                      var total_bd = costcontrol - costbg;
                                      $("#costcontrol<?php echo $i; ?>").val(total_bd);
                                      // alert(costcontrol);
                                     

                                      if(xdiscper5 != 0){
                                        vxpd4 = xpd4-xdiscper5;
                                        $("#pdisamt<?php echo $i; ?>").val((vxpd4));
                                        $("#too_di<?php echo $i; ?>").val((vxpd4));
                                        vxpd5 = (xpd4-xdiscper5) + xpd8;
                                        $("#pnetamt<?php echo $i; ?>").val((vxpd5));
                                      }
                                      else if(xdiscper2 != 0){
                                        $("#pdisamt<?php echo $i; ?>").val((xpd4));
                                        $("#too_di<?php echo $i; ?>").val((xpd4));
                                        vxpd2 = xpd4 + xpd8;
                                        $("#pnetamt<?php echo $i; ?>").val((vxpd2));
                                      }
                                      else if(xdiscper3 != 0){
                                        $("#pdisamt<?php echo $i; ?>").val((xpd4));
                                        $("#too_di<?php echo $i; ?>").val((xpd4));
                                        vxpd3 = xpd4 + xpd8;
                                        $("#pnetamt<?php echo $i; ?>").val((vxpd3));
                                      }
                                      else if(xdiscper4 != 0){
                                        $("#pdisamt<?php echo $i; ?>").val((xpd4));
                                        $("#too_di<?php echo $i; ?>").val((xpd4));
                                        vxpd5 = xpd4 + xpd8;
                                        $("#pnetamt<?php echo $i; ?>").val((vxpd5));
                                      }

                                      else
                                      {
                                        $("#pdisamt<?php echo $i; ?>").val((xpd1));
                                        $("#too_di<?php echo $i; ?>").val((xpd1));
                                        vxpd1 = xpd4 + xpd8;
                                        $("#pnetamt<?php echo $i; ?>").val((vxpd1));
                                      }


                      var ckkcontrolbg = $("#ckkcontrolbg").val();
                                              //alert(ckkcontrolbg);
                        if(ckkcontrolbg=="2"){
                        //alert(ckkcontrolbg);
                        var type_cost = $("#type_cost<?php echo $i; ?>").val();

                       var codecostcodeint = $('#codecostcodeint<?php echo $i; ?>').val();
                        if(type_cost==1){
                        var controlmat = $('#controlmat'+codecostcodeint+'').val();
                        if(controlmat=="1"){
                        var costbg = parseFloat($('#costbgmat'+codecostcodeint+'').val().replace(/,/g,""));
                        $('#totalcost<?php echo $i; ?>').val(costbg-xpd1);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost<?php echo $i; ?>').val().replace(/,/g,""));
                        var costcodecc = $('#costbgmat'+codecostcodeint+'').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                        swal({
                        title: "Over budjet",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                        });
                        $("#pprice_unit<?php echo $i; ?>").val('0');
                        $("#pdisamt<?php echo $i; ?>").val('0');
                        $("#pamount<?php echo $i; ?>").val('0');
                        $("#totalcost<?php echo $i; ?>").val(costcodecc);
                        $("#to_vats<?php echo $i; ?>").val('0');
                        $("#pnetamt<?php echo $i; ?>").val('0');
                        }
                        }
                        }else if(type_cost==2){
                        var controllebour = $('#controllebour'+codecostcodeint+'').val();
                              if(controllebour=="1"){
                        var costbg = parseFloat($('#costbglebour'+codecostcodeint+'').val().replace(/,/g,""));
                        $('#totalcost<?php echo $i; ?>').val(costbg-xpd1);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost<?php echo $i; ?>').val().replace(/,/g,""));
                        var costcodecc = $('#costbglebour'+codecostcodeint+'').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                        swal({
                        title: "Over budjet",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                        });
                        $("#pprice_unit<?php echo $i; ?>").val('0');
                        $("#pdisamt<?php echo $i; ?>").val('0');
                        $("#pamount<?php echo $i; ?>").val('0');
                        $("#totalcost<?php echo $i; ?>").val(costcodecc);
                        $("#to_vats<?php echo $i; ?>").val('0');
                        $("#pnetamt<?php echo $i; ?>").val('0');
                        }
                      }
                    }else if(type_cost==3){
                        var controlsub = $('#controlsub'+codecostcodeint+'').val();
                              if(controlsub=="1"){
                        var costbg = parseFloat($('#costbgsub'+codecostcodeint+'').val().replace(/,/g,""));
                        $('#totalcost<?php echo $i; ?>').val(costbg-xpd1);
                        //alert(totalcost);
                        var totalcost = parseFloat($('#totalcost<?php echo $i; ?>').val().replace(/,/g,""));
                        var costcodecc = $('#costbgsub'+codecostcodeint+'').val();
                        if (parseFloat(totalcost) < parseFloat("0")) {
                        swal({
                        title: "Over budjet",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                        });
                        $("#pprice_unit<?php echo $i; ?>").val('0');
                        $("#pdisamt<?php echo $i; ?>").val('0');
                        $("#pamount<?php echo $i; ?>").val('0');
                        $("#totalcost<?php echo $i; ?>").val(costcodecc);
                        $("#to_vats<?php echo $i; ?>").val('0');
                        $("#pnetamt<?php echo $i; ?>").val('0');
                        }
                      }
                    }  //if parseFloa
                  }// if ckkcontrolbg


                                  });
                                  </script>
                                 
                                  
                        <div id="opne_mat<?php echo $i; ?>" class="modal fade">
                          <div class="modal-dialog modal-full">
                            <div class="modal-content ">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">เพิ่มรายการ</h5>
                              </div>
                              <div class="modal-body">
                                <div class="row" id="modal_edit_mat<?php echo $i; ?>"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script>
                        $(".openun_edit<?php echo $i; ?>").click(function(){;
                          $("#modal_edit_mat<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                          $("#modal_edit_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $i; ?>');
                        });
                        </script>
                        <div id="show_mat<?php echo $i; ?>" class="modal fade" data-backdrop="false">
                          <div class="modal-dialog modal-full">
                            <div class="modal-content ">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">เพิ่มรายการ</h5>
                              </div>
                              <div class="modal-body">
                                <div class="row" id="modal_show_mat<?php echo $i; ?>"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div id="show_unit_v<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content ">
                              <div class="modal-header bg-info">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">เพิ่มรายการ</h5>
                              </div>
                              <div class="modal-body">
                                <div class="row" id="show_unit_edit<?php echo $i; ?>"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <script>
                        $(".openund_edit<?php echo $i; ?>").click(function(){
                          $("#modal_show_mat<?php echo $i; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
                          $("#modal_show_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>share/material_id/<?php echo $i; ?>');
                        });

                        $(".show_unit<?php echo $i; ?>").click(function(){
                          $("#show_unit_edit<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                          $("#show_unit_edit<?php echo $i; ?>").load("<?php echo base_url(); ?>share/unitid1/<?php echo $i; ?>");
                        });

                        </script>


                      <div class="modal fade" id="openunitic_edit<?php echo $i; ?>" data-backdrop="false">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-info">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
                                </div>
                                  <div class="modal-body">
                                      <div id="modal_unitic_edit<?php echo $i; ?>"></div>
                                  </div>
                              </div>
                            </div>
                          </div><!-- end modal matcode and costcode -->
                          <script>
                          $(".unitic_edit<?php echo $i; ?>").click(function(){
                           $('#modal_unitic_edit<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                           $("#modal_unitic_edit<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/unitid2/<?php echo $i; ?>');
                         });
                         </script>

        <div class="modal fade" id="boq_edit<?php echo $i; ?>"  data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
              </div>
              <div class="modal-body">
                <div class="row" id="modal_boq_edit<?php echo $i; ?>">
                </div>
              </div>
            </div>
          </div>
        </div><!-- end modal matcode and costcode -->


        <div class="modal fade" id="costcode_edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-full">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
              </div>
              <div class="modal-body">
                <div id="modal_cost_edit<?php echo $i; ?>"></div>
              </div>
            </div>
          </div>
        </div>


        <script>
        $('#selectcostcodeboq_edit<?php echo $i; ?>').click(function(){
          var system = $('#system').val();
          $('#closebg<?php echo $i; ?>').hide();
          $('#type_costt<?php echo $i; ?>').val("");
           $('#modal_boq_edit<?php echo $i; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
           $("#modal_boq_edit<?php echo $i; ?>").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system+'/<?php echo $i; ?>'); 
         });


        $(".modalcost_edit<?php echo $i; ?>").click(function(){
          $('#modal_cost_edit<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $("#modal_cost_edit<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/costcode_id/<?php echo $i; ?>');
        });
        </script>



                                </td>
                                <td>
                                  <input type="text" class="form-control text-right" id="lo_matname<?php echo $i; ?>" name="matnamei[]" value="<?php echo $detail->lo_matname; ?>" readonly>
                                </td>
                                <td class="text-right">
                                  <p id="cc_code<?php echo $i; ?>" style="color:#1E88E5;"><?php echo $detail->lo_costcode; ?></p>
                                  <input type="hidden" name="costidi[]" id="lo_costid<?php echo $i; ?>" class="form-control btn-xs" readonly="true" value="<?php echo $detail->lo_costcode; ?>">
                                  <input type="hidden" name="costnamei[]" id="lo_costname<?php echo $i; ?>" class="form-control btn-xs" readonly="true" value="<?php echo $detail->lo_costname; ?>">
                                  <input type="hidden" id="chkhidden<?php echo $i; ?>" name="chkhidden[]">
                                </td>

                               
                               <td>
                                <input type="text" name="qtyi[]" id="lo_qty<?php echo $i; ?>" class="form-control btn-xs text-right" value="<?php echo number_format($detail->lo_qty); ?>" readonly>
                               </td>

                               <td class="text-right">
                                <p id="unit<?php echo $i; ?>" style="color:#1E88E5;"><?php echo $detail->lo_unit; ?></p>
                               <input type="hidden" name="uniti[]" id="lo_unit<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $detail->lo_unit; ?>" readonly>
                               </td>
                               
                               <td>
                                <input type="text" name="lo_pric[]" id="lo_price<?php echo $i; ?>" class="form-control btn-xs text-right" value="<?php echo ($detail->lo_price); ?>" readonly>
                               </td>
                               

                               <td width="10%">
                               <input type="text" name="amounti[]" id="lo_priceunit<?php echo $i; ?>" class="form-control btn-xs text-right" value="<?php echo $detail->lo_price; ?>" readonly>
                                 <input type="hidden" name="price_bd[]" id="price_bd<?php echo $i; ?>" class="form-control btn-xs text-right" value="<?php echo $detail->lo_priceunit; ?>">

                               </td>
                              <td>
                                <input class="form-control input-sm text-right" id="disper_amt<?php echo $i; ?>" type="text" value="<?php echo $detail->lo_disper+$detail->lo_disper2+$detail->lo_disper3+$detail->lo_disper4 ?>" readonly="">
                                <input type="hidden" id="pdiscper1<?php echo $i; ?>" name="disper[]" value="<?php echo $detail->lo_disper; ?>">
                                <input type="hidden" id="pdiscper2<?php echo $i; ?>" name="disper2[]" value="<?php echo $detail->lo_disper2; ?>">
                                <input type="hidden" id="pdiscper3<?php echo $i; ?>" name="disper3[]" value="<?php echo $detail->lo_disper3; ?>">
                                <input type="hidden" id="pdiscper4<?php echo $i; ?>" name="disper4[]" value="<?php echo $detail->lo_disper4; ?>">
                                <input type="hidden" id="vat<?php echo $i; ?>" value="<?= $detail->lo_vat ?>">
                              </td>
                              <td>
                                <input class="form-control input-sm text-right" name="disamti[]" id="lo_disamt<?php echo $i; ?>" type="text" value="<?php echo $detail->lo_disamt; ?>" readonly="">
                              </td>
                              <td>
                                <input class="form-control input-sm text-right" name="too_di[]" id="total_disc<?php echo $i; ?>" value="<?php echo $detail->total_disc; ?>" type="text" readonly="">
                               
                              </td>
                              <td>
                                <input class="form-control input-sm text-right" id="total_vat<?php echo $i; ?>" type="text" value="<?php echo $detail->total_vat; ?>" readonly="">
                              </td>
                              <td>
                                <input class="form-control input-sm text-right" name="netamti[]" id="total_nat_amount<?php echo $i; ?>" type="text" value="<?php echo $detail->total_nat_amount; ?>" readonly>
                              </td>
                              <td style="color:#BEBEBE;">
                                <?php echo $i; ?>
                                <input type="hidden" id="accode" name="accode[]">
                                <input type="hidden" id="acname" name="acname[]">   
                              </td>
                              <td ><a data-popup="tooltip" id="remove<?php echo $detail->lo_idd; ?>" title="Remove"><i class="glyphicon glyphicon-trash"></i></a></td>

<div class="modal fade" id="refassx<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
      </div>
        <div class="modal-body">
            <div class="row" id="refassxd<?php echo $i; ?>">
             </div>

        </div>
    </div>
  </div>
</div>
  </div>
</div>
<script>
$('.refassx<?php echo $i; ?>').click(function(){
   $('#refassxd<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refassxd<?php echo $i; ?>").load('<?php echo base_url(); ?>share/modalshare_asset/<?php echo $i; ?>');
 });
</script>



                               </tr>



                               <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/bootbox.min.js"></script>
                                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
                                 <script>
                                 // Alert combination
                                 $('#remove<?php echo $detail->lo_idd; ?>').on('click', function() {
                                     swal({
                                         title: "Are you sure?",
                                         text: "You will not be able to recover this imaginary file!",
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
                                            var url="<?php echo base_url(); ?>contract/editcontract/<?php echo $detail->lo_lono; ?>";
                                            var dataSet={
                                              id: "<?php echo $detail->lo_idd; ?>",
                                              };
                                              $.post(url,dataSet,function(data){


                                            $(this).closest('tr').remove();
                                             swal({
                                                   title: "Deleted!",
                                                   text: data,
                                                   confirmButtonColor: "#66BB6A",
                                                   type: "success"
                                             });
                                               window.location.href = "<?php echo base_url(); ?>index.php/contract_active/delcontract/<?php echo $detail->lo_idd; ?>/<?php echo $detail->lo_ref; ?>";
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
                    
                                     });
                                 });
                                 </script>

                               <?php $i++; } ?>
                           </tbody>
                            <tr>
                        <th colspan="5" style="text-align: center;" width="10%">Total</th>
                        <th><a id="allprice" class="btn btn-primary btn-block btn-xs">คำนวนราคา</a></th>
                        <th><input type="text" id="totalresue" name="" class="form-control text-right" required="true"></th>
                        
                        <th  colspan="2"></th>
                      </tr>
                         </table>
<script>
  $('#allprice').click(function(){
    // alert(555);
        var row = $('#body tr').length;
        var sum = 0;
        var total = 0;
        for (var i = 1 ; i <= row ; i++) {
           
          sum = ($("#lo_priceunit"+i).val()*1);
          total += sum;
        }
        $('#totalresue').val(total);
        $('#contactamount').val(total);

     });
</script>
                        </div>
<br>
                       

                

                  </div>

            </div>


<?php $i=1; foreach ($lo as $detail) { ?>
             <!-- /full width modal -->
 <div id="opnewmat<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content ">
                                <div class="modal-header bg-info">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">เพิ่มรายการ</h5>
                                </div>
                                    <div class="modal-body">
                                            <div class="row" id="modal_mat<?php echo $i; ?>"></div>

                                    </div>
                            </div>
                        </div>
                        </div>
          <!-- material -->
  <div class="modal fade" id="costcode<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-full">
       <div class="modal-content">
         <div class="modal-header bg-info">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
         </div>
           <div class="modal-body">
               <div id="modal_cost<?php echo $i; ?>"></div>
           </div>
       </div>
     </div>
   </div>
    <div class="modal fade" id="openunit<?php echo $i; ?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
         </div>
           <div class="panel-body">
               <div id="modal_unit<?php echo $i; ?>">

               </div>
           </div>
       </div>
     </div>
   </div>
    <script>
    $(".openun<?php echo $i; ?>").click(function(){
    $("#modal_mat<?php echo $i; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>share/getmatcode/<?php echo $i; ?>');
    });
    $(".modalcost<?php echo $i; ?>").click(function(){
    $('#modal_cost<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_cost<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/costcode_id/<?php echo $i; ?>');
   });
    $("#modalunit<?php echo $i; ?>").click(function(){
    $('#modal_unit<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_unit<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/unit/<?php echo $i; ?>');
   });
    </script>
    
    <?php $i++; } ?>
 
<div class="rowmat"></div>
<div class="cost"></div>

<form action="<?php echo base_url();?>index.php/contract_active/inset_editwo/<?php echo $lono; ?>/<?php echo $flag; ?>" method="post">
<div id="insertrow" class="modal fade" data-backdrop="false">
             <div class="modal-dialog modal-lg">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h5 class="modal-title">Insert WO Detail</h5>
                 </div>
                   <input type="hidden" id="sumlo<?php echo $i; ?>" value="<?php echo $sumlo; ?>" name="sumlo" class="form-control input-sm">
                 <div class="modal-body">

           <div class="row">
               <div class="col-xs-6">
                 <label for="">รายการซื้อ</label>
                             <div class="input-group" id="error">
                            <!--  <span class="input-group-addon">
                               <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                             </span> -->
                               <input type="text" id="newmatname" name="newmatname"  placeholder="เลือกรายการซื้อ" class="form-control">
                               <input type="text" id="newmatcode" name="newmatcode"  placeholder="Material Code" class="form-control">
                                 <span class="input-group-btn" >
                                    <a class="openund btn btn-primary " data-toggle="modal" data-target="#opnewmattt"><span class="glyphicon glyphicon-search"></span></a>
                                   <a class="openun btn btn-primary btn-block" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span></a>
                                  
                                 </span>
                             </div>
             </div>
             <div class="col-xs-6">
                           <label for="">รายการต้นทุน</label>
                             <div class="input-group" id="errorcost">
                               <input type="text" id="costnameint" name="costnameint" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control">
                               <input type="text" id="codecostcodeint" name="codecostcodeint" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control">

                                
                                 <span class="input-group-btn" >
                                  <?php if ($controlbg == "2") {
                                  echo '<button class="btn btn-primary" id="selectcostcodeboq_insert" data-toggle="modal" data-target="#boq_insert"><span class="glyphicon glyphicon-search"></span></button>';
                                } else {
                                  echo '<button class="modalcost btn btn-primary" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span></button>';
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

        <div class="col-md-3" id="type_costhide" style="display: none;">
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
                            <div class="form-group">
                              <div class="col-xs-12">
                                <hr>
                              </div>
                            </div>
                          </div>
          <div id="closebg">
         <div class="row">
             <div class="col-md-2">
               <div class="form-group" id="errorcost">
                         <label for="qty">ปริมาณ</label>
                         <input type="text" id="pqty" name="qty"  placeholder="กรอกปริมาณ" class="form-control" value="1">
               </div>
             </div>
             <div class="col-xs-2">
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
                         <input type="number" id="cpqtyic" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                         <label for="qty">ปริมาณ IC</label>
                         <input type="text" id="pqtyic" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
               </div>
             </div>
             <div class="col-xs-3">
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
                         <input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="0">
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                         <label for="amount">จำนวนเงิน</label>
                         <input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control" value="0">
               </div>
             </div>
           
         </div>
          <div class="row">
               <div class="col-md-3">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 1 (%)</label>
                    <input type='text' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="0"/>
                 </div>
               </div>
                   <div class="col-md-3">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 2 (%)</label>
                        <input type='text' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="0" />
                     </div>
                   </div>

               <div class="col-md-3">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 3 (%)</label>
                    <input type='text' id="pdiscper3" name="discountper3" placeholder="กรอกส่วนลด" class="form-control" value="0"/>
                 </div>
               </div>
                   <div class="col-md-3">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 4 (%)</label>
                        <input type='text' id="pdiscper4" name="discountper4" placeholder="กรอกส่วนลด" class="form-control" value="0" />
                     </div>
                   </div>
         </div>
           <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                  <label for="endtproject">ส่วนลดพิเศษ</label>
                  <input type='text' id="pdiscex" name="pdiscex" class="form-control" value="0"/>
                 </div>
             </div>
             <div class="col-md-4">
                   <div class="form-group">
                    <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                    <input type='text' id="pdisamt" name="disamt" class="form-control" value="0"/>
                    <input type="hidden" id="pvat" value="0">
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
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">vat</label>

                    <input type='text' id="to_vat" name="to_vat" class="form-control" value="7"/>
                  </div>
                 </div>
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">จำนวนเงินสุทธิ</label>

                    <input type='text' id="pnetamt" name="netamt" class="form-control" value="0"/>
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
                          <input type="text" id="accode" name="accode"  readonly="true"  class="form-control">
                          <input type="text" id="acname" name="acname" readonly="true"  class="form-control">
                          <input type="hidden" id="statusass" name="statusass" readonly="true"  class="form-control">

                                  <span class="input-group-btn" >
                                    <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
         </div>

                 </div>
                 <div class="modal-footer">
                   <input type="hidden" name="poid" value="">
                   <button type="submit" class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
                   <button class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

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
<!-- /Main content -->
<script type="text/javascript">
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
<!--          <div id="openpr" class="modal fade" data-backdrop="false">
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
               
               </div>
             </div>
           </div>
         </div> -->
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
      $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
    $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });

    // $("#system").change(function(){
    //   var chkprv = parseFloat($("#chkprv").val());  
    //   var system = $('#system').val();
    //     $('#loadpr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    //     $("#loadpr").load('<?php echo base_url(); ?>purchase/load_pr2/'+<?php echo $dpname; ?>+'/<?php echo $flag; ?>/'+system);
    // });
    $(".ven").click(function(){
      $("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
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
   $('#refasscode').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
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
                     $("#modal_mat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
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
       $('#modal_unitic').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
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

<div class="modal fade" id="boq_insert"  data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row" id="modal_boq_insert">
             </div>

        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->
<script>
$('#selectcostcodeboq_insert').click(function(){
  var system = $('#system').val();
   $('#modal_boq_insert').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
   $("#modal_boq_insert").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/'+system);
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
  
                <?php  
                   $datestring = "Y";
                   $m = "m";
                   $d = "d";

                              $this->db->select('*');
                              $qu = $this->db->get('po_item');
                              $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

                                if ($res==0) {
                                  $BOQQ = "POBG".date($datestring).date($m).date($d)."1";
                                }else{
                                    $this->db->select('*');
                                    $this->db->order_by('poi_id','desc');
                                    $this->db->limit('1');
                                    $q = $this->db->get('po_item');
                                    $run = $q->result();
                                    foreach ($run as $valx)
                                    {
                                        $x11 = $valx->poi_id+1;
                                    }
                                  $BOQQ = "POBG".date($datestring).date($m).date($d).$x11;
                                }?>
           <script>
            $("#modalunit").click(function(){
            $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
            $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
            });
            $(".insertnewmat").click(function(){
             $("#modal_newmat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode_new');
            });
            $(".modalcost").click(function(){
             $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
           });
           </script>
           <script>
           $("#cpqtyic").keydown(function(){
             $("#pqtyic").val($("#qty").val()*$("#cpqtyic").val());
           });

          // $("#pqty,#pprice_unit").number(true);
          // event cal
          $("#pqty ,#pprice_unit ,#pdiscper1 ,#pdiscper2 ,#pdiscper3 ,#pdiscper4 ,#pdiscex").keyup(function(){


              var xqty = ($("#pqty").val().replace(/,/g,"")*1);
              var xprice = ($("#pprice_unit").val().replace(/,/g,"")*1);
              var xamount = xqty*xprice;
              var xdiscper1 = ($("#pdiscper1").val().replace(/,/g,"")*1);
              var xdiscper2 = ($("#pdiscper2").val().replace(/,/g,"")*1);
              var xdiscper3 = ($("#pdiscper3").val().replace(/,/g,"")*1);
              var xdiscper4 = ($("#pdiscper4").val().replace(/,/g,"")*1);
              var xdiscper5 = ($("#pdiscex").val().replace(/,/g,"")*1);
              var xvatt = ($("#vat").val().replace(/,/g,"")*1);
              var xpd1 = xamount - (xamount*xdiscper1)/100;
              var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
              var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
              var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
              var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
              var total_di = xamount-xpd4;
              var xvat = ($("#vat").val().replace(/,/g,"")*1);
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


            $('#chk').click(function(event) {
              if($('#chk').prop('checked')) {
               $('#newmatname').prop('disabled', false);
            } else {
                $('#newmatname').prop('disabled', true);
            }
            });
  


          //   $('#editfa'+row+'').click(function(event) {
          //     var summaryunit = parseFloat($('#summaryunit').val());
          //     var summaryamt = parseFloat($('#summaryamt').val());
          //     var summaryd1 = parseFloat($('#summaryd1').val());
          //     var summarydis = parseFloat($('#summarydis').val());
          //     var summarydi = parseFloat($('#summarydi').val());
          //     var summaryvat = parseFloat($('#summaryvat').val());
          //     var summarytot = parseFloat($('#summarytot').val());
          //     var cost = parseFloat($('#costbg'+boq_id+'').val());
          //     var cost = parseFloat($('#costbg'+boq_id+'').val());
          //     $('#costbg'+boq_id+'').val(cost+pdisamt);
          //     $('#summaryunit').val(summaryunit-pprice_unit);
          //     $('#summaryamt').val(summaryamt-pamount);
          //     $('#summaryd1').val(summaryd1-total);
          //     $('#summarydis').val(summarydis-pdiscex);
          //     $('#summarydi').val(summarydi-pdisamt);
          //     $('#summaryvat').val(summaryvat-to_vat);
          //     $('#summarytot').val(summarytot-pnetamt);

          // });
                        






           </script>



 <div class="rowmat"></div>
<div class="cost"></div>

     <script>
    $('#checkdoc1').click(function(){
    if($('#checkdoc1').prop('checked')) {
    $("#checkdoc_1").val('1');
    }else{
    $("#checkdoc_1").val('0');
    }
    });

    $("#checkdoc2").click(function(){
    if ($("#checkdoc2").prop('checked')){
    $("#checkdoc_2").val('1');
    }else{
    $("#checkdoc_2").val('0');
    }
    });
    </script>
    <script>
    // $(document).ready(function() {
    $("input[id='retentiontype']").click(function () {
       var aa = $(this).val();
      $("#mainreten").val(aa);
    });
// });
</script>
<script>
    // $(document).ready(function() {
    $("input[id='checkadv']").click(function () {
       var bb = $(this).val();
      $("#advcheck").val(bb);
    });
// });
</script>
<script>
    // $(document).ready(function() {
    $("input[id='advpercent']").click(function () {
       var cc = $(this).val();
      $("#advper_contract").val(cc);
    });
// });
</script>
<script>
    // $(document).ready(function() {
    $("input[id='adv_quantity']").click(function () {
       var dd = $(this).val();
      $("#adv_count").val(dd);
    });
// });
</script>
<script>
    // $(document).ready(function() {
    $("input[id='agreement8']").click(function () {
       var ee = $(this).val();
      $("#agreement").val(ee);
    });
// });

$('#saved').click(function() {

      if ($('#totalresue').val() ==""){
          swal("กรุณากดคำนวณราคา", " ", "warning");
          $('#totalresue').focus();
          return false;
      }

      $('#submit').submit();
      
});

</script>
 