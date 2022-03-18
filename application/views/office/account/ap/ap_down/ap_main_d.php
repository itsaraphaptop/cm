<?php 
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
$datestring = "Y";
   $mm = "m";
   $dd = "d";

   $this->db->select('*');
   $qu = $this->db->get('ap_down_header');
   $res = $qu->num_rows();//เช็คว่าในตารางมีข้อมมูลมั้ย ถ้าไม่มีก็ส่ง 0 มา

   if ($res==0) {
     $apdcode = "APV_D".date($datestring).date($mm)."000"."1";
      $apd_item ="1";
   }else{
     $this->db->select('*');
     $this->db->order_by('id','desc');
     $this->db->limit('1');
     $q = $this->db->get('ap_down_header');
     $run = $q->result();
     foreach ($run as $valx)
     {
       $x1 = $valx->id+1;
     }

     if ($x1<=9) {
        $apdcode = "APV_D".date($datestring).date($mm)."000".$x1;
        $apd_item = $x1;
     }
     elseif ($x1<=99) {
       $apdcode = "APV_D".date($datestring).date($mm)."00".$x1;
       $apd_item = $x1;
     }
     elseif ($x1<=999) {
       $apdcode = "APV_D".date($datestring).date($mm)."0".$x1;
       $apd_item = $x1;
     }
   }
 ?>
