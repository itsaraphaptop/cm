
<div class="row" id="headddd" style="margin-top:-140px;">
	
			<div class="col-xs-12">
				<h1>Account Payable System</h1>
				<h3>ระบบจัดการบัญชีเจ้าหนี้</h3>
				<hr>
			</div>
</div>
<div class="row">
	<div class="col-xs-6">
		<div class="panel panel-info" style="margin-top:11px;" ng-app="app">
			<div class="panel-heading">รายการชำระเจ้าหนี้รออนุมัติ</div>
			<div class="panel-body">
			 <table class="table  table-hover" style="font-size:11px;">
			 	<thead>
			 		<tr>
			 			<th width="5%">เลขที่</th>
			 			<th>เจ้าหนี้</th>
			 			<!-- <th width="3%">สถานะ</th> -->
			 			<th width="3%">เปิด</th>
						<th width="5%">ส่งอนุมัติ</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 	<?php foreach ($res as $val) { ?>
			 		<tr>
			 			<td><?php echo $val->apv_code; ?></td>
			 			<td><?php echo $val->apv_vender; ?></td>
			 			<!-- <td><span class="label label-warning">รออนุมัติ</span></td> -->
			 			<td><button class="open btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td>
			 			<td><button class="waitapprove<?php echo $val->apv_code;?> btn btn-danger btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> ส่งอนุมัติ</button></td>

			 		</tr>
<script>
//   $(document).ready(function() {
    <?php if ($auth=="md") {?>
    $("#headddd").hide();
    <?php } ?>
// } );
  </script>
    <script>
  $(".waitapprove<?php echo $val->apv_code;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/approve/sentwaitapprove";
  	var dataSet={
  			code: "<?php echo $val->apv_code;?>",
  			waitapprove: "dapprove"
	  	};
	  $.post(url,dataSet,function(data){
	  	  $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
	      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/retrive_apv');
	      $("#title").hide();
	});
  });
  </script>

			 	<?php } ?>
			 	</tbody>
			 </table>
			</div>
			 <div class="panel-footer">
			 <button class="ss btn btn-info btn-xs" data-toggle="tooltip" data-placement="right" title="ระบบแสดงข้อมูล 5 รายการล่าสุด ท่านสามารถเปิดข้อมูลทั้งหมดโดยกดที่นี่" style="font-size:11px;">รายการทั้งหมด</button>
			 </div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="panel panel-success" style="margin-top:11px;" ng-app="app">
			<div class="panel-heading">รายการชำระเจ้าหนี้อนุมัติแล้ว</div>
			<div class="panel-body">
			 <table class="table  table-hover" style="font-size:11px;">
			 	<thead>
			 		<tr>
			 			<th width="5%">เลขที่</th>
			 			<th>เจ้าหนี้</th>
			 			<th width="5%">สถานะ</th>
			 			<!-- <th width="5%">เปิด</th> -->
			 			<th width="5%">พิมพ์</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 	<?php foreach ($approve as $val) { ?>
			 		<tr>
			 			<td><?php echo $val->apv_code; ?></td>
			 			<td><?php echo $val->apv_vender; ?></td>
			 			<td><span class="label label-success">อนุมัติแล้ว</span></td>
			 			<!-- <td><button class="btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td> -->
			 			
			 			<td><a href="<?php echo base_url(); ?>index.php/report/apv/<?php echo $val->apv_code; ?>/<?php echo $val->apv_pono; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
			 		</tr>
			 	<?php } ?>
			 	</tbody>
			 </table>
			</div>
			<div class="panel-footer">
				<button class="ss btn btn-success btn-xs" data-toggle="tooltip" data-placement="right" title="ระบบแสดงข้อมูล 5 รายการล่าสุด ท่านสามารถเปิดข้อมูลทั้งหมดโดยกดที่นี่" style="font-size:11px;">รายการทั้งหมด</button>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
//   $(document).ready(function() {
   // $('.table').DataTable();

     //$('.btn').tooltip();
// } );
  $(".ss").click(function(event) {
  	$('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapv');
  });
  </script>



