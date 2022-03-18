
<div class="input-group content-group">
<div class="form-group">
		<label class="radio-inline">
			<input type="radio" name="radio-inline-left" id="matrd1" class="styled" >
			Material Group 
		</label>

		<label class="radio-inline">
			<input type="radio" name="radio-inline-left" id="matrd2" class="styled" checked>
			Material Name
		</label>
	</div>
	<div class="has-feedback has-feedback-left">
		<input type="text" id="textnn<?php echo $idd; ?>" placeholder="Filter By Material Name" name="" class="form-control">
		<div class="form-control-feedback">
			<i class="icon-search4 text-muted text-size-base"></i>
		</div>
	</div>
</div>
<table class="table table-xxs table-hover datatable-basicfff" >
<thead>
<tr>
<th>Material Code</th>
<th>Stock</th>
<th>Material Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody id="matbaran<?php echo $idd; ?>">
</tbody>
</table>
</div>

<script>
	$("#textnn<?php echo $idd; ?>").keyup(function(){
	


          if ($("#matrd1").is(":checked")) {
			var url="<?php echo base_url(); ?>share/material_id_ss_group/<?php echo $idd; ?>";

		        var dataSet={
		        	name : $("#textnn<?php echo $idd; ?>").val(),
		          };
		          $.post(url,dataSet,function(data){
		          	$("#matbaran<?php echo $idd; ?>").html(data);
		          });
		}else if($("#matrd2").is(":checked")){
			 	var url="<?php echo base_url(); ?>share/material_id_ss/<?php echo $idd; ?>";

		        var dataSet={
		        	name : $("#textnn<?php echo $idd; ?>").val(),
		          };
		          $.post(url,dataSet,function(data){
		          	$("#matbaran<?php echo $idd; ?>").html(data);
		          });
		}else{
			alert("7777");
		}
	});
</script>