<div class="content-wrapper">
  <div class="content">
    <fieldset>
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h6 class="panel-title">Account Payable Archive (Down Vender)</h6>
          <div class="panel-body">
            <div class="row" style="float:right">
              <button type="button" class="btn btn-info btn-xs" id="select"><i class="icon-file-plus"></i> Select</button>   
            </div>
              <form id="fapd" action="<?php echo base_url(); ?>ap_active/addnewap_down" method="post">
                  <div class="col-md-12">
                    <div class="row">
                <div class="form-group col-sm-2">
                  <label for="">Vender Code :</label>
                  <input type="text" id="vendor_id" name="vendor_id" class="form-control" readonly="true">
                  <input type="hidden" id="po_id" name="po_id" class="form-control" value="0">
                  <input type="hidden" id="principle" class="form-control" readonly="true" value="0">
                </div>
                <div class="form-group col-sm-4">
                  <label for="">Vender Name :</label>
                  <div class="input-group" id="errorcost">
                  <input type="hidden" value="<?php echo $apdcode; ?>" name="apdcode">
                  <input type="text" id="namevendor" name="namevendor" class="form-control" readonly="true">
                  <span class="input-group-btn">
                    <a class="vendor btn btn-info " data-toggle="modal" data-target="#vendor"><span class="glyphicon glyphicon-search"></span> </a>
                  </span>
                  </div>
                </div>
                <div class="form-group col-sm-6">
                <div class="col-sm-6">
                  <label for="">Tax No. :</label>
                  <input type="text" id="tax_noi" name="tax_no" class="form-control" >
                </div>
                <div class="col-sm-6">
                  <label for="">PO Code :</label>
                  <input type="text" id="po_code" name="po_code" class="form-control" readonly="true">
                  <input type="hidden" name="sysid" id="sysid">
                </div>
                </div>
                
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                <div class="form-group col-sm-2">
                  <label for="">Credit Term:</label>
                  <input type="text" id="cterm" name="cterm" class="form-control" >
                </div>
                <div class="form-group col-sm-3">
                  <label>Due Date :</label>
                  <input type="date" readonly="true" id="duedate" name="duedate" class="form-control">
                </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                <!-- <div class="form-group col-sm-2">
                  <label for="">Department Code:</label>
                  <input type="text" id="depart_id" name="depart_id" class="form-control" readonly="true">
                </div>
                <div class="form-group col-sm-4">
                  <label for="">Department Name:</label>
                  <div class="input-group" id="errorcost">
                  <input type="text" id="dpt_title" name="dpt_title" class="form-control" readonly="true">
                  <span class="input-group-btn">
                    <a class="departm btn btn-info " data-toggle="modal" data-target="#departm"><span class="glyphicon glyphicon-search"></span> </a>
                  </span>
                  </div>
                </div> -->
                <div class="form-group col-sm-2">
                  <label for="">Project/Department ID:</label>
                  <input type="text" id="pre_event" name="pre_event" class="form-control" readonly="true" value="">
                  <input type="hidden" id="pjcode" name="pjcode" class="form-control" readonly="true" value="">
                </div>
                <div class="form-group col-sm-4">
                  <label for="">Project/Department Name :</label>
                  <div class="input-group" id="errorcost">
                  <input type="text" id="pre_eventname" name="pre_eventname" class="form-control" readonly="true">
                  <span class="input-group-btn">
                    <a class="project btn btn-info " data-toggle="modal" data-target="#project"><span class="glyphicon glyphicon-search"></span></a>
                  </span>
                  </div>
                </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                <div class="col-md-2">
                  <div class="form-group" id="errorcost">
                  <label for="qty">Amount</label>
                  <input type="text" id="amount" onkeyup="amount_cal()" name="qty"  placeholder="จำนวนเงิน" class="form-control" value="0">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                  <label for="price_unit">Vat %</label>
                   <input type="text" id="pprice_unit"  name="price_unit" class="form-control border-lg" >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                  <label for="amount">Vat Amount</label>
                  <input type="text" id="pamount"  readonly="true" name="pamount" placeholder="กรอกจำนวนเงิน" class="form-control" value="0">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" id="errorcost">
                  <label for="qty">Less Advance</label>
                  <input type="text" id="lessadv" name="lessadv" value="0" class="form-control" readonly="true" >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" id="errorcost">
                  <label for="qty">Less Retention</label>
                  <input type="text" id="lessret" name="lessret" value="0" class="form-control" readonly="true">
                  </div>
                </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                <div class="col-md-2">
                  <div class="form-group" id="errorcost">
                  <label for="qty">Net Amount</label>
                  <input type="text" id="amt" name="amt" class="form-control" value="0" readonly="true">
                  </div>
                </div>
                <div class="form-group col-sm-2">
                  <label for="">AP Date :</label>
                  <input type="date" id="vchdate" name="vchdate" class="form-control daterange-single">
                </div>

                <div class="form-group col-sm-2">
                  <label for="">Year :</label>
                  <input type="text" id="glyear" name="glyear" value="" class="form-control" readonly="true" >
                </div>

                <div class="form-group col-sm-2">
                  <label for="">Period :</label>
                  <input type="text" id="glperiod" readonly="true" name="glperiod" value="" class="form-control" >
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
                        <table class="table table-hover table-xxs ">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><div  style="width: 100px;">Account Code</div></th>
                              <th><div  style="width: 300px;">Account Name</div></th>
                              <th><div  style="width: 100px;">Cost Code</div></th>
                              <th><div  style="width: 100px;">Dr</div></th>
                              <th><div  style="width: 100px;">Cr</div></th>
                            </tr>
                          </thead>
                          <tbody id="glacc">
                          <?php $i=1;?>
                          <?php 
                            $this->db->select('*');
                            $this->db->from('syscode');
                            $query=$this->db->get()->result();
                            ?>

                            <?php 
                              foreach ($query as $mt ) { 
                              $amt =$mt->pac_down_apv;
                              }
                            ?>

                            <?php 
                            $this->db->select('*');
                            $this->db->from('account_total');
                            $this->db->where('act_code',$amt);
                            $aa=$this->db->get()->result();
                            ?>
                            <?php 
                              foreach ($aa as $st ) { 
                              $act_name =$st->act_name;
                              }
                            ?>     
                            <?php $i=1;?>
                          <tr>
                            <td><input type="text" readonly="" class="form-control" value="<?php echo "AMOUNT" ?>" name="gltype[]"></td>
                            <td>
                              <div class="input-group">
                                <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                                id="acc_no<?php echo $i; ?>" value="<?php echo $amt; ?>">
                                <span class="input-group-btn" >
                                    <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" ><i class="icon-search4"></i></button>
                                </span>
                              </div>
                            </td>
                            <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $act_name; ?>" name="account_name[]"  class="form-control " readonly="true"></td> 

                            <td><input type="text"  class="form-control " readonly="true" id="costcode<?php echo $i; ?>" name="costcode"  value=""></td>

                            <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" id="dr<?php echo $i; ?>"></td>
                            <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]" value="0"></td>
                          </tr>
                          
                            <?php $i++; ?>                          
                            <?php 
                            $session_data = $this->session->userdata('sessed_in');
                            $compcode = $session_data['compcode'];
                            $this->db->select('*');
                            $this->db->from('syscode');
                            $this->db->where('sys_code',$compcode);
                            $queryy=$this->db->get()->result();
                            ?>

                            <?php 
                              foreach ($queryy as $mtt ) { 
                              $vattt =$mtt->pac_taxvat_nodue;
                              $yvat =$mtt->pac_taxvat_due;
                              }
                            ?>

                            <?php 
                            $this->db->select('*');
                            $this->db->from('account_total');
                            $this->db->where('act_code',$vattt);
                            $aa=$this->db->get()->result();
                            ?>
                            <?php 
                              foreach ($aa as $st ) { 
                              $act_name =$st->act_name;
                              }

                            $this->db->select('*');
                            $this->db->from('account_total');
                            $this->db->where('act_code',$yvat);
                            $yy=$this->db->get()->result();
                            ?>
                            <?php 
                              foreach ($yy as $yst ) { 
                              $yact_name =$yst->act_name;
                              }
                            ?>    
                            <?php $i=2; ?>
                          <tr id="rowvat">
                            <input type="hidden" class="form-control " readonly="true"  id="novatcode" value="<?php echo $vattt; ?>">
                            <input type="hidden" class="form-control " readonly="true" id="novatname" value="<?php echo $act_name; ?>">
                            <input type="hidden" class="form-control " readonly="true"  id="yvatcode" value="<?php echo $yvat; ?>">
                            <input type="hidden" class="form-control " readonly="true" id="yvatname" value="<?php echo $yact_name; ?>">

                            <td><input type="text" readonly="" class="form-control" value="<?php echo "VAT" ?>" name="gltype[]"></td>
                            <td>
                              <div class="input-group">
                                <input type="text" class="form-control" readonly="true" name="ac_no[]" 
                                id="acc_no<?php echo $i; ?>" value="<?php echo $vattt; ?>">
                                <span class="input-group-btn" >
                                    <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                                </span>
                              </div>
                            </td>
                            <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $act_name  ?>" name="account_name"  class="form-control " readonly="true"></td>    
                            <td><input type="text" class="form-control " id="costcode<?=$i;?>" readonly="true" name="costcode"></td>
                            <td><input type="text" class="form-control  text-right" id="dr<?=$i;?>" readonly="true" name="dr[]" id="dr<?php echo $i; ?>"></td>
                            <td><input type="text" class="form-control  text-right" id="cr<?=$i;?>" readonly="true" name="cr[]" value="0"></td>            
                          </tr>
                            <?php $i++; ?>                          
                           <?php 
                            $this->db->select('*');
                            $this->db->from('syscode');
                            $queryven=$this->db->get()->result();
                            ?>
                            <?php 
                              foreach ($queryven as $vend ) { 
                              $ven =$vend->pac_vender_inmat;
                              }
                            ?>

                            <?php 
                            $this->db->select('*');
                            $this->db->from('account_total');
                            $this->db->where('act_code',$ven);
                            $aa=$this->db->get()->result();
                            ?>
                            <?php 
                              foreach ($aa as $st ) { 
                              $act_name =$st->act_name;
                              }
                            ?>
                         
                          <tr>
                            <?php $i=3; ?>                             
                            <td><input type="text" readonly="" class="form-control" value="<?php echo "VENDER" ?>" name="gltype[]"></td>
                            <td>
                              <div class="input-group">
                                <input type="text" readonly="true" class="form-control " name="ac_no[]" id="acc_no<?php echo $i; ?>" value="<?php echo $ven; ?>">
                                <span class="input-group-btn" >
                                    <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                                </span>
                              </div>
                            </td>
                            <td><input type="text" readonly="true" class="form-control " readonly="true" name="act_name" id="acc_name<?=$i;?>" value="<?php echo $act_name; ?>"></td>
                            <td><input type="text" class="form-control " readonly="true" name="costcode"></td>
                            <td><input type="text" class="form-control  text-right" readonly="true" id="dr<?php echo $i; ?>" name="dr[]" value="0"></td>
                            <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]" id="cr<?php echo $i; ?>"></td>           
                          </tr>
                          <?php $i++; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <input type="hidden" id="vendername" value="">
                    <input type="hidden" id="tax_id" value="">
                    <input type="hidden" id="today" value="<?=date('Y-m-d');?>">
                    <div class="tab-pane has-padding" id="pa-pill2">
                      <div id="tax" class="table-responsive">
                      
                      <button type="button" id="addTax" class="btn btn-default">Add Tax</button>
                      
                        <table class="table table-hover table-xxs">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Vendor Name</th>
                              <th>Tax ID</th>
                              <th>Branch No.</th>
                              <th>Tax No</th>
                              <th>Tax Date</th>
                              <th>Amount</th>
                              <th>Vat %</th>
                              <th>Vat Amount</th>
                              <th>Action</th>
                              
                            </tr>
                          </thead>
                            <tfoot>
                              <tr class="sum">
                                <td colspan="6">Total</td>
                                <td id="sum_amount"></td>
                                <td id="sum_vat"></td>
                                <td id="sum_vat_amount"></td>
                              </tr>
                            </tfoot>
                          <tbody id="bodytax">
                            <!-- <?php for ($i=1; $i < 2; $i++) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>
                                <div class="input-group" style="width: 200px;">
                                  <input type="text" id="nameve" name="nameve[]" class="form-control" readonly="true">
                                </div>
                              </td>
                              <td><input type="text" maxlength="13" class="form-control " value="" name="tax_de[]" id="tax_de<?=$i;?>"></div></td>
                              <td><input type="text" class="form-control" id="branch_de<?=$i;?>" name="branch_de[]"></td>
                              <td><input type="text" class="form-control" onkeyup="set_sys_new(<?=$i;?>, 'taxiv', 'tdate')" id="taxiv<?=$i;?>" name="taxiv[]"></td>
                              <td><input type="date" id="tdate<?=$i;?>" name="tdate[]" onchange="set_sys_new(<?=$i;?>, 'taxiv', 'tdate')" class="form-control"></td>
                              <td><input type="text" class="form-control amount_row" onkeyup="sum_cal('amount_row','sum_amount', <?=$i;?>)" name="amtax[]" row="<?=$i;?>" id="amtax<?=$i;?>"></td>
                              <td><input type="text" class="form-control vat_row" onkeyup="sum_cal('vat_row','sum_vat', <?=$i;?>)" name="vattax[]" row="<?=$i;?>" id="vattax<?=$i;?>"></td>
                              <td><input type="text" class="form-control vat_amount_row" onkeyup="sum_cal('vat_amount_row','sum_vat_amount', <?=$i;?>)" row="<?=$i;?>" name="amttax[]" id="amttax<?=$i;?>"></td>             
                            </tr> -->
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
                                }
                              }

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
                              let amount = $(`#amtax${id}`).val()*1;
                              let vat = $(`#vattax${id}`).val()*1;
                              let amttax = amount*vat/100;
                              $(`#amttax${id}`).val(amttax);
                             }

                              $('#addTax').click(function(){
                                var runTR = $('#bodytax > tr').length+1;
                                var vendername = $('#vendername').val();
                                var tax_id = $('#tax_id').val();
                                var amount = $('#amount').val()*1;
                                var vat = $('#pprice_unit').val()*1;
                                var vatamt = $('#pamount').val()*1;
                                var row = `<tr id="row_tr${runTR}">
                                              <td>${runTR}</td>
                                              <td>
                                                <div class="input-group" style="width: 200px;">
                                                  <input type="text" id="nameve${runTR}" name="nameve[]" class="form-control" readonly="true" value="${vendername}">
                                                </div>
                                              </td>
                                              <td><input type="text" maxlength="13" class="form-control " name="tax_de[]" id="tax_de${runTR}" value="${tax_id}"></div></td>
                                              <td><input type="text" class="form-control" id="branch_de${runTR}" name="branch_de[]"></td>
                                              <td><input type="text" class="form-control" onkeyup="set_sys_new(<?=$i;?>, 'taxiv', 'tdate')" id="taxiv${runTR}" name="taxiv[]" ></td>
                                              <td><input type="date" id="tdate${runTR}" name="tdate[]" onchange="set_sys_new(<?=$i;?>, 'taxiv', 'tdate')" class="form-control daterange-single"></td>
                                              <td><input type="text" class="form-control amount_row" onkeyup="sum_cal('amount_row','sum_amount', ${runTR})" name="amtax[]" id="amtax${runTR}" value="${amount}"></td>
                                              <td><input type="text" class="form-control vat_row" onkeyup="sum_cal('vat_row','sum_vat', ${runTR})" name="vattax[]" id="vattax${runTR}" value="${vat}"></td>
                                              <td><input type="text" class="form-control vat_amount_row" onkeyup="sum_cal('vat_amount_row','sum_vat_amount', ${runTR})" name="amttax[]" id="amttax${runTR}" value="${vatamt}"></td>         
                                              <td><a onclick="del_row($(this))" attr-id="${runTR}"><i class="fa fa-trash"></i></a></td>        
                                            </tr>`;

                                  $('#bodytax').append(row);
                                  amount_cal();
                              });
                              $("#tax_noi").click(function(){
                                if ($("#pprice_unit").val()==0) {
                                  swal({
                                      title: "Please Fill Vat % !!.",
                                      text: "",
                                      confirmButtonColor: "#EA1923",
                                      type: "error"
                                  });
                                }
                                  var vcode = $('#yvatcode').val();
                                  var vnane = $('#yvatname').val();
                                  $('#vatcode').val(vcode);
                                  $('#vatname').val(vnane);
                                });

                                $("#tax_noi").keyup(function(){
                                var tax_no = $('#tax_noi').val();
                                $('#taxiv').val(tax_no);
                                });

                                $("#taxiv").click(function(){
                                  if ($("#pprice_unit").val()==0) {
                                      swal({
                                          title: "Please Fill Vat % !!.",
                                          text: "",
                                          confirmButtonColor: "#EA1923",
                                          type: "error"
                                      });
                                    }
                                  var vcode = $('#yvatcode').val();
                                  var vnane = $('#yvatname').val();
                                  $('#vatcode').val(vcode);
                                  $('#vatname').val(vnane);
                                });

                                $("#taxiv").keyup(function(){
                              var taxiv = $('#taxiv').val();
                              $('#tax_noi').val(taxiv);
                              });
                            </script>
                            <script>  $('#remove<?php echo $i;?>').on('click', function() {$(this).closest('tr').remove();});</script>
                            <script>
                              $("#qty<?php echo $i; ?>").keyup(function(){
                               var poamt = parseFloat($("#poamt").val());
                               var down = parseFloat($("#qty<?php echo $i; ?>").val());
                               var unitprice = parseFloat($("#unitpricei<?php echo $i; ?>").val());
                               var vat = parseFloat($("#vatper").val());
                               var downamt = parseFloat((totamt*vat/100)+totamt);
                               $("#vati<?php echo $i; ?>").val(vatamt);
                               $("#netamti<?php echo $i; ?>").val(downamt);

                              });
                              $("#unitpricei<?php echo $i; ?>").keyup(function(){
                               var poamt = parseFloat($("#poamt").val());
                               var down = parseFloat($("#qty<?php echo $i; ?>").val());
                               var unitprice = parseFloat($("#unitpricei<?php echo $i; ?>").val());
                               var vat = parseFloat($("#vatper").val());
                               var totamt = down*unitprice;
                               var vatamt = (totamt*vat/100);
                               var downamt = parseFloat((totamt*vat/100)+totamt);
                               $("#vati<?php echo $i; ?>").val(vatamt);
                               $("#netamti<?php echo $i; ?>").val(downamt);

                              });
                              $("#vatper").keyup(function(){
                               var poamt = parseFloat($("#poamt").val());
                               var down = parseFloat($("#qty<?php echo $i; ?>").val());
                               var unitprice = parseFloat($("#unitpricei<?php echo $i; ?>").val());
                               var bfper = parseFloat($("#beforewti<?php echo $i; ?>"));
                               var vat = parseFloat($("#vatper").val());
                               var vatamt = (unitprice*vat/100);
                               var downamt = parseFloat((unitprice*vat/100)+unitprice);
                               $("#vati<?php echo $i; ?>").val(vatamt);
                               $("#netamti<?php echo $i; ?>").val(downamt);
                              });
                            </script>
                           <!-- modal material -->
                            <div id="opnewmat<?php echo $i; ?>" class="modal fade" data-backdrop="false">
                              <div class="modal-dialog modal-full">
                                <div class="modal-content ">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Add Item</h5>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row" id="modal_mat<?php echo $i; ?>"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <script>
                            $(".openun<?php echo $i; ?>").click(function(){
                             $('#modal_mat<?php echo $i; ?>').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                             $("#modal_mat<?php echo $i; ?>").load('<?php echo base_url(); ?>index.php/share/material_id/<?php echo $i; ?>');
                             });
                            </script>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    </div>
                    <br>
                    <div class="modal-footer">
                      <div class="form-group">
                      <button id="saveapd" type="button" class="btn btn-success"><i  id="icon_save" class="icon-floppy-disk position-left"></i> Save</button>
                      <a href="#" class="btn btn-danger"><i class="icon-close2 position-left"></i> Close</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </fieldset>
  </div>
