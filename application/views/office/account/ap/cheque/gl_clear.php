<table  class="table table-hover table-xxs table-responsive">
  <thead>
    <tr>
      <th width="10%">No.</th>
      <th width="15%">Account Code</th>
      <th width="35%">Account Name</th>
      <th class="text-right">Dr</th>
      <th class="text-right">Cr</th>
    </tr>
  </thead>
  <tbody id="">
    <?php $i=1; $dr = 0; $cr = 0; foreach ($opencl2 as $key) {   
      $this->db->select('*');
      // $this->db->select_sum('ac_dr','ac_drr');
      // $this->db->select_sum('ac_cr','ac_crr');
      $this->db->from('ap_cheque_gl');
      $this->db->where('ac_apcode',$key->api_code);
      $this->db->group_by('ac_syscode');
      $gl = $this->db->get();
      $rgl = $gl->result();
      foreach ($rgl as $gll) {           

        $qevb = $this->db->query("select * from account_total where act_code='$gll->ac_syscode'");
        $rvenb = $qevb->result();
          foreach ($rvenb as $dd) {  }

        $hea = $this->db->query("select * from ap_cheque_header where ap_code='$key->api_code'");
        $header = $hea->result();
          foreach ($header as $header_hv) {  }  

        $this->db->select('*');
        $this->db->from('company');
        $com=$this->db->get()->result();
        foreach ($com as $company ) { 
          $company = $company->glrap;
        }
        if($company == "ap"){
          if ($header_hv->aphold_vat == "hv") { 
            if ($key->api_inv != "") { ?>
              <tr>              
                <td><?php echo $gll->ac_apcode; ?><input type="hidden" name="ac_apcode[]" value="<?=$gll->ac_apcode; ?>"></td>
                <td><?php echo $gll->ac_syscode; ?><input type="hidden" name="ac_syscode[]" value="<?=$gll->ac_syscode; ?>"></td>
                <td><?php echo @$dd->act_name; ?><input type="hidden" name="act_name[]" value="<?=$dd->act_name; ?>"></td>
                <td align="right"><?php echo $gll->ac_dr; ?><input type="hidden" name="ac_drr[]" value="<?=$gll->ac_dr; ?>"></td>
                <td align="right"><?php echo $gll->ac_cr; ?><input type="hidden" name="ac_crr[]" value="<?=$gll->ac_cr; ?>"></td>
              </tr>
              <?php  
            }else{   ?> 
            <tr>              
              <td><?php echo $gll->ac_apcode; ?></td>
              <?php if ($gll->ac_syscode == 1161100) { 
                $this->db->select('*');
                $this->db->from('syscode');
                $query=$this->db->get()->result();
                ?>
                <?php 
                  foreach ($query as $mtt ) { 
                    $yvat =$mtt->pac_taxvat_nodoc;
                    }
               
                $this->db->select('*');
                $this->db->from('account_total');
                $this->db->where('act_code',$yvat);
                $yvatt=$this->db->get()->result();
                ?>
                <?php 
                    foreach ($yvatt as $yyvatt ) { 
                    $act_namee = $yyvatt->act_name;
                    }
                ?>      
              <td><?php echo $yvat; ?></td>
              <?php }else { ?>
              <td><?php echo $gll->ac_syscode; ?></td>
                <?php }
              if($gll->ac_syscode == 1161100){ ?>
                <td><?php echo $act_namee; ?> 555</td>
              <?php }else{ ?>
              <td><?php echo $dd->act_name; ?></td>
              <?php } ?>
              <td align="right"><?php echo $gll->ac_dr; ?></td>
              <td align="right"><?php echo $gll->ac_cr; ?></td>
            </tr>
            <?php }    
          }else{   ?> 
            <tr>              
              <td><?php echo $gll->ac_apcode; ?><input type="hidden" name="ac_apcode[]" value="<?=$gll->ac_apcode; ?>"></td>
              <td><?php echo $gll->ac_syscode; ?><input type="hidden" name="ac_syscode[]" value="<?=$gll->ac_syscode; ?>"></td>
              <td><?php echo @$dd->act_name; ?><input type="hidden" name="act_name[]" value="<?=@$dd->act_name; ?>"></td>
              <td align="right"><?php echo $gll->ac_dr; ?><input type="hidden" name="ac_drr[]" value="<?=$gll->ac_dr; ?>"></td>
              <td align="right"><?php echo $gll->ac_cr; ?><input type="hidden" name="ac_crr[]" value="<?=$gll->ac_cr; ?>"></td>
            </tr>
            <?php 
          } 
        }else{
          if ($header_hv->aphold_vat == "hv") { 
            if ($key->api_inv != "") { ?>
              <tr>              
                <td><?php echo $gll->ac_apcode; ?><input type="hidden" name="ac_apcode[]" value="<?=$gll->ac_apcode; ?>"></td>
                <td><?php echo $gll->ac_syscode; ?><input type="hidden" name="ac_syscode[]" value="<?=$gll->ac_syscode; ?>"></td>
                <td><?php echo @$dd->act_name; ?><input type="hidden" name="act_name[]" value="<?=$dd->act_name; ?>"></td>
                <td align="right"><?php echo $gll->ac_dr; ?><input type="hidden" name="ac_drr[]" value="<?=$gll->ac_dr; ?>"></td>
                <td align="right"><?php echo $gll->ac_cr; ?><input type="hidden" name="ac_crr[]" value="<?=$gll->ac_cr; ?>"></td>
              </tr>
              <?php  
            }else{   ?> 
              <tr>              
                <td><?php echo $gll->ac_apcode; ?></td>
                <?php if ($gll->ac_syscode == 1161100) { 
                  $this->db->select('*');
                  $this->db->from('syscode');
                  $query=$this->db->get()->result();
                  ?>
                  <?php 
                    foreach ($query as $mtt ) { 
                      $yvat =$mtt->pac_taxvat_nodoc;
                      }
                 
                  $this->db->select('*');
                  $this->db->from('account_total');
                  $this->db->where('act_code',$yvat);
                  $yvatt=$this->db->get()->result();
                  ?>
                  <?php 
                      foreach ($yvatt as $yyvatt ) { 
                      $act_namee = $yyvatt->act_name;
                      }
                  ?>      
                <td><?php echo $yvat; ?></td>
                <?php }else { ?>
                <td><?php echo $gll->ac_syscode; ?></td>
                  <?php }
                if($gll->ac_syscode == 1161100){ ?>
                  <td><?php echo $act_namee; ?></td>
                <?php }else{ ?>
                <td><?php echo $dd->act_name; ?></td>
                <?php } ?>
                <td align="right"><?php echo $gll->ac_dr; ?></td>
                <td align="right"><?php echo $gll->ac_cr; ?></td>
              </tr>
              <?php 
            }    
          }else{   ?>             
            <tr>              
              <td><?php echo $gll->ac_apcode; ?><input type="hidden" name="ac_apcode[]" value="<?=$gll->ac_apcode; ?>"></td>
              <td><?php echo $gll->ac_syscode; ?><input type="hidden" name="ac_syscode[]" value="<?=$gll->ac_syscode; ?>"></td>
              <td><?php echo @$dd->act_name; ?><input type="hidden" name="act_name[]" value="<?=@$dd->act_name; ?>"></td>
              <td align="right"><?php echo $gll->ac_dr; ?><input type="hidden" name="ac_drr[]" value="<?=$gll->ac_dr; ?>"></td>
              <td align="right"><?php echo $gll->ac_cr; ?><input type="hidden" name="ac_crr[]" value="<?=$gll->ac_cr; ?>"></td>
            </tr>
            <?php 
          } 
        }  
        $dr=$gll->ac_dr+$dr; $cr=$gll->ac_cr+$cr; 
      } 
    } ?>
      <tr id="addgl" >
        <td><?php echo $gll->ac_apcode; ?><input type="hidden" name="ac_apcode[]" value="<?=$gll->ac_apcode; ?>"></td>
        <td>
          <div class="input-group">
          <input type="text" class="form-control" readonly="true" name="aps_paccost[]" 
          id="acc_no<?php echo $i; ?>" value="">
          <span class="input-group-btn" >
              <button type="button"  row="<?php echo $i; ?>" class="accopen btn btn-info btn-icon" data-toggle="modal" data-target="#accopen<?php echo $i; ?>"><i class="icon-search4"></i></button>
          </span>
          </div>
        </td>
        <td><input type="text" id="acc_name<?php echo $i; ?>" value=""  class="form-control " readonly="true"></td>    
         <td align="right"><input type="text" class="form-control text-right" value="0" id="dr"></td>
        <td align="right"><input type="text" class="form-control text-right" value="0" id="cr"></td> 
      </tr> 
     <!--  <tr>      --> 
