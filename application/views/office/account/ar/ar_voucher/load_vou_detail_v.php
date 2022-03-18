<div class="table table-responsive">
<table class="table table-xxs">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center" width="30%">Description</th>
            <th class="text-center">Amount</th>
            <th class="text-center">VAT</th>
            <th class="text-center">Before W/T</th>
            <th class="text-center">Less W/T</th>
            <th class="text-center">Net Amount</th>
          </tr>
        </thead>
        <tbody id="body">
          <?php $i=1; $tot=0; foreach ($de_r as $value) { ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><input type="text" class="form-control input-sm" name="descrepi[]" value="<?php echo $value->vou_desc; ?>"></td>
            <td><input type="text" class="form-control input-sm text-right" name="downamti[]" id="downamti<?php echo $i; ?>" value="<?php echo $value->vou_downamt; ?>"></td>
            <td><input type="text" class="form-control input-sm text-center" name="vati[]" id="vati<?php echo $i; ?>" value="<?php echo $value->vou_vatamt; ?>"></td>
            <td><input type="text" class="form-control input-sm text-right" name="beforewti[]" id="beforewti<?php echo $i; ?>" value="<?php echo $value->vou_beforewt; ?>"></td>
            <td><input type="text" class="form-control input-sm text-right" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="<?php echo $value->vou_lesswt; ?>"></td>
            <td><input type="text" class="form-control input-sm text-right" name="netamti[]" id="netamti<?php echo $i; ?>" value="<?php echo $value->vou_netamt; ?>"></td>
          <!--   <td><input type="text" class="form-control input-sm text-center" name="refpaymentnoi[]" value="<?php echo $value->vou_payref; ?>"></td> -->
            <!-- <td>
              <ul class="icons-list">
                <li><a data-toggle="modal" data-target="#edit" data-popup="tooltip" title="Edit"><i class="icon-pencil7"></i></a></li>
                <li><a id="remove<?php echo $i;?>" data-popup="tooltip" title="Remove"><i class="icon-trash"></i></a></li>
              </ul>
            </td> -->
          </tr>
          <script>  $('#remove<?php echo $i;?>').on('click', function() {$(this).closest('tr').remove();});</script>
          <script>
          $("#downamti<?php echo $i; ?>").keyup(function(){
            var poamt = parseFloat($("#poamt").val());
            var down = parseFloat($("#downamti<?php echo $i; ?>").val());
            var wt = parseFloat($("#wh").val());
            var vat = parseFloat($("#vatper").val());
            var vatamt = (down*vat/100);
            var downamt = parseFloat((down*vat/100)+down);
            var lesswt = (down*wt/100);
            var tot = downamt-lesswt;
            $("#vati<?php echo $i; ?>").val(vatamt);
            $("#beforewti<?php echo $i; ?>").val(downamt);
            $("#lesswti<?php echo $i; ?>").val(lesswt);
            $("#netamti<?php echo $i; ?>").val(tot);

          });
          $("#vatper").keyup(function(){
            var poamt = parseFloat($("#poamt").val());
            var down = parseFloat($("#downamti<?php echo $i; ?>").val());
            var bfper = parseFloat($("#beforewti<?php echo $i; ?>"));
            var wt = parseFloat($("#wh").val());
            var vat = parseFloat($("#vatper").val());
            var vatamt = (down*vat/100);
            var downamt = parseFloat((down*vat/100)+down);
            var lesswt = (down*wt/100);
            var tot = downamt-lesswt;
            $("#vati<?php echo $i; ?>").val(vatamt);
            $("#beforewti<?php echo $i; ?>").val(downamt);
            $("#lesswti<?php echo $i; ?>").val(lesswt);
            $("#netamti<?php echo $i; ?>").val(tot);
          });
          $("#wh").keyup(function(){
            var poamt = parseFloat($("#poamt").val());
            var down = parseFloat($("#downamti<?php echo $i; ?>").val());
            var bfper = parseFloat($("#beforewti<?php echo $i; ?>"));
            var wt = parseFloat($("#wh").val());
            var vat = parseFloat($("#vatper").val());
            var vatamt = (down*vat/100);
            var downamt = parseFloat((down*vat/100)+down);
            var lesswt = (down*wt/100);
            var tot = downamt-lesswt;
            $("#vati<?php echo $i; ?>").val(vatamt);
            $("#beforewti<?php echo $i; ?>").val(downamt);
            $("#lesswti<?php echo $i; ?>").val(lesswt);
            $("#netamti<?php echo $i; ?>").val(tot);
          });
          </script>
          <?php $i++; $tot=$tot+$value->vou_netamt; } ?>
          <tr>
         <th colspan="6" class="text-center"> Total</th>
         <th ><input style="text-align: right;" type="text" class="form-control input-sm" name="totmat" id="totmat" readonly value="<?php echo number_format($tot,2); ?>"></th>
       </tr>
        </tbody>
      </table>
    </div>

