<style type="text/css" media="screen">
body {
  background:white;
  font:normal normal 13px/1.4 Segoe,"Segoe UI",Calibri,Helmet,FreeSans,Sans-Serif;
  /* padding:50px; */
}


/**
 * Framework starts from here ...
 * ------------------------------
 */

.tree,
.tree ul {
  
  padding:0;
  list-style:none;
  color:#369;
  position:relative;
}

.tree ul {margin-right:.100em} /* (indentation/2) */

.tree:before,
.tree ul:before {
  content:"";
  display:block;
  width:0;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  border-left:1px solid;
}

.tree li {
  margin:0;
  padding:0 1.5em; /* indentation + .5em */
  line-height:2em; /* default list item's `line-height` */
  font-weight:bold;
  position:relative;
}

.tree li:before {
  content:"";
  display:block;
  width:20px; same with indentation
  height:0;
  border-top:1px solid;
  margin-top:-1px; /* border top width */
  position:absolute;
  top:1em; /* (line-height/2) */
  left:0;
}

.tree li:last-child:before {
  background:white; /* same with body background */
  height:auto;  
}
</style>
<!-- Main content  trans-->
			<div class="content-wrapper">



		<!-- Content area -->
				<div class="content">
          <!-- Highlighting rows and columns -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">สถานะรอการ Approve <?php echo $username; ?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                  <ul class="nav nav-tabs nav-tabs-top top-divided">
                      <li class="active"><a href="#top-divided-tab1" data-toggle="tab">Approve ตามลำดับ</a></li>
                      <li><a href="#top-divided-tab2" data-toggle="tab">Approve ตามวงเงิน </a></li>
                 </ul>
