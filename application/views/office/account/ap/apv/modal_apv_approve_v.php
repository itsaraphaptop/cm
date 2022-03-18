<?php $n=1; foreach ($res as $k) {
$query = $this->db->query("SELECT Sum(apv_detail.apvi_amount) AS amount,Sum(apv_detail.apvi_vattot) AS vattot,Sum(apv_detail.apvi_netamt) AS netmat FROM apv_detail where apv_detail.apvi_ref='$k->apv_code'");
$resi = $query->result();

  ?>
    <tr>
      <td><?php echo $n; ?></td>
      <td>
        <div class="checkbox checkbox-switchery switchery-xs">
         <label>
            <input type="checkbox"  id="a<?php echo $n; ?>"  class="switchery">
            <input type="hidden" name="chki[]" id="chki<?php echo $n;?>">
          </label>
        </div>
      </td>
      <td><?php echo $k->apv_code; ?><input type="hidden" name="apvcodei[]" value="<?php echo  $k->apv_code;?>"></td>
      <td><?php echo $k->apv_pono; ?><input type="hidden" name="ponoi[]" value="<?php echo  $k->apv_pono;?>"></td>
      <td><?php echo $k->apv_date; ?><input type="hidden" name="datei[]" value="<?php echo  $k->apv_date;?>"></td>
      <?php foreach ($resi as $ve) {?>
      <td><?php echo number_format($ve->amount,2); ?></td>
      <td><?php echo number_format($ve->vattot,2); ?></td>
      <td><?php echo number_format($ve->netmat,2); ?><input type="hidden" name="netamti[]" value="<?php echo  $ve->netmat;?>"></th>
      <?php  } ?>

    </tr>
    <script>
      $("#a<?php echo $n; ?>").click(function(){
        if ($("#a<?php echo $n; ?>").prop("checked")) {
            $("#chki<?php echo $n;?>").val("Y");
        }else{
            $("#chki<?php echo $n;?>").val("");
        }

      });
    </script>

    <?php $n++; } ?>

    <script>
    // Initialize multiple switches
   if (Array.prototype.forEach) {
       var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
       elems.forEach(function(html) {
           var switchery = new Switchery(html);
       });
   }
   else {
       var elems = document.querySelectorAll('.switchery');
       for (var i = 0; i < elems.length; i++) {
           var switchery = new Switchery(elems[i]);
       }
   }
    </script>
