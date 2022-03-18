<div id="newpr" class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> บันทึรับสินค้าเข้าคลังสินค้า</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-3">
					<div class="form-group">
					<label for=""></label>
						<button data-toggle="modal" data-target="#myModal" class="omodal btn btn-primary"  style="margin-top:20px;">รับสินค้าจากใบสั่งซื้อ</button>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">วันที่รับของ</label>
						<input type="text" class="form-control" readonly="true" id="porecdate">
					</div>
				</div>
				<div class="col-md-6" >
	            <div class="input-group">
	             <label for="project1">โครงการ</label>
	                <input type="text" readonly="true"  class="form-control input-sm input-sm input-sm" id="projectnam">
	                <input type="hidden" readonly="true"  class="form-control input-sm input-sm input-sm" name="project" id="putproject">
	                <span class="input-group-btn">
	                  <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
	                </span>
            </div>
          </div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">เลขที่รับเข้าคลัง</label>
						<input type="text" class="form-control input-sm" id="icno" readonly="true">
					</div>
				</div>
				<div class="col-md-3">
				<label for="">วันที่รับเข้าคลัง</label>
					<div class="form-group">
						<input type="text" class="form-control" id="docdate">
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group input-group-sm">
						<label for="vend">ร้านค้า</label>
		                <input type="text" readonly="true"  class="form-control" id="vendername">
		                <span class="input-group-btn">
		                  <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openvender" type="button" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
		                </span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">เลขที่ใบสั่งซื้อ</label>
						<input type="text" readonly="true" class="form-control input-sm" id="pono">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">ระบบ</label>
						<select class="form-control input-sm" name="system" id="systeml">
						<?php foreach ($res as $value) {
							$system = $value->system;
						} ?>
									   <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>         
                                       <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                                       <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                                       <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                                       <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>     
                        </select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">ประเภท</label>
						<select name="type" id="ictype" class="form-control input-sm">
							<option value="1">P/O Receive</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-xs-6">
				<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">เลขที่ใบส่งของ</label>
						<input type="text" readonly="true" class="form-control input-sm" placeholder="กรอกเลขที่ Invioce" id="invno">
					</div>
				</div>
				<div class="col-xs-6">
				<label for="">วันที่ใบส่งของ</label>
					<div class="form-group">
						<input type="text" readonly="true" id="invdate">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="">D/O No.</label>
						<input type="text" readonly="true" class="form-control input-sm" id="dono">
					</div>
				</div>
				<div class="col-xs-6">
					<label for="">D/O Date</label>
					<div class="form-group">
						<input type="text" readonly="true" id="dodate">
					</div>
				</div>
			</div>
			</div>
			<div class="col-xs-6">
					<label for="">หมายเหตุ</label>
					<textarea cols="50" rows="5" class="form-control input-sm" placeholder="กรอกรายละเอียด" id="remark"></textarea>
			</div>
			</div>
			<div class="modal-footer">
				<button id="btnsave" class="btn btn-primary"> บันทึก</button>
			</div>
		</div>
	</div>
<div id="detail">
	<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการรับสินค้าเข้าคลังสินค้า</div>
		<div class="panel-body">
		<img src="<?php echo base_url(); ?>dist/img/loading.gif" alt="load">
		Loadding...
		</div>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกรายการรับของจากใบสั่งซื้อ</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>เลขที่ใบรับของ</th>
          <th>ชื่อร้านค้า</th>
          <th>โครงการ</th>
          <th width="5%">เลือก</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php $n=1; foreach ($res as $val) {?>
          <th scope="row"><?php echo $n; ?></th>
          <td><?php echo $val->po_reccode; ?></td>
          <td><?php echo $val->venderid; ?></td>
          <td><?php echo $val->project_name; ?></td>
          <td><button class="btnre btn btn-info btn-xs btn-block" data-toggle="modal" data-mprojid="<?php echo $val->project; ?>" data-minvno="<?php echo $val->taxno; ?>" data-minvdate="<?php echo $val->taxdate; ?>" data-mdono="<?php echo $val->docode; ?>" data-mdodate="<?php echo $val->dodate; ?>" data-mporecdate="<?php echo $val->po_recdate; ?>" data-msystem="<?php echo $val->system; ?>" data-mpono="<?php echo $val->podate; ?>" data-mvender="<?php echo $val->venderid; ?>" data-mproject="<?php echo $val->project_name; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
        <?php $n++; } ?>
      </tbody>
    </table>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
<link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<script>
	//  $(document).ready(function(){
	 	$("#btnsave").hide();
    $("#docdate").kendoDatePicker({
        format : "yyyy-MM-dd"
    });
    $("#invdate").kendoDatePicker({
        format : "yyyy-MM-dd"
    });
    $("#dodate").kendoDatePicker({
        format : "yyyy-MM-dd"
    });
     $("#icdate").kendoDatePicker({
       	format : "yyyy-MM-dd"

    });
//   });
</script>
<script>
$(".btnre").click(function() {
	$("#icrecdate").val($(this).val('mrecdate'));
	$("#projectnam").val($(this).data('mproject'));
	$("#putproject").val($(this).data('mprojid'));
	$("#vendername").val($(this).data('mvender'));
	$("#pono").val($(this).data('mpono'));
	$("#systeml").val($(this).data('msystem'));
	$("#porecdate").val($(this).data('mporecdate'));
	$("#invno").val($(this).data('minvno'));
	$("#invdate").val($(this).data('minvdate'));
	$("#dono").val($(this).data('mdono'));
	$("#dodate").val($(this).data('mdodate'));
	var id = $(this).data('mpono');
	$("#detail").load('<?php echo base_url(); ?>index.php/stock/loadporec_d/'+ id);
	$("#btnsave").show();
	 $('#btnsave').prop('disabled', false);
});

$("#btnsave").click(function() {
	var url="<?php echo base_url(); ?>index.php/stock/add_ic_receive_h";
		        var dataSet={
		            icdate:  $('#icrecdate').val(),
		            project:  $("#putproject").val(),
		            systeml: $("#systeml").val(),
		            vender: $("#vendername").val(),
		            pono: $("#pono").val(),
		            ictype: $("#ictype").val(),
		            invno: $("#invno").val(),
		            invdate: $("#invdate").val(),
		            podate: $("#porecdate").val(),
		            remark: $("#remark").val()
		            };
		        $.post(url,dataSet,function(data){
		                $("#icno").val(data);
		                $('#btnsave').prop('disabled', true);
		                $(".omodal").prop('disabled', true);
		                $('.bnt').prop('disabled', false);
			        });
});
	
</script>
