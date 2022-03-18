<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>Cheque No.</th>
      <th>Cheque Date</th>
      <th>AP Code</th>
      <th>Due Date</th>
      <th>Vender Name</th>
      <th>Type</th>
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
  <?php $n=1; foreach ($opench as $k) {    ?>
    <tr>
      <td><?php echo $k->ap_chno; ?></td>
      <td><?php echo $k->ap_chnodate; ?></td>
      <td><?php echo $k->ap_code; ?></td>
      <td><?php echo $k->api_duedate; ?></td>
      <td><?php echo $k->vender_name; ?></td>
      <td><?php echo $k->api_type; ?></td>    
      <td>
        <button class="openvensmo<?php echo $n; ?> btn btn-primary" data-dismiss="modal" data-amt<?php echo $n; ?>="<?php echo $k->amt_ch; ?>" 
        data-vat<?php echo $n; ?>="<?php echo $k->vat_ch; ?>"
        data-code<?php echo $n; ?>="<?php echo $k->ap_code; ?>"
        data-venname<?php echo $n; ?>="<?php echo $k->vender_name; ?>"
        data-ventax<?php echo $n; ?>="<?php echo $k->vender_tax; ?>"
        data-cheno<?php echo $n; ?>="<?php echo $k->ap_chno; ?>"
        data-chedate<?php echo $n; ?>="<?php echo $k->ap_chnodate; ?>"
        data-bank<?php echo $n; ?>="<?php echo $k->bank_name; ?>"
        data-wt<?php echo $n; ?>="<?php echo $k->wt_ch; ?>"
        data-ret<?php echo $n; ?>="<?php echo $k->api_ret; ?>"
        data-net<?php echo $n; ?>="<?php echo $k->amt_ch; ?>"
        data-netamt<?php echo $n; ?>="<?php echo $k->netamt_ch;?>"
        data-ap_vender<?php echo $n; ?>="<?php echo $k->ap_vender; ?>"
        data-api_project<?php echo $n; ?>="<?php echo $k->api_project; ?>">Select
        </button>
      </td> 
    </tr>   
    <script>
      $(".openvensmo<?php echo $n; ?>").click(function(event) {
        $("#toaaa").val($(this).data('amt<?php echo $n;?>'));
        $("#amt").val($(this).data('net<?php echo $n;?>'));
        $("#kamt").val($(this).data('amt<?php echo $n;?>'));
        $("#toamt").val($(this).data('amt<?php echo $n;?>'));
        $("#namt").val($(this).data('amt<?php echo $n;?>'));
        $("#vatt").val($(this).data('vat<?php echo $n;?>'));
        $("#nvat").val($(this).data('vat<?php echo $n;?>'));
        $("#tovat").val($(this).data('vat<?php echo $n;?>'));
        $("#vatperr").val($(this).data('vat<?php echo $n;?>'));
        $("#vendor_id").val($(this).data('venname<?php echo $n;?>'));
        $("#chno").val($(this).data('cheno<?php echo $n;?>'));
        $("#chdate").val($(this).data('chedate<?php echo $n;?>'));
        $("#bank").val($(this).data('bank<?php echo $n;?>'));
        $("#wt").val($(this).data('wt<?php echo $n;?>'));
        $("#ret").val($(this).data('ret<?php echo $n;?>'));
        $("#pamt").val($(this).data('netamt<?php echo $n;?>'));
        $("#ap_no").val($(this).data('code<?php echo $n;?>'));
        $("#ap_vender").val($(this).data('ap_vender<?php echo $n;?>'));
        $("#vender_name").val($(this).data('venname<?php echo $n;?>'));
        $("#ventax").val($(this).data('ventax<?php echo $n;?>'));
        $("#api_project").val($(this).data('api_project<?php echo $n;?>'));
        $("#netmattot").val($(this).data('netamt<?php echo $n;?>'));
      });
    </script>

    <?php   $n++; } ?>
  </tbody>
</table>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

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


