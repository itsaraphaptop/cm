
<!-- <?php var_dump($array)?> -->
<?php
$session_data = $this->session->userdata('sessed_in');
$compcode = $session_data['compcode'];
?>
<table class="table table-hover table-xxs table-responsive">
    <thead>
      <tr>
        <th class="text-center" width="15%">Type</th>
        <th>Account Code</th>
        <th>Account Name</th>
        <th>Cost Code</th>
        <th class="text-center">Dr</th>
        <th class="text-center">Cr</th>
      </tr>
    </thead>
        <tbody id="glacc">            
                <?php 
                $this->db->select('*');
                $this->db->from('syscode');
                $this->db->where('sys_code',$compcode);
                $queryy=$this->db->get()->result();

              foreach ($queryy as $mtt ) { 
                $prcostt =$mtt->pac_cost_mat;
                $ap_pac = $mtt->pac_vender_inmat;
                $vat =$mtt->pac_taxvat_nodue;
                $yvat =$mtt->pac_taxvat_due;
                }

                $this->db->select('*');
                $this->db->from('account_total');
                $this->db->where('act_code',$prcostt);
                $this->db->where('compcode',$compcode);
                $aa=$this->db->get()->result();

                foreach ($aa as $st ) { 
                $prc_name =$st->act_name;
                }

                $this->db->select('*');
                $this->db->from('account_total');
                $this->db->where('act_code',$ap_pac);
                $this->db->where('compcode',$compcode);
                $appac=$this->db->get()->result();

                foreach ($appac as $ap_pacv ) { 
                $appacv = $ap_pacv->act_name;
                }

                $this->db->select('*');
                $this->db->from('account_total');
                $this->db->where('act_code',$vat);
                $this->db->where('compcode',$compcode);
                $vatt=$this->db->get()->result();

                foreach ($vatt as $svatt ) { 
                $vat_name =$svatt->act_name;
                }

                $this->db->select('*');
                $this->db->from('account_total');
                $this->db->where('act_code',$yvat);
                $this->db->where('compcode',$compcode);
                $yvatt=$this->db->get()->result();

                foreach ($yvatt as $yyvatt ) { 
                $yvat_name = $yyvatt->act_name;
                }

                $todr=0; $i = 1; foreach ($poitem as $key) {  
                    // echo "<pre>";
                    // var_dump($key);
                ?>

                <!-- AMOUNT -->

                <tr>
                <td><input type="text" value="AMOUNT"  readonly=""  id="type<?php echo $i; ?>" class="form-control" name="type[]"></td>
                <td>
                    <div class="input-group">
                    <input type="text" class="form-control" readonly="true" name="aps_paccost[]" 
                    id="acc_no<?php echo $i; ?>" value="<?php echo $prcostt; ?>">
                    <span class="input-group-btn" >
                        <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                    </span>
                    </div>
                </td>
                <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $prc_name; ?>"  class="form-control " readonly="true"></td> 
                <td>
                    <?php 
                    $subheader = substr($key->poi_costcode,0,1);
                    if ($subheader != "G") {
                    $subde = substr($key->poi_costcode,1,6);
                    }else{
                    $subde = $key->poi_costcode;    
                    
                    }
                     ?>
                    <input type="hidden" readonly="true" name="subcost[]" class="form-control " value="<?php echo $subde; ?>">
                    <input type="text" readonly="true" name="costcode[]" class="form-control " value="<?php echo $key->poi_costcode; ?>">
                </td>
                <td><input type="text" readonly="true" class="form-control  text-right dr" amt_dr="dd" name="dr[]" id="dr<?php echo $i; ?>" value="<?=$key->poi_disamt;?>"></td>
                <td><input type="text" readonly="true" class="form-control  text-right cr" name="cr[]"  value="0"></td>
            </tr>
            <!-- AMOUNT -->
            <?php  $i++; $todr=$key->poi_amount-($key->poi_amount*$key->poi_discountper1/100); } ?>
                   
            <input type="hidden" class="form-control " readonly="true"  id="yvatcode" value="<?php echo $yvat; ?>">
            <input type="hidden" class="form-control " readonly="true" id="yvatname" value="<?php echo $yvat_name; ?>" >
                <?php $n=$i++;?>
                <?php $sum=0; foreach ($poivat as $povat) {
                if ($povat->taxno!="") {    
                ?>
                <!-- vat -->
                <tr id="vatt">
                <td><input type="text" value="VAT" readonly=""  id="type<?=$n;?>" class="form-control" name="type_bu[]"></td>               
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly="true" name="aps_paccost_bu[]" 
                        id="acc_no<?php echo $i; ?>" value="<?php echo $yvat; ?>">
                        <span class="input-group-btn" >
                            <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                        </span>
                    </div>
                </td>
                <td><input type="text" readonly="true" id="acc_name<?php echo $i; ?>" class="form-control " value="<?php echo $yvat_name; ?>"></td>
                <td><input type="text" readonly="true" class="form-control " value=""></td>
                <!-- <td><input type="text" readonly="true" class="form-control  text-right"  amt_vat="vv" name="dr[]" id="dr" value="<?php echo $povat->chqvat; ?>"> -->
                <td><input type="text" readonly="true" class="form-control  text-right dr"  amt_vat="vv" name="dr_bu[]" id="dr_vat" value="<?=$vatamt;?>">
                </td>
                <td><input type="text" readonly="true" class="form-control  text-right cr" name="cr_bu[]"  value="0"></td>
            </tr>

            <?php   }else{  
            if ($povat->chqvat!=0) {
            ?>
                <!-- ภาษีซื้อไม่ครบกำหนดชำระ -->
             <tr id="vvatt">
                <td><input type="text" value="VAT" readonly=""  id="type<?=$n;?>" class="form-control" name="type_bu[]"></td>               
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly="true" name="aps_paccost_bu[]" 
                        id="acc_no<?php echo $i; ?>" value="<?php echo $vat; ?>">
                        <span class="input-group-btn" >
                            <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                        </span>
                    </div>
                <!-- <input type="text" id="vcode" readonly="true" class="form-control " name="aps_paccost[]"  value="<?php echo $vat; ?>"> --></td>
                    <td><input type="text" id="acc_name<?php echo $i; ?>" class="form-control " readonly="true" value="<?php echo $vat_name; ?>"></td>
                    <td><input type="text"  readonly="true" class="form-control " value=""></td>
                    <td><input type="text" readonly="true" class="form-control text-right dr" amt_vat="vv" name="dr_bu[]" id="dr_vat" value="<?=$vatamt;?>">
                    </td>
                    <td><input type="text" readonly="true" class="form-control  text-right cr" name="cr_bu[]"  value="0"></td>
            </tr>
                <!-- ภาษีซื้อไม่ครบกำหนดชำระ -->
            
            <!-- ภาษีซื้อ -->
            <!-- <tr id="vatto">
                <td><input type="text" value="VAT" readonly=""  id="type<?=$n;?>" class="form-control" name="type_bu[]"></td>               
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly="true" name="aps_paccost_bu[]" id="acc_no<?php echo $i; ?>" value="<?php echo $yvat; ?>">
                        <span class="input-group-btn" >
                            <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                        </span>
                    </div>
                </td>
                <td><input type="text" readonly="true" id="acc_name<?php echo $i; ?>" class="form-control " value="<?php echo $yvat_name; ?>"></td>
                <td><input type="text" readonly="true" class="form-control " value=""></td>
                <td><input type="text" readonly="true" class="form-control  text-right dr"  amt_vat="vv" name="dr_bu[]" id="dr" >
                </td>
                <td><input type="text" readonly="true" class="form-control  text-right cr" name="cr_bu[]"  value="0"></td>
            </tr> -->
            <!-- ภาษีซื้อ -->


             <!-- vat -->
            <?php
                }    
              ?>
            
            <?php
             } $n++; } ?>
                        
                <?php $m=$n++;?>
                <?php 
                    $this->db->select("sum(poi_disamt) as dis_netamt");
                    $this->db->where_in("poi_ref",$array);
                    $de = $this->db->get("receive_poitem")->result();
                    // $de=$this->db->query("SELECT 
                    //     sum(poi_netamt) as dis_netamt from receive_poitem where poi_ref = '$no'")->result();

                      foreach ($de as $dd) {

                ?>
                    <tr>
                        <td><input type="text" value="VENDER" readonly="" id="type<?=$i+1;?>" class="form-control" name="type_bu[]"></td>
                        <td>
                            <div class="input-group">
                                <input type="text" readonly="true" class="form-control" id="acc_no<?=$i+1;?>" name="aps_paccost_bu[]" value="<?php echo $ap_pac; ?>">
                                <span class="input-group-btn" >
                                    <button type="button" row="<?php echo $i+1; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
                                </span>
                            </div>
                        </td>
                        <td><input type="text" readonly="true" class="form-control" id="acc_name<?=$i+1;?>" value="<?php echo  $appacv; ?>"></td>
                        <td><input type="text" class="form-control" readonly="true" value=""></td>
                        <td><input type="text" readonly="true" class="form-control  text-right dr" name="dr_bu[]" value="0">
                    </td>
                    <td>
                        <input type="text" readonly="true" class="form-control  text-right cr" name="cr_bu[]" id="vender_bu"  value="">
                        <input type="hidden" id="vender_default">
                    </td>
                    </tr>
            <?php } ?>
        </tbody>
                    <tr>
                        <td colspan="4">Total</td>
                        <td><input type="text" id="sffumdr" name="sffumdr" class="form-control text-right" readonly="true" value="<?php echo number_format($netamt,2);?>" readonly="true"></td>
                        <td><input type="text" id="sffumcr" name="sffumcr" class="form-control text-right" readonly="true" value="<?php echo number_format($netamt,2); ?>" readonly="true"></td>
                    </tr>
