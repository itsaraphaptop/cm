



    <!-- Main content -->

        <!-- Job Details -->
      <div class="row">
         <div class="col-xs-12">
          <div class="box">

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
                  <th class="text-center">วันทีเสร็จสิ้น</th>
                  <th class="text-center">สถานะ</th>
                    <th class="text-center">หมายเหตุ</th>
                  <th class="text-center">action</th>
                  <thc class="text-center">Report</th>
                </tr>
                <?php $i=1; foreach ($getappu as $comp): ?>
                <tr>
                  <td class="text-center"><?php echo $i ; ?></td>
                  <td class="text-center"><?php echo $comp->req_name ;?></td>
                  <td class="text-center"><?php echo $comp->req_lastname; ?> </td>
                  <td class="text-center"><?php echo $comp->req_posi; ?></td>
                  <td class="text-center"><?php $this->db->select('department_title');
                  $this->db->from('department');
                  $this->db->where('department_id',$comp->req_department);
                  $query = $this->db->get();
                  $res = $query->result()
                  ?>
                  <?php foreach ($res as $showdp): ?>
                    <?php echo $showdp->department_title;?>
                  <?php  endforeach; ?></label></td>
                  <td class="text-center">  <?php $this->db->select('project_name') ;
                          $this->db->from('project');
                          $this->db->where('project_id',$comp->req_project);
                          $query = $this->db->get();
                          $res = $query->result()?>
                          <?php foreach ($res as $pj): ?>
                            <?php echo $pj->project_name ?>
                          <?php endforeach; ?>
</td>
                  <td class="text-center"><?php echo $comp->req_type; ?></td>
                  <td class="text-center"><?php echo $comp->req_description; ?></td>
                  <td class="text-center"><?php echo $comp->req_datecom; ?> <?php echo $comp->req_datecancel ?></td>

                 <td class="text-center"><?php if($comp->req_status =='2') echo "<labeL id='status1' value='2' class='label label-warning'>COMPLETE</label> <script>alert('เจ้าหน้าที่ดำเนินรายการเรียบร้อยกรุณา APPROVE รายการ $comp->req_description');</script>" ?><?php if($comp->req_status =='3') echo '<labeL class="label label-success">APPROVE</label>' ?><?php if($comp->req_status =='4') echo '<labeL class="label label-danger">CANCEL</label>' ?></td>
                    <td class="text-center"><?php echo $comp->req_cancel; ?></td>
                  <td class="text-center">
<?php if($comp->req_status =='2') echo "<button id='btnapp$comp->id_req'' type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal_app$comp->id_req'>APPROVE<i class='icon-play3 position-right'></i></button>" ?>

                  </td>
                  <td class="text-center">
                <?php if($comp->req_status =='3'){  ?>
                <?php echo "<a data-toggle='modal' data-target='#userrmodal"?><?php echo $comp->id_req ?><?php echo "'><span class='glyphicon glyphicon-list-alt'></span></a>"  ?>

                <?php echo "<a href='"?><?php echo base_url();?><?php echo "License/reportit/"?><?php echo $comp->id_req ?><?php echo "'><span class='glyphicon glyphicon-print'></span></a>" ?>
                  <?php } ?>
                  </td>
                </tr>

                <?php $i++; endforeach; ?>

              </tbody></table>
            </div>

          </div>
          <!-- /.box -->
        </div>

<!-- /.Job Details -->

</div>


<!-- Warning modal -->


         <!-- Mini modal -->

         <!-- /mini modal -->
         <?php foreach ($getappu as $uu): ?>


         <form class="" action="<?php echo base_url(); ?>IT/app_status" method="post">


         <div id="modal_app<?php echo $uu->id_req; ?>" class="modal fade">
           <div class="modal-dialog modal-xs">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>

               </div>

               <div class="modal-body">
                ได้รับการแก้ไขแล้วหรือไม่
                <input type="hidden" name="idreq" value="<?php echo $uu->id_req; ?>">
                <input type="hidden" name="reqstat" value="3">
                <input type="hidden" name="appdate" value="<?php echo date('y-m-d')?>">
               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                 <button type="submit" class="btn btn-success">YES</button>
               </div>
             </div>
           </div>
         </div>
              </form>
     <?php endforeach; ?>

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
