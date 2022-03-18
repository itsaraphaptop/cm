
<div class="row">
	<div class="col-xs-6">
		<div class="panel panel-info" style="margin-top:10px;" ng-app="app">
			<div class="panel-heading">รายการชำระเจ้าหนี้รออนุมัติ</div>
			<div class="panel-body">
			 <table class="table table-hover" style="font-size:11px;">
			 	<thead>
			 		<tr>
			 			<th>เลขที่จ่าย</th>
			 			<th>เจ้าหนี้</th>
			 			<!-- <th width="3%">สถานะ</th> -->
			 			<th width="3%">เปิด</th>
			 			<th width="3%">อนุมัติ</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 	<?php foreach ($res as $val) { ?>
			 		<tr>
			 			<td><?php echo $val->apv_code; ?></td>
			 			<td><?php echo $val->apv_vender; ?></td>
			 			<!-- <td><span class="label label-warning">รออนุมัติ</span></td> -->
			 			<td><button class="btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td>
			 			<td><button class="approve<?php echo $val->apv_code;?> btn btn-success btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> อนุมัติ</button></td>
			 		
			 			
			 		</tr>
    <script>
  $(".approve<?php echo $val->apv_code;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/approve/sentwaitapprove";
  	var dataSet={
  			code: "<?php echo $val->apv_code;?>",
  			waitapprove: "approve"
	  	};
	  $.post(url,dataSet,function(data){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $('#loaddata').load('<?php echo base_url(); ?>index.php/director/retrive_apv');
	});
  });
  </script>

			 	<?php } ?>
			 	</tbody>
			 </table>
			</div>
			 <div class="panel-footer">
			 <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="right" title="ระบบแสดงข้อมูล 5 รายการล่าสุด ท่านสามารถเปิดข้อมูลทั้งหมดโดยกดที่นี่" style="font-size:11px;">รายการทั้งหมด</button>
			 </div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="panel panel-success" style="margin-top:10px;" ng-app="app">
			<div class="panel-heading">รายการชำระเจ้าหนี้อนุมัติแล้ว</div>
			<div class="panel-body">
			 <table class="table table-hover" style="font-size:11px;">
			 	<thead>
			 		<tr>
			 			<th>เลขที่จ่าย</th>
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
				<button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="right" title="ระบบแสดงข้อมูล 5 รายการล่าสุด ท่านสามารถเปิดข้อมูลทั้งหมดโดยกดที่นี่" style="font-size:11px;">รายการทั้งหมด</button>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
//   $(document).ready(function() {
//     // $('.table').DataTable();
// } );

  $(".btn").click(function(event) {
  	$('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapv');
  });
  </script>



