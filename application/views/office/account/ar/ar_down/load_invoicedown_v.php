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
      <?php
      $this->db->select('COUNT(inv_project) as inv_project');
        $this->db->where('inv_project',$pro);
        $this->db->from('ar_invdown_header');
        $inv_period = $this->db->get()->result();
        foreach ($inv_period as $per) {
          $inv_project = $per->inv_project;
        }
         $i=1; foreach ($dow as $v) {
          if ($inv_project == 0) {
          ?>
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
                <?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system<?= $i ?>" value="<?php echo $key->systemcode ?>"></td>
                <?php
                }
                ?>
              <td>
                <?php 
                  $todown = ($v->job_amount*$v->project_advance_1)/100;
                  $down_amt = ($v->job_amount*$v->project_advance_1)/100;
                ?>
                <input style="text-align: center;width: 100px;" type="text" system_amt="<?= $v->job_amount ?>" name="downamti[]" id="downamti<?php echo $i; ?>" value="<?php echo $down_amt; ?>" class="form-control">
                <input type="hidden" name="todown[]" id="todown<?php echo $i; ?>" value="<?php echo $todown; ?>" class="form-control">
              </td>
              <td>
                <?php
                $to_vat = ($down_amt*$v->project_vat)/100;
                ?>
                <input class="no_border" type="text" name="vati[]" id="vati<?php echo $i; ?>" value="<?php echo $to_vat; ?>" >
              </td>
              <td>
                <?php 
                  $before = $down_amt + $to_vat;
                ?>
                <input class="no_border" readonly="" type="text" name="beforewti[]" id="beforewti<?php echo $i; ?>" value="<?php echo $before; ?>" >
              </td>
              <td>
                <?php
                $to_lee = ($down_amt*$v->project_wt)/100;
                ?>
                <input class="no_border" type="text" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="<?php echo $to_lee; ?>" >
              </td>
              <td>

                <?php 
                  $net = $before - $to_lee;
                ?>  
                <input class="no_border" type="text" readonly="" id="netamti<?php echo $i; ?>" name="netamti[]"  value="<?php echo $net; ?>" >
              </td>
              <td>
                <input class="no_border" type="text" name="receiptamt[]" id="receiptamt<?php echo $i; ?>" value="" ></td>
              <td>
                <input class="no_border" type="text" name="refpaymentnoi[]" id="refpaymentnoi<?php echo $i; ?>" value="" ></td>
          </tr>
        <?php
            } else {
        ?>
          <tr align="center">
            <td><?php echo $i; ?></td>
              <?php
                // $this->db->select('*');
                // $this->db->where('inv_project',$pro);
                // $this->db->from('ar_invdown_header');
                // $qq = $this->db->get()->result();
                // foreach ($qq as $ii) {
                //   $ii = $ii->inv_no;
                // }

                $this->db->select('*');
                $this->db->where('systemcode',$v->projectd_job);
                $this->db->join('ar_invdown_detail','ar_invdown_detail.inv_system=system.systemcode');
                $this->db->group_by("inv_system");
                $this->db->from('system');
                $query = $this->db->get()->result();

                foreach ($query as $key) {

                  $sss = $this->db->query("SELECT sum(inv_downamt) as sumpro from ar_invdown_detail where inv_system = $key->inv_system")->result();
                foreach ($sss as $summ) {
                ?>
                <td><?php echo $key->systemname; ?><input type="hidden" name="system[]" id="system<?= $i ?>" value="<?php echo $key->systemcode ?>"></td>
              <td>
                <?php 
                  $todown = ($v->job_amount*$v->project_advance_1)/100;
                  $down_amt = $todown - $summ->sumpro;
                  
                ?>
                <input style="text-align: center;width: 100px;" type="text" name="downamti[]" id="downamti<?php echo $i; ?>" value="<?php echo $todown - $summ->sumpro; ?>" class="form-control">
                <input type="hidden" name="todown[]" id="todown<?php echo $i; ?>" value="<?php echo $todown; ?>" class="form-control">
              </td>
              <td>
                <?php
                }
              }
                $to_vat = ($down_amt*$v->project_vat)/100;
                ?>
                <input class="no_border" type="text" name="vati[]" id="vati<?php echo $i; ?>" value="<?php echo $to_vat; ?>" >
              </td>
              <td>
                <?php 
                  $before = $down_amt + $to_vat;
                ?>
                <input class="no_border" readonly="" type="text" name="beforewti[]" id="beforewti<?php echo $i; ?>" value="<?php echo $before; ?>" >
              </td>
              <td>
                <?php
                $to_lee = ($down_amt*$v->project_wt)/100;
                ?>
                <input class="no_border" type="text" name="lesswti[]" id="lesswti<?php echo $i; ?>" value="<?php echo $to_lee; ?>" >
              </td>
              <td>

                <?php 
                  $net = $before - $to_lee;
                ?>  
                <input class="no_border" type="text" readonly="" id="netamti<?php echo $i; ?>" name="netamti[]"  value="<?php echo $net; ?>" >
              </td>
              <td>
                <input class="no_border" type="text" name="receiptamt[]" id="receiptamt<?php echo $i; ?>" value="" ></td>
              <td>
                <input class="no_border" type="text" name="refpaymentnoi[]" id="refpaymentnoi<?php echo $i; ?>" value="" ></td>

          </tr>
        <?php
         }  
        ?>
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