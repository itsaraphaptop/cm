		<div class="panel panel-primary">
		    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการขอเบิก</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th style="text-align:center">ชื่อวัสดุ</th>
								<th width="10%">จำนวน</th>
								<th width="10%">หน่วย</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1; foreach ($res as $value) {?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $value->isi_matname; ?></td>
								<td><?php echo $value->isi_xqty;?></td>
								<td><?php echo $value->isi_unit; ?></td>
								<td><button class="btn btn-info btn-xs btn-block" data-toggle="modal" data-target="#edit<?php echo $value->isi_id;?>"><span class="glyphicon glyphicon-edit"></span></button></td>
								<td><button class="btn btn-danger btn-xs btn-block" id="del<?php echo $value->isi_id;?>"><span class="glyphicon glyphicon-trash"></span></button></td>
							</tr>

						<?php $i++; } ?>
						</tbody>
					</table>
				</div>
		</div>

<!-- delete -->
<?php foreach ($res as $value1) { ?>					
<script>
$("#del<?php echo $value1->isi_id;?>").click(function() {
	var url="<?php echo base_url(); ?>index.php/stock/del_docissue_d";
          	var dataSet={
	            id: "<?php echo $value1->isi_id; ?>",
	            ref: "<?php echo $value1->isi_doccode; ?>",
	            xqty: "<?php echo $value1->isi_xqty;?>",
	            matcode: "<?php echo $value->isi_matcode; ?>"
            };
            $.post(url,dataSet,function(data){
            	$('#detail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
            	$("#detail").load('<?php echo base_url(); ?>index.php/stock/detail_docissue/'+data);
            });
	});
</script>
<?php } ?>
<!-- end delete -->

<!-- modal แก้ไข -->
<?php foreach ($res as $edt) {?>
 <div class="modal fade" id="edit<?php echo $edt->isi_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไข <?php echo $edt->isi_matname; ?></h4>
      </div>
        <div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
						<label for="">เลือกวัสดุ</label>
							<div class="input-group">
								<input type="text" readonly="true" value="<?php echo $edt->isi_matname; ?>" class="form-control input-sm" placeholder="เลือกวัสดุ" id="ematname<?php echo $edt->isi_id;?>">
								<input type="hidden" value="<?php echo $edt->isi_matcode; ?>" id="ematcode<?php echo $edt->isi_id;?>">
								<span class="input-group-btn">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#eopenstore<?php echo $edt->isi_id;?>">เลือก</button>
								</span>
							</div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-4">
                        	<div class="form-group">
                        		<label for="">จำนวนเบิก</label>
                        		<input type="text" value="<?php echo $edt->isi_xqty; ?>" class="putqty<?php echo $edt->isi_id;?> form-control input-sm" placeholder="กรอกจำนวน" id="exqty<?php echo $edt->isi_id;?>">
                        	</div>
                        </div>
                        <div class="col-md-4">
                        <label for="unit">หน่วย</label>
                        	<div class="input-group">
                                <input type="text" class="form-control input-sm" value="<?php echo $edt->isi_unit; ?>" id="eunit<?php echo $edt->isi_id;?>" readonly="true" placeholder="เลือกหน่วย">
                                <span class="input-group-btn" >
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#eopenunit<?php echo $edt->isi_id;?>" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="">หมายเหตุ</label>
								<textarea class="form-control input-sm"  id="exremark<?php echo $edt->isi_id;?>" cols="30" rows="5" placeholder="กรอกกมายเหตุ"><?php echo $edt->isi_remark; ?></textarea>
							</div>
						</div>
					</div>
			<div class="modal-footer">
	        	<button class="btn btn-warning" id="edt<?php echo $edt->isi_id;?>" data-dismiss="modal"> แก้ไข</button>
	        	<button class="btn btn-default" data-dismiss="modal"> ปิด</button>
	        </div>
        </div>
        
    </div>
  </div>
</div> <!--end modal -->



<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="eopenunit<?php echo $edt->isi_id;?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย <?php echo $edt->isi_id; ?></h4>
      </div>
        <div class="panel-body">
            
                <table id="dataunit<?php echo $edt->isi_id;?>" class="table table-striped" >
			      <thead>
			        <tr>
			          <th style="text-align:center;" width="5%">No.</th>
			          <th>หน่วย</th>
			          <th width="5%">จัดการ</th>
			        </tr>
			      </thead>
			      <tbody>
			          <?php   $n =1;?>
			          <?php foreach ($getunit as $valj){ ?>
			        <tr>
			         <td align="middle"><?php echo $n;?></td>
			          <td><?php echo $valj->unit_name; ?></td>
			            <td><button class="eopenun<?php echo $edt->isi_id;?> btn btn-xs btn-block btn-info" data-toggle="modal"  data-evunit<?php echo $edt->isi_id;?>="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
			        </tr>


			          <?php $n++; } ?>
			      </tbody>
			    </table>
            
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal store -->
 <div class="modal fade" id="eopenstore<?php echo $edt->isi_id;?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกวัสดุ <?php echo $edt->isi_id; ?></h4>
      </div>
        <div class="panel-body">
            
                <table id="datastore<?php echo $edt->isi_id;?>" class="table table-striped" >
			      <thead>
			        <tr>
			          <th style="text-align:center;" width="5%">No.</th>
			          <th>วัสดุ</th>
			          <th>คงเหลือ</th>
			          <th width="5%">จัดการ</th>
			        </tr>
			      </thead>
			      <tbody>
			          <?php   $n =1;?>
			          <?php foreach ($mat as $valj){ ?>
			        <tr>
			         <td align="middle"><?php echo $n;?></td>
			          <td><?php echo $valj->store_matname; ?></td>
			          <td><?php echo $valj->store_qty; ?></td>
			            <td><button class="eopenmat<?php echo $edt->isi_id;?> btn btn-xs btn-block btn-info" data-toggle="modal" data-ematcode<?php echo $edt->isi_id;?>="<?php echo $valj->store_matcode; ?>"  data-ematname<?php echo $edt->isi_id;?>="<?php echo $valj->store_matname;?>" data-dismiss="modal">เลือก</button></td>
			        </tr>


			          <?php $n++; } ?>
			      </tbody>
			    </table>
            
        </div>
    </div>
  </div>
</div> <!--end modal -->

<script src="<?php echo base_url(); ?>dist/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js//jquery.dataTables.min.js"></script>
  <link  href="<?php echo base_url(); ?>dist/css/jquery.dataTables.css" rel="stylesheet"/>
<script>
  $(document).ready( function () {
    $('#dataunit<?php echo $edt->isi_id;?>').DataTable();
} );
   $(document).ready( function () {
    $('#datastore<?php echo $edt->isi_id;?>').DataTable();
} );
  </script>


<script>
  $(".eopenun<?php echo $edt->isi_id;?>").click(function(){
  	  $("#eunit<?php echo $edt->isi_id;?>").val("");
      $("#eunit<?php echo $edt->isi_id;?>").val($(this).data('evunit<?php echo $edt->isi_id;?>'));
    });
  $(".eopenmat<?php echo $edt->isi_id;?>").click(function(event) {
  	$("#ematname<?php echo $edt->isi_id;?>").val("");
  	$("#ematcode<?php echo $edt->isi_id;?>").val("");
  	$("#ematname<?php echo $edt->isi_id;?>").val($(this).data('ematname<?php echo $edt->isi_id;?>'));
  	$("#ematcode<?php echo $edt->isi_id;?>").val($(this).data('ematcode<?php echo $edt->isi_id;?>'));
  });
  $("#edt<?php echo $edt->isi_id;?>").click(function(event) {
  	var url="<?php echo base_url(); ?>index.php/stock/edit_docissue_d";
          	var dataSet={
             id: "<?php echo $edt->isi_id; ?>",
             ref: "<?php echo $edt->isi_doccode; ?>",
             xqty: "<?php echo $edt->isi_xqty; ?>",
             matcode: $("#ematcode<?php echo $edt->isi_id;?>").val(),
             putqty: $(".putqty<?php echo $edt->isi_id;?>").val(),
             matname: $("#ematname<?php echo $edt->isi_id;?>").val(),
             unit: $("#eunit<?php echo $edt->isi_id;?>").val(),
             remark: $("#exremark<?php echo $edt->isi_id;?>").val()

            };
            $.post(url,dataSet,function(data){
            	
            	$('#detail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
            	$("#detail").load('<?php echo base_url(); ?>index.php/stock/detail_docissue/'+data);
            	alert(data);
            });
  });
</script>
<?php } ?>