</div>

<div class="modal fade" id="podown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-full">
    <div class="modal-content">
      <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="">PO No</h4>
      </div>
      <div class="modal-body">
      <div id="content_podown"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Vender</h4>
      </div>
      <div class="modal-body">
      <div id="vendormodel"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="departm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Department</h4>
      </div>
      <div class="modal-body">
      <div id="departmodel"></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Project</h4>
    </div>
    <div class="modal-body">
    <div id="projectmodel"></div>
    </div>
  </div>
  </div>
</div>

<script>
  $('#select').click(function(){
    $('#podown').modal('show');
    $('#content_podown').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#content_podown").load('<?php echo base_url(); ?>index.php/ap/podown');
  });
$("#cterm").keyup(function(){
  function newDayAdd(inputDate,addDay){
      var d = new Date(inputDate);
      d.setDate(d.getDate()+addDay);
      mkMonth=d.getMonth()+1;
      mkMonth=new String(mkMonth);
      if(mkMonth.length==1){
          mkMonth="0"+mkMonth;
      }
      mkDay=d.getDate();
      mkDay=new String(mkDay);
      if(mkDay.length==1){
          mkDay="0"+mkDay;
      }   
      mkYear=d.getFullYear();
      return mkYear+"-"+mkMonth+"-"+mkDay; 
  }
  var dates = new Date();
  var cr = parseFloat($("#cterm").val());
  var duedate=newDayAdd(dates,cr);
  $('#duedate').val(duedate);
});

  function del_row(el) {
    const id = el.attr('attr-id');
  swal({
    title: "เตือน!!!",
    text: "ต้องการลบรายการนี้ใช่ไหม?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
    $(`#row_tr${id}`).remove();
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
  });
    
  }

  function amount_cal() {


      if($('#principle').val()*1 != 0) {

        if($('#amount').val()*1 > $('#principle').val()*1 ) {
          $('#amount').val($('#principle').val());

        }
      }
      var amount = $('#amount').val()*1;
      var vat = $('#pprice_unit').val()*1;
      var xamount = (amount*vat)/100*1;
      var xamtt = (xamount+amount);
        $('#dr1').val(numberWithCommas(amount));
        $('#dr2').val(numberWithCommas(xamount));
        $('#cr3').val(numberWithCommas(xamtt));
        $('#pamount').val((xamount));
        $('#amt').val(numberWithCommas(xamtt));
        $('#amtax1').val(amount);
        $('#vattax1').val(vat);
        $('#amttax1').val(xamount);
        sum_cal('amount_row','sum_amount', 1);

  }
  function rowshowhide(show) {
    if (show === true) {

      $('#novatcode').removeAttr('disabled');
      $('#novatname').removeAttr('disabled');
      $('#yvatcode').removeAttr('disabled');
      $('#yvatname').removeAttr('disabled');
      $('#acc_no2').removeAttr('disabled');
      $('#acc_name2').removeAttr('disabled');
      $('#costcode2').removeAttr('disabled');
      $('#dr2').removeAttr('disabled');
      $('#cr2').removeAttr('disabled');
    }else{
      $('#novatcode').attr('disabled', 'true');
      $('#novatname').attr('disabled', 'true');
      $('#yvatcode').attr('disabled', 'true');
      $('#yvatname').attr('disabled', 'true');
      $('#acc_no2').attr('disabled', 'true');
      $('#acc_name2').attr('disabled', 'true');
      $('#costcode2').attr('disabled', 'true');
      $('#dr2').attr('disabled', 'true');
      $('#cr2').attr('disabled', 'true');
    }
  }
      $("#rowvat").hide();
      $("#pprice_unit").keyup(function(){
        amount_cal();
        if($(this).val() == 0 || $(this).val() =='') {

          $("#rowvat").hide();
        }else{

          $("#rowvat").show();
        }
  });

