<table class="table table-condensed table-hover table-xs" id="custommer_table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Customer Code</th>
            <th>Customer Name</th>
            <th>Select</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($debtor as $key => $value) {
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$value->debtor_code;?></td>
            <td><?=$value->debtor_name;?></td>
            <td>
                <button 
                    type="button" 
                    debtor-id="<?=$value->debtor_id;?>" 
                    debtor-code="<?=$value->debtor_code;?>" 
                    debtor-name="<?=$value->debtor_name;?>" 
                    class="btn btn-xs btn-primary"
                    onclick="selCus($(this))"
                    data-dismiss="modal"
                >
                    select
                </button>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript">
    $('#custommer_table').DataTable({
        "pageLength": 10
    });
    function selCus(el) {
        var debtor_id   = el.attr('debtor-id');
        var debtor_code = el.attr('debtor-code');
        var debtor_name = el.attr('debtor-name');

        $('#cus_id').val(debtor_id);
        $('#cus_code').val(debtor_code);
        $('#cus_name').val(debtor_name);
        // alert(pro_id + ' ' + pro_code + ' ' + pro_name);
    }
</script>