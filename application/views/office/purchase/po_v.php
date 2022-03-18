<form method="post" action="<?php echo base_url(); ?>index.php/po_active/addpo">
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> จัดการใบสั่งซื้อสินค้า</div>

    <div class="panel-body">
    
      <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
              <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openpr"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบขอซื้อ</a>
            </div>
        </div>
         <div class="col-md-3">
                    <div class="from-group">
                      <label for="">เลขทีใบสั่งซื้อ</label>
                      <input type="text" name="pono" id="pono" class="ppono form-control input-sm" readonly="true">
                    </div>
                  </div>
      </div>
      <div class="row" id="gproject">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">โครงการ</label>
                <input type="text" readonly="true"  class="form-control input-sm" id="projectnam" name="projectnam">
                <input type="hidden" readonly="true"   class="form-control input-sm" id="putproject" name="putproject">
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
              <input type="text" name="podate"  class="form-control input-sm" id="podate">
            </div>
        </div>
      </div>
      <div class="row" id="gdepartment">
        <div class="col-xs-6" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true"  class="form-control input-sm" id="dptnam" name="dptnam">
                <input type="hidden" readonly="true"   class="form-control input-sm" name="putdpt" id="putdpt">
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
            <input type="text" name="team"  placeholder="กรอกเงื่อนไขการชำระ" id="team" class="form-control input-sm">

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
            <input type="text" name="quono"  id="quono" placeholder="กรอกเลขที่เสนอราคา" class="form-control input-sm">
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
        <div class="col-xs-6">
        <a class="btn_insert btn btn-primary" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> เพิมรายการ</a>
          

        </div>
      </div>
      <table class="table table-hover">
          <thead>
            <tr>
              <th width="5%">No.</th>
              <th>ต้นทุน</th>
              <th>ชื่อสินค้า</th>
              <th>ปริมาณ</th>
              <th>หน่วย</th>
              <th>ราคา/หน่วย</th>
              <th>จำนวนเงิน</th>
              <th colspan="2">จัดการ</th>

            </tr>
          </thead>
          <tbody id="body">
            
          </tbody>
        </table>
        <div class="row">
        <div class="col-xs-6">
        <a class="btn_insert btn btn-primary" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span> เพิมรายการ</a>
          <button type="submit" class="btn btn-primary" id="savemaster" name="button"><span class="glyphicon glyphicon-save"></span> บันทึก</button>
          <button type="submit" class="btn btn-info" id="editmaster" name="button"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button>
          <button type="button" class="print btn btn-success" name="button" target="blank"><span class="glyphicon glyphicon-print"></span> พิมพ์</button>
        </div>
        </div>
    </div>
 </div>
</form>

<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
 <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>dist/css/toastr.css" rel="stylesheet">
<script src="<?php echo base_url();?>dist/js/toastr.js"></script>
<script>
  //  $(document).ready(function() {
            $("#podate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });

        // });
   $("#savemaster").click(function(event) {
   	if ($("#projectnam").val()=="") {toastr.error('Please Select Project');}else{toastr.success('Project name');}
   });
   
</script>
