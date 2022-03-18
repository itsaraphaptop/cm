



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
                  <th class="text-center">วันที่ร้องขอ</th>
                  <th class="text-center">สถานะ</th>

                  <th class="text-center">action</th>
                </tr>
                <?php $i=1; foreach ($getorder as $order): ?>

                <tr>
                  <td class="text-center"><?php echo $i ; ?></td>
                  <td class="text-center"><?php echo $order->req_name ;?></td>
                  <td class="text-center"><?php echo $order->req_lastname; ?> </td>
                  <td class="text-center"><?php echo $order->req_posi; ?></td>


                  <td class="text-center">
<?php $this->db->select('department_title');
$this->db->from('department');
$this->db->where('department_id',$order->req_department);
$query = $this->db->get();
$res = $query->result()
?>
<?php foreach ($res as $showdp): ?>
  <?php echo $showdp->department_title;?>
<?php  endforeach; ?>
                  </td>
                  <td class="text-center">
                    <?php $this->db->select('project_name') ;
                          $this->db->from('project');
                          $this->db->where('project_id',$order->req_project);
                          $query = $this->db->get();
                          $res = $query->result()?>
                          <?php foreach ($res as $pj): ?>
                            <?php echo $pj->project_name ?>
                          <?php endforeach; ?></td>
                  <td class="text-center"><?php echo $order->req_type; ?></td>
                  <td class="text-center"><?php echo $order->req_description; ?></td>
                  <td class="text-center"><?php echo $order->req_startdate; ?></td>
                  <td class="text-center"><?php if($order->req_status =='1') echo '<label class="label label-warning">WAITING</label>' ?><?php if($order->req_status =='2') echo '<label class="label label-warning">COMPLETE</label>' ?><?php if($order->req_status =='3') echo '<label class="label label-success">APPROVE</label>' ?></td>

                  <td class="text-center">
<?php if($order->req_status =='2') echo "<button id='btnapp$order->id_req'' type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal_app$order->id_req'>approve<i class='icon-play3 position-right'></i></button>" ?>
                    <button id="btnedit<?php echo $order->id_req; ?>" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal<?php echo $order->id_req; ?>">EDIT <i class="icon-play3 position-right"></i></button>
                    <!-- <button type="button" id="btndelete<?php echo $order->id_req; ?>" onclick="Delete<?php echo $order->id_req; ?>(<?php echo $order->id_req; ?>)" name="btndelete">DELETE</button> -->
                    <button id="btndele<?php echo $order->id_req; ?>" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_delete<?php echo $order->id_req; ?>">DELETE<i class="icon-play3 position-right"></i></button>
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
<?php  foreach ($getorder as $req): ?>

<form class="" action="<?php echo base_url(); ?>/IT/RequestEdit" method="post">


         <div id="modal<?php echo $req->id_req ?>" class="modal fade">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header bg-warning">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h6 class="modal-title">แก้ไขใบงาน</h6>
               </div>

               <div class="modal-body">
                 <input type="hidden" name="idreq" value="<?php echo $req->id_req; ?>">
                 <label for="name">ชื่อ</label>
                 <input class="form-control" type="text" name="name" value="<?php echo $req->req_name; ?>">
                 <label for="lname">นามสกุล</label>
                 <input class="form-control" type="text" name="lname" value="<?php echo $req->req_lastname; ?>">
                 <label for="name">ตำแหน่ง</label>
                 <input class="form-control" type="text" name="posi" value="<?php echo $req->req_posi; ?>">


                 <label for="dep">แผนก</label>
                 <?php
                 $this->db->select('*');
                 $this->db->from('department');
                 $this->db->where('department_id',$req->req_department);
                 $query = $this->db->get();
                 $res = $query->result();
                  ?>

                 <select class="form-control input-sm" name="dep" id="dep">
                   <?php foreach ($res as $dpet ): ?>
                   <option value="<?php echo $dpet->department_id ;?>"><?php echo $dpet->department_title ;?></option>
                   <?php endforeach; ?>
                   <?php
                   $this->db->select('*');
                   $this->db->from('department');
                   $query = $this->db->get();
                   $res = $query->result();
                    ?>
                   <?php foreach ($res as $dp) { ?>
                   <option value="<?php echo $dp->department_id ;?>"><?php echo $dp->department_title ;?></option>
                         <?php   } ?>
                 </select>

                 <label for="name">โครงการ</label>
                 <!-- <input class="form-control" type="text" name="proj" value="<?php echo $req->req_project; ?>"> -->
                 <select class="form-control input-sm" name="proj" id="proj">
                   <?php
                   $this->db->select('project_id,project_name');
                   $this->db->from('project');
                   $this->db->where('project_id',$req->req_project);
                   $query = $this->db->get();
                   $respj = $query->result();
                    ?>
                    <?php foreach ($respj as $pj): ?>
                   <option value="<?php echo $pj->project_id; ?>"><?php echo $pj->project_name; ?></option>
                   <?php endforeach; ?>
                   <?php
                   $this->db->select('*');
                   $this->db->from('project');
                   $query = $this->db->get();
                   $res = $query->result();
                    ?>
                    <?php foreach ($res as $pj) { ?>
                    <option value="<?php echo $pj->project_id ;?>"><?php echo $pj->project_name ;?></option>
                          <?php   } ?>
                 </select>


                 <label for="name">ชนิดงาน</label>
                <select class="form-control" name="type">
                  <option value="<?php echo $req->req_type; ?>"><?php echo $req->req_type; ?></option>
                  <option value="SOFTWARE">SOFTWARE</option>
                  <option value="HARDWARE">HARDWARE</option>
                </select>
                <label for="txtdes">รายละเอียด</label>
                <textarea class="form-control" name="txtdes" rows="5" cols="5"><?php echo $req->req_description; ?></textarea>
                  <!-- <input type="text" name="txtdate " value="?>"> -->
               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-warning">SAVE</button>
               </div>
             </div>
           </div>
         </div>
         </form>

         <!-- Mini modal -->
         <form class="" action="<?php echo base_url(); ?>IT/REQ_Delete" method="post">
         <div id="modal_delete<?php echo $req->id_req; ?>" class="modal fade">
           <div class="modal-dialog modal-xs">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                ARE YOU SURE ??
                <input type="hidden" name="del" value="<?php echo $req->id_req; ?>">
               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                 <button type="submit" class="btn btn-success">YES</button>
               </div>
             </div>
           </div>
         </div>
              </form>
         <!-- /mini modal -->
         <form class="" action="<?php echo base_url(); ?>IT/app_status" method="post">


         <div id="modal_app<?php echo $req->id_req; ?>" class="modal fade">
           <div class="modal-dialog modal-xs">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>

               </div>

               <div class="modal-body">
                ได้รับการแก้ไขแล้วหรือไม่
                <input type="hidden" name="idreq" value="<?php echo $req->id_req; ?>">
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
