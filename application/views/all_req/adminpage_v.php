

<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">


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
            <!-- ./col -->
        </div>
<div class="row">
  <div class="col-md-6">
    <a href="<?php echo base_url(); ?>master/project" class="btn btn-primary" > ADD PROJECT</a>
    <a href="<?php echo base_url(); ?>master/department" class="btn btn-primary"> ADD DEPARTMENT</a>
    <a href="<?php echo base_url(); ?>master/user" class="btn btn-primary"> USER</a>
  </div>
</div>
<br>
        <div class="box">

          <div class="box-header">

            <h3 class="box-title">JOB APPROVE</h3>

            <div class="box-tools">
            <div class="col-sm-12">
              <div class="input-group input-group-sm" style="width: 150px;">

              </div>
            </div>
          </div>
          <!-- /.box-header -->

        <div class="box-body table-responsive no-padding">
          <div id="siteloader"></div>​
        <table id="example" class="table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center">สกุล</th>
                <th class="text-center">ตำแหน่ง</th>
                <th class="text-center">แผนก</th>
                <th class="text-center">โครงการ</th>
                <th class="text-center">ชนิดงาน</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center">วันที่</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">Report</th>
                <th class="text-center">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
                <?php $i=1; foreach ($getapp as $app):  ?>
            <tr>
                <td class="text-center"><?php echo $i; ?></td>
                <td class="text-center"><?php echo $app->req_name ;?></td>
                <td class="text-center"><?php echo $app->req_lastname; ?> </td>
                <td class="text-center"><?php echo $app->req_posi; ?></td>
                <td class="text-center"><?php $this->db->select('department_title');
                $this->db->from('department');
                $this->db->where('department_id',$app->req_department);
                $query = $this->db->get();
                $res = $query->result()
                ?>
                <?php foreach ($res as $showdp): ?>
                  <?php echo $showdp->department_title;?>
                <?php  endforeach; ?></label></td>
                <td class="text-center">  <?php $this->db->select('project_name') ;
                        $this->db->from('project');
                        $this->db->where('project_id',$app->req_project);
                        $query = $this->db->get();
                        $res = $query->result()?>
                        <?php foreach ($res as $pj): ?>
                          <?php echo $pj->project_name ?>
                        <?php endforeach; ?>
</td>
                <td class="text-center"><?php echo $app->req_type; ?></td>
                <td class="text-center"><?php echo $app->req_description; ?></td>
                <td class="text-center"><?php echo $app->req_startdate; ?></td>
                <td class="text-center"><?php if($app->req_status =='3') echo '<labeL class="label label-success">APPROVE</label>' ?><?php if($app->req_status =='4') echo '<labeL class="label label-danger">CANCEL</label>' ?></td>
                  <td class="text-center">
                  <a data-toggle="modal" data-target="#userrmodal<?php echo $app->id_req ?>"><span class="glyphicon glyphicon-list-alt"></span></a>
                  <a href="<?php echo base_url();?>License/reportit/<?php echo $app->id_req ?>"><span class="glyphicon glyphicon-print"></span></a>
                  </td>
                  <td class="text-center"><?php echo $app->req_cancel; ?></td>

            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>

    <script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
          </div>

        </div>
</div>
 <?php $i=1; foreach ($getapp as $app):  ?>
