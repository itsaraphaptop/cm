<!-- Main content  trans-->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><b>ACCOUNT PAYABLE (AP) - ระบบเจ้าหนี้</b></h4>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i>Dashboard ตั้งเจ้าหนี้ APV</a></li>
							<li><a href="<?php echo base_url(); ?>inventory/receive_transfer_store"></a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Select APV</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

						<div class="tabbable">
              <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active"><a href="#bottom-tab1" data-toggle="tab" aria-expanded="false">Project</a></li>
                <li class=""><a href="#bottom-tab2" data-toggle="tab" aria-expanded="true">Department</a></li>
              </ul>
										<div class="tab-content">
											<div class="tab-pane active" id="bottom-tab1">
												<div class="col-md-12">
												<div class="table-responsive">
              <table class="table table-hover table-bordered  table-xxs datatable-basic">
                <thead>
                  <tr>
                    <th class="text-center" width="20%">Project Code</th>
                    <th class="text-center" width="50%">Project Name</th>
										<th class="text-center" width="20%">Project Sub</th>  
                    <th class="text-center" width="10%">View</th>              
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($getproj as $key => $value) {
                  		$this->db->select('');
											
											$this->db->where('project',$value->project_id);
											$this->db->where('apv_status',"no");
											$query = $this->db->get('receive_po');
											$result = $query->num_rows();

                  	?>
                  <tr>
                    <td class="text-center"><?php echo $value->project_code; ?></td>
                    <td class="text-left"><?php echo $value->project_name; ?></td> 
                  	<td  class="text-center"><a class="label label-warning" data-toggle="modal" data-target="#sub<?php echo $value->project_code;?>">Sub Project</a></td>
                    <td>
                  		<button data-toggle="modal" data-target="#receive_n<?php echo $value->project_id; ?>" class="detail_n<?php echo $value->project_id; ?> label label-info"> View</button>
                  		<span class="count badge bg-warning-400"><?php echo $result; ?></span>
                  		
                  	</td>           
                    <td class="text-center"><a href="<?php echo base_url(); ?>ap/ap_main_pro/<?php echo $value->project_id; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
           	</div>
											</div>

											<div class="tab-pane" id="bottom-tab2">
												<?php if ($depid != "" && $depid != "0") {?>
							<div class="col-md-12">
								<div class="table-responsive">
              <table class="table table-hover table-bordered  table-xxs datatable-basic2">
									<thead>
										<tr>
											<th class="text-center" width="20%">Department Code</th>
											<th class="text-center" width="50%">Department Name</th>
                      <th class="text-center" width="20%">Project Sub</th>  
                      <th class="text-center" width="10%">View</th> 
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($getdep as $key => $value) {?>
										<tr>
											<td><?php echo $value->project_code; ?></td>
											<td><?php echo $value->project_name; ?></td>
                      <td  class="text-center"><a class="label label-warning" data-toggle="modal" data-target="#subd<?php echo $value->project_code;?>">Sub Project</a></td>
                      <td>
                        <button data-toggle="modal" data-target="#receive_n<?php echo $value->project_id; ?>" class="detail_n<?php echo $value->project_id; ?> label label-info"> View</button>
                        <span class="count badge bg-warning-400"><?php echo $result; ?></span>
                      
                      </td>
											<td><a href="<?php echo base_url(); ?>index.php/petty_cash/newpettycash/<?php echo $value->project_id; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<?php } ?>
											</div>

											
										</div>
									</div>
							

						
          </div>





					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->


<?php foreach ($getproj as  $val) {?>
<div id="sub<?php echo $val->project_code;?>" class="modal fade" data-backdrop="false">
					 <div class="modal-dialog">
						 <div class="modal-content">
							 <div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
								 <h5 class="modal-title"><?php echo $val->project_name;?></h5>
							 </div>

							 <div class="modal-body">
								 <div class="col-md-12" >
                        <label for="">Sub Project </label>
                        <table class="table table-bordered table-xxs table-hover">
                          <thead> 
                            <tr>
                              <td class="text-center">No.</td>
                              <td class="text-center">Project Code:</td>
                              <td class="text-center">Project Name:</td>
                              <th class="text-center">Control BOQ</th>
                    		  <th class="text-center">Control Budget</th>
                              <td class="text-center">Select</td>
                             
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $this->db->select('*');
                            $this->db->where('project_sub',$val->project_id);
                            // $this->db->where('project_substatus',"Y");
                            $sub = $this->db->get('project')->result();
                            ?>
                            <?php $k=1; foreach ($sub as $keysub) { ?>
                               <tr>
                                 <td class="text-center"><?php echo $k; ?></td>
                                 <td class="text-center"><?php echo $keysub->project_code; ?></td>
                                 <td class="text-center"><?php echo $keysub->project_name; ?></td>
                                   <td class="text-center"><?php  if($keysub->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
	                    <td class="text-center"><?php  if($keysub->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                                <td class="text-center"><a href="<?php echo base_url(); ?>ap/ap_main_pro/<?php echo $keysub->project_id; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                 
                               </tr>
                               <?php $k++; } ?>
                               </tbody>


                        </table>
<br>
                      </div>
							 </div>

							 <div class="modal-footer">
							 <a  href="<?php echo base_url(); ?>index.php/data_master/project_sub/<?php echo $val->project_id; ?>" type="submit" class="label label-info">ADD Sub Project <i class="icon-check position-right"></i></a>
								 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

							 </div>
						 </div>
					 </div>
				 </div>
  <?php } ?>
<?php foreach ($getdep as  $val) {?>
<div id="subd<?php echo $val->project_code;?>" class="modal fade" data-backdrop="false">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h5 class="modal-title"><?php echo $val->project_name;?></h5>
               </div>

               <div class="modal-body">
                 <div class="col-md-12" >
                        <label for="">Sub Project </label>
                        <table class="table table-bordered table-xxs table-hover">
                          <thead> 
                            <tr>
                              <td class="text-center">No.</td>
                              <td class="text-center">Project Code:</td>
                              <td class="text-center">Project Name:</td>
                              <th class="text-center">Control BOQ</th>
                          <th class="text-center">Control Budget</th>
                              <td class="text-center">Select</td>
                             
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $this->db->select('*');
                            $this->db->where('project_sub',$val->project_id);
                            // $this->db->where('project_substatus',"Y");
                            $sub = $this->db->get('project')->result();
                            ?>
                            <?php $k=1; foreach ($sub as $keysub) { ?>
                               <tr>
                                 <td class="text-center"><?php echo $k; ?></td>
                                 <td class="text-center"><?php echo $keysub->project_code; ?></td>
                                 <td class="text-center"><?php echo $keysub->project_name; ?></td>
                                   <td class="text-center"><?php  if($keysub->chkconbqq=='1'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                      <td class="text-center"><?php  if($keysub->controlbg=='2'){ echo '<input type="checkbox" checked="checked" disabled="disabled">';}else{ echo '<input type="checkbox"  disabled="disabled">';} ?></td>
                                <td class="text-center"><a href="<?php echo base_url(); ?>ap/ap_main_pro/<?php echo $keysub->project_id; ?>/p" class="label label-primary"><i class="icon-folder-open"></i> Select</a></td>
                                 
                               </tr>
                               <?php $k++; } ?>
                               </tbody>


                        </table>
<br>
                      </div>
               </div>

               <div class="modal-footer">
               <a  href="<?php echo base_url(); ?>index.php/data_master/project_sub/<?php echo $val->project_id; ?>" type="submit" class="label label-info">ADD Sub Project <i class="icon-check position-right"></i></a>
                 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

               </div>
             </div>
           </div>
         </div>
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
  $('.datatable-basic2').DataTable();
</script>