$("#tax_noi").keyup(function(){
  var tax_no = $('#tax_noi').val();
  $('#taxiv').val(tax_no);
  });

$("#taxiv").keyup(function(){
  var taxiv = $('#taxiv').val();
  $('#tax_noi').val(taxiv);
  if ($("#pprice_unit").val()==0) {
        swal({
            title: "Please Fill Vat % !!.",
            text: "",
            confirmButtonColor: "#EA1923",
            type: "error"
        });
      }
    var vcode = $('#yvatcode').val();
    var vnane = $('#yvatname').val();
    $('#vatcode').val(vcode);
    $('#vatname').val(vnane);
  });

$("#vchdate").change(function(event) {
    var de_date = $("#vchdate").val();
    var y = de_date.slice(0,4); 
    var m = de_date.slice(5,7);

    $("#glperiod").val(m);
    $("#glyear").val(y);         

  }); 



</script>

<script>
   $(".vendor").click(function(){
   $('#vendormodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#vendormodel").load('<?php echo base_url(); ?>index.php/share/vender');
   });

   $(".departm").click(function(){
   $('#departmodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#departmodel").load('<?php echo base_url(); ?>index.php/share/department');
   });


  $(".project").click(function(){
   $('#projectmodel').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#projectmodel").load('<?php echo base_url(); ?>index.php/ap/modal_project');
   });


$("#saveapd").click(function(e){

  var url="<?php echo base_url(); ?>ap_active/selectdate";
        var dataSet={
        d: $("#vchdate").val(),
        y: $("#glyear").val(),
        m: $("#glperiod").val()
        };
      $.post(url,dataSet,function(data){
      // if (data!="Y") {
      //   swal({
      //     title: "Please Select Period GL !!.",
      //     text: "",
      //     confirmButtonColor: "#EA1923",
      //     type: "error"
      //   });
      //   }else 
        if ($("#vendor_id").val()=="") {
  swal({
      title: "Please Select Vender !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if($("#pre_event").val()==""){
  swal({
      title: "Please Select project!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if($("#cterm").val()==""){
  swal({
      title: "Please Fill Credit Term!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
  
    var sum_amount = $('#sum_amount').html()*1;
    var sum_vat_amount = $('#sum_vat_amount').html()*1; 
    var amount = $('#amount').val()*1; //Amount
    var pamount = $('#pamount').val()*1; //Vat Amount
      // fa fa-spinner
      // 
    if(sum_amount == amount && pamount == sum_vat_amount) {
    $('#saveapd').attr('class', 'btn btn-success disabled');
    $('#icon_save').attr('class', 'icon-spinner2 spinner');
      var frm = $('#fapd');
            frm.submit(function (ev) {
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                            success: function (data) {
                              console.log(data);
                              
                        swal({
                                  title: "Save Completed!!.",
                                  text: "Save Completed!!.",
                                  // confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
      
                        setTimeout(function() {
                          window.location.href = "<?php echo base_url();?>report/viewerloadgl?module=ap&typ=report&reportname=apd_payvoucher.mrt&no=<?php echo $apdcode; ?>&compcode=<?php echo $compcode;?>";
                          // window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=apd_payvoucher.mrt&no=<?php echo $apdcode; ?>";
                            $('#saveapd').attr('class', 'btn btn-success disabled');
                            $('#saveapd').attr('disabled', 'disabled');
                            $('#icon_save').attr('class', 'icon-floppy-disk');
                        }, 500);
                       
                    }
                });
                ev.preventDefault();

            });
          $("#fapd").submit();
    }else{

      swal({
          title: "เตือน",
          text: "รายการใน TAX ไม่สัมพันธ์!!.",
          // confirmButtonColor: "#66BB6A",
          type: "error"
      });
     
    }
      }
});
       });
</script>


<div id="accopen" class="modal fade" data-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Account </h5>
      </div>

      <div class="modal-body">
        <div class="loadaccchart">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
        <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(".accopen").click(function(){
      var row = $(this).attr("row");    
      $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart2/'+row);
      $("#accopen").modal("show");
  });
</script>

