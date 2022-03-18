<div class="table-responsive">
  <table class="basic table table-hover table-xxs datatable-basic">
    <thead>
      <tr>
        <th width="5%">No.</th>
        <th width="15%">APS No.</th>
        <th width="15%">APS Date</th>
        <th width="30%">Vender Name</th>
        <th width="30%">Project Name</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $n=1; foreach ($open as $value) {?>
        <tr>
          <td><?php echo $n; ?></td>
          <td><?php echo $value->aps_code; ?></td>
          <td><?php echo $value->createdate; ?></td>
          <td><?php echo $value->vender_name; ?></td>
          <td><?php echo $value->project_name; ?></td>
          <?php if ($value->gl_status == "N") { ?>
            
            <td>
              <ul class="icons-list">
                <li class="text-default"><a href="<?php echo base_url();?>ap/delapd/<?php echo $value->aps_code; ?>" title=""><i class="icon-trash"></i></a></li>
                <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=aps_payvoucher.mrt&no=<?php echo $value->aps_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
              </ul>
            </td>
        <?php }else{ ?>
            
            <td>
              <ul class="icons-list">
              <li><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=aps_payvoucher.mrt&no=<?php echo $value->aps_code; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-printer4"></i></a></li>
              </ul>
            </td>
          <?php } ?>
        </tr>
        <?php  $n++; } ?>
    </tbody>
  </table>
</div>

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

