<!-- kendo -->  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="container">
    <style>
        #allcpo,#head,#create,#enable,#disable,#approve_pr,#createpo,#pr,#loi,#allpo,#allloi,#approvepo,#prettycash,#allpr,#allpettycash,#receive,#receiveic,#receivepo,#receiveall,#callpettycash,#callpr,#allreceive,#stock{cursor: pointer;}
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


    <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> OFFICE</h3>
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
                        <ul class="sublist"  id="receiveall">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; รายการใบรับสินค้าทั้งหมด</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                    <div class="list-group-item" id="ap">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ระบบเจ้าหนี้การค้า (AP)</a>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="apinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกตั้งเจ้าหนี้</a>
                        </ul>
                        <ul class="sublist"  id="apbill">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกรับวางบิล</a>
                        </ul>
                        <ul class="sublist"  id="apapprovinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกอนุมัติจ่ายเจ้าหนี้</a>
                        </ul>
                        <ul class="sublist"  id="appayinv">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; บันทึกชำระเจ้าหนี้</a>
                        </ul>
                      </div>
                    </div><!-- end -->
                     <div class="list-group-item" id="ar">
                        <a style="color:#000;" data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ลูกหนี้การค้า (AR)</a>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse vmenu" role="tabpanel" aria-labelledby="headingOne">
                      <div class="list-group-item" style="background:#383838;">
                         <ul class="sublist"  id="receivepo">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าจากใบสั่งซื้อ</a>
                        </ul>
                        <ul class="sublist"  id="receiveic">
                          <a style="color:#fff;"><span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span>&nbsp;&nbsp; ใบรับสินค้าเข้าสต๊อก</a>
                        </ul>
                        <ul class="sublist"  id="receiveall">
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

        <div class="col-xs-9" >
                <div id="loaddata">
                  <div class="col-md-4">
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
                  <div class="col-md-4">
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
                  <div class="col-md-4">
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
                   <div class="col-md-4">
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
 
        </div>
        
    </div><!--end row-->
</div>

<script>

    $('#createpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/po');
    });
    $('#pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/newpr');
    });
    $('#allpr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/receice_allpr');
    });
    $('#allpettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/service_allpettycash');
    });
    $('#approve_pr').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/office/service_approve_pr');
    });
    $('#loi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newloi');
    });
    $('#allpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
    });
    $('#approvepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/service_approve_po');
    });
    $('#allloi').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_loi');
    });
    $('#prettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newprettycash');
    });
    $('#stock').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/stock');
    });
    $('#allcpo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/receive_po');
    });
    $('#receivepo').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/main_projpo_receive_h');
    });
    $('#receiveic').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/service_ic_receive_h');
    });
    


</script>

 
<!-- kendo end-- >
