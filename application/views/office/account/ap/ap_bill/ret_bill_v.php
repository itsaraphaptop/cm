<table class="table table-hover table-xxs table-responsive">
    <thead>
      <tr>
        <th class="text-center" width="15%">Type</th>
        <th class="text-center" width="15%">Account Code</th>
        <th class="text-center" width="25%">Account Name</th>
        <th class="text-center" width="13%">Cost Code</th>
        <th class="text-center">Dr</th>
        <th class="text-center">Cr</th>
      </tr>
    </thead>
    <tbody id="glacc">
      <?php 
       $session_data = $this->session->userdata('sessed_in');
       $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('compcode',$compcode);
        $comp=$this->db->get()->result();
        foreach ($comp as $company ) { 
          $glrap = $company->glrap;
        }

        $this->db->select('*');
        $this->db->from('syscode');
        $this->db->where('sys_code',$compcode);
        $queryy=$this->db->get()->result();

        foreach ($queryy as $mtt ) { 
          $prcostt =$mtt->pac_cost_cont;
          $amt =$mtt->pac_vender_dow;
          $bb =$mtt->pac_vender_retcont;
          $vat =$mtt->pac_taxvat_nodue;
          $yvat =$mtt->pac_taxvat_due;
          $pacr =$mtt->pac_vender_retcont;
          $ap_adv =$mtt->pac_vender_dow;
          $ap_pac = $mtt->pac_vender_incont;
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
        $this->db->where('act_code',$amt);
        $aa=$this->db->get()->result();

        foreach ($aa as $st ) { 
        $amt_name =$st->act_name;
        }

        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$bb);
        $aa=$this->db->get()->result();

          foreach ($aa as $st ) { 
          $bb_name =$st->act_name;
          }

        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$vat);
        $vatt=$this->db->get()->result();

        foreach ($vatt as $svatt ) { 
        $nvat_name =$svatt->act_name;
        }

        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$yvat);
        $yy=$this->db->get()->result();

          foreach ($yy as $yst ) { 
          $yact_name =$yst->act_name;
          }
        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$pacr);
        $pacrec=$this->db->get()->result();

          foreach ($pacrec as $appac ) { 
          $pacr_name =$appac->act_name;
          }
        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$ap_adv);
        $apadv=$this->db->get()->result();

        foreach ($apadv as $adad ) { 
        $adv_name =$adad->act_name;
        } 

        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$ap_pac);
        $appac=$this->db->get()->result();

          foreach ($appac as $ap_pacv ) { 
          $appacv = $ap_pacv->act_name;
          }

      foreach ($he as $hd ) {
        $payamt = $hd->ap_pay;
      
      }    
      if ($de) {  
       $i=1; foreach ($de as $key ) {
       foreach ($he as $hd ) {
           
       ?>      
        <tr>
          <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="AMOUNT"></td> 
          <td>
              <div class="input-group">
              <input type="text" class="form-control" readonly="true" name="aps_paccost[]" 
              id="acc_no<?php echo $i; ?>" value="<?php echo $prcostt; ?>">
              <span class="input-group-btn" >
                  <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $key->ap_bill_id; ?>"><i class="icon-search4"></i></button>
              </span>
              </div>
          </td>
          <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $prc_name; ?>"  class="form-control " readonly="true"></td> 
          <td><input type="text" class="form-control" name="aps_cc[]" readonly="true" value="<?php echo $key->api_costcode; ?>"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" id="dr<?php echo $i; ?>" value="<?=$key->api_amount?>"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]"  value="0"></td>
        </tr>
        <?php $i++;} }
         }elseif ($type == 2) {
         $i = 1; ?>     
        <tr>
          <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="AMOUNT"></td>
          <td>
              <div class="input-group">
              <input type="text" class="form-control" readonly="true" name="aps_paccost[]" 
              id="acc_no<?php echo $i; ?>" value="<?php echo $amt; ?>">
              <span class="input-group-btn" >
                  <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon"  data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
              </span>
              </div>
          </td>
          <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $amt_name; ?>"  class="form-control " readonly="true"></td> 
          <td><input type="text" name="aps_cc[]" class="form-control" readonly="true" value=""></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" id="dr<?php echo $i; ?>" value="<?php echo $payamt; ?>"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]"  value="0"></td>
          </tr>
        <?php $i++; }else{ $i = 1; ?>  
        <tr>
          <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="AMOUNT"></td> 
          <td>
              <div class="input-group">
              <input type="text" class="form-control" readonly="true" name="aps_paccost[]" 
              id="acc_no<?php echo $i; ?>" value="<?php echo $bb; ?>">
              <span class="input-group-btn" >
                  <button type="button" row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
              </span>
              </div>
          </td>
          <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $bb_name; ?>"  class="form-control " readonly="true"></td> 
          <td><input type="text" name="aps_cc[]" class="form-control " readonly="true" value=""></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" id="dr<?php echo $i; ?>" value="<?php echo $payamt; ?>"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]"  value="0"></td>
          </tr>
        <?php $i++; } 

          if ($de) {  
          $n=$i++; foreach ($de as $key ) {  
            $amtvat =  $key->ap_vatper;   
          }  
        if($key->ap_vatper != 0) {              
           ?>  
        <tr>
        <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="VAT"></td> 
        <td>
          <div class="input-group">
            <input readonly="true" id="acc_no<?=$n; ?>" type="text" class="form-control " name="aps_paccost[]" value="<?php echo $vat; ?>">
            <span class="input-group-btn" >
              <button type="button" row="<?=$n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?= $n; ?>"><i class="icon-search4"></i></button>
            </span>
          </div>
        </td>
        <td><input id="acc_name<?=$n; ?>" type="text" class="form-control " readonly="true" value="<?php echo $nvat_name; ?>"></td>
        <td><input type="text" name="aps_cc[]" class="form-control " readonly="true" value=""></td>
        <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" id="dr<?php echo $n; ?>" value="<?php echo $amtvat; ?>"></td>
        <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]"  value="0"></td>
      </tr>
      <?php $n++; } } 
      if ($de) {  
       $m=$n++; foreach ($de as $key ) {
        $amtret=  $key->ap_deduct_retper;
      }  
      if($key->ap_deduct_retper != 0) {
        if($glrap ==  "ap"){ ?>  
          <tr>
            <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="RETENTION"></td> 
            <td>
              <div class="input-group">
                <input type="text" id="acc_no<?=$m; ?>" class="form-control " name="aps_paccost[]" readonly="true" value="<?php echo $pacr; ?>">
                <span class="input-group-btn" >
                  <button type="button" row="<?=$m; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?=$m; ?>"><i class="icon-search4"></i></button>
                </span>
              </div>
            </td>
            <td><input type="text" id="acc_name<?=$m; ?>" class="form-control " readonly="true" value="<?php echo $pacr_name; ?>"></td>
            <td><input type="text" name="aps_cc[]" class="form-control " readonly="true" value=""></td>
            <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]"  value="0"></td>
            <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]" id="cr<?php echo $m; ?>" value="<?php echo $amtret; ?>"></td>
          </tr>
    <?php }?>

    <?php $m++; } }   

          if ($de) {  
           $s=$m++; foreach ($de as $key ) { 
            $amtdown = $key->ap_redownper;
          }  
             if($key->ap_redownper != 0) {              
           ?>  
        <tr>
          <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="DOWN"></td> 
          <td>
            <div class="input-group">
              <input type="text" id="acc_no<?=$s; ?>" class="form-control " readonly="true" name="aps_paccost[]" value="<?php echo $ap_adv; ?>">
              <span class="input-group-btn" >
                <button type="button" row="<?=$s; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?=$s; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <td><input type="text" id="acc_name<?=$s; ?>" class="form-control " readonly="true" value="<?php echo $adv_name; ?>"></td>
          <td><input type="text" name="aps_cc[]" class="form-control " readonly="true" value=""></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" value="0"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" 
          value="<?php echo $amtdown; ?>" name="cr[]" id="cr<?php echo $s; ?>" ></td>
        </tr>
        <?php $s++; } }     
       
        $k=$i++; 
         if($hd->ap_amountdown != 0) { 
          $this->db->select('*');
          $this->db->from('bill_lessother');
          $this->db->where('id_bill',$hd->ap_bill_contractno);
          $less=$this->db->get()->result();

          foreach ($less as $lessot ) { 
          $less_ot =$lessot->ac;
          }

          $this->db->select('*');
          $this->db->from('account_total');
          $this->db->where('act_code',$less_ot);
          $ll=$this->db->get()->result();

          foreach ($ll as $less ) { 
         
          }
          ?>
         <tr>
          <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="Less Other"></td> 
          <td><input type="text" class="form-control " readonly="true" name="aps_paccost[]" value="<?php echo $less_ot; ?>"></td>
          <td><input type="text" class="form-control " readonly="true" value="<?php echo $less->act_name;; ?>"></td>
          <td><input type="text" class="form-control " readonly="true" value=""></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" value="0"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" value="<?php echo $hd->ap_amountdown; ?>" name="cr[]" id="cr<?php echo $k; ?>" ></td>
        </tr>
        <?php $k++; }else{  $i;  } ?>

        <?php if ($de) { 
          $this->db->select('*');
          $this->db->from('company');
          $com=$this->db->get()->result();
          foreach ($com as $company ) { 
            $company = $company->glrap;
          }
          if($company == "ap"){
            $ii=$s++; foreach ($de as $key ) {
            // $amtamt = ($key->ap_pay+$key->ap_vatper)-($key->ap_deduct_retper+$key->ap_redownper+$key->ap_amountdown);
            $this->db->select('count("id_lobill")');
            $this->db->from('bill_lessother');
            $this->db->where('id_bill', $hd->ap_bill_contractno);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
              $amtamt = $key->ap_pay - $key->ap_redownper - $key->ap_deduct_retper - $key->ap_deduct + $key->ap_vatper - $hd->ap_amountdown;
            }else{
              $amtamt = $key->ap_pay - $key->ap_redownper - $key->ap_deduct_retper - $key->ap_deduct + $key->ap_vatper;
            }
              
            } ?>
            <tr>
              <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="VENDER"></td> 
              <td>
                <div class="input-group">                
                  <input type="text" class="form-control" id="acc_no<?=$ii; ?>" readonly="true" name="aps_paccost[]" value="<?php echo $ap_pac; ?>">
                  <span class="input-group-btn" >
                    <button type="button" row="<?=$ii; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?=$ii; ?>"><i class="icon-search4"></i></button>
                  </span>
                </div>
              </td>
              <td><input type="text" id="acc_name<?=$ii; ?>" class="form-control" readonly="true" value="<?php echo  $appacv; ?>"></td>
              <td><input type="text" name="aps_cc[]" class="form-control" readonly="true" value=""></td>
              <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" value="0"></td>
              <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]" id="cr<?php echo $ii; ?>"  value="<?php echo $amtamt; ?>"></td>
            </tr>
        <?php }else{ 
          $ii=$k++; foreach ($de as $key ) {
            // $ven = ($key->ap_pay+$key->ap_vatper)-($key->ap_redownper+$key->ap_amountdown);
            $ven = $key->ap_pay - $key->ap_redownper - $key->ap_deduct + $key->ap_vatper;
            } ?>
            <tr>
              <!-- <td colspan="6">
                <pre>
                <?php var_dump($de); ?>
                </pre>
              </td> -->
              <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="VENDER"></td> 
              <td>
                <div class="input-group">
                  <input type="text" id="acc_no<?=$ii; ?>" class="form-control" readonly="true" name="aps_paccost[]" value="<?php echo $ap_pac; ?>">
                  <span class="input-group-btn" >
                    <button type="button" row="<?=$ii; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?=$ii; ?>"><i class="icon-search4"></i></button>
                  </span>
                </div>
              </td>
              <td><input type="text" id="acc_name<?=$ii; ?>" class="form-control" readonly="true" value="<?php echo  $appacv; ?>"></td>
              <td><input type="text" name="aps_cc[]" class="form-control" readonly="true" value=""></td>
              <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" value="0"></td>
              <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]" id="cr<?php echo $ii; ?>"  value="<?php echo $ven; ?>"></td>
            </tr>         
        <?php } } else{

         $ii=$i++; foreach ($he as $dd ) {
          $amtvat = $dd->ap_pay;
           }  
         ?>
        <tr>
          <td><input type="text" class="form-control" readonly="true" name="gltype[]"  value="VENDER"></td> 
          <td>
            <div class="input-group">
              <input type="text" id="acc_no<?=$ii; ?>" class="form-control " readonly="true" name="aps_paccost[]" value="<?php echo $ap_pac; ?>">
              <span class="input-group-btn" >
                <button type="button" row="<?=$ii; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?=$ii; ?>"><i class="icon-search4"></i></button>
              </span> 
            </div>
          </td>
          <td><input type="text" id="acc_name<?=$ii; ?>" class="form-control" readonly="true" value="<?php echo  $appacv; ?>"></td>
          <td><input type="text" name="aps_cc[]" class="form-control" readonly="true" value=""></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="dr[]" value="0"></td>
          <td><input type="text" class="form-control  text-right" readonly="true" name="cr[]" id="cr<?php echo $ii; ?>"  value="<?php echo $amtvat; ?>"></td>
        </tr>
        <?php } ?>


      <?php if ($de) {  
        foreach ($de as $key ) {
          $toamt = $key->ap_pay+$key->ap_vatper;
        } ?>
        <tfoot>
          <tr>
            <td colspan="4">Total</td>
            <td><input type="text" id="sffumdr" readonly="true" class="form-control text-right" value="<?php echo $toamt; ?>"></td>
            <td><input type="text" id="sffumcr" readonly="true" class="form-control text-right" value="<?php echo $toamt; ?>"></td>
          </tr>
        <tfoot>
      <?php }else{  ?>
        <tfoot>
          <tr>
            <td colspan="4">Total</td>
            <td><input type="text" id="sffumdr" readonly="true" class="form-control text-right"  value="<?php echo $payamt; ?>"></td>
            <td><input type="text" id="sffumcr" readonly="true" class="form-control text-right" value="<?php echo $payamt; ?>"></td>
          </tr>
        </tfoot>
      <?php } ?>
    </tbody>
