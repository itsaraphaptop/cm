<?php foreach ($res as $val) {
  $getprno = $val->pr_prno;
  $getname = $val->pr_reqname;
  $memid = $val->pr_memid;
  $getprojectname = $val->project_name;
  $getprojectid = $val->project_id;
  $getdepname = $val->department_title;
  $getdepid = $val->department_id;
  $getprdate = $val->pr_prdate;
  $getdelidate = $val->pr_delidate;
  $system = $val->pr_system;
  $getremark  = $val->pr_remark;
  $getplace = $val->pr_deliplace;
} ?>
<div class="content-wrapper">

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
              <li><a href="#"><i class="icon-home2 position-left"></i> ระบบจัดการในสำนักงาน</a></li>
              <li><a class="newpr" href="<?php echo base_url(); ?>index.php/office/newpr">แก้ไขใบขอซือ (PR)</a></li>
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

                    <div class="panel panel-flat">
                      <div class="panel-heading">
                        <h5 class="panel-title">Master</h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                  </ul>
                                </div>
                      </div>

                      <div class="panel-body">
                        <div class="row">
                      <div class="col-md-6">

                        <fieldset>
                        <div class="col-md-6">
                          <legend class="text-semibold"><i class="icon-reading position-left"></i> แก้ไขใบขอซือ (PR)</legend>

                          <div class="form-group">
                            <label>เลขที่ใบขอซื้อ:</label>
                            <input type="text" class="form-control" readonly="readonly" id="prno" placeholder="เลขที่ใบขอซื้อ" value="<?php echo $getprno; ?>">
                          </div>

                          <div class="form-group">
                            <label>ผู้ขอซื้อ:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" name="memname" id="memname" placeholder="กรอกผู้ขอซื้อ" value="<?php echo $getname; ?>">
                            <input type="hidden" name="memid" id="memid" value="<?php echo $memid; ?>">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default btn-icon"><i class="icon-search4"></i></button>
                              </ul>
                            </div>
                          </div>
                          </div>

                           <div class="form-group">
                            <label>โครงการ:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="โครงการ" name="projectname" id="projectname" value="<?php echo $getprojectname; ?>">
                             <input type="hidden" readonly="true" class="pproject1 form-control input-sm" name="projectid" id="putprojectid" value="<?php echo $getprojectid; ?>">
                            <div class="input-group-btn">
                              <!-- เพิ่มใหม่ -->
                              <script>
                              $(".openproj").click(function(){
                                $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                                $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
                              });
                              </script>
                              <button type="button" class="btn btn-default btn-icon"><i class="icon-search4"></i></button>
                              <!-- <button type="button" class="openproj btn btn-default btn-icon" data-toggle="modal" data-target="#openproj"><i class="icon-search4"></i></button> -->
                              <!-- เพื่มใหม่ -->
                              </ul>
                            </div>
                          </div>
                          </div>


                          <div class="form-group">
                            <label>แผนก:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="แผนก" value="<?php echo $getdepname; ?>" name="depname" id="depname">
                            <input type="hidden" readonly="true" value="<?php echo $getdepid; ?>" class="form-control input-sm input-sm" name="depid" id="depid">
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-default btn-icon"><i class="icon-search4"></i></button>
                              </ul>
                            </div>
                          </div>
                          </div>

                        </div>
                         <div class="col-md-6">
                                  <legend class="text-semibold"><i class="icon-truck position-left"></i> </legend>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>วันที่ขอซื้อ: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="prdate" name="prdate" value="<?php echo $getprdate; ?>">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>วันที่ส่งของ:</label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="deliverydate" name="deliverydate" value="<?php echo $getdelidate; ?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="code">ระบบ</label>
                                <select class="form-control input-sm" name="system" id="system">
                                   <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                                   <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                                   <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                                   <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                                   <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
                                </select>
                              </div>
                            </div>
                          </div>
                      </div>
                        </fieldset>
                        <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                            <div class="form-group">
                              <label>หมายเหตุ:</label>
                              <textarea rows="5" cols="5" class="form-control" required="required" placeholder="หมายเหตุ" name="remark" id="remark"><?php echo $getremark; ?></textarea>
                            </div>
                          </fieldset>
                      </div>
                      <div class="col-md-6">
                         <fieldset>
                             <div class="form-group">
                            <label>สถานที่ส่งของ:</label>
                            <textarea rows="5" cols="5" class="form-control" required="required" placeholder="สถานที่ส่งของ" name="place" id="place"><?php echo $getplace; ?></textarea>
                          </div>
                          </fieldset>
                      </div>
                    </div>
                      </div>
                        <div class="row" id="detail">
                            <div class="table-responsive">
                              <table class="table table-xxs">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Matterail Code</th>
                                    <th>Materail Name</th>
                                    <th>Qty</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>

                                <tbody id="body">
                                  <?php $n=1; foreach ($resi as $vai) {?>
                                    <tr>
                                       <td><?php echo $n; ?></td>
                                       <td><?php echo $vai->pri_matcode; ?><input type="hidden" name="matcodei[]" value="<?php echo $vai->pri_matcode; ?>" /></td>
                                       <td><?php echo $vai->pri_matname; ?><input type="hidden" name="matnamei[]" value="<?php echo $vai->pri_matname; ?>" /></td>
                                       <td><?php echo $vai->pri_qty; ?><input type="hidden" name="qtyi[]" value="<?php echo $vai->pri_qty; ?>" /></td>
                                       <td><?php echo $vai->pri_unit; ?><input type="hidden" name="uniti[]" value="<?php echo $vai->pri_unit; ?>" /></td>
                                       <td class="hidden-center">
                                          <ul class="icons-list">
                                           <li><a data-popup="tooltip" data-toggle="modal" data-target="#edit_modal<?php echo $vai->pri_id;?>" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>
                                          <li><a id="delete<?php echo $vai->pri_id;?>" class="preload" data-popup="tooltip" title="" data-original-title="Remove"><i class="icon-trash"></i></a></li>
                                        </ul>
                                        <input type="hidden" name="costcodei[]" value="<?php echo $vai->pri_costcode; ?>" />
                                        <input type="hidden" name="costnamei[]" value="<?php echo $vai->pri_costname; ?>" />
                                      </td>
                                    </tr>

                                    <div id="edit_modal<?php echo $vai->pri_id;?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content ">
                                        <div class="modal-header bg-info">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Edit Item: <?php echo $vai->pri_id;?> - <?php echo $vai->pri_matname; ?></h5>
                                        </div>

                                        <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-xs-6">
                                                  <label for="">รายการซื้อ</label>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                      <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                                                    </span>
                                                      <input type="text" id="newmatname<?php echo $vai->pri_id;?>" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="<?php echo $vai->pri_matname; ?>">
                                                      <input type="hidden" id="newmatcode<?php echo $vai->pri_id;?>"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="<?php echo $vai->pri_matcode; ?>">
                                                        <span class="input-group-btn" >
                                                          <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#opnewmat<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                                    </div>
                                                  </div>
                                                  <div class="col-xs-6">
                                                    <label for="">รายการต้นทุน</label>
                                                      <div class="input-group">
                                                        <input type="text" id="costname<?php echo $vai->pri_id;?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $vai->pri_costname; ?>">
                                                        <input type="hidden" id="codecostcode<?php echo $vai->pri_id;?>" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="<?php echo $vai->pri_costcode; ?>">
                                                          <span class="input-group-btn" >
                                                            <button class="btn btn-info btn-sm" id="selectcostcode<?php echo $vai->pri_id;?>" data-toggle="modal" data-target="#costcode<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                                          </span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="col-xs-6">
                                                      <div class="form-group">
                                                                <label for="qty">ปริมาณ</label>
                                                                <input type="text" id="qtyf<?php echo $vai->pri_id;?>" placeholder="กรอกปริมาณ" class="form-control"  value="<?php echo $vai->pri_qty; ?>">
                                                      </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="input-group">
                                                          <label for="unit">หน่วย</label>
                                                          <input type="text" id="unit<?php echo $vai->pri_id;?>" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="<?php echo $vai->pri_unit; ?>">
                                                        <span class="input-group-btn" >
                                                          <!-- <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit<?php echo $vai->pri_id;?>"><span class="glyphicon glyphicon-search"></span> ค้นหา</button> -->
                                                        </span>
                                                      </div>
                                                    </div>

                                                    
                                                </div>
                                                <div class="row">
                                                 <div class="col-xs-12">
                                                      <div class="form-group">
                                                         <label for="endtproject">หมายเหตุ</label>

                                                             <textarea rows="4" cols="50" type="text" id="remarkite<?php echo $vai->pri_id;?>" class="form-control" ><?php echo $vai->pri_remark; ?></textarea>

                                                    </div>
                                                      </div>
                                                 </div>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                          <button type="button"  id="edittorow<?php echo $vai->pri_id;?>" class="boxmessage btn btn-info">Edit Row</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                                    <script>
                                    $(document).on('click', '#delete<?php echo $vai->pri_id;?>', function () { // <-- changes
                                          var url="<?php echo base_url(); ?>index.php/office/delprdetail/<?php echo $vai->pri_ref;?>";
                                            var dataSet={
                                              id: <?php echo $vai->pri_id;?>
                                              };
                                              $.post(url,dataSet,function(data){

                                               setTimeout(function() {
                                                 window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+data;
                                                }, 1000);

                                              });
                                        });

                                    </script>
                                    <script>

                                               $('#edittorow<?php echo $vai->pri_id;?>').click(function(event) {
                                                var url="<?php echo base_url(); ?>index.php/pr_active/edt_prdetail/<?php echo $vai->pri_id;?>";
                                                var dataSet={
                                                  id: <?php echo $vai->pri_id;?>,
                                                  ref: "<?php echo $vai->pri_ref; ?>",
                                                  matcode: $("#newmatcode<?php echo $vai->pri_id;?>").val(),
                                                  matname: $('#newmatname<?php echo $vai->pri_id;?>').val(),
                                                  qty: $("#qtyf<?php echo $vai->pri_id;?>").val(),
                                                  unit: $("#unit<?php echo $vai->pri_id;?>").val(),
                                                  remark: $("#remarkite<?php echo $vai->pri_id;?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+data;
                                                  }, 1000);
                                                });
                                              });
                                    </script>
                                  <?php $n++; } ?>
                                </tbody>
                              </table>
                            </div>
                        </div>

                         <div class="text-right">
                         <a data-toggle="modal" data-target="#insertrow" class="btn btn-info"><i class="icon-plus22"></i> ADD Rows</a>
                          <button type="submit" class="editpo btn btn-success"><i class="icon-box-add"></i> Save </button>
                        </div>
                    </div>
                      </div>
                    </div>
          </div>
