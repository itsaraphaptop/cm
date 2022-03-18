<div class="panel panel-primary" style="font-size:11px;">
	<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายะเอียดรายการขอซื้อ</div>
          <table class="table table-bordered table-striped table-hover" >
             <thead>
               <tr>
                 <th>No.</th>
                 <th>รหัสค่าใช้จ่าย</th>
                 <th>ค่าใช้จ่าย</th>
                 <th>ร้านค้า</th>
                 <th>จำนวน</th>
                 <th>ราคาต่อหน่วย</th>
                 <th>หน่วย</th>
                 <th>จำนวนสุทธิ</th>
                 <th colspan="2" width="10">จัดการ</th>
               </tr>
             </thead>
             <tbody>
             <?php $unitprice=0; $amoun=0; $tot=0; ?>
                 <?php   $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo substr($val->pettycashi_costcode,10); ?></td>
                 <td><?php echo $val->pettycashi_expens; ?></td>
                 <td><?php echo $val->pettycashi_vender; ?></td>
                 <td><?php echo number_format($val->pettycashi_amount,2);?></td>
                 <td><?php echo $val->pettycashi_unitprice;?></td>
                 <td><?php echo $val->pettycashi_unit;?></td>
                 <td><?php echo number_format($val->pettycashi_netamt,2);?></td>
                 <td>
                   <button class="btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->pettycashi_id; ?>">แก้ไข</button></td>
                   <td><button class="del<?php echo $val->pettycashi_id;?> btn btn-xs btn-block btn-danger">ลบ</button>
                   </td>
               </tr>
<script>
  $('.del<?php echo $val->pettycashi_id;?>').click(function(event) {
    var url="<?php echo base_url(); ?>index.php/pettycash/delitempettycash";
    var dataSet={
      doccode: $("#doccode").val(),
      item: "<?php echo $val->pettycashi_id;?>"
    };
    $.post(url,dataSet,function(data){
      var docno = data;
       $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/pettycash/service_pettycash_detail'+'/'+docno);
    });     
});
</script>
                 <?php $n++;

                  $unitprice= $unitprice+$val->pettycashi_unitprice;
                        $amoun = $amoun+$val->pettycashi_amount;
                        $tot= $tot+$val->pettycashi_netamt;


                  } ?>
                        <tr>
                          <td colspan="4" align="center">รวม</td>
                          <td><?php echo number_format($amoun,2); ?></td>
                          <td colspan="2"></td>
                          <td><?php echo number_format($tot,2); ?></td>
                          <td colspan="2"></td>
                        </tr>

             </tbody>
           </table>
      </div>

