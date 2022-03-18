<?php
$this->db->select('COUNT(acc_id) as period');
//$this->db->where('acc_project',$no);
$this->db->from('ar_account_header');
$acc_project = $this->db->get()->result();


foreach ($acc_project as $per) {
    if ($per->period == 0) {
        $periodd =  1;
    } else {
        $periodd = $per->period+1;
    }
}
?>
<table class="table table-hover table-xxs basic">
    <thead>
    <tr>
        <th width="5%">No.</th>
        <th width="10%">Invoice No.</th>
        <th width="10%">Invoice Date</th>
        <th width="10%">Type</th>
        <th width="10%">Period</th>
        <th width="20%">Project Name</th>
        <th width="20%">Owner/Customer</th>
        <th width="20%">Voucher No</th>
        <th width="10%">Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
    // echo print_r($app);
    $i=1; foreach ($app as $e) {

    $check_no = substr($e->acc_invno, 0, 4);

    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $e->acc_invno; ?></td>
        <td width="10%"><?php echo $e->acc_billdate; ?></td>
        <td><span class="label label-success"><?php echo $e->acc_invtype; ?></span></td>
        <td><?php echo $e->acc_period; ?></td>
        <?php
        ?>
        <td><?php echo $e->project_name; ?></td>
        <td><?php echo $e->debtor_name; ?></td>
        <td><?php echo $e->acc_no; ?></td>
        <td>
            <button class="sel<?php echo $i;?> btn btn-xs btn-block btn-info"
                    data-toggle="modal"  data-vou_no<?php echo $i;?>="<?php echo $e->acc_no; ?>"
                    data-taxno<?php echo $i;?>="<?php echo $e->acc_invtype; ?>"
                    data-amt<?php echo $i;?>="<?php echo $e->acc_cusamt; ?>"
                    data-vatamt<?php echo $i;?>="<?php echo $e->acc_invvat; ?>"
                    data-wtamt<?php echo $i;?>="<?php echo $e->acc_invwt; ?>"
                    data-advamt<?php echo $i;?>="<?php echo $e->acc_advamt; ?>"
                    data-retamt<?php echo $i;?>="<?php echo $e->acc_retamt; ?>"
                    data-netamt<?php echo $i;?>="<?php echo $e->acc_invamt; ?>"
                    data-type<?php echo $i;?>="<?php echo $e->acc_invtype; ?>"
                    data-dismiss="modal">เลือก</button>
        </td>
        <script>
            $(".sel<?php echo $i; ?>").click(function(){
                $("#invno").val('<?php echo $e->acc_invno; ?>');
                $("#project_id").val('<?php echo $e->project_id; ?>');
                $("#project_name").val('<?php echo $e->project_name; ?>');
                $("#debtor_code").val('<?php echo $e->debtor_code; ?>');
                $("#debtor_name").val('<?php echo $e->debtor_name; ?>');
                $("#debtor_tax").val('<?php echo $e->debtor_tax; ?>');
                $("#acc_period").val('<?php echo $e->acc_period; ?>');
                $("#acc_year").val('<?php echo $e->acc_year; ?>');
                $("#project_lessretention").val('<?php echo $e->project_lessretention; ?>');
                $("#project_vat").val('<?php echo $e->project_vat; ?>');
                $("#project_wt").val('<?php echo $e->project_wt; ?>');
                $("#acc_no").val('<?php echo $e->acc_no; ?>');
                $("#arno").val('<?php echo $e->acc_no; ?>');
                $("#to_amt").val($(this).data('amt<?php echo $i;?>'));
                $("#to_adv").val($(this).data('advamt<?php echo $i;?>'));
                $("#to_wt").val($(this).data('wtamt<?php echo $i;?>'));
                $("#to_ret").val($(this).data('retamt<?php echo $i;?>'));
                $("#to_vat").val($(this).data('vatamt<?php echo $i;?>'));
                $("#to_net").val($(this).data('netamt<?php echo $i;?>'));
                $("#acc_type").val($(this).data('type<?php echo $i;?>'));

                $("#iii").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                $("#iii").load('<?php echo base_url(); ?>ar/load_credit_v/<?php echo $e->acc_no; ?>/<?php echo $e->acc_invtype; ?>');

                $("#gl").load('<?php echo base_url(); ?>ar/gl_credit_v/<?php echo $e->acc_no; ?>/<?php echo $e->acc_invtype; ?>');

            });
        </script>
        <?php $i++; } ?>
    </tr>

    </tbody>
</table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 0 ]
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
  $('.basic').DataTable();
</script>