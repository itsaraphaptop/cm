<table id="" class="table table-xxs table-hover datatable-basicxc<?php echo $id; ?>" >
<thead>
<tr>
<th>No.</th>
<th>Deptor Code</th>
<th>Deptor Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody>
<?php  $n =1; foreach ($res as $val){ ?>
<tr>
<th scope="row"><?php echo $n;?></th>
<td><?php echo $val->act_code; ?></td>
<td><?php echo $val->act_name; ?></td>
<td><button class="opendeptor<?php echo $n;?> btn btn-xs btn-block btn-primary"  data-toggle="modal" data-dismiss="modal">SELECT</button></td>
</tr>
<script>
  $(".opendeptor<?php echo $n;?>").click(function(event) {
    $("#accno").val("<?php echo $val->act_code; ?>");
    $("#accnor").val("<?php echo $val->act_code; ?>");
    $("#eaccnor").val("<?php echo $val->act_code; ?>");
    $("#accountname").val("<?php echo $val->act_name; ?>");
    $("#accno<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#accountname<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");

    $("#ac_code").val("<?php echo $val->act_code; ?>");
    $("#act_name").val("<?php echo $val->act_name; ?>");

    $("#acc_code<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#act_name<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");

    $("#at_acaid<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#at_aca<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");
    $("#at_codename<?php echo $id; ?>").val("<?php echo $val->act_code; echo" "; echo $val->act_name; ?>");
    
    $("#at_acdid<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#at_acd<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");
    $("#at_costid<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#at_cost<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");
    $("#at_acaccid<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    $("#at_acacc<?php echo $id; ?>").val("<?php echo $val->act_name; ?>");

    $("#ac_code").val("<?php echo $val->act_code; ?>");
    $("#ac_name").val("<?php echo $val->act_name; ?>");
    
    $("#off_apcode").val("<?php echo $val->act_code; ?>");
    $("#off_apname").val("<?php echo $val->act_name; ?>");

    $('#off_apcode<?php echo $id; ?>').val("<?php echo $val->act_code; ?>");
    $('#off_apname<?php echo $id; ?>').val("<?php echo $val->act_name; ?>");

    $('#acctotal<?php echo $id; ?>').modal('toggle');
    $("#acctotal_total<?php echo $id; ?>").empty();



    if(<?php echo $id; ?>=="1"){
        $("#at_acaid<?php echo $id; ?>").val("<?php echo $val->act_code; ?>");
    }
  });
</script>
<?php $n++; } ?>
</tbody>
</table>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>

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
  $('.datatable-basicxc<?php echo $id; ?>').DataTable();
</script>