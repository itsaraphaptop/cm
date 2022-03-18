<?php $flag = $this->uri->segment(4); ?>
<?php $dname = $this->uri->segment(3); ?>
<?php
  $projectida = $this->uri->segment(3);
  $this->db->select('*');
  $this->db->from('project');
  $this->db->where('project_id', $projectida);
  $boq = $this->db->get()->result();
  $bd_tenid = 0;
  $chkconbqq = 0;
  $controlbg = 0;
?>

<?php if($flag =='d' ){
$this->db->select('department_id,department_title');
$this->db->where('department_id',$dname);
$q=$this->db->get('department');
$res = $q->result();   ?>
<?php foreach ($res as $key => $value) {
$depidd = $value->department_id;
$dpname=$value->department_title;
$pjname="";
$projectida="";
} ?>
<?php } ?>


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
<?php
    $this->db->select('*');       
    $this->db->where('boq_bd',$bd_tenid);
    $this->db->where('status',0);
      $priboqid = $this->db->get('boq_item')->result();
      ?>
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



<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><a href="<?php echo base_url(); ?>/index.php/panel/office"><i
                        class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">New Work
                    Order</span></h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i
                        class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i>
                    <span>Invoices</span></a>
                <a href="http://app.mekabase.com/index.php/manag/calenda"
                    class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i>
                    <span>Schedule</span></a>
            </div>
        </div>
        <a class="heading-elements-toggle"><i class="icon-menu"></i></a><a class="heading-elements-toggle"><i
                class="icon-menu"></i></a>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>purchase/main_index"><i class="icon-home2 position-left"></i>PO
                    Purchase Order</a> </li>
            <li> New Work Order</li>


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
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a><a class="breadcrumb-elements-toggle"><i
                class="icon-menu-open"></i></a>
    </div>
</div>

<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
        <div class="panel-heading">
            <div style="text-align: right;">
                <a id="refesh" class=" btn btn-info btn-sm"><i class="icon-plus22"></i> New</a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#openpo"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</a>
            </div>
            <br><br>
            <h5 class="panel-title">เพิ่มใบสั่งจ้างใหม่ &nbsp;
                <?php if($chkconbqq=="1"){ echo '<a class="in label label-info"><i class="icon-checkmark4"></i> Control BOQ</a>'; }else{ echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control BOQ</a>'; }
                        ?>&nbsp;
                <?php if($controlbg=="2"){ echo '<a class="apprv label label-success"><i class="icon-checkmark4"></i> Control Budget</a>'; }else{ echo '<a class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</a>'; }
                        ?>
            </h5>




        </div>
        <?php $icpj = $this->uri->segment(3);?>
        <div id="openpo" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h6 class="modal-title">ใบขอซื้อ </h6>
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
        <script>
        $('#totalresue').val(null);
        var system = $('#system').val();
        $('#prprdetail').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#prprdetail").load('<?php echo base_url(); ?>purchase/load_wo/<?php echo $icpj; ?>/<?php echo $flag; ?>/' +
            system + '/<?php echo $bd_tenid; ?>');
        </script>
        <div id="loadprv" class="modal fade" data-backdrop="false">
            <div class="modal-dialog modal-full">
                <div class="modal-content ">

                    <div id="load_detailpr_v"></div>


                </div>
            </div>
        </div>

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/wizards/stepy.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jasny_bootstrap.min.js">
        </script>
        <script type="text/javascript"
            src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js">
        </script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/wizard_stepy.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
        <!-- /theme JS files -->



        <?php