<?php foreach ($resi as $val2) {?>
<div class="modal fade" id="modaleditdetail<?php echo $val2->pettycashi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
      <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <label for="matname">รายการซื้อ</label><Br>
                                  <a data-toggle="modal"   data-target="#gencode1<?php echo $val2->pettycashi_id;?>" id="vgencode1<?php echo $val2->pettycashi_id;?>" class="btn  btn-primary"><?php echo $val2->pettycashi_expens; ?></a>
                                  <input type="hidden" id="matcodeb6<?php echo $val2->pettycashi_id;?>" name="matcode" value="<?php echo $val2->pettycashi_expenscode; ?>" placeholder="กรอกรายการซื้อ" class="form-control">
                                  <input type="hidden" id="matname<?php echo $val2->pettycashi_id;?>" name="matname" value="<?php echo $val2->pettycashi_expens; ?>" placeholder="กรอกรายการซื้อ" class="form-control">
                              </div>
                            </div>  
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">รายการซื้อ</label>
                              <input type="text" class="form-control input-sm" id="list<?php echo $val2->pettycashi_id;?>"  value="<?php echo $val2->pettycashi_expens; ?>" name="list" placeholder="กรอกรายการสั่งซื้อ">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                            <label for="vender">ร้านค้า</label>
                              <div class="input-group">                                        
                                 <input type="text" id="evender<?php echo $val2->pettycashi_id;?>" value="<?php echo $val2->pettycashi_vender; ?>" name="vender" placeholder="กรอกร้านค้า" class="form-control">
                                 <span class="input-group-btn" >
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#openeditvender<?php echo $val2->pettycashi_id;?>" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                 </span>
                              </div>
                            </div>  
                        </div>
              <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
                                        <label for="addrvender">ที่อยู่ร้านค้า</label>
                                        <input type="text" id="eaddrvender<?php echo $val2->pettycashi_id;?>" value="<?php echo $val2->pettycashi_addrvender; ?>" name="addrvender" placeholder="กรอกร้านค้า" class="form-control">
                              </div>
                            </div>  
                        </div>
            
                        <div class="row">
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="addrvender">จำนวน</label>
                                        <input type="text" id="amount<?php echo $val2->pettycashi_id;?>" value="<?php echo $val2->pettycashi_amount; ?>" name="amount" placeholder="กรอกจำนวน" class="form-control">
                              </div>
                            </div> 
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <label for="unitprice">ราคาต่อหน่วย</label>
                                    <input type="text" id="unitprice<?php echo $val2->pettycashi_id;?>" value="<?php echo $val2->pettycashi_unitprice; ?>" name="unitprice" placeholder="กรอกราคาต่อหน่วย"  class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="addrvender">หน่วย</label>
                                        <input type="text" id="unit<?php echo $val2->pettycashi_id;?>" value="<?php echo $val2->pettycashi_unit; ?>" name="unit" placeholder="กรอกหน่วย" class="form-control">
                              </div>
                            </div>  
                            <div class="col-xs-3">
                              <div class="form-group">
                                        <label for="addrvender">จำนวนเงิน</label>
                                        <input type="text" id="netamt<?php echo $val2->pettycashi_id;?>" readonly="true" value="<?php echo $val2->pettycashi_netamt; ?>" name="netamt" placeholder="กรอกจำนวนเงิน" class="form-control">
                              </div>
                            </div> 
                        </div>
                         <div class="row">
                          <div class="col-xs-3">
                            <input type="checkbox" id="chktax<?php echo $val2->pettycashi_id;?>"> ใบกำกับภาษี
                          </div>
                          <div class="col-xs-3">
                            <input type="checkbox" id="whchktax<?php echo $val2->pettycashi_id;?>"> หัก ณ ที่จ่าย
                          </div>
                        </div>
                        <div class="row" id="taxchk<?php echo $val2->pettycashi_id;?>">
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label for="">เลขที่ใบกำกับภาษี</label>
                              <input type="text" class="form-control input-sm" id="taxno<?php echo $val2->pettycashi_id;?>" placeholder="กรอกใบกำกับภาษี">
                            </div>
                          </div>
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label for="">วันที่ใบกำกับภาษี</label>
                              <input type="text" class="taxdate form-control input-sm" id="taxdate<?php echo $val2->pettycashi_id;?>" placeholder="กรอกใบกำกับภาษี">
                            </div>
                          </div>
                          <div class="col-xs-3">
                          <label for="">ภาษี</label>
                            <div class="input-group">                              
                              <input type="text" class="taxdate form-control input-sm" id="taxv<?php echo $val2->pettycashi_id;?>" readonly="true" placeholder="ภาษี" aria-describedby="basic-addon2">
                              <span class="input-group-addon" id="basic-addon2">%</span>
                            </div>
                          </div>
                        </div>
                        <div class="row" id="whtaxchk<?php echo $val2->pettycashi_id;?>">
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label type="tax"> หักภาษี ณ ที่จ่าย</label>
                                  <select class="form-control input-sm" name="tax" id="tax<?php echo $val2->pettycashi_id;?>">
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
                              <input type="text" class="form-control input-sm" id="totwh<?php echo $val2->pettycashi_id;?>" readonly="true" placeholder="ยอดหัก ณ ที่จ่าย">
                            </div>
                          </div>
                        </div>
                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <button class="edititem<?php echo $val2->pettycashi_id;?> btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</button>
                                     
                              </div>
                            </div>  
                        </div>
      </div>
    </div>
  </div>
</div>  <!--  end model รายการ -->
<script>

// $(document).ready(function(){
  $("#taxchk<?php echo $val2->pettycashi_id;?>").hide();
    $("#whtaxchk<?php echo $val2->pettycashi_id;?>").hide();
// });
$('#chk<?php echo $val2->pettycashi_id;?>').click(function(event) {
  if($('#chk<?php echo $val2->pettycashi_id;?>').prop('checked')) {
   $('#newmatname<?php echo $val2->pettycashi_id;?>').prop('disabled', false);
} else {
    $('#newmatname<?php echo $val2->pettycashi_id;?>').prop('disabled', true);
}
});
$('#chktax<?php echo $val2->pettycashi_id;?>').click(function(event) {
  if($('#chktax<?php echo $val2->pettycashi_id;?>').prop('checked')) {
    $("#taxchk<?php echo $val2->pettycashi_id;?>").show();
    $("#taxv<?php echo $val2->pettycashi_id;?>").val('7');
 var vat = ((parseFloat($("#amount<?php echo $val2->pettycashi_id;?>").val())*parseFloat($("#unitprice<?php echo $val2->pettycashi_id;?>").val())))*parseFloat($("#taxv<?php echo $val2->pettycashi_id;?>").val())/100 || 0;
        var wh = parseFloat($("#totwh<?php echo $val2->pettycashi_id;?>").val());
        var sum  = (parseFloat($("#amount<?php echo $val2->pettycashi_id;?>").val())*parseFloat($("#unitprice<?php echo $val2->pettycashi_id;?>").val())) || 0;
        var tot = (sum+vat)-wh || 0;
        $("#netamt<?php echo $val2->pettycashi_id;?>").val(tot);

} else {
    $("#taxchk<?php echo $val2->pettycashi_id;?>").hide();
   $('#totwh<?php echo $val2->pettycashi_id;?>').val('0');
 var vat = ((parseFloat($("#amount<?php echo $val2->pettycashi_id;?>").val())*parseFloat($("#unitprice<?php echo $val2->pettycashi_id;?>").val())))*parseFloat($("#taxv<?php echo $val2->pettycashi_id;?>").val())/100 || 0;
        var wh = parseFloat($("#totwh<?php echo $val2->pettycashi_id;?>").val());
        var sum  = (parseFloat($("#amount<?php echo $val2->pettycashi_id;?>").val())*parseFloat($("#unitprice<?php echo $val2->pettycashi_id;?>").val())) || 0;
        var tot = (sum+vat)-wh || 0;
        $("#netamt<?php echo $val2->pettycashi_id;?>").val(tot);
}
});
$('#whchktax<?php echo $val2->pettycashi_id;?>').click(function(event) {
  if($('#whchktax<?php echo $val2->pettycashi_id;?>').prop('checked')) {
    $("#whtaxchk<?php echo $val2->pettycashi_id;?>").show();

} else {
    $("#whtaxchk<?php echo $val2->pettycashi_id;?>").hide();
}
});

</script>
  <script>
  $('#tax<?php echo $val2->pettycashi_id;?>').change(function(event) {
    var tax = $("#tax<?php echo $val2->pettycashi_id;?>").val();
  switch (tax) {
    case '0':
          $('#totwh<?php echo $val2->pettycashi_id;?>').val('0');
        break;
    case '1':
           var amount = $("#amount<?php echo $val2->pettycashi_id;?>").val();
          var unitprice = $("#unitprice<?php echo $val2->pettycashi_id;?>").val();
          var net = (amount*unitprice);
          var totwhtax = net*1/100;
          var vat = $("#taxv<?php echo $val2->pettycashi_id;?>").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
          $('#netamt<?php echo $val2->pettycashi_id;?>').val(totamount);
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
    case '2':
          var amount = $("#amount<?php echo $val2->pettycashi_id;?>").val();
          var unitprice = $("#unitprice<?php echo $val2->pettycashi_id;?>").val();
          var net = (amount*unitprice);
          var totwhtax = net*2/100;
          var vat = $("#taxv<?php echo $val2->pettycashi_id;?>").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
          $('#netamt<?php echo $val2->pettycashi_id;?>').val(totamount);
          break;
    case '3':
          var amount = $("#amount<?php echo $val2->pettycashi_id;?>").val();
          var unitprice = $("#unitprice<?php echo $val2->pettycashi_id;?>").val();
          var net = (amount*unitprice);
          var totwhtax = net*3/100;
          var vat = $("#taxv<?php echo $val2->pettycashi_id;?>").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
          $('#netamt<?php echo $val2->pettycashi_id;?>').val(totamount);
          break;
    case '5':
          var amount = $("#amount<?php echo $val2->pettycashi_id;?>").val();
          var unitprice = $("#unitprice<?php echo $val2->pettycashi_id;?>").val();
          var net = (amount*unitprice);
          var totwhtax = net*5/100;
          var vat = $("#taxv<?php echo $val2->pettycashi_id;?>").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
          $('#netamt<?php echo $val2->pettycashi_id;?>').val(totamount);
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
         break;
    case '15':
         var amount = $("#amount<?php echo $val2->pettycashi_id;?>").val();
          var unitprice = $("#unitprice<?php echo $val2->pettycashi_id;?>").val();
          var net = (amount*unitprice);
          var totwhtax = net*15/100;
          var vat = $("#taxv<?php echo $val2->pettycashi_id;?>").val();
          var totvat = (net*vat)/100;
          var totamount = (net+totvat)-totwhtax;
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
          $('#netamt<?php echo $val2->pettycashi_id;?>').val(totamount);
          $('#totwh<?php echo $val2->pettycashi_id;?>').val(totwhtax);
          break;
  }
  var amount = $("#amount<?php echo $val2->pettycashi_id;?>").val();
  var unitprice = $("#unitprice<?php echo $val2->pettycashi_id;?>").val();
  var net = $("#netamt<?php echo $val2->pettycashi_id;?>").val();
  var whtot = $("#totwh<?php echo $val2->pettycashi_id;?>").val();
  var tot = (amount*unitprice)-whtot;
  $('#netamt<?php echo $val2->pettycashi_id;?>').val(totamount);
});  
</script>

<script>
   $("#amount<?php echo $val2->pettycashi_id;?>,#unitprice<?php echo $val2->pettycashi_id;?>").keyup(function(){
      var sum  = parseFloat($("#amount<?php echo $val2->pettycashi_id;?>").val())*parseFloat($("#unitprice<?php echo $val2->pettycashi_id;?>").val()) || 0;
      $("#netamt<?php echo $val2->pettycashi_id;?>").val(sum);
    });
  </script>

<script>
  $(".edititem<?php echo $val2->pettycashi_id;?>").click(function(event) {
    var url="<?php echo base_url(); ?>index.php/pettycash/edititem";
    var dataSet={
      doccode: $("#doccode").val(),
      item: "<?php echo $val2->pettycashi_id;?>",
      matcode: $("#matcodeb6<?php echo $val2->pettycashi_id;?>").val(),
      matname: $('#matname<?php echo $val2->pettycashi_id;?>').val(),
      list: $("#list<?php echo $val2->pettycashi_id;?>").val(),
      vender: $("#evender<?php echo $val2->pettycashi_id;?>").val(),
      addrvender: $("#eaddrvender<?php echo $val2->pettycashi_id;?>").val(),
      amount: $("#amount<?php echo $val2->pettycashi_id;?>").val(),
      unitprice: $("#unitprice<?php echo $val2->pettycashi_id;?>").val(),
      unit: $("#unit<?php echo $val2->pettycashi_id;?>").val(),
      netamt: $("#netamt<?php echo $val2->pettycashi_id;?>").val()
    };
    $.post(url,dataSet,function(data){
      alert(data);
      var docno = data;
       $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/pettycash/service_pettycash_detail'+'/'+docno);
    });
  });

</script>


<!-- matcode and costcode -->
<!--  modal gen matcode and costcode -->
<div class="modal fade" id="gencode1<?php echo $val2->pettycashi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="type1<?php echo $val2->pettycashi_id;?>" class="col-xs-6">
                    <h4>รายการประเภทสินค้า 1</h4>
                    <select multiple class="form-control" id="box1<?php echo $val2->pettycashi_id;?>" style="height:350px;">
                    </select>
                </div>
                <div id="type2<?php echo $val2->pettycashi_id;?>" class="col-xs-6">

                     <h4>รายการประเภทสินค้า 2</h4>
                     <select multiple class="form-control" id="box2<?php echo $val2->pettycashi_id;?>" style="height:350px;">

</select>

                </div>
                <div id="type3<?php echo $val2->pettycashi_id;?>" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 3</h4>
                    <select multiple class="form-control" id="box3<?php echo $val2->pettycashi_id;?>" style="height:350px;">

</select>
                </div>
                <div id="type4<?php echo $val2->pettycashi_id;?>" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 4</h4>
                    <select multiple class="form-control" id="box4<?php echo $val2->pettycashi_id;?>" style="height:350px;">

</select>
                </div>
                <div id="type5<?php echo $val2->pettycashi_id;?>" class="col-xs-6">
                  <h4>รายการประเภทสินค้า 5</h4>
                     <select multiple class="form-control" id="box5<?php echo $val2->pettycashi_id;?>" style="height:350px;"/>
                </select>
                     <select multiple class="form-control" id="box6<?php echo $val2->pettycashi_id;?>" style="height:350px;"/>
</select>
                </div>

                <div class="col-xs-12" id="gencodebtn<?php echo $val2->pettycashi_id;?>">
                    <hr>
                    <button class="btn btn-primary" id="btngenmatcode<?php echo $val2->pettycashi_id;?>" data-dismiss="modal" style="float: right;">สร้าง MatCode</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- modal เลือกร้านค้า -->
 <div class="modal fade" id="openeditvender<?php echo $val2->pettycashi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <td><button class="selvender btn btn-xs btn-block btn-info" data-toggle="modal"  data-evname<?php echo $val2->pettycashi_id;?>="<?php echo $val->vender_name;?>" data-eaddr<?php echo $val2->pettycashi_id;?>="<?php echo $val->vender_address; ?>" data-ecrteam="<?php echo $val->vender_credit;?>" data-evtel="<?php echo $val->vender_tel; ?>" data-dismiss="modal">เลือก</button></td>
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

  <!-- end matcode and costcode-->

  <script>
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $("#codeup<?php echo $val2->pettycashi_id;?>").click(function(){});
     $("#gencodebtn<?php echo $val2->pettycashi_id;?>").hide();
     $("#type2<?php echo $val2->pettycashi_id;?>").hide();
     $("#type3<?php echo $val2->pettycashi_id;?>").hide();
     $("#type4<?php echo $val2->pettycashi_id;?>").hide();
     $("#type5<?php echo $val2->pettycashi_id;?>").hide();
     $('#cost-control<?php echo $val2->pettycashi_id;?>').hide();
     $("#cost4<?php echo $val2->pettycashi_id;?>").hide();
     $("#box6<?php echo $val2->pettycashi_id;?>").hide();
     $("#tabcost4<?php echo $val2->pettycashi_id;?>").hide();

     $('#gencode<?php echo $val2->pettycashi_id;?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $val2->pettycashi_id;?>").show();
     $("#type2<?php echo $val2->pettycashi_id;?>").hide();
     $("#type3<?php echo $val2->pettycashi_id;?>").hide();
     $("#type4<?php echo $val2->pettycashi_id;?>").hide();
     $("#type5<?php echo $val2->pettycashi_id;?>").hide();

     $("#gencodebtn<?php echo $val2->pettycashi_id;?>").hide();


     });
