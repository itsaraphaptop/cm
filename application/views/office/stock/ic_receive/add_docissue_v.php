<div class="panel panel-primary">
		    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> เพิ่มรายการขอเบิก</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
						<label for="">เลือกวัสดุ</label>
							<div class="input-group">
								<input type="text" readonly="true" class="form-control input-sm" placeholder="เลือกวัสดุ" id="matname">
								<input type="hidden" id="matcode">
								<span class="input-group-btn">
									<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#openstore">เลือก</button>
								</span>
							</div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-4">
                        	<div class="form-group">
                        		<label for="">จำนวนเบิก</label>
                        		<input type="text" class="form-control input-sm" placeholder="กรอกจำนวน" id="xqty">
                        	</div>
                        </div>
                        <div class="col-md-4">
                        <label for="unit">หน่วย</label>
                        	<div class="input-group">
                                <input type="text" class="form-control input-sm" id="unit" readonly="true" placeholder="เลือกหน่วย">
                                <span class="input-group-btn" >
                                  <button class="openun btn btn-primary btn-sm" data-toggle="modal" data-target="#openunit" type="button"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>
                                </span>
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="">หมายเหตุ</label>
								<textarea class="form-control input-sm"  id="xremark" cols="30" rows="5" placeholder="กรอกกมายเหตุ"></textarea>
								<input type="hidden" value="<?php echo $uname; ?>" id="xuser">
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button class="btn btn-primary" id="cinsdt"> บันทึก</button>
					<button class="btn btn-default" id="cclose"> ปิด</button>
				</div>
		</div>



		<!-- modal เลือกหน่วย -->
 <div class="modal fade" id="openunit" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
      </div>
        <div class="panel-body">
            
                <table id="dataunit" class="table table-striped" >
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
			            <td><button class="openun btn btn-xs btn-block btn-info" data-toggle="modal"  data-vunit="<?php echo $valj->unit_name;?>" data-dismiss="modal">เลือก</button></td>
			        </tr>


			          <?php $n++; } ?>
			      </tbody>
			    </table>
            
        </div>
    </div>
  </div>
</div> <!--end modal -->

<!-- modal store -->
 <div class="modal fade" id="openstore" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background:#00008b; color:#fff;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหน่วย</h4>
      </div>
        <div class="panel-body">
            
                <table id="dataunit" class="table table-striped" >
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
			            <td><button class="openmat btn btn-xs btn-block btn-info" data-toggle="modal" data-matcode="<?php echo $valj->store_matcode; ?>"  data-matname="<?php echo $valj->store_matname;?>" data-dismiss="modal">เลือก</button></td>
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
  	$("#cinsdt").hide();
    $('#dataunit').DataTable();
} );
  $(".openun").click(function(){
      $("#unit").val($(this).data('vunit'));
    });
  $(".openmat").click(function(event) {
  	$("#matname").val($(this).data('matname'));
  	$("#matcode").val($(this).data('matcode'));
  });
</script>
<script>
	$("#xqty").change(function(event) {
		$("#cinsdt").show();
	});
	$("#cclose").click(function(event) {
		$("#adddetail").hide();
	});
	$("#cinsdt").click(function(event) {
		
		var url="<?php echo base_url(); ?>index.php/stock/add_docissue_d";
          	var dataSet={
	            doccode: $("#outno").val(),
	            matcode: $("#matcode").val(),
	            matname: $("#matname").val(),
	            qty: $("#xqty").val(),
	            unit: $("#unit").val(),
	            desc: $("#xremark").val(),
	            user: $("#xuser").val(),
            };
            $.post(url,dataSet,function(data){
            	$("#adddetail").hide();
            	$("#detail").show();
            	$('#detail').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
            	$("#detail").load('<?php echo base_url(); ?>index.php/stock/detail_docissue/'+data);
            });
           

	});
</script>