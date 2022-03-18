
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> บันทึกใบเบิกสินค้า</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
				<label>โครงการ</label>
					<div class="input-group">
						 <input type="text" readonly="true"  class="form-control input-sm input-sm" id="projectnam" placeholder="เลือกโครงการ">
                			<input type="hidden" readonly="true"  class="form-control input-sm input-sm" name="project" id="putproject">
						<span class="input-group-btn">
					        <button class="btproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
					    </span>
					</div>
				</div>
				<div class="col-xs-3">
					<label for="">ระบบ</label>
						<select class="form-control input-sm" name="system" id="system">
			                <?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
			                <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
			                <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
			                <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
			                <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>
		              	</select>
				</div>
				<div class="col-xs-3">
					<label for="">วันที่เบิก</label>
					<div class="form-group">
						<input type="text" name="podate" required="" placeholder="วันที่เเบิก" class="form-control" id="outdate">
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบเบิก</label>
						<input type="text" readonly="true" class="form-control input-sm" placeholder="เลขที่ใบเบิก" id="outno" style="color:#009933;">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="">ประเภท</label>
						<select name="type" id="type" class="form-control input-sm">
							<option value="1">รับของ</option>
							<option value="2">โอนย้าย</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<label for="">ผู้ขอเบิก</label>
					<div class="input-group">
						<input type="text" name="memname" id="memname" readonly="true" placeholder="ผู้ขอเบิก" class="form-control input-sm">
			            <input type="hidden" name="memid" id="memid">
			            <span class="input-group-btn" >
			              <button class="openmem btn btn-primary btn-sm" data-toggle="modal" data-target="#openme" type="button" ><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
			            </span>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="">หมายเหตุ</label>
						<textarea name="remark" id="remark" cols="30" rows="5" class="form-control" placeholder="กรอกหมายเหตุ"></textarea>
						<input type="hidden" value="<?php echo $uname; ?>" id="user">
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
		<div class="row">
		  <div class="col-xs-2">
				<button type="submit" id="oadddetail" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มรายการ</button>
          </div>
          <div class="col-xs-2">
				<button id="printdoc" class="btn btn-warning" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> พิมพ์</button>
		  </div>
		</div>
		</div>
</div>

<!-- add detail -->
<div id="adddetail">
		
</div>

<!-- show detail -->
<div id="detail">
	
</div>







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


<!-- modal เเลือกโครงการ -->
 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกโครงการ</h4>
      </div>
        <div class="modal-body">

            <div class="panel-body">
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
			         <td align="middle"><?php echo $n;?></td>
			         <td><?php echo $valj->project_code; ?></td>
			          <td><?php echo $valj->project_name; ?></td>
			          <td><?php echo $valj->project_address; ?></td>
			            <td><button class="openproj btn btn-xs btn-block btn-info" data-toggle="modal"  data-projid="<?php echo $valj->project_id;?>" data-projname="<?php echo $valj->project_name;?>" data-dismiss="modal">เลือก</button></td>
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
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">ผู้ขอเบิก</h4>
       </div>
         <div class="modal-body">
             <div class="row">
                 <table class="table table-striped" >
			       <thead>
			         <tr>
			           <th style="text-align:center">No.</th>
			           <th>ชื่อผู้ขอเบิก</th>
			           <th>แผนก/โครงการ</th>
			           <th width="5%">จัดการ</th>
			         </tr>
			       </thead>
			       <tbody>
			           <?php   $n =1;?>
			           <?php foreach ($resmem as $val){ ?>
			         <tr>
			          <td align="middle"><?php echo $n;?></td>
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



<!-- script -->
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


<script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
 <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />

<script>
        // $(document).ready(function() {
            $("#outdate").kendoDatePicker({
                format : "yyyy-MM-dd"
            });
        // });
</script>
<script>
	// $(document).ready(function() {
		$("#oadddetail").hide();
		$("#printdoc").hide();
		$("#detail").hide();
	// });
	$(".btproj").click(function(event) {
		$("#oadddetail").show();
		$("#printdoc").show();
	});
	$("#oadddetail").click(function() {
		if ($("#outno").val()=="") {
			var url="<?php echo base_url(); ?>index.php/stock/add_docissue_h";
          	var dataSet={
             proj: $("#putproject").val(),
             syst: $("#system").val(),
             docdate: $("#outdate").val(),
             type: $("#type").val(),
             name: $("#memid").val(),
             remark: $("#remark").val(),
             user: $("#user").val()
            };
            $.post(url,dataSet,function(data){
            	$("#outno").val(data);
            });
            $("#adddetail").show();
            $('#adddetail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
			$("#adddetail").load('<?php echo base_url(); ?>index.php/stock/add_docissue');
		}else{
			$("#adddetail").show();
			$('#adddetail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
			$("#adddetail").load('<?php echo base_url(); ?>index.php/stock/add_docissue');
		}
	});
	$("#cinsdt").click(function(event) {
		$("#detail").show();
	});
	 $(".openproj").click(function(){
      $("#putproject").val($(this).data('projid'));
      $('#projectnam').val($(this).data('projname'));
  	});
	$(".openmem").click(function(){
      $("#memname").val($(this).data('mname'));
      $("#memid").val($(this).data('mid'));
    });
</script>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready( function () {
    $('#projpaginate').DataTable();
} );
</script>
<script>
  $('#printdoc').click(function(){
   var pp = $('#outno').val();
     url = "<?php echo base_url(); ?>index.php/report/report_stock"+"/"+pp;
      $(location).attr("href", url);
  });
</script>


<!-- mat code -->
