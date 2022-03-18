<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> จัดการใบสั่งซื้อสินค้า</div>
    <div class="panel-body">
   
      <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
              <a><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</button></a>
            </div>
        </div>
         <div class="col-md-3">
                    <div class="from-group">
                      <label for="">เลขทีใบสั่งซื้อ</label>
                      <input type="text" name="pono" id="pono" class="ppono form-control input-sm" value="" readonly="true">
                    </div>
                  </div>
      </div>
      <div class="row" id="gproject">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">โครงการ</label>
                <input type="text" readonly="true"  class="form-control input-sm input-sm" id="projectnam">
                <input type="text" readonly="true"  class="form-control input-sm input-sm" name="project" id="putproject">
                <span class="input-group-btn">
                  <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="code">ระบบ</label>
              <select class="form-control input-sm" name="system" id="system">
                 <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                 <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                 <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                 <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                 <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
              </select>
            </div>
          </div>
          <div class="col-xs-3" style="margin-top: 2px;">
              <label for="lpodate">วันที่สั่งซื้อ</label>
            <div class="form-group">
              <input type="text" name="podate" required="" class="form-control input-sm" id="podate">
            </div>
        </div>
      </div>
      <div class="row" id="gdepartment">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true"  class="form-control input-sm input-sm" id="dptnam">
                <input type="text" readonly="true"  class="form-control input-sm input-sm" name="department" id="putdpt">
                <span class="input-group-btn">
                  <button class="opendp btn btn-primary btn-sm" data-toggle="modal" data-target="#opendpt" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
      </div>
      <div class="row" style="margin-top:15px;">
        <div class="col-xs-6">
          <div class="input-group">
            <label for="code">ผู้ขอซื้อ</label>
            <input type="text" name="memname" id="memname" readonly="true" placeholder="จ่ายให้กับ" class="form-control input-sm">
            <input type="hidden" name="memid" id="memid">
            <span class="input-group-btn" >
              <button class="openmem btn btn-primary btn-sm" data-toggle="modal" data-target="#openme" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
            </span>
          </div>
        </div>
      </div> <!-- end row -->
      <div class="row" style="margin-top:15px;">
        <div class="col-lg-6">
          <div class="input-group">
            <label for="">ผู้ขาย</label>
            <input type="text" class="form-control input-sm" readonly="true" placeholder="กรอกชื่อร้านค้า" name="vender" id="vender1">
            <span class="input-group-btn">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#open" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
        <div class="col-xs-3" >
          <div class="form-group">
            <label for="team">เงื่อนไขชำระ</label>
            <input type="text" name="team" placeholder="กรอกเงื่อนไขการชำระ" id="team" class="form-control input-sm">
          </div>
        </div>
          <div class="col-xs-3">
            <div class="form-group">
              <label for="contact">เบอร์ติดต่อ</label>
              <input type="text" name="contact" placeholder="กรอกเบอร์โทรศํพท์" id="tel" class="form-control input-sm">
            </div>
          </div>
      </div> <!-- end row -->
      <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
            <label for="prno">ใบขอซื้อ</label>
				    <input type="text" name="prno" id="prno" placeholder="กรอกเลขที่ใบขอซื้อ" class="form-control input-sm">
          </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
              <label for="contactno">เลขที่สัญญา</label>
              <input type="text" name="contactno"  id="contactno" placeholder="กรอกเลขที่สัญญา" class="form-control input-sm">
            </div>
        </div>
        <div class="col-xs-3">
          <div class="form-group">
            <label for="quono">ใบเสนอราคา</label>
            <input type="text" name="quono" id="quono" placeholder="กรอกเลขที่เสนอราคา" class="form-control input-sm">
          </div>
        </div>
        <div class="col-xs-3" style="margin-top: 2px;">
          <div class="form-group">
            <label for="deliverydate">วันที่ส่งมอบ</label>
            <input type="text" name="deliverydate" class="form-control input-sm" id="deliverydate">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <div class="form-group">
            <label for="place">สถานที่ส่งของ</label>
            <textarea type="text" rows="4" cols="50" name="place" id="place" placeholder="กรอกสถานที่ส่งของ" class="form-control input-sm"></textarea>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="form-group">
            <label for="place">หมายเหตุ</label>
            <textarea type="text" rows="4" cols="50" name="remark" id="remark" placeholder="กรอกหมายเหตุ" class="form-control input-sm"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-3">
          <button type="submit" class="btn btn-primary" id="savemaster" name="button">บันทึก</button>
        </div>
      </div>

    </div>
 </div>
 <div id="loaddetail">

 </div>


 <!--  MOdal po detail -->
