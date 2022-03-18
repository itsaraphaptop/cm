<div class="container" style="margin-top: 20px; ">
<style>
    #create,#enable,#disable{cursor: pointer;}
    #create:hover,#enable:hover,#disable:hover{background: #ADD6FF;}
</style>
    <div class="row">
        <div class="col-xs-12">
          <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> จัดการโครงการของบริษัท</h1><hr>
            <div class="" style="height:100px;">

                <a href="<?php echo base_url();?>index.php/datastore/project">
                    <button class="btn btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-tent" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการโครงการ<bR> Project</p></div>

                        </div>
                    </button>
                </a>
                <a href="<?php echo base_url();?>index.php/datastore/matcode">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการรหัสวัสดุ<br> Matcode</p></div>

                        </div>
                    </button>
                </a>
                <a href="<?php echo base_url();?>index.php/datastore/costcode">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-subtitles" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการรหัสราคา<br> Costcode</p></div>

                        </div>
                    </button>
                </a>
                <a href="<?php echo base_url();?>index.php/datastore/user">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการข้อมูลพนักงาน</p></div>

                        </div>
                    </button>
                </a>
                <a href="<?php echo base_url();?>index.php/datastore/vender">
                    <button class="btn btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-tent" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">ร้านค้า/ผู้รับเหมา<bR> Vender</p></div>

                        </div>
                    </button>
                </a>
                <a href="<?php echo base_url();?>index.php/datastore/company">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการข้อมูลบริษัท</p></div>

                        </div>
                    </button>
                </a>

            </div>
        </div>

    </div>

    <div class="row" style="margin-top:10px;">
        <div class="col-xs-3">

            <div class="panel panel-primary">
                <div class="panel-heading">เมนูหลัก</div>
                <div class="list-group">
                <div class="list-group-item" id="create">
                   <span  class="glyphicon glyphicon-plus" aria-hidden="true"></span> สร้างโครงการใหม่
                </div>
                <div class="list-group-item" id="enable">
                   <span  class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> รายการโครงการที่ดำเนินอยู่
                </div>
                <div class="list-group-item" id="disable">
                   <span  class="glyphicon glyphicon-inbox" aria-hidden="true"></span> รายการโครงการที่จบไปแล้ว
                </div>
                    </div>

                <div class="panel-footer"></div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">โครงการทั้งหมด</div>
                <div class="panel-body">
                    <div class="row" style="text-align:center;">
                        <div class="col-xs-6" style="border-right:1px dotted #ddd;">
                            <p>ดำเนินงาน</p>
                            <h1><?php echo $enable; ?></h1>
                            <p>โครงการ</p>
                        </div>
                        <div class="col-xs-6">
                            <p>ปิดโครงการ</p>
                            <h1><?php echo $disable; ?></h1>
                            <p>โครงการ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-9">

            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> โครงการ</div>

               <div id="loadbox">

               </div>


            </div>

        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
 $("#loadbox").html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
        $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_create_project');
        $('#create').click(function()
        {
             $("#loadbox").html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
            $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_create_project');
        });
        $('#enable').click(function()
        {
             $("#loadbox").html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
            $('#loadbox').load('<?php echo base_url();?>index.php/datastore/project_enable');
        });
        $('#disable').click(function()
        {
             $("#loadbox").html("<img src='<?php echo base_url();?>dist/img/loading.gif'>");
            $('#loadbox').load('<?php echo base_url();?>index.php/datastore/project_disable');
        });
    });
</script>
