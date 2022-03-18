<!-- <?php echo '<pre>';var_dump($rows); ?> -->
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Ref Voucher No.</th>
                <th>Amount</th>
                <th>Full Amount</th>
                <th>Prev. Amt.</th>
                <th>Tax No</th>
                <th>PO No</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($rows as $key => $less) {
                if(($less->apd_amount -$less->down_pay) != 0 ) {
        ?>
            <tr>
                <td><?=$key+1;?></td>
                <td><?=$less->apd_code; ?>
                    <input type="hidden" name="apd_code_less[]" value="<?=$less->apd_code; ?>">
                    <input type="hidden" name="less_id[]" value="<?=$less->id; ?>">
                </td>
                <td>
                    <input type="hidden" id="cost<?=$less->id; ?>" value="<?=$less->down - $less->sumdown ;?>">
                    <input type="text" class="form-control input-xs" price-default="<?=$less->apd_amount - $less->down_pay ;?>" name="amount_ch_less[]" onkeyup="amtDown($(this))" id="inputamt<?=$less->id; ?>" attr-id="<?=$less->id; ?>" value="">
                </td>
                <td><?=$less->apd_amount ;?></td>
                <td><?=$less->down_pay;?></td>
                <td><?=$less->taxs;?></td>
                <td><?=$less->po_pono;?></td>
            </tr>

        <?php
                }
            }
        ?>
        </tbody>
    </table>
</div>
<script>
function sumdr_new() {
var sumdr_new = 0;
  $('.dr').each(function(index, el){
    sumdr_new += el.value*1;
  });
//   console.log(sumdr_new);
    let format_sumdr_new = numberWithCommas(sumdr_new);
  $('#sffumdr').val(format_sumdr_new);
}

function sumcr_new() {
var sumcr_new = 0;
  $('.cr').each(function(index, el){
    sumcr_new += el.value*1;
  });
//   console.log(sumcr_new);
   let format_sumcr_new = numberWithCommas(sumcr_new);
  $('#sffumcr').val(format_sumcr_new);
}
function amtDown(el) {
    let val = el.val()*1;
    let price = el.attr('price-default')*1;
    // alert(default);
    if(val > price) {
        el.val(price);
    }
    // if(val <= price){
    //     // $('#down_bun').val(val);

    //     let amt = $('#amount').val()*1;
    //     let vat = $('#pprice_unit').val()*1;
    //     let amtdown = amt - val;
    //     // alert(`${amt} - ${val} = ${amtdown}`)
    //     let netamt = amtdown*vat/100;
    //     // alert(`${amtdown} x ${vat}%100 = ${netamt}`)
    //     let summ = amtdown + netamt;
    //     // alert(`${amtdown} + ${netamt} = ${summ}`)
    //     // let reten = $('#retention_value').val()*1;
    //     let total = summ - reten;
    //     $('#dr_vat').val(netamt);
    //     // alert(`${summ} - ${reten} = ${total}`);
    //     // $("#pamountt").val(netamt);
    //     // $('#vender_bu').val(total);
    //     sumdr_new();
    //     sumcr_new();
    //     // $('#sffumcr').val();
    //     // $('#sffumdr').val();
    // }else{
    //     $('#vender_bu').val(price);
    //     // $('#downper_value').val(price);
    //     el.val(price);
    // }
//     let id = el.attr('attr-id');
    
//     if(val > $(`#cost${id}`).val()*1) {
//         $(`#inputamt${id}`).val($(`#cost${id}`).val());
//     }
}
</script>
