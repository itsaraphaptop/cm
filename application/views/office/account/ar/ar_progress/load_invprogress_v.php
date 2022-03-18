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
        <th class="text-center">No.</th>
        <th class="text-center">System Type</th>
        <th class="text-center">Progress Amount</th>
        <th class="text-center">Less Advance</th>
        <th class="text-center">VAT</th>
        <th class="text-center">Less Retention</th>
        <th class="text-center">Less W/T</th>
        <th class="text-center">Net Amount</th>
        <th class="text-center">Receipt Amount</th>
        <th class="text-center">Ref. No.</th>
        <th class="text-center">Cer No.</th>
      </tr>
    </thead>
      <tbody>
        <!-- <?php $i=1; foreach ($dow as $v) {
          $this->db->select('COUNT(inv_project) as inv_project');
          $this->db->where('inv_project',$v->project_id);
          $this->db->from('ar_invprogress_header');
          $inv_period = $this->db->get()->result();
          foreach ($inv_period as $per) {
            
            if ($per->inv_project == 0) {
            ?>
            <tr align="center">
              <td><?php echo $i; ?></td>
                <?php
                  $this->db->select('*');
                  $this->db->where('systemcode',$v->inv_system);
                  $this->db->from('system');
                  $query = $this->db->get()->result();

                  foreach ($query as $key) {
                  ?>
                  <td>
                  <?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system" value="<?php echo $key->systemcode ?>"></td>
                  <?php
                  }
                  ?>
                <td>
                  <?php 
                    $topro = $v->job_amount;
                    $pro_amt = $v->job_amount
                  ?>
                  <input style="text-align: center;width: 100px;" type="text" name="progressamt[]" id="progressamt<?php echo $i; ?>" value="<?php echo $pro_amt; ?>" class="form-control">
                  <input type="hidden" name="topro[]" id="topro<?php echo $i; ?>" value="<?php echo $topro; ?>" class="form-control">
                </td>
                <td>
                  <?php
                  $to_lessadvance = ($pro_amt*$v->project_lessadvance)/100;
                  ?>
                  <input class="no_border" type="text" name="lessadvance[]" id="lessadvance<?php echo $i; ?>" value="<?php echo $to_lessadvance; ?>" >
                </td>

                <td>
                  <?php
                  $to_vat = ($pro_amt*$v->project_lessadvance)*$v->project_vat/100;
                  ?>
                  <input class="no_border" type="text" name="vati[]" id="vati<?php echo $i; ?>" value="<?php echo $to_vat; ?>" >
                </td>

                <td>
                  <?php
                  $to_lessretention = ($pro_amt*$v->project_lessretention)/100;
                  ?>
                  <input class="no_border" type="text" name="lessretention[]" id="lessretention<?php echo $i; ?>" value="<?php echo $to_lessretention; ?>" >
                </td>
                <td>
                  <?php
                  $to_lee = ($pro_amt-$to_lessadvance)*$v->project_wt/100;
                  ?>
                  <input class="no_border" type="text" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="<?php echo $to_lee; ?>" >
                </td>
                <?php 
                    $net = $pro_amt - $to_lessadvance + $to_vat - $to_lessretention - $to_lee;
                  ?> 
                <td>
                  <input class="no_border" readonly="" type="text" id="netamti<?php echo $i; ?>" name="netamti[]"  value="<?php echo $net; ?>" >
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
          <?php
              } else {
          ?>
            <tr align="center">
              <td><?php echo $i; ?></td>
                <?php
                  $this->db->select('*');
                  $this->db->where('systemcode',$v->inv_system);
                  $this->db->join('ar_invprogress_detail','ar_invprogress_detail.inv_system=system.systemcode');
                  $this->db->group_by("inv_system");
                  $this->db->from('system');
                  $query = $this->db->get()->result();

                  foreach ($query as $key) {

                  //$sss = $this->db->query("SELECT sum(inv_progressamt) as sumpro from ar_invprogress_detail where inv_system = $key->inv_system")->result();

                  $this->db->select("*,sum(inv_progressamt) as sumpro",false);
                  $this->db->from("ar_invprogress_header");
                  $this->db->join("ar_invprogress_detail","ar_invprogress_header.inv_no = ar_invprogress_detail.inv_ref");
                  $this->db->where("ar_invprogress_header.inv_project",$v->project_id);
                  $this->db->where("ar_invprogress_detail.inv_system",$key->inv_system);
                  $sss = $this->db->get()->result();
                  // echo $key->inv_system." ";
                  // echo "<pre>";
                  // var_dump($sss);
                  foreach ($sss as $summ) {

                  ?>
                  <td><?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system" value="<?php echo $key->systemcode ?>"></td>
                  <?php
                  }
                  
                  ?>
                <td>
                  <?php 
                    $topro = $v->job_amount;
                    $pro_amtt = $topro - $summ->sumpro;
                    // echo $summ->sumpro;
                    
                  ?>
                  <?php 
                    
                  ?>                
                  <input style="text-align: center;width: 100px;" type="text" name="progressamt[]" id="progressamt<?php echo $i; ?>" value="<?php echo $topro-$summ->sumpro; ?>" class="form-control">
                  <input type="hidden" name="topro[]" id="topro<?php echo $i; ?>" value="<?php echo $topro; ?>" class="form-control">
                </td>
                <td>
                  <?php
                  
                }
                  $to_lessadvance = ($pro_amtt*$v->project_lessadvance)/100;
                  ?>
                  <input class="no_border" type="text" name="lessadvance[]" id="lessadvance<?php echo $i; ?>" value="<?php echo $to_lessadvance; ?>" >
                </td>
                <td>
                  <?php
                  $to_vat = ($pro_amtt-$to_lessadvance)*$v->project_vat/100;
                  ?>
                  <input class="no_border" type="text" name="vati[]" id="vati<?php echo $i; ?>" value="<?php echo $to_vat; ?>" >
                </td>
                <td>
                  <?php 
                    $to_lessretention = ($pro_amtt * $v->project_lessretention)/100;
                  ?>
                  <input class="no_border" type="text" name="lessretention[]" id="lessretention<?php echo $i; ?>" value="<?php echo $to_lessretention; ?>" >
                </td>
                <td>
                  <?php
                  $to_lee = ($pro_amtt-$to_lessadvance)*$v->project_wt/100;
                  ?>
                  <input class="no_border" type="text" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="<?php echo $to_lee; ?>" >
                </td>
                <td>
                <?php 
                    $net = $pro_amtt - $to_lessadvance + $to_vat - $to_lessretention - $to_lee;
                  ?>  
                  <input class="no_border" type="text" readonly="" id="netamti<?php echo $i; ?>" name="netamti[]"  value="<?php echo $net; ?>" >
                </td>
                <td>
                  <input class="no_border" type="text" name="receiptamt[]" id="receiptamt<?php echo $i; ?>" value="<?= $topro-$pro_amtt  ?>" >
                </td>
                <td>
                  <input class="no_border" type="text" name="refpaymentnoi[]" id="refpaymentnoi<?php echo $i; ?>" value="" >
                </td>
                <td></td>


            </tr>
          <?php
          }  
          }
          ?>
          
            <script>
                $("#progressamt<?php echo $i; ?>").keyup(function(){
                  
                  var down = parseFloat($("#progressamt<?php echo $i; ?>").val());
                  var todd = parseFloat($("#topro<?php echo $i; ?>").val());
                  var wt = parseFloat($("#wh").val());
                  var vat = parseFloat($("#vatper").val());
                  var lessadv = parseFloat($("#less_adv").val());
                  var lessref = parseFloat($("#less_ref").val());
                  var tolessadv = (down*lessadv/100);
                  var vatamt = (down-tolessadv)*vat/100;
                  var lesswt = (down-tolessadv)*wt/100;
                  var tolessref = (down*lessref/100);
                  var total = down-tolessadv+vatamt-tolessref-lesswt;
                  // $("#progressamt<?php echo $i; ?>").val(down);
                  $("#vati<?php echo $i; ?>").val(vatamt.toFixed(4));
                  $("#lessadvance<?php echo $i; ?>").val(tolessadv.toFixed(4));
                  $("#lessretention<?php echo $i; ?>").val(tolessref.toFixed(4));
                  $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
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
                  
                  $("#lessadvance<?php echo $i; ?>").keyup(function(){
                  var amt = parseFloat($("#progressamt<?php echo $i; ?>").val());
                  var adv = parseFloat($("#lessadvance<?php echo $i; ?>").val());
                  var wt = parseFloat($("#wh").val());
                  var vat = parseFloat($("#vatper").val());
                  var lessref = parseFloat($("#less_ref").val());
                  var amt_adv = (amt-adv);
                  var vatamt = amt*vat/100;
                  var lesswt = amt_adv*wt/100;
                  var tolessref = (amt*lessref/100);
                  var total = amt_adv+vatamt-tolessref-lesswt;
                  $("#vati<?php echo $i; ?>").val(vatamt.toFixed(4));
                  $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
                  $("#netamti<?php echo $i; ?>").val(tolessref.toFixed(4));
                  });

                  $("#vati<?php echo $i; ?>").keyup(function(){
                  var amt = parseFloat($("#progressamt<?php echo $i; ?>").val());
                  var vat = parseFloat($("#vati<?php echo $i; ?>").val());
                  var wt = parseFloat($("#wh").val());
                  var adv = parseFloat($("#less_adv").val());
                  var lessref = parseFloat($("#less_ref").val());
                  var amt_adv = (amt*adv/100);
                  var lesswt = amt_adv*wt/100;
                  var tolessref = (amt*lessref/100);
                  var total = amt-amt_adv+vat-tolessref-lesswt;
                  $("#lesswti<?php echo $i; ?>").val(lesswt.toFixed(4));
                  $("#netamti<?php echo $i; ?>").val(total.toFixed(4));
                  });

                  $("#lesswti<?php echo $i; ?>").keyup(function(){
                  var amt = parseFloat($("#progressamt<?php echo $i; ?>").val());
                  var wti = parseFloat($("#lesswti<?php echo $i; ?>").val());
                  var vat = parseFloat($("#vatper").val());
                  var lessadv = parseFloat($("#less_adv").val());
                  var lessref = parseFloat($("#less_ref").val());
                  var tolessadv = (amt*lessadv/100);
                  var vatamt = (amt-tolessadv)*vat/100;
                  var tolessref = (amt*lessref/100);
                  var total = amt-tolessadv+vatamt-tolessref-wti;
                  $("#netamti<?php echo $i; ?>").val(total.toFixed(4));
                  });

                  $("#lessretention<?php echo $i; ?>").keyup(function(){
                  var amt = parseFloat($("#progressamt<?php echo $i; ?>").val());
                  var ret = parseFloat($("#lessretention<?php echo $i; ?>").val());
                  var wt = parseFloat($("#wh").val());
                  var vat = parseFloat($("#vatper").val());
                  var lessadv = parseFloat($("#less_adv").val());
                  var lessref = parseFloat($("#less_ref").val());
                  var tolessadv = (amt*lessadv/100);
                  var vatamt = (amt-tolessadv)*vat/100;
                  var lesswt = amt*wt/100;
                  var total = amt-tolessadv+vatamt-ret-lesswt;
                  $("#netamti<?php echo $i; ?>").val(total.toFixed(4));
                  });

              </script>
        <?php $i++; } ?> -->
        <tr>
          <td colspan="11" class="text-center">No Data</td>
        </tr>
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