<?php echo $val2->pettycashi_id;?>

     $('#box1<?php echo $val2->pettycashi_id;?>').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1<?php echo $val2->pettycashi_id;?>" ).change(function() {
           var b1 = $('#box1<?php echo $val2->pettycashi_id;?>').val();
           $('#box2<?php echo $val2->pettycashi_id;?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $val2->pettycashi_id;?>").show();
          $('#vgencode1<?php echo $val2->pettycashi_id;?>').html('');

    });
    $( "#box2<?php echo $val2->pettycashi_id;?>" ).change(function() {
         $("#type1<?php echo $val2->pettycashi_id;?>").hide();
         var b1 = $('#box1<?php echo $val2->pettycashi_id;?>').val();
         var b2 = $('#box2<?php echo $val2->pettycashi_id;?>').val();
         $('#box3<?php echo $val2->pettycashi_id;?>').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3<?php echo $val2->pettycashi_id;?>").show();
    });
    $( "#box3<?php echo $val2->pettycashi_id;?>" ).change(function() {
        var b1 = $('#box1<?php echo $val2->pettycashi_id;?>').val();
         var b2 = $('#box2<?php echo $val2->pettycashi_id;?>').val();
         var b3 = $('#box3<?php echo $val2->pettycashi_id;?>').val();
         $('#box4<?php echo $val2->pettycashi_id;?>').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4<?php echo $val2->pettycashi_id;?>").show();
         $("#type2<?php echo $val2->pettycashi_id;?>").hide();
    });
    $( "#box4<?php echo $val2->pettycashi_id;?>" ).change(function() {
         //$("#type4").hide();
         $('#type3<?php echo $val2->pettycashi_id;?>').hide();
         $("#gencodebtn<?php echo $val2->pettycashi_id;?>").show();
         //$("#type5").show();

    });
    $("#box5<?php echo $val2->pettycashi_id;?>").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode<?php echo $val2->pettycashi_id;?>').click(function(){
     var b1 = $('#box1<?php echo $val2->pettycashi_id;?>').val();
     var b2 = $('#box2<?php echo $val2->pettycashi_id;?>').val();
     var b3 = $('#box3<?php echo $val2->pettycashi_id;?>').val();
     var b4 = $('#box4<?php echo $val2->pettycashi_id;?>').val();
     var b5 = $('#box5<?php echo $val2->pettycashi_id;?>').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6<?php echo $val2->pettycashi_id;?>').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){
              $('#matname<?php echo $val2->pettycashi_id;?>').val(data);
              $('#vgencode1<?php echo $val2->pettycashi_id;?>').html(data);
              $("#list<?php echo $val2->pettycashi_id;?>").val(data);
            });

    });