<div class="modal fade" id="userrmodal<?php echo $app->id_req ?>" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title text-center">แบบฟอร์มร้องขอดำเนินการด้าน IT</h1>
          <h4 class="text-center">(IT REQUEISITION FORM)</h4>

        </div>
          <div class="modal-body">
          <?php if($app->req_type =='SOFTWARE'){ ?>
          <?php  echo'<label class="checkbox-inline"><input type="checkbox" checked="checked">SOFTWARE</label><label class="checkbox-inline"><input type="checkbox" value="">HARDWARE</label>' ?>
          <?php } ?>
          <?php if($app->req_type =='HARDWARE'){ ?>
          <?php  echo'<label class="checkbox-inline"><input type="checkbox"  >SOFTWARE</label><label class="checkbox-inline"><input type="checkbox" checked="checked">HARDWARE</label>' ?>
          <?php } ?>
          <hr>
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">USER DETAIL</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="">ชื่อ - นามสกุล :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_name; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_lastname; ?></label><br>
                    <label for="">แผนก :</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="">
                      <?php $this->db->select('department_title');
                      $this->db->from('department');
                      $this->db->where('department_id',$app->req_department);
                      $query = $this->db->get();
                      $res = $query->result()
                      ?>
                      <?php foreach ($res as $showdp): ?>
                        <?php echo $showdp->department_title;?>
                      <?php  endforeach; ?></label>
                  </div>
                  <div class="col-xs-6">
                    <label for="">วันที :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_startdate; ?></label><br>
                    <label for="">โครงการ :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for="">
                      <?php $this->db->select('project_name') ;
                            $this->db->from('project');
                            $this->db->where('project_id',$app->req_project);
                            $query = $this->db->get();
                            $res = $query->result()?>
                            <?php foreach ($res as $pj): ?>
                              <?php echo $pj->project_name ?>
                            <?php endforeach; ?>

                    </label><br>
                    <label for="">ตำแหน่ง :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_posi ; ?></label>
                  </div>
                </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">รายละเอียดของปัญหา</h3>
                </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-6">
                  <?php echo $app->req_description; ?><br><br>
                  <label for="">วันที่เสร็จ :</label>&nbsp;&nbsp;&nbsp;&nbsp;<label for=""><?php echo $app->req_datecom; ?></label>

                </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">ความคิดเห็นของเจ้าหน้าที่</h3>
                </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <?php echo $app->req_cancel; ?><br><br>
                  <?php $this->db->select('*');
                  $this->db->from('user');
                  $this->db->where('uid',$app->req_nameadmin);
                  $query = $this->db->get();
                  $ad= $query->result()
                   ?>
                  <?php foreach ($ad as $valad): ?>
                    <p class="pull-right">ลงชื่อผู้ดำเนินการแก้ไข :<?php echo $valad->uname ?>&nbsp;&nbsp;&nbsp;<?php echo $valad->usurname ?>
                  <?php endforeach; ?>
                  
                </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">ลงชื่อรับการแก้ไขปัญหา : <u><?php echo $app->req_name ; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $app->req_lastname; ?></u><br><br>  วันที่ได้รับการแก้ไข : <u><?php echo $app->req_dateapp; ?></u></h3>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
     <?php $i++; endforeach; ?>
        <!-- Job Details -->
      <div class="row">

         <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job waiting</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">ชื่อ</th>
                  <th class="text-center">สกุล</th>
                  <th class="text-center">ตำแหน่ง</th>
                  <th class="text-center">แผนก</th>
                  <th class="text-center">โครงการ</th>
                  <th class="text-center">ชนิดงาน</th>
                  <th class="text-center">รายละเอียด</th>
                  <th class="text-center">วันที่</th>
                  <th class="text-center">สถานะ</th>
                  <th class="text-center">action</th>
                </tr>
                <?php $i=1; foreach ($getall as $all): ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center"><?php echo $all->req_name ;?></td>
                  <td class="text-center"><?php echo $all->req_lastname; ?> </td>
                  <td class="text-center"><?php echo $all->req_posi; ?></td>
                  <td class="text-center"><?php $this->db->select('department_title');
                  $this->db->from('department');
                  $this->db->where('department_id',$all->req_department);
                  $query = $this->db->get();
                  $res = $query->result()
                  ?>
                  <?php foreach ($res as $showdp): ?>
                    <?php echo $showdp->department_title;?>
                  <?php  endforeach; ?></td>
                  <td class="text-center">  <?php $this->db->select('project_name') ;
                          $this->db->from('project');
                          $this->db->where('project_id',$all->req_project);
                          $query = $this->db->get();
                          $res = $query->result()?>
                          <?php foreach ($res as $pj): ?>
                            <?php echo $pj->project_name ?>
                          <?php endforeach; ?>
