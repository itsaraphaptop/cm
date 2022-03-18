
<div class="panel panel-primary">
	<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายะเอียดวัสดุ</div>
  <div class="panel-body">
    <table id="example" class="table table-striped table-hover" >
             <thead>
               <tr>
                 <th>No.</th>
                 <th width="auto">ต้นทุน</th>
                 <th width="auto">ชื่อสินค้า</th>
                 <th width="5%">ปริมาณ</th>
                 <th width="5%">หน่วย</th>
                 <th width="10%">ราคา/หน่วย</th>
                 <th width="10%">จำนวนเงิน</th>
                 <th  width="auto">จัดการ</th>
                 <!-- <th  width="auto">จัดการ</th> -->
               </tr>
             </thead>
             <tbody>
               <?php $total = 0; $qty=0; $unitprice = 0; $amount =0; $disamt=0; $vat=0; ?>
                 <?php   $n =1; foreach ($resi as $val) {?>
                 <?php if ($val->pri_status=="open") {?>
                     <tr>
                <th scope="row"><?php echo $n;?></th>
                 <!-- <td><?php echo $val->pri_costname; ?></td> -->
                 <td><?php echo substr($val->pri_costcode,10,5); ?></td>
                 <td><?php echo $val->pri_matname; ?></td>
                 <td><?php echo $val->pri_qty; ?></td>
                 <td><?php echo $val->pri_unit; ?></td>
                 <td><?php echo $val->pri_priceunit; ?></td>
                 <td><?php echo $val->pri_netamt; ?></td>
                 <td><span class="label label-success">PO เลขที่ <?php echo $val->pri_pono; ?></span></td>
                   <!-- <td><a href="#"><button class="btn btn-xs btn-block btn-danger">ลบ</button></a> -->
                   </td>
               </tr>
                 <?php }else{ ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <!-- <td><?php echo $val->pri_costname; ?></td> -->
                 <td><?php echo substr($val->pri_costcode,10,5); ?></td>
                 <td><?php echo $val->pri_matname; ?></td>
                 <td><?php echo $val->pri_qty; ?></td>
                 <td><?php echo $val->pri_unit; ?></td>
                 <td><?php echo $val->pri_priceunit; ?></td>
                 <td><?php echo $val->pri_netamt; ?></td>
                 <td>
                   <button class="btnedit btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->pri_id;?>" >แก้ไข</button></td>
                   <!-- <td><button class="btndel<?php echo $val->pri_id;?> btn btn-xs btn-block btn-danger">ลบ</button> -->
                   </td>
               </tr>

          
<script>
  $('.btndel<?php echo $val->pri_id;?>').click(function(){
  var url="<?php echo base_url(); ?>index.php/office/del_prpodetail";
  var dataSet={
      prid:  "<?php echo $val->pri_id;?>",
      prcode:  "<?php echo $val->pri_ref;?>"
    };
  $.post(url,dataSet,function(data){
    var pr = data;
    $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail_hh'+'/'+pr);
    
  });
});
</script>
              <?php } ?>
                 <?php
                   $n++;
                   $total=$total+$val->pri_netamt;
                   $unitprice=$unitprice+$val->pri_priceunit;
                   $amount=$amount+$val->pri_amount;
                   $vat=$vat+$val->pri_vat;
                   $disamt=$disamt+$val->pri_disamt;
                   $qty=$qty+$val->pri_qty;
                 } ?>
                 <tr><td ><div class='text-center'>รวม</div>  </td>
                 <td ><div class='text-center'></div>  </td>
                 <td ><div class='text-center'></div>  </td>
                   <td ><?php echo number_format($qty); ?></td>
                   <td></td>
                   <td ><?php echo number_format($unitprice); ?></td>
                   <td ><?php echo number_format($total); ?></td>
                   <td ></td>
                  </tr>
             </tbody>
           </table>
           <div class="container">
              <div class="row">
              
             <button class="btn_del btn btn-danger btn-sm" id="button"><span class="glyphicon glyphicon-trash"></span> ลบรายการ</button>
           </div>
           </div>
           
      </div>
      
  </div>




