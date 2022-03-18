<?php
    foreach ($rows as $key => $branch) {
?>
    <option onclick="sel_branch($(this))" branch-code="<?=$branch->branch_code?>" branch-name="<?=$branch->branch_name?>">[<?=$branch->branch_code?>] - <?=$branch->branch_name?></option>      

<?php 
    }
?>
<script>
    function sel_branch(el) {
        
        var branch_code = el.attr('branch-code');
        var branch_name = el.attr('branch-name');
        $('#branch_code_sel').val(branch_code);
        $('#branch_name_sel').val(branch_name);
        // alert(`Branch code = ${branch_code} Branch name = ${branch_name}`)
        $.post(`<?=base_url()?>ap/bank_accountSel/${branch_code}`, function () {     
        }).done(function(data) {
            $('#bank_acc_content').empty();
            $('#bank_acc_content').append(data);
        });
    }
</script>