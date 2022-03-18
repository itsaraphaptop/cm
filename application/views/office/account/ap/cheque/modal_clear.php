<table class="table table-hover table-xxs basic">
  <thead>
  <tr>
      <th width="10%" >PL/PV No.</th>
      <!-- <th width="10%" >Paid Date</th>      -->
      <th width="10%">Cheque</th>
      <th width="10%" >Date</th>
      <th width="10%" >Bank A/C No.</th>
      <th width="20%">Pay to</th>
      <th width="10%" class="text-right">Paid Amount</th>
      <th width="7%"  class="text-right">VAT Amount</th>
      <th width="10%" class="text-right" >W/H Amount</th>
      <th width="7%">Hold Vat</th>
      <th width="5%">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $n=1; foreach ($opencl as $k) {       
        $de=$this->db->query("SELECT 
        * from vender where vender_code = '$k->ap_vender'")->result();
        foreach ($de as $dd) {  }     
        ?>
      <tr>
        <td><?php echo $k->ap_pl; ?></td>
        <!-- <td><?php echo explode(" ",$k->appaid_date)[0]; ?></td>   -->      
        <td><?php echo $k->ap_chno; ?></td>
        <td class="text-center"><?php echo $k->ap_chnodate; ?></td>
        <td><?php echo $k->ap_bank_id; ?></td>
        <td><?php echo $dd->vender_name; ?></td>
        <td class="text-right"><?php echo $k->amt_ch; ?></td>
        <td class="text-right"><?php echo $k->vat_ch; ?></td>
        <td class="text-right"><?php echo $k->wt_ch; ?></td>
        <?php if ($k->aphold_vat){  ?>
              <td class="text-center"><i class="glyphicon glyphicon-ok"></i></td>
          <?php }else { ?>
            <td class="text-center"><?php echo ""; ?></td>
         <?php } ?>
        <td><button class="openvensmo<?php echo $n; ?> label label-xs label-primary" 
            data-apino<?php echo $n; ?>="<?php echo $k->ap_code; ?>" 
            data-apiamt<?php echo $n; ?>="<?php echo $k->amt_ch; ?>" 
            data-apinetamt<?php echo $n; ?>="<?php echo $k->netamt_ch; ?>" 
            data-apivat<?php echo $n; ?>="<?php echo $k->vat_ch; ?>" 
            data-apiwt<?php echo $n; ?>="<?php echo $k->wt_ch; ?>" 
            data-apid<?php echo $n; ?>="<?php echo $k->ap_id; ?>" 
            data-apipl<?php echo $n; ?>="<?php echo $k->ap_pl; ?>"
            data-api_type<?php echo $n; ?>="<?php echo $k->api_type; ?>"  
            data-dismiss="modal">SELECT
          </button>
        </td>
       
<script>
  $(".openvensmo<?php echo $n; ?>").click(function(event) {
    $("#apipl").val($(this).data('apipl<?php echo $n;?>'));
    $("#apid").val($(this).data('apid<?php echo $n;?>'));
    $("#apino").val($(this).data('apino<?php echo $n;?>'));
    $("#apiamt").val($(this).data('apiamt<?php echo $n;?>'));
    $("#apinetamt").val($(this).data('apinetamt<?php echo $n;?>'));    
    $("#apivat").val($(this).data('apivat<?php echo $n;?>'));
    $("#apiwt").val($(this).data('apiwt<?php echo $n;?>'));

    $("#m1").load('<?php echo base_url(); ?>ap_cheque/openclear2/<?php echo $k->ap_code; ?>/<?php echo $k->api_type; ?>');

    $("#m2").load('<?php echo base_url(); ?>ap_cheque/openap2/<?php echo $k->ap_code; ?>');  
    $("#m3").load('<?php echo base_url(); ?>ap_cheque/openaptax/<?php echo $k->ap_code; ?>');  
   });
    
</script>

      <?php  $n++; } ?>
      </tr>
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



