
<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">




			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">

					<!-- Header content -->
				
					<!-- /header content -->


					<!-- Toolbar -->
					<div class="navbar navbar-default navbar-xs">
						<ul class="nav navbar-nav visible-xs-block">
							<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
						</ul>

						
					</div>
					<!-- /toolbar -->

				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
<?php foreach ($prof as $key => $value) {?>

					<!-- User profile -->
					
					
					<div class="row">
						<div class="col-lg-9">
							<div class="tabbable">
								<div class="tab-content">


									<div class="tab-pane fade  fade in active" id="settings">

										<!-- Profile info -->
										<div class="panel panel-flat">
								<div class="panel-heading">
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
                  <form action="<?php echo base_url(); ?>datastore_active/add_employee" method="post">
                    <fieldset>
                  <div class="row">
                    <div class="col-md-12">
                        <fieldset class="fieldset-info">
                            <legend><h4><i class="fa fa-user-plus" aria-hidden="true"></i> User Information </h4></legend>

                            <div class="container-fluid">
	                            <div class="row">
	                              <!-- newuser -->

									<div class="row">

            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">รหัสพนักงาน</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกรหัสพนักงาน" id="ccode" name="ccode" readonly="ture" value="<?php echo $value->m_code;; ?>">
                      <input type="hidden" class="form-control input-sm" placeholder="id" id="cid" name="cid" readonly="ture" value="<?php echo $value->m_id; ?>">
                      <input type="hidden" class="form-control input-sm" name="flag" id="flag" value="udp">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="">ชื่อพนักงาน</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกชื่อพนักงาน" id="cname" required="required" readonly name="cname" value="<?php echo $value->m_name; ?>">
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-2">
    			<div class="form-group">
    					<label for="sel1">คำนำหน้า</label>
  						<select class="form-control" id="sel1">
   					 	 <option>นาย</option>
   						 <option>นาง</option>
   						 <option>นางสาว</option>
 				  		  </select>
				</div>
     		</div>	 
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="">Name</label>
                     <input type="text" class="form-control input-sm" placeholder="ชื่อภาษาอังกฤษ" id="emp_name_e" required="required" name="emp_name_e">
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="">Lastname</label>
                     <input type="text" class="form-control input-sm" placeholder="นามสกุลภาษาอังกฤษ" id="emp_last_name" required="required" name="emp_last_name">
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label for="">ชื่อเล่น</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกชื่อเล่น" id="emp_nickname" name="emp_nickname">
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-4">
                <div class="form-group">
                    <label for="">บัตรประชาชน</label>
                     <input type="text" class="form-control input-sm" placeholder="เลขบัตรประชาชน" id="cmail" required="required" name="emp_idcityzen">
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="">อีเมลล์</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกอีเมลล์" id="cmail" required="required" name="cmail">
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="">เบอร์โทร</label>
                     <input type="text" class="form-control input-sm" placeholder="กรอกเบอร์โทร" id="ctel" name="ctel">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">
                <label for="">ตำแหน่ง</label>
                     <select placeholder="กรอกประเภท" class="form-control input-sm" id="ctype" name="ctype">
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
            <div class="col-xs-4" >
           		 <label for="project1">โครงการ</label>
                	 <div class="input-group">
                      <input type="text" readonly="true" placeholder="เลือกโครงการ" class="form-control" required="required"  id="projname">
                      <input type="hidden" readonly="true"  class="pproject1 form-control" name="project1" required="required" id="projid">
                      <span class="input-group-btn">
                      <button class="openproj btn btn-default" data-toggle="modal" data-target="#openproject" type="button"><i class="icon-search4"></i></button>
                      </span>
               	      </div>
             </div>
            <div class="col-xs-4">
            <label for="project1">แผนก</label>
                <div class="input-group">
                        <input type="text" readonly="true" placeholder="เลือกแผนก" class="form-control" id="dpname">
                        <input type="hidden" readonly="true"  class="form-control" name="project" id="dpid">
                        <span class="input-group-btn">
                        <button class="opendb btn btn-default" data-toggle="modal" data-target="#opendp" type="button"><i class="icon-search4"></i></button>
                        </span>
                </div>
            </div>
            
    			<div class="row clearfix">
					<div class="col-xs-12">
						
 					 <!-- Trigger the modal with a button -->
 					 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ประวัตติการศึกษา</button>

 							 <!-- Modal -->
  							<div class="modal fade" id="myModal" role="dialog">
   							 <div class="modal-dialog">
    
      							<!-- Modal content-->
      							<div class="modal-content">
       							 <div class="modal-header">
         							 <button type="button" class="close" data-dismiss="modal">&times;</button>
         					 <h4 class="modal-title">ประวัตติการศึกษา</h4>
       							 </div>
        							<div class="modal-body">
         							 <table class="table table-bordered table-hover" id="tab_logic">
     								 <thead>
     	 								<tr >
      										<th class="text-center">
     												  #
    										  </th>
      
     										 <th class="text-center">
        									 ระดับการศึกษา
    										  </th>
     										 <th class="text-center">
     										  สาขา 
     										 </th>
     										 <th class="text-center">
      										 ชื่อสถานศึกษา 
     										 </th>
     										 </tr>
     								 </thead>
   	  								<tbody>
      								<tr id='addr0'>
     								 <td>
     									 1
     								 </td>
      
     	 <td>
        <select class="form-control" id="sellevel">
         <option>--เลือกระดับการศึกษา--</option>
           <option>มัธยมต้น</option>
          <option>มัธยมปลาย / ปวช.</option>
          <option>ปวส. / ปริญญาตรี</option>
          <option>ปริญญาโท</option>
          <option>ปริญญาเอก</option>
          </select>
      <!--<input type="text" name='name0'  placeholder='Name' class="form-control"/>-->
      </td>
      <td>
      <input type="text" name='saka0' placeholder='สาขา' class="form-control"/>
      </td>
      <td>
      <input type="text" name='place0' placeholder='สถานศึกษา' class="form-control"/>
      </td>
      </tr>
                     <tr id='addr1'></tr>
      </tbody>
      </table>
      <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
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
					        	<a class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times-circle-o" aria-hidden="true"></i> ปิด</a>
					        	<button type="submit" class="btn btn-primary btn-xs" id="save" data-dismiss="modal"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
					      	</div>
					    </div>
                    </div>

                  </div>
                </fieldset>
                </form>
								</div>


							</div>
										<!-- /profile info -->

									</div>
								</div>
							</div>
						</div>
<?php } ?>
						<div class="col-lg-3">

							<!-- User thumbnail -->
							<div class="thumbnail">
								<div class="thumb thumb-rounded thumb-slide">
									<img src="<?php echo base_url() ;?>profile/<?php echo $imgu; ?>" id="imgAvatar" alt="">
									
								</div>

						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin"><?php echo $name; ?> <small class="display-block"><?php echo $project; ?><?php echo $dep; ?></small></h6>
					    			<ul class="icons-list mt-15">
				                    	<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
				                    	<li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
			                    	</ul>
			                    	<br>
							            <form action="<?php echo base_url(); ?>index.php/upload/uploadprofile" method="post" enctype="multipart/form-data">
						                    <div class="form-group">
						                    <label>Upload profile image</label>
						                      <input class="form-control" type="file" name="userfile" size="20"  OnChange="showPreview(this)">
						                      <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>

						                        <button type="submit" name="improfile" class="btn btn-primary btn-block" style="margin-top:10px;" data-loading-text="Loading..." id="loadimg" autocomplete="off"> ยืนยันการอัพโหลดรูปภาพ</button>
						                    </div>
					                    </form>
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->


				</div>

				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
<script>

	function showPreview(ele)
  {
      $('#imgAvatar').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {
      
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $('#imgAvatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(ele.files[0]);
            }
  }
</script>