
<?php
if ($setup == 'ap') {
    foreach ($row as $key => $reten) {
?>
    <tr id="row_retention">
        <td>
            <input type="text" name="type_bu[]" class="form-control" value="RETENTION" readonly="true">
        </td>
        <td>
            <div class="input-group">
                <input type="text" class="form-control" name="aps_paccost_bu[]" id="rencode<?=$key+1;?>"  value="<?=$reten->pac_ret_apv;?>" readonly="true">
                <span class="input-group-btn">
                    <button type="button" row="<?=$key+1;?>" id-name="ren" class="acc_less btn btn-info btn-icon" data-toggle="modal" data-target="#less_modal"><i class="icon-search4"></i></button>
                </span>
            </div>
        </td>
        <td>
            <input type="text" name="" class="form-control" id="renname<?=$key+1;?>" value="<?=$reten->act_name;?>" readonly="true">
        </td>
        <td>
            <input type="text" name="" class="form-control" value="" readonly="true">
        </td>
        <td>
            <input type="text" name="dr_bu[]" class="form-control text-right dr" value="0" readonly="true">
        </td>
        <td>
            <input type="text" name="cr_bu[]" class="form-control text-right cr" id="reten_bun" value="<?=$val;?>" readonly="true">
        </td>
    </tr>
<?php
    }
}
?>

<script>
  $(".acc_less").click(function() {
    var row = $(this).attr("row");
    var id = $(this).attr("id-name");
    $('#con_less').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
    $("#con_less").load(`<?php echo base_url(); ?>share/accc_modal/${row}/${id}`);
    // $("#less_modal").modal("show");
  });
</script>
