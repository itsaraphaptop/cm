<style>
.no_border {
  color: #2b2828;
    background-color: rgba(85, 85, 85, 0);
    border: aliceblue;
    text-align: center;
    width: 100px;
}
.ww {
  width: 100px;
  text-align: center;
}
</style>
<div class="table-responsive" id="invprogress">
  <table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">Job</th>
        <th class="text-center">Progress Amount</th>
        <th class="text-center">Less Adv</th>
        <th class="text-center">VAT</th>
        <th class="text-center">Less Ref</th>
        <th class="text-center">Less W/T</th>
        <th class="text-center">Receipt Net Amount</th>
        <th class="text-center">Receipt Amount</th>
        <th class="text-center">Ref. No.</th>
        <th class="text-center">Cer No.</th>
      </tr>
    </thead>
      <tbody>
      <?php $n=1; foreach ($ffd as $lkl) {  ?>
      <tr>
        <td><?php echo $n; ?></td>
        <td>
          <?php 
            $this->db->select('*');
            $this->db->where('systemcode',$lkl->inv_system);
            $query = $this->db->get('system');
            $res = $query->result();
            foreach ($res as $value) {
              echo $value->systemname;
            ?>
            <input type="hidden" name="systemcode[]" id="systemcode<?php echo $n; ?>" value="<?php echo $value->systemcode ?>">
            <?php
            }
           ?>
        </td>
        <td>
           <input type="hidden" name="chk[]" id="chk" value="Y" class="form-control">
          <input style="text-align: center;width: 100px;" type="text" name="progressamt[]" id="progressamt<?php echo $n; ?>" value="<?php echo $lkl->inv_progressamt; ?>" class="form-control">
        </td>
        <td>
          <input type="text" class="form-control" name="lessadvance[]" id="lessadvance<?php echo $n; ?>" value="<?php echo $lkl->inv_lessadvance; ?>" readonly="readonly">
        </td>
        <td>
          <input type="text" class="form-control" name="vati[]" id="vati<?php echo $n; ?>" value="<?php echo $lkl->inv_vatamt; ?>" readonly="readonly">
        </td>

        <td>
          <input type="text" class="form-control" name="lessretention[]" id="lessretention<?php echo $n; ?>" value="<?php echo $lkl->inv_lessretention; ?>" readonly="readonly">
        </td>

        <td>
          <input type="text" class="form-control" name="lesswti[]" id="lesswti<?php echo $n; ?>" value="<?php echo $lkl->inv_lesswt; ?>" readonly="readonly">
        </td>
        <td>
          <input type="text" class="form-control" name="netamti[]" id="netamti<?php echo $n; ?>" value="<?php echo $lkl->inv_netamt; ?>" readonly="readonly">
        </td>
        <td>
           <input class="no_border" type="text" name="receiptamt[]" id="receiptamt<?php echo $n; ?>" value="" readonly="readonly">
        </td>
        <td>
          <input class="no_border" type="text" name="refpaymentnoi[]" id="refpaymentnoi<?php echo $n; ?>" value="" readonly="readonly">
        </td>
        <td></td>
         <script>
              $("#progressamt<?php echo $n; ?>").keyup(function(){
                var down = parseFloat($("#progressamt<?php echo $n; ?>").val());
                var todd = parseFloat($("#topro<?php echo $n; ?>").val());
                var too = todd-down;
                var wt = parseFloat($("#wh").val());
                var vat = parseFloat($("#vatper").val());
                var lessadv = parseFloat($("#less_adv").val());
                var lessref = parseFloat($("#less_ref").val());
                var tolessadv = (down*lessadv/100);
                var vatamt = (down-tolessadv)*vat/100;
                var lesswt = (down-tolessadv)*wt/100;
                var tolessref = (down*lessref/100);
                var total = down-tolessadv+vatamt-tolessref-lesswt;
                $("#progressamt<?php echo $n; ?>").val(down);
                $("#vati<?php echo $n; ?>").val(vatamt);
                $("#lessadvance<?php echo $n; ?>").val(tolessadv);
                $("#lessretention<?php echo $n; ?>").val(tolessref);
                $("#lesswti<?php echo $n; ?>").val(lesswt);
                $("#netamti<?php echo $n; ?>").val(total);

              var sumary_downamt = parseFloat($("#sumdownamt").val());
                var rowsum_downamt = parseFloat($("#downamti<?php echo $n; ?>").val());
                var sum_downamt = sumary_downamt+rowsum_downamt;
                $("#sumdownamt").val(sum_downamt);

              var sumary_vati = parseFloat($("#sumvati").val());
                var rowsum_vati = parseFloat($("#vati<?php echo $n; ?>").val());
                var sum_vati = sumary_vati+rowsum_vati;
                $("#sumvati").val(sum_vati);

              var sumary_beforewti = parseFloat($("#sumbeforewti").val());
                var rowsum_beforewti = parseFloat($("#beforewti<?php echo $n; ?>").val());
                var sum_beforewti = sumary_beforewti+rowsum_beforewti;
                $("#sumbeforewti").val(sum_beforewti);

              var sumary_lesswti = parseFloat($("#sumlesswti").val());
                var rowsum_lesswti = parseFloat($("#lesswti<?php echo $n; ?>").val());
                var sum_lesswti = sumary_lesswti+rowsum_lesswti;
                $("#sumlesswti").val(sum_lesswti);

              var sumary_netamti = parseFloat($("#sumnetamti").val());
                var rowsum_netamti = parseFloat($("#netamti<?php echo $n; ?>").val());
                var sum_netamti = sumary_netamti+rowsum_netamti;
                $("#sumnetamti").val(sum_netamti);
                });
              
            </script>
            <?php $n++; } ?>
      </tr>
      </tbody>
  </table>
</div>


<script>
        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
                        $noty.close();
                        self.closest('tr').remove();
                        noty({
                            force: true,
                            text: 'Deleteted',
                            type: 'success',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });

                    }
                },
                {
                    addClass: 'btn btn-danger btn-xs',
                    text: 'Cancel',
                    onClick: function ($noty) {
                        $noty.close();
                        noty({
                            force: true,
                            text: 'You clicked "Cancel" button',
                            type: 'error',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });
                    }
                }
            ]
        });

        return false;


  });
</script>