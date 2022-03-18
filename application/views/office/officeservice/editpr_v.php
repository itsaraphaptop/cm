<?php foreach ($all as $v) {
$prno = $v->pr_prno;
$prdate = $v->pr_prdate;
$reqname = $v->pr_reqname;
$projid = $v->pr_project;
$projname = $v->project_name;
$sys = $v->pr_system;
$depid = $v->pr_department;
$depname = $v->department_title;
$deli = $v->pr_deliplace;
$delivery = $v->pr_delidate;
$remark = $v->pr_remark;
} ?>
<div id="newpr" class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> เพื่มใบขอซื้อใหม่</div>
<div class="panel-body">
                        <div class="row" id="gprpno">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">เลขที่ใบขอซื้อ</label>
                              <input type="text" class="prpno form-control input-sm" id="prpno" value="<?php echo $prno; ?>" readonly="true">
                            </div>
                          </div>
                          <div class="col-md-4 col-md-offset-4">
                              <label for="purchasedate">วันที่ขอซื้อ</label>
                                <div class="form-group">
                                    <input type="text" name="prdate" class="prdate form-control input-sm" value="<?php echo $prdate; ?>" id="prdate">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="input-group">
                              <label for="code">ผู้ขอซื้อ</label>
                              <input type="text" name="vender" id="memname" readonly="true" placeholder="เลือกผู้ขอซื้อ" value="<?php echo $reqname; ?>" class="form-control input-sm">
                              <input type="hidden" name="memid" id="memid">
                              <span class="input-group-btn" >
                                <button class="openmem btn btn-primary btn-sm" data-toggle="modal" data-target="#openme" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                              </span>
                            </div>
                          </div>
                                            <div class="col-md-4" >
                                              <div class="input-group">
                                               <label for="project1">แผนก</label>
                                                  <input type="text" readonly="true" placeholder="เลือกแผนก" value="<?php echo $depname; ?>" class="form-control input-sm input-sm" id="projectnam">
                                                  <input type="hidden" readonly="true"  class="form-control input-sm input-sm" value="<?php echo $depid; ?>" name="project" id="putproject">
                                                  <span class="input-group-btn">
                                                    <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                                  </span>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="deliverydate">วันที่ส่งของ</label>
                                                <div class="form-group">
                                                    <input type='text' name="deliverydate" value="<?php echo $delivery; ?>" class="form-control input-sm" id="deliverydate">
                                                </div>
                                              </div>
                                           </div>
                         </div>
                       <div class="row">
                           <div class="col-xs-6" >
                              <div class="input-group">
                               <label for="project1">โครงการ</label>
                                  <input type="text" readonly="true"  class="form-control input-sm" value="<?php echo $projname; ?>"  id="projectnam1">
                                  <input type="hidden" readonly="true"  class="pproject1 form-control input-sm" value="<?php echo $projid; ?>" name="project1" id="putproject1">
                                  <span class="input-group-btn">
                                    <button class="openproj1 btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject1" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>


                                  </span>

                              </div>
                            </div>
                         </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place">สถานที่ส่งของ</label>
                                    <textarea rows="4" cols="50"  type="text" name="place" id="place" placeholder="กรอกสถานที่ส่งของ" class="form-control input-sm"><?php echo $deli; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label for="remark">หมายเหตุ</label>
                                    <textarea rows="4" cols="50" class="form-control input-sm" type="text" name="remark" id="remark" placeholder="กรอกหมายเหตุ"><?php echo $remark; ?></textarea>
                                </div>
                            </div>
                        </div>


  <div class="row">
    <div class="col-md-6">
      <div class="form-group">

        <button class="editpo btn btn-primary" type="submit" id="editpo">แก้ไข</button>
       <!-- <button class="adddetail btn btn-primary"  id="adddetail" data-toggle="modal" data-target="#opens" data-cost="เลือก">เพิ่มรายการ</button> -->
        <a class="print" target="_blank"><button class="adddetail btn btn-primary" type="submit">พิมพ์</button></a>
        <button class="saveprh btn btn-primary" t id="undo" >เพิ่มรายการ</button>
        <button class="sendapp btn btn-danger" type="submit">ส่งอนุมัติ</button>
      </div>
    </div>
  </div>
