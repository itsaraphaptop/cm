

<div class="row" id="headddd" style="margin-top:-140px;">
  
      <div class="col-xs-12">
        <h1>Account Payable System <?php echo $depid; ?></h1>
        <h3>ระบบจัดการใบเบิกเงินสด</h3>
        <hr>
      </div>
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> บันทึกใบเบิกเงินสด</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="code">เลขที่ใบเบิกเงินสด</label>
            <input type="text" id="doccode" name="code" placeholder="เลขที่ใบเบิกเงินสด" class="form-control input-sm" readonly="true">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="code">วันที่</label>
          <div class='form-group'>
            <input type="text" name="docdate" class="form-control input-sm" id="datepicker" required autofocus />
          </div>
        </div>
        </div>
      </div><!-- end row form -->
      <?php if ($depid=="") {?>
      <div class="row">
        <div class="col-md-6" >
            <div class="input-group">
                 <label for="project1">โครงการ</label>
                <input type="text" readonly="true" value="<?php echo $projname; ?>"  class="form-control input-sm input-sm input-sm" id="projectnam">
                <input type="hidden" readonly="true" value="<?php echo $projid; ?>"  class="form-control input-sm input-sm input-sm" name="project" id="putproject">
                <span class="input-group-btn">
                 <button class="openproj btn btn-defualt btn-sm" disabled="" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                  <!-- <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button> -->
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
        </div>
         <?php }else{ ?>

                <?php } ?>
        <div class="row">
        <?php if ( $depid=="") {?>
          
       <?php }else{ ?>
        <div class="col-md-6" >
            <div class="input-group">
             <label for="project1">แผนก</label>
                <input type="text" readonly="true" value="<?php echo $dep; ?>" class="form-control input-sm input-sm input-sm" id="dptnam">
                <input type="hidden" readonly="true" value="<?php echo $depid; ?>" class="form-control input-sm input-sm input-sm" name="department" id="putdpt">
                <span class="input-group-btn">
                  <button class="opendp btn btn-primary btn-sm" data-toggle="modal" data-target="#opendpt" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                </span>
            </div>
          </div>
          <?php } ?>
      </div><!-- end row -->
      <div class="row"  style="margin-top:15px;">
        <div class="col-md-3">
          <div class="form-group">
            <label for="code">ประเภทผู้ขาย</label>
            <select class="form-control input-sm" name="vender_type" id="vender_type" onchange="getval(this);">
             <?php if($typevender == '1'){ ?><option value="Employee" selected>Employee</option><?php } else { ?><option value="Employee">Employee</option><?php }?>
             <?php if($typevender == '2'){ ?><option value="External" selected>External</option><?php } else { ?><option value="External">External</option><?php }?>
           </select>
          </div>
        </div><!-- end col-md-3 -->
        <div class="col-md-9" >
          <div class="input-group">
            <label for="code">จ่ายให้กับ</label>
            <input type="text" name="vender" id="memname" placeholder="จ่ายให้กับ" value="<?php echo $uname; ?>" class="form-control input-sm">
            <input type="hidden" name="memid" id="memid">
            <input type="text" name="vender" id="venname" placeholder="จ่ายให้กับ" class="form-control input-sm">
            <input type="hidden" name="memid" id="venid">
            <span class="input-group-btn" >
              <button class="openemp btn btn-primary btn-sm" data-toggle="modal" data-target="#open" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
              <button class="openext btn btn-primary btn-sm" data-toggle="modal" data-target="#openvenh" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
            </span>
          </div>
        </div><!-- end col-md-3 -->
       </div><!-- end row form -->
       <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="detail">รายละเอียด</label>
              <textarea type="text" rows="4" class="form-control input-sm" id="remark" name="remark" placeholder="กรอกรายละเอียด"></textarea>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
                <button class="saveprh btn btn-primary" type="submit" id="undo">บันทึก</button>
                <button class="editpo btn btn-primary" type="submit" id="editpo">แก้ไข</button>
                <button class="adddetail btn btn-primary" type="submit" id="adddetail">เพิ่มรายการ</button>
                <button class="print btn btn-primary" target="blank">พิมพ์</button>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
// $(document).ready(function(){
  $("#venname").hide();
  $("#venid").hide();
  $(".openext").hide();
  $('#memname').prop('disabled', true);
  $("#taxchk").hide();
    $("#whtaxchk").hide();
// });
    function getval(sel) {
       if(sel.value=="External")
       {
         $("#venname").show();
         $("#venid").show();
        $("#memname").hide();
        $("#memid").hide();
        $(".openemp").hide();
        $(".openext").show();
       }
       else
       {
        $("#venname").hide();
         $("#venid").hide();
        $("#memname").show();
        $("#memid").show();
        $(".openemp").show();
        $(".openext").hide();
       }
    }
