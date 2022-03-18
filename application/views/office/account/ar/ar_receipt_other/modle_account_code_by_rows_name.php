<table class="table table-striped basic">
    <thead>
        <tr>
            <th>ACC CODE</th>
            <th>ACC NAME</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody id="account_data">

        <?php 
            foreach ($account_code as $key => $value) {
                if($value->act_header=="H"){
        ?>
            <tr class="info">
                <td><?= $value->act_code ?></td>
                <td><?= $value->act_name ?></td>
                <td></td>
            </tr>
        <?php
                }else{    
        ?>
            <tr>
                <td><?= $value->act_code ?></td>
                <td><?= $value->act_name ?></td>
                <td><button class="btn btn-primary" onclick="acc_add('<?= $value->act_code ?>','<?= $value->act_name ?>')"  data-dismiss="modal">Select</button></td>
            </tr>
        <?php
                 }
            }
        ?>
            
    </tbody>
</table>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script type="text/javascript">
    $('.basic').DataTable();
    function acc_add(code,name) {
        var id = '<?= $row ?>';
        var row_id = '<?= $row_id ?>';
        var row_name = '<?= $row_name ?>';
        $('#'+row_id+id).val(code);
        $('#'+row_name+id).val(name);
    }
</script>