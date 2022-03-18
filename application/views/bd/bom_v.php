<!-- Main content  trans-->
			<div class="content-wrapper">


				<!-- Content area -->
				<div class="content">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<form method="post" action="<?php echo base_url(); ?>bd/add_bom">
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-1">Code : </label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="bom_code" value="<?= $code?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-offset-1 col-sm-1">BOM Description : </label>
									<div class="col-sm-2">
										<input type="text" class="form-control" name="bom_descrip" required="true">
									</div>
								</div>
							</div>
							<!-- <div class="form-horizontal"> -->
								<div class="form-group">
									<button class="btn btn-success" type="submit"><i class=" icon-floppy-disk"></i> บันทึก</button>
									<a href="#" id="addboq" class="btn btn-warning"><i class="icon-plus-circle2"></i> Insert row</a>
								</div>
							<!-- </div> -->
							<div class="form-horizontal">
								<div class="table-responsive" style="overflow-x:auto;">
								<table class="table table-bordered table-striped" id="table_bom">
									<thead>
										<tr>
											<th><div style="width: 10px;">No.</div></th>
											<th><div style="width: 10px;"></div></th>
											<th><div style="width: 150px;">Material Code</div></th>
											<th><div style="width: 150px;">Material Name</div></th>
											<th><div style="width: 150px;">Type</div></th>
											<th><div style="width: 150px;">Description</div></th>
											<th><div style="width: 150px;">QTY</div></th>
											<th><div style="width: 150px;">Unit Code</div></th>
											<th><div style="width: 150px;">Unit Name</div></th>
											<th><div style="width: 150px;">Price/Unit</div></th>
											<th><div style="width: 150px;">Amount</div></th>
										</tr>
									</thead>
									<tbody id="matbaran">
										<tr>
											<td colspan="11" class="text-center">No Data</td>
										</tr>
									</tbody>
								</table>
							</div> 
							</div>
						</form>
						</div>

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">


    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เพิ่มรายการ</h4>
      </div>
      <div class="modal-body">
      	<div class="form-horizontalr">
			<div class="form-group">
				<label class="radio-inline">
					<input type="radio" name="radio-inline-left" id="matrd1" class="styled">
					Material Group
				</label>
				<label class="radio-inline">
					<input type="radio" name="radio-inline-left" id="matrd2" class="styled" checked="">
					Material Name
				</label>
			</div>

			<div class="form-group">
				<div class="has-feedback has-feedback-left">
					<input type="text" class="form-control input-xlg" id="textnn" placeholder="Filter By Material Name">
					<div class="form-control-feedback">
						<i class="icon-search4 text-muted text-size-base"></i>
					</div>
				</div>
			</div>
			<script type="text/javascript">

			$('body').attr('class', 'navbar-top pace-done');

				$("#textnn").keyup(function(){
				if ($("#matrd1").is(":checked")) {
				var url ="<?php echo base_url() ?>share/material_id_alone_group";

				var dataSet={
					name : $("#textnn").val(),
				  };
				  alert(url);
				  $.post(url,dataSet,function(data){
				  	$("#matbaran").html(data);
				  	// console.log(data);
				  	// alert(data);
				  });
				}else if($("#matrd2").is(":checked")){
					var url="<?php echo base_url() ?>share/material_id_alone";
				
				var dataSet={
					name : $("#textnn").val(),
				  };
				  $.post(url,dataSet,function(data){
				  	// console.log(data);
				  	$("#matbaran").html(data);
				  // alert(data);
				  });
				}else{
				alert("7777");
				}

				});
			</script>
      		
      	</div>

      	<table class="table table-bordered">
      		<thead>
      			<tr>
      				<th>รหัสวัสดุ</th>
      				<th></th>
      				<th>ชื่อวัสดุ</th>
      				<th>จัดการ</th>
      			</tr>
      		</thead>
      		<tbody id="matbaran">
      			
      		</tbody>
      	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="mat"></div>
<div id="mat1"></div>
<script type="text/javascript">

