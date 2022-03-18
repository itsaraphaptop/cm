<?php 
  $this->db->select('*');
  $this->db->from('ap_billsuc_header');
  $this->db->join('vender', 'vender.vender_id = ap_billsuc_header.ap_bill_vender','left outer');
  $this->db->where('ap_bill_code',$no);
  $dd=$this->db->get()->result();
    
  foreach ($dd as $hd ) {
  $taxname = $hd->vender_name;
  $taxid = $hd->vender_id; 
  $pay = $hd->ap_pay;
  $vat = $hd->ap_vatper;

  }  ?>  

<div class="table table-responsive">
<button id="addTax" type="button" class="btn btn-default"><i class=""></i>Add Tax</button>
<input type="hidden" id="ven_name" value="<?php echo $taxname; ?>">
<input type="hidden" id="ven_id" value="<?php echo $taxid; ?>">
  <table class="table table-xxs">
    <thead>
      <tr>
        
        <th width="30%">Vender Name</th>
        <th class="text-center" width="10%">Tax ID</th>
        <th class="text-center" width="15%">Tax Date</th>
        <th class="text-center" width="15%">Tax No</th>
        <th class="text-center" width="15%">Amount</th>
        <th class="text-center" width="10%">VAT Amount</th>
      </tr>
    </thead>
    <tfoot>
      <tr class="sum">
        <td colspan="4">Total</td>
        <td id="sum_amount"></td>
        <td id="sum_vat_amount"></td>
      </tr>
    </tfoot>
    <tbody id="tax_tr">
    <?php $i=1; ?>
      <tr>
        <td><input type="text" readonly="true" class="form-control input-sm" id="taxname<?=$i;?>" value="<?php echo $taxname; ?>"></td>
        <td><input type="text" maxlength="13" class="form-control input-sm" name="taxid[]" id="taxid<?=$i;?>" value="<?php echo $taxid; ?>"></td>
        <td><input type="date" name="taxdate_tax[]" id="taxdate<?=$i;?>" onchange="set_sys_new(<?=$i;?>, 'taxdate', 'taxiv')" class="form-control input-sm" value="<?php echo date("Y-m-d");?>"></td>
        <td><input type="text"  name="taxiv[]" id="taxiv<?=$i;?>" onkeyup="set_sys_new(<?=$i;?>, 'taxdate', 'taxiv')" class="form-control input-sm"></td>
        <td><input type="text" name="amt_tax[]" class="form-control input-sm amount_row" onkeyup="sum_cal('amount_row','sum_amount', <?=$i;?>)" value="<?php echo $pay; ?>"></td>
        <td><input type="text" name="vatamt_tax[]" class="form-control input-sm vat_amount_row" onkeyup="sum_cal('vat_amount_row','sum_vat_amount', <?=$i;?>)" value="<?php echo $vat; ?>"></td>
      </tr>
    </tbody>
  </table>
</div>
<script>
  function sum_cal(className, sum_id, id) {
    // sum_table_col()
    sum_table_col(className, sum_id);
    sum_table_row(id);
    sum_table_col('vat_amount_row', 'sum_vat_amount');
    sum_table_col('vat_row', 'sum_vat');
  }
  function sum_table_col(className, sum_id) {
    let sum = 0;
    let vat_amount = 0;
    let val = 0;
    $(`.${className}`).each(function(){
      val = $(this).val()*1;
      sum += parseFloat(val);
      console.log(sum);
      $(`#${sum_id}`).html(sum);
    });
  }

  function sum_table_row(id) {
    let amount = $(`#amtax${id}`).val()*1;
    let vat = $(`#vattax${id}`).val()*1;
    let amttax = amount*vat/100;
    $(`#amttax${id}`).val(amttax);
  }
$('#addTax').click(function(){
  let ven_name = $('#ven_name').val();
  let ven_id = $('#ven_id').val();
  let num = $('#tax_tr >tr').length*1+1;
  var tr = `
  <tr>
        <td><input type="text" readonly="true" class="form-control input-sm" id="taxname${num}" value="${ven_name}"></td>
        <td><input type="text" maxlength="13" class="form-control input-sm" name="taxid[]" id="taxid${num}" value="${ven_id}"></td>
        <td><input type="date" name="taxdate_tax[]" id="taxdate${num}" onchange="set_sys_new(${num}, 'taxdate', 'taxiv')" class="form-control input-sm" value=""></td>
        <td><input type="text"  name="taxiv[]" id="taxiv${num}" onkeyup="set_sys_new(${num}, 'taxdate', 'taxiv')" class="form-control input-sm"></td>
        <td><input type="text" name="amt_tax[]" class="form-control input-sm amount_row" onkeyup="sum_cal('amount_row','sum_amount', ${num})" value=""></td>
        <td><input type="text" name="vatamt_tax[]" class="form-control input-sm vat_amount_row" onkeyup="sum_cal('vat_amount_row','sum_vat_amount', ${num})" value=""></td>
      </tr>
  `;
  $('#tax_tr').append(tr);
});

	function set_sys_new(id, name1, name2) {
		const _name1 = $(`#${name1}${id}`).val();
		const _name2 = $(`#${name2}${id}`).val();
		if(_name1 !='' && _name2 !='') {
			// alert('ดึงขาบัญชี')
			$.get("<?=base_url();?>ap/set_sys_new", function () {
			}).done(function(data) {
				let jsonRes = JSON.parse(data);
				$('#acc_no2').val(jsonRes.data.pac_taxvat_due);
				$('#acc_name2').val(jsonRes.data.act_name);
			});
		}
	}

        sum_table_col('amount_row','sum_amount');// sum in table tab TAX
        sum_table_col('vat_amount_row','sum_vat_amount');// sum in table tab TAX

</script>