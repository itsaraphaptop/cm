<style>
.no_border {
  color: #2b2828;
    background-color: rgba(85, 85, 85, 0);
    border: aliceblue;
}
.tright {
  text-align: right;
}
</style>

<?php 
$check_no = substr($no, 0, 4);
 ?>
<table class="table table-bordered table-xxs">
  <thead>
    <tr>
      <th width="5%">System Type</th>
      <th width="10%">Account Code</th>
      <th width="20%">Account Name</th>
      <th width="10%">Dr</th>
      <th width="10%">Cr</th>
    </tr>
  </thead>
  <tbody>
      <input type="hidden" name="check_no" id="check_no" value="<?php echo $check_no; ?>">
      <input type="hidden" name="inv_no" id="inv_no" value="<?php echo $no; ?>">
      <input type="hidden" name="inv_period" id="inv_period" value="<?php echo $period; ?>">
      <?php
       $session_data = $this->session->userdata('sessed_in');
       $username = $session_data['username'];
       $compcode = $session_data['compcode'];
      $syscode = $this->db->query("SELECT * from syscode where sys_code ='$compcode'")->result();
        foreach ($syscode as $sc) {
            $arlt = $sc->ar_arlt;
            $sov = $sc->ar_sov;
            $arcs = $sc->ar_arcs;
            $arr = $sc->ar_arr;
            $ppr = $sc->ar_ppr;
            $ret_sele = $sc->ar_ret_sale;
        }
        $garlt = $this->db->query("SELECT * from account_total where act_code='$arlt' and compcode= '$compcode' ")->result();
        foreach ($garlt as $agr) {
          $narlt =$agr->act_name;
          $carlt =$agr->act_code;
        }
        $gsov = $this->db->query("SELECT * from account_total where act_code='$sov' and compcode= '$compcode' ")->result();
        foreach ($gsov as $as) {
          $nsov =$as->act_name;
          $csov =$as->act_code;
        }
        $garcs = $this->db->query("SELECT * from account_total where act_code='$arcs' and compcode= '$compcode' ")->result();
        foreach ($garcs as $as) {
          $narcs =$as->act_name;
          $carcs =$as->act_code;
        }
        $garr = $this->db->query("SELECT * from account_total where act_code='$arr' and compcode= '$compcode' ")->result();
        foreach ($garr as $as) {
          $narr =$as->act_name;
          $carr =$as->act_code;
        }
        $gprr = $this->db->query("SELECT * from account_total where act_code='$ppr' and compcode= '$compcode' ")->result();
        foreach ($gprr as $as) {
          $nppr =$as->act_name;
          $cppr =$as->act_code;
        }
        $gprr = $this->db->query("SELECT * from account_total where act_code='$ret_sele' and compcode= '$compcode' ")->result();
        foreach ($gprr as $as) {
          $nret_sele =$as->act_name;
          $cret_sele =$as->act_code;
        }
  if ($type == "down") 
  {
       $dr_to =0; $cr_to =0; foreach ($down as $key => $dd) {  ?>
      <tr>
        <td><?php echo $dd->systemname; ?><input type="hidden" value="<?php echo $dd->systemcode; ?>" name="systemcode[]"></td>
        <td><input type="text" class="form-control input-xxs" value="<?php echo $arlt; ?>" id="acc1_code<?= $key ?>" name="inv_ac[]"></td>
        <td>
          <div class="input-group">
            <input type="text" class="form-control input-xxs" id="acc1_name<?= $key ?>"  readonly="readonly" value="<?php echo $narlt; ?>">
            <div class="input-group-btn">
              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc1_code','acc1_name')"><i class="icon-search4"></i></button>
            </div>
          </div>
        </td>
        <td><input readonly type="hidden" name="amt_dr[]" id="amt_dr<?= $key ?>" value="<?php echo $dd->inv_downamt+$dd->inv_vatamt; ?>">
        <?php echo number_format($dd->inv_downamt+$dd->inv_vatamt,2); ?>
        </td>
        <td><input type="hidden" id="amt_cr<?= $key ?>" name="amt_cr[]" value="0.00">
        0.00</td>
      </tr>
      <?php $dr_to=$dr_to+$dd->inv_downamt+$dd->inv_vatamt;
      if ($dd->inv_vatamt != 0) {  ?>
        <tr>
        <td><?php echo $dd->systemname; ?><input type="hidden" value="<?php echo $dd->systemcode; ?>" name="systemcode[]"></td>
        <td>
          <input type="text" class="form-control input-xxs" value="<?php echo $sov; ?>" id="acc2_code<?= $key ?>" name="inv_ac[]">
        </td>
        <td>
          <div class="input-group">
            <input type="text" class="form-control input-xxs" id="acc2_name<?= $key ?>"  readonly="readonly" value="<?php echo $nsov; ?>">
            <div class="input-group-btn">
              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc2_code','acc2_name')"><i class="icon-search4"></i></button>
            </div>
          </div>    
        </td>
        <td ><input type="hidden" name="amt_dr[]" value="0.00">0.00
        </td>
        <td><input   type="hidden" name="amt_cr[]" value="<?php echo $dd->inv_vatamt; ?>">
        <?php echo number_format($dd->inv_vatamt,2); ?></td>
      </tr>
      <?php $cr_to=$cr_to+$dd->inv_vatamt; ?>
      <?php } ?>
      <tr>
        <td><?php echo $dd->systemname; ?><input type="hidden" value="<?php echo $dd->systemcode; ?>" name="systemcode[]"></td>
        <td><input type="text" class="form-control" value="<?php echo $carcs; ?>" id="acc3_code<?= $key ?>" name="inv_ac[]"></td>
        <td>
          <div class="input-group">
            <input type="text" class="form-control input-xxs" id="acc3_name<?= $key ?>"  readonly="readonly" value="<?php echo $narcs; ?>">
            <div class="input-group-btn">
              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc3_code','acc3_name')"><i class="icon-search4"></i></button>
            </div>
          </div> 
          </td>
        <td ><input type="hidden" name="amt_dr[]" value="0.00">0.00</td>
        <td><input type="hidden" name="amt_cr[]" value="<?php echo $dd->inv_downamt; ?>"><?php echo number_format($dd->inv_downamt,2); ?></td>
      </tr>
      <?php $cr_to=$cr_to+$dd->inv_downamt;
    } 
  }elseif ($type == "progress") { 


    $chk = $this->db->query("SELECT glrar from company where compcode = '{$compcode}' ")->result(); 
        foreach ($chk as $key => $chkk) {
              $glrar =$chkk->glrar;
        }

      //if $glrar
        // echo $glrar;
      if ($glrar == "ar") {

        
              $dr_to =0; $cr_to =0; foreach ($pro as $key => $po) { ?>
                <tr>
                      <td>
                        <?php echo $po->systemname; ?>
                        <input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]">
                        <input type="hidden" value="<?php echo $po->systemcode; ?>" name="system_code[]">
                      </td>
                      <td><input type="text" class="form-control" id="acc1_progress_code<?= $key ?>" value="<?php echo $arlt; ?>" name="inv_ac[]"></td>
                      <!-- name -->
                      <td>
                          <div class="input-group">
                            <input type="text" class="form-control input-xxs" id="acc1_progress_name<?= $key ?>" name="" readonly="readonly" value="<?php echo $narlt; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc1_progress_code','acc1_progress_name')"><i class="icon-search4"></i></button>
                            </div>
                          </div>
                        <?php //echo $narlt; ?>
                          

                      </td>
                      
                      <td><input type="hidden" name="amt_dr[]" value="<?php echo (($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance)-$po->inv_lessretention; ?>">
                      <?php echo number_format((($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance)-$po->inv_lessretention,2); ?></td>
                      <td><input type="hidden" name="amt_cr[]" value="0.00">0.00</td>
                </tr>
                <?php $dr_to=$dr_to+(($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance)-$po->inv_lessretention; ?>
                <tr>
                    <td>
                      <?php echo $po->systemname; ?>
                      <input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="acc11_progress_code<?= $key ?>" value="<?php echo $carr; ?>" name="inv_ac[]">
                    </td>
                    <td>
                      <div class="input-group">
                            <input type="text" class="form-control input-xxs" id="acc11_progress_name<?= $key ?>" name="" readonly="readonly" value="<?php echo $narr; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc11_progress_code','acc11_progress_name')"><i class="icon-search4"></i></button>
                            </div>
                          </div>
                    </td>
                  <td>
                    <!-- dr -->
                       <?php echo number_format($po->inv_lessretention,2); ?>
                      <input type="hidden" name="amt_dr[]" value="<?php echo $po->inv_lessretention; ?>">
                      <input type="hidden" name="amt_retention[]" value="<?php echo $po->inv_lessretention; ?>">
                     <!-- dr -->
                  </td>
                   <td>
                    <!-- cr -->
                    0.00
                    <input type="hidden" name="amt_cr[]" value="0.00">
                    <!-- cr -->
                  </td>
                </tr>
            
                <?php $dr_to=$dr_to+$po->inv_lessretention; ?>
                <tr>
                      <td><?php echo $po->systemname; ?><input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]"></td>
                      <td><input type="text" id="acc3_progress_code<?= $key ?>" class="form-control" value="<?php echo $carcs; ?>" name="inv_ac[]"></td>
                      <!-- name -->
                      <td>

                          <div class="input-group">
                            <input type="text" class="form-control input-xxs" id="acc3_progress_name<?= $key ?>" name="" readonly="readonly" value="<?php echo $narcs; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc3_progress_code','acc3_progress_name')"><i class="icon-search4"></i></button>
                            </div>
                          </div>
                        <?php //echo $narcs; ?>
                          
                      </td>
                      <td ><input type="hidden" name="amt_dr[]" value="<?php echo $po->inv_lessadvance; ?>" ><?php echo number_format($po->inv_lessadvance,2); ?></td>
                      <td><input type="hidden" name="amt_cr[]" value="0.00">0.00</td>
                </tr>
                <?php $dr_to=$dr_to+$po->inv_lessadvance; ?>
                <tr>
                  <td><?php echo $po->systemname; ?><input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]"></td>
                      <!-- <td><?php echo $cppr; ?><input type="hidden" value="<?php echo $cppr; ?>" name="inv_ac[]"></td> -->
                      <td>
                       
                          <input type="text" class="form-control" id="acc4_progress_code<?= $key ?>"  name="inv_ac[]" value="<?php echo $cppr; ?>">
                          <!-- <span class="input-group-btn" >
                             <button type="button"  row="<?php echo $po->systemcode; ?>" class="accopen<?php echo $po->systemcode; ?> btn btn-default btn-icon" data-toggle="modal" data-target="#accopen<?php echo $po->systemcode; ?>"><i class="icon-search4"></i></button>
                          </span> -->
                        
                      </td>
                      <!-- name -->
                      <td>
                          <div class="input-group">
                            <input type="text" class="form-control input-xxs" id="acc4_progress_name<?= $key ?>" name="" readonly="readonly" value="<?php echo $nppr; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc4_progress_code','acc4_progress_name')"><i class="icon-search4"></i></button>
                            </div>
                          </div>
                          <!-- <input type="text" class="form-control" readonly="" value="<?php echo $nppr; ?>" id="accountname<?php echo $po->systemcode; ?>"> -->
                      </td>
                      <td ><input type="hidden" name="amt_dr[]" value="0.00">0.00</td>
                      <td><input type="hidden" name="amt_cr[]" value="<?php echo $po->inv_progressamt; ?>"><?php echo number_format($po->inv_progressamt,2); ?></td>
                </tr>
                <?php $cr_to=$cr_to+$po->inv_progressamt; ?>
                <?php if ($po->inv_vatamt != 0) {  ?>
                <tr>
                      <td><?php echo $po->systemname; ?><input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]"></td>
                      <td><input type="text" class="form-control" id="acc5_progress_code<?= $key ?>" value="<?php echo $csov; ?>" name="inv_ac[]"></td>
                      
                      <!-- name -->
                      <td>
                        <?php //echo $nsov; ?>
                           <div class="input-group">
                            <input type="text" class="form-control input-xxs" id="acc5_progress_name<?= $key ?>" name="" readonly="readonly" value="<?php echo $nsov; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc5_progress_code','acc5_progress_name')"><i class="icon-search4"></i></button>
                            </div>
                          </div>
                      </td>
                      <td ><input  type="hidden" name="amt_dr[]" value="0.00">0.00</td>
                      <td><input  type="hidden" name="amt_cr[]" value="<?php echo $po->inv_vatamt; ?>"><?php echo number_format($po->inv_vatamt,2); ?></td>
                </tr>
                <?php $cr_to=$cr_to+$po->inv_vatamt; 
                } ?>
      <?php  } //end for

          }else{
        // else ar

// lottae
        $dr_to =0; $cr_to =0; foreach ($pro as $key => $po) { ?>
            <tr>
                  <td>
                    <?php echo $po->systemname; ?>
                    <input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]">
                    <input type="hidden" value="<?php echo $po->systemcode; ?>" name="system_code[]">
                  </td>
                  <td>
                    <input type="text" id="acc1_progress_code<?= $key ?>" class="form-control" value="<?php echo $arlt; ?>" name="inv_ac[]">
                  </td>
                  <!-- // name -->
                  <td>

                      <div class="input-group">
                        <input type="text" class="form-control input-xxs" id="acc1_progress_name<?= $key ?>" name="" readonly="readonly" value="<?php echo $narlt; ?>">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc1_progress_code','acc1_progress_name')"><i class="icon-search4"></i></button>
                        </div>
                      </div>

                    <?php //echo $narlt; ?>
                    

                  </td>
                  <td>
                    <!-- dr -->
                       <?php echo number_format((($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance),2); ?>
                      <input type="hidden" name="amt_dr[]" value="<?php echo (($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance)-$po->inv_lessretention; ?>">
                     <!-- dr -->
                  </td>
                  <td>
                    <!-- cr -->
                    0.00
                    <input type="hidden" name="amt_cr[]" value="0.00">
                    <!-- cr -->
                  </td>
            </tr>
            <?php $dr_to=$dr_to+(($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance); ?>
      <!-- lottae -->
            <tr>
                  <td><?php echo $po->systemname; ?><input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]"></td>
                  <td><input  type="text" class="form-control" id="acc2_progress_code<?= $key ?>" value="<?php echo $carcs; ?>" name="inv_ac[]"></td>
                  <!-- name -->
                  <td>
                    <div class="input-group">
                        <input type="text" class="form-control input-xxs" id="acc2_progress_code<?= $key ?>"  readonly="readonly" value="<?php echo $narcs; ?>">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc2_progress_code','acc2_progress_name')"><i class="icon-search4"></i></button>
                        </div>
                      </div>
                    <?php //echo $narcs; ?>
                      
                  </td>
                  <td>
                    <input type="hidden" name="amt_dr[]" value="<?php echo $po->inv_lessadvance; ?>" ><?php echo number_format($po->inv_lessadvance,2); ?>
                  </td>
                  <td>0.00
                    <input type="hidden" name="amt_cr[]" value="0.00">
                    <input type="hidden" name="amt_retention[]" value="<?php echo $po->inv_lessretention; ?>">
                  </td>
            </tr>
            <?php $dr_to=$dr_to+$po->inv_lessadvance; ?>
            <tr>
                  <td><?php echo $po->systemname; ?><input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]"></td>
                  <!-- <td><?php echo $cppr; ?><input type="hidden" value="<?php echo $cppr; ?>" name="inv_ac[]"></td> -->
                  <td>
                      <input type="text" id="acc3_progress_code<?= $key ?>" class="form-control" name="inv_ac[]" 
                              id="accno<?php echo $po->systemcode; ?>" value="<?php echo $cppr; ?>">
                  <td><?php //echo $nppr; ?> 

                    <!-- <input type="hidden" class="form-control" readonly="" value="<?php echo $nppr; ?>" id="accountname<?php echo $po->systemcode; ?>"> -->
                    <div class="input-group">
                        <input type="text" class="form-control input-xxs" id="acc3_progress_name<?= $key ?>"  readonly="readonly" value="<?php echo $nppr; ?>">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc3_progress_code','acc3_progress_name')"><i class="icon-search4"></i></button>
                        </div>
                    </div>

                  </td>
                  <td ><input type="hidden" name="amt_dr[]" value="0.00">0.00</td>
                  <td><input type="hidden" name="amt_cr[]" value="<?php echo $po->inv_progressamt; ?>"><?php echo number_format($po->inv_progressamt,2); ?></td>
            </tr>
      <?php $cr_to=$cr_to+$po->inv_progressamt; ?>
      <?php if ($po->inv_vatamt != 0) {  ?>
            <tr>
                  <td><?php echo $po->systemname; ?><input type="hidden" value="<?php echo $po->systemcode; ?>" name="systemcode[]"></td>
                  <td><input id="acc4_progress_code<?= $key ?>"  type="text" class="form-control" value="<?php echo $csov; ?>" name="inv_ac[]"></td>
                  <td>

                   <!--  <?php echo $nsov; ?> -->
                      <div class="input-group">
                        <input type="text" class="form-control input-xxs" id="acc4_progress_name<?= $key ?>"  readonly="readonly" value="<?php echo $nsov; ?>">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc4_progress_code','acc4_progress_name')"><i class="icon-search4"></i></button>
                        </div>
                      </div>

                    </td>
                  <td ><input  type="hidden" name="amt_dr[]" value="0.00">0.00</td>
                  <td><input  type="hidden" name="amt_cr[]" value="<?php echo $po->inv_vatamt; ?>"><?php echo number_format($po->inv_vatamt,2); ?></td>
            </tr>
      <?php $cr_to=$cr_to+$po->inv_vatamt; } ?>
      <?php  }
      }
      ?>
