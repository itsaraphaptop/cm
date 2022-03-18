<div class="container" >

    <div class="row">
        <div class="col-xs-12">
          <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> COSTCODE </h1><hr>
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
                <a href="<?php echo base_url();?>index.php/datastore/vender">
                    <button class="btn btn-primary">
                        <div class="row">
                            <div class="col-xs-3"><h1><span class="glyphicon glyphicon-tent" aria-hidden="true"></span></h1></div>
                            <div class="col-xs-9"> <p style="margin-top:20px;">ร้านค้า/ผู้รับเหมา<bR> Vender</p></div>

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
    <h4> <?php echo $tname; ?> > <?php echo $gname; ?></h4>
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


        </div>
        <div class="col-xs-9">
                <div id="loadbox">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> ประเภทต้นทุน</div>
                      <table id="datasource" class="table table-striped table-bordered">
                          <thead>
                          <tr>
                              <th>Code</th>
                              <th>Cost Name</th>
                              <th>เปิด</th>
                              <th>แก้ไข</th>
                              <th>ลบ</th>
                          </tr>
                          </thead>
                          <tbody>

                          <?php foreach ($ccostsubgroup as $val) {?>

                                  <tr>
                                      <td><?php echo $val->csubgroup_code;?></td>
                                      <td><?php echo $val->csubgroup_name;?></td>
                                      <td><button class="btn btn-primary btn-block btn-xs"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> เปิด</button> </td>
                                      <td><button class="btn btn-warning btn-block btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> </td>
                                      <td><button class="btn btn-danger btn-block btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> </td>

                                  </tr>
                          <?php } ?>
                      </tbody>
                      </table>
                  </div>

                </div>
        </div>
    </div>
</div>
