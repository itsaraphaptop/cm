<div class="input-group content-group">
<div class="form-group">
		<label class="radio-inline">
			<input type="radio" name="radio-inline-left" id="matrd1<?= $rows;?>" class="styled" >
			Material Group
		</label>

		<label class="radio-inline">
			<input type="radio" name="radio-inline-left" id="matrd2<?= $rows;?>" class="styled" checked>
			Material Name
		</label>
	</div>
	
	
	<div class="has-feedback has-feedback-left">
		<input type="text" class="form-control input-xlg" id="textnn<?= $rows;?>" placeholder="Filter By Material Name">
		<div class="form-control-feedback">
			<i class="icon-search4 text-muted text-size-base"></i>
		</div>
	</div>
</div>

<div class="form-group">
		<button class="label label-danger">Material ยกมาไม่สามารถเลือกได้</button>	
	</div>
<table class="table table-xxs table-bordered datatable-basicfff" >
<thead>
<tr>
<th>Material Code</th>
<th>Stock</th>
<th>Material Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody id="matbaran<?= $rows;?>">
	<td colspan="4" class="text-center">Data</td>
</tbody>
</table>


<script>
	$("#textnn<?= $rows;?>").keyup(function(){
		if ($("#matrd1<?= $rows;?>").is(":checked")) {
			var url="<?php echo base_url(); ?>share/material_id_alone_group";

		        var dataSet={
		        	name : $("#textnn<?= $rows;?>").val(),
		          };
		          $.post(url,dataSet,function(data){
		          	$("#matbaran<?= $rows;?>").html(data);
		          });
		}else if($("#matrd2<?= $rows;?>").is(":checked")){
			 	var url="<?php echo base_url(); ?>share/material_id_alone/<?= $rows;?>";

		        var dataSet={
		        	name : $("#textnn<?= $rows;?>").val(),
		          };
		          $.post(url,dataSet,function(data){
		          	$("#matbaran<?= $rows;?>").html(data);
		          });
		}else{
			alert("7777");
		}
		
	});


</script>