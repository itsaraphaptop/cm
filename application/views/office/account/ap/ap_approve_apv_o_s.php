<div class="content">
	<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">APPROVE ACCOUNT PAYABLE</h6>
								
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs nav-tabs-highlight">
											<li class="active"><a href="#highlight-tab1" data-toggle="tab">APV</a></li>
											<li><a href="#highlighted-tab2" data-toggle="tab">APO</a></li>
											<li><a href="#highlighted-tab3" data-toggle="tab">APS</a></li>
											
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="highlight-tab1">
											<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#basic1" data-toggle="tab">Normal Vender</a></li>
											<li><a href="#basic2" data-toggle="tab">Down Vender</a></li>
											<li><a href="#basic3" data-toggle="tab">Retention Vender</a></li>
											
										</ul>

										<div class="tab-content">
											<div class="tab-pane active" id="basic1">

													<?php
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"APV");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','wait'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                            <div class="panel-heading">
                              <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                              <div class="heading-elements">
                                <ul class="icons-list">
                                  <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                                  
                                </ul>
                              </div>
                              <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                            </div>
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);

                          $sc=$this->db->get()->result(); ?>
                      <td>


                      <?php $a=1; foreach ($sc as $cc) { 
                        if($cc->app_sequence=="1"){
                          $s1=$cc->status;
                          $l1 = $cc->lock;
                        }else if($cc->app_sequence=="2"){
                          $s2=$cc->status;
                          $l2 = $cc->lock;
                        }else if($cc->app_sequence=="3"){
                          $s3=$cc->status;
                          $l3 = $cc->lock;
                        }else if($cc->app_sequence=="4"){
                          $s4=$cc->status;
                          $l4 = $cc->lock;
                        }else if($cc->app_sequence=="5"){
                          $s5=$cc->status;
                          $l5 = $cc->lock;
                        }else if($cc->app_sequence=="6"){
                          $s6=$cc->status;
                          $l6 = $cc->lock;
                        }else if($cc->app_sequence=="7"){
                          $s7=$cc->status;
                          $l7 = $cc->lock;
                        }else if($cc->app_sequence=="8"){
                          $s8=$cc->status;
                          $l8 = $cc->lock;
                        }else if($cc->app_sequence=="9"){
                          $s9=$cc->status;
                          $l9 = $cc->lock;
                        }else if($cc->app_sequence=="10"){
                          $s10=$cc->status;
                          $l10 = $cc->lock;
                        }

                        ?>
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>

                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 

		     


                </div>

        
                          <?php } ?>
                      </td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $cc->app_id; ?>">Tree <i class="icon-play3 position-right"></i></button></td>

                     

                      </tr>

         <div id="modal_theme_primary<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $qq->app_pr; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $scc=$this->db->get()->result(); ?>
                            <?php 
                $ts1 = "";
                $tl1 = "";
                $name1 = "";
                $ts2 = "";
                $tl2 = "";
                $name2 = "";
                $ts3 = "";
                $tl3 = "";
                $name3 = "";
                $ts4 = "";
                $tl4 = "";
                $name4 = "";
                $ts5 = "";
                $tl5 = "";
                $name5 = "";
                $ts6 = "";
                $tl6 = "";
                $name6 = "";
                $ts7 = "";
                $tl7  = "";
                $name7 = "";
                $ts8 = "";
                $tl8 = "";
                $name8 = "";
                $ts9 = "";
                $tl9 = "";
                $name9 = "";
                $ts10 = "";
                $tl10 = "";
                $name10 = "";
                foreach ($scc as $t) { 
                        if($t->app_sequence=="1"){
                          $ts1=$t->status;
                          $tl1 = $t->lock;
                          $name1 = $t->app_midname;
                        }else if($t->app_sequence=="2"){
                          $ts2=$t->status;
                          $tl2 = $t->lock;
                          $name2 = $t->app_midname;
                        }else if($t->app_sequence=="3"){
                          $ts3=$t->status;
                          $tl3 = $t->lock;
                          $name3 = $t->app_midname;
                        }else if($t->app_sequence=="4"){
                          $ts4=$t->status;
                          $tl4 = $t->lock;
                          $name4 = $t->app_midname;
                        }else if($t->app_sequence=="5"){
                          $ts5=$t->status;
                          $tl5 = $t->lock;
                          $name5 = $t->app_midname;
                        }else if($t->app_sequence=="6"){
                          $ts6=$t->status;
                          $tl6 = $t->lock;
                          $name6 = $t->app_midname;
                        }else if($t->app_sequence=="7"){
                          $ts7=$t->status;
                          $tl7 = $t->lock;
                          $name7 = $t->app_midname;
                        }else if($t->app_sequence=="8"){
                          $ts8=$t->status;
                          $tl8 = $t->lock;
                          $name8 = $t->app_midname;
                        }else if($t->app_sequence=="9"){
                          $ts9=$t->status;
                          $tl9 = $t->lock;
                          $name9 = $t->app_midname;
                        }else if($t->app_sequence=="10"){
                          $ts10=$t->status;
                          $tl10 = $t->lock;
                          $name10 = $t->app_midname;
                        }
                      } ?>
  <div >

  <ul class="tree">       
    <ul>
    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
      <ul>
        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                    <ul>
                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
            
              
        </li>
         

      


    </li>


    
