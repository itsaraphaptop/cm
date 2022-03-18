<div class="container">
    <style>
        #create,#enable,#disable,#prettycash,#pr,#receive,#callpettycash,#callpr,#allreceive,#stock{cursor: pointer;}
        #create:hover,#enable:hover,#disable:hover,#prettycash:hover,#pr:hover,#receive:hover,#callpettycash:hover,#callpr:hover,#allreceive:hover,#stock:hover{background: #ADD6FF;}
    </style>

    <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> โครงการ <?php echo $projectname; ?></h3>
    <div class="row" style="margin-top:10px;">
        <div class="col-xs-3">

            <div class="panel panel-primary">
                <div class="panel-heading">เมนูหลัก</div>
                <div class="list-group">
                    <div class="list-group-item" id="prettycash">
                        <span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> PrettyCash
                    </div>
                    <div class="list-group-item" id="pr">
                        <span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> สร้างใบ PR
                    </div>
                    <!-- <div class="list-group-item" id="receive">
                        <span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> ใบรับสินค้า
                    </div> -->
                    <div class="list-group-item" id="callpettycash">
                        <span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> รายการ PrettyCash ทั้งหมด
                    </div>
                    <div class="list-group-item" id="callpr">
                        <span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> รายการ PR ทั้งหมด
                    </div>
                    <!-- <div class="list-group-item" id="allreceive">
                        <span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> รายการใบรับสินค้าทั้งหมด
                    </div> -->
                    <!-- <div class="list-group-item" id="stock">
                        <span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> คลังวัสดุ
                    </div> -->
                </div>

                <div class="panel-footer"></div>
            </div>

            <div id="sitedetail" class="panel panel-primary">
                <div class="panel-heading">ข้อมูลโครงการ</div>
                <div class="panel-body">
                   <strong>ชื่อโครงการ</strong><br>
                    <p><?php echo $projectname; ?></p>
                    <strong>ผู้รับผิดชอบโครงการ</strong><br>
                    <p><?php echo $projecteng; ?></p>
                    <strong>เบอร์โทรติดต่อ</strong><br>
                    <p><?php echo $projecttel; ?></p>
                </div>
            </div>
        </div>
        <div class="col-xs-9" >

                <div id="loaddata">

                </div>

        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

    $('#pr').click(function(){
       $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/site/new_pr');
    });

    $('#prettycash').click(function(){
        $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
      $('#loaddata').load('<?php echo base_url(); ?>index.php/office/newprettycash');
      //$('#loaddata').load('<?php echo base_url(); ?>index.php/site/new_prettycash');
    });

    $('#callpettycash').click(function(){
      $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/pettycash/service_allpettycash');

    });

    $('#callpr').click(function(){
        $('#loaddata').html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loaddata').load('<?php echo base_url();?>index.php/site/pr_all');
    });

</script>

