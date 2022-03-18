<table class="table table-bordered table-hover table-xxs" id="other_project_table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Invoice No.</th>
            <th>Project Code</th>
            <th>Project Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($other_pro as $key => $value) { 
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$value->ot_code;?></td>
            <td><?=$value->ot_pro_code;?></td>
            <td><?=$value->ot_pro_name;?></td>
            <td>
                <a href="<?=base_url();?>ar/update_other/<?=$value->ot_id;?>"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="<?=base_url();?>ar/del_other_id/<?=$value->ot_id;?>" style="color:red;"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php 
            } 
        ?>
    </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
    $('#other_project_table').DataTable({
        "pageLength": 10,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        columnDefs: [{
            orderable: false,
            width: '500px',
            targets: [ 3 ]
        }],
        "language": {
            "emptyTable": "ไม่พบข้อมูล"
        }
    });
</script>