</div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>
                      
                      
                      </tbody>
                      </table>

                </div>
              </div>

                          <?php }?>
												<!-- normal vender  -->
											</div>

											<div class="tab-pane" id="basic2">
												
													<?php
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"APV_D");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','wait'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                            <div class="panel-heading">
                              <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                              <div class="heading-elements">
                                <ul class="icons-list">
                                  <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                                  
                                </ul>
                              </div>
                              <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                            </div>
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);

                          $sc=$this->db->get()->result(); ?>
                      <td>


                      <?php $a=1; foreach ($sc as $cc) { 
                        if($cc->app_sequence=="1"){
                          $s1=$cc->status;
                          $l1 = $cc->lock;
                        }else if($cc->app_sequence=="2"){
                          $s2=$cc->status;
                          $l2 = $cc->lock;
                        }else if($cc->app_sequence=="3"){
                          $s3=$cc->status;
                          $l3 = $cc->lock;
                        }else if($cc->app_sequence=="4"){
                          $s4=$cc->status;
                          $l4 = $cc->lock;
                        }else if($cc->app_sequence=="5"){
                          $s5=$cc->status;
                          $l5 = $cc->lock;
                        }else if($cc->app_sequence=="6"){
                          $s6=$cc->status;
                          $l6 = $cc->lock;
                        }else if($cc->app_sequence=="7"){
                          $s7=$cc->status;
                          $l7 = $cc->lock;
                        }else if($cc->app_sequence=="8"){
                          $s8=$cc->status;
                          $l8 = $cc->lock;
                        }else if($cc->app_sequence=="9"){
                          $s9=$cc->status;
                          $l9 = $cc->lock;
                        }else if($cc->app_sequence=="10"){
                          $s10=$cc->status;
                          $l10 = $cc->lock;
                        }

                        ?>
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>

                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_d/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 

		     


                </div>

        
                          <?php } ?>
                      </td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $cc->app_id; ?>">Tree <i class="icon-play3 position-right"></i></button></td>

                     

                      </tr>

         <div id="modal_theme_primary<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $qq->app_pr; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $scc=$this->db->get()->result(); ?>
                            <?php 
                $ts1 = "";
                $tl1 = "";
                $name1 = "";
                $ts2 = "";
                $tl2 = "";
                $name2 = "";
                $ts3 = "";
                $tl3 = "";
                $name3 = "";
                $ts4 = "";
                $tl4 = "";
                $name4 = "";
                $ts5 = "";
                $tl5 = "";
                $name5 = "";
                $ts6 = "";
                $tl6 = "";
                $name6 = "";
                $ts7 = "";
                $tl7  = "";
                $name7 = "";
                $ts8 = "";
                $tl8 = "";
                $name8 = "";
                $ts9 = "";
                $tl9 = "";
                $name9 = "";
                $ts10 = "";
                $tl10 = "";
                $name10 = "";
                foreach ($scc as $t) { 
                        if($t->app_sequence=="1"){
                          $ts1=$t->status;
                          $tl1 = $t->lock;
                          $name1 = $t->app_midname;
                        }else if($t->app_sequence=="2"){
                          $ts2=$t->status;
                          $tl2 = $t->lock;
                          $name2 = $t->app_midname;
                        }else if($t->app_sequence=="3"){
                          $ts3=$t->status;
                          $tl3 = $t->lock;
                          $name3 = $t->app_midname;
                        }else if($t->app_sequence=="4"){
                          $ts4=$t->status;
                          $tl4 = $t->lock;
                          $name4 = $t->app_midname;
                        }else if($t->app_sequence=="5"){
                          $ts5=$t->status;
                          $tl5 = $t->lock;
                          $name5 = $t->app_midname;
                        }else if($t->app_sequence=="6"){
                          $ts6=$t->status;
                          $tl6 = $t->lock;
                          $name6 = $t->app_midname;
                        }else if($t->app_sequence=="7"){
                          $ts7=$t->status;
                          $tl7 = $t->lock;
                          $name7 = $t->app_midname;
                        }else if($t->app_sequence=="8"){
                          $ts8=$t->status;
                          $tl8 = $t->lock;
                          $name8 = $t->app_midname;
                        }else if($t->app_sequence=="9"){
                          $ts9=$t->status;
                          $tl9 = $t->lock;
                          $name9 = $t->app_midname;
                        }else if($t->app_sequence=="10"){
                          $ts10=$t->status;
                          $tl10 = $t->lock;
                          $name10 = $t->app_midname;
                        }
                      } ?>
  <div >

  <ul class="tree">       
    <ul>
    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
      <ul>
        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                    <ul>
                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
            
              
        </li>
         

      


    </li>


    