</script>
<!-- detail -->
<div class="panel panel-primary addboxpri">
  <div class="panel-heading">เพิ่มรายการ</div>
  <div class="panel-body">
                        <div class="row">
                          <div class="col-xs-6">
                          <label for="">รายการซื้อ</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                            </span>
                              <input type="text" id="newmatname"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                              <input type="hidden" id="newmatcode"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="list" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                <input type="hidden" id="vcostcode" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
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
                            <div class="col-xs-12">
                               <div class="input-group">
                                  <label for="">ร้านค้า</label>
                                  <input type="text" class="form-control input-sm" placeholder="กรอกชื่อร้านค้า" name="vender" id="vender">
                                  <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openven" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                                </div><!-- /input-group -->
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
                          <div class="col-xs-3">
                            <input type="checkbox" id="chktax"> ใบกำกับภาษี
                          </div>
                          <div class="col-xs-3">
                            <input type="checkbox" id="whchktax"> หัก ณ ที่จ่าย
                          </div>
                        </div>
                        <div class="row" id="taxchk">
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label for="">เลขที่ใบกำกับภาษี</label>
                              <input type="text" class="form-control input-sm" id="taxno" placeholder="กรอกใบกำกับภาษี">
                            </div>
                          </div>
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label for="">วันที่ใบกำกับภาษี</label>
                              <input type="text" class="taxdate form-control input-sm" id="taxdate" placeholder="กรอกใบกำกับภาษี">
                            </div>
                          </div>
                          <div class="col-xs-3">
                          <label for="">ภาษี</label>
                            <div class="input-group">                              
                              <input type="text" class="taxdate form-control input-sm" id="taxv" placeholder="ภาษี" aria-describedby="basic-addon2">
                              <span class="input-group-addon" id="basic-addon2">%</span>
                            </div>
                          </div>
                        </div>
                        <div class="row" id="whtaxchk">
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
                              <input type="text" class="form-control input-sm" id="totwh" placeholder="ยอดหัก ณ ที่จ่าย">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="addrvender">จำนวน</label>
                                        <input type="text" id="amount" name="amount" placeholder="กรอกจำนวน" class="form-control">
                              </div>
                            </div> 
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="unitprice">ราคา</label>
                                    <input type="text" id="unitprice" name="unitprice" placeholder="กรอกราคาต่อหน่วย"  class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-3">
                               <div class="input-group">
                                  <label for="unit">หน่วย</label>
                                  <input type="text" id="unit" name="unit" placeholder="กรอกหน่วย" class="punit form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                              </div>
                            </div>  
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="addrvender">จำนวนเงิน</label>
                                        <input type="text" id="netamt" name="netamt" placeholder="กรอกจำนวนเงิน" class="form-control">
                              </div>
                            </div> 
                        </div>
                       
                   <!--         <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="dis">ส่วนลด</label>
                                        <input type="text" id="disc" name="disc" placeholder="กรอกส่วนลด"  class="form-control">
                                    </div>
                                </div>
                            </div> -->
                    
                                                                                               
                     
                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <button type="submit"  class="opdetail btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</button>
                                     
                              </div>
                            </div>  
                        </div>  
                        </div>
                        </div> 

