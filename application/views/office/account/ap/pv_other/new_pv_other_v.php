<style>
  .containerbox {
       /*position: absolute;*/
       z-index: 1;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       overflow: auto;
       background: url('<?php echo base_url();?>assets/images/bgsc_glay.png') top center no-repeat;

  }
</style>
<div class="content-wrapper containerbox">

        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">Dashboard</span> - ภาพรวมระบบ</h4>
            </div>

            <!-- <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div> -->
          <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

          <div class="breadcrumb-line">
            <ul class="breadcrumb">
              <li><a href="ap_main"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li>ระบบจัดการบัญชีเจ้าหนี้</li>
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
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

          <div class="row">

            <form action="<?php echo base_url(); ?>ap_active/new_apo" method="post">
            <fieldset>
              <div class="panel panel-default border-grey">
                            <div class="panel-heading">
                              <h6 class="panel-title"> Account Payable Other (APO)</h6>
                              <div class="heading-elements">
                                <ul class="icons-list">
                                          <!-- <li><a data-action="reload"></a></li>
                                          <li><a data-action="close"></a></li> -->
                                        </ul>
                                      </div>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                            <!--  modal -->
                            <div class="modal fade" id="openpettycash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Select</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div id="modal_pettycash">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- modal  -->
                            <div class="panel-body">
                              <div class="col-md-12">
                                <legend class="text-semibold"><i class="icon-reading position-left"></i> Account Payable Other</legend>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Pay To.:</label>
                                  <div class="input-group">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                  </span>
                                  <input type="text" class="form-control" placeholder="จ่ายให้กับ" readonly value="<?php echo $name; ?>"  name="memname" id="memname" >
                                  <input type="hidden" name="memid" id="memid">
                                  <div class="input-group-btn">
                                  <button type="button" class="openemp btn btn-default btn-icon" data-toggle="modal" data-target="#open"><i class="icon-search4"></i></button>
                                  </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="">Vender Type</label>
                                  <select class="form-control" id="apotype" name="apotype">
                                    <option value="1">Employee</option>
                                    <option value="2">External</option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label for="">PV No.</label>
                                  <input type="text" class="form-control" readonly="true" name="apono" id="apono" placeholder="PV No.">
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                <label for="">Project</label>
                                  <div class="input-group">
                                  <input type="text" class="form-control" readonly="true" id="projectname" placeholder="Project" name="projectname">
                                  <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid">
                                   <div class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
                            </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="">System</label>
                                  <select class="form-control" name="aposystem" id="aposystem">
                                    <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                                    <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                                    <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                                    <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                                    <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
                                  </select>
                                </div>
                                <div class="col-md-3">
                                <label for="">PV Date</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="text" class="form-control daterange-single"  id="apodate" name="apodate">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                <label for="">Department</label>
                                  <div class="input-group">
                                  <input type="text" class="form-control" readonly="true" id="departmenttname" placeholder="Department" name="departmenttname">
                                  <input type="hidden" class="form-control" readonly="true" id="departmenttid" name="departmenttid">
                                  <div class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button>
                            </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="form-group">
                                    <label for=""> Remark</label>
                                    <input type="text" class="form-control" name="remarkapo" id="remarkapo">
                                  </div>
                                </div>
                                <!-- <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">เลขที่ใบขอเบิก</label>
                                  <input type="text" class="form-control border-teal border-lg text-teal" readonly="true" id="pettycashno" placeholder="เลขที่ใบขอเบิก" name="pettycashno">

                                  </div>
                                </div> -->
                              </div>
                            </div>
                            <div class="container-fluid">
                              <div class="col-md-1">
                                <div class="form-group">
                                  <a class="openpetty btn btn-warning btn-xs"><i class="icon-file-plus"></i> Petty Cash</a>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
  												<div class="col-lg-10">
  													<input type="text" class="s_name form-control" placeholder="Enter Name Advance To.">
  												</div>
                          <div class="input-group-btn">
                          <button type="button" class="btn_name btn btn-default btn-icon"><i class="icon-search4"></i> Search</button>
                          </div>
  											</div>
                            </div>
                            </div>
                            <div id="table">
                            <table class="table table-bordered table-striped table-hover table-xxs datatable-basic">
                              <thead>
                                <tr>
                                  <th width="5%" class="text-center">No.</th>
                                  <th width="5%" class="text-center">Action</th>
                                  <th width="15%" class="text-center">Pettycash No.</th>
                                  <th class="text-center">Name</th>
                                  <th>Remark</th>
                                  <th width="15%" class="text-center">Amount</th>
                                  <th width="10%" class="text-center">Open</th>
                                </tr>
                              </thead>
                                <tbody id="tbody">
                                <tr>
                                  <td colspan="7" class="text-center">No Data</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                            <br>
                            <div class="modal-footer">
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
                                <a href="#" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                              </div>
                            </div>
                          </div>
            </fieldset>
            </form>


                  <!-- Footer -->
                       <!-- <div class="footer text-muted">
                         © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
                       </div> -->
                       <!-- /footer -->
          </div>
        </div>
<!-- editrow -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script> -->
<script>
$(".openpetty").click(function(){
  var memid = $('#memid').val();
  $('#table').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#table').load('<?php echo base_url(); ?>ap/load_table_pettycash/'+memid);

});

$('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });
   $(".btn_name").click(function(){
     var memid = $('#memid').val();
     var sname = $(".s_name").val();
     $('#table').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
     $('#table').load('<?php echo base_url(); ?>ap/load_table_filterby_advname_pettycash/'+memid+'/'+sname);
   });
</script>
<!-- modal  โครงการ-->
 <div class="modal fade" id="openproj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
 <div class="modal fade" id="opendepart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- modal เลือกรผู้ขอเบิก -->
 <div class="modal fade" id="open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row">
              <div id="modal_member">

    </div>
            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<script>
$(".openemp").click(function(){
  $("#modal_member").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_member").load('<?php echo base_url(); ?>index.php/share/member');
});
    $(".openproj").click(function(){
      $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
    $(".opendepart").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
</script>
