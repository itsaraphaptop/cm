<div class="content-wrapper">
  <div class="content">
    <div class="panel panel-flat">
      <div class="panel-heading">
        <h6 class="panel-title">Account Payable Archive (Retention Vender)</h6>
      </div>
      <div class="panel-body">
        <form id="fapr" action="<?php echo base_url(); ?>ap_active/addedit_apr" method="post">
          <div class="col-md-12">
            <div class="row">
              <div class="form-group col-sm-2">
                <label for="">Vendor Code:</label>
                <input type="hidden" name="header_id" value="<?=$header->id;?>">
                <input type="text" id="vender_id" name="vender_id" class="form-control" value="<?=$header->apr_vender;?>" readonly="true">
              </div>
              <div class="form-group col-sm-4">
                <label for="">Vendor Name :</label>
                <input type="hidden" name="po_id" value="<?=$header->po_id;?>">
                <input type="text" id="namevendor" name="namevendor" class="form-control" value="<?=$header->vender_name?>" readonly="true">
              </div>
              <div class="form-group col-sm-6">
                <label for="">Tax No. :</label>
                <input type="text" id="tax_noi" name="tax_no" class="form-control" value="<?=$header->apr_tax_no;?>">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="form-group col-sm-2">
                <label for="">Credit Term:</label>
                <input type="text" id="crterm" name="crterm" class="form-control" value="<?=$header->apr_term;?>">
              </div>
              <div class="form-group col-sm-3">
                <label>Due Date :</label>
                <input type="date"  readonly="true" id="duedate" name="duedate" class="form-control" value="<?=$header->apr_duedate;?>">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="form-group col-sm-2">
                <label for="">Department Code:</label>
                <input type="text" name="depart_id" class="form-control" readonly="true">
              </div>
              <div class="form-group col-sm-4">
                <label for="">Department Name:</label>
                <input type="text" name="dpt_title" class="form-control" readonly="true">
              </div>
              <div class="form-group col-sm-2">
                <label for="">Project Code:</label>
                <input type="hidden" name="pro_id" value="<?=$header->apr_project;?>">
                <input type="text" name="pro_code" class="form-control" value="<?=$header->project_code;?>" readonly="true">
              </div>
              <div class="form-group col-sm-4">
                <label for="">Project Name :</label>
                <input type="text" name="pro_name" class="form-control" value="<?=$header->project_name;?>" readonly="true">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2">
                <div class="form-group" id="errorcost">
                  <label for="qty">Amount</label>
                  <input type="hidden" id="limit_amt" value="<?=$amount_check+$header->apr_amount;?>">
                  <input type="text" id="amount" name="qty" onkeyup="amtkey($(this))"  placeholder="จำนวนเงิน" class="form-control" value="<?=$header->apr_amount;?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="price_unit">Vat %</label>
                  <input type="text" id="vat" name="price_unit" onkeyup="vatkey($(this))" class="form-control border-danger border-lg" value="<?=$header->apr_vat;?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="amount">Vat Amount</label>
                  <input type="text" id="vat_amt" readonly="true" name="pamount" placeholder="กรอกจำนวนเงิน" class="form-control" value="<?=$header->apr_totalvat;?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group" id="errorcost">
                  <label for="qty">Less Advance</label>
                  <input type="text" id="lessadv" name="lessadv" class="form-control" readonly="true" value="<?=$header->apr_lessadv;?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group" id="errorcost">
                  <label for="qty">Less Retention</label>
                  <input type="text" id="lessret" name="lessret" class="form-control" readonly="true" value="<?=$header->apr_lessret;?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2">
                <div class="form-group" id="errorcost">
                <label for="qty">Net Amount</label>
                <input type="text" id="net_amt" name="amt" class="form-control"  readonly="true" value="<?=$header->apr_net_amt;?>">
                </div>
              </div>
              <div class="form-group col-sm-2">
                <label for="">AP Date :</label>
                <input type="date" id="vchdate"  name="vchdate" class="form-control" value="<?=$header->apr_date;?>">
              </div>

              <div class="form-group col-sm-2">
                <label for="">Year :</label>
                <input type="text" id="glyear" name="glyear" class="form-control" readonly="true" value="<?=$header->apr_year;?>">
              </div>

              <div class="form-group col-sm-2">
                <label for="">Period :</label>
                <input type="text" id="glperiod" name="glperiod" class="form-control" readonly="true" value="<?=$header->apr_period;?>">
              </div>
              <div class="form-group col-sm-2">
                <label for="">Data Type :</label>
                <select name="datatype" id="datatype" class="form-control">
                  <option value="Head Office">Head Office</option>
                </select>
              </div>
            </div>
          </div>
        <br>
          <div class="col-md-12">
            <div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active"><a href="#pa-pill1" data-toggle="tab" aria-expanded="false"><i class=" icon-coins position-left"></i> GL</a></li>
                <li class=""><a href="#pa-pill2" data-toggle="tab" aria-expanded="false"><i class="  icon-price-tag position-left"></i> TAX</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane has-padding active" id="pa-pill1">
                  <div id="www" class="table-responsive">
                  <div>
                  <!-- <?php var_dump($gl_tab); ?> -->
                  </div>
                    <table class="table table-hover table-xxs ">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Account Code</th>
                          <th>Account Name</th>
                          <th>Cost Code</th>
                          <th>Dr</th>
                          <th>Cr</th>
                        </tr>
                      </thead>
                      <tbody id="glacc">
                        <?php 
                          foreach ($gl_tab as $key => $gl) {
                        ?>
                        
   
                        <tr id='<?=$gl->gltype;?><?=$key+1;?>' <?= ($gl->gltype =='VAT' && $header->apr_vat <= 0) ? 'style="display: none;"' : '';?>>
                            <td>
                              <input type="hidden" name="id_gl[]" value="<?=$gl->id_apgl;?>">
                              <input type="text" name="gltype[]" class="form-control" readonly="true" value="<?=$gl->gltype;?>">
                            </td>
                            <td>
                              <div class="input-group">
                                <input type="text" name="acct_code[]" id="acc_no<?=$key+1;?>" class="form-control" readonly="true" value="<?=$gl->acct_no;?>">
                                <span class="input-group-btn">
                                    <button type="button" attr-id="<?=$key+1;?>" onclick="modal_account($(this))" class="btn btn-info btn-icon"><i class="icon-search4"></i></button>
                                </span>
                              </div>
                            </td>
                            <td>
                              <input type="text" name="acct_name[]" id="acc_name<?=$key+1;?>" class="form-control" readonly="true" value="<?=$gl->act_name;?>"></td>
                            <td>
                              <input type="text" name="costcode[]" class="form-control" readonly="true" value="<?=$gl->costcode;?>">
                            </td>
                            <td>
                              <input type="text" name="dr[]" class="form-control" id="dr<?=$key+1;?>" readonly="true" value="<?=$gl->amtdr;?>">
                            </td>
                            <td>
                              <input type="text" name="cr[]" class="form-control" id="cr<?=$key+1;?>" readonly="true" value="<?=$gl->amtcr;?>">
                            </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="tab-pane has-padding" id="pa-pill2">
                  <div id="tax" class="table-responsive">
                  
                  <button type="button" id="addTax" class="btn btn-default">Add Tax</button>
                  
                    <table class="table table-hover table-xxs">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Vender Name</th>
                          <!-- <th>Tax ID</th> -->
                          <th>Branch No.</th>
                          <th>Tax No.</th>
                          <th>Tax Date</th>
                          <th>Amount</th>
                          <th>Vat %</th>
                          <th>Vat Amount</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr class="sum">
                          <td colspan="5">Total</td>
                          <td id="sum_amount"></td>
                          <td id="sum_vat"></td>
                          <td id="sum_vat_amount"></td>
                        </tr>
                      </tfoot>
                      <tbody id="bodytax">
                      <?php 
                        foreach ($tax_tab as $key => $tax) { 
                      ?>
                      <tr>
                        <td><?=$key+1;?></td>
                        <td>
                        <input type="hidden" name="id_tax[]" value="<?=$tax->id;?>">
                          <div class="input-group" style="width: 200px;">
                            <input type="text" id="nameve<?=$key+1;?>" name="nameve[]" class="form-control" value="<?=$tax->apri_vendor;?>" readonly="true">
                          </div>
                        </td>
                        <!-- <td><input type="text" maxlength="13" class="form-control " name="tax_de[]" id="tax_de<?=$key+1;?>" value="<?=$tax->apri_amtax;?>"></td> -->
                        <td><input type="text" class="form-control " id="branch_de<?=$key+1;?>" name="branch_de[]" value="<?=$tax->apri_tax;?>"></td>
                        <td><input type="text" class="form-control " id="taxiv<?=$key+1;?>" onkeyup="set_sys_new(<?=$key+1?>, 'taxiv', 'tdate')" name="taxiv[]" value="<?=$tax->apri_tiv;?>"></td>
                        <td><input type="date" id="tdate<?=$key+1;?>" name="tdate[]" onchange="set_sys_new(<?=$key+1;?>, 'taxiv', 'tdate')" class="form-control" value="<?=$tax->apri_taxdate;?>"></td>
                        <td><input type="text" class="form-control amount_row" onkeyup="sum_cal('amount_row','sum_amount', <?=$key+1;?>)" name="amtax[]" id="amt<?=$key+1;?>" value="<?=$tax->apri_amount;?>"></td>
                        <td><input type="text" class="form-control vat_row" onkeyup="sum_cal('vat_row','sum_vat', <?=$key+1;?>)" name="vattax[]" id="vatt<?=$key+1;?>" value="<?=$tax->apri_vat;?>"></td>
                        <td><input type="text" class="form-control vat_amount_row" onkeyup="sum_cal('vat_amount_row','sum_vat_amount', <?=$key+1;?>)" name="amttax[]" id="amtt<?=$key+1;?>" value="<?=$tax->apri_vatt;?>"></td>             
                      </tr>
                      <?php
                        } 
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <br>
              <div class="modal-footer">
                <div class="form-group">
                  <button id="saveapr" type="button" class="btn btn-success btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
                  <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="today" value="<?=date('Y-m-d');?>">

<div id="account" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Account </h5>
      </div>

      <div class="modal-body">
        <div id="content_acc"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<script>

  function set_sys_new(id, name1, name2) {
    const _name1 = $(`#${name1}${id}`).val();
    const _name2 = $(`#${name2}${id}`).val();
    if(_name1 !='' && _name2 !='') {
      // alert('ดึงขาบัญชี')
      $.get("<?=base_url();?>ap/set_sys_new", function () {
      }).done(function(data) {
        let jsonRes = JSON.parse(data);
        $('#acc_no2').val(jsonRes.data.pac_taxvat_due);
        $('#acc_name2').val(jsonRes.data.act_name);
      });
    }else{
      $.get("<?=base_url();?>ap/set_sys_old", function () {
      }).done(function(data) {
        let jsonRes = JSON.parse(data);
        // $('#acc_no2').val(jsonRes.data.pac_taxvat_due);
        // $('#acc_name2').val(jsonRes.data.act_name);
        $('#acc_no2').val(jsonRes.data.pac_taxvat_nodue);
        $('#acc_name2').val(jsonRes.data.act_name);
        
      });
    }
  }
  function modal_account(el) {
    $('#account').modal('show');
    let id = el.attr('attr-id');
    $('#content_acc').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#content_acc").load('<?php echo base_url(); ?>share/accchart2/'+id);
  }

  function vatkey(el) {
    let val = el.val()*1;
    if(val <= 0) {
      $('#VAT2').hide();
    }else{
      $('#VAT2').show();
    }
    amount_cal();
  }

  function amtkey(el) {
    let val = el.val()*1;
    let limit_amt = $('#limit_amt').val()*1;
    if(val > limit_amt) {
      $('#amount').val(limit_amt);
    }
      amount_cal();
    
  }

  function amount_cal() {
    let amount = $('#amount').val()*1;
    let vat = $('#vat').val()*1;
    let vat_amt = amount*vat/100;
    let net_amt = amount+vat_amt;
    
    $('#vat_amt').val(vat_amt);
    $('#net_amt').val(net_amt);
    $('#dr1').val(amount);
    $('#dr2').val(vat_amt);
    $('#cr3').val(net_amt);
  }
  sum_table_col('amount_row', 'sum_amount');
  sum_table_col('vat_amount_row', 'sum_vat_amount');
  sum_table_col('vat_row', 'sum_vat');
  function sum_cal(className, sum_id, id) {
    // sum_table_col()
    sum_table_col(className, sum_id);
    sum_table_row(id);
    sum_table_col('vat_amount_row', 'sum_vat_amount');
    sum_table_col('vat_row', 'sum_vat');
  }

  function sum_table_col(className, sum_id) {
    let sum = 0;
    let vat_amount = 0;
    let val = 0;
  $(`.${className}`).each(function(){
    val = $(this).val()*1;
    sum += parseFloat(val);
    // console.log(sum);
    $(`#${sum_id}`).html(sum);
  });
  }

  function sum_table_row(id) {
    let amount = $(`#amt${id}`).val()*1;
    let vat = $(`#vatt${id}`).val()*1;
    let amttax = amount*vat/100;
    $(`#amtt${id}`).val(amttax);
  }

  $('#addTax').click(function(){
    var runTR = $('#bodytax > tr').length+1;
    var vendername = $('#nameve1').val();
    var tax_id = $('#tax_de1').val();
    var today = $('#today').val();
    var row = `<tr>
                  <td>${runTR}</td>
                  <td>
                    <div class="input-group" style="width: 200px;">
                      <input type="text" id="nameve${runTR}" name="nameve_in[]" class="form-control" readonly="true" value="${vendername}">
                    </div>
                  </td>
                  <td><input type="text" maxlength="13" class="form-control " name="tax_de_in[]" id="tax_de${runTR}" value="${tax_id}"></div></td>
                  <td><input type="text" class="form-control " id="branch_de${runTR}" name="branch_de_in[]"></td>
                  <td><input type="text" class="form-control " onkeyup="set_sys_new(${runTR}, 'taxiv', 'tdate')" id="taxiv${runTR}" name="taxiv_in[]" ></td>
                  <td><input type="date" id="tdate${runTR}" name="tdate_in[]" onchange="set_sys_new(${runTR}, 'taxiv', 'tdate')" value="" class="form-control"></td>
                  <td><input type="text" class="form-control amount_row" onkeyup="sum_cal('amount_row','sum_amount', ${runTR})" name="amtax_in[]" id="amtax${runTR}"></td>
                  <td><input type="text" class="form-control vat_row" onkeyup="sum_cal('vat_row','sum_vat', ${runTR})" name="vattax_in[]" id="vattax${runTR}"></td>
                  <td><input type="text" class="form-control vat_amount_row" onkeyup="sum_cal('vat_amount_row','sum_vat_amount', ${runTR})" name="amttax_in[]" id="amttax${runTR}"></td            
                </tr>`;

      $('#bodytax').append(row);
  });

  $('#saveapr').click(function() {
    let sum_amount = $('#sum_amount').html()*1;
    let sum_vat_amount = $('#sum_vat_amount').html()*1;
    let amount = $('#amount').val()*1;
    let vat_amt = $('#vat_amt').val()*1;
    if(sum_amount == amount && vat_amt == sum_vat_amount) {
      $('form#fapr').submit();
    }else{
      swal({
        title: "เตือน",
        text: "รายการใน TAX ไม่สัมพันธ์!!.",
        // confirmButtonColor: "#66BB6A",
        type: "error"
      });
    }
  });

  $('#crterm').keyup(function(){
    $.post(`<?=base_url()?>ap/date/${$(this).val()*1}`, function () {
    }).done(function(data) {
      $('#duedate').val(data)
    });
  });
</script>

