<div id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6">
        <h1>MEKA SYSTEM</h1>
        <h3>ระบบบริหารจัดการธุรกิจก่อสร้าง</h3>
        <hr>
      </div>
      <div class="col-xs-2">
        <div class="panel panel-default">
          <div class="panel-body" style="height:80px; text-align: center;">
            <h1 style="line-height: 5px;">30</h1>
            <p>รายการ</p>
          </div>
          <div class="panel-footer">
            <span class="label label-warning">รออนุมัติ</span>
          </div>
        </div>
      </div>
      <div class="col-xs-2">
        <div class="panel panel-default">
          <div class="panel-body" style="height:80px; text-align: center;">
            <h1 style="line-height: 5px;">50</h1>
            <p>รายการ</p>
          </div>
          <div class="panel-footer">
            <span class="label label-success">อนุมัติแล้ว</span>
          </div>
        </div>
      </div>
      <div class="col-xs-2">
        <div class="panel panel-default">
          <div class="panel-body" style="height:80px; text-align: center;">
            <h1 style="line-height: 5px;">90</h1>
            <p>รายการ</p>
          </div>
          <div class="panel-footer">
            <span class="label label-info label-block">ทั้งหมด</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-3">
        <div class="row">
          <div class="col-xs-6">
            <img src="<?php echo base_url(); ?>dist/img/no_avatar.jpg" alt="Image" class="img-responsive img-rounded">
          </div>
          <div class="col-xs-6">
            <h3> <?php echo $name; ?></h3>
            <?php if ($dep=="") {?>
            <h5><?php echo $project; ?></h5>
            <?php  }else{ ?>
            <h5><?php echo $dep; ?></h5>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-xs-9" id="title">
        <div id="loaddata">
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
          
        </div>
      </div>
    </div>
  </div>
</div>