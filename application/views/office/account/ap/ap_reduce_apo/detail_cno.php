<?php
    foreach ($rows as $key => $row) {
?>
<tr id="row<?=$row->ex_id*1;?>">                  
    <td>
        <?=$row->expens_name;?>
        <input type="hidden" name="ap_code[]" class="form-control" id="exp<?=$row->ex_id*1;?>" value="<?=$row->expens_name;?>" readonly="true">
        <input type="hidden" id="wt<?=$row->ex_id*1;?>" name="cn_wt[]" value="<?=$row->ex_wt;?>">
        <input type="hidden" id="defalut_amt<?=$row->ex_id*1;?>" value="<?=$row->ex_amt;?>">
    </td>
    <td>
        <?=$row->vender_name;?>
        <input type="hidden" name="ap_vender[]" class="form-control" id="ap_vender<?=$row->ex_id*1;?>" value="<?=$row->vender_name;?>" readonly="true">
    </td>

    <td>
        <?=$row->ex_costcode;?>
        <input type="hidden" name="ap_cost[]" class="form-control" id="ap_cost<?=$row->ex_id*1;?>" value="<?=$row->ex_costcode;?>" readonly="true">
    </td>
    <td>
        <div>
            <input type="text" name="ap_total[]" onkeyup="process($(this))" class="form-control hid<?=$row->ex_id*1;?>" unique-id="<?=$row->ex_id*1;?>" id="ap_total<?=$row->ex_id*1;?>" value="<?=$row->ex_amt;?>" readonly="true">
        </div>
    </td>
    <td>
        <div>
            <input type="text" name="ap_vat[]" onkeyup="process($(this))" class="form-control hid<?=$row->ex_id*1;?>" unique-id="<?=$row->ex_id*1;?>" id="ap_vat<?=$row->ex_id*1;?>" value="<?=$row->ex_vat;?>" readonly="true">
        </div>
    </td>

    <td>
        <div>
            <input type="text" name="cn_vat[]" onkeyup="process($(this))" class="form-control hid<?=$row->ex_id*1;?>" unique-id="<?=$row->ex_id*1;?>" id="cn_vat<?=$row->ex_id*1;?>" value="<?=$row->ex_tovat;?>" readonly="true">
        </div>
    </td>
    <td>
        <div>
            <input type="text" name="ap_netamt[]" onkeyup="process($(this))" class="form-control hid<?=$row->ex_id*1;?>" unique-id="<?=$row->ex_id*1;?>" id="ap_netamt<?=$row->ex_id*1;?>" value="<?=$row->ex_netamt;?>" readonly="true">
        </div>
    </td>

    <td>
        <div>
            <input type="text" name="taxno[]" class="form-control hid<?=$row->ex_id*1;?>" id="tax<?=$row->ex_id*1;?>" value="<?=$row->ex_taxno;?>" readonly="true">
        </div>
    </td>

    <td>
        <div>
            <input type="date" name="tax_date[]" class="form-control hid<?=$row->ex_id*1;?>" id="tax_date<?=$row->ex_id*1;?>"  value="<?=$row->ex_datetax;?>" readonly="true">
        </div>
    </td>
    <td>
    
        <button type="button" 
        class="btn btn-link btn-default"
        style="color:red;cursor:pointer;" 
        onclick="sw_input($(this))" 
        unique-id="<?=$row->ex_id*1;?>"
        >
        <i id="icon<?=$row->ex_id*1;?>" class="icon-pencil"></i>
        </button>
    
        
        <!-- <i class="icon-trash" style="color:#EF6C00;cursor:pointer;" onclick="remove_row($(this))" unique-id="<?=$row->ex_id*1;?>"></i> -->
        <!-- <i class="glyphicon glyphicon-ok" id="save<?=$row->ex_id*1;?>"></i> -->
    </td>
</tr>
<?php 
    }
?>

<script>

// $(function(){

        var status_v = true;
        function sw_input(el)
        {
            const id = el.attr('unique-id');
            if(status_v) {
                status_v = false;
                $(`.hid${id}`).removeAttr('readonly');
                $(`.hid${id}`).parent().attr('class', 'has-warning');
                $(`.hid${id}`).attr('style', 'background-color:#F4FF81');
                $(`#icon${id}`).attr('class', 'icon-floppy-disk');
                el.attr('style', 'color:green;cursor:pointer;');
            }else{
                $(`.hid${id}`).attr('readonly', 'true');
                $(`.hid${id}`).parent().attr('class', 'has-success');
                $(`.hid${id}`).removeAttr('style', 'background-color:#ffffff');
                $(`#icon${id}`).attr('class', 'icon-pencil');
                el.attr('style', 'color:red;cursor:pointer;');
                status_v = true;
            }
        }

        function process(el)
        {
            const id = el.attr('unique-id');
            var val_de = $(`#defalut_amt${id}`).val()*1;
            var amt = $(`#ap_total${id}`).val()*1;
            var vat = $(`#ap_vat${id}`).val()*1;
            var wt = $(`#wt${id}`).val()*1;
            var vatamt = amt*vat/100;

            $(`#ap_netamt${id}`).val(amt+vatamt);
            $(`#cn_vat${id}`).val(vatamt);
            
            if(wt > 0) {
                $(`#wtdr${id}`).val(amt*wt/100);
            }

            if(vat > 0) {
                $(`#vatcr${id}`).val(amt*vat/100);
            }
            
            $(`#amountcr${id}`).val(amt);
            $(`#venderdr${id}`).val(amt+vatamt-(amt*wt/100));


        }

        function remove_row(el)
        {
            const id = el.attr('unique-id');
            $(`#row${id}`).remove();
        }
// })()
</script>

       