<!-- end detail -->
<!-- modal -->
<!-- รายการซื้อใหม่ -->
<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="opnewmat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="datatable" class="table table-hover" >
      <thead>
        <tr>
          <th>รหัสวัสดุ</th>
          <th>ชื่อวัสดุ</th>
          <th>ขนาด</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($allmaterial as $vali){ ?>
        <tr>
         <td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?></td>
          <td><?php echo $vali->matgroup_name; ?></td>
          <td><?php echo $vali->matsubgroup_name; ?></td>
          <td><?php echo $vali->matname; ?></td>
            <td><button class="opennmat btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?>"  data-nmatgroupname="<?php echo $vali->matgroup_name; ?><?php echo $vali->matsubgroup_name; ?>" data-munit="<?php echo $vali->matname; ?>" data-dismiss="modal">เลือก</button></td>
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
  $(".opennmat").click(function(event) {
    $("#newmatname").val($(this).data('nmatgroupname'));
    $("#newmatcode").val($(this).data('mmatcode'));
    $("#unit").val($(this).data('munit'));

  });
</script>
<script>
$('#chk').click(function(event) {
  if($('#chk').prop('checked')) {
   $('#newmatname').prop('disabled', false);
} else {
    $('#newmatname').prop('disabled', true);
}
});
$('#chktax').click(function(event) {
  if($('#chktax').prop('checked')) {
    $("#taxchk").show();
    $("#taxv").val('7');
 var vat = ((parseFloat($("#amount").val())*parseFloat($("#unitprice").val())))*parseFloat($("#taxv").val())/100 || 0;
        var wh = parseFloat($("#totwh").val());
        var sum  = (parseFloat($("#amount").val())*parseFloat($("#unitprice").val())) || 0;
        var tot = (sum+vat)-wh || 0;
        $("#netamt").val(tot);

} else {
    $("#taxchk").hide();
   $('#totwh').val('0');
 var vat = ((parseFloat($("#amount").val())*parseFloat($("#unitprice").val())))*parseFloat($("#taxv").val())/100 || 0;
        var wh = parseFloat($("#totwh").val());
        var sum  = (parseFloat($("#amount").val())*parseFloat($("#unitprice").val())) || 0;
        var tot = (sum+vat)-wh || 0;
        $("#netamt").val(tot);
}
});
$('#whchktax').click(function(event) {
  if($('#whchktax').prop('checked')) {
    $("#whtaxchk").show();

} else {
    $("#whtaxchk").hide();
}
});

</script>

<!-- จบรายการซื้อ -->
<div id="loaddatadetail">
  
</div>

<!-- modal materail -->
<div class="modal fade" id="gencode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="type1" class="col-xs-6">
                    <h4>รายการประเภทสินค้า 1</h4>
                    <select multiple class="form-control" id="box1" style="height:350px;">
                    </select>
                </div>
                <div id="type2" class="col-xs-6">
                    
                     <h4>รายการประเภทสินค้า 2</h4>
                     <select multiple class="form-control" id="box2" style="height:350px;">
                     
</select>
                     
                </div>
                <div id="type3" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 3</h4>
                    <select multiple class="form-control" id="box3" style="height:350px;">
                       
</select>
                </div>
                <div id="type4" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 4</h4>
                    <select multiple class="form-control" id="box4" style="height:350px;">
                       
</select>
                </div>
                <div id="type5" class="col-xs-6">
                    <select multiple class="form-control" id="box5" style="height:350px;">
                        
</select>
                </div>
                
                <div class="col-xs-12" id="gencodebtn">
                    <hr>
                    <button class="btn btn-primary" id="btngenmatcode" style="float: right;" data-dismiss="modal">สร้าง MatCode</button>
                </div>
            </div>
        </div>
    </div> 
  </div> 
</div><!-- end modal box material -->

<!-- modal เลือกร้านค้า -->
 <div class="modal fade" id="openven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
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
          <?php foreach ($resv as $val){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->vender_name; ?></td>
          <td><?php echo $val->vender_address; ?></td>
            <td><button class="openstore btn btn-xs btn-block btn-info" data-toggle="modal"  data-vname="<?php echo $val->vender_name;?>" data-addr="<?php echo $val->vender_address; ?>" data-crteam="<?php echo $val->vender_credit;?>" data-vtel="<?php echo $val->vender_tel; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!-- modal เลือกร้านค้า -->
 <div class="modal fade" id="openvenh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกร้านค้า</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
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
          <?php foreach ($resv as $val){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->vender_name; ?></td>
          <td><?php echo $val->vender_address; ?></td>
            <td><button class="openvensmo btn btn-xs btn-block btn-info" data-toggle="modal"  data-vnameh="<?php echo $val->vender_name;?>" data-addrh="<?php echo $val->vender_address; ?>" data-crteam="<?php echo $val->vender_credit;?>" data-vtel="<?php echo $val->vender_tel; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->


<!-- modal เลือกรผู้ขอเบิก -->
 <div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                <table class="table table-hover" >
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
          <?php foreach ($res as $val){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->m_name; ?></td>
          <td><?php echo $val->department_title; ?><?php echo $val->project_name; ?></td>
            <td><button class="openr btn btn-xs btn-block btn-info" data-toggle="modal"  data-mname="<?php echo $val->m_name;?>" data-mid="<?php echo $val->m_id;?>"  data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
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
        <div class="panel-body">
            <div class="row">
                <table id="example" class="table table-hover" >
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
        <div class="panel-body">
            <div class="row">
                <table class="table table-hover" >
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
  </div>
</div> <!--end modal -->

<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row">
                <table class="table table-hover" >
      <thead>
        <tr>
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openun btn btn-xs btn-block btn-info" data-toggle="modal"  data-unit="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2" style="height:150px;">

</select>

                </div>
                <div id="tabcost3" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3" style="height:150px;">
                        </select>
                                   </div>
                 <div id="tabcost4" class="col-xs-6">
                   <h4>รายการประเภทต้นทุน 4</h4>
                    <select multiple class="form-control" id="cost4" style="height:150px;">

</select>

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
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->

<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
<link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<script>
  // $(document).ready(function() {
$(".addboxpri").hide();
$("#editpo").hide();
$("#adddetail").hide();
$(".print").hide();
$('#newmatname').prop('disabled', true);
$("#taxv").val('0');

    $("#codeup").click(function(){});
     $("#gencodebtn").hide();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();
     $('#cost-control').hide();
     $("#cost4").hide();
     $("#box6").hide();


     $('#gencode').on('hidden.bs.modal', function () {
     $("#type1").show();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();

     $("#gencodebtn").hide();


     });


     $('#box1').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1" ).change(function() {
           var b1 = $('#box1').val();
           $('#box2').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2").show();
          $('#vgencode').html('');

    });
    $( "#box2" ).change(function() {
         $("#type1").hide();
         var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         $('#box3').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3").show();
    });
    $( "#box3" ).change(function() {
        var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         var b3 = $('#box3').val();
         $('#box4').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4").show();
         $("#type2").hide();
    });
    $( "#box4" ).change(function() {
         //$("#type4").hide();
         $('#type3').hide();
         $("#gencodebtn").show();
         //$("#type5").show();

    });
    $("#box5").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode').click(function(){
     var b1 = $('#box1').val();
     var b2 = $('#box2').val();
     var b3 = $('#box3').val();
     var b4 = $('#box4').val();
     var b5 = $('#box5').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){
              
              $('#matname').val(data);
              $("#list").val(data);
              $('#vgencode').html(data);
            });

    });


    $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1" ).change(function() {

         var c1 = $('#cost1').val();
         $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2").show();
         $("#tabcost4").hide();
    });
    $( "#cost2" ).change(function() {

         var c2 = $('#cost2').val();
         $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
         
    });
    $( "#cost3").change(function() {
         $("#tabcost2").hide();
         $("#tabcost4").show();
         $("#cost4").show();
         

    });
    $( "#cost4" ).change(function() {
         $("#cost-control").show();
    });
    $("#btncostup").click(function(){
       var c1 = $('#cost1').val();
     var c2 = $('#cost2').val();
     var c3 = $('#cost3').val();
     var c4 = $('#cost4').val();

     var gcostcode = c4 ;
     var codecostcode = c1+''+c2+''+c3;
     $('#vcostcode').val(codecostcode);
     $('#list').val(gcostcode);
     $('#gcostcode').html(gcostcode);
     $('#costcode').modal('hide');
     $("#tabcost4").hide();

    });


  // });
