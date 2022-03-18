<div class="row" style="margin-top:10px;">
	<div class="col-xs-12" >
	<button class="btn btn-warning" data-toggle="modal" data-target="#openporec"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบรับของ</button>
</div>
</div>

<div class="modal fade" id="openporec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกรายการรับของ</h4>
      </div>
      <div class="modal-body">
       <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>เลขที่ใบรับของ</th>
          <th>ชื่อร้านค้า</th>
          <th>โครงการ/แผนก</th>
          <th width="5%">เลือก</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php $n=1; foreach ($porex as $val) {?>
          <th scope="row"><?php echo $n; ?></th>
          <td><?php echo $val->po_reccode; ?></td>
          <td><?php echo $val->venderid; ?></td>
          <td><?php echo $val->project_name; ?><?php echo $val->department_title; ?></td>     
         
          <td><button class="btnre btn btn-info btn-xs btn-block" data-toggle="modal" data-poreccode="<?php echo $val->po_reccode; ?>"  data-totamt="<?php echo $val->po_recamttot; ?>" data-depname="<?php echo $val->department_title; ?>" data-dep="<?php echo $val->department; ?>" data-duedate="<?php echo $val->duedate; ?>" data-cterm="<?php echo $val->term; ?>" data-mprojid="<?php echo $val->project; ?>" data-minvno="<?php echo $val->taxno; ?>" data-minvdate="<?php echo $val->taxdate; ?>" data-mdono="<?php echo $val->docode; ?>" data-mdodate="<?php echo $val->dodate; ?>" data-mporecdate="<?php echo $val->po_recdate; ?>" data-msystem="<?php echo $val->system; ?>" data-mpono="<?php echo $val->podate; ?>" data-mvender="<?php echo $val->venderid; ?>" data-mproject="<?php echo $val->project_name; ?>" data-dismiss="modal">เลือก</button></td>
        </tr>
        <?php $n++; } ?>
      </tbody>
    </table>
      </div>
    </div>
  </div>
</div>

<script>
$(".btnre").click(function(event) {
  $("#porecx").val($(this).data('poreccode'));
	$("#projectid").val($(this).data('mprojid'));
	$("#projectname").val($(this).data('mproject'));
	$("#vender").val($(this).data('mvender'));
	$("#pono").val($(this).data('mpono'));
	$("#invno").val($(this).data('minvno'));
	$("#cterm").val($(this).data('cterm'));
	$("#duedate").val($(this).data('duedate'));
	$("#system").val($(this).data('msystem'));
	$("#departid").val($(this).data('dep'));
	$("#departname").val($(this).data('depname'));
	$("#amount").val($(this).data('totamt'));
  $("#tax").val($(this).data('totamt')*7/100);
  $("#totamount").val((parseFloat($(this).data('totamt'))+($(this).data('totamt'))*7/100));
	$('#apvd').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
  $("#apvd").load('<?php echo base_url(); ?>index.php/acc/apv_d');
});
</script>


