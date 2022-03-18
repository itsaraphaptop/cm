<?php foreach ($res as $val) {
	$pono = $val->po_pono;
	$vender = $val->po_vender;
	$porijectid = $val->project_id;
	$project_name = $val->project_name;
	$depid = $val->po_department;
	$depname = $val->department_title;
	$systemcode = $val->systemcode;
	$systemname = $val->systemname;
	$crterm = $val->po_trem;
	$deli = $val->po_deliverydate;
} ?>

<div id="newpr" class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> บันทึรับสินค้าจากใบสั่งซื้อ</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่รับสินค้า</label>
						<input type="text" class="form-control input-sm" id="poreccode" placeholder="เลขที่รับสินค้า" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
						<label for="">วันที่รับของ</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm" id="porecdate" placeholder="กรอกวันที่รับของ">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบสั่งซื้อ</label>
						<input type="text" class="form-control input-sm" id="podate" value="<?php echo $pono; ?>" readonly="true">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">ร้านค้า</label>
						<input type="text" class="form-control input-sm" id="vendername" value="<?php echo $vender; ?>" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">โครงการ</label>
						<input type="text" class="form-control input-sm" id="project" value="<?php echo $project_name; ?>" readonly="true">
						<input type="hidden" id="projectid" value="<?php echo $porijectid; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">แผนก</label>
						<input type="text" class="form-control input-sm" id="departnam" value="<?php echo $depname; ?>" readonly="true">
						<input type="hidden" id="departid" value="<?php echo $depid; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">ระบบ</label>
						<input type="text" class="form-control input-sm" id="system" value="<?php echo $systemname; ?>" readonly="true">
						<input type="hidden" class="form-control input-sm" id="systemcode" value="<?php echo $systemcode; ?>" readonly="true">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบกำกับ</label>
						<input type="text" class="form-control input-sm" id="taxno" placeholder="Please Input Tax Invoice Number">
					</div>
				</div>
				<div class="col-md-4">
						<label for="">วันที่ใบกำกับ</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm"  placeholder="กรอก Tax Invoice Date" id="taxdate">
					</div>
				</div>
				<div class="col-md-4">
						<label for="">วันที่ส่งของ</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm" value="<?php echo $deli; ?>" readonly="true" placeholder="Please Input DueDate" id="duedate">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="">เลขที่ใบส่งของ</label>
						<input type="text" class="form-control input-sm" id="docode" placeholder="Please Input D/O">
					</div>
				</div>
				<div class="col-md-2">
				<label for="">เงื่อนไขชำระ</label>
					<div class="input-group">
						<input type="text" class="form-control input-sm" id="term" readonly="true" value="<?php echo $crterm; ?>" placeholder="Please Input Term">
						<span class="input-group-addon">วัน</span>
					</div>
				</div>
				<!--<div class="col-md-4">
						<label for="">D/O Date</label>
					<div class="form-group">
						<input type="text" class="form-control input-sm"  placeholder="กรอก D/O Invoice Date" id="dodate">
					</div>
				</div>-->
				
			</div>
			<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							 <button id="saveh" class="btn btn-primary" name="button">บันทึก</button>
          					<!-- <button type="button" class="print btn btn-success" name="button">พิมพ์</button> -->
						</div>
					</div>
				</div>
		</div>
</div>
<div id="loadbox">
	
</div>

 <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
     <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />


<script>
            // $(document).ready(function() {
            var pono = $('#podate').val();
            	$('#loadbox').load('<?php echo base_url();?>index.php/office/service_po_receive_d'+'/'+pono);
            	//
           // 	
                // create DatePicker from input HTML element
                $('#porecdate').kendoDatePicker({
                	 format : "yyyy-MM-dd"
                });
                $("#rcdate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#taxdate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                $("#dodate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
                 $("#duedate").kendoDatePicker({
                    format : "yyyy-MM-dd"
                });
            // });

            $('#saveh').click(function(){
            	var url="<?php echo base_url(); ?>index.php/office/add_po_receive_h";
		        var dataSet={
		            poreccode:  $('#poreccode').val(),
					porecdate:  $('#porecdate').val(),
					podate:     $('#podate').val(),
					projectid:  $('#projectid').val(),
					depar:      $('#departnam').val(),
					deparid:    $('#departid').val(),
					vendername: $('#vendername').val(),
					project:    $('#project').val(),
					system:     $('#system').val(),
					taxno:      $('#taxno').val(),
					taxdate:    $('#taxdate').val(),
					duedate:    $('#duedate').val(),
					docode:     $('#docode').val(),
					term:       $('#term').val(),
					dodate:     $('#dodate').val()
		            };
		        $.post(url,dataSet,function(data){
		                alert(data);
		                $('#poreccode').val(data);
		               	var pono = $('#podate').val();
		                $('#loadbox').load('<?php echo base_url();?>index.php/office/service_po_receive_d'+'/'+pono);
			        });
			     });
</script>

<script>
	$('#saveh').click(function(){
		
	});
</script>