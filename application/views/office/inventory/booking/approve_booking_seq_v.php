<?php $pjcode = $this->uri->segment(3); 
$pjid = $this->uri->segment(4); 
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
.popover{
    width:500px;   
}
</style>
<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Booking Approve</span></h4>
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
							<li><a href="<?php echo base_url(); ?>inventory/main_index"><i class="icon-home2 position-left"></i>Inventory Booking</a></li>
							<li><a href="<?php echo base_url(); ?>inventory/booking_approve/<?=$projid;?>/<?=$projidc;?>">Booking Approve </a></li>
					</div>
				</div>
				<!-- /page header -->



				<!-- Content area -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">


						<div class="panel panel-flat border-top-lg border-top-warning">
								<div class="panel-heading">
									<h6 class="panel-title">Booking Pending</h6>
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
                      <li class="active"><a href="#top-divided-tab1" data-toggle="tab">Approve ตามลำดับ</a></li>
                      <li><a href="#top-divided-tab2" data-toggle="tab">Approve ตามวงเงิน </a></li>
                     
                     
                    </ul>

                    <div class="tab-content">
                      
                      <div class="tab-pane active" id="top-divided-tab1">
                         <?php
                          $this->db->select('*');
                          $this->db->from('approve_bk');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"P");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_bk');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','no'); 
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
                        <th width="50%">Booking No. <?php echo $qq->app_pr;?> <br> Approve Name: <?php echo $username; ?> (<?php echo $m_id; ?>)</th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_bk');
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
                    
                        <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>


                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> 
                              <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
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
                          $this->db->from('approve_bk');
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


      <div id="openprr<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Open Detail Booking No.:</h5>
                </div>

                <div class="modal-body">
                      <?php $this->db->select('*');
                          $this->db->from('ic_booking');
                          $this->db->join('project', 'project.project_id = ic_booking.from_project','left outer');
                          $this->db->where('book_code',$cc->app_pr);
                          $pr=$this->db->get()->result();
                      foreach ($pr as $epr) {
                       $book_code = $epr->book_code;
                       $date_book = $epr->date_book;
                       $name_book = $epr->name_book;
                       $remark = $epr->remark;
                       $address_book = $epr->address_book;
                       $message = $epr->message;
                       } 
                          ?>
                          <div class="row">
                            <div class="col-md-4">
                            
                            <h3><i class=" icon-file-empty"></i> Master</h3>
                            </div>
                            <div class="col-md-4 col-xs-offset-4">
                            <div class="text-right">
                            <?php 	$this->db->select( '*' );
                                $this->db->where( 'pr_ref', $book_code );
                                $q = $this->db->get( 'select_file_bk' )->num_rows(); 
                            ?>
                            <?php if($q==0){ ?>
                              <i></i>
                            <?php }else{ ?>
                              <a href="#" id="popover-show<?= $book_code; ?>" data-placement="bottom" data-html="true"><i class="icon-attachment icon-2x"></i></a>
                                  <script>
                                  var id_pr = "<?= $book_code; ?>"
                                  $.post('<?php echo base_url(); ?>purchase/loadfile', {
                                    id_pr: id_pr
                                  }, function() {}).done(function(data) {
                                    // $('#view_pr').html(data);
                                    $('#popover-show<?= $book_code; ?>').popover({
                                    title: 'Attach File',
                                    content: data,
                                    trigger: 'click'
                                  }).on('shown.bs.popover', function() {
                                    // alert('Shown event fired.')
                                  });
                                  });
                                  
                                  </script>  
                              <?php } ?>
                            </div>
                            </div>
                          </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="col-lg-3">
                              <div class="form-control-static">
                                <p>PR No.:</p>
                              </div>
                            </div>
                            <div class="col-lg-9">
                              <div class="form-control-static">
                                <p><?php echo $book_code;?></p>
                              </div>
                              <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                              <input type="hidden" class="form-control" id="prapprov<?php echo $book_code; ?>" value="<?php echo $book_code;?>"/>
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
                                      <p><?php echo $name_book;?></p>
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
                                      <p><?php echo $remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($date_book)); ?></p>
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
                                      <p><?php echo $address_book;?></p>
                                    </div>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <div class="col-lg-4">
                                        <div class="form-control-static">
                                          <p>Remark :</p>
                                        </div>
                                      </div>
                                    <div class="col-lg-8">
                                    <div class="form-control-static">
                                      <p><?php echo $message; ?></p>
                                    </div>
                                    </div>
                              </div>
                            </div>
                      
                      </div>

                            <h3><i class="icon-file-text2"></i> Detail</h3>

                        <table class="table table-hover table-striped table-xxs">
                          <thead>
                            <tr>
                              <th>No.</th>
                                          <th>รหัสต้นทุน</th>
                                          <th>ชื่อวัสดุ</th>
                                          <th>จำนวน</th>
                                          <th>หมายเหตุ</th>
                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php   $n =1;?>

                                          <?php
                                          $prpr = $book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                            <td><?php echo $n; ?></td>
                                         <td><?php echo $valj->costcode; ?></td>
                                         <!-- <td><?php echo substr($valj->costcode, -5); ?></td> -->
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                           <td></td>
                                         </tr>
                                          <?php $n++; } ?>
                                                                         
                                                                                </tbody>
                        </table>
                  </div>

                  <div class="modal-footer">
                    <a type="submit" href="<?php echo base_url(); ?>index.php/inventory/approve_pj_bk/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="btn bg-success-600">Approve</a>
                  </div>
                </div>
              </div>
            </div>
                                               
          <div id="reject<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Reject Booking No. <?php echo $cc->app_pr; ?></h5>
                </div>
                <form action="<?php echo base_url(); ?>inventory/reject_pj_bk/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" method="post">
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
                          $this->db->from('approve_bk');
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

                      <div class="tab-pane" id="top-divided-tab2">
                      <?php
                          $this->db->select('*');
                          $this->db->from('approve_bk');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('type',"C");
                          $this->db->group_by('app_pr'); 
                          $qpj=$this->db->get()->result();
                          foreach ($qpj as $qq) { ?>

                          <?php 
                          $this->db->select('*');
                          $this->db->from('approve_bk');
                          $this->db->where('app_project',$pjcode);
                          $this->db->where('app_pr',$qq->app_pr);
                          $this->db->where('status =','no'); 
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
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                
                <div class="table-responsive" style="display: none;">
                   <table class="table datatable-basic" >
                      <thead>
                        <tr role="row">
                        <th width="50%">PR No. <?php echo $username; ?></th>
                        <th width="50%"><div >Status Approve</div></th>
                        <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <td ><?php echo $qq->app_pr; ?> </td>
                      <?php $this->db->select('*');
                          $this->db->from('approve_bk');
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
                    
                        <?php if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                            
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php } ?>


                            <?php if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="no"  && $cc->status!="yes" && $l1!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="2" &&  $s1=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="2" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php } ?>


                             <?php if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="no"  && $cc->status!="yes" && $l2!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="3" &&  $s2=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                            <?php if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="no"  && $cc->status!="yes" && $l3!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="4" &&  $s3=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            
                             <?php if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="no"  && $cc->status!="yes" && $l4!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="5" &&  $s4=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             
                            <?php if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s2=="no"  && $cc->status!="yes" && $l5!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="6" &&  $s5=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                            <?php if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="no"  && $cc->status!="yes" && $l6!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="7" &&  $s6=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>



                           <?php if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="no"  && $cc->status!="yes" && $l7!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="8" &&  $s7=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>


                             <?php if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="no"  && $cc->status!="yes" && $l8!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="9" &&  $s8=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>

                             

                             <?php if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes" ){ ?>
                        
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <div id="chka<?php echo $qq->app_midid; ?>">
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                             <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove </a></div>

                            
                             <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                             <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="no"  && $cc->status!="yes" && $l9!="Y"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                            <div class="col-xs-3"><a href="<?php echo base_url(); ?>index.php/office/disapprove_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $pjid; ?>" class="label label-danger label-block"><i class="icon-cross"></i> Disapprove <a/></div>

                            <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            <?php }else if($username!=$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="approve"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: green;"><b>Approved successfully.</b></p>
                            
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" && $cc->status=="no" ){ ?>
                          
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> 
                            <p style="color: red;"><b>Not verified yet.</b></p>
                            <?php }else if($username==$cc->app_midname && $cc->app_sequence=="10" &&  $s9=="yes"  && $cc->status!="yes"){ ?>
                            <p><b>Approve ตามวงเงิน <?php echo number_format($cc->cost); ?> คุณ <?php echo $cc->app_midname; ?></b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                            <p style="color: red;"><b>Not verified yet.</b></p>
                           
                            <?php } ?>
                            
                            </div>
                            

                          <br></p>
                          <?php $this->db->select('*');
                          $this->db->from('approve_bk');
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


      <div id="openprr<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Open Detail Booking No.:</h5>
                </div>

                <div class="modal-body">

                <?php $this->db->select('*');
                      $this->db->from('ic_booking');
                      $this->db->join('project', 'project.project_id = ic_booking.book_code','left outer');
                      // $this->db->join('department','department.department_id = ic_booking.from_project','left outer');
                      $this->db->where('book_code',$cc->app_pr);
                      $pr=$this->db->get()->result();
                      foreach ($pr as $epr) {
                       $book_code = $epr->book_code;
                       $date_book = $epr->date_book;
                       $name_book = $epr->name_book;
                       $remark = $epr->remark;
                       $address_book = $epr->address_book;
                      //  $department_title = $epr->department_title;
                       $message = $epr->message;
                       } 
                ?>
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
                                        <p><?php echo $book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $book_code; ?>" value="<?php echo $book_code;?>"/>
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
                                        <p><?php echo $name_book;?></p>
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
                                      <p><?php echo $remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($date_book)); ?></p>
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
                                      <p><?php echo $address_book;?></p>
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
                                      <p><?php echo $message; ?></p>
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
                                         </tr>
                                      </thead>
                                      <tbody>
                                        <?php   $n =1;?>

                                          <?php
                                          $prpr = $book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                            <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                                                         
                                                                                </tbody>
                        </table>
                               <!--  -->
                      </div>

                <div class="modal-footer">
                  <a type="submit" href="<?php echo base_url(); ?>index.php/office/approve_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" class="btn bg-success-600">Approve</a>
                </div>
              </div>
            </div>
          </div>

      <div id="reject<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Reject Booking No. <?php echo $cc->app_pr; ?></h5>
                </div>
                <form action="<?php echo base_url(); ?>inventory/reject_pj_bk/<?php echo $cc->app_id; ?>/<?php echo $cc->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" method="post">
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
                </div>
        

                          <?php } ?>
                      </td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary1<?php echo $cc->app_id; ?>">Tree <i class="icon-play3 position-right"></i></button></td>

                     

                      </tr>

         <div id="modal_theme_primary1<?php echo $cc->app_id; ?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h6 class="modal-title"><?php echo $qq->app_pr; ?></h6>
                </div>

                <div class="modal-body">
                    <?php $this->db->select('*');
                          $this->db->from('approve_bk');
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

 				
								<div class="panel-footer">
						
									<ul class="pull-right">
										<li class="dropdown">
											<a href="#" data-popup="tooltip" title="" data-original-title="ALL SHOW"><i class="icon-three-bars"></i></a>
										</li>
									</ul>
								</div>
							</div>
					</div>



					<div class="col-md-12">
            <div class="panel panel-flat border-top-lg border-top-success">
                <div class="panel-heading">
                  <h6 class="panel-title">PR Approve</h6>
                  <div class="heading-elements">
                    <ul class="icons-list">
                              <li><a data-action="collapse"></a></li>
                              <li><a data-action="reload"></a></li>
                              <li><a data-action="close"></a></li>
                            </ul>
                          </div>
                <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable-basicxas">
                      <thead>
                        <tr>
                          <th >PR No.</th>
                          <th>Detail</th>
                          <th>Approve Date</th>
                          <th>Open</th>
                          <th>Cancel</th>
                          <!-- <th>Print</th> -->
                        </tr>
                      </thead>
                     
                      <tbody>
                        <?php $n=1; foreach($getappov as $val){?>
                          <tr>
                            <td><?php echo $val->book_code; ?></td>
                            <td><?php echo $val->remark; ?></td>
                            <td><?php
$this->db->select('*');
$this->db->from('approve_bk');
$this->db->where('app_pr', $val->book_code);
$this->db->group_by('app_pr');
$pr = $this->db->get()->result();
foreach ($pr as $pre) {
  echo $pre->app_date;
}
?>
  
</td>  
                            <td class="text-center"><a data-toggle="modal" data-target="#openappp<?php echo $val->book_code; ?>" data-popup="tooltip" title="" data-original-title="เปิด" class="label label-info label-block"><i class="icon-folder-open2"></i> Open</a></td>
                            <td><a data-toggle="modal" data-target="#cancelmodal<?php echo $val->book_code; ?>" data-popup="tooltip" title="" data-original-title="ยกเลิก" class="label label-danger label-block"><i class="icon-cross3"></i> Cancel</a></td>
                            <!-- <td class="text-center"><a href="<?php echo base_url(); ?>pr_rpt/pr_report_h/<?php echo $val->book_code; ?>" data-popup="tooltip" title="" data-original-title="พิมพ์" class="label label-warning  label-block"<i class=" icon-printer4"></i> Print</a></td> -->
                            <!-- <td class="text-center"><a href="<?php $base_url = $this->config->item('url_report'); echo $base_url; ?>stimulsoft/Flex/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=pr_form.mrt&pr=<?php echo $val->book_code; ?>" data-popup="tooltip" title="" data-original-title="พิมพ์" class="label label-warning  label-block"<i class=" icon-printer4"></i> Print</a></td> -->
                          </tr>
                          <?php $n++; } ?>
                      </tbody>
                       
                       
                        

                    </table>
                  </div>
                </div>
                <div class="panel-footer">
                  <!-- <ul>
                    <li><a href="<?php echo base_url(); ?>pr/archive_pr_approve" class="label label-flat border-success text-success-600" data-popup="tooltip" title="" data-original-title="แสดงรายการทั้งหมด">ALL Approve</a></li>
                  </ul> -->

                  <ul class="pull-right">
                    <li class="dropdown">
                      <a href="#" data-popup="tooltip" title="" data-original-title="ALL SHOW"><i class="icon-three-bars"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
          </div>
        </div>
      </div>

