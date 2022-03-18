<table class="table table-bordered table-striped table-hover table-xxs">
  <thead>
    <tr>
      <th class="text-center">Material Code</th>
      <th class="text-center">Material Name</th>
      <th class="text-center">Qty</th>
      <th class="text-center">Unit </th>
      <th class="text-center">Price </th>
      <th class="text-center">Disc (%)</th>
      <th class="text-center">Cr (Day)</th>
      <th class="text-center">Amount</th>
      <th class="text-center">Remark</th>
      <th class="text-center">Active</th>
    </tr>
  </thead>
  <tbody  class="pritem">
    <tr>
      <td colspan='10'>
        <h3><?php echo $vender[0]['vender_name'];?></h3>
      </td>
    </tr>
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
        <input type="text" class="form-control input-sm text-right" id="priceunit<?php echo $e->pri_id;?>" value="<?php echo number_format($e->pri_priceunit,2); ?>" name="priceunit[]"  onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'">
      </td>
      <td width="10%">
        <div class="input-group">
          <input type="text" class="form-control input-sm text-right" id="disc<?php echo $e->pri_id;?>" value="<?php echo $e->pri_disc; ?>" name="disc[]"  onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'">
            <span class="input-group-addon">%</span>
        </div>
      </td>
      <td width="10%">
        <input type="text" class="form-control input-sm text-center" id="cr<?php echo $e->pri_id;?>" value="<?php echo $e->pri_cr; ?>" name="cr[]">
      </td>
      <td width="10%">
        <input type="text" class="form-control input-sm text-right sumamt" readonly id="amount<?php echo $e->pri_id;?>" value="<?php echo $e->pri_amount; ?>" name="amount[]"  onchange="format(this)" onblur="if(this.value.indexOf('.')==-1)this.value=this.value+'.00'" value=".00">
      </td>
      <td>
        <input type="text" class="form-control input-sm" id="remark<?php echo $e->pri_id;?>" value="<?php echo $e->pri_remark; ?>" name="remark[]" >
      </td>
      <td><a id="delete<?php echo $n; ?>" onclick="delete_row(<?php echo $n; ?>,$(this),<?php echo $n; ?>)" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></td>
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
    </tr>
    <?php $n++;  $sumtotalgrand = $sumtotalgrand+$e->pri_amount; } ?>
    <tr>
      <td colspan="7"></td>
      <td><input type="text" class="form-control text-right" id="sums" value="<?php echo number_format($sumtotalgrand,2);?>" readonly></td>
      <td colspan="2"></td>
    </tr>
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
 