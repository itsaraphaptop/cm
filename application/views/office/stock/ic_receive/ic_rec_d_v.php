<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการรับสินค้าเข้าคลังสินค้า</div>
		<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th width="10%">No.</th>
				<th width="20%">ต้นทุน</th>
				<th>ชื่อสินค้า</th>
				<th width="10%">ปริมาณ</th>
				<th width="10%">คงเหลือ</th>
				<th width="10%">รับเข้าคลัง</th>
			</thead>
			<?php $n=1; foreach ($getdetail as $va) {?>
			<tbody>
				<td><?php echo $n; ?></td>
				<td><?php echo $va->poi_costname; ?></td>
				<td><?php echo $va->poi_matname; ?></td>
				<td><?php echo $va->poi_qty; ?></td>
				<?php $qt =  $va->poi_qty;
					  $re = $va->ic_receive;
					  $tot = $qt-$re;
				 ?>
				 <?php if ($tot=="0") {?>
				 	<td><span class="label label-success">รับเข้าคลังแล้ว</span></td>
				 	<td></td>
				<?php }else{ ?>
					<td><?php echo $tot; ?></td>
					<td><button class="bnt btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#open<?php echo $va->poi_id;?>"><span class="glyphicon glyphicon-save"></span> รับเข้า</button></td>
				 <?php } ?>
				
			</tbody>

<div class="modal fade" id="open<?php echo $va->poi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #337ab7; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกรายการรับของจากใบสั่งซื้อ <?php echo $va->poi_costname; ?></h4>
      </div>
      <div class="modal-body">
       <div class="row">
       	<div class="col-xs-6">
       		<div class="form-group" align="middle">
       			<h3>จำนวนรับจากใบสั่งซื้อ</h3>
       			<h1><?php echo $va->poi_qty; ?></h1>
       		</div>
       	</div>
       	<div class="col-xs-6">
       	<div class="row">
       		<div class="col-xs-12">
       			<div class="form-group">
       				<label>เลือคลังสินค้า</label>
       				<select class="form-control input-sm" id="sproj<?php echo $va->poi_id; ?>">
       				<?php foreach ($getproject as $pj) {?>
       					<option value="<?php echo $pj->project_id; ?>"><?php echo $pj->project_name; ?></option>
       				<?php } ?>
       				</select>
       			</div>
       		</div>
       	</div>
	       	<div class="row">
	       		<div class="col-xs-6">
	       			<div class="form-group">
		       			<label for="">จำนวนรับเข้าคลัง</label>
		       			<input type="text" class="form-control input-sm" id="qty<?php echo $va->poi_id; ?>">
		       			<input type="hidden" value="<?php echo $va->poi_costname; ?>" id="costname<?php echo $va->poi_id; ?>">
		       			<input type="hidden" value="<?php echo $va->poi_matname; ?>" id="matname<?php echo $va->poi_id; ?>">
		       			<input type="hidden" value="<?php echo $va->poi_matcode; ?>" id="matcode<?php echo $va->poi_id; ?>">
		       			<input type="hidden" value="<?php echo $va->poi_costcode; ?>" id="costcode<?php echo $va->poi_id; ?>">
		       			<input type="hidden" value="<?php echo $va->poi_id; ?>" id="poi_id<?php echo $va->poi_id; ?>">
		       			<button class="btn btn-primary btn-xs" id="icsave<?php echo $va->poi_id; ?>" style="margin-top:10px;" data-dismiss="modal">รับของ</button>
	       			</div>
	       		</div>		
	       	</div>
       	</div>
       </div>
      </div>
    </div>
  </div>
</div>
<script>
	$("#icsave<?php echo $va->poi_id; ?>").click(function() {
		var url="<?php echo base_url(); ?>index.php/stock/add_ic_receive_d";
		        var dataSet={
		        	icno: $("#icno").val(),
		            sproj:  $('#sproj<?php echo $va->poi_id; ?>').val(),
		            qty:  $("#qty<?php echo $va->poi_id; ?>").val(),
		            costname: $("#costname<?php echo $va->poi_id; ?>").val(),
		            matname: $("#matname<?php echo $va->poi_id; ?>").val(),
		            matcode: $("#matcode<?php echo $va->poi_id; ?>").val(),
		            costcode: $("#costcode<?php echo $va->poi_id; ?>").val(),
		            poi_id: $("#poi_id<?php echo $va->poi_id; ?>").val(),
		            po: $("#pono").val()
		            };
		        $.post(url,dataSet,function(data){
		        	
		        	var po = $("#pono").val();
		               $("#detail").load('<?php echo base_url(); ?>index.php/stock/loadporec_d/'+ po);
			        });
	});
</script>
			<?php $n++; } ?>
		</table>
		</div>
</div>

 <script>
//   $(document).ready(function() {
    if ($("#icno").val()=="") {
       $('.bnt').prop('disabled', true);
     }else
     {
      $('.bnt').prop('disabled', false);
     }
   
//   });
</script>