</table>

<!-- <?php foreach ($poitem as $kk) { ?>  -->
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
                <!-- <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
                <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a> -->
            </div>
        </div>
    </div>
</div>
  

<!-- <?php } ?> -->
<div id="less_modal" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Account </h5>
            </div>

            <div class="modal-body">
                <div id="con_less">

                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" id="save" class="boxmessage btn bg-primary-600">Save</button>
                <a type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</a> -->
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="setup" value="<?=$setup;?>">
  <script>
  var amount = $('#amount').val()*1;
  var down = $('#downper_value').val()*1;
  var reten =$('#retention_value').val()*1;
  var vat =$('#pprice_unit').val()*1;
  var val1 = amount - down;
  var val2 = (val1 * vat)/100;
  let setup = $('#setup').val();

  if(setup == 'ap') {
  var total = val1+val2-reten;
  }else{
  var total = val1+val2;
  }
  if (down > 0) {
    down_fun(down);
  }
  if (reten > 0) {
    reten_fun(reten);
  }

  $('#vender_bu').val(total);
  $('#vender_default').val(total);

  $(".accopen").click(function(){
      var row = $(this).attr("row");
      
      $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart2/'+row);
      $("#accopen").modal("show");
  });


// $('#dr_vat').val(vatamt);
</script>