$("#addboq").click(function(){
	 addrow();
	});

	 function addrow()
            {
				$('td[class="text-center"]').closest('tr').remove();
              var num = ($('#matbaran tr').length)+1;
              var tr = '<tr >'+
				'<td>'+num+'</td>'+
				'<td>'+
					// '<a><i class="icon-pencil7"></i></a>'+
					'<a class="delete"><i class="icon-trash"></i></a>'+
				'</td>'+
				'<td><input type="text" id="newmatcode'+num+'" class="form-control" num="'+num+'" name="mat_code[]" required="true" style="width: 200px;" readonly></td>'+
				'<td><div class="input-group"><input type="text" id="newmatname'+num+'" class="form-control" num="'+num+'" name="mat_name[]" required="true" style="width: 200px;" readonly>'+
					'<span class="input-group-btn" >'+
					'<a class="openunn'+num+' btn btn-primary" data-toggle="modal" data-target="#opnewmat'+num+'"><i class="glyphicon glyphicon-search"></i></a>'+
					// '<a class="openunnn'+num+' btn btn-primary" data-toggle="modal" data-target="#opnewmat2'+num+'"><i class="glyphicon glyphicon-search"></i></a>'+
					'</span>'+
					'</div>'+
				'</td>'+
				'<td>'+
					'<select class="form-control" name="type[]" required="true">'+
					'<option value="M">Material</option>'+
					'<option value="L">Labor.</option>'+
					'<option value="S">Subc.</option>'+
					'</select>'+
				'</td>'+
				'<td><input type="text" class="form-control" num="'+num+'" name="desc[]"></td>'+
				'<td><input type="text" class="form-control qty" num="'+num+'" id="qty'+num+'" name="qty[]" required="true"></td>'+
				'<td><div class="input-group"><input  type="text" num="'+num+'" name="unit_code[]" class="form-control unit_code" id="unit_code_'+num+'" required="true">'+
						'<span class="input-group-btn find-unit" num="'+num+'" >'+
							'<span class="input-group-btn">'+
								'<a class="btn btn-default btn-icon unit_num" num="'+num+'" data-toggle="modal" data-target="#">'+
								 	'<i class="icon-search4"></i>'+
								'</a>'+
							'</span>'+
						'</span>'+
					'</div>'+
				'</td>'+
				'<td><input type="text" class="form-control unit_name" id="unit_name_'+num+'" num="'+num+'"  name="unit_name[]" required="true"></td>'+
				'<td><input type="text" class="form-control price" num="'+num+'"  id="price'+num+'" name="price[]" required="true"></td>'+
				'<td><input type="text" class="form-control" num="'+num+'" id="amount'+num+'" required="true"></td>'+
		'</tr>';

		    $('#matbaran').append(tr);

			$('.qty , .price').keyup(function() {

			if (event.which >= 37 && event.which <= 40) {
			    event.preventDefault();
			}

			var currentVal = $(this).val();
			var testDecimal = testDecimals(currentVal);
			if (testDecimal.length > 1) {
			    console.log("You cannot enter more than one decimal point");
			    currentVal = currentVal.slice(0, -1);
			}
			$(this).val(replaceCommas(currentVal));

				var num = $(this).attr('num');
				var qty = $('#qty'+num).val().replace(/,/g,"");
				var price = $('#price'+num).val().replace(/,/g,"");
				var amount = (qty*1)*(price*1);
				$("#amount"+num).val(numberWithCommas(amount));
				

			});


		    $(".find-unit").click(function(event) {
		    	var num_unit_temp = $(this).attr('num');
		    	
		    	$("#temp_num_id").val(num_unit_temp);
				$("#unit").modal('show');
			});
var mat = '<div id="opnewmat'+num+'" class="modal fade" data-backdrop="false">'+
	'<div class="modal-dialog modal-full">'+
		'<div class="modal-content ">'+
			'<div class="modal-header">'+
				'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				'<h5 class="modal-title">เพิ่มรายการ</h5>'+
			'</div>'+
			'<div class="modal-body">'+
				'<div class="row" id="modal_matdd'+num+'"></div>'+
			'</div>'+
		'</div>'+
	'</div>'+
'</div>';
$('#mat').append(mat);

$(".openunn"+num+"").click(function(){
         $("#modal_matdd"+num+"").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
         $("#modal_matdd"+num+"").load('<?php echo base_url(); ?>share/getmatcode/'+num);
        });

var mat1 = '<div id="opnewmat2'+num+'" class="modal fade" data-backdrop="false">'+
	'<div class="modal-dialog modal-full">'+
		'<div class="modal-content ">'+
			'<div class="modal-header">'+
				'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				'<h5 class="modal-title">เพิ่มรายการ</h5>'+
			'</div>'+
			'<div class="modal-body">'+
				'<div class="row" id="modal_newmat'+num+'"></div>'+
			'</div>'+
		'</div>'+
	'</div>'+
'</div>';
$('#mat1').append(mat1);

$(".openunnn"+num+"").click(function(){
		var row = ($('#body tr').length-0)+1;
        $("#modal_newmat"+num+"").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
        $("#modal_newmat"+num+"").load('<?php echo base_url(); ?>index.php/share/material_id/'+num);
});

$('.delete').click(function() {
	$(this).parent().parent().remove();
});

}



 
</script>




<div id="unit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เลือกหน่วย</h4>
      </div>
      <div class="modal-body">
      
        <table class="table table-hover" id="tbTender" align="center">
        	<thead>
        		<tr>
        			<th>No.</th>
        			<th>หน่วย</th>
        			<th>จัดการ</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
        			$i = 1;
        			foreach ($unit as $key => $data) {
        		?>
        			<tr>
        				<td><?= $i ?></td>
        				<td><?= $data['unit_name']?></td>
        				<td>
        					<button class="unit_p btn btn-info btn-xs" data-dismiss="modal" unit_name="<?= $data['unit_name']?>" unit_code="<?= $data['unit_code']?>">เลือก</button>
        				</td>
        			</tr>

        		<?php
        		$i++;
        		}
        		?>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <input hidden="" name="" id="temp_num_id" value="0">

  </div>
</div>
<script type="text/javascript">
$('.unit_p').click(function() {
	
	var name = $(this).attr('unit_name');
	var code = $(this).attr('unit_code');
	var num_row = $("#temp_num_id").val();
	$("#unit_code_"+num_row).val(code);
	$("#unit_name_"+num_row).val(name);
});
$('#tbTender').DataTable();


$('#bom').attr('class', 'active'); 
$('#add_bom').attr('style', 'background-color:#dedbd8');
</script>


