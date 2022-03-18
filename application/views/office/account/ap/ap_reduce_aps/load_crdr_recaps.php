<?php 
    $this->db->select('*');
    $this->db->from('syscode');
    $rest=$this->db->get()->result();

    foreach ($rest as $pacrest ) { 
      $ap_pac = $pacrest->pac_vender_inmat;
      $novat =$pacrest->pac_taxvat_nodue;
      $yvat =$pacrest->pac_taxvat_due;
      $prcostt =$pacrest->pac_cost_cont;
      $downamt =$pacrest->pac_down_apv;
      $pac_ret_apv =$pacrest->pac_ret_apv;
      $ex =$pacrest->pac_cost_mat;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$ap_pac);
    $appac=$this->db->get()->result();

    foreach ($appac as $ap_pacv ) { 
      $pac_name = $ap_pacv->act_name;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$novat);
    $nvatt=$this->db->get()->result();

    foreach ($nvatt as $svatt ) { 
    $novat_name =$svatt->act_name;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$yvat);
    $yvatt=$this->db->get()->result();

    foreach ($yvatt as $yyvatt ) { 
    $vat_name = $yyvatt->act_name;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$prcostt);
    $pec=$this->db->get()->result();

    foreach ($pec as $pp ) { 
    $pro_name =$pp->act_name;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$downamt);
    $amt=$this->db->get()->result();

    foreach ($amt as $aa ) { 
    $amt_name =$aa->act_name;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$pac_ret_apv);
    $ret=$this->db->get()->result();

      foreach ($ret as $st ) { 
      $ret_name =$st->act_name;
    }

    $this->db->select('*');
    $this->db->from('account_total');
    $this->db->where('act_code',$ex);
    $eex=$this->db->get()->result();

      foreach ($eex as $xx ) {    
      $ex_name =$xx->act_name;
    }

    if ($recaps) { ?>
    <table class="table table-hover table-xxs table-responsive">
      <thead>
        <tr>
          
          <th class="text-center" width="15%">Type</th>
          <th>A/C Code</th>
          <th>A/C Name</th>
          <th>Cost Code</th>
          <th class="text-center">Dr</th>
          <th class="text-center">Cr</th>
        </tr> 
      </thead>
      <tbody id="glacc">   
        <tr>
         <?php $m=1; foreach ($recaps as $apv) {   ?>  
          
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VENDER"></td> 
          <td><input type="text" class="form-control input-sm" readonly="true" name="ac_no[]" value="<?php echo $ap_pac; ?>"></td>
          <td><input type="text" class="form-control input-sm" readonly="true" value="<?php echo  $pac_name; ?>"></td>
          <td><input type="text" class="form-control input-sm" readonly="true" value=""></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="dr[]" value="" id="dr<?php echo $m; ?>" ></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="cr[]" id="cra" value="0" ></td>
        </tr>
        <?php $m++;  }
           $n=$m++;
          if ($apv->aps_invno=="") {
            if ($apv->aps_vatper !=0) {
          ?>
            <input type="hidden" class="form-control input-sm" readonly="true"  id="novatcode" value="<?php echo $novat; ?>">
            <input type="hidden" class="form-control input-sm" readonly="true" id="novatname" value="<?php echo $novat_name; ?>" >
            <input type="hidden" class="form-control input-sm" readonly="true"  id="yvatcode" value="<?php echo $yvat; ?>">
            <input type="hidden" class="form-control input-sm" readonly="true" id="yvatname" value="<?php echo $vat_name; ?>" >
            <tr>
              
              <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VAT"></td>              
              <td><input type="text" class="form-control input-sm" readonly="true"  name="ac_no[]" id="ac_no" value="<?php echo $novat; ?>"></td>
              <td><input type="text" readonly="true" class="form-control input-sm" id="acc_name" value="<?php echo $novat_name; ?>"></td>
              <td><input type="text" class="form-control input-sm" readonly="true" value=""></td>
              <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="dr[]" 
              id="dr" value="0">
              </td>
              <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="cr[]"
              id="crv"  value="0"></td>
            </tr>
          <?php }
            } else{
        ?>
        <tr>
         
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VAT"></td>          
          <td><input type="text" class="form-control input-sm" readonly="true" name="ac_no[]" value="<?php echo $yvat; ?>"></td>
          <td><input type="text"  readonly="true" class="form-control input-sm" value="<?php echo $vat_name; ?>"></td>
          <td><input type="text"  class="form-control input-sm" readonly="true" value=""></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="dr[]" 
          id="dr" value="0">
          </td> 
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="cr[]"
          id="crv"  value="0"></td>
        </tr>
        <?php } $n++;
        for ($i=3; $i < 4; $i++) { ?>
        
        <tr>         
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="AMOUNT"></td> 
          <td>
            <div class="input-group">
              <input type="text" class="form-control" readonly="true" name="aps_paccost[]" 
                id="acc_no<?php echo $i; ?>" value="<?php echo $ex; ?>">
              <span class="input-group-btn" >
                 <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <td><input type="text" id="acc_name<?php echo $i; ?>" value="<?php echo $ex_name; ?>"  class="form-control " readonly="true"></td> 
            
          <!-- <td><input type="text" class="form-control input-sm" readonly="true" name="ac_no[]" value="<?php echo  $ex; ?>"></td>
          <td><input type="text" readonly="true" class="form-control input-sm" value="<?php echo $ex_name; ?>"></td> -->
          <td><input type="text" name="costcode[]" readonly="true" class="form-control input-sm" value="<?php echo $apv->apsi_costcode; ?>"></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="dr[]" 
          id="dr" value="0">
          </td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="cr[]"
          id="crven"  value="0"></td>
        </tr>
        <?php }   ?>
      </tbody>
    </table>
  <?php  }else{ ?>
    <table class="table table-hover table-xxs table-responsive">
      <thead>
        <tr>
          
          <th class="text-center" width="15%">Type</th>
          <th>A/C Code</th>
          <th>A/C Name</th>
          <th>Cost Code</th>
          <th class="text-center">Dr</th>
          <th class="text-center">Cr</th>
        </tr> 
      </thead>
      <tbody id="glacc">   
        <tr>
         <?php $m=1; foreach ($recaps2 as $apv) {   ?>  
         <script>
      $("#pill3").hide();
    </script>
         
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VENDER"></td> 
          <td><input type="text" class="form-control input-sm" readonly="true" name="ac_no[]" value="<?php echo $ap_pac; ?>"></td>
          <td><input type="text" class="form-control input-sm" readonly="true" value="<?php echo  $pac_name; ?>"></td>
          <td><input type="text" class="form-control input-sm" value="" readonly="true"></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="dr[]" value="" id="dr<?php echo $m; ?>" ></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="cr[]" id="cra" value="0" ></td>
        </tr>
        <?php $m++;  }
           $n=$m++; ?>

        
        <tr>
          
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="AMOUNT"></td> 
          <td><input type="text" class="form-control input-sm" readonly="true" name="ac_no[]" value="<?php echo  $ex; ?>"></td>
          <td><input type="text" readonly="true" class="form-control input-sm" value="<?php echo $ex_name; ?>"></td>
          <td><input type="text" readonly="true" class="form-control input-sm" value=""></td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="dr[]" 
          id="dr" value="0">
          </td>
          <td><input type="text" class="form-control input-sm text-right" readonly="ture" name="cr[]"
          id="crven"  value="0"></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>  
    
      </tbody>
    </table>