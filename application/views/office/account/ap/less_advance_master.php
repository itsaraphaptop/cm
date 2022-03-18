<?php
    foreach ($row as $key => $down) {
?>
    <tr id="row_down">
        <td>
            <input type="text" name="type_bu[]" class="form-control" value="DOWN" readonly="true">
        </td>
        <td>
            <div class="input-group">
                <input type="text" class="form-control" name="aps_paccost_bu[]" id="advcode<?=$key+1;?>" value="<?=$down->pac_down_apv;?>" readonly="true">
                <span class="input-group-btn">
                    <button type="button" row="<?=$key+1;?>" id-name="adv" class="acc_less_adv btn btn-info btn-icon" data-toggle="modal" data-target="#less_modal"><i class="icon-search4"></i></button>
                </span>
            </div>
        </td>
        <td>
            <input type="text" name="" class="form-control" id="advname<?=$key+1;?>" value="<?=$down->act_name;?>" readonly="true">
        </td>
        <td>
            <input type="text" name="" class="form-control" value="" readonly="true">
        </td>
        <td>
            <input type="text" name="dr_bu[]" class="form-control text-right dr" value="0" readonly="true">
        </td>
        <td>
            <input type="text" name="cr_bu[]" class="form-control text-right cr" id="down_bun" value="<?=$val;?>" readonly="true">
        </td>
    </tr>
<?php
    }
?>
<script>
  $(".acc_less_adv").click(function() {
    var row = $(this).attr("row");
    var id = $(this).attr("id-name");

    $('#con_less').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#con_less").load(`<?php echo base_url(); ?>share/accc_modal/${row}/${id}`);
    // $("#less_modal").modal("show");
  });
</script>
