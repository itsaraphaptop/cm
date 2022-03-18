<div class="content-wrapper">
        <div class="page-header">
        <div class="content">
        <fieldset>
          <div class="row">
            <div class="panel panel-flat">
              <div class="panel-heading">
                <div class="col-xs-6">
                <h5 class="panel-title">Goods Issue Document</h5>
                  </div>
                  <div class="col-xs-6">
                 <div class="pull-right">
                            <!-- <a data-toggle="modal" data-target="#openbook" class="openbook btn btn-info"><i class=" icon-file-plus"></i> Select</a> -->
                 </div>
               </div>
                  </div>
              <div class="panel-body">
                <form id="insertform" name="insertform" action="<?php echo base_url(); ?>index.php/inventory_active/add_doc_issue" method="post">
                <div class="row">
                      <div class="col-md-12">

                        <fieldset>
                        <div class="col-md-6">
                          <!-- <legend class="text-semibold"><i class="icon-reading position-left"></i> บันทึกใบเบิกวัสดุ (Document Issue)</legend> -->

                          <div class="form-group">
                            <label>Goods Issue Document:</label>
                            <input type="hidden" class="form-control" readonly="readonly" name="flag" id="flag">
                            <input type="text" class="form-control" readonly="readonly" id="docno" value="<?= $header[0]['is_doccode'];?>" placeholder="Goods Issue Document">
                          </div>

                          <div class="form-group">
                            <label>User Issue:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" name="name" id="memname" value="<?= $header[0]['is_reqname']?>" placeholder="User Issue" value="<?php echo $name; ?>">
                            <input type="hidden" id="memid" name="nameid">
                            <div class="input-group-btn">
                              <button type="button" class="openemp btn btn-default btn-icon" data-toggle="modal" data-target="#openem"><i class="icon-search4"></i></button>

                            </div>
                          </div>
                          </div>

                           <div class="form-group">
                            <label>Project Name:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-office"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="โครงการ" value="<?php echo $projectname;?>" name="projectname" id="projectname">
                             <input type="hidden" readonly="true" class="pproject form-control input-sm" value="<?php echo $header[0]['is_project'];?>" name="projectid" id="putprojectid">
                            <div class="input-group-btn">
                              <!-- <button type="button" class="openproj btn btn-default btn-icon" data-toggle="modal" data-target="#openproj"><i class="icon-search4"></i></button> -->
 
                            </div>
                          </div>
                          </div>


                          <div class="form-group">
                            <label>Deprtment Name:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                              <button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
                            </span>
                            <input type="text" class="form-control" readonly="readonly" placeholder="แผนก" value="" name="depname" id="depname">
                            <input type="hidden" readonly="true" class="form-control input-sm input-sm" value="" name="depid" id="depid">
                            <div class="input-group-btn">
                              <!-- <button type="button" class="opendepart btn btn-default btn-icon" data-toggle="modal" data-target="#opendepart"><i class="icon-search4"></i></button> -->

                            </div>
                          </div>
                          </div>

                        </div>
                         <div class="col-md-6">
                           
                                  

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Goods Issue Date: </label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="docdate" name="docdate" >
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <!-- <div class="form-group">
                                <label>วันที่ส่งของ:</label>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                  <input type="text" class="form-control daterange-single" id="deliverydate" name="deliverydate">
                                </div>
                              </div> -->
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="code">System Type</label> <?php echo $header[0]['is_project'];?>
                                <select class="form-control input-sm" name="system" id="system">
                                   <?php 
                                   $sys = $header[0]['is_project'];
                                   foreach ($item as $key => $value) {
                                    $q = $this->db->query("select * from system where systemcode='$sys'")->result();
                                    foreach ($q as $key => $v) {  ?>
                                  <option value="<?php echo $value->is_project; ?>"><?php echo $v->systemname; ?></option>
                                <?php } } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Book No.</label>
                                <input type="text" readonly="" class="form-control" value="<?php echo $header[0]['is_bookcode'];?>" name="bookcode" id="bookno" >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label for="">Book Date.</label>
                              <div class="input-group">

                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                <input type="text" class="form-control daterange-single" name="bookdate" id="bookdate" value="<?php echo $header[0]['is_bookdate'];?>">
                              </div>
                            </div>
                          </div>
                      </div>
                        </fieldset>
                        <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                            <div class="form-group">
                              <label>Remark :</label>
                              <textarea rows="5" cols="5" id="c" class="form-control" required="required" placeholder="Remark" name="remark"><?php echo $header[0]['is_remark'];?></textarea>
                            </div>
                          </fieldset>
                      </div>
                      <div class="col-md-6">
                         <fieldset>
                             <div class="form-group">
                            <label>Issue for Area Work:</label>
                            <textarea rows="5" cols="5" class="form-control"  placeholder="สถานที่ใช้งาน" name="place" id="place"><?php echo $header[0]['is_place'];?></textarea>
                          </div>
                          </fieldset>
                      </div>
                    </div>
                      </div>
                      <div class="col-md-12">
                      <div class="tablex">
                        <div class="row">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover table-xxs">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Materail Code</th>
                                    <th>Materail Name</th>
                                    <th>WareHouse Name</th>
                                    <th>QTY Balance</th>
                                    <th>Qty</th>
                                    <th>Unit Name</th>
                                    <!-- <th>Action</th> -->
                                  </tr>
                                </thead>
                                <tbody id="body">
                                <?php $n=1; foreach ($detail as $key => $value) {?>
                                <tr>
                                  <td class="text-center"><?php echo $n;?></td>
                                  <td class="text-center"><?php echo $value->isi_matcode;?></td>
                                  <td class="text-center"><?php echo $value->isi_matname;?></td>
                                  <td class="text-center"><?php echo $value->whname;?></td>
                                  <td class="text-center" width="10%"><input type="number" class="form-control input-xs text-right" value="<?php echo number_format($value->isi_xqty,2);?>" name="" id=""></td>
                                  <td class="text-center" width="10%"><input type="number" class="form-control input-xs text-right" value="<?php echo number_format($value->isi_xqty,2);?>" name="" id=""></td>
                                  <td class="text-center"><?php echo $value->isi_unit;?></td>
                                </tr>
                                <?php $n++; }?>
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div id="gll">
                          
                        </div>
                        <div id="bookingg">
                          
                        </div>
                        </div>
                      </div>
                      <br>
                      <div class="text-right">
                      <!-- <a data-toggle="modal" data-target="#insertrow" class="btn btn-info"><i class="icon-plus22"></i> ADD Rows</a> -->
                      <button type="button" class="btn btn-success" disabled="" id="savee"><i class="icon-box-add"></i> Save </button>
                      <a id="fa_close" href="<?php echo base_url(); ?>" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
                    </div>
                  </form>
              </div>
            </div>
          </div>