<div class="modal fade" id="modalsavemaster" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
        <form method="post" action="<?php echo base_url();?>po/addpo_detail">
          <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    <label for="matname">รายการซื้อ</label><Br>
                    <a data-toggle="modal"   data-target="#gencode" id="vgencode" class="btn  btn-primary">Material Name : xxxxx</a>
                    <input type="hidden" id="matcodeb6" name="matcode" placeholder="กรอกรายการซื้อ" class="form-control">
                    <input type="hidden" id="matname" name="matname" placeholder="กรอกรายการซื้อ" class="form-control">
          </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="costname">รายการต้นทุน</label><br>
                    <a data-toggle="modal"  data-target="#costcode" id="gcostcode" class="btn  btn-primary">CostCode : xxxxx</a>
                    <input type="hidden" id="codecostcode" name="costcode"  placeholder="กรอกรายการต้นทุน" readonly="true" class="form-control">
                    <input type="hidden" id="costname" name="costname"  placeholder="กรอกรายการต้นทุน" readonly="true" class="form-control">

                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="qty">ปริมาณ</label>
                          <input type="text" id="pqty" name="qty"  placeholder="กรอกปริมาณ" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                          <label for="unit">หน่วย</label>
                          <input type="text" id="punit" name="unit" placeholder="กรอกหน่วย" class="form-control">
                </div>
              </div>
          </div>
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="price_unit">ราคา/หน่วย</label>
                          <input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                          <label for="amount">จำนวนเงิน</label>
                          <input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control">
                </div>
              </div>
          </div>
           <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                     <label for="endtproject">ส่วนลด 1 (%)</label>
                     <input type='text' id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="form-control"  />
                  </div>
                </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label for="endtproject">ส่วนลด 2 (%)</label>
                         <input type='text' id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" />
                      </div>
                    </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                   <label for="endtproject">ส่วนลดพิเศษ</label>
                   <input type='text' id="pdiscex" name="discountper2"class="form-control" />
                  </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                     <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                     <input type='text' id="pdisamt" name="disamt" class="form-control" />
                    </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">VAT</label>
                      <select class="form-control" id="ccvat" name="cvat">
                                  <option value="1">Include VAT</option>
                                  <option value="2">Exclude VAT</option>
                                  <option value="3">Not VAT</option>
                      </select>
                  </div>
                </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">VAT</label>
                     <input type='text' id="pvat" name="vat" class="form-control" />
                   </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                     <label for="endtproject">จำนวนเงินสุทธิ</label>

                     <input type='text'id="pnetamt" name="netamt" class="form-control" />
                   </div>
                  </div>
            </div>
          <div class="row">
            <div class="col-md-12">
                  <div class="form-group">
                     <label for="endtproject">หมายเหตุ</label>

                     <input type='text' id="premark" name="remark" class="form-control" />
                  </div>
            </div>
          </div>

           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <input type="hidden" name="poid" value="">
                    <button type="submit" id="loaddetai"  class="btn btn-primary">ยืนยันการเพิ่มข้อมูล</button>
                </div>
              </div>
          </div>


          </form>
      </div><!-- panal body -->
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

    </div>
    </div>
  </div>
</div>  <!-- end modal PO Detail -->




 <!-- modal เลือกผู้ขอซื้อ -->
  <div class="modal fade" id="openme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                 <table class="table table-bordered table-striped table-hover" >
       <thead>
         <tr>
           <th>No.</th>
           <th>ชื่อผู้ขอเบิก</th>
           <th>แผนก/โครงการ</th>
           <th width="5%">จัดการ</th>
         </tr>
       </thead>
       <tbody>
           <?php   $n =1;?>
           <?php foreach ($resmem as $val){ ?>
         <tr>
          <th scope="row"><?php echo $n;?></th>
           <td><?php echo $val->m_name; ?></td>
           <td><?php echo $val->department_title; ?><?php echo $val->project_name; ?></td>
             <td><button class="openmem btn btn-xs btn-block btn-info" data-toggle="modal"  data-mname="<?php echo $val->m_name;?>" data-mid="<?php echo $val->m_id;?>"  data-dismiss="modal">เลือก</button></td>
         </tr>
           <?php $n++; } ?>
       </tbody>
     </table>
             </div>
         </div>
     </div>
   </div>
 </div> <!--end modal -->

