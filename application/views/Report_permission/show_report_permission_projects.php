<!-- <div class="page-header page-header-transparent">
<div class="panel panel-body">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master </span> - Report Permission Project</h4>
    </div>
    <div class="heading-elements">
      <div class="heading-btn-group">
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
      </div>
    </div>
    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
    <div class="breadcrumb-line breadcrumb-line-component">
      <ul class="breadcrumb">
        <li><a class="preload" href="/"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a class="preload" href="<?php echo base_url(); ?>index.php/data_master">Master</a></li>
        <li class="active">Setup Employee</li>
      </ul>
      <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-gear position-left"></i>
            Settings
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
            <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
            <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
          </ul>
        </li>
      </ul>
      <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
      </div>
    </div> -->




    <!-- send form show report permission project -->
    <!-- form 1 -->
    <form method="post" action="<?=base_url()?>new_permission/active_permission_projects" >
    <input type="hidden" name="type" value="by_project">
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
              
                <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                      <fieldset class="">
                        <legend><h4><i class="fa fa-university" aria-hidden="true"></i> SHOW PROJECTS</h4></legend>
                        <div class="container-fluid">
                          <div class="row">
                            <!-- /user -->
                            <div id="table_project">
                            <?php $no = 1;?>
                            <table class="table table-hover table-xxs" id="tb_projects">
                              <thead>
                                <tr>
                                  <th width="10%">No.</th>
                                  <th>Project Name</th>
                                  <th>
                                    Action All <input type="checkbox" id="check_all_project">
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($projects as $project_index => $project) { ?>
                                    <tr>
                                        <td><?=$no ?></td>
                                        <td><?=$project["project_name"] ?></td>
                                        <td><input type="checkbox" name="projects[]" value="<?=$project["project_id"] ?>,<?=$project["project_name"] ?>"></td>
                                    </tr>
                                <?php  $no++;}?>
                              </tbody>
                            </table>
                            </div>
                            <!-- /user -->
                          </div>
                        </div>
                      </fieldset>
                      <br>
                      <div class="form-group">
                        <div class="text-right">
                          
                          <button type="submit" class="btn btn-primary " id="save" data-dismiss="modal"><i class="fa fa-eye" aria-hidden="true"></i> Show</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </fieldset>
              
            </div>
          </div>
        </div>
        </form>
        <!-- form 1 -->
        <!-- form 2 -->
        <form method="post" action="<?=base_url()?>new_permission/active_permission_projects" >
        <input type="hidden" name="type" value="by_empolyee">
        <div class="col-md-6">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <!-- <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Employee</h6> -->
             
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset class="">
                      <legend><div style="text-align: right;"><a href="<?php echo base_url(); ?>data_master" type="button" class="btn bg-danger" name="button"><i class="icon-close2"></i> Close</a></div><h4><i class="fa fa-users" aria-hidden="true"></i> Show Employee</h4>
                        </legend>
                      <!-- <button class="label label-primary"> Employee</button> -->
                      <!-- <button class="label label-info"> External</button> -->
                      <div id="table">
                        <table class="table table-hover table-xxs" id="tb_employee">
                          <thead>
                            <tr>
                              <th class="text-center" >No.</th>
                              <th>Employee Code</th>
                              <th>Employee Name</th>
                              <th >Action All <input type="checkbox"  id="check_all_action"> </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($member as $key => $value) {?>
                                  <tr>
                                      <td><?=($key + 1)?></td>
                                      <td><?=$value->m_code?></td>
                                      <td><?=$value->m_name?></td>
                                      <td><input type="checkbox" name="employee_id[]" value="<?=$value->m_id?>,<?=$value->m_name?>"></td>
                                  </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
                    </fieldset>
                    <br>
                      <div class="form-group">
                        <div class="text-right">
                          
                          <button type="submit" class="btn btn-primary " id="save" data-dismiss="modal"><i class="fa fa-eye" aria-hidden="true"></i> Show</button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
          <!-- form 2 -->
        </div>
        
        <!-- send form show report permission project -->



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
  $('#tb_projects ,#tb_employee').DataTable();
</script>
<script type="text/javascript">
  //check all Employee
  $("#check_all_action").click(function(){
      $("input[type='checkbox'][name='employee_id[]']").prop("checked",$(this).prop("checked"));
  });
  //check all Employee

  // checl all Project
  $("#check_all_project").click(function(){
    $("input[type='checkbox'][name='projects[]']").prop("checked",$(this).prop("checked"));
  });
  // checl all Project
  $('#mg').attr('class', 'active');
  $('#mc9').attr('style', 'background-color:#dedbd8');
</script>