</div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>
                      
                      
                      </tbody>
                      </table>

                </div>
              </div>

                          <?php }?>
											</div>

											<div class="tab-pane" id="basic3">
											
                          <?php
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"APV_R");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','wait'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                            <div class="panel-heading">
                              <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                              <div class="heading-elements">
                                <ul class="icons-list">
                                  <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                                  
                                </ul>
                              </div>
                              <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                            </div>
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);

                          $sc=$this->db->get()->result(); ?>
                      <td>


                      <?php $a=1; foreach ($sc as $cc) { 
                        if($cc->app_sequence=="1"){
                          $s1=$cc->status;
                          $l1 = $cc->lock;
                        }else if($cc->app_sequence=="2"){
                          $s2=$cc->status;
                          $l2 = $cc->lock;
                        }else if($cc->app_sequence=="3"){
                          $s3=$cc->status;
                          $l3 = $cc->lock;
                        }else if($cc->app_sequence=="4"){
                          $s4=$cc->status;
                          $l4 = $cc->lock;
                        }else if($cc->app_sequence=="5"){
                          $s5=$cc->status;
                          $l5 = $cc->lock;
                        }else if($cc->app_sequence=="6"){
                          $s6=$cc->status;
                          $l6 = $cc->lock;
                        }else if($cc->app_sequence=="7"){
                          $s7=$cc->status;
                          $l7 = $cc->lock;
                        }else if($cc->app_sequence=="8"){
                          $s8=$cc->status;
                          $l8 = $cc->lock;
                        }else if($cc->app_sequence=="9"){
                          $s9=$cc->status;
                          $l9 = $cc->lock;
                        }else if($cc->app_sequence=="10"){
                          $s10=$cc->status;
                          $l10 = $cc->lock;
                        }

                        ?>
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>

                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apv_r/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 

         


                </div>

        
                          <?php } ?>
                      </td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $cc->app_id; ?>">Tree <i class="icon-play3 position-right"></i></button></td>

                     

                      </tr>

         <div id="modal_theme_primary<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $qq->app_pr; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $scc=$this->db->get()->result(); ?>
                            <?php 
                $ts1 = "";
                $tl1 = "";
                $name1 = "";
                $ts2 = "";
                $tl2 = "";
                $name2 = "";
                $ts3 = "";
                $tl3 = "";
                $name3 = "";
                $ts4 = "";
                $tl4 = "";
                $name4 = "";
                $ts5 = "";
                $tl5 = "";
                $name5 = "";
                $ts6 = "";
                $tl6 = "";
                $name6 = "";
                $ts7 = "";
                $tl7  = "";
                $name7 = "";
                $ts8 = "";
                $tl8 = "";
                $name8 = "";
                $ts9 = "";
                $tl9 = "";
                $name9 = "";
                $ts10 = "";
                $tl10 = "";
                $name10 = "";
                foreach ($scc as $t) { 
                        if($t->app_sequence=="1"){
                          $ts1=$t->status;
                          $tl1 = $t->lock;
                          $name1 = $t->app_midname;
                        }else if($t->app_sequence=="2"){
                          $ts2=$t->status;
                          $tl2 = $t->lock;
                          $name2 = $t->app_midname;
                        }else if($t->app_sequence=="3"){
                          $ts3=$t->status;
                          $tl3 = $t->lock;
                          $name3 = $t->app_midname;
                        }else if($t->app_sequence=="4"){
                          $ts4=$t->status;
                          $tl4 = $t->lock;
                          $name4 = $t->app_midname;
                        }else if($t->app_sequence=="5"){
                          $ts5=$t->status;
                          $tl5 = $t->lock;
                          $name5 = $t->app_midname;
                        }else if($t->app_sequence=="6"){
                          $ts6=$t->status;
                          $tl6 = $t->lock;
                          $name6 = $t->app_midname;
                        }else if($t->app_sequence=="7"){
                          $ts7=$t->status;
                          $tl7 = $t->lock;
                          $name7 = $t->app_midname;
                        }else if($t->app_sequence=="8"){
                          $ts8=$t->status;
                          $tl8 = $t->lock;
                          $name8 = $t->app_midname;
                        }else if($t->app_sequence=="9"){
                          $ts9=$t->status;
                          $tl9 = $t->lock;
                          $name9 = $t->app_midname;
                        }else if($t->app_sequence=="10"){
                          $ts10=$t->status;
                          $tl10 = $t->lock;
                          $name10 = $t->app_midname;
                        }
                      } ?>
  <div >

  <ul class="tree">       
    <ul>
    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
      <ul>
        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                    <ul>
                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
            
              
        </li>
         

      


    </li>


    
