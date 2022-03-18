<style>
.fieldset-info {
    border: 1px solid #00bfff;
    padding: 10px;
}
</style>

    <form method="post" action="<?=base_url()?>new_permission/show_report">
    <div class="content">
      <!-- column 1 -->
      <div class="col-md-6">
        <div class="panel panel-flat">
          <div class="panel-heading">
            <!-- <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Employee</h6> -->
            <div class="heading-elements">
              <ul class="icons-list">

              </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
            <div class="panel-body">
              <form action="<?php echo base_url(); ?>datastore_active/add_employee" method="post">
                <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                      <fieldset class="">
                        <legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> SHOW module</h4></legend>
                        <div class="container-fluid">
                          <div class="row">
                            <!-- /user -->
                            <table class="table table-responsive">
                              <tr>
                                <td>
                                  Action All <input type="checkbox" id="check_all">

                                </td>
                                <td>Module Name</td>
                              </tr>
                              <tbody>
                                <?php foreach ($module as $key => $module_info) {?>
                                <tr>
                                  <td>
                                    <input type="checkbox"  name="module_id[]" value="<?=$module_info['module_id']?>">
                                    <input type="hidden"  name="module_name[]" value="<?=$module_info['module_name']?>">
                                  </td>
                                  <td>
                                    <?=$module_info['module_name']?>
                                  </td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                            <!-- /user -->
                          </div>
                        </div>
                      </fieldset>
                      <br>
                      <div class="form-group">
                        <div class="text-right">
                          <button type="submit" class="btn btn-success" id="save" data-dismiss="modal"><i class="icon-floppy-disk" aria-hidden="true"></i> Save</button>
                          <a href="<?php echo base_url(); ?>data_master" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2" aria-hidden="true"></i> Close</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <!-- <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Employee</h6> -->
              <div class="heading-elements">
                <ul class="icons-list">
                  <li><a href="<?php echo base_url(); ?>data_master/setupemployee" data-action="reload"></a></li>
                </ul>
              </div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="">
                      <legend><h4><i class="fa fa-users" aria-hidden="true"></i> Show Employee</h4></legend>
                      <!-- <button class="label label-primary"> Employee</button> -->
                      <!-- <button class="label label-info"> External</button> -->
                      <div id="table">
                        <table class="table table-hover table-xxs basic">
                          <thead>
                            <tr>
                              <th class="text-center">No.</th>
                              <th>Code</th>
                              <th>Name</th>
                              <th>Action <p>All <input type="checkbox"  id="check_all_action"></p> </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($member as $key => $value) {?>
                                  <tr>
                                      <td><?=($key + 1)?></td>
                                      <td><?=$value->m_code?></td>
                                      <td><?=$value->m_name?></td>
                                      <td><input type="checkbox" name="m_code[]" value="<?=$value->m_user?>"></td>
                                  </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        </form>

      <!-- modal  โครงการ-->
      <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Select Project</h4>
            </div>
            <div class="modal-body">
              <div class="panel-body">
                <div class="row" id="modal_project">
                </div>
              </div>
            </div>
          </div>
        </div>
        </div> <!--end modal -->
        <!-- modal  แผนก-->
        <div class="modal fade" id="opendp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Select Department</h4>
              </div>
              <div class="modal-body">
                <div class="panel-body">
                  <div class="row" id="modal_department">
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div> <!--end modal -->



  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script>

</script>

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
<script type="text/javascript">
  $(function(){
    $('#check_all').change(function(event) {
        $("input[type='checkbox'][name='module_id[]']").prop("checked",$(this).prop("checked"));
    });

    $("#check_all_action").change(function(event) {
      $("input[type='checkbox'][name='m_code[]']").prop("checked",$(this).prop("checked"));
    });
  });
  $('#mg').attr('class', 'active');
  $('#mc8').attr('style', 'background-color:#dedbd8');
</script>