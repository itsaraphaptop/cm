

<div class="input-group content-group">
	<div class="has-feedback has-feedback-left">
		<input type="text" class="form-control input-xlg" id="textnnn<?php echo $id; ?>" placeholder="Filter By Material Name">
		<div class="form-control-feedback">
			<i class="icon-search4 text-muted text-size-base"></i>
		</div>
	</div>
</div>

<table class="table table-xxs table-hover table-bordered datatable-basicfff" >
<thead>
<tr>
<th>Materail Code</th>
<th></th>
<th>Materail Name</th>
<th width="5%">Active</th>
</tr>
</thead>
<tbody id="matbarann<?php echo $id; ?>">
	<td colspan="3" class="text-center">Data</td>
</tbody>
</table>


<script>
	$("#textnnn<?php echo $id; ?>").keyup(function(){
		 var url="<?php echo base_url(); ?>bd_active/material_id_alone/<?php echo $id; ?>";

        var dataSet={
        	name : $("#textnnn<?php echo $id; ?>").val(),
          };
          $.post(url,dataSet,function(data){
          	$("#matbarann<?php echo $id; ?>").html(data);
          });
	});
</script>