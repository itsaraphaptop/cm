<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        รายงานแบบกราฟ
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?php
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_status',1);
$query=$this->db->get();
echo $query->num_rows();
?></h3>

                        <p>บันทึกรายการร้องขอ </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_status',2);
$query=$this->db->get();
echo $query->num_rows();
?></h3>

                        <p>รายการที่รอดำเนินการ</p>
                    </div>
                    <div class="icon">
                        <i class="iion ion-android-done"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_status',4);
$query=$this->db->get();
echo $query->num_rows();
?></h3>

                        <p>รายการที่ยกเลิก</p>
                    </div>
                    <div class="icon">
                        <i class="iion ion-trash-a"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_status',3);
$query=$this->db->get();
echo $query->num_rows();
?></h3>

                        <p>รายการรวมทั้งหมด</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
      
    
          <div class="box">
            <div class="box-header with-border ">
              <h3 class="box-title pull-right"><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Show Data</button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div class="container">

  <div id="demo" class="collapse">
    <table class="table"  id="datatable">
      <thead>
        <tr>
          <th></th>
          <th>SOFTWARE</th>
          <th>HARDWARE</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>January</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',1);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',1);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
        <tr>
          <th>February</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',2);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',2);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
        <tr>
          <th>March</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',3);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',3);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
        <tr>
          <th>April</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',4);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',4);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
        <tr>
          <th>May</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',5);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',5);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
        <tr>
          <th>June</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',6);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',6);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
          <tr>
          <th>July</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',7);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',7);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
          <tr>
          <th>August</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',8);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',8);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
          <tr>
          <th>September</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',9);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',9);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
          <tr>
          <th>October</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',10);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',10);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
          <tr>
          <th>November</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',11);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',11);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
          <tr>
          <th>December</th>
        <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"SOFTWARE");
$this->db->where('req_month',12);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
          <td><?php
$vardate=date('Y');
$this->db->select('*');
$this->db->from('it_req');
$this->db->where('req_type',"HARDWARE");
$this->db->where('req_month',12);
$this->db->where('req_status',3);
$this->db->where('req_year',$vardate);
$query=$this->db->get();
echo $query->num_rows();
?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
    


        </div>
  
      </div>
      <div class="row">
        <div class="col-md-12">
      
    
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title pull-right"><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1">Show Data</button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
    <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 <div id="demo1" class="collapse">
    <table class="table"  id="datatable1">
      <thead>
        <tr>
        <th><hr></th>
           <?php foreach ($select as  $add): ?>
          <th><?php echo $add->project_name; ?></th>
           <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><hr></th>
         <?php foreach ($select1 as  $add1): ?>
          <td><?php echo $add1->count; ?></td>
          <?php endforeach; ?>
        </tr>

      </tbody>
    </table>
  </div>
    


        </div>
  
      </div>
      </div>
      </div>

       <div class="row">
        <div class="col-md-12">
      
    
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title pull-right"><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Show Data</button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
    <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 <div id="demo2" class="collapse">
    <table class="table" id="datatable2">
      <thead>
        <tr>
        <th><hr></th>
           <?php foreach ($select2 as  $add2): ?>
          <th><?php echo $add2->req_department; ?></th>
           <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><hr></th>
         <?php foreach ($select3 as  $add3): ?>
          <td><?php echo $add3->count; ?></td>
          <?php endforeach; ?>
        </tr>

      </tbody>
    </table>
  </div>
   


        </div>
  
      </div>
      </div>
      </div>
    </section>
    <!-- /.content -->

  </div>



  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  
  <script>
  
  $(function () {
    
    $('#container').highcharts({
      data: {
        table: 'datatable'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'รายงานแยกตามประเภทการร้องขอ'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Units'
        }
      },
      
      tooltip: {
        formatter: function () {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name.toLowerCase();
        }
      }
    });
  });

  $(function () {
    
    $('#container1').highcharts({
      data: {
        table: 'datatable1'
      },
      chart: {
        type: 'column'
      },
  title: {
        text: 'รายงานแยกตามประเภทโครงการ'
      },
      yAxis: {
        allowDecimals: false,
        title: {
        text: 'Units'
        }
      },
      
      tooltip: {
        formatter: function () {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name.toLowerCase();
        }
      }
    });
  });
  
   $(function () {
    
    $('#container2').highcharts({
      data: {
        table: 'datatable2'
      },
      chart: {
        type: 'column'
      },
        title: {
        text: 'รายงานแยกตามแผนก'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Units'
        }
      },
      
      tooltip: {
        formatter: function () {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name.toLowerCase();
        }
      }
    });
  });
  </script>