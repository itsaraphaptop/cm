<?php foreach ($proj as $e) {
              $projid = $e->project_id;
              $projcode = $e->project_code;
              $projname = $e->project_name;
              $projaddr = $e->project_address;
              // $system = $e->project_worktype;
              $typejob = $e->project_type;
              $contact = $e->project_cname;
              $custype = $e->project_biztype;
              $phonenumber = $e->project_tel;
              $fax = $e->project_fax;
              $email = $e->project_email;

              $ownercode = $e->project_mcode;
              $ownername_th = $e->project_mnameth;
              $ownername_en = $e->project_mnameen;
              $owner_address = $e->project_maddress;
              $owner_phonenumber = $e->project_onertel;
              $owner_fax = $e->project_mfax;
              $owner_email = $e->project_owneremail;
			  $bussiness_code = $e->bussiness_code;
              $contractor_name_th = $e->project_bnameth;
              $contractor_name_en = $e->project_bnameen;
              $contractor_address = $e->project_baddress;
              $contractor_phonenumber = $e->project_btel;
              $contractor_fax = $e->project_bfax;
              $project_img = $e->project_img;
              $projectdetail = $e->project_detail;
              $projectval = $e->project_value;
              $insurcontract = $e->project_contract;
              $startproject = $e->project_start;
              $endtproject = $e->project_stop;
              $projectmanager = $e->project_engineer;
              $projectwt = $e->project_wt;
              $projectvat = $e->project_vat;
              $projectbudget = $e->project_budget;
              $projectboq = $e->project_boq;
              $projectadvance_1 = $e->project_advance_1;     
              $projectadvance_2 = $e->project_advance_2;  
              $projectlessadvance = $e->project_lessadvance;
              $projectlessadvance_2 = $e->project_lessadvance_2;
              $projectlessretention = $e->project_lessretention;
              $projectlessretention_2 = $e->project_lessretention_2;
              $retentionmethod = $e->project_lessretentionmethod;
              $bd_tenid = $e->bd_tenid;
              $bd_tenname = $e->bd_tenname;
              $gl_for_ic = $e->gl_for_ic;
              $controlbg = $e->controlbg;
              $chkconbqq = $e->chkconbqq;
              $project_substatus = $e->project_substatus;
              $acc_primary = $e->acc_primary;
              $acc_secondary = $e->acc_secondary;
              $worktype = $e->project_worktype;
              $compcode =$e->compcode;
              $pro_type =$e->project_type;
              $pro_job =$e->project_biztype;
              $prode =$e->project_department;
              $remarkadmin =$e->remark_admin;
              $remarkcontact =$e->remark_contact;
              $remarkconsult =$e->remark_consult;
              $remarksubpro =$e->remark_subpro;
            }
            $this->db->select('*');
              $this->db->where('act_code',$acc_primary);
              $pri = $this->db->get('account_total')->result();
              if ($pri) {
                foreach ($pri as $prima) {
                $pri_name = $prima->act_name;
              }
              }else{
                $pri_name = "";
              }
             
              $this->db->select('*');
              $this->db->where('act_code',$acc_secondary);
              $sec = $this->db->get('account_total')->result();
              if ($sec) {
                foreach ($sec as $seco) {
                $sec_name = $seco->act_name;
                }
              }else{
                $sec_name = "";
              }
                $this->db->select('*');
                $this->db->join('project', 'project.project_worktype = master_business.business_code');
                $getbusi1 = $this->db->get('master_business')->result();

                // foreach ($getbusi1 as $busi1) {
                // $namebusi1 = $busi1->business_name;
                // }

                // $this->db->select('*');
                // $this->db->where('business_code !=',$worktype);
                // $this->db->where('compcode',$compcode);
                // $this->db->where('status','Y');
                // $getbusi2 = $this->db->get('master_business')->result();  

                // $this->db->select('*');
                // $this->db->join('project', 'project.project_type = master_jobdesc.job_code');
                // $getdesc = $this->db->get('master_jobdesc')->result();

                // foreach ($getdesc as $desc) {
                // $desc_name = $desc->job_name;
                // }

                // $this->db->select('*');
                // $this->db->where('job_code !=',$pro_type);
                // $this->db->where('compcode',$compcode);
                // $this->db->where('job_active','Y');
                // $getdesc2 = $this->db->get('master_jobdesc')->result();  

                // $this->db->select('*');
                // $this->db->join('project', 'project.project_biztype = master_jobtype.type_code');
                // $getjob = $this->db->get('master_jobtype')->result();

                // foreach ($getjob as $job) {
                // $job_name = $job->type_name;
                // }

                // $this->db->select('*');
                // $this->db->where('type_code !=',$pro_job);
                // $this->db->where('compcode',$compcode);
                // $this->db->where('type_active','Y');
                // $getjob2 = $this->db->get('master_jobtype')->result();
          ?>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/wizards/stepy.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/wizard_stepy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/uploader_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>



<div class="page-container">
	<div class="page-content">
		<div class="content-wrapper">
<div class="content">
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">
			<i class="icon-cog3 position-left"></i> Setup Edit Project
			<p></p>
		</h5>
	</div>
	
<div class="panel-body">
	<div class="col-md-2">
		<div class="form-group">
			<div class="col-sm-10">
				<form action="<?php echo base_url(); ?>index.php/upload/projectprofile/
<?php echo $projcode;?>" method="post" enctype="multipart/form-data">
<img src="<?php echo base_url();?>project/<?=$project_img?>"
 id="imgcomp" class="img-responsive">
