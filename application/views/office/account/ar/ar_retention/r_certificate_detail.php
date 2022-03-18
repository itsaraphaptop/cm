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
<div class="table-responsive" id="invretention">
  <table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">System Type</th>
        <th class="text-center">Retenton Amount</th>
        <th class="text-center">VAT</th>
        <th class="text-center">Net Amount</th>
        <th class="text-center">Receipt Amount</th>
        <th class="text-center">Ref. No.</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($cer_d as $v) { ?>
      
      <tr align="center">
        <td><?php echo $i; ?></td>
        <?php
        $this->db->select('*');
        $this->db->where('systemcode',$v->projectd_job);
        $this->db->from('system');
        $query = $this->db->get()->result();
        foreach ($query as $key) {
        ?>
        <td>
          <?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system<?php echo $i; ?>" value="<?php echo $key->systemcode ?>"></td>
          <?php
          }
          ?>
          <td>
            <div class="input-group">
              <input type="text" name="progressamt[]"  id="progressamt<?php echo $i; ?>" value="<?php echo $v->amount_cer; ?>" class="form-control text-right">
              <div class="input-group-btn">
                <a class="payment btn btn-info btn-icon"  data-toggle="modal" data-target="#my_list"><i class="icon-search4"></i></a>
              </div>
            </div>
            
          </td>
          <td>
            <input class="form-control text-right" readonly="true" type="text" name="vati[]" id="vati<?php echo $i; ?>" value="0" >
          </td>
          <td>
            <input class="form-control text-right" readonly="true" type="text" id="netamti<?php echo $i; ?>" name="netamti[]"  value="" >
          </td>
          <td></td>
          <td></td>
        </tr>
        <script>
        $("#progressamt<?php echo $i; ?>").keyup(function(){
        var down = parseFloat($("#progressamt<?php echo $i; ?>").val());
        var todd = parseFloat($("#topro<?php echo $i; ?>").val());
        var vat = parseFloat($("#vatper").val());
        var vatamt = (down*vat/100);
        var total = down+vatamt;
        // $("#progressamt<?php echo $i; ?>").val(down);
        $("#vati<?php echo $i; ?>").val(vatamt.toFixed(4));
        $("#netamti<?php echo $i; ?>").val(total.toFixed(4));
        var sumary_downamt = parseFloat($("#sumdownamt").val());
        var rowsum_downamt = parseFloat($("#progressamt<?php echo $i; ?>").val());
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
        var amt = parseFloat($("#progressamt<?php echo $i; ?>").val());
        var vati = parseFloat($("#vati<?php echo $i; ?>").val());
        var tot = amt+vati;
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        });
        var down = parseFloat($("#progressamt<?php echo $i; ?>").val());
        var todd = parseFloat($("#topro<?php echo $i; ?>").val());
        var vat = parseFloat($("#vatper").val());
        var vatamt = (down*vat/100);
        var total = down+vatamt;
        // $("#progressamt<?php echo $i; ?>").val(down);
        $("#vati<?php echo $i; ?>").val(vatamt.toFixed(4));
        $("#netamti<?php echo $i; ?>").val(total.toFixed(4));
        var sumary_downamt = parseFloat($("#sumdownamt").val());
        var rowsum_downamt = parseFloat($("#progressamt<?php echo $i; ?>").val());
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
        var amt = parseFloat($("#progressamt<?php echo $i; ?>").val());
        var vati = parseFloat($("#vati<?php echo $i; ?>").val());
        var tot = amt+vati;
        $("#netamti<?php echo $i; ?>").val(tot.toFixed(4));
        </script>
        <?php $i++; } ?>
        
        
      </tbody>
    </table>
  </div>
  <script>
  $("[name='progressamt[]']").each(function(index, el) {
  var project_id = $(el).attr('project_id');
  var system_code = $(el).attr('system_code');
  var row = $(el).attr('row');
  $.get('<?= base_url() ?>ar/payment_retention/'+project_id+'/'+system_code, function(data) {
  }).done(function(data) {
  var vat = ($('#vatper').val()*1);
  var amt = (data*1);
  var amt_vat = (vat*amt)/100;
  $('#progressamt'+row).val(data);
  $('#vati'+row).val(amt_vat);
  $('#netamti'+row).val(amt+amt_vat);
  });
  });
  $('.payment').click(function(event) {
  var row = $(this).attr('row');
  var project_id = $(this).attr('project_id');
  var system_code = $(this).attr('system_code');
  $.get('<?= base_url() ?>ar/list_payment_retention/'+project_id+'/'+system_code, function(data) {
  }).done(function(data) {
  $('#content_detail').html(data);
  });
  });
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