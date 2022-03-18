<style type="text/css">
  .number{
    text-align: right;
  }
</style>

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <form method="post" id="forminvpro" action="<?=base_url();?>ar/edit_tradding/<?=$pro?>/<?php echo $traddingh[0]['trad_id']; ?>">
        <div class="panel panel-flat">
          <div class="panel-heading ">
            <h5 class="panel-title">INVOICE Tradding</h5>
          </div>
          <div class="panel-body">
<?php
    foreach ($traddingh as $key => $value) {
?>
           <div class="row">
              <div class="form-group  col-sm-2">
                <input type="hidden" name="idpro" value="<?php echo $pro;?>">
                <label>Invoice NO.</label> <input class="form-control input-xs" type="text" name="invoice_no" id="invoice_no" readonly="true" value="<?= $value['trad_inv'] ?>">
              </div>
              <div class="form-group  col-sm-2">
                <label>Inv. Date</label> <input class="form-control input-xs" name="inv_date" id="inv_date" type="date" name="invoice_date" value="<?= $value['inv_date'] ?>">
              </div>
              <div class="form-group  col-sm-2">
                <label>Ref. P/O NO. </label> <input class="form-control input-xs" type="text" name="ref_invoice" id="ref_invoice" value="<?= $value['ref_inv'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Project Code</label>
                <div class="input-group ">
                  <input type="hidden" class="form-control input-xs" readonly="readonly" name="projectid" required="ture" id="project_id">
                  <input type="text" class="form-control input-xs" readonly="readonly" name="projectcode" required="ture" id="projectcode1" value="<?= $value['projectcode'] ?>">
                  <div class="input-group-btn">
                    <button type="button" id="openproj" class="btn btn-info btn-icon btn-xs"><i class="icon-search4"></i></button>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label>Project Name</label>
                 <input class="form-control input-xs" id="projectname1" type="text" name="projectname" readonly="ture"  value="<?= $value['projectname'] ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-2">
                <label>Customer Code</label>
                <div class="input-group ">
                  <input type="text" class="form-control input-xs projectcode2" readonly="readonly" name="projectcode2" required="ture" id="projectcode2" value="<?= $value['cus_projectcode'] ?>">
                  <div class="input-group-btn">
                    <button type="button" id="openproj2" class="btn btn-info btn-icon btn-xs"><i class="icon-search4"></i></button>
                  </div>
                </div>
              </div>
              <div class="form-group  col-sm-4">
                <label>Customer Name</label>
                <input class="form-control input-xs projectname2" type="text" name="projectname2" readonly="ture" id="projectname2" value="<?= $value['cus_projectname'] ?>">
              </div>
              <div class="form-group  col-sm-2">
                <label>System</label>
                <input class="form-control input-xs projectname2" type="text" name="projectname2" readonly="ture" id="projectname2" value="<?= $value['systemname'] ?>">
              </div>
              <div class="form-group col-sm-2">
                <label>Curency </label> 
                <input class="form-control input-xs" type="text" name="curency" id="curency" readonly="ture" value="<?= $value['currency_name_en'] ?>">
              <!--   <select class="form-control input-xs" name="curency" id="curency">
                </select> -->
              </div>
              <div class="form-group  col-sm-2">
                <label>Exchange </label> 
                <input class="form-control input-xs" type="text" value="0.00" id="exchange" name="exchange" value="<?= $value['trad_exchange'] ?>" readonly="ture">
              </div>
            </div>
            <div class="row">
                <div class="form-group  col-sm-2">
                   <label>Cr Term </label>
                  <input class="form-control input-xs" type="text" name="cr_term" id="cr_term" required="ture" value="<?= $value['cr_term'] ?>">
                </div>
                <div class="form-group col-sm-2">
                  <label>Due Date </label>
                  <input class="form-control input-xs" type="date" name="due_date" id="due_date" value="<?= $value['due_date'] ?>">
                </div>
                <div class="col-sm-1">
                  <label>Cal. VAT</label>
                  <select class="form-control input-xs target" name="selectvat" id="selectvat">
                    <option class="selectvat" value="7.00" selected="selected">Yes</option>
                    <option class="selectvat" value="0.00">No</option>
                  </select>
                </div>
                <div class="form-group col-sm-1">
                  <label>% VAT</label>
                  <input id="vatnum" name="vatnum" class="form-control input-xs number target" type="text" id="vat" value="<?= $value['vat'] ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Vat Amount</label>
                  <input class="form-control input-xs number" type="text" id="p_vat" name="p_vat" value="<?= $value['totalvat'] ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Net Amount</label>
                  <input class="form-control input-xs number" type="text" name="net_amount" value="0.00" readonly="ture" id="net_amount" value="<?= $value['sum_netamount'] ?>"> 
                </div>
                 <div class="form-group col-sm-2">
                  <label>Markup</label>
                  <input class="form-control input-xs number" type="text" name="markup" id="keyup" value="<?= $value['martup'] ?>">
                </div>
            </div>
            <div class="row">                
              <div class="form-group col-sm-2">
                  <input id="vat_discount" type="checkbox" name="vat_discount" class="styled"> 
                  <label class="control">Cal. VAT before discount</label>
                   <input type="hidden" name="type" value="trading">
              </div>
            </div>
           <div class="row">
                <div class="form-group col-sm-12">
                  <label>Remark</label>
                  <textarea class="form-control" name="remart" rows="5"><?= $value['remart'] ?></textarea>
                </div>
            </div>
<?php
      }
