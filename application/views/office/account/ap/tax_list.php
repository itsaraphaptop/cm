<?php 
    foreach ($tax_lists as $key => $list) {
?>
<tr>
    <td>
    <input type="text" name="list_id[]" value="<?=$list->ap_id;?>">
        <input type="text" class="form-control input-xs" value="<?=$list->vender_name;?>" readonly="true">
        <input type="hidden" class="form-control input-xs" name="vender_id[]" value="<?=$list->vender_id;?>" readonly="true">
    </td>
    <td><input type="date" class="form-control input-xs" name="tax_date[]" value="<?=$list->ap_taxdate;?>"></td>
    <td><input type="text" class="form-control input-xs" name="taxno[]" value="<?=$list->ap_taxno;?>"></td>
    <td><input type="text" class="form-control input-xs" name="amtvat[]" value="<?=$list->ap_amtvat;?>"></td>
    <td><input type="text" class="form-control input-xs" name="netamt[]" value="<?=$list->ap_netamt;?>"></td>
</tr>
<?php
    }
?>

