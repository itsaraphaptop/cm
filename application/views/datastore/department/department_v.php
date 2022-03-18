<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!--  -->
      <div class="col-md-3">
        <!-- general form elements -->
        <div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-cog3 position-left"></i> ADD DEPARTMENT</h6>
            <div class="heading-elements">
              <!-- <a  type="button" href="<?php echo base_url(); ?>data_master/new_vender"  class="preload btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-plus-circle2"></i> New Unit</a> -->
              <!-- <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
              </ul> -->
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="<?php echo base_url(); ?>datastore_active/dpt_ins" method="post">
                    <div class="form-group">
                      <label for="type">Department Code</label>
                      <input type="text" class="form-control" name="li_dptcode" required="">
                    </div>
                    <div class="form-group">
                      <label for="type">Department Name</label>
                      <input type="text" class="form-control" name="li_dpt" id="projname">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="type">Controll BOQ</label>
                          <input type="checkbox" id="ch_control_bqq">
                          <input type="hidden" name="control_bqq" id="control_bqq" value="0">
                        </div>
                        <div class="form-group">
                          <label for="type">Control Budget</label>
                          <select type="text" id="control_bg" class="form-control input-xs" name="control_bg">
                            <option value="1">Not Control</option>
                            <option value="2">By Summary Cost Code</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12" id="td_bc" hidden="hidden">
                        <label class="control-label">Tender No / BOQ Control</label>
                          <div class="input-group">
                            <input type="hidden" class="form-control input-sm" id="bd_tenid" name="bd_tenid" readonly="true">
                            <input type="text" class="form-control input-sm" id="bd_tenname" name="bd_tenname" readonly="true">
                            <span class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#tender" class="tender btn btn-info btn-icon btn-xs"><i class="icon-search4"></i></button>
                            </span>
                          </div>
                      </div>
                    </div>
                   

                    <div class="modal-footer">
              <div class="form-group">  
                <button class="btn btn-success" id="clickme" data-toggle="modal" type="submit" name="btnsave"><i class="icon-floppy-disk"></i> save</button>
                <a id="" href="<?php echo base_url(); ?>data_master" class="btn bg-danger"><i class="icon-close2"></i> Close</a>  
              </div>
            </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- box-body -->
        </div>
        <!--  -->
        <!--  -->
        <div class="col-md-9">
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h6 class="panel-title"><i class="icon-cog3 position-left"></i> DEPARTMENT</h6>
              <div style="text-align: right;"><a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=department.mrt" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a></div>
              <div class="heading-elements">
                <!-- <a  type="button" href="<?php echo base_url(); ?>data_master/new_vender"  class="preload btn border-info text-info-600 btn-flat btn-icon btn-xs heading-btn"><i class="icon-plus-circle2"></i> New Unit</a> -->
                <!-- <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
                </ul> -->
              </div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
              <table class="basic table table-hover table-xxs datatable-basic">
                <thead>
                  <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Department Code</th>
                    <th>Department Name</th>
                    <th class="text-center">Set Approve</th>
                    <th class="text-center">Active</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n=1; foreach ($res as $key => $value) {?>
                  <tr>
                    <td class="text-center"><?php echo $n; ?></td>
                    <td class="text-center"><?php echo $value->department_code; ?></td>
                    <td><?php echo $value->department_title; ?></td>
                    <td class="text-center"><a href="<?php echo base_url(); ?>data_master/approve_department/<?php echo $value->department_id; ?>" class="label label-success">Setup Approve</a></td>
                    <td class="text-center"><a  data-toggle="modal" data-target="#editproj<?php echo $n; ?>" id="#edit<?php echo $n; ?>"><i class="icon-pencil7"></i> </a>
                    <!-- <a href="<?php echo base_url(); ?>datastore_active/deldpt/<?php echo $value->department_id; ?>"><i class="icon-trash"></i> </a> --></td>
                  </tr>
                </tr>
                <div class="modal fade" id="editproj<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url(); ?>datastore_active/dpt_edit" method="post">
                      <div class="modal-content">
                        <div class="modal-header btn-primary">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit PROJECT</h4>
                        </div>
                        <div class="modal-body">
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label for="type">Department Code</label>
                              <input type="text" class="form-control" name="li_dptcode" value="<?php echo $value->department_code; ?>">
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label for="type">Department Name</label>
                              <input type="hidden" name="li_id" value="<?php echo $value->department_id; ?>">
                              <input type="text" class="form-control" name="li_dpt" value="<?php echo $value->department_title; ?>">
                            </div>
                          </div>
                          <div class="col-xs-12">
                          <?php 
                            if ($value->control_bqq == "1") {
                              $checked = "checked=''";
                            }else{
                              $checked = "";
                            }
                          ?>
                            <div class="form-group">
                              <label>Controll BOQ</label>
                              <input type="checkbox" class="ch_control_bqq_ed" value="<?=$value->control_bqq;?>" <?=$checked?>>
                              <input type="hidden" name="control_bqq" class="control_bqq_ed" value="<?=$value->control_bqq;?>">
                            </div>
                          </div>
                          <div class="col-xs-12">
                            <div class="form-group">
                              <label for="type">Control Budget</label>
                              <select class="control_bg_ed form-control input-xs" name="control_bg">
                                <option value="1" <?= ($value->control_bg == 1) ? "selected='selected'" : "";?> >Not Control</option>
                                <option value="2" <?= ($value->control_bg == 2) ? "selected='selected'" : "";?>>By Summary Cost Code</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12 td_bc_ed" <?=($value->control_bqq == "1") ? "" : "hidden='hidden'";?>>
                            <div class="form-group col-md-12">
                              <label class="control-label">Tender No / BOQ Control</label>
                <div class="input-group">
                  <input type="hidden" class="form-control input-sm bd_tenid_ed" name="tender_no" readonly="true" value="<?=$value->tender_no;?>">
                  <input type="text" class="form-control input-sm bd_tenname_ed" name="project_name" readonly="true" value="<?=$value->project_name;?>">
                  <span class="input-group-btn">
                    <button type="button" data-toggle="modal" data-target="#tender" class="tender btn btn-info btn-icon btn-xs"><i class="icon-search4"></i></button>
                  </span>
                </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          
                          <button type="submit" class="btn btn-success"><i class="icon-floppy-disk"></i> Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeacc"><i class="icon-close2"></i> Close</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <script type="text/javascript">
                  //Close modal refresh
                    // $('#editproj<?php echo $n; ?>').on('hidden.bs.modal', function () {
                    //   location.reload();
                    // });
                </script>
                <?php $n++; } ?>
              </tbody>
            </table>
            <!-- /.box-body -->
          </div>
        </div>
        <!--  -->
      </div>
      <div class="modal fade" id="tender" data-backdrop="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">BOQ</h4>
            </div>
            <div class="modal-body">
              <div class="panel-body">
                <div class="row" id="tenderr">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
      $(".tender").click(function(){
      $('#tenderr').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#tenderr").load('<?php echo base_url(); ?>index.php/bd/modalbdtender');
      });
      </script>
      <!-- /.Job Details -->
    </section>
  </div>
  <script>
  $("#ch_control_bqq").click(function(event) {
    var _control_bqq = $("#control_bqq").val();
    if (_control_bqq == 0) {
      $("#control_bqq").val(1);
    }else if(_control_bqq == 1){
      $("#control_bqq").val(0);
    }else{
      console.log('control bqq status not System Add');
    }
  });
  $("#control_bg").change(function(event) {
    $("#bd_tenid").val("");
    $("#bd_tenname").val("");
  var _val = $(this).val();
    if (_val == 1) {
      $("#td_bc").attr('hidden', 'hidden');
    }else if(_val == 2){
    // alert(_val);
      $("#td_bc").removeAttr('hidden');
    }else{
      console.log('control budget status not System Add');
    }
  // alert(_val);
  });

  $(".ch_control_bqq_ed").click(function(event) {
    var checked = $(this).prop("checked");

    if (checked == false) {
      $(".control_bqq_ed").val(0);
    }else if(checked == true){
      $(".control_bqq_ed").val(1);
    }else{
      console.log('control bqq status not System Edit');
    }
  });
  $(".control_bg_ed").change(function(event) {
    // alert(555);
    $(".bd_tenid_ed").val("");
    $(".bd_tenname_ed").val("");
    var _val = $(this).val();
    // alert(_val)
    if (_val == 1) {
      $(".td_bc_ed").attr('hidden', 'hidden');
    }else if(_val == 2){
    // alert(_val);
      $(".td_bc_ed").removeAttr('hidden');
    }else{
      console.log('control budget status not System Edit');
    }
  // alert(_val);
  });


  // alert(5555);
  // var app = angular.module('app',[]);
  </script>
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
  $('#mg').attr('class', 'active');
  $('#mc4').attr('style', 'background-color:#dedbd8');
</script>