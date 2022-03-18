
<table class="table table-bordered table-xxs datatable-scroll-y datatable-fixed-complex">
			<thead>
				<tr>
					<th><?php echo $st ?></th>
					<th>Problems No.</th>
					<th>Status</th>
					<th>Name</th>
					<th>Start Date</th>
					<th>Complete Date</th>
					<th>Module</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			
				<?php $n=1; foreach($obj as $v){
						if ($v->compcode!=$compcode) {?>
							
						<?php }else{ ?>

			<?php switch ($st) {
				case '1': ?>
				<?php if ($v->req_status!=1){ ?>
					
				<?php }else{?>
				<tr>
					<td>
						<ul class="icons-list">
							<li><a data-toggle="modal" data-target="#edit<?php echo $v->id_req;?>" id="editreq<?php echo $v->id_req;?>"><i class="fa fa-edit"></i></a></li>
							<li><a id="del<?php echo $v->id_req;?>"><i class="fa fa-trash-o"></i></a></li>
						</ul>
					</td>
					<td><?php echo $v->probno; ?></td>
					<td><label class="label label-warning">in process</label></td>
					<td><?php echo $v->req_name;?></td>
					<td><?php echo date('d/m/Y',strtotime(str_replace('-','/',$v->req_startdate))); ?></td>
					<td></td>
					<td><?php echo $v->req_modu;?></td>
					<td><?php echo $v->req_type;?></td>
					<td></td>
					
				</tr>
				<?php } ?>
				<?php break ;
					case '2':
				;?>
				<?php if ($v->req_status!=2){ ?>
					
				<?php }else{?>
				<tr>
					<td>
						<ul class="icons-list">
							<li><a data-toggle="modal" data-target="#edit<?php echo $v->id_req;?>" id="diseditreq<?php echo $v->id_req;?>"><i class="fa fa-folder-open-o"></i></a></li>
							<!-- <li><a id="del<?php echo $v->id_req;?>"><i class="fa fa-trash-o"></i></a></li> -->
						</ul>
					</td>
					<td><?php echo $v->probno; ?></td>
					<td><label class="label label-info">complete</label></td>
					<td><?php echo $v->req_name;?></td>
					<td><?php echo date('d/m/Y',strtotime(str_replace('-','/',$v->req_startdate))); ?></td>
					<td></td>
					<td><?php echo $v->req_modu;?></td>
					<td><?php echo $v->req_type;?></td>
					<td><button type="button" class="label label-success"> approve</button></td>
				</tr>
				<?php } ?>
				<?php break ;?>
				<?php  
					case '3':
				;?>
				<?php if ($v->req_status!=3){ ?>
					
				<?php }else{?>
				<tr>
					<td>
						<ul class="icons-list">
							<li><a data-toggle="modal" data-target="#edit<?php echo $v->id_req;?>" id="editreq<?php echo $v->id_req;?>"><i class="fa fa-edit"></i></a></li>
							<!-- <li><a id="del<?php echo $v->id_req;?>"><i class="fa fa-trash-o"></i></a></li> -->
						</ul>
					</td>
					<td><?php echo $v->probno; ?></td>
					<td><label class="label label-success">approve</label></td>
					<td><?php echo $v->req_name;?></td>
					<td><?php echo date('d/m/Y',strtotime(str_replace('-','/',$v->req_startdate))); ?></td>
					<td></td>
					<td><?php echo $v->req_modu;?></td>
					<td><?php echo $v->req_type;?></td>
					
				</tr>
				<?php } ?>
				<?php break; ?>
				<?php  
					case '4':
				;?>
				<?php if ($v->req_status!=4){ ?>
					
				<?php }else{?>
				<tr>
					<td>
						<ul class="icons-list">
							<li><a data-toggle="modal" data-target="#edit<?php echo $v->id_req;?>" id="editreq<?php echo $v->id_req;?>"><i class="fa fa-edit"></i></a></li>
							<!-- <li><a id="del<?php echo $v->id_req;?>"><i class="fa fa-trash-o"></i></a></li> -->
						</ul>
					</td>
					<td><?php echo $v->probno; ?></td>
					<td><label class="label label-danger">Cancel</label></td>
					<td><?php echo $v->req_name;?></td>
					<td><?php echo date('d/m/Y',strtotime(str_replace('-','/',$v->req_startdate))); ?></td>
					<td></td>
					<td><?php echo $v->req_modu;?></td>
					<td><?php echo $v->req_type;?></td>
					
				</tr>
				<?php } ?>
				<?php break; ?>
			<?php } ?>			
				
<?php if ($v->req_status!=1){ ?>
	<div id="edit<?php echo $v->id_req;?>" class="modal fade" >
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				
				<!-- <form id="probpost" method="post" action="http://cmservice.kudosinnovation.com/base_active/edit">					 -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Edit Req</h5>
					<a href="" class="label border-left-info label-striped "><i class="icon-file-plus"></i> New</a> &nbsp;
					<!-- <button type="button" id="save<?php echo $v->id_req; ?>" disabled class="label border-left-success label-striped"><i class="icon-floppy-disk"></i> Save</button> &nbsp; -->
					<a href="" class="label border-left-slate-800 label-striped "><i class="fa fa-close"></i> Close</a> &nbsp;
				</div>
					
					<legend class="text-semibold"></legend>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<div class="row">
							<div class="col-xs-6">
									<div class="form-group">
										<label for="">Problems No.</label>
										<input type="hidden" id="compcode<?php echo $v->id_req;?>" value="<?php echo $v->compcode; ?>">
										<input type="hidden" id="username<?php echo $v->id_req;?>" value="<?php echo $username; ?>">
										<input type="hidden" id="flag<?php echo $v->id_req;?>" id="flag" value="u">
										<input class="form-control input-sm" id="probno<?php echo $v->id_req;?>" type="text" name="probno" value="<?php echo $v->probno; ?>" readonly>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="">Company</label>
										<select name="prob_comp" id="prob_comp<?php echo $v->id_req;?>" class="form-control input-sm" disabled>
											<?php foreach($compname as $vv){?>
												<option value="<?php echo $vv->compcode;?>"><?php echo $vv->company_name;?></option>
											<?php }?>
										</select>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="">Name</label>
										<input class="form-control input-sm" id="name<?php echo $v->id_req;?>" type="text" name="name" value="<?php echo $v->req_name; ?>" readonly>
									</div>
								</div>
								<div class="col-xs-6">
									<label class="">Department </label>
										<div class="form-group">
										<input type="text" class="form-control input-sm" readonly="readonly" placeholder="Department" value="" name="depname" id="depname<?php echo $v->id_req;?>">
										<!-- <input type="hidden" readonly="true" value="" class="form-control input-xs" name="depid" id="depid"> -->
										<!-- <div class="input-group-btn">
											<button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon btn-xs"><i class="fa fa-search"></i></button>
										</div> -->
									</div>
								</div>
							</div>
							
							<div class="row">
							<div class="col-xs-6">
									<div class="form-group">
										<label for="">Problems Type</label>
										<select name="prob_type" id="prob_type<?php echo $v->id_req;?>" class="form-control input-sm" disabled>
											<!-- <option class="text-center" value=""></option> -->
											
										</select>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="">Module</label>
										<select name="prob_mo" id="prob_mo<?php echo $v->id_req;?>" class="form-control input-sm" disabled>
											<!-- <option class="text-center" value="<?php echo $v->req_modu; ?>"></option> -->
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
											<input type="date" id="probdate<?php echo $v->id_req;?>" value="<?php echo $v->req_startdate; ?>" class="form-control input-sm daterange-single" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-xs-6">
								<label class="">Project </label>
									<div class="form-group">
											<input type="text" class="form-control input-sm" readonly="readonly" value="<?php echo $v->req_project; ?>" name="projectname" id="projectname<?php echo $v->id_req;?>">
											<!-- <input type="hidden" readonly="true" value="" class="pproject1 form-control" name="projectid" id="putprojectid"> -->
										<!-- <div class="input-group-btn">
											<button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="">Problems Description</label>
								<textarea id="disc<?php echo $v->id_req;?>" name="disc" class="summernote"><?php echo $v->req_description; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<?php }else{?>
	<div id="edit<?php echo $v->id_req;?>" class="modal fade" >
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				
				<!-- <form id="probpost" method="post" action="http://cmservice.kudosinnovation.com/base_active/edit">					 -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Edit Req</h5>
					<a href="" class="label border-left-info label-striped "><i class="icon-file-plus"></i> New</a> &nbsp;
					<button type="button" id="save<?php echo $v->id_req; ?>" class="label border-left-success label-striped"><i class="icon-floppy-disk"></i> Save</button> &nbsp;
					<a href="" class="label border-left-slate-800 label-striped "><i class="fa fa-close"></i> Close</a> &nbsp;
				</div>
					
					<legend class="text-semibold"></legend>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6">
							<div class="row">
							<div class="col-xs-6">
									<div class="form-group">
										<label for="">Problems No.</label>
										<input type="hidden" id="compcode<?php echo $v->id_req;?>" value="<?php echo $v->compcode; ?>">
										<input type="hidden" id="username<?php echo $v->id_req;?>" value="<?php echo $username; ?>">
										<input type="hidden" id="flag<?php echo $v->id_req;?>" id="flag" value="u">
										<input class="form-control input-sm" id="probno<?php echo $v->id_req;?>" type="text" name="probno" value="<?php echo $v->probno; ?>"	 readonly>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="">Company</label>
										<select name="prob_comp" id="prob_comp<?php echo $v->id_req;?>" class="form-control input-sm">
											<?php foreach($compname as $vv){?>
												<option value="<?php echo $vv->compcode;?>"><?php echo $vv->company_name;?></option>
											<?php }?>
										</select>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="">Name</label>
										<input class="form-control input-sm" id="name<?php echo $v->id_req;?>" type="text" name="name" value="<?php echo $v->req_name; ?>" readonly>
									</div>
								</div>
								<div class="col-xs-6">
									<label class="">Department </label>
										<div class="form-group">
										<input type="text" class="form-control input-sm" readonly="readonly" placeholder="Department" value="" name="depname" id="depname<?php echo $v->id_req;?>">
										<!-- <input type="hidden" readonly="true" value="" class="form-control input-xs" name="depid" id="depid"> -->
										<!-- <div class="input-group-btn">
											<button type="button" data-toggle="modal" data-target="#opendepart" class="opendepart btn btn-default btn-icon btn-xs"><i class="fa fa-search"></i></button>
										</div> -->
									</div>
								</div>
							</div>
							
							<div class="row">
							<div class="col-xs-6">
									<div class="form-group">
										<label for="">Problems Type</label>
										<select name="prob_type" id="prob_type<?php echo $v->id_req;?>" class="form-control input-sm">
											<!-- <option class="text-center" value=""></option> -->
											
										</select>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="">Module</label>
										<select name="prob_mo" id="prob_mo<?php echo $v->id_req;?>" class="form-control input-sm">
											<!-- <option class="text-center" value="<?php echo $v->req_modu; ?>"></option> -->
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
											<input type="date" id="probdate<?php echo $v->id_req;?>" value="<?php echo $v->req_startdate; ?>" class="form-control input-sm daterange-single">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-xs-6">
								<label class="">Project </label>
									<div class="form-group">
											<input type="text" class="form-control input-sm" readonly="readonly" value="<?php echo $v->req_project; ?>" name="projectname" id="projectname<?php echo $v->id_req;?>">
											<!-- <input type="hidden" readonly="true" value="" class="pproject1 form-control" name="projectid" id="putprojectid"> -->
										<!-- <div class="input-group-btn">
											<button type="button" data-toggle="modal" data-target="#openproj"  class="openproj btn btn-default btn-icon"><i class="icon-search4"></i></button>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="">Problems Description</label>
								<textarea id="disc<?php echo $v->id_req;?>" name="disc" class="summernote"><?php echo $v->req_description; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<?php } ?>


<script>
	// $(document).ready(function(){
		$('.summernote').summernote();
	$.getJSON("http://cmservice.kudosinnovation.com/json", function(json){
            $('#prob_type').empty();
            
            $.each(json, function(i, obj){
                    $('#prob_type<?php echo $v->id_req;?>').append($('<option>').text(obj.t_name).attr('value', obj.t_name));
            });
    });
    $.getJSON("http://cmservice.kudosinnovation.com/json/module", function(json){
            $('#prob_mo').empty();
            
            $.each(json, function(i, obj){
                    $('#prob_mo<?php echo $v->id_req;?>').append($('<option>').text(obj.modname).attr('value', obj.modcode));
            });
    });
// });
$("#save<?php echo $v->id_req; ?>").click(function(e){
		var url="http://cmservice.kudosinnovation.com/base_active/edit";
        var dataSet={
            probcode: $('#probno<?php echo $v->id_req;?>').val(),
            compcode: $('#compcode<?php echo $v->id_req;?>').val(),
			username: $('#username<?php echo $v->id_req;?>').val(),
			comp: $("#prob_comp<?php echo $v->id_req;?>").val(),
			name: $("#name<?php echo $v->id_req;?>").val(),
			dep: $("#depname<?php echo $v->id_req;?>").val(),
			type: $("#prob_type<?php echo $v->id_req;?>").val(),
			modu: $("#prob_mo<?php echo $v->id_req;?>").val(),
			date: $("#probdate<?php echo $v->id_req;?>").val(),
			proj: $("#projectname<?php echo $v->id_req;?>").val(),
			desc: $("#disc<?php echo $v->id_req;?>").val(),
            };
        $.post(url,dataSet,function(data){
                setTimeout(function() {
					window.location.href = "<?php echo base_url(); ?>problems";
					}, 500);
        });	
});
$("#del<?php echo $v->id_req; ?>").click(function(e){
		var url="http://cmservice.kudosinnovation.com/base_active/del";
        var dataSet={
            idreq: "<?php echo $v->id_req;?>"
            };
        $.post(url,dataSet,function(data){
                setTimeout(function() {
					window.location.href = "<?php echo base_url(); ?>problems";
					}, 500);
        });	
});
$("#diseditreq<?php echo $v->id_req;?>").click(function(){
	$('#disc<?php echo $v->id_req;?>').summernote('disable');
});
</script>

				<?php $n++; } }?> <!-- end loop foreach -->
				
			</tbody>
		</table>





		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_basic.js"></script>