</div>

</div>
<div class="panel panel-primary addboxpri">
	<div class="panel-heading">เพิ่มรายการวัสดุ</div>
	<div class="panel-body">

	  <div class="row">
                          <div class="col-xs-6">
                          <label for="">รายการซื้อ</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" id="chk" aria-label="กำหนดเอง">
                            </span>
                              <input type="text" id="newmatname"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                              <input type="hidden" id="newmatcode"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label for="">รายการต้นทุน</label>
                              <div class="input-group">
                                <input type="text" id="costname" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                <input type="hidden" id="codecostcode" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
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
                                  <input type="text" id="unit" name="unit" readonly="true" placeholder="กรอกหน่วย" class="punit form-control input-sm">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                              </div>
                            </div>
                        </div>

                         <div class="row">
                         <div class="col-xs-12">
                              <div class="form-group">
                                 <label for="endtproject">หมายเหตุ</label>

                                     <textarea rows="4" cols="50" type='text' id="remark" class="form-control" ></textarea>

                            </div>
                              </div>
                         </div>

                         <div class="row">
                            <div class="col-xs-6">
                              <div class="form-group">
                                  <input type="hidden" name="poid" value="">

                                  <button type="submit" class="opdetail btn btn-primary"  data-dismiss="modal">ยืนยันการเพิ่มข้อมูล</button>
                              </div>
                            </div>
                        </div>
                        </div>
</div>

