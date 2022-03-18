<div class="content-wrapper">
  <!-- Page header -->
  <div class="page-header">
    
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-flat border-top-lg border-top-warning">
            <div class="panel-heading">
              <h6 class="panel-title">FA Pending</h6>
              <div class="heading-elements">
                <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                  <li><a data-action="reload"></a></li>
                  <li><a data-action="close"></a></li>
                </ul>
              </div>
              <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
              <div class="panel-body">
                <div class="tabbable">
                  
                  <div class="tab-content">
                    
                    <?php
                    $this->db->select('*');
                    $this->db->from('approve_fa');
                    $this->db->where('status =','no');
                    $this->db->where('app_project =','Repair');
                    $this->db->group_by('app_pr');
                    $qpj=$this->db->get()->result();
                    foreach ($qpj as $qq) { ?>
                    <?php
                    $this->db->select('*');
                    $this->db->from('approve_fa');
                    $this->db->where('app_pr',$qq->app_pr);
                    $this->db->where('status =','no');
                    $npr=$this->db->get()->num_rows();
                    ?>
                    <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <div class="panel-heading">
                        <h6 class="panel-title"><?php echo $qq->app_pr; ?> <b>(Repair)</b></h6>
                        <div class="heading-elements">
                          <ul class="icons-list">
                            <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                            
                          </ul>
                        </div>
                        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                        
                        <div class="table-responsive" style="display: none;">
                          <table class="table datatable-basic" >
                            <thead>
                              <tr role="row">
                                <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)  </th>
                                <th width="50%"><div >Status Approve</div></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                                <td ><?php echo $qq->app_pr; ?> </td>
                                <?php $this->db->select('*');
                                $this->db->from('approve_fa');
                                $this->db->where('app_pr',$qq->app_pr);
                                $sc=$this->db->get()->result(); ?>
                                <td>
                                  
                                  <?php $a=1; foreach ($sc as $cc) {
                                  if($cc->app_sequence=="1"){
                                  $s1=$cc->status;
                                  $l1 = $cc->lock;
                                  }else if($cc->app_sequence=="2"){
                                  $s2=$cc->status;
                                  $l2 = $cc->lock;
                                  }else if($cc->app_sequence=="3"){
                                  $s3=$cc->status;
                                  $l3 = $cc->lock;
                                  }else if($cc->app_sequence=="4"){
                                  $s4=$cc->status;
                                  $l4 = $cc->lock;
                                  }else if($cc->app_sequence=="5"){
                                  $s5=$cc->status;
                                  $l5 = $cc->lock;
                                  }else if($cc->app_sequence=="6"){
                                  $s6=$cc->status;
                                  $l6 = $cc->lock;
                                  }else if($cc->app_sequence=="7"){
                                  $s7=$cc->status;
                                  $l7 = $cc->lock;
                                  }else if($cc->app_sequence=="8"){
                                  $s8=$cc->status;
                                  $l8 = $cc->lock;
                                  }else if($cc->app_sequence=="9"){
                                  $s9=$cc->status;
                                  $l9 = $cc->lock;
                                  }else if($cc->app_sequence=="10"){
                                  $s10=$cc->status;
                                  $l10 = $cc->lock;
                                  }
                                  ?>
                                  
                                  <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                                  
                                  <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                    <div id="chka<?php echo $qq->app_midid; ?>">
                                      <div class="col-xs-3"><a data-toggle="modal" data-target="#openprr<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                                      
                                      
                                      <!-- <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div> -->
                                      <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      
                                      
                                      <!-- <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div> -->
                                      <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: red;"><b>Not verified yet.</b></p>
                                      <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                                      
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: green;"><b>Approved successfully.</b></p>
                                      <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: green;"><b>Approved successfully.</b></p>
                                      <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: green;"><b>Approved successfully.</b></p>
                                      <?php } ?>
                                      
                                    </div>
                                    
                                    
                                    
                                  <br></p>
                                  <?php $this->db->select('*');
                                  $this->db->from('approve_fa');
                                  $this->db->where('app_midname',$username);
                                  $numx=$this->db->get()->num_rows();
                                  ?>
                                  
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                  $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                                  </script>
                                  <div id="openprr<?php echo $cc->app_id; ?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Open Detail FA No.: <?php echo $cc->app_pr; ?></h5>
                                        </div>
                                        <div class="modal-body">
                                          <?php $this->db->select('*');
                                          $this->db->from('repair');
                                          $this->db->join('repair_detail', 'repair_detail.code_doc = repair.code_doc','left outer');
                                          $this->db->where('repair.code_doc',$cc->app_pr);
                                          $pr=$this->db->get()->result();
                                          foreach ($pr as $epr) {
                                          $vender_id = $epr->vender_id;
                                          $vender_name = $epr->vender_name;
                                          $code_usernotify = $epr->code_usernotify;
                                          $user_notify = $epr->user_notify;
                                          $num = $epr->num;
                                          $date_doc = $epr->date_doc;
                                          $note = $epr->note;
                                          $user_add = $epr->user_add;
                                          $user_edit = $epr->user_edit;
                                          $time_add = $epr->time_add;
                                          $time_edit = $epr->time_edit;
                                          $approve = $epr->approve;
                                          $code_doc = $epr->code_doc;
                                          $project_id = $epr->project_id;
                                          $project_name = $epr->project_name;
                                          $department_id = $epr->department_id;
                                          $department_name = $epr->department_name;
                                          $status_ative = $epr->status_ative;
                                          $user_del = $epr->user_del;
                                          $time_del = $epr->time_del;
                                          }
                                          ?>
                                          <h3><i class=" icon-file-empty"></i> ใบแจ้งซ่อม</h3>
                                          <div class="row">
                                            <div class="col-xs-12 form-group">
                                              <div class="col-xs-6">
                                                <label>RP No.</label>
                                                <input type="text" name="code_doc" class="form-control" value="<?php echo $code_doc; ?>" readonly="true">
                                              </div>
                                              <div class="col-xs-6">
                                                <label>วันที่ออกเอกสาร :</label>
                                                <input type="date" id="date_doc" name="date_doc" class="form-control" value="<?php echo $date_doc; ?>">
                                                <input type="hidden" name="num" class="form-control">
                                              </div>
                                              <?php
                                              $arr = array(
                                              'p' => 'Project',
                                              'd' => 'Department'
                                              );
                                              ?>
                                              <div class="col-xs-2">
                                                <label>&nbsp;</label>
                                                <select class="form-control" id="sel_type">
                                                  <?php foreach ($arr as $key => $value) { ?>
                                                  <option value="<?=$key;?>"><?=$value;?></option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                              <div class="col-xs-3">
                                                <label>เลขที่โครงการ :</label>
                                                <input type="text" name="project_id" id="project_id" class="form-control" readonly="true" value="<?php echo $project_id; ?>">
                                              </div>
                                              <div class="col-xs-3">
                                                <label>ชื่อโครงการ :</label>
                                                <div class="input-group">
                                                  <input type="text" name="project_name" id="project_name" class="form-control" readonly="true" value="<?php echo $project_name; ?>">
                                                  
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-xs-12 form-group">
                                              <div class="col-xs-3">
                                                <label>เลขที่แผนก :</label>
                                                <input type="text" name="department_id" id="department_id" class="form-control" readonly="true" value="<?php echo $department_id; ?>">
                                              </div>
                                              <div class="col-xs-3">
                                                <label>ชื่อแผนก :</label>
                                                <div class="input-group">
                                                  <input type="text" name="department_name" id="department_name" class="form-control" readonly="true" value="<?php echo $department_name; ?>">
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 form-group">
                                              <div class="col-xs-2">
                                                <label>ร้านค้า :</label>
                                                <input type="text" name="vender_id" id="vender_id" class="form-control" readonly="true" value="<?php echo $vender_id; ?>">
                                              </div>
                                              <div class="col-xs-3">
                                                <label>&nbsp;</label>
                                                <div class="input-group">
                                                  <input type="text" name="vender_name" id="vender_name" class="form-control" readonly="true" value="<?php echo $vender_name; ?>">
                                                  
                                                </div>
                                              </div>
                                              
                                              <div class="col-xs-2">
                                                <label>ผู้แจ้งซ่อม :</label>
                                                <input type="text" name="code_usernotify" id="m_code" class="form-control" readonly="true" value="<?php echo $code_usernotify; ?>">
                                              </div>
                                              <div class="col-xs-3">
                                                <label>&nbsp;</label>
                                                <div class="input-group">
                                                  <input type="text" name="user_notify" id="m_name" class="form-control" readonly="true" value="<?php echo $user_notify; ?>">
                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-xs-12 form-group">
                                              <div class="col-xs-12">
                                                <label>หมายเหตุ :</label>
                                                <textarea rows="3" name="note" class="form-control"><?php echo $note;  ?></textarea>
                                              </div>
                                            </div>
                                          </div>
                                          <h3><i class="icon-file-text2"></i> Detail</h3>
                                          <form action="<?php echo base_url(); ?>index.php/office/approve_fa" method="post">
                                            <table class="table table-bordered table-striped table-xxs">
                                              <thead>
                                                <tr>
                                                  <th>หมายเลขเครื่อง</th>
                                                  <th>ชนิด/ยี่ห้อ/รุ่น/เครื่องจักร/อุปรกรณ์</th>
                                                  <th>ปัญหาที่แจ้ง /อาการเสีย</th>
                                                  <th>การดำเนินการ</th>
                                                  <th>กำหนดคาดว่าแล้วเสร็จ</th>
                                                  <th>กำหนดเสร็จจริง</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php   $n =1;?>
                                                <?php
                                                
                                                $this->db->select('*');
                                                $this->db->where('code_doc',$code_doc);
                                                $q =  $this->db->get('repair_detail');
                                                $res = $q->result();
                                                foreach ($res as $valj){ ?>
                                                <tr>
                                                  <td>
                                                    <?php echo $valj->fa_code; ?>
                                                    <input type="hidden" name="fa_code_old[]" value="<?php echo $valj->fa_code; ?>">
                                                    <input type="hidden" name="code_doc[]" value="<?php echo $code_doc; ?>">
                                                    <input type="hidden" name="id[]" value="<?php echo $valj->id; ?>">
                                                    
                                                  </td>
                                                  <td><?php echo $valj->fa_name; ?></td>
                                                  <td>
                                                    <?php echo $valj->problem; ?>
                                                  </td>
                                                  <td>
                                                    
                                                    <?php echo $valj->repair_name; ?>
                                                  </td>
                                                  <td>
                                                    <?php echo $valj->date_succ;?>
                                                  </td>
                                                  <td>
                                                    <?php echo $valj->date_succ_rel;?>
                                                  </td>
                                                  <td>
                                                    <select name="type[]">
                                                      <option value="1">Repair</option>
                                                      <option value="2">Write Off</option>
                                                    </select>
                                                  </td>
                                                </tr>
                                                <?php $n++; } ?>
                                                
                                              </tbody>
                                            </table>
                                            <!--  -->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn bg-success-600">Approve</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="reject<?php echo $cc->app_id; ?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Reject PR No. <?php echo $cc->app_pr; ?></h5>
                                        </div>
                                        <form action="<?php echo base_url(); ?>index.php/office/reject_pj_pr/<?php echo $cc->app_id; ?>/<?php echo $qq->app_pr; ?>/<?php echo $pjcode; ?>/<?php echo $cc->app_sequence; ?>/<?php echo $pjid; ?>" method="post">
                                          <div class="modal-body">
                                            <div class="form-group">
                                              <label for="">หมายเหตุ</label>
                                              
                                              <textarea class="form-control" name="rejectap_prove"></textarea>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit"  class="btn bg-orange-600">Reject</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <?php } ?>
                              </td>
                              
                              
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <?php }?>
                    
                    <?php
                    $this->db->select('*');
                    $this->db->from('approve_fa');
                    $this->db->where('status =','no');
                    $this->db->where('app_project =','calibration');
                    $this->db->group_by('app_pr');
                    $qpj=$this->db->get()->result();
                    foreach ($qpj as $qq) { ?>
                    <?php
                    $this->db->select('*');
                    $this->db->from('approve_fa');
                    $this->db->where('app_pr',$qq->app_pr);
                    $this->db->where('status =','no');
                    $npr=$this->db->get()->num_rows();
                    ?>
                    <div class="hideapp<?php echo $qq->app_pr; ?> panel panel-white panel-collapsed"  <?php if($npr=="0"){ echo "hidden"; } ?>>
                      <div class="panel-heading">
                        <h6 class="panel-title"><?php echo $qq->app_pr; ?> <b>(External Calibration Master Plan)</b></h6>
                        <div class="heading-elements">
                          <ul class="icons-list">
                            <li><a data-action="collapse" class="rotate-180 btn btn-primary active"></a></li>
                            
                          </ul>
                        </div>
                        <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>
                        
                        <div class="table-responsive" style="display: none;">
                          <table class="table datatable-basic" >
                            <thead>
                              <tr role="row">
                                <th width="50%">PR No. <?php echo $username; ?> (<?php echo $m_id; ?>)  </th>
                                <th width="50%"><div >Status Approve</div></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="hideapp<?php echo $qq->app_pr; ?>" <?php if($npr=="0"){ echo "hidden"; } ?>>
                                <td ><?php echo $qq->app_pr; ?> </td>
                                <?php $this->db->select('*');
                                $this->db->from('approve_fa');
                                $this->db->where('app_pr',$qq->app_pr);
                                $sc=$this->db->get()->result(); ?>
                                <td>
                                  
                                  <?php $a=1; foreach ($sc as $cc) {
                                  if($cc->app_sequence=="1"){
                                  $s1=$cc->status;
                                  $l1 = $cc->lock;
                                  }else if($cc->app_sequence=="2"){
                                  $s2=$cc->status;
                                  $l2 = $cc->lock;
                                  }else if($cc->app_sequence=="3"){
                                  $s3=$cc->status;
                                  $l3 = $cc->lock;
                                  }else if($cc->app_sequence=="4"){
                                  $s4=$cc->status;
                                  $l4 = $cc->lock;
                                  }else if($cc->app_sequence=="5"){
                                  $s5=$cc->status;
                                  $l5 = $cc->lock;
                                  }else if($cc->app_sequence=="6"){
                                  $s6=$cc->status;
                                  $l6 = $cc->lock;
                                  }else if($cc->app_sequence=="7"){
                                  $s7=$cc->status;
                                  $l7 = $cc->lock;
                                  }else if($cc->app_sequence=="8"){
                                  $s8=$cc->status;
                                  $l8 = $cc->lock;
                                  }else if($cc->app_sequence=="9"){
                                  $s9=$cc->status;
                                  $l9 = $cc->lock;
                                  }else if($cc->app_sequence=="10"){
                                  $s10=$cc->status;
                                  $l10 = $cc->lock;
                                  }
                                  ?>
                                  
                                  <?php if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="no" ){ ?>
                                  
                                  <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?>
                                    <div id="chka<?php echo $qq->app_midid; ?>">
                                      <div class="col-xs-3"><a data-toggle="modal" data-target="#cb<?php echo $cc->app_id; ?>" data-popup="tooltip" title="" data-original-title="อนุมัติ" class="label label-success label-block"><i class="icon-checkmark2"></i> Aprove</a></div>
                                      
                                      
                                      <!-- <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div> -->
                                      <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      
                                      
                                      <!-- <div class="col-xs-3"><a data-toggle="modal" data-target="#reject<?php echo $cc->app_id; ?>" class="label bg-orange-600" ><i class="icon-cross"></i> Reject </a></div> -->
                                      <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="no"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: red;"><b>Not verified yet.</b></p>
                                      <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="yes"){ ?>
                                      
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: green;"><b>Approved successfully.</b></p>
                                      <?php }else if($m_id==$cc->app_midid && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: green;"><b>Approved successfully.</b></p>
                                      <?php }else if($m_id!=$cc->app_midname && $cc->app_sequence=="1" && $cc->status=="approve"){ ?>
                                      <p><b>Approve คนที่ <?php echo $cc->app_sequence; ?> <?php echo $cc->app_midname; ?> (<?php echo $cc->app_midid; ?>)</b> <?php if($cc->lock=="Y"){ echo '<i style="color:red;"><i class="icon-user-lock"></i><b> LOCK !</b></i>';  } ?> </p>
                                      <p style="color: green;"><b>Approved successfully.</b></p>
                                      <?php } ?>
                                      
                                    </div>
                                    
                                    
                                    
                                  <br></p>
                                  <?php $this->db->select('*');
                                  $this->db->from('approve_fa');
                                  $this->db->where('app_midname',$username);
                                  $numx=$this->db->get()->num_rows();
                                  ?>
                                  
                                  <script>
                                  if("<?php echo $numx; ?>"=="0"){
                                  $('.hideapp<?php echo $qq->app_pr; ?>').hide();
                                  }
                                  
                                  </script>
                                  <div id="cb<?php echo $cc->app_id; ?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h5 class="modal-title">Open Detail FA No.: <?php echo $cc->app_pr; ?></h5>
                                        </div>
                                        <div class="modal-body">
                                          <?php $this->db->select('*');
                                          $this->db->from('calibration_head');
                                          $this->db->join('calibration_detail', 'calibration_detail.ref_cail = calibration_head.id','left outer');
                                          $this->db->where('calibration_head.cb_code',$cc->app_pr);
                                          $cr=$this->db->get()->result();
                                          foreach ($cr as $fac) {
                                          $prepareby_name = $fac->prepareby_name;
                                          $checkby_name = $fac->checkby_name;
                                          $ref_cail = $fac->ref_cail;
                                          }
                                          ?>
                                          <div class="row form-group">
                                            <div class="col-xs-3">
                                              <label>EC No :</label>
                                              <input type="text" name="ec_code" class="form-control" readonly="true" value="<?php echo $cc->app_pr; ?>">
                                              <input type="hidden" name="id_bin" value="">
                                            </div>
                                            <div class="col-xs-6">
                                              <label>เตรียมการโดย :</label>
                                              <div class="form-group">
                                                <input type="text" name="prepareBy_name" class="form-control" id="prepareBy_name" value="<?php echo $prepareby_name;?>" readonly="true">
                                                <input type="hidden" name="prepareBy_code" id="prepareBy_code" value="">
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row form-group">
                                            <div class="col-xs-6">
                                              <label>ตรวจสอบโดย :</label>
                                              <div class="form-group">
                                                <input type="text" name="checkBy_name" id="checkBy_name" class="form-control" value="<?php echo $checkby_name;?>" readonly="true">
                                                <input type="hidden" name="checkBy_code" id="checkBy_code" value="">
                                                
                                              </div>
                                            </div>
                
                                          </div>
                                          <h3><i class="icon-file-text2"></i> Detail</h3>
                                           <form action="<?php echo base_url(); ?>index.php/office/approve_facaribate/<?php echo $cc->app_pr; ?>" method="post">
                                          <table class="table table-striped table-bordered table-xxs table-hover table-responsive" style="overflow-x:auto;">
                                            <thead>
                                              <tr>
                                                <th>แผนก/โครงการที่ใช้งาน</th>
                                                <th>ชื่อเครื่องมือวัด</th>
                                                <th>ยี่ห้อ/รุ่น</th>
                                                <th>Serial No.</th>
                                                
                                                <th>ระยะเวลาสอบเทียบ</th>
                                                <th>วันที่สอบเทียบ</th>
  
                                                <th>ผู้ตรวจสอบ</th>
                                                
                                              </tr>
                                            </thead>
                                            <tbody id="body_cb">
                                               <?php $this->db->select('*');
                                          $this->db->from('calibration_detail');
                                          
                                          $this->db->where('calibration_detail.ref_cail',$ref_cail);
                                          $cr=$this->db->get()->result();
                                          foreach ($cr as $fac) { ?>
                                         
                                         
                                              <tr>
                                                  <td><?php echo $fac->name; ?> (<?php if($fac->type=="p"){ echo "Project"; }else{ echo "Department"; }; ?>)</td>
                                                  <td><?php echo $fac->asset_name; ?> (<?php echo $fac->asset_id; ?>) <input type="text" name="asset_id[]" class="form-control" id="asset_id" value="<?php echo $fac->asset_id; ?>" readonly="true"></td>
                                                  <td><?php echo $fac->band_name; ?></td>
                                                  <td><?php echo $fac->serail_number; ?></td>
                                                  
                                                  <td><?php echo $fac->cali_period; ?></td>
                                                  <td><?php echo $fac->cali_date; ?></td>
                                                  <td><?php echo $fac->user_check; ?></td>
                                              </tr>
                                            <?php    }
                                          ?>
                                            </tbody>
                                          </table>
                                      
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit"  class="btn bg-success-600">Approve</button>
                                            </div>
                                              </form>
                                          </form>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  
                                  <?php } ?>
                                </td>
                                
                                
                              </tr>
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <?php }?>
                      

                  
                    </div>
<script type="text/javascript">
   $('#approved').attr('class', 'active');
</script>