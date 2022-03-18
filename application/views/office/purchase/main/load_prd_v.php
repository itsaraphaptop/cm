
<div class="table-responsive">
<table class="tablew table-hover table-bordered table-striped table-xxs" >
  <thead>
    <tr>
      <th>No.</th>
      <th width="10" class="text-center">Select</th>
      <th>Material Code</th>
      <th width="500">Material</th>
      <th>Cost Code</th>
      <!-- <th>Cost Name</th> -->
      <th>Qty</th>
      <th>Unit</th>
      <th>Price/Unit</th>
      <th>Amount</th>
      <th>Disc.1(%)</th>
      <th>Disc.2(%)</th>
      <th>Disc.3(%)</th>
      <th>Disc.4(%)</th>
      <th>Disc.Amt</th>
      <th>Total Disc</th>
      <th>Total Vat</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="body">

<?php $n = 1;
$pri_priceunit = 0;
$pri_amount = 0;
$pri_discountper1 = 0;
$pri_discountper2 = 0;
$pri_discountper3 = 0;
$pri_discountper4 = 0;
$pri_pdiscex = 0;
$pri_disamt = 0;
$pri_tovat = 0;
$pri_netamt = 0;

foreach ($prd as $u) {
	$pri_priceunit = $pri_priceunit + $u->pri_priceunit;
	$pri_amount = $pri_amount + $u->pri_amount;
	$pri_discountper1 = $pri_discountper1 + $u->pri_discountper1;
	$pri_discountper2 = $pri_discountper2 + $u->pri_discountper2;
	$pri_discountper3 = $pri_discountper3 + $u->pri_discountper3;
	$pri_discountper4 = $pri_discountper4 + $u->pri_discountper4;
	$pri_pdiscex = $pri_pdiscex + $u->pri_pdiscex;
	$pri_disamt = $pri_disamt + $u->pri_disamt;
	$pri_tovat = $pri_tovat + $u->pri_tovat;
	$pri_netamt = $pri_netamt + $u->pri_netamt;
	?>
      <?php
$this->db->select('*');
	$this->db->where('boq_id', $u->pri_boqid);
	$this->db->where('status', 0);
	$priboqid = $this->db->get('boq_item')->result();
	?>



        <tr id="<?php echo $n; ?>">

          <td><?php echo $n; ?></td>
          <td>
            <div class="checkbox checkbox-switchery switchery-xs">
             <label>
                <input type="checkbox"  id="a<?php echo $n; ?>" checked class="switchery">
                <input type="hidden" name="chki[]" id="chki<?php echo $n; ?>" value="Y">
                <input type="hidden" name="priidi[]" value="<?php echo $u->pri_id; ?>">
              </label>
            </div>
          </td>
          <td id="smatcode<?php echo $n; ?>" width="10%"><div class='input-group'><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="<?php echo $u->pri_matcode; ?>"><span class='input-group-btn'><a data-toggle="modal" data-target="#edit<?php echo $n; ?>" class='btn btn-default btn-icon'><i class='icon-search4'></i></a></span></div></td>
          <td id="smatname<?php echo $n; ?>"><?php if ($u->pri_matcode == "") {echo "<a class='editable editable-click editable-unsaved editable-empty'>$u->pri_matname</a>";} else {echo "<small class='text-success'>$u->pri_matname</small>";}?><input type="hidden" name="matnamei[]" id="matnametext<?php echo $n; ?>" value="<?php echo $u->pri_matname; ?>"></td>
          <td id="scostcode<?php echo $n; ?>"><?php echo $u->pri_costcode; ?><input type="hidden" name="costcodei[]" value="<?php echo $u->pri_costcode; ?>"><input type="hidden" name="costnamei[]" value="<?php echo $u->pri_costname; ?>"></td>
          <!-- <td id="scostname<?php echo $n; ?>"><?php echo $u->pri_costname; ?> --><!-- </td> -->


          <td id="sqtyi<?php echo $n; ?>"><?php echo number_format($u->pri_qty, 2); ?><input type="hidden" name="qtyi[]" value="<?php echo $u->pri_qty; ?>"></td>
          <td id="sunit<?php echo $n; ?>"><?php echo $u->pri_unit; ?><input type="hidden" name="uniti[]" value="<?php echo $u->pri_unit; ?>"></td>
          <td id="spriceunit<?php echo $n; ?>"><?php echo number_format($u->pri_priceunit, 2); ?><input type="hidden" id="priceuniti<?php echo $n; ?>" name="priceuniti[]" value="<?php echo $u->pri_priceunit; ?>"></td>
          <td id="samount<?php echo $n; ?>"><?php echo number_format($u->pri_amount, 2); ?><input type="hidden" name="amounti[]" id="amounti<?php echo $n; ?>" value="<?php echo $u->pri_amount; ?>"></td>
          <td id="sdisone<?php echo $n; ?>"><?php echo number_format($u->pri_discountper1, 2); ?><input type="hidden" name="disci1[]" value="<?php echo $u->pri_discountper1; ?>"></td>
          <td id="sdistwo<?php echo $n; ?>"><?php echo number_format($u->pri_discountper2, 2); ?><input type="hidden" name="disci2[]" value="<?php echo $u->pri_discountper2; ?>"></td>
          <td id="sdisthree<?php echo $n; ?>"><?php echo number_format($u->pri_discountper3, 2); ?><input type="hidden" name="disci3[]" value="<?php echo $u->pri_discountper3; ?>"></td>
          <td id="sdisfour<?php echo $n; ?>"><?php echo number_format($u->pri_discountper4, 2); ?><input type="hidden" name="disci4[]" value="<?php echo $u->pri_discountper4; ?>"></td>
          <td id="sdisamt<?php echo $n; ?>"><?php echo number_format($u->pri_pdiscex, 2); ?><input type="hidden" name="disamti[]" value="<?php echo $u->pri_pdiscex; ?>">
          </td>
          <td id="tto_di<?php echo $n; ?>"><?php echo number_format($u->pri_disamt, 2); ?><input type="hidden" name="too_di[]" value="<?php echo $u->pri_disamt; ?>">

          <td id="total_vat<?php echo $n; ?>"><?php echo $u->pri_tovat; ?><input type="hidden" name="to_vat[]" value="<?php echo $u->pri_tovat; ?>">
          <td id="snetamt<?php echo $n; ?>"><?php echo number_format($u->pri_netamt, 2); ?><input type="hidden" name="netamti[]" value="<?php echo $u->pri_netamt; ?>">
          <input type="hidden" name="remarki[]" id="sremark<?php echo $n; ?>" value="<?php echo $u->pri_remark; ?>">

          <input type="hidden" name="accode[]" value="<?php echo $u->pr_assetid; ?>">
          <input type="hidden" name="acname[]" value="<?php echo $u->pr_assetname; ?>">
          <input type="hidden" name="statusass[]" value="<?php echo $u->pr_asset; ?>">
          </td>

          <td>
            <ul class="icons-list">
                            <li><a data-toggle="modal" data-target="#edit<?php echo $n; ?>" data-popup="tooltip" title="Edit" id="editfa<?php echo $n; ?>"  <?php foreach ($priboqid as $boqbg) {?> id="bgbd<?php echo $n; ?>" <?php }?>><i class="icon-pencil7"></i></a></li>
                            <li><a id="remove<?php echo $n; ?>" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></li>

                          </ul>
          </td>

        </tr>
<script>

$("#editfa<?php echo $n; ?>").click(function(){

                    var sumary_unit = parseFloat($("#summaryunit").val());
                    var rowsum_unit = parseFloat($("#pprice_unit<?php echo $n; ?>").val());
                    var sum_unit = parseFloat(sumary_unit-rowsum_unit);
                    $("#summaryunit").val(sum_unit);

                    var sumary_amt = parseFloat($("#summaryamt").val());
                    var rowsum_amt = parseFloat($("#pamount<?php echo $n; ?>").val());
                    var sum_amt = sumary_amt-rowsum_amt;
                    $("#summaryamt").val(sum_amt);

                    var sumary_dis = parseFloat($("#summarydis").val());
                    var rowsum_dis = parseFloat($("#pdiscex<?php echo $n; ?>").val());
                    var sum_dis = sumary_dis-rowsum_dis;
                    $("#summarydis").val(sum_dis);

                    var sumary_d1 = parseFloat($("#summaryd1").val());
                    var rowsum_d1 = parseFloat($("#pdiscper1<?php echo $n; ?>").val());
                    var sum_d1 = sumary_d1-rowsum_d1;
                    $("#summaryd1").val(sum_d1);

                    var sumary_d2 = parseFloat($("#summaryd2").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2<?php echo $n; ?>").val());
                    var sum_d2 = sumary_d2-rowsum_d2;
                    $("#summaryd2").val(sum_d2);

                    var sumary_d3 = parseFloat($("#summaryd3").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3<?php echo $n; ?>").val());
                    var sum_d3 = sumary_d3-rowsum_d3;
                    $("#summaryd3").val(sum_d3);

                    var sumary_d4 = parseFloat($("#summaryd4").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4<?php echo $n; ?>").val());
                    var sum_d4 = sumary_d4-rowsum_d4;
                    $("#summaryd4").val(sum_d4);

                    var sumary_di = parseFloat($("#summarydi").val());
                    var rowsum_di = parseFloat($("#too_di<?php echo $n; ?>").val());
                    var sum_di = sumary_di-rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = parseFloat($("#summaryvat").val());
                    var rowsum_vat = parseFloat($("#to_vat<?php echo $n; ?>").val());
                    var sum_vat = sumary_vat-rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = parseFloat($("#summarytot").val());
                    var rowsum = parseFloat($("#pnetamt<?php echo $n; ?>").val());
                    var sumtot = sumary-rowsum;
                    $("#summarytot").val(sumtot);
});

</script>

        <script>
       $(document).on('click', 'a#remove<?php echo $n; ?>', function () { // <-- changes

        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
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
                    onClick: function ($noty) {
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


        function rowadd()
        {
          var tr = '<tr>'+
          '<td colspan="13" class="text-center">No Data</td>'
          '</tr>';
          $('#body').append(tr);
        }

        </script>
    <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n; ?>").val("Y");
        }else{
            $("#chki<?php echo $n; ?>").val("");
        }

      });
    </script>


 <!-- Full width modal -->
            <div id="edit<?php echo $n; ?>" class="modal fade" data-backdrop="false">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Edit <?php echo $u->pri_matname; ?></h5>
                  </div>

                  <div class="modal-body">




          <div class="row">
              <div class="col-xs-6">
                <label for="">รายการซื้อ
                <?php foreach ($priboqid as $boqbg) {
		?>
                                          <?php
if ($boqbg->chkcontroll == 0) {
			echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';
		} else if ($boqbg->chkcontroll == 1) {
			echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control Budget</button>';
		}}?></label>

                              <div class="form-group" id="error<?php echo $n; ?>">
                             <!--  <span class="input-group-addon">
                                <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                              </span> -->
                                <input type="text" id="newmatname<?php echo $n; ?>"  placeholder="เลือกรายการซื้อ" class="form-control " value="<?php echo $u->pri_matname; ?>" readonly="">
                                <input type="text" id="newmatcode<?php echo $n; ?>"  placeholder="เลือกรายการซื้อ" class="form-control " value="<?php echo $u->pri_matcode; ?>" disabled>
                                  <!-- <span class="input-group-btn" > -->
                                    <!-- <a class="insertnewmat<?php echo $n; ?> btn btn-primary" data-toggle="modal" data-target="#insertmatnew<?php echo $n; ?>"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a> -->
                                   <!--  <a href="<?php echo base_url(); ?>data_master/newmatcode" target="_blank" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a>
                                    <a class="openun<?php echo $n; ?> btn btn-primary" data-toggle="modal" data-target="#opnewmat<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                  </span> -->
                              </div>
              </div>
              <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="costnameint<?php echo $n; ?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="<?php echo $u->pri_costname; ?>">
                                <input type="text" id="codecostcodeint<?php echo $n; ?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="<?php echo $u->pri_costcode; ?>">

                                 <input type="hidden" id="chkhidden<?php echo $n; ?>" readonly="true" placeholder="" class="form-control " value="<?php echo $u->pri_boqid; ?>">

                                  <input type="hidden" id="costmatsub<?php echo $n; ?>" readonly="true" placeholder="" class="form-control " value="<?php echo substr($u->pri_costcode, 0, 1); ?>">

                                  <span class="input-group-btn" >
                                    <a class="costcode<?php echo $n; ?> btn btn-primary" data-toggle="modal" data-target="#costcode<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                  </span>
                              </div>
                            </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="qty">ปริมาณ</label>
                          <input type="text" id="pqty<?php echo $n; ?>" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="<?php echo $u->pri_qty; ?>">
                </div>
              </div>
              <div class="col-xs-6">
                                <div class="input-group">
                                  <label for="unit">หน่วย</label>
                                  <input type="text" id="punit<?php echo $n; ?>" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="<?php echo $u->pri_unit; ?>">
                                <span class="input-group-btn" >
                                  <a class="unit<?php echo $n; ?> btn btn-primary" data-toggle="modal" data-target="#openunit<?php echo $n; ?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                </span>
                              </div>
                            </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                          <label for="qty">แปลงค่า IC</label>
                          <input type="text" id="cpqtyic<?php echo $n; ?>" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="<?php echo $u->pri_cpqtyic; ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                          <label for="qty">ปริมาณ IC</label>
                          <input type="text" id="pqtyic<?php echo $n; ?>" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="<?php echo $u->pri_pqtyic; ?>">
                </div>
              </div>
              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="unit">หน่วย IC</label>
                                  <input type="text" id="punitic<?php echo $n; ?>" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="<?php echo $u->pri_punitic; ?>">
                               <!--  <span class="input-group-btn" >
                                  <a class="unitic<?php echo $n; ?> btn btn-primary" data-toggle="modal" data-target="#openunitic<?php echo $n; ?>" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                </span> -->
                              </div>
                            </div>
          </div>

               <script>
          $("#pqty<?php echo $n; ?>").keyup(function() {
            var xqty = parseFloat($("#pqty<?php echo $n; ?>").val());
            var cpqtyic = parseFloat($("#cpqtyic<?php echo $n; ?>").val());
            var xpq = xqty*cpqtyic;
            $("#pqtyic<?php echo $n; ?>").val(xpq);
            });

          $("#cpqtyic<?php echo $n; ?>").keyup(function() {
            var xqty = parseFloat($("#pqty<?php echo $n; ?>").val());
            var cpqtyic = parseFloat($("#cpqtyic<?php echo $n; ?>").val());
            var xpq = xqty*cpqtyic;
            $("#pqtyic<?php echo $n; ?>").val(xpq);
            });
         </script>
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                          <label for="price_unit">ราคา/หน่วย</label>
                          <input type="number" id="pprice_unit<?php echo $n; ?>"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="<?php echo $u->pri_priceunit; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                          <label for="amount">จำนวนเงิน</label>
                          <input type="text" id="pamount<?php echo $n; ?>" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="<?php echo $u->pri_amount; ?>">
                </div>
              </div>
          </div>
           <div class="row">
                <div class="col-md-3">
                  <div class="form-group">

                     <label for="endtproject">ส่วนลด 1 (%)</label>
                     <input type='text' id="pdiscper1<?php echo $n; ?>" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $u->pri_discountper1; ?>" />
                  </div>
                </div>
                    <div class="col-md-3">
                      <div class="form-group">
                         <label for="endtproject">ส่วนลด 2 (%)</label>
                         <input type='text' id="pdiscper2<?php echo $n; ?>" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $u->pri_discountper2; ?>" />
                      </div>
                    </div>
                <div class="col-md-3">
                  <div class="form-group">

                     <label for="endtproject">ส่วนลด 3 (%)</label>
                     <input type='text' id="pdiscper3<?php echo $n; ?>" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $u->pri_discountper3; ?>" />
                  </div>
                </div>
                    <div class="col-md-3">
                      <div class="form-group">
                         <label for="endtproject">ส่วนลด 4 (%)</label>
                         <input type='text' id="pdiscper4<?php echo $n; ?>" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="<?php echo $u->pri_discountper4; ?>" />
                      </div>
                    </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                   <label for="endtproject">ส่วนลดพิเศษ</label>
                   <input type='text' id="pdiscex<?php echo $n; ?>" name="discountper2" class="form-control text-right" value="<?php echo $u->pri_pdiscex; ?>"/>
                  </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                     <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                     <input type='text' id="pdisamt<?php echo $n; ?>" name="disamt" class="form-control text-right" value="<?php echo $u->pri_disamt; ?>" readonly="true"/>

                     <!-- <input type="hidden" id="pvat<?php echo $n; ?>" value="0"> -->
                     <input type="hidden" name="too_di" id="too_di<?php echo $n; ?>" value="0">
                     <input type="hidden" name="tot_vat[]" id="tot_vat<?php echo $n; ?>" value="0">


                    </div>
              </div>

              <div class="col-md-2">
          <div class="form-group">
              <a id="chkprice<?php echo $n; ?>" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>
          </div>
        </div>
            </div>

              <?php foreach ($priboqid as $boqbg) {

		if ($boqbg->chkcontroll == 0) {
			echo '';
		} else if ($boqbg->chkcontroll == 1) {
			echo '<div class="row">
               <div class="col-xs-2">
               <div class="form-group">
                     <label>Prev. PU Cost</label>
                     <input class="form-control text-right" type="text" name="pucost[]" id="pucost' . $n . '" value="0" readonly="">
                     </div>

                     </div>
                      <div class="col-xs-2">
               <div class="form-group">
                     <label>Full Budget</label>
                     <input class="form-control text-right" type="text" name="fullbudget[]" id="fullbudget' . $n . '" value="' . $boqbg->boq_budget_total . '" readonly="">
                     </div>

                     </div>


                          <div class="col-xs-2">
               <div class="form-group">
                     <label>% Control</label>
                     <input class="form-control text-right" type="text" name="controlcost[]" id="controlcost' . $n . '" value="' . $boqbg->controlcost . '" readonly="">
                     </div>

                     </div>

                     <div class="col-xs-3">
               <div class="form-group">
                     <label>This Budget Control</label>
                     <input class="form-control text-right border-danger" type="text" name="bgcontrolcost[]" id="bgcontrolcost' . $n . '" value="' . ($boqbg->boq_budget_total / 100) * $boqbg->controlcost . '" readonly="">
                     </div>

                     </div>

                        <div class="col-xs-3">
               <div class="form-group">
                     <label>Budget Bal</label>
                     <input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost' . $n . '"  readonly="">
                     </div>

                     </div>
                    </div>';
		}
	}
	?>

<?php foreach ($priboqid as $boqbg) {?>
<script>
   $("#bgbd<?php echo $n; ?>").click(function(){
    var costbg = parseFloat($('#costbg<?php echo $boqbg->boq_id; ?>').val());
    $("#totalcost<?php echo $n; ?>").val(costbg)
});
</script>
<?php }?>
            <div class="row">
            <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">vat</label>

                    <input type='text' id="to_vat<?php echo $n; ?>" name="to_vat" class="form-control text-right" value="<?php echo $u->pri_tovat; ?>" readonly="true"/>
                  </div>
                 </div>
                 <div class="col-md-2">
                  <div class="form-group">
                     <label for="endtproject">จำนวนเงินสุทธิ</label>

                     <input type='text' id="pnetamt<?php echo $n; ?>" name="netamt" class="form-control text-right" value="<?php echo $u->pri_netamt; ?>" readonly="true"/>
                   </div>
                  </div>
            <div class="col-md-8">
                  <div class="form-group">
                     <label for="endtproject">หมายเหตุ</label>

                     <input type='text' id="premark<?php echo $n; ?>" name="remark" class="form-control" value="<?php echo $u->pri_remark; ?>"/>
                  </div>
            </div>
          </div>

           <div class="row">
              <div class="col-md-6">
                    <input type="hidden" name="poid" value="">

              </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
                            <label for="">Ref. Asset Code</label>
                              <div class="input-group">
                          <input type="text" id="accode<?php echo $n; ?>" name="accode"  readonly="true"  class="form-control " value="<?php echo $u->pr_assetid; ?>">
                          <input type="text" id="acname<?php echo $n; ?>" name="acname" readonly="true"  class="form-control " value="<?php echo $u->pr_assetname; ?>">
                          <input type="hidden" id="statusass<?php echo $n; ?>" name="statusass" readonly="true"  class="form-control " value="<?php echo $u->pr_asset; ?>">
                                  <span class="input-group-btn" >
                                    <a class="btn btn-info" id="refasset<?php echo $n; ?>" data-toggle="modal" data-target="#refass<?php echo $n; ?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                                  </span>
                              </div>
                            </div>
          </div>
                  </div>
                  <div class="modal-footer">
                    <a id="insertpodetail<?php echo $n; ?>" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>
                    <a type="button" id="closefa<?php echo $n; ?>" class="btn btn-link" data-dismiss="modal">Close</a>
                    <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- /full width modal -->

            <script>

$("#closefa<?php echo $n; ?>").click(function(){

                    var sumary_unit = parseFloat($("#summaryunit").val());
                    var rowsum_unit = parseFloat($("#pprice_unit<?php echo $n; ?>").val());
                    var sum_unit = parseFloat(sumary_unit+rowsum_unit);
                    $("#summaryunit").val(sum_unit);

                    var sumary_amt = parseFloat($("#summaryamt").val());
                    var rowsum_amt = parseFloat($("#pamount<?php echo $n; ?>").val());
                    var sum_amt = sumary_amt+rowsum_amt;
                    $("#summaryamt").val(sum_amt);

                    var sumary_dis = parseFloat($("#summarydis").val());
                    var rowsum_dis = parseFloat($("#pdiscex<?php echo $n; ?>").val());
                    var sum_dis = sumary_dis+rowsum_dis;
                    $("#summarydis").val(sum_dis);

                    var sumary_d1 = parseFloat($("#summaryd1").val());
                    var rowsum_d1 = parseFloat($("#pdiscper1<?php echo $n; ?>").val());
                    var sum_d1 = sumary_d1+rowsum_d1;
                    $("#summaryd1").val(sum_d1);

                    var sumary_d2 = parseFloat($("#summaryd2").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2<?php echo $n; ?>").val());
                    var sum_d2 = sumary_d2+rowsum_d2;
                    $("#summaryd2").val(sum_d2);

                    var sumary_d3 = parseFloat($("#summaryd3").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3<?php echo $n; ?>").val());
                    var sum_d3 = sumary_d3+rowsum_d3;
                    $("#summaryd3").val(sum_d3);

                    var sumary_d4 = parseFloat($("#summaryd4").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4<?php echo $n; ?>").val());
                    var sum_d4 = sumary_d4+rowsum_d4;
                    $("#summaryd4").val(sum_d4);

                    var sumary_di = parseFloat($("#summarydi").val());
                    var rowsum_di = parseFloat($("#too_di<?php echo $n; ?>").val());
                    var sum_di = sumary_di+rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = parseFloat($("#summaryvat").val());
                    var rowsum_vat = parseFloat($("#to_vat<?php echo $n; ?>").val());
                    var sum_vat = sumary_vat+rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = parseFloat($("#summarytot").val());
                    var rowsum = parseFloat($("#pnetamt<?php echo $n; ?>").val());
                    var sumtot = sumary+rowsum;
                    $("#summarytot").val(sumtot);
});

</script>
            <script>
            $("#cpqtyic<?php echo $n; ?>").keyup(function(){
              var qtyx = $("#pqty<?php echo $n; ?>").val()*$("#cpqtyic<?php echo $n; ?>").val();
              $("#pqtyic<?php echo $n; ?>").val(qtyx);

            });
              $('#chkprice<?php echo $n; ?>').click(function(){
                var xqty = parseFloat($('#pqty<?php echo $n; ?>').val());
                var xprice = parseFloat($('#pprice_unit<?php echo $n; ?>').val());
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($('#pdiscper1<?php echo $n; ?>').val());
                var xdiscper2 = parseFloat($('#pdiscper2<?php echo $n; ?>').val());
                var xdiscper3 = parseFloat($('#pdiscper3<?php echo $n; ?>').val());
                var xdiscper4 = parseFloat($('#pdiscper4<?php echo $n; ?>').val());
                var xdiscper5 = parseFloat($('#pdiscex<?php echo $n; ?>').val());
                var xvatt = parseFloat($('#vatper').val());
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($('#vatper').val());

                $('#pamount<?php echo $n; ?>').val(xamount);
                $('#too_di<?php echo $n; ?>').val(total_di);

                $('#to_vat<?php echo $n; ?>').val(xpd8.toFixed(4));
                $('#tot_vat<?php echo $n; ?>').val(xvatt);
                if(xdiscper5 != 0){
                  vxpd4 = xpd4-xdiscper5;
                    $('#pdisamt<?php echo $n; ?>').val(vxpd4);
                    $('#too_di<?php echo $n; ?>').val(vxpd4);
                    vxpd5 = (xpd4-xdiscper5) + xpd8;
                    $('#pnetamt<?php echo $n; ?>').val(vxpd5.toFixed(4));
                  }
                  else if(xdiscper2 != 0){

                         $('#pdisamt<?php echo $n; ?>').val(xpd4);
                         $('#too_di<?php echo $n; ?>').val(xpd4);
                         vxpd2 = xpd4 + xpd8;
                         $('#pnetamt<?php echo $n; ?>').val(vxpd2.toFixed(4));
                }
                  else if(xdiscper3 != 0){

                         $('#pdisamt<?php echo $n; ?>').val(xpd4);
                         $('#too_di<?php echo $n; ?>').val(xpd4);
                         vxpd3 = xpd4 + xpd8;
                         $('#pnetamt<?php echo $n; ?>').val(vxpd3.toFixed(4));
                }
                else if(xdiscper4 != 0){

                         $('#pdisamt<?php echo $n; ?>').val(xpd4);
                         $('#too_di<?php echo $n; ?>').val(xpd4);
                         vxpd5 = xpd4 + xpd8;
                         $('#pnetamt<?php echo $n; ?>').val(vxpd5.toFixed(4));
                }

                else
                {
                $('#pdisamt<?php echo $n; ?>').val(xpd1);
                $('#too_di<?php echo $n; ?>').val(xpd1);
                    vxpd1 = xpd4 + xpd8;
                    $('#pnetamt<?php echo $n; ?>').val(vxpd1.toFixed(4));
                }


        var ckkcontrolbg = $('#ckkcontrolbg').val();
        if(ckkcontrolbg=="2"){
<?php foreach ($priboqid as $boqbg) {?>
                var costbg = parseFloat($('#costbg<?php echo $boqbg->boq_id; ?>').val());
                 $('#totalcost<?php echo $n; ?>').val(costbg-xpd1);
<?php }?>
                 var totalcost = parseFloat($('#totalcost<?php echo $n; ?>').val());
                     if (parseFloat(totalcost) < parseFloat("0")) {
    swal({
      title: "รายการมากกว่าใน Budget.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });

      $("#pprice_unit<?php echo $n; ?>").val('0');
      $("#pdisamt<?php echo $n; ?>").val('0');
      $("#pamount<?php echo $n; ?>").val('0');

      $("#totalcost<?php echo $n; ?>").val('0');
      $("#to_vat<?php echo $n; ?>").val('0');
      $("#pnetamt<?php echo $n; ?>").val('0');



    }
        }


              });



              $("#insertpodetail<?php echo $n; ?>").click(function(){


                if ($("#newmatcode<?php echo $n; ?>").val()!="") {
                  // $("#edit<?php echo $n; ?>").modal('toggle');
                  $("#smatcode<?php echo $n; ?>").html("<div class='input-group'><input type='text' class='form-control' name='matcodei[]' id='matcodei' required  value="+$("#newmatcode<?php echo $n; ?>").val()+"><span class='input-group-btn'><a data-toggle='modal' data-target='#edit<?php echo $n; ?>' class='btn btn-default btn-icon'><i class='icon-search4'></i></a></span><input type='hidden' name='chkbgadd[]' id='chkbgadd' value='1'></div>");
                  // $("#smatname<?php echo $n; ?>").html('<input type="text" name="matnamei[]" value='+$('#newmatname<?php echo $n; ?>').val()+'>');
                  $("#matnametext<?php echo $n; ?>").val($('#newmatname<?php echo $n; ?>').val());
                  $("#scostcode<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#codecostcodeint<?php echo $n; ?>").val()+'</a><input type="hidden" name="costcodei[]" value='+$("#codecostcodeint<?php echo $n; ?>").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint<?php echo $n; ?>").val()+'><input type="hidden" name="chkhidden[]" value='+$("#chkhidden<?php echo $n; ?>").val()+'><input type="hidden" name="costmatsub[]" value='+$("#costmatsub<?php echo $n; ?>").val()+'>');
                  $("#scostname<?php echo $n; ?>").html('<a class="editable editable-clicks">'+$("#costnameint<?php echo $n; ?>").val()+'</a>');

                  $("#sqtyi<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#pqty<?php echo $n; ?>").val()+"</a><input type='hidden' name='qtyi[]' id='qtyi<?php echo $n; ?>' value="+$("#pqty<?php echo $n; ?>").val()+"><input type='hidden' name='cqtyic[]' value="+$("#cpqtyic<?php echo $n; ?>").val()+"><input type='hidden' name='pqtyic[]' value="+$("#pqtyic<?php echo $n; ?>").val()+">");

                  $("#spriceunit<?php echo $n; ?>").html("<input type='text' name='priceuniti[]' value="+$("#pprice_unit<?php echo $n; ?>").val()+"   class='txt form-control input-sm' readonly><input type='hidden' name='punitic[]' value="+$("#punitic<?php echo $n; ?>").val()+">");

                  $("#sunit<?php echo $n; ?>").html("<a class='editable editable-clicks'>"+$("#punit<?php echo $n; ?>").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit<?php echo $n; ?>").val()+">");

                  $("#samount<?php echo $n; ?>").html("<input class='txt1 form-control input-sm' type='text' id='amounti<?php echo $n; ?>' name='amounti[]' value="+$("#pamount<?php echo $n; ?>").val()+" readonly>");

                  $("#sdisone<?php echo $n; ?>").html("<input class='form-control input-sm' type='text' name='disci1[]' id='disci1<?php echo $n; ?>' value="+$("#pdiscper1<?php echo $n; ?>").val()+" readonly>");

                  $("#sdistwo<?php echo $n; ?>").html("<input class='form-control input-sm' type='text' name='disci2[]' id='disci2<?php echo $n; ?>' value="+$("#pdiscper2<?php echo $n; ?>").val()+" readonly>");

                  $("#sdisthree<?php echo $n; ?>").html("<input class='form-control input-sm' type='text' name='disci3[]' id='disci3<?php echo $n; ?>' value="+$("#pdiscper3<?php echo $n; ?>").val()+" readonly>");

                  $("#sdisfour<?php echo $n; ?>").html("<input  class='form-control input-sm' type='text' name='disci4[]' id='disci4<?php echo $n; ?>' value="+$("#pdiscper4<?php echo $n; ?>").val()+" readonly>");

                  $("#sdisamt<?php echo $n; ?>").html("<input type='text' class='txt2 form-control input-sm' name='disamti[]'  id='zum1<?php echo $n; ?>' value="+$("#pdiscex<?php echo $n; ?>").val()+" readonly>");

                  $("#tto_di<?php echo $n; ?>").html("<input type='text' class='txt3 form-control input-sm' name='too_di[]' id='zum2<?php echo $n; ?>' value="+$("#too_di<?php echo $n; ?>").val()+" readonly>");

                  $("#total_vat<?php echo $n; ?>").html("<input type='text' class='txt4 form-control input-sm' name='to_vat[]' id='zum3<?php echo $n; ?>' value="+$("#to_vat<?php echo $n; ?>").val()+" readonly>");

                  $("#snetamt<?php echo $n; ?>").html("<input type='text' class='txt5 form-control input-sm' name='netamti[]' id='zum4<?php echo $n; ?>' value="+$("#pnetamt<?php echo $n; ?>").val()+" readonly><input type='hidden' name='reamrki[]' value="+$("#premark<?php echo $n; ?>").val()+"><input type='hidden' name='accode[]' value="+$("#accode<?php echo $n; ?>").val()+"><input type='hidden' name='acname[]' value="+$("#acname<?php echo $n; ?>").val()+"><input type='hidden' name='statusass[]' value="+$("#statusass<?php echo $n; ?>").val()+">");
                    // $("#edit<?php echo $n; ?> .close").click()
                    var sumary_unit = parseFloat($("#summaryunit").val());
                    var rowsum_unit = parseFloat($("#pprice_unit<?php echo $n; ?>").val());
                    var sum_unit = parseFloat(sumary_unit+rowsum_unit);
                    $("#summaryunit").val(sum_unit);

                    var sumary_amt = parseFloat($("#summaryamt").val());
                    var rowsum_amt = parseFloat($("#pamount<?php echo $n; ?>").val());
                    var sum_amt = sumary_amt+rowsum_amt;
                    $("#summaryamt").val(sum_amt);

                    var sumary_dis = parseFloat($("#summarydis").val());
                    var rowsum_dis = parseFloat($("#pdiscex<?php echo $n; ?>").val());
                    var sum_dis = sumary_dis+rowsum_dis;
                    $("#summarydis").val(sum_dis);

                    var sumary_d1 = parseFloat($("#summaryd1").val());
                    var rowsum_d1 = parseFloat($("#pdiscper1<?php echo $n; ?>").val());
                    var sum_d1 = sumary_d1+rowsum_d1;
                    $("#summaryd1").val(sum_d1);

                    var sumary_d2 = parseFloat($("#summaryd2").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2<?php echo $n; ?>").val());
                    var sum_d2 = sumary_d2+rowsum_d2;
                    $("#summaryd2").val(sum_d2);

                    var sumary_d3 = parseFloat($("#summaryd3").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3<?php echo $n; ?>").val());
                    var sum_d3 = sumary_d3+rowsum_d3;
                    $("#summaryd3").val(sum_d3);

                    var sumary_d4 = parseFloat($("#summaryd4").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4<?php echo $n; ?>").val());
                    var sum_d4 = sumary_d4+rowsum_d4;
                    $("#summaryd4").val(sum_d4);

                    var sumary_di = parseFloat($("#summarydi").val());
                    var rowsum_di = parseFloat($("#too_di<?php echo $n; ?>").val());
                    var sum_di = sumary_di+rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = parseFloat($("#summaryvat").val());
                    var rowsum_vat = parseFloat($("#to_vat<?php echo $n; ?>").val());
                    var sum_vat = sumary_vat+rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = parseFloat($("#summarytot").val());
                    var rowsum = parseFloat($("#pnetamt<?php echo $n; ?>").val());
                    var sumtot = sumary+rowsum;
                    $("#summarytot").val(sumtot);

                     <?php foreach ($priboqid as $boqbg) {?>
                   var totalcost = parseFloat($('#totalcost<?php echo $n; ?>').val());
                    $("#costbg<?php echo $boqbg->boq_id; ?>").val(totalcost);
                      <?php }?>

                }else{
                  swal({
                      title: "Please Chack!",
                      text: "Material Code Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                   $("#error<?php echo $n; ?>").attr("class", "input-group has-error has-feedback");
                  $("#newmatname<?php echo $n; ?>").focus();
                }
                if ($("#pprice_unit<?php echo $n; ?>").val()!=0) {

                }else{
                   swal({
                      title: "Unit Price Not Found!",
                      text: "Unit Price Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                }
              });
              $('#chk<?php echo $n; ?>').click(function(event) {
                if($('#chk<?php echo $n; ?>').prop('checked')) {
                 $('#newmatname<?php echo $n; ?>').prop('disabled', false);
              } else {
                  $('#newmatname<?php echo $n; ?>').prop('disabled', true);
              }
              });
            </script>

            <!-- modal  แผนก-->
             <div class="modal fade" id="insertmatnew<?php echo $n; ?>" data-backdrop="false">
              <div class="modal-dialog modal-full">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">New Material</h4>
                  </div>
                    <div class="modal-body">
                    <div class="panel-body">
                        <div class="row" id="modal_newmat<?php echo $n; ?>">

                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div> <!--end modal -->
            <script>
              $(".insertnewmat<?php echo $n; ?>").click(function(){
                $("#modal_newmat<?php echo $n; ?>").html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
               $("#modal_newmat<?php echo $n; ?>").load('<?php echo base_url(); ?>share/getmatcode_new');
              });
            </script>
            <div id="opnewmat<?php echo $n; ?>" class="modal fade">
            <div class="modal-dialog modal-full">
              <div class="modal-content ">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">เพิ่มรายการ</h5>
                </div>
                  <div class="modal-body">
                      <div class="row" id="modal_mat<?php echo $n; ?>"></div>

                  </div>
              </div>
            </div>
            </div>
            <script>
            $(".openun<?php echo $n; ?>").click(function(){
               $('#modal_mat<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
               $("#modal_mat<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/getmatcode22/<?php echo $n; ?>');
             });
            </script>
            <!-- costcode -->
            <div class="modal fade" id="costcode<?php echo $n; ?>" data-backdrop="false">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                </div>
                  <div class="modal-body">
                      <div id="modal_cost<?php echo $n; ?>"></div>
                  </div>
              </div>
            </div>
          </div><!-- end modal matcode and costcode -->
          <script>
          $(".costcode<?php echo $n; ?>").click(function(){
           $('#modal_cost<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
           $("#modal_cost<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/costcode_id/<?php echo $n; ?>');
         });
          </script>
          <!-- costcode -->
          <div class="modal fade" id="openunit<?php echo $n; ?>" data-backdrop="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
              </div>
                <div class="modal-body">
                    <div id="modal_unit<?php echo $n; ?>"></div>
                </div>
            </div>
          </div>
        </div><!-- end modal matcode and costcode -->
        <script>
        $(".unit<?php echo $n; ?>").click(function(){
         $('#modal_unit<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
         $("#modal_unit<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/unitid/<?php echo $n; ?>');
       });
        </script>
        <div class="modal fade" id="openunitic<?php echo $n; ?>" data-backdrop="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">หน่วย</h4>
            </div>
              <div class="modal-body">
                  <div id="modal_unitic<?php echo $n; ?>"></div>
              </div>
          </div>
        </div>
      </div><!-- end modal matcode and costcode -->
      <script>
      $(".unitic<?php echo $n; ?>").click(function(){
       $('#modal_unitic<?php echo $n; ?>').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
       $("#modal_unitic<?php echo $n; ?>").load('<?php echo base_url(); ?>index.php/share/unitid2/<?php echo $n; ?>');
     });
      </script>


      <script>
         $("#s3").click(function() {
          var s2 = parseFloat($('#s2').val());
              if(s2!="0"){
              var sum = 0;
              var zum2 = parseFloat($('#zum2<?php echo $n; ?>').val());
              var amounti = parseFloat($('#amounti<?php echo $n; ?>').val());
              var summaryamt = parseFloat($('#summaryamt').val());
              var s2 = parseFloat($('#s2').val());
              var zumtotal = ((amounti/summaryamt*s2));
              var zum1 = parseFloat($('#zum1<?php echo $n; ?>').val());
              var qtyi = parseFloat($('#qtyi<?php echo $n; ?>').val());
              var vatper = parseFloat($('#vatper').val());
              $("#zum1<?php echo $n; ?>").val(zumtotal.toFixed(2));
              $("#zum2<?php echo $n; ?>").val(amounti-zumtotal.toFixed(2));
              $("#zum3<?php echo $n; ?>").val((((amounti-zumtotal)*vatper)/100).toFixed(2));
              $("#zum4<?php echo $n; ?>").val(((((amounti-zumtotal)*vatper)/100)+amounti-zumtotal).toFixed(2));
              $("#zum5<?php echo $n; ?>").val(((amounti-zumtotal)/qtyi).toFixed(2));
              $("#disci1<?php echo $n; ?>").val("0");
              $("#disci2<?php echo $n; ?>").val("0");
              $("#disci3<?php echo $n; ?>").val("0");
              $("#disci4<?php echo $n; ?>").val("0");
              $("#summaryd1").val("0");
              $("#summaryd2").val("0");
              $("#summaryd3").val("0");
              $("#summaryd4").val("0");
              $("#pdiscex<?php echo $n; ?>").val(zumtotal.toFixed(2));
              $("#pdisamt<?php echo $n; ?>").val(amounti-zumtotal.toFixed(2));
              $("#to_vat<?php echo $n; ?>").val((((amounti-zumtotal)*vatper)/100).toFixed(2));
              $("#pnetamt<?php echo $n; ?>").val(((((amounti-zumtotal)*vatper)/100)+amounti-zumtotal).toFixed(2));

             var sum = 0;
             $(".txt").each(function() {
             if (!isNaN(this.value) && this.value.length != 0) {
             sum += parseFloat(this.value);
             $(this).css("background-color", "#FEFFB0");
             }else if (this.value.length != 0){
             $(this).css("background-color", "red");
             }
             });
             $("input#summaryunit").val(sum.toFixed(2));

             var sum1 = 0;
             $(".txt1").each(function() {
             if (!isNaN(this.value) && this.value.length != 0) {
             sum1 += parseFloat(this.value);
             $(this).css("background-color", "#FEFFB0");
             }else if (this.value.length != 0){
             $(this).css("background-color", "red");
             }
             });
             $("input#summaryamt").val(sum1.toFixed(2));

             var sum2 = 0;
             $(".txt2").each(function() {
             if (!isNaN(this.value) && this.value.length != 0) {
             sum2 += parseFloat(this.value);
             $(this).css("background-color", "#FEFFB0");
             }else if (this.value.length != 0){
             $(this).css("background-color", "red");
             }
             });
             $("input#summarydis").val(sum2.toFixed(2));

             var sum3 = 0;
             $(".txt3").each(function() {
             if (!isNaN(this.value) && this.value.length != 0) {
             sum3 += parseFloat(this.value);
             $(this).css("background-color", "#FEFFB0");
             }else if (this.value.length != 0){
             $(this).css("background-color", "red");
             }
             });
             $("input#summarydi").val(sum3.toFixed(2));

             var sum4 = 0;
             $(".txt4").each(function() {
             if (!isNaN(this.value) && this.value.length != 0) {
             sum4 += parseFloat(this.value);
             $(this).css("background-color", "#FEFFB0");
             }else if (this.value.length != 0){
             $(this).css("background-color", "red");
             }
             });
             $("input#summaryvat").val(sum4.toFixed(2));

             var sum5 = 0;
             $(".txt5").each(function() {
             if (!isNaN(this.value) && this.value.length != 0) {
             sum5 += parseFloat(this.value);
             $(this).css("background-color", "#FEFFB0");
             }else if (this.value.length != 0){
             $(this).css("background-color", "red");
             }
             });
             $("input#summarytot").val(sum5.toFixed(2));


             }
          });
      </script>
<?php $n++;}?>

<tr>
                        <td colspan="6" class="text-center">Summary</td>
                        <td></td>
                        <!-- <td></td> -->
                        <td><input type="text" readonly class="form-control input-sm" id="summaryunit" name="summaryunit" value="<?php echo $pri_priceunit; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summaryamt" name="summaryamt" value="<?php echo $pri_amount; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summaryd1" name="summaryd1" value="<?php echo $pri_discountper1; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summaryd2" name="summaryd2" value="<?php echo $pri_discountper2; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summaryd3" name="summaryd3" value="<?php echo $pri_discountper3; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summaryd4" name="summaryd4" value="<?php echo $pri_discountper4; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summarydis" name="summarydis"  value="<?php echo $pri_pdiscex; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summarydi" name="summarydi" value="<?php echo $pri_disamt; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summaryvat" name="summaryvat" value="<?php echo $pri_tovat; ?>"></td>
                        <td><input type="text" readonly class="form-control input-sm" id="summarytot" name="summarytot" value="<?php echo $pri_netamt; ?>"></td>
                        <!-- <td><label id="summarytot"></label></td> -->
                        <td></td>
        </tr>
  </tbody>
    </table>
<script>

// Initialize multiple switches
if (Array.prototype.forEach) {
   var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
   elems.forEach(function(html) {
       var switchery = new Switchery(html);
   });
}
else {
   var elems = document.querySelectorAll('.switchery');
   for (var i = 0; i < elems.length; i++) {
       var switchery = new Switchery(elems[i]);
   }
}

// $("#inst").prop('disabled', true);
</script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/editable/editable.min.js"></script>
<script>
 $.fn.editable.defaults.highlight = false;
 $.fn.editable.defaults.mode = 'popup';
 $.fn.editableform.template = '<form class="editableform">' +
     '<div class="control-group">' +
     '<div class="editable-input"></div> <div class="editable-buttons"></div>' +
     '<div class="editable-error-block"></div>' +
     '</div> ' +
     '</form>';
 $.fn.editableform.buttons =
     '<button type="submit" class="btn btn-info btn-icon editable-submit"><i class="icon-check"></i></button>' +
     '<button type="button" class="btn btn-default btn-icon editable-cancel"><i class="icon-x"></i></button>';


 // Initialize
 $('.editable').editable();

</script> -->