?>
            <div class="row">
              <div class="col-sm-12">
                <!-- <div class="loadtable dataTables_wrapper no-footer"> -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-xs datatable-basics" style="width: 2000px">
                      <thead>
                        <th style="text-align: center;width: 20px;">NO.</th>
                        <th style="text-align: center;width: 20px">Mat. Code</th>
                        <th style="text-align: center;width: 20px">Description</th>
                        <th style="text-align: center;width: 20px">Serial NO.</th>
                        <th style="text-align: center;width: 20px">Cost code F2</th>
                        <th style="text-align: center;width: 20px">QTY</th>
                        <th style="text-align: center;width: 20px">Unit F2</th>
                        <th style="text-align: center;width: 20px"></th>
                        <th style="text-align: center;width: 20px">Cost(IC)/Unit</th>
                        <th style="text-align: center;width: 20px">Price/Unit</th>
                        <th style="text-align: center;width: 20px">Amount</th>
                        <th style="text-align: center;width: 20px">Discount</th>
                        <th style="text-align: center;width: 20px">Net Amount</th>
                        <th style="text-align: center;width: 50px">Ref. IC NO.</th>
                      </thead>
                      <tbody id="table_detail">
                        <?php if($traddingd>0){ 
                          foreach ($traddingd as $key => $value) {
                          ?>
                          <tr>
                            <td style="text-align: center;"><?=$key+1?></td>
                            <td style="text-align: center;">
                              <input type="hidden" name="iddetail[]" value="<?=$value['itrad_id'];?>">
                              <input class="form-control input-xs" type="text" value="<?=$value['itrad_matcode'];?>" readonly="ture" name="matcode[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs" type="text" value="<?=$value['itrad_descrip'];?>" readonly="ture" name="description[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs" type="text" value="<?=$value['itrad_serno'];?>" name="serno[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs" type="text" value="<?=$value['itrad_costcode'];?>" name="costcode[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs yqty" id="qtyid<?=$key?>" edit_issue="<?=$key?>" type="text" value="<?=$value['itrad_qty'];?>" readonly="ture" name="qty[]" style="text-align : right;">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs" type="text" value="<?=$value['itrad_idunit'];?>" name="idunit[]" readonly="ture">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs" type="text" value="<?=$value['itrad_nameunit'];?>" readonly="ture" name="nameunit[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs " id="pricedefault<?=$key?>" type="text" value="<?=$value['itrad_priceunit'];?>" readonly="ture" style="text-align : right;" name="priceunit[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs price" onkeyup="price($(this))" edit_issue="<?=$key?>" id="price<?=$key?>" type="text" value="<?=$value['itrad_pricesale'];?>" style="text-align : right;" name="pricesale[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs amount" id="perprice<?=$key?>" type="text" value="<?=$value['itrad_amount'];?>" readonly="ture" style="text-align : right;" name="amount[]">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs perprice sumdis" edit_issue="<?=$key?>" onkeyup="discount($(this))" id="dis<?=$key?>" name="discount[]" type="text" value="<?=$value['itrad_discount'];?>" style="text-align : right;">
                            </td>
                            <td style="text-align: center;">
                              <input class="omg form-control input-xs number" id="netamount<?=$key?>" type="text" value="<?=$value['itrad_netamount'];?>" name="netamount[]" readonly="ture">
                            </td>
                            <td style="text-align: center;">
                              <input class="form-control input-xs perprice" name="doccode[]" type="text" value="<?=$value['itrad_doccode'];?>" readonly="ture">
                            </td>
                      </tr>
                        <?php }} ?>
                      </tbody>
                    </table>
                  </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>               
  </div>
