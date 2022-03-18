<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<label>Price :</label>
			<input type="text" class="form-control" name="price" id="less_price">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">

		<div class="form-group">
			<label>Less Other :</label>
			<div class="input-group">
				<input type="hidden" class="form-control" name="less_other_id" id="less_id" readonly="readonly">
				<input type="text" class="form-control" name="less_other_name" id="less_name" readonly="readonly">
				<div class="input-group-btn">
					<a type="button" class="btn btn-info btn-icon" data-toggle="modal" data-target="#less_other_type"><i class="icon-search4"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<a class="btn btn-success btn-xs pull-right" id="save" data-dismiss="modal">บันทึก</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#save').click(function(event) {
		var less_price = $('#less_price').val();
		var less_other_id = $('#less_id').val();
		var less_other_name = $('#less_name').val();
		$('#less_other_price').val(less_price);
		$('#less_other_id').val(less_other_id);
		$('#less_other_name_ot').val(less_other_name);
		
	});
</script>
