<table class="table table-xxs table-hover basic" >
<thead>
<tr>
<th width="20%">ACC CODE. <?php echo $id; ?></th>
<th>ACC Name</th>
<th>Type</th>
<th width="5%">Action</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<?php if ($val->act_header=="H"): ?>
 <tr class="info">
    <th scope="row"><?php echo $val->act_code;?></th>
    <td><?php echo $val->act_name; ?></td>
    <td><?php echo $val->act_header; ?></td>
    <td>
        <!-- <button class="select<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button> -->
    </td>
</tr>   
<?php else: ?>
<tr>
    <th scope="row"><?php echo $val->act_code;?></th>
    <td><?php echo $val->act_name; ?></td>
    <td><?php echo $val->act_header; ?></td>
    <td><button class="select<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
</tr>
<?php endif ?>


<script type="text/javascript">
    $(".select<?php echo $n; ?>").click(function(){
        switch(<?php echo $id; ?>) {
            case 1:
                $("#pac_cost_mat").val("<?php echo $val->act_code; ?>");
                break;
            case 2:
                $("#pac_cost_cont").val("<?php echo $val->act_code; ?>");
                break;
            case 3:
                $("#pac_cost_cont_mat").val("<?php echo $val->act_code; ?>");
                break;
            case 4:
                $("#pac_costexpens_ex").val("<?php echo $val->act_code; ?>");
                break;
            case 5:
                $("#pac_expens").val("<?php echo $val->act_code; ?>");
                break;
            case 6:
                $("#pac_taxvat_due").val("<?php echo $val->act_code; ?>");
                break;
            case 7:
                $("#pac_taxvat_nodoc").val("<?php echo $val->act_code; ?>");
                break;
            case 8:
                $("#pac_taxvat_nodue").val("<?php echo $val->act_code; ?>");
                break;
            case 9:
                $("#pac_vender_inmat").val("<?php echo $val->act_code; ?>");
                break;
            case 10:
                $("#pac_vender_inoth").val("<?php echo $val->act_code; ?>");
                break;
            case 11:
                $("#pac_vender_dow").val("<?php echo $val->act_code; ?>");
                break;
            case 12:
                $("#pac_vender_incont").val("<?php echo $val->act_code; ?>");
                break;
            case 13:
                $("#pac_vender_retcont").val("<?php echo $val->act_code; ?>");
                break;
            case 14:
                $("#pac_down_apv").val("<?php echo $val->act_code; ?>");
                break;
            case 15:
                $("#pac_ret_apv").val("<?php echo $val->act_code; ?>");
                break;
            case 16:
                $("#pac_whtax_3").val("<?php echo $val->act_code; ?>");
                break;
            case 17:
                $("#pac_whtax_53").val("<?php echo $val->act_code; ?>");
                break;
            case 18:
                $("#pac_whtax_1").val("<?php echo $val->act_code; ?>");
                break;
            case 19:
                $("#pac_whtax_2").val("<?php echo $val->act_code; ?>");
                break;
            case 20:
                $("#pac_whtax_54").val("<?php echo $val->act_code; ?>");
                break;
            case 21:
                $("#pac_item_bal").val("<?php echo $val->act_code; ?>");
                break;
            case 22:
                $("#pac_chqpost").val("<?php echo $val->act_code; ?>");
                break;
            case 23:
                $("#ar_arlt").val("<?php echo $val->act_code; ?>");
                break;
            case 24:
                $("#ar_arolt").val("<?php echo $val->act_code; ?>");
                break;
            case 25:
                $("#ar_arr").val("<?php echo $val->act_code; ?>");
                break;
            case 26:
                $("#ar_wtdss").val("<?php echo $val->act_code; ?>");
                break;
            case 27:
                $("#ar_wtdsc").val("<?php echo $val->act_code; ?>");
                break;
            case 28:
                $("#ar_arcs").val("<?php echo $val->act_code; ?>");
                break;
            case 29:
                $("#ar_sov").val("<?php echo $val->act_code; ?>");
                break;
            case 30:
                $("#ar_ov").val("<?php echo $val->act_code; ?>");
                break;
            case 31:
                $("#ar_ppr").val("<?php echo $val->act_code; ?>");
                break;
            case 32:
                $("#ar_prechq").val("<?php echo $val->act_code; ?>");
                break;
            case 33:
                $("#ar_aroin").val("<?php echo $val->act_code; ?>");
                break;
            case 34:
                $("#ar_ret_sale").val("<?php echo $val->act_code; ?>");
                break;
            case 35:
                $("#ar_down_sale").val("<?php echo $val->act_code; ?>");
                break;
            case 36:
                $("#ar_cost_sale").val("<?php echo $val->act_code; ?>");
                break;
            case 37:
                $("#ar_rev_sale").val("<?php echo $val->act_code; ?>");
                break;
            case 38:
                $("#ar_stock").val("<?php echo $val->act_code; ?>");
                break;
            case 39:
                $("#plexc_ac_code").val("<?php echo $val->act_code; ?>");
                break;
            case 40:
                $("#fa_cust").val("<?php echo $val->act_code; ?>");
                break;
            case 41:
                $("#fa_loss").val("<?php echo $val->act_code; ?>");
                break;
            case 42:
                $("#fa_profit").val("<?php echo $val->act_code; ?>");
                break;
            case 43:
                $("#fa_cut").val("<?php echo $val->act_code; ?>");
                break;
            case 44:
                $("#ma_cost_ic").val("<?php echo $val->act_code; ?>");
                break;
            case 45:
                $("#ma_cost_lab").val("<?php echo $val->act_code; ?>");
                break;
            case 46:
                $("#start_cost").val("<?php echo $val->act_code; ?>");
                break;
            case 47:
                $("#end_cost").val("<?php echo $val->act_code; ?>");
                break;
            case 48:
                $("#start_rev").val("<?php echo $val->act_code; ?>");
                break;
            case 49:
                $("#end_rev").val("<?php echo $val->act_code; ?>");
                break;
            case 50:
                $("#start_exp").val("<?php echo $val->act_code; ?>");
                break;
            case 51:
                $("#end_exp").val("<?php echo $val->act_code; ?>");
                break;
        }
    });
</script>
<?php $n++; } ?>
</tbody>
</table>

<!-- /core JS files -->
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
  $('.basic').DataTable();
</script>
