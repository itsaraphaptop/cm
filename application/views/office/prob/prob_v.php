
<div class="content">
	<div class="panel panel-flat border-top-info border-bottom-info">
		<div class="panel-heading">
			<h6 class="panel-title"> New Problems Report  <i class="fa fa-comment-o"></i></h6>
		</div>
		<div class="panel-body">
		<form id="probpost" method="post" action="http://cmservice.kudosinnovation.com/base_active/ins_prob">
			
			<a href="" class="label border-left-info label-striped "><i class="icon-file-plus"></i> New</a> &nbsp;
			<button type="button" id="save" class="label border-left-success label-striped"><i class="icon-floppy-disk"></i> Save</button> &nbsp;
			<a href="" class="label border-left-slate-800 label-striped "><i class="fa fa-close"></i> Close</a> &nbsp;
			<legend class="text-semibold"></legend>
			<div class="col-xs-6">
				<div class="row">
				<div class="col-xs-6">
						<div class="form-group">
							<label for="">Problems No.</label>
							<input type="hidden" name="compcode" value="<?php echo $compcode; ?>">
							<input type="hidden" name="username" value="<?php echo $username; ?>">
							<input type="hidden" name="flag" id="flag" value="">
							<input class="form-control input-sm" id="probno" type="text" name="probno" readonly>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="">Company</label>
							<select name="prob_comp" id="prob_comp" class="form-control input-sm">
								
								<?php foreach($compname as $v){?>
									<option value="<?php echo $v->compcode;?>"><?php echo $v->company_name;?></option>
								<?php }?>
							</select>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="">Name</label>
							<input class="form-control input-sm" id="name" type="text" name="name" value="<?php echo $name; ?>" readonly>
						</div>
					</div>
					<div class="col-xs-6">
						<label class="">Department </label>
							<div class="form-group">
							<input type="text" class="form-control input-sm" readonly="readonly" placeholder="Department" value="<?php echo $dep; ?>" name="depname" id="depname">
						
						</div>
					</div>
				</div>
				
				<div class="row">
				<div class="col-xs-6">
						<div class="form-group">
							<label for="">Problems Type</label>
							<select name="prob_type" id="prob_type" class="form-control input-sm">
								<option class="text-center" value=""></option>
								
							</select>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="">Module</label>
							<select name="prob_mo" id="prob_mo" class="form-control input-sm">
								<option class="text-center" name="prob_mo" value=""></option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="row">
					
					<div class="col-xs-6">
						<div class="form-group">
							<label for="">Problems Date</label>
							<div class="input-group">
								<span class="input-group-addon input-sm"><i class="icon-calendar3"></i></span>
								<input type="text" name="probdate" class="form-control input-sm daterange-single">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-xs-6">
					<label class="">Project </label>
						<div class="form-group">
								<input type="text" class="form-control input-sm" readonly="readonly" value="<?php echo $project; ?>" name="projectname" id="projectname">
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					<label for="">Problems Description</label>
					<textarea id="disc" name="disc" class="summernote"></textarea>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
<script>
// $(document).ready(function(){
	$("#flag").val('n');
	$('.summernote').summernote({
		height: 300,
	});
	$.getJSON("http://cmservice.kudosinnovation.com/json", function(json){
            $('#prob_type').empty();
            $.each(json, function(i, obj){
                    $('#prob_type').append($('<option>').text(obj.t_name).attr('value', obj.t_name));
            });
    });
    $.getJSON("http://cmservice.kudosinnovation.com/json/module", function(json){
            $('#prob_mo').empty();
            
            $.each(json, function(i, obj){
                    $('#prob_mo').append($('<option>').text(obj.modname).attr('value', obj.modcode));
            });
    });
// });
$("#save").click(function(e){
	var frm = $('#probpost');
		frm.submit(function (ev) {
			$.ajax({
				type: frm.attr('method'),
				url: frm.attr('action'),
				data: frm.serialize(),
				success: function (data) {
					$("#probno").val(data);
					$("#flag").val('u');
				}
			});
		ev.preventDefault();
	});
$("#probpost").submit();
});
</script>