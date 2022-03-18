<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RE</title>

    
    <link rel="stylesheet" href="http://188.166.230.131/asset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://188.166.230.131/asset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://188.166.230.131/asset/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
            body{background-color: #ecf0f5;}
        </style>

  </head>
  <body>
   <div class="container-fluid">
    <div class="row">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-xs-8">
                    <h3>ภาพรวมทุกโครงการที่ดำเนินอยู่</h3>
                    
          
                </div>
                <div class="col-xs-4">
                    <img src="<?php echo base_url();?>dist/img/logo.png" class="img-responive pull-right">
                </div>
            </div>
          
         
        </section>

        <!-- Main content -->
        <section class="content">
        
        
        <div class="row">
            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>1250</h3>
                  <p>ภาพรวมการจอง</p>
                </div>
                <div class="icon">
                  <i class="fa fa-map"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>57%</h3>
                  <p>ข้อมูลการดำเนินงาน</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>4142</h3>
                  <p>ลูกค้า</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>1665</h3>
                  <p>ทำสัญญา</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>6,215,090</h3>
                  <p>รายรับจากการซื้อ</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>1,625,000</h3>
                  <p>ยอดค่าใช้จ่ายการตลาด</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            
            
          </div><!-- end row-->
          
          
          <div class="row">
              
               <div class="col-xs-12">
              
              
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart"></i>
                  <h3 class="box-title">กราฟแสดงข้อมูล</h3>
                </div><!-- /.box-header -->
                <div class="box-body clearfix">
                    
                    <div id="barchart" style="height:400px;"></div>
                    
                    
                 </div><!-- /.box-body -->
              </div><!-- /.box -->
           
            
            
          </div><!-- end col-12 -->



          </div><!-- end row-->
          
                   
          
          
          
          
         <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">รายการจอง</span>
                  <span class="info-box-number">4 สัญญา</span>
                  <span class="info-box-number">1,410,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">รายการทำสัญญา</span>
                  <span class="info-box-number">10 สัญญา</span>
                  <span class="info-box-number">1,410,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">จำนวนผู้ลงทะเบียน</span>
                  <span class="info-box-number">4</span>
                  <span class="info-box-number">13,648</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">ภาพรวมการใช้พื้นที่</span>
                  <span class="info-box-number">450</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            
            
           
            
            
                        
             <div class="col-md-6">
                 <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
                  <h3 class="box-title">รายการจอง</h3>
                </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        
                        <table class="table table-condensed table-striped table-bordered table-hover">
                    <tbody>
                        
                    <tr>
                      <th style="width: 10px">เลขที่</th>
                      <th>ชื่อร้าน</th>
                      <th>วันที่</th>
                      <th style="width: 15%;">หมดอายุ</th>
                    </tr>
                    <?php for($vb=0;$vb<5;$vb++){?>
                                      <tr>
                      <td>ST1Y59N234</td>
                      <td><a href="">นางสาว ทดสอบ ทดลองกรอก</a></td>
                      <td>
                        12/12/2559
                      </td>
                      <td><span class="badge bg-red">90 วัน</span></td>
                    </tr>
                    <?php }?>
                                                                             </tbody></table>
                  
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-xs btn-danger">เปิดทั้งหมด</button>
                    </div>
              </div>
             </div>
              
              <div class="col-md-6">
                 <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
                  <h3 class="box-title">รายการทำสัญญา</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                
                <table class="table table-condensed table-striped table-bordered table-hover">
                    <tbody>
                        
                    <tr>
                      <th style="width: 10px">เลขที่</th>
                      <th>ชื่อร้าน</th>
                      <th width="15%">วันที่</th>
                      <th style="width: 15%;">หมดอายุ</th>
                    </tr>
                    <?php for($va=0;$va<5;$va++){?>
                                      <tr>
                      <td>ST1Y59L12</td>
                      <td><a href="">รายการจอง</a></td>
                      <td>
                        12/12/2559
                      </td>
                      <td><span class="badge bg-red">32 วัน</span></td>
                    </tr>
                    <?php }?>
                                                                             </tbody></table>


                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-xs btn-danger">เปิดทั้งหมด</button>
                    </div>
              </div>
              
              
             </div>
            



          
          </div><!-- end row -->
                   
          <div> 
          
          
        </section>
    </div>
    </div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>asset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>asset/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>asset/dist/js/demo.js"></script>


     <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>telerik/styles/kendo.default.min.css" /> 
   
    <script src="<?php echo base_url();?>telerik/js/kendo.all.min.js"></script>
    
    
    <script>
        function createChart() {
            $("#barchart").kendoChart({
                title: {
                    text: "รายงานภาพรวมโครงการ"
                },
                legend: {
                    position: "bottom"
                },
                series: [{
                    type: "line",
                    data: [6, 10, 10, 10, 10, 9, 5, 5, 10, 8, 8, 5, 8, 11, 9, 15, 20, 23, 24, 21, 21, 20, 22, 22, 20, 18, 16, 15, 20, 13.2, 18],
                    name: "Max. Temperature [&deg;C]",
                    color: "#ff1c1c",
                    axis: "temp"
                }, {
                    type: "line",
                    data: [-5, -6, 0, -4, -3, -5.2, -5, -1.7, -1, 0, -0.4, -2, -2, -5, 4, -2, -4, -1, -1, 2, 4, -1, 1, 1, 4, 0, -1, 1, -2, 5.7, 5],
                    name: "Min. Temperature [&deg;C]",
                    color: "#ffae00",
                    axis: "temp"
                }, {
                    type: "area",
                    data: [16.4, 21.7, 35.4, 19, 10.9, 13.6, 10.9, 10.9, 10.9, 16.4, 16.4, 13.6, 13.6, 29.9, 27.1, 16.4, 13.6, 10.9, 16.4, 10.9, 24.5, 10.9, 8.1, 19, 21.7, 27.1, 24.5, 16.4, 27.1, 29.9, 27.1],
                    name: "Wind Speed [km/h]",
                    color: "#73c100",
                    axis: "wind"
                }, {
                    type: "area",
                    data: [5.4, 2, 5.4, 3, 2, 1, 3.2, 7.4, 0, 8.2, 0, 1.8, 0.3, 0, 0, 2.3, 0, 3.7, 5.2, 6.5, 0, 7.1, 0, 4.7, 0, 1.8, 0, 0, 0, 1.5, 0.8],
                    name: "Rainfall [mm]",
                    color: "#007eff",
                    axis: "rain"
                }],
                valueAxes: [{
                    name: "rain",
                    color: "#007eff",
                    min: 0,
                    max: 60
                }, {
                    name: "wind",
                    color: "#73c100",
                    min: 0,
                    max: 60
                }, {
                    name: "temp",
                    min: -30,
                    max: 30
                }],
                categoryAxis: {
                    categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                    // Align the first two value axes to the left
                    // and the last two to the right.
                    //
                    // Right alignment is done by specifying a
                    // crossing value greater than or equal to
                    // the number of categories.
                    axisCrossingValues: [32, 32, 0],
                    justified: true
                },
                tooltip: {
                    visible: true,
                    format: "{0}",
                    template: "#= category #/03: #= value #"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>    
  
    
      </body>
</html>