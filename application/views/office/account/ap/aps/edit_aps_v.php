<style>
  .containerbox {
       /*position: absolute;*/
       z-index: 1;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       overflow: auto;
       background: url('<?php echo base_url();?>assets/images/bgsc_glayunder.png') top center no-repeat;

  }
  .control-label{
    margin-top: 5px;
  }
</style>
<div class="content-wrapper containerbox">
  <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
            </div>

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="ap_main"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>ระบบจัดการบัญชีเจ้าหนี้</li>
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
          <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">
        <form action="<?php echo base_url(); ?>aps_active/editaps" method="post">
      <fieldset>
      <div class="row">
        <div class="panel panel-default border-grey">
                    <div class="panel-heading">
                        <h6 class="panel-title"> Account Payable SubContractor (APS)</h6>
                            <div class="heading-elements">
                                <!-- <ul class="icons-list">
                                          <li><a data-action="reload"></a></li>
                                          <li><a data-action="close"></a></li>
                                </ul> -->
                                <!-- <button type="button" class="mo btn btn-primary" id="selectapv"><i class="icon-stackoverflow"></i> APO SELECT</button> -->
                            </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                           
<?php foreach ($apsh as $v) {
  if ($v->aps_department==0) {
    $this->db->select('project_name');
        $this->db->where('project_id',$v->aps_project);
        $pq = $this->db->get('project');
        $pres = $pq->result();
        foreach ($pres as $pn) {
          $pname = $pn->project_name;
           $depname = "";
        }
  }else if ($v->aps_department==""){
        $this->db->select('project_name');
        $this->db->where('project_id',$v->aps_project);
        $pq = $this->db->get('project');
        $pres = $pq->result();
        foreach ($pres as $pn) {
          $pname = $pn->project_name;
           $depname = "";
        }
       
      }else{
          $this->db->select('department_title');
          $this->db->where('department_id',$v->aps_department);
          $dq = $this->db->get('department');
          $dres = $dq->result();
          foreach ($dres as $key => $value) {
            $pname = "";
            $depname = $value->department_title;
          }
        }
      $this->db->select('contactamount');
      $this->db->where('lo_lono',$v->aps_lono);
      $lq = $this->db->get('lo');
      $lres = $lq->result();
      foreach ($lres as $key => $value) {
        $conamt = $value->contactamount;
      }
      $qev = $this->db->query("select * from vender where vender_id='$v->aps_contact'");
      $rven = $qev->result();
      foreach ($rven as $ue) {
        $venname = $ue->vender_name;
      }
  $apscode = $v->aps_code;
  $period = $v->aps_period;
  $date = $v->aps_date;
  $lono = $v->aps_lono;
  $subcon = $v->aps_contact;
  $pid = $v->aps_project;
  $system = $v->aps_system;
  $depid = $v->aps_department;
  $invno = $v->aps_invno;
  $invdate = $v->aps_invdate;
  $period_amt = $v->aps_amount;
  $vatper = $v->aps_vatper;
  $invamt = $v->aps_vattot;
  $wt = $v->aps_wt;
  $wttot = $v->aps_wttot;
  $retenrion = $v->aps_retention;
  $netmat = $v->aps_netamt;
  $totnetmat = $v->aps_totnetamt;
  $remark = $v->aps_remark;
  $periodper =  $period_amt/$conamt*100;
} ?>
                    <div class="panel-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
 
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Period:</label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control input-sm" name="period" id="period" value="<?php echo $period; ?>" readonly>
                      </div>
                </div>
              </div>
               <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">APS Date:</label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control input-sm  daterange-single" name="apsdate" id="apsdate" value="<?php echo $date; ?>" readonly>
                      </div>
                </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">APS No.:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="apsno" value="<?php echo $apscode; ?>" readonly>
                                </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">LOI No. :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="loino" id="loino" value="<?php echo $lono; ?>" readonly>
                                </div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Contractor: </label>
                    <div class="col-lg-10" >
                    <input type="text" class="form-control input-sm" name="subconname" id="subconname" value="<?php echo $venname; ?>" readonly>
                      <input type="hidden" class="form-control input-sm" name="subcon" id="subcon" value="<?php echo $subcon; ?>" readonly>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Project :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="projname" id="projname" value="<?php echo $pname; ?>" readonly>
                      <input type="hidden" class="form-control input-sm" name="projid" id="projid" value="<?php echo $pid; ?>" readonly>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">System :</label>
                    <div class="col-lg-8">
                       <select class="form-control" name="apssystem" id="apssystem">
                          <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                          <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                          <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                          <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                          <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
                        </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
               <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Department :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="depname" id="depname" value="<?php echo $depname; ?>" readonly>
                      <input type="hidden" class="form-control input-sm" name="depid" id="depid" value="<?php echo $depid; ?>" readonly>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Invoice No :</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="invno" id="invno" value="<?php echo $invno; ?>" placeholder="Please input Invoice No." required="">
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Invoice Date:</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control input-sm daterange-single" name="invdate" id="invdate" value="<?php echo $invdate; ?>" placeholder="">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Period Amount</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm text-right" name="amt" id="amt" value="<?php echo number_format($period_amt,2); ?>"  readonly>
                        <input type="hidden" class="form-control input-sm text-right" name="amth" id="amth"  value="<?php echo $period_amt; ?>" readonly>
                        <span class="input-group-addon bg-success" id="perc"><?php echo $periodper; ?>%</span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Contact Amount</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm text-right" name="camt" id="camt" value="<?php echo number_format($conamt,2); ?>" readonly>
                        <span class="input-group-addon bg-success" id="perc">100%</span>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">VAT:</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <input type="text" class="form-control input-sm text-right" name="vat" id="vat" value="<?php echo $vatper; ?>" placeholder="Please input VAT.">
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">VAT Amt:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm text-right" value="<?php echo number_format($invamt,2); ?>" name="invamt" id="invamt">
                      <input type="hidden" class="form-control input-sm text-right" value="<?php echo $invamt; ?>" name="invamth" id="invamth">
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">W/T:</label>
                    <div class="col-lg-8">
                      <div class="input-group">
                        <select class="form-control input-sm" name="wt" id="wt">
                            <?php if($wt == '1'){ ?><option value="1" selected>ไม่มีหัก</option><?php } else { ?><option value="1">ไม่มีหัก</option><?php } ?>
                            <?php if($wt == '2'){ ?><option value="2" selected>ค่าบริการ 3%</option><?php } else { ?><option value="2">ค่าบริการ 3%</option><?php } ?>
                            <?php if($wt == '3'){ ?><option value="3" selected>ค่าขนส่ง 1%</option><?php } else { ?><option value="3">ค่าขนส่ง 1%</option><?php } ?>
                            <?php if($wt == '4'){ ?><option value="4" selected>ค่าเช่า 5%</option><?php } else { ?><option value="4">ค่าเช่า 5%</option><?php } ?>
                            <?php if($wt == '5'){ ?><option value="5" selected>ค่าโฆษณา 2%</option><?php } else { ?><option value="5">ค่าโฆษณา 2%</option><?php } ?>
                            <?php if($wt == '6'){ ?><option value="6" selected>ดอกเบี้ยจ่าย 15%</option><?php } else { ?><option value="6">ดอกเบี้ยจ่าย 15%</option><?php } ?>
                            <?php if($wt == '7'){ ?><option value="7" selected>ค่าจ้างเหมา 3%</option><?php } else { ?><option value="7">ค่าจ้างเหมา 3%</option><?php } ?>
                            <?php if($wt == '8'){ ?><option value="8" selected>เงินชดเชย 3%</option><?php } else { ?><option value="8">เงินชดเชย 3%</option><?php } ?>
                            <?php if($wt == '9'){ ?><option value="9" selected>ค่าจ้างแรงงาน 3%</option><?php } else { ?><option value="9">ค่าจ้างแรงงาน 3%</option><?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">W/T Amt:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm text-right" name="wtamt" value="<?php echo $wttot; ?>" id="wtamt">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row control-label">
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Retention:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm" name="retenrion" value="<?php echo $retenrion; ?>" id="retenrion">
                    </div>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Net Amount:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control input-sm text-right" name="netamt" value="<?php echo $netmat; ?>" id="netamt">
                      <input type="hidden" class="form-control input-sm text-right" name="netamth" value="<?php echo $netmat; ?>" id="netamth">
                      <input type="hidden" class="form-control input-sm text-right" name="netamteh" id="netamteh" value="<?php echo $totnetmat; ?>">
                    </div>
                  </div>
              </div>
            </div>
            <br>
            <div class="row control-label">
              <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Remark:</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" name="remark" id="remark" cols="30" rows="3"><?php echo $remark; ?></textarea>
                    </div>
                  </div>
              </div>
            </div>
            <div class="form-group">
                     <legend class="text-muted">&nbsp;&nbsp; Detail</legend>
                    </div>
                        <div class="container">

  <ul class="nav nav-tabs nav-tabs-highlight">
  <li><a data-toggle="tab" href="#menu1"><i class=" icon-coins position-left"></i>  GL</a></li>
    <li class="active"><a data-toggle="tab" href="#home"><i class=" icon-wrench position-left"></i>Material</a></li>
    
  </ul>

  <div class="tab-content">
   <div id="menu1" class="tab-pane fade">
   <div class="row" id="glacc">
    <table class="table table-hover table-xxs ">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th class="text-center" width="5%"></th>
                      <th class="text-center">Account Code</th>
                      <th class="text-center">Account Name</th>
                      <th class="text-center">Cost Code</th>
                      <th class="text-center">Material</th>
                      <th class="text-center">Dr</th>
                      <th class="text-center">Cr</th>
                    </tr>
                  </thead>
             <tbody >
        <?php $i=1; $tott=0; foreach ($apsgl as $u) {
                ?>
                  <tr id="<?php echo $i; ?>">
                  
                               
                               <th><?php echo $i; ?><input type="hidden" class="form-control input-sm" name="id_apgl[]" id="id_apgl<?php echo $i; ?>" value="<?php echo $u->id_apgl; ?>" ></th>
                               <th><?php $y="$u->amtdr";
                               if($y=="0.00"){
                                echo "VENDER";
                               }else{
                                 echo "AMOUNT";
                               }  
                                 ?></th>
       
                  <th><div class="input-group"><input type="text" class="form-control input-sm" name="accno_gl[]" id="accno<?php echo $i; ?>" value="<?php echo $u->acct_no; ?>" ><div class="input-group-btn"><button type="button" class="accopen<?php echo $i;?> btn btn-default btn-sm btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button></div></div></th>
                  <td><input type="text" class="form-control input-sm" readonly id="accountname<?php echo $i; ?>" name="accountname_gl[]" value="<?php echo $u->act_name; ?>"/></td>
          
                  <th><div class="input-group"><input type="text" name="costidi_gl[]" id="lo_costcode<?php echo $i; ?>" class="form-control btn-xs" readonly="true" value="<?php echo $u->costcode; ?>"></div></th>
                  <th><div class="input-group"><input type="hidden" name="matidi_gl[]" id="lo_matcode<?php echo $i; ?>" readonly="true" class="form-control btn-xs" value="<?php echo $u->matcode; ?>"><input type="text" readonly="true" name="matnamei_gl[]" id="lo_matname<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->matname; ?>"></th>
                  <th><input type="text" name="dr_gl[]" id="dr_gl<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $u->amtdr; ?>"></th>
                  <th><input type="text" name="cr_gl[]" id="cr_gl<?php echo $i; ?>" class="form-control btn-xs"  value="<?php echo $u->amtcr; ?>"></th>
                  </tr>


<div id="accopen<?php echo $i;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Account <?php echo $i; ?></h5>
      </div>

      <div class="modal-body">
        <div class="loadaccchart<?php echo $i; ?>">

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<script>
$(".accopen<?php echo $i;?>").click(function(){
$('.loadaccchart<?php echo $i;?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
$(".loadaccchart<?php echo $i;?>").load('<?php echo base_url(); ?>share/accchart/<?php echo $i; ?>');
});
</script>
                    <?php $i++; $ii=$i; $tott=$tott+$u->amtdr;  } ?>
                  </tbody>
                </table>
    </div>
    </div>


    <div id="home" class="tab-pane fade in active">
                   <div class="row" id="table">
                     <div id="table table-responsive">
                      <table class="table table-bordered table-striped table-hover table-xxs">
                        <thead>
                          <tr>
                        <th class="text-center" width="5%">No.</th>
                    <th class="text-center" width="15%">รหัสสินค้า</th>
                    <th class="text-center" width="20%">ชื่อสินค้า</th>
                    <th class="text-center" width="10%">ปริมาณ</th>
                    <th class="text-center" width="15%">หน่วย</th>
                   
                    <th class="text-center" width="15%">จำนวนเงิน </th>
                          </tr>
                        </thead>


                        <?php  foreach ($apsloi as $e) {
                              $apsd = $this->db->query("select * from aps_detail where apsi_ref='$e->aps_code'");
                              $resi = $apsd->result();
                              ?>
                              <?php $tot=0; $i=1; foreach ($resi as $r) {?>
                              <?php if ($e->aps_period==$period) {?>

                                  <tr>
                                    <th><?php echo $i; ?><input type="hidden" name="chki[]" id="chki<?php echo $i; ?>" value="I"></th>
                                    <th><input type="text" name="matidi[]" id="lo_matcode<?php echo $i; ?>" readonly="true" class="form-control btn-xs" value="<?php echo $r->apsi_matcode; ?>"><input type="hidden" name="apsiid[]" id="apsi_id" value="<?php echo $r->apsi_id; ?>"></th>
                                    <th><input type="text" readonly="true" name="matnamei[]" id="lo_matname<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $r->apsi_matname; ?>">
                                    </th>
                                    
                                    <th><input type="text"  name="qtyi[]" id="lo_qty<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo $r->apsi_qty; ?>"></th>
                                    <th><input type="text" name="uniti[]" id="lo_unit<?php echo $i; ?>" class="form-control btn-xs" readonly="true" value="<?php echo $r->apsi_unit; ?>"></th>
                                    <th><input type="text"  name="amounti[]" id="lo_priceunit<?php echo $i; ?>" class="form-control btn-xs" value="<?php echo number_format($r->apsi_amount,2); ?>"></th>                                 
                                  </tr>



                                  <?php } ?>
                                  <?php $i++; $ii=$i; $tot=$tot+$r->apsi_amount; } ?>
                              <?php } ?>
                                 <tr>
                  <th class="text-center btn-xs" colspan="5">Total.</th>
                  <th class="text-center"><input type="text" name="" id="" class="form-control btn-xs" value="<?php echo $tot; ?>"></th>
   
                  
                    
                  </tr> 
                        </tbody>
                      </table>
                    </div>
                    </div>
    </div>
   
  </div>
</div>
                    <br>
                    <div class="modal-footer">
                        <div class="form-group">

                          <button type="submit" class="bsave btn btn-primary btn-xs" ><i class="icon-floppy-disk position-left"></i> Save</button>
                          <a href="<?php echo base_url(); ?>ap_print/aps_print_form/<?php echo $apscode; ?>" class="btn btn-default btn-xs"><i class="icon-printer4"></i> Print</a>
                          <a href="<?php echo base_url(); ?>ap/open_aps" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                        </div>
                    </div>
                </div>
      </div>
      </fieldset>
      </form>
          <!-- Footer -->
          <div class="footer text-muted">
              © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
          </div>
          <!-- /footer -->
        </div>
</div>

  
      
 <script>
  $("#vat").keyup(function(event) {
    var amt = $("#amth").val();
    var vat = $("#vat").val();
    var vattot = amt*vat/100;
    var tt = vattot.toFixed(2);
    $("#invamt").val(formatNumber(tt)) || 0;
    $("#invamth").val(tt) || 0;
    var netamt = amt-vattot;
    var nattot = netamt.toFixed(2);
    $("#netamt").val(formatNumber(nattot))||0;
    $("#netamth").val(nattot)||0;
    $("#netamteh").val(netamt);
  });
  $("#wt").change(function(event) {
    if ($("#wt").val()==1) {
      var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 0;
      var wttot = nt*wt/100;
      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);

    }else if($("#wt").val()==2){
      var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
$("#netamth").val(jj)||0;
    $("#netamteh").val(jj);


    }else if($("#wt").val()==3){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 1;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }else if($("#wt").val()==4){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 5;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }else if($("#wt").val()==5){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 2;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }else if($("#wt").val()==6){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 15;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }else if($("#wt").val()==7){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }else if($("#wt").val()==8){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }else if($("#wt").val()==9){
       var amt = $("#amth").val();
      var vat = $("#vat").val();
      var vattot = amt*vat/100;
      var netamt = amt-vattot;

      var nt = $("#netamth").val();
      var wt = 3;
      var wttot = nt*wt/100;

      var jj = netamt-wttot;
      $("#wtamt").val(wttot);
      $("#netamt").val(formatNumber(jj))||0;
      $("#netamth").val(jj)||0;
    $("#netamteh").val(jj);
    }

  });

 </script>