<div class="tab-content">
                      <div class="tab-pane active" id="top-divided-tab1">
                         <?php
                          $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
                          $this->db->where('type',"P");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','no'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                <div class="panel-heading">
                  <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse" class="rotate-180"></a></li>
                              
                            </ul>
                          </div>
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%"> PO No. <?php echo $username; ?></th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
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
                    
                        <?php if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 


      <div id="openprr<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Open Detail:</h5>
                </div>

                <div class="modal-body">

                <?php $this->db->select('*');
                          $this->db->from('lo');
                          $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
                         
                          $this->db->join('vender','vender.vender_id = lo.subcontact','left outer');
                          $this->db->where('lo_lono',$cc->app_pr);
                      $pr=$this->db->get()->result();
                      foreach ($pr as $epr) {
                       $pr_prno = $epr->lo_lono;
                       $pr_prdate = $epr->lodate;
                       $pr_reqname = $epr->vender_name;
                       $system = $epr->system;
                       $project_name = $epr->project_name;
                       $subcontact = $epr->subcontact;
                       $compcode_lo = $erp->compcode;
                       } 
                          ?>
                      <h3><i class=" icon-file-empty"></i> Master</h3>
                        <div class="col-md-6">
                          <div class="form-group">
                                      <div class="col-lg-3">
                                        <div class="form-control-static">
                                          <p>WO No.:</p>
                                        </div>
                                      </div>
                                      <div class="col-lg-9">
                                      <div class="form-control-static">
                                        <p><?php echo $pr_prno;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $pr_prno; ?>" value="<?php echo $pr_prno;?>"/>
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
                                        <p><?php echo $pr_reqname;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($pr_prdate)); ?></p>
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
                                      <p><?php echo $project_name;?></p>
                                    </div>
                                    </div>
                              </div>

                            </div>

                            <h3><i class="icon-file-text2"></i> Detail</h3>

                            <table class="table table-bordered table-striped table-xxs">
                          <thead>
                            <tr>
                              <th>No.</th>
                                          <th>รหัสต้นทุน</th>
                                          <th>ชื่อวัสดุ</th>
                                          <th>จำนวน</th>
                                          <th>ราคาต่อหน่วย</th>
                                          <th>ราคารวม</th>
                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php $total=0;  $n =1;?>

                                          <?php
                                          $prpr = $pr_prno;
                                          $this->db->select('*');
                                          $this->db->join('unit','unit.unit_code = lo_detail.lo_unit','left outer');
                                          $this->db->where('lo_ref', $prpr);
                                          $q =  $this->db->get('lo_detail');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                          <td><?php echo $valj->lo_costcode; ?></td>
                                          <td><?php echo $valj->lo_matname; ?></td>
                                          <td><?php echo $valj->lo_qty; ?>&nbsp;<?php echo $valj->unit_name; ?></td>
                                          <td><?php echo number_format($valj->lo_priceunit,2); ?></td>
                                          <td><?php echo number_format($valj->lo_price,2); ?></td>
                                         </tr>
                                          <?php $total = $total+$valj->lo_price; $n++; } ?>
                                         <tr>
                                          <td colspan="5">Total</td>
                                          <td><?php echo number_format($total,2);?></td>
                                         </tr>
                                                                         
                                      </tbody>
                        </table>
                               <!--  -->
                      </div>

                <div class="modal-footer">
                  <a class="btn btn-primary" target="_blank" href="<?php echo base_url();?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=wo_new.mrt&lono=<?php echo $qq->app_pr; ?>&system_id=<?php echo $system; ?>&subcontact=<?php echo $subcontact; ?>&compcode=<?php echo $compcode_lo;?>">View</a>
                  <a type="submit" href="<?php echo base_url(); ?>index.php/office/approve_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="btn bg-success-600">Approve</a>
                </div>
              </div>
            </div>
          </div>
        
        <div id="reject<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Reject PR No. <?php echo $cc->app_pr; ?></h5>
                </div>
                <form action="<?php echo base_url(); ?>index.php/office/reject_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                <label for="">หมายเหตุ</label>
                
                <textarea class="form-control" name="rejectap_prove"></textarea>
                </div>
                </div>

                <div class="modal-footer">
                  <button type="submit"  class="btn bg-orange-600">Reject</button>
                </div>
                </form>
                </div> 
                </div>
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
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
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

                      <div class="tab-pane" id="top-divided-tab2">
                       <?php
                          $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
                          $this->db->where('type',"C");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','no'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>


                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                <div class="panel-heading">
                  <h6 class="panel-title"><?php echo $qq->app_pr; ?></h6>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse" class="rotate-180"></a></li>
                              
                            </ul>
                          </div>
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%"> PO No. <?php echo $username; ?></th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
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
                    
                        <?php if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <!-- <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div> -->

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>

                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 


      <div id="openprr<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Open Detail PO No.:</h5>
                </div>

                <div class="modal-body">

                <?php $this->db->select('*');
                          $this->db->from('lo');
                          $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
                          $this->db->join('department','department.department_id = lo.department','left outer');
                          $this->db->join('vender','vender.vender_id = lo.subcontact','left outer');
                          $this->db->where('lo_lono',$cc->app_pr);
                      $pr=$this->db->get()->result();
                      foreach ($pr as $epr) {
                       $pr_prno = $epr->lo_lono;
                       $pr_prdate = $epr->lodate;
                       $pr_reqname = $epr->vender_name;
                       
                       $project_name = $epr->project_name;
                       $department_title = $epr->department_title;
                       
                       } 
                          ?>
                      <h3><i class=" icon-file-empty"></i> Master</h3>
                        <div class="col-md-6">
                          <div class="form-group">
                                      <div class="col-lg-3">
                                        <div class="form-control-static">
                                          <p>WO No.:</p>
                                        </div>
                                      </div>
                                      <div class="col-lg-9">
                                      <div class="form-control-static">
                                        <p><?php echo $pr_prno;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->pr_prno;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $pr_prno; ?>" value="<?php echo $pr_prno;?>"/>
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
                                        <p><?php echo $pr_reqname;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($pr_prdate)); ?></p>
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
                                      <p><?php echo $project_name;?><?php echo $department_title; ?></p>
                                    </div>
                                    </div>
                              </div>

                            </div>

                            <h3><i class="icon-file-text2"></i> Detail</h3>

                            <table class="table table-bordered table-striped table-xxs">
                          <thead>
                            <tr>
                              <th>No.</th>
                                          <th>รหัสต้นทุน</th>
                                          <th>ชื่อวัสดุ</th>
                                          <th>จำนวน</th>
                                          <th>ราคาต่อหน่วย</th>
                                          <th>ราคารวม</th>
                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php   $n =1;?>

                                          <?php
                                          $prpr = $pr_prno;
                                          $this->db->select('*');
                                          $this->db->where('lo_ref', $prpr);
                                          $q =  $this->db->get('lo_detail');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                            <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->lo_costcode, -5); ?></td>
                                          <td><?php echo $valj->lo_matname; ?></td>
                                           <td><?php echo $valj->lo_qty; ?>&nbsp;<?php echo $valj->lo_unit; ?></td>
                                            <td><?php echo $valj->lo_price; ?></td>
                                             <td><?php echo $valj->lo_priceunit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                                                         
                                                                                </tbody>
                        </table>
                               <!--  -->
                      </div>

                <div class="modal-footer">
                  <a type="submit" href="<?php echo base_url(); ?>index.php/office/approve_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="btn bg-success-600">Approve</a>
                </div>
              </div>
            </div>
          </div>

          <div id="reject<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Reject PR No. <?php echo $cc->app_pr; ?></h5>
                </div>
                <form action="<?php echo base_url(); ?>index.php/office/reject_pj_wo/<?php echo $cc->app_id; ?>/<?php echo $cc->app_pr; ?>/<?php echo $codepj; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                <label for="">หมายเหตุ</label>
                
                <textarea class="form-control" name="rejectap_prove"></textarea>
                </div>
                </div>

                <div class="modal-footer">
                  <button type="submit"  class="btn bg-orange-600">Reject</button>
                </div>
                </form>
                </div> 
                </div>
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
                          $this->db->from('approve_wo');
                          $this->db->where('app_project',$codepj);
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

            					<div class="panel-body">
            <h5 class="panel-title">สถานะทำการ Approve เรียบร้อยแล้ว</h5>
           <br>
              <table class="table table-hover table-bordered table-xxs">
                <thead>
                  <tr>
                    <th style="text-align: center;">No.</th>
                    
                    <th style="text-align: center;">WO No.</th>
                    <th style="text-align: center;">Approve Date</th>
                    <th style="text-align: center;">Vender</th>
                    <th style="text-align: center;">Project/Department</th>
                    
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $pjid = $this->uri->segment(3); ?>
                 <?php $this->db->select('*');
                          $this->db->from('lo');
                          $this->db->join('project', 'project.project_id = lo.projectcode','left outer');
                          // $this->db->join('department','department.department_id = lo.department','left outer');
                          $this->db->join('vender','vender.vender_id = lo.contact','left outer');
                          $this->db->where('projectcode',$pjid);
                          $this->db->where('status !=',"wait");
                      $l=$this->db->get()->result();
                      $n=1;
                      foreach ($l as $lo) {
                       
                          ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $n; ?></td>
                    <td style="text-align: center;"><?php echo $lo->lo_lono; ?></td>
                    <td style="text-align: center;"><?php
                    $this->db->select('*');
                    $this->db->from('approve_wo');
                    $this->db->where('app_pr', $lo->lo_lono);
                    $this->db->group_by('app_pr');
                    $pr = $this->db->get()->result();
                    foreach ($pr as $pre) {
                      echo $pre->app_date;
                    }
                    ?></td>
                    
                    <td style="text-align: center;"><?php echo $lo->vender_name; ?></td>
                    <td style="text-align: center;"><?php echo $lo->project_name; ?></td>
                    <td><a href="<?php echo base_url(); ?>office/disapprove_pj_wo/<?php echo $lo->lo_id; ?>/<?php echo $lo->projectcode; ?>/<?php echo $codepj; ?>/<?php echo $lo->lo_lono; ?>" class="btn bg-warning-400 btn-block"><i class="glyphicon glyphicon-remove"> </i> Cancel</a></td>
                  </tr>
                  <?php $n++; } ?>

                 
                </tbody>
              </table>
            </div>
          </div>



					<!-- Highlighting rows and columns -->

					<!-- /highlighting rows and columns -->




				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
<script type="text/javascript">
  $('#wo').attr('class', 'active');
  $('#approve_wo').attr('style', 'background-color:#dedbd8');
</script>