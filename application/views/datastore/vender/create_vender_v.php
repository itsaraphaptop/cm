<div class="container-fluid" style="margin-top:10px;">
	<div class="row">
		<div class="col-xs-3">
			<div class="form-group" >
				<label for="">Vender Code</label>
				<input type="text" class="form-control input-sm" id="vcode" placeholder="Vender Code">
			</div>
		</div>
		<div class="col-xs-3">
			<div class="form-group">
				<label for="">Business Size</label>
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn btn-primary btn-sm active">
				    <input type="radio" value="0" id="q_op_1" autocomplete="off" checked> Large
				  </label>
				  <label class="btn btn-primary btn-sm">
				    <input type="radio" value="1" id="q_op_2" autocomplete="off"> Middle
				  </label>
				  <label class="btn btn-primary btn-sm">
				    <input type="radio" value="2" id="q_op_3" autocomplete="off"> Small
				  </label>
				</div>
			</div>
		</div>
		<div class="col-xs-3">
		<label for="">Business Status</label>
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-primary btn-sm active">
			    <input type="checkbox" autocomplete="off" checked> Active
			  </label>
			  <label class="btn btn-primary btn-sm">
			    <input type="checkbox" autocomplete="off"> Blacklist
			  </label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="">Business</label>
				<input type="text" class="form-control input-sm" id="vbusiness" placeholder="Business Name">
			</div>
		</div>
		<div class="col-xs-3">
			<div class="form-group">
				<label for="">TAX ID</label>
				<input type="text" class="form-control input-sm" id="vtexid" placeholder="TAX ID">
			</div>
		</div>
		<div class="col-xs-3">
		<label for="">TAX Type</label>
			<div class="form-group">
				<select class="form-control input-sm" id="vtextype">
					<option value="1">ภ.ง.ด.2</option>
					<option value="2">ภ.ง.ด.3</option>
					<option value="3">ภ.ง.ด.53</option>
					<option value="4">ภ.ง.ด.54</option>
					<option value="5">ภ.ง.ด.1</option>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="">Vender Name</label>
				<input type="text" class="form-control input-sm" id="vname" placeholder="Vender Name">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label for="">Address</label>
				<textarea class="form-control input-sm" id="vaddr" cols="50" rows="4" placeholder="Vender Address"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3">
		<div class="form-group">
			<label for="">Tel</label>
			<input type="text" class="form-control input-sm" id="vtel" placeholder="Telephone">
		</div>
		</div>
		<div class="col-xs-3">
		<div class="form-group">
			<label for="">FAX</label>
			<input type="text" class="form-control input-sm" id="vfax" placeholder="FAX">
		</div>
		</div>
		<div class="col-xs-3">
		<div class="form-group">
			<label for="">Credit Term</label>
			<input type="text" class="form-control input-sm" id="vcr" placeholder="Credit Term">
		</div>
		</div>
		<div class="col-xs-3">
		<div class="form-group">
			<label for="">Sale Contact</label>
			<input type="text" class="form-control input-sm" id="vsale" placeholder="Sale Contact">
		</div>
		</div>
	</div>
	<legend class="text-muted"> Account </legend>
	<div class="row">
		<div class="col-md-4">
			<label>Account No.</label>
			<div class="input-group">
			<span class="input-group-btn">
				<button class="btn btn-default btn-icon" type="button"><i class="icon-user"></i></button>
			</span>
			<input type="text" class="form-control" placeholder="" readonly  name="eaccno" id="eaccno<?php echo $val->csubgroup_id;?>" value="<?php echo $val->accno; ?>">

			<div class="input-group-btn">
			<button type="button" class="eaccopen<?php echo $val->csubgroup_id;?> btn btn-default btn-icon" data-toggle="modal" data-target="#eaccopen<?php echo $val->csubgroup_id;?>"><i class="icon-search4"></i></button>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<label for="">Account Name</label>
		<div class="form-group">
			<input type="text" class="form-control" readonly name="eaccountname" id="eaccountname<?php echo $val->csubgroup_id;?>" value="<?php echo $val->accname; ?>">
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<button class="save btn btn-primary btn-sm"><span class="glyphicon glyphicon-save"></span> Save</button>
				<button class="btn btn-info btn-sm" disabled><span class="glyphicon glyphicon-edit"></span> Edit</button>
				<button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
			</div>
		</div>
	</div>
</div>

<script>

	$('.save').click(function(event) {
		 var url="<?php echo base_url(); ?>index.php/datastore_active/addvender";
			  var dataSet={
			      	vcode: $('#vcode').val(),
					vbusiness: $('#vbusiness').val(),
					vtexid: $('#vtexid').val(),
					vtextype: $('#vtextype').val(),
					vname: $('#vname').val(),
					vaddr: $('#vaddr').val(),
					vtel: $('#vtel').val(),
					vfax: $('#vfax').val(),
					vcr: $('#vcr').val(),
					vsale: $('#vsale').val()
			    };
			  $.post(url,dataSet,function(data){
			  	 $('#loadbox').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        		$('#loadbox').load('<?php echo base_url();?>index.php/datastore/newvender');
			  });
	});

</script>
