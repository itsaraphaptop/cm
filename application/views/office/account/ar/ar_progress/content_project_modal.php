<table class="table table-condensed table-hover table-xs" id="project_table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Project Code</th>
            <th>Project Name</th>
            <th>Select</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($project as $key => $value) {
        ?>
        <tr>
            <?php
                if($value->debtor_credit > 0) {
                    $date = date('Y-m-d');
                    $date1 = str_replace('-', '/', $date);
                    $duedate = date('Y-m-d',strtotime($date1 . "+".$value->debtor_credit." days"));
                }else{
                    $duedate ='';
                }
            ?>
            <td><?=$key+1;?></td>
            <td><?=$value->project_code;?></td>
            <td><?=$value->project_name;?></td>
            <td>
                <button 
                    type="button" 
                    pro-id="<?=$value->project_id;?>" 
                    pro-code="<?=$value->project_code;?>" 
                    pro-name="<?=$value->project_name;?>" 
                    pro-wt="<?=$value->project_wt;?>" 
                    pro-vat="<?=$value->project_vat;?>" 
                    pro-mcode="<?=$value->project_mcode;?>" 
                    debtor-id="<?=$value->debtor_id;?>" 
                    debtor-name="<?=$value->debtor_name;?>" 
                    debtor-credit="<?=$value->debtor_credit;?>" 
                    duedate="<?=$duedate;?>" 
                    class="btn btn-xs btn-primary"
                    onclick="selPro($(this))"
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
    $('#project_table').DataTable({
        "pageLength": 10
    });
    function selPro(el) {
        var pro_id = el.attr('pro-id');
        var pro_code = el.attr('pro-code');
        var pro_name = el.attr('pro-name');
        var pro_wt = el.attr('pro-wt');
        var pro_vat = el.attr('pro-vat');
        var pro_mcode = el.attr('pro-mcode');
        var debtor_id = el.attr('debtor-id');
        var debtor_name = el.attr('debtor-name');
        var debtor_credit = el.attr('debtor-credit');
        var duedate = el.attr('duedate');

        $('#pro_id').val(pro_id);
        $('#pro_code').val(pro_code);
        $('#pro_name').val(pro_name);
        $('#cus_id').val(debtor_id);
        $('#cus_code').val(pro_mcode);
        $('#cus_name').val(debtor_name);
        $('#cr_term').val(debtor_credit);
        $('#ot_wt').val(pro_wt);
        $('#ot_vat').val(pro_vat);
        $('#duedate').val(duedate);

        $('#depart_id').val('');
        $('#depart_code').val('');
        $('#depart_name').val('');
        // alert(pro_id + ' ' + pro_code + ' ' + pro_name);
    }
</script>