<?php foreach ($getappov as $val) {?>
  <div id="openprr<?php echo $val->book_code; ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Open Detail Booking No.: <?php echo $val->book_code; ?></h5>
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
                          <p><?php echo $val->book_code;?></p>
                        </div>
                          <!-- <input class="form-control" value="<?php echo $val->book_code;?>"/>-->
                          <input type="hidden" class="form-control" id="prapprov<?php echo $val->book_code; ?>" value="<?php echo $val->book_code;?>"/>
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
                          <p><?php echo $val->name_book;?></p>
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
                        <p><?php echo $val->remark;?></p>
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
                      <p><?php echo date('d/m/Y' ,strtotime($val->date_book)); ?></p>
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
                        <p><?php echo $val->address_book;?></p>
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
                        <p><?php echo $val->message;?></p>
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
                            $prpr = $val->book_code;
                            $this->db->select('*');
                            $this->db->where('ref_codetransfer', $prpr);
                            $q =  $this->db->get('ic_bookingitem');
                            $res = $q->result();
                            foreach ($res as $valj){ ?>
                          <tr>
                            <td><?php echo $n; ?></td>
                           <td><?php echo substr($valj->costcode, -5); ?></td>
                            <td><?php echo $valj->mat_name; ?></td>
                             <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                           </tr>
                            <?php $n++; } ?>
                        </tbody>
          </table>
        </div>
          <div class="modal-footer">
                <button type="button" class="approv<?php echo $val->book_code; ?> btn bg-success-600" data-dismiss="modal">Approve</button>
              </div>
      </div>

    </div>
  </div>
<?php } ?>




        </div>
        <!-- /content area -->

      </div>
      <!-- /main content -->
              <?php foreach ($getwait as $value) {?>
                <!-- Approve Modal -->
                <div id="open<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Open Detail Booking No.: <?php echo $value->book_code; ?></h5>
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
                                        <p><?php echo $value->book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $value->book_code; ?>" value="<?php echo $value->book_code;?>"/>
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
                                        <p><?php echo $value->name_book;?></p>
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
                                      <p><?php echo $value->remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($value->date_book)); ?></p>
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
                                      <p><?php echo $value->address_book;?></p>
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
                                      <p><?php echo $value->message;?></p>
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
                                          $prpr = $value->book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                      </tbody>
                        </table>
                      </div>
                        <div class="modal-footer">
                              <button type="button" class="approv<?php echo $value->book_code; ?> btn bg-success-600" data-dismiss="modal">Approve</button>
                            </div>
                    </div>

                  </div>
                </div>
                <div id="dis<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->book_code; ?></h5>
                      </div>

                      <div class="modal-body">
                      <div class="col-md-12">
                        <label>Remark Disapprove :</label>
                        <div class="form-group">

                          <textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->book_code; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="disapprov<?php echo $value->book_code; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(".disapprov<?php echo $value->book_code;?>").click(function(event) {

                         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->book_code; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file PR No.:!"+data,
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
                                });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });
                </script>
                <script>
                  $(".approv<?php echo $value->book_code; ?> ").click(function(event) {
                      var url="<?php echo base_url(); ?>index.php/pr_active/approve_pr/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                  title: "Approved!",
                                  text: "Approved PR No."+data,
                                  confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });

                </script>
                <!-- /Approve Modal -->
              <?php } ?>

              <?php foreach ($getpmwait as $value) {?>
                <!-- Approve Modal -->
                <div id="open<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Open Detail Booking No.: <?php echo $value->book_code; ?></h5>
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
                                        <p><?php echo $value->book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $value->book_code; ?>" value="<?php echo $value->book_code;?>"/>
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
                                        <p><?php echo $value->name_book;?></p>
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
                                      <p><?php echo $value->remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($value->date_book)); ?></p>
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
                                      <p><?php echo $value->address_book;?></p>
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
                                      <p><?php echo $value->message;?></p>
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
                                          $prpr = $value->book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                      </tbody>
                        </table>
                      </div>
                        <div class="modal-footer">
                              <button type="button" class="approv<?php echo $value->book_code; ?> btn bg-success-600" data-dismiss="modal">Approve</button>
                            </div>
                    </div>

                  </div>
                </div>
                <div id="dis<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->book_code; ?></h5>
                      </div>

                      <div class="modal-body">
                      <div class="col-md-12">
                        <label>Remark Disapprove :</label>
                        <div class="form-group">

                          <textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->book_code; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="disapprov<?php echo $value->book_code; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(".disapprov<?php echo $value->book_code;?>").click(function(event) {

                         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->book_code; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file PR No.:!"+data,
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
                                });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });
                </script>
                <script>
                  $(".approv<?php echo $value->book_code; ?> ").click(function(event) {
                      var url="<?php echo base_url(); ?>index.php/pr_active/approve_pr/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                  title: "Approved!",
                                  text: "Approved PR No."+data,
                                  confirmButtonColor: "#66BB6A",
                                  type: "success"
                              });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });

                </script>
                <!-- /Approve Modal -->
              <?php } ?>

              <?php  foreach ($getappov as $value) {?>
                <div id="openappp<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Open Detail Booking No.: <?php echo $value->book_code; ?></h5>
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
                                        <p><?php echo $value->book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $value->book_code; ?>" value="<?php echo $value->book_code;?>"/>
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
                                        <p><?php echo $value->name_book;?></p>
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
                                      <p><?php echo $value->remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($value->date_book)); ?></p>
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
                                      <p><?php echo $value->address_book;?></p>
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
                                      <p><?php echo $value->message;?></p>
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
                                          $prpr = $value->book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                      </tbody>
                        </table>
                      </div>
                        <div class="modal-footer">
                              <button type="button" class="btn bg-info-600" data-dismiss="modal">Close</button>
                            </div>
                    </div>

                  </div>
                </div>
                <div id="cancelmodal<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Open Detail Booking No.: <?php echo $value->book_code; ?></h5>
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
                                        <p><?php echo $value->book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $value->book_code; ?>" value="<?php echo $value->book_code;?>"/>
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
                                        <p><?php echo $value->name_book;?></p>
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
                                      <p><?php echo $value->remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($value->date_book)); ?></p>
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
                                      <p><?php echo $value->address_book;?></p>
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
                                      <p><?php echo $value->message;?></p>
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
                                          $prpr = $value->book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                      </tbody>
                        </table>
                      </div>
                        <div class="modal-footer">
                              <button type="button" class="cance<?php echo $value->book_code; ?> btn bg-danger-600" data-dismiss="modal">Cancel</button>
                            </div>
                    </div>

                  </div>
                </div>
                <div id="dis<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->book_code; ?></h5>
                      </div>

                      <div class="modal-body">
                      <div class="col-md-12">
                        <label>Remark Disapprove :</label>
                        <div class="form-group">

                          <textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->book_code; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="disapprov<?php echo $value->book_code; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(".disapprov<?php echo $value->book_code;?>").click(function(event) {

                         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->book_code; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file PR No.:!"+data,
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
                                });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });
                </script>
                <script>
                  $(".cance<?php echo $value->book_code; ?> ").click(function(event) {
                      var url="<?php echo base_url(); ?>index.php/pr_active/cancel_pr/<?php echo $value->book_code; ?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                  title: "Cancelled!",
                                  text: "Cancelled PR No."+data,
                                  confirmButtonColor: "#ff002e",
                                  type: "error"
                              });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });

                </script>
              <?php } ?>

              <?php  foreach ($getpmappov as $value) {?>
                <div id="openappp<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Open Detail Booking No.: <?php echo $value->book_code; ?></h5>
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
                                        <p><?php echo $value->book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $value->book_code; ?>" value="<?php echo $value->book_code;?>"/>
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
                                        <p><?php echo $value->name_book;?></p>
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
                                      <p><?php echo $value->remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($value->date_book)); ?></p>
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
                                      <p><?php echo $value->address_book;?></p>
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
                                      <p><?php echo $value->message;?></p>
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
                                          $prpr = $value->book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                      </tbody>
                        </table>
                      </div>
                        <div class="modal-footer">
                              <button type="button" class="btn bg-info-600" data-dismiss="modal">Close</button>
                            </div>
                    </div>

                  </div>
                </div>
                <div id="cancelmodal<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Open Detail Booking No.: <?php echo $value->book_code; ?></h5>
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
                                        <p><?php echo $value->book_code;?></p>
                                      </div>
                                        <!-- <input class="form-control" value="<?php echo $value->book_code;?>"/>-->
                                        <input type="hidden" class="form-control" id="prapprov<?php echo $value->book_code; ?>" value="<?php echo $value->book_code;?>"/>
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
                                        <p><?php echo $value->name_book;?></p>
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
                                      <p><?php echo $value->remark;?></p>
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
                                    <p><?php echo date('d/m/Y' ,strtotime($value->date_book)); ?></p>
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
                                      <p><?php echo $value->address_book;?></p>
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
                                      <p><?php echo $value->message;?></p>
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
                                          $prpr = $value->book_code;
                                          $this->db->select('*');
                                          $this->db->where('ref_codetransfer', $prpr);
                                          $q =  $this->db->get('ic_bookingitem');
                                          $res = $q->result();
                                          foreach ($res as $valj){ ?>
                                        <tr>
                                          <td><?php echo $n; ?></td>
                                         <td><?php echo substr($valj->costcode, -5); ?></td>
                                          <td><?php echo $valj->mat_name; ?></td>
                                           <td><?php echo $valj->qty; ?>&nbsp;<?php echo $valj->unit; ?></td>
                                         </tr>
                                          <?php $n++; } ?>
                                      </tbody>
                        </table>
                      </div>
                        <div class="modal-footer">
                              <button type="button" class="cance<?php echo $value->book_code; ?> btn bg-danger-600" data-dismiss="modal">Cancel</button>
                            </div>
                    </div>

                  </div>
                </div>
                <div id="dis<?php echo $value->book_code; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Disapprove Detail PR No.: <?php echo $value->book_code; ?></h5>
                      </div>

                      <div class="modal-body">
                      <div class="col-md-12">
                        <label>Remark Disapprove :</label>
                        <div class="form-group">

                          <textarea name="textdisdetail" class="form-control" id="textdisdetail<?php echo $value->book_code; ?>" cols="30" rows="10" placeholder="Example : Do Not Approve"></textarea>
                        </div>
                      </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="disapprov<?php echo $value->book_code; ?> btn bg-danger-600" data-dismiss="modal">Disapprove</button>
                      </div>
                    </div>
                  </div>
                </div>
                <script>
                  $(".disapprov<?php echo $value->book_code;?>").click(function(event) {

                         var url="<?php echo base_url(); ?>index.php/pr_active/disapprove_pr/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>",
                                                  remark: $("#textdisdetail<?php echo $value->book_code; ?>").val()
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                    title: "Are you sure?",
                                    text: "You will not be able to recover this imaginary file PR No.:!"+data,
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
                                });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });
                </script>
                <script>
                  $(".cance<?php echo $value->book_code; ?> ").click(function(event) {
                      var url="<?php echo base_url(); ?>index.php/pr_active/cancel_pr/<?php echo $value->book_code;?>/<?php echo $value->book_code;?>";
                                                var dataSet={
                                                  prno: "<?php echo $value->book_code; ?>"
                                                };
                                                $.post(url,dataSet,function(data){
                                                   swal({
                                  title: "Cancelled!",
                                  text: "Cancelled PR No."+data,
                                  confirmButtonColor: "#ff002e",
                                  type: "error"
                              });
                                                   setTimeout(function() {
                                                   window.location.href = "<?php echo base_url(); ?>pr/pr_approve/<?php echo $pjcode; ?>/<?php echo $value->project_id; ?>";
                                                  }, 500);
                                                });
                  });

                </script>
              <?php } ?>
<script>
$(".datatable-basicxas").DataTable();

$('#purchase').attr('class', 'active'); 
$('#pr_approve').attr('style', 'background-color:#dedbd8');

</script>
