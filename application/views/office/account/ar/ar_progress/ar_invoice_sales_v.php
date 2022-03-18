<style type="text/css">
  .number{
    text-align: right;
  }
</style>

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <form method="post" id="forminvpro" action="<?=base_url();?>ar/save_tradding">
        <div class="panel panel-flat">
          <div class="panel-heading ">
            <h5 class="panel-title">INVOICE Tradding</h5>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="form-group  col-sm-2">
                <input type="hidden" name="idpro" value="<?php echo $pro;?>">
                <label>Invoice NO.</label> <input class="form-control input-xs" type="text" name="invoice_no" id="invoice_no" readonly="true" placeholder="INVOICE NO.">
              </div>
              <div class="form-group  col-sm-2">
                <label>Inv. Date</label> <input class="form-control input-xs" name="inv_date" id="inv_date" type="date" name="invoice_date" value="<?php echo date("Y-m-d"); ?>">
              </div>
              <div class="form-group  col-sm-2">
                <label>Ref. P/O NO. </label> <input class="form-control input-xs" type="text" name="ref_invoice" id="ref_invoice">
              </div>
              <div class="form-group col-sm-2">
                <label>Project Code</label>
                <div class="input-group ">
                  <input type="hidden" class="form-control input-xs" readonly="readonly" name="projectid" required="ture" id="project_id">
                  <input type="text" class="form-control input-xs" readonly="readonly" name="projectcode" required="ture" id="projectcode1">
                  <div class="input-group-btn">
                    <button type="button" id="openproj" class="btn btn-info btn-icon btn-xs"><i class="icon-search4"></i></button>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <label>Project Name</label>
                 <input class="form-control input-xs" id="projectname1" type="text" name="projectname" readonly="ture">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-2">
                <label>Customer Code</label>
                <div class="input-group ">
                  <input type="text" class="form-control input-xs projectcode2" readonly="readonly" name="projectcode2" required="ture" id="projectcode2">
                  <div class="input-group-btn">
                    <button type="button" id="openproj2" class="btn btn-info btn-icon btn-xs"><i class="icon-search4"></i></button>
                  </div>
                </div>
              </div>
              <div class="form-group  col-sm-4">
                <label>Customer Code</label>
                <input class="form-control input-xs projectname2" type="text" name="projectname2" readonly="ture" id="projectname2">
              </div>
              <div class="form-group  col-sm-2">
                <label>System</label>
                <select class="form-control input-xs" name="job_name" id="job_name">
                  <?php foreach ($array_system as $key => $value) {
                  ?>
                  <option value="<?=$value['value'];?>"><?=$value['name'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-sm-2">
                <label>Curency </label> <select class="form-control input-xs" name="curency" id="curency">
                <?php foreach ($currency as $key => $value) {
                ?>
                <option value="<?= $value->currency_id ?>"><?= $value->currency_name_en ?></option>
                <?php } ?>
              </select>
              </div>
              <div class="form-group  col-sm-2">
                <label>Exchange </label> 
                <input class="form-control input-xs" type="text" value="0.00" id="exchange" name="exchange">
              </div>
            </div>
            <div class="row">
                <div class="form-group  col-sm-2">
                   <label>Cr Term </label>
                  <input class="form-control input-xs" type="text" name="cr_term" id="cr_term" required="ture">
                </div>
                <div class="form-group col-sm-2">
                  <label>Due Date </label>
                  <input class="form-control input-xs" type="date" name="due_date" id="due_date" value="<?php echo date("Y-m-d"); ?>">
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
                  <input id="vatnum" name="vatnum" class="form-control input-xs number target" type="text" id="vat" value="7.00">
                </div>
                <div class="form-group col-md-2">
                  <label>Vat Amount</label>
                  <input class="form-control input-xs number" type="text" id="p_vat" name="p_vat" value="0.00">
                </div>
                <div class="form-group col-md-2">
                  <label>Net Amount</label>
                  <input class="form-control input-xs number" type="text" name="net_amount" value="0.00" readonly="ture" id="net_amount"> 
                </div>
                 <div class="form-group col-sm-2">
                  <label>Markup</label>
                  <input class="form-control input-xs number" type="text" name="markup" id="keyup" value="0.00">
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
                  <textarea class="form-control" name="remart" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-xs datatable-basics" style="width: 2000px">
                    <thead>
                      <th style="text-align: center;width: 20px;">NO.</th>
                      <th style="text-align: center;width: 20px">Mat. Code</th>
                      <th style="text-align: center;width: 20px">Description</th>
                      <th style="text-align: center;width: 20px">Serial NO.</th>
                      <th style="text-align: center;width: 20px">Cost code</th>
                      <th style="text-align: center;width: 20px">QTY</th>
                      <th style="text-align: center;width: 20px">Unit</th>
                      <th style="text-align: center;width: 20px">Cost(IC)/Unit</th>
                      <th style="text-align: center;width: 20px">Price/Unit</th>
                      <th style="text-align: center;width: 20px">Amount</th>
                      <th style="text-align: center;width: 20px">Discount</th>
                      <th style="text-align: center;width: 20px">Net Amount</th>
                      <th style="text-align: center;width: 50px">Ref. IC NO.</th>
                    </thead>
                    <tbody id="table_detail">
                      
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                  <button id="showmat" type="button" class="btn btn-info input-xs">Mat. Trading</button>
                  <button class="btn btn-success input-xs" type="button" id="upform"><i class="icon-box-add"></i> Save</button>
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
$('#cr_term').keyup(function(){
      var day = $(this).val()*1;
      $.get("<?=base_url()?>ar/duedate/"+day, function () {  
      }).done(function(data) {
          $('#due_date').val(data);
      });
});

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

        calculateSum();

                  function calculateSum() {
                  var sumomg = 0;
                  var sumdis = 0;
                  $(".omg").each(function() {
                  if (!isNaN($(this).val().replace(/,/g,"")) && $(this).val().replace(/,/g,"").length != 0) {
                  sumomg += parseFloat($(this).val().replace(/,/g,""));
               
                 
                  }
               
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
     }
  function discount(el){
      var id = $(el).attr('id_issue');
        var price = $('#price'+id).val();
        var qty = $('#qtyid'+id).val();
        var amount = parseFloat((price*qty)).toFixed(2);
        var dis = $('#dis'+id).val();
        var netamount = parseFloat((amount-dis)).toFixed(2);
        parseFloat($('#netamount'+id).val(netamount)).toFixed(2);
      // });
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
   
    var idproject = $('#project_id').val(); 
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
    $('#deleterow').click(function() {
      $("#table_detail").empty();
      $("#net_amount").val('0.00');
      $("#p_vat").val('0.00');
    });
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
         var system = $("#"+val).find('.system').val();
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
                  <input type="hidden" name="trading_id[]" value="${id_issue}">
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
                  <input name="system[]" type="hidden" value="${system}" readonly="ture">
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
    $('#projectopen').modal('show');
  });
  $("#openproj2").click(function(){
    $('#modal_project2').html("<img src='<?php echo base_url(); ?>assets/images/loading.gif'> Loading...");
    $("#modal_project2").load('<?php echo base_url(); ?>index.php/share/project2');
    $('#projectopen2').modal('show');
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