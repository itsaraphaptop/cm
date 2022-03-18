<form action="<?php echo base_url(); ?>ap_active/new_apo" method="post">
<fieldset>
  <div class="panel panel-default border-grey">
								<div class="panel-heading">
									<h6 class="panel-title"> บันทึกตั้งเจ้าหนี้อื่นๆ (APO)</h6>
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
                        <h4 class="modal-title" id="myModalLabel">เลือกรายการ</h4>
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
                    <legend class="text-semibold"><i class="icon-reading position-left"></i> บันทึกตั้งเจ้าหนี้อื่นๆ</legend>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">จ่ายให้กับ</label>
                      <input type="text" class="form-control" readonly="true" id="payto" placeholder="จ่ายให้กับ" name="payto">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">ประเภทผู้ขาย</label>
                      <select class="form-control" id="apotype" name="apotype">
                        <option value="1">Employee</option>
                        <option value="2">External</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="">เลขที่ใบสำคัญจ่าย (Petty Cash)</label>
                      <input type="text" class="form-control" readonly="true" name="apono" id="apono" placeholder="เลขที่ใบตั้งหนี้">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">โครงการ</label>
                      <input type="text" class="form-control" readonly="true" id="apoprojectname" placeholder="โครงการ" name="apoprojectname">
                      <input type="hidden" class="form-control" readonly="true" id="apoprojectid" name="aposprojectid">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">ระบบ</label>
                      <select class="form-control" name="aposystem" id="aposystem">
                        <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                        <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                        <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                        <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                        <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
                      </select>
                    </div>
                    <div class="col-md-3">
                    <label for="">วันที่ตั้งหนี้</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" class="form-control daterange-single"  id="apodate" name="apodate">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">แผนก</label>
                      <input type="text" class="form-control" readonly="true" id="apodepartmenttname" placeholder="แผนก" name="apodepartmenttname">
                      <input type="hidden" class="form-control" readonly="true" id="apodepartmenttid" name="apodepartmenttid">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for=""> หมายเหตุ</label>
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
                  <div class="form-group">
                    <a class="openpetty btn btn-warning btn-xs"><i class="icon-file-plus"></i> เลือกรายการเบิก</a>
                  </div>
                </div>
                <div id="table">
                <table class="table table-bordered table-striped table-hover table-xxs">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center">No.</th>
                      <th width="5%" class="text-center">Action</th>
                      <th width="15%" class="text-center">Pettycash No.</th>
                      <th class="text-center">Name</th>
                      <th width="15%" class="text-center">Amount</th>
                      <th width="10%" class="text-center">Open</th>
                    </tr>
                  </thead>
                    <tbody id="tbody">
                    <tr>
                      <td colspan="6" class="text-center">No Data</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                <!-- <div id="table">
                  <table class="table table-bordered table-striped table-hover table-xxs">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>รหัสค่าใช้จ่าย</th>
                        <th>ค่าใช้จ่าย</th>
                        <th>ร้านค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>หน่วย</th>
                        <th>จำนวนสุทธิ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="8" class="text-center">ไม่มีข้อมูล</td>
                      </tr>
                    </tbody>
                  </table>
                </div> -->
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
<script>

$(".openpetty").click(function(){
  $('#tbody').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
  $('#tbody').load('<?php echo base_url(); ?>ap/load_table_pettycash');

});
$('.daterange-single').daterangepicker({
       singleDatePicker: true,
        locale: {
           format: 'YYYY-MM-DD'
       }
   });
</script>
