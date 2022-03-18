
		<div class="panel panel-info" style="margin-top:11px;" ng-app="app">
			<div class="panel-heading">รายการชำระเจ้าหนี้</div>
			<div class="panel-body">
			 <table id="tableapo" class="table table-hover" style="font-size:11px;">
			 	<thead>
			 		<tr>
			 			<th width="10%">เลขที่จ่าย</th>
			 			<th>จ่ายให้กับ</th>
			 			<th width="3%">สถานะ</th>
			 			<th width="3%">เปิด</th>
			 			<th width="3%">แก้ไข</th>
			 			<th width="3%">พิมพ์</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 	<?php foreach ($res as $val) { ?>
			 		<tr>
			 			<td><?php echo $val->apo_code; ?></td>
			 			<td><?php echo $val->apo_vender; ?></td>
			 			<td><span class="label label-warning">รออนุมัติ</span></td>
			 			<td><button class="btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td>
			 			<td><button class="btn btn-info btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button></td>					
						<td><a href="<?php echo base_url(); ?>index.php/report/apo/<?php echo $val->apo_code; ?>/<?php echo $val->apo_prref; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>



						<!-- ระบบการอนุมัติ pv -->
			 			<!--<?php if ($val->apo_status=="approve") {?>
			 				<td><span class="label label-success">อนุมัติแล้ว</span></td>
			 				<td></td>
			 			<?php }elseif($val->apo_status=="dapprove"){ ?>
			 				<?php if($auth=="md"){ ?>
				 				<td><span class="label label-warning">รออนุมัติ</span></td>
				 				<td><button class="approve<?php echo $val->apo_code;?> btn btn-success btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> อนุมัติ</button></td>
			 				<?php }else{ ?>
				 				<td><span class="label label-info">รอผู้บริหารอนุมัติ</span></td>
				 				<td></td>
			 				<?php } ?>
			 			<?php }else{ ?>
				 			<?php if($auth=="md"){ ?>
								<td><span class="label label-warning">รอส่งอนุมัติ</span></td>
			 				<td><button class="approve<?php echo $val->apo_code;?> btn btn-danger btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> อนุมัติ</button></td>
				 			<?php }else{ ?>
								<td><span class="label label-warning">รออนุมัติ</span></td>
			 				<td><button class="waitapprove<?php echo $val->apo_code;?> btn btn-danger btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> ส่งอนุมัติ</button></td>
				 			<?php } ?>
							
			 			<?php } ?>
			 			<td><button class="btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td>
			 			<?php if($auth=="md"){ ?>
							<td><a href="<?php echo base_url(); ?>index.php/report/apo/<?php echo $val->apo_code; ?>/<?php echo $val->apo_pono; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
			 			<?php }else{ ?>
			 				<?php if ($val->apo_status=="approve") { ?>
								<td><a href="<?php echo base_url(); ?>index.php/report/apo/<?php echo $val->apo_code; ?>/<?php echo $val->apo_pono; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
			 				<?php }else{ ?>
								<td><button class="hh btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></td>
			 				<?php } ?>-->
			 				
			 			<?php } ?>
			 		</tr>
    <script>
  $(".waitapprove<?php echo $val->apo_code;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/approve/sentwaitapprove";
  	var dataSet={
  			code: "<?php echo $val->apo_code;?>",
  			waitapprove: "dapprove"
	  	};
	  $.post(url,dataSet,function(data){
	  	  $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
	       $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapo');
	      $("#title").hide();
	});
  });
  $(".approve<?php echo $val->apo_code;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/approve/sentwaitapprove";
  	var dataSet={
  			code: "<?php echo $val->apo_code;?>",
  			waitapprove: "approve"
	  	};
	  $.post(url,dataSet,function(data){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapo');
	});
  });
  </script>

			 	<?php } ?>
			 	</tbody>
			 </table>
			</div>
			 
		</div>
<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
//   $(document).ready(function() {
    $('#tableapo').DataTable();
    $('.hh').prop('disabled', true);
// } );