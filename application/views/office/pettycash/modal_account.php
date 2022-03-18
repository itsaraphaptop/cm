<div class="table-responsive">
    <table class="table table-hover table-xs" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>ค่าใช้จ่ายในการเบิก</th>
                <th>Ap Exp</th>
                <th>AC Code</th>
                <th>Cost Code</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($rows as $key => $row) {
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$row->act_name;?></td>
            <td><?=$row->act_code;?></td>
            <td><?=$row->act_code;?></td>
            <td></td>
            <td>
                <button 
                    type="button" 
                    class="btn btn-default" 
                    onclick="account($(this))" 
                    attr-code="<?=$row->act_code;?>" 
                    attr-name="<?=$row->act_name;?>"
                    data-dismiss="modal"
                >
                    button
                </button>
            </td>
        </tr>
        <?php 
        }
        ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
function account(el) {
    var code = el.attr('attr-code');
    var name = el.attr('attr-name');

    $('#newmatcode_edit').val(code);
    $('#newmatname_edit').val(name);
}

$('#table1').DataTable();

</script>