<input class="form-control" type="file" name="userfilepro" size="10" OnChange="showPreviewcomp(this)">
<button type="submit" class="btn btn-primary btn-block">Save Picture</button>
</form>
</div>
</div>
</div>
<div class="col-md-10">
	<form class="stepy-clickable form-horizontal" id="formdata" method="post" action="<?php echo base_url(); ?>datastore/updateproject">
		<div class="tabbable">
			<ul class="nav nav-tabs nav-tabs-highlight">
				<li class="active">
					<a href="#bottom-tab2" data-toggle="tab">Job Detail</a>
				</li>
				<li>
					<a href="#bottom-tab1" data-toggle="tab">Project Detail</a>
				</li>
				<li>
					<a href="#bottom-tab3" data-toggle="tab">Admin</a>
				</li>
				<!-- <li>
					<a href="#bottom-tab4" data-toggle="tab">Owner Detail</a>
				</li> -->
				<li>
					<a href="#bottom-tab5" data-toggle="tab">Consultants</a>
				</li>
				<!-- <li>
					<a href="#bottom-tab6" data-toggle="tab">Subcontactor Detail</a>
				</li> -->
			</ul>

			<div class="tab-content">
				<div class="tab-pane" id="bottom-tab1">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Type :</label>
									<div class="col-sm-8">
										<label class="radio-inline">
											<input type="radio" name="radioprode" class="styled" <?php if($prode==1){echo 'checked="checked"';}
											 ?> value="1"> Project
										</label>
										<label class="radio-inline">
											<input type="radio" name="radioprode" class="styled" value="2" <?php if($prode==2){echo
											 'checked="checked"';} ?>> Department
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Project/Dep. Code :</label>
									<div class="col-sm-8">
										<input name="projno" id="projno" placeholder="Project Code" class="form-control input-sm" type="text" value="<?php echo $projcode; ?>"
										 readonly>
										<input type="hidden" name="projid" id="proid" class="form-control" value="<?php echo $projid; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Project/Dep. Name :</label>
									<div class="col-sm-8">
										<input name="projname" id="projname" placeholder="Project Name" class="form-control input-sm" value="<?php echo $projname; ?>"
										 required="" type="text">
									</div>
								</div>
								<!-- <div class="form-group">
											<div class="col-sm-10">
												<label class="checkbox-inline checkbox-right">
													<div id="check_store">
														<span class="checked">
															<input id="store_center" name="store_center" type="checkbox" class="styled" value="0">
														</span>
													</div>
													เลือกเป็น Store Center :
												</label>
											</div>
                    			</div> -->
								<div class="form-group">
									<label class="col-sm-4 control-label">Proj./Dep. Address :
										<!-- <a>
													<span class="label label-primary" data-toggle="modal" data-target="#eart">
														<i class="icon-sphere"></i>
													</span>
												</a> -->
									</label>
									<div class="col-sm-8">
										<input name="address" value="<?php echo $projaddr; ?>" rows="3" class="form-control input-sm"
										 cols="40" placeholder="Plase input Project Address">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="custype">Business Job Type</label>
									<div class="col-sm-8">
										<select class="form-control input-sm" name="custype" id="custype">
											<?php foreach ($getjobtype as $type) {  ?>
											<option value="<?php echo $type->type_code; ?>" <?php if($pro_job==$type->type_code){echo "selected='selected'";} ?>>	<?php echo $type->type_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="butype">Business Unit</label>
									<div class="col-sm-8">
										<select class="form-control input-sm" name="butype" id="butype">
										<?php foreach ($getbusi as $des) { ?>
											<option value="<?php echo $des->business_code; ?>"<?php if($bussiness_code==$des->business_code){echo "selected='selected'";} ?> ><?php echo $des->business_name; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">W/T(%) :</label>
									<div class="col-sm-8">
										<input name="project_wt" id="wt" placeholder="W/T(%)" class="form-control input-sm" type="text" value="<?php echo $projectwt; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Vat(%) :</label>
									<div class="col-sm-8">
										<input name="project_vat" id="vat" placeholder="Vat(%)" class="form-control input-sm" type="text" value="<?php echo $projectvat;?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Jobs Detail :</label>
									<div class="col-sm-8">
										<textarea class="form-control input-sm" name="projectdetail" rows="3"><?php echo $projectdetail; ?></textarea>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class=" form-group ">
									<label class="col-sm-4 control-label ">Insurance Contract/Year :</label>
									<div class="col-sm-6 ">
										<input name="insurcontract" placeholder="กรอกระยะเวลาสัญญา " class="form-control input-sm " type="text" value="<?php echo $insurcontract; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Start Project/Dep :</label>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon-calendar22"></i>
												</span>
												<input type="date" class="form-control input-sm" id="startproject" name="startproject" value="<?php echo $startproject; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Close Project/Dep :</label>
									<div class="col-sm-6">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="icon-calendar22"></i>
											</span>
											<input type="date" class="form-control input-sm" id="endtproject" name="endtproject" value="<?php echo $endtproject; ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">A/C I/C Primary :</label>
									<div class="col-sm-2">
										<input type="text" id="accno" class="form-control input-sm" readonly="" name="accno" value="<?php echo $acc_primary; ?>">
									</div>
									<div class="col-sm-4">
										<div class="input-group">
											<input name="accountname" id="accountname" required class="form-control input-sm" type="text" readonly="" value="<?php echo $pri_name; ?>">
											<div class="input-group-btn">
												<a class="primary btn btn-info btn-icon input-sm" data-toggle="modal" data-target="#primary">
													<i class="icon-search4"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">A/C I/C Secondary :</label>
									<div class="col-md-2">
										<input type="text" id="acc_no" class="form-control input-sm" readonly="" name="acc_no" value="<?php echo $acc_secondary; ?>">
									</div>
									<div class="col-md-4">
										<div class="input-group">
											<input name="acc_name" id="acc_name" required class="form-control input-sm" type="text" readonly="" value="<?php echo $sec_name; ?>">
											<div class="input-group-btn">
												<a class="secondary btn btn-info btn-icon input-sm" data-toggle="modal" data-target="#secondary">
													<i class="icon-search4"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Advance :</label>
									<div class="col-sm-6">
										<div class="input-group">
											<input name="projectadvance_1" placeholder="" class="form-control input-sm" type="text" style="text-align: right;" value="<?php echo $projectadvance_1; ?>">
											<span class="input-group-addon bg-primary">%</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Less Retention :</label>
									<div class="col-sm-6">
										<div class="input-group">
											<input name="projectlessretention" placeholder="" class="form-control input-sm" type="text" style="text-align: right;" value="<?php echo $projectlessretention ; ?>">
											<span class="input-group-addon bg-primary"> % </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Less Advance :</label>
									<div class="col-sm-6">
										<div class="input-group">
											<input name="projectlessadvance" placeholder="" class="form-control input-sm" type="text" style="text-align: right;" value="<?php echo $projectlessadvance; ?>">
											<span class="input-group-addon bg-primary"> % </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Less Retention Method :</label>
									<div class="col-sm-6">
										<select class="form-control input-sm" name="retentionmethod">
											<?php if($retentionmethod == '1'){ ?>
											<option value="1" selected>Progress</option>
											<?php } else { ?>
											<option value="1">Progress</option>
											<?php }?>
											<?php if($retentionmethod == '2'){ ?>
											<option value="2" selected>Progress + Vat</option>
											<?php } else { ?>
											<option value="2">Progress + Vat</option>
											<?php }?>
										</select>
									</div>
								</div>
							</div>


						</div>
						<br>
						<div class="row">
							<div class="col-md-10" style="text-align: right;">
								<a class="close_project btn btn-danger" project_id="<?php echo $e->project_id; ?>">
									<i class="icon-close2"></i> Close Project/Department</a>
							</div>
							<div class="col-md-1" style="text-align: right;">
								<a href="<?php echo base_url(); ?>data_master/setup_project_main" type="button"
								 class="btn btn-default"> Close </a>
							</div>
							<div class="col-md-1">
								<a type="button" class="btn btn-primary btnNext"> Next </a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tab 1 -->


				<!-- start Tab 2 -->
				<div class="tab-pane active" id="bottom-tab2">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="col-sm-3">
										<a class="btn btn-default btn-icon btn-xs">
											GL for IC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<?php  if ($gl_for_ic=='1') {?>
											<input type="checkbox" class="styled" checked name="chkgl" value="1">
											<?php }else{ ?>
											<input type="checkbox" class="styled"  name="chkgl" value="1">
											<?php } ?>
										</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<div class="input-group">
											<span class="input-group-btn">
												<a class="tender btn btn-default btn-icon btn-xs">Control BOQ &nbsp;&nbsp;
													<?php  if ($chkconbqq=='1') {?>
													<label>
														<input type="checkbox" class="styled" checked name="chkconbqq" value="1">
													</label>
													<?php }else{ ?>
													<label>
														<input type="checkbox" name="chkconbqq" value="1"> </label>
													<?php } ?>
												</a>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Control Budget :</label>
									<div class="col-sm-6">
										<select type="text" class="form-control" id="controlbg" name="controlbg">
											<?php if($controlbg == '1'){ ?>
											<option value="1" selected>Not Control</option>
											<?php } else { ?>
											<option value="1">Not Control</option>
											<?php }?>
											<?php if($controlbg == '2'){ ?>
											<option value="2" selected>by Summary Cost Code</option>
											<?php } else { ?>
											<option value="2">by Summary Cost Code</option>
											<?php }?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Tender No/BOQ Control :</label>
									<div class="col-sm-6">
										<div class="input-group">
											<input type="hidden" class="form-control" id="bd_tenid" name="bd_tenid" readonly="true" value="<?php echo $bd_tenid; ?>">
											<input type="text" class="form-control" id="bd_tenname" name="bd_tenname" readonly="true" value="<?php echo $bd_tenname; ?>">
											<span class="input-group-btn">
												<button type="button" id="tender_click" class="tender btn btn-info btn-icon">
													<i class="icon-search4"></i>
												</button>
												<a class="clearla btn btn-default btn-icon">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Contract Amount :</label>
									<div class="col-sm-6">
										<input name="projectval" id="projectval" placeholder="กรอกมูลค่าโครงการ" class="form-control input-sm" type="text" value="<?php echo $projectval; ?>">
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<div class="col-sm-2">
										<a class="insrows btn bg-info">
											<i class="icon-plus2"></i> เพิ่มระบบงาน</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12" id="tdetailx">
										<div class="table-responsive">
											<table class="table table-bordered table-xxs table-hover">
												<thead>
													<tr>
														<td width="5px;">No.</td>
														<td>Job Name</td>
														<td width="20%">Job Amount</td>
														<td>Active</td>
													</tr>
												</thead>
												<tbody id="body">
													<?php
                            $this->db->select('*');
                            $this->db->join('system', 'system.systemcode = project_item.projectd_job','left outer');
							$this->db->where('project_code',$projcode);
							$this->db->where('system.compcode',$compcodes);
                            $result = $this->db->get('project_item')->result();
                            $i = 1;
                              foreach($result  as $item) {
                                 $itemcode = $item->projectd_job;
                                 $itename = $item->systemname;
                               
                            $this->db->select('*');
                            // $this->db->join('system', 'system.systemcode = project_item.projectd_job');
                            // $this->db->where('project_code',$projcode);
                            $this->db->where('compcode',$compcodes);
                            // $this->db->where('systemcode != ',$itemcode);
                            $result2 = $this->db->get('system')->result();   
                              ?>
													<tr class="tr">
														<td>
															<?php echo $i; ?>
															<input type="hidden" name="chki[]" value="get">
															<input type="hidden" name="idi[]" value="<?php echo $item->id; ?>">
														</td>
														<td>

															<select class="form-control" name="job_id[]">
																<option value="<?php echo $itemcode; ?>">
																	<?php echo $itename; ?>
																</option>
																<?php 
                                      foreach ($result2 as $job2) { ?>
																<option value="<?php echo $job2->systemcode; ?>">
																	<?php echo $job2->systemname; ?>
																</option>
																<?php } ?>
															</select>
														</td>
														<td>
															<input type="text" class="form-control" name="job_amount[]" value="<?php echo $item->job_amount; ?>">
														</td>
														<td>
															<button type="button" class="delitem label label-danger disbled" pro_code="<?php echo $projcode; ?>"
															 sys_id="<?=$itemcode; ?>">Delete</button>
														</td>
													</tr>
													<?php $i++;} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-1" style="text-align: right;">
								<a type="button" class="btn btn-default btnPrevious"> Previous </a>
							</div>
							<div class="col-md-1">
								<a type="button" class="btn btn-primary btnNext"> Next </a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tab 2 -->


				<!-- Start Tab 3 -->
				<div class="tab-pane" id="bottom-tab3">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="col-sm-3">
										<a class="badmin btn bg-info">
											<i class="icon-plus2"></i> เพิ่มผู้ดูแล</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12" id="tdetail">
										<div class="table-responsive">
											<table class="table table-bordered table-xxs table-hover">
												<thead>
													<tr>
														<td width="5px;">No.</td>
														<td>Name</td>
														<td>Position</td>
														<td>Telephone</td>
														<td>Email</td>
														<td>Active</td>
													</tr>
												</thead>
												<tbody id="bodyadmin">
													<?php
                                $this->db->select('projectm_id, mpro_adid, mpro_adname, mpro_adposition, mpro_adtel, mpro_ademail');
                                $this->db->join('project', 'project.project_id = project_member.ref_project');
                                $this->db->where('project_id',$projid);
                                $this->db->where('mpro_adid !=','');
                                $this->db->where('active !=','del');
                                $result = $this->db->get('project_member')->result();
                                $i = 1;
                                  foreach($result  as $member) {
                                     $adid = $member->mpro_adid;
                                     $adname = $member->mpro_adname;
                                     $adposition = $member->mpro_adposition;
                                     $adtel = $member->mpro_adtel;
                                     $ademail = $member->mpro_ademail;
                                ?>
													<tr class="tr<?php echo $adid; ?>">
														<td>
															<?php echo $i; ?>
															<input type="hidden" name="chkadi[]" value="get">
															<input type="hidden" name="addi[]" value="<?php echo $adid; ?>">
														</td>
														<td>
															<input type="text" class="form-control" name="adminname[]" value="<?php echo $adname; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="adminposi[]" value="<?php echo $adposition; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="admintel[]" value="<?php echo $adtel; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="adminemail[]" value="<?php echo $ademail; ?>">
														</td>
														<td>
															<a class="delete-admin btn btn-xs btn-danger" tagetdel="admin" iddel="<?php echo $adid; ?>">
																Delete
															</a>
														</td>
													</tr>
													<?php $i++;}  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-1" style="text-align: right;">
								<a type="button" class="btn btn-default btnPrevious"> Previous </a>
							</div>
							<div class="col-md-1">
								<a type="button" class="btn btn-primary btnNext"> Next </a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tab 3 -->


				<!-- Start Tab 4 -->
				<div class="tab-pane" id="bottom-tab4">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Owner Code :</label>
									<div class="col-sm-6">
										<div class="input-group">
											<input name="ownercode" id="ownercode" readonly="" placeholder="กรอกรหัสเจ้าของโครงการ" required class="form-control input-sm"
											 type="text" value="<?php echo $ownercode; ?>">
											<div class="input-group-btn">
												<a class="debtor btn btn-info btn-icon input-sm" data-toggle="modal" data-target="#debtorshow">
													<i class="icon-search4"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Owner Name (TH) :</label>
									<div class="col-sm-6">
										<input name="ownername_th" id="ownername_th" placeholder="กรอกชื่อภาษาไทย" class="form-control input-sm" type="text" value="<?php echo $ownername_th; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Owner Name (EN) :</label>
									<div class="col-sm-6">
										<input name="ownername_en" id="ownername_en" placeholder="กรอกชื่อภาษาอังกฤษ" class="form-control input-sm" type="text" value="<?php echo $ownername_en; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Address :</label>
									<div class="col-sm-6">
										<textarea class="form-control input-sm" name="owner_address" id="owner_address" rows="4" cols="40" placeholder="กรอกชื่อที่อยู่"><?php echo $owner_address; ?></textarea>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Telephone :</label>
									<div class="col-sm-6">
										<input name="owner_phonenumber" id="owner_phonenumber" placeholder="เบอร์โทร" class="form-control input-sm" type="tel" value="<?php echo $owner_phonenumber; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">FAX :</label>
									<div class="col-sm-6">
										<input name="owner_fax" id="owner_fax" placeholder="แฟกซ์" class="form-control input-sm" type="tel" value="<?php echo $owner_fax; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">E-Mail :</label>
									<div class="col-sm-6">
										<input name="owner_email" id="owner_email" placeholder="อีเมล" class="form-control input-sm" type="text" value="<?php echo $owner_email; ?>">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="col-sm-3">
										<a class="bcontact btn bg-info">
											<i class="icon-plus2"></i> เพิ่มผู้ติดต่อโครงการ</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-bordered table-xxs table-hover">
												<thead>
													<tr>
														<td width="5px;">No.</td>
														<td>Name</td>
														<td>Position</td>
														<td>Telephone</td>
														<td>Email</td>
														<td>Active</td>
													</tr>
												</thead>
												<tbody id="bodycontact">
													<?php
                                $this->db->select('projectm_id, mpro_conid, mpro_conname, mpro_conposition, mpro_contel, mpro_conemail');
                                $this->db->join('project', 'project.project_id = project_member.ref_project');
                                $this->db->where('project_id',$projid);
                                $this->db->where('mpro_conid !=','');
                                $this->db->where('active !=','del');
                                $result = $this->db->get('project_member')->result();
                                $i = 1;
                                  foreach($result  as $member) {
                                     $conid = $member->mpro_conid;
                                     $conname = $member->mpro_conname;
                                     $conposition = $member->mpro_conposition;
                                     $contel = $member->mpro_contel;
                                     $conemail = $member->mpro_conemail;
                                ?>
													<tr class="tr<?php echo $conid; ?>">
														<td>
															<?php echo $i; ?>
															<input type="hidden" name="chkconi[]" value="get">
															<input type="hidden" name="condi[]" value="<?php echo $conid; ?>">
														</td>
														<td>
															<input type="text" class="form-control" name="contactname[]" value="<?php echo $conname; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="contactposi[]" value="<?php echo $conposition; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="contacttel[]" value="<?php echo $contel; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="contactemail[]" value="<?php echo $conemail; ?>">
														</td>
														<td>
															<a class="delete-contact btn btn-xs btn-danger" tagetdel="contact" iddel="<?php echo $conid; ?>">Delete</a>
														</td>
													</tr>
													<?php $i++;}  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-1" style="text-align: right;">
								<a type="button" class="btn btn-default btnPrevious"> Previous </a>
							</div>
							<div class="col-md-1">
								<a type="button" class="btn btn-primary btnNext"> Next </a>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tab 4 -->

				<!-- Start Tab 5 -->
				<div class="tab-pane" id="bottom-tab5">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="col-sm-3">
										<a class="bconsult btn bg-info">
											<i class="icon-plus2"></i> เพิ่มที่ปรึกษาโครงการ</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="table-responsive">
											<table class="table table-bordered table-xxs table-hover">
												<thead>
													<tr>
														<td width="5px;">No.</td>
														<td>Name</td>
														<td>Position</td>
														<td>Telephone</td>
														<td>Email</td>
														<td>Active</td>
													</tr>
												</thead>
												<tbody id="bodyconsult">
													<?php
                                $this->db->select('projectm_id, mpro_consultid, mpro_consultname, mpro_consultposition, mpro_consulttel, mpro_consultemail');
                                $this->db->join('project', 'project.project_id = project_member.ref_project');
                                $this->db->where('project_id',$projid);
                                $this->db->where('mpro_consultid !=','');
                                $this->db->where('active !=','del');
                                $result = $this->db->get('project_member')->result();
                                $i = 1;
                                  foreach($result  as $member) {
                                     $consid = $member->mpro_consultid;
                                     $consname = $member->mpro_consultname;
                                     $consposition = $member->mpro_consultposition;
                                     $constel = $member->mpro_consulttel;
                                     $consemail = $member->mpro_consultemail;
                                ?>
													<tr class="tr<?php echo $consid; ?>">
														<td>
															<?php echo $i; ?>
															<input type="hidden" name="chkconsi[]" value="get">
															<input type="hidden" name="consi[]" value="<?php echo $consid; ?>">
														</td>
														<td>
															<input type="text" class="form-control" name="consultname[]" value="<?php echo $consname; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="consultposi[]" value="<?php echo $consposition; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="consulttel[]" value="<?php echo $constel; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="consultemail[]" value="<?php echo $consemail; ?>">
														</td>
														<td>
															<a class="delete-consult btn btn-xs btn-danger" tagetdel="consult" iddel="<?php echo $consid; ?>">Delete</a>
														</td>
													</tr>
													<?php $i++;}  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-1" style="text-align: right;">
								<a type="button" class="btn btn-default btnPrevious"> Previous </a>
							</div>
							<!-- <div class="col-md-1">
								<a type="button" class="btn btn-primary btnNext"> Next </a>
							</div> -->
							<div class="col-md-1">
								<button type="button" id="updateform" class="save btn btn-success">
									<i class="icon-floppy-disk"></i> Save</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End Tab 5 -->


				<!-- Start Tab 6 -->
				<div class="tab-pane" id="bottom-tab6">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">SubContactor Name (TH) :</label>
									<div class="col-sm-6">
										<input name="contractor_name_th" placeholder="กรอกชื่อภาษาไทย" class="form-control input-sm" type="text" value="<?php echo $contractor_name_th; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">SubContactor Name (EN) :</label>
									<div class="col-sm-6">
										<input name="contractor_name_en" placeholder="กรอกชื่อภาษาอังกฤษ" class="form-control input-sm" type="text" value="<?php echo $contractor_name_en; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Address :</label>
									<div class="col-sm-6">
										<textarea class="form-control input-sm" name="contractor_address" rows="4" cols="40" placeholder="กรอกชื่อที่อยู่"><?php echo $contractor_address; ?></textarea>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-sm-4 control-label">Telephone :</label>
									<div class="col-sm-6">
										<input name="contractor_phonenumber" placeholder="เบอร์โทร" class="form-control input-sm" type="tel" value="<?php $contractor_phonenumber; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">FAX :</label>
									<div class="col-sm-6">
										<input name="contractor_fax" placeholder="แฟกซ์" class="form-control input-sm" type="tel" value="<?php echo $contractor_fax; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">E-Mail :</label>
									<div class="col-sm-6">
										<input name="contractor_email" placeholder="อีเมล" class="form-control input-sm" type="text">
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="col-sm-3">
										<a class="bsubpro btn bg-info">
											<i class="icon-plus2"></i> เพิ่มผู้ติดต่อผู้รับเหมา</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-bordered table-xxs table-hover">
												<thead>
													<tr>
														<td width="5px;">No.</td>
														<td>Name</td>
														<td>Position</td>
														<td>Telephone</td>
														<td>Email</td>
														<td>Active</td>
													</tr>
												</thead>
												<tbody id="bodysubpro">
													<?php
                                $this->db->select('projectm_id, mpro_subid, mpro_subproname, mpro_subproposition, mpro_subprotel, mpro_subproemail');
                                $this->db->join('project', 'project.project_id = project_member.ref_project');
                                $this->db->where('project_id',$projid);
                                $this->db->where('mpro_subid !=','');
                                $this->db->where('active !=','del');
                                $result = $this->db->get('project_member')->result();
                                $i = 1;
                                  foreach($result  as $member) {
                                     $subproid = $member->mpro_subid;
                                     $subproname = $member->mpro_subproname;
                                     $subproposition = $member->mpro_subproposition;
                                     $subprotel = $member->mpro_subprotel;
                                     $subproemail = $member->mpro_subproemail;
                                ?>
													<tr class="tr<?php echo $subproid; ?>">
														<td>
															<?php echo $i; ?>
															<input type="hidden" name="chksubsi[]" value="get">
															<input type="hidden" name="subi[]" value="<?php echo $subproid; ?>">
														</td>
														<td>
															<input type="text" class="form-control" name="subproname[]" value="<?php echo $subproname; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="subproposi[]" value="<?php echo $subproposition; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="subprotel[]" value="<?php echo $subprotel; ?>">
														</td>
														<td>
															<input type="text" class="form-control input-sm" name="subproemail[]" value="<?php echo $subproemail; ?>">
														</td>
														<td>
															<a class="delete-subpro btn btn-xs btn-danger" tagetdel="subpro" iddel="<?php echo $subproid; ?>">Delete</a>
														</td>
													</tr>
													<?php $i++;}  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-10"></div>
							<div class="col-md-1" style="text-align: right;">
								<a type="button" class="btn btn-default btnPrevious"> Previous </a>
							</div>
							
						</div>
					</div>
				</div>
				<!-- End Tab 6 -->




			</div>

		</div>
	</form>
</div>

</div>


</div>

</div>

</div>

</div>
</div>


<script type="text/javascript">
	$("#tender_click").click(function(event) {
		// alert("ลบ");
		var pro_code = "<?php echo $projcode; ?>";
		// swal(pro_code);
		swal({
				title: "คุณแน่ใจว่าต้องการเปลี่ยน Tender?",
				text: "ระบบจะทำการลบข้อมูล Tender ก่อนหน้า!",
				type: "error",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function() {
				$.post('<?php echo base_url(); ?>bd/del_detail_pro/' + pro_code,
					function() {}).done(function(data) {
					console.log(data);
					var json_res = jQuery.parseJSON(data);
					// alert(json_res.status);
					if (json_res.status === true) {
						swal("Deleted!", "Your imaginary file has been deleted.", "success");
						$("#tender").modal('show');
					} else {
						swal("Deleted Error", "Your imaginary file has been deleted.", "error");
					}
				});

			});
	});
</script>

<script>
	$('.btnNext').click(function() {
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	});
	$(".btnPrevious").click(function() {
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});

	$('#subvali').click(function(event) {
		var ownername_th = $('#ownername_th').val();
		var ownercode = $('#ownercode').val();
		var owner_address = $('#owner_address').val();
		if (ownername_th == '')
			alert('กรุณากรอก ชื่อเจ้าของ');
		else if (ownercode == '')
			alert('กรุณากรอก รหัสเจ้าของ');
		else if (owner_address == '')
			alert('กรุณากรอก ที่อยู่เจ้าของ')
	});
</script>

<!-- /clickable title -->
<div id="debtorshow" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">Select Owner</h6>
			</div>
			<div class="modal-body">
				<div id="loaddebtor"></div>
			</div>
		</div>
	</div>
</div>
<div id="primary" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">เลือก Account Code</h6>
			</div>
			<div class="modal-body">
				<div id="loadprimary"></div>
			</div>
		</div>
	</div>
</div>
<div id="secondary" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6 class="modal-title">เลือกเจ้าของโครงการ</h6>
			</div>
			<div class="modal-body">
				<div id="loadsecondary"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$('.debtor').click(function() {
		$('#loaddebtor').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loaddebtor').load('<?php echo base_url(); ?>index.php/share/debtor');
	});
	$('.primary').click(function() {
		$('#loadprimary').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loadprimary').load(
			'<?php echo base_url(); ?>index.php/share/accchart1');
	});
	$('.secondary').click(function() {
		$('#loadsecondary').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$('#loadsecondary').load(
			'<?php echo base_url(); ?>index.php/share/accchart2');
	});
</script>

<div id="eart" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h6 class="modal-title">Map</h6>
			</div>

			<div class="modal-body">
				<style>
					html,
					body {
						height: 100%;
						margin: 0;
						padding: 0;
					}

					#map {
						width: 100%;
						height: 400px;
					}

					.controls {
						margin-top: 10px;
						border: 1px solid transparent;
						border-radius: 2px 0 0 2px;
						box-sizing: border-box;
						-moz-box-sizing: border-box;
						height: 32px;
						outline: none;
						box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
					}

					#searchInput {
						background-color: #fff;
						font-family: Roboto;
						font-size: 15px;
						font-weight: 300;
						margin-left: 12px;
						padding: 0 11px 0 13px;
						text-overflow: ellipsis;
						width: 50%;
					}

					#searchInput:focus {
						border-color: #4d90fe;
					}
				</style>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRbMoDPc_mTv3D3QPqe0Ar84nSvRhA8nk&libraries=places&callback=initMap"
				 async defer></script>
				<script>
					/***** function ในการประกาศค่าเริ่มต้นให้กับแผนที่*****/
					function initMap() {

						/***** กำหนดรายละเอียดคุณสมบัติของแผนที่*****/
						var map = new google.maps.Map(document.getElementById('map'), {
							center: {
								lat: -33.8688,
								lng: 151.2195
							},
							zoom: 13
						});

						/***** กำหนดตำแหน่งที่ตั้งของ control ที่จะวางในแผนที่*****/
						var input = document.getElementById('searchInput');
						map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

						/***** เพิ่ม Feature ให้กับ textbox ให้สามารถพิมพ์ค้นหาสถานที่ได้*****/
						var autocomplete = new google.maps.places.Autocomplete(input);
						autocomplete.bindTo('bounds', map);

						var infowindow = new google.maps.InfoWindow();

						/***** กำหนดคุณสมบัติให้กับตัวพิกัดจุดหรือ marker *****/
						var marker = new google.maps.Marker({
							map: map,
							anchorPoint: new google.maps.Point(0, -29)
						});

						/***** ทำงานกับ event place_changed หรือเมื่อมีการเปลี่ยนแปลงค่าสถานที่ที่ค้นหา*****/
						autocomplete.addListener('place_changed', function() {
							infowindow.close();
							marker.setVisible(false);
							var place = autocomplete.getPlace();
							if (!place.geometry) {
								window.alert("ไม่ค้นพบพิกัดจากสถานที่ดังกล่าว");
								return;
							}

							/***** แสดงผลบนแผนที่เมื่อพบข้อมูลที่ต้องการค้นหา *****/
							if (place.geometry.viewport) {
								map.fitBounds(place.geometry.viewport);
							} else {
								map.setCenter(place.geometry.location);
								map.setZoom(17);
							}
							marker.setIcon(({
								url: place.icon,
								size: new google.maps.Size(71, 71),
								origin: new google.maps.Point(0, 0),
								anchor: new google.maps.Point(17, 34),
								scaledSize: new google.maps.Size(35, 35)
							}));
							marker.setPosition(place.geometry.location);
							marker.setVisible(true);

							/***** แสดงรายละเอียดผลลัพธ์การค้นหา *****/
							var address = '';
							if (place.address_components) {
								address = [
									(place.address_components[0] && place.address_components[0].short_name || ''),
									(place.address_components[1] && place.address_components[1].short_name || ''),
									(place.address_components[2] && place.address_components[2].short_name || '')
								].join(' ');
							}
							/***** แสดงรายละเอียดผลลัพธ์การค้นหาเป็น popup โดยมีชื่อและสถานที่ดังกล่าว *****/
							infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
							infowindow.open(map, marker);

							/***** แสดงรายละเอียดผลลัพธ์การค้นหา ซึ่งประกอบด้วย ที่อยู่ รหัสไปรษณีย์ ประเทศ ละติจูดและลองจิจูด *****/
							for (var i = 0; i < place.address_components.length; i++) {
								if (place.address_components[i].types[0] == 'postal_code') {
									document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
								}
								if (place.address_components[i].types[0] == 'country') {
									document.getElementById('country').innerHTML = place.address_components[i].long_name;
								}
							}
							document.getElementById('location').innerHTML = place.formatted_address;
							document.getElementById('lat').innerHTML = place.geometry.location.lat();
							document.getElementById('lon').innerHTML = place.geometry.location.lng();
						});
					}
				</script>

				<input id="searchInput" class="controls" type="text" placeholder="Enter a location">
				<div id="map"></div>
				<!--ส่วนของการแสดงรายละเอียดผลลัพธ์ที่ได้-->
				<ul id="geoData">
					<li>ที่อยู่:
						<span id="location"></span>
					</li>
					<li>รหัสไปรษณีย์:
						<span id="postal_code"></span>
					</li>
					<li>ประเทศ:
						<span id="country"></span>
					</li>
					<li>ละติจูด:
						<span id="lat"></span>
					</li>
					<li>ลองจิจูด:
						<span id="lon"></span>
					</li>
				</ul>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
