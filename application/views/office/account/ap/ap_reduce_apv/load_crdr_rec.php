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


  if ($type == "apv") {
    $this->db->select('*');
    $this->db->from('apv_header');
    $this->db->join('project', 'project.project_id = apv_header.apv_project','left outer'); 
    $this->db->join('vender', 'vender.vender_code = apv_header.apv_vender','left outer'); 
    $this->db->join('apv_detail', 'apv_detail.apvi_ref = apv_header.apv_code'); 
    $this->db->group_by('apvi_ref');
    $this->db->where('apv_code',$pono);
    $this->db->where('apv_type',$type);
    $query = $this->db->get();
    $res = $query->result();
    
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
                
        <?php $m=1; foreach ($res as $apv) {   ?>
         
        <tr>
         
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VENDER"></td> 
          <!-- <td><input type="text" class="form-control" name="ac_no[]" value="<?php echo $ap_pac; ?>"></td> -->
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" id="acc_no<?php echo $m; ?>" value="<?php echo $ap_pac; ?>" readonly="ture">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $m; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $m; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <td><input type="text" class="form-control" id="acc_name<?php echo $m; ?>" readonly="true" value="<?php echo  $pac_name; ?>"></td>
          <td><input type="text" name="costcode[]" class="form-control" readonly="true" ></td>
          <td><input type="text" class="form-control text-right" readonly="ture" name="dr[]" value="0" id="vender_dr<?=$m; ?>" ></td>
          <td><input type="text" class="form-control text-right" readonly="ture" name="cr[]" id="vender_cr<?=$m; ?>" value="0" ></td>
        </tr>
        <?php $m++;  ?>
               
              
            
        <?php $n=$m++;?>
        <?php 
          if ($apv->apv_inv=="") {
            if ($apv->apv_vatper !=0) {
          ?>
          <input type="hidden" class="form-control" readonly="true"  id="novatcode" value="<?php echo $novat; ?>">
            <input type="hidden" class="form-control" readonly="true" id="novatname" value="<?php echo $novat_name; ?>" >
            <input type="hidden" class="form-control" readonly="true"  id="yvatcode" value="<?php echo $yvat; ?>">
            <input type="hidden" class="form-control" readonly="true" id="yvatname" value="<?php echo $vat_name; ?>" >
            <tr>
              
              <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VAT"></td> 
             
              <td>
                <div class="input-group">
                  <input type="text" class="form-control" readonly="ture" name="ac_no[]" id="acc_no<?=$n;?>" value="<?php echo $novat; ?>">
                  <span class="input-group-btn" >
                    <button type="button"  row="<?php echo $n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button>
                  </span>
                </div>
              </td>
              <td><input type="text" readonly="true" class="form-control" id="acc_name<?=$n;?>" value="<?php echo $novat_name; ?>"></td>
              <td><input type="text" name="costcode[]" class="form-control" readonly="ture" value=""></td>
              <td><input type="text" class="form-control text-right" readonly="ture" id="vat_dr<?=$n;?>" name="dr[]" value="0">
              </td>
              <td><input type="text" class="form-control text-right" readonly="ture" id="vat_cr<?=$n;?>" name="cr[]" value="0"></td>
            </tr>
          <?php
            }
        }else{
        ?>
        <tr>
          
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VAT"></td> 
         
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" readonly="ture" id="acc_no<?=$n;?>" value="<?php echo $yvat; ?>">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button>
              </span>  
            </div>
          </td>
          <td><input type="text"  readonly="true" class="form-control" id="acc_name<?=$n;?>" value="<?php echo $vat_name; ?>"></td>
          <td><input type="text" name="costcode[]"  class="form-control" readonly="ture" value=""></td>
          <td><input type="text" class="form-control text-right" readonly="ture" id="vat_dr<?=$n;?>" name="dr[]" value="0">
          </td> 
          <td><input type="text" class="form-control text-right" readonly="ture" id="vat_cr<?=$n;?>" name="cr[]" value="0"></td>
        </tr>
        <?php } $n++;  ?>

        <?php for ($i=3; $i < 4; $i++) { ?>
        
        <tr>
        
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="AMOUNT"></td> 
          <td>
            <div class="input-group">
              <input type="text" class="form-control" readonly="ture" name="ac_no[]" id="acc_no<?=$i;?>" value="<?php echo  $ex; ?>">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
              </span>  
            </div>
          </td>
          <td><input type="text" readonly="true" class="form-control" id="acc_name<?=$i;?>" value="<?php echo $ex_name; ?>"></td>
          <td><input type="text" name="costcode[]" readonly="true" class="form-control" value="<?php echo $apv->apvi_costcode; ?>"></td>
          <td><input type="text" class="form-control text-right" readonly="ture" id="amt_dr<?=$i;?>" name="dr[]" value="0">
          </td>
          <td><input type="text" class="form-control text-right" readonly="ture" id="amt_cr<?=$i;?>" name="cr[]" value="0"></td>
        </tr>
        <?php }   ?>
      </tbody>
    </table>
    <?php
    }
  }elseif ($type == "apd") {
    $this->db->select('*');
    $this->db->from('ap_down_header');
    $this->db->join('project', 'project.project_id = ap_down_header.apd_project');
    $this->db->join('ap_down_detail', 'ap_down_detail.apdi_ref = ap_down_header.apd_code'); 
    $this->db->group_by('apdi_ref'); 
    $this->db->where('apd_code',$pono);
    $this->db->where('apd_type',$type);
    $query = $this->db->get();
    $res = $query->result();
      foreach ($res as $apd) {
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
        
        <?php $m=1;?>
         
        <tr>
          
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VENDER"></td> 
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" id="acc_no<?php echo $m; ?>" value="<?php echo $ap_pac; ?>" readonly="ture">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $m; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $m; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <!-- <td><input type="text" class="form-control" readonly="ture" name="ac_no[]" id="ac_no<?php echo $m; ?>" value="<?php echo $ap_pac; ?>"></td> -->
           <td><input type="text" class="form-control" id="acc_name<?php echo $m; ?>" readonly="true" value="<?php echo  $pac_name; ?>"></td>
          <td><input type="text" class="form-control" name="costcode[]"  readonly="true"></td>
          <td><input type="text" class="form-control text-right" readonly="ture" name="dr[]" value="0" id="verder_dr<?=$m;?>" ></td>
          <td><input type="text" class="form-control text-right" readonly="ture" name="cr[]" id="verder_cr<?=$m;?>" value="0" ></td>
        </tr>
        <?php $m++;  ?>           
            
        <?php $n=$m++;?>
        <?php 
          if ($apd->apd_tax_no=="") {
            if ($apd->apd_vat != 0) {
            ?>
            <tr>
              <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VAT"></td>
              <td>
                <div class="input-group">
                  <input type="text" class="form-control" readonly="ture" name="ac_no[]" id="acc_no<?=$n;?>" value="<?php echo $novat; ?>">
                  <span class="input-group-btn" >
                    <button type="button"  row="<?php echo $n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button>
                  </span>
                </div>
              </td>
              <td><input type="text" readonly="true" class="form-control" id="acc_name<?=$n;?>" value="<?php echo $novat_name; ?>"></td>
              <td><input type="text" name="costcode[]" class="form-control" readonly="ture" value=""></td>
              <td><input type="text" class="form-control text-right" readonly="ture" id="vat_dr<?=$n;?>" name="dr[]" value="0">
              </td>
              <td><input type="text" class="form-control text-right" readonly="ture" id="vat_cr<?=$n;?>" name="cr[]" value="0"></td>
            </tr>
            <?php
            }
         }else{
        ?>
            <tr>
             
              <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="VAT"></td> 
              <td>
                <div class="input-group">
                  <input type="text" class="form-control" readonly="ture" name="ac_no[]" id="acc_no<?=$n;?>" value="<?php echo $yvat; ?>">
                  <span class="input-group-btn" >
                    <button type="button"  row="<?php echo $n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button>
                  </span>        
                </div>
              </td>
              <td><input type="text" readonly="true" class="form-control" id="acc_name<?=$n;?>" value="<?php echo $vat_name; ?>"></td>
              <td><input type="text" name="costcode[]" class="form-control" readonly="ture" value=""></td>
              <td><input type="text" class="form-control text-right" readonly="ture" name="dr[]" id="vat_dr<?=$n;?>" value="0">
              </td>
              <td><input type="text" class="form-control text-right" readonly="ture" name="cr[]" id="vat_cr<?=$n;?>" value="0"></td>
            </tr>
        <?php } $n++;  ?>

        <?php for ($i=3; $i < 4; $i++) { ?>
        
        <tr>
          
          <td><input type="text" class="form-control" readonly="true" name="cntype[]" value="AMOUNT"></td> 
          <td>
            <div class="input-group">
              <input type="text" class="form-control" readonly="ture" name="ac_no[]" id="acc_no<?php echo $i; ?>" value="<?php echo $downamt; ?>">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
              </span>           
            </div>
          </td>
          <td><input type="text" class="form-control" readonly="true" id="acc_name<?=$i;?>" value="<?php echo $amt_name; ?>" ></td>
          <td><input type="text" name="costcode[]" readonly="true" class="form-control" value="<?php echo $apd->apdi_costcode ?>"></td>
          <td><input type="text" class="form-control text-right" readonly="ture" id="amt_dr<?=$i;?>" name="dr[]" value="0">
          </td>
          <td><input type="text" class="form-control text-right" readonly="ture" id="amt_cr<?=$i;?>" name="cr[]" value="0"></td>
        </tr>
        <?php }   ?>
      </tbody>
    </table>
    <?php
    }
  }else{
    $this->db->select('*');
    $this->db->from('ap_ret_header');
    $this->db->join('project', 'project.project_id = ap_ret_header.apr_project');  
    $this->db->where('apr_code',$pono);
    $this->db->where('apr_type',$type);
    $query = $this->db->get();
    $res = $query->result();
      foreach ($res as $apr) { ?>

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
                
        <?php $m=1; ?>
         
        <tr>
          
           <td><input type="text" class="form-control" name="cntype[]" readonly="ture" value="VENDER"></td> 
          
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" id="acc_no<?php echo $m; ?>" value="<?php echo $ap_pac; ?>" readonly="ture">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $m; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $m; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <!-- <td><input type="text" class="form-control" readonly="ture" name="ac_no[]" id="ac_no<?php echo $m; ?>" value="<?php echo $ap_pac; ?>"></td> -->
           <td><input type="text" class="form-control" id="acc_name<?php echo $m; ?>" readonly="true" value="<?php echo  $pac_name; ?>"></td>
          <td><input type="text" name="costcode[]" class="form-control" readonly="ture" ></td>
          <td><input type="text" class="form-control text-right" name="dr[]" readonly="ture" value="0" id="vender_dr<?=$m;?>" ></td>
          <td><input type="text" class="form-control text-right" name="cr[]" readonly="ture" id="vender_cr<?=$m;?>" value="0" ></td>
        </tr>
        <?php $m++;  ?>
  
        <?php $n=$m++; ?>
        <?php 
          if ($apr->apr_tax_no==0) {
            if ($apr->apr_vat !=0) {
        ?>
        <tr>
          
          <td><input type="text" class="form-control" name="cntype[]" readonly="ture" value="VAT"></td>                  
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" id="acc_no<?=$n;?>" value="<?php echo $novat; ?>">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <td><input type="text" readonly="true" class="form-control" id="acc_name<?=$n;?>" value="<?php echo $novat_name; ?>"></td>
          <td><input type="text" class="form-control" value=""></td>
          <td><input type="text" name="costcode[]" class="form-control text-right" name="dr[]" readonly="ture" value="0" id="vat_dr<?=$n;?>"></td>
          <td><input type="text" class="form-control text-right" name="cr[]" readonly="ture" value="0" id="vat_cr<?=$n;?>"></td>
        </tr>
        <?php } }else{
        ?>
        <tr>
          
          <td><input type="text" class="form-control" name="cntype[]" readonly="ture" value="VAT"></td> 
         
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" id="acc_no<?=$n;?>" value="<?php echo $yvat; ?>">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $n; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $n; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <td><input type="text" class="form-control" id="acc_name<?=$n;?>" value="<?php echo $vat_namee; ?>"></td>
          <td><input type="text" name="costcode[]" class="form-control" value=""></td>
          <td><input type="text" class="form-control text-right" name="dr[]" id="vat_dr<?=$n;?>" readonly="ture" value="0">
          </td> 
          <td><input type="text" class="form-control text-right" name="cr[]" id="vat_cr<?=$n;?>" readonly="ture" value="0"></td>
        </tr>
        <?php } $n++;  ?>

        <?php for ($i=3; $i < 4; $i++) { ?>
            
        <tr>
          
          <td><input type="text" class="form-control" name="cntype[]" readonly="ture" value="AMOUNT"> </td>
          <td>
            <div class="input-group">
              <input type="text" class="form-control" name="ac_no[]" id="acc_no<?=$i; ?>" value="<?php echo $pac_ret_apv; ?>">
              <span class="input-group-btn" >
                <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
              </span>
            </div>
          </td>
          <td><input type="text" class="form-control" readonly="true" id="acc_name<?=$i;?>"  value="<?php echo $ret_name; ?>" ></td>
          <td><input type="text" name="costcode[]" readonly="true" class="form-control" value=""></td>
          <td><input type="text" class="form-control text-right" name="dr[]" readonly="ture" id="amt_dr<?=$i;?>" value="0">
          </td>
          <td><input type="text" class="form-control text-right" name="cr[]" readonly="ture" id="amt_cr<?=$i;?>" value="0"></td>
        </tr>
        <?php }   ?>
      </tbody>
    </table>
    <?php
    }
  }
 ?>
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