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
<div class="table-responsive" id="invoicedown">
  <table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">System Type</th>
        <th class="text-center">Down Amount</th>
        <th class="text-center">VAT %</th>
        <th class="text-center">Before W/T</th>
        <th class="text-center">Less W/T</th>
        <th class="text-center">Net Amount</th>
        <th class="text-center">Receipt Amount</th>
        <th class="text-center">Ref. Payment No.</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($cer_d as $v) { ?>
      <tr align="center">
        <td><?php echo $i; ?></td>
        <?php
        $session_data = $this->session->userdata('sessed_in');
        $compcode = $session_data['compcode'];
        $this->db->select('*');
        $this->db->where('systemcode',$v->projectd_job);
        $this->db->where('compcode',$compcode);
        $this->db->from('system');
        $query = $this->db->get()->result();
        foreach ($query as $key) {
        ?>
        <td>
          <?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system<?= $i ?>" value="<?php echo $key->systemcode ?>"></td>
          <?php
          }
          ?>
          <td>
            
            <input style="text-align: center;width: 100px;" type="text" system_amt="<?= $v->job_amount ?>" name="downamti[]" id="downamti<?php echo $i; ?>" value="<?php echo $v->amount_cer; ?>" class="form-control">
            <input type="hidden" name="todown[]" id="todown<?php echo $i; ?>" value="<?php echo $v->job_amount; ?>" class="form-control">
          </td>
          <td>
            
            <input class="no_border" type="text" name="vati[]" id="vati<?php echo $i; ?>" value="" >
          </td>
          <td>
            
            <input class="no_border" readonly="" type="text" name="beforewti[]" id="beforewti<?php echo $i; ?>" value="" >
          </td>
          <td>
            
            <input class="no_border" type="text" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="" >
          </td>
          <td>
            
            <input class="no_border" type="text" readonly="" id="netamti<?php echo $i; ?>" name="netamti[]"  value="" >
          </td>
          <td>
          <input class="no_border" type="text" name="receiptamt[]" id="receiptamt<?php echo $i; ?>" value="" ></td>
          <td>
          <input class="no_border" type="text" name="refpaymentnoi[]" id="refpaymentnoi<?php echo $i; ?>" value="" ></td>
        </tr>
        
        <script>
        $("#downamti<?php echo $i; ?>").keyup(function(){
        var down = parseFloat($("#downamti<?php echo $i; ?>").val());
        var todd = parseFloat($("#todown<?php echo $i; ?>").val());
        var wt = parseFloat($("#wh").val());
        var vat = parseFloat($("#vatper").val());
        var vatamt = (down*vat/100);
        var downamt = parseFloat((down*vat/100)+down);
        var lesswt = (down*wt/100);
        var tot = downamt-lesswt;
        // $("#downamti<?php echo $i; ?>").val(down);
        $("#vati<?php echo $i; ?>").val(vatamt.toFixed(4));
        $("#beforewti<?php echo $i; ?>").val(downamt.toFixed(4));
        $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        var sumary_downamt = parseFloat($("#sumdownamt").val());
        var rowsum_downamt = parseFloat($("#downamti<?php echo $i; ?>").val());
        var sum_downamt = sumary_downamt+rowsum_downamt;
        $("#sumdownamt").val(sum_downamt);
        var sumary_vati = parseFloat($("#sumvati").val());
        var rowsum_vati = parseFloat($("#vati<?php echo $i; ?>").val());
        var sum_vati = sumary_vati+rowsum_vati;
        $("#sumvati").val(sum_vati);
        var sumary_beforewti = parseFloat($("#sumbeforewti").val());
        var rowsum_beforewti = parseFloat($("#beforewti<?php echo $i; ?>").val());
        var sum_beforewti = sumary_beforewti+rowsum_beforewti;
        $("#sumbeforewti").val(sum_beforewti);
        var sumary_lesswti = parseFloat($("#sumlesswti").val());
        var rowsum_lesswti = parseFloat($("#lesswti<?php echo $i; ?>").val());
        var sum_lesswti = sumary_lesswti+rowsum_lesswti;
        $("#sumlesswti").val(sum_lesswti);
        var sumary_netamti = parseFloat($("#sumnetamti").val());
        var rowsum_netamti = parseFloat($("#netamti<?php echo $i; ?>").val());
        var sum_netamti = sumary_netamti+rowsum_netamti;
        $("#sumnetamti").val(sum_netamti);
        });
        $("#vati<?php echo $i; ?>").keyup(function(){
        var amt = parseFloat($("#downamti<?php echo $i; ?>").val());
        var vati = parseFloat($("#vati<?php echo $i; ?>").val());
        var wt = parseFloat($("#wh").val());
        var before = (amt+vati);
        var lesswt = (amt*wt/100);
        var tot = before-lesswt;
        $("#beforewti<?php echo $i; ?>").val(before.toFixed(4));
        $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        });
        $("#lesswti<?php echo $i; ?>").keyup(function(){
        var amt = parseFloat($("#downamti<?php echo $i; ?>").val());
        var wti = parseFloat($("#lesswti<?php echo $i; ?>").val());
        var bf = parseFloat($("#beforewti<?php echo $i; ?>").val());
        var tot = bf-wti;
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        });
        var down = parseFloat($("#downamti<?php echo $i; ?>").val());
        var todd = parseFloat($("#todown<?php echo $i; ?>").val());
        var wt = parseFloat($("#wh").val());
        var vat = parseFloat($("#vatper").val());
        var vatamt = (down*vat/100);
        var downamt = parseFloat((down*vat/100)+down);
        var lesswt = (down*wt/100);
        var tot = downamt-lesswt;
        // $("#downamti<?php echo $i; ?>").val(down);
        $("#vati<?php echo $i; ?>").val(vatamt.toFixed(4));
        $("#beforewti<?php echo $i; ?>").val(downamt.toFixed(4));
        $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        var sumary_downamt = parseFloat($("#sumdownamt").val());
        var rowsum_downamt = parseFloat($("#downamti<?php echo $i; ?>").val());
        var sum_downamt = sumary_downamt+rowsum_downamt;
        $("#sumdownamt").val(sum_downamt);
        var sumary_vati = parseFloat($("#sumvati").val());
        var rowsum_vati = parseFloat($("#vati<?php echo $i; ?>").val());
        var sum_vati = sumary_vati+rowsum_vati;
        $("#sumvati").val(sum_vati);
        var sumary_beforewti = parseFloat($("#sumbeforewti").val());
        var rowsum_beforewti = parseFloat($("#beforewti<?php echo $i; ?>").val());
        var sum_beforewti = sumary_beforewti+rowsum_beforewti;
        $("#sumbeforewti").val(sum_beforewti);
        var sumary_lesswti = parseFloat($("#sumlesswti").val());
        var rowsum_lesswti = parseFloat($("#lesswti<?php echo $i; ?>").val());
        var sum_lesswti = sumary_lesswti+rowsum_lesswti;
        $("#sumlesswti").val(sum_lesswti);
        var sumary_netamti = parseFloat($("#sumnetamti").val());
        var rowsum_netamti = parseFloat($("#netamti<?php echo $i; ?>").val());
        var sum_netamti = sumary_netamti+rowsum_netamti;
        $("#sumnetamti").val(sum_netamti);
        var amt = parseFloat($("#downamti<?php echo $i; ?>").val());
        var vati = parseFloat($("#vati<?php echo $i; ?>").val());
        var wt = parseFloat($("#wh").val());
        var before = (amt+vati);
        var lesswt = (amt*wt/100);
        var tot = before-lesswt;
        $("#beforewti<?php echo $i; ?>").val(before.toFixed(4));
        $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        var amt = parseFloat($("#downamti<?php echo $i; ?>").val());
        var wti = parseFloat($("#lesswti<?php echo $i; ?>").val());
        var bf = parseFloat($("#beforewti<?php echo $i; ?>").val());
        var tot = bf-wti;
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        </script>
        <?php $i++; } ?>
        <!--             <tr align="center">
          <td colspan="2" class="text-center">Summary</td>
          <td><input type="text" readonly class="no_border" id="sumdownamt" name="sumdownamt" value="0"></td>
          <td><input type="text" readonly class="no_border" id="sumvati" name="sumvati" value="0"></td>
          <td><input type="text" readonly class="no_border" id="sumbeforewti" name="sumbeforewti" value="0"></td>
          <td><input type="text" readonly class="no_border" id="sumlesswti" name="sumlesswti" value="0"></td>
          <td><input type="text" readonly class="no_border" id="sumnetamti" name="sumnetamti" value="0"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr> -->
        
      </tbody>
    </table>
  </div>
  <script>
  $("#cpqtyic").keydown(function(){
  $("#pqtyic").val($("#qty").val()*$("#cpqtyic").val());
  });
  $(document).on('click', 'a#remove<?php echo $i;?>', function () { // <-- changes
  // Initialize
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