<!-- รายการซื้อใหม่ -->
<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="opnewmat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="datatable" class="table table-hover" >
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
          <?php foreach ($allmaterial as $vali){ ?>
        <tr>
         <td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?></td>
          <td><?php echo $vali->matgroup_name; ?></td>
          <td><?php echo $vali->matsubgroup_name; ?></td>
          <td><?php echo $vali->matname; ?></td>
            <td><button class="opennmat btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?>"  data-nmatgroupname="<?php echo $vali->matgroup_name; ?><?php echo $vali->matsubgroup_name; ?>" data-munit="<?php echo $vali->matname; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- จบรายการซื้อ -->



<div id="loaddatadetail">

</div>

<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>รหัสแผนก</th>
          <th>ชื่อแผนก</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getdep as $valj){ ?>
        <tr>
         <td><?php echo $valj->department_code; ?></td>
          <td><?php echo $valj->department_title; ?></td>
            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-depid="<?php echo $valj->department_code;?>" data-depname="<?php echo $valj->department_title;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->


<!-- modal เลือกผู้ขอซื้อ -->
 <div class="modal fade" id="openme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered table-striped table-hover" >
      <thead>
        <tr>
          <th>No.</th>
          <th>ชื่อผู้ขอเบิก</th>
          <th>แผนก/โครงการ</th>
          <th width="10%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($resmem as $val){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
          <td><?php echo $val->m_name; ?></td>
          <td><?php echo $val->department_title; ?><?php echo $val->project_name; ?></td>
            <td><button class="openmem btn btn-xs btn-block btn-info" data-toggle="modal"  data-mname="<?php echo $val->m_name;?>" data-mid="<?php echo $val->m_id;?>"  data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->


<!-- Modal  รายการ -->
<div class="modal fade" id="opens" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>  <!--  end model รายการ -->

<!--  modal gen matcode and costcode -->
<div class="modal fade" id="gencode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการวัสดุ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="type1" class="col-xs-6">
                    <h4>รายการประเภทสินค้า 1</h4>
                    <select multiple class="form-control" id="box1" style="height:350px;">
                    </select>
                </div>
                <div id="type2" class="col-xs-6">

                     <h4>รายการประเภทสินค้า 2</h4>
                     <select multiple class="form-control" id="box2" style="height:350px;">

</select>

                </div>
                <div id="type3" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 3</h4>
                    <select multiple class="form-control" id="box3" style="height:350px;">

</select>
                </div>
                <div id="type4" class="col-xs-6">
                     <h4>รายการประเภทสินค้า 4</h4>
                    <select multiple class="form-control" id="box4" style="height:350px;">

</select>
                </div>
                <div id="type5" class="col-xs-6">
	                <h4>รายการประเภทสินค้า 5</h4>
                     <select multiple class="form-control" id="box5" style="height:350px;"/>
                </select>
                     <select multiple class="form-control" id="box6" style="height:350px;"/>
</select>
                </div>

                <div class="col-xs-12" id="gencodebtn">
                    <hr>
                    <button class="btn btn-primary" id="btngenmatcode" data-dismiss="modal" style="float: right;">สร้าง MatCode</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="costcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการต้นทุน</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div id="tabcost1" class="col-xs-12">
                    <h4>รายการประเภทต้นทุน 1</h4>
                    <select multiple class="form-control" id="cost1" style="height:150px;">
                    </select>
                </div>
                <div id="tabcost2" class="col-xs-6">

                     <h4>รายการประเภทต้นทุน 2</h4>
                     <select multiple class="form-control" id="cost2" style="height:150px;">

</select>

                </div>
                <div id="tabcost3" class="col-xs-6">
                     <h4>รายการประเภทต้นทุน 3</h4>
                    <select multiple class="form-control" id="cost3" style="height:150px;">
                        </select>
                                   </div>
                 <div id="tabcost4" class="col-xs-6">
	                 <h4>รายการประเภทต้นทุน 4</h4>
	                  <select multiple class="form-control" id="cost4" style="height:150px;">

</select>

                 </div>


                <div id="cost-control" class="col-xs-12">
                    <hr>

                        <div class="row" style="margin-top:10px;">
                            <div class="col-xs-12">
                        <button class="btn btn-primary" style="float:right;" data-dismiss="modal" id="btncostup">สร้าง CostCode</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </div>
</div><!-- end modal matcode and costcode -->



<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="openproject1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="projpaginate" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>รหัสโครงการ</th>
          <th>ชื่อโครงการ</th>
          <th>ที่อยู่โครงการ</th>
          <th width="5%">จัดการ</th>
        </tr>
      </thead>
      <tbody>
          <?php   $n =1;?>
          <?php foreach ($getproj as $valj){ ?>
        <tr>
         <th scope="row"><?php echo $n;?></th>
         <td><?php echo $valj->project_code; ?></td>
          <td><?php echo $valj->project_name; ?></td>
          <td><?php echo $valj->project_address; ?></td>
            <td><button class="openproj1 btn btn-xs btn-block btn-info" data-toggle="modal"  data-projidp="<?php echo $valj->project_id;?>" data-projnamep="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
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


<!-- รายการซื้อใหม่ -->
<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="opnewmat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <table id="datatable" class="table table-hover" >
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
          <?php foreach ($allmaterial as $vali){ ?>
        <tr>
         <td><?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?></td>
          <td><?php echo $vali->matgroup_name; ?></td>
          <td><?php echo $vali->matsubgroup_name; ?></td>
          <td><?php echo $vali->matname; ?></td>
            <td><button class="opennmat btn btn-xs btn-block btn-info" data-toggle="modal" data-mmatcode="<?php echo $vali->mattype_code; ?><?php echo $vali->matgroup_code; ?><?php echo $vali->matsubgroup_code; ?>"  data-nmatgroupname="<?php echo $vali->matgroup_name; ?><?php echo $vali->matsubgroup_name; ?>" data-munit="<?php echo $vali->matname; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
          <?php $n++; } ?>
      </tbody>
    </table>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- จบรายการซื้อ -->

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  // $(document).ready(function() {
    $('#projpaginate').DataTable();
     $('#dataunit').DataTable();
     $('#datatable').DataTable();
// } );

</script>

    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
     <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="<?php echo base_url();?>dist/js/bootstrap.min.js"></script>



<script>
            // $(document).ready(function() {
              // ready load detail
              $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/office/service_pr_detail'+'/'+"<?php echo $prno; ?>");
	            $('.addboxpri').hide();
                // create DatePicker from input HTML element
                $("#adddetail").hide();
                $('#newmatname').prop('disabled', true);

                $("#deliverydate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#prdate").kendoDatePicker({
                    format : "yyyy-MM-dd"

                });
                 $("#tabcost4").hide();
            // });
</script>

<script>
  $(".opennmat").click(function(event) {
    $("#newmatname").val($(this).data('nmatgroupname'));
    $("#newmatcode").val($(this).data('mmatcode'));
    $("#unit").val($(this).data('munit'));
  });
</script>
<script>
  // $(document).ready(function() {
    $("#codeup").click(function(){});
     $("#gencodebtn").hide();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();
     $('#cost-control').hide();
     $("#cost4").hide();
     $("#box6").hide();


     $('#gencode').on('hidden.bs.modal', function () {
     $("#type1").show();
     $("#type2").hide();
     $("#type3").hide();
     $("#type4").hide();
     $("#type5").hide();

     $("#gencodebtn").hide();


     });


     $('#box1').load('<?php echo base_url('index.php/materialcode/get_type');?>');
     $( "#box1" ).change(function() {
           var b1 = $('#box1').val();
           $('#box2').load('<?php echo base_url('index.php/materialcode/get_group/');?>'+'/'+b1);

         $("#type2").show();
          $('#vgencode').html('');

    });
    $( "#box2" ).change(function() {
         $("#type1").hide();
         var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         $('#box3').load('<?php echo base_url('index.php/materialcode/get_subgroup/');?>'+'/'+b1+'/'+b2);
         $("#type3").show();
    });
    $( "#box3" ).change(function() {
        var b1 = $('#box1').val();
         var b2 = $('#box2').val();
         var b3 = $('#box3').val();
         $('#box4').load('<?php echo base_url('index.php/materialcode/get_product/');?>'+'/'+b1+'/'+b2+'/'+b3);
         //$('#box5').load('<?php echo base_url('index.php/materialcode/get_productname/');?>'+'/'+b1+'/'+b2+'/'+b3);


         $("#type4").show();
         $("#type2").hide();
    });
    $( "#box4" ).change(function() {
         //$("#type4").hide();
         $('#type3').hide();
         $("#gencodebtn").show();
         //$("#type5").show();

    });
    $("#box5").change(function() {
       //$("#gencodebtn").show();
       //var b5 = $('#box5').val();
    });

    $('#btngenmatcode').click(function(){
     var b1 = $('#box1').val();
     var b2 = $('#box2').val();
     var b3 = $('#box3').val();
     var b4 = $('#box4').val();
     var b5 = $('#box5').val();

     var b6gmatcode = b1+''+b2+''+b3+''+b4;
     $('#matcodeb6').val(b6gmatcode);
     var url="<?php echo base_url(); ?>index.php/materialcode/getall";
          var dataSet={
            b1: b6gmatcode
            };
            $.post(url,dataSet,function(data){
              $('#matname').val(data);
              $('#vgencode').html(data);
            });

    });


    $('#cost1').load('<?php echo base_url('index.php/materialcode/get_cost_type');?>');
    $( "#cost1" ).change(function() {

         var c1 = $('#cost1').val();
         $('#cost2').load('<?php echo base_url('index.php/materialcode/get_cost_group/');?>'+'/'+c1);
     $("#tabcost2").show();
         $("#tabcost4").hide();
    });
    $( "#cost2" ).change(function() {

         var c2 = $('#cost2').val();
         $('#cost3').load('<?php echo base_url('index.php/materialcode/get_cost_subgroup/');?>'+'/'+c2);
          $('#cost4').load('<?php echo base_url('index.php/materialcode/get_cost_subgroupname/');?>'+'/'+c2);
    });
    $( "#cost3").change(function() {
         $("#tabcost2").hide();
         $("#tabcost4").show();
         $("#cost4").show();

    });
    $( "#cost4" ).change(function() {
         $("#cost-control").show();
    });
    $("#btncostup").click(function(){
       var c1 = $('#cost1').val();
     var c2 = $('#cost2').val();
     var c3 = $('#cost3').val();
     var c4 = $('#cost4').val();

     var gcostcode = c4 ;
     var codecostcode = c1+''+c2+''+c3;
     $('#codecostcode').val(codecostcode);
     $('#costname').val(gcostcode);
     $('#gcostcode').html(gcostcode);
     $('#costcode').modal('hide');
     $("#tabcost4").hide();

    });


  // });
</script>
  <script>
    $(".openun").click(function(){
      $("#unit").val($(this).data('vunit'));
    });
  </script>
<script>
  $(".openproj").click(function(){
    $("#putproject").val($(this).data('depid'));
    $('#projectnam').val($(this).data('depname'));
    $("#putproject1").val("");
    $('#projectnam1').val("");
  });
</script>
  <script>
    $(".openproj1").click(function(){
      $("#putproject1").val($(this).data('projidp'));
      $('#projectnam1').val($(this).data('projnamep'));
      $("#putproject").val("");
      $('#projectnam').val("");
    });
  </script>
<script>
  $(".openmem").click(function(){
    $("#memname").val($(this).data('mname'));
    $("#memid").val($(this).data('mid'));
  });
</script>
<script>
$('.saveprh').click(function(){
  $('.addboxpri').show();
    $('.opdetail').click(function() {
        var prprcode = $('#prpno').val();
        var url="<?php echo base_url(); ?>index.php/office/add_prdetail";
          var dataSet={
            prcode: prprcode,
            matcode: $("#newmatcode").val(),
            matname: $('#newmatname').val(),
            codecostcode: $('#codecostcode').val(),
            costname: $('#costname').val(),
            qty: $("#qty").val(),
            unit: $("#unit").val(),
            remark: $("#remark").val()
            };
            $.post(url,dataSet,function(data){
              $('#loaddatadetail').load('<?php echo base_url(); ?>index.php/office/service_pr_detail'+'/'+prprcode);
              $("#undo").show();
              $("#editpo").show();
              $("#adddetail").show();
              $("#prpno").val(prprcode);
                  $(this).removeData('bs.modal');
              // $('#vgencode').html('เลือกสินค้า');
              // $('#gcostcode').html('เลือกต้นทุน');
              $('#qty').val('');
              $('#unit').val('');
              $('#remark').html('');
              $("#newmatcode").val('');
              $('#newmatname').val('');
              $('#costname').val('');
              $('#codecostcode').val('');
             var b1,b2,b3,b4,b5 = 0;
             var c1,c2,c3,c4 = '';

             $('#cost2').html('');
             $('#cost3').html('');
             $('#cost4').html('');
             $("#cost-control").hide();
             $('.print').prop('disabled', false);
              $(".opdetail").prop('disabled', true);
               $('.addboxpri').hide();
});
 });
           });
</script>



<script>
  $('.print').click(function(){
   var pp = $('#prpno').val();
     url = "<?php echo base_url(); ?>index.php/report/report_pr"+"/"+pp;
      $(location).attr("href", url);
  });
</script>


<script>
  $('.editpo').click(function() {
      var url="<?php echo base_url(); ?>index.php/office/edit_prmaster";
      var dataSet={
          prcode: $("#prpno").val(),
          pridate: $('.prdate').val(),
          memname: $("#memname").val(),
          putproject: $("#putproject1").val(),
          depart: $("#putproject").val(),
          place: $("#place").val(),
          deliverydate: $("#deliverydate").val(),
          remark: $("#remark").val()
        };
      $.post(url,dataSet,function(data){
        alert(data);
      });
    });




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

 <script>
  // $(document).ready(function() {
    $(".opdetail").prop('disabled', true);
    if ($("#prpno").val()=="") {
       $('.print').prop('disabled', true);
     }else
     {
      $('.print').prop('disabled', false);
     }

  // });
  $("#qty").change(function() {
     $(".opdetail").prop('disabled', false);
  });
     $("#prdate").change(function() {
     $(".saveprh").prop('disabled', false);
  });

</script>
<script>
  $(".sendapp").click(function(event) {
   var url="<?php echo base_url(); ?>index.php/site/sendapp_pr";
      var dataSet={
        prno: $("#prpno").val()
        };
      $.post(url,dataSet,function(data){
        alert("สงอนุมติแล้ว");
         $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/receice_allpr');
      });
  });
</script>