</div>

<script>
	function showPreviewcomp(ele) {
		$('#imgcomp').attr('src', ele.value); // for IE
		if (ele.files && ele.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imgcomp').attr('src', e.target.result);
			}
			reader.readAsDataURL(ele.files[0]);
		}
	}
	var projectval_total = 0;
	// add row job
	$(".insrows").click(function() {
		addrow();
		$("[name='job_amount[]']").each(function(index, el) {
			var val = $(el).val();
			projectval_total += (val * 1);

		});
		$("#projectval").val(projectval_total);

	});
	// add row admin

	function addrow() {
		var row = ($('#body tr').length - 0) + 1;
		var tr = '<tr>' +
			'<td>' + row + '<input type="hidden" name="chki[]" value="i"></td>' +
			'<td>' +
			'<select class="form-control input-sm" name="job_id[]">' +
			'<?php foreach ($getsystem as $sys) { ?>' +
			'<option value="<?php echo $sys->systemcode; ?>"><?php echo $sys->systemname; ?></option>' +
			'<?php } ?>' +
			'</select>' +
			'<td>' +
			'<input type="text" name="job_amount[]" class="form-control input-xs" value="0.00"/>' +
			'</td>' +
			'<td>' +
			'<a class="delete label label-danger del">Delete</a></td>' +
			'</td>' +
			'</tr>';
		$('#body').append(tr);
		$('.del').click(function(event) {

			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
		$("[name='job_amount[]']").keyup(function(event) {
			projectval_total = 0;
			$("[name='job_amount[]']").each(function(index, el) {
				var val = $(el).val();
				projectval_total += (val * 1);

			});
			$("#projectval").val(projectval_total);
		});
	}
	// adrows admin
	$(".badmin").click(function() {
		rowadmin();
	});

	// del row admin
	$('.delete-admin').click(function(event) {
		var proid = $('#proid').val();
		var iddel = $(this).attr('iddel');
		var tagetdel = $(this).attr('tagetdel');
		swal({
				title: "ลบ",
				text: "คุณต้องการลบผู้ดูแลนี้ ใช่ไหม?",
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

					// alert(iddel+" "+tagetdel+" "+proid);
					$.post("<?php echo base_url();?>datastore/delete_row", {
						proid: proid,
						iddel: iddel,
						tagetdel: tagetdel
					}, function() {}).done(function(data) {
						var json = jQuery.parseJSON(data);
						if (json.status === true) {
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
							$('.tr' + iddel).remove();
						}
					});
				} else {
					swal("ยกเลิก", null, "error");
				}
			}
		);
	});
	// del row contact
	$('.delete-contact').click(function(event) {
		var proid = $('#proid').val();
		var iddel = $(this).attr('iddel');
		var tagetdel = $(this).attr('tagetdel');
		swal({
				title: "ลบ",
				text: "คุณต้องการลบผู้ติดต่อนี้ ใช่ไหม?",
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

					// alert(iddel+" "+tagetdel+" "+proid);
					$.post("<?php echo base_url();?>datastore/delete_row", {
						proid: proid,
						iddel: iddel,
						tagetdel: tagetdel
					}, function() {}).done(function(data) {
						// alert(data);
						var json = jQuery.parseJSON(data);
						if (json.status === true) {
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
							$('.tr' + iddel).remove();
						}
					});
				} else {
					swal("ยกเลิก", null, "error");
				}
			}
		);
	});
	// del row consult
	$('.delete-consult').click(function(event) {
		var proid = $('#proid').val();
		var iddel = $(this).attr('iddel');
		var tagetdel = $(this).attr('tagetdel');
		swal({
				title: "ลบ",
				text: "คุณต้องการลบที่ปรึกษานี้ ใช่ไหม?",
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

					// alert(iddel+" "+tagetdel+" "+proid);
					$.post("<?php echo base_url();?>datastore/delete_row", {
						proid: proid,
						iddel: iddel,
						tagetdel: tagetdel
					}, function() {}).done(function(data) {
						var json = jQuery.parseJSON(data);
						if (json.status === true) {
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
							$('.tr' + iddel).remove();
						}
					});
				} else {
					swal("ยกเลิก", null, "error");
				}
			}
		);
	});
	// del row subpro
	$('.delete-subpro').click(function(event) {
		var proid = $('#proid').val();
		var iddel = $(this).attr('iddel');
		var tagetdel = $(this).attr('tagetdel');
		swal({
				title: "ลบ",
				text: "คุณต้องการลบผู้ติดต่อนี้ ใช่ไหม?",
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

					// alert(iddel+" "+tagetdel+" "+proid);
					$.post("<?php echo base_url();?>datastore/delete_row", {
						proid: proid,
						iddel: iddel,
						tagetdel: tagetdel
					}, function() {}).done(function(data) {
						var json = jQuery.parseJSON(data);
						if (json.status === true) {
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
							$('.tr' + iddel).remove();
						}
					});
				} else {
					swal("ยกเลิก", null, "error");
				}
			}
		);
	});

	function rowadmin() {
		// alert("5555");
		var row = ($('#bodyadmin tr').length - 0) + 1;
		var tr =
			`<tr>
                        <td>${row}<input type="hidden" name="chkadi[]" value="${row}"></td>
                        <td><input type="text" class="form-control input-sm" name="adminname[]"></td>
                        <td><input type="text" class="form-control input-sm" name="adminposi[]"></td>
                        <td><input type="text" class="form-control input-sm" name="admintel[]"></td>
                        <td><input type="text" class="form-control input-sm" name="adminemail[]"></td>
                        <td><a class="delete btn btn-xs btn-danger del">Delete</a></td>
                      </tr>`;
		// alert(tr);
		$('#bodyadmin').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow admin
	// adrows contact
	$(".bcontact").click(function() {
		rowcontact();
	});

	function rowcontact() {
		// alert("5555");
		var row = ($('#bodycontact tr').length - 0) + 1;
		var tr =
			`<tr>
                        <td>${row}<input type="hidden" name="chkconi[]" value="${row}"></td>
                        <td><input type="text" class="form-control input-sm" name="contactname[]"></td>
                        <td><input type="text" class="form-control input-sm" name="contactposi[]"></td>
                        <td><input type="text" class="form-control input-sm" name="contacttel[]"></td>
                        <td><input type="text" class="form-control input-sm" name="contactemail[]"></td>
                        <td><a class="delete btn btn-xs btn-danger del">Delete</a></td>
                      </tr>`;
		// alert(tr);
		$('#bodycontact').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow contact
	// adrows consult
	$(".bconsult").click(function() {
		rowconsult();
	});

	function rowconsult() {
		// alert("5555");
		var row = ($('#bodyconsult tr').length - 0) + 1;
		var tr =
			`<tr>
                          <td>${row}<input type="hidden" name="chkconsi[]" value="${row}"></td>
                          <td><input type="text" class="form-control input-sm" name="consultname[]"></td>
                          <td><input type="text" class="form-control input-sm" name="consultposi[]"></td>
                          <td><input type="text" class="form-control input-sm" name="consulttel[]"></td>
                          <td><input type="text" class="form-control input-sm" name="consultemail[]"></td>
                          <td><a class="delete btn btn-xs btn-danger del">Delete</a></td>
                        </tr>`;
		// alert(tr);
		$('#bodyconsult').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow consult
	// adrows subpro
	$(".bsubpro").click(function() {
		rowsubpro();
	});

	function rowsubpro() {
		// alert("5555");
		var row = ($('#bodysubpro tr').length - 0) + 1;
		var tr =
			`<tr>
                          <td>${row}<input type="hidden" name="chksubsi[]" value="${row}"></td>
                          <td><input type="text" class="form-control input-sm" name="subproname[]"></td>
                          <td><input type="text" class="form-control input-sm" name="subproposi[]"></td>
                          <td><input type="text" class="form-control input-sm" name="subprotel[]"></td>
                          <td><input type="text" class="form-control input-sm" name="subproemail[]"></td>
                          <td><a class="delete btn btn-xs btn-danger del">Delete</a></td>
                        </tr>`;
		// alert(tr);
		$('#bodysubpro').append(tr);
		$('.del').click(function(event) {
			// $(this).remove();
			$(this).parents("tr:first")[0].remove();
		});
	}
	// close adrow consult
</script>

<div class="modal fade" id="tender" data-backdrop="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">BOQ</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="row" id="tenderr">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(".tender").click(function() {
		$('#tenderr').html(
			"<img src='<?php echo base_url();?>assets/images/loading.gif'> Loading..."
		);
		$("#tenderr").load('<?php echo base_url(); ?>index.php/bd/modalbdtender');
	});
	$("#updateform").click(function() {
		if ($("#projno").val() == "") {
			swal({
				title: "กรุณากรอก Project Code!!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#pro_jname").val() == "") {
			swal({
				title: "กรุณากรอก Project Name !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#wt").val() == "") {
			swal({
				title: "กรุณากรอก W/T(%) !!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#vat").val() == "") {
			swal({
				title: "กรุณากรอก Vat(%)!!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#projectval").val() == "") {
			swal({
				title: "กรุณากรอกมูลค่าโครงการ!!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else if ($("#startproject").val() == "") {
			swal({
				title: "กรุณากรอกเริ่มต้นโครงการ!!.",
				text: "",
				confirmButtonColor: "#EA1923",
				type: "error"
			});
		} else {
			//    swal({
			//     title: "ok !!.",
			//     text: "",
			//     confirmButtonColor: "#EA1923",
			//     type: "error"
			// });

			var frm = $('#formdata');
			frm.submit(function(ev) {
				$.ajax({
					type: frm.attr('method'),
					url: frm.attr('action'),
					data: frm.serialize(),
					success: function(data) {
						swal({
							title: "Save Completed!!",
							text: "Save Completed!!.",
							// confirmButtonColor: "#66BB6A",
							type: "success"
						});

						setTimeout(function() {
							window.location.href =
								"<?php echo base_url(); ?>data_master/setup_project_main";
						}, 500);
					}
				});
				ev.preventDefault();

			});

			$("#formdata").submit(); //Submit  the FORM
		}
	});

	$('.close_project').click(function(event) {
		var pj_id = $(this).attr('project_id');
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

					$.get('<?php echo base_url() ?>datastore/close_project/' + pj_id,
						function(data) {}).done(function(data) {
						console.log(data);
						var json = jQuery.parseJSON(data);
						if (json.status == true) {

							window.location = '<?=base_url()?>data_master/setup_project_main';

						} else {

							$.simplyToast(json.message, 'danger');
						}

					});

				} else {
					swal("ยกเลิก", null, "error");
				}
			});



	});

	$('#check_store').click(function(event) {
		var data = $('#store_center').val();
		if (data == 0) {
			$('#store_center').val("1");
			// alert(data)
		} else if (data == 1) {
			$('#store_center').val("0");
			// alert(data)
		}
	});
</script>


<!-- $(".page-container").html('<div class="loading">Loading&#8230;</div>'); -->