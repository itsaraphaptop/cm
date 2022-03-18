<div class="table-responsive" id="">
    <table class="table table-hover table-bordered table-striped table-xxs">
        <thead>
            <tr >
<?php
$syscode = $this->db->query("SELECT * from syscode")->result();
        foreach ($syscode as $sc) {
            $arlt = $sc->ar_arlt;
            $sov = $sc->ar_sov;
            $arcs = $sc->ar_arcs;
            $arr = $sc->ar_arr;
            $ppr = $sc->ar_ppr;
        }
        $garlt = $this->db->query("SELECT * from account_total where act_code='$arlt' ")->result();
        foreach ($garlt as $agr) {
          $narlt =$agr->act_name;
          $carlt =$agr->act_code;
        }
        $gsov = $this->db->query("SELECT * from account_total where act_code='$sov' ")->result();
        foreach ($gsov as $as) {
          $nsov =$as->act_name;
          $csov =$as->act_code;
        }
        $garcs = $this->db->query("SELECT * from account_total where act_code='$arcs' ")->result();
        foreach ($garcs as $as) {
          $narcs =$as->act_name;
          $carcs =$as->act_code;
        }
        $garr = $this->db->query("SELECT * from account_total where act_code='$arr' ")->result();
        foreach ($garr as $as) {
          $narr =$as->act_name;
          $carr =$as->act_code;
        }
        $gprr = $this->db->query("SELECT * from account_total where act_code='$ppr' ")->result();
        foreach ($gprr as $as) {
          $nppr =$as->act_name;
          $cppr =$as->act_code;
        }
if ($type == 'down'){
foreach ($down as $key) { ?>
      <tr>
        <td><input type="text" value="<?php echo $key->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $arlt; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="0.00"></td>
        <td><input type="text" name="amt_cr[]" id="amt_cr" value="<?php echo $key->inv_downamt+$key->inv_vatamt; ?>"></td>
      </tr>
      <?php 
      if ($key->inv_vatamt != 0) {  ?>
        <tr>
        <td><input type="text" value="<?php echo $key->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $sov; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="<?php echo $key->inv_vatamt; ?>"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="0.00"></td>
        
      </tr>
        <?php   } ?>
        <tr>
        <td><input type="text" value="<?php echo $key->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $carcs; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="<?php echo $key->inv_downamt; ?>"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="0.00"></td>
        
      </tr>
       <?php } } ?>
<?php
if ($type == 'progress'){
    foreach ($pro as $po ) { ?>
            <tr>
        <td><input type="text" value="<?php echo $po->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $arlt; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="0.00"></td>
        <td><input type="text" name="amt_cr[]" id="amt_cr" value="<?php echo ((($po->inv_progressamt+$po->inv_vatamt)-$po->inv_lessadvance)-$po->inv_lessretention); ?>"></td>
      </tr>
      <tr>
        <td><input type="text" value="<?php echo $po->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $carr; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="0.00"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="<?php echo ($po->inv_lessretention); ?>"></td>
        
      </tr>
      <tr>
        <td><input type="text" value="<?php echo $po->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $carcs; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="0.00"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="<?php echo ($po->inv_lessadvance); ?>"></td>
        
      </tr>
      <tr>
        <td><input type="text" value="<?php echo $po->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $cppr; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="<?php echo ($po->inv_progressamt); ?>"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="0.00"></td>
        
      </tr>
      <?php if ($po->inv_vatamt != 0) {  ?>
      <tr>
        <td><input type="text" value="<?php echo $po->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $csov; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="<?php echo ($po->inv_vatamt); ?>"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="0.00"></td>
        
      </tr>
      <?php } 

    }
}
if ($type == 'retention'){
    $no=1;
    foreach ($ren as $ro ) {
        ?>
       <tr>
        <td><input type="text" value="<?php echo $ro->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $carlt; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="0.00"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="<?php echo ($ro->inv_retentionamt); ?>"></td>
        
      </tr>
      <tr>
        <td><input type="text" value="<?php echo $ro->inv_system; ?>" name="systemcode[]"></td>
        <td><input type="text" value="<?php echo $carcs; ?>" name="inv_ac[]"></td>
        <td><input type="text" id="amt_dr" name="amt_dr[]" value="<?php echo ($ro->inv_retentionamt); ?>"></td>
        <td ><input type="text" name="amt_cr[]" id="amt_cr" value="0.00"></td>
        
      </tr>
      <?php }  }?>
</thead>

</table>