<div class="content-wrapper">
    <div class="content">
      <div class="panel panel-flat">
        <div class="panel-body">
          <div class="col-md-12">
            <div class="dataTables_wrapper no-footer">
                  <div class="table-responsive">
                      <table class="table table-hover table-xxs basic">
                  <thead>
                    <tr>
                      <th width="20%" class="text-left">Vender Code</th>
                      <th width="60%" class="text-left">Vender Name</th>
                      <th width="20%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $n=1; foreach ($gvender as $k) {
                        ?>
                      <tr>
                        <td><?php echo $k->apv_vender; ?></td>
                        <td><?php echo $k->vender_name; ?></td>

                        <td class="text-center"><a href="<?php echo base_url(); ?>ap/openall/<?php echo $k->apv_vender; ?>" class="label label-primary"> Select</a></td>

                      </tr>
                      <?php  $n++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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