</script>
<script>
  $(".openvensmo").click(function(event) {
    $("#venname").val($(this).data('vnameh'));
    $("#memname").val('');
    $("#vender").val($(this).data('vnameh'));
    $("#addrvender").val($(this).data('addrh'));
  });
</script>
<script>
  // $(document).ready(function(){
    $("#datepicker").kendoDatePicker({
        format : "yyyy-MM-dd"
    });
    $("#taxdate").kendoDatePicker({
      format : "yyyy-MM-dd"
    });
  // });
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
$('.openr').click(function(){
  $('#memid').val($(this).data('mid'));
  $('#memname').val($(this).data('mname'));
   $("#venname").val('');
})
</script>

<script>
$('.saveprh').click(function(){
  var url="<?php echo base_url(); ?>index.php/pettycash/add_pettymaster";
  var dataSet={
    docdate: $("#datepicker").val(),
    memname: $("#memname").val(),
    venname: $("#venname").val(),
    vender_type: $("#vender_type").val(),
    putdpt: $("#putdpt").val(),
    putproject: $("#putproject").val(),
    remark: $("#remark").val(),
    system: $("#system").val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////     
  $("#doccode").val(data);
  $(".saveprh").hide();
  $("#editpo").show();
$("#adddetail").show();
$(".print").show();
////////////////////////////////
  });

});
$(".opdetail").click(function(event) {
  var gdocno = $("#doccode").val();
        var url="<?php echo base_url(); ?>index.php/pettycash/add_pettydetail";
          var dataSet={
            docno: gdocno,
            matcode: $("#newmatcode").val(),
            matname: $('#newmatname').val(),
            list: $("#list").val(),
            costcode: $("#vcostcode").val(),
            vander: $("#vender").val(),
            addrvender: $("#addrvender").val(),
            amount: $("#amount").val(),
            unitprice: $("#unitprice").val(),
            unit: $("#unit").val(),
            netamt: $("#netamt").val(),
            disc: $("#disc").val(),
            taxno: $("#taxno").val(),
            taxdate: $("#taxdate").val(),
            taxv: $("#taxv").val(),
            whtax: $('#tax').val()
            };
            $.post(url,dataSet,function(data){
              $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/pettycash/service_pettycash_detail'+'/'+gdocno);
              $(".addboxpri").hide();
              $("#matname").val('');
              $('#list').val('');
              $('#vender').val('');
              $('#addrvender').val('');
              $('#amount').val('');
              $('#unitprice').val('');
              $('#unit').val('');
              $('#netamt').val('');
              $("#newmatcode").val('');
              $('#newmatname').val('');
              $("#taxno").val('');
              $("#taxdate").val('');
              $("#taxv").val('');
              $("#vcostcode").val('');
              var b1,b2,b3,b4,b5 = 0;

                  $("#type1").show();
                  $("#type2").hide();
                   $("#type3").hide();
                   $("#type4").hide();
                   $("#type5").hide();
            });
        
});
$("#adddetail").click(function(event) {
  $(".addboxpri").show();
});
</script>