</div>
<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="modalMat" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Material</h4>
        </div>
        <div class="modal-body">
          <div id="detail_table"></div>
        </div>
        <div class="modal-footer">
          <button id="formmat" class="btn btn-success" data-dismiss="modal">Select</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- modal project -->
<div class="modal fade" id="projectopen"  data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select Project</h4>
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
 <!-- modal project 2 -->
<div class="modal fade" id="projectopen2"  data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select Project 2</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          <div class="row" id="modal_project2">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal member -->
<div class="modal fade" id="memberopen"  data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select Member</h4>
      </div>
      <div class="modal-body">
        <div class="panel-body">
          <div class="row" id="modal_member">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  upform();
 function upform(){
  $('#upform').click(function() {
    var taa =  $('tbody#table_detail > tr').length;
    var refno = $('#ref_no').val();
    var pcode = $('#projectcode1').val();
    var cuscode = $('#projectcode2').val();
    var cterm = $('#cr_term').val();

    if(refno == ''){
      swal("กรุณากรอก Ref No.!", "You clicked the button!", "error");
    }else if(pcode == ''){
      swal("กรุณากรอก Project!", "You clicked the button!", "error");
    }else if(cuscode == ''){
      swal("กรุณากรอก Customer!", "You clicked the button!", "error");
    }else if(cterm == ''){
      swal("กรุณากรอก Cr Trem!", "You clicked the button!", "error");
    }else if (taa == 0) {
      swal("กรุณาเลือก Materail!", "You clicked the button!", "error");
    }else{
      // alert(taa)
      $('form#forminvpro').submit();
    }
  }); 
  }
  var sumamount = 0;
  var sumamount2 = 0;
  var sumdisc = 0;
  $('#openproj').click(function() {
    $('#projectopen').modal('show');
  });
  $('#openproj2').click(function() {
    $('#projectopen2').modal('show');
  });

  // function select vat
  $( "#selectvat" ).change(function () {
      
      var vat = $(this).val();
        $('#vatnum').val(vat);
      // var amountsum = sumamount.replace(',','');
      // alert (sumamount);
      var sumvat = parseFloat((vat*sumamount*1)/100).toFixed(2);
      var amountsum = parseFloat(((vat*sumamount*1)/100)+sumamount).toFixed(2);
      // alert(netamount);
        $('#p_vat').val(sumvat);
        $('#net_amount').val(amountsum);
      if(amountsum==0){
      var net = 0;
        $('.omg').each( function() {
          var sum = $(this).val()*1;
          net += sum;
        });
        var sumvat = parseFloat((vat*net*1)/100).toFixed(2);
        var amountsum = parseFloat(((vat*net*1)/100)+net).toFixed(2);
        $('#net_amount').val(amountsum);
        $('#p_vat').val(sumvat);
      }
    });

  // function change advance
  $("#advance").change(function() {
      var advance = $(this).val();
      var amount = $('#net_amount').val();
      var netamount = amount.replace(',','');
      var sumadv = parseFloat((advance*netamount*1)/100).toFixed(2);
        $('#p_advance').val(sumadv);
  });

  // function change retention
  $("#reten").change(function() {
      var reten = $(this).val();
      var amount = $('#net_amount').val();
      var netamount = amount.replace(',','');
      var sumreten = parseFloat((reten*netamount*1)/100).toFixed(2);
        $('#p_reten').val(sumreten);
  });


  // select price
  function price(el){
      // alert(el);
      var id = $(el).attr('id_issue');
        // $('#price'+id).keyup(function() {
        var price = $('#price'+id).val();
        var qty = $('#qtyid'+id).val();
        var amount = parseFloat((price*qty)).toFixed(2);
        parseFloat($('#perprice'+id).val(amount)).toFixed(2);
        var dis = $('#dis'+id).val();
        var netamount = parseFloat((amount-dis)).toFixed(2);
        parseFloat($('#netamount'+id).val(netamount)).toFixed(2);

      var ide = $(el).attr('edit_issue');
        // $('#price'+id).keyup(function() {
        var eprice = $('#price'+ide).val();
        var eqty = $('#qtyid'+ide).val();
        var eamount = parseFloat((eprice*eqty)).toFixed(2);
        parseFloat($('#perprice'+ide).val(eamount)).toFixed(2);
        var edis = $('#dis'+ide).val();
        var enetamount = parseFloat((eamount-edis)).toFixed(2);
        parseFloat($('#netamount'+ide).val(enetamount)).toFixed(2);

        
        calculateSum();

                  function calculateSum() {
                  var sumomg = 0;
                  //iterate through each textboxes and add the values
                  $(".omg").each(function() {
                  //add only if the value is number
                  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
                  sumomg += parseFloat($(this).val().replace(/,/g,""));
                  // $(this).css("background-color", "#FEFFB0");
                 
                  }
                  // else if (this.value.length != 0){
                  //     $(this).css("background-color", "red");
                  // }
                  });
                  // $(".sumdis").$.each( function() {
                  //    if(!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0){
                  //     sumdis += parseFloat($(this).val().replace(/,/g,""));
                  //    }
                  // });
                  sumamount = sumomg;
                  var vat = $('#vatnum').val();
                  if (vat == 7.00) {
                    $("input#net_amount").val(numberWithCommas(((sumomg*7)/100)+sumomg));
                    $("input#p_vat").val(numberWithCommas((sumomg*7)/100));
                  }else{
                    $("input#net_amount").val(numberWithCommas(sumomg));
                  }
                }
              
      // });
     }
  function discount(el){
      // alert(el);
      var id = $(el).attr('id_issue');
        // $('#price'+id).keyup(function() {
          // alert(id);
        var price = $('#price'+id).val();
        var qty = $('#qtyid'+id).val();
        var amount = parseFloat((price*qty)).toFixed(2);
        var dis = $('#dis'+id).val();
        var netamount = parseFloat((amount-dis)).toFixed(2);
        parseFloat($('#netamount'+id).val(netamount)).toFixed(2);
      // });

      var ide = $(el).attr('edit_issue');
        // $('#price'+id).keyup(function() {
          // alert(id);
        var eprice = $('#price'+ide).val();
        var eqty = $('#qtyid'+ide).val();
        var eamount = parseFloat((eprice*eqty)).toFixed(2);
        var edis = $('#dis'+ide).val();
        var enetamount = parseFloat((eamount-edis)).toFixed(2);
        parseFloat($('#netamount'+ide).val(enetamount)).toFixed(2);

      calculateSum();

                  function calculateSum() {
                  var sumomg = 0;
                  var sumdis = 0;
                  //iterate through each textboxes and add the values
                  $(".omg").each(function() {
                  //add only if the value is number
                  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
                  sumomg += parseFloat($(this).val().replace(/,/g,""));
                  // $(this).css("background-color", "#FEFFB0");
                 
                  }
                  // else if (this.value.length != 0){
                  //     $(this).css("background-color", "red");
                  // }
                  });
                  // alert(sumdis);
                  
                  var vat = $('#vatnum').val();
                  if (vat == 7.00) {
                    $("input#net_amount").val(numberWithCommas(((sumomg*7)/100)+sumomg));
                    $("input#p_vat").val(numberWithCommas((sumomg*7)/100));
                  }else{
                    $("input#net_amount").val(numberWithCommas(sumomg));
                  }
                } 
     }

  $('#showmat').click(function() {
    var idproject = $('#projectid').val(); 
    $.post('<?=base_url();?>index.php/ar/modal_issue/', {proid:idproject}, function() {
    }).done(function(data){
      $('#detail_table').html(data);
      $('#modalMat').modal('show');
    });
  
  });
     $('#keyup').keyup(function() {
       var markup = $(this).val();
       // alert (markup);
       $('.yqty').each(function(index, el) {
          var id =  $(el).attr('id_issue');
          var qty =  $(el).val(); //ค่าของจำนวน
          var pricedefault = $('#pricedefault'+id).val();//ค่าของ ราคา
          var priceperu = parseFloat(((pricedefault*markup*1)/100)+pricedefault*1).toFixed(2);
          // var price = $('#price'+id).val(); //ค่าของ input ราคา
          var amount = parseFloat((priceperu*qty)).toFixed(2);
          parseFloat($('#price'+id).val(priceperu)).toFixed(2);
          parseFloat($('#perprice'+id).val(amount)).toFixed(2);
          var dis = $('#dis'+id).val();
          var netamount = parseFloat((amount-dis)).toFixed(2);
          parseFloat($('#netamount'+id).val(netamount)).toFixed(2);
          var netamountv  
       });
       calculateSum();

                  function calculateSum() {
                  var sumomg = 0;
                  //iterate through each textboxes and add the values
                  $(".omg").each(function() {
                  //add only if the value is number
                  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
                  sumomg += parseFloat($(this).val().replace(/,/g,""));
                  // $(this).css("background-color", "#FEFFB0");
                 
                  }
                  // else if (this.value.length != 0){
                  //     $(this).css("background-color", "red");
                  // }
                  });
                  sumamount = sumomg;
                  var vat = $('#vatnum').val();
                  if (vat == 7.00) {
                    $("input#net_amount").val(numberWithCommas(((sumomg*7)/100)+sumomg));
                    $("input#p_vat").val(numberWithCommas((sumomg*7)/100));
                  }else{
                    $("input#net_amount").val(numberWithCommas(sumomg));
                  }
                } 
     });
    // $('#deleterow').click(function() {
    //   $("#table_detail").empty();
    //   $("#net_amount").val('0.00');
    //   $("#p_vat").val('0.00');
    // });
    $('#formmat').click(function() {
      // alert(test);
      // $.each(test, function(index, val) {
      //    console.log(val)
      // });
      var select_array = [];
      $('.check').each(function(index, el) {

       var status =    $(el).prop('checked');
          // console.log(test2);
          if(status == true){
             select_array.push($(el).attr('issue'));
          }

      });

      $("#table_detail").empty();
      $.each(select_array, function(index, val) {
         
         var id_issue = $("#"+val).find('.issue').val();
         var mat_code =  $("#"+val).find('.mat_code').val();
         var totalamount =  parseFloat($("#"+val).find('.ttamount').val()).toFixed(2);
         var description = $("#"+val).find('.description').val();
         var xqty = $("#"+val).find('.xqty').val();
         var typeunit = $("#"+val).find('.typeunit').val();
         var priceunit = parseFloat($("#"+val).find('.priceunit').val()).toFixed(2);
         var doccode = $("#"+val).find('.doccode').val();
         var cal1 = parseFloat((xqty*priceunit*1)).toFixed(2); 

         //alert(description);

         var tr_pat = `
          <tr><td style="text-align: center;">${(index+1)}</td>
                <td style="text-align: center;">
                  <input class="form-control input-xs" type="text" value="${mat_code}" readonly="ture" name="matcode[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs" type="text" value="${description}" readonly="ture" name="description[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs" type="text" value="" name="serno[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs" type="text" value="" name="costcode[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs yqty" id="qtyid${id_issue}" id_issue="${id_issue}" type="text" value="${xqty}" readonly="ture" name="qty[]" style="text-align : right;">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs" type="text" value="" name="idunit[]" readonly="ture">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs" type="text" value="${typeunit}" readonly="ture" name="nameunit[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs " id="pricedefault${id_issue}" type="text" value="${priceunit}" readonly="ture" style="text-align : right;" name="priceunit[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs price" onkeyup="price($(this))" id_issue="${id_issue}" id="price${id_issue}" type="text" value="${priceunit}" style="text-align : right;" name="pricesale[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs amount" id="perprice${id_issue}" type="text" value="${cal1}" readonly="ture" style="text-align : right;" name="amount[]">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs perprice sumdis" id_issue="${id_issue}" onkeyup="discount($(this))" id="dis${id_issue}" name="discount[]" type="text" value="0.00" style="text-align : right;">
                </td>
                <td style="text-align: center;">
                  <input class="omg form-control input-xs number" id="netamount${id_issue}" type="text" value="${totalamount}" name="netamount[]" readonly="ture">
                </td>
                <td style="text-align: center;">
                  <input class="form-control input-xs perprice" name="doccode[]" type="text" value="${doccode}" readonly="ture">
                </td>
          </tr>

         `;

         $("#table_detail").append(tr_pat);

         calculateSum();

                  function calculateSum() {
                  var sumomg = 0;
                  //iterate through each textboxes and add the values
                  $(".omg").each(function() {
                  //add only if the value is number
                  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
                  sumomg += parseFloat($(this).val().replace(/,/g,""));
                  // $(this).css("background-color", "#FEFFB0");
                 
                  }
                  // else if (this.value.length != 0){
                  //     $(this).css("background-color", "red");
                  // }
                  });

                  sumamount = sumomg;
                  var vat = $('#vatnum').val();
                  if (vat == 7.00) {
                  $("input#net_amount").val(numberWithCommas(((sumomg*7)/100)+sumomg));
                  $("input#p_vat").val(numberWithCommas((sumomg*7)/100));
                }else{
                  $("input#net_amount").val(numberWithCommas(sumomg));
                }
                } 
      });
    });

  $("#openproj").click(function(){
    $('#modal_project').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project1');
  });
  $("#openproj2").click(function(){
    $('#modal_project2').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_project2").load('<?php echo base_url(); ?>index.php/share/project2');
  });
  $("#openmember").click(function(){
    $('#modal_member').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_member").load('<?php echo base_url(); ?>index.php/share/member');
    $('#memberopen').modal('show');
  });

