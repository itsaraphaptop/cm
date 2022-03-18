<style>
.no_border {
  color: #2b2828;
    background-color: rgba(85, 85, 85, 0);
    border: aliceblue;
    text-align: center;
}
</style>
<div class="table-responsive">
<table class="table table-hover table-bordered table-striped table-xxs">
  <thead>
    <tr>
      <th width="15%" style="text-align: center;">System Type</th>
      <th width="20%" style="text-align: center;">Account Code</th>
      <th width="25%" style="text-align: center;">Account Name</th>
      <th width="20%" style="text-align: center;">Dr</th>
      <th width="25%" style="text-align: center;">Cr</th>
    </tr>
  </thead>
  <tbody>  
<?php  
$chk = $this->db->query("SELECT glrar from company where compcode = '$compcode' ")->result(); 
        foreach ($chk as $key => $chkk) {
         $glrar =$chkk->glrar;
       } 
  $cr =0; $dr=0;foreach ($re as $id => $key) {    

  // $key->vou_type
    if ($key->vou_type == 'trading') {
?>
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?><input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"></td>
    <?php
      $bb = $this->db->query("SELECT * from bank_account where bank_code='$key->vou_bankcode'and branch_code ='$key->vou_branchcode' ")->result();
    foreach ($bb as $bnb) {
      $namek =$bnb->acc_name;
      $ccc =$bnb->acc_code;
    }
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc1_code<?= $id ?>" value="<?php echo $ccc; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc1_name<?= $id ?>"  readonly="readonly" value="<?php echo $namek; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc1_code','acc1_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="dr" value="<?php echo $key->vou_netamt; ?>" name="dr[]"><?php echo number_format($key->vou_netamt,2); ?></td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="cr[]" value="0"><?php echo number_format(0,2); ?></td>
    <?php 
    $dr= $dr+$key->vou_netamt; ?>
  </tr>
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?><input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"> </td>
<?php
    $syscode = $this->db->query("SELECT ar_arlt from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
    $nsyscode = $this->db->query("SELECT act_name from account_total where act_code=$sc->ar_arlt")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc6_code<?= $id ?>" value="<?php echo $sc->ar_arlt; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc6_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc6_code','acc6_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
 <?php
      }
    }
 ?>

    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="dr[]" value="0"><?php echo number_format(0,2); ?></td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="cr" value="<?php echo ($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt+$key->vou_retamt); ?>" name="cr[]"><?php echo number_format(($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt+$key->vou_retamt),2); ?></td>
    <?php   
    $cr= $cr+($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt+$key->vou_retamt);
    ?>
  </tr>
<?php
  }else{
?> 
   <!-- เช็ค -->
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?><input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"></td>
    <?php
      $bb = $this->db->query("SELECT * from bank_account where bank_code='$key->vou_bankcode'and branch_code ='$key->vou_branchcode' ")->result();
    foreach ($bb as $bnb) {
      $namek =$bnb->acc_name;
      $ccc =$bnb->acc_code;
    }
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc1_code<?= $id ?>" value="<?php echo $ccc; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc1_name<?= $id ?>"  readonly="readonly" value="<?php echo $namek; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc1_code','acc1_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="dr" value="<?php echo $key->vou_netamt; ?>" name="dr[]"><?php echo number_format($key->vou_netamt,2); ?></td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="cr[]" value="0"><?php echo number_format(0,2); ?></td>
    <?php 
    $dr= $dr+$key->vou_netamt; ?>
  </tr>
<!-- ปิดเช็ค -->
<!-- ภาษีไม่ครบกำหนด DR -->
<?php if ($key->vou_vatamt != 0) {  ?>
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?> <input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"></td>
    <?php
    $syscode = $this->db->query("SELECT ar_sov from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {   
    $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_sov'  and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) { 
    ?>
    <td style="text-align: center;">
      <input class="form-control" readonly type="text" id="acc2_code<?= $id ?>" value="<?php echo $sc->ar_sov; ?>" name="syscode[]">
    </td>
    <td>
       <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc2_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc2_code','acc2_name')"><i class="icon-search4"></i></button>
        </div>
      </div>    
    </td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="dr" value="<?php echo $key->vou_vatamt; ?>" name="dr[]"><?php echo number_format($key->vou_vatamt,2); ?></td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="cr[]" value="0"><?php echo number_format(0,2); ?></td>
    <?php }  }
    $dr= $dr+$key->vou_vatamt;
     ?>
  </tr>
  <?php } ?>
<!-- ปิดภาษีไม่ครบกำหนด DR -->
<!-- ภาษีเงินได้นิติบุคคลหัก DR -->
<?php if ($key->vou_wtper != 0) {  ?>
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?><input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"> </td>
    <?php
    $syscode = $this->db->query("SELECT ar_wtdsc from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
    $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_wtdsc' and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc3_code<?= $id ?>" value="<?php echo $sc->ar_wtdsc; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc3_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc3_code','acc3_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
        
    </td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="dr" value="<?php echo ($key->vou_downamt-$key->vou_advamt)*$key->vou_wtper/100; ?>" name="dr[]"><?php echo number_format((($key->vou_downamt-$key->vou_advamt)*$key->vou_wtper/100),2); ?></td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="cr[]" value="0"><?php echo number_format(0,2); ?></td>
    <?php }  } 
    $dr= $dr+($key->vou_downamt-$key->vou_advamt)*$key->vou_wtper/100;
    ?>
  </tr>
  <?php } ?>
