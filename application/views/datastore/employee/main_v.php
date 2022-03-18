<style>
.fieldset-info {
    border: 1px solid #00bfff;
    padding: 10px;
}
</style>
    
    <!-- Main navbar -->
<div class="page-container">
	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">

        <div class="content">
				    <!-- /info alert -->
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-flat">
								<div class="panel-heading">
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
                  <form action="<?php echo base_url(); ?>datastore_active/add_employee" method="post" enctype="multipart/form-data">
                    <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                        <fieldset class="">
                            <legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> New Employee</h4></legend>
                            <div class="container-fluid">
	                            <div class="row">
	                              <!-- newuser -->
									<div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">Employee Code</label>
                     <input type="text" class="form-control input-sm" placeholder="Employee Code" id="ccode" name="ccode" readonly="ture">
                      <input type="hidden" class="form-control input-sm" placeholder="id" id="cid" name="cid" readonly="ture">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">Employee Name</label>
                     <input type="text" class="form-control input-sm" placeholder="Employee Name" id="cname" required="required" name="cname">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">E-Mail</label>
                     <input type="text" class="form-control input-sm" placeholder="E-Mail" id="cmail" required="required" name="cmail">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">Telephone</label>
                     <input type="text" class="form-control input-sm" placeholder="Telephone" id="ctel" name="ctel">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                <label for="">Position</label>
                     <select placeholder="Position" class="form-control input-sm" id="ctype" name="ctype">
                       <?php $this->db->select('*');
                       $this->db->order_by('id','asc');
                              $q = $this->db->get('m_position');
                              $res = $q->result();
                              foreach ($res as  $va) {
                        ?>
                       <option value="<?php echo $va->id; ?>"><?php echo $va->p_name; ?></option>

                       <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-6" >
               <label for="">Type</label>
                     <select placeholder="Dashboard" class="form-control input-sm" id="mtype" name="mtype">
                       
                       
                       <option value="employee">Employee</option>
                       <option value="external">External</option>

                     
                    </select>
             </div>
        </div>
        <div class="row">
            <div class="col-xs-6" >
            <label for="project1">Project / Department :</label>
                <div class="input-group">
                      <input type="text" readonly="true" placeholder="Project Name" class="form-control" required="required"  id="projname">
                      <input type="hidden" readonly="true"  class="pproject1 form-control" name="project1" required="required" id="projid">
                      <span class="input-group-btn">
                      <button class="openproj btn btn-info" data-toggle="modal" data-target="#openproject" type="button"><i class="icon-search4"></i></button>
                      </span>
                </div>
             </div>
             <div class="col-xs-6" >
               <label for="">PM Dashboard</label>
                     <select placeholder="Dashboard" class="form-control input-sm" id="mdash" name="mdash">
                       
                       
                       <option value="1">PM</option>
                       <option value="2">GM</option>

                     
                    </select>
             </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6">
            <label for="lineid">Line ID</label>
            <div class="form-group has-feedback has-feedback-left">
														<input type="text" id="lineid" name="lineid" class="form-control" placeholder="U11fae07ce7afb4aac7875be082b2b3ee">
														<div class="form-control-feedback">
															<i class="fa fa-paper-plane-o"></i>
														</div>
													</div>
          </div>
        </div>
        <hr>
            <div class="row">
              <div class="col-xs-6">
                <h4 class="modal-title" id="myModalLabel">Crate Password</h4>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control input-sm" placeholder="Username" name="cuser" required="required" id="cuser">
                  <input type="hidden" class="form-control input-sm" name="flag" id="flag">
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="">New Password</label>
                  <input type="text" class="form-control input-sm" placeholder="New Password" name="cpass" id="cpass">
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xs-6">
                <h4 class="modal-title">Signature</h4>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-6">
                <div class="form-group">
                    <input type="file" name="userfile" class="form-control" aria-required="true" aria-invalid="false" accept=".jpg, .png">
                </div>
              </div>
            </div>
	                              <!-- /user -->
	                            </div>
                            </div>
                        </fieldset>
                        <br>
                        <div class="form-group">
                        	<div class="text-right">
					        	<button type="submit" class="btn bg-success" id="save"><i class="icon-floppy-disk"></i> Save</button>

                    <a id="fa_close" href="<?php echo base_url(); ?>data_master" class="btn bg-danger"><i class="icon-close2"></i> Close</a>
					      	</div>
					    </div>
                    </div>

                  </div>
                </fieldset>
                </form>
								</div>


							</div>

</div>
<div class="col-md-6">
			<div class="panel panel-flat">
								<div class="panel-heading">
									<!-- <h6 class="panel-title"><i class="icon-cog3 position-left"></i> Setup Employee</h6> -->
									<div class="heading-elements">
										<ul class="icons-list">
											<li><a href="<?php echo base_url(); ?>data_master/setupemployee"></a></li>
										</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <fieldset class="">
                      <div class="col-md-12">
                        <legend><h4><i class="fa fa-users" aria-hidden="true"></i> Show Employee</h4>
                          <div style="text-align: right;">
                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#import"><i class="icon-file-upload2"></i> Import</a>
                            <a type="button" href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=member.mrt" class="preload btn btn-info"><i class="icon-printer4"></i> Print </a>
                          </div>
                        </legend>
                      </div>
                        	<!-- <button class="label label-primary"> Employee</button> -->
                          <!-- <button class="label label-info"> External</button> -->
                        
                        <div id="table">
                        <table class="table table-hover table-striped table-xxs basic">
                          <thead>
                            <tr>
                              <th class="text-center" width="10%">No.</th>
                              <th >Employee Code</th>
                              <th>Employee Name</th>
                              <th >Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $n=1; foreach ($mem as $v) {
                            $qu = $this->db->query("select p_name from m_position where id='$v->m_position'");
                            $re = $qu->result();

                            ?>
                            <tr>
                              <th class="text-center"><?php echo $n; ?></th>
                              <td><?php echo $v->m_code; ?></a></td>
                              <td><?php echo $v->m_name; ?></a></td>
                              <td>
                                <!-- <a data-toggle="modal" data-target="#open<?php echo $n; ?>"><i class="fa fa-folder-open" aria-hidden="true"></i></a> -->
                                <a id="edit<?php echo $v->m_code; ?>"><i class="icon-pencil7" aria-hidden="true"></i></a>
                                <a id="sweet_combine<?php echo $v->m_id; ?>"><i class="icon-trash"></i></a>
                              </td>  
	                            <!--   <div class="btn-group">
	                                <a href="#" class="label bg-teal dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></a>

	                                <ul class="dropdown-menu dropdown-menu-right">
	                                  <li></li>
	                                  <li><a id="edit<?php echo $v->m_code; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
                                     <li><a href="<?php echo base_url(); ?>userprofile/edit_empp/<?php echo $v->m_code; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit porfile</a></li>
                                    <li><a id="sweet_combine<?php echo $v->m_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></li>
	                                </ul>
	                              </div> -->
	                            
                            </tr>
                            <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/bootbox.min.js"></script>
                          	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
                          <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/components_modals.js"></script> -->
                            <script>
                            	$("#edit<?php echo $v->m_code; ?>").click(function(){
                                $("#cid").val("<?php echo $v->m_id; ?>");
                            		$("#ccode").val("<?php echo $v->m_code; ?>");
                                $("#cname").val("<?php echo $v->m_name; ?>");
                                $("#cmail").val("<?php echo $v->m_email; ?>");
                                $("#ctel").val("<?php echo $v->m_tel; ?>");
                                $("#ctype").val("<?php echo $v->m_position; ?>");
                                
                                $("#projname").val("<?php echo $v->project_name; ?>");
                                $("#projid").val("<?php echo $v->m_project; ?>");
                                $("#cuser").val("<?php echo $v->m_user; ?>");
                                $("#mdash").val("<?php echo $v->dashboard; ?>");
                                $("#mtype").val("<?php echo $v->m_type; ?>");
                                $("#lineid").val("<?php echo $v->lineid; ?>");
                                $("#flag").val("udp");
                            	});

                              // Alert combination
                              $('#sweet_combine<?php echo $v->m_id; ?>').on('click', function() {
                                  swal({
                                      title: "Are you sure?",
                                      text: "You will not be able to recover this imaginary file!",
                                      type: "warning",
                                      showCancelButton: true,
                                      confirmButtonColor: "#EF5350",
                                      confirmButtonText: "Yes, delete it!",
                                      cancelButtonText: "No, cancel pls!",
                                      closeOnConfirm: false,
                                      closeOnCancel: false
                                  },
                                  function(isConfirm){
                                      if (isConfirm) {
                                         var url="<?php echo base_url(); ?>datastore_active/del_employee";
                                         var dataSet={
                                           id: "<?php echo $v->m_id ?>",
                                           code: "<?php echo $v->m_code; ?>",
                                           user: "<?php  echo $v->m_user ?>"
                                           };
                                           $.post(url,dataSet,function(data){

                                             });
                                          swal({
                                                title: "Deleted!",
                                                text: "Your imaginary file has been deleted.",
                                                confirmButtonColor: "#66BB6A",
                                                type: "success"
                                          });

                                      }
                                      else {
                                          swal({
                                              title: "Cancelled",
                                              text: "Your imaginary file is safe :)",
                                              confirmButtonColor: "#2196F3",
                                              type: "error"
                                          });
                                      }
                                      window.location.href = "<?php echo base_url(); ?>data_master/setupemployee";
                                  });
                              });
                            </script>
                       
                                     <!-- Full width modal -->
							         <div id="open<?php echo $n; ?>" class="modal fade">
							           <div class="modal-dialog modal-lg">
							             <div class="modal-content bg-info-300">
							               <div class="modal-header">
							                 <button type="button" class="close" data-dismiss="modal">&times;</button>
							                 <h5 class="modal-title"><i class="fa fa-user"></i> <?php echo $v->m_name; ?></h5>
							               </div>

							               <div class="modal-body">
                               <div class="row">
                                  <div class="col-lg-4 col-md-6">
                                    <div class="thumbnail">
                      								<div class="thumb thumb-slide">
                      									<img src="<?php echo base_url();?>profile/<?php echo $v->uimg; ?>" alt="">
                      									<div class="caption">
                      										<span>
                      											<a href="<?php echo base_url(); ?>userprofile" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                      											<a href="<?php echo base_url(); ?>userprofile" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
                      										</span>
                      									</div>
                      								</div>

                      						    	<div class="caption text-center">
                      						    		<h6 class="text-semibold no-margin"><?php echo $v->m_name; ?> <small class="display-block"><?php echo $v->project_name; ?><?php echo $v->department_title; ?></small></h6>
                      					    			<ul class="icons-list mt-15">
                      				                    	<li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a></li>
                      				                    	<li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
                      				                    	<li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a></li>
                      			                    	</ul>
                      						    	</div>
                      					    	</div>
                                  </div>
                                  <div class="col-md-4">

                                  </div>
                                  <div class="col-md-4">

                                  </div>
                               </div>

											       </div>
							               <div class="modal-footer">
							                 <a type="button" class="btn btn btn-danger text-white" data-dismiss="modal">Close</a>
							                 <!-- <a type="button" class=" btn btn-primary" data-dismiss="modal">Select</a> -->
							               </div>
							             </div>
							           </div>
							         </div>
							         <!-- /full width modal -->
                           <?php $n++; } ?>
                          </tbody>
                        </table>
                        </div>
                      </fieldset>
                    </div>
                  </div>
								</div>

 <div id="import" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php $this->load->helper('form'); ?>
    <?php echo form_open_multipart('import_company/do_upload_employee');?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Import Employee</h5>
      </div>

      <div class="modal-body">
        <p>To see the required Excel format for importing Employees and view some examples, choose a sample to download: </p>
        <div class="form-group">
          <a href="<?php echo base_url();?>sample/employee.xls" class="btn btn-default"><i class="icon-download7"></i> Download Sample</a>
        </div>
        <p>To import Employees, upload an Excel (.xls) file:</p>
        <div class="form-group">
          <input type="file" class="file-styled" id="file_upload" name="userfile">
        </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="submit" class="uploadfile btn btn-success">Import File</button>
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
      </div>
    <?php echo form_close();?>
    <div id="load"></div>
    </div>
  </div>
</div>
<script>
  $(".uploadfile").click(function(){
      $("#load").html('<p>กำลังโหลดข้อมูล</p><div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>');
  });
</script>
			</div>
</div>
</div>
            <!-- Footer -->
            <div class="footer text-muted">
            <!--   © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a> -->
            </div>
            <!-- /footer -->
        </div>
        </div>
        </div>
        </div>


<!-- Full width modal -->
      
         <!-- /full width modal -->
         <!-- modal  โครงการ-->
 <div class="modal fade" id="openproject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Project</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_project">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->
<!-- modal  แผนก-->
 <div class="modal fade" id="opendp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Department</h4>
      </div>
        <div class="modal-body">
        <div class="panel-body">
            <div class="row" id="modal_department">

            </div>
            </div>
        </div>
    </div>
  </div>
</div> <!--end modal -->



	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script>
	$(".reloadnew").click(function(event) {
		 $('input[class="form-control input-sm"]').val('');
         $('textarea[class="form-control"]').val('');
	});
  $(".openproj").click(function(){
      $('#modal_project').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_project").load('<?php echo base_url(); ?>index.php/share/project');
    });
    $(".opendb").click(function(){
      $('#modal_department').html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
      $("#modal_department").load('<?php echo base_url(); ?>index.php/share/department');
    });
</script>

<script>
$.extend( $.fn.dataTable.defaults, {
     autoWidth: false,
     columnDefs: [{
         orderable: false,
         width: '100px',
         targets: [ 0 ]
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
  $('.basic').DataTable();
  $('#mg').attr('class', 'active');
  $('#mc5').attr('style', 'background-color:#dedbd8');
</script>