<script type="text/javascript">
$("#savee").click(function(e){
  var row = ($('#body tr').length-0)+1;
if ($("#c").val()=="") {
  swal({
      title: "Please Fill Remark !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if($("#place").val()==""){
  swal({
      title: "Please Fill Issue for Area Work !!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else if(row<=1){
  swal({
      title: "Please Fill Add Goods Issue Document Item!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
}else{
   var frm = $('#insertform');
     frm.submit(function (ev) {
      $(".page-container").html('<div class="loading">Loading&#8230;</div>');
         $.ajax({
             type: frm.attr('method'),
             url: frm.attr('action'),
             data: frm.serialize(),
                     success: function (data) {
                 swal({
                           title: ""+data,
                           text: "Save Completed!!.",
                           confirmButtonColor: "#66BB6A",
                           type: "success"
                       });
                  setTimeout(function() {
                        window.location.href = "<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_issue.mrt&doccode="+data;
                 }, 500);
             }
         });
         ev.preventDefault();
     });
   $("#insertform").submit();
 }
});
//
//
 </script>

          <div id="insertrow" class="modal fade">
           <div class="modal-dialog modal-lg">
             <div class="modal-content ">
               <div class="modal-header bg-info">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title">Add Goods Issue Document</h5>
               </div>

               <div class="modal-body">
                       <div class="row">
                         <div class="col-xs-6">
                         <label for="">เลือกวัสดุ</label>
                           <div class="input-group">
                             <input type="text" id="newmatname" disabled="true" placeholder="เลือกวัสดุ" class="form-control input-sm">
                             <input type="hidden" id="newmatcode"  placeholder="เลือกรายการซื้อ" class="form-control input-sm">
                             <!-- <input type="hidden" id="storetotol"> -->
                               <span class="input-group-btn" >
                                 <button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openstore"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                               </span>
                           </div>
                         </div>
                         <div class="col-xs-6">
                           <label for="">จำนวนคงเหลือในคลัง</label>
                           <input type="text" disabled="true" class="form-control" id="storetotol">
                         </div>
                         </div>
                         <div class="row">
                           <div class="col-xs-6">
                             <div class="form-group">
                                       <label for="qty">ปริมาณ</label>
                                       <input type="number" id="qty" placeholder="กรอกปริมาณ" class="form-control" >
                             </div>
                           </div>
                           <div class="col-xs-6">
                               <div class="input-group">
                                 <label for="unit">หน่วย</label>
                                 <input type="text" id="unit" readonly="true" placeholder="กรอกหน่วย" class="form-control">
                               <span class="input-group-btn" >
                                 <a class="openun btn btn-info disabled" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</a>
                               </span>
                             </div>
                           </div>
                       </div>
                       <div class="row">
                         <div class="col-xs-6">
                           <label for="selwh">WH</label>
                           <input type="text" class="form-control" readonly name="whname" id="whname">
                           <input type="hidden" class="form-control" name="whcode" id="whcode">
                          <!--  <select class="form-control" id="whname" name="whname">
                             <option value=""></option>
                             <?php foreach ($getwh as $setwh): ?>
                             <option value="<?php echo $setwh->whcode; ?>"><?php echo $setwh->whcode; ?> - <?php echo $setwh->whname ; ?> </option>
                             <?php endforeach; ?>
                           </select> -->
                         </div>
                        <div class="col-xs-6">
                         <!--  <label for="selarea">Area</label>
                           <select class="form-control" id="areaname" name="areaname">
                             <option value=""></option>
                             <?php foreach ($getarea as $setarea): ?>
                              <option value="<?php echo $setarea->area_code ;?>"><?php echo $setarea->area_code ;?> - <?php echo $setarea->area_name; ?></option>
                              <?php endforeach; ?>
                           </select> -->
                         </div>
                       </div>
                       <div class="row">
                        <div class="col-xs-12">
                             <div class="form-group">
                                <label for="endtproject">หมายเหตุ</label>
                                    <textarea rows="4" cols="50" type='text' id="remarkitem" class="form-control" ></textarea>
                                    <input type="hidden" id="costname" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                    <input type="hidden" id="codecostcode" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm">
                                    <input type="hidden" id="unitprice" class="form-control input-sm">
                                    <input type="hidden" id="totprice" class="form-control input-sm">
                           </div>
                             </div>
                        </div>

                        <div class="row">
                                <div class="col-xs-6">
                            <label for="">Ref. Asset Code</label>
                              <div class="input-group">
                          <input type="text" id="accode" name="accode"  readonly="true"  class="form-control input-sm">
                          <input type="text" id="acname" name="acname" readonly="true"  class="form-control input-sm">
                          <input type="hidden" id="statusass" name="statusass" readonly="true"  class="form-control input-sm">
                                  <span class="input-group-btn" >
                                    <button class="btn btn-info btn-sm" id="refasset" data-toggle="modal" data-target="#refass"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                  </span>
                              </div>
                            </div>
                        </div>
               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                 <button type="button" id="addtorow" data-dismiss="modal" class="btn btn-info">Insert</button>
               </div>
             </div>
           </div>
         </div>
        </fieldset>

        <!-- modal เลือกรผู้ขอเบิก -->

        <div class="modal fade" id="refass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ref. Asset Code</h4>
      </div>
        <div class="modal-body">
            <div class="row" id="refasscode">
             </div>

        </div>
    </div>
  </div>
</div>

<script>
$('#refasset').click(function(){
   $('#refasscode').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
   $("#refasscode").load('<?php echo base_url(); ?>share/modalshare_asset');
 });
</script>
         <div class="modal fade" id="openem" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
              </div>
                <div class="modal-body">
                 <button id="contractor" class="label label-primary" data-toggle="modal" data-target="#addcons"> Add Contractor</button>
                <div class="panel-body">
                    <div class="row">
                    <!-- <button id="employee" class="label label-primary"> Employee</button> -->
                   
                      <div id="modal_member">

            </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div> <!--end modal -->
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
        <!-- modal  โครงการ-->
         <div class="modal fade" id="addcons" data-backdrop="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Contractor</h4>
              </div>
                <div class="modal-body">
                <div class="panel-body">
                    <div class="row" id="modal_cons">

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
           <!-- Footer -->
          <div class="footer text-muted">
            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
          </div>
          <!-- /footer -->
        </div>
        <!-- /content area -->
        <!-- modal เลือกหน่วย -->
         <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
              </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>หน่วย</th>
                              <th>จัดการ</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php   $n =1;?>
                              <?php foreach ($getunit as $valj){ ?>
                            <tr>
                             <td><?php echo $n;?></td>
                              <td><?php echo $valj->unit_name; ?></td>
                                <td><button class="selectunit<?php echo $n;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
                            </tr>
                            <script>
                              $(".selectunit<?php echo $n;?>").click(function(){
                                $("#unit").val($(this).data('vunit'));
                              });
                            </script>
                              <?php $n++; } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div> <!--end modal -->

</div>
<!-- modal store -->
 <div class="modal fade" id="openstore" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกวัสดุ</h4>
      </div>
        <div class="panel-body">
          <div id="loadmodal"></div>
          <div class="table-responsive">
  <table class="table table-striped table-hover table-xxs datatable-basic">
           <thead>
             <tr>
               <th class="text-center" width="5%">No.</th>
               <th class="text-center" width="20%">Material Code</th>
               <th>วัสดุ</th>
               <th>WH</th>
               <th>คงเหลือ</th>
               <th width="5%">จัดการ</th>
             </tr>
           </thead>
           <tbody>
               <?php   $n =1;?>
               <?php 
                   $session_data = $this->session->userdata('sessed_in');
          $compcode = $session_data['compcode'];
            $this->db->select('store.store_matname,
store.store_matcode,
store.store_project,
store.store_costcode,
store.store_costname,
store.store_id,
store.store_type,
Sum(store.store_qty) AS store_qty,
store.store_unit,
store.store_recqty,
store.store_total,
store.unitprice,
store.discountprice,
store.totalprice,
store.wh,
ic_proj_warehouse.whname,
store.compcode');
            $this->db->from('store');
            $this->db->join('ic_proj_warehouse','ic_proj_warehouse.whcode = store.wh','left outer');
            $this->db->where('store_project',$projid);
            $this->db->where('store_qty !=',"0");
            $this->db->where('store.compcode',$compcode);
            $this->db->group_by("store.store_matcode");
            $query = $this->db->get();
            $mat = $query->result();
               foreach ($mat as $key => $valj){?>
             <tr>
              <td class="text-center"><?php echo $n;?></td>
              <td class="text-center"><?php echo $valj->store_matcode; ?></td>
               <td><?php echo $valj->store_matname; ?></td>
               <td><?php echo $valj->whname; ?></td>
               <td><?php echo $valj->store_total; ?></td>
                 <td><button class="eopenmat btn btn-xs btn-block btn-info" data-dismiss="modal" data-totprice="<?php echo $valj->totalprice; ?>" data-unitprice="<?php echo $valj->unitprice; ?>" data-costcode="<?php echo $valj->store_costcode; ?>" data-costname="<?php echo $valj->store_costname; ?>" data-unit="<?php echo $valj->store_unit; ?>" data-qty="<?php echo $valj->store_total; ?>" data-matcode="<?php echo $valj->store_matcode; ?>" data-matname="<?php echo $valj->store_matname; ?>" data-whname="<?php echo $valj->whname; ?>" data-whcode="<?php echo $valj->wh; ?>">เลือก</button></td>
             </tr>
             <script>
             $(".eopenmat").click(function(){
               $("#newmatname").val($(this).data('matname'));
               $("#newmatcode").val($(this).data('matcode'));
               $("#costname").val($(this).data('costname'));
               $("#codecostcode").val($(this).data('costcode'));
               $("#storetotol").val($(this).data('qty'));
               $("#textstore").text($(this).data('qty'));
               $('#unit').val($(this).data('unit'));
               $("#unitprice").val($(this).data('unitprice'));
               $("#totprice").val($(this).data('totprice'));
               $("#whname").val($(this).data('whname'));
               $("#whcode").val($(this).data('whcode'));
               
              $(this).closest('tr').remove();
               $("#openstore").modal('hide');

               
             });
             </script>
                 <?php $n++; } ?>
           </tbody>
         </table>
  </div>
        </div>

  </div>
</div> <!--end modal -->

<!-- <script src="http://demo.mekabase.com/dist/js/jquery-1.11.1.min.js"></script>
<script src="http://demo.mekabase.com/dist/js//jquery.dataTables.min.js"></script>
  <link  href="http://demo.mekabase.com/dist/css/jquery.dataTables.css" rel="stylesheet"/> -->
<script>
// $(".openun").click(function(){
//   var procode = $("#putprojectid").val();
//   $('#loadmodal').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
//   $("#loadmodal").load('<?php echo base_url(); ?>index.php/inventory/load_modal_mat_store/'+procode);
//     // $('#datasource').DataTable();
// });
// 
$("#gll").hide();
$("#bookingg").hide();

$("#employee").click(function(){
  $('#modal_member').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_member").load('<?php echo base_url(); ?>index.php/share/member');
});
$(".openemp").click(function(){
  $('#modal_member').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_member").load('<?php echo base_url(); ?>index.php/share/loadcontractor/'+$("#putprojectid").val());
});
$("#contractor").click(function(){
  $('#modal_cons').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");  
  $("#modal_cons").load('<?php echo base_url(); ?>index.php/share/loadaddcontractor/'+$("#putprojectid").val());
});
$(".openproj").click(function(){
  $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
});
$(".opendepart").click(function(){
  $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
});
$("#addtorow").click(function(event) {
  var matname = $("#newmatname").val();
  var matcode = $("#newmatcode").val();

  if(matname=="" || matcode==""){
    swal({
      title: "กรุณากรอกข้อมูลให้ครบถ้วนก่อนทำการ Insert!!.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
  }else{
    addrow();
  }

$("#newmatname").val('');
$('#newmatcode').val('');
$('#storetotol').val('');
$('#textstore').text('0');
$('#qty').val('');
$("#remarkitem").val('');

$("#accode").val('');
$("#acname").val('');
});

function addrow()
{
  $('td[class="text-center"]').closest('tr').remove();
  var row = ($('#body tr').length-0)+1;
  var qty = $('#qty').val();
  var storetotol = $('#storetotol').val();
  var matname = $("#newmatname").val();
  var matcode = $("#newmatcode").val();
  var unit = $("#unit").val();
  var remark = $("#remarkitem").val();
  var costcode = $("#codecostcode").val();
  var costname = $("#costname").val();
  var unitprice = $("#unitprice").val();
  var totprice = $("#totprice").val();
  var whcode = $("#whcode").val();
  var whname = $("#whname").val();
  var areaname = $("#areaname").val();
  var accode = $("#accode").val();
  var acname = $("#acname").val();
  var statusass = $("#statusass").val();
  var tr = '<tr id="'+row+'">'+
             '<td>'+row+'</td>'+
             '<td>'+matcode+'<input type="hidden" name="matcodei[]" value="'+matcode+'" /></td>'+
             '<td>'+matname+'<input type="hidden" name="matnamei[]" value="'+matname+'" /></td>'+
             '<td>'+whname+'<input type="hidden" name="whnamei[]" value="'+whname+'" /><input type="hidden" name="whcodei[]" value="'+whcode+'"/></td>'+
             '<td>'+storetotol+'<input type="hidden" name="storetotoli[]" id="storetotoli" value="'+storetotol+'" class="form-control input-sm" /></td>'+
             '<td><input type="text" name="qtyi[]" id="qtyi" value="'+qty+'" class="form-control input-sm" /></td>'+
             '<td>'+unit+'<input type="hidden" name="uniti[]" value="'+unit+'" /></td>'+

                 // '<li><a href="#" data-popup="tooltip" data-toggle="modal" data-target="#edit_modal'+row+'" title="" data-original-title="Edit"><i class="icon-pencil7"></i></a></li>'+
                // '<li><a id="delete" class="noty-runner" data-popup="tooltip" title="" data-original-title="Remove" data-layout="bottomRight" data-type="confirm"><i class="icon-trash"></i></a></li>'+

              '<input type="hidden" name="costcodei[]" value="'+costcode+'" />'+
              '<input type="hidden" name="costnamei[]" value="'+costname+'" />'+
              '<input type="hidden" name="remarki[]" value="'+remark+'" />'+
              '<input type="hidden" name="unitpricei[]" value="'+unitprice+'" />'+
              '<input type="hidden" name="totpricei[]" value="'+totprice+'" />'+
              '<input type="hidden" name="accode[]" value="'+accode+'" />'+
              '<input type="hidden" name="acname[]" value="'+acname+'" />'+
              '<input type="hidden" name="statusass[]" value="'+statusass+'" />'+
          '</tr>';
    $('#body').append(tr);
     var modal = '<div id="edit_modal'+row+'" class="modal fade">'+
          '<div class="modal-dialog modal-lg">'+
            '<div class="modal-content ">'+
              '<div class="modal-header bg-info">'+
                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                '<h5 class="modal-title">เพิ่มรายการ'+row+''+matname+'</h5>'+
              '</div>'+

              '<div class="modal-body">'+
                      '<div class="row">'+
                        '<div class="col-xs-6">'+
                        '<label for="">เลือกวัสดุ</label>'+
                          '<div class="input-group">'+
                            '<input type="text" id="newmatname'+row+'" disabled="true" placeholder="เลือกวัสดุ" class="form-control input-sm" value="'+matname+'">'+
                            '<input type="hidden" id="newmatcode'+row+'"  placeholder="เลือกรายการซื้อ" class="form-control input-sm" value="'+matcode+'">'+
                              '<span class="input-group-btn" >'+
                                '<button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#opnewmat"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-xs-6">'+
                          '<label for="">รายการต้นทุน</label>'+
                            '<div class="input-group">'+
                              '<input type="text" id="costname'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+costname+'">'+
                              '<input type="hidden" id="codecostcode'+row+'" readonly="true" placeholder="เลือกรายการต้นทุน" class="form-control input-sm" value="'+costcode+'">'+
                                '<span class="input-group-btn" >'+
                                  '<button class="btn btn-info btn-sm" id="selectcostcode" data-toggle="modal" data-target="#costcode"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
                                '</span>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        '<div class="row">'+
                          '<div class="col-xs-6">'+
                            '<div class="form-group">'+
                                      '<label for="qty">ปริมาณ</label>'+
                                      '<input type="text" id="qtyf'+row+'" placeholder="กรอกปริมาณ" class="form-control"  value="'+qty+'">'+
                            '</div>'+
                          '</div>'+
                          '<div class="col-xs-6">'+
                              '<div class="input-group">'+
                                '<label for="unit">หน่วย</label>'+
                                '<input type="text" id="unit'+row+'" readonly="true" placeholder="กรอกหน่วย" class="form-control input-sm" value="'+unit+'">'+
                              '<span class="input-group-btn" >'+
                                '<button class="openun btn btn-info btn-sm" data-toggle="modal" data-target="#openunit" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>'+
                              '</span>'+
                            '</div>'+
                          '</div>'+
                      '</div>'+
                      '<div class="row">'+
                       '<div class="col-xs-12">'+
                            '<div class="form-group">'+
                               '<label for="endtproject">หมายเหตุ</label>'+

                                   '<textarea rows="4" cols="50" type="text" id="remarkitem'+row+'" class="form-control" >'+remark+'</textarea>'+

                          '</div>'+
                            '</div>'+
                       '</div>'+
              '</div>'+

              '<div class="modal-footer">'+
                '<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>'+
                '<button type="button" id="edittorow'+row+'" data-dismiss="modal" class="btn btn-info">Edit Row</button>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>';
$('#editrow').append(modal);

  $('#qtyi').blur(function(){
    var qtyi = $("#qtyi").val();
    var storetotoli = $("#storetotoli").val();
    if (parseFloat(storetotoli) < parseFloat(qtyi)) {
      swal({
      title: "รายการเบิกมากกว่าใน Store.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });
      $("#qtyi").val('0');
      $("#qtyi").select();
    }
  });


}

</script>


<script>
$(document).on('click', 'a#delete', function () { // <-- changes


    // Initialize

        var self = $(this);
        noty({
            width: 200,
            text: "Do you want to Delete?",
            type: self.data('type'),
            dismissQueue: true,
            timeout: 1000,
            layout: self.data('layout'),
            buttons: (self.data('type') != 'confirm') ? false : [
                {
                    addClass: 'btn btn-primary btn-xs',
                    text: 'Ok',
                    onClick: function ($noty) { //this = button element, $noty = $noty element
                        $noty.close();
                        self.closest('tr').remove();
                        noty({
                            force: true,
                            text: 'Deleteted',
                            type: 'success',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });

                    }
                },
                {
                    addClass: 'btn btn-danger btn-xs',
                    text: 'Cancel',
                    onClick: function ($noty) {
                        $noty.close();
                        noty({
                            force: true,
                            text: 'You clicked "Cancel" button',
                            type: 'error',
                            layout: self.data('layout'),
                            timeout: 1000,
                        });
                    }
                }
            ]
        });

        return false;


  });
</script>
<script>
  $('#qty').blur(function(){
    var qty = $("#qty").val();
    var storetotol = $("#storetotol").val();
    if (parseFloat(storetotol) < parseFloat(qty)) {
    swal({
      title: "รายการเบิกมากกว่าใน Store.",
      text: "",
      confirmButtonColor: "#EA1923",
      type: "error"
  });

      $("#qty").val('0');
      $("#qty").select();
    }
  });
  $("#qty").keyup(function(){
      var qty = $("#qty").val();
      var uni = $("#unitprice").val();
      $("#totprice").val(qty*uni);
  });

    $('#imp').attr('class', 'active');
   $('#issue').attr('class', 'active');
   $('#imp_sub7').attr('style', 'background-color:#dedbd8');
</script>