<!-- ปิดภาษีเงินได้นิติบุคคลหัก DR -->
    <?php
     if ($glrar != "ar") {  ?>
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?> <input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"></td>
    <?php
    $syscode = $this->db->query("SELECT ar_arr from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
   $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_arr' and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc4_code<?= $id ?>" value="<?php echo $sc->ar_arr; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc4_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc4_code','acc4_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
    <!-- lottae -->
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="dr" value="<?php echo ($key->vou_retamt); ?>" name="dr[]"><?php echo number_format($key->vou_retamt,2); ?></td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="cr[]" value="0"><?php echo number_format(0,2); ?></td>
    
    <?php }  }
    $dr= $dr+$key->vou_retamt;
     ?>
  </tr>
  <!-- ลูกหนี้การค้า CR -->

  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?><input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"> </td>
    <?php
    $syscode = $this->db->query("SELECT ar_arlt from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
    $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_arlt' and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc5_code<?= $id ?>" value="<?php echo $sc->ar_arlt; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc5_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc5_code','acc5_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="dr[]" value="0"><?php echo number_format(0,2); ?></td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="cr" value="<?php echo ($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt); ?>" name="cr[]"><?php echo number_format(($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt),2); ?></td>
    <?php }  } 
    $cr= $cr+($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt);
    ?>
  </tr>
  <!-- ปิดลูกหนี้การค้า CR -->
  <?php }else{ 
 // $key->vou_type

  ?>
  <!-- ลูกหนี้การค้า CR -->

  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?><input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"> </td>
  
<?php 

    if ($key->vou_type == "other") {

    $syscode = $this->db->query("SELECT ar_arolt from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
    $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_arolt' and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc6_code<?= $id ?>" value="<?php echo $sc->ar_arolt; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc6_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc6_code','acc6_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
<?php
    }
  }
    }else{
?>
   <?php
    $syscode = $this->db->query("SELECT ar_arlt from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
    $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_arlt' and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc6_code<?= $id ?>" value="<?php echo $sc->ar_arlt; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc6_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc6_code','acc6_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
<?php
    }
  }
}
?>

   
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="dr[]" value="0"><?php echo number_format(0,2); ?></td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="cr" value="<?php echo ($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt+$key->vou_retamt); ?>" name="cr[]"><?php echo number_format(($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt+$key->vou_retamt),2); ?></td>
    <?php   
    $cr= $cr+($key->vou_downamt+$key->vou_vatamt)-($key->vou_advamt+$key->vou_retamt);
    ?>
  </tr>
  <!-- ปิดลูกหนี้การค้า CR -->
 <?php } ?>



  <!-- ภาษีขาย-ปีปัจจุบัน  CR -->
  <?php if ($key->vou_vatamt != 0) {  ?>
  <tr>
    <td style="text-align: center;"><?php echo $key->systemname; ?> <input class="no_border" readonly type="hidden" id="systemcode" value="<?php echo $key->systemcode; ?>" name="systemcode[]"></td>
    <?php
    $syscode = $this->db->query("SELECT ar_ov from syscode where sys_code='$compcode'")->result();
    foreach ($syscode as $sc) {      
   $nsyscode = $this->db->query("SELECT act_name from account_total where act_code='$sc->ar_ov' and compcode='$compcode'")->result();
    foreach ($nsyscode as $nc) {
    ?>
    <td style="text-align: center;"><input class="form-control" readonly type="text" id="acc7_code<?= $id ?>" value="<?php echo $sc->ar_ov; ?>" name="syscode[]"></td>
    <td>
      <div class="input-group">
        <input type="text" class="form-control input-xxs" id="acc7_name<?= $id ?>"  readonly="readonly" value="<?php echo $nc->act_name; ?>">
        <div class="input-group-btn">
          <button type="button" class="btn btn-info btn-icon" onclick="acc('<?= $id ?>','acc7_code','acc7_name')"><i class="icon-search4"></i></button>
        </div>
      </div>
    </td>
    <td style="text-align: right;"><input type="hidden" class="no_border" readonly name="dr[]" value="0"><?php echo number_format(0,2); ?></td>
    <td style="text-align: right;"><input class="no_border" readonly type="hidden" id="cr" value="<?php echo ($key->vou_vatamt); ?>" name="cr[]"><?php echo number_format($key->vou_vatamt,2); ?></td>
    <?php }  }
    $cr= $cr+$key->vou_vatamt;
     ?>
  </tr>
  <?php } ?>
<!-- ปิดภาษีขาย-ปีปัจจุบัน  CR -->
    <?php }  ?>
<?php
    }
?>
  <tr>
       <td colspan="3" ><b>Total</b></td>
       <td style="text-align: right;"><input style="text-align: right;" type="hidden" class="no_border" name="to_dr" value="<?php echo $dr; ?>"> <b><u><?php echo number_format($dr,2); ?></u></b>  </td>
       <td style="text-align: right;"><input style="text-align: right;" type="hidden" class="no_border" name="to_cr" value="<?php echo $cr; ?>">  <b><u><?php echo number_format($cr,2); ?></u></b> 
       </td>
    </tr>
  </tbody>
</table>
</div>



<script type="text/javascript">
  function acc(id,row_id,row_name){
    $("#account_code").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#account_code").load(`<?php echo base_url(); ?>ar/account_code_by_rows_name/${id}/${row_id}/${row_name}`);
    $('#myAccount').modal('show');
  }


  // $("[name='dr[]'][value='0']").parent().parent().remove();
</script>