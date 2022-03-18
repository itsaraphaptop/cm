<div class="container">
    <div class="row ">

        <div class="col-xs-12">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ระบบจัดการข้อมูลพนักงาน</h1><hr>
            <div class="" style="height:100px;">

                    <a href="<?php echo base_url();?>index.php/datastore/project">
                        <button class="btn btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการโครงการ<bR> Project</p></div>

                        </div>
                    </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/matcode">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">จัดการรหัสวัสดุ<br> Matcode</p></div>

                        </div>
                    </button>
                    </a>
                    <a href="<?php echo base_url();?>index.php/datastore/costcode">
                    <button class="btn  btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
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
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1></div>
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
               <?php foreach($list as $val){?>
                <a id="d<?php echo $val->department_id;?>" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $val->department_title;?></a>
              <?php } ?>
            </div>

            <div class="panel-footer"></div>
        </div>
    </div>
    <div class="col-xs-9">

        <div class="panel panel-primary">
            <div class="panel-heading">จัดการข้อมูลผู้ใช้</div>

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อพนักงาน</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ใช้งานล่าสุด</th>
                    <th span="3">จัดการ</th>
                </tr>
                </thead>
                <tbody id="loadbox">

                </tbody>
            </table>

        </div>

    </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    jQuery(document).ready(function() {
            $('#loadbox').load('<?php echo base_url();?>index.php/datastore/service_user/1');
    });
</script>
