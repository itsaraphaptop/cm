<table class="table table-condensed table-hover table-xs" id="department_table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Derartment Code</th>
            <th>Derartment Name</th>
            <th>Select</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($department as $key => $value) {
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$value->department_code;?></td>
            <td><?=$value->department_title;?></td>
            <td>
                <button 
                    type="button" 
                    depart-id="<?=$value->department_id;?>" 
                    depart-code="<?=$value->department_code;?>" 
                    depart-name="<?=$value->department_title;?>" 
                    class="btn btn-xs btn-primary"
                    onclick="selDepart($(this))"
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
    $('#department_table').DataTable({
        "pageLength": 10
    });
    function selDepart(el) {
        var depart_id   = el.attr('depart-id');
        var depart_code = el.attr('depart-code');
        var depart_name = el.attr('depart-name');

        $('#depart_id').val(depart_id);
        $('#depart_code').val(depart_code);
        $('#depart_name').val(depart_name);

        $('#ot_wt').val('');
        $('#ot_vat').val('');

        $('#pro_id').val('');
        $('#pro_code').val('');
        $('#pro_name').val('');
        // alert(pro_id + ' ' + pro_code + ' ' + pro_name);
    }
</script>