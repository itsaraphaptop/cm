<table class="table table-hover table-xxs basic">
  <thead>
  <tr>
      <th>Doc No.</th>
      <th>Type</th>
      <th>Cheque No.</th>
      <th>Due Date</th>
      <th>Paid No.</th>
      <th>Paid Date</th>
      <th>Vender</th>
      <th width="7%">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $n=1; foreach ($opencltax as $k) {
        $qev = $this->db->query("select * from vender where vender_code='$k->ap_vender'");
          $rven = $qev->result();
          foreach ($rven as $tt) {  }

        $qevb = $this->db->query("select * from bank where bank_code='$k->ap_bank_id'");
          $rvenb = $qevb->result();
          foreach ($rvenb as $bb) {  

        ?>
      <tr>
        <td><?php echo $k->api_code; ?></td>
        <td>
          <?php if ($k->ap_typecheq == 1) {
              echo "Cheque";
            }elseif ($k->ap_typecheq == 2) {
              echo "Transfer Bank";
            }else{
              echo "Cheque Direc";
            } 
          ?>
        </td>
        <td><?php echo $k->ap_chno; ?></td>
        <td><?php echo $k->ap_chnodate; ?></td>
        <td><?php echo $k->ap_pl; ?></td>
        <td><?php echo $k->appaid_date; ?></td>
        <td><?php echo $tt->vender_name; ?></td>
        <td><button class="openvensmo<?php echo $n; ?> label label-xs label-primary"
            data-api_no<?php echo $n; ?>="<?php echo $k->api_no; ?>"
            data-ttt<?php echo $n; ?>="<?php echo $k->api_no; ?>"
            data-api_code<?php echo $n; ?>="<?php echo $k->api_code; ?>"
            data-apchno<?php echo $n; ?>="<?php echo $k->ap_chno; ?>" 
            data-apchnod<?php echo $n; ?>="<?php echo $k->ap_chnodate; ?>"
            data-bankname<?php echo $n; ?>="<?php echo $bb->bank_name; ?>"
            data-venname<?php echo $n; ?>="<?php echo $tt->vender_name; ?>" 
            data-vencode<?php echo $n; ?>="<?php echo $tt->vender_code; ?>" 
            data-amt<?php echo $n; ?>="<?php echo $k->api_amt; ?>" 
            data-vat<?php echo $n; ?>="<?php echo $k->api_vatamt; ?>" 
            data-netamt<?php echo $n; ?>="<?php echo $k->api_netamt; ?>" 
            data-ap_paid<?php echo $n; ?>="<?php echo $k->ap_paidto; ?>" 
            data-project_id<?php echo $n; ?>="<?php echo $k->api_project; ?>"  
            data-ventax<?php echo $n; ?>="<?php echo $tt->vender_tax; ?>"
            data-dismiss="modal">เลือก
          </button>
        </td> 
       
<script>
  $(".openvensmo<?php echo $n; ?>").click(function(event) {
    $("#ap_no").val($(this).data('api_code<?php echo $n;?>'));
    $("#de_ap").val($(this).data('api_no<?php echo $n;?>'));
    $("#chno").val($(this).data('apchno<?php echo $n;?>'));
    $("#chdate").val($(this).data('apchnod<?php echo $n;?>'));
    $("#bank").val($(this).data('bankname<?php echo $n;?>'));
    $("#amt").val($(this).data('amt<?php echo $n;?>'));
    $("#vatt").val($(this).data('vat<?php echo $n;?>'));
    $("#drvat").val($(this).data('vat<?php echo $n;?>'));
    $("#crvat").val($(this).data('vat<?php echo $n;?>'));
    $("#netamt").val($(this).data('netamt<?php echo $n;?>'));
    $("#vendor_id").val($(this).data('venname<?php echo $n;?>'));
    $("#ventax").val($(this).data('ventax<?php echo $n;?>'));
    $("#venid").val($(this).data('vencode<?php echo $n;?>'));
    $("#ap_paid").val($(this).data('ap_paid<?php echo $n;?>'));
    $("#project_id").val($(this).data('project_id<?php echo $n;?>'));
    $("#ventax").val($(this).data('ventax<?php echo $n;?>'));

    $("#toaaa").val($(this).data('amt<?php echo $n;?>'));
    $("#amt").val($(this).data('amt<?php echo $n;?>'));
    $("#kamt").val($(this).data('amt<?php echo $n;?>'));
    $("#toamt").val($(this).data('amt<?php echo $n;?>'));
    $("#namt").val($(this).data('amt<?php echo $n;?>'));
    $("#vatt").val($(this).data('vat<?php echo $n;?>'));
    $("#nvat").val($(this).data('vat<?php echo $n;?>'));
    $("#tovat").val($(this).data('vat<?php echo $n;?>'));

    $("#m1").load('<?php echo base_url(); ?>ap_cheque/taxdoc2/'+"<?php echo $k->api_code; ?>"); 
    $("#m2").load('<?php echo base_url(); ?>ap_cheque/taxgldoc/'+"<?php echo $k->api_code; ?>");   
   });
    
</script>

      <?php }  $n++; } ?>
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