</script>
<script>
$(".selvender").click(function(event) {
  $("#evender<?php echo $val2->pettycashi_id;?>").val($(this).data('evname<?php echo $val2->pettycashi_id;?>'));
  $("#eaddrvender<?php echo $val2->pettycashi_id;?>").val($(this).data('eaddr<?php echo $val2->pettycashi_id;?>'));
});
</script>
<script>
    // $(document).ready(function() {
      $("#amount,#unitprice,#disc").keyup(function(){
                var sum  = parseFloat($("#amount").val())*parseFloat($("#unitprice").val()) || 0;
                $("#netamt").val(sum);
              });
// });

  </script>
<?php } ?>


<script>
  $('.opdetaile').click(function() {
        var url="<?php echo base_url(); ?>office/edt_pettydetail";
          var dataSet={
            prcode: $("#prcode").val(),
            prid: $("#pdrd").val(),
            matcode: $("#matcodeb6").val(),
            matname: $('#matname').val(),
            qty: $("#qty").val(),
            unit: $("#unit").val(),
            remark: $("#remark").val()
            };
            $.post(url,dataSet,function(data){
              alert(data);
              $('#loaddatadetail').load('<?php echo base_url(); ?>office/service_pr_detail'+'/'+data);
            });
    });
</script>
>
