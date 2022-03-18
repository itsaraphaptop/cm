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
        <th class="text-center" width="10%">Type</th>
        <th class="text-center" width="10%">Account Code</th>
        <th class="text-center" width="20%">Account name</th>
        <th class="text-center" width="10%">Cost Code</th>
        <th class="text-center" width="10%">DR</th>
        <th class="text-center" width="10%">CR</th>
      </tr>
    </thead>
    <tbody>
    <?php  
    $session_data = $this->session->userdata('sessed_in');
    $compcode = $session_data['compcode'];
    $dr=0; $cr=0; foreach ($pe as $key => $s) 
    { 

        $syscode = $this->db->query("SELECT pac_taxvat_due,pac_whtax_3,pac_expens from syscode where sys_code='$compcode'")->result();

        foreach ($syscode as $sc) {
            $due = $sc->pac_taxvat_due;
            $wh3 = $sc->pac_whtax_3;
            $pac = $sc->pac_expens;
        }
          $amtt = $this->db->query("SELECT * from account_total where act_code='$s->pettycashi_accode' and compcode='$compcode' ")->result();
            foreach ($amtt as $ac) {
             
            } 
        $aa = $this->db->query("SELECT * from account_total where act_code='$due' and compcode='$compcode' ")->result();
            foreach ($aa as $a) {
              $duen =$a->act_name;
              $duec =$a->act_code;
            }
        $zz = $this->db->query("SELECT * from account_total where act_code='$wh3' and compcode='$compcode' ")->result();
            foreach ($zz as $z) {
              $wh3n =$z->act_name;
              $wh3c =$z->act_code;
            }  
        $yy = $this->db->query("SELECT * from account_total where act_code='$pac' and compcode='$compcode' ")->result();
            foreach ($yy as $y) {
              $pacn =$y->act_name;
              $pacc =$y->act_code;
            } 
         ?> 
        <tr>
            <td><input type="hidden" name="gl_type[]" value="AMOUNT"> AMOUNT</td>
            <td>
                <div class="input-group">
                <input type="text" class="form-control" readonly="true" name="gl_expenscode[]"  id="amt_accno<?=$key; ?>" value="<?=@$ac->act_code; ?>">
                <span class="input-group-btn" >
                    <button type="button" class="btn btn-info btn-icon" attr-accno="amt_accno" attr-actname="amt_actname" attr-id="<?=$key; ?>" onclick="acc_bun($(this))"><i class="icon-search4"></i></button>
                </span>
                </div>
            </td>
            <td><input type="text" id="amt_actname<?=$key; ?>" value="<?=@$ac->act_name; ?>"  class="form-control " readonly="true"></td>
            <td>
                <input type="hidden" name="gl_costcode[]" value="<?=$s->pettycashi_costcode; ?>">
                <input type="hidden" name="ref_pettycashi_id[]" value="<?=$s->pettycashi_id; ?>">
                <?=$s->pettycashi_costcode; ?>
            </td>
            <td style="text-align: right;"><input type="hidden" name="gl_dr[]" value="<?=$s->pettycashi_unitprice; ?>"><?=number_format($s->pettycashi_unitprice,2); ?></td>
            <td style="text-align: right;"><input type="hidden" name="gl_cr[]" value="0"><?=number_format(0,2); ?></td>    
        </tr>
         <?php
         if ($s->pettycashi_netamt != 0) {
        ?>
        <tr>
            <td><input type="hidden" name="gl_type[]" value="VAT">VAT</td>
            <td>
                <div class="input-group">
                    <input type="text" class="form-control" name="gl_expenscode[]" id="vat_accno<?=$key; ?>" value="<?=@$duec; ?>" readonly="true">
                    <span class="input-group-btn" >
                        <button type="button" class="btn btn-info btn-icon" attr-accno="vat_accno" attr-actname="vat_actname" attr-id="<?=$key; ?>" onclick="acc_bun($(this))"><i class="icon-search4"></i></button>
                    </span>
                </div>
            </td>
            <td><input type="text" id="vat_actname<?=$key; ?>" value="<?=$duen; ?>" class="form-control " readonly="true"></td>
            <td>
                <input type="hidden" name="gl_costcode[]" value="<?=$s->pettycashi_costcode; ?>">
                <?=$s->pettycashi_costcode; ?>
                <input type="hidden" name="ref_pettycashi_id[]" value="<?=$s->pettycashi_id; ?>">
            </td>
            <td style="text-align: right;"><input type="hidden" name="gl_dr[]" value="<?=$s->pettycashi_netamt; ?>"><?=number_format($s->pettycashi_netamt,2); ?></td>
            <td style="text-align: right;"><input type="hidden" name="gl_cr[]" value="0"><?=number_format(0,2); ?></td>  
        </tr>
        <?php
         }
         ?>
        <?php $dr= $dr+$s->pettycashi_netamt;
        if ($s->pettycashi_totwh != 0) {
        ?>
        <tr>
            <td><input type="hidden" name="gl_type[]" value="W/T">W/T</td>
            <td>
                <div class="input-group">             
                    <input type="text" name="gl_expenscode[]" class="form-control" id="wt_accno<?=$key;?>" value="<?=@$wh3c; ?>" readonly="true">
                    <span class="input-group-btn" >
                        <button type="button" class="btn btn-info btn-icon" attr-accno="wt_accno" attr-actname="wt_actname" attr-id="<?=$key; ?>" onclick="acc_bun($(this))"><i class="icon-search4"></i></button>
                    </span>
                </div>
            </td>
            <td><input type="text" class="form-control" id="wt_actname<?=$key;?>" value="<?=$wh3n; ?>" readonly="true"></td>
            <td>
                <input type="hidden" name="gl_costcode[]" value="<?=$s->pettycashi_costcode; ?>">
                <?=$s->pettycashi_costcode; ?>
                <input type="hidden" name="ref_pettycashi_id[]" value="<?=$s->pettycashi_id; ?>">
            </td>
            <td  style="text-align: right;"><input type="hidden" name="gl_dr[]" value="0"><?=number_format(0,2); ?></td>
            <td  style="text-align: right;"><input type="hidden" name="gl_cr[]" value="<?=$s->pettycashi_totwh; ?>"><?=number_format($s->pettycashi_totwh,2); ?></td>  
        </tr>
        <?php
        $cr= $cr+$s->pettycashi_totwh;
        }
        ?>
        <tr>
            <td><input type="hidden" class="form-control" name="gl_type[]" value="VENDER" readonly="true">VENDER</td>
            <td>
                <div class="input-group">
                    <input type="text" class="form-control" name="gl_expenscode[]" id="vn_accno<?=$key;?>" value="<?=@$pacc; ?>" readonly="true">
                    <span class="input-group-btn" >
                        <button type="button" class="btn btn-info btn-icon" attr-accno="vn_accno" attr-actname="vn_actname" attr-id="<?=$key; ?>" onclick="acc_bun($(this))"><i class="icon-search4"></i></button>
                    </span>
                </div>
            </td>
            <td><input type="text" class="form-control" id="vn_actname<?=$key;?>" value="<?=$pacn; ?>" readonly="true"></td>
            <td>
                <input type="hidden" name="gl_costcode[]" value="<?=$s->pettycashi_costcode; ?>">
                <?=$s->pettycashi_costcode; ?>
                <input type="hidden" name="ref_pettycashi_id[]" value="<?=$s->pettycashi_id; ?>">
            </td>
            <td style="text-align: right;"><input type="hidden" name="gl_dr[]" value="0"><?=number_format(0,2); ?></td>
            <td style="text-align: right;"><input type="hidden" name="gl_cr[]" value="<?=($s->pettycashi_unitprice+$s->pettycashi_netamt)-$s->pettycashi_totwh; ?>"><?=number_format((($s->pettycashi_unitprice+$s->pettycashi_netamt)-$s->pettycashi_totwh),2); ?></td>  
      </tr>

    <?php  
    $cr= $cr+($s->pettycashi_unitprice+$s->pettycashi_netamt)-$s->pettycashi_totwh;
    $dr= $dr+$s->pettycashi_unitprice;  
    }  ?>
    <tr>  
        <td colspan="4"></td>
        <td style="text-align: right;"><b><u><input type="hidden" name="todr" value="<?=$dr; ?>"><?=number_format($dr,2); ?></u></b></td>
        <td style="text-align: right;"><b><u><input type="hidden" name="tocr" value="<?=$cr; ?>"><?=number_format($cr,2); ?></u></b></td>
    </tr>
  </tbody>
</table>
<div id="account_md" class="modal fade" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Account</h5>
            </div>

            <div class="modal-body">
                <div id="loadaccchart">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function acc_bun(el)
{
    let _id = el.attr('attr-id');
    let _acno = el.attr('attr-accno');
    let _acname = el.attr('attr-actname');
    // alert(`${_id}, ${_acno}, ${_acname}`)
    //$acc_code, $acc_name, $id
    $('#account_md').modal('show');
    $('#loadaccchart').html("<img src='<?=base_url();?>assets/images/loading.gif'> Loading...");
    $.post(`<?=base_url();?>ap/modal_account/${_acno}/${_acname}/${_id}`,
        function (data, textStatus, jqXHR) {
        }
    ).done(function(data){
        $('#loadaccchart').html(data);
    });
}

</script>
