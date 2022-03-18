<div class="table table-responsive">
  <table class="table table-xxs">
    <thead>
      <tr>
        
        <th width="20%">Vender Name</th>
        <th width="15%">Tax ID</th>
        <th class="text-center" width="5%">Tax Date</th>
        <th class="text-center" width="20%">Tax No</th>
        <th class="text-center" width="10%">Amount</th>
        <th class="text-center" width="10%">VAT Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       <?php 
        foreach ($poitemvat as $key => $v) {
        ?>
        
        <td>
        <input type="hidden" readonly="true" class="form-control input-sm" value="<?=$v['ver_id'];?>" name="venid_tax[]">
        <input type="text" readonly="true" class="form-control input-sm" name="vendername[]" value="<?=$v['ver_name'];?>"></td>
         <td><input type="text" class="form-control input-sm" name="apvtaxno[]" onkeyup="set_sys_new('', 'apvtaxno', 'taxdate')" maxlength="13" id="apvtaxno<?=$key+1;?>" value=""></td>
        <td width="5%"><input type="date" class="form-control" name="taxdate[]" onchange="set_sys_new('', 'apvtaxno', 'taxdate')" value="<?=$v['tax_date'];?>"></td>
        <td><input type="text" class="form-control input-sm" value="<?=$v['tax_no'];?>" name="taxiv[]" id="taxiv<?=$key+1;?>"></td>
        <td><input type="text" class="form-control input-sm text-right" name="tax_amt[]" value="<?=$v['sum_amt'] - ($v['sum_amt'] * $downper/100);?>"  readonly="true"></td>
        <td><input type="text" class="form-control input-sm text-right" name="vat_tax[]" value="<?=($v['sum_amt'] - ($v['sum_amt'] * $downper/100)) *$v['vatper']/100;?>"  readonly="true"></td>
      </tr>
      <?php
      }
    ?>      
    </tbody>
  </table>
</div>
<script>
  function set_sys_new(id, name1, name2) {
    const _name1 = $(`#${name1}${id}`).val();
    const _name2 = $(`#${name2}${id}`).val();
    if(_name1 !='' && _name2 !='') {
      // alert('ดึงขาบัญชี')
      $.get("<?=base_url();?>ap/set_sys_new", function () {
      }).done(function(data) {
        let jsonRes = JSON.parse(data);
        $('#acc_no3').val(jsonRes.data.pac_taxvat_due);
        $('#acc_name3').val(jsonRes.data.act_name);
      });
    }else{
      $.get("<?=base_url();?>ap/set_sys_old", function () {
      }).done(function(data) {
        let jsonRes = JSON.parse(data);
        // $('#acc_no2').val(jsonRes.data.pac_taxvat_due);
        // $('#acc_name2').val(jsonRes.data.act_name);
        $('#acc_no3').val(jsonRes.data.pac_taxvat_nodue);
        $('#acc_name3').val(jsonRes.data.act_name);
        
      });
    }
  }
   $("#taxiv").keyup(function(){
  var taxiv = $('#taxiv').val();
  $('#taxno').val(taxiv);
  var vcode = $('#yvatcode').val();
  var yname = $('#yvatname').val();
  $('#vcode').val(vcode);
  $('#vname').val(yname);
  });
</script>