<!--       <?php if($key->api_type=="aps"){
        $this->db->select('*');
        $this->db->from('syscode');
        $query=$this->db->get()->result();
          foreach ($query as $mtt ) { 
            $aps_ret =$mtt->pac_vender_retcont;
            $apv_ret =$mtt->pac_ret_apv;
            }
      
        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$aps_ret);
        $aps_reten=$this->db->get()->result();        
          foreach ($aps_reten as $aps_retention ) {          
          }

        $this->db->select('*');
        $this->db->from('account_total');
        $this->db->where('act_code',$apv_ret);
        $apv_reten=$this->db->get()->result();
          foreach ($apv_reten as $apv_retention ) {  
          } 

        $this->db->select('*');
        $this->db->from('aps_header');
        $this->db->where('aps_code',$key->api_no);
        $amt=$this->db->get()->result();
          foreach ($amt as $amt_reten ) { 
            }
        ?>      
        <td><?php echo $gll->ac_apcode; ?></td>
        <td><?php echo $aps_ret; ?></td>
        <td><?php echo $aps_retention->act_name; ?></td>
        <td></td>
        <td align="right"><?php echo $amt_reten->aps_retention; ?></td>
       
      </tr>     
      <?php }else{ ?>

      <?php } ?>  -->
      <tr>              
        <td colspan="3" align="center">Total</td>
        <td align="right"><?php echo $dr; ?></td>
        <td align="right"><?php echo $cr; ?></td>
      </tr>          
  </tbody>
</table>
<a class="insrows btn btn-default btn-xs"><i class="icon-plus22"></i>ADD</a>
    
<script>
  $("#addgl").hide();                   
  $(".insrows").click(function(){
    $("#addgl").show();
    addrow();
  });   

  $("#dr").keyup(function(){
  var dr = $('#dr').val();
  var yvatcode = $('#yvatcode').val();
  var yvatname = $('#yvatname').val();
  $('#ac_no').val(yvatcode);
  $('#acc_name').val(yvatname);
  });
</script> 

<div id="accopen<?php echo $i; ?>" class="modal fade">
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
$("#vchdate").change(function(event) {
  var de_date = $("#vchdate").val();
  var y = de_date.slice(0,4); 
  var m = de_date.slice(5,7);

  $("#glperiod").val(m);
  $("#glyear").val(y);         

  }); 

</script>


<script>
  $(".accopen").click(function(){
      var row = $(this).attr("row");
      
      $('.loadaccchart').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $(".loadaccchart").load('<?php echo base_url(); ?>share/accchart2/'+row);
      $("#accopen").modal("show");
  });
</script>