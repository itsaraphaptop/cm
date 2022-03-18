<tr>
    <td>
        <input type="hidden" value="I" name="qtyi[]" ><input type="hidden" value=".$type." name="ap_type[]" ><input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value=".$co->cnoi_ref." id="ap_code.$co->cnoi_ref." name="ap_code[]">
        <input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value=".$co->cno_project." id="ap_project.$co->cnoi_ref." name="ap_project[]">
        <input type="hidden" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value=".$co->cno_system." id="ap_system.$co->cnoi_ref." name="ap_system[]">
    </td>
    <td>
        <input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="$co->cno_date" id="ap_duedate$co->cnoi_ref" name="ap_duedate[]">
    </td>
    <td>
        <input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="$co->ap_code" id="ap_pono$co->cnoi_ref" name="ap_pono[]">
    </td>
    <td>
        <input type="text" style="width: 120px;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="$co->cno_inv" id="ap_inv$co->cnoi_ref" name="ap_inv[]">
    </td>
    <td>
        <input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="$co->sum_dis" id="ap_netamt1$co->cnoi_ref" name="ap_netamt1[]">
    </td>
    <td>
        <input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_less$co->cnoi_ref" name="ap_less[]">
    </td>
    <td>
        <input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="$co->sum_net" id="ap_amt1$co->cnoi_ref" name="ap_amt1[]">
    </td>
    <td>
        <input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_adv$co->cnoi_ref" name="ap_adv[]">
    </td>
    <td>
        <input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="$co->cnoi_vat" id="ap_vat1$co->cnoi_ref" name="ap_vatamt1[]">
    </td>
    <td>
        <input type="text" style="width: 120px;text-align: right;color: #2b2828;background-color: rgba(85, 85, 85, 0);border: aliceblue;" readonly="true" value="0" id="ap_wt1$co->cnoi_ref" name="ap_wtamt1[]">
    </td>;
</tr>
<script>
    // var toa = parseFloat($("#toa").val());
    // var tot = parseFloat($("#tot").val());
    // var tov = parseFloat($("#tov").val());
    // var toadv = parseFloat($("#toadv").val());
    // var tow = parseFloat($("#tow").val());
    // var tovat = parseFloat($("#ap_vat1.$co->cnoi_ref.").val());
    // var towt = parseFloat($("#ap_wt1.$co->cnoi_ref.").val());
    // var tadv = parseFloat($("#ap_adv.$co->cnoi_ref.").val());
    // var total = parseFloat($("#ap_netamt1.$co->cnoi_ref.").val());
    // var toamt = parseFloat($("#ap_amt1.$co->cnoi_ref.").val());
    // var tt = tot-total;
    // var ta = toa-toamt;
    // var tv = tov-tovat;
    // var tw = tow-towt;
    // var tadv = tadv+tadv;
    // $("#tot").val(tt);
    // $("#toa").val(ta);
    // $("#tov").val(tv);
    // $("#tow").val(tw);
    // $("#toadv").val(tadv);
</script>; 
