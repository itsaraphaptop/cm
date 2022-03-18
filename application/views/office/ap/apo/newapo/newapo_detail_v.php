
<div class="panel panel-primary">
	<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> รายะเอียดวัสดุ</div>
          <table class="table table-bordered table-striped table-hover" >
             <thead>
               <tr>
                 <th>No.</th>
                 <th width="auto">ชื่อสินค้า</th>
                 <th width="auto">ต้นทุน</th>
                 <th width="5%">ปริมาณ</th>
                 <th width="5%">หน่วย</th>
                 <th width="10%">ราคา/หน่วย</th>
                 <th width="10%">จำนวนเงิน</th>
            <!--     <th colspan="2" width="auto">จัดการ</th>-->
               </tr>
             </thead>
             <tbody>
               <?php $total = 0; $qty=0; $unitprice = 0; $amount =0; $disamt=0; $vat=0; ?>
                 <?php   $n =1; foreach ($resi as $val) { ?>
               <tr>
                <th scope="row"><?php echo $n;?></th>
                 <td><?php echo $val->apvi_matname; ?></td>
                 <td><?php echo $val->apvi_costname ?></td>
                 <td><?php echo $val->apvi_qty; ?></td>
                 <td><?php echo $val->apvi_unit; ?></td>
                 <td><?php echo $val->apvi_priceunit; ?></td>
                 <td><?php echo $val->apvi_netamt; ?></td>
                 <td>
                   <button class="btnedit btn btn-xs btn-block btn-info" data-toggle="modal" data-target="#modaleditdetail<?php echo $val->apvi_id;?>">แก้ไข</button></td>
                   <td><button class="btn btn-xs btn-block btn-danger" id="del<?php echo $val->apvi_id;?>">ลบ</button>
                   </td>
               </tr>
<script>
  $("#del<?php echo $val->apvi_id;?>").click(function(event) {
    var url="<?php echo base_url(); ?>index.php/office/delapvitem_d";
     var dataSet={
      apvid: "<?php echo $val->apvi_id; ?>",
      ponoi: $('.ppono').val()        
      };
    $.post(url,dataSet,function(data){
       var ff = data;
       $('#loaddetail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $("#loaddetail").load('<?php echo base_url(); ?>index.php/office/editpod/'+ff);
    });
  });
</script>


                 <?php
                   $n++;
                   $total=$total+$val->apvi_netamt;
                   $unitprice=$unitprice+$val->apvi_priceunit;
                   $amount=$amount+$val->apvi_amount;
                   $vat=$vat+$val->apvi_vat;
                   $disamt=$disamt+$val->apvi_disamt;
                   $qty=$qty+$val->apvi_qty;
                 } ?>
                 <tr><td colspan="3"><div class='text-center'>รวม</div>  </td>
                   <td ><?php echo number_format($qty); ?></td>
                   <td></td>
                   <td ><?php echo number_format($unitprice); ?></td>
                   <td ><?php echo number_format($total); ?></td>
                   <td colspan="2"></td>
                  </tr>
             </tbody>
           </table>
      </div>


<?php foreach ($resi as $val2) {?>
      <!--  MOdal po detail -->
     <div class="modal fade" id="modaleditdetail<?php echo $val2->apvi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
         <div class="modal-content">
           <div class="modal-header" style="background:#00008b; color:#fff;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
		</button>
		<h4 class="modal-title" id="myModalLabel">แก้ไขรายการวัสดุ <?php echo $val2->apvi_matname; ?></h4>
	</div>
	<div class="modal-body">
			 <div class="row">
                   <div class="col-xs-6">
                     <div class="form-group">
                         <label for="matname">รายการซื้อ</label><Br>
                         <a data-toggle="modal"    data-target="#gencode1<?php echo $val2->apvi_id;?>" id="vgencode1<?php echo $val2->apvi_id;?>" class="btn  btn-primary"><?php echo $val2->apvi_matname; ?></a>
                         <input type="hidden" id="matcodeb6<?php echo $val2->apvi_id; ?>" name="matcodeb6" value="<?php echo $val2->apvi_matcode; ?>" placeholder="กรอกรายการซื้อ" class="matcodeb6 form-control">
                         <input type="hidden" id="matname<?php echo $val2->apvi_id; ?>" name="matname" placeholder="กรอกรายการซื้อ" value="<?php echo $val2->apvi_matname; ?>" class="matname form-control">
               </div>
                   </div>
                   <div class="col-xs-6">
                     <div class="form-group">
                         <label for="costname">รายการต้นทุน</label><br>
                         <a data-toggle="modal"  data-target="#costcode1<?php echo $val2->apvi_id;?>" id="gcostcode1<?php echo $val2->apvi_id;?>" class="btn  btn-primary"><?php echo $val2->apvi_costname; ?></a>
                         <input type="hidden" id="codecostcode<?php echo $val2->apvi_id; ?>" name="codecostcodee" value="<?php echo $val2->apvi_costcode; ?>"  placeholder="กรอกรายการต้นทุน" readonly="true" class="codecostcodee form-control">
                         <input type="hidden" id="costname<?php echo $val2->apvi_id; ?>" name="costnamee" value="<?php echo $val2->apvi_costname; ?>" placeholder="กรอกรายการต้นทุน" readonly="true" class="costnamee form-control">

                     </div>
                   </div>
               </div> 
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="qty">ปริมาณ</label>
						<input type="text" id="pqty<?php echo $val2->apvi_id; ?>" name="qtye" value="<?php echo $val2->apvi_qty; ?>" placeholder="กรอกปริมาณ" class="qtye form-control">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="input-group">
						<label for="unit">หน่วย</label>
						<input type="text" id="punit<?php echo $val2->apvi_id; ?>" name="punite" value="<?php echo $val2->apvi_unit; ?>" placeholder="กรอกหน่วย" class="punite<?php echo $val2->apvi_id;?> form-control input-sm">
						<span class="input-group-btn">
                         <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit<?php echo $val2->apvi_id;?>" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="price_unit">ราคา/หน่วย</label>
						<input type="text" id="pprice_unit<?php echo $val2->apvi_id; ?>" name="pprice_unite" value="<?php echo $val2->apvi_priceunit; ?>" placeholder="กรอกราคา/หน่วย" class="pprice_unite form-control">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="amount">จำนวนเงิน</label>
						<input type="text" id="pamount<?php echo $val2->apvi_id; ?>" readonly="true" name="pamounte" value="<?php echo $val2->apvi_amount; ?>" placeholder="กรอกจำนวนเงิน" class="pamounte form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">

						<label for="endtproject">ส่วนลด 1 (%)</label>
						<input type='text' id="pdiscper1<?php echo $val2->apvi_id; ?>" name="pdiscper1e" value="" placeholder="กรอกส่วนลด" class="pdiscper1e form-control" />
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="endtproject">ส่วนลด 2 (%)</label>
						<input type='text' id="pdiscper2<?php echo $val2->apvi_id; ?>" name="pdiscper2e" value="" placeholder="กรอกส่วนลด" class="pdiscper2e form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="endtproject">ส่วนลดพิเศษ</label>
						<input type='text' id="pdiscex<?php echo $val2->apvi_id; ?>" value="" name="pdiscexe" class="pdiscexe form-control" />
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
						<input type='text' id="pdisamt<?php echo $val2->apvi_id; ?>" name="pdisamte" value="" class="pdisamte form-control" />
					</div>
				</div>
				<div class="col-xs-2">
					<div class="form-group">
							<button id="chkprice<?php echo $val2->apvi_id; ?>" class="btn btn-primary"style="margin-top:25px;">ดูราคา</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<div class="form-group">
						<label for="endtproject">จำนวนเงินสุทธิ</label>
            <input type='hidden' id="pvat<?php echo $val2->apvi_id; ?>" name="pvate" value="0" class="pvate form-control" />
						<input type='text' id="pnetamt<?php echo $val2->apvi_id; ?>" name="pnetamte" value="" class="pnetamte form-control" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="endtproject">หมายเหตุ</label>

						<input type='text' id="premark<?php echo $val2->apvi_id; ?>" name="premarke" value="" class="premarke form-control" />
					</div>
				</div>
			</div>
<php></php>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<input type="hidden" class="prid<?php echo $val2->apvi_id; ?> form-control" name="prid" value="<?php echo $val2->apvi_id; ?>">
						<input type="hidden" class="pocode form-control" name="pocode" value="<?php echo $val2->apvi_ref; ?>">
						<button id="editdetailpr<?php echo $val2->apvi_id; ?>" data-dismiss="modal" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
					</div>
				</div>
			</div>

	</div>
	<!-- panal body -->
</div>
</div>
</div>
<!-- end modal PO Detail -->


<!-- matcode and costcode -->
<!--  modal gen matcode and costcode -->
<div class="modal fade" id="gencode1<?php echo $val2->apvi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="type1<?php echo $val2->apvi_id;?>" class="col-xs-6">
                    <h4>รายการประเภทสินค้า 1</h4>
                    <select multiple class="form-control" id="box1<?php echo $val2->apvi_id;?>" style="height:350px;">
                    </select>
                </div>
                <div id="type2<?php echo $val2->apvi_id;?>" class="col-xs-6">

                     <h4>รายการประเภทสินค้า 2</h4>
                     <select multiple class="form-control" id="box2<?php echo $val2->apvi_id;?>" style="height:350px;">

</select>

                </div>
                <div id="type3<?php echo $val2->apvi_id;?>" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 3</h4>
                    <select multiple class="form-control" id="box3<?php echo $val2->apvi_id;?>" style="height:350px;">

</select>
                </div>
                <div id="type4<?php echo $val2->apvi_id;?>" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 4</h4>
                    <select multiple class="form-control" id="box4<?php echo $val2->apvi_id;?>" style="height:350px;">

</select>
                </div>
                <div id="type5<?php echo $val2->apvi_id;?>" class="col-xs-6">
                  <h4>รายการประเภทสินค้า 5</h4>
                     <select multiple class="form-control" id="box5<?php echo $val2->apvi_id;?>" style="height:350px;"/>
                </select>
                     <select multiple class="form-control" id="box6<?php echo $val2->apvi_id;?>" style="height:350px;"/>
</select>
                </div>

                <div class="col-xs-12" id="gencodebtn<?php echo $val2->apvi_id;?>">
                    <hr>
                    <button class="btn btn-primary" id="btngenmatcode<?php echo $val2->apvi_id;?>" data-dismiss="modal" style="float: right;">สร้าง MatCode</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="costcode1<?php echo $val2->apvi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1<?php echo $val2->apvi_id;?>" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1<?php echo $val2->apvi_id;?>" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2<?php echo $val2->apvi_id;?>" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2<?php echo $val2->apvi_id;?>" style="height:150px;">

</select>

                </div>
                <div id="tabcost3<?php echo $val2->apvi_id;?>" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3<?php echo $val2->apvi_id;?>" style="height:150px;">
                        </select>
                                   </div>


                <div id="cost-control<?php echo $val2->apvi_id;?>" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup<?php echo $val2->apvi_id;?>">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->
  <!-- end matcode and costcode-->
<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit<?php echo $val2->apvi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="datasource" class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php $this->db->select('*');
                $qur = $this->db->get('unit');
                $getunit = $qur->result();
           ?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openuny<?php echo $val2->apvi_id;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-unitr<?php echo $val2->apvi_id;?>="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
         <script>
    $(".openuny<?php echo $val2->apvi_id;?>").click(function(){
      $(".punite<?php echo $val2->apvi_id;?>").val($(this).data('unitr<?php echo $val2->apvi_id;?>'));
    });
  </script>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $("#codeup<?php echo $val2->apvi_id;?>").click(function(){});
     $("#gencodebtn<?php echo $val2->apvi_id;?>").hide();
     $("#type2<?php echo $val2->apvi_id;?>").hide();
     $("#type3<?php echo $val2->apvi_id;?>").hide();
     $("#type4<?php echo $val2->apvi_id;?>").hide();
     $("#type5<?php echo $val2->apvi_id;?>").hide();
     $('#cost-control<?php echo $val2->apvi_id;?>').hide();
     $("#cost4<?php echo $val2->apvi_id;?>").hide();
     $("#box6<?php echo $val2->apvi_id;?>").hide();
     $("#tabcost4<?php echo $val2->apvi_id;?>").hide();

     $('#gencode<?php echo $val2->apvi_id;?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $val2->apvi_id;?>").show();
     $("#type2<?php echo $val2->apvi_id;?>").hide();
     $("#type3<?php echo $val2->apvi_id;?>").hide();
     $("#type4<?php echo $val2->apvi_id;?>").hide();
     $("#type5<?php echo $val2->apvi_id;?>").hide();

     $("#gencodebtn<?php echo $val2->apvi_id;?>").hide();


     });


     $('#box1<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1<?php echo $val2->apvi_id;?>" ).change(function() {
           var b1 = $('#box1<?php echo $val2->apvi_id;?>').val();
           $('#box2<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2<?php echo $val2->apvi_id;?>").show();
          $('#vgencode1<?php echo $val2->apvi_id;?>').html('');

    });
    $( "#box2<?php echo $val2->apvi_id;?>" ).change(function() {
         $("#type1<?php echo $val2->apvi_id;?>").hide();
         var b1 = $('#box1<?php echo $val2->apvi_id;?>').val();
         var b2 = $('#box2<?php echo $val2->apvi_id;?>').val();
         $('#box3<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3<?php echo $val2->apvi_id;?>").show();
    });
    $( "#box3<?php echo $val2->apvi_id;?>" ).change(function() {
        var b1 = $('#box1<?php echo $val2->apvi_id;?>').val();
         var b2 = $('#box2<?php echo $val2->apvi_id;?>').val();
         var b3 = $('#box3<?php echo $val2->apvi_id;?>').val();
         $('#box4<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4<?php echo $val2->apvi_id;?>").show();
         $("#type2<?php echo $val2->apvi_id;?>").hide();
    });
    $( "#box4<?php echo $val2->apvi_id;?>" ).change(function() {
         //$("#type4").hide();
         $('#type3<?php echo $val2->apvi_id;?>').hide();
         $("#gencodebtn<?php echo $val2->apvi_id;?>").show();
         //$("#type5").show();

    });
    $("#box5<?php echo $val2->apvi_id;?>").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode<?php echo $val2->apvi_id;?>').click(function(){
     var b1 = $('#box1<?php echo $val2->apvi_id;?>').val();
     var b2 = $('#box2<?php echo $val2->apvi_id;?>').val();
     var b3 = $('#box3<?php echo $val2->apvi_id;?>').val();
     var b4 = $('#box4<?php echo $val2->apvi_id;?>').val();
     var b5 = $('#box5<?php echo $val2->apvi_id;?>').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6<?php echo $val2->apvi_id;?>').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){
              $('#matname<?php echo $val2->apvi_id;?>').val(data);
              $('#vgencode1<?php echo $val2->apvi_id;?>').html(data);
            });

    });


    $('#cost1<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1<?php echo $val2->apvi_id;?>" ).change(function() {

         var c1 = $('#cost1<?php echo $val2->apvi_id;?>').val();
         $('#cost2<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2<?php echo $val2->apvi_id;?>").show();
         $("#tabcost4<?php echo $val2->apvi_id;?>").hide();
    });
    $( "#cost2<?php echo $val2->apvi_id;?>" ).change(function() {

         var c2 = $('#cost2<?php echo $val2->apvi_id;?>').val();
         $('#cost3<?php echo $val2->apvi_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
         
    });
    $( "#cost3<?php echo $val2->apvi_id;?>").change(function() {
          $("#cost-control<?php echo $val2->apvi_id;?>").show();

    });
    $("#btncostup<?php echo $val2->apvi_id;?>").click(function(){
       var c1 = $('#cost1<?php echo $val2->apvi_id;?>').val();
     var c2 = $('#cost2<?php echo $val2->apvi_id;?>').val();
     var c3 = $('#cost3<?php echo $val2->apvi_id;?>').val();
     var codecostcode1 = c1+''+c2+''+c3;
     $('#codecostcode<?php echo $val2->apvi_id;?>').val(codecostcode1);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall_costcode";
          var dataSet={
            c1: codecostcode1
            };
            $.post(url,dataSet,function(data){
              alert(data);
              $('#costname<?php echo $val2->apvi_id;?>').val(data);
              $('#gcostcode1<?php echo $val2->apvi_id;?>').html(data);
            });

    });



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>



<script>

$('#editdetailpr<?php echo $val2->apvi_id; ?>').click(function(){
  var url="<?php echo base_url(); ?>index.php/acc_active/editapv_d";
  var dataSet={
    apvid: "<?php echo $val2->apvi_id; ?>",
    apvno: $('#apvno').val(),
      matcodeb6: $('#matcodeb6<?php echo $val2->apvi_id; ?>').val(),
      matname: $('#matname<?php echo $val2->apvi_id; ?>').val(),
      codecostcode: $('#codecostcode<?php echo $val2->apvi_id; ?>').val(),
      costname: $('#costname<?php echo $val2->apvi_id; ?>').val(),
      pqty: $('#pqty<?php echo $val2->apvi_id; ?>').val(),
      punit: $('#punit<?php echo $val2->apvi_id; ?>').val(),
      pprice_unit: $('#pprice_unit<?php echo $val2->apvi_id; ?>').val(),
      pamount: $('#pamount<?php echo $val2->apvi_id; ?>').val(),
      pdiscper1: $('#pdiscper1<?php echo $val2->apvi_id; ?>').val(),
      pdiscper2: $('#pdiscper2<?php echo $val2->apvi_id; ?>').val(),
      pdiscex: $('#pdiscex<?php echo $val2->apvi_id; ?>').val(),
      pdisamt: $('#pdisamt<?php echo $val2->apvi_id; ?>').val(),
      ccvat: $('#ccvat<?php echo $val2->apvi_id; ?>').val(),
      pvat: $('#pvat<?php echo $val2->apvi_id; ?>').val(),
      pnetamt: $('#pnetamt<?php echo $val2->apvi_id; ?>').val(),
      premark: $('#premark<?php echo $val2->apvi_id; ?>').val(),
      prcode:  $('.pocode<?php echo $val2->apvi_id; ?>').val(),
      prid:   $('.prid<?php echo $val2->apvi_id; ?>').val(),
    };
  $.post(url,dataSet,function(data){
 //////////////////////////////////////////////////////     
 // alert("save complete");
     alert(data);
     var ff = data;
     $('#loaddetail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $("#loaddetail").load('<?php echo base_url(); ?>index.php/newapo/pv_detail'+'/'+ff);
////////////////////////////////
  });
  
 
  
});

 $('#chkprice<?php echo $val2->apvi_id; ?>').click(function(){
	  var xqty = $('#pqty<?php echo $val2->apvi_id; ?>').val();
	  var xprice = $('#pprice_unit<?php echo $val2->apvi_id; ?>').val();
	  var xamount = xqty*xprice;
	  var xdiscper1 = $('#pdiscper1<?php echo $val2->apvi_id; ?>').val();
	  var xdiscper2 = $('#pdiscper2<?php echo $val2->apvi_id; ?>').val();
	  var xdiscper3 = $('#pdiscex<?php echo $val2->apvi_id; ?>').val();
	  var xpd1 = xamount - (xamount*xdiscper1)/100;
	  var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
	  var xpd3 = xpd2 - xdiscper3;
	  var xvat = $('#pvat<?php echo $val2->apvi_id; ?>').val();
	  
	  $('#pamount<?php echo $val2->apvi_id; ?>').val(xamount);
	  if(xdiscper3 != ''){
		  	$('#pdisamt<?php echo $val2->apvi_id; ?>').val(xpd3);
		  	vxpd3 = xpd3 - (xpd3*xvat)/100;
		  	$('#pnetamt<?php echo $val2->apvi_id; ?>').val(vxpd3)
		  }
	  else if(xdiscper2 != ''){
		  
		  		   $('#pdisamt<?php echo $val2->apvi_id; ?>').val(xpd2);
		  		   vxpd2 = xpd2 - (xpd2*xvat)/100;
		  		   $('#pnetamt<?php echo $val2->apvi_id; ?>').val(vxpd2)
	  }
	  else
	  {
	  $('#pdisamt<?php echo $val2->apvi_id; ?>').val(xpd1);
	  		vxpd1 = xpd1 - (xpd1*xvat)/100;
		  	$('#pnetamt<?php echo $val2->apvi_id; ?>').val(vxpd1)
	  }
	  
	  
  });
  
  </script>

<?php } ?>


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
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#datasource').DataTable();

// } );

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

</script>