<?php  
    //if $glrar
    }else{
      // this else is retention         
       $dr_to =0; $cr_to =0; foreach ($ren as $key => $ro) { ?>
      <tr>
            <td><?php echo $ro->systemname; ?><input type="hidden" value="<?php echo $ro->systemcode; ?>" name="systemcode[]"></td>
            <td><input type="text" class="form-control" id="acc1_progress_code<?= $key ?>" value="<?php echo $carlt; ?>" name="inv_ac[]"></td>
            <!-- name -->
            <td>
              <?php //echo $narlt; ?>
                <div class="input-group">
                  <input type="text" class="form-control input-xxs" id="acc1_progress_name<?= $key ?>"  readonly="readonly" value="<?php echo $narlt; ?>">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc1_progress_code','acc1_progress_name')"><i class="icon-search4"></i></button>
                  </div>
                </div>
            </td>
            <td ><input  type="hidden" name="amt_dr[]" value="<?php echo $ro->inv_retentionamt; ?>"><?php echo number_format($ro->inv_retentionamt,2); ?></td>
            <td><input type="hidden" name="amt_cr[]" value="0.00">0.00</td>
      </tr>
        <?php $dr_to=$dr_to+$ro->inv_retentionamt; ?>
      <tr>
            <td><?php echo $ro->systemname; ?><input type="hidden" value="<?php echo $ro->systemcode; ?>" name="systemcode[]"></td>
            <td><input type="text" class="form-control" id="acc2_progress_code<?= $key ?>" value="<?php echo $carcs; ?>" name="inv_ac[]"></td>
            <!-- name -->
            <td>
              <?php //echo $narcs; ?> 
                <div class="input-group">
                  <input type="text" class="form-control input-xxs" id="acc2_progress_name<?= $key ?>"  readonly="readonly" value="<?php echo $narcs; ?>">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-info btn-icon" onclick="acc(<?= $key ?>,'acc2_progress_code','acc2_progress_name')"><i class="icon-search4"></i></button>
                  </div>
                </div>
            </td>
            
            <td ><input type="hidden" name="amt_dr[]" value="0.00">0.00</td>
            <td><input type="hidden" name="amt_cr[]" value="<?php echo $ro->inv_retentionamt; ?>"> <?php echo number_format($ro->inv_retentionamt,2); ?></td>
      </tr>
        <?php $cr_to=$cr_to+$ro->inv_retentionamt; ?>
    <?php }  // end for
    
  }//end else  
?>
         
  </tbody>
    <tr>
      <td colspan="3">total</td>
      <td>
        <input type="hidden" value="<?php echo $dr_to; ?>" name="to_dr_to" class="no_border tright"><?php echo number_format($dr_to,2); ?>
      </td>
      <td><input type="hidden" value="<?php echo $cr_to; ?>" name="to_cr_to" class="no_border tright"><?php echo number_format($cr_to,2); ?></td>
    </tr>
</table>


<script type="text/javascript">
  function acc(id,row_id,row_name){
    $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows_name/${id}/${row_id}/${row_name}`);
    $('#myAccount').modal('show');
  }
</script>