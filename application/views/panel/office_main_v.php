<!-- kendo -->  

<script src="<?php echo base_url(); ?>dist/js/jquery.min.js"></script>

<div class="container">
    <style>
        #testreceivepo,#newpo,#approve_pettycash,#apinvreal,#PM,#apapprovinv,#apinv,#allissue,#issue,#allcpo,#head,#create,#enable,#disable,#approve_pr,#createpo,#pr,#loi,#allpo,#allloi,#approvepo,#prettycash,#allpr,#allpettycash,#receive,#receiveic,#receivepo,#receiveall,#reportall,#callpettycash,#callpr,#allreceive,#stock{cursor: pointer;}
        #allcpo:hover,#head:hover,#create:hover,#enable:hover,#disable:hover,#receive:hover,#callpettycash:hover,#callpr:hover,#allreceive:hover,#stock:hover{background: #ADD6FF;}
    .sidebar-nav a {
    display: block;
    text-decoration: none;
    color: #222;
}
.sidebar-nav ul {
  
    border-bottom: 1px solid #d4d4d4;
   
}
    </style>

    
    <div class="row">
      <div class="col-xs-3">
        <div class="row">
              <div class="col-xs-6">
                       <img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" class="img-responsive img-rounded">
              </div>
              <div class="col-xs-6">
                 <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $name; ?></h3>
                  <?php if ($dep=="") {?>
                      <h5><?php echo $project; ?></h5>
                  <?php  }else{ ?>
                      <h5><?php echo $dep; ?></h5>
                  <?php } ?>
                  <span class="label label-success">online</span>
              </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-xs-3">

            <div class="panel panel-primary">
                <div class="panel-heading">เมนูหลัก</div>
                <div class="list-group">
                <?php if ($moffce!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="head"> <!-- start -->
                          <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ระบบจัดการในสำนักงาน </a>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                        <ul class="sublist"  id="pr">
                          <a style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบขอซือใหม่ PR</a>
                        </ul>
                        <ul class="sublist"  id="prettycash">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบเบิกเงินสด</a>
                        </ul>
                        <ul class="sublist"  id="allpr">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบขอซื้อทั้งหมด</a>
                        </ul>
                        <ul class="sublist"  id="allpettycash">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบเบิกเงินสดทั้งหมด</a>
                        </ul>
                        <?php if ($approve!='true') {?>
                          
                        <?php }else{ ?>
                        <ul class="sublist"  id="approve_pr">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp; อนุมัติใบขอซื้อ</a>
                        </ul>
                        <?php } ?>
                        <?php if ($pc_approve!='true') {?>
                         
                        <?php }else{ ?>
                             <ul class="sublist"  id="approve_pettycash">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp; อนุมัติใบเบิกเงินสด <span class="label label-danger">new</span></a>
                        </ul>
                        <?php } ?>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mpo!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="head"> <!-- start -->
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ระบบใบสั่งซื้อ </a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                       <!--  <ul class="sublist"  id="createpo">
                          <a style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งซือใหม่ PO</a>
                        </ul> -->
                         <ul class="sublist"  id="newpo">
                          <a id="ponew" href="<?php echo base_url(); ?>index.php/purchase/newpo" style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งซือใหม่ PO <span class="label label-success">New</span></a>
                        </ul>
                        <ul class="sublist"  id="loi">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งจ้าง</a>
                        </ul>
                        <ul class="sublist"  id="allpo">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบสั่งซื้อทั้งหมด</a>
                        </ul>
                        <ul class="sublist"  id="allloi">
                         <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp;รายการใบสั่งจ้างทั้งหมด</a>
                        </ul>
                        <ul class="sublist"  id="approvepo">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp;อนุมติใบสั่งซื้อ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mic!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="receive">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบคลังวัสดุ</a>
                    </div>
                         
                    <div id="collapse3" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับสินค้าเข้า</a>
                        </ul>
                         <ul class="sublist"  id="testreceivepo">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับสินค้าเข้า <span class="label label-warning">test</span></a>
                        </ul>
                        <!--<ul class="sublist"  id="receiveic">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าเข้าสต๊อก</a>
                        </ul>-->
                        <ul class="sublist"  id="issue">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกเบิกวัสดุ</a>
                        </ul>
                        <ul class="sublist"  id="allissue">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการเบิกวัสดุ</a>
                        </ul>
                        <ul class="sublist"  id="receiveall">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; วัสดุคงคลัง</a>
                        </ul>
                        <ul class="sublist"  id="reportall">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายงานรายการวัสดุ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($map!='true') {?>
                      
                   <?php }else{ ?>
                    <div class="list-group-item" id="ap">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบเจ้าหนี้ (AP)</a>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="apinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul>
                        <ul class="sublist"  id="apinvreal">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้ <span class="label label-primary">เพิ่มใหม่</span></a>
                        </ul>
                       <!--  <ul class="sublist"  id="apbill">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับวางบิล</a>
                        </ul>-->
                        <ul class="sublist"  id="apapprovinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการชำระจ่ายเจ้าหนี้ทั้งหมด</a>
                        </ul>
                       <!-- <ul class="sublist"  id="appayinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul> -->
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mar!='true') {?>
                      
                   <?php }else{ ?>
                     <div class="list-group-item" id="ar">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ลูกหนี้ (AR)</a>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a href="#" style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกใบแจ้งหนี้</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกตั้งบัญชีลูกหนี้</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกใบเสร็จรับเงิน</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระตามใบเสร็จ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <?php } ?>
                    <?php if ($mpm!='true') {?>
                      
                    <?php }else{ ?>
                     <div class="list-group-item" id="PM">
                        <a href="<?php echo base_url(); ?>index.php/panel/manag" style="color:#000;"><span  class="glyphicon glyphicon-stats" aria-hidden="true"></span> Management System  <span class="label label-warning">Beta</span></a>
                    </div>
                    <?php } ?>
                </div>

                <div class="panel-footer"></div>
            </div>

            <div id="sitedetail" class="panel panel-primary">
                <div class="panel-heading">ข้อมูลใบสั่งซื้อ</div>
                <div class="panel-body" id="allcpo">
                   <div class="col-xs-5" style="border-right:1px solid #ddd; text-align: right; font-weight: bold;">
                    <h1 style="line-height: 20px;"><?php echo $allpo; ?></h1>
                    <small>รายการ</small>
                   </div>
                   <div class="col-xs-7">
                    <strong>รายการใบสั่งซื้อ</strong>
                    <p  style="margin-top:30px;"><button  class="btn btn-xs btn-danger">เปิดทั้งหมด</button></p>
                   </div>
                </div>
            </div>
        </div>

           
        
        <!----------------------------- page ---------------------->
        <style>
  hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0; 
}
</style>
<div class="col-xs-9" id="title" style="margin-top:-140px;">
  
      <div class="col-xs-12">
        <h1>MAKE SYSTEM</h1>
        <h3>Business Intelligence For Construction</h3>
        <hr>
      </div>
