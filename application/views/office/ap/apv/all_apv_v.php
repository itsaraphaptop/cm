
		<div class="panel panel-info" style="margin-top:11px;" ng-app="app">
			<div class="panel-heading">รายการชำระเจ้าหนี้</div>
			<div class="panel-body">
			 <table class="table table-hover" style="font-size:11px;">
			 	<thead>
			 		<tr>
			 			<th>เลขที่จ่าย</th>
			 			<th>เจ้าหนี้</th>
			 			<th width="3%">สถานะ</th>
			 			<th width="3%">เปิด</th>
			 			<th width="3%">แก้ไข</th>
			 			<th width="3%">พิมพ์</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 	<?php foreach ($res as $val) { ?>
			 		<tr>
			 			<td><?php echo $val->apv_code; ?></td>
			 			<td><?php echo $val->apv_vender; ?></td>
			 			<td><span class="label label-warning">รออนุมัติ</span></td>
			 			<td><button class="btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td>
			 			<?php if ($val->apv_type=="apvn") {?>
						<td><a id="editapv<?php echo $val->apv_code;?>"><button class="btn btn-info btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button></a>	</td>				
			 			<?php }else{ ?>
			 			<td><button class="btn btn-info btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button></td>					
			 			<?php } ?>			 			
						<?php if ($val->apv_type=="apvn") {?>
						<td><a href="<?php echo base_url(); ?>index.php/report/newapv_report/<?php echo $val->apv_code; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
						<?php }else{ ?>
						<td><a href="<?php echo base_url(); ?>index.php/report/apv/<?php echo $val->apv_code; ?>/<?php echo $val->apv_pono; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
						<?php } ?>


						<!-- ระบบการอนุมัติ pv -->
			 			<!--<?php if ($val->apv_status=="approve") {?>
			 				<td><span class="label label-success">อนุมัติแล้ว</span></td>
			 				<td></td>
			 			<?php }elseif($val->apv_status=="dapprove"){ ?>
			 				<?php if($auth=="md"){ ?>
				 				<td><span class="label label-warning">รออนุมัติ</span></td>
				 				<td><button class="approve<?php echo $val->apv_code;?> btn btn-success btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> อนุมัติ</button></td>
			 				<?php }else{ ?>
				 				<td><span class="label label-info">รอผู้บริหารอนุมัติ</span></td>
				 				<td></td>
			 				<?php } ?>
			 			<?php }else{ ?>
				 			<?php if($auth=="md"){ ?>
								<td><span class="label label-warning">รอส่งอนุมัติ</span></td>
			 				<td><button class="approve<?php echo $val->apv_code;?> btn btn-danger btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> อนุมัติ</button></td>
				 			<?php }else{ ?>
								<td><span class="label label-warning">รออนุมัติ</span></td>
			 				<td><button class="waitapprove<?php echo $val->apv_code;?> btn btn-danger btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-check"></span> ส่งอนุมัติ</button></td>
				 			<?php } ?>
							
			 			<?php } ?>
			 			<td><button class="btn btn-primary btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-eye-open"></span> เปิด</button></td>
			 			<?php if($auth=="md"){ ?>
							<td><a href="<?php echo base_url(); ?>index.php/report/apv/<?php echo $val->apv_code; ?>/<?php echo $val->apv_pono; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
			 			<?php }else{ ?>
			 				<?php if ($val->apv_status=="approve") { ?>
								<td><a href="<?php echo base_url(); ?>index.php/report/apv/<?php echo $val->apv_code; ?>/<?php echo $val->apv_pono; ?>" target="blank"><button class="btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
			 				<?php }else{ ?>
								<td><button class="hh btn btn-warning btn-xs btn-block" style="font-size:11px;"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></td>
			 				<?php } ?>-->
			 				
			 			<?php } ?>
			 		</tr>
    <script>
  $(".waitapprove<?php echo $val->apv_code;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/approve/sentwaitapprove";
  	var dataSet={
  			code: "<?php echo $val->apv_code;?>",
  			waitapprove: "dapprove"
	  	};
	  $.post(url,dataSet,function(data){
	  	  $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
	       $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapv');
	      $("#title").hide();
	});
  });
  $(".approve<?php echo $val->apv_code;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/approve/sentwaitapprove";
  	var dataSet={
  			code: "<?php echo $val->apv_code;?>",
  			waitapprove: "approve"
	  	};
	  $.post(url,dataSet,function(data){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapv');
	});
  });
  $('#editapv<?php echo $val->apv_code;?>').click(function(event) {
  	$('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
  $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/editnewapv/<?php echo $val->apv_code; ?>');
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
    $('.table').DataTable();
    $('.hh').prop('disabled', true);
// } );

  </script>