</td>
                  <td class="text-center"><?php echo $all->req_type; ?></td>
                  <td class="text-center"><?php echo $all->req_description; ?></td>
                  <td class="text-center"><?php echo $all->req_startdate; ?></td>
                  <td class="text-center"><?php if($all->req_status =='1') echo '<labeL class="label label-warning">WAITING</label>' ?></td>

                  <td class="text-center">
                    <button id="btnok<?php echo $all->id_req; ?>" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalok<?php echo $all->id_req; ?>">COMPLETE <i class="icon-play3 position-right"></i></button>
                    <button id="btncancel<?php echo $all->id_req; ?>" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalcancel<?php echo $all->id_req; ?>">CANCEL <i class="icon-play3 position-right"></i></button>
                  </td>
                </tr>
                <?php $i++; endforeach; ?>

              </tbody>
            </table>
            </div>

          </div>
          <!-- /.box -->


          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">JOB COMPLETE WAIT APPROVE FROM USER</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
        <!-- <div class="table table-bordered table-striped"> -->
              <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">ชื่อ</th>
                  <th class="text-center">สกุล</th>
                  <th class="text-center">ตำแหน่ง</th>
                  <th class="text-center">แผนก</th>
                  <th class="text-center">โครงการ</th>
                  <th class="text-center">ชนิดงาน</th>
                  <th class="text-center">รายละเอียด</th>
                  <th class="text-center">วันที่ Request</th>
                  <th class="text-center">วันที่ complete</th>
                  <th class="text-center">สถานะ</th>

                </tr>
                <?php $i=1; foreach ($getcom as $com): ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td class="text-center"><?php echo $com->req_name ;?></td>
                  <td class="text-center"><?php echo $com->req_lastname; ?> </td>
                  <td class="text-center"><?php echo $com->req_posi; ?></td>
                  <td class="text-center"><?php $this->db->select('department_title');
                  $this->db->from('department');
                  $this->db->where('department_id',$com->req_department);
                  $query = $this->db->get();
                  $res = $query->result()
                  ?>
                  <?php foreach ($res as $showdp): ?>
                    <?php echo $showdp->department_title;?>
                  <?php  endforeach; ?></td>
                  <td class="text-center"><?php $this->db->select('project_name') ;
                          $this->db->from('project');
                          $this->db->where('project_id',$com->req_project);
                          $query = $this->db->get();
                          $res = $query->result()?>
                          <?php foreach ($res as $pj): ?>
                            <?php echo $pj->project_name ?>
                          <?php endforeach; ?></td>
                  <td class="text-center"><?php echo $com->req_type; ?></td>
                  <td class="text-center"><?php echo $com->req_description; ?></td>
                  <td class="text-center"><?php echo $com->req_startdate; ?></td>
                  <td class="text-center"><?php echo $com->req_datecom; ?></td>
                  <td class="text-center"><?php if($com->req_status =='2') echo '<labeL class="label label-warning">COMPLETE</label>' ?></td>
                  <td></td>


                </tr>
                <?php $i++; endforeach; ?>

              </tbody>
            </table>
            <!-- </div> -->

          </div>


          <!-- /.box-body -->
        </div>
        </div>
      </div>
<!-- /.Job Details -->
    </section>
</div>
<!-- Warning modal -->
<?php foreach ($getall as $req): ?>

<form class="" action="<?php echo base_url(); ?>/IT/Com_status" method="post">


         <div id="modalok<?php echo $req->id_req ?>" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header bg-warning">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h6 class="modal-title">ความคิดเห็นของเจ้าหน้าที่</h6>
               </div>

               <div class="modal-body">

                 <input type="hidden" name="idreq" value="<?php echo $req->id_req; ?>">
                 <input type="hidden" name="reqstat" value="2">
                 <input type="hidden" name="datecom" value="<?php echo date('y-m-d') ?>">
                 <textarea name="cc" rows="5" class="form-control" cols="80"></textarea>
                 <br>
                 <label for="">เจ้าหน้าที่ที่แก้ไข</label>
                 <select class="form-control" name="nameadmin">

                   <?php foreach ($adminuser as $key => $value) {?>
                     <option value="<?php echo $value->uid; ?>"><?php echo $value->uname; ?> <?php echo $value->usurname; ?></option>
                  <? } ?>
                 </select>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-warning">YES</button>
               </div>
             </div>
           </div>
         </div>
         </form>



<?php endforeach; ?>

<?php foreach ($getall as $req): ?>

<form class="" action="<?php echo base_url(); ?>/IT/Com_cancel" method="post">


         <div id="modalcancel<?php echo $req->id_req ?>" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header bg-warning">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h6 class="modal-title">CANCEL</h6>
               </div>

               <div class="modal-body">
                <label for="txtcancel">เหตุผลที่ยกเลิก ... ?</label>
                 <textarea type="text" id="txtcancel" name="txtcancel" class="form-control" cols="45" rows="5"></textarea>

                 <input type="hidden" name="idreq" value="<?php echo $req->id_req; ?>">
                 <input type="hidden" name="reqstat" value="4">
                 <input type="hidden" name="reqdatecancel" value="<?php echo date('y-m-d') ?>">
               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-warning">YES</button>
               </div>
             </div>
           </div>
         </div>
         </form>



<?php endforeach; ?>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>datatables/dataTables.bootstrap.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>datatables/dataTables.bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>datatables/jquery.dataTables.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>datatables/jquery.dataTables.min.js"></script> -->

<script>
  $(function () {
    $("#example1").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false
    // });
  });
</script>
