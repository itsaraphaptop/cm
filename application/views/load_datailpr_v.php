
<div class="modal-header bg-info">
                  <button type="button" class="close" id="delclo" data-dismiss="modal">&times;</button>
                  <h2><?php echo $id; ?></h2>
 </div>

                <div class="modal-body">
<div class="col-md-12 text-right">
  <a type="button" class="label bg-danger" id="selectallpr">Select All</a>
  <br>
</div>

<table class="table table-hover table-bordered table-striped table-xxs">
                    <thead>
                                        <tr>
                        <th>No.</th>
                        <th>Material Code</th>
                        <th width="10000">Material</th>
                        <th>Cost Code</th>
                        <!-- <th>Cost Name</th> -->
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Price/Unit</th>
                        <th>Amount</th>
                        <!-- <th>Disc.1(%)</th>
                        <th>Disc.2(%)</th>
                        <th>Disc.3(%)</th>
                        <th>Disc.4(%)</th> -->
                        <th>Disc.Amt</th>
                        <th>Total Disc</th>
                        <th>Total Vat</th>
                        <th>Total</th>
                        <th>Control</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="body">
                                                            <?php $n=1; foreach ($pr as $u) { ?>
    <?php
    $this->db->select('*');       
    $this->db->where('boq_id',$u->pri_boqid);
    $this->db->where('status',0);
    $priboqid = $this->db->get('boq_item')->result();
    $chkcontroll = 0;
    $boq_budget_total = 0;
    $controlcost = 0;
    $summatyplus = 0;
    $boq_id = 0;
    foreach ($priboqid as $boqbg) {
     $chkcontroll = $boqbg->chkcontroll;
     $boq_budget_total = $boqbg->boq_budget_total;
     $controlcost = $boqbg->controlcost;
     $summatyplus = ($boqbg->boq_budget_total/100)*$boqbg->controlcost;
     $boq_id = $boqbg->boq_id;
    }
    ?>
                      <tr id="chk<?php echo $u->pri_id; ?>">
                        <td><?php echo $n; ?></td>
                                                                        <td><?php echo $u->pri_matcode; ?></td>
                                                                        <td><?php echo $u->pri_matname; ?></td>
                                                                        <td><?php echo $u->pri_costcode; ?></td>
                                                                        <td class="text-right"><?php echo number_format($u->pri_qty-$u->pri_sumqty,2); ?></td>
                                                                        <td class="text-right"><?php echo $u->pri_unit; ?></td>
                                                                        <td class="text-right"><?php echo number_format($u->pri_priceunit,2); ?></td>
                                                                        <td class="text-right"><?php echo number_format($u->pri_amount,2); ?></td>
                                                                        <td class="text-right"><?php echo number_format($u->pri_pdiscex,2); ?></td>
                                                                        <td class="text-right"><?php echo number_format($u->pri_disamt,2); ?></td>
                                                                        <td class="text-right"><?php echo $u->pri_tovat; ?></td>
                                                                        <td class="text-right"><?php echo number_format($u->pri_netamt,2); ?>

                                  <input type="hidden"  id="sumpu<?php echo $n;?>" value="<?php echo $u->pri_priceunit; ?>">
                                  <input type="hidden"  id="sumpu2<?php echo $n;?>" value="<?php echo $u->pri_amount; ?>">
                                  <input type="hidden"  id="sumpu3<?php echo $n;?>" value="<?php echo $u->pri_discountper1+$u->pri_discountper2+$u->pri_discountper3+$u->pri_discountper4; ?>">
                                  <input type="hidden"  id="sumpu4<?php echo $n;?>" value="<?php echo $u->pri_pdiscex; ?>">
                                  <input type="hidden"  id="sumpu5<?php echo $n;?>" value="<?php echo $u->pri_disamt; ?>">
                                  <input type="hidden"  id="sumpu6<?php echo $n;?>" value="<?php echo $u->pri_tovat; ?>">
                                  <input type="hidden"  id="sumpu7<?php echo $n;?>" value="<?php echo $u->pri_netamt; ?>">


                                  </td>
                                  <td>      <?php
                                          if($chkcontroll==0){
                                           echo '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';
                                          }else if($chkcontroll==1){
                                          echo '<button class="in label label-info"><i class="icon-checkmark4"></i> Control Budget</button>';
                                          }  ?></td>
                                  <td><a type="button" id="add<?php echo $n; ?>"  class="label bg-teal" >Select</a></td>
                                                                        
                      </tr>



<script>
$("#delclo").click(function(){
$(".se<?php echo $id; ?>").hide();
  });



  $("#add<?php echo $n; ?>").click(function(){

var summaryunit =  parseFloat($("#summaryunit").val());
var sumpu =  parseFloat($("#sumpu<?php echo $n; ?>").val());
$("#summaryunit").val(summaryunit+sumpu);

var summaryamt =  parseFloat($("#summaryamt").val());
var sumpu2 =  parseFloat($("#sumpu2<?php echo $n; ?>").val());
$("#summaryamt").val(summaryamt+sumpu2);

var summaryd1 =  parseFloat($("#summaryd1").val());
var sumpu3 =  parseFloat($("#sumpu3<?php echo $n; ?>").val());
$("#summaryd1").val(summaryd1+sumpu3);

var summarydis =  parseFloat($("#summarydis").val());
var sumpu4 =  parseFloat($("#sumpu4<?php echo $n; ?>").val());
$("#summarydis").val(summarydis+sumpu4);

var summarydi =  parseFloat($("#summarydi").val());
var sumpu5 =  parseFloat($("#sumpu5<?php echo $n; ?>").val());
$("#summarydi").val(summarydi+sumpu5);

var summaryvat =  parseFloat($("#summaryvat").val());
var sumpu6 =  parseFloat($("#sumpu6<?php echo $n; ?>").val());
$("#summaryvat").val(summaryvat+sumpu6);

var summarytot =  parseFloat($("#summarytot").val());
var sumpu7 =  parseFloat($("#sumpu7<?php echo $n; ?>").val());
$("#summarytot").val(summarytot+sumpu7);


var pri_id = '<?php echo $u->pri_id; ?>';
var pri_matname = '<?php echo $u->pri_matname; ?>';
var pri_matcode = '<?php echo $u->pri_matcode; ?>';
var pri_ref = '<?php echo $u->pri_ref; ?>';
var pri_costcode = '<?php echo $u->pri_costcode; ?>';
var pri_costcodee = '<?php echo substr($u->pri_costcode,0,1); ?>';
var pri_costname = '<?php echo $u->pri_costname; ?>';
var pri_qty = '<?php echo $u->pri_qty-$u->pri_sumqty; ?>';
var pri_unit = '<?php echo $u->pri_unit; ?>';
var pri_priceunit = '<?php echo $u->pri_priceunit; ?>';
var pri_amount = '<?php echo $u->pri_amount; ?>';
var pri_discountper1 = '<?php echo $u->pri_discountper1; ?>';
var pri_discountper2 = '<?php echo $u->pri_discountper2; ?>';
var pri_discountper3 = '<?php echo $u->pri_discountper3; ?>';
var pri_discountper4 = '<?php echo $u->pri_discountper4; ?>';
var allpri = '<?php echo $u->pri_discountper1+$u->pri_discountper2+$u->pri_discountper3+$u->pri_discountper4; ?>';
var pri_disamt = '<?php echo $u->pri_disamt; ?>';
var pri_vat = '<?php echo $u->pri_vat; ?>';
var pri_remark = '<?php echo $u->pri_remark; ?>';
var pri_netamt = '<?php echo $u->pri_netamt; ?>';
var datesend = '<?php echo $u->datesend; ?>';
var pri_status = '<?php echo $u->pri_status; ?>';
var pri_pono = '<?php echo $u->pri_pono; ?>';
var pri_count = '<?php echo $u->pri_count; ?>';
var pr_asset = '<?php echo $u->pr_asset; ?>';
var pr_assetid = '<?php echo $u->pr_assetid; ?>';
var pr_assetname = '<?php echo $u->pr_assetname; ?>';
var poi_qty = '<?php echo $u->poi_qty; ?>';
var pri_cpqtyic = '<?php echo $u->pri_cpqtyic; ?>';
var pri_pqtyic = '<?php echo $u->pri_pqtyic; ?>';
var pri_punitic = '<?php echo $u->pri_punitic; ?>';
var pri_pdiscex = '<?php echo $u->pri_pdiscex; ?>';
var pri_tovat = '<?php echo $u->pri_tovat; ?>';
var pri_boqid = '<?php echo $u->pri_boqid; ?>';
var pri_boqrow = '<?php echo $u->pri_boqrow; ?>';
var chkcontroll = '<?php echo $chkcontroll; ?>';
var boq_budget_total = '<?php echo $boq_budget_total; ?>';
var controlcost = '<?php echo $controlcost; ?>';
var summatyplus = '<?php echo $summatyplus; ?>';
var boq_id = '<?php echo $boq_id; ?>';
if(chkcontroll=="0"){
  var status = "hidden";
}

if(chkcontroll=="0"){
  var nbcb = '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';
}else{
  var nbcb = '<button class="in label label-info"><i class="icon-checkmark4"></i> Control Budget</button>';
}


 addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2
,pri_discountper3,pri_discountper4,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,allpri,chkcontroll,status,nbcb,boq_budget_total,controlcost,summatyplus,boq_id);

      $("#chk<?php echo $u->pri_id; ?>").hide(); 
       });


  function addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2,pri_discountper3,pri_discountper4,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,allpri,chkcontroll,status,nbcb,boq_budget_total,controlcost,summatyplus,boq_id)
            {
            
   

              var row = ($('#top tr').length-0)+1;         
              var tr = '<tr id="'+row+'">'+
          '<td>'+row+'</td>'+
          '<td>'+
            '<div class="checkbox checkbox-switchery switchery-xs">'+
             '<label>'+
                '<input type="checkbox"  id="a'+row+'" checked class="switchery">'+
                '<input type="hidden" name="chki[]" id="chki'+row+'" value="Y">'+
                '<input type="hidden" name="priidi[]" value="'+pri_id+'">'+
                '<input type="hidden" name="pr_noo[]" value="'+pri_ref+'">'+

              '</label>'+
            '</div>'+
          '</td>'+
         ' <td id="smatcode'+row+'" width="10%"><div class="input-group"><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="'+pri_matcode+'"><span class="input-group-btn"><a data-toggle="modal" data-target="#edit'+row+'" data-popup="tooltip" title="Edit" id="editfa'+row+'"  id="bgbd'+row+'" class="btn btn-default btn-icon"><i class="icon-search4"></i></a><a class="btn btn-default btn-icon" id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></span></div></td>'+
          '<td class="text-right" id="smatname'+row+'">'+pri_matname+'<input type="hidden" name="matnamei[]" id="matnametext'+row+'" value="'+pri_matname+'"></td>'+
          '<td class="text-right" id="scostcode'+row+'">'+pri_costcode+'<input type="hidden" name="costcodei[]" value="'+pri_costcode+'"><input type="hidden" name="costnamei[]" value="'+pri_costname+'"></td>'+
          '<td class="text-right" id="sqtyi'+row+'">'+numberWithCommas(pri_qty)+'<input type="hidden" name="qtyi[]" value="'+pri_qty+'"></td>'+
          '<td class="text-right" id="sunit'+row+'">'+numberWithCommas(pri_unit)+'<input type="hidden" name="uniti[]" value="'+pri_unit+'"></td>'+
          '<td class="text-right" id="spriceunit'+row+'">'+numberWithCommas(pri_priceunit)+'<input type="hidden" id="txt6 priceuniti'+row+'" name="priceuniti[]" value="'+pri_priceunit+'"></td>'+
          '<td class="text-right" id="samount'+row+'">'+numberWithCommas(pri_amount)+'<input type="hidden" name="amounti[]" id="amounti'+row+'" value="'+pri_amount+'"></td>'+
          '<td class="text-right" id="sdisone'+row+'">'+numberWithCommas(allpri)+'<input type="hidden" name="disci1[]" value="'+pri_discountper1+'"><input type="hidden" name="disci2[]" value="'+pri_discountper2+'"><input type="hidden" name="disci3[]" value="'+pri_discountper3+'"><input type="hidden" name="disci4[]" value="'+pri_discountper4+'"></td>'+
          '<td class="text-right" id="sdisamt'+row+'">'+numberWithCommas(pri_pdiscex)+'<input type="hidden" name="disamti[]" value="'+pri_pdiscex+'">'+
          '</td>'+
          '<td id="tto_di'+row+'">'+numberWithCommas(pri_disamt)+'<input type="hidden" name="too_di[]" value="'+pri_disamt+'">'+

          '<td class="text-right" id="total_vat'+row+'">'+numberWithCommas(pri_tovat)+'<input type="hidden" name="to_vat[]" value="'+pri_tovat+'">'+
          '<td class="text-right" id="snetamt'+row+'">'+numberWithCommas(pri_netamt)+'<input type="hidden" name="netamti[]" value="'+pri_netamt+'">'+
          '<input type="hidden" name="remarki[]" id="sremark'+row+'" value="'+pri_remark+'">'+

          '<input type="hidden" name="accode[]" value="'+pr_assetid+'">'+
          '<input type="hidden" name="acname[]" value="'+pr_assetname+'">'+
          '<input type="hidden" name="statusass[]" value="'+pr_asset+'">'+
          '</td>'+
          '<td style="color:#BEBEBE;">'+row+'</td>'+

        '</tr>';

         


         $(document).on('click', 'a#remove'+row+'', function () { // <-- changes
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
 
      $('#top').append(tr);


var rowmat = '<div id="edit'+row+'" class="modal fade" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                '<div class="modal-content">'+
                  '<div class="modal-header">'+
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                    '<h5 class="modal-title">Edit '+pri_matname+'</h5>'+
                  '</div>'+

                  '<div class="modal-body">'+


                                    
  
          '<div class="row">'+
              '<div class="col-xs-6">'+
                '<label for="">รายการซื้อ '+nbcb+'</label>'+

                              '<div class="form-group" id="error'+row+'">'+
                                '<input type="text" id="newmatname'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matname+'" readonly="">'+
                                '<input type="text" id="newmatcode'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matcode+'" disabled>'+
                              '</div>'+
              '</div>'+
              '<div class="col-xs-6">'+
                            '<label for="">รายการต้นทุน</label>'+
                              '<div class="input-group">'+
                                '<input type="text" id="costnameint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costname+'">'+
                                '<input type="text" id="codecostcodeint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costcode+'">'+

                                 '<input type="hidden" id="chkhidden'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_boqid+'">'+

                                  '<input type="hidden" id="costmatsub'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_costcodee+'">'+

                                  '<span class="input-group-btn" ><a class="costcode'+row+' btn btn-primary" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a></span>'+
                              '</div>'+
                            '</div>'+
          '</div>'+
          '<div class="row">'+
              '<div class="col-md-6">'+
                '<div class="form-group">'+
                          '<label for="qty">ปริมาณ</label>'+
                          '<input type="text" id="pqty'+row+'" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="'+pri_qty+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-xs-6">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย</label>'+
                                  '<input type="text" id="punit'+row+'" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="'+pri_unit+'">'+
                                '<span class="input-group-btn" >'+
                                  '<a class="unit'+row+' btn btn-primary" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
                                '</span>'+
                              '</div>'+
                            '</div>'+
          '</div>'+
          '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                          '<label for="qty">แปลงค่า IC</label>'+
                          '<input type="text" id="cpqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_cpqtyic+'">'+
                                          '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                          '<label for="qty">ปริมาณ IC</label>'+
                          '<input type="text" id="pqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_pqtyic+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
                                '<div class="form-group">'+
                                  '<label for="unit">หน่วย IC</label>'+
                                  '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="'+pri_punitic+'">'+
                              '</div>'+
                            '</div>'+
          '</div>'+


   
          ' <div class="row">'+
              '<div class="col-md-6">'+
               ' <div class="form-group">'+
                          '<label for="price_unit">ราคา/หน่วย</label>'+
                          '<input type="text" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="'+pri_priceunit+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
               ' <div class="form-group">'+
                          '<label for="amount">จำนวนเงิน</label>'+
                          '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="'+pri_amount+'">'+
                '</div>'+
              '</div>'+
          '</div>'+
           '<div class="row">'+
                '<div class="col-md-3">'+
                  '<div class="form-group">'+

                    ' <label for="endtproject">ส่วนลด 1 (%)</label>'+
                     '<input type="text" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper1+'" />'+
                  '</div>'+
                '</div>'+
                    '<div class="col-md-3">'+
                      '<div class="form-group">'+
                         '<label for="endtproject">ส่วนลด 2 (%)</label>'+
                        ' <input type="text" id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper2+'" />'+
                      '</div>'+
                    '</div>'+
               ' <div class="col-md-3">'+
                  '<div class="form-group">'+

                     '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                     '<input type="text" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper3+'" />'+
                  '</div>'+
                '</div>'+
                    '<div class="col-md-3">'+
                      '<div class="form-group">'+
                         '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                         '<input type="text" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper4+'" />'+
                      '</div>'+
                    '</div>'+
          '</div>'+
            '<div class="row">'+
              '<div class="col-md-6">'+
                 ' <div class="form-group">'+
                   '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                   '<input type="text" id="pdiscex'+row+'" name="discountper2" class="form-control text-right" value="'+pri_pdiscex+'"/>'+
                  '</div>'+
              '</div>'+
              '<div class="col-md-4">'+
                    '<div class="form-group">'+
                     '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                     '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control text-right" value="'+pri_disamt+'" readonly="true"/>'+

                     '<input type="hidden" name="too_di" id="too_di'+row+'" value="0">'+
                     '<input type="hidden" name="tot_vat[]" id="tot_vat'+row+'" value="0">'+


                    '</div>'+
             ' </div>'+

              '<div class="col-md-2">'+
          '<div class="form-group">'+
              '<a id="chkprice'+row+'" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>'+
          '</div>'+
        '</div>'+
            '</div>'+

              '<div class="row" '+status+'>'+
               '<div class="col-xs-2">'+
               '<div class="form-group">'+
                     '<label>Prev. PU Cost</label>'+
                     '<input class="form-control text-right" type="text" name="pucost[]" id="pucost'+row+'" value="0" readonly="">'+
                     '</div>'+

                     '</div>'+
                      '<div class="col-xs-2">'+
               '<div class="form-group">'+
                     '<label>Full Budget</label>'+
                     '<input class="form-control text-right" type="text" name="fullbudget[]" id="fullbudget'+row+'" value="'+boq_budget_total+'" readonly="">'+
                     '</div>'+

                     '</div>'+
            '<div class="col-xs-2">'+
               '<div class="form-group">'+
                     '<label>% Control</label>'+
                  '<input class="form-control text-right" type="text" name="controlcost[]" id="controlcost'+row+'" value="'+controlcost+'" readonly="" >'+
                     '</div>'+

                     '</div>'+
              
                    ' <div class="col-xs-3">'+
               '<div class="form-group">'+
                     '<label>This Budget Control</label>'+
                     '<input class="form-control text-right border-danger" type="text" name="bgcontrolcost[]" id="bgcontrolcost'+row+'" value="'+summatyplus+'" readonly="">'+
                     '</div>'+

                     '</div>'+

                        '<div class="col-xs-3">'+
               '<div class="form-group">'+
                     '<label>Budget Bal</label>'+
                     '<input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost'+row+'"  readonly="">'+
                     '</div>'+

                     '</div>'+
                    '</div>'+

            '<div class="row">'+
            '<div class="col-md-2">'+
                 '<div class="form-group">'+
                    '<label for="endtproject">vat</label>'+

                    '<input type="text" id="to_vat'+row+'" name="to_vat" class="form-control text-right" value="'+pri_tovat+'" readonly="true"/>'+
                  '</div>'+
                 '</div>'+
                 '<div class="col-md-2">'+
                  '<div class="form-group">'+
                     '<label for="endtproject">จำนวนเงินสุทธิ</label>'+

                     '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control text-right" value="'+pri_netamt+'" readonly="true"/>'+
                   '</div>'+
                 ' </div>'+
            '<div class="col-md-8">'+
                  '<div class="form-group">'+
                     '<label for="endtproject">หมายเหตุ</label>'+

                     '<input type="text" id="premark'+row+'" name="remark" class="form-control" value="'+pri_remark+'"/>'+
                  '</div>'+
            '</div>'+
          '</div>'+

           '<div class="row">'+
              '<div class="col-md-6">'+
                   ' <input type="hidden" name="poid" value="">'+

             ' </div>'+
          '</div>'+

          '<div class="row">'+
            '<div class="col-xs-6">'+
                           ' <label for="">Ref. Asset Code</label>'+
                              '<div class="input-group">'+
                          '<input type="text" id="accode'+row+'" name="accode"  readonly="true"  class="form-control " value="'+pr_assetid+'">'+
                          '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control " value="'+pr_assetname+'">'+
                          '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control " value="'+pr_asset+'">'+
                                  '<span class="input-group-btn" >'+
                                    '<a class="btn btn-info" id="refasset'+row+'" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
                                  '</span>'+
                              '</div>'+
                            '</div>'+
          '</div>'+
                  '</div>'+
                  '<div class="modal-footer">'+
                    '<a id="insertpodetail'+row+'" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>'+
                    '<a type="button" id="closefa'+row+'" class="btn btn-link" data-dismiss="modal">Close</a>'+
                   
                  '</div>'+
                '</div>'+
             ' </div>'+
                         '</div>';

                         $('.rowmat').append(rowmat);


                         $("#pqty"+row+"").keyup(function() {
                         
                          if ($("#pqty"+row+"").val()>""+pri_qty+"") {
                          swal({
                              title: "ปริมาณมากกว่าใน Pr !!.",
                              text: "",
                              confirmButtonColor: "#EA1923",
                              type: "error"
                          });
                          $("#pqty"+row+"").val(0);
                        }
                      });

      var cost =  '<div class="modal fade" id="costcode'+row+'" data-backdrop="false">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>'+
                '</div>'+
                  '<div class="modal-body">'+
                      '<div id="modal_cost'+row+'"></div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
          '</div>';
       $('.cost').append(cost);

          $(".costcode"+row+"").click(function(){
           $('#modal_cost'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
           $("#modal_cost"+row+"").load('<?php echo base_url(); ?>index.php/share/costcode_id/'+row);
         });
         
     
     var cost = '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
          '<div class="modal-dialog">'+
            '<div class="modal-content">'+
              '<div class="modal-header bg-info">'+
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
              '</div>'+
                '<div class="modal-body">'+
                    '<div id="modal_unit'+row+'"></div>'+
                '</div>'+
            '</div>'+
          '</div>'+
        '</div>';
      $('.cost').append(cost);

        $(".unit"+row+"").click(function(){
         $('#modal_unit'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
         $("#modal_unit"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid/'+row);
       });

      var cost =  '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
        '<div class="modal-dialog">'+
          '<div class="modal-content">'+
            '<div class="modal-header bg-info">'+
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
            '</div>'+
              '<div class="modal-body">'+
                  '<div id="modal_unitic'+row+'"></div>'+
              '</div>'+
          '</div>'+
        '</div>'+
      '</div>';
      $('.cost').append(cost);

      $(".unitic"+row+"").click(function(){
       $('#modal_unitic'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row);
     });


var cost =  '<div class="modal fade" id="refass'+row+'" data-backdrop="false">'+
  '<div class="modal-dialog modal-lg">'+
    '<div class="modal-content">'+
      '<div class="modal-header bg-info">'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
     ' </div>'+
        '<div class="modal-body">'+
            '<div id="refasscode'+row+'"></div>'+

        '</div>'+
    '</div>'+
  '</div>'+
'</div>';
$('.cost').append(cost);

$('#refasset'+row+'').click(function(){
   $('#refasscode'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refasscode"+row+"").load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
 });


                         $("#editfa"+row+"").click(function(){

                    var sumary_unit = parseFloat($("#summaryunit").val());
                    var rowsum_unit = parseFloat($("#pprice_unit"+row+"").val());
                    var sum_unit = parseFloat(sumary_unit-rowsum_unit);
                    $("#summaryunit").val(sum_unit); 

                    var sumary_amt = parseFloat($("#summaryamt").val());
                    var rowsum_amt = parseFloat($("#pamount"+row+"").val());
                    var sum_amt = sumary_amt-rowsum_amt;
                    $("#summaryamt").val(sum_amt);  

                    var sumary_dis = parseFloat($("#summarydis").val());
                    var rowsum_dis = parseFloat($("#pdiscex"+row+"").val());
                    var sum_dis = sumary_dis-rowsum_dis;
                    $("#summarydis").val(sum_dis);  

                    var sumary_d1 = parseFloat($("#summaryd1").val());
                    var rowsum_d1 = parseFloat($("#pdiscper1"+row+"").val());
                    var sum_d1 = sumary_d1-rowsum_d1;
                    $("#summaryd1").val(sum_d1); 

                    var sumary_d2 = parseFloat($("#summaryd2").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2"+row+"").val());
                    var sum_d2 = sumary_d2-rowsum_d2;
                    $("#summaryd2").val(sum_d2);  

                    var sumary_d3 = parseFloat($("#summaryd3").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3"+row+"").val());
                    var sum_d3 = sumary_d3-rowsum_d3;
                    $("#summaryd3").val(sum_d3); 

                    var sumary_d4 = parseFloat($("#summaryd4").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4"+row+"").val());
                    var sum_d4 = sumary_d4-rowsum_d4;
                    $("#summaryd4").val(sum_d4); 

                    var sumary_di = parseFloat($("#summarydi").val());
                    var rowsum_di = parseFloat($("#too_di"+row+"").val());
                    var sum_di = sumary_di-rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = parseFloat($("#summaryvat").val());
                    var rowsum_vat = parseFloat($("#to_vat"+row+"").val());
                    var sum_vat = sumary_vat-rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = parseFloat($("#summarytot").val());
                    var rowsum = parseFloat($("#pnetamt"+row+"").val());
                    var sumtot = sumary-rowsum;
                    $("#summarytot").val(sumtot);
                    

                    var rowsum = parseFloat($("#pnetamt"+row+"").val());

                  
                    });





             $(document).on('click', 'a#remove'+row+'', function () { // <-- changes

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

 $("#a"+row+"").click(function(){
        if ($("#a"+row+"").prop("checked")) {
            $("#chki"+row+"").val("Y");
        }else{
            $("#chki"+row+"").val("");
        }

      });
  

$("#cpqtyic"+row+"").keyup(function(){
              var qtyx = $("#pqty"+row+"").val()*$("#cpqtyic"+row+"").val();
              $("#pqtyic"+row+"").val(qtyx);


});


              $('#chkprice'+row+'').click(function(){
              alert(555);
                var xqty = parseFloat($('#pqty'+row+'').val());
                var xprice = parseFloat($('#pprice_unit'+row+'').val());
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val());
                var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val());
                var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val());
                var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val());
                var xdiscper5 = parseFloat($('#pdiscex'+row+'').val());
                var xvatt = parseFloat($('#vatper').val());
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($('#vatper').val());

                $('#pamount'+row+'').val(xamount);
                $('#too_di'+row+'').val(total_di);

                $('#to_vat'+row+'').val(xpd8.toFixed(4));
                $('#tot_vat'+row+'').val(xvatt);
                if(xdiscper5 != 0){
                  vxpd4 = xpd4-xdiscper5;
                    $('#pdisamt'+row+'').val(vxpd4);
                    $('#too_di'+row+'').val(vxpd4);
                    vxpd5 = (xpd4-xdiscper5) + xpd8;
                    $('#pnetamt'+row+'').val(vxpd5.toFixed(4));
                  }
                  else if(xdiscper2 != 0){

                         $('#pdisamt'+row+'').val(xpd4);
                         $('#too_di'+row+'').val(xpd4);
                         vxpd2 = xpd4 + xpd8;
                         $('#pnetamt'+row+'').val(vxpd2.toFixed(4));
                }
                  else if(xdiscper3 != 0){

                         $('#pdisamt'+row+'').val(xpd4);
                         $('#too_di'+row+'').val(xpd4);
                         vxpd3 = xpd4 + xpd8;
                         $('#pnetamt'+row+'').val(vxpd3.toFixed(4));
                }
                else if(xdiscper4 != 0){

                         $('#pdisamt'+row+'').val(xpd4);
                         $('#too_di'+row+'').val(xpd4);
                         vxpd5 = xpd4 + xpd8;
                         $('#pnetamt'+row+'').val(vxpd5.toFixed(4));
                }
                
                else
                {
                $('#pdisamt'+row+'').val(xpd1);
                $('#too_di'+row+'').val(xpd1);
                    vxpd1 = xpd4 + xpd8;
                    $('#pnetamt'+row+'').val(vxpd1.toFixed(4));
                }


        var ckkcontrolbg = $('#ckkcontrolbg').val();
        if(ckkcontrolbg=="2"){
  
                var costbg = parseFloat($('#costbg'+boq_id+'').val());
                 $('#totalcost'+row+'').val(costbg-xpd1);

                 var totalcost = parseFloat($('#totalcost'+row+'').val());
                     if (parseFloat(totalcost) < parseFloat("0")) {
    swal({
      title: "รายการมากกว่าใน Budget.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });

      $("#pprice_unit"+row+"").val('0');
      $("#pdisamt"+row+"").val('0');
      $("#pamount"+row+"").val('0');
      
      $("#totalcost"+row+"").val('0');
      $("#to_vat"+row+"").val('0');
      $("#pnetamt"+row+"").val('0');

      
      
    }
        }        

   $("#bgbd<?php echo $n; ?>").click(function(){
    var costbg = parseFloat($('#costbg'+boq_id+'').val());
    $("#totalcost<?php echo $n; ?>").val(costbg)
});
                 
              });



              $("#insertpodetail"+row+"").click(function(){
                var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val());
                var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val());
                var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val());
                var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val());
                var sumxdic = xdiscper1+xdiscper2+xdiscper3+xdiscper4;
                if ($("#newmatcode"+row+"").val()!="") {

                  $("#smatcode"+row+"").html("<div class='input-group'><input type='text' class='form-control ' name='matcodei[]' id='matcodei' required  value="+$("#newmatcode"+row+"").val()+"><span class='input-group-btn'><a data-toggle='modal' data-target='#edit"+row+"' id='editcost"+row+"' class='btn btn-default btn-icon'><i class='icon-search4'></i></a></span><input type='hidden' name='chkbgadd[]' id='chkbgadd' value='1'><input type='hidden' name='pr_noo[]' value='"+pri_ref+"'></div>");

                  $("#matnametext"+row+"").val($('#newmatname'+row+'').val());
                  $("#scostcode"+row+"").html('<a class="editable editable-clicks">'+$("#codecostcodeint"+row+"").val()+'</a><input type="hidden" name="costcodei[]" value='+$("#codecostcodeint"+row+"").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint"+row+"").val()+'><input type="hidden" name="chkhidden[]" value='+$("#chkhidden"+row+"").val()+'><input type="hidden" name="costmatsub[]" value='+$("#costmatsub"+row+"").val()+'>');
                  $("#scostname"+row+"").html('<a class="editable editable-clicks">'+$("#costnameint"+row+"").val()+'</a>');
                  
                  $("#sqtyi"+row+"").html("<a class='editable editable-clicks'>"+$("#pqty"+row+"").val()+"</a><input type='hidden' name='qtyi[]' id='qtyi"+row+"' value="+$("#pqty"+row+"").val()+"><input type='hidden' name='cqtyic[]' value="+$("#cpqtyic"+row+"").val()+"><input type='hidden' name='pqtyic[]' value="+$("#pqtyic"+row+"").val()+">");
                  
                  $("#spriceunit"+row+"").html("<input type='text' name='priceuniti[]' value="+$("#pprice_unit"+row+"").val()+"   class='txt form-control input-sm text-right' readonly><input type='hidden' name='punitic[]' value="+$("#punitic"+row+"").val()+">");
                  
                  $("#sunit"+row+"").html("<a class='editable editable-clicks'>"+$("#punit"+row+"").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit"+row+"").val()+">");
                  
                  $("#samount"+row+"").html("<input class='txt1 form-control input-sm text-right' type='text' id='amounti"+row+"' name='amounti[]' value="+$("#pamount"+row+"").val()+" readonly>");
                  
                  $("#sdisone"+row+"").html("<input class='form-control input-sm text-right' type='text'  value="+sumxdic+" readonly><input class='form-control input-sm' type='hidden' name='disci1[]' id='disci1"+row+"' value="+$("#pdiscper1"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci2[]' id='disci2"+row+"' value="+$("#pdiscper2"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci3[]' id='disci3"+row+"' value="+$("#pdiscper3"+row+"").val()+" readonly><input  class='form-control input-sm' type='hidden' name='disci4[]' id='disci4"+row+"' value="+$("#pdiscper4"+row+"").val()+" readonly>");
                  
                  
                  $("#sdisamt"+row+"").html("<input type='text' class='txt2 form-control input-sm text-right' name='disamti[]'  id='zum1"+row+"' value="+$("#pdiscex"+row+"").val()+" readonly>");

                  $("#tto_di"+row+"").html("<input type='text' class='txt3 form-control input-sm text-right' name='too_di[]' id='zum2"+row+"' value="+$("#too_di"+row+"").val()+" readonly>");

                  $("#total_vat"+row+"").html("<input type='text' class='txt4 form-control input-sm text-right' name='to_vat[]' id='zum3"+row+"' value="+$("#to_vat"+row+"").val()+" readonly>");

                  $("#snetamt"+row+"").html("<input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4"+row+"' value="+$("#pnetamt"+row+"").val()+" readonly><input type='hidden' name='reamrki[]' value="+$("#premark"+row+"").val()+"><input type='hidden' name='accode[]' value="+$("#accode"+row+"").val()+"><input type='hidden' name='acname[]' value="+$("#acname"+row+"").val()+"><input type='hidden' name='statusass[]' value="+$("#statusass"+row+"").val()+">");
               
                    var sumary_unit = parseFloat($("#summaryunit").val());
                    var rowsum_unit = parseFloat($("#pprice_unit"+row+"").val());
                    var sum_unit = parseFloat(sumary_unit+rowsum_unit);
                    $("#summaryunit").val(sum_unit); 
                    $("#summaryunit2").val(sum_unit); 


                    var sumary_amt = parseFloat($("#summaryamt").val());
                    var rowsum_amt = parseFloat($("#pamount"+row+"").val());
                    var sum_amt = sumary_amt+rowsum_amt;
                    $("#summaryamt").val(sum_amt);  

                    var sumary_dis = parseFloat($("#summarydis").val());
                    var rowsum_dis = parseFloat($("#pdiscex"+row+"").val());
                    var sum_dis = sumary_dis+rowsum_dis;
                    $("#summarydis").val(sum_dis);  

                    var sumary_d1 = parseFloat($("#summaryd1").val());
                    var rowsum_d1 = parseFloat($("#pdiscper1"+row+"").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2"+row+"").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3"+row+"").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4"+row+"").val());
                    var sum_d1 = sumary_d1+rowsum_d1+rowsum_d2+rowsum_d3+rowsum_d4;
                    $("#summaryd1").val(sum_d1); 

                    var sumary_d2 = parseFloat($("#summaryd2").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2"+row+"").val());
                    var sum_d2 = sumary_d2+rowsum_d2;
                    $("#summaryd2").val(sum_d2);  

                    var sumary_d3 = parseFloat($("#summaryd3").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3"+row+"").val());
                    var sum_d3 = sumary_d3+rowsum_d3;
                    $("#summaryd3").val(sum_d3); 

                    var sumary_d4 = parseFloat($("#summaryd4").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4"+row+"").val());
                    var sum_d4 = sumary_d4+rowsum_d4;
                    $("#summaryd4").val(sum_d4); 

                    var sumary_di = parseFloat($("#summarydi").val());
                    var rowsum_di = parseFloat($("#too_di"+row+"").val());
                    var sum_di = sumary_di+rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = parseFloat($("#summaryvat").val());
                    var rowsum_vat = parseFloat($("#to_vat"+row+"").val());
                    var sum_vat = sumary_vat+rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = parseFloat($("#summarytot").val());
                    var rowsum = parseFloat($("#pnetamt"+row+"").val());
                    var sumtot = sumary+rowsum;
                    $("#summarytot").val(sumtot);

                   var totalcost = parseFloat($('#totalcost'+row+'').val());
                    $("#costbg"+boq_id+"").val(totalcost);

                          $("#editcost"+row+"").click(function() {
            var zum2 = parseFloat($("#zum2"+row+"").val());
            var costbg = parseFloat($('#costbg'+boq_id+'').val());
            $('#costbg'+boq_id+'').val(zum2+costbg);
            });
                   
                }else{
                  swal({
                      title: "Please Chack!",
                      text: "Material Code Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                   $("#error"+row+"").attr("class", "input-group has-error has-feedback");
                  $("#newmatname"+row+"").focus();
                }
                if ($("#pprice_unit"+row+"").val()!=0) {
                  
                }else{
                   swal({
                      title: "Unit Price Not Found!",
                      text: "Unit Price Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                }
              });
              $('#chk'+row+'').click(function(event) {
                if($('#chk'+row+'').prop('checked')) {
                 $('#newmatname'+row+'').prop('disabled', false);
              } else {
                  $('#newmatname'+row+'').prop('disabled', true);
              }
              });

      

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


            }


$("#selectallpr").click(function(){

var summaryunit =  parseFloat($("#summaryunit").val());
var sumpu =  parseFloat($("#sumpu<?php echo $n; ?>").val());
$("#summaryunit").val(summaryunit+sumpu);

var summaryamt =  parseFloat($("#summaryamt").val());
var sumpu2 =  parseFloat($("#sumpu2<?php echo $n; ?>").val());
$("#summaryamt").val(summaryamt+sumpu2);

var summaryd1 =  parseFloat($("#summaryd1").val());
var sumpu3 =  parseFloat($("#sumpu3<?php echo $n; ?>").val());
$("#summaryd1").val(summaryd1+sumpu3);

var summarydis =  parseFloat($("#summarydis").val());
var sumpu4 =  parseFloat($("#sumpu4<?php echo $n; ?>").val());
$("#summarydis").val(summarydis+sumpu4);

var summarydi =  parseFloat($("#summarydi").val());
var sumpu5 =  parseFloat($("#sumpu5<?php echo $n; ?>").val());
$("#summarydi").val(summarydi+sumpu5);

var summaryvat =  parseFloat($("#summaryvat").val());
var sumpu6 =  parseFloat($("#sumpu6<?php echo $n; ?>").val());
$("#summaryvat").val(summaryvat+sumpu6);

var summarytot =  parseFloat($("#summarytot").val());
var sumpu7 =  parseFloat($("#sumpu7<?php echo $n; ?>").val());
$("#summarytot").val(summarytot+sumpu7);


var pri_id = '<?php echo $u->pri_id; ?>';
var pri_matname = '<?php echo $u->pri_matname; ?>';
var pri_matcode = '<?php echo $u->pri_matcode; ?>';
var pri_ref = '<?php echo $u->pri_ref; ?>';
var pri_costcode = '<?php echo $u->pri_costcode; ?>';
var pri_costcodee = '<?php echo substr($u->pri_costcode,0,1); ?>';
var pri_costname = '<?php echo $u->pri_costname; ?>';
var pri_qty = '<?php echo $u->pri_qty-$u->pri_sumqty; ?>';
var pri_unit = '<?php echo $u->pri_unit; ?>';
var pri_priceunit = '<?php echo $u->pri_priceunit; ?>';
var pri_amount = '<?php echo $u->pri_amount; ?>';
var pri_discountper1 = '<?php echo $u->pri_discountper1; ?>';
var pri_discountper2 = '<?php echo $u->pri_discountper2; ?>';
var pri_discountper3 = '<?php echo $u->pri_discountper3; ?>';
var pri_discountper4 = '<?php echo $u->pri_discountper4; ?>';
var allpri = '<?php echo $u->pri_discountper1+$u->pri_discountper2+$u->pri_discountper3+$u->pri_discountper4; ?>';
var pri_disamt = '<?php echo $u->pri_disamt; ?>';
var pri_vat = '<?php echo $u->pri_vat; ?>';
var pri_remark = '<?php echo $u->pri_remark; ?>';
var pri_netamt = '<?php echo $u->pri_netamt; ?>';
var datesend = '<?php echo $u->datesend; ?>';
var pri_status = '<?php echo $u->pri_status; ?>';
var pri_pono = '<?php echo $u->pri_pono; ?>';
var pri_count = '<?php echo $u->pri_count; ?>';
var pr_asset = '<?php echo $u->pr_asset; ?>';
var pr_assetid = '<?php echo $u->pr_assetid; ?>';
var pr_assetname = '<?php echo $u->pr_assetname; ?>';
var poi_qty = '<?php echo $u->poi_qty; ?>';
var pri_cpqtyic = '<?php echo $u->pri_cpqtyic; ?>';
var pri_pqtyic = '<?php echo $u->pri_pqtyic; ?>';
var pri_punitic = '<?php echo $u->pri_punitic; ?>';
var pri_pdiscex = '<?php echo $u->pri_pdiscex; ?>';
var pri_tovat = '<?php echo $u->pri_tovat; ?>';
var pri_boqid = '<?php echo $u->pri_boqid; ?>';
var pri_boqrow = '<?php echo $u->pri_boqrow; ?>';
var chkcontroll = '<?php echo $chkcontroll; ?>';
var boq_budget_total = '<?php echo $boq_budget_total; ?>';
var controlcost = '<?php echo $controlcost; ?>';
var summatyplus = '<?php echo $summatyplus; ?>';
var boq_id = '<?php echo $boq_id; ?>';
if(chkcontroll=="0"){
  var status = "hidden";
}

if(chkcontroll=="0"){
  var nbcb = '<button class="cancel label bg-danger"><i class="icon-cross3"></i> Not Control Budget</button>';
}else{
  var nbcb = '<button class="in label label-info"><i class="icon-checkmark4"></i> Control Budget</button>';
}

 addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2
,pri_discountper3,pri_discountper4,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,allpri,chkcontroll,status,nbcb,boq_budget_total,controlcost,summatyplus,boq_id);

      $("#chk<?php echo $u->pri_id; ?>").hide(); 
       });

  function addrow(pri_id,pri_matname,pri_matcode,pri_ref,pri_costcode,pri_costcodee,pri_costname,pri_qty,pri_unit,pri_priceunit,pri_amount,pri_discountper1,pri_discountper2,pri_discountper3,pri_discountper4,pri_disamt,pri_vat,pri_remark,pri_netamt,datesend,pri_status,pri_pono,pri_count,pr_asset,pr_assetid,pr_assetname,poi_qty,pri_cpqtyic,pri_pqtyic,pri_punitic,pri_pdiscex,pri_tovat,pri_boqid,pri_boqrow,allpri,chkcontroll,status,nbcb,boq_budget_total,controlcost,summatyplus,boq_id)
            {
             
              var row = ($('#top tr').length-0)+1;         
              var tr = '<tr id="'+row+'">'+
          '<td>'+row+'</td>'+
          '<td>'+
            '<div class="checkbox checkbox-switchery switchery-xs">'+
             '<label>'+
                '<input type="checkbox"  id="a'+row+'" checked class="switchery">'+
                '<input type="hidden" name="chki[]" id="chki'+row+'" value="Y">'+
                '<input type="hidden" name="priidi[]" value="'+pri_id+'">'+
                '<input type="hidden" name="pr_noo[]" value="'+pri_ref+'">'+
              '</label>'+
            '</div>'+
          '</td>'+
         ' <td id="smatcode'+row+'" width="10%"><div class="input-group"><input type="text" class="form-control" name="matcodei[]" id="matcodei" required  value="'+pri_matcode+'"><span class="input-group-btn"><a data-toggle="modal" data-target="#edit'+row+'" data-popup="tooltip" title="Edit" id="editfa'+row+'"  id="bgbd'+row+'" class="btn btn-default btn-icon"><i class="icon-search4"></i></a><a class="btn btn-default btn-icon" id="remove'+row+'" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></i></a></span></div></td>'+
          '<td class="text-right" id="smatname'+row+'">'+pri_matname+'<input type="hidden" name="matnamei[]" id="matnametext'+row+'" value="'+pri_matname+'"></td>'+
          '<td class="text-right" id="scostcode'+row+'">'+pri_costcode+'<input type="hidden" name="costcodei[]" value="'+pri_costcode+'"><input type="hidden" name="costnamei[]" value="'+pri_costname+'"></td>'+
          '<td class="text-right" id="sqtyi'+row+'">'+numberWithCommas(pri_qty)+'<input type="hidden" name="qtyi[]" value="'+pri_qty+'"></td>'+
          '<td class="text-right" id="sunit'+row+'">'+numberWithCommas(pri_unit)+'<input type="hidden" name="uniti[]" value="'+pri_unit+'"></td>'+
          '<td class="text-right" id="spriceunit'+row+'">'+numberWithCommas(pri_priceunit)+'<input type="hidden" id="txt6 priceuniti'+row+'" name="priceuniti[]" value="'+pri_priceunit+'"></td>'+
          '<td class="text-right" id="samount'+row+'">'+numberWithCommas(pri_amount)+'<input type="hidden" name="amounti[]" id="amounti'+row+'" value="'+pri_amount+'"></td>'+
          '<td class="text-right" id="sdisone'+row+'">'+numberWithCommas(allpri)+'<input type="hidden" name="disci1[]" value="'+pri_discountper1+'"><input type="hidden" name="disci2[]" value="'+pri_discountper2+'"><input type="hidden" name="disci3[]" value="'+pri_discountper3+'"><input type="hidden" name="disci4[]" value="'+pri_discountper4+'"></td>'+
          '<td class="text-right" id="sdisamt'+row+'">'+numberWithCommas(pri_pdiscex)+'<input type="hidden" name="disamti[]" value="'+pri_pdiscex+'">'+
          '</td>'+
          '<td id="tto_di'+row+'">'+numberWithCommas(pri_disamt)+'<input type="hidden" name="too_di[]" value="'+pri_disamt+'">'+

          '<td class="text-right" id="total_vat'+row+'">'+numberWithCommas(pri_tovat)+'<input type="hidden" name="to_vat[]" value="'+pri_tovat+'">'+
          '<td class="text-right" id="snetamt'+row+'">'+numberWithCommas(pri_netamt)+'<input type="hidden" name="netamti[]" value="'+pri_netamt+'">'+
          '<input type="hidden" name="remarki[]" id="sremark'+row+'" value="'+pri_remark+'">'+

          '<input type="hidden" name="accode[]" value="'+pr_assetid+'">'+
          '<input type="hidden" name="acname[]" value="'+pr_assetname+'">'+
          '<input type="hidden" name="statusass[]" value="'+pr_asset+'">'+
          '</td>'+
          '<td style="color:#BEBEBE;">'+row+'</td>'+

        '</tr>';

         


         $(document).on('click', 'a#remove'+row+'', function () { // <-- changes
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
 
      $('#top').append(tr);


var rowmat = '<div id="edit'+row+'" class="modal fade" data-backdrop="false">'+
              '<div class="modal-dialog modal-lg">'+
                '<div class="modal-content">'+
                  '<div class="modal-header">'+
                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                    '<h5 class="modal-title">Edit '+pri_matname+'</h5>'+
                  '</div>'+

                  '<div class="modal-body">'+


                                    
  
          '<div class="row">'+
              '<div class="col-xs-6">'+
                '<label for="">รายการซื้อ '+nbcb+'</label>'+

                              '<div class="form-group" id="error'+row+'">'+
                                '<input type="text" id="newmatname'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matname+'" readonly="">'+
                                '<input type="text" id="newmatcode'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control " value="'+pri_matcode+'" disabled>'+
                              '</div>'+
              '</div>'+
              '<div class="col-xs-6">'+
                            '<label for="">รายการต้นทุน</label>'+
                              '<div class="input-group">'+
                                '<input type="text" id="costnameint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costname+'">'+
                                '<input type="text" id="codecostcodeint'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control " value="'+pri_costcode+'">'+

                                 '<input type="hidden" id="chkhidden'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_boqid+'">'+

                                  '<input type="hidden" id="costmatsub'+row+'" readonly="true" placeholder="" class="form-control " value="'+pri_costcodee+'">'+

                                  '<span class="input-group-btn" ><a class="costcode'+row+' btn btn-primary" data-toggle="modal" data-target="#costcode'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a></span>'+
                              '</div>'+
                            '</div>'+
          '</div>'+
          '<div class="row">'+
              '<div class="col-md-6">'+
                '<div class="form-group">'+
                          '<label for="qty">ปริมาณ</label>'+
                          '<input type="text" id="pqty'+row+'" name="qty"  placeholder="กรอกปริมาณ" class="form-control text-right" value="'+pri_qty+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-xs-6">'+
                                '<div class="input-group">'+
                                  '<label for="unit">หน่วย</label>'+
                                  '<input type="text" id="punit'+row+'" name="punit" readonly="true" placeholder="กรอกหน่วย" class="form-control  text-right" value="'+pri_unit+'">'+
                                '<span class="input-group-btn" >'+
                                  '<a class="unit'+row+' btn btn-primary" data-toggle="modal" data-target="#openunit'+row+'" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
                                '</span>'+
                              '</div>'+
                            '</div>'+
          '</div>'+
          '<div class="row">'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                          '<label for="qty">แปลงค่า IC</label>'+
                          '<input type="text" id="cpqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_cpqtyic+'">'+
                                          '</div>'+
              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                          '<label for="qty">ปริมาณ IC</label>'+
                          '<input type="text" id="pqtyic'+row+'" name="qtyic"  placeholder="กรอกปริมาณ IC" class="form-control text-right" value="'+pri_pqtyic+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
                                '<div class="form-group">'+
                                  '<label for="unit">หน่วย IC</label>'+
                                  '<input type="text" id="punitic'+row+'" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control text-right " value="'+pri_punitic+'">'+
                              '</div>'+
                            '</div>'+
          '</div>'+


   
          ' <div class="row">'+
              '<div class="col-md-6">'+
               ' <div class="form-group">'+
                          '<label for="price_unit">ราคา/หน่วย</label>'+
                          '<input type="text" id="pprice_unit'+row+'"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg text-right" value="'+pri_priceunit+'">'+
                '</div>'+
              '</div>'+
              '<div class="col-md-6">'+
               ' <div class="form-group">'+
                          '<label for="amount">จำนวนเงิน</label>'+
                          '<input type="text" id="pamount'+row+'" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control text-right" value="'+pri_amount+'">'+
                '</div>'+
              '</div>'+
          '</div>'+
           '<div class="row">'+
                '<div class="col-md-3">'+
                  '<div class="form-group">'+

                    ' <label for="endtproject">ส่วนลด 1 (%)</label>'+
                     '<input type="text" id="pdiscper1'+row+'" name="discountper1" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper1+'" />'+
                  '</div>'+
                '</div>'+
                    '<div class="col-md-3">'+
                      '<div class="form-group">'+
                         '<label for="endtproject">ส่วนลด 2 (%)</label>'+
                        ' <input type="text" id="pdiscper2'+row+'" name="discountper2" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper2+'" />'+
                      '</div>'+
                    '</div>'+
               ' <div class="col-md-3">'+
                  '<div class="form-group">'+

                     '<label for="endtproject">ส่วนลด 3 (%)</label>'+
                     '<input type="text" id="pdiscper3'+row+'" name="discountper3" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper3+'" />'+
                  '</div>'+
                '</div>'+
                    '<div class="col-md-3">'+
                      '<div class="form-group">'+
                         '<label for="endtproject">ส่วนลด 4 (%)</label>'+
                         '<input type="text" id="pdiscper4'+row+'" name="discountper4" placeholder="กรอกส่วนลด" class="form-control text-right" value="'+pri_discountper4+'" />'+
                      '</div>'+
                    '</div>'+
          '</div>'+
            '<div class="row">'+
              '<div class="col-md-6">'+
                 ' <div class="form-group">'+
                   '<label for="endtproject">ส่วนลดพิเศษ</label>'+
                   '<input type="text" id="pdiscex'+row+'" name="discountper2" class="form-control text-right" value="'+pri_pdiscex+'"/>'+
                  '</div>'+
              '</div>'+
              '<div class="col-md-4">'+
                    '<div class="form-group">'+
                     '<label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>'+
                     '<input type="text" id="pdisamt'+row+'" name="disamt" class="form-control text-right" value="'+pri_disamt+'" readonly="true"/>'+

                     '<input type="hidden" name="too_di" id="too_di'+row+'" value="0">'+
                     '<input type="hidden" name="tot_vat[]" id="tot_vat'+row+'" value="0">'+


                    '</div>'+
             ' </div>'+

              '<div class="col-md-2">'+
          '<div class="form-group">'+
              '<a id="chkprice'+row+'" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>'+
          '</div>'+
        '</div>'+
            '</div>'+

              '<div class="row" '+status+'>'+
               '<div class="col-xs-2">'+
               '<div class="form-group">'+
                     '<label>Prev. PU Cost</label>'+
                     '<input class="form-control text-right" type="text" name="pucost[]" id="pucost'+row+'" value="0" readonly="">'+
                     '</div>'+

                     '</div>'+
                      '<div class="col-xs-2">'+
               '<div class="form-group">'+
                     '<label>Full Budget</label>'+
                     '<input class="form-control text-right" type="text" name="fullbudget[]" id="fullbudget'+row+'" value="'+boq_budget_total+'" readonly="">'+
                     '</div>'+

                     '</div>'+
            '<div class="col-xs-2">'+
               '<div class="form-group">'+
                     '<label>% Control</label>'+
                  '<input class="form-control text-right" type="text" name="controlcost[]" id="controlcost'+row+'" value="'+controlcost+'" readonly="" >'+
                     '</div>'+

                     '</div>'+
              
                    ' <div class="col-xs-3">'+
               '<div class="form-group">'+
                     '<label>This Budget Control</label>'+
                     '<input class="form-control text-right border-danger" type="text" name="bgcontrolcost[]" id="bgcontrolcost'+row+'" value="'+summatyplus+'" readonly="">'+
                     '</div>'+

                     '</div>'+

                        '<div class="col-xs-3">'+
               '<div class="form-group">'+
                     '<label>Budget Bal</label>'+
                     '<input class="form-control text-right border-danger" type="text" name="totalcost[]" id="totalcost'+row+'"  readonly="">'+
                     '</div>'+

                     '</div>'+
                    '</div>'+

            '<div class="row">'+
            '<div class="col-md-2">'+
                 '<div class="form-group">'+
                    '<label for="endtproject">vat</label>'+

                    '<input type="text" id="to_vat'+row+'" name="to_vat" class="form-control text-right" value="'+pri_tovat+'" readonly="true"/>'+
                  '</div>'+
                 '</div>'+
                 '<div class="col-md-2">'+
                  '<div class="form-group">'+
                     '<label for="endtproject">จำนวนเงินสุทธิ</label>'+

                     '<input type="text" id="pnetamt'+row+'" name="netamt" class="form-control text-right" value="'+pri_netamt+'" readonly="true"/>'+
                   '</div>'+
                 ' </div>'+
            '<div class="col-md-8">'+
                  '<div class="form-group">'+
                     '<label for="endtproject">หมายเหตุ</label>'+

                     '<input type="text" id="premark'+row+'" name="remark" class="form-control" value="'+pri_remark+'"/>'+
                  '</div>'+
            '</div>'+
          '</div>'+

           '<div class="row">'+
              '<div class="col-md-6">'+
                   ' <input type="hidden" name="poid" value="">'+

             ' </div>'+
          '</div>'+

          '<div class="row">'+
            '<div class="col-xs-6">'+
                           ' <label for="">Ref. Asset Code</label>'+
                              '<div class="input-group">'+
                          '<input type="text" id="accode'+row+'" name="accode"  readonly="true"  class="form-control " value="'+pr_assetid+'">'+
                          '<input type="text" id="acname'+row+'" name="acname" readonly="true"  class="form-control " value="'+pr_assetname+'">'+
                          '<input type="hidden" id="statusass'+row+'" name="statusass" readonly="true"  class="form-control " value="'+pr_asset+'">'+
                                  '<span class="input-group-btn" >'+
                                    '<a class="btn btn-info" id="refasset'+row+'" data-toggle="modal" data-target="#refass'+row+'"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>'+
                                  '</span>'+
                              '</div>'+
                            '</div>'+
          '</div>'+
                  '</div>'+
                  '<div class="modal-footer">'+
                    '<a id="insertpodetail'+row+'" class="btn btn-primary" data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</a>'+
                    '<a type="button" id="closefa'+row+'" class="btn btn-link" data-dismiss="modal">Close</a>'+
                   
                  '</div>'+
                '</div>'+
             ' </div>'+
                         '</div>';

                         $('.rowmat').append(rowmat);

                         $("#pqty"+row+"").keyup(function() {

                          
                          if ( ($("#pqty"+row+"").val().replace(/,/g,"")*1) >""+pri_qty+"") {
                          swal({
                              title: "ปริมาณมากกว่าใน Pr !!.",
                              text: "",
                              confirmButtonColor: "#EA1923",
                              type: "error"
                          });
                          $("#pqty"+row+"").val(0);
                        }
                      });

      var cost =  '<div class="modal fade" id="costcode'+row+'" data-backdrop="false">'+
            '<div class="modal-dialog modal-full">'+
              '<div class="modal-content">'+
                '<div class="modal-header bg-info">'+
                  '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>'+
                '</div>'+
                  '<div class="modal-body">'+
                      '<div id="modal_cost'+row+'"></div>'+
                  '</div>'+
              '</div>'+
            '</div>'+
          '</div>';
       $('.cost').append(cost);

          $(".costcode"+row+"").click(function(){
           $('#modal_cost'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
           $("#modal_cost"+row+"").load('<?php echo base_url(); ?>index.php/share/costcode_id/'+row);
         });
         
     
     var cost = '<div class="modal fade" id="openunit'+row+'" data-backdrop="false">'+
          '<div class="modal-dialog">'+
            '<div class="modal-content">'+
              '<div class="modal-header bg-info">'+
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
              '</div>'+
                '<div class="modal-body">'+
                    '<div id="modal_unit'+row+'"></div>'+
                '</div>'+
            '</div>'+
          '</div>'+
        '</div>';
      $('.cost').append(cost);

        $(".unit"+row+"").click(function(){
         $('#modal_unit'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
         $("#modal_unit"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid/'+row);
       });

      var cost =  '<div class="modal fade" id="openunitic'+row+'" data-backdrop="false">'+
        '<div class="modal-dialog">'+
          '<div class="modal-content">'+
            '<div class="modal-header bg-info">'+
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
              '<h4 class="modal-title" id="myModalLabel">หน่วย</h4>'+
            '</div>'+
              '<div class="modal-body">'+
                  '<div id="modal_unitic'+row+'"></div>'+
              '</div>'+
          '</div>'+
        '</div>'+
      '</div>';
      $('.cost').append(cost);

      $(".unitic"+row+"").click(function(){
       $('#modal_unitic'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
       $("#modal_unitic"+row+"").load('<?php echo base_url(); ?>index.php/share/unitid2/'+row);
     });


var cost =  '<div class="modal fade" id="refass'+row+'" data-backdrop="false">'+
  '<div class="modal-dialog modal-lg">'+
    '<div class="modal-content">'+
      '<div class="modal-header bg-info">'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>'+
     ' </div>'+
        '<div class="modal-body">'+
            '<div id="refasscode'+row+'"></div>'+

        '</div>'+
    '</div>'+
  '</div>'+
'</div>';
$('.cost').append(cost);

$('#refasset'+row+'').click(function(){
   $('#refasscode'+row+'').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refasscode"+row+"").load('<?php echo base_url(); ?>share/modalshare_asset/'+row);
 });


                         $("#editfa"+row+"").click(function(){

                    var sumary_unit = ($("#summaryunit").val().replace(/,/g,"")*1);
                    var rowsum_unit = ($("#pprice_unit"+row+"").val().replace(/,/g,"")*1);
                    var sum_unit = (sumary_unit-rowsum_unit);
                    $("#summaryunit").val(sum_unit); 

                    var sumary_amt = ($("#summaryamt").val().replace(/,/g,"")*1);
                    var rowsum_amt = ($("#pamount"+row+"").val().replace(/,/g,"")*1);
                    var sum_amt = sumary_amt-rowsum_amt;
                    $("#summaryamt").val(sum_amt);  

                    var sumary_dis = ($("#summarydis").val().replace(/,/g,"")*1);
                    var rowsum_dis = (  $("#pdiscex"+row+"").val().replace(/,/g,"")*1  );
                    var sum_dis = sumary_dis-rowsum_dis;
                    $("#summarydis").val(sum_dis);  

                    var sumary_d1 = ($("#summaryd1").val().replace(/,/g,"")*1);
                    var rowsum_d1 = ($("#pdiscper1"+row+"").val().replace(/,/g,"")*1);
                    var sum_d1 = sumary_d1-rowsum_d1;
                    $("#summaryd1").val(sum_d1); 

                    var sumary_d2 = ($("#summaryd2").val().replace(/,/g,"")*1);
                    var rowsum_d2 = ($("#pdiscper2"+row+"").val().replace(/,/g,"")*1);
                    var sum_d2 = sumary_d2-rowsum_d2;
                    $("#summaryd2").val(sum_d2);  

                    var sumary_d3 = ($("#summaryd3").val().replace(/,/g,"")*1);
                    var rowsum_d3 = ($("#pdiscper3"+row+"").val().replace(/,/g,"")*1);
                    var sum_d3 = sumary_d3-rowsum_d3;
                    $("#summaryd3").val(sum_d3); 

                    var sumary_d4 = ($("#summaryd4").val().replace(/,/g,"")*1);
                    var rowsum_d4 = ($("#pdiscper4"+row+"").val().replace(/,/g,"")*1);
                    var sum_d4 = sumary_d4-rowsum_d4;
                    $("#summaryd4").val(sum_d4); 

                    var sumary_di = ($("#summarydi").val().replace(/,/g,"")*1);
                    var rowsum_di = ($("#too_di"+row+"").val().replace(/,/g,"")*1);
                    var sum_di = sumary_di-rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = ($("#summaryvat").val().replace(/,/g,"")*1);
                    var rowsum_vat = ($("#to_vat"+row+"").val().replace(/,/g,"")*1);
                    var sum_vat = sumary_vat-rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = ($("#summarytot").val().replace(/,/g,"")*1);
                    var rowsum = ($("#pnetamt"+row+"").val().replace(/,/g,"")*1);
                    var sumtot = sumary-rowsum;
                    $("#summarytot").val(sumtot);
                    

                    var rowsum = ($("#pnetamt"+row+"").val().replace(/,/g,"")*1);

                  
                    });





             $(document).on('click', 'a#remove'+row+'', function () { // <-- changes

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

 $("#a"+row+"").click(function(){
        if ($("#a"+row+"").prop("checked")) {
            $("#chki"+row+"").val("Y");
        }else{
            $("#chki"+row+"").val("");
        }

      });
  



// $("#cpqtyic"+row+"").keyup(function(){
//               var qtyx = $("#pqty"+row+"").val()*$("#cpqtyic"+row+"").val();
//               $("#pqtyic"+row+"").val(qtyx);

//             });

              $("#pqty"+row+", #pprice_unit"+row+",#pdiscex"+row).on('keyup', function(){
                  var n = parseFloat($(this).val().replace(/\D/g,''),10);
                  $(this).val(n.toLocaleString());
              });
              $('#pprice_unit'+row+',#pqty'+row+', #pdiscex'+row+",#pdiscper1"+row+",#pdiscper2"+row +",#pdiscper3"+row+",#pdiscper4"+row).keyup(function(){

                
                var xqty = parseFloat($('#pqty'+row+'').val().replace(/,/g,"")*1);
                var xprice = parseFloat($('#pprice_unit'+row+'').val().replace(/,/g,"")*1);
                var xamount = xqty*xprice;
                var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val().replace(/,/g,"")*1);
                var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val().replace(/,/g,"")*1);
                var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val().replace(/,/g,"")*1);
                var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val().replace(/,/g,"")*1);
                var xdiscper5 = parseFloat($('#pdiscex'+row+'').val().replace(/,/g,"")*1);
                var xvatt = parseFloat($('#vatper').val().replace(/,/g,"")*1);
                var xpd1 = xamount - (xamount*xdiscper1)/100;
                var xpd2 = xpd1 - (xpd1*xdiscper2)/100;
                var xpd3 = xpd2 - (xpd2*xdiscper3)/100;
                var xpd4 = xpd3 - (xpd3*xdiscper4)/100;
                var xpd8 = ((xpd4 - xdiscper5) *xvatt)/100;
                var total_di = xamount-xpd4;
                var xvat = parseFloat($('#vatper').val().replace(/,/g,"")*1);

                $('#pamount'+row+'').val(numberWithCommas(xamount));
                $('#too_di'+row+'').val(total_di);

                $('#to_vat'+row+'').val(numberWithCommas(xpd8));
                $('#tot_vat'+row+'').val(xvatt);
                if(xdiscper5 != 0){
                  vxpd4 = xpd4-xdiscper5;
                    $('#pdisamt'+row+'').val(numberWithCommas(vxpd4));
                    $('#too_di'+row+'').val(numberWithCommas(vxpd4));
                    vxpd5 = (xpd4-xdiscper5) + xpd8;
                    $('#pnetamt'+row+'').val(numberWithCommas(vxpd5));
                  }
                  else if(xdiscper2 != 0){

                         $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
                         $('#too_di'+row+'').val(numberWithCommas(xpd4));
                         vxpd2 = xpd4 + xpd8;
                         $('#pnetamt'+row+'').val(numberWithCommas(vxpd2));
                }
                  else if(xdiscper3 != 0){

                         $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
                         $('#too_di'+row+'').val(numberWithCommas(xpd4));
                         vxpd3 = xpd4 + xpd8;
                         $('#pnetamt'+row+'').val(numberWithCommas(vxpd3));
                }
                else if(xdiscper4 != 0){

                         $('#pdisamt'+row+'').val(numberWithCommas(xpd4));
                         $('#too_di'+row+'').val(numberWithCommas(xpd4));
                         vxpd5 = xpd4 + xpd8;
                         $('#pnetamt'+row+'').val(numberWithCommas(vxpd5));
                }
                
                else
                {
                $('#pdisamt'+row+'').val(numberWithCommas(xpd1));
                $('#too_di'+row+'').val(numberWithCommas(xpd1));
                    vxpd1 = xpd4 + xpd8;
                    $('#pnetamt'+row+'').val(numberWithCommas(vxpd1));
                }


        var ckkcontrolbg = $('#ckkcontrolbg').val();
        if(ckkcontrolbg=="2"){
        
              
                            var costbg = parseFloat($('#costbg'+boq_id+'').val());
                             $('#totalcost'+row+'').val(costbg-xpd1);

                             var totalcost = parseFloat($('#totalcost'+row+'').val());
             if (parseFloat(totalcost) < parseFloat("0")) {
                      swal({
                        title: "รายการมากกว่าใน Budget.",
                        text: "",
                        confirmButtonColor: "#EA1923",
                        type: "error"
                      });

                        $("#pprice_unit"+row+"").val('0');
                        $("#pdisamt"+row+"").val('0');
                        $("#pamount"+row+"").val('0');
                        
                        $("#totalcost"+row+"").val('0');
                        $("#to_vat"+row+"").val('0');
                        $("#pnetamt"+row+"").val('0');

                        
                  
              }
        }        

               $("#bgbd<?php echo $n; ?>").click(function(){
                var costbg = parseFloat($('#costbg'+boq_id+'').val());
                $("#totalcost<?php echo $n; ?>").val(costbg)
                });
                 
      });//end event key up



              $("#insertpodetail"+row+"").click(function(){
                var xdiscper1 = parseFloat($('#pdiscper1'+row+'').val());
                var xdiscper2 = parseFloat($('#pdiscper2'+row+'').val());
                var xdiscper3 = parseFloat($('#pdiscper3'+row+'').val());
                var xdiscper4 = parseFloat($('#pdiscper4'+row+'').val());
                var sumxdic = xdiscper1+xdiscper2+xdiscper3+xdiscper4;
                if ($("#newmatcode"+row+"").val()!="") {

                  $("#smatcode"+row+"").html("<div class='input-group'><input type='text' class='form-control ' name='matcodei[]' id='matcodei' required  value="+$("#newmatcode"+row+"").val()+"><span class='input-group-btn'><a data-toggle='modal' data-target='#edit"+row+"' id='editcost"+row+"' class='btn btn-default btn-icon'><i class='icon-search4'></i></a></span><input type='hidden' name='chkbgadd[]' id='chkbgadd' value='1'><input type='hidden' name='pr_noo[]' value='"+pri_ref+"'></div>");

                  $("#matnametext"+row+"").val($('#newmatname'+row+'').val());
                  $("#scostcode"+row+"").html('<a class="editable editable-clicks">'+$("#codecostcodeint"+row+"").val()+'</a><input type="hidden" name="costcodei[]" value='+$("#codecostcodeint"+row+"").val()+'><input type="hidden" name="costnamei[]" value='+$("#costnameint"+row+"").val()+'><input type="hidden" name="chkhidden[]" value='+$("#chkhidden"+row+"").val()+'><input type="hidden" name="costmatsub[]" value='+$("#costmatsub"+row+"").val()+'>');
                  $("#scostname"+row+"").html('<a class="editable editable-clicks">'+$("#costnameint"+row+"").val()+'</a>');
                  
                  $("#sqtyi"+row+"").html("<a class='editable editable-clicks'>"+$("#pqty"+row+"").val()+"</a><input type='hidden' name='qtyi[]' id='qtyi"+row+"' value="+$("#pqty"+row+"").val()+"><input type='hidden' name='cqtyic[]' value="+$("#cpqtyic"+row+"").val()+"><input type='hidden' name='pqtyic[]' value="+$("#pqtyic"+row+"").val()+">");
                  
                  $("#spriceunit"+row+"").html("<input type='text' name='priceuniti[]' value="+$("#pprice_unit"+row+"").val()+"   class='txt form-control input-sm text-right' readonly><input type='hidden' name='punitic[]' value="+$("#punitic"+row+"").val()+">");
                  
                  $("#sunit"+row+"").html("<a class='editable editable-clicks'>"+$("#punit"+row+"").val()+"</a><input type='hidden' name='uniti[]' value="+$("#punit"+row+"").val()+">");
                  
                  $("#samount"+row+"").html("<input class='txt1 form-control input-sm text-right' type='text' id='amounti"+row+"' name='amounti[]' value="+$("#pamount"+row+"").val()+" readonly>");
                  
                  $("#sdisone"+row+"").html("<input class='form-control input-sm text-right' type='text'  value="+sumxdic+" readonly><input class='form-control input-sm' type='hidden' name='disci1[]' id='disci1"+row+"' value="+$("#pdiscper1"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci2[]' id='disci2"+row+"' value="+$("#pdiscper2"+row+"").val()+" readonly><input class='form-control input-sm' type='hidden' name='disci3[]' id='disci3"+row+"' value="+$("#pdiscper3"+row+"").val()+" readonly><input  class='form-control input-sm' type='hidden' name='disci4[]' id='disci4"+row+"' value="+$("#pdiscper4"+row+"").val()+" readonly>");
                  
                  
                  $("#sdisamt"+row+"").html("<input type='text' class='txt2 form-control input-sm text-right' name='disamti[]'  id='zum1"+row+"' value="+$("#pdiscex"+row+"").val()+" readonly>");

                  $("#tto_di"+row+"").html("<input type='text' class='txt3 form-control input-sm text-right' name='too_di[]' id='zum2"+row+"' value="+$("#too_di"+row+"").val()+" readonly>");

                  $("#total_vat"+row+"").html("<input type='text' class='txt4 form-control input-sm text-right' name='to_vat[]' id='zum3"+row+"' value="+$("#to_vat"+row+"").val()+" readonly>");

                  $("#snetamt"+row+"").html("<input type='text' class='txt5 form-control input-sm text-right' name='netamti[]' id='zum4"+row+"' value="+$("#pnetamt"+row+"").val()+" readonly><input type='hidden' name='reamrki[]' value="+$("#premark"+row+"").val()+"><input type='hidden' name='accode[]' value="+$("#accode"+row+"").val()+"><input type='hidden' name='acname[]' value="+$("#acname"+row+"").val()+"><input type='hidden' name='statusass[]' value="+$("#statusass"+row+"").val()+">");
               
                    var sumary_unit = parseFloat($("#summaryunit").val());
                    var rowsum_unit = parseFloat($("#pprice_unit"+row+"").val());
                    var sum_unit = parseFloat(sumary_unit+rowsum_unit);
                    $("#summaryunit").val(sum_unit); 
                    $("#summaryunit2").val(sum_unit); 


                    var sumary_amt = parseFloat($("#summaryamt").val());
                    var rowsum_amt = parseFloat($("#pamount"+row+"").val());
                    var sum_amt = sumary_amt+rowsum_amt;
                    $("#summaryamt").val(sum_amt);  

                    var sumary_dis = parseFloat($("#summarydis").val());
                    var rowsum_dis = parseFloat($("#pdiscex"+row+"").val());
                    var sum_dis = sumary_dis+rowsum_dis;
                    $("#summarydis").val(sum_dis);  

                    var sumary_d1 = parseFloat($("#summaryd1").val());
                    var rowsum_d1 = parseFloat($("#pdiscper1"+row+"").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2"+row+"").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3"+row+"").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4"+row+"").val());
                    var sum_d1 = sumary_d1+rowsum_d1+rowsum_d2+rowsum_d3+rowsum_d4;
                    $("#summaryd1").val(sum_d1); 

                    var sumary_d2 = parseFloat($("#summaryd2").val());
                    var rowsum_d2 = parseFloat($("#pdiscper2"+row+"").val());
                    var sum_d2 = sumary_d2+rowsum_d2;
                    $("#summaryd2").val(sum_d2);  

                    var sumary_d3 = parseFloat($("#summaryd3").val());
                    var rowsum_d3 = parseFloat($("#pdiscper3"+row+"").val());
                    var sum_d3 = sumary_d3+rowsum_d3;
                    $("#summaryd3").val(sum_d3); 

                    var sumary_d4 = parseFloat($("#summaryd4").val());
                    var rowsum_d4 = parseFloat($("#pdiscper4"+row+"").val());
                    var sum_d4 = sumary_d4+rowsum_d4;
                    $("#summaryd4").val(sum_d4); 

                    var sumary_di = parseFloat($("#summarydi").val());
                    var rowsum_di = parseFloat($("#too_di"+row+"").val());
                    var sum_di = sumary_di+rowsum_di;
                    $("#summarydi").val(sum_di);

                    var sumary_vat = parseFloat($("#summaryvat").val());
                    var rowsum_vat = parseFloat($("#to_vat"+row+"").val());
                    var sum_vat = sumary_vat+rowsum_vat;
                    $("#summaryvat").val(sum_vat);

                    var sumary = parseFloat($("#summarytot").val());
                    var rowsum = parseFloat($("#pnetamt"+row+"").val());
                    var sumtot = sumary+rowsum;
                    $("#summarytot").val(sumtot);

                   var totalcost = parseFloat($('#totalcost'+row+'').val());
                    $("#costbg"+boq_id+"").val(totalcost);

                          $("#editcost"+row+"").click(function() {
            var zum2 = parseFloat($("#zum2"+row+"").val());
            var costbg = parseFloat($('#costbg'+boq_id+'').val());
            $('#costbg'+boq_id+'').val(zum2+costbg);
            });
                   
                }else{
                  swal({
                      title: "Please Chack!",
                      text: "Material Code Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                   $("#error"+row+"").attr("class", "input-group has-error has-feedback");
                  $("#newmatname"+row+"").focus();
                }
                if ($("#pprice_unit"+row+"").val()!=0) {
                  
                }else{
                   swal({
                      title: "Unit Price Not Found!",
                      text: "Unit Price Not Found",
                      confirmButtonColor: "#2196F3"
                  });
                }
              });
              $('#chk'+row+'').click(function(event) {
                if($('#chk'+row+'').prop('checked')) {
                 $('#newmatname'+row+'').prop('disabled', false);
              } else {
                  $('#newmatname'+row+'').prop('disabled', true);
              }
              });

      

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


            }

      </script>




                                                                  <?php $n++; } ?>

                    </tbody>


                  </table>


                                                       </div>

                                                       <div class="modal-footer">
            <button type="button" id="close" class="delclo2 btn btn-link" data-dismiss="modal">Close</button>
                </div>


                <script>
                $(".delclo2").click(function(){
                $(".se<?php echo $id; ?>").hide();
                  });
                </script>
                

            