<?php foreach ($resi as  $vai2) {?>
 <!-- edit function  -->
 <div id="opnewmat<?php echo $vai2->pri_id;?>" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">เพิ่มรายการ</h5>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table datatable-basic" >
      <thead>
        <tr>
          <th>รหัสวัสดุ</th>
          <th>ชื่อวัสดุ</th>
          <th>ขนาด</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php
           foreach ($allmaterial as $vali){ ?>
        <tr>
         <td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?></td>
          <td><?php echo $vali->matgroup_name; ?></td>
          <td><?php echo $vali->matsubgroup_name; ?></td>
          <td><?php echo $vali->matname; ?></td>
            <td><button class="opennmat<?php echo $vai2->pri_id;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode<?php echo $vai2->pri_id;?>="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?>"  data-nmatgroupname<?php echo $vai2->pri_id;?>="<?php echo $vali->matgroup_name; ?><?php echo $vali->matsubgroup_name; ?>" data-munit<?php echo $vai2->pri_id;?>="<?php echo $vali->matname; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
        <script>
   $(".opennmat<?php echo $vai2->pri_id;?>").click(function() {
    $("#newmatname<?php echo $vai2->pri_id;?>").val($(this).data('nmatgroupname<?php echo $vai2->pri_id;?>'));
    $("#newmatcode<?php echo $vai2->pri_id;?>").val($(this).data('mmatcode<?php echo $vai2->pri_id;?>'));
    $("#unit<?php echo $vai2->pri_id;?>").val($(this).data('munit<?php echo $vai2->pri_id;?>'));
  });
</script>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div> <!-- matcode-->
  </div>
<div class="modal fade" id="costcode<?php echo $vai2->pri_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน <?php echo $vai2->pri_costname; ?></h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1<?php echo $vai2->pri_id;?>" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1<?php echo $vai2->pri_id;?>" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2<?php echo $vai2->pri_id;?>" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2<?php echo $vai2->pri_id;?>" style="height:150px;"></select>

                </div>
                <div id="tabcost3<?php echo $vai2->pri_id;?>" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3<?php echo $vai2->pri_id;?>" style="height:150px;">
                        </select>
                                   </div>
                 <div id="tabcost4<?php echo $vai2->pri_id;?>" class="col-xs-6">
                   <h4>รายการประเภทต้นทุน 4</h4>
                    <select multiple class="form-control" id="cost4<?php echo $vai2->pri_id;?>" style="height:150px;"></select>

                 </div>


                <div id="cost-control<?php echo $vai2->pri_id;?>" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup<?php echo $vai2->pri_id;?>">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->
<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit<?php echo $vai2->pri_id;?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
      </div>
        <div class="panel-body">
            <div class="row">
                <table id="dataunit<?php echo $vai2->pri_id;?>" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <td><?php echo $n;?></td>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openun btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit<?php echo $vai2->pri_id;?>="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>


          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!-- edit function  -->
<script>
    $("#selectcostcode<?php echo $vai2->pri_id;?>").click(function(event) {
    $("#codeup<?php echo $vai2->pri_id;?>").click(function(){});
     $("#gencodebtn<?php echo $vai2->pri_id;?>").hide();
     $("#type2<?php echo $vai2->pri_id;?>").hide();
     $("#type3<?php echo $vai2->pri_id;?>").hide();
     $("#type4<?php echo $vai2->pri_id;?>").hide();
     $("#type5<?php echo $vai2->pri_id;?>").hide();
     $('#cost-control<?php echo $vai2->pri_id;?>').hide();
     $("#tabcost4<?php echo $vai2->pri_id;?>").hide();
     $("#cost4<?php echo $vai2->pri_id;?>").hide();
     $("#box6<?php echo $vai2->pri_id;?>").hide();


     $('#gencode<?php echo $vai2->pri_id;?>').on('hidden.bs.modal', function () {
     $("#type1<?php echo $vai2->pri_id;?>").show();
     $("#type2<?php echo $vai2->pri_id;?>").hide();
     $("#type3<?php echo $vai2->pri_id;?>").hide();
     $("#type4<?php echo $vai2->pri_id;?>").hide();
     $("#type5<?php echo $vai2->pri_id;?>").hide();

     $("#gencodebtn<?php echo $vai2->pri_id;?>").hide();


     });





    $('#cost1<?php echo $vai2->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1<?php echo $vai2->pri_id;?>" ).change(function() {

         var c1 = $('#cost1<?php echo $vai2->pri_id;?>').val();
         $('#cost2<?php echo $vai2->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2<?php echo $vai2->pri_id;?>").show();
         $("#tabcost4<?php echo $vai2->pri_id;?>").hide();
    });
    $( "#cost2<?php echo $vai2->pri_id;?>" ).change(function() {

         var c2 = $('#cost2<?php echo $vai2->pri_id;?>').val();
         $('#cost3<?php echo $vai2->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4<?php echo $vai2->pri_id;?>').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3<?php echo $vai2->pri_id;?>").change(function() {
         $("#tabcost2<?php echo $vai2->pri_id;?>").hide();
         $("#tabcost4<?php echo $vai2->pri_id;?>").show();
         $("#cost4<?php echo $vai2->pri_id;?>").show();

    });
    $( "#cost4<?php echo $vai2->pri_id;?>" ).change(function() {
         $("#cost-control<?php echo $vai2->pri_id;?>").show();
    });
    $("#btncostup<?php echo $vai2->pri_id;?>").click(function(){
       var c1 = $('#cost1<?php echo $vai2->pri_id;?>').val();
     var c2 = $('#cost2<?php echo $vai2->pri_id;?>').val();
     var c3 = $('#cost3<?php echo $vai2->pri_id;?>').val();
     var c4 = $('#cost4<?php echo $vai2->pri_id;?>').val();

     var gcostcode = c4 ;
     var codecostcode = c1+''+c2+''+c3;
     $('#codecostcode<?php echo $vai2->pri_id;?>').val(codecostcode);
     $('#costname<?php echo $vai2->pri_id;?>').val(gcostcode);
     $('#gcostcode<?php echo $vai2->pri_id;?>').html(gcostcode);
     $('#costcode<?php echo $vai2->pri_id;?>').modal('hide');
     $("#tabcost4<?php echo $vai2->pri_id;?>").hide();

    });


  });
</script>
<?php } ?>
<!-- Basic modal -->
          <div id="insertrow" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content ">
                <div class="modal-header bg-info">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">เพิ่มรายการ</h5>
                </div>

                <div class="modal-body">
                        <div class="row">
                          <div class="col-xs-6">
                          <label for="">รายการซื้อ</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                            </span>
                              <input type="text" id="newmatname" disabled="true" placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                              <input type="hidden" id="newmatcode"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="costname" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                <input type="hidden" id="codecostcode" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-info btn-sm" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                        <label for="qty">ปริมาณ</label>
                                        <input type="text" id="qty" placeholder="กรอกปริมาณ" class="form-control" >
                              </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="input-group">
                                  <label for="unit">หน่วย</label>
                                  <input type="text" id="unit" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                              </div>
                            </div>
                        </div>

                        <div class="row">
             <div class="col-md-3">
               <div class="form-group">
                         <label for="qty">แปลงค่า IC</label>
                         <input type="number" id="cpqtyic" name="cqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
               </div>
             </div>
             <div class="col-md-3">
               <div class="form-group">
                         <label for="qty">ปริมาณ IC</label>
                         <input type="text" id="pqtyic" name="pqtyic"  placeholder="กรอกปริมาณ IC" class="form-control" value="1">
               </div>
             </div>
             <div class="col-xs-6">
                               <div class="input-group">
                                 <label for="unit">หน่วย IC</label>
                                 <input type="text" id="punitic" name="punitic" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="">
                               <span class="input-group-btn" >
                                 <a class="unitic btn btn-primary btn-sm" data-toggle="modal" data-target="#openunitic" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                               </span>
                             </div>
                           </div>
         </div>
          <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                         <label for="price_unit">ราคา/หน่วย</label>
                         <input type="text" id="pprice_unit"  name="price_unit" placeholder="กรอกราคา/หน่วย" class="form-control border-danger border-lg" value="0">
               </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                         <label for="amount">จำนวนเงิน</label>
                         <input type="text" id="pamount" readonly="true" name="amount" placeholder="กรอกจำนวนเงิน" class="form-control" value="0">
               </div>
             </div>
         </div>
          <div class="row">
               <div class="col-md-3">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 1 (%)</label>
                    <input type="text" id="pdiscper1" name="discountper1" placeholder="กรอกส่วนลด" class="form-control" value="0"/>
                 </div>
               </div>
                   <div class="col-md-3">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 2 (%)</label>
                        <input type="text" id="pdiscper2" name="discountper2" placeholder="กรอกส่วนลด" class="form-control" value="0" />
                     </div>
                   </div>

               <div class="col-md-3">
                 <div class="form-group">

                    <label for="endtproject">ส่วนลด 3 (%)</label>
                    <input type="text" id="pdiscper3" name="discountper3" placeholder="กรอกส่วนลด" class="form-control" value="0"/>
                 </div>
               </div>
                   <div class="col-md-3">
                     <div class="form-group">
                        <label for="endtproject">ส่วนลด 4 (%)</label>
                        <input type="text" id="pdiscper4" name="discountper4" placeholder="กรอกส่วนลด" class="form-control" value="0" />
                     </div>
                   </div>
         </div>
           <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                  <label for="endtproject">ส่วนลดพิเศษ</label>
                  <input type="text" id="pdiscex" name="discountper2" class="form-control" value="0"/>
                 </div>
             </div>
             <div class="col-md-4">
                   <div class="form-group">
                    <label for="endtproject">จำนวนเงินหลังหักส่วนลด</label>
                    <input type="text" id="pdisamt" name="disamt" class="form-control" value="0"/>
                    <input type="hidden" id="pvat" value="0">
                   </div>
             </div>
             <div class="col-md-2">
         <div class="form-group">
             <a id="chkprice" class="btn btn-primary" style="margin-top:25px;">ดูราคา</a>
         </div>
       </div>
           </div>
           <div class="row">
           <div class="col-md-2">
                    <label>VAT:</label>
                          <div class="input-group">
                            <input type="text" class="form-control text-center" id="vatper" name="vatper[]" placeholder="7%" value="7">
                            <span class="input-group-addon">%</span>
                          </div>
                  </div>
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">vat</label>

                    <input type="text" id="to_vat" name="to_vat" class="form-control"/>
                  </div>
                 </div>
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="endtproject">จำนวนเงินสุทธิ</label>

                    <input type="text" id="pnetamt" name="netamt" class="form-control" value="0"/>
                  </div>
                 </div>

                        <div class="row">
                         <div class="col-xs-12">
                              <div class="form-group">
                                 <label for="endtproject">หมายเหตุ</label>

                                     <textarea rows="4" cols="50" type='text' id="remarkitem" class="form-control" ></textarea>

                            </div>
                              </div>
                         </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                  <button type="button" id="addtorow"  class="boxmessage btn btn-info">Insert</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /basic modal -->
           <!-- Footer -->
          <div class="footer text-muted">
            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
          </div>
          <!-- /footer -->
        </div>
        <!-- /content area -->

</div>

<!--  -->
 <div class="modal fade" id="opnewmat" data-backdrop="false">
            <div class="modal-dialog modal-full">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">New Material</h4>
               </div>
                 <div class="modal-body">
                 <div class="panel-body">
                     <div class="row" id="modal_newmat">

                     </div>
                     </div>
                 </div>
             </div>
            </div>
           </div> <!--end modal -->
           <script>
              $(".openun").click(function(){
             $("#modal_newmat").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
             $("#modal_newmat").load('<?php echo base_url(); ?>share/material');
            });
           </script>
<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-full">
                       <div class="modal-content">
                         <div class="modal-header bg-info">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
                         </div>
                           <div class="modal-body">
                               <div id="modal_cost"></div>
                           </div>
                       </div>
                     </div>
                   </div><!-- end modal matcode and costcode -->
                   <script>
                     $(".modalcost").click(function(){
                       $('#modal_cost').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
                       $("#modal_cost").load('<?php echo base_url(); ?>index.php/share/costcode');
                     });
                   </script>
<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
      </div>
        <div class="panel-body">
            <div class="row">
                <table id="dataunit" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>หน่วย</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getunit as $valj){ ?>
        <tr>
         <td><?php echo $n;?></td>
          <td><?php echo $valj->unit_name; ?></td>
            <td><button class="openun btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>


          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!--  -->


      <script>
      $('.datatable-basic').DataTable();

       $("#myform").validate();
      </script>
<script>
$('#chk').click(function(event) {
  if($('#chk').prop('checked')) {
   $('#newmatname').prop('disabled', false);
} else {
    $('#newmatname').prop('disabled', true);
}
});


</script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/pnotify.min.js"></script>

<script>
  $('.editpo').click(function() {
      var url="<?php echo base_url(); ?>index.php/office/edit_prmaster";
      var dataSet={
          prcode: $("#prno").val(),
          pridate: $('#prdate').val(),
          memname: $("#memname").val(),
          memid: $("#memid").val(),
          putproject: $("#putprojectid").val(),
          depart: $("#depid").val(),
          place: $("#place").val(),
          deliverydate: $("#deliverydate").val(),
          remarkedit: $("#remark").val()
        };
      $.post(url,dataSet,function(data){
        new PNotify({
            title: 'Success notice',
            text: data,
            icon: 'icon-checkmark3',
            type: 'success'
        });
      });
    });




</script>

<script>
  $('#addtorow').click(function() {
        var prprcode = $('#prno').val();
        var url="<?php echo base_url(); ?>index.php/office/add_prdetail2";
          var dataSet={
            prcode: prprcode,
            matcode: $("#newmatcode").val(),
            matname: $('#newmatname').val(),
            codecostcode: $('#codecostcode').val(),
            costname: $('#costname').val(),
            qty: $("#qty").val(),
            unit: $("#unit").val(),
            remark: $("#remarkitem").val(),
            cpqtyic: $("#cpqtyic").val(),
            pqtyic: $("#pqtyic").val(),
            punitic: $("#punitic").val(),
            pprice_unit: $("#pprice_unit").val(),
            pamount: $("#pamount").val(),
            pdiscper1: $("#pdiscper1").val(),
            pdiscper2: $("#pdiscper2").val(),
            pdiscper3: $("#pdiscper3").val(),
            pdiscper4: $("#pdiscper4").val(),
            pdiscex: $("#pdiscex").val(),
            pdisamt: $("#pdisamt").val(),
            pvat: $("#pvat").val(),
            vatper: $("#vatper").val(),
            to_vat: $("#to_vat").val(),
            pnetamt: $("#pnetamt").val(),
            whereboq: "0",
            };
            $.post(url,dataSet,function(data){

              setTimeout(function() {
                window.location.href = "<?php echo base_url(); ?>index.php/pr/editpr/"+data;
              }, 1000);
            });
 });
</script>