<div class="panel panel-primary" style="margin-top:10px;" ng-app="app">
  <div class="panel-heading">บันทึกตั้งเจ้าหนี้การค้า</div>
  <div class="panel-body">
    <div class="row">
    	<div class="col-xs-4">
    	<label for="">ร้านค้า</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="ร้านค้า" id="vender">
    			<!--<span class="input-group-btn">
	                 <button class="openvender btn btn-primary btn-sm" data-toggle="modal" data-target="#openvender" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
	            </span>-->
    		</div>
    	</div>
    	<div class="col-xs-4">
    		<div class="form-group">
    			<label for="">เลขที่ใบสั่งซื้อ</label>
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="เลขที่ใบสั่งซื้อ" id="pono">
          <input type="hidden" id="user" value="<?php echo $name; ?>">
    		</div>
    	</div>
    	<div class="col-xs-4">
    		<div class="form-group">
    			<label for="">เลขที่ใบตั้งเจ้าหนี้</label>
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="เลขที่ใบตั้งเจ้าหนี้" id="apvno">
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-xs-4">
    		<div class="form-group">
    			<label for="">เลขทีใบส่งของ</label>
				<input type="text" class="form-control input-sm" readonly="true" id="invno" placeholder="เลขทีใบส่งของ">
    		</div>
    	</div>
    	<div class="col-xs-3">
    	<label for="">วันที่ส่งมอบ</label>
    		<div class="form-group">
    			<input type="text" class="form-control"  placeholder="วันที่ส่งมอบ" id="duedate">
    		</div>
    	</div>
      <div class="col-xs-2">
      <label for="">เงื่อนไขชำระ</label>
        <div class="input-group">
          <input type="text" class="form-control input-sm" readonly="true" id="cterm" placeholder="เงื่อนไขชำระ">
          <span class="input-group-addon">วัน</span>
        </div>
      </div>
      <div class="col-xs-2">
        <div class="form-group">
        <label for="">วันที่ใบสำคัญจ่าย</label>
          <input type="text" class="form-control" id="apvdate" placeholder="วันที่ใบสำคัญจ่าย">         
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-xs-4">
    	<label for="">โครงการ</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="โครงการ" id="projectname">
    			<input type="hidden" class="form-control input-sm" readonly="true" id="projectid">
    			<!--<span class="input-group-btn">
	                 <button class="openproj btn btn-primary btn-sm" data-toggle="modal" data-target="#openproject" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
	            </span>-->
    		</div>
    	</div>
    	<div class="col-xs-4">
    		<div class="form-group">
						<label for="">ระบบ</label>
						<select class="form-control input-sm" name="system" id="system">
									   <?php if($system == 'OVERHEAD'){ ?><option value="OVERHEAD" selected>OVERHEAD</option><?php } else { ?><option value="OVERHEAD">OVERHEAD</option><?php }?>         
                                       <?php if($system == 'AC'){ ?><option value="AC" selected>AC</option><?php } else { ?><option value="AC">AC</option><?php }?>
                                       <?php if($system == 'EE'){ ?><option value="EE" selected>EE</option><?php } else { ?><option value="EE">EE</option><?php }?>
                                       <?php if($system == 'SN'){ ?><option value="SN" selected>SN</option><?php } else { ?><option value="SN">SN</option><?php }?>
                                       <?php if($system == 'CIVIL'){ ?><option value="CIVIL" selected>CIVIL</option><?php } else { ?><option value="CIVIL">CIVIL</option><?php }?>     
                        </select>
					</div>
    	</div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="">เลขี่ใบรับของ</label>
          <input type="text" class="form-control input-sm" readonly="true" placeholder="เลขี่ใบรับของ" id="porecx">
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
    	<div class="col-xs-4">
    	<label for="">แผนก</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="แผนก" id="departname">
    			<input type="hidden" class="form-control input-sm" readonly="true" id="departid">
    			<!--<span class="input-group-btn">
	                 <button class="opendep btn btn-primary btn-sm" data-toggle="modal" data-target="#opendep" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
	            </span>-->
    		</div>
    	</div>
    </div>
    <div class="row" style="margin-top:10px;">
    	<div class="col-xs-4">
    	<label for="">จำนวนวเงิน</label>
    		<div class="input-group">
    			<input type="text" class="form-control input-sm" ng-model="netamt" id="amount" placeholder="จำนวนวเงิน">
          <input type="hidden" class="form-control input-sm" ng-model="tax" readonly="true" id="tax" value="7" placeholder="ภาษี(%)">
    			<span class="input-group-addon">บาท</span>
    		</div>
    	</div>
      
    <!-- 	<div class="col-xs-2">
    	<label for="">ภาษี</label>
    		<div class="input-group"> -->
    			
    		<!-- 	<span class="input-group-addon">%</span>
    		</div>
    	</div> -->
    	<div class="col-xs-3">
    	<label for="">จำนวนรวมภาษี</label>
    		<div class="input-group">
    			<input type="text" class="form-control input-sm"  id="totamount" placeholder="จำนวนวเงิน">
    			<span class="input-group-addon">บาท</span>
    		</div>
    	</div>
    	<!--<div class="col-xs-2">
    	<label for="">วันที่จ่าย</label>
    		<div class="form-group">
    			<input type="text" class="form-control"  placeholder="วันที่ส่งมอบ" id="apdate">
    		</div>
    	</div>-->
    </div>
  </div>
  <div class="panel-footer">
   <!--  <button class="saveh btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> บันทึก</button>
    <button class="edith btn btn-info"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button>
    <button class="print btn btn-warning"><span class="glyphicon glyphicon-print"></span> พิมพ์</button> -->
  </div>
</div>

    

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready( function () {
    // $('table.table').DataTable();
} );
</script>
<link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />


    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
     <link href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" />
<script>
                $('#duedate').kendoDatePicker({
                	 format : "yyyy-MM-dd"
                });
                 $('#apdate').kendoDatePicker({
                	 format : "yyyy-MM-dd"
                });  
                $('#apvdate').kendoDatePicker({
                   format : "yyyy-MM-dd"
                }); 

</script>

