<table class="table table-hover table-xxs basic">
  <thead>
    <tr>
      <th width="15%">AP No.</th>
      <th width="15%">AP Date</th>      
      <th width="40%">Vender Name</th>
      <th width="25%">Project Name</th>
      <th width="5%">Active</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $n=1; foreach ($apo as $val) {  
          $sys = $this->db->query("select * from system where systemcode ='$val->ap_system'");
          $syss = $sys->result();
          foreach ($syss as $syst) {  
           
          } 
          $pro = $this->db->query("select * from project where project_id ='$val->ap_project'");
          $proj = $pro->result();
          foreach ($proj as $pp) {  
            $project = $pp->project_name;
            $projectid = $pp->project_id;
          } ?>
        <td><?php echo $val->ap_no; ?></td>
        <td><?php echo $val->ap_date; ?></td>
        <td><?php echo $val->vender_name; ?></td>
        <td><?php echo $project; ?></td>        
        <td><button class="btnre<?php echo $n; ?> btn btn-primary btn-xs btn-block"  
          data-code<?php echo $n; ?>="<?php echo $val->ap_no; ?>"
          data-excode<?php echo $n; ?>="<?php echo $val->ex_id; ?>" 
          data-date<?php echo $n; ?>="<?php echo $val->ap_date; ?>"
          data-pono<?php echo $n; ?>="<?php echo $val->doc_no; ?>" 
          data-vender<?php echo $n; ?>="<?php echo $val->vender_name; ?>"
          data-vencode<?php echo $n; ?>="<?php echo $val->vender_code; ?>"  
          data-projname<?php echo $n; ?>="<?php echo $project; ?>" 
          data-projid<?php echo $n; ?>="<?php echo $projectid; ?>"
          data-glyear<?php echo $n; ?>="<?php echo $val->ap_year;; ?>" 
          data-glperiod<?php echo $n; ?>="<?php echo $val->ap_period; ?>" 
          data-duedate<?php echo $n; ?>="<?php echo $val->doc_date; ?>" 
          data-inv<?php echo $n; ?>="<?php echo $val->tax; ?>" 
          data-netamt<?php echo $n; ?>="<?php echo $val->ex_amt; ?>"
          data-vat<?php echo $n; ?>="<?php echo $val->ex_tovat; ?>"
          data-totamt<?php echo $n; ?>="<?php echo $val->ex_netamt; ?>"
          data-expens<?php echo $n; ?>="<?php echo $val->ex_expenscode; ?>"
          data-systemname<?php echo $n; ?>="<?php echo $syst->systemname; ?>" 
          data-system<?php echo $n; ?>="<?php echo $syst->systemcode; ?>" 
          data-dismiss="modal">SELECT</button>
        </td>
          <script>
            $(".btnre<?php echo $n; ?>").click(function() {             
                
            $("#cnap_no").val($(this).data("code<?php echo $n; ?>"));
            $("#detail").val($(this).data("code<?php echo $n; ?>"));
            $("#expens").val($(this).data("expens<?php echo $n; ?>"));
            $("#vender").val($(this).data("vender<?php echo $n; ?>"));
            $("#venderid").val($(this).data("vencode<?php echo $n; ?>"));
            $("#tven").val($(this).data("vender<?php echo $n; ?>"));
            $("#porecx").val($(this).data("reccode<?php echo $n; ?>"));
            $("#pono").val($(this).data("pono<?php echo $n; ?>"));
            $("#taxno").val($(this).data("inv<?php echo $n; ?>"));
            $("#taxiv").val($(this).data("inv<?php echo $n; ?>"));
            $("#projectname").val($(this).data("projname<?php echo $n; ?>"));
            $("#projectid").val($(this).data("projid<?php echo $n; ?>"));
            $("#departname").val($(this).data("depname<?php echo $n; ?>"));
            $("#departid").val($(this).data("depid<?php echo $n; ?>"));
            $("#system").val($(this).data("system<?php echo $n; ?>"));
            $("#systemname").val($(this).data("systemname<?php echo $n; ?>"));
            $("#crterm").val($(this).data('term<?php echo $n; ?>'));
            $("#porecx").val($(this).data('do<?php echo $n; ?>'));
            $("#ttype").val($(this).data('apvt<?php echo $n; ?>'));
            $("#duedate").val($(this).data("duedate<?php echo $n; ?>"));
            $("#amount").val($(this).data("netamt<?php echo $n; ?>"));
            $("#amountt").val($(this).data("netamt<?php echo $n; ?>"));
            $("#pamount").val($(this).data("vat<?php echo $n; ?>"));
            $("#vatt").val($(this).data("vat<?php echo $n; ?>"));
            $("#excode").val($(this).data("excode<?php echo $n; ?>"));

            $("#amt").val($(this).data("totamt<?php echo $n; ?>"));
            $("#amttotal").val($(this).data("totamt<?php echo $n; ?>"));
            $("#xamt").val($(this).data("totamt<?php echo $n; ?>"));
          
            loadass();
            });
            function loadass(){
            }
          </script>
    
        </tr>
    <?php   $n++; }  ?>
  </tbody>
<!-- </table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script> -->

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
