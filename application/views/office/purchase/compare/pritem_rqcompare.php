<table class="table table-bordered table-striped table-hover table-xxs">
  <thead>
    <tr>
      <th>Material Code</th>
      <th>Material Name</th>
      <th>Qty</th>
      <th>Unit </th>
      <th>Price </th>
      <th>remark</th>
      <th>Active</th>
    </tr>
  </thead>
  <tbody  class="pritem">
  <?php $n=1; $sumtotalgrand =0; foreach ($res as $e) {?>
    <tr>
      <td width="10%"><?php echo $e->pri_matcode; ?>
        <input type="hidden" id="matcode<?php echo $e->pri_id;?>" value="<?php echo $e->pri_matcode; ?>" name="matcode[]">
        <input type="hidden" value="<?php echo$e->pri_id; ?>" name="pri_id[]">
      </td>
      <td  width="20%"><?php echo $e->pri_matname; ?>
        <input type="hidden" id="pri_matname<?php echo $e->pri_id;?>" value="<?php echo $e->pri_matname; ?>" name="pri_matname[]">
      </td>
      <td width="5%"><?php echo $e->pri_qty; ?>
        <input type="hidden" id="pri_qty<?php echo $e->pri_id;?>" value="<?php echo $e->pri_qty; ?>" name="pri_qty[]">
      </td>
      <td width="5%">
        <?php echo $e->pri_unit; ?>
        <input type="hidden" id="prii_unit<?php echo $e->pri_id;?>" value="<?php echo $e->pri_unit; ?>" name="prii_unit[]">
      </td>
      <td width="15%">
        <?php echo $e->pri_priceunit; ?>
        <input type="hidden" id="priceunit<?php echo $e->pri_id;?>" value="<?php echo $e->pri_priceunit; ?>" name="priceunit[]">
      </td>
      <td>
        <?php echo $e->pri_remark; ?>
        <input type="hidden" id="remark<?php echo $e->pri_id;?>" value="<?php echo $e->pri_remark; ?>" name="remark[]">
      </td>
      <td><a id="delete<?php echo $n; ?>" onclick="delete_row(<?php echo $n; ?>,$(this),<?php echo $n; ?>)" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></td>
    </tr>
    <script>
      $("#priceunit<?php echo $e->pri_id;?>").on('change',function(){
        var priceunit =  parseFloat($("#priceunit<?php echo $e->pri_id;?>").val().replace(/,/g, ""));
        var qty =  parseFloat($("#pri_qty<?php echo $e->pri_id;?>").val().replace(/,/g, ""));
        var disc = parseFloat($("#disc<?php echo $e->pri_id;?>").val().replace(/,/g, ""));
        var amt = (priceunit*qty);
        var sumdisc = (amt*disc)/100;
        var sum = amt-sumdisc;
        $("#amount<?php echo $e->pri_id;?>").val(numberWithCommas(sum.toFixed(2)));
        sumamt();
        
      });
      
      $("#disc<?php echo $e->pri_id;?>").on('change',function(){
        var priceunit =  parseFloat($("#priceunit<?php echo $e->pri_id;?>").val().replace(/,/g, ""));
        var qty =  parseFloat($("#pri_qty<?php echo $e->pri_id;?>").val().replace(/,/g, ""));
        var disc = parseFloat($("#disc<?php echo $e->pri_id;?>").val().replace(/,/g, ""));
        var amt = (priceunit*qty);
        var sumdisc = (amt*disc)/100;
        var sum = amt-sumdisc;
        $("#amount<?php echo $e->pri_id;?>").val(numberWithCommas(sum.toFixed(2)));
        sumamt();
      });
      function sumamt(){
        var sum = 0;
                $(".sumamt").each(function() {
                    //add only if the value is number
                    if (!isNaN($(this).val().replace(/,/g, "")) && $(this).val().replace(/,/g, "").length != 0) {
                        sum += parseFloat($(this).val().replace(/,/g, ""));
                        $(this).css("background-color", "#FEFFB0");
                        console.log(sum);
                    }
                });

                $("input#sums").val(numberWithCommas(sum.toFixed(2)));
      }
    </script>
    <?php 
      $n++;  $sumtotalgrand = $sumtotalgrand+$e->pri_amount;
    } ?>
   
  </tbody>
</table>

<script>
  $("#saveh").on('click',function(){
    addrowcompare();
    
  });
  function addrowcompare(){
    var frm = $('#savepost');
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
              $(".comparebtn").show();
      }
    });
    ev.preventDefault();
    });
  $("#savepost").submit(); //Submit  the FORM
  }
</script>
 