<!-- modal เลือกร้านค้า -->
 <div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="datasource" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>ชื่อร้านค้า</th>
          <th>ที่อยู่ร้านค้า</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($res as $val){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->vender_name; ?></td>
          <td><?php echo $val->vender_address; ?></td>
            <td><button class="openstore btn btn-xs btn-block btn-info" data-toggle="modal"  data-vname="<?php echo $val->vender_name;?>" data-crteam="<?php echo $val->vender_credit;?>" data-vtel="<?php echo $val->vender_tel; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->


<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="projpaginate" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>รหัสโครงการ</th>
          <th>ชื่อโครงการ</th>
          <th>ที่อยู่โครงการ</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getproj as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
         <td><?php echo $valj->project_code; ?></td>
          <td><?php echo $valj->project_name; ?></td>
          <td><?php echo $valj->project_address; ?></td>
            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid="<?php echo $valj->project_id;?>" data-projname="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->


<!-- modal เลือกใบขอซื้อ -->
 <div class="modal fade" id="openpr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกใบขอซื้อ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>เลขที่ใบขอซื้อ</th>
          <th>ผู้ขอซื้อ</th>
          <th>โครงการ</th>
          <th>รายละเอียด</th>
          <th>สถานะใบขอซื้อ</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getpr as $valu){ ?>
        <tr>
         <th scope="row"><?php echo $valu->pr_prno;?></th>
          <td><?php echo $valu->pr_reqname; ?></td>
          <td><?php echo $valu->project_name; ?><?php echo $valu->department_title; ?></td>
          <td><?php echo $valu->pr_remark; ?></td>
          <td><?php if($valu->pr_status=="enable") {echo '<span style="color:#03ab03;text-align:center;"> อนุมัติแล้ว </span>';} ?></td>
            <td><button class="openpr btn btn-xs btn-block btn-info" data-toggle="modal" data-vreqname="<?php echo $valu->pr_reqname;?>" data-project="<?php echo $valu->pr_project;?>" data-vsystem="<?php echo $valu->pr_system; ?>" data-vprno="<?php echo $valu->pr_prno; ?>"
              data-vdelivery="<?php echo $valu->pr_deliplace;?>" data-vdepartcode="<?php echo $valu->department_code; ?>" data-vdepart="<?php echo $valu->department_title; ?>" data-vdelidate="<?php echo $valu->pr_delidate; ?>" data-vremark="<?php echo $valu->pr_remark; ?>" data-projname="<?php echo $valu->project_name; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal เลือกแผนก -->
 <div class="modal fade" id="opendpt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>รหัสแผนก</th>
          <th>ชื่อแผนก</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getdep as $valj){ ?>
        <tr>
         <td><?php echo $valj->department_code; ?></td>
          <td><?php echo $valj->department_title; ?></td>
            <td><button class="opendp btn btn-xs btn-block btn-info" data-toggle="modal"  data-depid="<?php echo $valj->department_id;?>" data-depname="<?php echo $valj->department_title;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<script>
$('#loaddetai').click(function(){
  $('#loaddetail').load('<?php echo base_url(); ?>office/po_detail');
});
</script>


<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
 <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />

<script>
        // $(document).ready(function() {
            $("#podate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
            $("#deliverydate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
        // });
</script>


<script>
  $(".openstore").click(function() {
     $("#vender1").val($(this).data('vname'));
     $("#team").val($(this).data('crteam'));
     $("#tel").val($(this).data('vtel'));
     $('#open').modal('hide');
  });
  </script>
  <script>
  $(".openpr").click(function(){
    $("#memname").val($(this).data('vreqname'));
    $("#putproject").val($(this).data('project'));
    $('#projectnam').val($(this).data('projname'));
    $('#dptnam').val($(this).data('vdepart'));
    $("#putdpt").val($(this).data('vdepartcode'));
    $("#system").val($(this).data('vsystem'));
    $("#prno").val($(this).data('vprno'));
    $("#place").val($(this).data('vdelivery'));
    $("#deliverydate").val($(this).data('vdelidate'));
    $("#remark").val($(this).data('vremark'));
    var pr = $(this).data('vprno');
    $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail'+'/'+pr);
   
  });
  </script>
  <script>
    $(".openproj").click(function(){
      $("#putproject").val($(this).data('projid'));
      $('#projectnam').val($(this).data('projname'));
      $("#putdpt").val("");
      $('#dptnam').val("");
    });
  </script>
  <script>
    $(".opendp").click(function(){
      $("#putdpt").val($(this).data('depid'));
      $('#dptnam').val($(this).data('depname'));
      $("#putproject").val("");
      $('#projectnam').val("");
    });
  </script>
  <script>
    $(".openmem").click(function(){
      $("#memname").val($(this).data('mname'));
      $("#memid").val($(this).data('mid'));
    });
  </script>
  <script>
    // $(document).ready(function() {
      $("#pqty,#pprice_unit").keyup(function(){
     if(isNaN($("#pqty").val()))
               {
                   $("#pqty").val('');
               }
      if(isNaN($("#pprice_unit").val()))
            {
                   $("#pprice_unit").val('');
            }
                var sum  = parseFloat($("#pqty").val())*parseFloat($("#pprice_unit").val()) || 0;
                $("#pamount").val(sum);


                 var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;
   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   $('#pdisamt').val(sumdis)|| 0;


    var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;

   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   var sumdis2 = (sumdis*parseFloat($("#pdiscper2").val()))/100 || 0;
   var sumdisf = (sumdis-sumdis2) || 0;
   $('#pdisamt').val(sumdisf)|| 0;


   var sumdisex = sumdisf-parseFloat($("#pdiscex").val()) || 0;
    $('#pdisamt').val(sumdisex)|| 0;

    /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }

});
$("#pdiscper1").keyup(function(){

   var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;
   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   $('#pdisamt').val(sumdis)|| 0;;

     /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
$("#pdiscper2").keyup(function(){
 var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;

   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   var sumdis2 = (sumdis*parseFloat($("#pdiscper2").val()))/100 || 0;
   var sumdisf = (sumdis-sumdis2) || 0;
   $('#pdisamt').val(sumdisf) || 0;

     /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
$("#pdiscex").keyup(function(){
 var disamt = (parseFloat($("#pamount").val())*parseFloat($("#pdiscper1").val()))/100 || 0;

   var sumdis =  parseFloat($("#pamount").val())-disamt || 0;
   var sumdis2 = (sumdis*parseFloat($("#pdiscper2").val()))/100 || 0;
   var sumdisf = (sumdis-sumdis2) || 0;
   var sumdisex = sumdisf-parseFloat($("#pdiscex").val()) || 0;
    $('#pdisamt').val(sumdisex)|| 0;

      /// เลือก vat
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
$("#ccvat").change(function(){
     if ($("#ccvat").val()=="1")
       {
                var sumvat =  $('#pdisamt').val()*7/100 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="2")
       {
                var sumvat =  $('#pdisamt').val()*7/107 || 0;
                var invat = parseFloat($('#pdisamt').val())+sumvat || 0;
                $('#pvat').val(sumvat)|| 0;
                $('#pnetamt').val(invat)|| 0;
       }
     else if ($("#ccvat").val()=="3")
      {
               var i ="0";
             var invat = parseFloat($('#pdisamt').val()) || 0;
              $('#pvat').val(i);
             $('#pnetamt').val(invat)|| 0;
      }
});
    // });
  </script>

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();
    $('#projpaginate').DataTable();
    
// } );
</script>


<script>
$('#savemaster').click(function(){
  var url="<?php echo base_url(); ?>index.php/testpo/addpo";
  var dataSet={
                project : $('#putproject').val(),
                system : $('#system').val(),
                podate : $('#podate').val(),
                department : $('#putdpt').val(),
                memname : $('#memname').val(),
                vender : $('#vender').val(),
                team : $('#team').val(),
                contact : $('#contact').val(),
                prno : $('#prno').val(),
                contactno : $('#contactno').val(),
                quono : $('#quono').val(),
                deliverydate : $('#deliverydate').val(),
                place : $('#place').val(),
                remark : $('#remark').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////     
  alert("save complete");
  $('.ppono').val(data);
      });
////////////////////////////////
  });

</script>


