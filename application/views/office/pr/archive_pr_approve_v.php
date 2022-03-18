<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url(); ?>index.php/panel/office"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/pr/archive_pr">PR Archive</a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
				<div class="content">

				<div class="row">
					<div class="col-lg-4">
						<!-- Available hours -->
									<div class="panel text-center border-left-lg border-left-pink">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown text-muted">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
						                	</div>

						                	<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="hours-available-progress"></div>
											<!-- /progress counter -->


											<!-- Bars -->
											<div id="hours-available-bars"></div>
											<!-- /bars -->

										</div>
									</div>
									<!-- /available hours -->
					</div>

					<div class="col-lg-4">
						<!-- Productivity goal -->
									<div class="panel text-center border-left-lg border-left-indigo">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown text-muted">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div>

											<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="goal-progress"></div>
											<!-- /progress counter -->

											<!-- Bars -->
											<div id="goal-bars"></div>
											<!-- /bars -->

										</div>
									</div>
									<!-- /productivity goal -->
					</div>

					<div class="col-lg-4">
						<!-- Productivity goal -->
									<div class="panel text-center border-left-lg border-left-success">
										<div class="panel-body">
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li class="dropdown text-muted">
							                			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-sync"></i> Update data</a></li>
															<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
															<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
															<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
														</ul>
							                		</li>
							                	</ul>
											</div>

											<!-- Progress counter -->
											<div class="content-group-sm svg-center position-relative" id="goal-approve"></div>
											<!-- /progress counter -->

											<!-- Bars -->
											<div id="goal-bars"></div>
											<!-- /bars -->

										</div>
									</div>
									<!-- /productivity goal -->
					</div>
				</div>

					<!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">PR Archive</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

						</div>
						<div class="dataTables_wrapper no-footer">
						<div class="table-responsive">
							<table class="table table-hover datatable-basic">
							<thead>
								<tr>
									<th width="10px%">PR No.</th>
									<th>Project/Department</th>
									<th>Detail</th>
									<th width="5%">Status</th>
									<th width="5%">Cancel</th>
									<th width="10%" class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php $n=1; foreach($getpr as $val){?>
								<tr>
									<td><?php echo $val->pr_prno; ?></td>
									<td><a data-toggle="modal" class="editable editable-click" data-target="#open<?php echo $val->pr_prno; ?>"><?php echo $val->project_name; ?><?php echo $val->department_title; ?></a></td>
									<td><?php echo $val->pr_remark; ?></td>
									<td><span class="label label-success"><?php echo $val->pr_approve; ?></span></td>
									<td><a data-toggle="modal" data-target="#cancelmodal<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="ยกเลิก" class="label label-danger label-block"><i class="icon-cross3"></i> Cancel</a></td>

									<td class="text-center">
										<ul class="icons-list">
												<li><a data-toggle="modal" data-target="#open<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Open"><i class="icon-folder-open"></i></a></li>
												<li class="text-slate"><i class="icon-pencil7"></i></li>
												<li class="text-slate"><i class="icon-trash"></i></li>
												<li><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->pr_prno; ?>" data-popup="tooltip" title="" data-original-title="Print"><i class="icon-printer4"></i></a></li>
										</ul>
									</td>
								</tr>
								<?php $n++; } ?>
						</table>
						</div>
					</div>
					</div>
					<!-- /highlighting rows and columns -->
	<?php $n=1; foreach($getpr as $value){?>
					<div id="cancelmodal<?php echo $value->pr_prno; ?>" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-danger">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
								</div>

								<div class="modal-body">
								<h3><i class=" icon-file-empty"></i> Master</h3>
									<div class="col-md-6">
										<div class="form-group">
																<div class="col-lg-3">
																	<div class="form-control-static">
																		<p>PR No.:</p>
																	</div>
																</div>
																<div class="col-lg-9">
																<div class="form-control-static">
																	<p><?php echo $value->pr_prno;?></p>
																</div>
																	<!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
																	<input type="hidden" class="form-control" id="prapprov<?php echo $value->pr_prno; ?>" value="<?php echo $value->pr_prno;?>"/>
																</div>
													 </div>
										<div class="form-group">
															<div class="col-lg-3">
																	<div class="form-control-static">
																		<p>Name:</p>
																	</div>
																</div>
															<div class="col-lg-9">
															<div class="form-control-static">
																	<p><?php echo $value->pr_reqname;?></p>
																	</div>
															</div>
													</div>
													<div class="form-group">
																 <div class="col-lg-3">
																	<div class="form-control-static">
																		<p>Place:</p>
																	</div>
																</div>
																	<div class="col-lg-9">
															<div class="form-control-static">
																<p><?php echo $value->pr_deliplace;?></p>
															</div>
															</div>
														</div>
											</div>
											<div class="col-md-6">
													<div class="form-group">
														<div class="col-lg-3">
																	<div class="form-control-static">
																		<p>PR Date:</p>
																	</div>
																</div>
														<div class="col-lg-9">
														<div class="form-control-static">
															<p><?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></p>
														</div>
														</div>
													</div>
													<div class="form-group">
															<div class="col-lg-4">
																	<div class="form-control-static">
																		<p>Project/Department:</p>
																	</div>
																</div>
															<div class="col-lg-8">
															<div class="form-control-static">
																<p><?php echo $value->project_name;?><?php echo $value->department_title; ?></p>
															</div>
															</div>
												</div>
												<div class="form-group">
															<div class="col-lg-3">
																	<div class="form-control-static">
																		<p>Remark:</p>
																	</div>
																</div>
															<div class="col-lg-9">
															<div class="form-control-static">
																<p><?php echo $value->pr_remark;?></p>
															</div>
															</div>
													</div>
											</div>
												 <!--  -->
								</div>

								<div class="panel-body">
								<hr>
								<h3><i class="icon-file-text2"></i> Detail</h3>

								<table class="table table-bordered table-striped table-xxs">
										<thead>
											<tr>
												<th>No.</th>
																		<th>รหัสต้นทุน</th>
																		<th>ชื่อวัสดุ</th>
																		<th>จำนวน</th>
																	 </tr>
																</thead>
																<tbody>
																		<?php   $n =1;?>

																		<?php
																		$prpr = $value->pr_prno;
																		$this->db->select('*');
																		$this->db->where('pri_ref', $prpr);
																		$q =  $this->db->get('pr_item');
																		$res = $q->result();
																		foreach ($res as $valj){ ?>
																	<tr>
																		<td><?php echo $n; ?></td>
																	 <td><?php echo substr($valj->pri_costcode, -5); ?></td>
																		<td><?php echo $valj->pri_matname; ?></td>
																		 <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
																	 </tr>
																		<?php $n++; } ?>
																</tbody>
									</table>
								</div>
									<div class="modal-footer">
												<button type="button" class="cance<?php echo $value->pr_prno; ?> btn bg-danger-600" data-dismiss="modal">Cancel</button>
											</div>
							</div>

						</div>
					</div>
					<script>
						$(".cance<?php echo $value->pr_prno; ?> ").click(function(event) {
								var url="<?php echo base_url(); ?>index.php/pr_active/cancel_pr/<?php echo $value->pr_prid;?>";
																					var dataSet={
																						prno: "<?php echo $value->pr_prno; ?>"
																					};
																					$.post(url,dataSet,function(data){
																						 swal({
														title: "Cancelled!",
														text: "Cancelled PR No."+data,
														confirmButtonColor: "#ff002e",
														type: "error"
												});
																						 setTimeout(function() {
																						 window.location.href = "<?php echo base_url(); ?>index.php/pr/pr_approve";
																						}, 500);
																					});
						});

					</script>
					<?php } ?>

					 <!-- Footer -->
			          <div class="footer text-muted">
			            © 2016. <a href="#">NinjaERP Business Intelligence</a> by <a href="http://http://www.ninjaerp.co" target="_blank">NinjaERP</a>
			          </div>
			          <!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<?php foreach ($getpr as $value) {?>
<!-- Custom background color -->
								<div id="open<?php echo $value->pr_prno; ?>" class="modal fade">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h5 class="modal-title">Open Detail PR No.: <?php echo $value->pr_prno; ?></h5>
											</div>

											<div class="modal-body">
												<div class="row">
									                <div class="col-md-6">
									                  <div class="form-group">
									                    <h5 for="">PR No.:</h5>
									                    <small>&nbsp&nbsp <?php echo $value->pr_prno;?></small>
									                    <input type="hidden" class="pr form-control" id="pr" value="<?php echo $value->pr_prno;?>">
									                  </div>
									               </div>
									               <div class="col-md-6">
									                    <h5 for="">PR Date:</h5>
									                    <small>&nbsp&nbsp <?php echo date('d/m/Y' ,strtotime($value->pr_prdate)); ?></small>
									               </div>
									             </div>
									             <div class="row">
									               <div class="col-md-6">
									                    <h5 for="">Name :</h5>
									                    <small>&nbsp&nbsp <?php echo $value->pr_reqname;?></small>
									               </div>
									               <div class="col-md-6">
									                 <h5 for="">Project/Department:</h5>
									                  <small>&nbsp&nbsp <?php echo $value->project_name;?><?php echo $value->department_title; ?></small>
									               </div>
									             </div>
									             <div class="row">
									               <div class="col-md-6">
									                    <h5 for="">Delivery Date:</h5>
									                     <small>&nbsp&nbsp <?php echo date('d/m/Y' ,strtotime($value->pr_delidate)); ?></small>
									               </div>
									             </div>
									              <div class="row">
									              <div class="col-md-6">
									                 <h5 for="">Place:</h5>
									                  <small>&nbsp&nbsp <?php echo $value->pr_deliplace;?></small>
									               </div>
									               <div class="col-md-6">
									                 <h5 for="">Remark:</h5>
									                  <small>&nbsp&nbsp <?php echo $value->pr_remark;?></small>
									               </div>
									             </div>

											</div>
											<table class="table">
													<thead>
														<tr>
								                          <th>รหัสต้นทุน</th>
								                          <th>ชื่อวัสดุ</th>
								                          <th>จำนวน</th>
								                         </tr>
								                      </thead>
								                      <tbody>
								                          <?php   $n =1;?>

								                          <?php
								                          $prpr = $value->pr_prno;
								                          $this->db->select('*');
								                          $this->db->where('pri_ref', $prpr);
								                          $q =  $this->db->get('pr_item');
								                          $res = $q->result();
								                          foreach ($res as $valj){ ?>
								                        <tr>
								                         <td><?php echo substr($valj->pri_costcode, -5); ?></td>
								                          <td><?php echo $valj->pri_matname; ?></td>
								                           <td><?php echo $valj->pri_qty; ?>&nbsp;<?php echo $valj->pri_unit; ?></td>
								                         </tr>
								                          <?php $n++; } ?>
								                      </tbody>
												</table>
												<div class="row">
													<div class="form-group">
														<div class="modal-footer">
															<button type="button" class="btn bg-teal-600" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
										</div>
									</div>
								</div>
								<!-- /custom background color -->
							<?php } ?>
			<script>
				// Initialize charts
    progressCounter('#hours-available-progress', 38, 2, "#F06292", 0.68, "icon-folder-open text-pink-400", '<?php echo $countallpr; ?>', 'PR Enable')
    progressCounter('#goal-progress', 38, 2, "#5C6BC0", 0.82, "icon-watch text-indigo-400", '<?php echo $countprdisapprove; ?>', 'PR Pending')
    progressCounter('#goal-approve', 38, 2, "#66BB6A", 0.82, "icon-checkmark4 text-success-400", '<?php echo $countapprovepr; ?>', 'PR Approve')

      // Chart setup
    function progressCounter(element, radius, border, color, end, iconClass, textTitle, textAverage) {


        // Basic setup
        // ------------------------------

        // Main variables
        var d3Container = d3.select(element),
            startPercent = 0,
            iconSize = 32,
            endPercent = end,
            twoPi = Math.PI * 2,
            formatPercent = d3.format('.0%'),
            boxSize = radius * 2;

        // Values count
        var count = Math.abs((endPercent - startPercent) / 0.01);

        // Values step
        var step = endPercent < startPercent ? -0.01 : 0.01;



        // Create chart
        // ------------------------------

        // Add SVG element
        var container = d3Container.append('svg');

        // Add SVG group
        var svg = container
            .attr('width', boxSize)
            .attr('height', boxSize)
            .append('g')
                .attr('transform', 'translate(' + (boxSize / 2) + ',' + (boxSize / 2) + ')');



        // Construct chart layout
        // ------------------------------

        // Arc
        var arc = d3.svg.arc()
            .startAngle(0)
            .innerRadius(radius)
            .outerRadius(radius - border);



        //
        // Append chart elements
        //

        // Paths
        // ------------------------------

        // Background path
        svg.append('path')
            .attr('class', 'd3-progress-background')
            .attr('d', arc.endAngle(twoPi))
            .style('fill', '#eee');

        // Foreground path
        var foreground = svg.append('path')
            .attr('class', 'd3-progress-foreground')
            .attr('filter', 'url(#blur)')
            .style('fill', color)
            .style('stroke', color);

        // Front path
        var front = svg.append('path')
            .attr('class', 'd3-progress-front')
            .style('fill', color)
            .style('fill-opacity', 1);



        // Text
        // ------------------------------

        // Percentage text value
        var numberText = d3.select(element)
            .append('h2')
                .attr('class', 'mt-15 mb-5')

        // Icon
        d3.select(element)
            .append("i")
                .attr("class", iconClass + " counter-icon")
                .attr('style', 'top: ' + ((boxSize - iconSize) / 2) + 'px');

        // Title
        d3.select(element)
            .append('div')
            	.attr('class', 'das text-muted')
                .text(textTitle);

        // Subtitle
        d3.select(element)
            .append('div')
                .text(textAverage);



        // Animation
        // ------------------------------

        // Animate path
        function updateProgress(progress) {
            foreground.attr('d', arc.endAngle(twoPi * progress));
            front.attr('d', arc.endAngle(twoPi * progress));
             //numberText.text(formatPercent(progress));
        }

        // Animate text
        var progress = startPercent;
        (function loops() {
            updateProgress(progress);
            if (count > 0) {
                count--;
                progress += step;
                setTimeout(loops, 10);
            }
        })();
    }
			</script>
