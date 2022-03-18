<div class="table-responsive">
    <table class="table table-hover table-xs" id="table_account">
        <thead>
            <tr>
                <th>No</th>
                <th>Account Code</th>
                <th>Account Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td><?=$key+1;?></td>
                <td><?=$row->act_code;?></td>
                <td><?=$row->act_name;?></td>
                <td>
                    <button type="button" 
                    acc-code="<?=$row->act_code;?>" 
                    acc-name="<?=$row->act_name;?>" 
                    idname-code="<?=$acc_code;?>" 
                    idname-name="<?=$acc_name;?>" 
                    attr-id="<?=$id;?>" 
                    onclick="account_sel($(this))" 
                    class="btn btn-xs btn-info"
                    data-dismiss="modal"
                    >SELECT</button>
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
$('#table_account').DataTable();
    function account_sel(el)
    {
        let id = el.attr('attr-id');
        let code_val = el.attr('acc-code');
        let name_val = el.attr('acc-name');
        let idname_code = el.attr('idname-code'); //id code ที่จะไปลง
        let idname_name = el.attr('idname-name'); //id name ที่จะไปลง
        // alert(`id = ${id}, 
        // idname_code = ${idname_code}${id}, 
        // idname_name = ${idname_name}${id},
        // code_val = ${code_val},
        // name_val = ${name_val},
        // `)
        $(`#${idname_code}${id}`).val(code_val);
        $(`#${idname_name}${id}`).val(name_val);
    }
</script>
