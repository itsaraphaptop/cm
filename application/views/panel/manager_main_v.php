<!-- kendo -->  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="container">
    <style>
        #apinv,#allissue,#issue,#allcpo,#head,#create,#enable,#disable,#approve_pr,#createpo,#pr,#loi,#allpo,#allloi,#approvepo,#prettycash,#allpr,#allpettycash,#receive,#receiveic,#receivepo,#receiveall,#callpettycash,#callpr,#allreceive,#stock{cursor: pointer;}
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
                <img src="<?php echo base_url(); ?>dist/img/no_avatar.jpg" alt="Image" class="img-responsive img-rounded">
              </div>
              <div class="col-xs-6">
                 <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $name; ?></h3>
                  <?php if ($dep=="") {?>
                      <h5><?php echo $project; ?></h5>
                  <?php  }else{ ?>
                      <h5><?php echo $dep; ?></h5>
                  <?php } ?>

              </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-xs-3">

            <div class="panel panel-primary">
                <div class="panel-heading">เมนูหลัก</div>
                <div class="list-group">
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
                        <ul class="sublist"  id="approve_pr">
                          <a style="color:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;&nbsp; อนุมัติใบขอซื้อ</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <div class="list-group-item" id="head"> <!-- start -->
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ระบบใบสั่งซื้อ </a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                        <ul class="sublist"  id="createpo">
                          <a style="margin-top:10px; color:#fff;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;บันทึกใบสั่งซือใหม่ PO</a>
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
                    <div class="list-group-item" id="receive">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบคลังวัสดุ</a>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าจากใบสั่งซื้อ</a>
                        </ul>
                        <ul class="sublist"  id="receiveic">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าเข้าสต๊อก</a>
                        </ul>
                        <ul class="sublist"  id="issue">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; เบิกวัสดุ</a>
                        </ul>
                        <ul class="sublist"  id="allissue">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการเบิกวัสดุ</a>
                        </ul>
                        <ul class="sublist"  id="receiveall">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; วัสดุคงคลัง</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <div class="list-group-item" id="ap">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบเจ้าหนี้การค้า (AP)</a>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="apinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul>
                       <!--  <ul class="sublist"  id="apbill">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับวางบิล</a>
                        </ul> -->
                       <!--  <ul class="sublist"  id="apapprovinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกอนุมัติจ่ายเจ้าหนี้</a>
                        </ul> -->
                        <!-- <ul class="sublist"  id="appayinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul> -->
                      </div>
                    </div><!-- end -->
                     <div class="list-group-item" id="ar">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ลูกหนี้การค้า (AR)</a>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a href="<?php echo base_url(); ?>index.php/test/test" style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าจากใบสั่งซื้อ</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าเข้าสต๊อก</a>
                        </ul>
                        <ul class="sublist"  id="">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการใบรับสินค้าทั้งหมด</a>
                        </ul>
                      </div>
                    </div><!-- end -->
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
 
<div id="main"></div>
</div>

<script>
// $(document).ready(function() {
   $('#main').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
  $("#main").load('<?php echo base_url(); ?>index.php/manag/dashboard');
// });
    $('#createpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/po');
        $("#title").hide();
    });
    $('#pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/newpr');
        $("#title").hide();
    });
    $('#allpr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/receice_allpr');
        $("#title").hide();
    });
    $('#allpettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/service_allpettycash');
    });
    $('#approve_pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/manag/waitprapprove');
        $("#title").hide();
    });
    $('#loi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newloi');
      $("#title").hide();
    });
    $('#allpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
      $("#title").hide();
    });
    $('#approvepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/service_approve_po');
      $("#title").hide();
    });
    $('#allloi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_loi');
      $("#title").hide();
    });
    $('#prettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newprettycash');
      $("#title").hide();
    });
    $('#stock').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/stock');
      $("#title").hide();
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

</script>

 
<!-- kendo end-- >