<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('.table').DataTable();
// } );
</script>

  <script>
  $('.print').click(function(){
   var pp = $('#doccode').val();
     url = "<?php echo base_url(); ?>index.php/report/pettycash"+"/"+pp;
      $(location).attr("href", url);
  });
</script>
<script>
  $(".openstore").click(function() {
     $("#vender").val($(this).data('vname'));
     $("#addrvender").val($(this).data('addr'));
     
  });
  </script>
   <script>
    $(".openun").click(function(){
      $("#unit").val($(this).data('unit'));
    });
  </script>

   <script>
    // $(document).ready(function() {
      $('#totwh').val('0');
      $("#amount,#unitprice").keyup(function(){
                var sum  = (parseFloat($("#amount").val())*parseFloat($("#unitprice").val())) || 0;
                $("#netamt").val(sum);
      });
      $('#taxv').keyup(function(event) {
        var vat = ((parseFloat($("#amount").val())*parseFloat($("#unitprice").val())))*parseFloat($("#taxv").val())/100 || 0;
        var wh = parseFloat($("#totwh").val());
        var sum  = (parseFloat($("#amount").val())*parseFloat($("#unitprice").val())) || 0;
        var tot = (sum+vat)-wh || 0;
        $("#netamt").val(tot);
      });
// });

  </script>
  <script>
  $('#tax').change(function(event) {
    var tax = $("#tax").val();
  switch (tax) {
    case '0':
          $('#totwh').val('0');
        break;
    case '1':
           var amount = $("#amount").val();
          var unitprice = $("#unitprice").val();
          var net = (amount*unitprice);
          var totwhtax = net*1/100;
          var vat = $("#taxv").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh').val(totwhtax);
          $('#netamt').val(totamount);
          $('#totwh').val(totwhtax);
    case '2':
          var amount = $("#amount").val();
          var unitprice = $("#unitprice").val();
          var net = (amount*unitprice);
          var totwhtax = net*2/100;
          var vat = $("#taxv").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh').val(totwhtax);
          $('#netamt').val(totamount);
          break;
    case '3':
          var amount = $("#amount").val();
          var unitprice = $("#unitprice").val();
          var net = (amount*unitprice);
          var totwhtax = net*3/100;
          var vat = $("#taxv").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh').val(totwhtax);
          $('#netamt').val(totamount);
          break;
    case '5':
          var amount = $("#amount").val();
          var unitprice = $("#unitprice").val();
          var net = (amount*unitprice);
          var totwhtax = net*5/100;
          var vat = $("#taxv").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh').val(totwhtax);
          $('#netamt').val(totamount);
          $('#totwh').val(totwhtax);
         break;
    case '15':
         var amount = $("#amount").val();
          var unitprice = $("#unitprice").val();
          var net = (amount*unitprice);
          var totwhtax = net*15/100;
          var vat = $("#taxv").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh').val(totwhtax);
          $('#netamt').val(totamount);
          $('#totwh').val(totwhtax);
          break;
  }
  var amount = $("#amount").val();
  var unitprice = $("#unitprice").val();
  var net = $("#netamt").val();
  var whtot = $("#totwh").val();
  var tot = (amount*unitprice)-whtot;
  $('#netamt').val(totamount);
});  
</script>
<script>
  $("#datepicker").change(function(event) {
    
  });
</script>