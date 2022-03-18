<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการเบิกวัสดุทั้งหมด</div>
		<div class="panel-body">
			<table id="datatable" class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>เลขที่ใบเบิก</th>
						<th>ชื่อผู้เิบก</th>
						<th>โครงการ</th>
						<th width="8%">เปิดดู</th>
						<!--<th width="8%">แก้ไข</th>
						<th width="8%">ลบ</th>-->
						<th width="5%">พิมพ์</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=1; foreach ($getissue as $value) {?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value->is_doccode; ?></td>
						<td><?php echo $value->m_name; ?></td>
						<td><?php echo $value->project_name; ?></td>
						<td><button class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#openis<?php echo $value->is_doccode;?>"><span class="glyphicon glyphicon-search"></span> เปิด</button></td>
						<td><a href="<?php echo base_url(); ?>index.php/report/report_stock/<?php echo $value->is_doccode; ?>" target="blank"><button class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-print"></span> พิมพ์</button></a></td>
						<!--<td><button class="btn btn-info btn-xs btn-block"><span class="glyphicon glyphicon-edit"></span></button></td>
						<td><button class="btn btn-danger btn-xs btn-block"><span class="glyphicon glyphicon-trash"></span></button></td>
						<td><button class="btn btn-warning btn-xs btn-block"><span class="glyphicon glyphicon-print"></span></button></td>-->
					</tr>

				<?php $i++; } ?>
				</tbody>
			</table>
		</div>
</div>

	<?php foreach ($getissue as $moh) {?>
	 <!-- modal show detail po detail -->
  <div class="modal fade" id="openis<?php echo $moh->is_doccode;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header" style="background:#00008b; color:#fff;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="myModalLabel">รายการใบเบิก เลขที่ <?php echo $moh->is_doccode; ?></h4>
       </div>
         <div class="modal-body">
			<div class="panel panel-info">
			  <div class="panel-heading">ข้อมูลใบเบิกวัสดุ</div>
			  <div class="panel-body">
				   <div class="row">
				   		<div class="col-xs-6">
					   		<div class="form-group">
					   			<strong>เลขที่ใบเบิก</strong>
					   			<p> <?php echo $moh->is_doccode; ?></p>
					   		</div>
				   		</div>
				   		<div class="col-xs-6">
				   			<div class="form-group">
				   				<strong>วันที่เบิก</strong>
				   				<p> <?php echo $moh->is_docdate; ?></p>
				   			</div>
				   		</div>
				   </div>
				   <div class="row">
				   		<div class="col-xs-6">
				   			<div class="form-group">
				   				<strong>โครงการ</strong>
				   				<p><?php echo $moh->project_name; ?></p>
				   			</div>
				   		</div>
				   		<div class="col-xs-6">
				   			<div class="form-group">
				   				<strong>ระบบ</strong>
				   				<P><?php echo $moh->systemname; ?></P>
				   			</div>
				   		</div>
				   </div>
				   <div class="row">
				   		<div class="col-xs-6">
				   			<div class="form-group">
				   				<strong>ผู้ขอเบิก</strong>
				   				<p><?php echo $moh->m_name; ?></p>
				   			</div>
				   		</div>
				   		<div class="col-xs-6">
				   			<div class="form-group">
				   				<strong>ประเภท</strong>
				   				<p><?php if ($moh->is_type=="1") {echo "รับของ";}else{echo "โอนย้าย";} ?></p>
				   			</div>
				   		</div>
				   </div>
				   <div class="row">
					   	<div class="col-xs-12">
					   		<strong>หมายเหตุ</strong>
					   		<p><?php if($moh->is_remark==""){echo "-";}else{echo $moh->is_remark; } ?></p>
					   	</div>
				   </div>
			  </div>
			</div>
			<div class="panel panel-info">
			  <div class="panel-heading">รายการเบิกวัสดุ</div>
				<table class="table">
					<thead>
						<tr>
							<th style="text-align:center;">#</th>
							<th>ชื่อวัสดุ</th>
							<th>จำนวน</th>
							<th>หน่วย</th>
						</tr>
					</thead>
					<tbody>
					<?php $this->load->model('stock_m');
						  $res = $this->stock_m->getdocissue_d($moh->is_doccode);
				    ?>
				    <?php $i=1; foreach ($res as $mod) {?>
						<tr>
							<td align="middle"><?php echo $i; ?></td>
							<td><?php echo $mod->isi_matname; ?></td>
							<td><?php echo $mod->isi_xqty; ?></td>
							<td><?php echo $mod->isi_unit; ?></td>
						</tr>
					<?php $i++; } ?>
					</tbody>
				</table>
			 </div>
			 <div class="modal-footer">
			 	<button class="btn btn-default" data-dismiss="modal">Close</button>
			 </div>
         </div>
         </div>
     </div>
   </div>
 </div> <!--end modal -->
 <?php } ?>




<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>