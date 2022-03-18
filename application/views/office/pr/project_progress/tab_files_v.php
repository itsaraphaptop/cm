<style type="text/css">

</style>
<div class="panel-body">
	<div class="tabbable">
		<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
			<li class="active"><a href="#bordered-justified-tab1" data-toggle="tab">ไฟล์ที่มีอยู่</a></li>
			<li><a href="#bordered-justified-tab2" data-toggle="tab">upload</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane has-padding active" id="bordered-justified-tab1">
		
				<div class="row">
					<?php foreach ($rows as $key => $value) {?>
					<!-- <div class="box col-md-3 col-lg-2"> -->
						<div class="col-md-3 col-lg-3">
							<embed width="200" height="150" class="" src="<?=base_url();?>uploads_file/<?=$value->name;?>"></embed>
							<div class="row">
								<a href="<?=base_url();?>Project_progress/download_file/<?=$value->id;?>" target="_blank" class="btn btn-success" attr_id="<?=$value->id;?>" onclick="down_load($(this))">Download</a>
							</div>
						</div>
					<?php } ?>
				</div>
				
				
			</div>

			<div class="tab-pane has-padding" id="bordered-justified-tab2">
					<form id="form" method="POST" enctype="multipart/formdata">
						<div class="row form-group">
							<div class="col-lg-5 col-md-5">
								<div class="input-group">
									<input type="file" name="file[]" class="form-control files" multiple="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
									<span class="input-group-btn">
										<button class="btn btn-danger" onclick="remove($(this))" type="button">x</button>
									</span>
									<input type="hidden" name="project_code" id="project_code">
								</div>
							</div>
						</div>
					</form>

				<div class="row">
					<div class="col-md-12 col-lg-12 form-group">
						
						<button class="btn btn-success" onclick="add()">addrow</button>
						<button class="btn btn-info" onclick="aaa()">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function down_load(el) {
	// alert(55555)
	var id = el.attr('attr_id');
	// alert(id)
	$.post('<?=base_url();?>project_progress/download_file/'+id, function() {
		/*optional stuff to do after success */
	}).done(function(data){
		console.log(data);
	});
}
$("#project_code").val(project_id);
function aaa(){
	$("form#form").submit();
}
$("form#form").submit(function(){

    var formData = new FormData(this);

    $.ajax({
        url: '<?=base_url();?>project_progress/save_files',
        // url: window.location.pathname,
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
        	try{
        		var json_res = jQuery.parseJSON(data);
        		if (json_res.status === true) {
        			show_nonti('success', json_res.message, 'success');
        		}else{
        			show_nonti('error', json_res.message, 'danger');
        		}
        	}catch(e){
        		show_nonti('error', e, 'danger');
        	}
            // console.log(data);
            // show_nonti()
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});
	function remove(el) {
		el.parent().parent().parent().parent().remove();
	}

	function add() {
		var tem =	'<div class="row form-group">'+
						'<div class="col-lg-5 col-md-5">'+
							'<div class="input-group">'+
								'<input type="file" name="file[]" class="form-control file" multiple="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">'+
								'<span class="input-group-btn">'+
									'<button class="btn btn-danger" onclick="remove($(this))" type="button">x</button>'+
								'</span>'+
							'</div>'+
						'</div>'+
					'</div>';
		$('#form').append(tem);
	}
</script>