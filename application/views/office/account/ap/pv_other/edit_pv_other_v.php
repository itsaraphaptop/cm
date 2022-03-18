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

            <div class="heading-elements">
              <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="preload btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
              </div>
            </div>
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

            <form action="<?php echo base_url(); ?>ap_active/edit_pvpc_h" method="post">
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
                            <?php foreach ($res as $v) {
                              $pvcode = $v->apo_code;
                              $memid = $v->apo_member;
                              $memname = $v->m_name;
                              $projectid = $v->apo_project;
                              $projectname = $v->project_name;
                              $depid = $v->apo_department;
                              $depname = $v->department_title;
                              $pvdate = $v->apo_date;
                              $remark = $v->apo_remark;
                              $system = $v->apo_system;
                              $type = $v->apo_type;
                            } ?>
                            <div class="panel-body">
                              <div class="col-md-12">
                                <legend class="text-semibold"><i class="icon-reading position-left"></i> Account Payable Other (APO)</legend>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Pay To.:</label>
                                  <div class="input-group">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                                  </span>
                                  <input type="text" class="form-control" placeholder="จ่ายให้กับ" readonly value="<?php echo $memname; ?>"  name="memname" id="memname" >
                                  <input type="hidden" name="memid" id="memid" value="<?php echo $memid; ?>">
                                  <div class="input-group-btn">
                                  <button type="button" class="openemp btn btn-default btn-icon" ><i class="icon-search4"></i></button>
                                  </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="">Vender Type</label>
                                  <select class="form-control" id="apotype" name="apotype">
                                    <?php if($type == '1'){ ?><option value="1">Employee</option><?php } else {?><option value="1">Employee</option><?php } ?>
                                    <?php if($type == '2'){ ?><option value="2">External</option><?php } else {?><option value="2">External</option><?php } ?>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label for="">PV No.</label>
                                  <input type="text" class="form-control" readonly="true" name="apono" id="apono" value="<?php echo $pvcode; ?>" placeholder="PV No.">
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4">
                                <label for="">Project</label>
                                  <div class="input-group">
                                  <input type="text" class="form-control" readonly="true" id="projectname" placeholder="Project" name="projectname" value="<?php echo $projectname; ?>">
                                  <input type="hidden" class="form-control" readonly="true" id="projectid" name="projectid" value="<?php echo $projectid; ?>">
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
                                    <input type="text" class="form-control daterange-single" value="<?php echo $pvdate; ?>" id="apodate" name="apodate">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                <label for="">Department</label>
                                  <div class="input-group">
                                  <input type="text" class="form-control" readonly="true" id="departmenttname" placeholder="Department" name="departmenttname" value="<?php echo $depname; ?>">
                                  <input type="hidden" class="form-control" readonly="true" id="departmenttid" name="departmenttid" value="<?php echo $depid;?>">
                                  <div class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon"><i class="icon-search4"></i></button>
                            </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="form-group">
                                    <label for=""> Remark</label>
                                    <input type="text" class="form-control" value="<?php echo $remark; ?>" name="remarkapo" id="remarkapo">
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
                              <div class="form-group">
                                <a class="openpetty btn btn-warning btn-xs" data-toggle="modal" data-target="#petty"><i class="icon-file-plus"></i> Petty Cash</a>
                              </div>
                              <!-- <div class="col-md-4">
                                <div class="form-group">
          												<div class="col-lg-10">
          													<input type="text" class="s_name form-control" placeholder="Enter Name">
          												</div>
                                  <div class="input-group-btn">
                                  <button type="button" class="btn_name btn btn-default btn-icon"><i class="icon-search4"></i> Search</button>
                                  </div>
          											</div>
                              </div> -->
                            </div>
                            <div id="table">
                            <table class="table table-bordered table-striped table-hover table-xxs">
                              <thead>
                                <tr>
                                  <th width="5%" class="text-center">No.</th>
                                  <!-- <th width="5%" class="text-center">Action</th> -->
                                  <th width="15%" class="text-center">Pettycash No.</th>
                                  <th>Advance To.</th>
                                  <th>Remark</th>
                                  <th width="15%" class="text-center">Amount</th>
                                  <th width="10%" class="text-center">Acction</th>
                                </tr>
                              </thead>
                                <tbody id="body">
                                  <?php $n=1; $total=0; foreach ($resi as $vi) {

                                    ?>
                                <tr>
                                  <td class="text-center"><?php echo $n; ?></td>
                                  <!-- <?php if ($vi->doci_chk!="") {?>
                                    <td>
                                      <div class="checkbox checkbox-switchery switchery-xs">
                                       <label>
                                          <input type="checkbox"  id="b<?php echo $n; ?>"  class="switchery" checked>
                                          <input type="hidden" name="chki[]" id="chki<?php echo $n;?>" value="<?php echo $vi->doci_chk; ?>">
                                        </label>
                                      </div>
                                    </td>
                                  <?php }else{ ?>
                                    <td>
                                      <div class="checkbox checkbox-switchery switchery-xs">
                                       <label>
                                          <input type="checkbox"  id="b<?php echo $n; ?>"  class="switchery">
                                          <input type="text" name="chki[]" id="chki<?php echo $n;?>">
                                        </label>
                                      </div>
                                    </td>
                                  <?php } ?> -->
                                  <td><?php echo $vi->doci_pcno; ?></td>
                                  <?php 
                                    $this->db->select('advname');
                                    $this->db->from('pettycash');
                                    $this->db->join('pv_apo_detail','pv_apo_detail.doci_pcno=pettycash.docno','left outer');
                                    $this->db->where('doci_pcno',$vi->doci_pcno);
                                    $query = $this->db->get();
                                    $ress = $query->result();
                                  ?>
                                  <?php foreach ($ress as $advn) {?>
                                  <td><?php echo $advn->advname;?></td>
                                  <?php } ?>
                                  <td><?php echo $vi->doci_remark; ?></td>
                                  <td class="text-right"><?php echo number_format($vi->doci_netamt,2); ?></td>
                                  <td class="text-center">
                                    <ul class="icons-list">
                                      <li><a id="delete<?php echo $vi->doci_pcno; ?>" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>
                                    </ul>
                                  </td>
                                </tr>


                                <script>
                                  $("#b<?php echo $n; ?>").click(function(){
                                    if ($("#b<?php echo $n; ?>").prop("checked")) {
                                        $("#chki<?php echo $n;?>").val("Y");
                                    }else{
                                        $("#chki<?php echo $n;?>").val("");
                                    }
                                  });

                                  $(document).on('click', 'a#delete<?php echo $vi->doci_pcno; ?>', function () { // <-- changes
                                    var self = $(this);
                                    self.closest('tr').remove();
                                    var pcno = "<?php echo $vi->doci_pcno; ?>";
                                    var url="<?php echo base_url(); ?>index.php/ap_active/delpvodetail";
                                    var dataSet={
                                      ref: pcno
                                      };
                                    $.post(url,dataSet,function(data){
                                      alert(data);
                                    });
                                  });


                                </script>
                                <?php $n++; $total=$total+$vi->doci_netamt; } ?>

                              </tbody>
                              <tr>
                                <th colspan="4" class="text-center">Sumary</th>
                                <th class="text-right"><label id="total"><?php echo number_format($total,2); ?></label><input type="hidden" id="totaltxt" value="<?php echo $total; ?>"></th>
                                <th></th>
                              </tr>
                            </table>
                          </div>

                            <br>
                            <div class="modal-footer">
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Edit</button>
                                <a href="<?php echo base_url(); ?>ap/print_apopv/<?php echo $pvcode; ?>" class="btn btn-default btn-xs"><i class="icon-printer"></i> Print</a>
                                <a href="<?php echo base_url(); ?>ap/new_pv_other" class="btn btn-default btn-xs"><i class="icon-close2 position-left"></i> Close</a>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        </form>
                        <!-- Footer -->
                       <div class="footer text-muted">
                         © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
                       </div>
                       <!-- /footer -->
          </div>
        </div>
        <script>

        // Initialize multiple switches
       if (Array.prototype.forEach) {
           var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
           elems.forEach(function(html) {
               var switchery = new Switchery(html);
           });
       }
       else {
           var elems = document.querySelectorAll('.switchery');
           for (var i = 0; i < elems.length; i++) {
               var switchery = new Switchery(elems[i]);
           }
       }
        </script>
<script>
$(".openpetty").click(function(){
  var memid = $('#memid').val();
  $('#tab').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#tab').load('<?php echo base_url(); ?>ap/load_table_add_pettycash/'+memid);
});
$('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
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

<!-- Full width modal -->
         <div id="petty" class="modal fade">
           <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Select Petty Cash</h5>
               </div>

               <div class="modal-body">

               </div>
               <div id="tab">

               </div>
               <br>
               <div class="modal-footer">
                 <a type="button" class="btn btn-link" data-dismiss="modal">Close</a>
                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
               </div>
             </div>
           </div>
         </div>
         <!-- /full width modal -->