</div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>
                      
                      
                      </tbody>
                      </table>

                </div>
              </div>

                          <?php }?>
											</div>

											
										</div>
									</div>
											</div>

											<div class="tab-pane" id="highlighted-tab2">
																				<?php
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"APO");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','wait'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                            <div class="panel-heading">
                              <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                              <div class="heading-elements">
                                <ul class="icons-list">
                                  <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                                  
                                </ul>
                              </div>
                              <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                            </div>
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);

                          $sc=$this->db->get()->result(); ?>
                      <td>


                      <?php $a=1; foreach ($sc as $cc) { 
                        if($cc->app_sequence=="1"){
                          $s1=$cc->status;
                          $l1 = $cc->lock;
                        }else if($cc->app_sequence=="2"){
                          $s2=$cc->status;
                          $l2 = $cc->lock;
                        }else if($cc->app_sequence=="3"){
                          $s3=$cc->status;
                          $l3 = $cc->lock;
                        }else if($cc->app_sequence=="4"){
                          $s4=$cc->status;
                          $l4 = $cc->lock;
                        }else if($cc->app_sequence=="5"){
                          $s5=$cc->status;
                          $l5 = $cc->lock;
                        }else if($cc->app_sequence=="6"){
                          $s6=$cc->status;
                          $l6 = $cc->lock;
                        }else if($cc->app_sequence=="7"){
                          $s7=$cc->status;
                          $l7 = $cc->lock;
                        }else if($cc->app_sequence=="8"){
                          $s8=$cc->status;
                          $l8 = $cc->lock;
                        }else if($cc->app_sequence=="9"){
                          $s9=$cc->status;
                          $l9 = $cc->lock;
                        }else if($cc->app_sequence=="10"){
                          $s10=$cc->status;
                          $l10 = $cc->lock;
                        }

                        ?>
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>

                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_apo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 

		     


                </div>

        
                          <?php } ?>
                      </td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $cc->app_id; ?>">Tree <i class="icon-play3 position-right"></i></button></td>

                     

                      </tr>

         <div id="modal_theme_primary<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $qq->app_pr; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $scc=$this->db->get()->result(); ?>
                            <?php 
                $ts1 = "";
                $tl1 = "";
                $name1 = "";
                $ts2 = "";
                $tl2 = "";
                $name2 = "";
                $ts3 = "";
                $tl3 = "";
                $name3 = "";
                $ts4 = "";
                $tl4 = "";
                $name4 = "";
                $ts5 = "";
                $tl5 = "";
                $name5 = "";
                $ts6 = "";
                $tl6 = "";
                $name6 = "";
                $ts7 = "";
                $tl7  = "";
                $name7 = "";
                $ts8 = "";
                $tl8 = "";
                $name8 = "";
                $ts9 = "";
                $tl9 = "";
                $name9 = "";
                $ts10 = "";
                $tl10 = "";
                $name10 = "";
                foreach ($scc as $t) { 
                        if($t->app_sequence=="1"){
                          $ts1=$t->status;
                          $tl1 = $t->lock;
                          $name1 = $t->app_midname;
                        }else if($t->app_sequence=="2"){
                          $ts2=$t->status;
                          $tl2 = $t->lock;
                          $name2 = $t->app_midname;
                        }else if($t->app_sequence=="3"){
                          $ts3=$t->status;
                          $tl3 = $t->lock;
                          $name3 = $t->app_midname;
                        }else if($t->app_sequence=="4"){
                          $ts4=$t->status;
                          $tl4 = $t->lock;
                          $name4 = $t->app_midname;
                        }else if($t->app_sequence=="5"){
                          $ts5=$t->status;
                          $tl5 = $t->lock;
                          $name5 = $t->app_midname;
                        }else if($t->app_sequence=="6"){
                          $ts6=$t->status;
                          $tl6 = $t->lock;
                          $name6 = $t->app_midname;
                        }else if($t->app_sequence=="7"){
                          $ts7=$t->status;
                          $tl7 = $t->lock;
                          $name7 = $t->app_midname;
                        }else if($t->app_sequence=="8"){
                          $ts8=$t->status;
                          $tl8 = $t->lock;
                          $name8 = $t->app_midname;
                        }else if($t->app_sequence=="9"){
                          $ts9=$t->status;
                          $tl9 = $t->lock;
                          $name9 = $t->app_midname;
                        }else if($t->app_sequence=="10"){
                          $ts10=$t->status;
                          $tl10 = $t->lock;
                          $name10 = $t->app_midname;
                        }
                      } ?>
  <div >

  <ul class="tree">       
    <ul>
    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
      <ul>
        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                    <ul>
                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
            
              
        </li>
         

      


    </li>


    
