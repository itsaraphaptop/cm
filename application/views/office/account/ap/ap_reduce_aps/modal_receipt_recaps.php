<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th>No.</th>
      <th>AP No.</th>
      <th>AP Date</th>
      <th>Tax No.</th>
      
      <th>Vender Name</th>
      <th>Project Name</th>
      
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $n=1; foreach ($aps as $val) { 
        $qevb = $this->db->query("select * from system where systemcode='$val->aps_system'");
          $rvenb = $qevb->result();
          foreach ($rvenb as $bb) {  
              $sys = $bb->systemname;
          }
        
      ?>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $val->aps_code; ?></td>
      <td><?php echo $val->ap_date; ?></td>
      <td><?php echo $val->aps_invno; ?></td>
      
      <td><?php echo $val->vender_name; ?></td>
      <td><?php echo $val->project_name; ?></td>
     

      <td><button class="btnre<?php echo $n; ?> btn btn-info btn-xs btn-block"  
        data-code<?php echo $n; ?>="<?php echo $val->aps_code; ?>"
        data-date<?php echo $n; ?>="<?php echo $val->ap_date; ?>"
        data-pono<?php echo $n; ?>="<?php echo $val->aps_billno; ?>" 
        data-vender<?php echo $n; ?>="<?php echo $val->vender_name; ?>" 
        data-vencode<?php echo $n; ?>="<?php echo $val->vender_code; ?>" 
        data-projname<?php echo $n; ?>="<?php echo $val->project_name; ?>" 
        data-projid<?php echo $n; ?>="<?php echo $val->project_id; ?>" 
        data-glyear<?php echo $n; ?>="<?php echo $val->aps_year; ?>" 
        data-glperiod<?php echo $n; ?>="<?php echo $val->aps_period; ?>" 
        data-inv<?php echo $n; ?>="<?php echo $val->aps_invno; ?>" 
        data-netamt<?php echo $n; ?>="<?php echo $val->aps_amount; ?>"
        data-vat<?php echo $n; ?>="<?php echo $val->aps_vattot; ?>"
        data-vatper<?php echo $n; ?>="<?php echo $val->aps_vatper; ?>"
        data-totamt<?php echo $n; ?>="<?php echo $val->aps_netamt; ?>"
        data-sys<?php echo $n; ?>="<?php echo $sys; ?>"
        data-sysid<?php echo $n; ?>="<?=$val->aps_system; ?>"
        data-dismiss="modal">SELECT</button>
      </td> 

      
      <script>
        $(".btnre<?php echo $n; ?>").click(function(){
        $("#vat").load('<?php echo base_url(); ?>index.php/ap/recaps_bill/'+"<?php echo trim($val->aps_code); ?>");
        // $("#meterialr").load('<?php echo base_url(); ?>index.php/ap/rec_meterialaps/'+"<?php echo $val->aps_code; ?>");
        $("#cnap_no").val($(this).data("code<?php echo $n; ?>"));
        $("#expens").val($(this).data("expens<?php echo $n; ?>"));
        $("#vender").val($(this).data("vender<?php echo $n; ?>"));
        $("#tven").val($(this).data("vender<?php echo $n; ?>"));
        $("#porecx").val($(this).data("reccode<?php echo $n; ?>"));
        $("#pono").val($(this).data("pono<?php echo $n; ?>"));
        $("#taxno").val($(this).data("inv<?php echo $n; ?>"));
        $("#taxiv").val($(this).data("inv<?php echo $n; ?>"));
        $("#projectname").val($(this).data("projname<?php echo $n; ?>"));
        $("#projectid").val($(this).data("projid<?php echo $n; ?>"));
        $("#departname").val($(this).data("depname<?php echo $n; ?>"));
        $("#departid").val($(this).data("depid<?php echo $n; ?>"));
        $("#sysid").val($(this).data("sysid<?php echo $n; ?>"));
        $("#crterm").val($(this).data('term<?php echo $n; ?>'));
        $("#porecx").val($(this).data('do<?php echo $n; ?>'));
        $("#ttype").val($(this).data('apvt<?php echo $n; ?>'));
        $("#duedate").val($(this).data("duedate<?php echo $n; ?>"));
        $("#amountt").val($(this).data("netamt<?php echo $n; ?>"));
        $("#system").val($(this).data("sys<?php echo $n; ?>"));
        $("#pprice_unit").val($(this).data("vatper<?php echo $n; ?>"));        
        $("#amttotal").val($(this).data("totamt<?php echo $n; ?>"));
        $("#duedate").val($(this).data("date<?php echo $n; ?>"));
        $("#venderid").val($(this).data("vencode<?php echo $n; ?>"));
        });
      </script>
  
    </tr>
    <?php   $n++; }  ?>
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