<?php
    $i = 1;
    foreach ($ar_list as $key => $value) { 
    $i++;
?>
    <tr>
        <td><?= $value->ref_invice ?></td>
        <td><?= $value->ar_no ?></td>
        <td><?= $value->system_name ?></td>
        <td><?= $value->remark ?></td>
        <td class="text-right"><?= number_format($value->amount,2) ?></td>
        <td class="text-right"><?= number_format($value->net_amount,2) ?></td>
        <td>
            <button class="btn btn-primary add_row" ref_invoice="<?= $value->ref_invice ?>">เลือก</button>
        </td>
    </tr> 
<?php
    }
?>

<script type="text/javascript">
$('.add_row').click(function(event) {
   $('#system').attr('disabled', 'true');
   $(this).remove();
   var invoice = $(this).attr('ref_invoice');
   $.ajax({
       url: '<?= base_url() ?>ar/refinvoice',
       type: 'POST',
       data: {invoice_no: invoice},
       async: false,
   })
   .done(function(data) {

        var json = jQuery.parseJSON(data);
        // console.log(json);
        
        $.each(json, function(index, val) {
            var n = $('#other_tr tr').length;
            if (n == 0) {
                var row = n+1;
            }else{
                var row = n;
        
            }
            // var row = n+index;
            // console.log(row);

            var tr = `<tr>
                        <td>${invoice} <input type="hidden" name="invoice" value="${invoice}"></td>
                        <td>${val.otde_des} <input type="hidden" name="invoice_des[]" value="${val.otde_des}"></td>
                        <td>
                            <input type="text" name="amount[]" class="form-control text-right amt" total_amt="${(val.otde_amount*val.otde_qty)-val.bill_total}" value="${val.otde_amount-val.bill_total}" vat="${val.ot_vat}" wt="${val.ot_wt}" row="${row}">
                            <input type="hidden" name="amount_total[]" value="${val.otde_amount}">
                            <input type="hidden" name="id_in[]" value="${val.otde_id}">
                            <input type="hidden" name="bill_total[]" value="${val.bill_total}">
                            <input type="hidden" name="qty[]" value="${val.otde_qty}">
                            <input type="hidden" name="unit_id[]" value="${val.otde_unit_id}">
                            <input type="hidden" name="unit_code[]" value="${val.otde_unit_code}">
                            <input type="hidden" name="unit_name[]" value="${val.otde_unit_name}">
                            <input type="hidden" name="invoice_id" value="${val.ot_id}">
                        </td>
                        <td>${val.ot_vat}</td>
                        <td>
                            <input type="hidden" name="vat[]" value="${val.ot_vat}">
                            <input type="text" name="vat_amt[]" class="form-control text-right" id="vat${row}" value="${val.otde_vat}">
                        </td>
                        <td>${val.ot_wt}</td>
                        <td>
                            <input type="text" name="wt_amt[]" class="form-control text-right" id="wt${row}" value="${val.otde_atamt}">
                            <input type="hidden" name="wt[]" value="${val.ot_wt}">
                        </td>
                        <td class="text-right">${val.otde_netamount}</td>
                        <td class="text-right">${val.otde_netamount}</td>
                        <td class="text-right">${val.bill_total}</td>
                        <td></td>
                      <tr>`;

            $('#other_tr').append(tr);

        });
   });


   $('.amt').keyup(function(event) {
        var amt = ($(this).attr('total_amt')*1);
        var vat = ($(this).attr('vat')*1);
        var wt = ($(this).attr('wt')*1);
        var row = ($(this).attr('row')*1);
        var amt_key = ($(this).val()*1);
        if (amt_key <= amt ) {
            var _vat = (vat/100)*amt_key;
            var parse_vat =  parseFloat(_vat).toFixed(2);

            var _wt = (wt/100)*amt_key;
            var parse_wt =  parseFloat(_wt).toFixed(2);

            $('#vat'+row).val(parse_vat);
            $('#wt'+row).val(parse_wt);
        }else{
            $(this).val(0);
            $('#vat'+row).val(0);
            $('#wt'+row).val(0);
        }

    });

});
</script>