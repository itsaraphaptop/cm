<div class="row" style="margin-top:10px;">
	<div class="col-xs-12" >
	<button class="btn btn-warning" data-toggle="modal" data-target="#open1"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เลือกใบเบิกเงินสด</button>
</div>
</div>

<div class="modal fade" id="open1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกใบเบิกเงินสด</h4>
      </div>
      <div class="modal-body">
       <table  class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>เลขที่</th>
          <th>ชื่อ</th>
          <th>หมายเหตุ</th>
          <th width="5%">เลือก</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php $n=1; foreach ($pettycash as $val) {?>
          <th scope="row"><?php echo $n; ?></th>
          <td><?php echo $val->docno; ?></td>
          <td><?php echo $val->vender; ?></td>
          <td><?php echo $val->remark; ?></td>     
         
          <td><button class="btnre1 btn btn-info btn-xs btn-block" data-mdoc="<?php echo $val->docno; ?>" data-mdesc="<?php echo $val->remark; ?>" data-msystem="<?php echo $val->system; ?>" data-ventype="<?php echo $val->vender_type; ?>" data-depname="<?php echo $val->department_title; ?>" data-mproject="<?php echo $val->project_name; ?>" data-mvender="<?php echo $val->vender; ?>" data-toggle="modal" data-dismiss="modal">เลือก</button></td>
        </tr>
        <?php $n++; } ?>
      </tbody>
    </table>
      </div>
    </div>
  </div>
</div>

<script>
$(".btnre1").click(function(event) {
  $("#mdoc").val($(this).data('mdoc'));
  $("#desc").val($(this).data('mdesc'));
  $("#ovender_type").val($(this).data('ventype'));
  $("#porecx").val($(this).data('poreccode'));
	$("#projectid").val($(this).data('mprojid'));
	$("#oprojectname").val($(this).data('mproject'));
	$("#ovender").val($(this).data('mvender'));
	$("#pono").val($(this).data('mpono'));
	$("#invno").val($(this).data('minvno'));
	$("#cterm").val($(this).data('cterm'));
	$("#duedate").val($(this).data('duedate'));
	$("#system").val($(this).data('msystem'));
	$("#departid").val($(this).data('dep'));
	$("#odepartname").val($(this).data('depname'));
	$("#amount").val($(this).data('totamt'));
  $("#tax").val($(this).data('totamt')*7/100);
  $("#totamount").val((parseFloat($(this).data('totamt'))+($(this).data('totamt'))*7/100));
	$('#apod').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
  $("#apod").load('<?php echo base_url(); ?>index.php/acc/apo_d');
});
</script>


<div class="panel panel-primary" style="margin-top:10px;" ng-app="app">
  <div class="panel-heading">บันทึกตั้งเจ้าหนี้อื่นๆ</div>
  <div class="panel-body">
    <div class="row">
    	<div class="col-xs-4">
    	<label for="">จ่ายให้กับ</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="ร้านค้า" id="ovender">
    			<!--<span class="input-group-btn">
	                 <button class="openvender btn btn-primary btn-sm" data-toggle="modal" data-target="#openvender" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
	            </span>-->
    		</div>
    	</div>
    	<div class="col-xs-4">
          <div class="form-group">
            <label for="code">ประเภทผู้ขาย</label>
            <select class="form-control input-sm" name="vender_type" id="ovender_type">
               <?php foreach ($pettycash as $v) {
                $typevender = $v->vender_type;
                }?>
             <?php if($typevender == 'Employee'){ ?><option value="Employee" selected>Employee</option><?php } else { ?><option value="Employee">Employee</option><?php }?>
             <?php if($typevender == 'External'){ ?><option value="External" selected>External</option><?php } else { ?><option value="External">External</option><?php }?>
           </select>
          </div>
        </div><!-- end col-md-3 -->
    	<div class="col-xs-4">
      <label for="">เลขที่ใบตั้งเจ้าหนี้</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="เลขที่ใบตั้งเจ้าหนี้" id="apono">
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-xs-4">
    	<label for="">โครงการ</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="โครงการ" id="oprojectname">
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
            <?php  foreach ($pettycash as $va) {
              $system = $va->system;
              }?>
								<?php if($system == '1'){ ?><option value="1" selected>OVERHEAD</option><?php } else { ?><option value="1">OVERHEAD</option><?php }?>
                <?php if($system == '2'){ ?><option value="2" selected>AC</option><?php } else { ?><option value="2">AC</option><?php }?>
                <?php if($system == '3'){ ?><option value="3" selected>EE</option><?php } else { ?><option value="3">EE</option><?php }?>
                <?php if($system == '4'){ ?><option value="4" selected>SN</option><?php } else { ?><option value="4">SN</option><?php }?>
                <?php if($system == '5'){ ?><option value="5" selected>CIVIL</option><?php } else { ?><option value="5">CIVIL</option><?php }?>    
                        </select>
					</div>
    	</div>
      <div class="col-xs-4">
        <label for="">วันที่ตั้งหนี้</label>
        <div class="form-group">
        <input type="text" class="form-control" id="apodate">
          <input type="hidden" id="mdoc">
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
    	<div class="col-xs-4">
    	<label for="">แผนก</label>
    		<div class="form-group">
    			<input type="text" class="form-control input-sm" readonly="true" placeholder="แผนก" id="odepartname">
    			<input type="hidden" class="form-control input-sm" readonly="true" id="departid">
    			<!--<span class="input-group-btn">
	                 <button class="opendep btn btn-primary btn-sm" data-toggle="modal" data-target="#opendep" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
	            </span>-->
    		</div>
    	</div>
    </div>
 <!--    <div class="row" style="margin-top:10px;">
    	<div class="col-xs-4">
    	<label for="">จำนวนวเงิน</label>
    		<div class="input-group">
    			<input type="text" class="form-control input-sm" ng-model="netamt" id="amount" placeholder="จำนวนวเงิน">
          <input type="hidden" class="form-control input-sm" ng-model="tax" readonly="true" id="tax" value="7" placeholder="ภาษี(%)">
    			<span class="input-group-addon">บาท</span>
    		</div>
    	</div> 
    	<div class="col-xs-3">
    	<label for="">จำนวนรวมภาษี</label>
    		<div class="input-group">
    			<input type="text" class="form-control input-sm"  id="totamount" placeholder="จำนวนวเงิน">
    			<span class="input-group-addon">บาท</span>
    		</div>
    	</div> 
    </div>-->
    <div class="row" style="margin-top:10px;">
      <div class="col-xs-12">
      <label for="">หมายเหตุ</label>
        <div class="form-group">
          <textarea id="desc" cols="115" rows="4" class="form-control"  placeholder="กรอกรรายละเอียด"></textarea>
        </div>
      </div>
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
    $('#datatable2').DataTable();
    $("#vender_type").prop('disabled', true);
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
                 $('#apodate').kendoDatePicker({
                   format : "yyyy-MM-dd"
                }); 
                

</script>

