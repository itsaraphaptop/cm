<table class="table table-condensed table-hover table-xs" id="unit_table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Unit Code</th>
            <th>Unit Name</th>
            <th>Select</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($unit as $key => $value) {
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$value->unit_code;?></td>
            <td><?=$value->unit_name;?></td>
            <td>
                <button 
                    type="button" 
                    unit-id="<?=$value->unit_id;?>" 
                    unit-code="<?=$value->unit_code;?>" 
                    unit-name="<?=$value->unit_name;?>" 
                    class="btn btn-xs btn-primary"
                    onclick="selSys($(this))"
                    data-dismiss="modal"
                    unit-row="<?=$row;?>"
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
    $('#unit_table').DataTable({
        "pageLength": 10
    });
    function selSys(el) {
        var unit_id   = el.attr('unit-id');
        var unit_code = el.attr('unit-code');
        var unit_name = el.attr('unit-name');
        var row = el.attr('unit-row');
        // sys_name
        // sys_code
        // sys_id
        $('#unit_id'+row).val(unit_id);
        $('#unit_code'+row).val(unit_code);
        $('#unit_name'+row).val(unit_name);
        // alert(pro_id + ' ' + pro_code + ' ' + pro_name);
    }
</script>