</div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>
                      
                      
                      </tbody>
                      </table>

                </div>
              </div>

                          <?php }?>
											</div>

											<div class="tab-pane" id="highlighted-tab3">
																				<?php
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"APS");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','wait'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                            <div class="panel-heading">
                              <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                              <div class="heading-elements">
                                <ul class="icons-list">
                                  <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                                  
                                </ul>
                              </div>
                              <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                            </div>
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);

                          $sc=$this->db->get()->result(); ?>
                      <td>


                      <?php $a=1; foreach ($sc as $cc) { 
                        if($cc->app_sequence=="1"){
                          $s1=$cc->status;
                          $l1 = $cc->lock;
                        }else if($cc->app_sequence=="2"){
                          $s2=$cc->status;
                          $l2 = $cc->lock;
                        }else if($cc->app_sequence=="3"){
                          $s3=$cc->status;
                          $l3 = $cc->lock;
                        }else if($cc->app_sequence=="4"){
                          $s4=$cc->status;
                          $l4 = $cc->lock;
                        }else if($cc->app_sequence=="5"){
                          $s5=$cc->status;
                          $l5 = $cc->lock;
                        }else if($cc->app_sequence=="6"){
                          $s6=$cc->status;
                          $l6 = $cc->lock;
                        }else if($cc->app_sequence=="7"){
                          $s7=$cc->status;
                          $l7 = $cc->lock;
                        }else if($cc->app_sequence=="8"){
                          $s8=$cc->status;
                          $l8 = $cc->lock;
                        }else if($cc->app_sequence=="9"){
                          $s9=$cc->status;
                          $l9 = $cc->lock;
                        }else if($cc->app_sequence=="10"){
                          $s10=$cc->status;
                          $l10 = $cc->lock;
                        }

                        ?>
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>

                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/approve_aps/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="wait"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a datahref="" s="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_ap/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="wait" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 

		     


                </div>

        
                          <?php } ?>
                      </td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary<?php echo $cc->app_id; ?>">Tree <i class="icon-play3 position-right"></i></button></td>

                     

                      </tr>

         <div id="modal_theme_primary<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $qq->app_pr; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_ap');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $scc=$this->db->get()->result(); ?>
                            <?php 
                $ts1 = "";
                $tl1 = "";
                $name1 = "";
                $ts2 = "";
                $tl2 = "";
                $name2 = "";
                $ts3 = "";
                $tl3 = "";
                $name3 = "";
                $ts4 = "";
                $tl4 = "";
                $name4 = "";
                $ts5 = "";
                $tl5 = "";
                $name5 = "";
                $ts6 = "";
                $tl6 = "";
                $name6 = "";
                $ts7 = "";
                $tl7  = "";
                $name7 = "";
                $ts8 = "";
                $tl8 = "";
                $name8 = "";
                $ts9 = "";
                $tl9 = "";
                $name9 = "";
                $ts10 = "";
                $tl10 = "";
                $name10 = "";
                foreach ($scc as $t) { 
                        if($t->app_sequence=="1"){
                          $ts1=$t->status;
                          $tl1 = $t->lock;
                          $name1 = $t->app_midname;
                        }else if($t->app_sequence=="2"){
                          $ts2=$t->status;
                          $tl2 = $t->lock;
                          $name2 = $t->app_midname;
                        }else if($t->app_sequence=="3"){
                          $ts3=$t->status;
                          $tl3 = $t->lock;
                          $name3 = $t->app_midname;
                        }else if($t->app_sequence=="4"){
                          $ts4=$t->status;
                          $tl4 = $t->lock;
                          $name4 = $t->app_midname;
                        }else if($t->app_sequence=="5"){
                          $ts5=$t->status;
                          $tl5 = $t->lock;
                          $name5 = $t->app_midname;
                        }else if($t->app_sequence=="6"){
                          $ts6=$t->status;
                          $tl6 = $t->lock;
                          $name6 = $t->app_midname;
                        }else if($t->app_sequence=="7"){
                          $ts7=$t->status;
                          $tl7 = $t->lock;
                          $name7 = $t->app_midname;
                        }else if($t->app_sequence=="8"){
                          $ts8=$t->status;
                          $tl8 = $t->lock;
                          $name8 = $t->app_midname;
                        }else if($t->app_sequence=="9"){
                          $ts9=$t->status;
                          $tl9 = $t->lock;
                          $name9 = $t->app_midname;
                        }else if($t->app_sequence=="10"){
                          $ts10=$t->status;
                          $tl10 = $t->lock;
                          $name10 = $t->app_midname;
                        }
                      } ?>
  <div >

  <ul class="tree">       
    <ul>
    <li <?php if($name1==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name1; ?>  <?php if($tl1=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts1!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
      <ul>
        <li <?php if($name2==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name2; ?> <?php if($tl2=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts2!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                    <ul>
                <li <?php if($name3==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name3; ?> <?php if($tl3=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts3!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name4==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name4; ?> <?php if($tl4=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts4!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name5==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name5; ?> <?php if($tl5=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts5!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name6==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name6; ?> <?php if($tl6=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts6!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name7==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name7; ?> <?php if($tl7=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts7!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name8==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name8; ?> <?php if($tl8=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts8!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name9==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name9; ?> <?php if($tl9=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts9!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?>
                  <ul>
                <li <?php if($name10==""){ echo "hidden"; } ?>> &nbsp;<?php echo $name10; ?> <?php if($tl10=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> <?php if($ts10!="no"){ echo ' <p style="color: green;"><b>Approved successfully.</b></p>'; }else{ echo '<p style="color: red;"><b>Not verified yet.</b></p>'; } ?></li>
            
              
        </li>
         

      


    </li>


    
</div>
                </div>

                <div class="modal-footer">
                  
                </div>
              </div>
            </div>
          </div>
                      
                      
                      </tbody>
                      </table>

                </div>
              </div>

                          <?php }?>
											</div>

											
										</div>
									</div>
								</div>
							</div>
						</div>

</div>