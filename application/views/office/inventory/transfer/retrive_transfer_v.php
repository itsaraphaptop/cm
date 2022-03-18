
      <?php
        $data = $this->session->userdata('sessed_in');
        $compcode = $data['compcode'];  
      ?>
      <div class="content-wrapper">
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Transfer Archive</h5>

						</div>

						<div class="panel-body">
              <table class="table table-xxs">
                <thead>
                  <tr>
                    <th>Transfer Code</th>
                    <th>Name</th>
                    <th>From Project</th>
                    <th>To Project</th>
                    <th>Remark</th>
										<th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($res as $key => $value) {?>
                    <tr>
                      <td><?php echo $value->transfer_code; ?></td>
                      <td><?php echo $value->name_transfer; ?></td>
                      <?php $ffproject = $this->db->query("select project_name from project where project_id='$value->from_project'")->result(); 
                      foreach ($ffproject as $key => $ffname) { ?>
                      <td><?php echo $ffname->project_name; ?></td>
                      <?php } ?>
                      <?php $ttproject = $this->db->query("select project_name from project where project_id='$value->to_project'")->result(); 
                      foreach ($ttproject as $key => $ttname) { ?>
                      <td><?php echo $ttname->project_name; ?></td>
                      <?php } ?>
                      <td><?php echo $value->remark; ?></td>
											<?php if ($value->approve=="wait") {?>
													<td><span class="label label-warning">Waiting</span></td>
													<td>
		                        <ul class="icons-list">
		                          <li> 
                                <a data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>" class="detail<?php echo $value->transfer_code; ?>" ><i class="icon-folder-open"></i></a>

                                <!-- <button data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>" class="detail<?php echo $value->transfer_code; ?> label label-info"> OPEN</button> -->
                              </li>
		                          <li> <a href="#"><i class=" icon-cancel-square2"> </i></a></li>
                              <li> <a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_transfer.mrt&trcode=<?php echo $value->transfer_code; ?>"> <i class="icon-printer4"></i></a></li>
		                        </ul>
		                      </td>
											<?php }else{?>
												<td><span class="label label-success">Transfer</span></td>
												<td>
	                        <ul class="icons-list">
	                          <li> 
                              <a data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>" class="detail<?php echo $value->transfer_code; ?>" ><i class="icon-folder-open"></i></a>
                              <!-- <button data-toggle="modal" data-target="#receive<?php echo $value->transfer_code; ?>" class="detail<?php echo $value->transfer_code; ?> label label-default"> OPEN</button> -->
                            </li>
	                          <li> <a href="#"  disabled> <i class=" icon-cancel-square2"></i></a></li>
                            <li> <a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=ic_transfer.mrt&trcode=<?php echo $value->transfer_code; ?>&compcode=<?php echo $compcode;?>" ><i class="icon-printer4"></i></a></li>
	                        </ul>
	                      </td>
											<?php } ?>

                    </tr>
                  <?php  } ?>
                </tbody>
              </table>
            </div>
          </div>

  <?php foreach ($res as $key => $value) {?>
          <!-- modal  โครงการ-->
           <div class="modal fade" id="receive<?php echo $value->transfer_code; ?>" data-backdrop="false">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Receive Transfer Code #<?php echo $value->transfer_code; ?></h4>
                </div>
                  <div class="modal-body">
                    <div class="panel-body">
											<form action="<?php echo base_url(); ?>inventory_active/receive_transfer" method="post">
                        <div class="row">
                          <!--  -->
                          <div class="panel-body no-padding-bottom">
                            <div class="row">
                              <div class="col-md-6 content-group">
                              </div>

                              <div class="col-md-6 content-group">
                                <div class="invoice-details">
                                  <h5 class="text-uppercase text-semibold">Transfer No. #<?php echo $value->transfer_code; ?><input type="hidden" name="code" value="<?php echo $value->transfer_code; ?>"></h5>
                                  <ul class="list-condensed list-unstyled">
                                    <li>Transfer Date: <span class="text-semibold"><?php echo $value->date_transfer; ?></span></li>
                                    <li><h5>Name : <?php echo $value->name_transfer; ?></h5></li>
                                  </ul>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 col-lg-9 content-group">
                                <span class="text-muted">From Project:</span>
                                <ul class="list-condensed list-unstyled">
                                 <?php $ffproject = $this->db->query("select project_name from project where project_id='$value->from_project'")->result(); 
                      foreach ($ffproject as $key => $ffname) { 
                          $getproj = $ffname->project_name;
                        } ?>
                                  <li><h5> <?php echo $getproj; ?><input type="hidden" name="fromproject" value="<?php echo $value->from_project; ?>"> </h5></li>
                                  <li>Remark: <?php echo $value->remark; ?></li>
                                </ul>
                              </div>

                              <div class="col-md-6 col-lg-3 content-group">
                                <span class="text-muted">To Project:</span>
                                <ul class="list-condensed list-unstyled invoice-payment-details">
                                 <?php $ttproject = $this->db->query("select project_name from project where project_id='$value->to_project'")->result(); 
                      foreach ($ttproject as $key => $ttname) { 
                        $getprojto =  $ttname->project_name;
                        }?>
                                  <li><h5> <?php echo $getprojto; ?><input type="hidden" name="toproject" value="<?php echo $value->to_project; ?>"></h5></li>
                                  <li>Address: <span class="text-semibold"><?php echo $value->address_transfer; ?></span></li>
                                  <li>Additional message:: <span><?php echo $value->message; ?></span></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div id="modal_detail<?php echo $value->transfer_code; ?>">

                          </div>
                          <div class="row">
                            <div class="modal-footer">
															<?php if ($value->approve=="wait") {?>
																<!-- <a  href="<?php echo base_url(); ?>inventory/edit_transfer_store/<?php echo $value->transfer_code; ?>" class="btn btn-primary"> Edit</a> -->
															<?php }else{?>

															<?php } ?>
                              <a data-dismiss="modal" class="btn btn-primary"> Close</a>
                            </div>
                          </div>
                          <!--  -->
                        </div>
												</form>
                    </div>
                  </div>
              </div>
            </div>
          </div> <!--end modal -->
          <script>
            $(".detail<?php echo $value->transfer_code; ?>").click(function(){
              $("#modal_detail<?php echo $value->transfer_code; ?>").html("<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading...");
              $("#modal_detail<?php echo $value->transfer_code; ?>").load('<?php echo base_url(); ?>inventory/load_transfer_detail/<?php echo $value->transfer_code; ?>/<?php echo $value->to_project; ?>');

            });
             $('#imp').attr('class', 'active');
             $('#materials').attr('class', 'active');
             $('#imp_sub10').attr('style', 'background-color:#dedbd8');
          </script>
<?php } ?>

					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
