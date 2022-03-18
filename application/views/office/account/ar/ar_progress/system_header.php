<table class="table table-condensed table-hover table-xs" id="system_table">
    <thead>
        <tr>
            <th>No.</th>
            <th>System Code</th>
            <th>System Name</th>
            <th>Select</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($system as $key => $value) {
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$value->systemcode;?></td>
            <td><?=$value->systemname;?></td>
            <td>
                <button 
                    type="button" 
                    system-id="<?=$value->systemid;?>" 
                    system-name="<?=$value->systemname;?>" 
                    system-code="<?=$value->systemcode;?>" 
                    class="btn btn-xs btn-primary"
                    onclick="selSys($(this))"
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
    $('#system_table').DataTable({
        "pageLength": 10
    });
    function selSys(el) {
        var system_id   = el.attr('system-id');
        var system_code = el.attr('system-code');
        var system_name = el.attr('system-name');
        // sys_name
        // sys_code
        // sys_id
        $('#sys_head_id').val(system_id);
        $('#sys_head_name').val(system_name);
        $('#sys_head_code').val(system_code);
        // alert(pro_id + ' ' + pro_code + ' ' + pro_name);
    }
</script>