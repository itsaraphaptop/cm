<?php
    foreach ($rows as $key => $bank_acc) {
?>
    <option onclick="sel_bankAccount($(this))" acc-code="<?=$bank_acc->acc_code?>" acc-name="<?=$bank_acc->acc_name;?>">[<?=$bank_acc->acc_code;?>] - <?=$bank_acc->acc_name?></option>      

<?php 
    }
?>
<script>
    function sel_bankAccount(el) {
        var acc_code = el.attr('acc-code');
        var acc_name = el.attr('acc-name');
        $('#ac_code_sel').val(acc_code);
        $('#ac_name_sel').val(acc_name);
    }
</script>