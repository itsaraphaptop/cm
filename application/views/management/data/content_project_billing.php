<?php $in = 0; $re = 0; ?>
<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="mytable">
    <thead>
        <tr class="bg-info">
            <th rowspan="2">Site No.</th>
            <th rowspan="2">Site Name</th>
            <th colspan="2" class="text-center">Begin of Year</th>
            <?php foreach($mounts as $val) { ?>
            <th colspan="2" class="text-center"><?=$val;?></th>
            <?php }?>
            <th rowspan="2" class="text-center">Invoice Balance</th>
            <th rowspan="2" class="text-center">Total Receipt <?=$year;?></th>
        </tr>
        <tr class="bg-info">
            <th class="text-center">invoice</th>
            <th class="text-center">receipt</th>
        <?php foreach($mounts as $val) { ?>
            <th class="text-center">invoice</th>
            <th class="text-center">receipt</th>
         <?php }?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $row) { ?>
        <tr>
            <td><?=$row['project_code']?></td>
            <td><?=$row['project_name']?></td>
            <td>
                <?php 
                    $sql_invo_begin = "SELECT SUM(ar_account_detail.acc_cr) as inv FROM ar_account_header 
                        INNER JOIN ar_account_detail on ar_account_header.acc_no = ar_account_detail.acc_ref 
                        INNER JOIN project on project.project_id = ar_account_header.acc_project 
                        WHERE ar_account_header.year < '{$year}' 
                        AND project_id = '{$row['project_id']}'";
                    $query = $this->db->query($sql_invo_begin);
                    if($query){
                        $res = $query->result_array();
                    }else{
                        $res = null;
                    }
                    $init_inv_begin = 0;
                    if(isset($init_inv_begin) && $res !== null){
                        echo number_format($res[0]['inv'], 2);
                    }else{
                        echo $init_inv_begin;
                    }
                ?>
            </td>
            <td>
                <?php
                    $sql_rec_begin = "SELECT SUM(ar_receipt_detail.vou_netamt) as rec FROM ar_receipt_header 
                        INNER JOIN ar_receipt_detail ON ar_receipt_header.vou_no = ar_receipt_detail.vou_ref 
                        INNER JOIN project ON project.project_id = ar_receipt_header.vou_project 
                        WHERE ar_receipt_header.vou_year < '{$year}' 
                        AND project.project_id = '{$row['project_id']}'";
                    $query = $this->db->query($sql_rec_begin);
                    if($query){
                        $res = $query->result_array();
                    }else{
                        $res = null;
                    }
                    $init_rec_begin = 0;
                    if(isset($init_rec_begin) && $res !== null){
                        echo number_format($res[0]['rec'], 2);
                    }else{
                        echo $init_rec_begin;

                    }
                ?>
            </td>
            <?php foreach($mounts as $mount => $val) { ?>
            <td class="text-center">
                <?php 
                    $sql_invo = "SELECT SUM(ar_account_detail.acc_cr) as inv FROM ar_account_header 
                        INNER JOIN ar_account_detail on ar_account_header.acc_no = ar_account_detail.acc_ref 
                        INNER JOIN project on project.project_id = ar_account_header.acc_project 
                        WHERE ar_account_header.year = '{$year}' 
                        AND ar_account_header.period = '{$mount}' 
                        AND project.project_id = '{$row['project_id']}'";
                    $query = $this->db->query($sql_invo);
                    if($query){
                        $res = $query->result_array();
                    }else{
                        $res = null;
                    }
                    $init_inv = 0;
                    if(isset($init_inv) && $res !== null){
                        echo number_format($res[0]['inv'], 2);
                        $in +=  $res[0]['inv'];
                    }else{
                        echo $init_inv;
                    }
                ?>
            </td>
            <td class="text-center">
                <?php
                    $sql_rec = "SELECT SUM(ar_receipt_detail.vou_netamt) as rec FROM ar_receipt_header 
                        INNER JOIN ar_receipt_detail ON ar_receipt_header.vou_no = ar_receipt_detail.vou_ref 
                        INNER JOIN project ON project.project_id = ar_receipt_header.vou_project
                        WHERE 
                        -- ar_receipt_header.vou_arno = '{$row['acc_no']}' 
                        -- AND 
                        ar_receipt_header.vou_year = '{$year}' 
                        AND ar_receipt_header.vou_period = '{$mount}' 
                        AND project.project_id = '{$row['project_id']}'";
                    $query = $this->db->query($sql_rec);
                    if($query){
                        $res = $query->result_array();
                    }else{
                        $res = null;
                    }
                    $init_rec = 0;
                    if(isset($init_rec) && $res !== null){
                        echo number_format($res[0]['rec'], 2);
                        $re += $res[0]['rec'];
                    }else{
                        echo $init_rec;
                    }
                ?>
            </td>
            <?php }?>
            <td><?=number_format($in, 2); $in = 0;?></td>
            <td><?=number_format($re, 2); $re = 0;?></td>
        </tr>
        <?php }?>
    </tbody>
</table>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script>
$.extend( $.fn.dataTable.defaults, {
								     autoWidth: false,
								     columnDefs: [{
								         orderable: false,
								         width: '100px',
								         targets: [ 2 ]
								     }],
								     dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
								     language: {
								         search: '<span>Filter:</span> _INPUT_',
								         lengthMenu: '<span>Show:</span> _MENU_',
								         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
								     },
								     drawCallback: function () {
								         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
								     },
								     preDrawCallback: function() {
								         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
								     }
								 });
    $("#mytable").DataTable({});
</script>