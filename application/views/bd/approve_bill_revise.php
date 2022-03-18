<?php $td = $this->uri->segment(3); 

?>

<style type="text/css" media="screen">
body {
  background:white;
  font:normal normal 13px/1.4 Segoe,"Segoe UI",Calibri,Helmet,FreeSans,Sans-Serif;
  /*padding:50px;*/
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
  width:20px; /* same with indentation */
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
<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> REVISE BOQ</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li></li>
							<li></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">


						<div class="panel panel-flat border-top-lg border-top-warning">
								<div class="panel-heading">
									<h6 class="panel-title">Revise Boq</h6>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								<a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>


								<div class="panel-body">

                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-top top-divided">
                      <li class="active"><a href="#top-divided-tab1" data-toggle="tab">Revise</a></li>
                      
                     
                     
                    </ul>

                    <div class="tab-content">
                      
                      <div class="tab-pane active" id="top-divided-tab1">
                         <?php
                          $this->db->select('*');
                          $this->db->from('approve_revise');
                          $this->db->where('app_project',$td);
                          $this->db->group_by('app_pr'); 
                          $this->db->order_by('app_id','desc');
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_revise');
                          $this->db->where('app_project',$td);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','no'); 
                          $npr=$this->db->get()->num_rows(); 
                          ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('heading_bdrevise');
                          $this->db->where('ref_bd',$qq->app_pr);
                          $approve_boq=$this->db->get()->result(); 
                          $heading = "";
                          foreach ($approve_boq as $r) {
                          	$heading = $r->ref_bd;
                            $ref_heading = $r->ref_heading;
                          }
                          ?>
                         

                          <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                            <div class="panel-heading">
                              <h6 class="panel-title"><?php echo $ref_heading; ?> 
                                <?php  
                                $this->db->select('*');
                                $this->db->from('heading_bd');
                                $this->db->where('ref_bd',$ref_heading);
                                $cc=$this->db->get()->result(); 
                                $revise = 0;
                                foreach ($cc as $a) {
                                   $revise = $a->revise-1;
                                }
                              ?>
                               Revise : <span class="badge bg-warning-400"> <?php echo $revise; ?> </span>
                              </h6>
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
                        <th width="50%">BOQ No. <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" >
                      <td ><?php echo $heading; ?> </td>
                          <?php 
                      	  $this->db->select('*');
                          $this->db->from('approve_revise');
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_project',$td);
                          $sc=$this->db->get()->result(); 
                          ?>
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
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="no" ){ ?>
                          
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Approve</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $project; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                           
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_revise');
                          $this->db->where('app_project',$td);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('app_midname',$username);
                          $numx=$this->db->get()->num_rows(); 
                          ?>
              
                              <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                    $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                              </script> 





        
                          <?php } ?>
                      </td>
                      <td></td>

                     

                      </tr>

         
                      
                      
                      </tbody>
                      </table>

                </div>
              </div>

               <?php 
                          $this->db->select('*');
                          $this->db->from('heading_bdrevise');
                          $this->db->where('ref_bd',$qq->app_pr);
                          $approve_boq=$this->db->get()->result();
                          $heading = ""; 
                          foreach ($approve_boq as $r) {
                            $heading = $r->ref_bd;
                            $ref_heading = $r->ref_heading;
                          }
                          ?>



                           <?php 
                          $this->db->select('*');
                          $this->db->from('boq_item');
                          $this->db->where('status',"W");
                          $this->db->where('revise',$qq->app_pr);
                          $boq_i=$this->db->get()->result();
                          
                          ?>


                               
                        <div id="openprr<?php echo $cc->app_id; ?>" class="modal fade" style="display: none;">
            <div class="modal-dialog modal-full">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h5 class="modal-title"><?php echo $heading; ?> Revise : <span class="badge bg-warning-400"> <?php echo $revise; ?> </span> </h5>
                </div>

                <div class="modal-body">
            <div class="table-responsive">
            <table class="table table-bordered datatable-fixed-left" >
              <thead>
                <tr>
                  
                  <th rowspan="2">No.</th>
                  <th rowspan="2">Job</th>
                  <th rowspan="2">Cost Code</th>
                  <th rowspan="2">Description</th>
                  <th rowspan="2">BOQ CODE</th>
                  <th rowspan="2">BOQ NAME</th>
                  <th rowspan="2" >UNIT</th>
                  <th colspan="8" class="text-center">Budget</th>
                  <th colspan="8" class="text-center">BOQ</th>
                  <th rowspan="2" class="text-center"></th>
                </tr>
                <tr>
                  <th class="text-center">QTY</th>
                  <th class="text-center">MAT. Price</th>
                  <th class="text-center">MAT. Amount</th>
                  <th class="text-center">LAB. Price</th>
                  <th class="text-center">LAB. Amount</th>
                  <th class="text-center">SUb. Price</th>
                  <th class="text-center">SUb. Amount</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">QTY </th>
                  <th class="text-center">MAT. Price</th>
                  <th class="text-center">MAT. Amount</th>
                  <th class="text-center">LAB. Price</th>
                  <th class="text-center">LAB. Amount</th>
                  <th class="text-center">SUB. Price</th>
                  <th class="text-center">SUB. Amount</th>
                  <th class="text-center">Total</th>
                </tr>
              </thead>
              <tbody >
                <?php $q=1; 
                    $qty_bg = 0;
                    $matpricebg = 0;
                    $matamtbg = 0;
                    $labpricebg = 0;
                    $labamtbg = 0;
                    $totalamt = 0;
                    $matpriceboq = 0;
                    $matamtboq = 0;
                    $labpriceboq = 0;
                    $labamtboq = 0;
                    $totalamtboq = 0;
                    $subpricebg = 0;
                    $subamtbg = 0;
                    $subpriceboq = 0;
                    $subamtboq = 0;
                    $qtyboq = 0;
                foreach ($boq_i as $t_d) { 
                  $qty_bg = $qty_bg+$t_d->qty_bg;
                  $matpricebg = $matpricebg+$t_d->matpricebg;
                  $matamtbg = $matamtbg+$t_d->matamtbg;
                  $labpricebg = $labpricebg+$t_d->labpricebg;
                  $labamtbg = $labamtbg+$t_d->labamtbg;
                  $subpricebg = $subpricebg+$t_d->subpricebg;
                  $subamtbg = $subamtbg+$t_d->subamtbg;
                  $totalamt = $totalamt+$t_d->totalamt;
                  $matpriceboq = $matpriceboq+$t_d->matpriceboq;
                  $matamtboq = $matamtboq+$t_d->matamtboq;
                  $labpriceboq = $labpriceboq+$t_d->labpriceboq;
                  $labamtboq = $labamtboq+$t_d->labamtboq;
                  $subpriceboq = $subpriceboq+$t_d->subpriceboq;
                  $subamtboq = $subamtboq+$t_d->subamtboq;
                  $totalamtboq = $totalamtboq+$t_d->totalamtboq;
                  $qtyboq = $qtyboq+$t_d->qtyboq;
                  $projectcodei = $t_d->project_code;
                  ?>
                <tr>
                  <td class="text-center"><?php echo $q; ?></td>
                  <td><?php
                    $this->db->select('*');
                    $this->db->from('bdtender_d');
                    $this->db->where('bdd_tenid',$tdn);
                    $this->db->where('bdd_jobno',$t_d->boq_job);
                    $tender_d=$this->db->get()->result(); ?>
                    <?php  foreach ($tender_d as $tender_dd) { ?>
                    <?php echo $tender_dd->bdd_jobname; ?>
                    <?php } ?>
                    <input type="hidden" readonly="" id="job<?php echo $q; ?>" name="job[]" class="form-control input-xs text-right" value="<?php echo $t_d->boq_job; ?>" style="width: 200px;">

                    <input type="hidden" readonly="" id="boq_id<?php echo $q; ?>" name="boq_id[]" class="form-control input-xs text-right" value="<?php echo $t_d->boq_id; ?>" style="width: 200px;">
                  </td>
                  <td><div style="width: 200px;">
                    <?php echo $t_d->subcostcodename; ?>
                    <input type="hidden" readonly="" id="codecostcodee<?php echo $q; ?>" name="subcostcode[]" class="form-control input-xs text-right" value="<?php echo $t_d->subcostcode; ?>" style="width: 200px;"><input type="hidden" readonly="" id="codecostnamee<?php echo $q; ?>" name="subcostcodename[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->subcostcodename; ?>">
                  </div></td>
                  <td><div class="input-group"><input readonly="true" type="text"  id="newmatnamee<?php echo $q; ?>" name="newmatnamee[]" class="form-control input-xs text-right" style="width: 200px;" value="<?php echo $t_d->newmatnamee; ?>"><input readonly="true" id="newmatcode<?php echo $q; ?>" style="width: 200px;" name="newmatcode[]"  type="hidden" class="form-control input-xs text-right" style="width: 150px;" value="<?php echo $t_d->newmatcode; ?>"><span class="input-group-btn"></span></div>
                  
                </td>
                <td><input id="boqcode<?php echo $q; ?>" name="boqcode[]" type="text" class="form-control input-xs text-right" value="<?php echo $t_d->boqcode; ?>" style="width: 100px;"></td>
                <td><input id="matboqq<?php echo $q; ?>" name="matboq[]" type="text"  class="form-control input-xs text-right" value="<?php echo $t_d->matboq; ?>" style="width: 150px;"></td>
                <td class="text-right"><div class="input-group"><input  id="unitcode<?php echo $q; ?>" name="unitcode[]" type="hidden" class="form-control input-xs text-right" style="width: 200px;" readonly="" value="<?php echo $t_d->unitcode; ?>"><input  id="unitname<?php echo $q; ?>" name="unitname[]" type="text" class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo $t_d->unitname; ?>"></div></td>
                <td class="text-right"><input id="qty_bg<?php echo $q; ?>" name="qty_bg[]" type="text" value="<?php echo $t_d->qty_bg; ?>" class="form-control input-xs text-right" style="width: 100px;"  required="">
                </td>
                <td class="text-right"><input type="text" id="matpricebg<?php echo $q; ?>" name="matpricebg[]" value="<?php echo number_format($t_d->matpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                <td class="text-right"><input type="text" id="matamtbg<?php echo $q; ?>" name="matamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" readonly="" value="<?php echo number_format($t_d->matamtbg,2); ?>"></td>
                <td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php echo number_format($t_d->labpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                <td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labamtbg,2); ?>"></td>
                <td class="text-right"><input type="text" id="labpricebg<?php echo $q; ?>" name="labpricebg[]" value="<?php echo number_format($t_d->subpricebg,2); ?>" class="form-control input-xs text-right" style="width: 100px;"></td>
                <td class="text-right"><input type="text" id="labamtbg<?php echo $q; ?>" name="labamtbg[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subamtbg,2); ?>"></td>
                <td class="text-right"><input type="text"  id="totalamt<?php echo $q; ?>" name="totalamt[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->totalamt,2); ?>"></td>

                <td class="text-right"><input type="text"  id="qtyboq<?php echo $q; ?>" name="qtyboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->qtyboq,2); ?>"></td>
                <td class="text-right"><input type="text" id="matpriceboq<?php echo $q; ?>" name="matpriceboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->matpriceboq,2); ?>"></td>
                <td class="text-right"><input type="text" id="matamtboq<?php echo $q; ?>" name="matamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->matamtboq,2); ?>"></td>
                <td class="text-right"><input type="text"  id="labpriceboq<?php echo $q; ?>" name="labpriceboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labpriceboq,2); ?>"></td>
                <td class="text-right"><input type="text" id="labamtboq<?php echo $q; ?>" name="labamtboq[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->labamtboq,2); ?>"></td>
                <td class="text-right"><input type="text"  id="" name="[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subpriceboq,2); ?>"></td>
                <td class="text-right"><input type="text" id="" name="[]"  class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->subamtboq,2); ?>"></td>
                <td class="text-right"><input type="text"   id="totalamtboq<?php echo $q; ?>" name="totalamtboq[]" class="form-control input-xs text-right" style="width: 100px;" value="<?php echo number_format($t_d->totalamtboq,2); ?>"></td>
                
                <td style="color: #BEBEBE;"><?php echo $q; ?></td>

              </tr>
              <?php $q++; } ?>

              <tr>
                <td class="text-center" colspan="7"><b>TOTAL</b></td>
                <td class="text-right"><?php echo number_format($qty_bg,2); ?></td>
                <td class="text-right"><?php echo number_format($matpricebg,2); ?></td>
                <td class="text-right"><?php echo number_format($matamtbg,2); ?></td>
                <td class="text-right"><?php echo number_format($labpricebg,2); ?></td>
                <td class="text-right"><?php echo number_format($labamtbg,2); ?></td>
                <td class="text-right"><?php echo number_format($subpricebg,2); ?></td>
                <td class="text-right"><?php echo number_format($subamtbg,2); ?></td>
                <td class="text-right"><?php echo number_format($totalamt,2); ?></td>

                <td class="text-right"><?php echo number_format($qtyboq,2); ?></td>
                <td class="text-right"><?php echo number_format($matpriceboq,2); ?></td>
                <td class="text-right"><?php echo number_format($matamtboq,2); ?></td>
                <td class="text-right"><?php echo number_format($labpriceboq,2); ?></td>
                <td class="text-right"><?php echo number_format($labamtboq,2); ?></td>
                <td class="text-right"><?php echo number_format($subpriceboq,2); ?></td>
                <td class="text-right"><?php echo number_format($subamtboq,2); ?></td>
                <td class="text-right"><?php echo number_format($totalamtboq,2); ?></td>
                
              </tr>
            </tbody>
          </table>
                </div>
              </div>
        
                <div class="modal-footer"> 
                  <button type="button" class="btn btn-link byn-xs" data-dismiss="modal">Close</button>
                  <a href="<?php echo base_url(); ?>office/approve_td_boq_revise/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $td; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $ref_heading; ?>/<?php echo $revise+1; ?>/<?php echo $projectcodei;?>" class="btn btn-primary byn-xs">Approve </a>
                </div>
              </div>
            </div>
          </div>

                          <?php }?>
                             

                       
                      </div>

                      
                            
						
                          <!-- <?php $a=1; foreach ($sc as $cc) { ?>
                         
					<?php } ?> -->


          <script>
            $('#revise').attr('class', 'active');
            $('#revise_approve').attr('style', 'background-color:#dedbd8');
          </script>