</div>
        <div class="col-xs-9" >
                <div id="loaddata">
                  <div class="col-xs-4">
                      <div id="sitedetail" class="panel panel-default">
                          <div class="panel-body">
                            <h1><?php echo $projectenable; ?> <small>โครงการ</small></h1>
                          </div>
                          <div class="panel-footer">
                            <button class="btn btn-xs btn-danger">รายละเอียด</button>
                            <strong style="float:right;">โครงการที่ยังดำเนินการอยู่</strong>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-4">
                      <div id="sitedetail" class="panel panel-default">
                        <div class="panel-body">
                          <h1><?php echo $projectclose; ?> <small>โครงการ</small></h1>
                        </div>
                        <div class="panel-footer">
                          <button class="btn btn-xs btn-danger">รายละเอียด</button>
                          <strong style="float:right;">โครงการที่ปิดไปแล้ว</strong>
                        </div>
                      </div>
                  </div>
                  <div class="col-xs-4">
                    <div class="panel panel-default">
                      <div class="panel-body ">
                        <h1><?php echo $allpo; ?> <small>รายการ</small></h1>
                      </div>
                      <div class="panel-footer">
                        <button class="btn btn-xs btn-danger">รายละเอียด</button>
                        <strong style="float:right;">รายการใบสั่งซื้อ</strong>
                      </div>
                  	</div>
                  </div>
                   <div class="col-xs-4">
                    <div class="panel panel-default">
                      <div class="panel-body ">
                          <h1><?php echo $allpr; ?> <small>รายการ</small></h1>
                      </div>
                      <div class="panel-footer">
                          <button class="btn btn-xs btn-danger">รายละเอียด</button>
                          <strong style="float:right;">รายการขอซื้อทั้งหมด</strong>
                      </div>
                    </div>
                  </div>
 










    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.dataviz.default.min.css" />

    <script src="<?php echo base_url();?>telerik/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>telerik/js/jszip.min.js"></script>
    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.bootstrap.min.css" />


  <div id="example">
            <!-- show notification -->
            <!-- <span id="notification"></span> -->

           