<?php foreach ($resi as $val2) {?>
      <!--  MOdal po detail -->
     <div class="modal fade" id="modaleditdetail<?php echo $val2->pri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title" id="myModalLabel">แก้ไขรายการวัสดุ <?php echo $val2->pri_matname; ?></h4>
	</div>
	<div class="modal-body">
			 <div class="row">
                  <!--  <div class="col-xs-6">
                     <div class="form-group">
                         <label for="matname">รายการซื้อ</label><Br>
                         <a data-toggle="modal"    data-target="#gencode" id="vgencode" class="btn  btn-primary">Material Name : <?php echo $val2->pri_matname; ?></a>
                         <input type="hidden" id="matcodeb6<?php echo $val2->pri_id; ?>" name="matcodeb6e" value="<?php echo $val2->pri_matcode; ?>" placeholder="กรอกรายการซื้อ" class="matcodeb6e form-control">
                         <input type="hidden" id="matname<?php echo $val2->pri_id; ?>" name="matnamee" placeholder="กรอกรายการซื้อ" value="<?php echo $val2->pri_matname; ?>" class="matnamee form-control">
               </div>
                   </div> -->
                   <div class="col-xs-6">
                <label for="">รายการซื้อ</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chk<?php echo $val2->pri_id; ?>" aria-label="กำหนดเอง">
                            </span>
                              <input type="text" id="newmatname<?php echo $val2->pri_id; ?>" value="<?php echo $val2->pri_matname; ?>" placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                              <input type="hidden" id="newmatcode<?php echo $val2->pri_id; ?>" value="<?php echo $val2->pri_matcode; ?>" placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat<?php echo $val2->pri_id; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
              </div>
                 
                   <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="costname<?php echo $val2->pri_id; ?>" value="<?php echo $val2->pri_costname; ?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                <input type="hidden" id="codecostcode<?php echo $val2->pri_id; ?>" value="<?php echo $val2->pri_costcode; ?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode<?php echo $val2->pri_id; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
               </div> 
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="qty">ปริมาณ</label>
						<input type="text" id="pqty<?php echo $val2->pri_id; ?>" name="qtye" value="<?php echo $val2->pri_qty; ?>" placeholder="กรอกปริมาณ" class="qtye form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<label for="unit">หน่วย</label>
						<input type="text" id="ounit<?php echo $val2->pri_id; ?>" name="punite" value="<?php echo $val2->pri_unit; ?>" placeholder="กรอกหน่วย" class="punite form-control input-sm">
						<span class="input-group-btn">
                         <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit<?php echo $val2->pri_id; ?>" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="price_unit">ราคา/หน่วย</label>
						<input type="text" id="pprice_unit<?php echo $val2->pri_id; ?>" name="pprice_unite" value="<?php echo $val2->pri_priceunit; ?>" placeholder="กรอกราคา/หน่วย" class="pprice_unite form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="amount">จำนวนเงิน</label>
						<input type="text" id="pamount<?php echo $val2->pri_id; ?>" readonly="true" name="pamounte" value="<?php echo $val2->pri_amount; ?>" placeholder="กรอกจำนวนเงิน" class="pamounte form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">

						<label for="endtproject">ส่วนลด 1 (%)</label>
						<input type='text' id="pdiscper1<?php echo $val2->pri_id; ?>" name="pdiscper1e" value="" placeholder="กรอกส่วนลด" class="pdiscper1e form-control" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="endtproject">ส่วนลด 2 (%)</label>
						<input type='text' id="pdiscper2<?php echo $val2->pri_id; ?>" name="pdiscper2e" value="" placeholder="กรอกส่วนลด" class="pdiscper2e form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="endtproject">ส่วนลดพิเศษ</label>
						<input type='text' id="pdiscex<?php echo $val2->pri_id; ?>" value="" name="pdiscexe" class="pdiscexe form-control" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
						<input type='text' id="pdisamt<?php echo $val2->pri_id; ?>" name="pdisamte" value="" class="pdisamte form-control" />
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
							<button id="chkprice<?php echo $val2->pri_id; ?>" class="btn btn-primary"style="margin-top:25px;">ดูราคา</button>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">VAT</label>
						<select class="form-control" id="ccvat<?php echo $val2->pri_id; ?>" name="cvat">
							<?php if($system=='1' ){ ?>
							<option value="1" selected>Exclude VAT</option>
							<?php } else { ?>
							<option value="1">Exclude VAT</option>
							<?php }?>
							<?php if($system=='2' ){ ?>
							<option value="2" selected>Include VAT</option>
							<?php } else { ?>
							<option value="2">Include VAT</option>
							<?php }?>
							<?php if($system=='3' ){ ?>
							<option value="3" selected>Not VAT</option>
							<?php } else { ?>
							<option value="3">Not VAT</option>
							<?php }?>
						</select>
					</div>
				</div> -->
				<!-- <div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">VAT</label> -->
						<input type='hidden' id="pvat<?php echo $val2->pri_id; ?>" name="pvate" value="0" class="pvate form-control" />
					<!-- </div>
				</div> -->
				<div class="col-md-4">
					<div class="form-group">
						<label for="endtproject">จำนวนเงินสุทธิ</label>

						<input type='text' id="pnetamt<?php echo $val2->pri_id; ?>" name="pnetamte" value="" class="pnetamte form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="endtproject">หมายเหตุ</label>

						<input type='text' id="premark<?php echo $val2->pri_id; ?>" name="premarke" value="" class="premarke form-control" />
					</div>
				</div>
			</div>
<php></php>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="hidden" class="prid<?php echo $val2->pri_id; ?> form-control" name="prid" value="<?php echo $val2->pri_id; ?>">
						<input type="hidden" class="pocode form-control" name="pocode" value="<?php echo $val2->pri_ref; ?>">
						<button id="editdetailpr<?php echo $val2->pri_id; ?>" data-dismiss="modal" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
					</div>
				</div>
			</div>

	</div>
	<!-- panal body -->
</div>
</div>
</div>
<!-- end modal PO Detail -->
<div class="modal fade" id="opnewmat<?php echo $val2->pri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="tablemat" class="table table-hover" >
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
          <?php
           foreach ($allmaterial as $vali){ ?>
        <tr>
         <td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?></td>
          <td><?php echo $vali->matgroup_name; ?></td>
          <td><?php echo $vali->matsubgroup_name; ?></td>
          <td><?php echo $vali->matname; ?></td>
            <td><button class="opennmat<?php echo $val2->pri_id; ?> btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode<?php echo $val2->pri_id; ?>="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?>"  data-nmatgroupname<?php echo $val2->pri_id; ?>="<?php echo $vali->matgroup_name; ?><?php echo $vali->matsubgroup_name; ?>" data-munit<?php echo $val2->pri_id; ?>="<?php echo $vali->matname; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<div class="modal fade" id="costcode<?php echo $val2->pri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1<?php echo $val2->pri_id; ?>" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1<?php echo $val2->pri_id; ?>" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2<?php echo $val2->pri_id; ?>" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2<?php echo $val2->pri_id; ?>" style="height:150px;">

</select>

                </div>
                <div id="tabcost3<?php echo $val2->pri_id; ?>" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3<?php echo $val2->pri_id; ?>" style="height:150px;">
                        </select>
                                   </div>
                 <div id="tabcost4<?php echo $val2->pri_id; ?>" class="col-xs-6">
                   <h4>รายการประเภทต้นทุน 4</h4>
                    <select multiple class="form-control" id="cost4<?php echo $val2->pri_id; ?>" style="height:150px;">

</select>

                 </div>


                <div id="cost-control<?php echo $val2->pri_id; ?>" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup<?php echo $val2->pri_id; ?>">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->

<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit<?php echo $val2->pri_id; ?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
      </div>
        <div class="panel-body">
            <div class="row">
                <table id="daunit" class="table table-striped" >
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
         <td><?php echo $n;?></td>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openun<?php echo $val2->pri_id; ?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit<?php echo $val2->pri_id; ?>="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
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
    $(".openun<?php echo $val2->pri_id; ?>").click(function(){
      $("#ounit<?php echo $val2->pri_id; ?>").val($(this).data('vunit<?php echo $val2->pri_id; ?>'));
    });
  </script>

<script>
  $(".opennmat<?php echo $val2->pri_id; ?>").click(function(event) {
    $("#newmatname<?php echo $val2->pri_id; ?>").val($(this).data('nmatgroupname<?php echo $val2->pri_id; ?>'));
    $("#newmatcode<?php echo $val2->pri_id; ?>").val($(this).data('mmatcode<?php echo $val2->pri_id; ?>'));
    $("#unit<?php echo $val2->pri_id; ?>").val($(this).data('munit<?php echo $val2->pri_id; ?>'));
  });
</script>
<script>
  // $(document).ready(function() {
   
    if ($("#pono").val()=="") {
       $('.btnedit').prop('disabled', true);
     }else
     {
      $('.btnedit').prop('disabled', false);
     }
   
  // });
</script>
<script>

$('#editdetailpr<?php echo $val2->pri_id; ?>').click(function(){
  var url="<?php echo base_url(); ?>index.php/office/editprd";
  var dataSet={
    ponoi: $('.ppono').val(),
      matcodeb6: $('#newmatcode<?php echo $val2->pri_id; ?>').val(),
      matname: $('#newmatname<?php echo $val2->pri_id; ?>').val(),
      codecostcode: $('#codecostcode<?php echo $val2->pri_id; ?>').val(),
      costname: $('#costname<?php echo $val2->pri_id; ?>').val(),
      pqty: $('#pqty<?php echo $val2->pri_id; ?>').val(),
      punit: $('#punit<?php echo $val2->pri_id; ?>').val(),
      pprice_unit: $('#pprice_unit<?php echo $val2->pri_id; ?>').val(),
      pamount: $('#pamount<?php echo $val2->pri_id; ?>').val(),
      pdiscper1: $('#pdiscper1<?php echo $val2->pri_id; ?>').val(),
      pdiscper2: $('#pdiscper2<?php echo $val2->pri_id; ?>').val(),
      pdiscex: $('#pdiscex<?php echo $val2->pri_id; ?>').val(),
      pdisamt: $('#pdisamt<?php echo $val2->pri_id; ?>').val(),
      ccvat: $('#ccvat<?php echo $val2->pri_id; ?>').val(),
      pvat: $('#pvat<?php echo $val2->pri_id; ?>').val(),
      pnetamt: $('#pnetamt<?php echo $val2->pri_id; ?>').val(),
      premark: $('#premark<?php echo $val2->pri_id; ?>').val(),
      prcode:  $('.pocode<?php echo $val2->pri_id; ?>').val(),
      prid:   $('.prid<?php echo $val2->pri_id; ?>').val(),
      prno: $('#prno').val()
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////     
 // alert("save complete");
     alert(data);
        var pr = $('.pocode').val();
        var po = $('.ppono').val();
      
      
      // if (data==1) {
         
      //    $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail'+'/'+pr);
      //    alert("1")
      // }else{
      //   alert("many");
         // $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail_po'+'/'+pr+'/'+po);
      // }
     $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail'+'/'+data);
    
////////////////////////////////
  });
});



 $('#chkprice<?php echo $val2->pri_id; ?>').click(function(){
	  var xqty = $('#pqty<?php echo $val2->pri_id; ?>').val();
	  var xprice = $('#pprice_unit<?php echo $val2->pri_id; ?>').val();
	  var xamount = xqty*xprice;
	  var xdiscper1 = $('#pdiscper1<?php echo $val2->pri_id; ?>').val();
	  var xdiscper2 = $('#pdiscper2<?php echo $val2->pri_id; ?>').val();
	  var xdiscper3 = $('#pdiscex<?php echo $val2->pri_id; ?>').val();
	  var xpd1 = xamount - (xamount*xdiscper1)/100;
	  var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
	  var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
	  var xvat = $('#pvat<?php echo $val2->pri_id; ?>').val();
	  
	  $('#pamount<?php echo $val2->pri_id; ?>').val(xamount);
	  if(xdiscper3 != ''){
		  	$('#pdisamt<?php echo $val2->pri_id; ?>').val(xpd3);
		  	vxpd3 = xpd3 - (xpd3*xvat)/100;
		  	$('#pnetamt<?php echo $val2->pri_id; ?>').val(vxpd3)
		  }
	  else if(xdiscper2 != ''){
		  
		  		   $('#pdisamt<?php echo $val2->pri_id; ?>').val(xpd2);
		  		   vxpd2 = xpd2 - (xpd2*xvat)/100;
		  		   $('#pnetamt<?php echo $val2->pri_id; ?>').val(vxpd2)
	  }
	  else
	  {
	  $('#pdisamt<?php echo $val2->pri_id; ?>').val(xpd1);
	  		vxpd1 = xpd1 - (xpd1*xvat)/100;
		  	$('#pnetamt<?php echo $val2->pri_id; ?>').val(vxpd1)
	  }
	  
	  
  });
$('#chkpricecre').click(function(){
    var xqty = $('#pqtycre').val();
    var xprice = $('#pprice_unitcre').val();
    var xamount = xqty*xprice;
    var xdiscper1 = $('#pdiscper1cre').val();
    var xdiscper2 = $('#pdiscper2cre').val();
    var xdiscper3 = $('#pdiscexcre').val();
    var xpd1 = xamount - (xamount*xdiscper1)/100;
    var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
    var xpd3 = xpd2 - (xpd1*xdiscper3)/100;
    var xvat = $('#pvatcre').val();
    
    $('#pamountcre').val(xamount);
    if(xdiscper3 != ''){
        // $('#pdisamtcre').val(xpd3);
        // vxpd3 = xpd3 - (xpd3*xvat)/100;
        // $('#pnetamtcre').val(vxpd3)
        exdiss = xpd2 - xdiscper3;
        $('#pnetamtcre').val(exdiss);
        $('#pdisamtcre').val(exdiss);
      }
    else if(xdiscper2 != ''){
      
             $('#pdisamtcre').val(xpd2);
             vxpd2 = xpd2 - (xpd2*xvat)/100;
             $('#pnetamtcre').val(vxpd2)
    }
    else
    {
    $('#pdisamtcre').val(xpd1);
        vxpd1 = xpd1 - (xpd1*xvat)/100;
        $('#pnetamtcre').val(vxpd1)
    }
    
    
  });
  
  </script>

  <script>
  // $(document).ready(function() {
    $("#codeup").click(function(){});
     $("#gencodebtn").hide();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();
     $('#cost-control<?php echo $val2->pri_id; ?>').hide();
     $("#cost4<?php echo $val2->pri_id; ?>").hide();
     $("#box6").hide();
      $("#tabcost4<?php echo $val2->pri_id; ?>").hide();

     $('#gencode').on('hidden.bs.modal', function () {
     $("#type1").show();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();

     $("#gencodebtn").hide();


     });



    $('#cost1<?php echo $val2->pri_id; ?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1<?php echo $val2->pri_id; ?>" ).change(function() {

         var c1 = $('#cost1<?php echo $val2->pri_id; ?>').val();
         $('#cost2<?php echo $val2->pri_id; ?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2<?php echo $val2->pri_id; ?>").show();
         $("#tabcost4<?php echo $val2->pri_id; ?>").hide();
    });
    $( "#cost2<?php echo $val2->pri_id; ?>" ).change(function() {

         var c2 = $('#cost2<?php echo $val2->pri_id; ?>').val();
         $('#cost3<?php echo $val2->pri_id; ?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4<?php echo $val2->pri_id; ?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3<?php echo $val2->pri_id; ?>").change(function() {
         $("#tabcost2<?php echo $val2->pri_id; ?>").hide();
         $("#tabcost4<?php echo $val2->pri_id; ?>").show();
         $("#cost4<?php echo $val2->pri_id; ?>").show();

    });
    $( "#cost4<?php echo $val2->pri_id; ?>" ).change(function() {
         $("#cost-control<?php echo $val2->pri_id; ?>").show();
    });
     $("#btncostup<?php echo $val2->pri_id; ?>").click(function(){
       var c1 = $('#cost1<?php echo $val2->pri_id; ?>').val();
     var c2 = $('#cost2<?php echo $val2->pri_id; ?>').val();
     var c3 = $('#cost3<?php echo $val2->pri_id; ?>').val();
     var c4 = $('#cost4<?php echo $val2->pri_id; ?>').val();

     var gcostcodey = c4 ;
     var codecostcode = c1+''+c2+''+c3;
     $('#costname<?php echo $val2->pri_id; ?>').val(gcostcodey);
     $('#codecostcode<?php echo $val2->pri_id; ?>').val(codecostcode);
     
     $('#costcode<?php echo $val2->pri_id; ?>').modal('hide');
     $("#tabcost4<?php echo $val2->pri_id; ?>").hide();

    });


  // });
</script>
<script>
$('#chk<?php echo $val2->pri_id; ?>').click(function(event) {
  if($('#chk<?php echo $val2->pri_id; ?>').prop('checked')) {
   $('#newmatname<?php echo $val2->pri_id; ?>').prop('disabled', false);
} else {
    $('#newmatname<?php echo $val2->pri_id; ?>').prop('disabled', true);
}
});
  
</script>


<?php } ?>




  <script>
/*
$('#editdetailpr').click(function(){
  var url="<?php echo base_url(); ?>index.php/office/editprd";
  var dataSet={
    ponoi: $('.ppono').val(),
      matcodeb6: $('#matcodeb6').val(),
      matname: $('#matname').val(),
      codecostcode: $('#codecostcode').val(),
      costname: $('#costname').val(),
      pqty: $('#pqty').val(),
      punit: $('#punit').val(),
      pprice_unit: $('#pprice_unit').val(),
      pamount: $('#pamount').val(),
      pdiscper1: $('#pdiscper1').val(),
      pdiscper2: $('#pdiscper2').val(),
      pdiscex: $('#pdiscex').val(),
      pdisamt: $('#pdisamt').val(),
      ccvat: $('#ccvat').val(),
      pvat: $('#pvat').val(),
      pnetamt: $('#pnetamt').val(),
      premark: $('#premark').val(),
      prcode:  $('.pocode').val(),
      prid:   $('.prid').val(),
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////     
 // alert("save complete");
     alert(data);

      var pr = $('.pocode').val();
    $('#loaddetail').load('<?php echo base_url(); ?>index.php/office/service_openpr_detail'+'/'+pr);
////////////////////////////////
  });
});*/
  </script>


<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
<link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#newmatname').prop('disabled', true);
    var table = $('#example').DataTable();
    $('#tablemat').DataTable();
    $("#daunit").DataTable();

 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
    
// } );

</script>

<script>
$('#chk').click(function(event) {
  if($('#chk').prop('checked')) {
   $('#newmatname').prop('disabled', false);
} else {
    $('#newmatname').prop('disabled', true);
}
});
  
</script>