// echo "<pre>";
// var_dump($getproj);
?>





        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active"><a href="#tab1" data-toggle="tab">ข้อมูลโครงการ</a></li>
                <li><a href="#tab2" data-toggle="tab">สัญญา</a></li>
                <li><a href="#tab3" data-toggle="tab">ค่าปรับ/ระยะเวลา</a></li>
            </ul>
        </div>
        <form method="post" id="submit" class="stepy-clickable form-validate-jquery" action="<?php echo base_url(); ?>index.php/contract_active/addloi/<?php echo $flag; ?>">

            <input type="hidden" value="<?php echo $controlbg; ?>" id="ckkcontrolbg">
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lono">เลขที่ใบสั่งจ้าง</label>
                                                <input type="text" name="lolono" placeholder="กรอกเลขที่เอกสาร"
                                                    class="form-control" id="lolono" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lodate">วันที่เอกสาร</label>
                                            <input type="date" name="lodate" placeholder="กรอกวันที่เอกสาร"
                                                class="form-control date" value="<?= date("Y-m-d"); ?>" id="lodate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="refquono">อ้างอิงใบเสนอราคาเลขที่</label>
                                                <input type="text" name="refquono"
                                                    placeholder="กรอกอ้างอิงใบเสนอราคาเลขที่" class="form-control"
                                                    id="refquono">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <b style="color: red;">* </b>
                                            <label for="quodate">วันที่ใบเสนอราคา</label>
                                            <input type="date" name="quodate" placeholder="กรอกวันที่ใบเสนอราคา"
                                                class="form-control date" id="quodate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('project_id', $proid);
        $query = $this->db->get();
        $res = $query->result();
        foreach ($res as $ee) {
          $pjname = $ee->project_name;
          $pjcname = $ee->project_cname;
          $pjcode = $ee->project_code;
          $pjmnameth = $ee->project_mnameth;
      }?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="pr_name">Ref.Pr</label>
                                            <input type="text" class="form-control" required="required" name="pr_name" id="pr_id_ref">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <?php if($flag =='p' ){ ?>
                                                <label for="project">ชื่อโครงการ</label>
                                                <input type="text" name="projectname" readonly="true"
                                                    class="form-control" value="<?php echo $pjname; ?>">
                                                <input type="hidden" name="projectid" class="form-control input-sm"
                                                    id="projectid" value="<?php echo $proid; ?>">
                                                <?php } ?>
                                                <?php if($flag =='d' ){ ?>
                                                <label for="project">ชื่อแผนก</label>
                                                <input type="text" class="form-control" readonly="readonly"
                                                    placeholder="Department" value="<?php echo $dpname; ?>"
                                                    name="depname" id="depname">
                                                <input type="hidden" readonly="true" value="<?php echo $depidd; ?>"
                                                    class="form-control" name="depid" id="depid">
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($flag =='p' ){ ?>
                        <input type="hidden" value="<?php echo $project_code; ?>" class="form-control"
                            name="putprojectcode" id="putprojectcode">
                        <input type="hidden" class="form-control" name="c_wo" id="c_wo"
                            value="<?php if ($c_wo == 0) {echo "approve";} else {echo "wait";}?>">
                        <input type="hidden" class="form-control" name="a_wo" id="a_wo" value="<?php echo $a_wo; ?>">
                        <?php } ?>
                        <?php if($flag =='d' ){ ?>
                        <input type="hidden" value="" class="form-control" name="putprojectcode" id="putprojectcode">
                        <input type="hidden" class="form-control" name="c_wo" id="c_wo" value="">
                        <input type="hidden" class="form-control" name="a_wo" id="a_wo" value="">
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project">ชื่อเจ้าของโครงการ</label>
                                    <?php if($flag =='p' ){ ?>
                                    <input type="text" name="ownername" placeholder="ชื่อเจ้าของโครงการ"
                                        class="form-control" id="ownername" value="<?php echo $pjmnameth ?>"
                                        readonly="">
                                    <?php } ?>
                                    <?php if($flag =='d' ){ ?>
                                    <input type="text" name="ownername" placeholder="ชื่อเจ้าของโครงการ"
                                        class="form-control" id="ownername" value="" readonly="">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project">ชื่อผู้รับเหมาหลัก</label>
                                    <?php if($flag =='p' ){ ?>
                                    <input type="text" name="contactor" placeholder="ชื่อผู้รับเหมาหลัก"
                                        class="form-control" id="contactor" value="<?php echo $pjmnameth ?>">
                                    <?php } ?>
                                    <?php if($flag =='d' ){ ?>
                                    <input type="text" name="contactor" placeholder="ชื่อผู้รับเหมาหลัก"
                                        class="form-control" id="contactor" value="">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <b style="color: red;">* </b>
                                    <label for="project">ชื่อผู้รับจ้างช่วง / บริษัท</label>
                                    <div class="input-group">
                                        <input type="text" name="subcontact" value="" placeholder="ชื่อ หรือ บริษัท"
                                            class="form-control " id="subcontact">
                                        <input type="hidden" name="venid" value="" id="venid">
                                        <script type="text/javascript">

                                        </script>
                                        <div class="input-group-btn">
                                            <button type="button" class="openvender btn btn-default" data-toggle="modal"
                                                data-target="#openvender"><i class="icon-search4"></i></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="venderid" id="venderid" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project">ที่อยู่ผู้รับจ้างช่วง</label>
                                    <input type="text" name="addresssub" placeholder="ที่อยู่ผู้รับจ้างช่วง"
                                        class="form-control" id="addresssub">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <b style="color: red;">* </b>
                                    <label for="project">ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน</label>
                                    <input type="text" name="cosubcontact"
                                        placeholder="ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน" class="form-control"
                                        id="cosubcontact">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tel.</label>
                                    <input type="text" name="telsubcontact" placeholder="กรอกหมายเลขโทรศัพท์"
                                        class="form-control" id="tel">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>เอกสารแนบประกอบ :</label>
                                    <div class="form-group">
                                        <label class="checkbox-inline"><input type="checkbox" name="checkdoc1"
                                                id="checkdoc1">รายการแบบและสเปคอ้างอิง </label>
                                        <input type="hidden" name="checkdoc_1" placeholder="checkbox"
                                            class="form-control input-sm" id="checkdoc_1">
                                        <label class="checkbox-inline"><input type="checkbox" name="checkdoc2"
                                                id="checkdoc2">ใบเสนอราคา</label>
                                        <input type="hidden" name="checkdoc_2" placeholder="checkbox"
                                            class="form-control input-sm" id="checkdoc_2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fax.</label>
                                    <input type="text" name="faxsubcontact" placeholder="กรอกหมายเลข Fax"
                                        class="form-control" id="fax">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>เอกสารแนบอื่นๆ :</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="เอกสารแนบอื่นๆ" class="form-control"
                                            name="attach" id="attach">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label>อ้างอิงสัญญา :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <div class="radio">
                                                <label><input type="radio" name="other1" id="otherpr1">มี</label>
                                                <input type="hidden" name="otherpr1" id="ot" value="X">
                                            </div>
                                            <div id="showpr" style="display: none">
                                                <input type="text" class="form-control input-sm" name="otherpr2">
                                                <input type="text" class="form-control input-sm" name="otherpr3">
                                                <input type="text" class="form-control input-sm" name="otherpr4">
                                            </div>

                                            <div class="radio">
                                                <label><input type="radio" name="other1" id="otherpr"
                                                        checked="">ไม่มี</label>
                                            </div>
                                        </div>
                                        <script>
                                        $('#otherpr1').click(function() {
                                            $('#showpr').toggle();
                                            $('#ot').val("Y");
                                        });

                                        $('#otherpr').click(function() {
                                            $('#showpr').hidden();
                                            $('#ot').val("X");
                                        });
                                        </script>
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
                                <legend>
                                    <h4> ลักษณะสัญญา</h4>
                                </legend>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <b style="color: red;">* </b>
                                        <label>เป็นสัญญา :</label>
                                        <div class="form-group">
                                            <select class="form-control" name="contacttype" id="contacttype">
                                                <option value="1">ค่าแรง</option>
                                                <option value="2">ค่าของ</option>
                                                <option value="3">ทั้งค่าแรงและค่าของ</option>
                                                <option value="4">ค่าเช่า</option>
                                                <option value="5">ค่าบริการ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b style="color: red;">* </b>
                                        <label>ระบบ : </label>
                                        <div class="form-group">
                                            <select class="form-control" name="system" id="system">
                                                <?php if($flag =='d' ){ ?>

                                                <option value="1">OVERHEAD</option>
                                                <?php } ?>
                                                <?php if($flag =='p' ){ ?>
                                                <option value=""></option>
                                                <?php
                                                    $q = $this->db->query("select * from project_item where project_code = '$pjcode'")->result();?>
                                                <?php foreach ($q as $key => $v) {?>
                                                <?php $a = $this->db->query("select * from system where systemcode = '$v->projectd_job'")->result();?>
                                                <?php foreach ($a as $key => $b) {?>
                                                <option value="<?php echo $v->projectd_job; ?>">
                                                    <?php echo $b->systemname; ?></option>
                                                <?php }?>
                                                <?php }?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <b style="color: red;">* </b>
                                        <label>ลักษณะงานที่จ้าง : </label>
                                        <div class="form-group">
                                            <textarea type="text" class="form-control input-sm" rows="5" cols="10"
                                                placeholder="ลักษณะงานที่จ้าง" name="contactdesc"
                                                id="contactdesc"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <legend>
                                        <h4> มูลค่าสัญญา</h4>
                                    </legend>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>มูลค่างาน(ไม่รวม Vat) :</label>
                                            <div class="input-group">
                                                <input type="text" name="contactamount" class="form-control"
                                                    id="contactamount" value="0" readonly="">
                                                <span class="input-group-addon">บาท</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <b style="color: red;">* </b>
                                        <label>Vat :</label>
                                        <div class="input-group">
                                            <input type="text" name="vat" id="vatper" class="form-control" value="7">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <b style="color: red;">* </b>
                                        <label>หัก ณ ที่จ่าย :</label>
                                        <div class="form-group">
                                            <select class="form-control" name="tax" id="tax">

                                                <?php
                      $this->db->select('*');
                      $this->db->from('setupwt');
                      $data = $this->db->get()->result();
                      foreach ($data as $key => $datawt) {
                        var_dump($datawt);
                  ?>
                                                <option value="<?= $datawt->id_wt ?>"><?= $datawt->name_wt ?></option>
                                                <?php
                      }
                  ?>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <legend>
                                    <h4> เงื่อนไขการจ่ายเงิน</h4>
                                </legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><b style="color: red;">* </b>4.1 เงินล่วงหน้า
                                    </label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="advance" id="advance"
                                                value="0">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="advancee" id="advancee"
                                                value="0">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="col-md-2 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คืนเงินล่วงหน้า</label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="advance1" id="advance1"
                                                value="0">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="advancee1" id="advancee1"
                                                value="0">
                                        </div>
                                    </div>

                                    <div class="col-lg-offset-2  col-md-6">
                                        <div class="radio">
                                            <label><input type="radio" name="advcheck" id="checkadv"
                                                    value="B">BG</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="advcheck" id="checkadv" value="C"
                                                    checked="">เช็คไม่ลงวันที่</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2  col-md-10">
                                        <b style="color: red;">* </b>
                                        <input type="text" class="form-control" placeholder="กรอกเงื่อนไขการจ่ายเงิน"
                                            name="other_advance" id="other_advance">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">4.2 เงินงวดสัญญา</label>
                                    <div class="col-md-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="advper" id="advpercent" value="1">
                                                100% จ่ายตามความก้าวหน้าของงาน เดือนละ
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="advper" id="advpercent" value="2">100%
                                                จ่ายเมื่อติดตั้งแล้วเสร็จ</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <div class="radio">
                                            <label><input type="radio" name="adv_count" id="adv_quantity" value="1">1
                                                ครั้ง</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="adv_count" id="adv_quantity" value="2">2
                                                ครั้ง</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input type="text" class="form-control" placeholder="อื่นๆ"
                                            name="other_advance1" id="other_advance1">
                                        <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"><b style="color: red;">* </b>4.3
                                        หักเงินประกันผลงาน</label>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="retentionper"
                                                name="retentionper" value="0">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="retention" name="retention"
                                                value="0">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-3"><label for="">Less Retention Method</label></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="retentionmethod" id="retentionmethod">
                                                <option value="1" selected="">Progress</option>
                                                <option value="2">Progress + Vat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <legend>
                                    <h4> การประกันผลงาน</h4>
                                </legend>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">5.1 ระยะเวลาประกันผลงาน</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="retention" id="retention"
                                                    style="width: 100px;" value="0">
                                                <select name="unit_time" id="unit_time" class="form-control"
                                                    style="width: 100px;">

                                                    <option value="1">วัน</option>
                                                    <option value="2">เดือน</option>
                                                    <option value="3">ปี</option>
                                                </select>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" id="retentiontype" name="mainreten"
                                                        value="B">BG</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" id="retentiontype" name="mainreten" value="C"
                                                        checked="">เช็คไม่ลงวันที่</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">5.2 การบริการหลังการขาย</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="เดือน/ปี"
                                                    name="after_sale" id="after_sale" style="width: 100px;" value="0">
                                                <select name="unit1" class="form-control" style="width: 100px;">

                                                    <option value="1">วัน</option>
                                                    <option value="2">เดือน</option>
                                                    <option value="3">ปี</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">5.3 คู่มือการดูแลรักษา</label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="จำนวน/ชุด"
                                                    name="manual" id="manual">
                                            </div>
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
                                <legend>
                                    <h4>ค่าปรับ</h4>
                                </legend>
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">7.1 ค่าปรับ %</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" placeholder="กรอกค่าปรับ %"
                                                name="per_fines" id="per_fines" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">7.2 ยอดเงิน</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" value="0" name="amount" id="amount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">7.3 อื่นๆ</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="รายละเอียดอื่นๆ"
                                                name="perday_other" id="perday_other">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <legend>
                                    <h4> ระยะเวลาการจ้าง</h4>
                                </legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b style="color: red;">* </b>
                                        <label for="startdate">เริ่มตั้งแต่</label>
                                        <input type="date" name="startcontact" placeholder="" class="form-control"
                                            id="startcontact">
                                    </div>
                                    <div class="col-md-6">
                                        <b style="color: red;">* </b>
                                        <label for="stopcontact">ถึงวันที่</label>
                                        <input type="date" name="stopcontact" placeholder="" class="form-control"
                                            id="stopcontact">
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="stopcontact">ต้องการทำสัญญาคุมหรือไม่</label>
                                        <div class="input-group">
                                            <div class="radio">
                                                <label><input type="radio" name="put" id="put" value="Y">ต้องการ</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="put" id="put" value="N"
                                                        checked="">ไม่ต้องการ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <legend>
                                    <h4> การเพิ่มลดของมูลค่าสัญญา</h4>
                                </legend>
                                <div class="row">
                                    <div class="form-group">
                                        <label
                                            class="col-md-12 control-label">ผู้รับจ้างยอมรับว่าปริมาณงานอาจเพิ่มหรือลดลงจากการสั่งจ้างในครั้งนี้
                                            สามารถยึดถือราคาเดิมได้ตลอดโครงการ</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-8">
                                            <div class="radio">
                                                <label><input type="radio" name="agreement" id="agreement"
                                                        value="Y">ยอมรับ</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="agreement" id="agreement" value="N"
                                                        checked="">ไม่ยอมรับ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <legend>
                                    <h4><b style="color: red;">* </b> ข้อมูลอื่นๆที่ต้องการแจ้งระบุในสัญญา</h4>
                                </legend>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">1.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other" id="other">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">2.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other2" id="other2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">3.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other3" id="other3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">4.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other4" id="other4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">5.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other5" id="other5">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">6.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other6" id="other6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">7.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other7" id="other7">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">8.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other8" id="other8">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">9.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other9" id="other9">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">10.</label>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="ระบุรายการเพิ่มเติม" name="other10" id="other10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                      $this->db->where('po_project',$projectida);
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
                      $this->db->where('projectcode',$projectida);
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
                      $this->db->where('project',$projectida);
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
                      $this->db->where('project_id',$projectida);
                      $this->db->where('cust_code',$bg->costcode);
                      $this->db->where('type_cost',"1");
                      $qscostgl = $this->db->get('gl_batch_details')->result();
                      $amtcr = 0;
                    foreach ($qscostgl as $cgl) {
                      $amtcr = $cgl->amtcr;
                      }


                      $this->db->select_sum('amtdr');
                      $this->db->where('project_id',$projectida);
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
                        <input type="text" name="costbg" id="costbgmat<?php echo $bg->costcode;?>"
                            class="form-control text-right"
                            value="<?php echo (($costcost/100)*$bg->controlper)-$matitalcost; ?>">
                        <input type="text" name="controlmat" id="controlmat<?php echo $bg->costcode;?>"
                            class="form-control text-right" value="<?php echo number_format($bg->control); ?>">
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
                      $this->db->where('po_project',$projectida);
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
                      $this->db->where('projectcode',$projectida);
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
                      $this->db->where('project',$projectida);
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
                      $this->db->where('project_id',$projectida);
                      $this->db->where('cust_code',$bg2->costcode);
                      $this->db->where('type_cost',"2");
                      $qscostgl2 = $this->db->get('gl_batch_details')->result();
                      $amtcr2 = 0;
                    foreach ($qscostgl2 as $cgl2) {
                      $amtcr2 = $cgl2->amtcr;
                      }


                      $this->db->select_sum('amtdr');
                      $this->db->where('project_id',$projectida);
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
                        <input type="text" name="costbg" id="costbglebour<?php echo $bg2->costcode;?>"
                            class="form-control text-right"
                            value="<?php echo (($costcost2/100)*$bg2->controlper)-$matitalcost2; ?>">
                        <input type="text" name="controllebour" id="controllebour<?php echo $bg2->costcode;?>"
                            class="form-control text-right" value="<?php echo number_format($bg2->control); ?>">
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
                      $this->db->where('po_project',$projectida);
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
                      $this->db->where('projectcode',$projectida);
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
                      $this->db->where('project',$projectida);
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
                      $this->db->where('project_id',$projectida);
                      $this->db->where('cust_code',$bg3->costcode);
                      $this->db->where('type_cost',"3");
                      $qscostgl3 = $this->db->get('gl_batch_details')->result();
                      $amtcr3 = 0;
                    foreach ($qscostgl3 as $cgl3) {
                      $amtcr3 = $cgl3->amtcr;
                      }


                      $this->db->select_sum('amtdr');
                      $this->db->where('project_id',$projectida);
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
                        <input type="text" name="costbg" id="costbgsub<?php echo $bg3->costcode;?>"
                            class="form-control text-right"
                            value="<?php echo (($costcost3/100)*$bg3->controlper)-$matitalcost3; ?>">
                        <input type="text" name="controlsub" id="controlsub<?php echo $bg3->costcode;?>"
                            class="form-control text-right" value="<?php echo number_format($bg3->control); ?>">
                    </div>
                </div>



                <?php } ?>
            </div>





            <div class="modal fade" id="openproj" data-backdrop="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
                        </div>
                        <div class="modal-body">
                            <div id="loadvender">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->
            <script type="text/javascript">
            $(".openvender").click(function() {
                $("#loadvender").html(
                    "<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
            });
            </script>


            <br>
            <br>



            <div class="table-responsive" id="table" style="overflow-x:auto;">
                <table class="table table-hover table-bordered table-striped table-xxs" id="top">
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
                    <tbody id="detail_wo">

                    </tbody>

                    <tr>
                        <th colspan="7" style="text-align: center;" width="10%">Total</th>
                        <th><a id="allprice" class="btn btn-primary btn-block btn-xs">คำนวนราคา</a></th>
                        <th><input type="text" id="totalresue" name="totalresue" class="form-control text-right"
                                readonly="true" value=""></th>
                        <th colspan="4"></th>
                        <th><input type="text" id="tota_vat" name="tota_vat" class="form-control text-right"
                                readonly="true"></th>
                        <th colspan="1"></th>
                    </tr>
        </form>
        <script>
        $('#allprice').click(function() {
            var row = $('#detail_wo tr').length;
            var sum = 0;
            var sum_vat = 0;
            var total = 0;


            $("[id^='amounti']").each(function(index, el) {
                var amt = $(el).val().replace(/,/g, "");
                sum += (amt * 1);
            });

            $("[id^='zum4']").each(function(index, el) {
                var amt_vat = $(el).val().replace(/,/g, "");
                sum_vat += (amt_vat * 1);
            });

            $('#totalresue').val(sum);
            $('#contactamount').val(sum);
            $('#tota_vat').val(sum_vat);

        });
        </script>
        <?php if($flag =='p' ){ ?>
        <?php
$this->db->select('*');
$this->db->from('approve');
$this->db->where('approve_project', $project_code);
$this->db->where('type', "WO");
$app_pj = $this->db->get()->result();
foreach ($app_pj as $app) {?>
        <tr hidden>
            <td><input type="text" name="approve_sequence[]" value="<?php echo $app->approve_sequence; ?>"></td>
            <td><input type="text" name="approve_mid[]" value="<?php echo $app->approve_mid; ?>"></td>
            <td><input type="text" name="approve_mname[]" value="<?php echo $app->approve_mname; ?>"></td>
            <td><input type="text" name="approve_lock[]" value="<?php echo $app->approve_lock; ?>"></td>
            <td><input type="text" name="approve_cost[]" value="<?php echo $app->approve_cost; ?>"></td>
        </tr>
        <?php }?>
        <?php }?>
        </table>
    </div>

</div>

<br>

<div class="modal-footer">

    <div class="col-md-12">
        <div class="form-group">

            <button type="button" id="addrowclick" class="addrow btn btn-default btn-xs" data-toggle="modal"
                data-target="#insertrow"><i class="icon-stackoverflow"></i> ADD ROW</button>
            <button id="saved" class="btn btn-primary btn-xs" type="submit"><i
                    class="icon-floppy-disk position-left"></i> Save</button>

        </div>
    </div>

</div>



</div>

</div>
</div>

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
                                    <a class="openun btn btn-info btn-block" data-toggle="modal"
                                        data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span></a>

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label for="">Cost Name</label>
                        <div class="input-group" id="errorcost">
                            <input type="text" id="costnameint" readonly="true" placeholder="Cost Name"
                                class="form-control">
                            <input type="text" id="codecostcodeint" readonly="true" placeholder="Cost Code"
                                class="form-control">
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
                                <option value="2">LABOR.</option>
                                <option value="3">SUB CON.</option>
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
                                <input type="text" id="unit" name="punit" readonly="true" placeholder="กรอกหน่วย"
                                    class="form-control">
                                <span class="input-group-btn">
                                    <a class="openun btn btn-info btn-sm" data-toggle="modal" id="modalunit"
                                        data-target="#openunit" style="margin-top: 25px;"><span
                                            class="glyphicon glyphicon-search"></span> </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="qty">Convert IC</label>
                                <input type="number" id="cpqtyic" name="cqtyic" placeholder="กรอกปริมาณ IC"
                                    class="form-control" value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="qty">QTY IC</label>
                                <input type="number" id="pqtyic" name="pqtyic" placeholder="กรอกปริมาณ IC"
                                    class="form-control" value="1">
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
                        var xpq = xqty * cpqtyic;
                        $("#pqtyic").val(xpq);
                    });
                    $("#cpqtyic").keyup(function() {
                        var xqty = ($("#pqty").val());
                        var cpqtyic = ($("#cpqtyic").val());
                        var xpq = xqty * cpqtyic;
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
                                <input type="number" id="pamount" readonly="true" name="amount"
                                    placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="0">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 1 (%)</label>
                                <input type='number' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด"
                                    class="form-control text-right" value="0" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 2 (%)</label>
                                <input type='number' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด"
                                    class="form-control text-right" value="0" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 3 (%)</label>
                                <input type='number' id="pdiscper3" name="discountper3" placeholder="กรอกส่วนลด"
                                    class="form-control text-right" value="0" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="endtproject">Discount 4 (%)</label>
                                <input type='number' id="pdiscper4" name="discountper4" placeholder="กรอกส่วนลด"
                                    class="form-control text-right" value="0" />
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
                                <input type='number' id="pdisamt" name="disamt" class="form-control text-right"
                                    value="0" />
                                <input type="hidden" id="pvat" value="0">
                            </div>
                        </div>

                    </div>
                    <div class="row" <?php if($controlbg!="2"){ echo "hidden"; } ?>>

                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Budget Control</label>
                                <input class="form-control text-right border-danger" type="text" name="totalcost[]"
                                    id="totalcost" value="" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="endtproject">Vat</label>
                                <input type='number' id="to_vat" name="to_vat" class="form-control text-right"
                                    value="7" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="endtproject">Net Amount</label>
                                <input type='number' id="pnetamt" name="netamt" class="form-control text-right"
                                    value="0" />
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
                                <input type="hidden" id="statusass" name="statusass" readonly="true"
                                    class="form-control">
                                <input type="hidden" id="pri_id" name="priidi[]" value="PO">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal"
                                        data-target="#refass"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="datesend ">Delivery Date</label>
                                <input type="date" class="form-control" id="datesend" name="datesend"
                                    style="width: 200px">
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
<script>
$('#closebg').hide();
$('#type_costhide').hide();
$("#type_cost").change(function() {
    var type_cost = $("#type_cost").val();
    var codecostcodeint = $('#codecostcodeint').val();
    var ckkcontrolbg = $('#ckkcontrolbg').val();
    if (type_cost == 1) {
        $("#closebg").show();
        if (ckkcontrolbg == 2) {
            var costbgmat = $('#costbgmat' + codecostcodeint + '').val();
            $('#totalcost').val(costbgmat);
            if (isNaN(costbgmat)) {
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
    } else if (type_cost == 2) {
        $("#closebg").show();
        if (ckkcontrolbg == 2) {
            var costbglebour = $('#costbglebour' + codecostcodeint + '').val();
            $('#totalcost').val(costbglebour);
            if (isNaN(costbglebour)) {
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
    } else if (type_cost == 3) {
        $("#closebg").show();
        if (ckkcontrolbg == 2) {
            var costbgsub = $('#costbgsub' + codecostcodeint + '').val();
            $('#totalcost').val(costbgsub);
            if (isNaN(costbgsub)) {
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
    } else if (type_cost == "") {
        $("#closebg").hide();
    }
});
</script>
<!-- /Main content -->
<script type="text/javascript">
$("#savee").click(function(e) {
    if ($("#venderid").val() == "") {
        swal({
            title: "กรุณาเลือกร้านค้า!",
            // text: "danger",
            confirmButtonColor: "#FF0000",
            // type: "success"
        });
    } else if ($("#summaryunit").val() == "0") {
        swal({
            title: "กรุณายืนยันราคาในใบขอซื้อ!",
            // text: "danger",
            confirmButtonColor: "#FF0000",
            // type: "success"
        });
    } else {
        var frm = $('#contactForm1');
        frm.submit(function(ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function(data) {
                    swal({
                        title: "PO" + data,
                        text: "Save Completed!!.",
                        // confirmButtonColor: "#66BB6A",
                        type: "success"
                    });
                    setTimeout(function() {
                        window.location.href =
                            "<?php echo base_url(); ?>purchase/editpo/" + data;
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
$(".openproj").click(function() {
    $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
});
$(".opendepart").click(function() {
    $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
});

$("#system").change(function() {
    var chkprv = parseFloat($("#chkprv").val());
    var system = $('#system').val();
    $('#loadpr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#loadpr").load('<?php echo base_url(); ?>purchase/load_pr2/' + <?php echo $dname; ?> +
        '/<?php echo $flag; ?>/' + system);
});
$(".ven").click(function() {
    $("#loadvender").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#loadvender").load('<?php echo base_url(); ?>share/vender_f');
});
</script>
<!-- Full width modal -->

<div class="modal fade" id="refass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
$('#refasset').click(function() {
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
$(".openun").click(function() {
    var row = ($('#body tr').length - 0) + 1;
    $("#modal_mat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_mat").load('<?php echo base_url(); ?>share/getmatcode/' + row);
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
$(".openund").click(function() {
    var row = ($('#body tr').length - 0) + 1;
    $("#modal_matdd").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_matdd").load('<?php echo base_url(); ?>share/material_alone/' + row);

});
</script>
<!-- modal เลือกหน่วย -->
<div class="modal fade" id="openunitic" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
            </div>
            <div class="modal-body">
                <div id="modal_unitic"></div>
            </div>
        </div>
    </div>
</div><!-- end modal matcode and costcode -->
<script>
$(".unitic").click(function() {
    $('#modal_unitic').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_unitic").load('<?php echo base_url(); ?>index.php/share/unitid2');
});
</script>
<div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
$('#selectcostcodeboq').click(function() {
    $('#closebg').hide();
    $('#type_cost').val("");
    var system = $('#system').val();
    $('#modal_boq').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_boq").load('<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/' + system);
});
</script>
<!-- /full width modal -->
<div class="modal fade" id="insertmatnew" data-backdrop="false">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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
    $('#modal_unit').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_unit").load('<?php echo base_url(); ?>index.php/share/unit');
});
$(".insertnewmat").click(function() {
    $("#modal_newmat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_newmat").load('<?php echo base_url(); ?>share/getmatcode_new');
});
$(".modalcost").click(function() {
    $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
});
</script>
<script>
$("#cpqtyic").keydown(function() {
    $("#pqtyic").val($("#qty").val() * $("#cpqtyic").val());
});

// $("#pqty,#pprice_unit").number(true);
// event cal
$("#pqty ,#pprice_unit ,#pdiscper1 ,#pdiscper2 ,#pdiscper3 ,#pdiscper4 ,#pdiscex").keyup(function() {
    var ckkcontrolbg = $('#ckkcontrolbg').val();
    //alert(ckkcontrolbg);
    if (ckkcontrolbg == "2") {
        var totalcost = parseFloat($('#totalcost').val().replace(/,/g, ""));
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
    var xdiscper5 = ($("#pdiscex").val());
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
                $('#totalcost').val(costbg - xpd1);
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
                    $("#totalcost").val(costcodecc);
                    $("#to_vats").val('0');
                    $("#pnetamt").val('0');
                }
            }
        } else if (type_cost == 2) {
            var controllebour = $('#controllebour' + codecostcodeint + '').val();
            if (controllebour == "1") {
                var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val().replace(/,/g, ""));
                $('#totalcost').val(costbg - xpd1);
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
                    $("#totalcost").val(costcodecc);
                    $("#to_vats").val('0');
                    $("#pnetamt").val('0');
                }
            }

        } else if (type_cost == 3) {
            var controlsub = $('#controlsub' + codecostcodeint + '').val();
            if (controlsub == "1") {
                var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val().replace(/,/g, ""));
                $('#totalcost').val(costbg - xpd1);
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
                    $("#totalcost").val(costcodecc);
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
    } else {
        var ckkcontrolbg = $('#ckkcontrolbg').val();
        //alert(ckkcontrolbg);
        if (ckkcontrolbg == "2") {
            var type_cost = $("#type_cost").val();
            // $("#costbgmat"+costcode+"").val(totalcost);
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
                var costbgsub = parseFloat($('#costbgsub' + costcode + '').val().replace(/,/g, ""));
                $("#costbgsub" + costcode + "").val(costbgsub - pamount);
            }
        }

        addrow_insert();
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

$('#chk').click(function(event) {
    if ($('#chk').prop('checked')) {
        $('#newmatname').prop('disabled', false);
    } else {
        $('#newmatname').prop('disabled', true);
    }
});

function addrow_insert() {

    var row = ($('#detail_wo tr').length - 0) + 1;
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
        '<td>' +
        '<div class="checkbox checkbox-switchery switchery-xs switchery-double">' +
        // '<input type="hidden" name="chkbowhere[]" value="'+row+'" />'+
        '<label>' +
        '<input type="checkbox"  id="a' + row + '"  class="switchery" checked="checked">' +
        '<input type="hidden" name="chki[]" id="chki' + row + '" value="Y">' +
        '<input type="hidden" name="chkbgadd[]" id="chkbgadd' + row + '" value="0">' +
        '</label>' +
        '</div>' +
        '</td>' +


        '<td class="text-right" id="smatcode' + row + '"><input type="hidden" name="matcodei[]" value="' + newmatcode +
        '"><div class="input-group"><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="' +
        newmatcode + '"><span class="input-group-btn"><a data-toggle="modal" data-target="#edit' + row +
        '" data-popup="tooltip" title="Edit" id="editfa' + row + '"  id="bgbd' + row +
        '" class="btn btn-default btn-icon"><i class="icon-search4"></i></a><a class="btn btn-default btn-icon" id="remove' +
        row +
        '" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></span></div></td>' +
        '<td class="text-right" id="smatname' + row + '">' + newmatname +
        '<input type="hidden" name="matnamei[]" value="' + $("#newmatname").val() + '"></td>' +

        '<td class="text-right" id="scostcode' + row + '">' + codecostcodeint +
        '<input type="hidden" name="costcodei[]" value="' + codecostcodeint +
        '"><input type="hidden" name="costnamei[]" value="' + costnameint + '"></td>' +
        '<td class="text-right" id="sqtyi' + row + '">' + pqty + '<input type="hidden" name="qtyi[]" value="' + pqty +
        '"></td>' +
        '<td class="text-right" id="sunit' + row + '">' + unit + '<input type="hidden" name="uniti[]" value="' + unit +
        '"></td>' +
        '<td class="text-right" id="spriceunit' + row + '">' + pprice_unit +
        '<input type="hidden" name="priceuniti[]" id="price_unit' + row + '" value="' + pprice_unit + '"></td>' +
        '<td class="text-right" id="samount' + row + '">' + pamount + '<input type="hidden" id="amounti' + row +
        '" class="txt1" name="amounti[]" value="' + pamount + '"></td>' +

        '<td class="text-right" id="sdisone' + row + '">' + total + '<input type="hidden" name="disci1[]" value="' +
        pdiscper1 + '"></td>' +
        '<td hidden>' + pdiscper2 + '<input type="hidden" name="disci2[]" value="' + pdiscper2 + '"></td>' +
        '<td hidden>' + pdiscper3 + '<input type="hidden" name="disci3[]" value="' + pdiscper3 + '"></td>' +
        '<td hidden>' + pdiscper4 + '<input type="hidden" name="disci4[]" value="' + pdiscper4 + '"></td>' +
        '<td class="text-right" id="sdisamt' + row + '">' + pdiscex + '<input type="hidden" name="disamti[]" value="' +
        pdiscex + '"></td>' +
        '<td class="text-right"  id="tto_di' + row + '">' + pdisamt + '<input type="hidden" id="too_dii' + row +
        '" name="too_di[]" value="' + pdisamt + '"></td>' +
        '<td class="text-right" id="total_vat' + row + '">' + to_vat + '<input type="hidden" name="to_vat[]" value="' +
        to_vat + '"></td>' +
        '<td class="text-right" id="snetamt' + row + '">' + pnetamt +
        '<input type="hidden" id="zum4" name="netamti[]" value="' + pnetamt +
        '"><input type="hidden"  name="chkhidden[]" value="' + boq_id +
        '"><input type="hidden" name="accode[]" value="' + accode + '"><input type="hidden" name="acname[]" value="' +
        acname + '"><input type="hidden" name="statusass[]" value="' + statusass +
        '"><input type="hidden" name="premark[]" value="' + premark + '"><input type="hidden" id="typerow' + row +
        '"  name="type_cost[]" value="' + type_cost + '"><input type="hidden" id="datesend' + row +
        '"  name="datesend[]" value="' + datesend + '"><input type="hidden" name="remark_mat[]" value="' + remark_mat +
        '"></td>' +

        '<td style="color:#BEBEBE;" >' + row + '<input type="hidden" name="type[]" value="' + type +
        '"><input type="hidden"  name="priidi[]" value="' + pri_id + '"><input type="hidden"  name="cqtyic[]" value="' +
        cpqtyic + '"><input type="hidden"  name="pqtyic[]" value="' + pqtyic +
        '"><input type="hidden"  name="punitic[]" value="' + punitic +
        '"><input type="hidden"  name="pqtyic[]" value="' + pqtyic +
        '"><input type="hidden"  name="reamrki[]" value="' + reamrki +
        '"><input type="hidden"  name="refprno[]" value="NO"></td>' +
        '</tr>';
    $('#top').append(tr);


    $('#editfa' + row + '').click(function(event) {

        var type_cost = $("#typerow" + row + "").val();
        var costcodetype = codecostcodeint;
        var rowsum_di = parseFloat($("#amounti" + row + "").val().replace(/,/g, ""));
        if (type_cost == 1) {
            var costbg = parseFloat($('#costbgmat' + codecostcodeint + '').val().replace(/,/g, ""));
            $('#costbgmat' + costcodetype + '').val(costbg + rowsum_di);
            $('#totalcost' + row + '').val(costbg + rowsum_di);
        } else if (type_cost == 2) {
            var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val().replace(/,/g, ""));
            $('#costbglebour' + costcodetype + '').val(costbg + rowsum_di);
            $('#totalcost' + row + '').val(costbg + rowsum_di);
        } else if (type_cost == 3) {
            var costbg = parseFloat($('#costbgsub' + codecostcodeint + '').val().replace(/,/g, ""));
            $('#costbgsub' + costcodetype + '').val(costbg + rowsum_di);
            $('#totalcost' + row + '').val(costbg + rowsum_di);
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



    var rowmat = '<div id="edit' + row + '" class="modal fade" data-backdrop="false">' +
        '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h5 class="modal-title">Edit ' + newmatname + '</h5>' +
        '</div>' +

        '<div class="modal-body">' +


        '<div class="row">' +
        '<div class="col-xs-6">' +
        '<label for="">รายการซื้อ</label>' +

        '<div class="form-group" id="error' + row + '">' +
        '<input type="text" id="newmatname' + row + '"  placeholder="เลือกรายการซื้อ" class="form-control " value="' +
        newmatname + '" readonly="">' +
        '<input type="text" id="newmatcode' + row + '"  placeholder="เลือกรายการซื้อ" class="form-control " value="' +
        newmatcode + '" disabled>' +
        '</div>' +
        '</div>' +
        '<div class="col-xs-6">' +
        '<label for="">รายการต้นทุน</label>' +
        '<div class="input-group">' +
        '<input type="text" id="costnameint' + row +
        '" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="' + costnameint + '">' +
        '<input type="text" id="codecostcodeint' + row +
        '" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="' + codecostcodeint + '">' +

        '<input type="hidden" id="chkhidden' + row + '" readonly="true" placeholder="" class="form-control " value="' +
        boq_id + '">' +
        '<input type="hidden" id="type' + row + '" readonly="true" placeholder="" class="form-control " value="' +
        type + '">' +



        '<span class="input-group-btn">' +
        '<button class="btn btn-primary ' + chk1 + '" id="selectcostcodeboq' + row +
        '" data-toggle="modal" data-target="#boq' + row +
        '"><span class="glyphicon glyphicon-search"></span></button>' +
        '<a class="costcode' + row + ' btn btn-primary ' + chk + '" data-toggle="modal" data-target="#costcode' + row +
        '"><span class="glyphicon glyphicon-search"></span></a>' +
        '</span>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-md-6">' +
        '<div class="form-group">' +
        '<label for="qty">รายละเอียดเพิ่มเติม</label>' +
        '<input type="text" id="remark_mat' + row + '" name="remark_mat" class="form-control text-right" value="' +
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
        '<div class="col-md-2">' +
        '<div class="form-group">' +
        '<label for="qty">ปริมาณ</label>' +
        '<input type="number" id="pqty' + row +
        '" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="' + pqty + '">' +
        '</div>' +
        '</div>' +
        '<div class="col-xs-2">' +
        '<div class="input-group">' +
        '<label for="unit">หน่วย</label>' +
        '<input type="text" id="punit' + row +
        '" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="' + unit +
        '">' +
        '<span class="input-group-btn" >' +
        '<a class="unit' + row + ' btn btn-primary" data-toggle="modal" data-target="#openunit' + row +
        '" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>' +
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
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<label for="qty">ปริมาณ IC</label>' +
        '<input type="number" id="pqtyic' + row +
        '" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="' + pqtyic + '">' +
        '</div>' +
        '</div>' +

        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<label for="unit">หน่วย IC</label>' +
        '<input type="text" id="punitic' + row +
        '" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="' + punitic +
        '">' +
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
        '" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="' +
        pamount + '">' +
        '</div>' +
        '</div>' +
        '</div>' +


        '<div class="row">' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +

        ' <label for="endtproject">ส่วนลด 1 (%)</label>' +
        '<input type="number" id="pdiscper1' + row +
        '" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper1 + '" />' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<label for="endtproject">ส่วนลด 2 (%)</label>' +
        ' <input type="number" id="pdiscper2' + row +
        '" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper2 + '" />' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-3">' +
        '<div class="form-group">' +

        '<label for="endtproject">ส่วนลด 3 (%)</label>' +
        '<input type="number" id="pdiscper3' + row +
        '" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper3 + '" />' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<label for="endtproject">ส่วนลด 4 (%)</label>' +
        '<input type="number" id="pdiscper4' + row +
        '" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="' + pdiscper4 + '" />' +
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
        '<input type="number" id="pdisamt' + row + '" name="disamt" class="form-control text-right" value="' + pdisamt +
        '" readonly="true"/>' +

        '<input type="hidden" name="too_di" id="too_di' + row + '" value="0">' +
        '<input type="hidden" name="tot_vat[]" id="tot_vat' + row + '" value="0">' +


        '</div>' +
        ' </div>' +


        '</div>' +

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

        '<input type="number" id="to_vats' + row + '" name="to_vat" class="form-control text-right" value="' + to_vat +
        '" readonly="true"/>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<div class="form-group">' +
        '<label for="endtproject">จำนวนเงินสุทธิ</label>' +

        '<input type="number" id="pnetamt' + row + '" name="netamt" class="form-control text-right" value="' + pnetamt +
        '" readonly="true"/>' +
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
        '<input type="hidden" id="accode' + row + '" name="accode"  readonly="true"  class="form-control " value="' +
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
        '</div>' +
        '<div class="modal-footer">' +
        '<a id="insertpodetail' + row + '" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        ' </div>' +
        '</div>';

    $('.rowmat').append(rowmat);



    var cost = '<div class="modal fade" id="costcode' + row + '" data-backdrop="false">' +
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
    $('.cost').append(cost);

    $(".costcode" + row + "").click(function() {
        $('#modal_cost' + row + '').html(
            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_cost" + row + "").load('<?php echo base_url(); ?>index.php/share/costcode_id/' + row);
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
        $("#modal_unit" + row + "").load('<?php echo base_url(); ?>index.php/share/unitid/' + row);
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
        $("#modal_unitic" + row + "").load('<?php echo base_url(); ?>index.php/share/unitid2/' + row);
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


    var cost = '<div class="modal fade" id="boq' + row + '" data-backdrop="false">' +
        '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header bg-info">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
        '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>' +
        ' </div>' +
        '<div class="modal-body">' +
        '<div id="modal_boq' + row + '"></div>' +

        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    $('.cost').append(cost);
    $('#selectcostcodeboq' + row + '').click(function() {
        $('#closebg' + row + '').hide();
        $('#type_cost' + row + '').val("");
        $('#type_costhide' + row + '').hide();
        var system = $('#system').val();
        $('#modal_boq' + row + '').html(
            "<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
        $("#modal_boq" + row + "").load(
            '<?php echo base_url(); ?>pr/model_costcodeboq/<?php echo $bd_tenid; ?>/' + system + '/' + row);
    });
    $("#insertpodetail" + row + "").click(function() {
        var xdiscper1 = parseFloat($('#pdiscper1' + row + '').val());
        var xdiscper2 = parseFloat($('#pdiscper2' + row + '').val());
        var xdiscper3 = parseFloat($('#pdiscper3' + row + '').val());
        var xdiscper4 = parseFloat($('#pdiscper4' + row + '').val());
        var sumxdic = xdiscper1 + xdiscper2 + xdiscper3 + xdiscper4;
        var costcontrol = parseFloat($('#costcontrol' + row + '').val());
        var boq_id = $('#boq_id' + row + '').val();
        var cost = parseFloat($('#costbg' + boq_id + '').val());



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

        var type_cost = $("#type_cost" + row + "").val();

        // $("#costbgmat"+costcode+"").val(totalcost);
        if (type_cost == 1) {
            var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
            var costcode = $('#codecostcodeint' + row + '').val();
            var pamount = parseFloat($('#pamount' + row + '').val().replace(/,/g, ""));
            var costbgmat = parseFloat($('#costbgmat' + costcode + '').val().replace(/,/g, ""));
            $("#costbgmat" + costcode + "").val(costbgmat - pamount);
        } else if (type_cost == 2) {
            var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
            var costcode = $('#codecostcodeint' + row + '').val();
            var pamount = parseFloat($('#pamount' + row + '').val().replace(/,/g, ""));
            var costbglebour = parseFloat($('#costbglebour' + costcode + '').val().replace(/,/g, ""));
            $("#costbglebour" + costcode + "").val(costbglebour - pamount);
        } else if (type_cost == 3) {
            var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
            var costcode = $('#codecostcodeint' + row + '').val();
            var pamount = parseFloat($('#pamount' + row + '').val().replace(/,/g, ""));
            var costbgsub = parseFloat($('#costbgsub' + costcode + '').val().replace(/,/g, ""));
            $("#costbgsub" + costcode + "").val(costbgsub - pamount);
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
                '><input type="hidden" name="costmatsub[]" value=' + $("#costmatsub" + row + "").val() + '>'
            );
            $("#scostname" + row + "").html('<a class="editable editable-clicks">' + $("#costnameint" + row +
                "").val() + '</a>');

            $("#sqtyi" + row + "").html("<a class='editable editable-clicks'>" + $("#pqty" + row + "").val() +
                "</a><input type='hidden' name='qtyi[]' id='qtyi" + row + "' value=" + $("#pqty" + row + "")
                .val() + "><input type='hidden' name='cqtyic[]' value=" + $("#cpqtyic" + row + "").val() +
                "><input type='hidden' name='pqtyic[]' value=" + $("#pqtyic" + row + "").val() + ">");

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
                row + "' value=" + $("#to_vats" + row + "").val() + " readonly>");

            $("#snetamt" + row + "").html(
                "<input type='hidden' name='refprno[]' value=''><input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4' value=" +
                $("#pnetamt" + row + "").val() + " readonly><input type='hidden' name='reamrki[]' value=" +
                $("#premark" + row + "").val() + "><input type='hidden' name='accode[]' value=" + $(
                    "#accode" + row + "").val() + "><input type='hidden' name='acname[]' value=" + $(
                    "#acname" + row + "").val() + "><input type='hidden' name='statusass[]' value=" + $(
                    "#statusass" + row + "").val() + "><input type='hidden' name='priidi[]' value=" + $(
                    "#pri_id" + row + "").val() + "><input type='hidden' name='type_cost[]' value=" + $(
                    "#type_cost" + row + "").val() + ">");





        } else {
            swal({
                title: "Please Chack!",
                text: "Material Code Not Found",
                confirmButtonColor: "#2196F3"
            });
            $("#error" + row + "").attr("class", "input-group has-error has-feedback");
            $("#newmatname" + row + "").focus();
        }
        if ($("#pprice_unit" + row + "").val() != 0) {

        } else {
            swal({
                title: "Unit Price Not Found!",
                text: "Unit Price Not Found",
                confirmButtonColor: "#2196F3"
            });
        }


        $('#editcost' + row + '').click(function(event) {

            var rowsum_di = parseFloat($("#amounti" + row + "").val().replace(/,/g, ""));

            var type_cost = $("#type_cost" + row + "").val();
            var costcodetype = $("#codecostcodeint" + row + "").val();
            if (type_cost == 1) {
                var costbg = parseFloat($('#costbgmat' + $("#codecostcodeint" + row + "").val() + '')
                    .val().replace(/,/g, ""));
                $('#costbgmat' + costcodetype + '').val(costbg + rowsum_di);
                $('#totalcost' + row + '').val(costbg + rowsum_di);
            } else if (type_cost == 2) {
                var costbg = parseFloat($('#costbglebour' + $("#codecostcodeint" + row + "").val() + '')
                    .val().replace(/,/g, ""));
                $('#costbglebour' + costcodetype + '').val(costbg + rowsum_di);
                $('#totalcost' + row + '').val(costbg + rowsum_di);
            } else if (type_cost == 3) {
                var costbg = parseFloat($('#costbgsub' + $("#codecostcodeint" + row + "").val() + '')
                    .val().replace(/,/g, ""));
                $('#costbgsub' + costcodetype + '').val(costbg + rowsum_di);
                $('#totalcost' + row + '').val(costbg + rowsum_di);
            }
            // alert(''+$("#codecostcodeint"+row+"").val()+'');


        });
    });
    $("#type_cost" + row + "").change(function(event) {
        var type_cost = $("#type_cost" + row + "").val();
        var costcodetype = $("#codecostcodeint" + row + "").val();
        var rowsum_di = parseFloat($("#pdisamt" + row + "").val().replace(/,/g, ""));
        var codecostcodeint = $('#codecostcodeint' + row + '').val();
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

            }
        }
    });

    $('#pprice_unit' + row + ',#pqty' + row + ', #pdiscex' + row + ",#pdiscper1" + row + ",#pdiscper2" + row +
        ",#pdiscper3" + row + ",#pdiscper4" + row).keyup(function() {

        var xqty = parseFloat($('#pqty' + row + '').val());
        var xprice = parseFloat($('#pprice_unit' + row + '').val());
        var xamount = xqty * xprice;
        var xdiscper1 = parseFloat($('#pdiscper1' + row + '').val());
        var xdiscper2 = parseFloat($('#pdiscper2' + row + '').val());
        var xdiscper3 = parseFloat($('#pdiscper3' + row + '').val());
        var xdiscper4 = parseFloat($('#pdiscper4' + row + '').val());
        var xdiscper5 = parseFloat($('#pdiscex' + row + '').val());
        var xvatt = parseFloat($('#vat').val());
        var xpd1 = xamount - (xamount * xdiscper1) / 100;
        var xpd2 = xpd1 - (xpd1 * xdiscper2) / 100;
        var xpd3 = xpd2 - (xpd2 * xdiscper3) / 100;
        var xpd4 = xpd3 - (xpd3 * xdiscper4) / 100;
        var xpd8 = ((xpd4 - xdiscper5) * xvatt) / 100;
        var total_di = xamount - xpd4;
        var xvat = parseFloat($('#vat').val());

        $('#pamount' + row + '').val((xamount));
        $('#too_di' + row + '').val(total_di);
        $('#to_vats' + row + '').val((xpd8));

        $('#tot_vat' + row + '').val(xvatt);


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
                    $('#totalcost' + row + '').val(costbg - xpd1);
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
                    var costbg = parseFloat($('#costbglebour' + codecostcodeint + '').val().replace(/,/g, ""));
                    $('#totalcost' + row + '').val(costbg - xpd1);
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
                    $('#totalcost' + row + '').val(costbg - xpd1);
                    //alert(totalcost);
                    var totalcost = parseFloat($('#totalcost' + row + '').val().replace(/,/g, ""));
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
    if ($("#system").val() == "") {
        swal({
            title: "กรุณาเลือกระบบ !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    } else {
        $("#openpr").modal('show');
    }
});


$("#inst").click(function() {
    if ($("#system").val() == "") {
        swal({
            title: "กรุณาเลือกระบบ !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    } else {
        $("#insertrow").modal('show');
    }
});

$('#advance').keyup(function(event) {

    var down = $('#advance').val();
    var amount = $('#contactamount').val();
    if ((down * 1) < 100) {
        var amount_down = (down * amount) / 100;
        $('#advancee').val(amount_down);
    } else {
        swal("ยอดเงินดาวน์ มากกว่า มูลค่าสัญญา", " ", "error");
        $('#advance').val(0);
        $('#advancee').val(0);
    }

});


$('#advancee').keyup(function(event) {

    var down = $('#advancee').val();
    var amount = $('#contactamount').val();
    if ((amount * 1) >= (down * 1)) {
        var amount_down = (down / amount) * 100;
        $('#advance').val(parseInt(amount_down));
    } else {
        swal("ยอดเงินดาวน์ มากกว่า มูลค่าสัญญา", " ", "error");
        $('#advance').val(0);
        $('#advancee').val(0);
    }

});

$('#advance1').keyup(function(event) {

    var down = $('#advance1').val();
    var amount = $('#advancee').val();
    if ((down * 1) < 100) {
        var amount_down = (down * amount) / 100;
        $('#advancee1').val(amount_down);
    } else {
        swal("ยอดคืนเงินล่วงหน้า มากกว่า ยอดเงินดาวน์", " ", "error");
        $('#advance1').val(0);
        $('#advancee1').val(0);
    }

});

$('#retentionper').keyup(function(event) {

    var down = $('#retentionper').val();
    var amount = $('#contactamount').val();
    if ((down * 1) < 100) {
        var amount_down = (down * amount) / 100;
        $('#retention').val(amount_down);
    } else {
        swal("ยอดเงินดาวน์ มากกว่า มูลค่าสัญญา", " ", "error");
        $('#retentionper').val(0);
        $('#retention').val(0);
    }

});


$('#advancee1').keyup(function(event) {

    var down = $('#advancee1').val();
    var amount = $('#advancee').val();
    if ((amount * 1) >= (down * 1)) {
        var amount_down = (down / amount) * 100;
        $('#advance1').val(parseInt(amount_down));
    } else {
        swal("ยอดคืนเงินล่วงหน้า มากกว่า ยอดเงินดาวน์", " ", "error");
        $('#advance1').val(0);
        $('#advancee1').val(0);
    }

});



$("#sss").click(function() {
    if ($("#system").val() == "") {
        swal({
            title: "กรุณาเลือกระบบ !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    } else {
        $("#openpr").modal('show');
    }
});


$("#inst").click(function() {
    if ($("#system").val() == "") {
        swal({
            title: "กรุณาเลือกระบบ !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
    } else {
        $("#insertrow").modal('show');
    }
});

$('#saved').click(function() {

    if ($('#subcontact').val() == "") {
        swal("กรุณากรอง ชื่อผู้รับจ้างช่วง / บริษัท", " ", "warning");
        $('#subcontact').focus();
        return false;
    }
    if ($('#quodate').val() == "") {
        swal("กรุณากรอง วันที่ใบเสนอราคา", " ", "warning");
        $('#quodate').focus();
        return false;
    }

    if ($('#contacttype').val() == "") {
        swal("กรุณากรอก ข้อมูลสัญญา", " ", "warning");
        $('#contacttype').focus();
        return false;
    }

    if ($('#tel').val() == "") {
        swal("กรุณากรอก Tel.", " ", "warning");
        $('#tel').focus();
        return false;
    }

    if ($('#fax').val() == "") {
        swal("กรุณากรอก Fax", " ", "warning");
        $('#fax').focus();
        return false;
    }

    if ($('#cosubcontact').val() == "") {
        swal("กรุณากรอก ชื่อผู้ลงนามผุ้รับจ้าง ผู้ประสานงาน", " ", "warning");
        $('#cosubcontact').focus();
        return false;
    }

    if ($('#contacttype').val() == "") {
        swal("กรุณาเลือกสัญญา", " ", "warning");
        $('#contacttype').focus();
        return false;
    }

    if ($('#system').val() == "") {
        swal("กรุณาเลือกระบบ", " ", "warning");
        $('#system').focus();
        return false;
    }

    if ($('#contactamount').val() == "") {
        swal("กรุณากดคำนวณราคา", " ", "warning");
        $('#contactamount').focus();
        return false;
    }

    if ($('#tax').val() == "") {
        swal("กรุณาเลือก หัก ณ ที่จ่าย", " ", "warning");
        $('#tax').focus();
        return false;
    }

    if ($('#advance').val() == "") {
        swal("กรุณากรอก เงินล่วงหน้า", " ", "warning");
        $('#advance').val(0);
        return false;
    }

    if ($('#advance1').val() == "") {
        swal("กรุณากรอก คืนเงินล่วงหน้า", " ", "warning");
        $('#advance1').val(0);
        return false;
    }

    if ($('#retentionper').val() == "") {
        swal("กรุณากรอก หักเงินประกันผลงาน", " ", "warning");
        $('#retentionper').val(0);
        return false;
    }

    if ($('#retention').val() == "") {
        swal("กรุณากรอก ระยะเวลาประกันผลงาน", " ", "warning");
        $('#retention').val(0);
        return false;
    }

    if ($('#unit_time').val() == "") {
        swal("กรุณาระบุ ระยะเวลาประกันผลงาน", " ", "warning");
        $('#unit_time').focus();
        return false;
    }

    if ($('#startcontact').val() == "") {
        swal("กรุณาระบุ วันที่เริ่มต้น", " ", "warning");
        $('#startcontact').focus();
        return false;
    }

    if ($('#stopcontact').val() == "") {
        swal("กรุณาระบุ วันที่สิ้นสุด", " ", "warning");
        $('#stopcontact').focus();
        return false;
    }

    if ($('#totalresue').val() == "") {
        swal("กรุณากดคำนวณราคา", " ", "warning");
        $('#totalresue').focus();
        return false;
    }

    if ($('.type_cost').val() == "") {
        swal("Please select Type of Cost  !!");
        $('.type_cost').focus();
        return false;
    }

    $('#submit').submit();
});
</script>

<script type="text/javascript">
$('#wo').attr('class', 'active');
$('#new_wo').attr('style', 'background-color:#dedbd8');
</script>

<script type="text/javascript">
$("#refesh").click(function() {
    location.reload();
});
</script>