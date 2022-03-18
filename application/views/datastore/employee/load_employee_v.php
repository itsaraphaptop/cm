<table class="table table-hover table-xxs datatable-basic">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $n=1; foreach ($mem as $v) {?>
                            <tr>
                              <th class="text-center"><?php echo $n; ?></th>
                              <td><?php echo $v->m_code; ?></td>
                              <td><?php echo $v->m_name; ?></td>
                              
                              <td>
                                <div class="btn-group">
                                  <a href="#" class="label bg-teal dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></a>

                                  <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a data-toggle="modal" data-target="#open"><i class="fa fa-folder-open" aria-hidden="true"></i> Open</a></li>
                                    <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</a></li>
                                    <li><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                           <?php $n++; } ?>
                          </tbody>
                        </table>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/table_elements.js"></script>
<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 3 ]
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
  $('.datatable-basic').DataTable();
</script>