<!--             <script id="emailTemplate" type="text/x-kendo-template">
                <div class="new-mail">
                    <img src="<?php echo base_url();?>profile/<?php echo $imgu; ?>" id="imgAvatar" width="30%" class="img-responsive img-rounded" />
                    <h3>#= title #</h3>
                    <p>#= message #</p>
                </div>
            </script>

            <script>
                $(document).ready(function() {

                    var notification = $("#notification").kendoNotification({
                        position: {
                            pinned: true,
                            bottom: -30,
                            right: -80
                        },
                        autoHideAfter: 2000,
                        stacking: "down",
                        templates: [{
                            type: "info",
                            template: $("#emailTemplate").html()
                        }]

                    }).data("kendoNotification");
                        notification.show({
                            title: "ยินดีต้อนรับ",
                            message: "<?php echo $name; ?>"
                        }, "info");
                  

                });
            </script>

            <style>
                 /* Info template */
              
                .new-mail {
                    width: 300px;
                    height: 80px;
                     margin-bottom: 30px;
                }
                .new-mail h3 {
                    font-size: 1em;
                    padding: 32px 10px 5px;
                   
                }
                .new-mail img {
                    float: left;
                    margin: 30px 15px 30px 30px;
                }
            </style> -->
        </div>





































        </div>
        
    </div><!--end row-->
</div>

<script>

    $('#createpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/po');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"createpo"};$.post(url,dataSet,function(data){});
    });
    $('#pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/newpr');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"pr"};$.post(url,dataSet,function(data){});
    });
    $('#allpr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/receice_allpr');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"allpr"};$.post(url,dataSet,function(data){});
    });
    $('#allpettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/pettycash/service_allpettycash');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"allpettycash"};$.post(url,dataSet,function(data){});
    });
    $('#approve_pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/service_approve_pr');
        $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"approve_pr"};$.post(url,dataSet,function(data){});
    });
    $('#loi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/order/newloi');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"loi"};$.post(url,dataSet,function(data){});
    });
    $('#allpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"allpo"};$.post(url,dataSet,function(data){});
    });
    $('#approvepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/service_approve_po');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"approvepo"};$.post(url,dataSet,function(data){});
    });
    $('#allloi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/order/receive_loi');
      $("#title").hide();
    });
    $('#prettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newprettycash');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"pettycash"};$.post(url,dataSet,function(data){});
    });
    $('#stock').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/stock');
      $("#title").hide();var url="<?php echo base_url(); ?>index.php/log/userlog";var dataSet={username:"<?php echo $username;?>",menu:"stock"};$.post(url,dataSet,function(data){});
    });
    $('#allcpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
      $("#title").hide();
    });
    $('#receivepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/main_projpo_receive_h');
      $("#title").hide();
    });
    $('#receiveic').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/service_ic_receive_h');
      $("#title").hide();
    });
    $("#receiveall").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/loadinventory');
      $("#title").hide();
    });

    $("#reportall").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/report_issueall');
      $("#title").hide();
    });
    $("#issue").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/docissue');
      $("#title").hide();
    });
    $("#allissue").click(function() {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/show_all_docissue');
      $("#title").hide();
    });
    $("#apinv").click(function(event) {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/main_pv');
      $("#title").hide();
    });
    $("#apapprovinv").click(function(event) {
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/acc/allapv');
      $("#title").hide();
    });
    $('#apinvreal').click(function(event) {
     $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
     $('#loaddata').load('<?php echo base_url(); ?>index.php/newapo/newpv');
      $("#title").hide();
    });
    $("#approve_pettycash").click(function(event) {
       $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
       $('#loaddata').load('<?php echo base_url(); ?>index.php/pettycash/view_appr_pettycash');
       $("#title").hide();
    });
     $("#ponew").click(function(event) {
       $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
     
       $("#title").hide();
    });
     $('#testreceivepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/stock/po_receive');
      $("#title").hide();
    });

</script>

 
<!-- kendo end-- >