// $().serialize()
  function sumOfColumns(table, columnIndex) {
    var tot = 0;
    table.find("tr").children("td:nth-child(" + columnIndex + ")")
    .each(function() {
        $this = $(this);
        if (!$this.hasClass("sum") && $this.html() != "") {
            tot += parseInt($this.html());
        }
    });
    return tot;
  }
    $('#vat_discount').click (function ()
      { 
        if ($(this).is(':checked') === true)
        {
             var sum = 0;
             var amount = 0;
             var vat = $('#vatnum').val();
          $('.sumdis').each( function() {
             var test = $(this).val()*1;
             sum += test;
          });
          $('.amount').each( function() {
             var amo = $(this).val()*1;
             amount += amo;
          });
            if (vat == 7.00) {
              // alert(amount);
              var sumto = amount;
              var vattotal = (sumto*7)/100;
              var netamount = ((sumto+vattotal)-sum);
              // alert(sumto+" "+vattotal+" "+sum+" "+netamount);
              $("input#p_vat").val(numberWithCommas(vattotal));
              $("input#net_amount").val(numberWithCommas(netamount));
            }else{
              var sumto = amount;
              var netamount = sumto-sum*1;
              // alert(netamount);
              $("input#net_amount").val(numberWithCommas(netamount));
            }

        }else{
          $(this).is(':checked')===false
          var sumd = 0;
          var amount = 0;
          $('.sumdis').each( function() {
             var dissum = $(this).val()*1;
             sumd += dissum;
          });
          $('.amount').each( function() {
             var amo = $(this).val()*1;
             amount += amo;
          });

          var vat = $('#vatnum').val();
            if (vat == 7.00) {

              var sumto = amount-sumd;
              var vattotal = (sumto*7)/100;
              var netamount = sumto+vattotal;
              // alert(sumamount+" "+vattotal+" "+netamount+" "+sumd);
               $("input#net_amount").val(numberWithCommas(netamount));
               $("input#p_vat").val(numberWithCommas(vattotal));
            }else{
              var sumto = amount;
               $("input#net_amount").val(numberWithCommas(netamount));
            }
        }
      });
    
</script>