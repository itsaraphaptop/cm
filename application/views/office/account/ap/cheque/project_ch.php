<script type="text/javascript">
  $('body').attr('class', 'navbar-top pace-done');
</script>
<div class="content-wrapper">
    <div class="content">
      <div class="panel panel-flat">
        <div class="panel-body">
          <div class="col-md-12">
            <div class="dataTables_wrapper no-footer">
                  <div class="table-responsive">
                      <table class="table datatable-basic table-xxs table-bordered">
                  <thead>
                    <tr>
                      <th width="20%" class="text-center">Project Code</th>
                      <th width="60%" class="text-center">Project Name</th>
                      <th width="20%" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $n=1; foreach ($gproject as $k) {
                        ?>
                      <tr>
                        <td><?php echo $k->project_code; ?></td>
                        <td><?php echo $k->project_name; ?></td>

                        <td><a href="<?php echo base_url(); ?>ap_cheque/openstatus/<?php echo $k->project_id; ?>" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<!-- /core JS files -->
<script>
$.extend( $.fn.dataTable.defaults, {
     
     drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
     },
     preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
     }
 });
  $('.datatable-basic').DataTable();
</script>