</table>
<input type="hidden" class="form-control " readonly="true"  id="yvatcode" value="<?php echo $yvat; ?>">
<input type="hidden" class="form-control " readonly="true" id="yvatname" value="<?php echo $yact_name; ?>" >
<input type="hidden" class="form-control " readonly="true" id="deduct" value="<?=$deduct; ?>" >


<div id="accopen" class="modal fade">
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
<!--             <div class="modal-footer">
                <button type="submit" id="save" class="boxmessage btn bg-success">Save</button>
                <a type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</a>
            </div> -->
        </div>
    </div>
  </div>
  <script>
  // $(document).ready(function () {
  var val = $('#deduct').val()*1;
  $(".accopen").click(function(){
  var row = $(this).attr("row");
      $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart2/'+row);
      $("#accopen").modal("show");
  });


    if(val > 0) {
      deduct(val);

    }
  function deduct(val) {
    var trlength = $('#glacc > tr').length+1;
    if( val*1 > 0) {
      let tr = `<tr>
                  <td><input type="text" name="gltype[]" class="form-control" readonly="true" value="DEDUCT" /></td>
                  <td>
                    <div class="input-group">
                      <input type="text" name="aps_paccost[]" class="form-control" id="acc_no${trlength}" readonly="true" />
                      <span class="input-group-btn">
                        <button type="button" row="${trlength}" class="accopen btn btn-info btn-icon" id="deduct_tr">
                          <i class="icon-search4"></i>
                        </button>
                      </span>
                    </div>
                  </td>
                  <td><input type="text" class="form-control" id="acc_name${trlength}" readonly="true" /></td>
                  <td><input type="text" name="aps_cc[]" class="form-control" readonly="true" /></td>
                  <td><input type="text" name="dr[]" class="form-control text-right" readonly="true" value="0" /></td>
                  <td><input type="text" name="cr[]" class="form-control text-right" readonly="true" value="${val}" /></td>
                </tr>`;
      $('#glacc').append(tr);
      // alert('Add row');
    $('#deduct_tr').click(function() {
        let rrow = $(this).attr("row");
          $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
          $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart2/'+rrow);
          $("#accopen").modal("show");
    });
    }
  }    
  // });


</script>
