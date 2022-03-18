<style>
.wrapper {
background: #d00c0c;
background: -webkit-linear-gradient(top left, #940e0e 0%, #FB8C00 100%);
background: linear-gradient(to bottom right, #ec971f 20%, #FB8C00  100%);
position: absolute;

left: 0;
width: 100%;
height: 100%;

overflow: hidden;
}
.wrapper.form-success .container h1 {
-webkit-transform: translateY(85px);
 -ms-transform: translateY(85px);
     transform: translateY(85px);
}
.bg-bubbles {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}
.bg-bubbles li {
position: absolute;
list-style: none;
display: block;
width: 40px;
height: 40px;
background-color: rgba(255,106,0,0.3);
bottom: -160px;
-webkit-animation: square 25s infinite;
animation: square 25s infinite;
-webkit-transition-timing-function: linear;
transition-timing-function: linear;
}
.bg-bubbles li:nth-child(1) {
left: 10%;
}
.bg-bubbles li:nth-child(2) {
left: 20%;
width: 80px;
height: 80px;
-webkit-animation-delay: 2s;
     animation-delay: 2s;
-webkit-animation-duration: 17s;
     animation-duration: 17s;
}
.bg-bubbles li:nth-child(3) {
left: 25%;
-webkit-animation-delay: 4s;
     animation-delay: 4s;
}
.bg-bubbles li:nth-child(4) {
left: 40%;
width: 60px;
height: 60px;
-webkit-animation-duration: 22s;
     animation-duration: 22s;
background-color: rgba(255, 255, 255, 0.25);
}
.bg-bubbles li:nth-child(5) {
left: 70%;
}
.bg-bubbles li:nth-child(6) {
left: 80%;
width: 120px;
height: 120px;
-webkit-animation-delay: 3s;
     animation-delay: 3s;
background-color: rgba(255, 255, 255, 0.2);
}
.bg-bubbles li:nth-child(7) {
left: 32%;
width: 160px;
height: 160px;
-webkit-animation-delay: 7s;
     animation-delay: 7s;
}
.bg-bubbles li:nth-child(8) {
left: 55%;
width: 20px;
height: 20px;
-webkit-animation-delay: 15s;
     animation-delay: 15s;
-webkit-animation-duration: 40s;
     animation-duration: 40s;
}
.bg-bubbles li:nth-child(9) {
left: 25%;
width: 10px;
height: 10px;
-webkit-animation-delay: 2s;
     animation-delay: 2s;
-webkit-animation-duration: 40s;
     animation-duration: 40s;
background-color: rgba(255, 255, 255, 0.3);
}
.bg-bubbles li:nth-child(10) {
left: 90%;
width: 160px;
height: 160px;
-webkit-animation-delay: 11s;
     animation-delay: 11s;
}
@-webkit-keyframes square {
0% {
-webkit-transform: translateY(0);
       transform: translateY(0);
}
100% {
-webkit-transform: translateY(-700px) rotate(600deg);
       transform: translateY(-700px) rotate(600deg);
}
}
@keyframes square {
0% {
-webkit-transform: translateY(0);
       transform: translateY(0);
}
100% {
-webkit-transform: translateY(-700px) rotate(600deg);
       transform: translateY(-700px) rotate(600deg);
}
}

</style>
<!-- <div class="page-header">
   <div class="page-header-content">
       <div class="page-title">
           <div class="row">
               <div class="col-xs-6">
               <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold"> Dashboard - ภาพรวมระบบ</span></h4>
               </div>
               <div class="col-xs-6">

               <img src="<?php echo base_url(); ?>comp/<?php echo $compimg; ?>" class="img-responsive pull-right" style="max-height: 50px; " data-pin-nopin="true">
               </div>
           </div>
       </div>

       <div class="heading-elements">
           <div class="heading-btn-group">
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-isimary"></i><span>Statistics</span></a>
               <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-isimary"></i> <span>Invoices</span></a>
               <a href="<?php echo base_url(); ?>index.php/manag/calenda" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-isimary"></i> <span>Schedule</span></a>
           </div>
       </div>
   </div>

   <div class="breadcrumb-line">
       <ul class="breadcrumb">
           <li><a href="<?php echo base_url(); ?>panel/office"><i class="icon-home2 position-left"></i> Home</a></li>
           <li><a href="<?php echo base_url(); ?>panel/officemanage"> Dashboard</a></li>
       </ul></div>
</div> -->
<div class="container">
<!-- <div class="col-sm-8">
<div class="card">
 <img class="card-img-top" src="<?php echo base_url(); ?>imgasset/screen.png" alt="Card image cap">
<img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22769%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20769%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15c9c41f471%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A38pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15c9c41f471%22%3E%3Crect%20width%3D%22769%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22266.21875%22%20y%3D%22107.4%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
</div>
</div>
<div class="col-sm-4">

<div class="card">
 <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15c9c234333%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15c9c234333%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22109.203125%22%20y%3D%2297.35%22%3EImage%20cap%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
</div>
</div> -->



<!--  -->
<?php
foreach ($res as $e) {
$master = $e->m_master;
$mpm = $e->m_pm;
$map = $e->m_ap;
$mic = $e->m_ic;
$mpo = $e->m_po;
$mapprove = $e->pettycash_approve;
$mpr = $e->pr_approve;
$mar = $e->m_ar;
$mst = $e->m_st;
}
?>

           <div class="panel-body" style="margin-top: 30px;">
             <div class="row">
             <div class="col-lg-4">
                 <ul class="media-list content-group">
                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>office/openblank">
                           <img src="<?php echo base_url(); ?>assets/images/module/OM.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Purchase Requisition System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                       <a href="<?php echo base_url(); ?>office/openblank" class="label label-primary">Open</a>
                     </div>
                   </li>

                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>inventory/open">
                           <img src="<?php echo base_url(); ?>assets/images/module/IC.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Inventory Control System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                                 <?php if ($mic!="true") { ?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{?>
                         <a href="<?php echo base_url(); ?>inventory/open" class="label label-primary">Open</a>
                                 <?php } ?>

                     </div>
                   </li>
                 </ul>
               </div>

             <div class="col-lg-4">
                 <ul class="media-list content-group">
                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>bd/boq_openProject">
                           <img src="<?php echo base_url(); ?>assets/images/module/BD.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Budget Control System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                       <?php if ($mbd!="true") { ?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{ ?>
                         <a href="<?php echo base_url(); ?>bd/boq_openProject" class="label label-primary">Open</a>
                                 <?php } ?>
                     </div>
                   </li>

                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>add_asset">
                           <img src="<?php echo base_url(); ?>assets/images/module/FA.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Fix Asset Management</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                       <?php if ($mic!="true") { ?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{?>
                         <a href="<?php echo base_url(); ?>add_asset" class="label label-primary">Open</a>
                                 <?php } ?>
                     </div>
                   </li>
                 </ul>
               </div>

               <div class="col-lg-4">
                 <ul class="media-list content-group">
                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>purchase/blankpo">
                           <img src="<?php echo base_url(); ?>assets/images/module/PO.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Purchase Order System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                                 <?php if ($mpo!="true") { ?>
                       <a class="label label-default">Disable</a>
                       <?php }else{ ?>
                       <a href="<?php echo base_url(); ?>purchase/blankpo" class="label label-primary">Open</a>
                       <?php } ?>
                     </div>
                   </li>

                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>ar/ar_main_v">
                           <img src="<?php echo base_url(); ?>assets/images/module/AR.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Account Receivable</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                                 <?php if ($mar!="true") { ?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{ ?>
                         <a href="<?php echo base_url(); ?>ar/ar_main_v" class="label label-primary">Open</a>
                                 <?php } ?>

                     </div>
                   </li>

                 </ul>
               </div>

               <div class="col-lg-4">
                 <ul class="media-list content-group">
                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>ap/ap_main_v">
                           <img src="<?php echo base_url(); ?>assets/images/module/AP.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Account Payable System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                                 <?php if ($map!="true") {?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{?>
                         <a href="<?php echo base_url(); ?>ap/ap_main_v" class="label label-primary">Open</a>
                                 <?php } ?>

                     </div>
                   </li>

                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>management/pm_overview">
                           <img src="<?php echo base_url(); ?>assets/images/module/PM.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">Managements Report</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                                 <?php if ($mpm!="true") { ?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{ ?>
                         <a href="<?php echo base_url(); ?>management/pm_overview" class="label label-primary">Open</a>
                                 <?php } ?>

                     </div>
                   </li>
                 </ul>
               </div>

               <div class="col-lg-4">
                 <ul class="media-list content-group">
                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="<?php echo base_url(); ?>gl/gl_main">
                           <img src="<?php echo base_url(); ?>assets/images/module/GL.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">General Ledger System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     Office
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
                       <?php if ($map!="true") {?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{?>
                         <a href="<?php echo base_url(); ?>gl/gl_main" class="label label-primary">Open</a>
                                 <?php } ?>
                     </div>
                   </li>


                 </ul>
               </div>
               <div class="col-lg-4">
                 <ul class="media-list content-group">
                   <li class="media stack-media-on-mobile">
                             <div class="media-left">
                       <div class="thumb">
                         <a href="http://itsm.cloudmeka.com">
                           <img src="<?php echo base_url(); ?>assets/images/module/aide.png" class="img-responsive img-rounded media-preview" alt="">
                           <!-- <span class="zoom-image"><i class="icon-select2"></i></span> -->
                         </a>
                       </div>
                     </div>

                             <div class="media-body">
                       <h6 class="media-heading">IT Service Management System</h6>
                                 <ul class="list-inline list-inline-separate text-muted mb-5">
                                   <li>
<!-- 							                    			<i class="icon-book-play position-left"></i> -->
                                     แจ้งปัญหาการใช้งานโปรแกรม
                                    </li>
<!-- 							                    			<li>14 minutes ago</li> -->
                                 </ul>
<!--
                       <?php if ($map!="true") {?>
                         <button class="label label-default">Disable</button>
                                 <?php }else{?>
-->
                         <a href="http://itsm.cloudmeka.com" class="label label-primary">Open</a>
<!--                                  <?php } ?> -->
                     </div>
                   </li>


                 </ul>
               </div>
             </div>

<!--  -->
</div>

<ul class="bg-bubbles">
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>

<script src="<?php echo base_url();?>dist/js/login.js"></script>
