<style>
.no_border {
  color: #2b2828;
    background-color: rgba(85, 85, 85, 0);
    border: aliceblue;
    text-align: center;
    width: 100px;
}
</style>
<table class="table table-hover table-bordered table-striped table-xxs">
    <thead>
      <tr>
        <th class="text-center">invoice No</th>
        <th class="text-center">CN Code</th>
        <th class="text-center">invoice Type</th>
        <th class="text-center">Period</th>
        <th class="text-center">Remark</th>
        <th class="text-center">System Type</th>
        <th class="text-center">Exchange(Inv)</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Advance %</th>
        <th class="text-center">Advance</th>
        <th class="text-center">W/T %</th>
        <th class="text-center">W/T</th>
        <th class="text-center">Retention %</th>
        <th class="text-center">Retention</th>
        <th class="text-center">Vat  %</th>
        <th class="text-center">Vat</th>
        <th class="text-center">Net Amount</th>
      </tr>
    </thead>
      <tbody>
      <?php $n=1; foreach ($re as $index => $rr) {  ?>
      <tr>
        <td>
          <input class="no_border" readonly="true" type="type" id="invno<?=$index?>" name="invno[]"  value="<?php echo $rr->vou_invno; ?>"> 
        </td>
        <td></td>
        <td>
          <input type="hidden" name="type[]"  id="type<?=$index?>" value="<?php echo $rr->vou_type; ?>"><?php echo $rr->vou_type; ?>
        </td>
        <td>
          <input type="hidden" name="period[]"  id="period<?=$index?>" value="<?php echo $rr->vou_period; ?>"><?php echo $rr->vou_period; ?>
        </td>
        <td>
          <input readonly="true" type="hidden" name="remark[]"  id="remark<?=$index?>" value="<?php echo $rr->vou_remark; ?>"><?php echo $rr->vou_remark; ?>
        </td>
        <?php 
            $this->db->select('*');
            $this->db->where('systemcode',$rr->vou_system);
            $query = $this->db->get('system');
            $res = $query->result();
            foreach ($res as $value) {
              $sysname= $value->systemname;
            ?>
          <td>
            <input type="hidden" name="systemcode[]" id="systemcode<?=$index?>" value="<?php echo $value->systemcode ?>">
            <?php echo $sysname; ?>
          </td>
            <?php
            }
           ?>
          <td style="text-align: right;">
            <input type="hidden" name="exchange[]"  id="periexchangeod<?=$index?>" value="<?php echo $rr->vou_exchange; ?>"><?php echo $rr->vou_exchange; ?>
          </td > 
          <td style="text-align: right;">
            <input type="hidden" name="vouamt[]" id="vouamt<?=$index?>" value="<?php echo $rr->vou_downamt; ?>"><?php echo $rr->vou_downamt; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="vouadv[]" id="vouadv<?=$index?>" value="<?php echo $rr->vou_adv; ?>"><?php echo $rr->vou_adv; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="advamt[]" id="advamt<?=$index?>" value="<?php echo $rr->vou_advamt; ?>"><?php echo $rr->vou_advamt; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="vouwt[]" id="vouwt<?=$index?>" value="<?php echo $rr->vou_wtper; ?>"><?php echo $rr->vou_wtper; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="wtamt[]" id="wtamt<?=$index?>" value="<?php echo $rr->vou_lesswt; ?>"><?php echo $rr->vou_lesswt; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="vouret[]" id="vouret<?=$index?>" value="<?php echo $rr->vou_ret; ?>"><?php echo $rr->vou_ret; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="retamt[]" id="retamt<?=$index?>" value="<?php echo $rr->vou_retamt; ?>"><?php echo $rr->vou_retamt; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="vouvat[]" id="vouvat<?=$index?>" value="<?php echo $rr->vou_vatper; ?>"><?php echo $rr->vou_vatper; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="vatamt[]" id="vatamt<?=$index?>" value="<?php echo $rr->vou_vatamt; ?>"><?php echo $rr->vou_vatamt; ?>
          </td>
          <td style="text-align: right;">
            <input type="hidden" name="netamt[]" id="netamt<?=$index?>" value="<?php echo $rr->vou_netamt; ?>"><?php echo $rr->vou_netamt; ?>
          </td>
        <?php $n++; } ?>
      </tr>
      <tr>
        <td colspan="7">Summary</td>
        <td style="text-align: right;">
          <input type="hidden" name="toamt" id="toamt" value="<?php echo $rr->vou_amt; ?>"><?php echo $rr->vou_amt; ?>
        </td>
        <td></td>
        <td style="text-align: right;">
          <input type="hidden" name="toadv" id="toadv" value="<?php echo $rr->vou_amtadv; ?>"><?php echo $rr->vou_amtadv; ?>
        </td>
        <td></td>
        <td style="text-align: right;">
          <input type="hidden" name="towt" id="towt" value="<?php echo $rr->vou_wt; ?>"><?php echo $rr->vou_wt; ?>
        </td>
        <td></td>
        <td style="text-align: right;">
          <input type="hidden" name="toret" id="toret" value="<?php echo $rr->vou_amtret; ?>"><?php echo $rr->vou_amtret; ?>
        </td>
        <td></td>
        <td style="text-align: right;">
          <input type="hidden" name="tovat" id="tovat" value="<?php echo $rr->vou_vat; ?>"><?php echo $rr->vou_vat; ?>
        </td>
        <td style="text-align: right;">
          <input type="hidden" name="tonet" id="tonet" value="<?php echo $rr->vou_net; ?>"><?php echo $rr->vou_net; ?>
        </td>
      </tr>
      </tbody>
  </table>
  <script>
  $(document).on('click', 'a#remove', function () {
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