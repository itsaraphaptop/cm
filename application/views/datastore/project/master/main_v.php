<!-- Main navbar -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
								<div class="row">
									<div class="col-lg-3">

										<!-- Members online -->
										<div class="panel bg-teal-400">
											<div class="panel-body">

												<h3 class="no-margin"><?php echo "Project open ".number_format($sum[0]->countpro);?> project</h3>
												มูลค่า
												<h3 class="no-margin"><?php echo number_format($sum[0]->sumpro , 2 )." ฿"; ?></h3>
											</div>
										</div>
										<!-- /members online -->

									</div>
									<div class="col-lg-3">

										<!-- Members online -->
										<div class="panel bg-danger">
											<div class="panel-body">

												<h3 class="no-margin"><?php echo "Project close ".$sumclose[0]->countpro;?> project</h3>
												มูลค่า
												<h3 class="no-margin"><?php echo number_format($sumclose[0]->sumpro , 2 )." ฿"; ?></h3>
											</div>
										</div>
										<!-- /members online -->

									</div>
								</div>
							<h5 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Project</h5>
				            <div class="heading-elements">
					            <a href="<?php echo base_url(); ?>data_master" class="btn btn-default"><i class="icon-close2"></i> Close</a>
					            <a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=project.mrt" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
					            <a type="button" href="<?php echo base_url(); ?>data_master/new_project" class="preload btn btn-info"><i class="icon-plus-circle2"></i> New</a>
				             </div>
					</div>	

					<div class="panel-body">
						<div class="tabbable">
							<ul class="nav nav-tabs nav-tabs-bottom">
								<li class="active"><a href="#bottom-tab1" data-toggle="tab">Project Open</a></li>
								<li><a href="#bottom-tab2" data-toggle="tab">Project Close</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane active" id="bottom-tab1">
									<table class="table table-striped table-xxs table-hover datatable-basic">
							<thead>
								<tr>
									<th width="17%">Project Code</th>
									<th width="50%" class="text-center">Project Name</th>									
									<th class="text-center" width="10%">Control BOQ</th>
									<th class="text-center" width="10%">Control Budget</th>									
									<th>Add Sub Project</th>
									<th>Set Approve</th>
									<!-- <th>Picture</th> -->
									<!-- <th>Close</th> -->
									<th>Active</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($proj as $val) { if($val->project_substatus!="Y"){?>
								<tr>
									<td><?php echo $val->project_code;?></td>
									<td><?php echo $val->project_name;?></td>									
									<td class="text-center"><?php  if($val->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
									<td class="text-center"><?php  if($val->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>								
									<td class="text-center">
										<a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $val->project_code;?>">Sub Project</a>
									</td>
									<td><a href="<?php echo base_url(); ?>data_master/approve_prpo/<?php echo $val->project_code;?>/<?php echo $val->bd_tenid;?>" class="label label-success">Setup Approve</a></td>
									<!-- <td><a class="label label-warning" data-toggle="modal" data-target="#picture<?php echo $val->project_code;?>"><i class="icon-image4"></i> Picture</a></td>
									 <td> -->
										<!-- <a class="close_project label label-danger" project_id="<?php echo $val->project_id; ?>"><i class="icon-close2"></i> Close</a> -->
										<!-- <a href="<?php echo base_url(); ?>datastore/close_project/<?php echo $val->project_id; ?>" class="label label-success"><i class="icon-close2"></i> Close</a> -->
									<!-- </td> -->
									<td>
										<a href="<?php echo base_url(); ?>data_master/editproject/<?php echo $val->project_id; ?>" ><i class="icon-pencil7"></i></a>
										<!-- <a href="#" onclick="delete_project($(this))" target_delete="<?php echo base_url(); ?>datastore/delete_project/<?php echo $val->project_id; ?>"   class="delete"><i class="icon-trash"></i></a> --></td>
									</tr>
									<?php $i++;   }} ?>
								</tbody>
							</table>
								</div>

								<div class="tab-pane" id="bottom-tab2">
						<table class="table table-striped table-xxs table-hover datatable-basic">
							<thead>
								<tr>
									<th width="17%">Project Code</th>
									<th width="50%" class="text-center">Project Name</th>									
									<th class="text-center" width="10%">Control BOQ</th>
									<th class="text-center" width="10%">Control Budget</th>									
									<th>Add Sub Project</th>
									<th>Set Approve</th>
									<!-- <th>Picture</th>
									<th>Close</th> -->
									<th>Active</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($projclose as $val) { if($val->project_substatus!="Y"){?>
								<tr>
									<td><?php echo $val->project_code;?></td>
									<td><?php echo $val->project_name;?></td>									
									<td class="text-center"><?php  if($val->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
									<td class="text-center"><?php  if($val->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>								
									<td class="text-center">
										<a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $val->project_code;?>">Sub Project</a>
									</td>
									<td><a href="<?php echo base_url(); ?>data_master/approve_prpo/<?php echo $val->project_code;?>/<?php echo $val->bd_tenid;?>" class="label label-success">Setup Approve</a></td>
									<!-- <td><a class="label label-warning" data-toggle="modal" data-target="#picture<?php echo $val->project_code;?>"><i class="icon-image4"></i> Picture</a></td>
									><td>
										<a class="close_project label label-danger" project_id="<?php echo $val->project_id; ?>"><i class="icon-close2"></i> Close</a> -->
										<!-- <a href="<?php echo base_url(); ?>datastore/close_project/<?php echo $val->project_id; ?>" class="label label-success"><i class="icon-close2"></i> Close</a> -->
									<!-- </td> -->
									<td>
										<a href="<?php echo base_url(); ?>data_master/viewproject/<?php echo $val->project_id; ?>" ><i class="icon-folder-open"></i></a>
										<!-- <a href="#" onclick="delete_project($(this))" target_delete="<?php echo base_url(); ?>datastore/delete_project/<?php echo $val->project_id; ?>"   class="delete"><i class="icon-trash"></i></a> --></td>
									</tr>
									<?php $i++;   }} ?>
								</tbody>
							</table>
									
 								</div>
 								<!-- close tab2 -->
							</div>
						</div>
						
	            <div class="text-right">
	            	<br>
              </div>
					</div>													
				</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->
</div>
				<!-- Core JS files -->
				<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script> -->
				<!-- /core JS files -->

				<!-- Theme JS files -->
				<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/wizards/stepy.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/validation/validate.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script> -->

				<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/uploaders/fileinput.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/wizard_stepy.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script> -->
				<!-- /theme JS files -->


<?php $i=1; foreach ($proj as $val) {?>
				<!-- Basic modal -->
<div id="picture<?php echo $val->project_code;?>" class="modal fade" data-backdrop="false">
 	<div class="modal-dialog">
	 	<div class="modal-content">
		 	<div class="modal-header bg-primary">
			 <button type="button" class="close" data-dismiss="modal">&times;</button>
			 <h5 class="modal-title"><?php echo $val->project_name;?></h5>
		 	</div>
		 	<div class="modal-body">
				<div class="form-group">
	 				<form action="<?php echo base_url(); ?>upload/projectprofile/<?php echo $val->project_code; ?>" method="post" enctype="multipart/form-data">
					 	<div class="col-lg-12">
						 <label class="control-label text-semibold">Project Preview:</label>
						 <input type="file" name="userfile" class="file-input-top-custom">
						 <!-- <span class="help-block">Display preview on load with preset files/images and captions with <code>width="372px;" height="278px;</code> .</span> -->
					 	</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">							 	
				<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
			</div>
		</div>
	</div>
</div>
				 <!-- /basic modal -->
<div id="sub<?php echo $val->project_code;?>" class="modal fade" data-backdrop="false">
					 <div class="modal-dialog">
						 <div class="modal-content">
							 <div class="modal-header bg-primary">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
								 <h5 class="modal-title">Sub Project : <?php echo $val->project_name;?></h5>
							 </div>

							 <div class="modal-body">
								 <div class="col-md-12" >
                        <table class="table table-bordered table-xxs table-hover">
                          <thead> 
                            <tr>
                              <td class="text-center">No.</td>
                              <td class="text-center">Project Code</td>
                              <td class="text-center">Project Name</td>
                              <td class="text-center">Set Approve</td>
                              <td class="text-center">Action</td>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $this->db->select('*');
                            $this->db->where('project_sub',$val->project_id);
                            $this->db->where('project_substatus',"Y");
                            $sub = $this->db->get('project')->result();
                            ?>
                            <?php $k=1; foreach ($sub as $keysub) { ?>
                               <tr>
                                 <td class="text-center"><?php echo $k; ?></td>
                                 <td class="text-center"><?php echo $keysub->project_code; ?></td>
                                 <td class="text-center"><?php echo $keysub->project_name; ?></td>
                                 <td class="text-center"><a href="<?php echo base_url(); ?>data_master/approve_prpo/<?php echo $keysub->project_code;?>" class="label label-success">Setup Approve</a></td>
                                 <td class="text-center">
                                 	<a href="<?php echo base_url(); ?>index.php/data_master/editproject/<?php echo $keysub->project_id; ?>"><i class="icon-pencil7"></i></a>
                                 	<a href="#" class="del" sub_id="<?=$keysub->project_id; ?>"><i class="icon-trash"></i></a>
                                 </td>
                               </tr>
                               <?php $k++; } ?>
                               </tbody>


                        </table>
<br>
						<script type="text/javascript">
							$(".del").click(function(event) {
								var sub_id = $(this).attr('sub_id');
								var el = $(this);
								$.post('<?php echo base_url(); ?>data_master/del_sub_project/'+sub_id, function() {
								}).done(function(data){
									var json_res = jQuery.parseJSON(data);
									if (json_res.status == true) {
										swal('Delete!', json_res.message ,'success');
										el.parent().parent().remove();
									}else{
										swal('error!', json_res.message ,'error');
									}
								});
							});
						</script>
                      </div>
							 </div>

							 <div class="modal-footer">
							 <a  href="<?php echo base_url(); ?>index.php/data_master/project_sub/<?php echo $val->project_id; ?>" type="submit" class="btn btn-info"><i class="icon-plus-circle2"></i> ADD Sub Project</a>
								 <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-close2"></i> Close</button>

							 </div>
						 </div>
					 </div>
				 </div>

				 <script>
		 		$(".file-input-top-custom").fileinput({
		 			browseLabel: 'Browse',
		 			browseClass: 'btn btn-default',
		 			removeClass: 'btn btn-default',
		 			uploadClass: 'btn bg-success-400',
		 			browseIcon: '<i class="icon-file-plus"></i>',
		 			uploadIcon: '<i class="icon-file-upload2"></i>',
		 			removeIcon: '<i class="icon-cross3"></i>',
		 				layoutTemplates: {
		 						icon: '<i class="icon-file-check"></i>',
		 						main1: "{preview}\n" +
		 						"<div class='input-group {class}'>\n" +
		 						"   <div class='input-group-btn'>\n" +
		 						"       {browse}\n" +
		 						"   </div>\n" +
		 						"   {caption}\n" +
		 						"   <div class='input-group-btn'>\n" +
		 						"       {upload}\n" +
		 						"       {remove}\n" +
		 						"   </div>\n" +
		 						"</div>"
		 				},
		 				initialPreview: [
		 						"<img src='<?php echo base_url(); ?>project/<?php echo $val->project_img; ?>' class='file-preview-image' alt=''>",
		 				],
		 				overwriteInitial: true
		 		});
		 		</script>




<?php } ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>


    <!-- /core JS files -->
    <script>
    $.extend( $.fn.dataTable.defaults, {
         autoWidth: false,
         columnDefs: [{
             orderable: false,
             width: '100px',
             targets: [ 2 ]
         }],
         dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
         language: {
             search: '<span>Filter:</span> _INPUT_',
             lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
         },
         drawCallback: function () {
             $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
         },
         preDrawCallback: function() {
             $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
         }
     });

      $('.datatable-basic').DataTable();


		</script>
		<script type="text/javascript">
	
		function delete_project(el){
			var url = el.attr("target_delete");

		 		noty({
	            width: 200,
	            text: "Do you want to Delete?",
	            type: "confirm",
	            dismissQueue: true,
	            timeout: 1000,
	            layout: "bottomRight",
	            buttons: ("confirm" != 'confirm') ? false : [
	                {
	                    addClass: 'btn btn-primary btn-xs',
	                    text: 'Ok',
	                    onClick: function ($noty) { //this = button element, $noty = $noty element
	                        $noty.close();
	                       $(".loading").show();
	                        noty({
	                            force: true,
	                            text: 'ลบโครงการเรียบร้อย',
	                            type: 'success',
	                            layout: "bottomRight",
	                            timeout: 1000,
	                        });

	                        window.location=url;

	                    }
	                },
	                {
	                    addClass: 'btn btn-danger btn-xs',
	                    text: 'Cancel',
	                    onClick: function ($noty) {
	                        $noty.close();
	                        noty({
	                            force: true,
	                            text: 'ทำการยกเลิกเรียบร้อย',
	                            type: 'error',
	                            layout: "bottomRight",
	                            timeout: 1000,
	                        });
	                    }
	                }
	            ]
	        });
		}
      		
  	$('#mg').attr('class', 'active');
	$('#mc3').attr('style', 'background-color:#dedbd8');




// Close Project
$('.close_project').click(function(event) {
	var pj_id  = $(this).attr('project_id');
	swal({
	  title: "ลบโครงการ",
	  text: "คุณต้องการลบโครงการนี้ ใช่ไหม?",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "ยืนยัน",
	  cancelButtonText: "ยกเลิก",
	  closeOnConfirm: false,
	  closeOnCancel: false
	},
	function(isConfirm) {
	  if (isConfirm) {

	  	$.get('<?php echo base_url() ?>datastore/close_project/'+pj_id, function(data) {
	  	}).done(function(data){
	  		console.log(data);
	           var json = jQuery.parseJSON(data);
	           if(json.status == true){

	              window.location = '<?=base_url()?>data_master/setup_project_main';
	              
	           }else{
	            
	              $.simplyToast(json.message, 'danger');
	           }

	  	});
	    
	  } else {
	    swal("ยกเลิก", null, "error");
	  }
	});



});


// $('.confirm').click(function(event) {
// 	window.location = '<?=base_url()?>data_master/setup_project_main';
// });

</script>